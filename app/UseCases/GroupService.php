<?php


namespace App\UseCases;

use App\Entities\Group;
use App\Http\Requests\Group\UpdateRequest;
use App\Http\Requests\Group\CreateRequest;

class GroupService
{
    public function create(CreateRequest $request): void
    {
        Group::create($request->only(['name']));
    }

    public function update($id, UpdateRequest $request): void
    {
        $user = Group::findOrFail($id);
        $user->update($request->only(['name']));
    }
}
