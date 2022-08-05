<div class="page">
    <div class="bflex move">
        <h1> Input Cuti </h1>
        <div class="cross cflex">
            <a href="<?= ROOT ?>/Cuti/tampilCuti"> Tampil<font style="color: #18154f">_</font>Cuti </a>
            <p> Anda dapat melihat data cuti <br /> tekan tombol disamping. </p>
        </div>
    </div>
    <ul>
        <?php if ($_SESSION['level'] == 'Admin') { ?>
            <li><a href="<?= ROOT ?>/Departemen"> Departemen </a></li>
            <li><a href="<?= ROOT ?>/Jabatan"> Jabatan </a></li>
            <li><a href="<?= ROOT ?>/Pegawai"> Pegawai </a></li>
            <li style="border-bottom: 2px solid #5388f3;"><a href="<?= ROOT ?>/Cuti" style="color: #5388f3; font-weight: bold;"> Cuti </a></li>
        <?php } ?>
        <?php if ($_SESSION['level'] == 'Kepala Departemen') { ?>
            <li><a href="<?= ROOT ?>/Pegawai"> Pegawai </a></li>
            <li style="border-bottom: 2px solid #5388f3;"><a href="<?= ROOT ?>/Cuti" style="color: #5388f3; font-weight: bold;"> Cuti </a></li>
        <?php } ?>
        <?php if ($_SESSION['level'] == 'Pegawai') { ?>
            <li style="border-bottom: 2px solid #5388f3;"><a href="<?= ROOT ?>/Cuti" style="color: #5388f3; font-weight: bold;"> Cuti </a></li>
        <?php } ?>
    </ul>
</div>


<form method="POST" enctype="multipart/form-data">
    <p class="error"></p>
    <div class="winput bflex">

        <div class="cinput rmargin">
            <span> Id Cuti </span>
            <input type="number" name="id_cuti" placeholder="Masukan id cuti . . .">
        </div>

        <div class="cinput">
            <span> NIK </span>
            <input type="hidden" name="nik" id="nik">
            <input type="text" id="nik_field" readonly />
        </div>
    </div>

    <div class="winput tmargin">
        <span> Nama Pegawai </span>
        <select name="id_pegawai" id="nama_pegawai">
            <option selected disabled>Pilih Pegawai ..</option>
            <?php
            $connect = mysqli_connect("localhost", "root", "", "sertifikasi");
            $sql = mysqli_query($connect, "SELECT * FROM pegawai ORDER BY nik DESC");
            while ($data = mysqli_fetch_array($sql)) {
                echo '<option value=" ' . $data['nik'] . '">' . $data['nama_pegawai'] . '</option>';
            } ?>
        </select>
    </div>

    <div class="winput tmargin">
        <span> Jabatan </span>
        <input type="hidden" name="id_jabatan" id="id_jabatan">
        <input type="text" id="nama_jabatan" readonly />

    </div>

    <div class="winput tmargin">
        <span> Tanggal Mulai Cuti </span>
        <input type="date" name="tgl_mulai_cuti" placeholder="Masukan Mulai Cuti . . .">
    </div>

    <div class="winput tmargin">
        <span> Tanggal Berakhir Cuti </span>
        <input type="date" name="tgl_berakhir_cuti" placeholder="Masukkan Tanggal Berakhir Cuti . . .">
    </div>

    <div class="winput tmargin">
        <button type="submit" name="btn-input" style="left: 0px"> Input Cuti </button>
    </div>
</form>

</div>
</div>
</div>
</div>
<script type="text/javascript" src="<?= ROOT ?>/dist/js/script.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#nama_pegawai').on('change', function() {
            var id = $(this).val();
            $.ajax({
                url: 'http://localhost/sertifikasi/app/views/cuti/autofill.php?nik=' + id,
                method: "POST",
                success: function(data) {
                    var data = JSON.parse(data);
                    $('#id_jabatan').val(data.id_jabatan);
                    $('#nama_jabatan').val(data.nama_jabatan);
                    $('#nik_field, #nik').val(data.nik);
                }
            })
        })
    });
</script>

</body>

</html>

<?php
if (isset($_POST['btn-input'])) {
    $connect = mysqli_connect("localhost", "root", "", "sertifikasi");

    $id_cuti = $_POST['id_cuti'];
    $nik = $_POST['nik'];
    $id_jabatan = $_POST['id_jabatan'];
    $tgl_mulai_cuti = $_POST['tgl_mulai_cuti'];
    $tgl_berakhir_cuti = $_POST['tgl_berakhir_cuti'];
    $status = "Proses";

    $sql1 = mysqli_query($connect, "INSERT INTO cuti VALUES('$id_cuti', '$nik', '$id_jabatan', '$tgl_mulai_cuti', '$tgl_berakhir_cuti', '$status')");

    if ($sql1) {
        $sql2 = mysqli_query($connect, "UPDATE cuti SET status = '$status' WHERE id_cuti = '$id_cuti'");

        if ($sql2) {
            echo "<script>
								alert('Selamat pengajuan berhasil !, Status pengajuan cuti anda menjadi Proses');
                                location.href = 'cuti/tampilCuti';
							</script>";
        } else {
            echo "<script>
								var error = document.getElementsByClassName('error')[0];
									error.style.display='block';
								error.innerHTML = 'Error2 !';
							</script>";
        }
    } else {
        echo "<script>
							var error = document.getElementsByClassName('error')[0];
							error.style.display='block';
							error.innerHTML = 'Error1 !';
						</script>";
    }
}

?>