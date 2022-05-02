<?php
    include("./dbs.inc.php");
    include("functions.inc.php");
 
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);
    $result;

    if(!empty($username)|| !empty($pwd)){
        loginUser($username, $pwd, $conn);
    }else{
        echo "not working";
    }