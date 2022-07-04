<?php
    if(isset($_POST["addexpense"])){
        include_once("../dbs.inc.php");
        include_once("../functions.inc.php");

        $uid = mysqli_real_escape_string($conn,$_POST["processor"]);
        $items = mysqli_real_escape_string($conn,$_POST["items"]);
        $price = mysqli_real_escape_string($conn,$_POST["price"]);
        $purpose = mysqli_real_escape_string($conn,$_POST["purpose"]);
        $dayadded = mysqli_real_escape_string($conn,$_POST["dayadded"]);

        if(emptyField($uid) || emptyField($items) || emptyField($price) || emptyField($dayadded)){
            header("location: ../../src/routes.php?pgname=expenses&error=emptyinput"); 
            exit();
        }

        if(!(float)$price){
            header("location: ../../src/routes.php?pgname=expenses&error=inputamounterror"); 
            exit();
        }

        $itemprice = (float)$price;

        $sql = "INSERT INTO `expenses`(`item_name`, `item_price`, `purpose`,
            `day_added`, `added_by`) 
        VALUES('$items', '$itemprice','$purpose', '$dayadded', '$uid')";

        if(mysqli_query($conn, $sql)){
            header("location: ../../src/routes.php?pgname=expenses&success=success"); 
        }else{
            header("location: ../../src/routes.php?pgname=expenses&error=sqlerror"); 
        }
    }else{
        header("location: ../src/routes.php?pgname=expenses"); 
        exit();
    }