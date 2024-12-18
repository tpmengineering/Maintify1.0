<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- HEADER -->
    <title>Maintify1.0 | Login</title>
    <!-- FAVICON -->
    <link
        rel="shortcut icon"
        href="ASSETS/IMAGES/iconB.png"
        type="image/x-icon" />
    <!-- LINK BOOTSTRAP-->
    <link
      rel="stylesheet"
      href="bootstrap-5.3.3-dist/css/bootstrap.min.css"
    />
    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- JAVASCRIPT BOOTSTRAP -->
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
session_start();

// Koneksi ke database
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "maintify";

$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rememberMe = isset($_POST['rememberMe']) ? true : false;

    // Query untuk mengambil data user
    $stmt = $conn->prepare("SELECT id, username, password, fullname, nik FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password (gunakan password_hash() saat registrasi)
        if (password_verify($password, $user['password'])) {
            // Simpan user di session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['fullname'] = $user['fullname']; // Store fullname in session
            $_SESSION['nik'] = $user['nik']; // Store nik in session

            // Jika "Remember Me" dicentang, buat cookie
            if ($rememberMe) {
                setcookie("user_id", $user['id'], time() + (86400 * 30), "/"); // Cookie berlaku 30 hari
                setcookie("username", $user['username'], time() + (86400 * 30), "/");
            }

            // Output SweetAlert and then redirect
            echo "<script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Success',
                    text: 'Login Successful!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    window.location.href = 'HTML/dashboard.php';
                });
            </script>";
        } else {
            echo "<script>alert('Password is incorrect!'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('Username not found!'); window.location.href='index.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
