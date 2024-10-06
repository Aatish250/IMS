<?php
include("inventoryBackend.php");
?>


<!-- <link rel="stylesheet" href="card.css"> -->

<div class="card-wrapper">

    <div class="card">
        <img src="../../Images/testimg/585-KB.png" alt="">
        <div class="tag">Top Selling</div>
        <div class="card-content">
            <h3>Type C Earphone</h3>
            <div class="category">Category</div>
            <div class="price">Rs. 1099</div>
            <div class="quantity">23 in stock</div>
        </div>
        <div class="menu">
            &#8942;
            <div class="menu-buttons">
                <button>Edit</button>
                <button>Delete</button>
            </div>
        </div>
    </div>

    <?php
    if (!isset($sql))
        echo "no sql found <br><hr>";
    // $sql = "SELECT item_id, item_title, item_image, category, price, quantity, tag FROM full_inventory";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='card' id='{$row['item_id']}'>
            <a href='edit.php?item-edit={$row['item_id']}'>
                <img src='" . ($row['item_image'] ? $row['item_image'] : "../../Images/testimg/585-KB.png") . "' alt=''>
            </a>3

            " . (($row['tag']) ? "<div class='tag'>{$row['tag']}</div>" : "") . "
            <div class='card-content'>
                <h3>{$row['item_title']}</h3>
                <div class='category'>{$row['category']}</div>
                <div class='price'>Rs. {$row['price']}</div>
                <div class='quantity'>{$row['quantity']} in stock</div>
            </div>
            <div>
                <form action='delete.php'>
                    <button type='submit' name='item-delete' value='{$row['item_id']}'>Delete</button>
                </form>
            </div>
        </div>";
    }
    // $message = "check";
    ?>

</div>

<!-- <div class='menu'>&#8942;  
    <div>
        <form action='edit.php' method='GET' class='menu-buttons'>
            <button type='submit' name='item-edit' value='{$row['item_id']}'>Edit</button>
        </form>
        <form action=''>
            <button type='submit' name='item-delete' value='{$row['item_id']}'>Delete</button>
        </form>
    </div>
</div> -->