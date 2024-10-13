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




?>

<body>
    <form action="<?php echo $_SERVER['HTTP_REFERER'] ?>" method="POST" enctype="multipart/form-data">
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