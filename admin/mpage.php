<?php include 'header.php';
include '../koneksi.php';

if (isset($_POST['update_posting'])) {
  $id = $_POST['id'];
  $judul = $_POST['judul'];
  $isi = $_POST['isi'];

  $sql = "UPDATE paged SET judul='$judul', isi='$isi' WHERE id=$id";

  if ($koneksi->query($sql) === TRUE) {
      echo "Posting berhasil diperbarui.";
  } else {
      echo "Error: " . $sql . "<br>" . $koneksi->error;
  }
}

?>
<div class="container mt-4">
        <div class="row">
            <div class="col-lg-8">
<h2 class="mb-3">Daftar halaman</h2>

                <?php
                    // Jumlah postingan per halaman
$jumlah_postingan_per_halaman = 10;

// Menghitung total jumlah postingan
$query_jumlah_postingan = "SELECT COUNT(*) AS total FROM paged";
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
$query_postingan = "SELECT * FROM paged LIMIT $offset, $jumlah_postingan_per_halaman";
$result_postingan = mysqli_query($koneksi, $query_postingan);

// Menampilkan postingan
if ($result_postingan->num_rows > 0) {
while ($row = mysqli_fetch_assoc($result_postingan)) {
   
?>
<div class="card mb-3">
  <div class="row">
    <div class="col">
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
         <a href="../page.php?page=<?php echo $row['id'];?>" class="btn btn-primary">BACA</a>
         <a href="../edit_page.php?id=<?php echo $row['id'];?>" class="btn btn-warning">EDIT Halaman</a>
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
                    <li class="list-group-item">Kategori 1</li>
                    <li class="list-group-item">Kategori 2</li>
                    <li class="list-group-item">Kategori 3</li>
                    <li class="list-group-item">Kategori 4</li>
                </ul>
            </div>
        </div>
    </div>


<?php include 'footer.php' ?>