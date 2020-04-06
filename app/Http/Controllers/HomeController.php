<?php

namespace App\Http\Controllers;

use App\Repositories\RecipeRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $recipeRepository = new RecipeRepository();
        $bestRecipes = $recipeRepository->best();
        $lastComments = $recipeRepository->lastCommented();
        $lastRecipe = $recipeRepository->lastCreated();
        $byCategory = $recipeRepository->lastCreated();

        return view('recipes', [
            'lasts' => $lastRecipe,
            'bestRecipes' => $bestRecipes,
            'comments' => $lastComments
        ]);    }
}
