<?php
?>


<!-- <link rel="stylesheet" href="card.css"> -->

<div class="card-wrapper">

<!-- Demo card -->
    <!-- <div class="card">
        <img src="../../Images/testimg/585-KB.png" alt="">
        <div class="tag">Top Selling</div>
        <div class="card-content">
            <h3>Type C Earphone</h3>
            <div class="inv-details">
                <div class="price">Rs. 1099</div>
                <div class="category">Category</div>
            </div>
            <div class="quantity">23 in stock</div>
        </div>
        <div class="menu">
            &#8942;
            <div class="menu-buttons">
                <button>Edit</button>
                <button>Delete</button>
            </div>
        </div>
        
    </div> -->
   
    <?php
    if (!isset($sql))
        echo "no sql found <br><hr>";
    // $sql = "SELECT item_id, item_title, item_image, category, price, quantity, tag FROM full_inventory";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='card' id='{$row['item_id']}'>
            <a href='AnishEdit.php?item-edit={$row['item_id']}'>
                <img src='" . ($row['item_image'] ? $row['item_image'] : "../../Images/testimg/585-KB.png") . "' alt=''>
            </a>

            " . (($row['tag']) ? "<div class='tag'>{$row['tag']}</div>" : "") . "
            <div class='card-content'>
                <h3>{$row['item_title']}</h3>
                <div class='inv-details'>
                    <div class='price'>Rs. {$row['price']}</div>
                    <div class='category'>{$row['category']}</div>
                </div>
            </div>
            <div class='inv-details'>
                <div class='quantity'>
                    <svg width='26' height='30' viewBox='0 0 26 30' fill='none' xmlns='http:// www.w3.org/2000/svg'>
                        <path d='M18.9284 5.5394L16.7747 4.22746C14.8842 3.07582 13.9389 2.5 12.9221 2.5C11.9052 2.5 10.96 3.07582 9.06946 4.22746L8.72302 4.4385L18.3317 10.8121L22.657 8.30165C21.9612 7.38686 20.8385 6.70292 18.9284 5.5394Z' fill='#888888'/>
                        <path d='M23.4196 9.95544L19.1139 12.4544V16.25C19.1139 16.7678 18.7523 17.1875 18.3063 17.1875C17.8603 17.1875 17.4987 16.7678 17.4987 16.25V13.3919L13.7297 15.5794V27.38C14.5028 27.1565 15.3825 26.6206 16.7747 25.7725L18.9284 24.4606C21.2454 23.0491 22.4039 22.3435 23.0472 21.0754C23.6905 19.8073 23.6905 18.2291 23.6905 15.0731V14.9269C23.6905 12.5611 23.6905 11.082 23.4196 9.95544Z' fill='#888888'/>
                        <path d='M12.1145 27.38V15.5794L2.42466 9.95544C2.15369 11.082 2.15369 12.5611 2.15369 14.9269V15.0731C2.15369 18.2291 2.15369 19.8073 2.79699 21.0754C3.44028 22.3435 4.59878 23.0491 6.91577 24.4606L9.06946 25.7725C10.4618 26.6206 11.3414 27.1565 12.1145 27.38Z' fill='#888888'/>
                        <path d='M3.18713 8.30163L12.9221 13.9519L16.5954 11.8199L7.02593 5.47229L6.9158 5.53938C5.00577 6.7029 3.883 7.38684 3.18713 8.30163Z' fill='#888888'/>
                    </svg>{$row['quantity']}
                </div>
                <form action='delete.php'>
                    <button type='submit' name='item-delete' value='{$row['item_id']}'> <img src='../../Images/icons/deleteWhite.svg' alt='delete'>Delete</button>
                </form>
            </div>
        </div>";
    }
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