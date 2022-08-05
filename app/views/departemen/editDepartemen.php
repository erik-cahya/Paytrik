<form method="POST" action="<?= ROOT ?>/departemen/editDepartemen/<?= $data["dataDepartemen"]["id_departemen"] ?>">

    <p class="error"></p>
    <div class="winput bflex">
        <div class="cinput rmargin">
            <span> Id Departemen </span>
            <input type="text" name="id_departemen" placeholder="Masukan id departemen . . ." value="<?= $data["dataDepartemen"]["id_departemen"] ?>" readonly>
        </div>
        <div class="cinput">
            <span> Nama Departemen </span>
            <input type="text" name="nama_departemen" placeholder="Masukan nama departemen . . ." value="<?= $data["dataDepartemen"]["nama_departemen"] ?>">
        </div>
    </div>
    <div class="winput tmargin">
        <button type="submit" name="btnUpdate" style="left: 0px"> Update Departemen </button>
    </div>

</form>