<?php

namespace paytrik\app\models;

use paytrik\app\core\Database;

class wisata
{
    private $database;

    // Instansiasi controller database
    public function __construct()
    {
        $this->database = new Database;
    }

    // Ambil semua data objek wisata dari database
    public function getDataWisata()
    {
        $this->database->query("SELECT * FROM objekwisata");
        return $this->database->resultSet();
    }

    // Add Data Objek Wisata
    public function addWisata($data)
    {
        $nama_objek_wisata  = $data["nama_objek_wisata"];
        $kabupaten          = $data["kabupaten"];
        $jenis_objek        = $data["jenis_objek"];
        $fasilitas_tambahan = $data["fasilitas_tambahan"];
        $biaya_tiket_masuk  = $data["biaya_tiket_masuk"];
        $tanggal_dibuka     = $data["tanggal_dibuka"];

        $query = "INSERT INTO objekwisata
         VALUES(
             NULL,
             '$nama_objek_wisata',
             '$kabupaten',
             '$jenis_objek',
             '$fasilitas_tambahan',
             '$biaya_tiket_masuk',
             '$tanggal_dibuka'
             )
             ";

        $this->database->query($query);
        $this->database->execute();

        return $this->database->rowCount();
    }

    public function getDataWisataById($id_objek)
    {
        $this->database->query("SELECT * FROM objekwisata WHERE id_objek='$id_objek'");
        return $this->database->single();
    }

    public function searchDataWisata()
    {
        $keyword = @$_POST["keyword"];
        $query = "SELECT * FROM objekwisata WHERE nama_objek_wisata LIKE '%$keyword%'";

        $this->database->query($query);
        return $this->database->resultSet();
    }

    public function deleteDataWisata($id_objek)
    {
        $this->database->query("DELETE FROM objekwisata WHERE id_objek = $id_objek");
        $this->database->execute();
        return $this->database->rowCount();
    }

    public function editDataWisata($data)
    {

        $id_objek           = $data["id_objek"];
        $nama_objek_wisata  = $data["nama_objek_wisata"];
        $kabupaten          = $data["kabupaten"];
        $jenis_objek        = $data["jenis_objek"];
        $fasilitas_tambahan = $data["fasilitas_tambahan"];
        $biaya_tiket_masuk  = $data["biaya_tiket_masuk"];
        $tanggal_dibuka     = $data["tanggal_dibuka"];

        $query = "UPDATE objekwisata SET
            id_objek            = '$id_objek', 
            nama_objek_wisata   = '$nama_objek_wisata',
            kabupaten           = '$kabupaten',
            jenis_objek         = '$jenis_objek',
            fasilitas_tambahan  = '$fasilitas_tambahan',
            biaya_tiket_masuk   = '$biaya_tiket_masuk',
            tanggal_dibuka      = '$tanggal_dibuka'

            WHERE id_objek = '$id_objek'
            ";

        $this->database->query($query);
        $this->database->execute();

        return $this->database->rowCount();
    }
}
