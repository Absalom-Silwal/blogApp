<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserCanRegister()
    {
        $this->withoutExceptionHandling();
        $faker = Faker::create();
        $name = $faker->name;
        $email = $faker->email;
        $password = $faker->password;
        //dd($name,$email,$password);
        $response = $this->post(route('register'),[
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,
        ]);
        //$response->dump();
        $response->assertStatus(200);
        //check whether database has user with email test@example.com
        $this->assertDatabaseHas('users', [
            'email' => $email,
            'name'=>$name
            ]
        );
    }

    public function testUserCanLogin()
    {
        $user = User::factory()->create(['password' => bcrypt('password')]);
        
        $this->withoutExceptionHandling();
        
        $response = $this->postJson(route('login'), [
            'email' => $user->email,
            'password' => 'password',
        ]);
        //dd($response->dump());
        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);
        //echo $response;
    }

}
