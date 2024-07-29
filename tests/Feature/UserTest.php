<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testUserCanRegister()
    // {
    //     $this->withoutExceptionHandling();
    //     $response = $this->post(route('user.register'),[
    //         'name' => 'Test User',
    //         'email' => 'test@example.com',
    //         'password' => 'password',
    //         'password_confirmation' => 'password',
    //     ]);
    //     //$response->dump();
    //     $response->assertStatus(200);
    //     //check whether database has user with email test@example.com
    //     $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
    // }

    public function testUserCanLogin()
    {
        //$user = User::factory()->create(['password' => bcrypt('password')]);
        $this->withoutExceptionHandling();
        
        $response = $this->postJson(route('login'), [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);
        //dd($response->dump());
        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);
        //echo $response;
    }

}
