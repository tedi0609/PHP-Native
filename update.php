<?php
require 'file-storage.php';
$filename='DataAnggota.txt';
//Fungsi untuk mencegah inputan karakter yang tidak sesuai
function input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
}
$getData = getData($filename,input($_GET["id_anggota"]));

if (isset($_POST["submit"])) {
	$filename='DataAnggota.txt';
	$getData = getData($filename,input($_GET["id_anggota"]));

  $data = [
			'id_anggota' => input($_GET["id_anggota"]),
      'nik' => htmlspecialchars($_POST["nik_anggota"]),
      'nama_anggota' => htmlspecialchars($_POST["nm_anggota"]),
      'jenis_kelamin' => htmlspecialchars($_POST["jk"]),
      'alamat' => htmlspecialchars($_POST["alamat"]),
			'waktu' => htmlspecialchars($getData["waktu"])
  ];

  $result = update($filename, $data, input($_GET["id_anggota"]));
    if ($result) {
        echo "<script type='text/javascript'>
                alert('Data berhasil disimpan...!');
                document.location.href = 'index.php';
            </script>";
    }else{
			echo "<script type='text/javascript'>
							alert('Data GAGAL disimpan...!');
							document.location.href = 'create.php';
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
	<div class="container">
		<h2>Update Data</h2>
		<form action="" method="post" onsubmit="return cekform()">
			<div class="mb-3">
				<label class="form-label">Nama:</label>
				<input type="text" name="nm_anggota" id="nm_anggota" class="form-control" placeholder="Masukan Nama" value="<?=$getData["nama_anggota"]?>" required />

			</div>
			<div class="mb-3">
				<label class="form-label">NIK:</label>
				<input type="text" name="nik_anggota" id="nik_anggota" class="form-control" value="<?=$getData["nik"]?>" placeholder="Masukan NIK" required/>

			</div>
			<div class="mb-3">
				<label class="form-label">Jenis Kelamin:</label>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="jk" id="lk" value="Laki-Laki" <?php if ($getData['jenis_kelamin']=='Laki-Laki' ) echo 'checked' ?>>
					<label class="form-check-label" for="lk">
						Laki-Laki
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="jk" id="pr" value="Perempuan" <?php if ($getData['jenis_kelamin']=='Perempuan' ) echo 'checked' ?>>
					<label class="form-check-label" for="flexRadioDefault2">
						Perempuan
					</label>
				</div>
			</div>
			<div class="mb-3">
				<label>Alamat:</label>
				<textarea name="alamat" id="alamat" class="form-control" rows="5" placeholder="Masukan Alamat" required><?=$getData["alamat"]?></textarea>
			</div>
			<input type="hidden" name="id_anggota" value="<?php echo $getData['id_anggota']; ?>" />

			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</body>

</html>
