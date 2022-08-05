<?php

namespace paytrik\app\models;

use paytrik\app\core\Database;

class Cuti
{
    private $database;

    // Instansiasi controller database
    public function __construct()
    {
        $this->database = new Database;
    }

    // Ambil semua data pegawai dari database
    public function getDataCuti()
    {
        $this->database->query("SELECT * FROM cuti JOIN jabatan ON cuti.id_jabatan=jabatan.id_jabatan JOIN pegawai ON cuti.nik=pegawai.nik ");
        return $this->database->resultSet();
    }

    public function getDataCutiById($id_cuti)
    {
        $this->database->query("SELECT * FROM cuti JOIN jabatan ON cuti.id_jabatan=jabatan.id_jabatan JOIN pegawai ON cuti.nik=pegawai.nik WHERE id_cuti='$id_cuti'");
        return $this->database->single();
    }

    public function searchDataCuti()
    {
        $keyword = @$_POST["keyword"];
        $query = "SELECT * FROM cuti JOIN pegawai ON cuti.nik=pegawai.nik JOIN jabatan ON pegawai.id_jabatan=jabatan.id_jabatan WHERE nama_pegawai LIKE '%$keyword%'";

        $this->database->query($query);
        return $this->database->resultSet();
    }

    public function deleteDataCuti($id_cuti)
    {
        $this->database->query("DELETE FROM cuti WHERE id_cuti = $id_cuti");
        $this->database->execute();
        return $this->database->rowCount();
    }

    public function editDataCuti($data)
    {
        $id_cuti        = $data["id_cuti"];
        $status         = $data["status"];

        $query = "UPDATE cuti SET 
            status       = '$status'

            WHERE id_cuti = '$id_cuti'
            ";

        $this->database->query($query);
        $this->database->execute();

        return $this->database->rowCount();
    }
}
