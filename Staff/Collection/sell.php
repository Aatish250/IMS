<?php

function deleteID($conn, $id)
{
    $sql = "DELETE FROM `collection` WHERE `item_id` = " . $id;
    $result = mysqli_query($conn, $sql);
    if ($result)
        $message = "Remove item ID: {$id} from collection list";
}

if (isset($_POST['delete-id'])) {
    deleteID($conn, $_POST['delete-id']);
}

if (isset($_POST['sell-item'])) {

    // Get info from the inventory table of the selected item id
    $inventoryTable = mysqli_query($conn, "SELECT * FROM inventory WHERE item_id=" . $_POST['sell-item']);
    $inventory = mysqli_fetch_assoc($inventoryTable);

    // Get info from the sold table of the selected item id
    $soldTable = mysqli_query($conn, "SELECT * FROM sold WHERE item_id=" . $_POST['sell-item'] . " AND sold_date=CURDATE()");
    $sold = mysqli_fetch_assoc($soldTable);

    // to check if item is sold today if yes update else insert sql is performed
    $rowcount = mysqli_num_rows($soldTable);
    if ($rowcount > 0) {

        // append the data
        $qty = $_POST['qty'] + $sold['sold_qty'];
        $total = $_POST['total'] + $sold['sold_total'];

        $updateSold = "UPDATE sold SET sold_qty=$qty, sold_total=$total WHERE item_id={$_POST['sell-item']}";
        $result = mysqli_query($conn, $updateSold);
        if ($result) {

            $newQty = $inventory['quantity'] - $_POST['qty'];
            $result = mysqli_query($conn, "UPDATE inventory SET quantity=$newQty WHERE item_id=" . $_POST['sell-item']);
            if ($result) {
                deleteID($conn, $_POST['sell-item']);
                $message = "Sold {$_POST['qty']} items of {$inventory['item_title']} for Rs.{$_POST['total']}";
            }
        }

    } else {

        $addSold = "INSERT INTO sold VALUES (NULL, {$_POST['sell-item']}, CURDATE(), '{$inventory['item_title']}', {$inventory['price']}, {$_POST['qty']}, {$_POST['total']})";
        $result = mysqli_query($conn, $addSold);
        if ($result) {
            $newQty = $inventory['quantity'] - $_POST['qty'];
            $result = mysqli_query($conn, "UPDATE inventory SET quantity=$newQty WHERE item_id=" . $_POST['sell-item']);
            if ($result) {
                deleteID($conn, $_POST['sell-item']);
                $message = "Sold {$_POST['qty']} items of {$inventory['item_title']} for Rs.{$_POST['total']}";
            }
        }
    }
}



// item_id
// item_title
// price
// quantity
// cart_qty