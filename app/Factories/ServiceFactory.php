<?php

namespace App\Factories;

use App\Models\Blog;
use App\Services\AuthService;
use App\Services\BlogService;
use App\Interfaces\CrudInterface;
use App\Services\BlogCategoryService;


class ServiceFactory 
{
    protected $type;
    public function __construct($type){
        $this->type;
    }

    public function getService(){
        switch (strtolower($this->type)) {
            case 'blog':
                return new BlogService();
                break;
            case 'category':
                return new BlogCategoryService();
            case 'auth':
                return new AuthService();
            default:
                return new BlogService();
                break;
        }
    }
}
