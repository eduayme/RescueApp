<?php

namespace Tests\Feature\Auth;

use App\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
    use RefreshDatabase;

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

    /**
     * Return a valid token for the user.
     *
     * @return valid_token
     */
    protected function get_valid_token($user)
    {
        return Password::broker()->createToken($user);
    }

    /**
     * Return an invalid token.
     *
     * @return invalid_token
     */
    protected function get_invalid_token()
    {
        return 'invalid-token';
    }

    /**
     * Return the password reset route.
     *
     * @return route
     */
    protected function password_reset_get_route($token)
    {
        return route('password.reset', $token);
    }

    /**
     * Return the url route for password reset throw post.
     *
     * @return url
     */
    protected function password_reset_post_route()
    {
        return '/password/reset';
    }

    /**
     * Return the reset route after successful password.
     *
     * @return route
     */
    protected function successful_password_reset_route()
    {
        return route('index');
    }

    /**
     * Return the guest middleware route.
     *
     * @return route
     */
    protected function guest_middleware_route()
    {
        return route('index');
    }

    /**
     * Users can see the reset password form before authenticated.
     *
     * @return route
     */
    public function test_user_can_view_a_password_reset_form()
    {
        $user = factory(User::class)->create();

        $response = $this->get(
            $this->password_reset_get_route(
                $token = $this->get_valid_token($user)
            )
        );

        $response->assertSuccessful();
        $response->assertViewIs('auth.passwords.reset');
        $response->assertViewHas('token', $token);
    }

    /**
     * Users can not see the reset password after authenticated.
     *
     * @return route
     */
    public function test_user_can_not_view_a_password_reset_form_when_authenticated()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(
            $this->password_reset_get_route(
                $token = $this->get_valid_token($user)
            )
        );

        $response->assertRedirect($this->guest_middleware_route());
    }

    /**
     * Users can reset the password with a valid token.
     *
     * @return route
     */
    public function test_user_can_reset_password_with_valid_token()
    {
        Event::fake();

        $user = factory(User::class)->create();

        $response = $this->post($this->password_reset_post_route(), [
            'token'                 => $this->get_valid_token($user),
            'email'                 => $user->email,
            'password'              => 'new-awesome-password',
            'password_confirmation' => 'new-awesome-password',
        ]);

        $response->assertRedirect($this->successful_password_reset_route());

        $this->assertEquals($user->email, $user->fresh()->email);
        $this->assertTrue(Hash::check('new-awesome-password', $user->fresh()->password));
        $this->assertAuthenticatedAs($user);

        Event::assertDispatched(PasswordReset::class, function ($e) use ($user) {
            return $e->user->id === $user->id;
        });
    }

    /**
     * Users can not reset the password with an invalid token.
     *
     * @return route
     */
    public function test_user_can_not_reset_password_with_invalid_token()
    {
        $user = factory(User::class)->create([
            'password' => Hash::make('old-password'),
        ]);

        $response = $this->from($this->password_reset_get_route($this->get_invalid_token()))->post($this->password_reset_post_route(), [
            'token'                 => $this->get_invalid_token($user),
            'email'                 => $user->email,
            'password'              => 'new-awesome-password',
            'password_confirmation' => 'new-awesome-password',
        ]);

        $response->assertRedirect($this->password_reset_get_route(
            $this->get_invalid_token()
        ));

        $this->assertEquals($user->email, $user->fresh()->email);
        $this->assertTrue(Hash::check('old-password', $user->fresh()->password));
        $this->assertGuest();
    }

    /**
     * Users can not reset the password without providing a new different password.
     *
     * @return route
     */
    public function test_user_can_not_reset_password_without_providing_a_new_password()
    {
        $user = factory(User::class)->create([
            'password' => Hash::make('old-password'),
        ]);

        $response = $this->from($this->password_reset_get_route($token = $this->get_valid_token($user)))->post($this->password_reset_post_route(), [
            'token'                 => $token,
            'email'                 => $user->email,
            'password'              => '',
            'password_confirmation' => '',
        ]);

        $response->assertRedirect($this->password_reset_get_route($token));
        $response->assertSessionHasErrors('password');

        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertEquals($user->email, $user->fresh()->email);
        $this->assertTrue(Hash::check('old-password', $user->fresh()->password));
        $this->assertGuest();
    }

    /**
     * Users can not reset the password without providing the email.
     *
     * @return route
     */
    public function test_user_can_not_reset_password_without_providing_an_email()
    {
        $user = factory(User::class)->create([
            'password' => Hash::make('old-password'),
        ]);

        $response = $this->from($this->password_reset_get_route($token = $this->get_valid_token($user)))->post($this->password_reset_post_route(), [
            'token'                 => $token,
            'email'                 => '',
            'password'              => 'new-awesome-password',
            'password_confirmation' => 'new-awesome-password',
        ]);

        $response->assertRedirect($this->password_reset_get_route($token));
        $response->assertSessionHasErrors('email');

        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertEquals($user->email, $user->fresh()->email);
        $this->assertTrue(Hash::check('old-password', $user->fresh()->password));
        $this->assertGuest();
    }
}
