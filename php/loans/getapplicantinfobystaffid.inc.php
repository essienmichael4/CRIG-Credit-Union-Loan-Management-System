<?php
    include_once("../dbs.inc.php");
    include_once("../functions.inc.php");
    $memcode = $_POST["memcode"];

    $sql = "SELECT * FROM `savings` WHERE `staff_id` = '{$memcode}';";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)<1){
        echo 'false';
    }else{
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    }