<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Blog;
use App\Models\User;
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

    //automatically called before each test method call
    protected function setUp(): void
    {
        parent::setUp();
        $user = User::factory()->create();
        $this->token = $user->createToken('TestToken')->plainTextToken;
    }
    public function testUserCanCreateBlog()
    {
        $this->withoutExceptionHandling();
        $blog = Blog::where('is_deleted',0)->first();
        if(!$blog){
            Storage::fake('public');
            $file = UploadedFile::fake()->image('test.jpg');
            $response = $this->withHeaders([
                'Authorization' => 'Bearer ' . $this->token,
            ])->post('/api/create/blog',[
                'name'=>'test blog',
                'body'=>'test body',
                'image'=>$file
            ]);
            $response->assertStatus(200);
        }
        else{
            return response()->json(['message'=>'blog already exists']);
        }
        
    }

    public function testUserCanUpdateBlog(){
        $this->withoutExceptionHandling();
        $blog = Blog::where('is_deleted',0)->first();
        Storage::fake('public');
        $file = UploadedFile::fake()->image('test.jpg');
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->post("/api/update/blog/{$blog->id}",[
            'name'=>'test1 blog',
            'body'=>'test1 body',
            'image'=>$file
        ]);
        $response->assertStatus(200);
    }

    public function testUserCanDeleteBlog(){
        $this->withoutExceptionHandling();
        $blog = Blog::where('is_deleted',0)->first();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->post("/api/delete/blog/{$blog->id}");
        $response->assertStatus(200);
    }
}
