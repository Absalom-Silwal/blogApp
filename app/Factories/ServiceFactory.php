<?php

namespace App\Factories;

use App\Models\Blog;
use App\Services\AuthService;
use App\Services\BlogService;
use App\Interfaces\CrudInterface;
use App\Services\FileUploadService;
use App\Services\BlogCategoryService;


class ServiceFactory 
{
    //protected $type;
    // public function __construct($type){
    //     dd('test',$type);
    //     $this->type;
    // }

    public function getService($type){
        //dd('test',$type);
        switch (strtolower($type)) {
            case 'blog':
                return new BlogService();
                break;
            case 'category':
                return new BlogCategoryService();
            case 'auth':
                return new AuthService();
            case 'upload':
                return new FileUploadService();
            default:
                return new BlogService();
                break;
        }
    }
}
