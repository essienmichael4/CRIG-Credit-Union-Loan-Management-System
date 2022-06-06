<?php
    if(isset($_POST["deposit"])){
        include_once("../dbs.inc.php");
        include_once("../functions.inc.php");

        $processor = mysqli_real_escape_string($conn,$_POST["processor"]);
        $account_id = mysqli_real_escape_string($conn,$_POST["account_id"]);
        $memcode = mysqli_real_escape_string($conn,$_POST["memcode"]);
        $receiptnumber = mysqli_real_escape_string($conn,$_POST["receiptnum"]);
        $depositamount = (float)mysqli_real_escape_string($conn,$_POST["deposit"]);
        $deposittype = mysqli_real_escape_string($conn,$_POST["deposittype"]);
        $transaction_type = "deposit";
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
        
        $balance = $initialbalance + $depositamount;

        $sql = "INSERT INTO `transactions`(`member_code`, `receipt_number`, `transaction_type`,
            `deposit_type`, `amount`, `ammount_in_account`
        , `balance_in_account`, `transacted_by`) 
        VALUES('$memcode', '$receiptnumber','$transaction_type', 
        '$deposittype', $depositamount ,$initialbalance, $balance, '$processor')";

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

        $processor = mysqli_real_escape_string($conn,$_POST["processor"]);        
        $account_id = mysqli_real_escape_string($conn,$_POST["account_id"]);
        $memcode = mysqli_real_escape_string($conn,$_POST["memcode"]);
        $debitamount = (float)mysqli_real_escape_string($conn,$_POST["deposit"]);
        $transaction_type = "debit";
        $balance = 0;
        $initialbalance = 0;

        $sql = "SELECT * FROM `savings` WHERE `mem_code` = '{$memcode}' OR 
        `staff_id` = '{$memcode}';";
                
        $result = mysqli_query($conn, $sql);
    
        if($row != mysqli_fetch_assoc($result)){
            header("location: ../src/routes.php?pgname=apply&error=memcodenotfound"); 
            exit();
        }else{
            $row = mysqli_fetch_assoc($result);
            $initialbalance = (float)$row["balanace"];
        }
        
        
        if($initialbalance < $debitamount){
            header("location: ../src/routes.php?pgname=savings&error=overdraft"); 
            exit();
        }
        $balance = $initialbalance - $debitamount;

        $sql = "INSERT INTO `transactions`(`member_code`, `transaction_type`,
         `amount`, `ammount_in_account`
        , `balance_in_account`, `transacted_by`) 
        VALUES('$memcode', '$transaction_type', $debitamount ,$initialbalance, $balance, '$processor')";

        if( mysqli_query($conn, $sql)){
            $sql = "UPDATE `savings` SET `balance` = $balance WHERE `member_code` = '$memcode'";
            if(mysqli_query($conn, $sql)){
                header("location: ../src/routes.php?pgname=savings"); 
                exit();
            }else{
                header("location: ../src/routes.php?pgname=savings&error=sqlerror"); 
                exit();
            }
        }
    }else{
        header("location: ../src/routes.php?pgname=savings");
        exit();
    }