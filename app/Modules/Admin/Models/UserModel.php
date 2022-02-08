<?php

namespace App\Modules\Admin\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama', 'email', 'password', 'role'];


    public function getData($id_user = false)
    {
        if ($id_user == false) {
            $builder = $this->db->table('users');

            $query = $builder->get()->getResultArray();
            return $query;
        } else {
            $builder = $this->db->table('users')
                ->where('id_user', $id_user);

            $query = $builder->get()->getResultArray();
            return $query;
        }
    }
}
