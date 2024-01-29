<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeminjaman extends Model
{
    public function getPeminjaman()
    {
        $builder = $this->db->table('tbl_peminjaman')
            ->join('tbl_pelanggan', 'id_pelanggan=id')
            ->join('tbl_mobil', 'id_mobil=id_mobil1');
        return $builder->get();
    }
    public function getPelanggan()
    {
        $builder = $this->db->table('tbl_pelanggan');
        return $builder->get();
    }
    public function getMobil()
    {
        $builder = $this->db->table('tbl_mobil');
        return $builder->get();
    }
    public function insertData($data)
    {
        $this->db->table('tbl_peminjaman')->insert($data);
    }
    public function deletepeminjaman($id)
    {
        $query = $this->db->table('tbl_peminjaman')->delete(array('id' => $id));
    }
    public function updatepeminjaman($data, $id)
    {
        $query = $this->db->table('tbl_peminjaman')->update($data, array('id' => $id));
    }
    public function getLaporanperperiode($tgla, $tglb)
    {
        $builder = $this->db->table('tbl_transaksi')
            ->join('tbl_pelanggan', 'idpel=id')
            ->join('tbl_tarif', 'idharga=idtarif')
            ->where('tglbayar >=', $tgla)
            ->where('tglbayar <=', $tglb);

        return $builder->get();
    }
}
