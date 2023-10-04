<?php
$host = 'sql309.infinityfree.com';
$username = 'if0_35117480';
$password = 'ayAa8KGwz8zI3ir';
$database = 'if0_35117480_sekolah';

$koneksi = new mysqli($host, $username, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}
?>
