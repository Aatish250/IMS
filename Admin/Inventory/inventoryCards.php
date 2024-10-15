<?php
include("inventoryBackend.php");
?>

<!-- <link rel="stylesheet" href="card.css"> -->

<div class="card-wrapper">

    <?php
    if (!isset($sql))
        echo "no sql found <br><hr>";
    // $sql = "SELECT item_id, item_title, item_image, category, price, quantity, tag FROM full_inventory";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo 
            "<div class='card'>
        <a href='edit.php?item-edit={$row['item_id']}'>
            <img src='" . ($row['item_image'] ? $row['item_image'] : "../../Images/testimg/585-KB.png") . "' alt=''>
        </a>
       " . (($row['tag']) ? "<div class='tag'>{$row['tag']}</div>" : "") . "
        <div class='card-content'>
            <h3>{$row['item_title']}</h3>
            <div class='card-pc-section'>
                <div class='price'>Rs. {$row['price']}</div>
                <div class='category'>{$row['category']}</div>
            </div>
        </div>
        <div class='card-bottom-section'>
            <div class='quantity'>{$row['quantity']} in stock</div>
            <form action='delete.php' method='GET'>
                <button type='submit' name='item-delete' value='{$row['item_id']} id='del-btn'>
                    <svg width='16' height='17' viewBox='0 0 16 17' fill='none'     xmlns='http://www.w3.org/2000/svg'>
                        <path d='M13.8334 2.94967H2.16675M9.66675 2.11633H6.33341M3.00008 6.283V14.6163C3.00008 15.1719 3.27786 15.4497 3.83341 15.4497C4.38897 15.4497 7.16675 15.4497 12.1667 15.4497C12.7223 15.4497 13.0001 15.1719 13.0001 14.6163C13.0001 14.0608 13.0001 11.283 13.0001 6.283' stroke='white' stroke-width='2.5' stroke-linecap='square'/>
                    </svg>
                    <span>Delete</span>
                </button>
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