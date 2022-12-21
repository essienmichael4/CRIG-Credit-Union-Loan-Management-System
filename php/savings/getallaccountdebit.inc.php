<?php
    include_once("../dbs.inc.php");
    include_once("../functions.inc.php");
    $memcode = mysqli_real_escape_string($conn,$_POST["memcode"]);
    $transactiontype = "debit";
    $firstdate = date('Y-m-d');
    $date = date('Y'."-01-16");
    $sql = "";

    if($firstdate <= date('Y'."-01-15")){
        $seconddate = date('Y'."-01-14");
        $date = date("Y");
        $date = (float)$date - 1;
        $date = date($date."-01-16"); 

        $sql = "SELECT * FROM `transactions` WHERE `member_code` = '{$memcode}' AND 
        `transaction_type` = '$transactiontype' AND
        `transaction_day` BETWEEN '{$date}' AND '{$seconddate}' ORDER BY `id` DESC;";
    }else{

        $sql = "SELECT * FROM `transactions` WHERE `member_code` = '{$memcode}' AND 
        `transaction_type` = '$transactiontype' AND
        `transaction_day` >= '{$date}' ORDER BY `id` DESC;";
    }


    $result = mysqli_query($conn, $sql);

    $data = "";
            
    $rows = "";

    while($res = mysqli_fetch_assoc($result)){
        $rows .= "<tr>
                    <td>{$res['transaction_day']}</td>
                    <td>{$res['receipt_number']}</td>
                    <td class='tu'>{$res['transaction_type']} </td>
                    <td>{$res['amount_in_account']}</td>
                    <td>{$res['amount_transacted']}</td>
                    <td>{$res['balance_in_account']}</td>
                    <td class='tu des'>{$res['transacted_by']}</td>
                </tr>"; 
    }

    echo $data = "<table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Cheque</th>
                        <th>Transaction Type</th>
                        <th>Previous Balance GH¢</th>
                        <th>Debit GH¢</th>
                        <th>Balance GH¢</th>
                        <th class='des'>Teller</th>
                    </tr>
                </thead>
                <tbody>"
                    .$rows.
                "</tbody>
            </table>";