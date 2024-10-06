<style>
    body {
        background-color: #1e1e1e;
        color: white;
    }
</style>

<?php
require "../../dbConn.php";
require "inventoryBackend.php";
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
        <input type="number" name="new-quantity" id="" value="<?php echo $quantity ?>">
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