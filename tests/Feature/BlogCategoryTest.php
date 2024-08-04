<?php

namespace Tests\Feature;

use Tests\TestCase;
use Faker\Factory as Faker;
use App\Models\Blog;
use App\Models\User;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogCategoryTest extends TestCase
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
   
    public function testUserCanCreateBlogCategory()
    {
        $this->withoutExceptionHandling();
        $blog_name = $this->faker->word;
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->post('/api/create/category',[
            'name'=>$blog_name,
        ]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('blog_categories',[
            'name'=>$blog_name
        ]);
        
    }
    public function testUserCanReadBlogCategories(){
        $this->withoutExceptionHandling();
        $response = $this->get('api/get/category',[
            'limit'=>null
        ]);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
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

    // public function testUserCanAssignBlogCategory(){
    //     $category = BlogCategory::where('is_deleted',0)->first();
    //     $blog = Blog::where('is_deleted',0)->first();
    //     if($category){
    //         $response = $this->withHeaders([
    //             'Authorization' => 'Bearer ' . $this->token,
    //         ])->post("/api/assign/category-to/{$blog->id}",[
    //             'category' => $category->id
    //         ]);
    //         $response->assertStatus(200);
    //         $this->assertDatabaseHas('blogs',[
    //             'title'=>$blog->title,
    //             'body'=>$blog->body,
    //             'category_id' => $category->id
    //         ]);
    //     }
    // }

    public function testUserCanUpdateBlogCategory(){
        $this->withoutExceptionHandling();
        $category = BlogCategory::where('is_deleted',0)->first();
        $blog_name = $this->faker->word;
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->post("/api/update/category/{$category->id}",[
            'name'=>$blog_name,
        ]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('blog_categories',[
            'name'=>$blog_name
        ]);
    }

    public function testUserCanDeleteBlogCategory(){
        $this->withoutExceptionHandling();
        $category = BlogCategory::where('is_deleted',0)->first();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->post("/api/delete/category/{$category->id}");
        $response->assertStatus(200);
        $this->assertDatabaseHas('blog_categories',[
            'id'=> $category->id,
            'is_deleted'=>1
        ]);
    }
}
