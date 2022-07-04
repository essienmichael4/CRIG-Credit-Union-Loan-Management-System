<?php
    $id = $_POST["id"];
    $user = $_POST["user"];
    include_once("../dbs.inc.php");
    $status = "disabled";
    $date = date('Y-m-d h:i:s');

    $sql = "UPDATE `savings` SET `account_status` = '{$status}' WHERE `id` = {$id};";
    if(mysqli_query($conn, $sql)){
        echo "success";
    }else{
        echo "failure";
    }

    // , `disabled_by` = '{$user}',
    // `day_disabled` = '{$date}'