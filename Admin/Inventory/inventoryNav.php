<!-- 1. make a kind of nav bar which contains
- search according to (name)
- show by (tag)
- show by (category)
- sort by (price)
- sort button asce or desc
2. make a auto wrapping card caontainer consitsing of item cards which auto fits according to avaliable width and auto wraps to next line when width is not enough
3. each item card contains
- item image
- item name
- item price
- item quantity
- item tag
- item category
- edit button
- delete button -->

<style>
</style>

<form action="" method="GET" id="filterForm" class="query-box">
    <input type="text" name="title" placeholder="Search..." value="<?php if (isset($_GET['title']))
                                                                        echo $_GET['title'] ?>" id="searchTitle">
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
    <label for="sortAsc">ASC:</label>
    <input id="sortAsc" type="radio" name="sort" value="ASC" <?php echo (isset($_GET['sort']) ? ($_GET['sort'] == 'ASC' ? "checked" : "") : "checked") ?>>
    <label for="sortDesc">DESC:</label>
    <input id="sortDesc" type="radio" name="sort" value="DESC" <?php echo (isset($_GET['sort']) && $_GET['sort'] == 'DESC') ? "checked" : "" ?>>
</form>