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
       
        return view('pages.index');
    }

    public function loginModal(){
        return view('modals.login');
    }

    public function registerModal(){
        return view('modals.register');
    }

    public function view($type,$id){
        $service = $this->getService($type);
        return $service->view($id);
    }

    public function addEdit(Request $request,$type){
        $service = $this->getService($type);
        return $service->addEdit($request);
    }

    public function create(Request $request,$type){
        $service = $this->getService($type);
        return  $service->create($request);
    }

    public function get(Request $request,$type){
        $service=$this->getService($type);
        return $service->get($request);
    }

    public function update(Request $request,$type,int $id){
        
        $service = $this->getService($type);
        return $service->update($id,$request);
    }

    public function delete(Request $request,$type,$id){
        $service = $this->getService($type);
        return $service->delete($request,$id);
    }

    public function register(Request $request){
        $type='auth';
        $service = $this->getService($type);
        return $service->register($request);
    }

    public function login(Request $request){
        
        $type='auth';
        $service = $this->getService($type);
        $resp = $service->login($request);
        return $resp;
    }
    public function logout(Request $request){
        
        $type='auth';
        $service = $this->getService($type);
        return $service->webLogout($request);
    }

    public function upload(Request $request){
        $type='file';
        $service = $this->getService($type);
        return $service->upload($request);
    }

    public function assignCategory(Request $request,$blog){
        $type='blog';
        $service = $this->getService($type);
        return $service->assignCategory($request,$blog);
    }

    protected function getService($type){
        $serviceFactory = new ServiceFactory();
        return $serviceFactory->getService($type);
    }

    public function getFile(Request $request){
        $type='file';
        $service = $this->getService($type);
        return $service->get($request);
       
    }
}
