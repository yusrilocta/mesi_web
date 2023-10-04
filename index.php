<?php
include 'koneksi.php';

include 'header.php';
?>


<div class="container mt-4">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="mb-4">Artikel Terbaru</h2>
                <?php
                    // Jumlah postingan per halaman
$jumlah_postingan_per_halaman = 5;

// Menghitung total jumlah postingan
$query_jumlah_postingan = "SELECT COUNT(*) AS total FROM posting";
$result_jumlah_postingan = mysqli_query($koneksi, $query_jumlah_postingan);
$row_jumlah_postingan = mysqli_fetch_assoc($result_jumlah_postingan);
$total_postingan = $row_jumlah_postingan['total'];

// Menghitung total jumlah halaman
$total_halaman = ceil($total_postingan / $jumlah_postingan_per_halaman);

// Mendapatkan nomor halaman saat ini
$halaman_sekarang = isset($_GET['page']) ? $_GET['page'] : 1;

// Menghitung offset
$offset = ($halaman_sekarang - 1) * $jumlah_postingan_per_halaman;

// Mengambil data postingan sesuai dengan halaman saat ini
$query_postingan = "SELECT * FROM posting LIMIT $offset, $jumlah_postingan_per_halaman";
$result_postingan = mysqli_query($koneksi, $query_postingan);

// Menampilkan postingan
if ($result_postingan->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result_postingan)) {
    // $judul = $row_postingan['judul'];
    // $isi = $row_postingan['isi'];
    // $tanggal = $row_postingan['tanggal'];
    preg_match('/<img[^>]+src="([^">]+)"/', $row["isi"], $match);
        $firstImage = isset($match[1]) ? $match[1] : '';
   
?>
<div class="card mb-3">
  <div class="row">
    <div class="col-md-3" id="IMAGE THUMBNAIL DISNI">
      <!-- Tampilkan gambar pertama sebagai thumbnail -->
      <?php if (!empty($firstImage)) { ?>
                        <img src="<?php echo $firstImage; ?>" class="img-fluid rounded-start" alt="Thumbnail">
                    <?php } ?>
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title fw-bold"><?php echo  $row["judul"]; ?></h5>
        <p class="card-text"><small class="text-muted"><?php echo  $row["tanggal"]; ?></small></p>
        <p class="card-text">
        <?php

// strip tags to avoid breaking any html
$string = strip_tags($row["isi"]);
if (strlen($string) > 100) {

    // truncate string
    $stringCut = substr($string, 0, 100);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    $string .= '...';
}
echo $string;
        ?></p>
         <a href="posting.php?post=<?php echo $row['id'];?>" class="btn btn-primary">BACA SELENGKAPNYA</a>
      </div>
    </div>
  </div>
</div>
                <?php
    }
} else {
    echo "Tidak ada posting.";
}
?>
<nav aria-label="Page navigation example" class="me-2">
  <ul class="pagination justify-content-center">
    <?php


for ($i = 1; $i <= $total_halaman; $i++) {
    echo "<li class='page-item " . ($halaman_sekarang == $i ? 'active' : '') . "'><a class='page-link' href='?page=$i'>$i</a></li>";
}
    ?>
  </ul>
</nav>

            </div>

            <div class="col-lg-4">
                <h2 class="mb-4">Kategori</h2>
                <ul class="list-group">
                    <li class="list-group-item"><p><span id="datetime"></span></p>

<script>
var dt = new Date();
document.getElementById("datetime").innerHTML = dt.toLocaleTimeString();
</script></li>
                    <li class="list-group-item">Google Maps<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9463.537170576732!2d104.39495676148073!3d-4.234434006827969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3903c5ceb706f1%3A0xe976afc25f156b8f!2sSMP%20N%202%20BUAY%20PEMUKA%20PELIUNG!5e0!3m2!1sid!2sid!4v1696062421068!5m2!1sid!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></li>
                    <li class="list-group-item"><div class="row">
            <div class="col">
                <p>Temukan kami di sosial media:</p>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fab fa-youtube fa-3x"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fab fa-facebook fa-3x"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fab fa-instagram fa-3x"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div></li>
                </ul>
            </div>
        </div>
    </div>

<?php include 'footer.php' ?>

