<?php

namespace paytrik\app\controllers;

use MainIndex;
use paytrik\app\core\Controller;
use paytrik\app\core\FlashMessages;

class Wisata extends Controller implements MainIndex
{
    public function index()
    {
        $data["title"] = "Input Data Objek Wisata";
        $data["active"] = [
            'dashboard' => "",
            'departemen' => "",
            'jabatan' => "",
            'pegawai' => "",
            'cuti' => "",
            'wisata' => "color: #ed843e",
            'tampilPegawai' => "",
            'tampilCuti' => "",
            'tampilDashboard' => "",
            'tampilDepartemen' => "",
            'tampilJabatan' => "",
            'tampilWisata' => ""
        ];

        $data["dataWisata"] = $this->model('Wisata')->getDataWisata();

        $this->view('templates/header', $data);
        $this->view('/wisata/index', $data);
        $this->view('templates/footer');
    }

    public function tampilWisata()
    {
        $data["title"] = "Tampil Data Wisata";
        $data["active"] = [
            'dashboard' => "",
            'departemen' => "",
            'jabatan' => "",
            'pegawai' => "",
            'cuti' => "",
            'wisata' => "",
            'tampilPegawai' => "",
            'tampilCuti' => "",
            'tampilDashboard' => "",
            'tampilDepartemen' => "",
            'tampilJabatan' => "",
            'tampilWisata' => "color: #ed843e"
        ];

        $data["dataWisata"] = $this->model('Wisata')->getDataWisata();


        $this->view('templates/header', $data);
        $this->view('/wisata/tampilWisata', $data);
        $this->view('templates/footer');
    }

    public function inputWisata()
    {
        $data["title"] = "Input Data Wisata";
        $data["active"] = [
            'dashboard' => "",
            'departemen' => "",
            'jabatan' => "",
            'pegawai' => "",
            'cuti' => "",
            'wisata' => "",
            'tampilPegawai' => "",
            'tampilCuti' => "",
            'tampilDashboard' => "",
            'tampilDepartemen' => "",
            'tampilJabatan' => "",
            'tampilWisata' => "color: #ed843e"
        ];

        $data["dataWisata"] = $this->model('Wisata')->getDataWisata();

        $this->view('templates/header', $data);
        $this->view('wisata/wisata', $data);
        $this->view('templates/footer');
    }

    public function addWisata()
    {
        if ($this->model('Wisata')->addWisata($_POST) > 0) {
            FlashMessages::setFlash('Wisata Berhasil', 'Ditambah', 'success');
            header('Location:' . ROOT . '/wisata/tampilWisata');
            exit;
        } else {
            FlashMessages::setFlash('Wisata Gagal', 'Ditambah', 'danger');
            header('Location:' . ROOT . '/wisata/tampilWisata');
            exit;
        }
    }

    public function detailWisata($id_objek)
    {
        $data["title"] = "Edit Data Wisata";
        $data["active"] = [
            'dashboard' => "",
            'departemen' => "",
            'jabatan' => "",
            'pegawai' => "",
            'cuti' => "",
            'wisata' => "",
            'tampilPegawai' => "",
            'tampilCuti' => "",
            'tampilDashboard' => "",
            'tampilDepartemen' => "",
            'tampilJabatan' => "",
            'tampilWisata' => "color: #ed843e"
        ];

        $data["dataWisata"] = $this->model('Wisata')->getDataWisataById($id_objek);

        $this->view('templates/header', $data);
        $this->view('/wisata/editWisata', $data);
        $this->view('templates/footer');
    }

    public function editWisata()
    {
        if ($this->model('Wisata')->editDataWisata($_POST) > 0) {
            FlashMessages::setFlash('Wisata Berhasil', 'Diedit', 'success');
            header('Location:' . ROOT . '/wisata/tampilWisata');
        } else {
            FlashMessages::setFlash('Pegawai Gagal', 'Diedit', 'success');
            header('Location:' . ROOT . '/wisata/tampilWisata');
        }
    }

    // Delete Data Wisata
    public function deleteWisata($id_objek)
    {
        if ($this->model('Wisata')->deleteDataWisata($id_objek) > 0) {
            FlashMessages::setFlash('Wisata Berhasil', 'Dihapus', 'success');

            header('Location:' . ROOT . '/wisata/tampilWisata');
        } else {
            FlashMessages::setFlash('Data Wisata Gagal', 'Dihapus', 'danger');

            header('Location:' . ROOT . '/wisata/tampilWisata');
        }
    }

    // Search Data Wisata
    public function searchWisata()
    {
        $data["title"] = "Tampil Data Wisata";
        $data["active"] = [
            'dashboard' => "",
            'departemen' => "",
            'jabatan' => "",
            'pegawai' => "",
            'cuti' => "",
            'wisata' => "",
            'tampilPegawai' => "",
            'tampilCuti' => "",
            'tampilDashboard' => "",
            'tampilDepartemen' => "",
            'tampilJabatan' => "",
            'tampilWisata' => "color: #ed843e"
        ];
        $data["dataWisata"] = $this->model('Wisata')->searchDataWisata();

        $this->view('templates/header', $data);
        $this->view('/wisata/tampilWisata', $data);
        $this->view('templates/footer');
    }
}
