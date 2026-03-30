<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $fillable = [
        'name',
    ];

    public function recipes()
    {
        return $this->belongsToMany(
            Recepten::class,
            'recipe_category',
            'category_id',
            'recipe_id'
        );
    }
}
