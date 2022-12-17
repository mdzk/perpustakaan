<?php

namespace App\Controllers;
use App\Models\DonateModel;

class Donate extends BaseController
{
    public function index()
    {
        $donate = new DonateModel();
        $data = [
            'donates' => $donate->where('status', 0)->findAll(),
        ];
        echo view('admin/donate', $data);
    }

    public function save()
    {
        $donate  = new DonateModel();
        $donate->save([
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'status' => 0,
            'id_users' => session()->get('id_users'),
        ]);
        session()->setFlashdata('pesan', 'Buku donasi berhasil ditambahkan');
        return redirect()->to('admin/donate');
    }

    public function delete()
    {
        $donate  = new DonateModel();
        $id = $this->request->getPost('id_donate');
        $data = $donate->find($id);
        if ($data['picture'] == '') {
            $donate->delete($id);
        } else if ($data['picture'] != 'default.jpg'){
            unlink('img/'. $data['picture']);
            $donate->delete($id);
        }
        session()->setFlashdata('pesan', 'Buku berhasil dihapus');
        return redirect()->to('admin/donate');
    }

    public function update()
    {
        $donate  = new DonateModel();
        $donate->replace([
            'id_donate' => $this->request->getPost('id_donate'),
            'donors' => $this->request->getPost('donors'),
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
        ]);
        session()->setFlashdata('pesan', 'Buku berhasil diedit');
        return redirect()->to('admin/donate');
    }
    public function history()
    {
        $donate = new DonateModel();
        $data = [
            'donates' => $donate->where('status', 1)->find(),
        ];
        echo view('admin/donate-history', $data);
    }

    public function verify()
    {
        $thumbnail = $this->request->getFile('bukti');
        if ($thumbnail->getError() == 4) {
            $thumbnailName = 'default.jpg';
        } else {
            $thumbnailName = $thumbnail->getRandomName();
            $thumbnail->move('img', $thumbnailName);
        }

        $donate  = new DonateModel();
        $donate->replace([
            'id_donate' => $this->request->getPost('id_donate'),
            'donors' => $this->request->getPost('donors'),
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'picture' => $thumbnailName,
            'status' => 1,
            'id_users' => session()->get('id_users'),
        ]);
        session()->setFlashdata('pesan', 'Buku berhasil diverifikasi');
        return redirect()->to('admin/donate');
    }
}
