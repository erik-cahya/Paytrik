<form method="POST" action="<?= ROOT ?>/jabatan/editJabatan/<?= $data["dataJabatan"]["id_jabatan"] ?>">

    <p class="error"></p>
    <div class="winput bflex">
        <div class="cinput rmargin">
            <span> Id Jabatan </span>
            <input type="text" name="id_jabatan" placeholder="Masukan id_jabatan . . ." value="<?= $data["dataJabatan"]["id_jabatan"] ?>" readonly>
        </div>

        <div class="cinput">
            <span> Nama Departemen </span>
            <select name="id_departemen" id="id_departemen" class="input">
                <?php foreach ($data["dataDepartemen"] as $departemen) : ?>
                    <option value="<?= $departemen["id_departemen"] ?>"><?= $departemen["nama_departemen"]; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

    </div>
    <div class="winput tmargin">
        <span> Nama Jabatan </span>
        <input type="text" name="nama_jabatan" placeholder="Masukan nama jabatan . . ." value="<?= $data["dataJabatan"]["nama_jabatan"] ?>">
    </div>
    <div class="winput tmargin">
        <span> Gaji Tunjangan </span>
        <input type="number" name="gaji_tunjangan" placeholder="Masukan gaji tunjangan . . ." value="<?= $data["dataJabatan"]["gaji_tunjangan"] ?>">
    </div>
    <div class="winput tmargin">
        <button type="submit" name="btnUpdate" style="left: 0px"> Update Jabatan </button>
    </div>
</form>