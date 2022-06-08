<?php

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic user create test .
     *
     * @test
     * @return void
     */
    public function userCreateTest()
    {
        $new_user = User::create([
            'name'     => "Amirali Bagheri",
            'email'    => "amirali@gmail.com",
            'password' => "1234567890",
        ]);

        $this->assertEquals("Amirali Bagheri", $new_user->name);
    }
}
