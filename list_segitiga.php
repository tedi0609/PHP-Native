<?php
require 'file-storage.php';
$filename='DataAnggota.txt';
$resultanggota = getData($filename);
$num_rowsanggota = (is_null($resultanggota)) ? 0 : count($resultanggota);

?>
<!DOCTYPE html>
<html>
<head>
    <!-- Load file CSS Bootstrap offline -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<!-- As a link -->
<?php include "navbar.php"; ?>


<div class="container">
  	<div class="p-5 my-4 bg-light rounded-3">
        <h1>Data Bangunan</h1>
        <p class="lead">Aplikasi ini juga dapat diakses dan dicari melalui laman mbah <a href="https://www.google.com" class="text-success" target="_blank">Google</a> .</p>
        <a href="segitiga.php" class="btn btn-primary" role="button">Tambah Data</a>

<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <br>
        <thead>
        <tr>
            <th>No</th>
            <th>Input Alas</th>
            <th>Input Tinggi</th>
            <th>Hasil</th>
            <th>-</th>
            <th>Tanggal</th>
            <th>action</th>
         

        </tr>
        </thead>
        <?php
        $no = 0;
        foreach($resultanggota as $data) {
			$no++;
            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama_anggota"]; ?></td>
                <td><?php echo $data["nik"];   ?></td>
                <td><?php echo $data["jenis_kelamin"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td><?php echo $data["waktu"];   ?></td>
                <td>
                    <a href="update.php?id_anggota=<?php echo htmlspecialchars($data['id_anggota']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="delete.php?id_anggota=<?php echo htmlspecialchars($data['id_anggota']); ?>" onClick="return confirm('Apakah anda yakin ingin menghapus anggota bernama <?php echo $data['nama_anggota'] ?>?')" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
	</div>
	</div>
	</div>


<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
