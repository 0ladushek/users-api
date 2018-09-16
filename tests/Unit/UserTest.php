<?php

namespace Tests\Unit;

use App\Entities\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A create user test.
     *
     * @return void
     */
    public function testRegisterTest()
    {
        $user = User::register(
            $email      = 'test@mail.com',
            $lastName   = 'Neil',
            $firstName  = 'Alden',
            $state      = 'active',
            $groupId    = 1
        );

        self::assertNotEmpty($user);
        self::assertEquals($user->email, $email);
        self::assertEquals($user->last_name, $lastName);
        self::assertEquals($user->first_name, $firstName);
        self::assertEquals($user->state, $state);
        self::assertEquals($user->group_id, $groupId);

        self::assertNotEmpty($user->creation_date);
    }
}
