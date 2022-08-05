<div class="page">
    <div class="bflex move">
        <h1> Input Departemen </h1>
        <div class="cross cflex">
            <a href="<?= ROOT ?>/departemen/tampilDepartemen"> Tampil<font style="color: #18154f">_</font>Departemen </a>
            <p> Anda dapat melihat departemen <br /> tekan tombol disamping. </p>
        </div>
    </div>
    <ul>
        <?php if ($_SESSION['level'] == 'Admin') { ?>
            <li style="border-bottom: 2px solid #5388f3;"><a href="<?= ROOT ?>/departemen" style="color: #5388f3; font-weight: bold;"> Departemen </a></li>
            <li><a href="<?= ROOT ?>/jabatan"> Jabatan </a></li>
            <li><a href="<?= ROOT ?>/pegawai"> Pegawai </a></li>
            <li><a href="<?= ROOT ?>/cuti"> Cuti </a></li>
        <?php } ?>
        <?php if ($_SESSION['level'] == 'Kepala Departemen') { ?>
            <li><a href="<?= ROOT ?>/pegawai"> Pegawai </a></li>
            <li style="border-bottom: 2px solid #5388f3;"><a href="<?= ROOT ?>/cuti" style="color: #5388f3; font-weight: bold;"> Cuti </a></li>
        <?php } ?>
        <?php if ($_SESSION['level'] == 'Pegawai') { ?>
            <li style="border-bottom: 2px solid #5388f3;"><a href="<?= ROOT ?>/cuti" style="color: #5388f3; font-weight: bold;"> Cuti </a></li>
        <?php } ?>
    </ul>
</div>


<form method="POST" action="<?= ROOT ?>/departemen/addDepartemen" enctype="multipart/form-data">
    <p class="error"></p>
    <div class="winput bflex">
        <div class="cinput rmargin">
            <span> Id Departemen </span>
            <input type="number" name="id_departemen" placeholder="Masukan id departemen . . .">
        </div>
        <div class="cinput">
            <span> Nama Departemen </span>
            <input type="text" name="nama_departemen" placeholder="Masukkan nama departemen . . .">
        </div>
    </div>
    <div class="winput tmargin">
        <button type="submit" name="save" style="left: 0px"> Input Departemen </button>
    </div>
</form>