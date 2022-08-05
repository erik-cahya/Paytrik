<div class="page">
    <div class="bflex move">
        <h1> Tampil Jabatan </h1>
        <div class="cross cflex">
            <a href="<?= ROOT ?>/jabatan"> Input<font style="color: #18154f">_</font>Jabatan </a>
            <p> Anda dapat menambah departemen <br /> tekan tombol disamping. </p>
        </div>
    </div>
    <ul>
        <li><a href="<?= ROOT ?>/departemen/tampilDepartemen"> Departemen </a></li>
        <li style="border-bottom: 2px solid #5388f3;"><a href="<?= ROOT ?>/jabatan/tampilJabatan" style="color: #5388f3; font-weight: bold;"> Jabatan </a></li>
        <li><a href="<?= ROOT ?>/pegawai/tampilPegawai"> Pegawai </a></li>
        <li><a href="<?= ROOT ?>/cuti/tampilCuti"> Cuti </a></li>

    </ul>
</div>
<p>
    <?php paytrik\app\core\FlashMessages::flash(); ?>
</p>
<!-- search Jabatan -->
<form method="POST" action="<?= ROOT ?>/jabatan/searchJabatan">
    <div class="winput bflex">
        <input type="text" name="keyword" placeholder="Cari data jabatan disini . . ." style="margin-top: 0px; border-right: 0px; border-radius: 3px 0px 0px 3px">
        <button type="submit" style="margin-top: 0px; border-radius: 0px 3px 3px 0px"> Telusuri </button>
    </div>
</form>
<!-- /. search Jabatan -->


<div class="max">
    <table>
        <tr>
            <td><span> No </span></td>
            <td><span> Id Jabatan </span></td>
            <td><span> Nama Departemen</span></td>
            <td><span> Nama Jabatan </span></td>
            <td><span> Gaji Tunjangan</span></td>
            <td><span> Aksi </span></td>
        </tr>
        <?php $no = 1 ?>
        <?php foreach ($data["dataJabatan"] as $jabatan) : ?>
            <tr>
                <td class="number" style="margin-top: 15px;"><?= $no; ?></td>
                <td><?= $jabatan["id_jabatan"] ?></td>
                <td><?= $jabatan["nama_departemen"] ?></td>
                <td><?= $jabatan["nama_jabatan"] ?></td>
                <td><?= $jabatan["gaji_tunjangan"] ?></td>
                <td>
                    <div class="cflex">

                        <a href="<?= ROOT ?>/jabatan/detailJabatan/<?= $jabatan["id_jabatan"] ?>" class="btn-edit"> Edit </a>

                        <a href="<?= ROOT ?>/jabatan/deleteJabatan/<?= $jabatan["id_jabatan"] ?>" class="btn-hapus" onclick="return confirm('Apakah anda ingin menghapus data?')"> Hapus </a>

                    </div>
                </td>
            </tr>
            <?php $no++ ?>
        <?php endforeach; ?>

    </table>

</div>


<?php if ($data["dataJabatan"] ==  NULL) {
    echo "<script>
            var error = document.getElementsByClassName('error')[0];
            error.style.display='block';
            error.innerHTML = 'Data departemen masih kosong !';
            </script>";
} ?>