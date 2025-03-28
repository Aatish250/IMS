<?php
require '../../dbConn.php';
require '../checkStaff.php';


// executes item request logics
include 'updateItem.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Request - Staff</title>
  <link rel="stylesheet" href="../../util.css" />
  <link rel="stylesheet" href="../staffRoot.css" />
  <link rel="stylesheet" href="request.css" />
</head>


<body>
  <!-- Side Bar start -->
  <?php
  $activeAside = 2; // set the index of list of asides to be set as active
  include '../rootAside-Staff.php';
  ?>
  <!-- Side Bar end -->


  <!-- main content starts -->
  <main class="wrapper">
    <header>
      <!-- heading of main content beside sidebar -->
      <div class="main-heading">
        <div class="main-heading-left">
          <h1>Request Lists</h1>
        </div>
        <div class="main-heading-right">
          <!-- display that it is Staff -->
          <span class="staff"><?php echo $_SESSION['username']; ?></span>
          <p id="display-date"></p>
        </div>
      </div>
    </header>

    <div id="flashBox" class="flash-box">
      <span id="flashMessage" class="flashMessage"></span>
      <button onclick="closeMessage()">&#9932;</button>
    </div>

    <!-- item request section starts -->
    <section>
      <div class="itemrequest-wrapper">
        <div class="itemrequest">
          <h3>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 icon">
              <path
                d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
              <path fill-rule="evenodd"
                d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087ZM12 10.5a.75.75 0 0 1 .75.75v4.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-3 3a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06l1.72 1.72v-4.94a.75.75 0 0 1 .75-.75Z"
                clip-rule="evenodd" />
            </svg>
            <span>Item Requests</span>
          </h3>
          <table class="request-table">
            <thead>
              <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Available Qty.</th>
                <th>Requested Qty.</th>
                <th>Set Request Qty.</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php // load item request list
              include 'requestList.php';
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <!-- item request section end -->

  </main>

  <!-- main content ends -->
</body>
<script src="request.js"></script>
<script src="../../Components/UpdateDate.js"></script>
<script src="../../Components/flash_message.js"></script>

<script>
  // send php value here inside the function
  flashMessage("<?php if (isset($message))
    echo $message; ?>", 3);
</script>

</html>