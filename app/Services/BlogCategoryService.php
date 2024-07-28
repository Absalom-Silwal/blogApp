<?php

namespace App\Services;

use App\Models\BlogCategory;
use App\Interfaces\CrudInterface;


class BlogCategoryService implements CrudInterface
{
    public function get($limit){
        //handle pagination and filter
        $data = BlogCategory::where('is_deleted',0)->get()->paginate($limit);
        return $data;
    }
    public function view($id)
    {
        // Implement blog view logic
        $category = BlogCategory::find($id);
        return $category;
    }

    public function create($data)
    {
        // Implement create logic
        $category = BlogCategory::create($data);
        return $category;
    }

    public function update($id,$data){
        //Implement update logic
        $category = BlogCategory::find($id);
        $category->update($data);
        return $category;
    }

    public function delete($id){
        //Implement deleted logic
        $category = BlogCategory::find($id);
        $category->update(['is_deleted',0]);
        return $category;
    }
}
