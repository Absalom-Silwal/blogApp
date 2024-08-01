<?php

namespace App\Services;

use App\Models\Blog;
use App\Interfaces\CrudInterface;


class FileService 
{
    public function get($request){
        $storage_location = storage_path('app');
        $file_location = $storage_location.'/'.$request->file;
        
        if(file_exists($file_location)){
            return response()->file($file_location);
        }
        else{
            return response()->file(public_path('/images/noimage.jpg'));
        }
    }
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
