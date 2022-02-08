<?php

namespace App\Modules\Admin\Models;

use CodeIgniter\Model;

class PembalapModel extends Model
{
    protected $table = 'pembalap';
    protected $primaryKey = 'no_balap';
    protected $allowedFields = ['no_balap', 'nama', 'slug', 'id_team', 'id_kelasbalap', 'tempat_lahir', 'tanggal_lahir', 'foto', 'negara'];


    public function getData($slug = false)
    {
        $builder = $this->db->table('pembalap')
            ->join('team', 'pembalap.id_team = team.id_team')
            ->join('kelas_balap', 'pembalap.id_kelasbalap = kelas_balap.id_kelasbalap');

        if ($slug == false) {
            return $this->join('team', 'pembalap.id_team = team.id_team')
                ->join('kelas_balap', 'pembalap.id_kelasbalap = kelas_balap.id_kelasbalap')
                ->get()->getResultArray();
            // ->paginate(4, 'pembalap');
        } else {
            $builder->where('slug', $slug);
            $query = $builder->get()->getResultArray();
            return $query;
        }
    }

    public function getTeam()
    {
        $builder = $this->db->table('team');
        $query = $builder->get()->getResultArray();

        return $query;
    }


    public function getKelasbalap()
    {
        $builder = $this->db->table('kelas_balap');
        $query = $builder->get()->getResultArray();

        return $query;
    }

    public function tambah($data)
    {
        $builder = $this->db->table('pembalap')
            ->join('team', 'pembalap.id_team = team.id_team')
            ->join('kelas_balap', 'pembalap.id_kelasbalap = kelas_balap.id_kelasbalap');

        return $builder->insert($data);
    }

    public function editData($no_balap, $data)
    {
        $builder = $this->db->table('pembalap')
            ->where('no_balap', $no_balap);

        return $builder->update($data);
    }

    public function cari($keyword)
    {
        $keyword = $this->db->escapeLikeString($keyword);

        return $this->join('team', 'pembalap.id_team = team.id_team')
            ->join('kelas_balap', 'pembalap.id_kelasbalap = kelas_balap.id_kelasbalap')
            ->like('nama', $keyword)
            ->paginate(3);

        // return Builder;
    }
}
