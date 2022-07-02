<?php
    include_once("../dbs.inc.php");
    include_once("../functions.inc.php");
    $memcode = mysqli_real_escape_string($conn,$_POST["memcode"]);
    $transactiontype = "debit";

    $sql = "SELECT * FROM `transactions` WHERE `member_code` = '{$memcode}' AND 
    `transaction_type` = '$transactiontype' ORDER BY `id` DESC;";

    $result = mysqli_query($conn, $sql);

    $data = "";
            
    $rows = "";

    while($res = mysqli_fetch_assoc($result)){
        $rows .= "<tr>
                    <td>{$res['transaction_day']}</td>
                    <td class='tu'>{$res['transaction_type']} </td>
                    <td>{$res['amount_in_account']}</td>
                    <td>{$res['amount_transacted']}</td>
                    <td>{$res['balance_in_account']}</td>
                    <td class='tu'>{$res['transacted_by']}</td>
                </tr>"; 
    }

    echo $data = "<table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Transaction Type</th>
                        <th>Previous Balance GH¢</th>
                        <th>Debit GH¢</th>
                        <th>Balance GH¢</th>
                        <th>Teller</th>
                    </tr>
                </thead>
                <tbody>"
                    .$rows.
                "</tbody>
            </table>";