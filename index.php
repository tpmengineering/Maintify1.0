<?php
session_start();
// Periksa apakah cookie "remember me" ada, jika iya langsung redirect
if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
  $_SESSION['user_id'] = $_COOKIE['user_id'];
  $_SESSION['username'] = $_COOKIE['username'];
  header("Location: HTML/dashboard.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    href="bootstrap-5.3.3-dist/css/bootstrap.min.css" />
  <!-- LINK FONT - POPPINS -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
    rel="stylesheet" />
  <!-- BOXICONS -->
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <!-- BOOTSTRAP ICON -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <!-- SWEET ALERT -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- STYLE - START -->
  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
    }

    main {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 1rem;
    }

    .card {
      width: 100%;
      max-width: 400px;
      margin: auto;
    }

    .input-group .btn {
      cursor: pointer;
    }
  </style>
  <!-- STYLE - END -->
</head>

<body>
  <!-- LOGIN - START -->
  <main class="container">
    <div class="card shadow-lg p-4">
      <h3 class="text-center mb-4">Login</h3>
      <form action="login.php" method="POST">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" class="form-control" placeholder="Enter your username" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <div class="input-group">
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
            <button type="button" class="btn btn-outline-secondary" id="togglePassword">
              <i class="bi bi-eye-slash" id="togglePasswordIcon"></i>
            </button>
          </div>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
          <label class="form-check-label" for="rememberMe">Remember Me</label>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
        <p class="text-center mt-3">
          <small>Don't have an account? <a href="HTML/register.html">Sign up</a></small>
        </p>
      </form>
    </div>
  </main>
  <footer class="text-center py-2 bg-light">
    <p class="mb-0" style="font-size: 0.9rem">
      &copy; 2024 TPM Engineering. All rights reserved.
    </p>
  </footer>
  <!-- LOGIN - END -->

  <!-- LINK JAVASCRIP BOOTSTRAP -->
  <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

  <!-- JAVASCRIPT -->
  <script>
    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const togglePasswordIcon = document.getElementById('togglePasswordIcon');

    togglePassword.addEventListener('click', function() {
      // Toggle password visibility
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);

      // Toggle icon
      togglePasswordIcon.classList.toggle('bi-eye-slash');
      togglePasswordIcon.classList.toggle('bi-eye');
    });
  </script>
</body>

</html>