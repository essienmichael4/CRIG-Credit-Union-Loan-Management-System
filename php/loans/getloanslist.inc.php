<?php
    include_once("../dbs.inc.php");
    include_once("../functions.inc.php");
    // $status = "disabled";

    $sql = "SELECT * FROM `applicant`;";

    $result = mysqli_query($conn, $sql);

    $accounts= array();

    while($res = mysqli_fetch_assoc($result)){
        $accounts[] = $res;
    }

    echo json_encode($accounts);