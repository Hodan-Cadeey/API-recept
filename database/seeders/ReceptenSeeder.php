<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recepten;
use App\Models\Ingredient;
use App\Models\Category;
use App\Models\Step;

class ReceptenSeeder extends Seeder
{
    public function run(): void
    {
        $receptenData = [
            [
                'title' => 'Pasta Carbonara',
                'description' => 'Heerlijk Italiaans recept met spek en kaas',
                'prep_time' => 10,
                'cook_time' => 20,
                'servings' => 2,
                'ingredients' => [
                    ['name' => 'Spaghetti', 'amount' => '200', 'unit' => 'gram'],
                    ['name' => 'Spek', 'amount' => '150', 'unit' => 'gram'],
                    ['name' => 'Parmezaanse kaas', 'amount' => '50', 'unit' => 'gram'],
                ],
                'categories' => ['Italiaans', 'Pasta'],
                'steps' => [
                    'Kook de pasta volgens de verpakking.',
                    'Bak het spek krokant in een pan.',
                    'Meng de pasta met spek en kaas.',
                ],
            ],
            [
                'title' => 'Pannenkoeken',
                'description' => 'Lekkere zoete pannenkoeken voor ontbijt',
                'prep_time' => 5,
                'cook_time' => 15,
                'servings' => 4,
                'ingredients' => [
                    ['name' => 'Bloem', 'amount' => '200', 'unit' => 'gram'],
                    ['name' => 'Melk', 'amount' => '300', 'unit' => 'ml'],
                    ['name' => 'Ei', 'amount' => '2', 'unit' => 'stuks'],
                ],
                'categories' => ['Ontbijt', 'Zoet'],
                'steps' => [
                    'Meng bloem, melk en eieren tot een glad beslag.',
                    'Verhit een koekenpan en bak de pannenkoeken goudbruin.',
                ],
            ],
            [
                'title' => 'Caesar Salad',
                'description' => 'Klassieke salade met kip en croutons',
                'prep_time' => 15,
                'cook_time' => 0,
                'servings' => 2,
                'ingredients' => [
                    ['name' => 'Kipfilet', 'amount' => '200', 'unit' => 'gram'],
                    ['name' => 'Sla', 'amount' => '150', 'unit' => 'gram'],
                    ['name' => 'Croutons', 'amount' => '50', 'unit' => 'gram'],
                ],
                'categories' => ['Salade', 'Gezond'],
                'steps' => [
                    'Bak de kipfilet en snijd in stukjes.',
                    'Meng alle ingrediënten in een kom.',
                    'Voeg dressing naar smaak toe.',
                ],
            ],
            [
                'title' => 'Tomatensoep',
                'description' => 'Heerlijke romige tomatensoep',
                'prep_time' => 10,
                'cook_time' => 25,
                'servings' => 4,
                'ingredients' => [
                    ['name' => 'Tomaten', 'amount' => '500', 'unit' => 'gram'],
                    ['name' => 'Ui', 'amount' => '1', 'unit' => 'stuk'],
                    ['name' => 'Knoflook', 'amount' => '2', 'unit' => 'teentjes'],
                ],
                'categories' => ['Soep', 'Vegetarisch'],
                'steps' => [
                    'Snijd tomaten, ui en knoflook.',
                    'Bak ui en knoflook in een pan.',
                    'Voeg tomaten toe en laat 20 minuten koken.',
                    'Pureer de soep en breng op smaak.',
                ],
            ],
            [
                'title' => 'Biefstuk met groenten',
                'description' => 'Malse biefstuk met gegrilde groenten',
                'prep_time' => 10,
                'cook_time' => 15,
                'servings' => 2,
                'ingredients' => [
                    ['name' => 'Biefstuk', 'amount' => '300', 'unit' => 'gram'],
                    ['name' => 'Paprika', 'amount' => '1', 'unit' => 'stuk'],
                    ['name' => 'Courgette', 'amount' => '1', 'unit' => 'stuk'],
                ],
                'categories' => ['Hoofdgerecht', 'Vlees'],
                'steps' => [
                    'Gril de biefstuk naar wens.',
                    'Snijd en bak de groenten.',
                    'Serveer samen op een bord.',
                ],
            ],
            [
                'title' => 'Groentecurry',
                'description' => 'Milde curry met groenten en kokosmelk',
                'prep_time' => 15,
                'cook_time' => 25,
                'servings' => 3,
                'ingredients' => [
                    ['name' => 'Paprika', 'amount' => '1', 'unit' => 'stuk'],
                    ['name' => 'Courgette', 'amount' => '1', 'unit' => 'stuk'],
                    ['name' => 'Kokosmelk', 'amount' => '200', 'unit' => 'ml'],
                ],
                'categories' => ['Hoofdgerecht', 'Vegetarisch', 'Curry'],
                'steps' => [
                    'Snijd groenten in stukjes.',
                    'Bak groenten in pan met kruiden.',
                    'Voeg kokosmelk toe en laat 15 minuten pruttelen.',
                ],
            ],
            [
                'title' => 'Chocoladetaart',
                'description' => 'Heerlijke smeuïge chocoladetaart',
                'prep_time' => 20,
                'cook_time' => 30,
                'servings' => 8,
                'ingredients' => [
                    ['name' => 'Bloem', 'amount' => '200', 'unit' => 'gram'],
                    ['name' => 'Cacao', 'amount' => '50', 'unit' => 'gram'],
                    ['name' => 'Suiker', 'amount' => '150', 'unit' => 'gram'],
                ],
                'categories' => ['Dessert', 'Zoet'],
                'steps' => [
                    'Meng droge ingrediënten.',
                    'Voeg boter en eieren toe.',
                    'Bak 30 minuten in oven van 180°C.',
                ],
            ],
            [
                'title' => 'Spaghetti Bolognese',
                'description' => 'Klassiek Italiaans pastagerecht',
                'prep_time' => 15,
                'cook_time' => 40,
                'servings' => 4,
                'ingredients' => [
                    ['name' => 'Spaghetti', 'amount' => '300', 'unit' => 'gram'],
                    ['name' => 'Rundergehakt', 'amount' => '400', 'unit' => 'gram'],
                    ['name' => 'Tomatensaus', 'amount' => '300', 'unit' => 'ml'],
                ],
                'categories' => ['Italiaans', 'Pasta', 'Hoofdgerecht'],
                'steps' => [
                    'Bak gehakt rul.',
                    'Voeg tomatensaus toe en laat sudderen.',
                    'Kook spaghetti en serveer samen.',
                ],
            ],
            [
                'title' => 'Groentesoep',
                'description' => 'Simpele soep met seizoensgroenten',
                'prep_time' => 10,
                'cook_time' => 20,
                'servings' => 4,
                'ingredients' => [
                    ['name' => 'Wortel', 'amount' => '2', 'unit' => 'stuks'],
                    ['name' => 'Prei', 'amount' => '1', 'unit' => 'stuk'],
                    ['name' => 'Selderij', 'amount' => '1', 'unit' => 'stengel'],
                ],
                'categories' => ['Soep', 'Vegetarisch'],
                'steps' => [
                    'Snijd alle groenten.',
                    'Bak kort in pan en voeg water toe.',
                    'Laat 20 minuten koken en serveer.',
                ],
            ],
            [
                'title' => 'Quiche Lorraine',
                'description' => 'Hartige quiche met spek en kaas',
                'prep_time' => 20,
                'cook_time' => 35,
                'servings' => 4,
                'ingredients' => [
                    ['name' => 'Deeg', 'amount' => '1', 'unit' => 'rol'],
                    ['name' => 'Spek', 'amount' => '150', 'unit' => 'gram'],
                    ['name' => 'Eieren', 'amount' => '3', 'unit' => 'stuks'],
                ],
                'categories' => ['Hoofdgerecht', 'Hartig'],
                'steps' => [
                    'Bekleed een bakvorm met deeg.',
                    'Meng eieren en spek en giet in de vorm.',
                    'Bak 35 minuten in oven van 180°C.',
                ],
            ],
        ];

        foreach ($receptenData as $data) {
            $recept = Recepten::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'prep_time' => $data['prep_time'],
                'cook_time' => $data['cook_time'],
                'servings' => $data['servings'],
            ]);

            // Ingrediënten koppelen
            foreach ($data['ingredients'] as $ing) {
                $ingredient = Ingredient::firstOrCreate(['name' => $ing['name']]);
                $recept->ingredients()->attach($ingredient->id, ['amount' => $ing['amount'], 'unit' => $ing['unit']]);
            }

            // Categorieën koppelen
            $categoryIds = [];
            foreach ($data['categories'] as $cat) {
                $category = Category::firstOrCreate(['name' => $cat]);
                $categoryIds[] = $category->id;
            }
            $recept->categories()->attach($categoryIds);

            // Stappen toevoegen
            foreach ($data['steps'] as $index => $step) {
                Step::create([
                    'recipe_id' => $recept->id,
                    'step_number' => $index + 1,
                    'description' => $step,
                ]);
            }
        }
    }
}