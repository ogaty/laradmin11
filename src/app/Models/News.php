<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'published_at',
        'path',
        'news_category_id',
    ];
}
