<?php
use App\Http\Controllers\ReceptController;
use App\Http\Controllers\CategoryController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('recepten/titel/{titel}', [ReceptController::class, 'findByTitle']);
Route::get('recepten/ingredient/{naam}', [ReceptController::class, 'findByIngredient']); 

route::apiResource('recepten', ReceptController::class);
Route::apiResource('category', CategoryController::class)
->parameters(['category' => 'category']);