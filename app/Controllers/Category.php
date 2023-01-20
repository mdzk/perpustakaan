<?php

namespace App\Controllers;
use App\Models\CategoriesModel;
use App\Models\UsersModel;

class Category extends BaseController
{
    public function index()
    {
        $category = new CategoriesModel();
        $user       = new UsersModel();
        $data = [
            'user'  => $user->find(session()->get('id_users')),
            'categories' => $category->findAll(),
        ];
        return view('admin/category', $data);
    }

    public function save()
    {
        $category  = new CategoriesModel();
        $category->save([
            'name' => $this->request->getPost('name'),
        ]);
        session()->setFlashdata('pesan', 'Kategori berhasil ditambahkan');
        return redirect()->to('admin/category');
    }

    function update()
    {
        $category  = new CategoriesModel();
        $category->replace([
            'id_categories' => $this->request->getPost('id_categories'),
            'name' => $this->request->getPost('name'),
        ]);
        session()->setFlashdata('pesan', 'Kategori berhasil diedit');
        return redirect()->to('admin/category');
    }

    public function delete()
    {
        $category  = new CategoriesModel();
        $category->delete($this->request->getPost('id_categories'));
        session()->setFlashdata('pesan', 'Kategori berhasil dihapus');
        return redirect()->to('admin/category');
    }
}
