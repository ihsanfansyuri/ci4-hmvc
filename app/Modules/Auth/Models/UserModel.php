<?php

namespace App\Modules\Auth\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama', 'email', 'password', 'role'];

    // public function getData($email, $password)
    // {
    //     $builder = $this->db->table('users')
    //         ->getWhere([
    //             'email' => $email,
    //             'password' => $password
    //         ]);

    //     $query = $builder->getResultArray();
    //     return $query;
    // }

    public function cekEmail($email)
    {
        $builder = $this->db->table('users')
            ->where('email', $email);

        $query = $builder->get()->getResultArray();
        // return $query;
        if ($query == 'email') {
            return true;
        } else {
            return false;
        }
    }
}
