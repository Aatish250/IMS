<?php include 'addBackend.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Item</title>

  <link rel="stylesheet" href="../../util.css" />
  <link rel="stylesheet" href="../adminRoot.css" />
  <link rel="stylesheet" href="AddItem.css" />
  <link rel="stylesheet" href="../../Components/flashMessage.css">
</head>

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
    
input:required:invalid:not(:placeholder-shown),
textarea:required:invalid:not(:placeholder-shown) {
  border: 2px solid #ff3333;
}
    
input:focus:invalid,
textarea:focus:invalid {
  border: 2px solid #ff3333;
}
</style>


<body>
  <!-- Side Bar start -->
  <?php
  $activeAside = 2; // set the index of list of asides to be set as active
  include '../rootAside-Admin.php';
  ?>
  <!-- Side Bar end -->

  <!-- main content starts -->
  <main class="wrapper">
    <header>
      <!-- heading of main content beside sidebar -->
      <div class="main-heading">
        <div class="main-heading-left">
          <h1>Add Items</h1>
          <p>
            <?php
            $result = mysqli_query($conn, "SELECT COUNT(item_id) as items FROM inventory");
            $count = mysqli_fetch_row($result);
            echo ($count[0] == "") ? "No items registered!" : "{$count[0]} items registered in inventory";
            ?>
          </p>
        </div>
        <div class="main-heading-right">
          <span class="staff"><?php echo $_SESSION['username']; ?></span>
          <p id="display-date"></p>
        </div>
      </div>
    </header>

    <!-- Error message container positioned at top right -->
    <div id="flashBox" class="flash-box">
      <span id="flashMessage" class="flashMessage"></span>
      <button onclick="closeMessage()">&#9932;</button>
    </div>

    <!-- START: White container -->
    <section class="additem-container">
      <!-- START: Form container -->
      <form action="" method="POST" enctype="multipart/form-data" class="add-form">
        <!-- START: Additem container left section -->
        <div class="additem-left">
          <!-- START: Left Section heading and logo -->
          <div class="additem-left-heading">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 icon">
                <path
                  d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                <path fill-rule="evenodd"
                  d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087Zm6.163 3.75A.75.75 0 0 1 10 12h4a.75.75 0 0 1 0 1.5h-4a.75.75 0 0 1-.75-.75Z"
                  clip-rule="evenodd" />
              </svg>
              <p>Add</p>
          </div>
          <!-- END: Left Section heading and logo -->
          
          <!-- START: Upload Image container -->
          <div class="upload-container">
            <input name="img" type="file" id="fileInput" class="file-input" accept="image/*" hidden />
            <div class="upload-box" id="uploadBox">
              <img src="../../Images/icons/dragdrop.svg" alt="upload icon" class="upload-icon" />
              <p>Choose Image or Drag and <br> Drop Image</p>
            </div>
          </div>
          <!-- END: Upload Image container -->
          
        </div>
        <!-- END: Additem container left section -->

        <!-- START: Additem container Right Section -->
        <div class="additem-right">
          <div class="additem-field">
            <label class="additem-title" for="title" id="title">
                Title:
            </label>
            <input type="text" name="item-title" id="title" placeholder="Title..." required />
          </div>

          <div class="additem-pq">
            <div class="additem-field" id="priceField">
              <label for="" class="price">Price:
              </label>
              <input required type="number" placeholder="Price..." name="price" id="priceInput" inputmode="numeric" min="1" onkeydown="preventNegative(event)" oninput="removeNegative(this)"/>
            </div>
            <div class="additem-field" id="quantityField">
              <label for="" class="quantity">Quantity:
              </label>
              <input required type="number" placeholder="Quantity..." name="quantity" id="quantityInput" min="1" onkeydown="preventNegative(event)" oninput="removeNegative(this)"/>
            </div>
          </div>

          <div class="dropdown-container">
            <select class="styled-select" name="tag" required>
              <option value="" disabled selected>Tag</option>
              <option >No Tag</option> <!--Initially there was value = " " -->
              <option>New</option>
              <option>Top Selling</option>
              <option>Original</option>
            </select>

            <select class="styled-select" name="category_id" required>
              <option value="" disabled selected>Category</option>
              <?php
              $categories = mysqli_query($conn, "SELECT * FROM category");
              while ($c = mysqli_fetch_assoc($categories))
                echo "<option value='{$c['category_id']}'>{$c['category']}</option>";
              ?>
            </select>
          </div>

          <div class="additem-field">
            <label class="additem-location" for="location">Location:
              </label>
              <input type="text" name="location" id="location" placeholder="Location..." required />
          </div>

          <div class="additem-field">
            <label for="description" class="additem-description">Description:
              </label>
              <textarea type="text" name="description" id="description" placeholder="Description..." required ></textarea>
          </div>

          <div class="additem-cta">
            <button class="add-btn" name="item-submit">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 icon">
                <path fill-rule="evenodd"
                  d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z"
                  clip-rule="evenodd" />
              </svg>
              Add to Inventory
            </button>
            <button class="cancel" type="reset">Cancel</button>
          </div>
        </div>
        <!-- END: Additem container Right Section -->
      </form>
      <!-- END: Form container -->
    </section>
    <!-- END: White container -->
  </main>
  <!-- main content ends -->


  <script src="../../Components/UpdateDate.js"></script>
  <script src="../../Components/flash_message.js"></script>
  <script src="add.js"></script>
  <script src="AddItemValidation.js"></script>
  <script>
    // send php value here inside the function
    flashMessage("<?php if (isset($_GET['message']))
      echo $_GET['message']; ?>", 2);
  </script>
</body>

</html>