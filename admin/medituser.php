<?php include '../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM user WHERE id = $id";
    $result = mysqli_query($koneksi, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $nama = $row['nama'];
        $alamat = $row['alamat'];
        $email = $row['email'];
        $nohp = $row['nohp'];
        $jabatan = $row['jabatan'];
        $status = $row['status'];
        $tahunmasuk = $row['tahunmasuk'];
    } else {
        echo "Pengguna tidak ditemukan.";
        exit();
    }
} else {
    echo "ID pengguna tidak diberikan.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang diubah dari form
    $nama_baru = $_POST['nama'];
    $alamat_baru = $_POST['alamat'];
    $email_baru = $_POST['email'];
    $nohp_baru = $_POST['nohp'];
    $jabatan_baru = $_POST['jabatan'];
    $status_baru = $_POST['status'];
    $tahunmasuk_baru = $_POST['tahunmasuk'];

    // Update data pengguna di database
    $sql_update = "UPDATE user SET
        nama = '$nama_baru',
        alamat = '$alamat_baru',
        email = '$email_baru',
        nohp = '$nohp_baru',
        jabatan = '$jabatan_baru',
        status = '$status_baru',
        tahunmasuk = '$tahunmasuk_baru'
        WHERE id = $id";

    if (mysqli_query($koneksi, $sql_update)) {
        header ('location:muser.php');
    } else {
        echo "Error: " . $sql_update . "<br>" . mysqli_error($conn);
    }
}
include 'header.php';
?>

<div class="container mt-5">
        <h1>Edit Profil</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="mb-3">
                <label for="nohp" class="form-label">No. HP:</label>
                <input type="tel" class="form-control" id="nohp" name="nohp" value="<?php echo $nohp; ?>" required>
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan:</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $jabatan; ?>" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status:</label>
                <input type="text" class="form-control" id="status" name="status" value="<?php echo $status; ?>" required>
            </div>
            <div class="mb-3">
                <label for="tahunmasuk" class="form-label">Tahun Masuk:</label>
                <input type="number" class="form-control" id="tahunmasuk" name="tahunmasuk" value="<?php echo $tahunmasuk; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

<?php include 'footer.php' ?>