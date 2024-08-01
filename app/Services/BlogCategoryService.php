<?php

namespace App\Services;

use App\Models\BlogCategory;
use App\Interfaces\CrudInterface;


class BlogCategoryService implements CrudInterface
{
    public function get($request){
        try {
            $limit =$request->limit?$request->limit:null;
            $categories = BlogCategory::where('is_deleted',0)->paginate($limit);
            return response()->json($categories,200);
        } catch (\Throwable $th) {
            return  response()->json(['message'=>$th->getMessage],500);
        }
        
    }
    public function view($id)
    {
        try {
            $category = BlogCategory::find($id);
             return  response()->json($category,200);
        } catch (\Throwable $th) {
            return  response()->json(['message'=>$th->getMessage],500);
        }
        
        return response()->json($category);
    }

    public function addEdit($request){
        $category=null;
        if($request->id){
            $category=BlogCategory::find($request->id);
        }
        return view('modals.categoryAddEdit',compact('category'));
    }

    public function create($request)
    {
      try {
        $category = BlogCategory::create([
            'name' => $request->name,
            'is_deleted' =>0
        ]);
        return $this->get($request);
      } catch (\Throwable $th) {
        return  response()->json(['message'=>$th->getMessage],500);
      }
      
    }

    public function update($id,$request){
        try {
            $category = BlogCategory::find($id);
            $category->update([
                'name'=>$request->name
            ]);
            return  $this->get($request);
        } catch (\Throwable $th) {
            return  response()->json(['message'=>$th->getMessage],500);
        }
        
    }

    public function delete($request,$id){
        try {
            $category = BlogCategory::find($id);
            $category->update(['is_deleted'=>1]);
            return  $this->get($request);
        } catch (\Throwable $th) {
            return  response()->json(['message'=>$th->getMessage],500);
        }
        
    }

   
}
