<?php
session_start();

// Hapus session
session_unset();
session_destroy();

// Hapus cookie
setcookie("user_id", "", time() - 3600, "/");
setcookie("username", "", time() - 3600, "/");

// Redirect ke halaman login
header("Location: ../index.php");
exit();
?>
