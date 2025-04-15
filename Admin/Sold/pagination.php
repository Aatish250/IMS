<?php
// this function is used to change the data in the list
function set_url_limit_filters($page, $listLimit){
        
    if (isset($_GET['startDate']) && isset($_GET['endDate'])) {
        $startDate = $_GET['startDate'];
        $endDate = $_GET['endDate'];
    } else {
        $startDate = date('Y-m-d');
        $endDate = date('Y-m-d');
    }

    $filter = "?page=$page&listLimit=$listLimit&startDate=$startDate&endDate=$endDate";
    return $filter;
}

// this sql is usde to fetch data from dtabase accroding to where clused
// $sql = "SELECT COUNT(*) AS total_row FROM sold WHERE sold_date BETWEEN '$startDate' AND '$endDate'";
// $listLimit = isset($_GET['listLimit']) ? (int) $_GET['listLimit'] : 10;

require '../../Components/pagination.php';

?>