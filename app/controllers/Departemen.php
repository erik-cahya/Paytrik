<?php

namespace paytrik\app\controllers;

use MainIndex;
use paytrik\app\core\Controller;
use paytrik\app\core\FlashMessages;

class Departemen extends Controller implements MainIndex
{
    public function __construct()
    {
        if (!isset($_SESSION['login'])) {
            header('Location:' . ROOT);
        }
    }

    // Input Data Departemen
    public function index()
    {
        $data["title"] = "Input Data Departemen";
        $data["active"] = [
            'dashboard' => "",
            'departemen' => "color: #ed843e",
            'jabatan' => "",
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

        $this->view('templates/header', $data);
        $this->view('departemen/index');
        $this->view('templates/footer');
    }

    // Menampilkan Semua Data Departemen
    public function tampilDepartemen()
    {
        $data["title"] = "Tampil Data Departemen";
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
            'tampilDepartemen' => "color: #ed843e",
            'tampilJabatan' => "",
            'tampilWisata' => ""
        ];

        $data["dataDepartemen"] = $this->model('Departemen')->getDataDepartemen();


        $this->view('templates/header', $data);
        $this->view('/departemen/tampilDepartemen', $data);
        $this->view('templates/footer');
    }

    // Menampilkan Detail Departemen
    public function detailDepartemen($id_departemen)
    {
        $data["title"] = "Edit Data Departemen";
        $data["active"] = [
            'dashboard' => "",
            'departemen' => "",
            'jabatan' => "",
            'pegawai' => "",
            'cuti' => "",
            'tampilPegawai' => "",
            'tampilCuti' => "",
            'tampilDashboard' => "",
            'tampilDepartemen' => "color: #ed843e",
            'tampilJabatan' => ""
        ];

        $data["dataDepartemen"] = $this->model('Departemen')->getDataDepartemenById($id_departemen);


        $this->view('templates/header', $data);
        $this->view('/departemen/editDepartemen', $data);
        $this->view('templates/footer');
    }

    public function editDepartemen()
    {
        if ($this->model('Departemen')->editDataDepartemen($_POST) > 0) {
            FlashMessages::setFlash('Departemen Berhasil', 'Diedit', 'success');
            header('Location:' . ROOT . '/departemen/tampilDepartemen');
        } else {
            FlashMessages::setFlash('Departemen Gagal', 'Diedit', 'success');
            header('Location:' . ROOT . '/departemen/tampilDepartemen');
        }
    }

    // Tambah Data Departemen
    public function addDepartemen()
    {
        $id_departemen = $_POST["id_departemen"];
        $nama_departemen = $_POST["nama_departemen"];

        $sql = $this->model('Departemen')->getDataDepartemenById($id_departemen);

        // cek form kosong
        if (!empty(trim($id_departemen)) && !empty(trim($nama_departemen))) {

            // cek id yang sama
            if ($id_departemen === $sql["id_departemen"]) {
                echo '
                <script type="text/javascript">
                    alert("ID Sudah Digunakan"); 
                    window.location="' . ROOT . '/departemen";
                </script>
                ';
            }
            // lolos semua pengecekan
            else {
                if ($this->model('Departemen')->addDataDepartemen($_POST) > 0) {
                    FlashMessages::setFlash('Departemen Berhasil', 'Ditambah', 'success');
                    header('Location:' . ROOT . '/departemen/tampilDepartemen');
                    exit;
                } else {
                    FlashMessages::setFlash('Departemen Gagal', 'Ditambah', 'danger');
                    header('Location:' . ROOT . '/departemen');
                    exit;
                }
            }
        } else {
            echo '
                <script type="text/javascript">
                    alert("Form Tidak Boleh Kosong"); 
                    window.location="' . ROOT . '/departemen";
                </script>
                ';
        }
    }

    // Search Departemen
    public function searchDepartemen()
    {
        $data["title"] = "Tampil Data Departemen";
        $data["active"] = [
            'dashboard' => "",
            'departemen' => "",
            'jabatan' => "",
            'pegawai' => "",
            'cuti' => "",
            'tampilPegawai' => "",
            'tampilCuti' => "",
            'tampilDashboard' => "",
            'tampilDepartemen' => "color: #ed843e",
            'tampilJabatan' => ""
        ];
        $data['dataDepartemen'] = $this->model('Departemen')->searchDataDepartemen();

        $this->view('templates/header', $data);
        $this->view('/departemen/tampilDepartemen', $data);
        $this->view('templates/footer');
    }

    // Delete Data Departemen
    public function deleteDepartemen($id_departemen)
    {
        if ($this->model('Departemen')->deleteDataDepartemen($id_departemen) > 0) {
            FlashMessages::setFlash('Departemen Berhasil', 'Dihapus', 'success');

            header('Location:' . ROOT . '/departemen/tampilDepartemen');
        } else {
            FlashMessages::setFlash('Data Departemen Gagal', 'Dihapus', 'danger');

            header('Location:' . ROOT . '/departemen/tampilDepartemen');
        }
    }
}
