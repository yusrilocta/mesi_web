<?php
session_start();
include 'koneksi.php';
// READ
$sql = "SELECT * FROM data_sekolah";
$result = $koneksi->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
 
     $_SESSION['namasek'] = $row["nama"];

    }
} else {
    echo "Tidak ada data sekolah.";
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
.bgbg{
    background-color : #87d2ed;
}
    </style>
    <title><?php echo $_SESSION['namasek'] ?></title>
  </head>
  <body class="d-flex flex-column min-vh-100">
  <nav class="navbar navbar-expand-lg navbar-light bgbg">
  <div class="container">
    <a class="navbar-brand" href="index.php" style="display: flex; align-items: center;">
      <img src="logo.png" class="img-thumbnail img-fluid" alt="Logo" style="height: 30px; margin-right: 10px;">
      <?php echo $_SESSION['namasek'] ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Profil
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="identitas.php">Identitas</a></li>
                        <li><a class="dropdown-item" href="page.php?page=8">Data Guru</a></li>
            <li><a class="dropdown-item" href="page.php?page=1">Sejarah Singkat</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="page.php?page=2">Visi & Misi</a></li>
            <li><a class="dropdown-item" href="page.php?page=3">Tata Tertib</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kurikulum
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="page.php?page=4">Kalender Pendidikan</a></li>
            <li><a class="dropdown-item" href="page.php?page=5">Kalender Sekolah</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kesiswaan
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="page.php?page=6">Osis</a></li>
            <li><a class="dropdown-item" href="page.php?page=7">Pramuka</a></li>

          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="page.php?page=9">Fasilitas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="page.php?page=10">Galeri</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="daftar.php">Pendaftaran</a>
        </li>
      </ul>
    </div>
  </div>
</nav>