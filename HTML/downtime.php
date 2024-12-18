<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- HEADER -->
    <title>Maintify1.0 | Downtime Report</title>
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
    <!-- STYLE - START -->
    <style>
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
    <!-- DOWNTIME - START -->
    <main class="container">
      <div class="card shadow-lg">
        <h3 class="text-center mb-4">Downtime Report</h3>
        <form id="downtime-form">
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
            <label for="nik" class="form-label" >NIK</label>
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
            <label for="areaLine" class="form-label">Area</label>
            <select id="areaLine" class="form-control" name="areaLine" required>
              <option value="">Select Area</option>
            </select>
          </div>
          <!-- ZONE -->
          <div class="mb-3">
            <label for="zone" class="form-label">Line</label>
            <select id="zone" class="form-control" name="zoneMC" required>
              <option value="">Select Line</option>
              <!-- <option value="noZones">NO ZONES</option> -->
              <!-- Looping zone 1 sampai 100 -->
              <script>
                for (let i = 1; i <= 100; i++) {
                  const option = document.createElement("option");
                  // option.value = `zone${i}`;
                  option.value = i;
                  option.textContent = `LINE ${i}`;
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
              name="machineId"
              placeholder="Enter Machine ID"
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

          <!-- START DOWNTIME -->
          <div class="mb-3">
            <label for="startDowntime" class="form-label">Start Downtime</label>
            <input
              type="time"
              class="form-control"
              id="startDowntime"
              name="startDowntime"
              required
            />
          </div>
          <!-- FINISH DOWNTIME -->
          <div class="mb-3">
            <label for="finishDowntime" class="form-label"
              >Finish Downtime</label
            >
            <input
              type="time"
              class="form-control"
              id="finishDowntime"
              name="finishDowntime"
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

          <!-- PROBLEM -->
          <div class="mb-3">
            <label for="problem" class="form-label">Problem</label>
            <textarea
              class="form-control"
              id="problem"
              rows="3"
              name="problem"
              oninput="this.value = this.value.toUpperCase()"
              placeholder="Describe the problem that occurred with the machine."
              required
            ></textarea>
          </div>

          <!-- ACTION -->
          <div class="mb-3">
            <label for="action" class="form-label">Action</label>
            <textarea
              class="form-control"
              id="action"
              rows="3"
              name="action"
              oninput="this.value = this.value.toUpperCase()"
              placeholder="Describe the corrective actions taken on the machine."
              required
            ></textarea>
          </div>

          <!-- COMPLETION STATUS -->
          <div class="mb-3">
            <label for="completionStatus" class="form-label"
              >Completion Status</label
            >
            <select
              id="completionStatus"
              class="form-control"
              name="completionStatus"
              required
            >
              <option value="">Select Completion Status</option>
              <option value="DIPERBAIKI">DIPERBAIKI</option>
              <option value="DISETTING">DISETTING</option>
              <option value="DIGANTI">DIGANTI</option>
              <option value="DIGANTI & DIPERBAIKI">DIGANTI & DIPERBAIKI</option>
            </select>
          </div>

          <!-- STATUS -->
          <div class="mb-3" id="status-container" style="display: none">
            <label for="status-2" class="form-label">Status</label>
            <select id="status-2" class="form-control" name="status-2" required>
              <option value="">Select Status</option>
              <option value="PERBAIKAN MESIN">PERBAIKAN MESIN</option>
              <option value="PENGATURAN MESIN">PENGATURAN MESIN</option>
              <option value="PENGGANTIAN SPAREPART">
                PENGGANTIAN SPAREPART
              </option>
            </select>
          </div>

          <!-- SPAREPART -->
          <div class="mb-3" id="sparepart-container" style="display: none">
            <label for="sparepart" class="form-label">Spare Part</label>
            <input
              type="text"
              class="form-control"
              id="sparepart"
              name="sparepart"
              placeholder="Enter Spare Part"
              oninput="this.value = this.value.toUpperCase()"
            />
          </div>

          <!-- BUTTON SUBMIT -->
          <div class="d-grid">
            <button
              type="submit"
              class="btn btn-primary mt-3"
              style="padding: 10px 0"
            >
              Submit
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
    <!-- DOWNTIME - END -->

    <!-- SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

      // SCREEN DOWNTIME -> START
      // Function to handle Building and Area/Line selection
      document
        .getElementById("building")
        .addEventListener("change", checkBuildingArea);
      document
        .getElementById("areaLine")
        .addEventListener("change", checkBuildingArea);

      function checkBuildingArea() {
        const building = document.getElementById("building").value;
        const areaLine = document.getElementById("areaLine").value;

        // Show Status dropdown if Building is P1 or P2 and Area/Line is ASSEMBLING
        if (
          (building === "P1" || building === "P2") &&
          areaLine === "ASSEMBLING"
        ) {
          document.getElementById("status-container").style.display = "block";
          document.getElementById("status-2").setAttribute("required", "true"); // Make Status required
        } else {
          document.getElementById("status-container").style.display = "none";
          document.getElementById("status-2").removeAttribute("required"); // Remove required from Status
        }
      }

      // Show spare part input if Completion Status is "DIGANTI" or "DIGANTI & DIPERBAIKI"
      document
        .getElementById("completionStatus")
        .addEventListener("change", showSparePartField);

      function showSparePartField() {
        const completionStatus =
          document.getElementById("completionStatus").value;

        // Show Spare Part text field when Completion Status is "DIGANTI" or "DIGANTI & DIPERBAIKI"
        if (
          completionStatus === "DIGANTI" ||
          completionStatus === "DIGANTI & DIPERBAIKI"
        ) {
          document.getElementById("sparepart-container").style.display =
            "block";
          document.getElementById("sparepart").setAttribute("required", "true"); // Make Spare Part required
        } else {
          document.getElementById("sparepart-container").style.display = "none";
          document.getElementById("sparepart").removeAttribute("required"); // Remove required from Spare Part
        }
      }

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
        areaLine.innerHTML = '<option value="">Select Area</option>';

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
        .getElementById("finishDowntime")
        .addEventListener("change", calculateRepairTime);
      document
        .getElementById("startDowntime")
        .addEventListener("change", calculateRepairTime);

      function calculateRepairTime() {
        const start = document.getElementById("startDowntime").value;
        const finish = document.getElementById("finishDowntime").value;

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

      // Form submission
      document
        .getElementById("downtime-form")
        .addEventListener("submit", function (e) {
          e.preventDefault(); // Prevent default form submission

          const formData = new FormData(this);

          fetch("submit-downtime.php", {
            method: "POST",
            body: formData,
          })
            .then((response) => response.json())
            .then((data) => {
              if (data.success) {
                // Show success SweetAlert
                Swal.fire({
                  icon: "success",
                  title: "Success!",
                  text: data.message,
                });
                this.reset(); // Reset the form
              } else {
                // Show error SweetAlert
                Swal.fire({
                  icon: "error",
                  title: "Error!",
                  text: "Error: " + data.message,
                });
              }
            })
            .catch((error) => {
              console.error("Error:", error);
              // Show error SweetAlert
              Swal.fire({
                icon: "error",
                title: "Oops!",
                text: "An error occurred while submitting the form.",
              });
            });
        });

      // SCREEN DOWNTIME -> END
    </script>
  </body>
</html>
