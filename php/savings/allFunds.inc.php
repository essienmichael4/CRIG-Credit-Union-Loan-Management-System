<?php
    include_once("../dbs.inc.php");
    // $memcode = mysqli_real_escape_string($conn,$_POST["memcode"]);

    $get_balance = "SELECT SUM(`balance`) AS `balance` FROM `savings`;";

    $balance_result = $conn->query($get_balance);

    $row = mysqli_fetch_assoc($balance_result);

    $balance= $row['balance'];


    $get_interest = "SELECT SUM(`loan_interest`) as interest FROM `applicant`;";

    $interest_result = $conn->query($get_interest);

    $row = mysqli_fetch_assoc($interest_result);

    $interest= $row['interest'];

    $allfunds = (float)$balance + (float)$interest;
    $allfunds = number_format($allfunds, 2);
    echo "Gh¢ {$allfunds}";