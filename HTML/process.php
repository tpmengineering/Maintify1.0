<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- HEADER -->
    <title>Maintify1.0 | Preventife Report</title>
    <!-- FAVICON -->
    <link
        rel="shortcut icon"
        href="ASSETS/IMAGES/iconB.png"
        type="image/x-icon" />
    <!-- LINK BOOTSTRAP-->
    <link
        rel="stylesheet"
        href="bootstrap-5.3.3-dist/css/bootstrap.min.css" />
    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- JAVASCRIPT BOOTSTRAP -->
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch form data
    $fullname = $_POST['fullname'];
    $nik = $_POST['nik'];
    $date = $_POST['date'];
    $building = $_POST['building'];
    $areaLine = $_POST['areaLine'];
    $zone = $_POST['zoneMC'];
    $machineNo = $_POST['machineNo'];
    $machineId = $_POST['machineId'];
    $startPreventife = $_POST['startPreventife'];
    $finishPreventife = $_POST['finishPreventife'];
    $inspectionItems = $_POST['inspectionItems'];

    // Calculate repair time
    $startTime = strtotime($startPreventife);
    $finishTime = strtotime($finishPreventife);
    $repairTime = ($finishTime - $startTime) / 60;

    // Handle image uploads
    function uploadImage($file, $fieldName)
    {
        $targetDir = "uploads/";
        $fileName = time() . "-" . basename($file["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        // Validate file type
        $allowedTypes = ["jpg", "jpeg", "png"];
        if (!in_array($fileType, $allowedTypes)) {
            die("Only JPG, JPEG, and PNG files are allowed for " . $fieldName . ".");
        }

        // Validate file size (max 2MB)
        if ($file["size"] > 2097152) {
            die("File size exceeds 2MB for " . $fieldName . ".");
        }

        // Upload file
        if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
            return $targetFilePath;
        } else {
            die("Failed to upload " . $fieldName . ".");
        }
    }

    // Upload before and after images
    $beforeImage = uploadImage($_FILES['beforeImage'], 'beforeImage');
    $afterImage = uploadImage($_FILES['afterImage'], 'afterImage');

    // Check if the database connection is successful
    if ($conn === false) {
        die("ERROR: Could not connect to the database. " . mysqli_connect_error());
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO preventife_reports 
        (fullname, nik, date, building, area_line, zone, machine_no, machine_id, start_preventife, finish_preventife, repair_time, inspection_items, before_image, after_image)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Check if prepare() succeeded
    if ($stmt === false) {
        die("ERROR: Could not prepare the query. " . $conn->error);
    }

    // Bind the parameters
    $stmt->bind_param(
        "ssssssssssssss",
        $fullname,
        $nik,
        $date,
        $building,
        $areaLine,
        $zone,
        $machineNo,
        $machineId,
        $startPreventife,
        $finishPreventife,
        $repairTime,
        $inspectionItems,
        $beforeImage,
        $afterImage
    );

    // Execute the query
    if ($stmt->execute()) {
        // Success: Trigger SweetAlert popup
        echo "<script>
                Swal.fire({
                    title: 'Success!',
                    text: 'Data successfully submitted!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location = 'dashboard.php'; // Redirect after closing the popup
                });
              </script>";
    } else {
        // Error: Trigger SweetAlert popup
        echo "<script>
                Swal.fire({
                    title: 'Error!',
                    text: 'There was an error submitting the data: " . $stmt->error . "',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
              </script>";
    }
    
    // Close the statement and the connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request!";
}
?>
