<?php

namespace App\Modules\Admin\Controllers;

use App\Controllers\BaseController;
use App\Modules\Admin\Models\TeamModel;
use App\Modules\Admin\Models\PembalapModel;

class Team extends BaseController
{
    public function index()
    {
        $model = new TeamModel();


        $data = [
            'title' => "Team",
            'team' => $model->getData()
        ];

        echo view("App\Modules\Admin\Views\Team/team_view", $data);
    }

    public function tambah()
    {
        $team = new TeamModel();
        $pembalap = new PembalapModel();

        $data = [
            'title' => 'Tambah Data',
            'nama_team' => $team->getData(),
            'kelas_balap' => $pembalap->getKelasbalap(),
            'validation' => \Config\Services::validation()
        ];

        return view("App\Modules\Admin\Views\Team/tambah_team", $data);
    }

    public function simpan()
    {
        $model = new TeamModel();
        $validation = \Config\Services::validation();

        $dataSimpan = [
            'nama_team' => $this->request->getVar('nama_team'),
            'id_kelasbalap' => $this->request->getVar('kelas_balap')
        ];

        // dd($dataSimpan);

        if ($validation->run($dataSimpan, "formSimpanTeam")) {
            $model->insert($dataSimpan);
            session()->setFlashdata('success', 'Data Berhasil Disimpan');
        } else {
            return redirect()->to('admin/team/tambah')->withInput()->with('validation', $validation);
        }

        return redirect()->to('admin/team');
    }

    public function edit($id_team)
    {
        $team = new TeamModel();
        $pembalap = new PembalapModel();

        $data = [
            'title' => 'Edit Team',
            'nama_team' => $team->getData($id_team),
            'kelas_balap' => $pembalap->getKelasbalap(),
            'validation' => \Config\Services::validation()
        ];

        echo view('App\Modules\Admin\Views\Team\update_team', $data);
    }

    public function update($id_team)
    {
        $model = new TeamModel();
        $validation = \Config\Services::validation();

        $dataUpdate = [
            'nama_team' => $this->request->getVar('nama_team'),
            'id_kelasbalap' => $this->request->getVar('kelas_balap')
        ];

        if ($validation->run($dataUpdate, "formSimpanUpdate")) {
            $model->editData($id_team, $dataUpdate);
            session()->setFlashdata('succcess', 'Data Berhasil Diubah');
        } else {
            return redirect()->to('admin/team/edit' . '/' . $this->request->getVar('id_team'))->withInput()->with('validation', $validation);
        }

        return redirect()->to('admin/team');
    }

    public function hapus($id_team)
    {
        $model = new TeamModel();

        $model->delete($id_team);

        session()->setFlashdata('success', 'Data Berhasil Dihapus');

        return redirect()->to('admin/team');
    }
}
