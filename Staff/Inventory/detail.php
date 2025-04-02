
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
                                    <hr/>
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
                                                <span class='stock'>
                                                    <img src='../../Images/icons/inventory.svg' alt='Stock'> 
                                                    <input type='number' id='stock' value={$row['quantity']} readonly hidden>
                                                    <span class='quantity'>{$row['quantity']} in stock</span>
                                                </span>
                                                <span class='location'>
                                                    <img src='../../Images/icons/location.svg' alt='Location'> 
                                                    <span class='location-text'>{$row['location']}</span>
                                                </span>
                                            </div>
                                            <div class='buttons-info'>
                                                <div class='qty-controls'>
                                                    <button class='qty-ctrl-btn minus-btn' data-action='-'>-</button>
                                                    <input type='number' name='qty' id='qty' class='qty-ctrl-inp' value=1 readonly>
                                                    <button class='qty-ctrl-btn plus-btn' data-action='+'>+</button>
                                                </div>   
                                                    <button class='request' name='req-item' value={$row['item_id']}>
                                                        <img src='../../Images/icons/requestItem.svg' alt='request item'>
                                                    Request Item</button>
                                            </div>
                                            
                                                "
                                            . ($row['quantity'] > 0 ?
                                            "<div class='sell-info'>
                                                <div class='qty-info'>
                                                        Rs. <input type='number' id='total' name='total' value='{$row['price']}' readonly>
                                                </div>
                                                    <button name='sell-item' value={$row['item_id']}>
                                                        <img src='../../Images/icons/dollorWhite.svg' alt='sell item logo'>
                                                        Sell Directly
                                                    </button>
                                            </div>
                                            <div class='collection-info'>
                                                <button class='add-collection' name='add-collection' value='{$row['item_id']}'>
                                                    <img src='../../Images/icons/cart.svg' alt='cart logo' style='filter: brightness(0) invert(1)'>
                                                    Add to collection
                                                </button>
                                            </div>"
                                            : "<div class='sell-info'>
                                                <div class='qty-info'>
                                                    Please Request no stock left
                                                </div>") .
                                        "</form>
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
