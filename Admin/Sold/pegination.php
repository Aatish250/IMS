<?php
// Pagination links
$sql = "SELECT COUNT(*) AS total_row FROM sold WHERE sold_date BETWEEN '$startDate' AND '$endDate'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_pages = ceil($row['total_row'] / $results_per_page);
$listLimit = isset($_GET['listLimit']) ? (int) $_GET['listLimit'] : 10;

if ($row['total_row'] > 0) {
    echo "<div class='pagination'>";
    if ($total_pages > 6) {

        // Previous page
        echo "<a href='?page=" . max(1, ($page - 1)) . "&listLimit=$listLimit&startDate=$startDate&endDate=$endDate'>Prev</a>";
        if ($page > 2) {
            echo "<a href='?page=1&listLimit=$listLimit&startDate=$startDate&endDate=$endDate'>1</a>";
            if ($page > 3)
                echo "...";
        }

        //Active Page
        if ($page > 1)
            echo "<a href='?page=" . ($page - 1) . "&listLimit=" . $listLimit . "&startDate=$startDate&endDate=$endDate'>" . ($page - 1) . "</a>";
        echo "<a class='active'>$page</a>";
        if ($page < $total_pages)
            echo "<a href='?page=" . ($page + 1) . "&listLimit=$listLimit&startDate=$startDate&endDate=$endDate'>" . ($page + 1) . "</a>";


        // Next page
        if ($page < $total_pages - 1) {
            if ($page < $total_pages - 2) {
                echo "...";
            }
            echo "<a href='?page={$total_pages}&listLimit=$listLimit&startDate=$startDate&endDate=$endDate'>$total_pages</a>";
        }
        echo "<a href='?page=" . min($total_pages, ($page + 1)) . "&listLimit=$listLimit&startDate=$startDate&endDate=$endDate'>Next</a>";
    } else {
        echo "<a href='?page=" . max(1, ($page - 1)) . "&listLimit=$listLimit&startDate=$startDate&endDate=$endDate'>Prev</a>";
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a  " . ($i == $page ? "class='active'" : "href='?page=$i&listLimit=$listLimit&startDate=$startDate&endDate=$endDate'") . ">$i</a>";
        }
        echo "<a href='?page=" . min($total_pages, ($page + 1)) . "&listLimit=$listLimit&startDate=$startDate&endDate=$endDate'>Next</a>";
    }
}
