<?php

namespace App\Http\Resources\User;

use App\Entities\Group;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UserListResource
 * @property int $id
 * @property string $email
 * @property string $last_name
 * @property string $first_name
 * @property string $state
 * @property Carbon $creation_date
 * @property Group $group
 * @package App\Http\Resources\User
 */
class UserInfoResource extends JsonResource
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
            ],
            'state' => $this->state,
            'creation_date' => $this->creation_date,
            'group' => [
                $this->group->id,
                $this->group->name
            ]
        ];
    }
}
