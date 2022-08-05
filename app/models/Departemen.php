<?php

namespace paytrik\app\models;

use paytrik\app\core\Database;

class Departemen
{
    private $database;

    // Instansiasi controller database
    public function __construct()
    {
        $this->database = new Database;
    }

    // Get data departemen from database
    public function getDataDepartemen()
    {
        $this->database->query("SELECT * FROM departemen");
        return $this->database->resultSet();
    }

    public function getDataDepartemenById($id_departemen)
    {
        $this->database->query("SELECT * FROM departemen WHERE id_departemen='$id_departemen'");
        return $this->database->single();
    }

    public function editDataDepartemen($data)
    {

        $id_departemen      = $data["id_departemen"];
        $nama_departemen    = $data["nama_departemen"];


        $query = "UPDATE departemen SET 
            id_departemen       = '$id_departemen',
            nama_departemen     = '$nama_departemen'

            WHERE id_departemen = '$id_departemen'
            ";

        $this->database->query($query);
        $this->database->execute();

        return $this->database->rowCount();
    }

    public function addDataDepartemen($data)
    {
        $id_departemen      = $data['id_departemen'];
        $nama_departemen    = $data['nama_departemen'];

        $query = "INSERT INTO departemen
            VALUES(
                '$id_departemen',
                '$nama_departemen')
            ";

        $this->database->query($query);
        $this->database->execute();

        return $this->database->rowCount();
    }

    public function searchDataDepartemen()
    {
        $keyword = @$_POST["keyword"];
        $query = "SELECT * FROM departemen WHERE nama_departemen LIKE '%$keyword%'";

        $this->database->query($query);
        return $this->database->resultSet();
    }

    public function deleteDataDepartemen($id_departemen)
    {
        $this->database->query("DELETE FROM departemen WHERE id_departemen = $id_departemen");
        $this->database->execute();
        return $this->database->rowCount();
    }
}
