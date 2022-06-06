<?php
    include_once("../dbs.inc.php");
    include_once("../functions.inc.php");

    $sql = "SELECT * FROM `transactions` ORDER BY `id` DESC;";
    $result = mysqli_query($conn, $sql);

    $data = "";
    $rows = "";

    $sql = "SELECT * FROM `savings` ORDER BY `id` DESC;";

    while($res = mysqli_fetch_assoc($result)){
        $amount_in_account = number_format($res['amount_in_account'],2);
        $amount_transacted = number_format($res['amount_transacted'],2);
        $balance_in_account = number_format($res['balance_in_account'],2);
        
        $rows .= "<tr>
                    <td>{$res['transaction_day']}</td>
                    <td>{$res['transaction_type']} </td>
                    <td>{$amount_in_account}</td>
                    <td>{$amount_transacted}</td>
                    <td>{$balance_in_account}</td>
                    <td>{$res['transacted_by']}</td>
                </tr>"; 
    }

    echo $data = "<table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Transaction Type</th>
                        <th>Previous Balance GH¢</th>
                        <th>Deposite/Debit GH¢</th>
                        <th>Balance GH¢</th>
                        <th>Teller</th>
                    </tr>
                </thead>
                <tbody>"
                    .$rows.
                "</tbody>
            </table>";