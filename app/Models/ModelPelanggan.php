<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPelanggan extends Model
{
    public function getPelanggan()
    {
        $builder = $this->db->table('tbl_pelanggan');
        return $builder->get();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_pelanggan')->insert($data);
    }
    public function deletepelanggan($id)
    {
        $query = $this->db->table('tbl_pelanggan')->delete(array('id' => $id));
    }
    public function updatepelanggan($data, $id)
    {
        $query = $this->db->table('tbl_pelanggan')->update($data, array('id' => $id));
    }
}
