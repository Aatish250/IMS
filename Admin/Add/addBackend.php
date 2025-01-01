<?php

require '../../dbConn.php';
require '../checkAdmin.php';

// ---------- INSERT MAIN DETAILS TO DATABASE ----------
function insert_item_main_detail($conn)
{
    $sql = "INSERT INTO inventory VALUES(NULL, '" . $_POST['item-title'] . "', NULL, " . $_POST['price'] . ", " . $_POST['quantity'] . ")";
    if (mysqli_query($conn, $sql)) {
        return true;
    }
    return false;
}


// ---------- GET CATEGORY NAME FOR CREATING || SET UPLOAD PATH ----------
// function get_category_name($conn)
// {
//     $sql = "SELECT * FROM category WHERE category_id = {$_POST['category_id']}";
//     if ($result = mysqli_query($conn, $sql)) {
//         $row = mysqli_fetch_assoc($result);
//         return $row['category'];
//     }
//     return false;
// }


// ---------- UPLOAD IMAGE TO CATEGORY DIRECTORY AND SEND PATH TO DTATABASE 
function upload_image($conn, $last_id)
{
    // get file ingo
    $filename = $last_id . "_" . $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    // get root directory and set directory
    $parentDirectory = dirname(dirname(__DIR__));
    $actualPath = $parentDirectory . "/Images/item/" . $filename;
    $relativePath = str_replace($parentDirectory, "../..", $actualPath);

    // checks for existing directory is no creates new of name category name
    if (!is_dir($parentDirectory . "/Images/item/"))
        mkdir($parentDirectory . "/Images/item/");
    // upload file to defined directory
    move_uploaded_file($tmp_name, $actualPath);
    // update relative path of file to database
    $sql = "UPDATE inventory SET item_image = '$relativePath' WHERE item_id = $last_id";
    if (mysqli_query($conn, $sql)) {
        return true;
    }
    return false;
}

// ---------- INSERT SUB DETAILS TO DATABASE ----------
function insert_item_sub_detail($conn, $last_id)
{
    $sql = "INSERT INTO item_details VALUES($last_id, '{$_POST['description']}', {$_POST['category_id']}, '{$_POST['tag']}', '{$_POST['location']}')";

    if (mysqli_query($conn, $sql)) return true;
}

// --------- MAIN PROGRAM ----------

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['item-submit'])) {

    if (insert_item_main_detail($conn)) {
        $last_id = mysqli_insert_id($conn);

        if (upload_image($conn, $last_id)) {

            if (insert_item_sub_detail($conn, $last_id)) {
                $message = "Item {$_POST['item-title']} Added Successfully!";
                header("location: index.php?message=" . $message);
            }
        }
    }
}


// function to upload image on folder of ite own category

// function upload_image($conn, $last_id, $category)
// {
//     // get file ingo
//     $filename = $last_id . "_" . $_FILES['img']['name'];
//     $tmp_name = $_FILES['img']['tmp_name'];
//     // get root directory and set directory
//     $parentDirectory = dirname(dirname(__DIR__));
//     $actualPath = $parentDirectory . "/Images/item/" . $category . "/" . $filename;
//     $relativePath = str_replace($parentDirectory, "../..", $actualPath);

//     // checks for existing directory is no creates new of name category name
//     if (!is_dir($parentDirectory . "/Images/item/" . $category))
//         mkdir($parentDirectory . "/Images/item/" . $category);
//     // upload file to defined directory
//     if (move_uploaded_file($tmp_name, $actualPath))
//         echo "uploaded...";
//     // update relative path of file to database
//     $sql = "UPDATE inventory SET item_image = '$relativePath' WHERE item_id = $last_id";
//     if (mysqli_query($conn, $sql)) {
//         echo "Updated to db...";
//         return true;
//     }
//     return false;
// }