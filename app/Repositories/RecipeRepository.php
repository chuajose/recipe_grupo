<?php

declare( strict_types=1 );

/**
 * Created by recipes_grupo.
 * User: Jose Manuel Suárez Bravo
 * Date: 6/4/20
 * Time: 12:03
 */

namespace App\Repositories;


use App\Recipe;

final class RecipeRepository {

    public  function search( $search){

        $recipes = Recipe::select('recipes.*')->leftJoin('recipe_ingredients', 'recipe_ingredients.recipe_id', '=', 'recipes.id')->where('recipes.title', 'LIKE', '%'.$search.'%')->orWhere('recipes.description', 'LIKE', '%'.$search.'%')->orWhere('recipe_ingredients.name', 'LIKE', '%'.$search.'%')->paginate(10);

        return $recipes;


    }
    public  function lastCreated(){

        $recipes = Recipe::orderBy('created_at', 'DESC')->paginate(3);

        return $recipes;


    }

    public  function lastCommented(){

        $recipes = Recipe::join('recipe_comments', 'recipe_comments.recipe_id', '=', 'recipes.id')->where('recipe_comments.id', '!=', null)->orderBy('recipe_comments.created_at', 'DESC')->limit(9)->get();
        return $recipes;


    }



    public  function best(){

        $recipes = Recipe::select('recipes.*')->leftJoin('recipe_comments', 'recipe_comments.recipe_id', '=', 'recipes.id')->orderBy('recipe_comments.value', 'DESC')->limit(6)->get();

        return $recipes;


    }
}
