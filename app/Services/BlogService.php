<?php

namespace App\Services;

use App\Models\Blog;
use App\Interfaces\CrudInterface;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;


class BlogService implements CrudInterface
{
    public function get($limit){
        //handle pagination and filter
        $data = Blog::where('is_deleted',0)->paginate($limit);
        return $data;
    }

    public function view($id)
    {
        // Implement blog view logic
        $blog = Blog::find($id);
        return $blog;
    }

    public function create($request)
    {
        // Implement create logic
        //validation
        $request =new StoreBlogRequest($request->all());  

        $blog = new Blog();
        $blog->title = $request->input('name');
        $blog->body = $request->input('body');
    
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path=$request->file('image')->storeAs('images', $fileName);
            $blog->blog_image = $fileName;
            $blog->image_path = $path;
        }
    
        $blog->save();
    
        return response()->json($blog, 200);
    }

    public function update($id,$request){

        //Implement update logic
       $request = new UpdateBlogRequest($request);
        
        $blog = Blog::find($id);
        $blog->title = $request->input('name');
        $blog->body = $request->input('body');
    
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path=$request->file('image')->storeAs('images', $fileName);
            $blog->blog_image = $fileName;
            $blog->image_path = $path;
        }
    
        $blog->update();
    
        return response()->json($blog, 200);
    }

    public function delete($id){

        $blog = Blog::find($id);
        $blog->update(['is_deleted'=>1]);
        return response()->json($blog,200);

    }
}
