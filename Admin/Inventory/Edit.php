<link rel="stylesheet" href="edit.css">
<link rel="stylesheet" href="../../util.css" />
<link rel="stylesheet" href="../adminRoot.css" />
<style>
    .error-message {
        color: #ff3333;
        font-size: 0.8rem;
        display: block;
        margin-top: 5px;
        font-weight: 500;
        transition: opacity 0.3s ease;
    }
    
    input:invalid + .error-message,
    textarea:invalid + .error-message {
        display: block;
    }
    
    input:required:invalid,
    textarea:required:invalid {
        border: 2px solid #ff3333;
    }
    
    .edititem-field {
        margin-bottom: 20px;
    }
</style>

<?php
require "../../dbConn.php";

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
                    <span class="staff">Admin</span>
                    <p id="display-date"></p>
                </div>
            </div>
        </header>

        <!-- START: Edit item container -->
        <section class="edititem-container">
            <form action="<?php echo $_SERVER['HTTP_REFERER'] ?>" method="POST" enctype="multipart/form-data" class="edit-form" id="editItemForm" onsubmit="return validateForm()">
                <!-- START: Edit item left -->
                <div class="edititem-left">
                    <!-- START: Left Section heading and logo -->
                    <div class="edititem-left-heading">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                            <path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/>
                        </svg>
                        <p>Edit</p>
                    </div>
                    <!-- END: Left Section heading and logo -->

                    <!-- START: Upload Image Container -->
                     <div class="upload-container">
                        <div class="upload-box" id="uploadBox">
                            <img src="<?php echo $img_src?>" alt="Image" id="preview-image" >
                        </div>
                     </div>
                    <!-- END: Upload Image Container -->
                    <input type="text" name="relative_img_path" value="<?php echo $img_src ?>" hidden>

                    <!-- START: To Upload image File -->
                    <label for="file-upload" class="custom-file-upload">
                        Upload File
                    </label>
                    <input id="file-upload" type="file" name="new-file" accept="image/*" class="FileInput" onchange="previewImage(this)"/>
                    <!-- END: To Upload image File -->
                </div>
                <!-- END: Edit item left -->

                <!-- START: Edit item right -->
                <div class="edititem-right">
                    <div class="edititem-field">
                        <label class="edititem-title" for="title" id="title">
                            Title:
                        </label>
                        <input type="text" name="new-name" id="itemTitle" value="<?php echo $title ?>" required>
                        <span class="error-message" id="titleError"></span>
                    </div>

                    <div class="edititem-pq">
                        <div class="edititem-field" id="priceField">
                            <label for="" class="price">Price:
                            </label>
                            <input required type="number" name="new-price" id="priceInput" inputmode="numeric" min="1" onkeydown="preventNegative(event)" oninput="removeNegative(this)" value="<?php echo $price ?>" required />
                            <span class="error-message" id="priceError"></span>
                        </div>
                        <div class="edititem-field" id="quantityField">
                            <label for="" class="quantity">Quantity:</label>
                            <button type="button" class='qty-ctrl-btn' data-action='-'>-</button>
                            <input type="number" name="new-quantity" id='qty' class='qty-ctrl-inp' value="<?php echo $quantity ?>" min="1">
                            <button type="button" class='qty-ctrl-btn plus-btn' data-action='+'>+</button>
                            <span class="error-message" id="quantityError"></span>
                        </div>  
                    </div>
                    
                    <div class="dropdown-container">
                        <select name="new-tag" id="tagSelect" class="styled-select">
                            <option <?php echo (isset($tag) && $tag == "" ? "selected" : "") ?>>No Tag</option>
                            <option <?php echo (isset($tag) && $tag == "Top Selling" ? "selected" : "") ?>>Top Selling
                            </option>
                            <option <?php echo (isset($tag) && $tag == "New" ? "selected" : "") ?>>New</option>
                            <option <?php echo (isset($tag) && $tag == "Original" ? "selected" : "") ?>>Original</option>
                        </select>

                        <select name="new-category" id="categorySelect" class="styled-select">
                            <?php
                                $categories = mysqli_query($conn, "SELECT * FROM category");
                                while ($c = mysqli_fetch_assoc($categories)) {
                                    echo "<option value='{$c['category_id']}'" . (($category_id == $c['category_id']) ? "selected" : "") . ">{$c['category']}</option>";
                                } 
                            ?>         
                        </select>
                    </div>

                    <div class="edititem-field">
                        <label class="edititem-location" for="location">Location:
                        </label>
                        <input type="text" name="new-location" id="locationInput" value="<?php echo $location ?>" required>
                        <span class="error-message" id="locationError"></span>
                    </div>

                    <div class="edititem-field">
                        <label for="description" class="edititem-description">Description:
                        </label>
                        <textarea type="text" name="new-description" id="description" required ><?php echo $description ?></textarea>
                        <span class="error-message" id="descriptionError"></span>
                    </div>

                    <div class="edititem-cta">
                        <button class="add-btn" name="new-edit" value="<?php echo $item_id; ?>">
                            Save Changes
                        </button>
                        <button type="button" class="cancel" onclick="resetForm()" name='cancel-id'>Cancel</button>
                    </div>
                </div>
                <!-- END: Edit item right -->
            </form>
        </section>
        <!-- END: Edit item container -->

    </main>
</body>

<script src="edit.js"></script>
<script src="../../Components/UpdateDate.js"></script>
<script src="editValidation.js"></script>