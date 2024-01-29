<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMobil extends Model
{
    public function getMobil()
    {
        $builder = $this->db->table('tbl_mobil');
        return $builder->get();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_mobil')->insert($data);
    }
    public function deletemobil($id)
    {
        $query = $this->db->table('tbl_mobil')->delete(array('id_mobil1' => $id));
    }
    public function updatemobil($data, $id)
    {
        $query = $this->db->table('tbl_mobil')->update($data, array('id_mobil1' => $id));
    }
}
