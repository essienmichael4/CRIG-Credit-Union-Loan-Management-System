<?php

    include_once("./dbs.inc.php");

    $sql = "SELECT SUM(`loan_paid`) as paid FROM `applicant`;";

    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    $paid=number_format($row['paid'],2);
    echo "Gh¢ {$paid}";