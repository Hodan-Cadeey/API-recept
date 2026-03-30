<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    //
    protected $fillable = [
        'step_number',
        'description'
    ];
    
    public function recipe()
    {

        return $this->belongsTo(Recepten::class, 'recipe_id');
    }
}
