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
        $serviceFactory = new ServiceFactory();
        $service = $serviceFactory->getService($type);
        $blogs = $service->get($limit);
        return view('detail',compact($blogs));
    }

    public function view($type,$id){
        $serviceFactory = new ServiceFactory($type);
        $service = $serviceFactory->getService();
        $resp = $service->view($id);

        return response()->json($data);
    }

    public function create(Request $request,$type){
       
        $serviceFactory = new ServiceFactory();
        $service = $serviceFactory->getService($type);
        $resp = $service->create($request);

        return response()->json($resp);
    }

    public function update(Request $request,$type,int $id){
        //dd($type,$id);
        $serviceFactory = new ServiceFactory();
        $service = $serviceFactory->getService($type);
        $resp = $service->update($id,$request);
    }

    public function delete($type,$id){
        $serviceFactory = new ServiceFactory();
        $service = $serviceFactory->getService($type);
        $resp = $service->delete($id);
    }

    public function register(Request $request){
        $type='auth';
        $serviceFactory = new ServiceFactory();
        $service = $serviceFactory->getService($type);
        $resp = $service->register($request);
        return $resp;
    }

    public function login(Request $request){
        
        $type='auth';
        $serviceFactory = new ServiceFactory();
        $service = $serviceFactory->getService($type);
        $resp = $service->login($request);
        return $resp;
    }

    public function upload(Request $request){
        $type='upload';
        $serviceFactory = new ServiceFactory();
        $service = $serviceFactory->getService($type);
        $resp = $service->upload($request);
        return $resp;
    }
}
