<form action="" method="GET" id="filterForm" class="query-box">
    <input type="text" name="title" placeholder="Search by Name..." value="<?php if (isset($_GET['title']))
    echo $_GET['title'] ?>" id="searchTitle" pattern="[A-Za-z0-9\s\-]+" title="Only letters, numbers, spaces and hyphens allowed" onkeypress="return /[A-Za-z0-9\s\-]/i.test(event.key)">
     <!-- *  It adds input validation through:
     *    - pattern attribute: restricts input to letters, numbers, spaces and hyphens using regex [A-Za-z0-9\s\-]+
     *    - title attribute: provides a tooltip explaining the allowed characters when validation fails
     *    - onkeypress event: prevents typing characters that don't match the pattern by testing each keystroke
     *      against the same regex pattern and only allowing the keystroke if it returns true
    -->
    <button type="submit" name="filter-btn">Filter</button>
    <select name="category-list">
        <option value="" hidden selected>Category</option>
        <option value="">All</option>
        <?php $result = mysqli_query($conn, "SELECT * FROM category");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='{$row['category_id']}'" . ((isset($_GET['category-list']) && $_GET['category-list'] == $row['category_id']) ? "selected" : "") . ">
        {$row['category']}</option>";
        } ?>
    </select>
    <select name="tag-list">
        <option value="" hidden>Tag</option>
        <option value="" <?php echo (isset($_GET['tag-list']) && $_GET['tag-list'] == "All" ? "selected" : "") ?>>All
        </option>
        <option <?php echo (isset($_GET['tag-list']) && $_GET['tag-list'] == "New" ? "selected" : "") ?>>New</option>
        <option <?php echo (isset($_GET['tag-list']) && $_GET['tag-list'] == "Top Selling" ? "selected" : "") ?>>Top
            Selling
        </option>
        <option <?php echo (isset($_GET['tag-list']) && $_GET['tag-list'] == "Original" ? "selected" : "") ?>>Original
        </option>
    </select>
    <select name="sort-by-list">
        <option value="item_title" <?php echo (isset($_GET['sort-by-list']) ? ($_GET['sort-by-list'] == "item_title" ? "selected" : "") : "selected") ?>>Sort By: Name</option>
        <option value="price" <?php echo (isset($_GET['sort-by-list']) && $_GET['sort-by-list'] == 'price' ? "selected" : "") ?>>
            Sort By: Price</option>
        <option value="quantity" <?php echo (isset($_GET['sort-by-list']) && $_GET['sort-by-list'] == 'quantity' ? "selected" : "") ?>>Sort By: Quantity</option>
    </select>
    <!-- START: List listLimit -->
    <label for="listLimit" class="listLimt">
       Show Items:
   </label>
   <input type="number" name="listLimit" id="listLimit" class="data-limit" value="<?php echo (int) ((isset($_GET['listLimit']) ? $_GET['listLimit'] : 20)) ?>">
   <!-- END: List listLimit -->
    <div class="sorting">
        <!-- START: ascending sort -->
        <input id="sortAsc" class="sort-radio" type="radio" name="sort" value="ASC" <?php echo (isset($_GET['sort']) ? ($_GET['sort'] == 'ASC' ? "checked" : "") : "checked") ?>>
        <label for="sortAsc" class="sorts">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="27" height="27">
                <path d="M151.6 42.4C145.5 35.8 137 32 128 32s-17.5 3.8-23.6 10.4l-88 96c-11.9 13-11.1 33.3 2 45.2s33.3 11.1 45.2-2L96 146.3 96 448c0 17.7 14.3 32 32 32s32-14.3 32-32l0-301.7 32.4 35.4c11.9 13 32.2 13.9 45.2 2s13.9-32.2 2-45.2l-88-96zM320 480l32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-32 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm0-128l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm0-128l160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-160 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm0-128l224 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L320 32c-17.7 0-32 14.3-32 32s14.3 32 32 32z"
                fill="black" stroke="currentColor" stroke-width="2"/>
            </svg>
        </label>
        <!-- END: ascending sort -->
        <!-- START: descending sort -->
        <input id="sortDesc" class="sort-radio" type="radio" name="sort" value="DESC" <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'DESC') ? "checked" : "" ?>>
        <label for="sortDesc" class="sorts">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="27" height="27">
                <path d="M151.6 469.6C145.5 476.2 137 480 128 480s-17.5-3.8-23.6-10.4l-88-96c-11.9-13-11.1-33.3 2-45.2s33.3-11.1 45.2 2L96 365.7 96 64c0-17.7 14.3-32 32-32s32 14.3 32 32l0 301.7 32.4-35.4c11.9-13 32.2-13.9 45.2-2s13.9 32.2 2 45.2l-88 96zM320 32l32 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-32 0c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 128l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-96 0c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 128l160 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-160 0c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 128l224 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-224 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"
                fill="black" stroke="currentColor" stroke-width="2"/>
            </svg>
        </label>
        <!-- END: descending sort -->
        <button type="button" onclick="window.location.reload();" style="font-size: 20px; font-weight: 800;padding: 0 5px;margin-left: 5px">&#x21bb;</button>
    </div>
</form>

<script>
    const searchInput = document.getElementById("searchTitle");
    searchBar.addEventListener("submit", (e) => {
        searchInput.value = searchInput.value.replace(/[^a-zA-Z\s]/g, "");
    });
</script>

<script>
    // Function to set the SVG color based on the selected radio button
    function setSvgColor() {
    const ascSvg = document.querySelector("label[for='sortAsc'] svg path");
    const descSvg = document.querySelector("label[for='sortDesc'] svg path");

    const isCheckedAsc = document.getElementById("sortAsc").checked;
    const isCheckedDesc = document.getElementById("sortDesc").checked;

    if (isCheckedAsc) {
        ascSvg.style.fill = "var(--accent-clr)";
        ascSvg.style.stroke = "var(--accent-clr)";
        descSvg.style.fill = "black";
        descSvg.style.stroke = "black";
    } else if (isCheckedDesc) {
        descSvg.style.fill = "var(--accent-clr)";
        descSvg.style.stroke = "var(--accent-clr)";
        ascSvg.style.fill = "black";
        ascSvg.style.stroke = "black";
    }
    }

    document.addEventListener("DOMContentLoaded", setSvgColor);
    document.getElementById("sortAsc").addEventListener("change", setSvgColor);
    document.getElementById("sortDesc").addEventListener("change", setSvgColor);
</script>
