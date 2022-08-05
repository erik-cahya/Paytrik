<div class="page">
    <div class="bflex move">
        <h1> Tampil Wisata </h1>
        <div class="cross cflex">
            <a href="inputwisata.php"> Input<font style="color: #18154f">_</font>Wisata </a>
            <p> Anda dapat menambah objek wisata <br /> tekan tombol disamping. </p>
        </div>
    </div>
    <?php if ($_SESSION['level'] == 'Admin') { ?>
        <ul>
            <?php if ($_SESSION['level'] == 'Admin') { ?>
                <li><a href="<?= ROOT ?>/Departemen"> Departemen </a></li>
                <li><a href="<?= ROOT ?>/Jabatan"> Jabatan </a></li>
                <li><a href="<?= ROOT; ?>/Pegawai"> Pegawai </a></li>
                <li><a href="<?= ROOT ?>/Cuti"> Cuti </a></li>
                <li style="border-bottom: 2px solid #5388f3;"><a style="color: #5388f3; font-weight: bold;" href="<?= ROOT; ?>/Pegawai"> Objek Wisata </a></li>
            <?php } ?>
        </ul>
    <?php } ?>
</div>
<p>
    <?php paytrik\app\core\FlashMessages::flash(); ?>
</p>

<!-- Search Data Wisata -->
<form method="POST" action="<?= ROOT ?>/wisata/searchWisata">
    <div class="winput bflex">
        <input type="text" name="keyword" placeholder="Cari data objek wisata disini . . ." style="margin-top: 0px; border-right: 0px; border-radius: 3px 0px 0px 3px">
        <button type="submit" style="margin-top: 0px; border-radius: 0px 3px 3px 0px"> Telusuri </button>
    </div>
</form>
<!-- /. Search Data Pegawai -->


<div class="max">
    <table>
        <tr>
            <td><span> No </span></td>
            <td><span> Id Objek </span></td>
            <td><span> Nama Objek Wisata</span></td>
            <td><span> Kabupaten </span></td>
            <td><span> Jenis Objek </span></td>
            <td><span> Fasilitas Tambahan</span></td>
            <td><span> Biaya Tiket</span></td>
            <td><span> Tanggal Dibuka </span></td>
            <td><span> Aksi </span></td>
        </tr>
        <?php $no = 1 ?>
        <?php foreach ($data["dataWisata"] as $wisata) : ?>
            <tr>
                <td class="number" style="margin-top: 20px;"><?= $no; ?></td>
                <td><?= $wisata["id_objek"]; ?></td>
                <td><?= $wisata["nama_objek_wisata"]; ?></td>
                <td><?= $wisata["kabupaten"]; ?></td>
                <td><?= $wisata["jenis_objek"]; ?></td>
                <td><?= $wisata["fasilitas_tambahan"]; ?></td>
                <td><?= $wisata["biaya_tiket_masuk"]; ?></td>
                <td><?= $wisata["tanggal_dibuka"]; ?></td>
                <td>
                    <div class="cflex">
                        <a href="<?= ROOT ?>/wisata/detailWisata/<?= $wisata["id_objek"]; ?>" class="btn-edit"> Edit </a>
                        <a href="<?= ROOT ?>/wisata/deleteWisata/<?= $wisata["id_objek"]; ?>" class="btn-hapus" onclick="return confirm('Apakah anda ingin mengahpus data?');"> Hapus </a>
                    </div>
                </td>
            </tr>
            <?php $no++ ?>
        <?php endforeach; ?>
    </table>
</div>