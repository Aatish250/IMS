<?php

session_start();
include 'dbConn.php';
$message = "";
// added login logics in this php
include 'session.php';
if (isset($_SESSION['username']) && isset($_SESSION["role"])) {
  if ($_SESSION['role'] == 'admin') {
    header("location: Admin/Dashboard/dashboard.php");
    // echo "GO TO ADMIN";
  }
  if ($_SESSION['role'] == 'staff') {
    // echo "GO TO STAFF";
    header("Location: Staff/Inventory/inventory.php");
  }
}
?>

<style>
  .flash-message {
    background-color: #ff00004a;
    padding: 4px;
    border-radius: 4px;
  }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log In</title>

  <!-- link for icon -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />

  <!-- link -->
  <link rel="stylesheet" href="login.css" />
</head>

<body>

  <main>
    <div id="flashMessage" class="">
    </div>
   
      <h2 class="heading-welcome">Welcome</h2>
        <div class="logo-section">
          <img src="./Images/icons/loginlogo.svg" alt="main logo" loading="lazy" />
        </div>
        <!-- form starts -->
        <div class="form-container">
          <form action="" method="POST">
            <label for=""></label>
            <input
              type="text"
              name="username"
              id=""
              placeholder="Username"
              required
            /><br /><br />

            <label class="password-container">
              <input
                type="password"
                id="password"
                placeholder="Password"
                name="password"
                required
              />
              <span class="toggle-password" onclick="togglePassword()">
                <i class="ri-eye-line" id="eyeIcon"></i>
              </span>
            </label>

            <div class="custom-select">
              <select name="role">
                <option disabled selected>Select your role</option>
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
              </select>
            </div>

            <div class="login-btn">
              <button type="submit" name="login">login</button>
            </div>
          </form>
        </div>
        <!-- form ends -->
  </main>
  
  <script>
    function togglePassword() {
      const passwordField = document.getElementById("password");
      const eyeIcon = document.getElementById("eyeIcon");

      if (passwordField.type === "password") {
        passwordField.type = "text";
        eyeIcon.innerHTML = `<i class="ri-eye-off-line"></i>`; // Change icon when password is visible
      } else {
        passwordField.type = "password";
        eyeIcon.innerHTML = ` <i class="ri-eye-line"></i>`; // Change back to default icon
      }
    }

    // add this function
    function flashMessage(message) {
      var msg = document.getElementById("flashMessage");
      if (message != "") {
        msg.classList.add("flash-message");
        msg.textContent = message;
        msg.style.display = "block";
        setTimeout(() => {
          msg.classList.remove("flash-message");
          msg.style.display = "none";
        }, 3000);
      }
    }
    // send php value here inside the function
    flashMessage("<?php if (isset($message)) echo $message; ?>");
  </script>
</body>

</html>