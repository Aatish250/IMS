<?php // checks if user is admin and connects to database
require '../checkAdmin.php';
include '../../dbConn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order List</title>
    <link rel="stylesheet" href="../../util.css" />
    <link rel="stylesheet" href="../adminRoot.css" />
    <link rel="stylesheet" href="soldItem.css">
    <link rel="stylesheet" href="../../Components/global_plain_list.css">
    <link rel="stylesheet" href="datepickerFormAatish.css">
    <link rel="stylesheet" href="../../Components/pagination.css">
</head>

<body>
    <!-- Side Bar start -->
    <?php
    $activeAside = 3; // set the index of list of asides to be set as active
    include '../rootAside-Admin.php';
    ?>
    <!-- Side Bar end -->


    <!-- main content starts -->
    <main class="wrapper">
        <header>
            <!-- heading of main content beside sidebar -->
            <div class="main-heading">
                <div class="main-heading-left">
                    <h1>Order List</h1>
                    <p>
                        <?php
                        $result = mysqli_query($conn, "SELECT SUM(sold_total) as total FROM sold where sold_date = CURDATE()");
                        $total = mysqli_fetch_row($result);
                        if ($total > 0) {
                            echo "Todays total sales " . ($total[0] == "" ? "0" : $total[0]);
                        }
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

        <section>
            <form action="soldBackend.php" class="sell-form">
                <div >
                    Item:
                    <input type="text" name="title" id="" placeholder="Item Name..." >
                </div>
                <div>
                    Price:
                    <input type="number" name="price" id="price" placeholder="Price..." >
                    <span class='qty-ctrl-btn minus-btn' data-action='-'>-</span>
                    <input type='number' name='qty' id='qty' class='qty-ctrl-inp' value=1 readonly>
                    <span class='qty-ctrl-btn plus-btn' data-action='+'>+</span>
                    <input type="number" name="total" id="total" placeholder="Total(&#x20B9;)" readonly>
                </div>
                <div>
                    <input type="date" name="date" value="<?php echo DATE("Y-m-d") ?>">
                    <input type="submit" value="Add" name="add-to-sold" class="add-btn">
                </div>
            </form>
        </section>

        <!-- soldTable of dtabase starts -->
        <section class="list">

            <div class="caption">
                <span class="title">
                    Orders
                </span>
                <form action="" method="GET" class="date-range-form" id="filterForm">
                    <small>Show List:</small>
                    <input type="number" name="listLimit" id="listLimit" class="data-limit" 
                        value="<?php echo (int) ((isset($_GET['listLimit']) ? $_GET['listLimit'] : 10)) ?>" oninput="if(this.value <= 0) this.value = 1">
                    <div class="date-input-container">
                        <input type="date" name="startDate" id="startDate" class="date-input"
                            value="<?php echo isset($_GET['startDate']) ? $_GET['startDate'] : ''; ?>">
                        <span class="date-separator">-</span>
                        <input type="date" name="endDate" id="endDate" class="date-input"
                            value="<?php echo isset($_GET['endDate']) ? $_GET['endDate'] : ''; ?>">
                    </div>
                    <!-- <button type="submit" class="search-button">Search</button> -->
                </form>
                <script>

                </script>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Rate</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <?php
                include 'soldTable.php';
                ?>
            </table>

            <?php
            include 'pagination.php';
            ?>
        </section>
        <!-- soldTable of dtabase ends -->

    </main>
    <!-- main content ends -->
</body>
<script src="../../Components/UpdateDate.js"></script>
<script src="sold.js"></script>
<script src='soldValidation.js'></script>

</html>