<?php

namespace App\Controllers;
use App\Models\UsersModel;

class Auth extends BaseController
{
    public function index()
    {
        helper(['form']);
        echo view('login');
    }

    public function auth()
    {
        $session  = session();
        $model    = new UsersModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id_users'   => $data['id_users'],
                    'name'      => $data['name'],
                    'roles'      => $data['roles'],
                    'username'  => $data['username'],
                    'logged_in' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/admin');
            } else {
                $session->setFlashdata('msg', 'Password Salah!');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Username Tidak Ditemukan');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}