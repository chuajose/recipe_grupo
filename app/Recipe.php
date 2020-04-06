<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Recipe extends Model
{
    protected $fillable = [
        'user_id', 'title', 'description', 'created_at', 'updated_at', 'category_id', 'prep', 'yields', 'cook'
    ];
    protected $appends = [ 'file'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(RecipeComment::class);
    }

    public function ingredients()
    {
        return $this->hasMany(RecipeIngredient::class);
    }

    public function files()
    {
        return $this->hasMany(RecipeFile::class);
    }

    public function getFileUrlAttribute()
    {
        $file = $this->files()->first();
        if($file){
            return Storage::url('medium_'.$file->file->name);
        }
        return 'adfasdfasdf';
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
