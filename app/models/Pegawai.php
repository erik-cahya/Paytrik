<?php

namespace paytrik\app\models;

use paytrik\app\core\Database;

class Pegawai
{
    private $database;

    // Instansiasi controller database
    public function __construct()
    {
        $this->database = new Database;
    }

    // Ambil semua data pegawai dari database
    public function getDataPegawai()
    {
        $this->database->query("SELECT * FROM pegawai JOIN jabatan ON pegawai.id_jabatan=jabatan.id_jabatan");
        return $this->database->resultSet();
    }


    // Add Data Pegawai
    public function addPegawai($data)
    {
        $nik                = $data['nik'];
        $nama_pegawai       = $data['nama_pegawai'];
        $tempat_lahir       = $data['tempat_lahir'];
        $tanggal_lahir      = $data['tanggal_lahir'];
        $jenis_kelamin      = $data['jenis_kelamin'];
        $no_hp              = $data['no_hp'];
        $email              = $data['email'];
        $alamat             = $data['alamat'];
        $id_jabatan         = $data['id_jabatan'];

        $query = "INSERT INTO pegawai
        VALUES(
            '$nik',
            '$nama_pegawai',
            '$tempat_lahir',
            '$tanggal_lahir',
            '$jenis_kelamin',
            '$no_hp',
            '$email',
            '$alamat',
            '$id_jabatan'
            )
            ";

        $this->database->query($query);
        $this->database->execute();

        return $this->database->rowCount();
    }


    // Get Pegawai By Nik
    public function getDataPegawaiByNik($nik)
    {
        $this->database->query("SELECT * FROM pegawai JOIN jabatan ON pegawai.id_jabatan=jabatan.id_jabatan WHERE nik=$nik");
        return $this->database->single();
    }

    // Search Data Pegawai
    public function searchDataPegawai()
    {
        $keyword = @$_POST["keyword"];
        $query = "SELECT * FROM pegawai JOIN jabatan ON pegawai.id_jabatan=jabatan.id_jabatan WHERE nama_pegawai LIKE '%$keyword%' OR nik LIKE '$keyword'";

        $this->database->query($query);

        return $this->database->resultSet();
    }

    // Edit Data Pegawai
    public function editDataPegawai($data)
    {
        $nik                = $data["nik"];
        $nama_pegawai       = $data["nama_pegawai"];
        $tempat_lahir       = $data["tempat_lahir"];
        $tanggal_lahir      = $data["tanggal_lahir"];
        $jenis_kelamin      = $data["jenis_kelamin"];
        $no_hp              = $data["no_hp"];
        $email              = $data["email"];
        $alamat             = $data["alamat"];
        $id_jabatan         = $data["id_jabatan"];



        $query = "UPDATE pegawai SET 
            nik       = '$nik',
            nama_pegawai       = '$nama_pegawai',
            tempat_lahir       = '$tempat_lahir',
            tanggal_lahir       = '$tanggal_lahir',
            jenis_kelamin       = '$jenis_kelamin',
            no_hp       = '$no_hp',
            email       = '$email',
            alamat       = '$alamat',
            id_jabatan       = '$id_jabatan'       

            WHERE nik = '$nik'
            ";

        $this->database->query($query);
        $this->database->execute();

        return $this->database->rowCount();
    }

    public function deleteDataPegawai($nik)
    {
        $this->database->query("DELETE FROM pegawai WHERE nik = $nik");
        $this->database->execute();
        return $this->database->rowCount();
    }
}
