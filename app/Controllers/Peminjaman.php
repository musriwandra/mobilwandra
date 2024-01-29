<?php

namespace App\Controllers;

use App\Models\ModelPeminjaman;

class Peminjaman extends BaseController
{
    public function index()
    {
        $model = new ModelPeminjaman();
        $data['peminjaman'] = $model->getPeminjaman()->getResultArray();
        $data['data_pelanggan'] = $model->getPelanggan()->getResult();
        $data['data_mobil'] = $model->getMobil()->getResult();
        echo view('peminjaman/v_peminjaman', $data);
    }
    public function save()
    {
        $model = new ModelPeminjaman();
        $data = array(
            
            'id_mobil' => $this->request->getPost('id_mobil'),
            'id_pelanggan' => $this->request->getPost('id'),
            'tgl_pinjam' => $this->request->getPost('tgl_pinjam'),
            'Lama_sewa' => $this->request->getPost('Lama_sewa'),
            'status_pembayaran' => $this->request->getPost('status_pembayaran'),

        );

        $model->insertData($data);
        return redirect()->to('/peminjaman');
    }
    public function delete()
    {
        $model = new ModelPeminjaman();
        $id = $this->request->getPost('id_peminjaman');
        $model->deletepeminjaman($id);
        return redirect()->to('/peminjaman/index');
    }
    function update()
    {
        $model = new ModelPeminjaman();
        $id = $this->request->getPost('id');
        $data = array(
            'id_Peminjaman' => $this->request->getPost('id_Peminjaman'),
            'tgl_pinjam' => $this->request->getPost('tgl_pinjam'),
            'id_pelanggan' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'id_mobil' => $this->request->getPost('id_mobil'),
            'sewaperhari' => $this->request->getPost('sewaperhari'),
            'lama_sewa' => $this->request->getPost('lama_sewa'),
            'status_pembayaran' => $this->request->getPost('status_pembayaran'),

        );
        $model->updatepeminjaman($data, $id);
        return redirect()->to('/peminjaman/index');
    }

    public function laporanperperiode()
    {
        echo view('transaksi/vlaporantransaksi');
    }

    public function cetaklaporanperperiode()
    {
        $model = new Modeltransaksi();
        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $query = $model->getLaporanperperiode($tgla, $tglb)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'data' => $query
        ];
        echo view('transaksi/v_cetaklaporanperperiode', $data);
    }
}
