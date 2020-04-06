<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'original_name', 'name', 'type','path', 'created_at', 'updated_at',
    ];
}
