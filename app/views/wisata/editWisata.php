<form method="POST" action="<?= ROOT ?>/wisata/editWisata/<?= $data["dataWisata"]["id_objek"] ?>">
    <p class="error"></p>
    <div class="winput bflex">
		<div class="cinput rmargin">
			<span> Id Objek Wisata </span>
			<input type="number" name="id_objek" placeholder="Masukan Id Objek Wisata . . ." value="<?= $data["dataWisata"]["id_objek"]?>" readonly>
		</div>
		<div class="cinput">
			<span> Nama Objek Wisata </span>
			<input type="text" name="nama_objek_wisata" placeholder="Masukkan nama objek wisata . . ." value="<?= $data["dataWisata"]["nama_objek_wisata"] ?>" >
		</div>
	</div>
	<div class="winput tmargin">
		<span> Kabupaten </span>
		<input type="text" name="kabupaten" placeholder="Masukan Kabupaten . . ." value="<?= $data["dataWisata"]["kabupaten"] ?>">
	</div>
	<div class="winput tmargin">
		<span> Jenis Objek Wisata </span>
		<select name="jenis_objek" >
			<option disabled selected>Pilih Jenis Objek..</option>
	
			<option value="Wisata Air">Wisata Air</option>
			<option value="Pegunungan">Pegunungan</option>
			<option value="Religi">Religi</option>
			
		</select>
	</div>
	<div class="winput tmargin">
		<span> Fasilitas Tambahan</span>
		<input type="text" name="fasilitas_tambahan" placeholder="Masukkan Fasilitas Tambahan . . ." value="<?= $data["dataWisata"]["fasilitas_tambahan"] ?>">
	</div>
	<div class="winput tmargin">
		<span> Biaya Tiket Masuk </span>
		<input type="number" name="biaya_tiket_masuk" placeholder="Masukkan Biaya Tiket Masuk . . ."value="<?= $data["dataWisata"]["biaya_tiket_masuk"] ?>">
	</div>
	<div class="winput tmargin">
		<span>Tanggal Dibuka</span>
		<input type="datetime" name="tanggal_dibuka" placeholder="Masukan Tanggal . . ."value="<?= $data["dataWisata"]["tanggal_dibuka"] ?>">
	</div>
    <div class="winput tmargin">
        <button type="submit" name="btn-update" style="left: 0px"> Update Wisata </button>
    </div>

</form>