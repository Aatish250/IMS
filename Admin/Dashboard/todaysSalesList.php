<?php



$sql = "SELECT COUNT(*) as total_count, SUM(sold_total) as total_sum FROM sold where sold_date = CURDATE()";
$result = mysqli_query($conn, $sql);
$summary = mysqli_fetch_assoc($result);

$total_sales_count = $summary['total_count'];
$total_sum = $summary['total_sum'];

$sql = "SELECT * FROM sold where sold_date = CURDATE()";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  echo "<tbody>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
    <td>" . $row['transaction_id'] . "</td>
    <td>" . $row['item_id'] . "</td>
    <td>" . $row['sold_date'] . "</td>
    <td>" . $row['sold_item_title'] . "</td>
    <td>" . $row['sold_qty'] . "</td>
    <td>" . $row['sold_price'] . "</td>
    <td>" . $row['sold_total'] . "</td>
    </tr>";
  }
  echo "</tbody>";

  echo "
    <tfoot>  
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><strong>Total</strong></td>
        <td><strong>" . $total_sales_count . "</strong></td>
        <td colspan='2'>Rs. " . number_format($total_sum, 2) . "</td>
      </tr>
    </tfoot>  
    ";
} else {
  echo "<tr><td colspan='7' style='color: #888;'> -------------- --- -- - No Order Today - -- --- -------------- </td></tr>";
}
?>


<!-- <tbody>
  <tr>
    <td>106</td>
    <td>55</td>
    <td>2024-09-20</td>
    <td>Sold Item Title</td>
    <td>3</td>
    <td>2</td>
    <td>6</td>
  </tr>
</tbody>
<tfoot>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>Total</td>
    <td>5</td>
    <td>48363</td>
  </tr>
</tfoot> -->