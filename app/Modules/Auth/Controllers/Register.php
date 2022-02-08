<?php

namespace App\Modules\Auth\Controllers;

use App\Controllers\BaseController;
use App\Modules\Auth\Models\UserModel;

class Register extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Register',
            'validation' => \Config\Services::validation()
        ];

        return view('App\Modules\Auth\Views\register_view', $data);
    }

    public function tambahUser()
    {
        $model = new UserModel();

        $pass = $this->request->getVar('password');
        $confirm = $this->request->getVar('confirm');
        if ($pass !== $confirm) {
            return redirect()->to(base_url('auth/register'));
        }

        $data = [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => sha1($confirm),
            'role' => 'user'
        ];

        $model->insert($data);

        session()->setFlashdata('success', 'Registrasi berhasil, Silahkan login!');

        return redirect()->to(base_url('auth/login'));
    }

    public function cekEmail()
    {
        $model = new UserModel();
        $email = $this->request->getVar('email');

        // if (array_key_exists('email', $_POST)) {
        //     if ($model->cekEmail($email)) {
        //         echo json_encode(FALSE);
        //     } else {
        //         echo json_encode(TRUE);
        //     }
        // }


        // $cekemail = $model->where('email', $email)->first();

        // if ($email == $cekemail) {
        //     echo json_encode(false);
        // } else {
        //     echo json_encode(true);
        // }
    }
}
