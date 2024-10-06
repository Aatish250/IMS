<?php
$sql = "Select count(*) as items from inventory";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$itemCount = $row['items'];

$sql = "Select count(*) as requests from request";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$requestCount = $row['requests'];

$sql = "Select sum(sold_total) as sales from sold where date(sold_date) = CURDATE()";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$sales = $row['sales'];
?>