<?php include 'header.php' ?>
<div class="container mt-5">
<?php
            // Koneksi ke database MySQL
        include 'koneksi.php';
            
            $koneksi = mysqli_connect($host, $username, $password, $database);

            if (!$koneksi) {
                die("Koneksi gagal: " . mysqli_connect_error());
            }

            // Query untuk mengambil data dari tabel posting
            $id = $_GET['post'];
            $query = "SELECT * FROM posting WHERE id = $id";
            $result = mysqli_query($koneksi, $query);

            // Loop untuk menampilkan artikel
            while ($row = mysqli_fetch_assoc($result)) {
        echo "<h1 class='card-title'>" . $row['judul'] . "</h1>";
                echo "<div class='card mt-3  mb-3'>";
                echo "<div class='card-body'>";
                echo "<p class='card-text lh-sm' style='text-align: justify;'>" . $row['isi'] . "</p>";
                echo "<p class='card-text'>Tanggal: " . $row['tanggal'] . "</p>";
                echo "</div>";
                echo "</div>";
            }

            // Tutup koneksi ke database
            mysqli_close($koneksi);
        ?>
    </div>

<?php include 'footer.php' ?>