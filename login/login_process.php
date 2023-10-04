<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$host = 'sql309.infinityfree.com';
$username = 'if0_35117480';
$password = 'ayAa8KGwz8zI3ir';
$database = 'if0_35117480_sekolah';

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Hindari SQL Injection dengan menggunakan prepared statement
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            // Login berhasil, arahkan ke halaman selanjutnya
            $_SESSION["email"] = $email;
            header("Location: ../admin/dashboard.php"); // Ganti dengan halaman selanjutnya setelah login berhasil
        } else {
            // Login gagal, tampilkan pesan error
            echo "Login gagal. Silakan cek kembali email dan password Anda.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
