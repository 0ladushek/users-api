<?php


namespace App\UseCases;


use App\Entities\User;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Requests\User\RegisterRequest;

class UserService
{
    public function register(RegisterRequest $request): void
    {
        User::create($request->all());
    }

    public function update($id, UpdateRequest $request): void
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
    }

    public function delete($id): void
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
