<style>
    body {
        background-color: #1e1e1e;
        color: white;
    }
</style>
<link rel="stylesheet" href="detail.css">
<?php
require "../../dbConn.php";
// require "inventoryBackend.php";
?>

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
            <div class='img'>
                <img width='350px' src='{$row['item_image']}' alt=''>
            </div>
            <div class='details'>
                <h1>{$row['item_title']}</h1>
                <div class='sub-title'>
                    <span class='category'>{$row['category']}</span>
                    <span class='tag'>{$row['tag']}</span>
                </div>
                <div>
                    <form action='{$_SERVER['HTTP_REFERER']}' method='POST'>
                        <input type='number' id='price' readonly value='{$row['price']}'>
                        <div class='info'>
                            <span>
                                <img src='' alt='Stock'> 
                                <input type='number' id='maxQty' value={$row['quantity']} readonly>
                            </span>
                            <span>
                                <img src='' alt='Location'> {$row['location']} 
                            </span>
                        </div>
                        <div>
                                <span class='qty-ctrl-btn minus-btn' data-action='-'>-</span>
                                <input type='number' name='qty' id='qty' class='qty-ctrl-inp' value=1 readonly>
                                <span class='qty-ctrl-btn plus-btn' data-action='+'>+</span>
                            <button name='req-item' value={$row['item_id']}>Request Item</button>
                        </div>
                        <div>"
            . ($row['quantity'] > 0 ?
                "Rs. <input type='number' id='total' name='total' value='{$row['price']}'>
                            <button name='sell-item' value={$row['item_id']}>Sell Directly</button>"
                : "Please Request no stock left") .
            "</div>
                        <div>
                            <button>Add to cart</button>
                            <button>Issue Problem</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class='description'>
                <h2>Description</h2>
                {$row['description']}
            </div>
        </div>
        ";

    }
}
?>
<script src="detail.js"></script>
<hr>

<!-- <div class="detail-box">
    <a href="" class="close-btn">&#x2715;</a>
    <div class="img">
        <img width='350px' src="<?php echo $imgSrc ?>" alt="">
    </div>
    <div class="details">
        <h1>My Power Type C Earphone - Metallic Shell - E450c</h1>
        <div class="sub-title">
            <span class="category">Earphone</span>
            <span class="tag">Popular</span>
        </div>
        <div>
            <dic class="price">1099</dic>
            <div class="info">
                <span>
                    <img src="" alt=""> 23
                </span>
                <span>
                    <img src="" alt=""> Shelf-1 - Drawer-2
                </span>
            </div>
            <form action="">
                <div>
                    <button>+</button>
                    <input type="number" value="1">
                    <button>-</button>
                </div>
                <div>
                    Rs.
                    <input type="number" value=1099>
                    <button>Sell Directly</button>
                </div>
                <div>
                    <button>Add to cart</button>
                    <button>Issue Problem</button>
                </div>
            </form>
        </div>
    </div>
    <div class="features">
        High quality stereo sound, Metal body, Volume control function, Mic, play pause key, Selfie function, Support to
        all brand
    </div>
</div> -->