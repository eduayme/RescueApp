<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Any user can view the login form before authenticated
     *
     * @return void
     */
    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /**
     * A valid user can not view the login form when authenticated
     *
     * @return void
     */
    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = factory(User::class)->make();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/');
        $response->assertStatus(302);
    }

    /**
     * A valid user can login with valid credentials
     *
     * @return void
     */
    public function test_user_can_login_with_valid_credentials()
    {
        $user = factory(User::class)->make();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $user->password
        ]);

        $response->assertRedirect('/');
        $response->assertStatus(302);
    }

    /**
     * A logged in user can be logged out.
     *
     * @return void
     */
    public function test_logout_authenticated_user()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
    }

}
