<?php

namespace Tests\Feature;

use Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskCreationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_user_can_create_task()
    {
        $user = Auth::loginUsingId(2);
        
        factory('App\Search')->create();
        $task = factory('App\Task')->create();

        $response = $this->actingAs($user)->post('/task', $task->toArray());

        $response = $this->assertDatabaseHas('tasks', $task->toArray());
    }

    public function test_admin_can_delete_task()
    {
        $user = Auth::loginUsingId(1);

        factory('App\Search')->create();
        $task = factory('App\Task')->create();

        $response = $this->actingAs($user)->post('/task', $task->toArray());

        $reponse = $this->actingAs($user)->delete(route('deleteTask', $task->id));

        $response = $this->assertDatabaseMissing('tasks', $task->toArray());
    }

    public function test_user_cannot_delete_task()
    {
        $user = Auth::loginUsingId(2);

        factory('App\Search')->create();
        $task = factory('App\Task')->create();

        $response = $this->actingAs($user)->post('/task', $task->toArray());

        $reponse = $this->actingAs($user)->delete(route('deleteTask', $task->id));

        $response = $this->assertDatabaseHas('tasks', $task->toArray());
    }
}
