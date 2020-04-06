<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeFile extends Model
{
    protected $table= 'recipes_files';
    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
