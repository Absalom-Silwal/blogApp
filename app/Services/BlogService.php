<?php

namespace App\Services;

use App\Models\Blog;
use App\Interfaces\CrudInterface;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;


class BlogService implements CrudInterface
{
    public function get($request){
        try {
            $limit =  $request->limit? $request->limit:5;
            $query = Blog::where('is_deleted',0);
            if($request->category){
                $query->where('category_id',$request->category);
            }
            if($request->search){
                $searchValue = $request->search;
                $query->where(function($query) use ($searchValue){
                    $query->where('title','LIKE',"%{$searchValue}%")
                        ->orWhere('body','LIKE',"%{$searchValue}%");
                });
            }
            $data= $query->orderBy('created_at','desc')->paginate($limit);

            return response()->json($data,200);
        } catch (\Throwable $th) {
            return response()->json(['messge'=>$th->getMessage()],500);
        }
       
    }

    public function view($id)
    {
        // Implement blog view logic
        $blog = Blog::find($id);
        return response()->json($blog,200);
    }

    public function addEdit($request){
        $blog=null;
        if($request->id){
            $blog=Blog::find($request->id);
        }
        return view('modals.blogAddEdit',compact('blog'));
    }

    public function create($request)
    {
        try {
            $request->validate([
                'title' => 'required|string',
                'body' => 'required|string',
                //'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
           
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
            return $this->get($request);
        } catch (\Throwable $th) {
            return response()->json(['messge'=>$th->getMessage()],500);
        }
        
    }

    public function update($id,$request){

        try {
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
        
            return $this->get($request);
        } catch (\Throwable $th) {
            return response()->json(['messge'=>$th->getMessage()],500);
        }
       
    }

    public function delete($request,$id){
        try {
            $blog = Blog::find($id);
            $blog->update(['is_deleted'=>1]);
            return $this->get($request);
        } catch (\Throwable $th) {
            return response()->json(['messge'=>$th->getMessage()],500);
        }
        

    }

    public function assignCategory($request,$blog){
     
        $blog = Blog::find($blog);
        //dd($blog,$request->all());
        $blog->update([
            'category_id'=> $request->category
        ]);

        return response()->json(['message'=>'category assigned sucessfully','blog'=>$blog],200);
    }

    protected function returnResponse($response,$status){
        return [
                'response'=>$response,
                'status'=>$status
            ];
    }
}
