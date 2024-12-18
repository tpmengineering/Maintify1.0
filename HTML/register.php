<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "maintify";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $nik = ltrim($_POST['nik'], '0'); // Hilangkan leading zero pada NIK
    $password = $_POST['password'];

    // Cek apakah NIK sudah ada di database
    $stmt = $conn->prepare("SELECT id FROM users WHERE nik = ?");
    $stmt->bind_param("s", $nik);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "NIK already exists."]);
    } else {
        // Hash password sebelum disimpan
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Masukkan data ke database
        $stmt = $conn->prepare("INSERT INTO users (username, fullname, nik, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $fullname, $nik, $hashedPassword);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Registration successful."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to register."]);
        }
    }

    $stmt->close();
}

$conn->close();
?>
