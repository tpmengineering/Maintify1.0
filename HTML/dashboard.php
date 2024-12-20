<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: ../index.php"); // Jika belum login, arahkan ke halaman login
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- HEADER -->
  <title>Maintify1.0 | Dashboard</title>
  <!-- FAVICON -->
  <link rel="shortcut icon" href="../ASSETS/IMAGES/iconB.png" type="image/x-icon">
  <!-- LINK BOOTSTRAP-->
  <!-- <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- BOOTSTRAP ICON -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- STYLE - START -->
  <style>
    body {
      font-family: Arial, sans-serif;
      padding-top: 60px;
      /* Adjust padding for fixed navbar */
    }

    .sidebar {
      height: 100vh;
      background-color: #343a40;
      color: #fff;
      padding-top: 20px;
    }

    .sidebar .nav-link {
      color: #fff;
    }

    .sidebar .nav-link:hover {
      background-color: #495057;
    }

    .main-content {
      margin-left: 0;
      padding: 20px;
    }

    .footer {
      text-align: center;
      padding: 10px;
      background-color: #f1f1f1;
      margin-top: 30px;
    }

    .card {
      margin-bottom: 20px;
    }

    /* Responsive adjustments for smaller screens */
    @media (max-width: 768px) {
      .sidebar {
        position: absolute;
        width: 100%;
        height: auto;
        padding-top: 10px;
      }

      .main-content {
        margin-left: 0;
      }

      .footer {
        position: absolute;
        width: 100%;
        bottom: 0;
      }

      .card {
        margin-bottom: 15px;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand fw-bolder" href="dashboard.html">Maintify1.0</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mx-auto"> <!-- Add 'mx-auto' to center the items -->
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.html">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="downtime.php">Downtime</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="preventife.php">Preventife</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Utility
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Electrical Panel</a></li>
              <li><a class="dropdown-item" href="#">Compressor</a></li>
            </ul>
          </li>
        </ul>
        <!-- Logout Button with primary color from the start -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="d-grid btn btn-primary text-white" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- Main Content -->
  <div class="main-content">
    <div class="container">
      <!-- Row of Cards -->
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <div class="card">
            <div class="card-header bg-primary text-white">
              Total Downtime
            </div>
            <div class="card-body">
              <h5 class="card-title">35 hours</h5>
              <p class="card-text">Total downtime reported this week.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="card">
            <div class="card-header bg-success text-white">
              Machines Repaired
            </div>
            <div class="card-body">
              <h5 class="card-title">5 Machines</h5>
              <p class="card-text">Machines repaired this week.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="card">
            <div class="card-header bg-warning text-white">
              Pending Issues
            </div>
            <div class="card-body">
              <h5 class="card-title">2 Issues</h5>
              <p class="card-text">Pending issues that need attention.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6">
          <div class="card">
            <div class="card-header bg-danger text-white">
              Critical Machines
            </div>
            <div class="card-body">
              <h5 class="card-title">1 Machine</h5>
              <p class="card-text">Machine in critical condition.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Table of Downtime Report -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header bg-info text-white">
              Downtime Report
            </div>
            <div class="card-body">
              <div class="table-responsive"> <!-- Add this class for responsiveness -->
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Machine</th>
                      <th>Downtime (hrs)</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>2024-12-10</td>
                      <td>Machine 1</td>
                      <td>4</td>
                      <td>Repaired</td>
                    </tr>
                    <tr>
                      <td>2024-12-11</td>
                      <td>Machine 2</td>
                      <td>5</td>
                      <td>Repaired</td>
                    </tr>
                    <tr>
                      <td>2024-12-12</td>
                      <td>Machine 3</td>
                      <td>3</td>
                      <td>Pending</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Footer
    <div class="footer">
        <p>&copy; 2024 Company Name. All rights reserved.</p>
    </div> -->

      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>