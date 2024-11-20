
<link rel="stylesheet" href="detail.css">
<link rel="stylesheet" href="../../util.css" />
<link rel="stylesheet" href="../staffRoot.css" />
<?php
require "../../dbConn.php";
// require "inventoryBackend.php";
?>
<body>
    <!-- Side Bar start -->
    <?php
    $activeAside = 0; // set the index of list of asides to be set as active
    include '../rootAside-Staff.php';
    ?>
    <!-- Side Bar end -->

    <main class="wrapper">
        <header>
            <!-- heading of main content beside sidebar -->
            <div class="main-heading">
                <div class="main-heading-left">
                    <h1>Details</h1>
                    <p>Detail of the item</p>
                </div>
                <div class="main-heading-right">
                    <!-- display that it is admin -->
                    <span class="staff">Staff</span>
                    <p id="display-date"></p>
                </div>
            </div>
        </header>

        <section class="detail-cont">
            <?php
                $result = mysqli_query($conn, "SELECT * FROM full_inventory WHERE item_id = " . $_GET['id']);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // echo "id: " . $row['item_id'] . "<br>";
                        // echo "<img width='350px' src='" . $row['item_image'] . "'><br>";
                        // echo "Title: " . $row['item_title'] . "<br>";
                        // echo "Price: " . $row['price'] . "<br>";
                        // echo "Quantity: " . $row['quantity'] . "<br>";
                        // echo "Description: " . $row['description'] . "<br>";
                        // echo "Tag: " . $row['tag'] . "<br>";
                        // echo "Category: " . $row['category'] . "<br>";
                        // echo "Location: " . $row['location'] . "<br>";

                        echo "
                        
                        <div class='detail-box'>
                            <a href='" . $_SERVER['HTTP_REFERER'] . "' class='close-btn'>&#x2715;</a>
                            
                            <div class='detail-box-left' >
                                <div class='img-container'>
                                    <img src='{$row['item_image']}' alt=''>
                                </div>
                            </div>           

                            <div class='detail-box-right'>
                                <div class='details'>
                                    <h1>{$row['item_title']}</h1>
                                    <div class='description'>
                                        {$row['description']}
                                    </div>
                                    <div class='sub-title'>
                                        <div class='category'>
                                            <h3>Category:</h3>
                                            <span>{$row['category']}</span>
                                        </div>
                                        <div class='tag'>
                                            <h3>Tag:</h3>
                                            <span>{$row['tag']}</span>
                                        </div>
                                    </div>
                                    <div class='form-container'>
                                        <form action='{$_SERVER['HTTP_REFERER']}' method='POST'>
                                            <input type='number' id='price' value='{$row['price']}' readonly hidden>
                                            <span class='price'>Rs. {$row['price']}</span>
                                            <div class='info'>
                                                <span>
                                                    <img src='../../Images/icons/inventory.svg' alt='Stock'> 
                                                    <input type='number' id='stock' value={$row['quantity']} readonly hidden>
                                                    <span class='quantity'>{$row['quantity']} in stock</span>
                                                </span>
                                                <span>
                                                    <img src='' alt='Location'> {$row['location']} 
                                                </span>
                                            </div>
                                            <div class='buttons-info'>
                                                <button class='qty-ctrl-btn minus-btn' data-action='-'>-</button>
                                                <input type='number' name='qty' id='qty' class='qty-ctrl-inp' value=1 readonly>
                                                <button class='qty-ctrl-btn plus-btn' data-action='+'>+</button>
                                                <button name='req-item' value={$row['item_id']}>Request Item</button>
                                            </div>
                                            <div>
                                                "
                                                    . ($row['quantity'] > 0 ?
                                                    "Rs. <input type='number' id='total' name='total' value='{$row['price']}'>
                                                        <button name='sell-item' value={$row['item_id']}>Sell Directly</button>"
                                                    : "Please Request no stock left") .
                                                "
                                            </div>
                                            <div>
                                                <button name='add-cart' value='{$row['item_id']}'>Add to cart</button>
                                                <button id='isuBtn'>Issue Problem</button>
                                            </div>
                                            <div class='isu-div' id='isuDiv'>
                                                Problem:
                                                    <select name='isu-type' id='isuSel'>
                                                        <option value='' hidden>Problem</option>
                                                        <option>Damage</option>
                                                        <option>Lost</option>
                                                        <option>Naming Error</option>
                                                        <option>Pricing Error</option>
                                                        <option>other</option>
                                                    </select>
                                                    <button name='isu-btn' value='{$row['item_id']}'>Report</button>
                                                    <br>
                                                <input type='text' placeholder='Other Issues' id='isuTxt' name='isu-text'>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                        ";
                    }
                }
                ?>
        </section>
    </main>

    <script src="detail.js"></script>
    <script src="../../Components/UpdateDate.js"></script>

</body>
