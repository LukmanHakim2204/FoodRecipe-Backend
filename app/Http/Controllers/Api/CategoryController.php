<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('recipes')->get();
        return CategoryResource::collection($categories);
    }

    public function show(Category $category)
    {
        $category->load(['recipes.category','recipes.author']);
        $category->loadCount('recipes');
        return new CategoryResource($category);
    }
}
