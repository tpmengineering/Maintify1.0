<?php
// Mulai sesi di awal halaman
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- HEADER -->
    <title>Maintify1.0 | Preventife Report</title>
    <!-- FAVICON -->
    <link
      rel="shortcut icon"
      href="../ASSETS/IMAGES/iconB.png"
      type="image/x-icon"
    />
    <!-- LINK CSS -->
    <link rel="stylesheet" href="../CSS/style.css" />
    <!-- LINK CSS RESPONSIVE -->
    <link rel="stylesheet" href="../CSS/responsive.css" />
    <!-- LINK BOOTSTRAP-->
    <link
      rel="stylesheet"
      href="../bootstrap-5.3.3-dist/css/bootstrap.min.css"
    />
    <!-- LINK FONT - POPPINS -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
      rel="stylesheet"
    />
    <!-- BOXICONS -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <!-- BOOTSTRAP ICON -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- STYLE - START -->
    <style>
      /* Add custom invalid feedback styling */
      .is-invalid {
        border-color: #dc3545; /* Bootstrap danger color */
        box-shadow: 0 0 5px rgba(220, 53, 69, 0.5); /* Red glow */
      }

      .is-invalid:focus {
        border-color: #dc3545;
        box-shadow: 0 0 5px rgba(220, 53, 69, 0.5);
      }
      /* Styling for Text Fields, Time Picker, and Date Picker */
      .form-control {
        border: 2px solid #0d6efd; /* Biru primary untuk border */
        background-color: #e7f1ff; /* Latar belakang biru muda */
        color: #0d6efd; /* Warna teks biru */
      }

      .form-control:focus {
        border-color: #0056b3; /* Biru lebih gelap saat fokus */
        outline: none; /* Hilangkan outline default */
        box-shadow: 0 0 5px rgba(13, 110, 253, 0.5); /* Glow biru */
      }

      /* Styling for Select Dropdown */
      select.form-control {
        border: 2px solid #0d6efd; /* Biru primary untuk border */
        background-color: #e7f1ff; /* Latar belakang biru muda */
        color: #0d6efd; /* Warna teks biru */
      }

      select.form-control:focus {
        border-color: #0056b3; /* Biru lebih gelap saat fokus */
        outline: none; /* Hilangkan outline default */
        box-shadow: 0 0 5px rgba(13, 110, 253, 0.5); /* Glow biru */
      }

      /* Placeholder Styling for Text Inputs and Select */
      .form-control::placeholder {
        color: #6da8ff; /* Placeholder biru muda */
      }

      /* Placeholder for Select Option */
      select.form-control option[value=""] {
        color: #6da8ff; /* Placeholder biru muda untuk opsi spinner */
      }

      /* Button Inside Form - Consistency */
      button.btn {
        background-color: #0d6efd; /* Warna tombol biru primary */
        color: white; /* Warna teks tombol */
        border: none;
      }

      button.btn:hover {
        background-color: #0056b3; /* Warna tombol biru gelap saat hover */
      }

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
      footer {
        flex-shrink: 0;
      }
      .card {
        width: 100%;
        max-width: 600px;
        margin: auto;
        padding: 2rem;
      }
      .scanner-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 1rem;
        gap: 10px;
      }
      .scanner-container label {
        width: 30%;
      }
      #barcode-scanner {
        width: 100%;
        height: auto;
        display: none;
      }
      @media (max-width: 480px) {
        .scanner-container label {
          width: 60%;
        }
      }
    </style>
    <!-- STYLE - END -->
  </head>
  <body>
    <!-- PREVENTIFE - START -->
    <main class="container">
      <div class="card shadow-lg">
        <h3 class="text-center mb-4 fw-semibold">PREVENTIFE REPORT</h3>
        <form
          id="preventife-form"
          action="process.php"
          method="POST"
          enctype="multipart/form-data"
        >
          <!-- NAMA -->
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input
              type="text"
              class="form-control"
              id="nama"
              name="fullname"
              value="<?php echo isset($_SESSION['fullname']) ? $_SESSION['fullname'] : ''; ?>"
              readonly
            />
          </div>

          <!-- NIK -->
          <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input
              type="text"
              class="form-control"
              id="nik"
              name="nik"
              value="<?php echo isset($_SESSION['nik']) ? $_SESSION['nik'] : ''; ?>"
              readonly
            />
          </div>

          <!-- TANGGAL -->
          <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input
              type="date"
              class="form-control"
              id="date"
              name="date"
              required
            />
          </div>

          <!-- BUILDING -->
          <div class="mb-3">
            <label for="building" class="form-label">Building</label>
            <select
              id="building"
              class="form-control"
              name="building"
              required
              onchange="updateAreaLine()"
            >
              <option value="">Select Building</option>
              <option value="B1">B1</option>
              <option value="B3">B3</option>
              <option value="B4">B4</option>
              <option value="LAMINATING">LAMINATING</option>
              <option value="P1">P1</option>
              <option value="P2">P2</option>
              <option value="UP2">UP2</option>
            </select>
          </div>
          <!-- AREA/LINE -->
          <div class="mb-3">
            <label for="areaLine" class="form-label">Area/Line</label>
            <select id="areaLine" class="form-control" name="areaLine" required>
              <option value="">Select Area/Line</option>
            </select>
          </div>
          <!-- ZONE -->
          <div class="mb-3">
            <label for="zone" class="form-label">Zone</label>
            <select id="zone" class="form-control" name="zoneMC" required>
              <option value="">Select Zone</option>
              <option value="noZones">NO ZONES</option>
              <!-- Looping zone 1 sampai 100 -->
              <script>
                for (let i = 1; i <= 100; i++) {
                  const option = document.createElement("option");
                  // option.value = `zone${i}`;
                  option.value = i;
                  option.textContent = `ZONE ${i}`;
                  document.getElementById("zone").appendChild(option);
                }
              </script>
            </select>
          </div>

          <!-- NO MESIN -->
          <div class="mb-3">
            <label for="machineNo" class="form-label">Machine No.</label>
            <select
              id="machineNo"
              class="form-control"
              name="machineNo"
              required
            >
              <option value="">Select Machine No.</option>
              <option value="noMachineNumber">NO MACHINE NUMBER</option>
              <!-- Looping mesin 1 sampai 100 -->
              <script>
                for (let i = 1; i <= 100; i++) {
                  const option = document.createElement("option");
                  // option.value = `machine${i}`;
                  option.value = i;
                  option.textContent = `MACHINE ${i}`;
                  document.getElementById("machineNo").appendChild(option);
                }
              </script>
            </select>
          </div>

          <!-- MACHINE ID -->
          <label for="machineId" class="form-label">Machine ID</label>
          <div class="mb-3 scanner-container">
            <input
              type="text"
              class="form-control"
              id="machineId"
              placeholder="Enter Machine ID"
              name="machineId"
              maxlength="15"
            />
            <button type="button" class="btn btn-primary" id="scanBarcode">
              <i class="bi bi-upc-scan"></i>
            </button>
          </div>

          <div id="barcode-scanner">
            <video
              id="scanner"
              width="100%"
              height="auto"
              style="border: 1px solid #ccc"
            ></video>
          </div>

          <!-- START PREVENTIFE -->
          <div class="mb-3">
            <label for="startPreventife" class="form-label"
              >Start Preventife</label
            >
            <input
              type="time"
              class="form-control"
              id="startPreventife"
              name="startPreventife"
              required
            />
          </div>
          <!-- FINISH PREVENTIFE -->
          <div class="mb-3">
            <label for="finishPreventife" class="form-label"
              >Finish Preventife</label
            >
            <input
              type="time"
              class="form-control"
              name="finishPreventife"
              id="finishPreventife"
              required
            />
          </div>
          <!-- REPAIR TIME -->
          <div class="mb-3">
            <label for="repairTime" class="form-label">Repair Time</label>
            <input
              type="text"
              class="form-control"
              id="repairTime"
              name="repairTime"
              placeholder="-"
              readonly
            />
          </div>

          <!-- INSPECTION ITEMS -->
          <div class="mb-3">
            <label for="inspectionItems" class="form-label"
              >Inspection Items</label
            >
            <select
              id="inspectionItems"
              class="form-control"
              name="inspectionItems"
              required
            >
              <option value="">Select Inspection Item</option>
              <option value="COMPLATE">COMPLATE</option>
              <option value="INCOMPLATE">INCOMPLATE</option>
            </select>
          </div>

          <!-- UPLOAD BEFORE -->
          <div class="mb-3">
            <label for="beforeImage" class="form-label"
              >Upload Before Preventife</label
            >
            <input
              type="file"
              class="form-control"
              id="beforeImage"
              name="beforeImage"
              accept="image/*"
              required
            />
          </div>

          <!-- UPLOAD AFTER -->
          <div class="mb-3">
            <label for="afterImage" class="form-label"
              >Upload After Preventife</label
            >
            <input
              type="file"
              class="form-control"
              id="afterImage"
              name="afterImage"
              accept="image/*"
              required
            />
          </div>

          <!-- BUTTON SUBMIT -->
          <div class="d-grid">
            <button
              name="submit"
              type="submit"
              class="btn btn-primary mt-3 fw-semibold"
              style="padding: 10px 0"
            >
              SUBMIT
            </button>
          </div>
        </form>
      </div>
    </main>

    <!-- FOOTER -->
    <footer class="text-center py-2 bg-light">
      <p class="mb-0" style="font-size: 0.9rem">
        &copy; 2024 TPM Engineering. All rights reserved.
      </p>
    </footer>
    <!-- PREVENTIFE - END -->

    <!-- JAVASCRIPT -->
    <script src="../JS/script.js"></script>
    <!-- JAVASCRIPT BOOTSTRAP -->
    <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <!-- ZXING LIBRARY -->
    <script
      type="text/javascript"
      src="https://unpkg.com/@zxing/library@latest"
    ></script>
    <!-- JQUERY LIBRARY -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"
    ></script>
    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      // BACA BARCODE - START
      let selectedDeviceId = null;
      const codeReader = new ZXing.BrowserMultiFormatReader();
      const sourceSelect = $("#pilihKamera");

      $(document).on("click", "#scanBarcode", function () {
        document.getElementById("barcode-scanner").style.display = "block"; // Show video container
        initScanner();
      });

      function initScanner() {
        codeReader
          .listVideoInputDevices()
          .then((videoInputDevices) => {
            videoInputDevices.forEach((device) =>
              console.log(`${device.label}, ${device.deviceId}`)
            );

            if (videoInputDevices.length > 0) {
              if (selectedDeviceId == null) {
                if (videoInputDevices.length > 1) {
                  selectedDeviceId = videoInputDevices[1].deviceId;
                } else {
                  selectedDeviceId = videoInputDevices[0].deviceId;
                }
              }

              if (videoInputDevices.length >= 1) {
                codeReader
                  .decodeOnceFromVideoDevice(selectedDeviceId, "scanner")
                  .then((result) => {
                    console.log(result.text);
                    document.getElementById("machineId").value = result.text; // Set result to input
                    document.getElementById("barcode-scanner").style.display =
                      "none"; // Hide scanner
                  })
                  .catch((err) => console.error(err));
              }
            } else {
              alert("Camera not found!");
            }
          })
          .catch((err) => console.error(err));
      }
      // BACA BARCODE - END

      // SCREEN PREVENTIFE -> START
      // Data mapping between Building and Area/Line
      const areaLineOptions = {
        B1: ["HOTPRESS", "MIXING", "DEGRESING", "LAINNYA"],
        B3: ["IP", "MIXING", "UV", "STOCKFIT", "LAINNYA"],
        B4: ["IP", "MIXING", "UV", "STOCKFIT", "LAINNYA"],
        LAMINATING: ["LAMINATING"],
        P1: ["ASSEMBLING", "CUTTING", "2ND PROCESS", "STOCKFIT", "LAINNYA"],
        P2: ["ASSEMBLING", "CUTTING", "2ND PROCESS", "STOCKFIT", "LAINNYA"],
        UP2: ["MCC", "CUTTING", "2ND PROCESS", "LAINNYA"],
      };

      function updateAreaLine() {
        const building = document.getElementById("building").value;
        const areaLine = document.getElementById("areaLine");

        // Clear previous options
        areaLine.innerHTML = '<option value="">Select Area/Line</option>';

        // Populate new options based on selected building
        if (areaLineOptions[building]) {
          areaLineOptions[building].forEach((option) => {
            const optElement = document.createElement("option");
            optElement.value = option;
            optElement.textContent = option;
            areaLine.appendChild(optElement);
          });
        }
      }

      // Calculate Repair Time automatically
      document
        .getElementById("finishPreventife")
        .addEventListener("change", calculateRepairTime);
      document
        .getElementById("startPreventife")
        .addEventListener("change", calculateRepairTime);

      function calculateRepairTime() {
        const start = document.getElementById("startPreventife").value;
        const finish = document.getElementById("finishPreventife").value;

        if (start && finish) {
          const startTime = new Date(`1970-01-01T${start}:00`);
          const finishTime = new Date(`1970-01-01T${finish}:00`);
          let repairTime = (finishTime - startTime) / 1000 / 60; // in minutes

          const hours = Math.floor(repairTime / 60); // Get the whole hours
          const minutes = repairTime % 60; // Get the remainder of minutes

          // Format as HH:MM
          const formattedTime = `${hours
            .toString()
            .padStart(2, "0")}:${Math.round(minutes)
            .toString()
            .padStart(2, "0")}`;

          document.getElementById("repairTime").value = formattedTime;
        }
      }
      // SCREEN PREVENTIFE -> END
    </script>
  </body>
</html>
