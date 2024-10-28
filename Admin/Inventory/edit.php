
<link rel="stylesheet" href="edit.css">
<link rel="stylesheet" href="../../util.css" />
<link rel="stylesheet" href="../adminRoot.css" />

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
    <!-- Side Bar start -->
    <?php
    $activeAside = 1; // set the index of list of asides to be set as active
    include '../rootAside-Admin.php';
    ?>
    <!-- Side Bar end -->

    <!-- main content starts -->
     <main class="wrapper">
        <header>
            <!-- heading of main content beside sidebar -->
            <div class="main-heading">
                <div class="main-heading-left">
                    <h1>Inventory</h1>
                    <p>
                        <?php
                        $result = mysqli_query($conn, "SELECT COUNT(item_id) as items FROM inventory");
                        $count = mysqli_fetch_row($result);
                        echo ($count[0] == "") ? "No items registered!" : "{$count[0]} items registered in inventory";
                        ?>
                    </p>
                </div>
                <div class="main-heading-right">
                    <!-- display that it is admin -->
                    <span class="staff">Admin</span>
                    <p id="display-date"></p>
                </div>
            </div>
        </header>

        <section class="edititem-container">
            <form action="<?php echo $_SERVER['HTTP_REFERER'] ?>" method="POST" enctype="multipart/form-data" class="edit-form">

                <!-- START: Edititem container left section -->
                <div class="edititem-left">
                    <!-- START: Left Section heading and logo -->
                    <div class="edititem-left-heading">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 icon">
                            <path
                            d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                            <path fill-rule="evenodd"
                            d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.163 3.75A.75.75 0 0 1 10 12h4a.75.75 0 0 1 0 1.5h-4a.75.75 0 0 1-.75-.75Z"
                            clip-rule="evenodd" />
                        </svg>
                        <p>Edit</p>
                    </div>
                    <!-- END: Left Section heading and logo -->
                    
                    <!-- START: Upload Image container -->
                    <div class="upload-container">
                        <!-- <input name="img" type="file" id="fileInput" class="file-input" accept="image/*" hidden /> -->
                        <div class="upload-box" id="uploadBox">
                            <img src="<?php echo $img_src ?>" alt="Image" >
                            <!-- <img src="../../Images/icons/dragdrop.svg" alt="upload icon" class="upload-icon" /> -->
                            <!-- <p>Choose Image or Drag and <br> Drop Image</p> -->
                        </div>
                    </div>
                    <input type="text" name="relative_img_path" value="<?php echo $img_src ?>" hidden>
                    
                    <input type="file" name="new-file" id="" accept="image/*" style="cursor: pointer;">
                    <br>
                    <!-- END: Upload Image container -->
                </div>
                <!-- END: Edititem container left section -->

                <!-- <img src="<?php echo $img_src ?>" alt="Image" height="300px"> -->
                <!-- <input type="text" name="relative_img_path" value="<?php echo $img_src ?>" hidden>
                <br>
                <input type="file" name="new-file" id="" accept="image/*">
                <br> -->
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
        </section>
    </main>
    <!-- main content ends -->

</body>
<script src="edit.js"></script>