<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class FileUploadTest extends TestCase
{
    protected $token;

    //automatically called before each test method call
    protected function setUp(): void
    {
        parent::setUp();
        $user = User::factory()->create();
        $this->token = $user->createToken('TestToken')->plainTextToken;
    }
    public function testUserCanUploadImage()
    {
        $this->withoutExceptionHandling();
         
         Storage::fake('local');

         $file = UploadedFile::fake()->image('test.jpg');
 
         $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->postJson(route('upload.image'), [
             'image' => $file,
         ]);
 
         // Assert the response
         $response->assertStatus(200)
                  ->assertJsonStructure(['path']);
 
         // Retrieve the path from the response
         $path = $response->json('path');
         
         Storage::disk('local')->assertExists($path);
    }
}
