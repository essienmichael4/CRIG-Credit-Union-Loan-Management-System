<?php
    include_once("../dbs.inc.php");
    include_once("../functions.inc.php");
    $memcode = $_POST["memcode"];

    $sql = "SELECT * FROM `savings` WHERE `mem_code` = '{$memcode}';";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)<1){
        echo 'false';
    }else{
        $row = mysqli_fetch_assoc($result);

        $name = $row["first_name"]." ".$row["last_name"]." ".$row["other_names"];
        echo $name;
    }