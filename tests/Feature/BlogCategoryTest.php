<?php

namespace Tests\Feature;

use Tests\TestCase;
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

    //automatically called before each test method call
    // protected function setUp(): void
    // {
    //     parent::setUp();
    //     $user = User::factory()->create();
    //     $this->token = $user->createToken('TestToken')->plainTextToken;
    // }
    // public function testUserCanReadBlogCategories(){
    //     $this->withoutExceptionHandling();
    //     $response = $this->get('api/get/category',[
    //         'limit'=>null
    //     ]);
    //     $response->assertStatus(200);
    // }
    // public function testUserCanCreateBlogCategory()
    // {
    //     $this->withoutExceptionHandling();
    //     $category = BlogCategory::where('is_deleted',0)->first();
    //     if(!$category){
    //         $response = $this->withHeaders([
    //             'Authorization' => 'Bearer ' . $this->token,
    //         ])->post('/api/create/category',[
    //             'name'=>'test blog Catgerory',
    //         ]);
    //         $response->assertStatus(200);
    //     }
    //     else{
    //         return response()->json(['message'=>'blog already exists']);
    //     }
        
    // }

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
    //     }
    // }

    // public function testUserCanUpdateBlogCategory(){
    //     $this->withoutExceptionHandling();
    //     $category = BlogCategory::where('is_deleted',0)->first();
    //     $response = $this->withHeaders([
    //         'Authorization' => 'Bearer ' . $this->token,
    //     ])->post("/api/update/category/{$category->id}",[
    //         'name'=>'test1 blog',
    //     ]);
    //     $response->assertStatus(200);
    // }

    // public function testUserCanDeleteBlogCategory(){
    //     $this->withoutExceptionHandling();
    //     $category = BlogCategory::where('is_deleted',0)->first();
    //     $response = $this->withHeaders([
    //         'Authorization' => 'Bearer ' . $this->token,
    //     ])->post("/api/delete/category/{$category->id}");
    //     $response->assertStatus(200);
    // }
}
