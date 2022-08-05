<form method="POST" action="<?= ROOT ?>/pegawai/editPegawai/<?= $data["dataPegawai"]["nik"] ?>">
    <p class="error"></p>
    <div class="winput bflex">
        <div class="cinput rmargin">
            <span> NIK </span>
            <input type="number" name="nik" placeholder="Masukan NIK . . ." value="<?= $data["dataPegawai"]["nik"] ?>">
        </div>
        <div class="cinput">
            <span> Nama Pegawai </span>
            <input type="text" name="nama_pegawai" placeholder="Masukkan nama pegawai . . ." value="<?= $data["dataPegawai"]["nama_pegawai"] ?>">
        </div>
    </div>
    <div class="winput tmargin">
        <span> Tempat Lahir </span>
        <input type="text" name="tempat_lahir" placeholder="Masukan Tempat Lahir . . ." value="<?= $data["dataPegawai"]["tempat_lahir"] ?>">
    </div>
    <div class="winput tmargin">
        <span> Tanggal Lahir </span>
        <input type="date" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir . . ." value="<?= $data["dataPegawai"]["tanggal_lahir"] ?>">
    </div>
    <div class="winput tmargin">
        <span> Jenis Kelamin </span>
        <select name="jenis_kelamin">
            <option disable selected>Pilih Jenis Kelamin</option>
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
        </select>
    </div>
    <div class="winput tmargin">
        <span> No Hp</span>
        <input type="number" name="no_hp" placeholder="Masukkan No Hp . . ." value="<?= $data["dataPegawai"]["no_hp"] ?>">
    </div>
    <div class="winput tmargin">
        <span> Email </span>
        <input type="email" name="email" placeholder="Masukkan Email . . ." value="<?= $data["dataPegawai"]["email"] ?>">
    </div>
    <div class="winput tmargin">
        <span>Alamat</span>
        <textarea name="alamat" placeholder="Masukan alamat . . ."><?= $data["dataPegawai"]["alamat"] ?></textarea>
    </div>

    <div class="winput tmargin">
        <span> Jabatan </span>
        <select name="id_jabatan" id="id_jabatan" class="input">
            <option disabled selected>Pilih Jabatan</option>
            <?php foreach ($data["dataJabatan"] as $jabatan) : ?>
                <option value="<?= $jabatan["id_jabatan"] ?>"><?= $jabatan["nama_jabatan"] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="winput tmargin">
        <button type="submit" name="btn-update" style="left: 0px"> Update Pegawai </button>
    </div>

</form>