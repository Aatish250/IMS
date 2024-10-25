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
</head>

<body>
  <!-- Side Bar start -->
  <?php
  $activeAside = 2; // set the index of list of asides to be set as active
  include '../rootAside-Admin.php';
  ?>
  <!-- Side Bar end -->

  <!-- main content starts -->
  <div class="wrapper">
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
          <!-- display that it is admin -->
          <span class="staff">Admin</span>
          <p id="display-date"></p>
        </div>
      </div>
    </header>

    <div id="flashBox" class="flash-box">
      <span id="flashMessage" class="flashMessage"></span>
      <button onclick="closeMessage()">&#9932;</button>
    </div>

    <section class="additem-container">
      <form action="" method="POST" enctype="multipart/form-data" class="add-form">
        <div class="additem-left">
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
          
            <div class="upload-container">
              <input name="img" type="file" id="fileInput" class="file-input" accept="image/*" hidden />
              <div class="upload-box" id="uploadBox">
                <img src="../../Images/icons/dragdrop.svg" alt="upload icon" class="upload-icon" />
                <p>Choose Image or Drag and Drop Image</p>
              </div>
            </div>
          
        </div>
        <div class="additem-right">
          <div class="additem-field">
            <label class="additem-title" for="title" id="title">
                Title:
            </label>
            <input type="text" name="item-title" id="title" placeholder="Title..." required />
          </div>

          <div class="additem-pq">
            <div class="additem-field">
              <label for="" class="price">Price:
                </label>
                <input required type="number" placeholder="Price..." name="price" id="" />
            </div>
            <div class="additem-field">
              <label for="" class="quantity">Quantity:
                </label>
                <input required type="number" placeholder="Quantity..." name="quantity" id="" />
            </div>
          </div>

          <div class="dropdown-container">
            <select class="styled-select" name="tag" required>
              <option value="" disabled selected>Tag</option>
              <option value="">No Tag</option>
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
      </form>
    </section>
  </div>
  <!-- main content ends -->


  <script src="../../Components/UpdateDate.js"></script>
  <script src="add.js"></script>
  <script src="../../Components/flash_message.js"></script>
  <script>
    // send php value here inside the function
    flashMessage("<?php if (isset($_GET['message']))
      echo $_GET['message']; ?>", 5);
  </script>
</body>

</html>