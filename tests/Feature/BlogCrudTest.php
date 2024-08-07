<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Blog;
use App\Models\User;
use Faker\Factory as Faker;
use App\Models\BlogCategory;
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
        $category = BlogCategory::where('is_deleted',0)->first();   
        Storage::fake('public');
        $file = UploadedFile::fake()->image($this->faker->word.'.jpg');
        $title = $this->faker->sentence;
        $body = $this->faker->paragraph;
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->post('/api/create/blog',[
            'title'=>$title,
            'body'=>$body,
            'image'=>$file,
            'category_id'=>$category?$category->id:null 
        ]);
       
        $response->assertStatus(200);
        $this->assertDatabaseHas('blogs',[
            'title'=>$title,
            'body'=>$body
        ]);
        
    }

    public function testUserCanReadBlogs(){
        $this->withoutExceptionHandling();
        $category = BlogCategory::where('is_deleted',0)->first(); 
        $response=$this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->getJson('/api/get/blog',[
            'limit'=>5,
            'search'=>'abcd',
            'category'=>$category?$category->id:""
        ]);
        //dd($response);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'title',
                    'body',
                    'blog_image',
                    'created_at',
                    'updated_at'
                ]
            ],
            
            'current_page',
            'from',
            'last_page',
            'per_page',
            'to',
            'total',
            'links' => [ 
                [
                'url',
                'label',
                'active',
                ],
            ]
        ]);
    }

    public function testUserCanViewBlog(){
        $blog = Blog::where('is_deleted',0)->first(); 
        $response=$this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->get("/api/view/blog/{$blog->id}");

        $response->assertStatus(200);
        
        $response->assertJsonStructure([
            'title',
            'body',
            'blog_image',
            'created_at',
            'updated_at'  
        ]);
    }

    public function testUserCanUpdateBlog(){
        $this->withoutExceptionHandling();
        $blog = Blog::where('is_deleted',0)->first();
        $category = BlogCategory::where('is_deleted',0)->first();   
        Storage::fake('public');
        $file = UploadedFile::fake()->image($this->faker->word.'.jpg');
        $title = $this->faker->sentence;
        $body = $this->faker->paragraph;
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->put("/api/update/blog/{$blog->id}",[
            'title'=>$title,
            'body'=>$body,
            'image'=>$file,
            'category_id'=> $category?$category->id:null
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
        ])->delete("/api/delete/blog/{$blog->id}");
        $response->assertStatus(200);
        $this->assertDatabaseHas('blogs',[
            'title'=>$blog->title,
            'body'=>$blog->body,
            'is_deleted'=>1
        ]);
    }
}
