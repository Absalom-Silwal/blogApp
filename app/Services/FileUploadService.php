<?php

namespace App\Services;

use App\Models\Blog;
use App\Interfaces\CrudInterface;


class FileUploadService 
{
    public function upload($request){
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation rules
            ]); 
    
            $path = $request->file('image')->store('images'); // Save the file
    
            return response()->json(['path' => $path], 200);
        } catch (\Throwable $th) {
            return response()->json(['message'=>$th->getMessage()],500);
        }
        
    }
}
