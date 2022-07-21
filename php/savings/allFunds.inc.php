<?php
    include_once("../dbs.inc.php");
    // $memcode = mysqli_real_escape_string($conn,$_POST["memcode"]);

    $get_balance = "SELECT SUM(`balance`) AS `balance`, SUM(`registration_fee`) as regfee FROM `savings`;";
    $balance_result = $conn->query($get_balance);
    $row = mysqli_fetch_assoc($balance_result);
    $balance= $row['balance'];
    $regfee= $row['regfee'];

    $get_interest = "SELECT SUM(`loan_interest`) as interest FROM `applicant`;";
    $interest_result = $conn->query($get_interest);
    $row = mysqli_fetch_assoc($interest_result);
    $interest= $row['interest'];

    $get_expense = "SELECT SUM(`item_price`) as expense FROM `expenses`;";
    $expense_result = $conn->query($get_expense);
    $row = mysqli_fetch_assoc($expense_result);
    $expenses= $row['expense'];

    $allfunds = ((float)$balance + (float)$regfee + (float)$interest) - $expenses;
    $allfunds = number_format($allfunds, 2);
    echo "Gh¢ {$allfunds}";