<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 */
class Group extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
