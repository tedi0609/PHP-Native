<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Hitung</title>

    <!-- Link CSS Bootstrap Lokal -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>

  

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
  <!-- As a link to navbar.php -->
  <?php include "navbar.php"; ?>
  
<!--start container-->
  <div class="container">
    <div class="p-5 my-4 bg-light rounded-3">
      <h1>Aplikasi Sederhana Hitung Luas Bangunan</h1>
      <p class="lead">Hitung Bangunan yang Anda inginkan</p>
    </div>
    <div class="card mb-3">
      <img src="image/undraw.png" class="img-fluid" alt="...">
      <div class="card-body">

     <p class="card-text"><small class="text-muted">Lombok, Indonesia</small></p>
      </div>
    </div>

    <!--start class row-->
    <div class="row">

      <!--start content jumlah anggota perpustakaan-->
      <div class="col-md-4">
      <div class="card mb-3">
        <div class="card-header">Grafik</div>
        <div class="card-body text-center">
          <h5 class="card-title">Luas</h5>
          <p class="card-text">Jumlah: <?php echo $num_rowsanggota ?></p>
          <p class=""><canvas id="anggotaChart" ></canvas></p>
        </div>
        </div>
      </div>
      <!--end content jumlah anggota perpustakaan-->

      <!--start content jumlah buku-->
      <div class="col-md-6">
      <div class="card">
        <div class="card-header text-white bg-secondary mb-3">Jumlah Buku</div>
        <div class="card-body">
          <h5 class="card-title">Buku Tersedia</h5>
          <p class="card-text">.....</p>
        </div>
        </div>
      </div>
      <!--end content jumlah buku-->

      <!--start content jumlah-->
      <div class="col-md-2">
      <div class="card">
        <div class="card-header text-white bg-secondary mb-3">Jumlah </div>
        <div class="card-body">
          <h5 class="card-title">Tersedia</h5>
          <p class="card-text">.....</p>
        </div>
        </div>
      </div>
      <!--end content jumlah-->

      <!-- end row-->
    </div>


  <hr>
  <footer>
    <div class="row">
      <div class="col-md-6">
        <p>Copyright ©
          <?=date('Y')?> Tedi </p>
      </div>
      <div class="col-md-6 text-md-end">
        <a href="#" class="text-dark">Terms of Use</a>
        <span class="text-muted mx-2">|</span>
        <a href="#" class="text-dark">Privacy Policy</a>
      </div>
    </div>
  </footer>

</div>
  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
  <script>
  var anggotaCh = document.getElementById("anggotaChart");
           var anggotaChart = new Chart(anggotaCh, {
               // tipe chart
               type: 'pie',
               data: {

                   //karena hanya menggunakan 2 batang
                   //maka buat dua lebel, yaitu lebel Aktif dan Ilegal
                   //Aktif berdasarkan data array, ilegal ditentukan secara manual
                   labels: ['Aktif', 'Ilegal'],

                   //dataset adalah data yang akan ditampilkan
                   datasets: [{
                           label: 'jumlah Anggota',

                           //karena hanya menggunakan 2 batang/bar
                           //maka 2 data yang dibutuhkan
                           //hitung jumlah anggota aktif dari jumlag array anggota dan jumlah anggota ilegal secara manual
                           data: [
                               <?php echo $num_rowsanggota ?>, //menggunakan data dari array
                               5, //menggunakan isian data manual yg ditentukan sendiri
                           ],

                           //atur background barchartnya
                           //karena cuma dua, maka 2 saja yang diatur
                           backgroundColor: [
                               'rgba(255, 99, 132, 0.2)',
                               'rgba(54, 162, 235, 0.2)'
                           ],

                           //atur border barchartnya
                           //karena cuma dua, maka 2 saja yang diatur
                           borderColor: [
                               'rgba(255,99,132,1)',
                               'rgba(54, 162, 235, 1)',
                               'rgba(255, 206, 86, 1)'
                           ],
                           borderWidth: 1
                       }]
               },
               options: {
                   scales: {
                       yAxes: [{
                               ticks: {
                                   beginAtZero: true
                               }
                           }]
                   }
               }
           });
       </script>
</body>

</html>
