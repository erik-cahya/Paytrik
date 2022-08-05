<form method="POST" action="<?= ROOT ?>/cuti/editCuti/<?= $data["dataCuti"]["id_cuti"] ?>">
    <p class="error"></p>
    <div class="winput bflex">
        <div class="cinput rmargin">
            <span> Id Cuti </span>
            <input type="number" name="id_cuti" value="<?= $data["dataCuti"]["id_cuti"] ?>" readonly>
        </div>
        <div class="cinput">
            <span> NIK </span>
            <input type="hidden" name="nik" id="nik">
            <input type="text" id="nik_field" value="<?= $data["dataCuti"]["nik"] ?>" readonly />
        </div>
    </div>
    <div class="winput tmargin">
        <span> Nama Pegawai </span>
        <input type="text" name="nama_pegawai" value="<?= $data["dataCuti"]["nama_pegawai"] ?>" readonly>
    </div>
    <div class="winput tmargin">
        <span> Jabatan </span>
        <input type="hidden" name="id_jabatan" id="id_jabatan">
        <input type="text" id="nama_jabatan" value="<?= $data["dataCuti"]["id_jabatan"] ?>" readonly />

    </div>
    <div class="winput tmargin">
        <span> Tanggal Mulai Cuti </span>
        <input type="date" name="tgl_mulai_cuti" value="<?= $data["dataCuti"]["tgl_mulai_cuti"] ?>" placeholder="Masukan Mulai Cuti . . ." readonly>
    </div>
    <div class="winput tmargin">
        <span> Tanggal Berakhir Cuti </span>
        <input type="date" name="tgl_berakhir_cuti" value="<?= $data["dataCuti"]["tgl_berakhir_cuti"] ?>" placeholder="Masukkan Tanggal Berakhir Cuti . . ." readonly>
    </div>

    <?php if ($_SESSION['level'] == 'Admin' || $_SESSION['level'] == 'Kepala Departemen') { ?>
        <div class="winput tmargin">
            <span> Ubah Status </span>
            <select name="status">
                <option disabled selected>Pilih Status</option>
                <option value="Gagal">Gagal</option>
                <option value="Proses">Proses</option>
                <option value="Berhasil">Berhasil</option>

            </select>
        </div>
    <?php } ?>


    <div class="winput tmargin">
        <button type="submit" name="btn-input" style="left: 0px"> Update Cuti </button>
    </div>
</form>