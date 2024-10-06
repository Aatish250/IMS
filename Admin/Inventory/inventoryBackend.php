<?php

$message = '';


// function to set the sql query for searching
function show_full_inventory_filter_sql()
{
    $search_title = isset($_GET['title']) ? $_GET['title'] : "";
    $search_category_id = isset($_GET['category-list']) ? $_GET['category-list'] : "";
    $search_tag = isset($_GET['tag-list']) ? $_GET['tag-list'] : "";
    $search_sort_by = isset($_GET['sort-by-list']) ? $_GET['sort-by-list'] : "";
    $search_sort = isset($_GET['sort']) ? $_GET['sort'] : "";

    $findCategory = ($search_category_id !== "") ? "AND category_id = {$search_category_id}" : "";
    $findTag = ($search_tag !== "") ? "AND tag = '{$search_tag}'" : "";

    $search_sort_by = ($search_sort_by == "") ? "item_title" : $search_sort_by;
    $search_sort = ($search_sort_by == "" ? "ASC" : $search_sort);

    $sql = "SELECT item_id, item_title, price, quantity, category_id, category, item_image, tag 
    FROM full_inventory
    WHERE item_title LIKE '%{$search_title}%' {$findCategory} {$findTag} ORDER BY {$search_sort_by} {$search_sort}";
    return $sql;
}

// ser serch query on page load
$sql = show_full_inventory_filter_sql();



if (isset($_GET["title"]) || isset($_GET["category-list"]) || isset($_GET["tag-list"]) || isset($_GET["sort-by-list"]) || isset($_GET["sort"])) {
    // filter according to given inputs
    $sql = show_full_inventory_filter_sql();
}

