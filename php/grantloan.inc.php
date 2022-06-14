<?php
    $id = $_POST["id"];
    $user = $_POST["processor"];
    include_once("./dbs.inc.php");
    $status = "pending";
    $granted_status = "granted";
    $date = date('Y-m-d h:i:s');

    $sql = "UPDATE `applicant` SET `loan_status` = '{$status}',`granted_status` = '{$granted_status}', `granted_by` = '{$user}',
    `day_granted` = '{$date}' WHERE `id` = {$id};";
    if(mysqli_query($conn, $sql)){
        echo "success";
    }else{
        echo "failure";
    }