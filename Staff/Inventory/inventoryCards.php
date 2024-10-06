<?php
include("inventoryBackend.php");
?>


<!-- <link rel="stylesheet" href="card.css"> -->

<div class="card-wrapper">

    <div class="card">
        <a href="">
            <img src="../../Images/testimg/585-KB.png" alt="">
        </a>
        <div class="tag">Top Selling</div>
        <div class="card-content">
            <h3>Type C Earphone</h3>
            <div class="category">Category</div>
            <div class="price">Rs. 1099</div>
            <div class="quantity">23 in stock</div>
            <button>Details</button>
        </div>
    </div>

    <?php
    if (!isset($sql))
        echo "no sql found <br><hr>";
    // $sql = "SELECT item_id, item_title, item_image, category, price, quantity, tag FROM full_inventory";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='card' id='{$row['item_id']}'>
            <a href='detail.php?id={$row['item_id']}'>
            <img src='" . ($row['item_image'] ? $row['item_image'] : "../../Images/testimg/585-KB.png") . "' alt=''>
            </a>
            " . (($row['tag']) ? "<div class='tag'>{$row['tag']}</div>" : "") . "
            <div class='card-content'>
                <h3>{$row['item_title']}</h3>
                <div class='category'>{$row['category']}</div>
                <div class='price'>Rs. {$row['price']}</div>
                <div class='quantity'>{$row['quantity']} in stock</div>
            </div>
        </div>";
    }
    // $message = "check";
    ?>

</div>