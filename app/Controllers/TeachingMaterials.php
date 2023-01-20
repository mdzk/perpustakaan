<?php

namespace App\Controllers;

use App\Models\ProdiModel;
use App\Models\TeachingMaterialsModel;
use App\Models\UsersModel;

class TeachingMaterials extends BaseController
{
    public function index()
    {
        $materials = new TeachingMaterialsModel();
        $prodi = new ProdiModel();
        $user       = new UsersModel();
        $data = [
            'user'  => $user->find(session()->get('id_users')),
            'materials' => $materials->findAll(),
            'prodies' => $prodi->findAll(),
        ];
        echo view('admin/materials', $data);
    }

    public function add()
    {
    }

    public function save()
    {
        $material  = new TeachingMaterialsModel();
        $status = $this->request->getPost('status');
        if ($status == 2) {
            $thumbnail = $this->request->getFile('filePDF');
            if ($thumbnail->getError() == 4) {
                $thumbnailName = 'default.pdf';
            } else {
                $thumbnailName = $thumbnail->getRandomName();
                $thumbnail->move('pdf', $thumbnailName);
            }

            $material->save([
                'id_materials' => $this->request->getPost('id_materials'),
                'title' => $this->request->getPost('title'),
                'material' => $thumbnailName,
                'description' => $this->request->getPost('description'),
                'status' => $this->request->getPost('status'),
                'id_prodi' => $this->request->getVar('id_prodi'),
                'id_users' => session()->get('id_users'),
            ]);
        } else if ($status == 1) {
            $material->save([
                'id_materials' => $this->request->getPost('id_materials'),
                'title' => $this->request->getPost('title'),
                'material' => $this->request->getPost('material'),
                'description' => $this->request->getPost('description'),
                'status' => $this->request->getPost('status'),
                'id_prodi' => $this->request->getVar('id_prodi'),
                'id_users' => session()->get('id_users'),
            ]);
        }

        session()->setFlashdata('pesan', 'Bahan ajar berhasil ditambahkan');
        return redirect()->to('admin/materials');
    }

    public function delete()
    {
        $material  = new TeachingMaterialsModel();
        $status = $this->request->getPost('status');
        if ($status == 2) {
            $id = $this->request->getPost('id_materials');
            $data = $material->find($id);

            if ($data['material'] != 'default.pdf') {
                unlink('pdf/' . $data['material']);
                $material->delete($id);
            }

            session()->setFlashdata('pesan', 'Bahan ajar berhasil dihapus');
            return redirect()->to('admin/materials');
        } else if ($status == 1) {
            $id = $this->request->getPost('id_materials');
            $material->delete($id);
            session()->setFlashdata('pesan', 'Bahan ajar berhasil dihapus');
            return redirect()->to('admin/materials');
        }
    }

    public function edit($id)
    {
    }

    public function update()
    {

        $material  = new TeachingMaterialsModel();
        $status = $this->request->getPost('status');
        if ($status == 2) {
            $id = $this->request->getPost('id_materials');
            $data = $material->find($id);

            $thumbnail = $this->request->getFile('filePDF');
            if ($thumbnail == '') {
                $thumbnailName = $data['material'];
            } else {
                $thumbnailName = $thumbnail->getRandomName();
                $thumbnail->move('pdf', $thumbnailName);
                unlink('pdf/' . $data['material']);
            }

            $material->replace([
                'id_materials' => $this->request->getPost('id_materials'),
                'title' => $this->request->getPost('title'),
                'material' =>  $thumbnailName,
                'description' => $this->request->getPost('description'),
                'id_prodi' => $this->request->getVar('id_prodi'),
                'status' => $this->request->getPost('status'),
            ]);

            session()->setFlashdata('pesan', 'Bahan ajar berhasil diedit');
            return redirect()->to('admin/materials');
        } else if ($status == 1) {
            $material->replace([
                'id_materials' => $this->request->getPost('id_materials'),
                'title' => $this->request->getPost('title'),
                'material' => $this->request->getPost('material'),
                'description' => $this->request->getPost('description'),
                'id_prodi' => $this->request->getVar('id_prodi'),
                'status' => $this->request->getPost('status'),
            ]);
            session()->setFlashdata('pesan', 'Bahan ajar berhasil diedit');
            return redirect()->to('admin/materials');
        }
    }
}
