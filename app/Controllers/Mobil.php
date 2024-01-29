<?php

namespace App\Controllers;

use App\Models\ModelMobil;

class Mobil extends BaseController
{
    public function index()
    {
        $model = new ModelMobil();
        $data['mobil'] = $model->getMobil()->getResultArray();
        echo view('mobil/v_mobil1', $data);
    }
    public function save()
    {
        $model = new ModelMobil();
        $data = array(
            'id_mobil1' => $this->request->getPost('id'),
            'merk' => $this->request->getPost('merk'),
            'model' => $this->request->getPost('model'),
            'tahun' => $this->request->getPost('tahun'),
            'warna' => $this->request->getPost('warna'),
            'sewaperhari' => $this->request->getPost('sewaperhari'),
            'status' => $this->request->getPost('status'),

        );
        if (!$this->validate([
            'id' => [
                'rules' => 'required|is_unique[tbl_mobil.id_mobil1]',
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
        return redirect()->to('/mobil');
    }
    public function delete()
    {
        $model = new ModelMobil();
        $id = $this->request->getPost('id');
        $model->deletemobil($id);
        return redirect()->to('/mobil/index');
    }
    function update()
    {
        $model = new ModelMobil();
        $id = $this->request->getPost('id');
        $data = array(
            'merk' => $this->request->getPost('merk'),
            'model' => $this->request->getPost('model'),
            'tahun' => $this->request->getPost('tahun'),
            'warna' => $this->request->getPost('warna'),
            'sewaperhari' => $this->request->getPost('sewaperhari'),
            'status' => $this->request->getPost('status'),

        );
        $model->updatemobil($data, $id);
        return redirect()->to('/mobil/index');
    }
}
