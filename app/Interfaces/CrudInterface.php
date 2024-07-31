<?php

namespace App\Interfaces;

interface CrudInterface
{
    public function get($request);

    public function view($id);

    public function create($request);

    public function update($id,$request);

    public function delete($request,$id);
}