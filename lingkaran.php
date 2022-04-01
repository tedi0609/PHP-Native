<?php require 'file-storage.php';
if (isset($_POST["submit"])) {
	$filename='DataAnggota.txt';
	$getData = getData($filename);

    // var_dump($getData); die;
    $lastRow = (is_null($getData)) ? 0 : count($getData) - 1 ;
    $id = (is_null($getData)) ? 1 : $getData[$lastRow]['id_anggota']+1;

    $data = [
        'id_anggota' => $id,
        'nik' => htmlspecialchars($_POST["nik_anggota"]),
        'nama_anggota' => htmlspecialchars($_POST["nm_anggota"]),
        'jenis_kelamin' => htmlspecialchars($_POST["jk"]),
        'alamat' => htmlspecialchars($_POST["alamat"]),
        'waktu' => htmlspecialchars($_POST["waktu"])
    ];

    $result = save($filename, $data);
    
    if ($result) {
        echo "<script type='text/javascript'>
                alert('Data berhasil disimpan...!');
                document.location.href = 'list_lingkaran.php';
            </script>";
    }else{
        echo "<script type='text/javascript'>
                alert('Data GAGAL disimpan...!');
                document.location.href = 'list_lingkaran.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Anggota</title>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
  <!-- As a link to navbar.php -->
  <?php include "navbar.php"; ?>
<div class="container">
    <h2>Input Data</h2>

    <form action="" method="post" onsubmit="return cekform()">
        <div class="mb-3">
            <label class="form-label">Phie:</label>
            <input type="number" name="nm_anggota" id="nm_anggota" class="form-control" placeholder="Masukkan Phie" required />

        </div>
        <div class="mb-3">
            <label class="form-label">Jari-jari:</label>
            <input type="number" name="nik_anggota" id="nik_anggota" class="form-control" placeholder="Masukkan Jari-jari" required/>

        </div>
		<input type="hidden" name="waktu" value="<?=date('Y-m-d H:i:s')?>">
</br>
        <button type="submit" name="submit" class="btn btn-primary">Hitung</button>
        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
		<button type="button" class="btn btn-secondary" onclick="self.history.back()">Kembali</button>
    </form>
</div>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
