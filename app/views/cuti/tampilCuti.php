<div class="page">
    <div class="bflex move">
        <h1> Tampil Cuti </h1>
        <div class="cross cflex">
            <a href="<?= ROOT ?>/cuti"> Input<font style="color: #18154f">_</font>Cuti </a>
            <p> Anda dapat menambah cuti <br /> tekan tombol disamping. </p>
        </div>
    </div>

    <?php if ($_SESSION['level'] == 'Admin') { ?>
        <ul>
            <li><a href="<?= ROOT ?>/departemen/tampilDepartemen"> Departemen </a></li>
            <li><a href="<?= ROOT ?>/jabatan/tampilJabatan"> Jabatan </a></li>
            <li><a href="<?= ROOT ?>/pegawai/tampilPegawai"> Pegawai </a></li>
            <li style="border-bottom: 2px solid #5388f3;"><a href="<?= ROOT ?>/cuti/tampilCuti" style="color: #5388f3; font-weight: bold;"> Cuti </a></li>
        </ul>
    <?php } else if ($_SESSION['level'] == 'Kepala Departemen') { ?>
        <ul>
            <li><a href="<?= ROOT ?>/pegawai/tampilPegawai"> Pegawai </a></li>
            <li style="border-bottom: 2px solid #5388f3;"><a href="<?= ROOT ?>/cuti/tampilCuti" style="color: #5388f3; font-weight: bold;"> Cuti </a></li>
        </ul>
    <?php } else if ($_SESSION['level'] == 'Pegawai') { ?>
        <ul>
            <li style="border-bottom: 2px solid #5388f3;"><a href="<?= ROOT ?>/cuti/tampilCuti" style="color: #5388f3; font-weight: bold;"> Cuti </a></li>
        </ul>
    <?php } ?>

</div>

<p>
    <?php paytrik\app\core\FlashMessages::flash(); ?>
</p>

<!-- Search Data Cuti -->
<form method="POST" action="<?= ROOT ?>/cuti/searchCuti">
    <div class="winput bflex">
        <input type="text" name="keyword" placeholder="Cari data cuti disini . . ." style="margin-top: 0px; border-right: 0px; border-radius: 3px 0px 0px 3px">
        <button type="submit" style="margin-top: 0px; border-radius: 0px 3px 3px 0px"> Telusuri </button>
    </div>
</form>
<!-- /. Search Data Cuti -->

<div class="max">
    <table>
        <tr>
            <td><span> No </span></td>
            <td><span> Id Cuti </span></td>
            <td><span> NIK</span></td>
            <td><span> Nama Pegawai </span></td>
            <td><span> Jabatan </span></td>
            <td><span> Tanggal Mulai Cuti</span></td>
            <td><span> Tanggal Berakhir Cuti </span></td>
            <td><span> Status </span></td>
            <td><span> Aksi </span></td>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($data["dataCuti"] as $cuti) : ?>
            <tr>
                <td class="number" style="margin-top: 15px;"><?= $no; ?></td>
                <td><?= $cuti["id_cuti"]; ?></td>
                <td><?= $cuti["nik"]; ?></td>
                <td><?= $cuti["nama_pegawai"]; ?></td>
                <td><?= $cuti["nama_jabatan"]; ?></td>
                <td><?= $cuti["tgl_mulai_cuti"]; ?></td>
                <td><?= $cuti["tgl_berakhir_cuti"]; ?></td>

                <td><?= $cuti["status"]; ?></td>
                <td>
                    <div class="cflex">
                        <a href="<?= ROOT ?>/cuti/detailCuti/<?= $cuti['id_cuti'] ?>" class="btn-edit"> Edit </a>
                        <a href="<?= ROOT ?>/cuti/deleteCuti/<?= $cuti['id_cuti'] ?>" class="btn-hapus" onclick="return confirm('Apakah anda ingin menghapus data?')"> Hapus </a>
                    </div>
                </td>

            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>


    </table>

</div>