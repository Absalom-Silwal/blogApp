<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Blog;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogCrudTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    protected $token;
    protected $faker;

    //automatically called before each test method call
    protected function setUp(): void
    {
        parent::setUp();
        $user = User::factory()->create();
        $this->token = $user->createToken('TestToken')->plainTextToken;
        $this->faker = Faker::create();
    }
    public function testUserCanCreateBlog()
    {
        $this->withoutExceptionHandling();    
        Storage::fake('public');
        $file = UploadedFile::fake()->image($this->faker->word.'.jpg');
        $title = $this->faker->sentence;
        $body = $this->faker->paragraph;
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->post('/api/create/blog',[
            'title'=>$title,
            'body'=>$body,
            'image'=>$file
        ]);
       
        $response->assertStatus(200);
        $this->assertDatabaseHas('blogs',[
            'title'=>$title,
            'body'=>$body
        ]);
        
    }

    public function testUserCanReadBlogs(){
        $this->withoutExceptionHandling();
        $response=$this->getJson('/api/get/blog',[
            'limit'=>5
        ]);
        //dd($response);
        $response->assertStatus(200);
    }

    public function testUserCanUpdateBlog(){
        $this->withoutExceptionHandling();
        $blog = Blog::where('is_deleted',0)->first();
        Storage::fake('public');
        $file = UploadedFile::fake()->image($this->faker->word.'.jpg');
        $title = $this->faker->sentence;
        $body = $this->faker->paragraph;
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->post("/api/update/blog/{$blog->id}",[
            'name'=>$title,
            'body'=>$body,
            'image'=>$file
        ]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('blogs',[
            'title'=>$title,
            'body'=>$body
        ]);
    }

    public function testUserCanDeleteBlog(){
        $this->withoutExceptionHandling();
        $blog = Blog::where('is_deleted',0)->first();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->post("/api/delete/blog/{$blog->id}");
        $response->assertStatus(200);
        $this->assertDatabaseHas('blogs',[
            'title'=>$blog->title,
            'body'=>$blog->body,
            'is_deleted'=>1
        ]);
    }
}
