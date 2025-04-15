<?php
// validate todays date
if (isset($_GET['startDate']) && isset($_GET['endDate'])) {
    $startDate = $_GET['startDate'];
    $endDate = $_GET['endDate'];
} else {
    $startDate = date('Y-m-d');
    $endDate = date('Y-m-d');
}

// Start table body
echo "<tbody>";

// get total counts ( Pagination COnfiguration  START )
$countSql = "SELECT COUNT(*) as total_row, SUM(sold_total) as total_sum FROM sold where sold_date BETWEEN '$startDate' AND '$endDate'";
$countResult = mysqli_query($conn, $countSql);
$count = mysqli_fetch_assoc($countResult);

$total_row = $count['total_row'];
$total_sum = $count['total_sum'];

$listLimit = (isset($_GET['listLimit']) ? $_GET['listLimit'] : 10);
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($page - 1) * $listLimit;
// ( Pagination Config END )

// get data form database
$sql = "SELECT * FROM sold where sold_date BETWEEN '$startDate' AND '$endDate' LIMIT $start_from, $listLimit";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                    <td>" . $row['transaction_id'] . "</td>
                    <td>" .
            ($row['sold_date'] == date('Y-m-d') ?
                "Today" : ($row['sold_date'] == date('Y-m-d', strtotime("-1 days")) ?
                    "Yesterday" : $row['sold_date']))
            . "</td>
                    <td>" . $row['sold_item_title'] . "</td>
                    <td>" . $row['sold_price'] . "</td>
                    <td>" . $row['sold_qty'] . "</td>
                    <td>" . $row['sold_total'] . "</td>
                </tr>";
    }
} else
    echo "<tr><td colspan='6'>No order</td></tr>";

// table footer
echo "
        </tbody>
        <tfoot>
            <tr class='total-row'>
                <td colspan='3'></td>
                <td><strong>Total</strong></td>
                <td><strong>" . $total_row . "</strong></td>
                <td><strong>Rs. " . number_format($total_sum, 2) . "</strong></td>
            </tr>
        </tfoot>
        ";
?>