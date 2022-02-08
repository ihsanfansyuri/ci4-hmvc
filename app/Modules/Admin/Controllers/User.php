<?php

namespace App\Modules\Admin\Controllers;

use App\Controllers\BaseController;
use App\Modules\Admin\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $model = new UserModel();

        // d($this->request->getVar('keyword'));

        $currentPage = $this->request->getVar('page_team') ? $this->request->getVar('page_team') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $user = $model->cari($keyword);
        } else {
            $user = $model->getData();
        }

        $data = [
            'title' => "Manage Users",
            'user' => $user,
            'pager' => $model->pager,
            'currentPage' => $currentPage
        ];

        echo view("App\Modules\Admin\Views\User\user_view", $data);
    }

    public function tambah()
    {
        $model = new UserModel();

        $data = [
            'title' => 'Tambah Users',
            'user' => $model->getData(),
            'validation' => \Config\Services::validation()
        ];

        return view("App\Modules\Admin\Views\User/tambah_user", $data);
    }

    public function simpan()
    {
        $model = new UserModel();
        $validation = \Config\Services::validation();

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email harus diisi.',
                    'is_unique' => 'Email sudah terdaftar'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi.'
                ]
            ],
            'confirm' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Password tidak cocok'
                ]
            ],

        ])) {
            return redirect()->to(base_url('admin/user/tambah'))->withInput();
        }

        $pass = $this->request->getVar('password');
        $confirm = $this->request->getVar('confirm');
        if ($pass !== $confirm) {
            return redirect()->to('admin/user/tambah');
        }

        $dataSimpan = [
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => sha1($confirm),
            'role' => $this->request->getVar('role'),
        ];

        $model->insert($dataSimpan);
        session()->setFlashdata('success', 'Data Berhasil Disimpan');

        return redirect()->to('admin/user');
    }

    public function edit($id_user)
    {
        $user = new UserModel();

        $data = [
            'title' => 'Edit User',
            'user' => $user->getData($id_user),
            'validation' => \Config\Services::validation()
        ];

        echo view('App\Modules\Admin\Views\User/update_user', $data);
    }

    public function update($id_user)
    {
        $model = new UserModel();

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email harus diisi.',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi.'
                ]
            ],
            'confirm' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Password tidak cocok'
                ]
            ],
        ])) {
            session()->setFlashdata('failed', 'Data gagal disimpan');
            return redirect()->to('admin/user/edit' . '/' . $this->request->getVar('user'))->withInput();
        }

        $pass = $this->request->getVar('password');
        $confirm = $this->request->getVar('confirm');
        if ($pass !== $confirm) {
            return redirect()->to('admin/user/edit' . '/' . $this->request->getVar('user'));
        }

        $dataUpdate = [
            'id_user' => $id_user,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => sha1($confirm),
            'role' => $this->request->getVar('role'),
        ];

        $model->update($id_user, $dataUpdate);
        session()->setFlashdata('success', 'Data Berhasil Diubah');

        return redirect()->to('admin/user');
    }

    public function hapus($id_user)
    {
        $model = new UserModel();

        $model->delete($id_user);

        session()->setFlashdata('success', 'Data Berhasil Dihapus');

        return redirect()->to('admin/user');
    }
}
