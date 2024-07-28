<?php

namespace App\Services;

use App\Models\Blog;
use App\Interfaces\CrudInterface;


class BlogService implements CrudInterface
{
    public function get($limit){
        //handle pagination and filter
        $data = Blog::where('is_deleted',0)->get()->paginate($limit);
        return $data;
    }

    public function view($id)
    {
        // Implement blog view logic
        $blog = Blog::find($id);
        return $blog;
    }

    public function create($data)
    {
        // Implement create logic
        $blog= Blog::create($data);
        return $blog;
    }

    public function update($id,$data){
        //Implement update logic
        $blog = Blog::find($id);
        $blog->update($data);
        return $blog;
    }

    public function delete($id){
        //Implement deleted logic
        $blog = Blog::find($id);
        $blog->update(['is_deleted'=>0]);
        return $blog;
    }
}
