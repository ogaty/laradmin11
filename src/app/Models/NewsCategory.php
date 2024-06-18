<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends BaseModel
{
    protected $fillable = [
        'parent_id',
        'name',
    ];
}
