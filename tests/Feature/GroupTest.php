<?php

namespace Tests\Feature;

use App\Entities\Group;
use Tests\TestCase;
use App\Entities\User;

class GroupTest extends TestCase
{
    public function testCreate(): void
    {
        $group = factory(Group::class)->make();

        $response = $this->post('/groups', [
            'name'  => $group->name,
        ]);

        $response
            ->assertStatus(201);

        $response = $this->get('groups');
        $response
            ->assertStatus(200)
            ->assertSee($group->id)
            ->assertSee($group->name);
    }
}
