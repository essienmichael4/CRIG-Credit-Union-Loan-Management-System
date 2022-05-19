<?php
    session_start();
    include_once("./dbs.inc.php");
    $status = "logged out";
    $sql = "UPDATE `users` SET `status` = '$status' WHERE `id`= {$_SESSION["uid"]}";
    mysqli_query($conn, $sql); 
    
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();
