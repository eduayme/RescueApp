<?php

namespace Tests\Feature;

use App\Activity;
use App\User;
use Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActivityTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Only admins can view the activity logs.
     *
     * @test
     *
     * @return void
     */
    public function only_admin_can_view_activity_logs()
    {
        $user = Auth::loginUsingId(1);
        $response = $this->actingAs($user)->get(route('activities'));
        $response->assertStatus(200);
    }

    /** Guest cannot view activity logs.
     * @test
     */
    public function guest_cannot_visit_the_activity_logs_link_and_will_be_redirected()
    {
        $user = Auth::loginUsingId(2);
        $response = $this->actingAs($user)->get(route('index'));
        $response = $this->actingAs($user)->get(route('activities'));
        $response->assertRedirect(route('index'));
        $response->assertStatus(302);
        $response->assertSessionHas('error', __('messages.not_allowed'));
    }

    /**
     * If user is not Admin he cannot delete the logs.
     *
     * @test
     * */
    public function guest_cannot_delete_logs_and_should_be_redirected_with_error()
    {
        $user = Auth::loginUsingId(2);
        $response = $this->actingAs($user)->get(route('index'));
        $response = $this->actingAs($user)->get(route('activities_delete_all'));
        $response->assertRedirect(route('index'));
        $response->assertStatus(302);
        $response->assertSessionHas('error', __('messages.not_allowed'));
    }

    /**
     * If user is admin he can delete the logs.
     *
     * @test */
    public function admin_can_delete_the_logs_and_returns_success_message()
    {
        $user = Auth::loginUsingId(1);
        $response = $this->actingAs($user)->get(route('index'));
        $response = $this->actingAs($user)->get(route('activities_delete_all'));
        $response->assertStatus(302);
        $response->assertSessionHas('error', __('main.activity_log').__('messages.deleted'));
    }
}
