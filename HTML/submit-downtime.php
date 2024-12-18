<?php
// Database Connection
$host = "localhost"; // Replace with your database host
$db_name = "maintify"; // Replace with your database name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handling the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize input
    $fullname = $_POST['fullname'] ?? null;  // New field
    $nik = $_POST['nik'] ?? null;            // New field
    $date = $_POST['date'] ?? null;
    $building = $_POST['building'] ?? null;
    $areaLine = $_POST['areaLine'] ?? null;
    $zone = $_POST['zoneMC'] ?? null;
    $machineNo = $_POST['machineNo'] ?? null;
    $machineId = $_POST['machineId'] ?? null;
    $startDowntime = $_POST['startDowntime'] ?? null;
    $finishDowntime = $_POST['finishDowntime'] ?? null;
    $repairTime = $_POST['repairTime'] ?? null;
    $problem = $_POST['problem'] ?? null;
    $action = $_POST['action'] ?? null;
    $completionStatus = $_POST['completionStatus'] ?? null;
    $status = $_POST['status-2'] ?? null;
    $sparePart = $_POST['sparepart'] ?? null;

    // Basic server-side validation
    if (!$fullname || !$nik || !$date || !$building || !$areaLine || !$zone || !$machineNo || !$startDowntime || !$finishDowntime || !$problem || !$action || !$completionStatus) {
        echo json_encode([
            "success" => false,
            "message" => "All required fields must be filled out."
        ]);
        exit;
    }

    // Insert data into the database
    $sql = "INSERT INTO downtime_reports (
                fullname,
                nik,
                date, 
                building, 
                area_line, 
                zone, 
                machine_no, 
                machine_id, 
                start_downtime, 
                finish_downtime, 
                repair_time, 
                problem, 
                action, 
                completion_status, 
                status, 
                spare_part
            ) VALUES (
                :fullname,
                :nik,
                :date, 
                :building, 
                :areaLine, 
                :zone, 
                :machineNo, 
                :machineId, 
                :startDowntime, 
                :finishDowntime, 
                :repairTime, 
                :problem, 
                :action, 
                :completionStatus, 
                :status, 
                :sparePart
            )";

    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':fullname' => $fullname,
            ':nik' => $nik,
            ':date' => $date,
            ':building' => $building,
            ':areaLine' => $areaLine,
            ':zone' => $zone,
            ':machineNo' => $machineNo,
            ':machineId' => $machineId,
            ':startDowntime' => $startDowntime,
            ':finishDowntime' => $finishDowntime,
            ':repairTime' => $repairTime,
            ':problem' => $problem,
            ':action' => $action,
            ':completionStatus' => $completionStatus,
            ':status' => $status,
            ':sparePart' => $sparePart,
        ]);

        echo json_encode([
            "success" => true,
            "message" => "Downtime report submitted successfully."
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "success" => false,
            "message" => "Error: " . $e->getMessage()
        ]);
    }
}
?>
