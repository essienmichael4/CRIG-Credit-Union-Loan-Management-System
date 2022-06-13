<?php

    include_once("./dbs.inc.php");

    $sql = "SELECT SUM(`loan_interest`) as interest FROM `applicant`;";

    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    $interest=number_format($row['interest'],2);
    echo "Gh¢ {$interest}";