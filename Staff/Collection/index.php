<?php
require '../../dbConn.php';
require '../checkStaff.php';


// executes item request logics
include 'sell.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Collection Llist</title>
  <link rel="stylesheet" href="../../util.css" />
  <link rel="stylesheet" href="../staffRoot.css" />
  <link rel="stylesheet" href="../../Components/global_table_list.css">
  <link rel="stylesheet" href="collection.css" />
  <link rel="stylesheet" href="../../Components/flashMessage.css">
</head>


<body>
  <!-- Side Bar start -->
  <?php
  $activeAside = 3; // set the index of list of asides to be set as active
  include '../rootAside-Staff.php';
  ?>
  <!-- Side Bar end -->


  <!-- main content starts -->
  <main class="wrapper">
    <header>
      <!-- heading of main content beside sidebar -->
      <div class="main-heading">
        <div class="main-heading-left">
          <h1>Collection Lists</h1>
        </div>
        <div class="main-heading-right">
          <!-- display that it is Staff -->
          <span class="staff"><?php echo $_SESSION['username']; ?></span>
          <p id="display-date"></p>
        </div>
      </div>
    </header>

    <div id="flashBox" class="flash-box">
      <span id="flashMessage" class="flash-message"></span>
      <button onclick="closeMessage()">&#9932;</button>
    </div>

    <!-- item request section starts -->
    <section>
      <div class="list-wrapper">
        <h3>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 icon">
            <path
              d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
          </svg>
          <span>Items</span>
        </h3>
        <div class="list">
          <table class="this-table">
            <thead>
              <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Available Qty.</th>
                <th>Rate</th>
                <th>Sell Qty.</th>
                <th>Total</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <form method='POST' action=''>
                <?php 
                if (isset($message))
                  echo "<tr><td colspan='7' style='color: #888;'>$message</td></tr>";
                else
                  include 'collectionList.php';
                ?>
              </form>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <!-- item request section end -->

  </main>

  <!-- main content ends -->
</body>
<script src="collection.js"></script>
<script src="../../Components/UpdateDate.js"></script>
<script src="../../Components/flash_message.js"></script>

<script>
  // send php value here inside the function
  flashMessage("<?php if (isset($message))
    echo $message; ?>", 3);
</script>

</html>
