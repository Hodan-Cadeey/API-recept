<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\ReceptenSeeder;
use App\Models\Recepten;
use Illuminate\Support\Facades\DB;

class ReceptApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_database_connection_works()
    {
        
        $count = DB::table('recipes')->count();

        $this->assertIsInt($count);
    }

    public function test_api_returns_recipes()
    {
        $this->seed(\Database\Seeders\ReceptenSeeder::class);

        $response = $this->getJson('/api/recepten');

        $response->assertStatus(200)
            ->assertJsonFragment([
                'title' => 'Pasta Carbonara'
            ]);
    }
    
    public function test_api_returns_single_recipe()
    {
        $this->seed(\Database\Seeders\ReceptenSeeder::class);

        $recipe = \App\Models\Recepten::first();

        $response = $this->getJson("/api/recepten/{$recipe->id}");

        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => $recipe->id
            ]);
    }

    public function test_api_can_create_recipe()
    {
        $this->seed(\Database\Seeders\ReceptenSeeder::class); 

        $data = [
            'title' => 'Test Recept',
            'description' => 'Test beschrijving'
        ];

        $response = $this->postJson('/api/recepten', $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas('recipes', [
            'title' => 'Test Recept'
        ]);
    }

    public function test_api_returns_404_when_not_found()
    {
        $response = $this->getJson('/api/recepten/999');

        $response->assertStatus(404);
    }

    public function verwijdert_recept()
    {
        $this->seed(ReceptenSeeder::class);
        $recipe = Recepten::first();
        $response = $this->deleteJson("/api/recepten/{$recipe->id}");
        $response->assertStatus(200);
        $this->assertDatabaseMissing('recepten', ['id' => $recipe->id]);
    }
}
