<?php
session_start();

// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'nama_database'); // Ganti dengan nama database-mu

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Cek apakah username dan password sesuai
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login berhasil
    $_SESSION['username'] = $username;
    header("Location: home.html"); // Redirect ke halaman utama
} else {
    // Login gagal
    echo "<script>alert('Username atau password salah!'); window.location.href = 'login.html';</script>";
}

$conn->close();
?>
