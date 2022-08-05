<?php

namespace paytrik\app\controllers;

use MainIndex;
use paytrik\app\core\Controller;
use paytrik\app\core\FlashMessages;

class Cuti extends Controller implements MainIndex
{
    public function __construct()
    {
        if (!isset($_SESSION['login'])) {
            header('Location:' . ROOT);
        }
    }

    public function index()
    {
        $data["title"] = "Input Data Cuti";
        $data["active"] = [
            'dashboard' => "",
            'departemen' => "",
            'jabatan' => "",
            'pegawai' => "",
            'cuti' => "color: #ed843e",
            'tampilPegawai' => "",
            'tampilCuti' => "",
            'tampilDashboard' => "",
            'tampilDepartemen' => "",
            'tampilJabatan' => ""
        ];

        $this->view('templates/header', $data);
        $this->view('cuti/index', $data);
    }

    public function tampilCuti()
    {
        $data["title"] = "Tampil Data Cuti";
        $data["active"] = [
            'dashboard' => "",
            'departemen' => "",
            'jabatan' => "",
            'pegawai' => "",
            'cuti' => "",
            'tampilPegawai' => "",
            'tampilCuti' => "color: #ed843e",
            'tampilDashboard' => "",
            'tampilDepartemen' => "",
            'tampilJabatan' => ""
        ];

        $data["dataCuti"] = $this->model('Cuti')->getDataCuti();

        $this->view('templates/header', $data);
        $this->view('/cuti/tampilCuti', $data);
        $this->view('templates/footer');
    }

    public function detailCuti($id_cuti)
    {
        $data["title"] = "Edit Data Cuti";
        $data["active"] = [
            'dashboard' => "",
            'departemen' => "",
            'jabatan' => "",
            'pegawai' => "",
            'cuti' => "color: #ed843e",
            'wisata' => "",
            'tampilPegawai' => "",
            'tampilCuti' => "",
            'tampilDashboard' => "",
            'tampilDepartemen' => "",
            'tampilJabatan' => "",
            'tampilWisata' => ""
        ];

        $data["dataCuti"] = $this->model('Cuti')->getDataCutiById($id_cuti);

        $this->view('templates/header', $data);
        $this->view('/cuti/editCuti', $data);
        $this->view('templates/footer');
    }

    public function searchCuti()
    {
        $data["title"] = "Tampil Data Cuti";
        $data["active"] = [
            'dashboard' => "",
            'departemen' => "",
            'jabatan' => "",
            'pegawai' => "",
            'cuti' => "",
            'wisata' => "",
            'tampilPegawai' => "",
            'tampilCuti' => "color: #ed843e",
            'tampilDashboard' => "",
            'tampilDepartemen' => "",
            'tampilJabatan' => "",
            'tampilWisata' => ""
        ];

        $data['dataCuti'] = $this->model('Cuti')->searchDataCuti();

        $this->view('templates/header', $data);
        $this->view('/cuti/tampilCuti', $data);
        $this->view('templates/footer');
    }

    public function deleteCuti($id_cuti)
    {
        if ($this->model('Cuti')->deleteDataCuti($id_cuti) > 0) {
            FlashMessages::setFlash('Cuti Berhasil', 'Dihapus', 'success');

            header('Location:' . ROOT . '/cuti/tampilCuti');
        } else {
            FlashMessages::setFlash('Data Cuti Gagal', 'Dihapus', 'danger');

            header('Location:' . ROOT . '/cuti/tampilCuti');
        }
    }

    public function editCuti()
    {
        if ($this->model('Cuti')->editDataCuti($_POST) > 0) {
            FlashMessages::setFlash('Cuti Berhasil', 'Diedit', 'success');
            header('Location:' . ROOT . '/cuti/tampilCuti');
        } else {
            FlashMessages::setFlash('Cuti Gagal', 'Diedit', 'success');
            header('Location:' . ROOT . '/cuti/tampilCuti');
        }
    }
}
