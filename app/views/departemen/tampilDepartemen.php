<div class="page">
    <div class="bflex move">
        <h1> Tampil Departemen </h1>
        <div class="cross cflex">
            <a href="<?= ROOT ?>/Departemen"> Input<font style="color: #18154f">_</font>Departemen </a>
            <p> Anda dapat menambah departemen <br /> tekan tombol disamping. </p>
        </div>
    </div>
    <ul>
        <li style="border-bottom: 2px solid #5388f3;"><a href="<?= ROOT ?>/departemen/tampulDepartemen" style="color: #5388f3; font-weight: bold;"> Departemen </a></li>
        <li><a href="<?= ROOT ?>/Jabatan/tampilJabatan"> Jabatan </a></li>
        <li><a href="<?= ROOT ?>/pegawai/tampilPegawai"> Pegawai </a></li>
        <li><a href="<?= ROOT ?>/cuti/tampilCuti"> Cuti </a></li>

    </ul>
</div>

<p>
    <?php paytrik\app\core\FlashMessages::flash(); ?>
</p>

<!-- Search Data Departemen -->
<form method="POST" action="<?= ROOT ?>/departemen/searchDepartemen">
    <div class="winput bflex">
        <input type="text" name="keyword" placeholder="Cari data departemen disini . . ." style="margin-top: 0px; border-right: 0px; border-radius: 3px 0px 0px 3px">
        <button type="submit" style="margin-top: 0px; border-radius: 0px 3px 3px 0px"> Telusuri </button>
    </div>
</form>
<!-- /. Search Data Departemen -->

<!-- List Departemen -->
<div class="max">
    <table>
        <tr>
            <td><span> No </span></td>
            <td><span> Id Departemen </span></td>
            <td><span> Nama Departemen</span></td>
            <td><span> Aksi </span></td>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($data["dataDepartemen"] as $departemen) : ?>
            <tr class="text-center">
                <td class="number" style="margin-top: 15px;"><?= $no; ?></td>
                <td><?= $departemen["id_departemen"]; ?></td>
                <td><?= $departemen["nama_departemen"]; ?></td>

                <td>
                    <div class="cflex">
                        <a href="<?= ROOT ?>/departemen/detailDepartemen/<?= $departemen["id_departemen"] ?>" class="btn-edit"> Edit </a>
                        <a href="<?= ROOT ?>/departemen/deleteDepartemen/<?= $departemen["id_departemen"] ?>" class="btn-hapus" onclick="return confirm('Apakah anda ingin mengahpus Data?')"> Hapus </a>
                    </div>
                </td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>


    </table>

</div>

<?php if ($data["dataDepartemen"] == NULL) {
    echo "<script>
    var error = document.getElementsByClassName('error')[0];
    error.style.display = 'block';
    error.innerHTML = 'Tidak Ada Data Departemen !';
</script>";
} ?>