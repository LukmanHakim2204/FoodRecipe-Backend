<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\RecipeController;
use App\Http\Controllers\Api\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::middleware('api_key')->group(function () {
    //search
    Route::get('/recipes/search', [SearchController::class, 'index']);
    //category
    Route::get('/category/{category:slug}', [CategoryController::class, 'show']);
    Route::apiResource('/categories', CategoryController::class);
    //recipe
    Route::get('/recipe/{recipe:slug}', [RecipeController::class, 'show']);
    Route::apiResource('/recipes', RecipeController::class);
});