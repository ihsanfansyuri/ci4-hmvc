<?php

namespace App\Modules\Users\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
    protected $table = 'team';
    protected $primaryKey = 'id_team';
    protected $allowedFields = ['nama_team', 'id_kelasbalap'];

    public function getData($id_team = false)
    {
        if ($id_team == false) {
            return $this->join('kelas_balap', 'team.id_kelasbalap = kelas_balap.id_kelasbalap')
                ->get()->getResultArray();
        } else {
            $builder = $this->db->table('team')
                ->join('kelas_balap', 'team.id_kelasbalap = kelas_balap.id_kelasbalap')
                ->where('id_team', $id_team);
            $query = $builder->get()->getResultArray();
            return $query;
        }
    }

    public function getKelasbalap()
    {
        $builder = $this->db->table('kelas_balap');
        $query = $builder->get()->getResultArray();

        return $query;
    }

    public function editData($id_team, $data)
    {
        $builder = $this->db->table('team')
            ->where('id_team', $id_team);

        return $builder->update($data);
    }

    public function cari($keyword)
    {
        $keyword = $this->db->escapeLikeString($keyword);

        return $this->join('kelas_balap', 'team.id_kelasbalap = kelas_balap.id_kelasbalap')
            ->like('nama_team', $keyword)
            ->paginate(5);

        // return Builder;
    }
}
