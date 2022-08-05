<?php

namespace paytrik\app\controllers;

use MainIndex;
use paytrik\app\core\Controller;
use paytrik\app\core\FlashMessages;

class Jabatan extends Controller implements MainIndex
{
    public function __construct()
    {
        if (!isset($_SESSION['login'])) {
            header('Location:' . ROOT);
        }
    }

    public function index()
    {
        $data["title"] = "Input Data Jabatan";
        $data["active"] = [
            'dashboard' => "",
            'departemen' => "",
            'jabatan' => "color: #ed843e",
            'pegawai' => "",
            'cuti' => "",
            'wisata' => "",
            'tampilPegawai' => "",
            'tampilCuti' => "",
            'tampilDashboard' => "",
            'tampilDepartemen' => "",
            'tampilJabatan' => "",
            'tampilWisata' => ""
        ];

        $data["dataJabatan"] = $this->model('Jabatan')->getDataJabatan();
        $data["dataDepartemen"] = $this->model('Departemen')->getDataDepartemen();

        $this->view('templates/header', $data);
        $this->view('/jabatan/index', $data);
        $this->view('templates/footer');
    }

    public function tampilJabatan()
    {
        $data["title"] = "Tampil Data Jabatan";
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
            'tampilJabatan' => "color: #ed843e",
            'tampilWisata' => ""
        ];

        $data["dataJabatan"] = $this->model('Jabatan')->getDataJabatan();



        $this->view('templates/header', $data);
        $this->view('/jabatan/tampilJabatan', $data);
        $this->view('templates/footer');
    }

    public function addJabatan()
    {
        if ($this->model('Jabatan')->addDataJabatan($_POST) > 0) {
            FlashMessages::setFlash('Jabatan Berhasil', 'Ditambah', 'success');
            header('Location:' . ROOT . '/jabatan/tampilJabatan');
            exit;
        } else {
            FlashMessages::setFlash('Jabatan Gagal', 'Ditambah', 'danger');
            header('Location:' . ROOT . '/jabatan/tampilJabatan');
            exit;
        }
    }

    public function detailJabatan($id_jabatan)
    {
        $data["title"] = "Edit Data Jabatan";
        $data["active"] = [
            'dashboard' => "",
            'departemen' => "",
            'jabatan' => "",
            'pegawai' => "",
            'cuti' => "",
            'tampilPegawai' => "",
            'tampilCuti' => "",
            'tampilDashboard' => "",
            'tampilDepartemen' => "",
            'tampilJabatan' => "color: #ed843e"
        ];

        $data["dataJabatan"] = $this->model('Jabatan')->getDataJabatanById($id_jabatan);
        $data["dataDepartemen"] = $this->model('Departemen')->getDataDepartemen();

        $this->view('templates/header', $data);
        $this->view('/jabatan/editJabatan', $data);
        $this->view('templates/footer');
    }

    public function editJabatan()
    {
        if ($this->model('Jabatan')->editDataJabatan($_POST) > 0) {
            FlashMessages::setFlash('Jabatan Berhasil', 'Diedit', 'success');
            header('Location:' . ROOT . '/jabatan/tampilJabatan');
        } else {
            FlashMessages::setFlash('Jabatan Gagal', 'Diedit', 'danger');
            header('Location:' . ROOT . '/jabatan/tampilJabatan');
        }
    }

    public function searchJabatan()
    {
        $data["title"] = "Tampil Data Jabatan";
        $data["active"] = [
            'dashboard' => "",
            'departemen' => "",
            'jabatan' => "",
            'pegawai' => "",
            'cuti' => "",
            'tampilPegawai' => "",
            'tampilCuti' => "",
            'tampilDashboard' => "",
            'tampilDepartemen' => "",
            'tampilJabatan' => "color: #ed843e"
        ];

        $data["dataJabatan"] = $this->model('Jabatan')->searchDataJabatan();


        $this->view('templates/header', $data);
        $this->view('/jabatan/tampilJabatan', $data);
        $this->view('templates/footer');
    }

    public function deleteJabatan($id_jabatan)
    {
        if ($this->model('Jabatan')->deleteDataJabatan($id_jabatan) > 0) {
            FlashMessages::setFlash('Departemen Berhasil', 'Dihapus', 'success');

            header('Location:' . ROOT . '/jabatan/tampilJabatan');
        } else {
            FlashMessages::setFlash('Data Departemen Gagal', 'Dihapus', 'danger');

            header('Location:' . ROOT . '/jabatan/tampilJabatan');
        }
    }
}
