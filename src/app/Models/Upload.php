<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Upload extends BaseModel
{
    protected $table = 'upload';
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'extension',
    ];
}
