<?php
include 'koneksi.php';
// CREATE
if (isset($_POST['submit_user'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $jabatan = $_POST['jabatan'];
    $status = $_POST['status'];
    $tahunmasuk = $_POST['tahunmasuk'];

    $sql = "INSERT INTO user (nama, alamat, email, nohp, jabatan, status, tahunmasuk) VALUES ('$nama', '$alamat', '$email', '$nohp', '$jabatan', '$status', '$tahunmasuk')";
    if ($koneksi->query($sql) === TRUE) {
        echo "Data user berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// READ
$sql = "SELECT * FROM user";
$result = $koneksi->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Nama: " . $row["nama"] . "<br>";
        echo "Alamat: " . $row["alamat"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "No. HP: " . $row["nohp"] . "<br>";
        echo "Jabatan: " . $row["jabatan"] . "<br>";
        echo "Status: " . $row["status"] . "<br>";
        echo "Tahun Masuk: " . $row["tahunmasuk"] . "<br>";
        echo "<br>";
    }
} else {
    echo "Tidak ada data user.";
}

// UPDATE
if (isset($_POST['update_user'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $jabatan = $_POST['jabatan'];
    $status = $_POST['status'];
    $tahunmasuk = $_POST['tahunmasuk'];

    $sql = "UPDATE user SET nama='$nama', alamat='$alamat', email='$email', nohp='$nohp', jabatan='$jabatan', status='$status', tahunmasuk='$tahunmasuk' WHERE id=$id";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data user berhasil diperbarui.";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// DELETE
if (isset($_GET['delete_user'])) {
    $id = $_GET['delete_user'];
    $sql = "DELETE FROM user WHERE id=$id";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data user berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>

<!-- Form input HTML untuk user -->
<form method="POST">
    <label>Nama:</label>
    <input type="text" name="nama" required><br>

    <label>Alamat:</label>
    <input type="text" name="alamat" required><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>No. HP:</label>
    <input type="text" name="nohp" required><br>

    <label>Jabatan:</label>
    <input type="text" name="jabatan" required><br>

    <label>Status:</label>
    <input type="text" name="status" required><br>

    <label>Tahun Masuk:</label>
    <input type="text" name="tahunmasuk" required><br>

    <button type="submit" name="submit_user">Simpan</button>
</form>
