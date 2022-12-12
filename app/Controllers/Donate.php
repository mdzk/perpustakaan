<?php

namespace App\Controllers;
use App\Models\DonateModel;

class Donate extends BaseController
{
    public function index()
    {
        $donate = new DonateModel();
        $data = [
            'donates' => $donate->findAll(),
        ];
        echo view('admin/donate', $data);
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
