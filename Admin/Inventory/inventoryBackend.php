<?php

$message = '';


// function to set the sql query for searching
function show_full_inventory_filter_sql()
{
    $search_title = isset($_GET['title']) ? $_GET['title'] : "";
    $search_category_id = isset($_GET['category-list']) ? $_GET['category-list'] : "";
    $search_tag = isset($_GET['tag-list']) ? $_GET['tag-list'] : "";
    $search_sort_by = isset($_GET['sort-by-list']) ? $_GET['sort-by-list'] : "";
    $search_sort = isset($_GET['sort']) ? $_GET['sort'] : "";

    $findCategory = ($search_category_id !== "") ? "AND category_id = {$search_category_id}" : "";
    $findTag = ($search_tag !== "") ? "AND tag = '{$search_tag}'" : "";

    $search_sort_by = ($search_sort_by == "") ? "item_title" : $search_sort_by;
    $search_sort = ($search_sort_by == "" ? "ASC" : $search_sort);

    $sql = "SELECT item_id, item_title, price, quantity, category_id, category, item_image, tag 
    FROM full_inventory
    WHERE item_title LIKE '%{$search_title}%' {$findCategory} {$findTag} ORDER BY {$search_sort_by} {$search_sort}";
    return $sql;
}


if (isset($_GET["title"]) || isset($_GET["category-list"]) || isset($_GET["tag-list"]) || isset($_GET["sort-by-list"]) || isset($_GET["sort"])) {
    // filter according to given inputs
    $sql = show_full_inventory_filter_sql();
}

// search query on page load
$sql = show_full_inventory_filter_sql();

// --------------------- on edit click ------------------

if (isset($_POST['new-edit'])) {

    // Variables used inside program
    $item_id = $_POST['new-edit']; // get item id
    $relative_img_path = $_POST['relative_img_path']; // image data from fomr post
    $new_name = $_POST['new-name']; // if other data from form post
    $new_price = $_POST['new-price'];
    $new_quantity = $_POST['new-quantity'];
    $new_tag = $_POST['new-tag'];
    $new_category = $_POST['new-category'];
    $new_location = $_POST['new-location'];
    $new_description = $_POST['new-description'];

    // if image is changed
    if ($_FILES['new-file']['size'] > 0) {
        $parentDir = dirname(dirname(__DIR__));
        $new_actual_path = str_replace("../..", $parentDir, $relative_img_path);
        $new_img_name = $_FILES['new-file']['name'];
        $img_tmp = $_FILES['new-file']['tmp_name'];

        $old_actual_path = $new_actual_path; // copy previous full path to delte previous image
        $new_actual_path = "{$parentDir}/Images/item/{$item_id}_{$new_img_name}"; // set full path of image to upload

        // delete old image
        if (file_exists($old_actual_path))
            unlink($old_actual_path);

        // set image relative path and update it in database
        $relative_img_path = "../../Images/item/{$item_id}_{$new_img_name}";
        mysqli_query($conn, "UPDATE inventory SET item_image = '{$relative_img_path}' WHERE item_id = {$item_id}");
        move_uploaded_file($img_tmp, $new_actual_path);
    }

    // variables used to represent values in form
    $img_src = $relative_img_path;
    $title = $new_name;
    $price = $new_price;
    $quantity = $new_quantity;
    $tag = $new_tag;
    $category_id = $new_category;
    $location = $new_location;
    $description = $new_description;


    // update the changes
    $updateInvSql = "UPDATE inventory SET item_title = '{$title}', price = {$price}, quantity= {$quantity} WHERE item_id = {$item_id}";
    $result1 = mysqli_query($conn, $updateInvSql);
    $updateInvDetailSql = "UPDATE item_details SET tag= '{$tag}', category_id= {$category_id}, location= '{$location}', description= '{$description}' WHERE item_id = {$item_id}";
    $result2 = mysqli_query($conn, $updateInvDetailSql);

    if ($result1 && $result2)
        $message = "Updateditem ID: {$item_id}";
}


// --------------------- on message session set ------------------

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
