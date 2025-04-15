<?php

$message = isset($_GET['message']) ? $_GET['message'] : '';


// ----------------------- on database & page load (SQLs)--------------------------

///function to get limit sql
function get_sql_limit(){
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $listLimit = isset($_GET['listLimit']) ? $_GET['listLimit'] :20;
    $page_start = ($page - 1) * $listLimit;
    $limitSql = " LIMIT $page_start, $listLimit";
    return $limitSql;
}

// function to get the filter queries
function get_where_clause_filters(){
    $search_title = isset($_GET['title']) ? $_GET['title'] : "";
    $search_category_id = isset($_GET['category-list']) ? $_GET['category-list'] : "";
    $search_tag = isset($_GET['tag-list']) ? $_GET['tag-list'] : "";
    $search_sort_by = isset($_GET['sort-by-list']) ? $_GET['sort-by-list'] : "";
    $search_sort = isset($_GET['sort']) ? $_GET['sort'] : "";
    
    $findCategory = ($search_category_id !== "") ? "AND category_id = {$search_category_id}" : "";
    $findTag = ($search_tag !== "") ? "AND tag = '{$search_tag}'" : "";
    
    $search_sort_by = ($search_sort_by == "") ? "item_title" : $search_sort_by;
    $search_sort = ($search_sort_by == "" ? "ASC" : $search_sort);

    $filter = " WHERE item_title LIKE '%{$search_title}%' {$findCategory} {$findTag} ORDER BY {$search_sort_by} {$search_sort}";
    return $filter;
}

// function to set select SQL query
function show_full_inventory_filter_sql()
{

    $sql = "SELECT item_id, item_title, price, quantity, category_id, category, item_image, tag 
    FROM full_inventory" . get_where_clause_filters() . get_sql_limit();
    return $sql;
}



$sql = show_full_inventory_filter_sql(); // for search query on page load

if (isset($_GET["title"]) || isset($_GET["category-list"]) || isset($_GET["tag-list"]) || isset($_GET["sort-by-list"]) || isset($_GET["sort"])) {
    $sql = show_full_inventory_filter_sql(); // filter according to given inputs
}


// ----------------------- on issue btn click --------------------------
// if (isset($_POST['isu-btn']) && $_POST['isu-type'] != '') {
//     $isuType = $_POST['isu-type'];
//     $isuTxt = $_POST['isu-text'];
//     $id = $_POST['isu-btn'];
//     $qty = $_POST['qty'];

//     $isuSql = "INSERT INTO `issue` (`item_id`, `qty`, `issue`, `text`) VALUES ('{$id}', '{$qty}', '{$isuType}', '{$isuTxt}')";
//     if (mysqli_query($conn, $isuSql))
//         $message = "{$qty} items of id: {$id} is issued with {$isuType} Issue and text: {$isuTxt}";
// }


// ----------------------- on request btn click --------------------------

if (isset($_POST["req-item"])) {
    $sqlForReq = "SELECT * FROM request WHERE item_id=" . $_POST['req-item'];
    $result = mysqli_query($conn, $sqlForReq);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $newQty = $_POST['qty'] + $row['request_qty'];
        $sqlForReq = "UPDATE request SET request_qty={$newQty} WHERE item_id = " . $_POST['req-item'];
    } else {
        $sqlForReq = "INSERT INTO request VALUES({$_POST['req-item']}, {$_POST['qty']})";
    }

    if (mysqli_query($conn, $sqlForReq))
        $message = "items id: {$_POST['req-item']} Requested";
}



// ----------------------- on sell btn click --------------------------

if (isset($_POST["sell-item"])) {

    // Get info from the inventory table of the selected item id
    $inventoryTable = mysqli_query($conn, "SELECT * FROM inventory WHERE item_id=" . $_POST['sell-item']);
    $inventory = mysqli_fetch_assoc($inventoryTable);

    // Get info from the sold table of the selected item id
    $soldTable = mysqli_query($conn, "SELECT * FROM sold WHERE item_id=" . $_POST['sell-item'] . " AND sold_date=CURDATE()");
    $sold = mysqli_fetch_assoc($soldTable);

    // to check if item is sold today if yes update else insert sql is performed
    $rowcount = mysqli_num_rows($soldTable);
    if ($rowcount > 0) {

        // append the data
        $qty = $_POST['qty'] + $sold['sold_qty'];
        $total = $_POST['total'] + $sold['sold_total'];

        $updateSold = "UPDATE sold SET sold_qty=$qty, sold_total=$total WHERE item_id={$_POST['sell-item']}";
        $result = mysqli_query($conn, $updateSold);
        if ($result) {

            $newQty = $inventory['quantity'] - $_POST['qty'];
            mysqli_query($conn, "UPDATE inventory SET quantity=$newQty WHERE item_id=" . $_POST['sell-item']);
            $message = "Sold {$_POST['qty']} items of {$inventory['item_title']} for Rs.{$_POST['total']}";
        }

    } else {

        $addSold = "INSERT INTO sold VALUES (NULL, {$_POST['sell-item']}, CURDATE(), '{$inventory['item_title']}', {$inventory['price']}, {$_POST['qty']}, {$_POST['total']})";
        $result = mysqli_query($conn, $addSold);
        if ($result) {
            $newQty = $inventory['quantity'] - $_POST['qty'];
            mysqli_query($conn, "UPDATE inventory SET quantity=$newQty WHERE item_id=" . $_POST['sell-item']);
            $message = "Sold {$_POST['qty']} items of {$inventory['item_title']} for Rs.{$_POST['total']}";
        }
    }

}

// ----------------------- on add btn click --------------------------

if (isset($_POST["add-collection"])) {

    // Get info from the inventory table of the selected item id
    $inventoryTable = mysqli_query($conn, "SELECT * FROM inventory WHERE item_id=" . $_POST['add-collection']);
    $inventory = mysqli_fetch_assoc($inventoryTable);

    $sqlForCollection = "INSERT INTO collection VALUES ({$inventory['item_id']}, {$_POST['qty']})";
    $result = mysqli_query($conn, $sqlForCollection);
    if ($result)
        $message = "Item ID: {$inventory['item_id']}, added to Collection";
}
?>