<?php
require '../../dbConn.php';
include 'inventoryBackend.php';
if (isset($_GET['item-delete'])) {
    $sql = "SELECT item_image FROM inventory WHERE item_id = '" . $_GET['item-delete'] . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $relativePath = $row['item_image'];
    $rootPath = dirname(dirname(__DIR__));
    $actualPath = str_replace("../..", $rootPath, $relativePath);

    if (file_exists($actualPath))
        unlink($actualPath);

    (mysqli_query($conn, "DELETE FROM inventory WHERE item_id = '" . $_GET['item-delete'] . "'")) ?
        $message = "Item:  " . $_GET['item-delete'] . " Deleted!"
        : $message = "Error Deleting Data";

    header("Location: {$_SERVER['HTTP_REFERER']}");
}

?>
