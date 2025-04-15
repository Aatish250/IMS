<!-- soldTable of dtabase starts -->
<section class="list">

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Category</th>
            <th>Tag</th>
            <th>Action</th>
        </tr>
    </thead>

    <?php
echo "<tbody>";

// // get total counts ( Pagination COnfiguration  START )
// $countSql = "SELECT COUNT(*) as total_row, SUM(sold_total) as total_sum FROM sold where sold_date BETWEEN '$startDate' AND '$endDate'";
// $countResult = mysqli_query($conn, $countSql);
// $count = mysqli_fetch_assoc($countResult);

// $total_row = $count['total_row'];
// $total_sum = $count['total_sum'];

// $listLimit = (isset($_GET['listLimit']) ? $_GET['listLimit'] : 10);
// $page = isset($_GET['page']) ? $_GET['page'] : 1;
// $start_from = ($page - 1) * $listLimit;
// // ( Pagination Config END )

// get data form database
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                    <td>" . $row['item_id'] . "</td>
                    <td>" . $row['item_title'] . "</td>
                    <td id='quantity'>" . $row['quantity'] . "</td>
                    <td>" . $row['price'] . "</td>
                    <td>" . $row['category'] . "</td>
                    <td id='tag'>" . $row['tag'] . "</td>
                    <td>
                        <form action='delete.php'>
                            <button type='submit' name='item-delete' value='{$row['item_id']}'> <img src='../../Images/icons/deleteWhite.svg' alt='delete'>Delete</button>
                        </form>
                        <form action='Edit.php'>
                            <button type='submit' name='item-edit' value='{$row['item_id']}'> <img src='../../Images/icons/edit.svg' alt='delete'>Edit</button>
                        </form>
                    </td>
                </tr>";
    }
} else
    echo "<tr><td colspan='6'>No order</td></tr>";

// table footer
echo "</tbody>";
?>
</table>
</section>
<!-- soldTable of dtabase ends -->
 <script>
    tags = document.querySelectorAll("#tag");
    tags.forEach(e => {
        if(e.innerText == "No Tag") {
            e.style.background = "transparent";
            e.style.color = "transparent";
        }
        if(e.innerText == "Original") {
            e.style.background = "royalblue";
            e.style.borderRadius = "2rem 0";
        }
        if(e.innerText == "Top Selling") {
            e.style.background = "orange";
            e.style.borderRadius = "2rem 0 1.5rem 2rem";
        }
    });
    quantitys = document.querySelectorAll("#quantity");
    quantitys.forEach(e => {
        if(e.innerText == '0'){
            e.parentElement.style.color = "red";
            e.parentElement.style.backgroundColor = "#ffeeee";
            console.log(e.parentElement.children);
        }
    });
 </script>