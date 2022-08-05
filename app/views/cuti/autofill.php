<?php
$connect = mysqli_connect("localhost", "root", "", "sertifikasi");
if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];

    $query = mysqli_query($connect, "SELECT * FROM pegawai INNER JOIN jabatan ON jabatan.id_jabatan=pegawai.id_jabatan WHERE pegawai.nik = '$nik'");
    $pegawai = mysqli_fetch_assoc($query);

    $data = array('nik' => $pegawai['nik'], 'id_jabatan' => $pegawai['id_jabatan'], 'nama_jabatan' => $pegawai['nama_jabatan']);
    echo json_encode($pegawai);
}
