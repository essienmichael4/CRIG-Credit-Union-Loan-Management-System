<?php
    if(isset($_POST['createaccount'])){
        include_once("../dbs.inc.php");

        $processor = mysqli_real_escape_string($conn,$_POST["processor"]);
        $firstname = mysqli_real_escape_string($conn,$_POST["firstname"]);
        $lastname = mysqli_real_escape_string($conn,$_POST["lastname"]);
        $othernames = mysqli_real_escape_string($conn,$_POST["othernames"]);
        $memcode = mysqli_real_escape_string($conn,$_POST["membercode"]);
        $phonenumber = mysqli_real_escape_string($conn,$_POST["phone_number"]);
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
        $initialsavings = mysqli_real_escape_string($conn,$_POST["initialsavings"]);

        if(emptyField($firstname) || emptyField($lastname) || emptyField($othernames) ||
            emptyField($email) || emptyField($staffid) || emptyField($phonenumber)
            || emptyField($nextofkin) || emptyField($nextofkinphone) || emptyField($memcode)||
            emptyField($address) || emptyField($residentialaddress) || emptyField($maritalstatus)||
            emptyField($dateofbirth) || emptyField($nextofkinaddress) || emptyField($hometown)||
            emptyField($nextofkinrelation) || emptyField($nextofkinoccupation) ||
            emptyField($occupation) || emptyField($placeofwork) || emptyField($division)){
            
            header("location: ../../src/routes.php?pgname=applysavings&error=emptyinput"); 

        }else{
            $sql = "INSERT INTO `users`(`first_name`, `last_name`,`other_names`, `mem_code`, 
            `staff_id`, `phone`, `address`, `hometown`, `residential_address`, `marital_status`
            , `date_of_birth`, `place_of_work`, `occupation`, `division`, `no_of_children`,
            `next_of_kin`, `next_of_kin_phone`, `next_of_kin_relation`
            , `next_of_kin_occupation`, `next_of_kin_address`, `balance`, `created_by`) 
            VALUES('$firstname','$lastname', '$othernames','$memcode', '$staffid', 
            '$phonenumber', '$address', '$hometown','$residentialaddress','$maritalstatus',
            '$dateofbirth','$placeofwork','$occupation','$division','$children','$nextofkin',
            '$nextofkinphone','$nextofkinrelation','$nextofkinoccupation','$nextofkinaddress',
            $balance,'$processor',)";
                
            if(mysqli_query($conn, $sql)){
                header("location: ../src/routes.php?pgname=users"); 
            }else{
                header("location: ../src/routes.php?pgname=users&error=sqlerror"); 
            }
        }
    }