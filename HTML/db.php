<?php
$host = "localhost"; // Host database
$user = "root";      // Username database
$pass = "";          // Password database (kosong jika default)
$db   = "maintify";  // Nama database

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
