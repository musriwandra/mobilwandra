<?php

namespace App\Controllers;

use App\Models\ModelPelanggan;

class Pelanggan extends BaseController
{
    public function index()
    {
        $model = new ModelPelanggan();
        $data['pelanggan'] = $model->getPelanggan()->getResultArray();
        echo view('pelanggan/v_pelanggan', $data);
    }
    public function save()
    {
        $model = new ModelPelanggan();
        $data = array(
            'id' => $this->request->getPost('id'),
            'nama' => $this->request->getPost('nama'),
            'nohp' => $this->request->getPost('nohp'),
            'alamat' => $this->request->getPost('alamat'),
        );
        if (!$this->validate([
            'id' => [
                'rules' => 'required|is_unique[tbl_pelanggan.id]',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                    'is_unique' => '{field} Sudah Ada'
                ]
            ]
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            print_r($this->request->getVar());
        }
        $model->insertData($data);
        return redirect()->to('/pelanggan');
    }
    public function delete()
    {
        $model = new ModelPelanggan();
        $id = $this->request->getPost('id');
        $model->deletepelanggan($id);
        return redirect()->to('/pelanggan/index');
    }
    function update()
    {
        $model = new ModelPelanggan();
        $id = $this->request->getPost('id');
        $data = array(
            'nama' => $this->request->getPost('nama'),
            'nohp' => $this->request->getPost('nohp'),
            'alamat' => $this->request->getPost('alamat'),
        );
        $model->updatepelanggan($data, $id);
        return redirect()->to('/pelanggan/index');
    }
}
