<!-- Setting up al the form action on top of page to make the data changed first then display on html -->
<!-- Going from bottom to top because top section have mreo displays then bottom section -->

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
  <!-- <link rel="stylesheet" href="../ControlPanel/Aatish.css"> -->
  <link rel="stylesheet" href="../ControlPanel/controlpanel.css">
</head>


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
          <span class="staff">Admin</span>
          <p id="display-date"></p>
        </div>
      </div>
    </header>

    <div id="flashBox" class="flash-box">
      <span id="flashMessage" class="flashMessage"></span>
      <button onclick="closeMessage()">&#9932;</button>
    </div>

    <!-- User and Add User section start -->
    <section class="control-panel-wrapper">
      <div class="user-category-section" id="user-section">
        <h3><img src="../../Images/icons/user.svg" alt="user logo" />Users</h3>
        <table>
          <tr>
            <th>User - ID</th>
            <th>User</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
          <?php include 'viewusers.php' ?>
        </table>
      </div>
      <div class="add-section" id="add-user-section">
        <h3><img src="../../Images/icons/adduser.svg" alt="add user logo" />Add User</h3>
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
          <button type="submit" name="add-user">
            <img src="../../Images/icons/adduserWhite.svg" alt="add user logo" />Add User
          </button>
        </form>
        <!-- form for adding ends-->
      </div>
    </section>
    <!-- User and Add User section end-->

    <!-- Category and Add Category section start -->
    <section class="control-panel-wrapper">
      <div class="user-category-section" id="category-section">
        <h3><img src="../../Images/icons/category.svg" alt="user logo" />Category</h3>
        <table>
          <tr>
            <th>User - ID</th>
            <th>User</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
          <?php include 'viewcategory.php' ?>
        </table>
      </div>
      <div class="add-section" id="add-user-section">
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
    <!-- Category and Add Category section end -->

  </main>
  <!-- main content ends -->
</body>
<script src="../../Components/UpdateDate.js"></script>
<script src="../../Components/flash_message.js"></script>
<script>
  //send php value here inside the function
  flashMessage("<?php if (isset($_GET['message']))
    echo $_GET['message']; ?>", 3);
</script>
<!-- <script>
  flashMessage("Check", 5);
</script> -->

</html>