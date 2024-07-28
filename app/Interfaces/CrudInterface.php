<?php

namespace App\Interfaces;

interface CrudInterface
{
    public function get($limit);

    public function view($id);

    public function create($data);

    public function update($id,$data);

    public function delete($id);
}