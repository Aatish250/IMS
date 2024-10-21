<?php
require '../../dbConn.php';
include 'inventoryBackend.php';

if (isset($_GET['item-delete'])) {
    $deleteSql = "SELECT item_image FROM inventory WHERE item_id = '" . $_GET['item-delete'] . "'";
    $result = mysqli_query($conn, $deleteSql);
    $row = mysqli_fetch_assoc($result);
    $relativePath = $row['item_image'];
    $rootPath = dirname(dirname(__DIR__));
    $actualPath = str_replace("../..", $rootPath, $relativePath);

    if (file_exists($actualPath))
        unlink($actualPath);

    $message = (mysqli_query($conn, "DELETE FROM inventory WHERE item_id = '" . $_GET['item-delete'] . "'"))
        ? "Item:  " . $_GET['item-delete'] . " Deleted!"
        : "Error Deleting Data";
    session_start();
    $_SESSION['message'] = $message;
    header("Location: {$_SERVER['HTTP_REFERER']}");
}

?>