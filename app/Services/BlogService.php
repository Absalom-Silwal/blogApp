<?php

namespace App\Services;

use App\Models\Blog;
use App\Interfaces\CrudInterface;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;


class BlogService implements CrudInterface
{
    public function get($request){
        //handle pagination and filter
        $query = Blog::where('is_deleted',0);
        if($request->category){
            $query->where('category_id',$request->category);
        }
        $data= $query->paginate($request->limit);

        return response()->json($data,200);
    }

    public function view($id)
    {
        // Implement blog view logic
        $blog = Blog::find($id);
        return response()->json($blog,200);
    }

    public function create($request)
    {
        // Implement create logic
        //validation
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            //'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        //dd($request->all());
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->body = $request->input('body');
    
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $path=$request->file('image')->storeAs('images', $fileName);
            $blog->blog_image = $fileName;
            $blog->image_path = $path;
        }
    
        $blog->save();
       // dd($blog);
        return response()->json($blog, 200);
    }

    public function update($id,$request){

        //Implement update logic
       $request = new UpdateBlogRequest($request->all());
        
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

    public function assignCategory($request,$blog){
     
        $blog = Blog::find($blog);
        //dd($blog,$request->all());
        $blog->update([
            'category_id'=> $request->category
        ]);

        return response()->json(['message'=>'category assigned sucessfully','blog'=>$blog],200);
    }
}
