<div class="rcontainer">
    <div class="header bflex">
        <a href="<?= ROOT ?>/dashboard">
            <p>DASHBOARD</p>
        </a>
        <div class="title-user">
            <span> <?php echo $_SESSION['level'] ?> </span>
        </div>
    </div>
    <div class="wrapper" style="padding-bottom: 0px">
        <div class="logout">
            <div class="screen-logout"></div>
            <div class="delimiter">
                <div class="clogout">
                    <img src="export/logout.png">
                    <h1> Apakah anda ingin Logout ? </h1>
                    <p> Tekan tombol logout untuk keluar dari halaman atau tekan tombol batalkan untuk membaltakannya. </p>
                    <div class="cflex">
                        <a href="logout.php" class="btn-hapus"> Logout </a>
                        <a class="close-logout"> Batalkan </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="delimiter">
            <div class="dash">
                <img src="<?= ROOT; ?>/dist/img/bg2.jpg">
                <h1> Selamat datang, <?php echo $_SESSION['nama_lengkap'] ?> </h1>
                <p style="line-height: 23px"> Anda telah berhasil login, jika anda ingin melihat data pegawai, anda dapat melakukannya dengan menekan tombol dibawah ini. </p>

                <?php if ($_SESSION["level"] == "Admin" || $_SESSION["level"] == "Kepala Departemen") : ?>
                    <a href="<?= ROOT ?>/pegawai/tampilPegawai" class="btn-edit" style="padding: 7px 20px; font-size: 16px"> Lihat data pegawai </a>
                <?php endif; ?>

                <?php if ($_SESSION["level"] == "Pegawai") : ?>
                    <a href="<?= ROOT ?>/cuti/tampilCuti" class="btn-edit" style="padding: 7px 20px; font-size: 16px"> Lihat data Cuti </a>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>