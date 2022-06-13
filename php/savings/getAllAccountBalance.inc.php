<?php
    include_once("../dbs.inc.php");

    $sql = "SELECT SUM(`balance`) AS `balance` FROM `savings`;";

    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    $balance=number_format($row['balance'],2);
    echo "Gh¢ {$balance}";