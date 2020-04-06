<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    protected $fillable = [
        'recipe_id', 'name', 'quantity','measure', 'created_at', 'updated_at',
    ];
    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
}
