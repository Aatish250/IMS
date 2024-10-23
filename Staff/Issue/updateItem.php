<?php

if (isset($_POST['update-id'])) {
    $issue_id = $_POST['update-id'];

    $isuTxt = (isset($_POST['isu-text']) && $_POST['isu-type'] == 'other')
        ? $_POST['isu-text']
        : "";

    $sql = "UPDATE issue 
        SET qty = {$_POST['qty']}, issue = '{$_POST['isu-type']}', text =  '$isuTxt' 
        WHERE `issue_id` = $issue_id";
    $result = mysqli_query($conn, $sql);
    if ($result)
        $message = "Issue-ID: {$_POST['update-id']} with {$_POST['qty']} item(s), Problem: {$_POST['isu-type']} $isuTxt UPDATED";
}

if (isset($_POST['delete-id'])) {
    $issue_id = $_POST['delete-id'];
    deleteItem($conn, $issue_id);
    $message = "Issue-ID:{$_POST['delete-id']} DELETED";
}

function deleteItem($conn, $issue_id)
{
    $sql = "DELETE FROM `issue` WHERE `issue_id` = $issue_id";
    mysqli_query($conn, $sql);
    // header("location: dashboard.php");
}