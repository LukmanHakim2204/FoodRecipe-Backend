<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ingredient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'photo',
        'measure',
    ];

    public function RecipeIngredients(): HasMany
    {
        return $this->hasMany(RecipeIngredient::class, 'ingredient_id');
    }
}
