<?php
include 'koneksi.php';
// CREATE
if (isset($_POST['submit_data_sekolah'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $link = $_POST['link'];
    $tahun = $_POST['tahun'];
    $akreditas = $_POST['akreditas'];

    $sql = "INSERT INTO data_sekolah (nama, alamat, link, tahun, akreditas) VALUES ('$nama', '$alamat', '$link', '$tahun', '$akreditas')";
    if ($koneksi->query($sql) === TRUE) {
        echo "Data sekolah berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// READ
$sql = "SELECT * FROM data_sekolah";
$result = $koneksi->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "Nama: " . $row["nama"] . "<br>";
        echo "Alamat: " . $row["alamat"] . "<br>";
        echo "Link: " . $row["link"] . "<br>";
        echo "Tahun: " . $row["tahun"] . "<br>";
        echo "Akreditas: " . $row["akreditas"] . "<br>";
        echo "<br>";
    }
} else {
    echo "Tidak ada data sekolah.";
}

// UPDATE
if (isset($_POST['update_data_sekolah'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $link = $_POST['link'];
    $tahun = $_POST['tahun'];
    $akreditas = $_POST['akreditas'];

    $sql = "UPDATE data_sekolah SET nama='$nama', alamat='$alamat', link='$link', tahun='$tahun', akreditas='$akreditas' WHERE id=$id";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data sekolah berhasil diperbarui.";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

// DELETE
if (isset($_GET['delete_data_sekolah'])) {
    $id = $_GET['delete_data_sekolah'];
    $sql = "DELETE FROM data_sekolah WHERE id=$id";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data sekolah berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>

<!-- Form input HTML untuk data sekolah -->
<form method="POST">
    <label>Nama:</label>
    <input type="text" name="nama" required><br>

    <label>Alamat:</label>
    <input type="text" name="alamat" required><br>

    <label>Link:</label>
    <input type="text" name="link" required><br>

    <label>Tahun:</label>
    <input type="text" name="tahun" required><br>

    <label>Akreditas:</label>
    <input type="text" name="akreditas" required><br>

    <button type="submit" name="submit_data_sekolah">Simpan</button>
</form>
