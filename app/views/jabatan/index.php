<div class="page">
    <div class="bflex move">
        <h1> Input Jabatan </h1>
        <div class="cross cflex">
            <a href="<?= ROOT ?>/Jabatan/tampilJabatan"> Tampil<font style="color: #18154f">_</font>Jabatan </a>
            <p> Anda dapat melihat jabatan <br /> tekan tombol disamping. </p>
        </div>
    </div>
    <ul>
        <?php if ($_SESSION['level'] == 'Admin') { ?>
            <li><a href="<?= ROOT ?>/Departemen"> Departemen </a></li>
            <li style="border-bottom: 2px solid #5388f3;"><a href="inputjabatan.php" style="color: #5388f3; font-weight: bold;"> Jabatan </a></li>
            <li><a href="<?= ROOT ?>/Pegawai"> Pegawai </a></li>
            <li><a href="<?= ROOT ?>/Cuti"> Cuti </a></li>
        <?php } ?>
        <?php if ($_SESSION['level'] == 'Kepala Departemen') { ?>
            <li><a href="<?= ROOT ?>/Pegawai"> Pegawai </a></li>
            <li style="border-bottom: 2px solid #5388f3;"><a href="<?= ROOT ?>/Cuti" style="color: #5388f3; font-weight: bold;"> Cuti </a></li>
        <?php } ?>
        <?php if ($_SESSION['level'] == 'Pegawai') { ?>
            <li style="border-bottom: 2px solid #5388f3;"><a href="<?= ROOT ?>/Cuti" style="color: #5388f3; font-weight: bold;"> Cuti </a></li>
        <?php } ?>
    </ul>
</div>
<form method="POST" action="<?= ROOT ?>/jabatan/addJabatan" enctype="multipart/form-data">
    <p class="error"></p>
    <div class="winput bflex">
        <div class="cinput rmargin">
            <span> Id Jabatan </span>
            <input type="number" name="id_jabatan" placeholder="Masukan id jabatan . . .">
        </div>

        <div class="cinput">
            <span> Nama Departemen </span>
            <select name="id_departemen" id="id_departemen" class="input">
                <option disabled selected>Pilih Departemen</option>

                <?php foreach ($data["dataDepartemen"] as $departemen) : ?>
                    <option value="<?= $departemen["id_departemen"] ?>" name="id_departemen"><?= $departemen["nama_departemen"]; ?></option>
                <?php endforeach; ?>

            </select>
        </div>

    </div>
    <div class="winput tmargin">
        <span> Nama Jabatan </span>
        <input type="text" name="nama_jabatan" placeholder="Masukan nama jabatan . . .">
    </div>

    <div class="winput tmargin">
        <span> Gaji Tunjangan </span>
        <input type="number" name="gaji_tunjangan" placeholder="Masukan gaji tunjangan . . .">
    </div>

    <div class="winput tmargin">
        <button type="submit" name="saveJabatan" style="left: 0px"> Input Jabatan </button>
    </div>
</form>