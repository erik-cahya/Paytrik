<?php

namespace paytrik\app\controllers;

use MainIndex;
use paytrik\app\core\Controller;

// inheritance ke controller
class Dashboard extends Controller implements MainIndex
{
    public function index()
    {

        if (!isset($_SESSION['login'])) {
            header('Location:' . ROOT);
        }

        $data["title"] = "Dashboard";
        $data["active"] = [
            'dashboard' => "color: #ed843e",
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
            'tampilWisata' => ""
        ];

        $this->view('templates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}
