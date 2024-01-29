<?php

namespace App\Controllers;

class Home extends BaseController
{
    

    public function index(): string
    {
        return view('welcome_message');
    }

    public function baru() 
    {    
        echo ('saya bahagia sekali');
        
    }

    public function lama() 
    {
        echo ('aku bisa');
    }

    public function profil() 
    {
        echo ('aku bisa');
        
    }

    public function mhs() 
    {
        return view ('tabelmhs');
    }
    public function proses() 
    {
       $nobp = $this->request->getPost('nobp'); 
       $nama = $this->request->getPost('nama'); 
       $uts = $this->request->getPost('uts'); 
       $uas = $this->request->getPost('uas');
       $tugas = $this->request->getPost('tugas');
        echo "<center>NoBP :$nobp <br></center>"; 
        echo "<center>Nama :$nama <br></center>";
        echo "<center>uts :$uts <br></center>";
        echo "<center>uas :$uas <br></center>";
        echo "<center>tugas :$tugas <br></center>";
        echo "<center>hasil :$hasil <br></center>";        
        $hasil = $uas*30/100 + $uts*40/100 + $tugas*30/100;
        $hasil = ($uas*30/100 + $uts*40/100 + $tugas*30/100)/2;
        // echo "<center>hasil :$hasil <br></center>";
         
    }

    public function hitungbiaya() 
    {
        return view ('vewspp');
    }
    public function tampilbiaya() 
    {
       $kode = $this->request->getPost('kode');
       $agenda = $this->request->getPost('agenda'); 
       $transportasi = $this->request->getPost('transportasi'); 
       $penginapan = $this->request->getPost('penginapan'); 
       $pokok = $this->request->getPost('pokok');
       $total = $this->request->getPost('total');
        echo "<center>kode :$kode <br></center>"; 
        echo "<center>agenda :$agenda <br></center>"; 
        echo "<center>transportasi :$transportasi <br></center>";
        echo "<center>penginapan :$penginapan <br></center>";
        echo "<center>pokok :$pokok <br></center>";
        echo "<center>total :$total <br></center>"; 
         
    }   


    public function simpan() 
    {

        $db = \Config\Database::connect();
        $data =[
                'kode'=>  $this->request->getPost('kode'),
                'agenda'=>   $this->request->getPost('agenda'),
                'btransportasi'=>  $this->request->getPost('transportasi'), 
                'bpenginapan'=>  $this->request->getPost('penginapan'), 
                'bpokok'=>  $this->request->getPost('pokok'),
                'total'=>  $this->request->getPost('total'),
               ];
        $simpan = $db->table('sppd')->insert($data);
        if ($simpan =  TRUE)
            {
                echo "<script>
                alert('data berhasil disimpan');
                window.location='/home/tampil';
                </script>";
            }else 
            {
                echo"<script>
                alert('data gagal disimpan');
                window.location='/home/sppd';
                </script>";
                
            }
        
         
    }   

    function tampil()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sppd');
        $query = $builder->get();
        $data['sppdok'] = $query->getResultArray();
        return view('tampilsppd',$data);
    }
}

