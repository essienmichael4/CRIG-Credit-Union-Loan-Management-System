<?php

    include_once("./dbs.inc.php");

    $sql = "SELECT SUM(`loan_to_be_payed`) as loans FROM `applicant` WHERE `approval_status` != 'unapproved' OR `approval_status` != 'pending';";

    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    $loans=number_format($row['loans'],2);
    echo "{$loans}";