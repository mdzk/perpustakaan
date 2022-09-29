<?php

namespace App\Controllers;
use App\Models\UsersModel;

class Setting extends BaseController
{
    public function index()
    {
        $user       = new UsersModel();
        $data = [
            'user'  => $user->find(session()->get('id_users')),
        ];
        return view('admin/setting', $data);
    }

    public function update()
    {
        $user = new UsersModel();
        $data = $user->find($this->request->getVar('id_users'));
        $user->replace([
            'id_users' => $this->request->getVar('id_users'),
            'name' => $this->request->getVar('name') ? $this->request->getVar('name') : $data['name'],
            'username' => $this->request->getVar('username') ? $this->request->getVar('username') : $data['username'],
            'password' => empty($this->request->getVar('password')) ? $data['password'] : password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diedit');
        return redirect()->to('admin/setting');
    }
}
