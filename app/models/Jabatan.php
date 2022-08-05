<?php

namespace paytrik\app\models;

use paytrik\app\core\Database;

class Jabatan
{
    private $database;

    // Instansiasi controller database
    public function __construct()
    {
        $this->database = new Database;
    }

    // Ambil semua data pegawai dari database
    public function getDataJabatan()
    {
        $this->database->query("SELECT * FROM jabatan JOIN departemen ON jabatan.id_departemen=departemen.id_departemen");
        return $this->database->resultSet();
    }

    public function getDataJabatanById($id_jabatan)
    {
        $this->database->query("SELECT * FROM jabatan WHERE id_jabatan='$id_jabatan'");
        return $this->database->single();
    }

    public function addDataJabatan($data)
    {
        $id_jabatan         = $data['id_jabatan'];
        $id_departemen      = $data['id_departemen'];
        $nama_jabatan       = $data['nama_jabatan'];
        $gaji_tunjangan     = $data['gaji_tunjangan'];

        $query = "INSERT INTO jabatan
            VALUES(
                '$id_jabatan',
                '$id_departemen',
                '$nama_jabatan',
                '$gaji_tunjangan')
        ";
        $this->database->query($query);
        $this->database->execute();

        return $this->database->rowCount();
    }

    public function editDataJabatan($data)
    {
        $id_jabatan         = $data['id_jabatan'];
        $id_departemen      = $data['id_departemen'];
        $nama_jabatan       = $data['nama_jabatan'];
        $gaji_tunjangan     = $data['gaji_tunjangan'];

        $query = "UPDATE jabatan SET
            id_jabatan = '$id_jabatan',            
            id_departemen = '$id_departemen',            
            nama_jabatan = '$nama_jabatan',            
            gaji_tunjangan = '$gaji_tunjangan'

            WHERE id_jabatan = '$id_jabatan'            
            ";

        $this->database->query($query);
        $this->database->execute();

        return $this->database->rowCount();
    }

    public function searchDataJabatan()
    {
        $keyword = @$_POST["keyword"];
        $query = "SELECT * FROM jabatan JOIN departemen ON jabatan.id_departemen=departemen.id_departemen WHERE nama_jabatan LIKE '%$keyword%'";

        $this->database->query($query);
        return $this->database->resultSet();
    }

    public function deleteDataJabatan($id_jabatan)
    {
        $this->database->query("DELETE FROM jabatan WHERE id_jabatan = $id_jabatan");
        $this->database->execute();
        return $this->database->rowCount();
    }
}
