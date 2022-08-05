<div class="page">
	<div class="bflex move">
		<h1> Input Pegawai </h1>
		<div class="cross cflex">
			<a href="<?= ROOT ?>/pegawai/tampilPegawai"> Tampil Pegawai </a>
			<p> Anda dapat melihat pegawai <br /> tekan tombol disamping. </p>
		</div>
	</div>


	<ul>
		<?php if ($_SESSION['level'] == 'Admin') { ?>
			<li><a href="<?= ROOT ?>/Departemen"> Departemen </a></li>
			<li><a href="<?= ROOT ?>/Jabatan"> Jabatan </a></li>
			<li style="border-bottom: 2px solid #5388f3;"><a style="color: #5388f3; font-weight: bold;" href="<?= ROOT; ?>/Pegawai"> Pegawai </a></li>
			<li><a href="<?= ROOT ?>/Cuti"> Cuti </a></li>
		<?php } ?>
		<?php if ($_SESSION['level'] == 'Kepala Departemen') { ?>
			<li><a style="border-bottom: 2px solid #5388f3; color: #5388f3; font-weight: bold;" href="<?= ROOT ?>/pegawai"> Pegawai </a></li>
			<li><a href="<?= ROOT; ?>/cuti"> Cuti </a></li>
		<?php } ?>
		<?php if ($_SESSION['level'] == 'Pegawai') { ?>
			<li style="border-bottom: 2px solid #5388f3; color: #5388f3; font-weight: bold;"><a href="<?= ROOT ?>/inputcuti"> Cuti </a></li>
		<?php } ?>
	</ul>
</div>


<!-- Input Data Pegawai -->
<form method="POST" action="<?= ROOT ?>/pegawai/addPegawai" enctype="multipart/form-data">
	<p class="error"></p>
	<div class="winput bflex">
		<div class="cinput rmargin">
			<span> NIK </span>
			<input type="number" name="nik" placeholder="Masukan NIK . . .">
		</div>
		<div class="cinput">
			<span> Nama Pegawai </span>
			<input type="text" name="nama_pegawai" placeholder="Masukkan nama pegawai . . .">
		</div>
	</div>
	<div class="winput tmargin">
		<span> Tempat Lahir </span>
		<input type="text" name="tempat_lahir" placeholder="Masukan Tempat Lahir . . .">
	</div>
	<div class="winput tmargin">
		<span> Tanggal Lahir </span>
		<input type="date" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir . . .">
	</div>
	<div class="winput tmargin">
		<span> Jenis Kelamin </span>
		<select name="jenis_kelamin">
			<option disabled selected>Pilih Jenis Kelamin</option>
			<option value="Pria">Pria</option>
			<option value="Wanita">Wanita</option>
		</select>
	</div>
	<div class="winput tmargin">
		<span> No Hp</span>
		<input type="number" name="no_hp" placeholder="Masukkan No Hp . . .">
	</div>
	<div class="winput tmargin">
		<span> Email </span>
		<input type="email" name="email" placeholder="Masukkan Email . . .">
	</div>
	<div class="winput tmargin">
		<span>Alamat</span>
		<textarea name="alamat" placeholder="Masukan alamat . . ."></textarea>
	</div>

	<div class="winput tmargin">
		<span> Jabatan </span>

		<select name="id_jabatan" id="id_jabatan" class="input">
			<option disabled selected>Pilih Jabatan</option>
			<?php foreach ($data['dataJabatan'] as $pegawai) : ?>
				<option value="<?= $pegawai["id_jabatan"]; ?>" name="id_jabatan"><?= $pegawai["nama_jabatan"]; ?></option>
			<?php endforeach; ?>
		</select>

	</div>
	<br>
	<div class="winput tmargin">
		<button type="submit" name="savePegawai" style="left: 0px"> Input Pegawai </button>
	</div>
</form>