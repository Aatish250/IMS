<?php
include("login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="icon" type="image/jpg" href="assets/computer.jpg" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
  <!-- wrapper -->
  <main>
    <!-- Flash Message -->
    <div id="flashBox" class="flash-box">
          <span id="flashMessage" class="flashMessage"></span>
          <button onclick="closeMessage()">&#9932;</button>
    </div>
    <!-- STARTS: login box -->
    <div class="login-container">
      <h2 class="login-heading">Welcome</h2>

      <!-- STARTS: image section here -->
      <div class="login-image">
        <img src="Images/assets/computer.jpg" alt="" />
      </div>
      <!-- ENDS: image section here -->

      <!-- STARTS: form and heading here -->
      <div class="login-content">
        <h2>Login</h2>

        <!-- STARTS: Form here -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

          <!-- STARTS: Username -->
          <div class="input-field">
            <label for="username" class="input-label">
              <i class="fa fa-user"></i>
            </label>
            <input type="text" id="username" name="username" placeholder="Username" required title="Username Here" />
          </div>
          <!-- ENDS: Username -->

          <!-- STARTS: Password -->
          <div class="input-field">
            <label for="password" class="input-label">
              <i class="fa fa-lock"></i>
            </label>
            <input type="password" id="password" name="password" placeholder="Password" required
              title="Password Here" />
            <div class="password-toggle" onclick="togglePassword()">
              <i class="fa fa-eye" id="eyeIcon"></i>
            </div>
          </div>
          <!-- ENDS: Password -->

          <!-- STARTS: Two buttons here -->
          <div class="submit-button">
            <div>
              <span class="role-btn" id="roleBtn"></span>
              <input type="radio" name="role" value="staff" id="radioStaff" class="roleRadio" hidden />
              <input type="radio" name="role" value="admin" id="radioAdmin" class="roleRadio" hidden checked />
            </div>
            <div class="login-btn">
              <button type="submit" name="login">login</button>
            </div>
          </div>
          <!-- ENDS: Two buttons here -->
        </form>
        <!-- ENDS: Form here -->
      </div>
      <!-- ENDS: form and heading here -->
    </div>
    <!-- ENDS: login box -->
  </main>

  <script src="script.js"></script>
  <script src="Components/flash_message.js"></script>
  <script>
    // send php value here inside the function
    flashMessage("<?php if (isset($message))
      echo $message; ?>", 3);
  </script>
</body>

</html>