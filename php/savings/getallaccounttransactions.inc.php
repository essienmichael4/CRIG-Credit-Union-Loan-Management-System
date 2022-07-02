<?php
    include_once("../dbs.inc.php");
    include_once("../functions.inc.php");

    $memcode = mysqli_real_escape_string($conn,$_POST["memcode"]);

    $sql = "SELECT * FROM `transactions` WHERE `member_code` = '{$memcode}' ORDER BY `id` DESC;";
    $result = mysqli_query($conn, $sql);

    $data = "";
    $rows = "";

    $sql = "SELECT * FROM `savings` ORDER BY `id` DESC;";

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
                        <th>Previous Balance GH¢</th>
                        <th>Deposit/Debit GH¢</th>
                        <th>Balance GH¢</th>
                        <th>Teller</th>
                    </tr>
                </thead>
                <tbody>"
                    .$rows.
                "</tbody>
            </table>";