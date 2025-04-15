<?php
    function set_url_limit_filters($page, $listLimit){

        $search_title = isset($_GET['title']) ? $_GET['title'] : "";
        $search_category_id = isset($_GET['category-list']) ? $_GET['category-list'] : "";
        $search_tag = isset($_GET['tag-list']) ? $_GET['tag-list'] : "";
        $search_sort_by = isset($_GET['sort-by-list']) ? $_GET['sort-by-list'] : "";
        $search_sort = isset($_GET['sort']) ? $_GET['sort'] : "";
        
        $search_sort_by = ($search_sort_by == "") ? "item_title" : $search_sort_by;
        $search_sort = ($search_sort_by == "" ? "ASC" : $search_sort);
    
        $filter = "?title=$search_title&category-list=$search_category_id&tag-list=$search_tag&sort-by-list=$search_sort_by&sort=$search_sort&page=$page&listLimit=$listLimit";
        return $filter;
    }

    $listLimit = isset($_GET['listLimit']) ? $_GET['listLimit'] : 20;
    $countSql = "SELECT Count(*) as total_row from full_inventory" . get_where_clause_filters();
    
    require '../../Components/pagination.php';
?>    