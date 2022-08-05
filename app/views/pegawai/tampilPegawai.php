<div class="page">
    <div class="bflex move">
        <h1> Tampil Pegawai </h1>
        <div class="cross cflex">
            <a href="inputpegawai.php"> Input<font style="color: #18154f">_</font>Pegawai </a>
            <p> Anda dapat menambah pegawai <br /> tekan tombol disamping. </p>
        </div>
    </div>
    <?php if ($_SESSION['level'] == 'Admin') { ?>
        <ul>
            <li><a href="<?= ROOT ?>/departemen/tampilDepartemen"> Departemen </a></li>
            <li><a href="<?= ROOT ?>/jabatan/tampilJabatan"> Jabatan </a></li>
            <li style="border-bottom: 2px solid #5388f3;"><a href="<?= ROOT ?>/pegawai/tampilPegawai" style="color: #5388f3; font-weight: bold;"> Pegawai </a></li>
            <li><a href="<?= ROOT ?>/cuti/tampilCuti"> Cuti </a></li>
        </ul>
    <?php } else if ($_SESSION['level'] == 'Kepala Departemen') { ?>
        <ul>
            <li style="border-bottom: 2px solid #5388f3;"><a href="<?= ROOT ?>/pegawai/tampilPegawai" style="color: #5388f3; font-weight: bold;"> Pegawai </a></li>
            <li><a href="<?= ROOT ?>/cuti/tampilCuti"> Cuti </a></li>
        </ul>
    <?php } else if ($_SESSION['level'] == 'Pegawai') { ?>
        <ul>
            <li><a href="<?= ROOT ?>/cuti/tampilCuti"> Cuti </a></li>
        </ul>
    <?php } ?>
</div>
<p>
    <?php paytrik\app\core\FlashMessages::flash(); ?>
</p>

<!-- Search Data Pegawai -->
<form method="POST" action="<?= ROOT ?>/pegawai/searchPegawai">
    <div class="winput bflex">
        <input type="text" name="keyword" placeholder="Cari data pegawai disini . . ." style="margin-top: 0px; border-right: 0px; border-radius: 3px 0px 0px 3px">
        <button type="submit" style="margin-top: 0px; border-radius: 0px 3px 3px 0px"> Telusuri </button>
    </div>
</form>
<!-- /. Search Data Pegawai -->


<div class="max">
    <table>
        <tr>
            <td><span> No </span></td>
            <td><span> NIK </span></td>
            <td><span> Nama Pegawai</span></td>
            <td><span> Tempat Lahir </span></td>
            <td><span> Tanggal Lahir </span></td>
            <td><span> Jenis Kelamin</span></td>
            <td><span> No Hp</span></td>
            <td><span> Email </span></td>
            <td><span> Alamat</span></td>
            <td><span> Jabatan</span></td>
            <td><span> Aksi </span></td>
        </tr>
        <?php $no = 1 ?>
        <?php foreach ($data["dataPegawai"] as $pegawai) : ?>
            <tr>
                <td class="number" style="margin-top: 20px;"><?= $no; ?></td>
                <td><?= $pegawai["nik"]; ?></td>
                <td><?= $pegawai["nama_pegawai"]; ?></td>
                <td><?= $pegawai["tempat_lahir"]; ?></td>
                <td><?= $pegawai["tanggal_lahir"]; ?></td>
                <td><?= $pegawai["jenis_kelamin"]; ?></td>
                <td><?= $pegawai["no_hp"]; ?></td>
                <td><?= $pegawai["email"]; ?></td>
                <td><?= $pegawai["alamat"]; ?></td>
                <td><?= $pegawai["nama_jabatan"]; ?></td>
                <td>
                    <div class="cflex">
                        <a href="<?= ROOT ?>/pegawai/detailPegawai/<?= $pegawai["nik"] ?>" class="btn-edit"> Edit </a>
                        <a href="<?= ROOT ?>/pegawai/deletePegawai/<?= $pegawai["nik"] ?>" class="btn-hapus" onclick="return confirm('Apakah anda ingin mengahpus data?')"> Hapus </a>
                    </div>
            </tr>
            <?php $no++ ?>
        <?php endforeach; ?>

    </table>
</div>