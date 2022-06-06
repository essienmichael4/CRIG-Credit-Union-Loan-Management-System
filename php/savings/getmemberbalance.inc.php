<?php
    include_once("../dbs.inc.php");
    include_once("../functions.inc.php");
    $memcode = $_POST["memcode"];

    $sql = "SELECT * FROM `savings` WHERE `mem_code` = '{$memcode}' OR `staff_id` = '{$memcode}';";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $balance = $row["balance"];
    echo $balance;
