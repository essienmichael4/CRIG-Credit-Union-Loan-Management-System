<?php
    include_once("../dbs.inc.php");
    include_once("../functions.inc.php");
    $memcode = mysqli_real_escape_string($conn,$_POST["memcode"]);
    $transactiontype = "deposit";
    $date = date('Y'."-01-16");
    $firstdate = date('Y-m-d');
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
        $amount_in_account = number_format($res['amount_in_account'],2);
        $amount_transacted = number_format($res['amount_transacted'],2);
        $balance_in_account = number_format($res['balance_in_account'],2);
        $transaction_type = $res['transaction_type'];

        if($transaction_type == "deposit"){
            $rows .= "<tr>
                    <td>{$res['transaction_day']}</td>
                    <td>{$res['receipt_number']}</td>
                    <td class='tu'>{$res['transaction_type']} / {$res['deposit_type']}</td>
                    <td>{$res['description']}</td>
                    <td>{$amount_in_account}</td>
                    <td>{$amount_transacted}</td>
                    <td>{$balance_in_account}</td>
                    <td class='tu'>{$res['transacted_by']}</td>
                </tr>"; 
        }else{
            $rows .= "<tr>
                    <td>{$res['transaction_day']}</td>
                    <td>{$res['receipt_number']}</td>
                    <td class='tu'>{$res['transaction_type']} </td>
                    <td>{$res['description']}</td>
                    <td>{$amount_in_account}</td>
                    <td>{$amount_transacted}</td>
                    <td>{$balance_in_account}</td>
                    <td class='tu'>{$res['transacted_by']}</td>
                </tr>"; 
        }

        
    }

    echo $data = "<table>
                <thead>
                    <tr>
                    <th>Date</th>
                    <th>Receipt</th>
                    <th>Transaction Type</th>
                    <th>Description</th>
                        <th>Previous Balance GH¢</th>
                        <th>Deposit GH¢</th>
                        <th>Balance GH¢</th>
                        <th>Teller</th>
                    </tr>
                </thead>
                <tbody>"
                    .$rows.
                "</tbody>
            </table>";