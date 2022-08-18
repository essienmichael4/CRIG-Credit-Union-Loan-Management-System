<?php
    include_once("../dbs.inc.php");
    include_once("../functions.inc.php");

    $sql = "SELECT * FROM `applicant` ORDER BY `id` DESC;";

    $result = mysqli_query($conn, $sql);

    $accounts= array();

    while($res = mysqli_fetch_assoc($result)){
        $accounts[] = $res;
    }

    echo json_encode($accounts);