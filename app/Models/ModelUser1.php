<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    public function simpan($data)
    {
        $query = $this->db->table('tbl_users')->insert($data);
        return $query;
    }

    public function cek_login($username)
    {
        return $this->db->table('tbl_users')
            ->where(array('user_name' => $username))
            ->get()->getRowArray();
    }
}
