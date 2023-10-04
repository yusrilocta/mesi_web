<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit();
}

if (isset($_GET['log'])) {
    $_SESSION['email'] = NULL;
    header("Location: ../index.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    /* Ganti warna latar belakang dan tinggi navbar sesuai kebutuhan Anda */
    #sidebar {
        background-color: #fff; /* Ganti dengan warna latar belakang yang Anda inginkan */
        height: 100vh; /* 100% tinggi tampilan */
        position: fixed; /* Tetap posisi saat digulir */
    }

    /* Ganti warna latar belakang dan gaya link sesuai kebutuhan Anda */
    #sidebar .nav-link {
        background-color: #f8f9fa; /* Ganti dengan warna latar belakang yang Anda inginkan */
        color: #333; /* Ganti dengan warna teks yang Anda inginkan */
    }

    /* Ganti warna latar belakang link aktif sesuai kebutuhan Anda */
    #sidebar .nav-link.active {
        background-color: #007bff; /* Ganti dengan warna latar belakang yang Anda inginkan untuk link aktif */
        color: #fff; /* Ganti dengan warna teks yang Anda inginkan untuk link aktif */


    }
    @media (max-width: 768px) {
    #sidebar.active {
        display: none;
    }
    .btn-primary.d-md-none {
        display: block;
    }
    .toggle-button {
        position: fixed;
        bottom: 20px; /* Jarak dari bawah */
        left: 20px; /* Jarak dari kiri */
        z-index: 999; /* Z-index untuk menentukan lapisan */
    }
}
</style>
  
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-primary fixed-top">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav d-flex">
                    <li class="nav-item">
                        <a class="nav-link" href="muser.php">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?log=1">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->
    <div class="container-fluid" style="margin-top: 60px;">
    <button class="btn btn-primary d-md-none toggle-button" onclick="toggleSidebar()">
                 Menu
            </button>
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mposting.php">
                                Artikel
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mpage.php">
                                Halaman
                            </a>
                        <a class="nav-link" href="midentitas.php">
                                Identitas
                            </a>
                        </li>
                        <a class="nav-link" href="muser.php">
                                Admin
                            </a>
                        </li>
                        </li>
                        <a class="nav-link" href="mdaftar.php">
                                Pendaftaran
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- Konten Utama -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Isi konten admin di sini -->
