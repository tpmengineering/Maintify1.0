// SCREEN LOGIN -> START
// Check if the email is saved in localStorage
window.onload = function () {
  const savedEmail = localStorage.getItem("email");
  if (savedEmail) {
    document.getElementById("email").value = savedEmail;
    document.getElementById("rememberMe").checked = true;
  }
};

// Toggle Password visibility
document
  .getElementById("togglePassword")
  .addEventListener("click", function () {
    const passwordField = document.getElementById("password");
    const icon = this.querySelector("i");
    if (passwordField.type === "password") {
      passwordField.type = "text";
      icon.classList.replace("bi-eye-slash", "bi-eye");
    } else {
      passwordField.type = "password";
      icon.classList.replace("bi-eye", "bi-eye-slash");
    }
  });

// Remember Me Functionality
document.getElementById("login-form").addEventListener("submit", function (e) {
  e.preventDefault(); // Prevent form submission
  const email = document.getElementById("email").value;
  const rememberMe = document.getElementById("rememberMe").checked;

  if (rememberMe) {
    localStorage.setItem("email", email); // Save email to localStorage
  } else {
    localStorage.removeItem("email"); // Remove email from localStorage if unchecked
  }

  // Perform actual login logic (not implemented here)
  alert("Logged in successfully!");
});
// SCREEN REGISTER -> END

// SCREEN REGISTER -> START
document
  .getElementById("register-form")
  .addEventListener("submit", function (event) {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm-password").value;
    const errorDiv = document.getElementById("password-error");

    if (password !== confirmPassword) {
      event.preventDefault();
      errorDiv.style.display = "block";
    } else {
      errorDiv.style.display = "none";

      // Clear form inputs after successful submission
      document.getElementById("register-form").reset();

      // Optional: Display a success message (can be customized further)
      alert("Registration successful!");
    }
  });
// SCREEN REGISTER -> END

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
  if ((building === "P1" || building === "P2") && areaLine === "ASSEMBLING") {
    document.getElementById("status-container").style.display = "block";
  } else {
    document.getElementById("status-container").style.display = "none";
  }
}

// Show spare part input if Completion Status is "Changed" or "Replaced"
document
  .getElementById("completionStatus")
  .addEventListener("change", showSparePartField);

function showSparePartField() {
  const completionStatus = document.getElementById("completionStatus").value;

  // Show Spare Part text field when Completion Status is "Changed" or "Replaced"
  if (completionStatus === "changed" || completionStatus === "replaced") {
    document.getElementById("sparepart-container").style.display = "block";
  } else {
    document.getElementById("sparepart-container").style.display = "none";
  }
}

// Form submission
document
  .getElementById("downtime-form")
  .addEventListener("submit", function (e) {
    e.preventDefault(); // Prevent form submission for now (handle actual submission)
    alert("Downtime report submitted!");
  });

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
    const repairTime = (finishTime - startTime) / 1000 / 60; // in minutes
    document.getElementById("repairTime").value = `${repairTime} minutes`;
  }
}
// SCREEN DOWNTIME -> END
