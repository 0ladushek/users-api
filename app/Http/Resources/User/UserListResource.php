<?php

namespace App\Http\Resources\User;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UserListResource
 * @property int $id
 * @property string $email
 * @property string $last_name
 * @property string $first_name
 * @package App\Http\Resources\User
 */
class UserListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'name' => [
                'first' => $this->last_name,
                'last' => $this->first_name,
            ]
        ];
    }
}
