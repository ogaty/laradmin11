<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends BaseModel
{
    protected $fillable = [
        'title',
        'body',
        'published_at',
        'path',
        'news_category_id',
    ];
}
