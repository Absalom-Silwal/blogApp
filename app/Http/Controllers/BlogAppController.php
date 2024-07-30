<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Factories\ServiceFactory;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BlogAppController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        $type='blog';
        $limit = 5;
        $service = $this->getService($type);
        $blogs = $service->get($limit);
        return view('index',compact($blogs));
    }

    public function view($type,$id){
        $service = $this->getService($type);
        $resp = $service->view($id);

        return $resp;
    }

    public function create(Request $request,$type){
        $service = $this->getService($type);
        $resp = $service->create($request);

        return $resp;
    }

    public function get(Request $request,$type){
        $service=$this->getService($type);
        $resp = $service->get($request);
        return $resp;
    }

    public function update(Request $request,$type,int $id){
        
        $service = $this->getService($type);
        $resp = $service->update($id,$request);
        return $resp;
    }

    public function delete($type,$id){
        $service = $this->getService($type);
        $resp = $service->delete($id);
        return $resp;
    }

    public function register(Request $request){
        $type='auth';
        $service = $this->getService($type);
        $resp = $service->register($request);
        return $resp;
    }

    public function login(Request $request){
        
        $type='auth';
        $service = $this->getService($type);
        $resp = $service->login($request);
        return $resp;
    }

    public function upload(Request $request){
        $type='upload';
        $service = $this->getService($type);
        $resp = $service->upload($request);
        return $resp;
    }

    public function assignCategory(Request $request,$blog){
        $type='blog';
        $service = $this->getService($type);
        $resp = $service->assignCategory($request,$blog);
    }

    protected function getService($type){
        $serviceFactory = new ServiceFactory();
        return $serviceFactory->getService($type);
    }
}
