<?php
    if(isset($_POST["search"])){

        
        include_once("./dbs.inc.php");
        $search = mysqli_real_escape_string($conn,$_POST["inputsearch"]);
        
        header("location: ../src/routes.php?pgname=loans&data={$search}");

    }else{
        header("location: ../src/routes.php?pgname=dashboard");
    }