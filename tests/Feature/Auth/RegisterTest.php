<?php

namespace Tests\Feature\Auth;

use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Any user can view the register form before authenticated.
     *
     * @return void
     */
    public function test_user_can_view_a_register_form()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
}
