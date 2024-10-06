<?php

if (isset($_POST['add-id'])) {
    $item_id = $_POST['add-id'];
    $sql = "SELECT quantity, request_qty FROM `view_requests` WHERE `item_id` = $item_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $newQty = $row['quantity'] + $_POST['qty'];


    $sql = "UPDATE `inventory` SET `quantity` = $newQty WHERE `item_id` = $item_id";
    mysqli_query($conn, $sql);
    deleteItem($conn, $item_id);

    $message = "{$_POST['qty']} item(s) Added to Item-ID: {$_POST['add-id']}";
}

if (isset($_POST['delete-id'])) {
    $item_id = $_POST['delete-id'];
    deleteItem($conn, $item_id);
    $message = "Request Item-ID:{$_POST['delete-id']} DELETED";
}

function deleteItem($conn, $item_id)
{
    $sql = "DELETE FROM `request` WHERE `item_id` = $item_id";
    mysqli_query($conn, $sql);
    // header("location: dashboard.php");
}