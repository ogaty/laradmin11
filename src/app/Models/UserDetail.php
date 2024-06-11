<?php

namespace App\Models;

class UserDetail extends BaseModel
{
    // user_detailsが正解だけどmigrate間違えたのでこのままいく
    protected $table = "user_detail";

    protected $fillable = [
        'flag1',
        'flag2',
    ];
}
