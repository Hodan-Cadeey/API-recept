<?php

namespace App\Http\Controllers;

use App\Models\Recepten;
use App\Models\Ingredient;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\info;

class ReceptController extends Controller
{
    // Alle recepten ophalen
    public function index()
    {
        return Recepten::with(['ingredients', 'steps', 'categories'])->get();
    }

    // Recept aanmaken
    public function store(Request $request)
    {
        log::channel("exportLogging")->info('Er is een nieuwe recept aangemaakt:', ['name' => $request->title]);

        $recipe = Recepten::create([
            'title'       => $request->title,
            'description' => $request->description,
            'prep_time'   => $request->prep_time ?? null,
            'cook_time'   => $request->cook_time ?? null,
        ]);

        $this->syncIngredients($recipe, $request);
        $this->syncSteps($recipe, $request);
        $this->syncCategories($recipe, $request);

        return response()->json($recipe->load(['ingredients', 'steps', 'categories']), 201);
    }

    // Eén recept ophalen
    public function show($id)
    {
        $recipe = Recepten::with(['ingredients', 'steps', 'categories'])->findOrFail($id);
        return response()->json($recipe);
    }

    // Recept bijwerken
    public function update(Request $request, $id)
    {
        log::channel("exportLogging")->info('Recept bewerkt:', ['name' => $request->title]);

        $recept = Recepten::findOrFail($id);

        // Check dat model bestaat
        if (!$recept || !$recept->id) {
            return response()->json(['message' => 'Recept niet gevonden'], 404);
        }

        // Recept updaten
        $recept->update([
            'title'       => $request->title ?? $recept->title,
            'description' => $request->description ?? $recept->description,
            'prep_time'   => $request->prep_time ?? $recept->prep_time,
            'cook_time'   => $request->cook_time ?? $recept->cook_time,
        ]);

        // Ingrediënten, stappen en categorieën synchroniseren(zorgen dat gegevens op twee plekken hetzelfde zijn)
        $this->syncIngredients($recept, $request);
        $this->syncSteps($recept, $request);
        $this->syncCategories($recept, $request);

        return response()->json($recept->load(['ingredients', 'steps', 'categories']));
    }

    public function destroy($id)
    {
        $recept = Recepten::findOrFail($id);
        log::channel("exportLogging")->info('Recept verwijdert:', ['name' => $recept->title]);
        $recept->delete();
        return response()->json(['message' => 'Deleted']);
    }

    // Zoeken op titel
    public function findByTitle($titel)
    {
        $recipe = Recepten::with(['ingredients', 'steps', 'categories'])
            ->where('title', 'like', "%{$titel}%")
            ->first(); //haal de eerst resultaat op

        if (!$recipe) {
            return response()->json(['message' => 'Recept niet gevonden'], 404);
        }

        return response()->json($recipe);
    }

    // Zoeken op ingredient
    public function findByIngredient($naam)
    {
        $recipes = Recepten::with(['ingredients', 'steps', 'categories'])
            ->whereHas('ingredients', function ($query) use ($naam) {
                $query->where('name', 'like', "%{$naam}%");
            })
            ->get();

        if ($recipes->isEmpty()) {
            return response()->json(['message' => 'Geen recepten gevonden met dit ingrediënt'], 404);
        }

        return response()->json($recipes);
    }

    //verwijder eerst oude stappen, maak alleen nieuwe aan via $recept->steps()->create().

    private function syncIngredients(Recepten $recept, Request $request)
    {
        if ($request->filled('ingredients') && is_array($request->ingredients)) {
            $ingredientsData = [];
            foreach ($request->ingredients as $item) {
                if (!is_array($item) || empty($item['name'])) continue;

                $ingredient = Ingredient::firstOrCreate(['name' => $item['name']]);
                $ingredientsData[$ingredient->id] = [
                    'amount' => $item['amount'] ?? '',
                    'unit'   => $item['unit'] ?? ''
                ];
            }
            $recept->ingredients()->sync($ingredientsData);
        } else {
            $recept->ingredients()->sync([]);
        }
    }

    private function syncSteps(Recepten $recept, Request $request)
    {
        $recept->steps()->delete();

        if ($request->filled('steps') && is_array($request->steps)) {
            foreach ($request->steps as $index => $step) {
                if (empty($step)) continue;

                $recept->steps()->create([
                    'step_number' => $index + 1,
                    'description' => $step
                ]);
            }
        }
    }
    //zorgt ervoor dat categorieën gekoppeld worden aan een recept.
    
    private function syncCategories(Recepten $recept, Request $request)
    {
        if ($request->filled('categories') && is_array($request->categories)) {
            $categoryIds = [];
            foreach ($request->categories as $name) {
                $category = Category::firstOrCreate(['name' => $name]);
                $categoryIds[] = $category->id;
            }
            $recept->categories()->sync($categoryIds);
        } else {
            $recept->categories()->sync([]);
        }
    }
}
