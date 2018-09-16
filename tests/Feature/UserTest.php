<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Entities\User;

class UserTest extends TestCase
{
    public function testRegister(): void
    {
        $user = factory(User::class)->make();

        $response = $this->post('users', [
            'email'      => $user->email,
            'last_name'  => $user->last_name,
            'first_name' => $user->first_name,
            'state'      => $user->state,
            'group_id'   => $user->group_id
        ]);

        $response
            ->assertStatus(201)
            ->assertJson(['Registration' => 'success']);

        $response = $this->get('users');
        $response
            ->assertStatus(200)
            ->assertSee($user->id)
            ->assertSee($user->email)
            ->assertSee($user->last_name)
            ->assertSee($user->first_name);
    }
}
