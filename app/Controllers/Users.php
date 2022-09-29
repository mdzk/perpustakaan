<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Users extends BaseController
{

    public function index()
    {

        $user       = new UsersModel();
        $data = [
            'users'  => $user->findAll(),
        ];
        return view('admin/users', $data);
    }

    public function add()
    {
        $user = new UsersModel();
        $user->save([
            'name' => $this->request->getVar('name'),
            'username' => $this->request->getVar('username'),
            'roles' => $this->request->getVar('roles'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ]);

        session()->setFlashdata('pesan', 'User berhasil ditambahkan');
        return redirect()->to('admin/users');
    }

    public function delete()
    {
        $user = new UsersModel();
        $user->delete($this->request->getVar('id_users'));
        session()->setFlashdata('pesan', 'User berhasil dihapus');
        return redirect()->to('admin/users');
    }

    public function update()
    {
        $user = new UsersModel();
        $data = $user->find($this->request->getVar('id_users'));
        $user->replace([
            'id_users' => $this->request->getVar('id_users'),
            'name' => $this->request->getVar('name'),
            'roles' => $this->request->getVar('roles'),
            'username' => $this->request->getVar('username'),
            'password' => empty($this->request->getVar('password')) ? $data['password'] : password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ]);

        session()->setFlashdata('pesan', 'User berhasil diedit');
        return redirect()->to('admin/users');
    }
}
