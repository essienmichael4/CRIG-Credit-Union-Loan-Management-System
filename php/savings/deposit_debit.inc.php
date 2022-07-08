<?php
    if(isset($_POST["deposit"])){
        include_once("../dbs.inc.php");
        include_once("../functions.inc.php");

        $processor = mysqli_real_escape_string($conn,$_POST["processor"]);
        $memcode = mysqli_real_escape_string($conn,$_POST["memcode"]);
        $receiptnumber = mysqli_real_escape_string($conn,$_POST["receiptnum"]);
        $depositamount = mysqli_real_escape_string($conn,$_POST["deposite_amount"]);
        $deposittype = mysqli_real_escape_string($conn,$_POST["deposittype"]);
        $depositdate = mysqli_real_escape_string($conn,$_POST["depositdate"]);
        $description = mysqli_real_escape_string($conn,$_POST["description"]);
        $transaction_type = "deposit";
        $balance = 0;
        $initialbalance = 0;

        if(empty($receiptnumber)){
            header("location: ../../src/routes.php?pgname=savings&error=receipterror"); 
            exit();
        }

        if(empty($depositdate)){
            header("location: ../../src/routes.php?pgname=savings&error=dateerror"); 
            exit();
        }

        if(!(float)$depositamount){
            header("location: ../../src/routes.php?pgname=savings&error=inputamounterror"); 
            exit();
        }

        $depositamount = (float)$depositamount;

        echo $sql = "SELECT * FROM `savings` WHERE `mem_code` = '{$memcode}' OR `staff_id` = '{$memcode}';";
                
        $result = mysqli_query($conn, $sql);
    
        var_dump($result);
        if(mysqli_num_rows($result)<1){
            header("location: ../../src/routes.php?pgname=savings&error=memcodenotfound"); 
            exit();
        }else{
            $row = mysqli_fetch_assoc($result);
            $initialbalance = (float)$row["balance"];
        }
        
        echo $balance = $initialbalance + $depositamount;

        $sql = "INSERT INTO `transactions`(`member_code`, `receipt_number`, `transaction_type`,
            `deposit_type`, `amount_transacted`, `amount_in_account`
        , `balance_in_account`, `transacted_by`, `transaction_day`, `description`) 
        VALUES('$memcode', '$receiptnumber','$transaction_type', 
        '$deposittype', $depositamount ,$initialbalance, $balance, '$processor', '$depositdate'
        , '$description')";

        if( mysqli_query($conn, $sql)){
            $sql = "UPDATE `savings` SET `balance` = $balance WHERE `mem_code` = '$memcode'";
            if(mysqli_query($conn, $sql)){
                header("location: ../../src/routes.php?pgname=savings&sucess=success"); 
            }else{
                header("location: ../../src/routes.php?pgname=savings&error=sqlerror"); 
            }
        }
    }elseif(isset($_POST["debit"])){
        include_once("../dbs.inc.php");
        include_once("../functions.inc.php");

        $processor = mysqli_real_escape_string($conn,$_POST["processor"]);
        $memcode = mysqli_real_escape_string($conn,$_POST["memcode"]);
        $debitamount = mysqli_real_escape_string($conn,$_POST["debitamount"]);
        $debitdate = mysqli_real_escape_string($conn,$_POST["debitdate"]);
        $receiptnumber = mysqli_real_escape_string($conn,$_POST["chequenum"]);
        $transaction_type = "debit";
        $balance = 0;
        $initialbalance = 0;

        if(empty($receiptnumber)){
            header("location: ../../src/routes.php?pgname=savings&error=receipterror"); 
            exit();
        }

        if(empty($debitdate)){
            header("location: ../../src/routes.php?pgname=savings&error=dateerror"); 
            exit();
        }

        if(!(float)$debitamount){
            header("location: ../../src/routes.php?pgname=savings&error=inputamounterror"); 
            exit();
        }

        $debitamount = (float)$debitamount;

        $sql = "SELECT * FROM `savings` WHERE `mem_code` = '{$memcode}' OR 
        `staff_id` = '{$memcode}';";
                
        $result = mysqli_query($conn, $sql);
    
        if(mysqli_num_rows($result)<1){
            header("location: ../../src/routes.php?pgname=savings&error=memcodenotfound"); 
            exit();
        }else{
            $row = mysqli_fetch_assoc($result);
            $initialbalance = (float)$row["balance"];
        }
        
        if($initialbalance < $debitamount){
            header("location: ../../src/routes.php?pgname=savings&error=overdraft"); 
            exit();
        }

        $balance = $initialbalance - $debitamount;

        $sql = "INSERT INTO `transactions`(`member_code`, `transaction_type`,
         `amount_transacted`, `amount_in_account`, `balance_in_account`, `transacted_by`, `transaction_day`) 
        VALUES('$memcode', '$transaction_type', $debitamount ,$initialbalance, $balance, '$processor', '$debitdate')";

        if( mysqli_query($conn, $sql)){
            $sql = "UPDATE `savings` SET `balance` = $balance WHERE `mem_code` = '$memcode'";
            if(mysqli_query($conn, $sql)){
                header("location: ../../src/routes.php?pgname=savings&success=success"); 
                exit();
            }else{
                header("location: ../../src/routes.php?pgname=savings&error=sqlerror"); 
                exit();
            }
        }
    }else{
        header("location: ../../src/routes.php?pgname=savings");
        exit();
    }