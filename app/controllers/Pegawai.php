<?php

namespace paytrik\app\controllers;

use MainIndex;
use paytrik\app\core\Controller;
use paytrik\app\core\FlashMessages;

class Pegawai extends Controller implements MainIndex
{
    public function index()
    {
        $data["title"] = "Input Data Pegawai";
        $data["active"] = [
            'dashboard' => "",
            'departemen' => "",
            'jabatan' => "",
            'pegawai' => "color: #ed843e",
            'cuti' => "",
            'wisata' => "",
            'tampilPegawai' => "",
            'tampilCuti' => "",
            'tampilDashboard' => "",
            'tampilDepartemen' => "",
            'tampilJabatan' => "",
            'tampilWisata' => ""
        ];

        $data["dataPegawai"] = $this->model('Pegawai')->getDataPegawai();
        $data["dataJabatan"] = $this->model('Jabatan')->getDataJabatan();

        $this->view('templates/header', $data);
        $this->view('/pegawai/index', $data);
        $this->view('templates/footer');
    }

    public function tampilPegawai()
    {
        $data["title"] = "Tampil Data Pegawai";
        $data["active"] = [
            'dashboard' => "",
            'departemen' => "",
            'jabatan' => "",
            'pegawai' => "",
            'cuti' => "",
            'wisata' => "",
            'tampilPegawai' => "color: #ed843e",
            'tampilCuti' => "",
            'tampilDashboard' => "",
            'tampilDepartemen' => "",
            'tampilJabatan' => "",
            'tampilWisata' => ""
        ];

        $data["dataPegawai"] = $this->model('Pegawai')->getDataPegawai();


        $this->view('templates/header', $data);
        $this->view('/pegawai/tampilPegawai', $data);
        $this->view('templates/footer');
    }

    public function inputPegawai()
    {
        $data["title"] = "Input Data Pegawai";
        $data["active"] = [
            'dashboard' => "",
            'departemen' => "",
            'jabatan' => "",
            'pegawai' => "",
            'cuti' => "",
            'tampilPegawai' => "color: #ed843e",
            'tampilCuti' => "",
            'tampilDashboard' => "",
            'tampilDepartemen' => "",
            'tampilJabatan' => ""
        ];

        $data["dataPegawai"] = $this->model('Pegawai')->getDataPegawai();

        $this->view('templates/header', $data);
        $this->view('pegawai/pegawai', $data);
        $this->view('templates/footer');
    }

    public function addPegawai()
    {
        if ($this->model('Pegawai')->addPegawai($_POST) > 0) {
            FlashMessages::setFlash('Pegawai Berhasil', 'Ditambah', 'success');
            header('Location:' . ROOT . '/pegawai/tampilPegawai');
            exit;
        } else {
            FlashMessages::setFlash('Pegawai Berhasil', 'Ditambah', 'danger');
            header('Location:' . ROOT . '/pegawai/tampilPegawai');
            exit;
        }
    }

    public function detailPegawai($nik)
    {
        $data["title"] = "Edit Data Pegawai";
        $data["active"] = [
            'dashboard' => "",
            'departemen' => "",
            'jabatan' => "",
            'pegawai' => "",
            'cuti' => "",
            'tampilPegawai' => "color: #ed843e",
            'tampilCuti' => "",
            'tampilDashboard' => "",
            'tampilDepartemen' => "",
            'tampilJabatan' => ""
        ];

        $data["dataPegawai"] = $this->model('Pegawai')->getDataPegawaiByNik($nik);
        $data["dataJabatan"] = $this->model('Jabatan')->getDataJabatan();

        $this->view('templates/header', $data);
        $this->view('/pegawai/editPegawai', $data);
        $this->view('templates/footer');
    }

    public function editPegawai()
    {
        if ($this->model('Pegawai')->editDataPegawai($_POST) > 0) {
            FlashMessages::setFlash('Pegawai Berhasil', 'Diedit', 'success');
            header('Location:' . ROOT . '/pegawai/tampilPegawai');
        } else {
            FlashMessages::setFlash('Pegawai Gagal', 'Diedit', 'success');
            header('Location:' . ROOT . '/pegawai/tampilPegawai');
        }
    }

    // Delete Data Pegawai
    public function deletePegawai($nik)
    {
        if ($this->model('Pegawai')->deleteDataPegawai($nik) > 0) {
            FlashMessages::setFlash('Pegawai Berhasil', 'Dihapus', 'success');

            header('Location:' . ROOT . '/pegawai/tampilPegawai');
        } else {
            FlashMessages::setFlash('Data Pegawai Gagal', 'Dihapus', 'danger');

            header('Location:' . ROOT . '/pegawai/tampilPegawai');
        }
    }

    // Search Data Pegawai
    public function searchPegawai()
    {
        $data["title"] = "Tampil Data Pegawai";
        $data["active"] = [
            'dashboard' => "",
            'departemen' => "",
            'jabatan' => "",
            'pegawai' => "",
            'cuti' => "",
            'tampilPegawai' => "color: #ed843e",
            'tampilCuti' => "",
            'tampilDashboard' => "",
            'tampilDepartemen' => "",
            'tampilJabatan' => ""
        ];
        $data["dataPegawai"] = $this->model('Pegawai')->searchDataPegawai();

        $this->view('templates/header', $data);
        $this->view('/pegawai/tampilPegawai', $data);
        $this->view('templates/footer');
    }
}
