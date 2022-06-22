<?php
    if(isset($_POST['createaccount']) || isset($_POST['partialaccount'])){
        include_once("../dbs.inc.php");
        include_once("../functions.inc.php");

        $processor = mysqli_real_escape_string($conn,$_POST["processor"]);
        $firstname = mysqli_real_escape_string($conn,$_POST["firstname"]);
        $lastname = mysqli_real_escape_string($conn,$_POST["lastname"]);
        $othernames = mysqli_real_escape_string($conn,$_POST["othernames"]);
        $memcode = mysqli_real_escape_string($conn,$_POST["memcode"]);
        $phonenumber = mysqli_real_escape_string($conn,$_POST["phonenumber"]);
        $staffid = mysqli_real_escape_string($conn,$_POST["staffid"]);
        $occupation = mysqli_real_escape_string($conn,$_POST["occupation"]);
        $placeofwork = mysqli_real_escape_string($conn,$_POST["placeofwork"]);
        $division = mysqli_real_escape_string($conn,$_POST["division"]);
        $address = mysqli_real_escape_string($conn,$_POST["address"]);
        $residentialaddress = mysqli_real_escape_string($conn,$_POST["residentialaddress"]);
        $maritalstatus = mysqli_real_escape_string($conn,$_POST["maritalstatus"]);
        $nameofspouse = mysqli_real_escape_string($conn,$_POST["nameofspouse"]);
        $children = mysqli_real_escape_string($conn,$_POST["children"]);
        $hometown = mysqli_real_escape_string($conn,$_POST["hometown"]);
        $dateofbirth = mysqli_real_escape_string($conn,$_POST["dateofbirth"]);
        $nextofkin = mysqli_real_escape_string($conn,$_POST["nextofkin"]);
        $nextofkinphone = mysqli_real_escape_string($conn,$_POST["nextofkinphone"]);
        $nextofkinrelation = mysqli_real_escape_string($conn,$_POST["nextofkinrelation"]);
        $nextofkinoccupation = mysqli_real_escape_string($conn,$_POST["nextofkinoccupation"]);
        $nextofkinaddress = mysqli_real_escape_string($conn,$_POST["nextofkinaddress"]);
        $bulkdeposit = (float)mysqli_real_escape_string($conn,$_POST["bulkdeposite"]);
        $monthlydeposit = (float)mysqli_real_escape_string($conn,$_POST["monthlydeposite"]);
        $receiptnumber = mysqli_real_escape_string($conn,$_POST["receiptnumber"]);
        $deposit = "deposit";
        $deposittype = "bulk";
        $initialbalance = 0;
        $balance = 0;
        $bulkbalance = 0;
        $monthlybalance = 0;

        if(emptyField($firstname) || emptyField($lastname) || emptyField($processor) || emptyField($memcode)){
            
            header("location: ../../src/routes.php?pgname=applysavings&error=emptyinput"); 
            exit();
        }

        if(!empty($bulkdeposit)){
            $balance = $balance + $bulkdeposit;
            $bulkbalance = $balance;
        }
        if(!empty($monthlydeposit)){
            $balance = $balance + $monthlydeposit;
            $monthlybalance = $balance + $monthlydeposit;
        }

        $sql = "INSERT INTO `savings`(`first_name`, `last_name`,`other_names`, `mem_code`, 
        `staff_id`, `phone`, `address`, `home_town`, `residential_address`, `marital_status`
        , `date_of_birth`, `place_of_work`, `occupation`, `division`, `number_of_children`,
        `next_of_kin`, `next_of_kin_phone`, `next_of_kin_relation`
        , `next_of_kin_occupation`, `next_of_kin_address`, `balance`, `created_by`) 
        VALUES('$firstname','$lastname', '$othernames','$memcode', '$staffid', 
        '$phonenumber', '$address', '$hometown','$residentialaddress','$maritalstatus',
        '$dateofbirth','$placeofwork','$occupation','$division','$children','$nextofkin',
        '$nextofkinphone','$nextofkinrelation','$nextofkinoccupation','$nextofkinaddress',
        $balance,'$processor')";
            
        if(mysqli_query($conn, $sql)){
            if($balance != 0 && !empty($bulkdeposit)){
                $sql = "INSERT INTO `transactions`(`member_code`, `transaction_type`,
                 `deposit_type`, `amount_transacted`, `amount_in_account`
                , `balance_in_account`, `transacted_by`, `receipt_number`) 
                VALUES('$memcode', '$deposit', 
                '$deposittype', $bulkdeposit ,$initialbalance, $bulkbalance, '$processor','$receiptnumber')";

                $conn->query($sql);
            }
            if($balance != 0 && !empty($monthlydeposit)){
                $deposittype = "monthly";
                $sql = "INSERT INTO `transactions`(`member_code`, `transaction_type`,
                 `deposit_type`, `amount_transacted`, `amount_in_account`
                , `balance_in_account`, `transacted_by`, `receipt_number`) 
                VALUES('$memcode', '$deposit', 
                '$deposittype', $monthlydeposit , $initialbalance, $monthlybalance, '$processor','$receiptnumber')";
            
                $conn->query($sql);
            }
            header("location: ../../src/routes.php?pgname=applysavings&success=success"); 
            exit();
        }else{
            header("location: ../../src/routes.php?pgname=applysavings&error=sqlerror");
            exit();
        }
    }if(isset($_POST['editaccount']) || isset($_POST['partialedit'])){
        include_once("../dbs.inc.php");
        include_once("../functions.inc.php");

        $uid = mysqli_real_escape_string($conn,$_POST["uid"]);
        $processor = mysqli_real_escape_string($conn,$_POST["processor"]);
        $firstname = mysqli_real_escape_string($conn,$_POST["firstname"]);
        $lastname = mysqli_real_escape_string($conn,$_POST["lastname"]);
        $othernames = mysqli_real_escape_string($conn,$_POST["othernames"]);
        $memcode = mysqli_real_escape_string($conn,$_POST["memcode"]);
        $phonenumber = mysqli_real_escape_string($conn,$_POST["phonenumber"]);
        $staffid = mysqli_real_escape_string($conn,$_POST["staffid"]);
        $occupation = mysqli_real_escape_string($conn,$_POST["occupation"]);
        $placeofwork = mysqli_real_escape_string($conn,$_POST["placeofwork"]);
        $division = mysqli_real_escape_string($conn,$_POST["division"]);
        $address = mysqli_real_escape_string($conn,$_POST["address"]);
        $residentialaddress = mysqli_real_escape_string($conn,$_POST["residentialaddress"]);
        $maritalstatus = mysqli_real_escape_string($conn,$_POST["maritalstatus"]);
        $nameofspouse = mysqli_real_escape_string($conn,$_POST["nameofspouse"]);
        $children = mysqli_real_escape_string($conn,$_POST["children"]);
        $hometown = mysqli_real_escape_string($conn,$_POST["hometown"]);
        $dateofbirth = mysqli_real_escape_string($conn,$_POST["dateofbirth"]);
        $nextofkin = mysqli_real_escape_string($conn,$_POST["nextofkin"]);
        $nextofkinphone = mysqli_real_escape_string($conn,$_POST["nextofkinphone"]);
        $nextofkinrelation = mysqli_real_escape_string($conn,$_POST["nextofkinrelation"]);
        $nextofkinoccupation = mysqli_real_escape_string($conn,$_POST["nextofkinoccupation"]);
        $nextofkinaddress = mysqli_real_escape_string($conn,$_POST["nextofkinaddress"]);
        $remarks = mysqli_real_escape_string($conn,$_POST["remarks"]);

        if(emptyField($firstname) || emptyField($lastname) || emptyField($processor) || emptyField($memcode)){
            
            header("location: ../../src/routes.php?pgname=applysavings&error=emptyinput"); 
            exit();
        }

        $sql = "UPDATE `savings` SET `first_name`='{$firstname}', `last_name` = '{$lastname}',
        `other_names` = '{$othernames}',
        `staff_id` = '{$staffid}', `phone` = '{$phonenumber}', `address` = '{$address}',
        `home_town` = '{$hometown}', `residential_address` = '{$residentialaddress}',
        `marital_status` = '{$maritalstatus}', `date_of_birth` = '{$dateofbirth}', 
        `place_of_work` = '{$placeofwork}', `occupation` = '{$occupation}', `division` = '{$division}',
        `number_of_children` = '{$children}',`next_of_kin` = '{$nextofkin}', `next_of_kin_phone` = '{$nextofkinphone}',
        `next_of_kin_relation` = '{$nextofkinrelation}', `next_of_kin_occupation` = '{$nextofkinoccupation}', 
        `next_of_kin_address` = '{$nextofkinaddress}' WHERE  `mem_code` = '{$memcode}'";
            
        if(mysqli_query($conn, $sql)){
            
            $sql = "INSERT INTO `editedaccount`(`member_id`, `remarks`, `edited_by`) 
            VALUES('$memcode', '$remarks', '$processor')";

            $conn->query($sql);
            header("location: ../../src/routes.php?pgname=savingdetails&account_id=".$uid."&success=success"); 
            exit();
        }else{
            header("location: ../../src/routes.php?pgname=editsavingaccount&account_id=".$account['id']."&error=editerror");
            exit();
        }
    }else{
        header("location: ../src/routes.php?pgname=applysavings"); 
        exit();
    }