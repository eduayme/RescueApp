<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Any user can view the register form before authenticated
     *
     * @return void
     */
    public function test_user_can_view_a_register_form()
    {
        $response = $this->get('/register');
        
        $response->assertStatus(200);
    }
}
