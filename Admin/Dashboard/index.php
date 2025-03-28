
<?php
require '../../dbConn.php';
require '../checkAdmin.php';


// fetch data for overview
include 'overviewBackend.php';
// executes item request logics
include 'updateItem.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="../../util.css" />
  <link rel="stylesheet" href="../adminRoot.css" />
  <link rel="stylesheet" href="dashboard.css" />
</head>


<body>
  <!-- Side Bar start -->
  <?php
  $activeAside = 0; // set the index of list of asides to be set as active
  include '../rootAside-Admin.php';
  ?>
  <!-- Side Bar end -->


  <!-- main content starts -->
  <main class="wrapper">
    <header>
      <!-- heading of main content beside sidebar -->
      <div class="main-heading">
        <div class="main-heading-left">
          <h1>DASHBOARD</h1>
        </div>
        <div class="main-heading-right">
          <!-- display that it is admin -->
          <span class="staff"><?php echo $_SESSION['username']; ?></span>
          <p id="display-date"></p>
        </div>
      </div>
    </header>

    <!-- overview of database starts -->
    <section>
      <div class="overview-block">
        <div class="overview-item">
          <div class="overview-details">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#666363" class="size-6 icon">
              <path
                d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
              <path fill-rule="evenodd"
                d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.163 3.75A.75.75 0 0 1 10 12h4a.75.75 0 0 1 0 1.5h-4a.75.75 0 0 1-.75-.75Z"
                clip-rule="evenodd" />
            </svg>
            <span class="overview-label">Items:</span>
            <span class="overview-value"><?php echo $itemCount ?></span>
          </div>
        </div>
        <div class="overview-separator"></div>
        <div class="overview-item">
          <div class="overview-details">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#666363" class="size-6 icon">
              <path
                d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
              <path fill-rule="evenodd"
                d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087ZM12 10.5a.75.75 0 0 1 .75.75v4.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-3 3a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06l1.72 1.72v-4.94a.75.75 0 0 1 .75-.75Z"
                clip-rule="evenodd" />
            </svg>
            <span class="overview-label">Requests:</span>
            <span class="overview-value"><?php echo $requestCount ?></span>
          </div>
        </div>
        <div class="overview-separator"></div>
        <div class="overview-item">
          <div class="overview-details">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#666363" class="size-6 icon">
              <path fill-rule="evenodd"
                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM9 7.5A.75.75 0 0 0 9 9h1.5c.98 0 1.813.626 2.122 1.5H9A.75.75 0 0 0 9 12h3.622a2.251 2.251 0 0 1-2.122 1.5H9a.75.75 0 0 0-.53 1.28l3 3a.75.75 0 1 0 1.06-1.06L10.8 14.988A3.752 3.752 0 0 0 14.175 12H15a.75.75 0 0 0 0-1.5h-.825A3.733 3.733 0 0 0 13.5 9H15a.75.75 0 0 0 0-1.5H9Z"
                clip-rule="evenodd" />
            </svg>

            <span class="overview-label">Sales:</span>
            <span class="overview-value">Rs. <?php echo isset($sales) ? $sales : 0 ?></span>
          </div>
        </div>
      </div>
    </section>
    <!-- overview of dtabase ends -->

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
                <th>Qty.</th>
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

    <!-- todays sales section starts -->
    <section>
      <div class="sales-wrapper">
        <div class="sales">
          <h3>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 icon">
              <path fill-rule="evenodd"
                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM9 7.5A.75.75 0 0 0 9 9h1.5c.98 0 1.813.626 2.122 1.5H9A.75.75 0 0 0 9 12h3.622a2.251 2.251 0 0 1-2.122 1.5H9a.75.75 0 0 0-.53 1.28l3 3a.75.75 0 1 0 1.06-1.06L10.8 14.988A3.752 3.752 0 0 0 14.175 12H15a.75.75 0 0 0 0-1.5h-.825A3.733 3.733 0 0 0 13.5 9H15a.75.75 0 0 0 0-1.5H9Z"
                clip-rule="evenodd" />
            </svg>
            <span>Sales</span>
          </h3>
          <table>
            <thead>
              <tr>
                <th>T-ID</th>
                <th>I-ID</th>
                <th>Date</th>
                <th>Item</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Total</th>
              </tr>
            </thead>
            <?php // load todays sales list
            include 'todaysSalesList.php';
            ?>
          </table>
        </div>
      </div>

    </section>

    <!-- todays sales section ends -->
  </main>

  <!-- main content ends -->
</body>
<script src="dashboard.js"></script>
<script src="../../Components/UpdateDate.js"></script>
<script src="../../Components/flash_message.js"></script>

<script>
  // send php value here inside the function
  flashMessage("<?php if (isset($message))
    echo $message; ?>", 3);
</script>

</html>