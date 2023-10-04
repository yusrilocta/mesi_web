<?php
include 'koneksi.php';

include 'header.php';

if (isset($_POST['sumb'])) {
    $nama = $_POST["nama"];
    $nohp = $_POST["nohp"];
    $ttl = $_POST["ttl"];
    $asalsek = $_POST["asalsek"];
    $alamat = $_POST["alamat"];
    $nisn = $_POST["nisn"];

    $sql = "INSERT INTO daftar (nama, nohp, ttl, asalsek, alamat, nisn) VALUES ('$nama', '$nohp', '$ttl', '$asalsek', '$alamat', '$nisn')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: daftar.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
    <div class="container mt-5">
        <h1>Pendaftaran Siswa Baru</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="nohp" class="form-label">No. HP:</label>
                <input type="text" class="form-control" id="nohp" name="nohp" required>
            </div>
            <div class="mb-3">
    <label for="ttl" class="form-label">Tanggal Lahir:</label>
    <input type="date" class="form-control" id="ttl" name="ttl" required>
</div>

            <div class="mb-3">
                <label for="asalsek" class="form-label">Asal Sekolah:</label>
                <input type="text" class="form-control" id="asalsek" name="asalsek" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="nisn" class="form-label">NISN:</label>
                <input type="text" class="form-control" id="nisn" name="nisn" required>
            </div>
            <button type="submit" name="sumb" class="btn btn-primary">DAFTAR KE SEKOLAH</button>
        </form>
    </div>

<?php include 'footer.php' ?>