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
        $serviceFactory = new ServiceFactory($type);
        $service = $serviceFactory->getService();
        $blogs = $service->get($limit);
        return view('index',compact($blogs));
    }

    public function view($type,$id){
        $serviceFactory = new ServiceFactory($type);
        $service = $serviceFactory->getService();
        $resp = $service->view($id);

        return response()->json($data);
    }

    public function create(Request $request,$type){
        $data = $request->all();
        $serviceFactory = new ServiceFactory($type);
        $service = $serviceFactory->getService();
        $resp = $service->create($data);

        return response()->json($resp);
    }

    public function update(Request $request,$type,$id){
        $data = $request->all();
        $serviceFactory = new ServiceFactory($type);
        $service = $serviceFactory->getService();
        $resp = $service->update($id,$data);
    }

    public function delete($type,$id){
        $serviceFactory = new ServiceFactory($type);
        $service = $serviceFactory->getService();
        $resp = $service->delete($id);
    }

    public function register(Request $request){
        $type='auth';
        $data = $request->all();
        $serviceFactory = new ServiceFactory($type);
        $service = $serviceFactory->getService();
        $resp = $service->register($data);
    }

    public function login(Request $request){
        $type='auth';
        $data = $request->all();
        $serviceFactory = new ServiceFactory($type);
        $service = $serviceFactory->getService();
        $resp = $service->login($data);
    }
}
