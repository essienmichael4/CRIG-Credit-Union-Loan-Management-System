<?php

    include_once("../dbs.inc.php");
    $memcode = mysqli_real_escape_string($conn,$_POST["memcode"]);

    $sql = "SELECT `balance` FROM `savings` 
    WHERE `member_code` = '{$memcode}' OR `staff_id` = '{$memcode}';";

    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    $balance=number_format($row['balance'],2);
    echo "Gh¢ {$balance}";