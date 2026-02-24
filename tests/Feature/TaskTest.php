<?php

namespace Tests\Feature;

use Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Search;
use App\Models\Task;

class TaskTest extends TestCase
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

        Search::factory()->create();
        $task = Task::factory()->create();

        $response = $this->actingAs($user)->post('/task', $task->toArray());

        $attributes = $task->toArray();
        unset($attributes['created_at']);
        unset($attributes['updated_at']);

        $response = $this->assertDatabaseHas('tasks', $attributes);
    }

    public function test_admin_can_delete_task()
    {
        $user = Auth::loginUsingId(1);

        Search::factory()->create();
        $task = Task::factory()->create();

        $response = $this->actingAs($user)->post('/task', $task->toArray());

        $reponse = $this->actingAs($user)->delete(route('deleteTask', $task->id));

        $attributes = $task->toArray();
        unset($attributes['created_at']);
        unset($attributes['updated_at']);

        $response = $this->assertDatabaseMissing('tasks', $attributes);
    }

    public function test_user_cannot_delete_task()
    {
        $user = Auth::loginUsingId(2);

        Search::factory()->create();
        $task = Task::factory()->create();

        $response = $this->actingAs($user)->post('/task', $task->toArray());

        $reponse = $this->actingAs($user)->delete(route('deleteTask', $task->id));

        $attributes = $task->toArray();
        unset($attributes['created_at']);
        unset($attributes['updated_at']);

        $response = $this->assertDatabaseHas('tasks', $attributes);
    }
}
