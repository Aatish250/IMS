<?php
$countResult = mysqli_query($conn, $countSql);
    $row = mysqli_fetch_assoc($countResult);

    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    // if ($listLimit < 1) $listLimit = 1;
    
    
    if($row['total_row'] > 0  && $listLimit != 0){
        $total_pages = ceil($row['total_row'] / $listLimit);
        
        echo "<hr><div class='pagination'>";

        //Previous page btn (goback step 1 till 1)
        echo "<a href='".set_url_limit_filters(max(1, ($page - 1)), $listLimit)."'>previous</a>";
        if($total_pages > 6){
            //Begining part
            //previous btn when hiting previous wall
            if($page > 2) {
                echo "<a href='".set_url_limit_filters(1,$listLimit)."'>1</a>";
            }
            if($page > 3)
                echo "...";

            //middle part
            // when page btn 2 or + add 1 btn before active
            if($page > 1)
                echo "<a href='".set_url_limit_filters(($page-1),$listLimit)."'>".($page -1)."</a>";
            //active btn
            echo "<a class='active'>$page</a>";
            //when page btn is before last or most before the last page btn
            if($page < $total_pages)
                echo "<a href='".set_url_limit_filters(($page + 1),$listLimit)."'>".($page + 1)."</a>";

            //last part
            //next page btn
            if($page < $total_pages - 1){
                if($page < $total_pages - 2)
                    echo "...";
                echo "<a href='".set_url_limit_filters($total_pages,$listLimit)."'>$total_pages</a>";
            }
            
        } else {
            for($i=1; $i <= $total_pages; $i++){
                echo "<a ". (($i==$page) ? "class='active' " : "href=".set_url_limit_filters($i,$listLimit)). ">$i</a>";
            }
        }
        //next page btn
        echo "<a href='".set_url_limit_filters(min($total_pages, $page + 1), $listLimit)."'>Next</a>";

        echo "</div>";
    }
    ?>