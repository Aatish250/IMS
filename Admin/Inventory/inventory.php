<?php
require '../../dbConn.php';
require '../checkAdmin.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inventory</title>
    <link rel="stylesheet" href="../../util.css" />
    <link rel="stylesheet" href="../adminRoot.css" />
    <link rel="stylesheet" href="Inventory.css">
</head>

<body>
    <!-- Side Bar start -->
    <?php
    $activeAside = 1; // set the index of list of asides to be set as active
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
        <section>
            <?php include 'inventoryNav.php';
            ?>
        </section>
        <div id="flashBox" class="flash-box">
            <span id="flashMessage" class="flash-message"></span>
            <button onclick="closeMessage()">&#9932;</button>
        </div>
        <section>
            <?php
            include("inventoryBackend.php");
            include 'inventoryCards.php';
            ?>
        </section>
    </main>

    <!-- main content ends -->
    <script src="inventory.js"></script>
    <script src="../../Components/UpdateDate.js"></script>
    <script src="../../Components/flash_message.js"></script>
    
    <script>
        flashMessage("<?php if (isset($message)) echo $message; ?>", 5);
    </script>
    
</body>

</html>