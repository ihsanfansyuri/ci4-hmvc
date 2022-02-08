<?php

namespace App\Modules\Auth\Controllers;

use App\Controllers\BaseController;
use App\Modules\Auth\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation()
        ];

        return view('App\Modules\Auth\Views\login_view', $data);
    }

    public function auth()
    {
        $model = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $dataUser = $model->where('email', $email)->first();

        if (!$dataUser) {
            session()->setFlashdata('failed', 'Email tidak terdaftar');
            return redirect()->to('auth/login');
        } elseif (sha1($password) !== $dataUser['password']) {
            session()->setFlashdata('failed', 'Password anda salah');
            return redirect()->to('auth/login');
        } else {
            $sessLogin = [
                'nama' => $dataUser['nama'],
                'email' => $dataUser['email'],
                'role' => $dataUser['role'],
                'logged_in' => true
            ];
            session()->set($sessLogin);

            if (session()->role == "admin") {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/user/dashboard');
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/home');
    }
}
