<?php
    include_once("../dbs.inc.php");
    include_once("../functions.inc.php");
    // $memcode = mysqli_real_escape_string($conn,$_POST["memcode"]);
    $transactiontype = "deposit";
    $deposittype = "monthly";

    $sql = "SELECT * FROM `transactions` WHERE
    `transaction_type` = '$transactiontype' AND `deposit_type` = '$deposittype' ORDER BY `id` DESC;";

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