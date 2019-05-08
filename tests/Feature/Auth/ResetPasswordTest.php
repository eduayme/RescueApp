<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResetPasswordTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Displays the reset password request form.
     *
     * @return void
     */
    public function test_displays_password_reset_request_form()
    {
        $response = $this->get('password/reset');

        $response->assertStatus(200);
    }

    /**
     * Displays the form to reset a password.
     *
     * @return void
     */
    public function test_displays_password_reset_form()
    {
        $response = $this->get('/password/reset/token');

        $response->assertStatus(200);
    }

}
