<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="index.php" class="navbar-brand">Aplikasi Hitung Luas</a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="index.php?index" class="nav-item nav-link <?php if (isset($_GET["index"])){echo "active"; }?>">Home</a>
                <a href="anggota.php?anggota" class="nav-item nav-link <?php if (isset($_GET["anggota"])){echo "active"; }?>">List Luas</a>
                <a href="segitiga.php" class="nav-item nav-link">Hitung Segitiga</a>
                <a href="persegi.php" class="nav-item nav-link">Hitung Persegi</a>
                <a href="lingkaran.php" class="nav-item nav-link">Hitung Lingkaran</a>
            </div>
        </div>
    </div>
</nav>

