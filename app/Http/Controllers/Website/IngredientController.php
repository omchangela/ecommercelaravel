<?php

namespace App\Http\Controllers\Website;
use App\Models\Ingredient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
{
    $ingredients = Ingredient::with('product')->paginate(10);
    return view('website.ingredients.index', compact('ingredients'));
}

}
