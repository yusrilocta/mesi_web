<?php
// Koneksi ke database MySQL
$host = "localhost"; // Ganti dengan host MySQL Anda
$user = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$database = "sekolah"; // Ganti dengan nama database Anda

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$judul = $_POST['judul'];
$isi = $_POST['isi'];

// Simpan data ke dalam tabel di database
$sql = "INSERT INTO posting (judul, isi) VALUES ('$judul', '$isi')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
