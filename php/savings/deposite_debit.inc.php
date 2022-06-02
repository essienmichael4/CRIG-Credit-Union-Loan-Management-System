<?php
    if(isset($_POST["deposite"])){

    }elseif(isset($_POST["debit"])){

    }else{
        header("location: ../src/routes.php?pgname=savings"); 
    }