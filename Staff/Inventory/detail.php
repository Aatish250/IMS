
<link rel="stylesheet" href="detail.css">
<!-- <link rel="stylesheet" href="../../util.css" /> -->
<?php
require "../../dbConn.php";
// require "inventoryBackend.php";
?>
<body>
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
                            <div class='sub-title'>
                                <span class='category'>{$row['category']}</span>
                                <span class='tag'>{$row['tag']}</span>
                            </div>
                            <div class='form-container'>
                                <form action='{$_SERVER['HTTP_REFERER']}' method='POST'>
                                    <input type='number' id='price' value='{$row['price']}'>
                                    <div class='info'>
                                        <span>
                                            <img src='' alt='Stock'> 
                                            <input type='number' id='stock' value={$row['quantity']} readonly>
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
                        <div class='description'>
                            <h2>Description</h2>
                            {$row['description']}
                        </div>
                    </div>

                </div>
                
                ";
            }
        }
        ?>
    </section>
    <script src="detail.js"></script>
</body>
