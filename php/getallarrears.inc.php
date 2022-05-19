<?php

    include_once("./dbs.inc.php");

    $sql = "SELECT SUM(`loan_arrears`) as arrears FROM `applicant`;";

    $result = $conn->query($sql);

    $row = mysqli_fetch_assoc($result);

    $arrears=number_format($row['arrears'],2);
    echo "Gh¢ {$arrears}";