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
