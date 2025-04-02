<?php include 'controlpanelBackend.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Control Panel</title>
  <link rel="stylesheet" href="../../util.css" />
  <link rel="stylesheet" href="../adminRoot.css" />
  <link rel="stylesheet" href="../ControlPanel/main.css">
  <link rel="stylesheet" href="../ControlPanel/controlpanel.css">
</head>

<style>
.flash-box {
  display: none;
  position: fixed;
  top: 40px;
  right: 80px;
  background-color: #fff;
  padding: 10px 15px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
  z-index: 100;
  width: max-content;
  animation: fadeIn 0.3s ease-in-out;
  border-radius: 12px;
}

.flashMessage {
  color: #333;
  font-size: 0.9rem;
  margin-right: 10px;
  font-weight: 200;
}

.flash-box button {
  background: none;
  border: none;
  color: #888;
  cursor: pointer;
  font-size: 1rem;
}

.flash-box button:hover {
  color: red;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>

<body>

  <!-- Side Bar start -->
  <?php
  $activeAside = 4; // set the index of list of asides to be set as active
  include '../rootAside-Admin.php';
  ?>
  <!-- Side Bar end -->

  <!-- main content starts -->
  <main class="wrapper">

    <header>
      <!-- heading of main content beside sidebar -->
      <div class="main-heading">
        <div class="main-heading-left">
          <h1>Inventory</h1>
          <p>
            <?php
            $result = mysqli_query($conn, "SELECT COUNT(item_id) as items FROM inventory");
            $count = mysqli_fetch_row($result);
            echo ($count[0] == "") ? "No items registered!" : "{$count[0]} items registered in inventory";
            ?>
          </p>
        </div>
        <div class="main-heading-right">
          <!-- display that it is admin -->
          <span class="staff"><?php echo $_SESSION['username']; ?></span>
          <p id="display-date"></p>
        </div>
      </div>
    </header>

    <div id="flashBox" class="flash-box">
      <span id="flashMessage" class="flashMessage"></span>
      <button onclick="closeMessage()">&#9932;</button>
    </div>

    <div class="container">
      <section class="main-wrapper">  <!-- contain whole main content area -->
        <!-- Staff and category check section starts -->
        <section class="control-panel-wrapper"> 
          <div class="check-section" id="check-staff-section">
            <h3><img src="../../Images/icons/user.svg" alt="user logo" />Staffs</h3>
                <table>
                  <tr>
                    <th>Staff - ID</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                  <?php include 'viewusers.php' ?>
                </table>
          </div>
          <div class="check-section" id="check-category-section">
            <h3><img src="../../Images/icons/category.svg" alt="user logo" />Category</h3>
            <table>
                  <tr>
                    <th>CID</th>
                    <th>Category </th>
                    <th>Category Items</th>
                    <th>Category Quantity</th>
                    <th>Action</th>
                  </tr>
                  <?php include 'viewcategory.php' ?>
                </table>
          </div>
        </section>
        <!-- staff and category check section ends -->

        <!-- add part starts -->
        <section class="add-wrapper">
          <!-- To add new staff -->
          <div class="add-section" id="add-staff-section">
            <h3><img src="../../Images/icons/adduser.svg" alt="add user logo" />Add Staff</h3>
            <!-- form for adding starts-->
            <form action="" method="POST" class="add-form">
              <label for="username">
                <span>Username:</span>
              </label>
              <input type="text" name="username" id="username" required placeholder="username" />
              <label for="password">
                <span>Password:</span>
              </label>
              <input type="password" name="password" id="password" required placeholder="password" />
              <button type="submit" name="add-staff">
                <img src="../../Images/icons/adduserWhite.svg" alt="add user logo" />Add Staff
              </button>
            </form>
            <!-- form for adding ends-->
          </div>
          <!-- To add new Category -->
          <div class="add-section" id="add-category-section">
            <h3>
              <img src="../../Images/icons/Category.svg" alt="add category logo" />Add
              Category
            </h3>
            <!-- form for adding starts-->
            <form action="" method="POST" class="add-form">
              <label class="add-category" for="category">
                <span>Category:</span>
                <input type="category" name="category" id="category" required placeholder="category" />
              </label>
              <button type="submit" name="addCategory">
                <img src="../../Images/icons/categoryWhite.svg" alt="add category logo" />Add
                Category
              </button>
            </form>
            <!-- form for adding ends-->
          </div>
        </section>
        <!-- add part ends -->
      </section>
    </div>
  </main>
  <!-- main content ends -->
   
</body>
<script src="../../Components/UpdateDate.js"></script>
<script src="../../Components/flash_message.js"></script>
<script src="controlPanelValidation.js"></script>
<script>
  //send php value here inside the function
  flashMessage("<?php if (isset($_GET['message'])) echo $_GET['message']; ?>", 3);
</script>

</html>