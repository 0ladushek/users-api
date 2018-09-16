<?php

namespace App\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property string $email
 * @property string $state
 * @property integer $group_id
 * @property string $last_name
 * @property string $first_name
 * @property Carbon $creation_date
 */

class User extends Authenticatable
{
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'last_name', 'first_name', 'state', 'group_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Method create new User
     *
     * @param $email
     * @param $lastName
     * @param $firstName
     * @param $state
     * @param $groupId
     * @return User
     */
    public static function register($email, $lastName, $firstName, $state, $groupId = null): self
    {
        return static::create([
            'email'      =>  $email,
            'last_name'  =>  $lastName,
            'first_name' =>  $firstName,
            'state'      =>  $state,
            'group_id'   =>  1
        ]);
    }
}
