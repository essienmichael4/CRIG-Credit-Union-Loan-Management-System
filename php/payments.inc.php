<?php
    if(isset($_GET["payment"])){
        $id = $_POST["id"];
        $amount = $_POST["amount"];
    }else{
        header("location: ../src/routes.php?pgname=fddashboard");
    }