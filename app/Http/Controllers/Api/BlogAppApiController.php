<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Factories\ServiceFactory;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use OpenApi\Annotations as OA;
/**
 * @OA\Info(
 *      version="1.0.0",
 *      x={
 *          "logo": {
 *              "url": "https://via.placeholder.com/190x90.png?text=L5-Swagger"
 *          }
 *      },
 *      title="L5 OpenApi",
 *      description="L5 Swagger OpenApi description",
 *      @OA\Contact(
 *          email="darius@matulionis.lt"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="https://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */
class BlogAppApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @OA\Get(
     *     path="/api/view/blog/{id}",
     *     summary="Retrieve a single blog post by ID",
     *     tags={"Blog"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the blog post to retrieve",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully retrieved the blog post",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="title",
     *                 type="string",
     *                 description="Title of the blog post",
     *                 example="Sample Blog Title"
     *             ),
     *             @OA\Property(
     *                 property="body",
     *                 type="string",
     *                 description="Body content of the blog post",
     *                 example="This is the body of the blog post."
     *             ),
     *             @OA\Property(
     *                 property="blog_image",
     *                 type="string",
     *                 description="URL of the blog post image",
     *                 example="http://example.com/image.jpg"
     *             ),
     *             @OA\Property(
     *                 property="created_at",
     *                 type="string",
     *                 format="date-time",
     *                 description="Timestamp when the blog post was created",
     *                 example="2024-08-03T12:00:00Z"
     *             ),
     *             @OA\Property(
     *                 property="updated_at",
     *                 type="string",
     *                 format="date-time",
     *                 description="Timestamp when the blog post was last updated",
     *                 example="2024-08-03T12:00:00Z"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 description="Error message",
     *                 example="Unauthorized access"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Blog post not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 description="Error message",
     *                 example="Blog post not found"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 description="Error message",
     *                 example="Something went wrong"
     *             )
     *         )
     *     )
     * )
     */
    public function view($type,$id){
        $service = $this->getService($type);
        return  $service->view($id);
    }

    /**
     * @OA\Post(
     *     path="/api/create/blog",
     *     summary="Create a new blog post",
     *     tags={"Blog"},
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *      *           required={"title", "body"},
     *                 @OA\Property(
     *                     property="title",
     *                     type="string",
     *                     description="Title of the blog post",
     *                     example="A Sample Blog Post"
     *                 ),
     *                 @OA\Property(
     *                     property="body",
     *                     type="string",
     *                     description="Body content of the blog post",
     *                     example="This is the body of the blog post."
     *                 ),
     *                 @OA\Property(
     *                     property="image",
     *                     type="string",
     *                     format="binary",
     *                     description="Image file for the blog post"
     *                 ),
     *                 @OA\Property(
     *                     property="category_id",
     *                     type="integer",
     *                     description="ID of the blog category",
     *                     example=1
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Blog created sucessfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="id",
     *                         type="integer",
     *                         description="ID of the blog post",
     *                         example=1
     *                     ),
     *                     @OA\Property(
     *                         property="title",
     *                         type="string",
     *                         description="Title of the blog post",
     *                         example="Sample Blog Title"
     *                     ),
     *                     @OA\Property(
     *                         property="body",
     *                         type="string",
     *                         description="Body content of the blog post",
     *                         example="This is the body of the blog post."
     *                     ),
     *                     @OA\Property(
     *                         property="blog_image",
     *                         type="string",
     *                         description="URL of the blog post image",
     *                         example="http://example.com/image.jpg"
     *                     ),
     *                     @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                         format="date-time",
     *                         description="Timestamp when the blog post was created",
     *                         example="2024-08-03T12:00:00Z"
     *                     ),
     *                     @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                         format="date-time",
     *                         description="Timestamp when the blog post was last updated",
     *                         example="2024-08-03T12:00:00Z"
     *                     )
     *                 )
     *             ),
     *             @OA\Property(
     *                 property="current_page",
     *                 type="integer",
     *                 description="Current page number",
     *                 example=1
     *             ),
     *             @OA\Property(
     *                 property="from",
     *                 type="integer",
     *                 description="Starting index of the current page",
     *                 example=1
     *             ),
     *             @OA\Property(
     *                 property="last_page",
     *                 type="integer",
     *                 description="Last page number",
     *                 example=10
     *             ),
     *             @OA\Property(
     *                 property="per_page",
     *                 type="integer",
     *                 description="Number of items per page",
     *                 example=5
     *             ),
     *             @OA\Property(
     *                 property="to",
     *                 type="integer",
     *                 description="Ending index of the current page",
     *                 example=5
     *             ),
     *             @OA\Property(
     *                 property="total",
     *                 type="integer",
     *                 description="Total number of items",
     *                 example=50
     *             ),
     *             @OA\Property(
     *                 property="links",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="url",
     *                         type="string",
     *                         description="URL of the pagination link",
     *                         example="http://example.com/api/get/blog?page=2"
     *                     ),
     *                     @OA\Property(
     *                         property="label",
     *                         type="string",
     *                         description="Label of the pagination link",
     *                         example="Next"
     *                     ),
     *                     @OA\Property(
     *                         property="active",
     *                         type="boolean",
     *                         description="Indicates if the link is for the current page",
     *                         example=true
     *                     )
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 description="Error message",
     *                 example="Unauthorized access"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation Error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 description="Error message",
     *                 example="The title field is required."
     *             ),
     *             @OA\Property(
     *                 property="errors",
     *                 type="object",
     *                 additionalProperties={"type": "array", "items": {"type": "string"}},
     *                 description="Validation errors"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 description="Error message",
     *                 example="Something went wrong"
     *             )
     *         )
     *     )
     * )
     */

    public function create(Request $request,$type){
        $service = $this->getService($type);
        return $service->create($request);
        
    }


    /**
     * @OA\Get(
     *     path="/api/get/blog",
     *     summary="Retrieve a paginated and filtered list of blogs",
     *     tags={"Blog"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="limit",
     *         in="query",
     *         description="Number of blog posts to return per page",
     *         required=false,
     *         @OA\Schema(type="integer", example=5)
     *     ),
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Search term to filter blog posts by title or body",
     *         required=false,
     *         @OA\Schema(type="string", example="abcd")
     *     ),
     *     @OA\Parameter(
     *         name="category",
     *         in="query",
     *         description="Filter blog posts by category ID",
     *         required=false,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully retrieved paginated list of blogs",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="id",
     *                         type="integer",
     *                         description="ID of the blog post",
     *                         example=1
     *                     ),
     *                     @OA\Property(
     *                         property="title",
     *                         type="string",
     *                         description="Title of the blog post",
     *                         example="Sample Blog Title"
     *                     ),
     *                     @OA\Property(
     *                         property="body",
     *                         type="string",
     *                         description="Body content of the blog post",
     *                         example="This is the body of the blog post."
     *                     ),
     *                     @OA\Property(
     *                         property="blog_image",
     *                         type="string",
     *                         description="URL of the blog post image",
     *                         example="http://example.com/image.jpg"
     *                     ),
     *                     @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                         format="date-time",
     *                         description="Timestamp when the blog post was created",
     *                         example="2024-08-03T12:00:00Z"
     *                     ),
     *                     @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                         format="date-time",
     *                         description="Timestamp when the blog post was last updated",
     *                         example="2024-08-03T12:00:00Z"
     *                     )
     *                 )
     *             ),
     *             @OA\Property(
     *                 property="current_page",
     *                 type="integer",
     *                 description="Current page number",
     *                 example=1
     *             ),
     *             @OA\Property(
     *                 property="from",
     *                 type="integer",
     *                 description="Starting index of the current page",
     *                 example=1
     *             ),
     *             @OA\Property(
     *                 property="last_page",
     *                 type="integer",
     *                 description="Last page number",
     *                 example=10
     *             ),
     *             @OA\Property(
     *                 property="per_page",
     *                 type="integer",
     *                 description="Number of items per page",
     *                 example=5
     *             ),
     *             @OA\Property(
     *                 property="to",
     *                 type="integer",
     *                 description="Ending index of the current page",
     *                 example=5
     *             ),
     *             @OA\Property(
     *                 property="total",
     *                 type="integer",
     *                 description="Total number of items",
     *                 example=50
     *             ),
     *             @OA\Property(
     *                 property="links",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="url",
     *                         type="string",
     *                         description="URL of the pagination link",
     *                         example="http://example.com/api/get/blog?page=2"
     *                     ),
     *                     @OA\Property(
     *                         property="label",
     *                         type="string",
     *                         description="Label of the pagination link",
     *                         example="Next"
     *                     ),
     *                     @OA\Property(
     *                         property="active",
     *                         type="boolean",
     *                         description="Indicates if the link is for the current page",
     *                         example=true
     *                     )
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 description="Error message",
     *                 example="Unauthorized access"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 description="Error message",
     *                 example="Something went wrong"
     *             )
     *         )
     *     )
     * )
     */

    public function get(Request $request,$type){
        $service=$this->getService($type);
        return $service->get($request);
    }

        /**
     * @OA\Put(
     *     path="/api/update/blog/{id}",
     *     summary="Update a blog post",
     *     tags={"Blog"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the blog post to update",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                  required={"title", "body"},
     *                 @OA\Property(
     *                     property="title",
     *                     type="string",
     *                     description="Title of the blog post",
     *                     example="Updated Blog Title"
     *                 ),
     *                 @OA\Property(
     *                     property="body",
     *                     type="string",
     *                     description="Body content of the blog post",
     *                     example="This is the updated body content."
     *                 ),
     *                 @OA\Property(
     *                     property="image",
     *                     type="string",
     *                     format="binary",
     *                     description="Updated image file for the blog post"
     *                 ),
     *                 @OA\Property(
     *                     property="category_id",
     *                     type="integer",
     *                     description="ID of the blog category",
     *                     example=1
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Blog updated sucessfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="id",
     *                         type="integer",
     *                         description="ID of the blog post",
     *                         example=1
     *                     ),
     *                     @OA\Property(
     *                         property="title",
     *                         type="string",
     *                         description="Title of the blog post",
     *                         example="Sample Blog Title"
     *                     ),
     *                     @OA\Property(
     *                         property="body",
     *                         type="string",
     *                         description="Body content of the blog post",
     *                         example="This is the body of the blog post."
     *                     ),
     *                     @OA\Property(
     *                         property="blog_image",
     *                         type="string",
     *                         description="URL of the blog post image",
     *                         example="http://example.com/image.jpg"
     *                     ),
     *                     @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                         format="date-time",
     *                         description="Timestamp when the blog post was created",
     *                         example="2024-08-03T12:00:00Z"
     *                     ),
     *                     @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                         format="date-time",
     *                         description="Timestamp when the blog post was last updated",
     *                         example="2024-08-03T12:00:00Z"
     *                     )
     *                 )
     *             ),
     *             @OA\Property(
     *                 property="current_page",
     *                 type="integer",
     *                 description="Current page number",
     *                 example=1
     *             ),
     *             @OA\Property(
     *                 property="from",
     *                 type="integer",
     *                 description="Starting index of the current page",
     *                 example=1
     *             ),
     *             @OA\Property(
     *                 property="last_page",
     *                 type="integer",
     *                 description="Last page number",
     *                 example=10
     *             ),
     *             @OA\Property(
     *                 property="per_page",
     *                 type="integer",
     *                 description="Number of items per page",
     *                 example=5
     *             ),
     *             @OA\Property(
     *                 property="to",
     *                 type="integer",
     *                 description="Ending index of the current page",
     *                 example=5
     *             ),
     *             @OA\Property(
     *                 property="total",
     *                 type="integer",
     *                 description="Total number of items",
     *                 example=50
     *             ),
     *             @OA\Property(
     *                 property="links",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="url",
     *                         type="string",
     *                         description="URL of the pagination link",
     *                         example="http://example.com/api/get/blog?page=2"
     *                     ),
     *                     @OA\Property(
     *                         property="label",
     *                         type="string",
     *                         description="Label of the pagination link",
     *                         example="Next"
     *                     ),
     *                     @OA\Property(
     *                         property="active",
     *                         type="boolean",
     *                         description="Indicates if the link is for the current page",
     *                         example=true
     *                     )
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad Request",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 description="Error message",
     *                 example="Invalid data provided"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 description="Error message",
     *                 example="Unauthorized access"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Blog post not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 description="Error message",
     *                 example="Blog post not found"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 description="Error message",
     *                 example="Something went wrong"
     *             )
     *         )
     *     )
     * )
     */

    public function update(Request $request,$type,int $id){
        
        $service = $this->getService($type);
        return $service->update($id,$request);
    }

       /**
     * @OA\Delete(
     *     path="/api/delete/blog/{id}",
     *     summary="Delete a blog post",
     *     tags={"Blog"},
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the blog post to delete",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successfully retrieved paginated list of blogs",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="data",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="id",
     *                         type="integer",
     *                         description="ID of the blog post",
     *                         example=1
     *                     ),
     *                     @OA\Property(
     *                         property="title",
     *                         type="string",
     *                         description="Title of the blog post",
     *                         example="Sample Blog Title"
     *                     ),
     *                     @OA\Property(
     *                         property="body",
     *                         type="string",
     *                         description="Body content of the blog post",
     *                         example="This is the body of the blog post."
     *                     ),
     *                     @OA\Property(
     *                         property="blog_image",
     *                         type="string",
     *                         description="URL of the blog post image",
     *                         example="http://example.com/image.jpg"
     *                     ),
     *                     @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                         format="date-time",
     *                         description="Timestamp when the blog post was created",
     *                         example="2024-08-03T12:00:00Z"
     *                     ),
     *                     @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                         format="date-time",
     *                         description="Timestamp when the blog post was last updated",
     *                         example="2024-08-03T12:00:00Z"
     *                     )
     *                 )
     *             ),
     *             @OA\Property(
     *                 property="current_page",
     *                 type="integer",
     *                 description="Current page number",
     *                 example=1
     *             ),
     *             @OA\Property(
     *                 property="from",
     *                 type="integer",
     *                 description="Starting index of the current page",
     *                 example=1
     *             ),
     *             @OA\Property(
     *                 property="last_page",
     *                 type="integer",
     *                 description="Last page number",
     *                 example=10
     *             ),
     *             @OA\Property(
     *                 property="per_page",
     *                 type="integer",
     *                 description="Number of items per page",
     *                 example=5
     *             ),
     *             @OA\Property(
     *                 property="to",
     *                 type="integer",
     *                 description="Ending index of the current page",
     *                 example=5
     *             ),
     *             @OA\Property(
     *                 property="total",
     *                 type="integer",
     *                 description="Total number of items",
     *                 example=50
     *             ),
     *             @OA\Property(
     *                 property="links",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="url",
     *                         type="string",
     *                         description="URL of the pagination link",
     *                         example="http://example.com/api/get/blog?page=2"
     *                     ),
     *                     @OA\Property(
     *                         property="label",
     *                         type="string",
     *                         description="Label of the pagination link",
     *                         example="Next"
     *                     ),
     *                     @OA\Property(
     *                         property="active",
     *                         type="boolean",
     *                         description="Indicates if the link is for the current page",
     *                         example=true
     *                     )
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 description="Error message",
     *                 example="Unauthorized access"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Blog post not found",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 description="Error message",
     *                 example="Blog post not found"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal Server Error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 description="Error message",
     *                 example="Something went wrong"
     *             )
     *         )
     *     )
     * )
     */

    public function delete(Request $request,$type,$id){
        $service = $this->getService($type);
        $resp = $service->delete($request,$id);
        return $resp;
    }


 /**
     * @OA\Post(
     *     path="/api/register",
     *     summary="Register a new user",
     *     tags={"User"},
     *     @OA\RequestBody(
     *         required=true,
     *             @OA\JsonContent(
     *                 type="object",
     *                 required={"name", "email", "password", "password_confirmation"},
     *                 @OA\Property(
     *                     property="name",
     *                     type="string",
     *                     description="User's full name",
     *                     maxLength=255
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string",
     *                     format="email",
     *                     description="User's email address",
     *                     maxLength=255
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string",
     *                     format="password",
     *                     description="User's password"
     *                 ),
     *                 @OA\Property(
     *                     property="password_confirmation",
     *                     type="string",
     *                     format="password",
     *                     description="Confirmation of the user's password"
     *                 )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User registered successfully",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="id",
     *                 type="integer",
     *                 description="The user's ID"
     *             ),
     *             @OA\Property(
     *                 property="name",
     *                 type="string",
     *                 description="The user's name"
     *             ),
     *             @OA\Property(
     *                 property="email",
     *                 type="string",
     *                 format="email",
     *                 description="The user's email address"
     *             ),
     *             @OA\Property(
     *                 property="created_at",
     *                 type="string",
     *                 format="date-time",
     *                 description="Timestamp when the user was created"
     *             ),
     *             @OA\Property(
     *                 property="updated_at",
     *                 type="string",
     *                 format="date-time",
     *                 description="Timestamp when the user was last updated"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 description="Error message"
     *             ),
     *             @OA\Property(
     *                 property="errors",
     *                 type="object",
     *                 additionalProperties={
     *                     "type":"array",
     *                     "items":{"type":"string"}
     *                 },
     *                 description="Validation errors"
     *             )
     *         )
     *     )
     * )
     */


    public function register(Request $request){
        $type='auth';
        $service = $this->getService($type);
        return $service->register($request);
    }

   /**
     * @OA\Post(
     *     path="/api/login",
     *     summary="User login",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *             @OA\JsonContent(
     *                 type="object",
     *                 required={"email", "password"},
     *                 @OA\Property(
     *                     property="email",
     *                     type="string",
     *                     format="email",
     *                     description="User's email address",
     *                     example="user@example.com"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string",
     *                     format="password",
     *                     description="User's password",
     *                     example="your_password"
     *                 )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful login",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="token",
     *                 type="string",
     *                 description="Authentication token",
     *                 example="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9..."
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(
     *                 property="message",
     *                 type="string",
     *                 description="Error message",
     *                 example="Invalid credentials"
     *             )
     *         )
     *     )
     * )
     */
    public function login(Request $request){
        
        $type='auth';
        $service = $this->getService($type);
        return  $service->login($request);
    }
    public function logout(Request $request){
        
        $type='auth';
        $service = $this->getService($type);
        return  $service->apiLogin($request);
    }

    public function upload(Request $request){
        $type='file';
        $service = $this->getService($type);
        return $service->upload($request);
    }

    public function assignCategory(Request $request,$blog){
        $type='blog';
        $service = $this->getService($type);
        return $service->assignCategory($request,$blog);
        
    }

    protected function getService($type){
        $serviceFactory = new ServiceFactory();
        return $serviceFactory->getService($type);
        
    }

    
}
