<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recepten extends Model
{
    protected $table = 'recipes';

    protected $fillable = [
        'title',
        'description',
        'image',
        'prep_time',
        'cook_time',
        'servings',
    ];

    public function ingredients()
    {
        return $this->belongsToMany(
            Ingredient::class,
            'recipe_ingredient',
            'recipe_id',
            'ingredient_id'
        )->withPivot('amount', 'unit')->withTimestamps();
    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'recipe_category',
            'recipe_id',
            'category_id'
        );
    }

    public function steps()
    {
        return $this->hasMany(Step::class, 'recipe_id');
    }
}
