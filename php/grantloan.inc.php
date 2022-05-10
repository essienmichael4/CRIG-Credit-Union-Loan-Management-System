<?php
    $id = $_POST["oid"];
    $user = $_POST["user"];
    include_once("./dbs.inc.php");
    $status = "granted";
    $date = date('Y-m-d h:i:s');

    $sql = "UPDATE `applicant` SET `loan_status` = {$status}, `granted_by` = {$user},
    `day_granted` = {$date} WHERE `id` = '{$id}'";
    if(mysqli_query($conn, $sql)){
        echo "done";
    }