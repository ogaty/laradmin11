<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

/**
 * @method static $this find()
 * @method static $this findOrFail(int $id) throws NotFoundException
 * @method static $this create(array $array)
 */
class BaseModel extends Model
{

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
