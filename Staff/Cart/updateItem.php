<?php

if (isset($_POST['update-id'])) {
    $item_id = $_POST['update-id'];
    $sql = "UPDATE request SET request_qty = {$_POST['qty']} WHERE `item_id` = $item_id";
    $result = mysqli_query($conn, $sql);
    if ($result)
        $message = "Updated Item-ID: {$_POST['update-id']} with {$_POST['qty']} item(s) requests";
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