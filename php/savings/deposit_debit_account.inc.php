<?php
    if(isset($_POST["deposit"])){
        include_once("../dbs.inc.php");
        include_once("../functions.inc.php");

        $processor = mysqli_real_escape_string($conn,$_POST["processor"]);
        $account_id = mysqli_real_escape_string($conn,$_POST["account_id"]);
        $memcode = mysqli_real_escape_string($conn,$_POST["memcode"]);
        $receiptnumber = mysqli_real_escape_string($conn,$_POST["receiptnum"]);
        $depositamount = mysqli_real_escape_string($conn,$_POST["depositamount"]);
        $deposittype = mysqli_real_escape_string($conn,$_POST["deposittype"]);
        $depositdate = mysqli_real_escape_string($conn,$_POST["depositdate"]);
        $description = mysqli_real_escape_string($conn,$_POST["description"]);
        $transaction_type = "deposit";
        $balance = 0;
        $initialbalance = 0;

        if(empty($receiptnumber)){
            header("location: ../../src/routes.php?pgname=savingdetails&account_id={$account_id}&error=receipterror"); 
            exit();
        }

        if(empty($depositdate)){
            header("location: ../../src/routes.php?pgname=savingdetails&account_id={$account_id}&error=dateerror"); 
            exit();
        }

        if(!(float)$depositamount){
            header("location: ../../src/routes.php?pgname=savingdetails&account_id={$account_id}&error=inputamounterror"); 
            exit();
        }

        $depositamount = (float)$depositamount;

        $sql = "SELECT * FROM `savings` WHERE `mem_code` = '{$memcode}' OR `staff_id` = '{$memcode}';";
                
        $result = mysqli_query($conn, $sql);
    
        if(mysqli_num_rows($result)<1){
            header("location: ../../src/routes.php?pgname=savingdetails&account_id={$account_id}&error=memcodenotfound"); 
        }else{
            $row = mysqli_fetch_assoc($result);
            $initialbalance = (float)$row["balance"];
        }
        
        $balance = $initialbalance + $depositamount;

        $sql = "INSERT INTO `transactions`(`member_code`, `receipt_number`, `transaction_type`,
            `deposit_type`, `amount_transacted`, `amount_in_account`
        , `balance_in_account`, `transacted_by`, `transaction_day`, `description`) 
        VALUES('$memcode', '$receiptnumber','$transaction_type', 
        '$deposittype', $depositamount ,$initialbalance, $balance, '$processor', '$depositdate'
        , '$description')";

        if( mysqli_query($conn, $sql)){
            $sql = "UPDATE `savings` SET `balance` = $balance WHERE `mem_code` = '$memcode'";
            if(mysqli_query($conn, $sql)){
                header("location: ../../src/routes.php?pgname=savingdetails&account_id={$account_id}&success=success"); 
            }else{
                header("location: ../../src/routes.php?pgname=savingdetails&account_id={$account_id}&error=sqlerror"); 
            }
        }
    }elseif(isset($_POST["debit"])){
        include_once("../dbs.inc.php");
        include_once("../functions.inc.php");

        $processor = mysqli_real_escape_string($conn,$_POST["processor"]);        
        $account_id = mysqli_real_escape_string($conn,$_POST["account_id"]);
        $memcode = mysqli_real_escape_string($conn,$_POST["memcode"]);
        $receiptnumber = mysqli_real_escape_string($conn,$_POST["chequenum"]);
        $debitamount = mysqli_real_escape_string($conn,$_POST["debitamount"]);
        $debitdate = mysqli_real_escape_string($conn,$_POST["debitdate"]);
        $transaction_type = "debit";
        $balance = 0;
        $initialbalance = 0;

        if(empty($debitdate)){
            header("location: ../../src/routes.php?pgname=savingdetails&account_id={$account_id}&error=dateerror"); 
            exit();
        }

        if(empty($receiptnumber)){
            header("location: ../../src/routes.php?pgname=savingdetails&account_id={$account_id}&error=receipterror"); 
            exit();
        }

        if(!(float)$debitamount){
            header("location: ../../src/routes.php?pgname=savingdetails&account_id={$account_id}&error=inputamounterror"); 
            exit();
        }

        $debitamount = (float)$debitamount;

        $sql = "SELECT * FROM `savings` WHERE `mem_code` = '{$memcode}' OR 
        `staff_id` = '{$memcode}';";
                
        $result = mysqli_query($conn, $sql);
    
        if(mysqli_num_rows($result)<1){
            header("location: ../../src/routes.php?pgname=savingdetails&account_id={$account_id}&error=memcodenotfound"); 
            exit();
        }else{
            $row = mysqli_fetch_assoc($result);
            $initialbalance = (float)$row["balance"];
        }
        
        
        if($initialbalance < $debitamount){
            header("location: ../../src/routes.php?pgname=savingdetails&account_id={$account_id}&error=overdraft"); 
            exit();
        }
        $balance = $initialbalance - $debitamount;

        $sql = "INSERT INTO `transactions`(`member_code`, `receipt_number`, `transaction_type`,
         `amount_transacted`, `amount_in_account`
        , `balance_in_account`, `transacted_by`, `transaction_day`) 
        VALUES('$memcode', '$receiptnumber', '$transaction_type', $debitamount ,$initialbalance, $balance, '$processor', '$debitdate')";

        if( mysqli_query($conn, $sql)){
            $sql = "UPDATE `savings` SET `balance` = $balance WHERE `mem_code` = '$memcode'";
            if(mysqli_query($conn, $sql)){
                header("location: ../../src/routes.php?pgname=savingdetails&account_id={$account_id}&success=success"); 
                exit();
            }else{
                header("location: ../../src/routes.php?pgname=savingdetails&account_id={$account_id}&error=sqlerror"); 
                exit();
            }
        }
    }else{
        header("location: ../../src/routes.php?pgname=savingdetails&account_id={$account_id}");
        exit();
    }