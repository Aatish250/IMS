<style>
    body {
        background-color: #1e1e1e;
        color: white;
    }
</style>
<link rel="stylesheet" href="edit.css">

<?php
require "../../dbConn.php";
// require "inventoryBackend.php";

if (isset($_GET['item-edit'])) {
    echo "<a href='" . $_SERVER['HTTP_REFERER'] . "' class='close-btn'>&#x2715;</a>";

    $sql = "SELECT * FROM full_inventory WHERE item_id = {$_GET['item-edit']}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $item_id = $_GET['item-edit'];
    $img_src = $row['item_image'];
    $title = $row['item_title'];
    $price = $row['price'];
    $quantity = $row['quantity'];
    $tag = $row['tag'];
    $category_id = $row['category_id'];
    $location = $row['location'];
    $description = $row['description'];

}

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
    $sql = "UPDATE inventory SET item_title = '{$title}', price = {$price}, quantity= {$quantity} WHERE item_id = {$item_id}";
    $result = mysqli_query($conn, $sql);
    $sql = "UPDATE item_details SET tag= '{$tag}', category_id= {$category_id}, location= '{$location}', description= '{$description}' WHERE item_id = {$item_id}";
    $result = mysqli_query($conn, $sql);


    // this redirects to invneotry page
    header('location: inventory.php');
}


?>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <img src="<?php echo $img_src ?>" alt="Image" height="300px">
        <input type="text" name="relative_img_path" value="<?php echo $img_src ?>">
        <br>
        <input type="file" name="new-file" id="" accept="image/*">
        <br>
        Title:
        <input type="text" name="new-name" id="" value="<?php echo $title ?>">
        <br>
        Price:
        <input type="number" name="new-price" id="" value="<?php echo $price ?>">
        <br>
        Quantity:
        <button class='qty-ctrl-btn' data-action='-'>-</button>
        <input type="number" name="new-quantity" id='qty' class='qty-ctrl-inp' value="<?php echo $quantity ?>">
        <button class='qty-ctrl-btn plus-btn' data-action='+'>+</button>
        <br>
        Tag:
        <select name="new-tag" id="">
            <option <?php echo (isset($tag) && $tag == "" ? "selected" : "") ?>>No Tag</option>
            <option <?php echo (isset($tag) && $tag == "Top Selling" ? "selected" : "") ?>>Top Selling
            </option>
            <option <?php echo (isset($tag) && $tag == "New" ? "selected" : "") ?>>New</option>
            <option <?php echo (isset($tag) && $tag == "Original" ? "selected" : "") ?>>Original</option>
        </select>
        <br>
        Category:
        <select name="new-category" id="">
            <?php
            $categories = mysqli_query($conn, "SELECT * FROM category");
            while ($c = mysqli_fetch_assoc($categories)) {
                echo "<option value='{$c['category_id']}'" . (($category_id == $c['category_id']) ? "selected" : "") . ">{$c['category']}</option>";
            } ?>
            ?>
        </select>
        <br>
        Location:
        <input type="text" name="new-location" id="" value="<?php echo $location ?>">
        <br>
        Description:
        <textarea name="new-description" id=""><?php echo $description ?></textarea>
        <br>
        <button name="new-edit" value="<?php echo $item_id; ?>">Edit</button>

    </form>

</body>
<script src="edit.js"></script>