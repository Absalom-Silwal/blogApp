<?php

namespace App\Services;

use App\Models\BlogCategory;
use App\Interfaces\CrudInterface;


class BlogCategoryService implements CrudInterface
{
    public function get($limit){
        //handle pagination and filter
        $data = BlogCategory::where('is_deleted',0)->get()->paginate($limit);
        return response()->json($data);
    }
    public function view($id)
    {
        // Implement blog view logic
        $category = BlogCategory::find($id);
        return response()->json($category);
    }

    public function create($request)
    {
        // Implement create logic
        // dd($request->all());
        $category = BlogCategory::create([
            'name' => $request->name,
            'is_deleted' =>0
        ]);
        return response()->json(['message'=>'created sucessfully','category'=>$category],200);
    }

    public function update($id,$request){
        //Implement update logic
        $category = BlogCategory::find($id);
        $category->update([
            'name'=>$request->name
        ]);
        return response()->json(['message'=>'updated sucessfully','category'=>$category],200);
    }

    public function delete($id){
        //Implement deleted logic
        $category = BlogCategory::find($id);
        $category->update(['is_deleted'=>1]);
        return response()->json(['message'=>'deletd sucessfully'],200);
    }
}
