<?php


namespace App\UseCases;


use App\Entities\User;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\RegisterRequest;

class UserService
{
    public function register(RegisterRequest $request): void
    {
        User::register(
            $request['email'],
            $request['last_name'],
            $request['first_name'],
            $request['state'],
            $request['group_id']
        );
    }

    public function update($id, UpdateRequest $request): void
    {
        $user = User::findOrFail($id);
        $user->update($request->only(['last_name', 'first_name', 'email', 'state']));
    }
}
