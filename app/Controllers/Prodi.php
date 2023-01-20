<?php

namespace App\Controllers;

use App\Models\ProdiModel;
use App\Models\UsersModel;

class Prodi extends BaseController
{
    public function index()
    {
        $category = new ProdiModel();
        $user       = new UsersModel();
        $data = [
            'user'  => $user->find(session()->get('id_users')),
            'prodies' => $category->findAll(),
        ];
        return view('admin/prodi', $data);
    }

    public function save()
    {
        $category  = new ProdiModel();
        $category->save([
            'name' => $this->request->getPost('name'),
        ]);
        session()->setFlashdata('pesan', 'Program Studi berhasil ditambahkan');
        return redirect()->to('admin/prodi');
    }

    function update()
    {
        $category  = new ProdiModel();
        $category->replace([
            'id_prodi' => $this->request->getPost('id_prodi'),
            'name' => $this->request->getPost('name'),
        ]);
        session()->setFlashdata('pesan', 'Program Studi berhasil diedit');
        return redirect()->to('admin/prodi');
    }

    public function delete()
    {
        $category  = new ProdiModel();
        $category->delete($this->request->getPost('id_prodi'));
        session()->setFlashdata('pesan', 'Program Studi berhasil dihapus');
        return redirect()->to('admin/prodi');
    }
}
