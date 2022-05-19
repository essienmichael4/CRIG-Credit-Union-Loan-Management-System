<?php

    include_once("./dbs.inc.php");

    $sql = "SELECT SUM(`loan_amount`) as loans FROM `applicant` WHERE `approved_status` != 'unapproved' OR `approved_status` != 'pending';";

    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    $loans=number_format($row['loans'],2);
    echo "Gh¢ {$loans}";