<div class="page">
	<div class="bflex move">
		<h1> Input Objek Wisata </h1>
		<div class="cross cflex">
			<a href="<?= ROOT ?>/wisata/tampilWisata"> Tampil Wisata </a>
			<p> Anda dapat melihat objek wisata <br /> tekan tombol disamping. </p>
		</div>
	</div>
	<ul>
		<?php if ($_SESSION['level'] == 'Admin') { ?>
			<li><a href="<?= ROOT ?>/Departemen"> Departemen </a></li>
			<li><a href="<?= ROOT ?>/Jabatan"> Jabatan </a></li>
			<li><a href="<?= ROOT; ?>/Pegawai"> Pegawai </a></li>
			<li><a href="<?= ROOT ?>/Cuti"> Cuti </a></li>
			<li style="border-bottom: 2px solid #5388f3;"><a style="color: #5388f3; font-weight: bold;" href="<?= ROOT; ?>/Pegawai"> Objek Wisata </a></li>
		<?php } ?>
	</ul>
</div>

<!-- Input Data Wisata -->
<form method="POST" action="<?= ROOT ?>/wisata/addWisata" enctype="multipart/form-data">
	<p class="error"></p>
	<div class="winput bflex">
		<input type="hidden" name="id_objek" placeholder="Masukan Id Objek Wisata . . ." readonly>

		<div class="cinput">
			<span> Nama Objek Wisata </span>
			<input type="text" name="nama_objek_wisata" placeholder="Masukkan nama objek wisata . . .">
		</div>
	</div>
	<div class="winput tmargin">
		<span> Kabupaten </span>
		<input type="text" name="kabupaten" placeholder="Masukan Kabupaten . . .">
	</div>
	<div class="winput tmargin">
		<span> Jenis Objek Wisata </span>
		<select name="jenis_objek">
			<option disabled selected>Pilih Jenis Objek</option>
			<option value="Wisata Air">Wisata Air</option>
			<option value="Pegunungan">Pegunungan</option>
			<option value="Religi">Religi</option>
		</select>
	</div>
	<div class="winput tmargin">
		<span> Fasilitas Tambahan</span>
		<input type="text" name="fasilitas_tambahan" placeholder="Masukkan Fasilitas Tambahan . . .">
	</div>
	<div class="winput tmargin">
		<span> Biaya Tiket Masuk </span>
		<input type="number" name="biaya_tiket_masuk" placeholder="Masukkan Biaya Tiket Masuk . . .">
	</div>
	<div class="winput tmargin">
		<span>Tanggal Dibuka</span>
		<input type="date" name="tanggal_dibuka" placeholder="Masukan Tanggal . . .">
	</div>
	<br>
	<div class="winput tmargin">
		<button type="submit" name="saveWisata" style="left: 0px"> Input Wisata </button>
	</div>
</form>