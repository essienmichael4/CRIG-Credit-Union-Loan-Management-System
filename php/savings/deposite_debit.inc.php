<?php
    if(isset($_POST["deposite"])){
        include_once("../dbs.inc.php");
        include_once("../functions.inc.php");

        $memcode = mysqli_real_escape_string($conn,$_POST["memcode"]);
        $receiptnumber = mysqli_real_escape_string($conn,$_POST["receiptnum"]);
        $depositeamount = (float)mysqli_real_escape_string($conn,$_POST["deposite"]);
        $depositetype = mysqli_real_escape_string($conn,$_POST["depositetype"]);
        $transaction_type = "deposite";
        $balance = 0;
        $initialbalance = 0;

        $sql = "SELECT * FROM `savings` WHERE `mem_code` = '{$memcode}' OR `staff_id` = '{$memcode}';";
                
        $result = mysqli_query($conn, $sql);
    
        if($row != mysqli_fetch_assoc($result)){
            header("location: ../src/routes.php?pgname=apply&error=memcodenotfound"); 
        }else{
            $row = mysqli_fetch_assoc($result);
            $initialbalance = (float)$row["balanace"];
        }
        
        $balance = $initialbalance + $depositeamount;

        $sql = "INSERT INTO `transactions`(`member_code`, `transaction_type`,
            `deposite_type`, `amount`, `ammount_in_account`
        , `balance_in_account`, `transacted_by`) 
        VALUES('$memcode', '$transaction_type', 
        '$depositetype', $depositeamount ,$initialbalance, $balance, '$processor')";

        if( mysqli_query($conn, $sql)){
            $sql = "UPDATE `savings` SET `balance` = $balance WHERE `member_code` = '$memcode'";
            if(mysqli_query($conn, $sql)){
                header("location: ../src/routes.php?pgname=savings"); 
            }else{
                header("location: ../src/routes.php?pgname=savings&error=sqlerror"); 
            }
        }
    }elseif(isset($_POST["debit"])){
        include_once("../dbs.inc.php");
        include_once("../functions.inc.php");

        $transaction_type = "deposite";
        $sql = "INSERT INTO `transactions`(`member_code`, `transaction_type`,
            `deposite_type`, `amount`, `ammount_in_account`
        , `balance_in_account`, `transacted_by`) 
        VALUES('$memcode', '$deposite', 
        '$depositetype', $bulkdeposite ,$initialbalance, $bulkbalance, '$processor')";

        $conn->query($sql);
    }else{
        header("location: ../src/routes.php?pgname=savings"); 
    }