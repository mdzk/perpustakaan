<?php

namespace App\Controllers;
use App\Models\TeachingMaterialsModel;

class TeachingMaterials extends BaseController
{
    public function index()
    {
        $materials = new TeachingMaterialsModel();
        $data = [
            'materials' => $materials->findAll(),
        ];
        echo view('admin/materials', $data);
    }

    public function add()
    {
        
    }

    public function save()
    {
        
    }

    public function delete()
    {
        
    }

    public function edit($id)
    {

    }

    public function update()
    {

    }
}
