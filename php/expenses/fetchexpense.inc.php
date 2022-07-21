<?php
    include_once("../dbs.inc.php");
    include_once("../functions.inc.php");

    $sql = "SELECT * FROM `expenses`;";

    $result = mysqli_query($conn, $sql);

    $expenses= array();

    while($res = mysqli_fetch_assoc($result)){
        $expenses[] = $res;
    }

    echo json_encode($expenses);