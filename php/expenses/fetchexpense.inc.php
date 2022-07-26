<?php
    include_once("../dbs.inc.php");
    include_once("../functions.inc.php");
    $date = date('Y'."-01-16 00:00:00");

    // WHERE daybought BETWEEN '{$firstdate}' AND
    //     '{$seconddate}'
    
    // $date = date('Y'."-01-01 00:00:00");
    // $sql = "SELECT * FROM `orders` WHERE `daybought` >= '{$date}' && `category` = 'crig';";

    $sql = "SELECT * FROM `expenses` WHERE `day_added` >= '{$date}';";

    $result = mysqli_query($conn, $sql);

    $expenses= array();

    while($res = mysqli_fetch_assoc($result)){
        $expenses[] = $res;
    }

    echo json_encode($expenses);