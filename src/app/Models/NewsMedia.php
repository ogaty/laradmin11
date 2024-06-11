<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class NewsMedia extends BaseModel implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'news_medias';

    protected $fillable = [
        'title',
        'body',
    ];
}
