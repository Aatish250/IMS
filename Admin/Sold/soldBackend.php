<?php
require '../checkAdmin.php';
include '../../dbConn.php';

echo $_GET["title"] . "<br>";
echo $_GET["price"] . "<br>";
echo $_GET["qty"] . "<br>";
echo $_GET["total"] . "<br>";
echo $_GET["date"] . "<br>";

if (isset($_GET["add-to-sold"]) && $_GET["title"] != "") {
    echo "Title: " . $_GET["title"] . "<br>";
    echo "Price:" . $_GET["price"] . "<br>";
    echo "Qty: " . $_GET["qty"] . "<br>";
    echo "Total: " . $_GET["total"] . "<br>";
    echo "Date: " . $_GET["date"] . "<br>";

    mysqli_query($conn, "INSERT INTO `sold`(`sold_date`, `sold_item_title`, `sold_price`, `sold_qty`, `sold_total`) VALUES ('{$_GET['date']}','{$_GET['title']}',{$_GET['price']},{$_GET['qty']},{$_GET['total']})");
    header("refresh:5; url=" . $_SERVER['HTTP_REFERER']);
}
?>