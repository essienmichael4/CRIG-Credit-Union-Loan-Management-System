<?php
    include_once("../dbs.inc.php");
    include_once("../functions.inc.php");
    $date = date('Y'."-01-16 00:00:00");

    $sql = "SELECT * FROM `applicant` WHERE `apply_date` >= '{$date}' ORDER BY `id` DESC;";

    $result = mysqli_query($conn, $sql);

    $accounts= array();

    while($res = mysqli_fetch_assoc($result)){
        $accounts[] = $res;
    }

    echo json_encode($accounts);