<?php

namespace Tests\Feature\Auth;

use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Any user can view the register form before authenticated.
     *
     * @return void
     */
    public function test_user_can_view_a_register_form()
    {
        $response = $this->get('/register');

        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    /**
     * A valid user can be registered.
     *
     * @return void
     */
    public function test_register_a_valid_user()
    {
        $user = factory(User::class)->make();

        $response = $this->post('register', [
          'name'                   => $user->name,
          'email'                  => $user->email,
          'dni'                    => '41588985H',
          'profile'                => 'firefighter',
          'password'               => 'secret',
          'password_confirmation'  => 'secret',
      ]);

        $response->assertStatus(302);
        //$this->assertAuthenticated();
    }

    /**
     * An invalid user can not be registered.
     *
     * @return void
     */
    public function test_register_an_invalid_user()
    {
        $user = factory(User::class)->make();

        $response = $this->post('/register', [
            'email'                 => $user->email,
            'password'              => 'secret',
            'password_confirmation' => 'incorrect',
        ]);

        $response->assertSessionHasErrors();
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $this->assertCount(0, $users = User::all());
        $this->assertGuest();
    }
}
