<?php

namespace paytrik\app\controllers;

use MainIndex;
use paytrik\app\core\Controller;

class Login extends Controller implements MainIndex
{
    public function __construct()
    {
        if (isset($_SESSION['login'])) {
            header('Location:' . ROOT . '/dashboard');
        }
    }

    public function index()
    {
        $data['judul'] = "Login Page Paytrik";
        $data['link'] = [
            'dashboard' => '',
            'pegawai' => '',
            'kehadiran' => 'active',
            'profiles' => ''
        ];

        $this->view('loginPage/index', $data);
    }

    public function setSession()
    {
        if (isset($_POST["login"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            $dbConn = mysqli_connect("localhost", "root", "", "paytrik");

            $result = mysqli_query($dbConn, "SELECT * FROM user WHERE username = '$username' ");

            // Cek berapa jumlah row yang di return
            if (mysqli_num_rows($result) === 1) {

                $row = mysqli_fetch_assoc($result);

                if ($password == $row["password"]) {

                    // level Admin
                    if ($row["level"] == 'Admin') {

                        $_SESSION["login"] = true;
                        $_SESSION["nama_lengkap"] = $row["nama_lengkap"];
                        $_SESSION["level"] = $row["level"];

                        header("Location:" . ROOT . "/dashboard/index");

                        exit;

                        // level Kepala Departemen
                    } else if ($row["level"] == 'Kepala Departemen') {

                        $_SESSION["login"] = true;
                        $_SESSION["nama_lengkap"] = $row["nama_lengkap"];
                        $_SESSION["level"] = $row["level"];

                        header("Location:" . ROOT . "/dashboard/index");

                        exit;

                        // level Pegawai
                    } else if ($row["level"] == 'Pegawai') {

                        $_SESSION["login"] = true;
                        $_SESSION["nama_lengkap"] = $row["nama_lengkap"];
                        $_SESSION["level"] = $row["level"];

                        header("Location:" . ROOT . "/dashboard/index");

                        exit;
                    }
                }
            }
        }
    }
}
