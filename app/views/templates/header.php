<!DOCTYPE html>
<html>

<head>
    <title> SERTIFIKASI LSP </title>
    <meta name="viewport" content="width=device-width">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= ROOT ?>/dist/css/myStyle.css">

</head>

<body>
    <div class="bflex">

        <div class="head cflex">
            <a class="btn-menu">
                <div class="icon icon1"></div>
                <div class="icon icon2"></div>
                <div class="icon icon3"></div>
            </a>
        </div>

        <div class="lcontainer">
            <ul class="menu">
                <li class="title-menu"><a href="<?= ROOT ?>/dashboard"><span style="<?= $data["active"]["dashboard"]; ?>"> Dashboard </span></a></li>

                <!-- User Admin -->
                <?php if ($_SESSION['level'] == 'Admin') { ?>
                    <li class="title-menu"><a href="<?= ROOT ?>/Departemen"><span> Input </span></a>
                        <ul class="drop">
                            <li><a href="<?= ROOT ?>/Departemen" style="<?= $data["active"]["departemen"]; ?>"> Departemen </a></li>
                            <li><a href="<?= ROOT ?>/Jabatan" style="<?= $data["active"]["jabatan"]; ?>"> Jabatan </a></li>
                            <li><a href="<?= ROOT ?>/Pegawai" style="<?= $data["active"]["pegawai"]; ?>"> Pegawai </a></li>
                            <li><a href="<?= ROOT ?>/Cuti" style="<?= $data["active"]["cuti"] ?>"> Cuti </a></li>
                            <li><a href="<?= ROOT ?>/Wisata" style="<?= $data["active"]["wisata"] ?>"> Objek Wisata </a></li>
                        </ul>
                    </li>
                    <li class="title-menu"><a href="<?= ROOT ?>/Departemen/tampilDepartemen"><span> Tampil </span></a>
                        <ul class="drop">
                            <li><a href="<?= ROOT ?>/Departemen/tampilDepartemen" style="<?= $data["active"]["tampilDepartemen"]; ?>"> Departemen </a></li>
                            <li><a href="<?= ROOT ?>/Jabatan/tampilJabatan" style="<?= $data["active"]["tampilJabatan"]; ?>"> Jabatan </a></li>
                            <li><a href="<?= ROOT; ?>/Pegawai/tampilPegawai" style="<?= $data["active"]["tampilPegawai"]; ?>"> Pegawai </a></li>
                            <li><a href="<?= ROOT; ?>/Cuti/tampilCuti" style="<?= $data["active"]["tampilCuti"]; ?>"> Cuti </a></li>
                            <li><a href="<?= ROOT ?>/Wisata/tampilWisata" style="<?= $data["active"]["tampilWisata"] ?>"> Objek Wisata </a></li>
                        </ul>
                    </li>

                    <!--  User Kepala Departemen -->
                <?php } else if ($_SESSION['level'] == 'Kepala Departemen') { ?>
                    <li class="title-menu"><a href="<?= ROOT ?>/Pegawai"><span> Input </span></a>
                        <ul class="drop">
                            <li><a href="<?= ROOT ?>/Pegawai" style="<?= $data["active"]["pegawai"]; ?>"> Pegawai </a></li>
                            <li><a href="<?= ROOT ?>/Cuti" style="<?= $data["active"]["cuti"] ?>"> Cuti </a></li>
                        </ul>
                    </li>
                    <li class="title-menu"><a href="<?= ROOT ?>/Pegawai/tampilPegawai"><span> Tampil </span></a>
                        <ul class="drop">
                            <li><a href="<?= ROOT ?>/Pegawai/tampilPegawai" style="<?= $data["active"]["tampilPegawai"]; ?>"> Pegawai </a></li>
                            <li><a href="<?= ROOT ?>/Cuti/tampilCuti" style="<?= $data["active"]["tampilCuti"]; ?>"> Cuti </a></li>
                        </ul>
                    </li>

                    <!-- User Pegawai -->
                <?php } else if ($_SESSION['level'] == 'Pegawai') { ?>
                    <li class="title-menu"><a href="<?= ROOT ?>/cuti"><span> Input </span></a>
                        <ul class="drop">
                            <li><a href="<?= ROOT ?>/cuti" style="<?= $data["active"]["cuti"]; ?>"> Cuti </a></li>
                        </ul>
                    </li>
                    <li class="title-menu"><a href="<?= ROOT ?>/cuti/tampilCuti"><span> Tampil </span></a>
                        <ul class="drop">
                            <li><a href="<?= ROOT ?>/cuti/tampilCuti" style="<?= $data["active"]["tampilCuti"]; ?>"> Cuti </a></li>
                        </ul>
                    </li>
                <?php } ?>

                <li><a class="btn-logout"><span> Logout </span></a></li>

            </ul>
        </div>
        <div class="rcontainer">
            <div class="header bflex">
                <p style="margin-top: 20px;" class="badge text-primary text-uppercase "><u><?= $data["title"] ?></u></p>

                <div class="title-user">
                    <span> <?php echo $_SESSION['level'] ?> </span>
                </div>
            </div>
            <div class="wrapper">
                <div class="logout">
                    <div class="screen-logout"></div>
                    <div class="delimiter">
                        <div class="clogout">
                            <img src="<?= ROOT ?>/dist/img/logout.png">
                            <h1> Apakah anda ingin Logout ? </h1>
                            <p> Tekan tombol logout untuk keluar dari halaman atau tekan tombol batalkan untuk membaltakannya. </p>
                            <div class="cflex">
                                <a href="<?= ROOT ?>/logout" class="btn-hapus"> Logout </a>
                                <a class="close-logout"> Batalkan </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="delimiter" style="margin-left:5%;">