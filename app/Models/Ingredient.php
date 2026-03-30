<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    //
    protected $fillable = [
        'name',
    ];

    public function recipes()
    {
        return $this->belongsToMany(
            Recepten::class,
            'recipe_ingredient', // pivot tabel
            'ingredient_id',     // foreign key in pivot naar ingredients
            'recipe_id'          // foreign key in pivot naar recipes
        )->withPivot('amount', 'unit')->withTimestamps();
    }
}
