<?php
require '../../dbConn.php';
require '../checkStaff.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventory</title>
    <link rel="stylesheet" href="../../util.css" />
    <link rel="stylesheet" href="../staffRoot.css" />
    <link rel="stylesheet" href="inventory.css">
    <!-- bottom is linked to component css -->
    <link rel="stylesheet" href="../../Components/inventoryNav.css">
    <link rel="stylesheet" href="../../Components/global_plain_list.css">
    <link rel="stylesheet" href="../../Components/pagination.css">
    <link rel="stylesheet" href="../../Components/flashMessage.css">
</head>

<body>
    <!-- Side Bar start -->
    <?php
    $activeAside = 0; // set the index of list of asides to be set as active
    include '../rootAside-Staff.php';
    ?>
    <!-- Side Bar end -->

    <!-- main content starts -->
    <main class="wrapper">
        <header>
            <!-- heading of main content beside sidebar -->
            <div class="main-heading">
                <div class="main-heading-left ">
                    <h1 class="heading-text">Items</h1>
                    <p>
                        <?php
                        $result = mysqli_query($conn, "SELECT COUNT(item_id) as items FROM inventory");
                        $count = mysqli_fetch_row($result);
                        echo ($count[0] == "") ? "No items registered!" : "{$count[0]} items registered in inventory";
                        ?>
                    </p>
                </div>
                <div class="main-heading-right">
                    <!-- display that it is staff -->
                    <span class="staff"><?php echo $_SESSION['username']; ?></span>
                    <p id="display-date"></p>
                </div>
            </div>
        </header>

        <section>
            <?php include '../../Components/inventoryNav.php';
            ?>

            <div id="flashBox" class="flash-box">
                <span id="flashMessage" class="flash-message"></span>
                <button onclick="closeMessage()">&#9932;</button>
            </div>
        </section>
        
        <section>
            <?php
            include 'inventoryBackend.php';
            // include 'inventoryCards.php';
            ?>
        </section>
        
        <section>
            <?php include 'inventoryList.php'; ?>
        </section>
        <section>
            <?php // for pegination
            include 'pagination.php';
            ?>
            <br>
        </section>
    </main>
    <!-- main content ends -->
</body>
<script src="inventoryValidation.js"></script>
<script src="../../Components/flash_message.js"></script>
<script src="../../Components/UpdateDate.js"></script>
<script>
    flashMessage("<?php if (isset($message)) echo $message; ?>", 3);
</script>
<script>
    searchBar = document.getElementById('filterForm');
    searchBar.addEventListener("change", () => {
        searchBar.submit();
    })
</script>

</html>