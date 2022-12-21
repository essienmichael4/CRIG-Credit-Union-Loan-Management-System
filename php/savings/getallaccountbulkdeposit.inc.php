<?php
    include_once("../dbs.inc.php");
    include_once("../functions.inc.php");
    $memcode = mysqli_real_escape_string($conn,$_POST["memcode"]);
    $transactiontype = "deposit";
    $deposittype = "bulk";
    $date = date('Y'."-01-16");
    $firstdate = date('Y-m-d');
    $sql = "";

    if($firstdate <= date('Y'."-01-15")){
        $seconddate = date('Y'."-01-14");
        $date = date("Y");
        $date = (float)$date - 1;
        $date = date($date."-01-16"); 

        $sql = "SELECT * FROM `transactions` WHERE `member_code` = '{$memcode}' OR `staff_id` = '{$memcode}' AND 
        `transaction_type` = '$transactiontype' AND `deposit_type` = '$deposittype' AND
        `transaction_day` BETWEEN '{$date}' AND '{$seconddate}' ORDER BY `id` DESC;";
    }else{
        $sql = "SELECT * FROM `transactions` WHERE `member_code` = '{$memcode}' OR `staff_id` = '{$memcode}' AND 
        `transaction_type` = '$transactiontype' AND `deposit_type` = '$deposittype' AND
        `transaction_day` >= '{$date}' ORDER BY `id` DESC;";
    }


    $result = mysqli_query($conn, $sql);

    $data = "";
            
    $rows = "";

    while($res = mysqli_fetch_assoc($result)){
        $rows .= "<tr>
                    <td>{$res['transaction_day']}</td>
                    <td>{$res['transaction_type']} </td>
                    <td>{$res['amount_in_account']}</td>
                    <td>{$res['amount_transacted']}</td>
                    <td>{$res['balance_in_account']}</td>
                    <td class='des'>{$res['transacted_by']}</td>
                </tr>"; 
    }

    echo $data = "<table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Transaction Type</th>
                        <th>Previous Balance GH¢</th>
                        <th>Deposit/Debit GH¢</th>
                        <th>Balance GH¢</th>
                        <th class='des'>Teller</th>
                    </tr>
                </thead>
                <tbody>"
                    .$rows.
                "</tbody>
            </table>";