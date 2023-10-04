<?php include 'header.php' ?>
<?php
include '../koneksi.php'; // Sertakan file koneksi ke database

// Ambil data pengguna dari database, gantilah 'username' dengan nilai yang sesuai
$username = $_SESSION['email']; // Gantilah dengan nama pengguna yang sesuai
$sql = "SELECT * FROM user WHERE email = '$username'";
$result = mysqli_query($koneksi, $sql);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $nama = $row['nama'];
    $alamat = $row['alamat'];
    $email = $row['email'];
    $nohp = $row['nohp'];
    $jabatan = $row['jabatan'];
    $status = $row['status'];
    $tahunmasuk = $row['tahunmasuk'];
} else {
    echo "Pengguna tidak ditemukan.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Profil Pengguna</h1>
        <table class="table">
            <tr>
                <th>Nama:</th>
                <td><?php echo $nama; ?></td>
            </tr>
            <tr>
                <th>Alamat:</th>
                <td><?php echo $alamat; ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <th>No. HP:</th>
                <td><?php echo $nohp; ?></td>
            </tr>
            <tr>
                <th>Jabatan:</th>
                <td><?php echo $jabatan; ?></td>
            </tr>
            <tr>
                <th>Status:</th>
                <td><?php echo $status; ?></td>
            </tr>
            <tr>
                <th>Tahun Masuk:</th>
                <td><?php echo $tahunmasuk; ?></td>
            </tr>
        </table>
        <a href="medituser.php?id=<?php echo $id;?>" class="btn btn-warning">EDIT Profile</a>
    </div>
</body>
</html>


<?php include 'footer.php' ?>