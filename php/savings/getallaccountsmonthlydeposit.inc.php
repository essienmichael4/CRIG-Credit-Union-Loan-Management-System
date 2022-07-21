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
        $sql = "SELECT * FROM `savings` WHERE `mem_code` = '{$res['member_code']}' OR `staff_id` = '{$res['member_code']}';";
        $result = mysqli_query($conn, $sql);
        $account = mysqli_fetch_assoc($result);
        $amount_in_account = number_format($res['amount_in_account'],2);
        $amount_transacted = number_format($res['amount_transacted'],2);
        $balance_in_account = number_format($res['balance_in_account'],2);

        $rows .= "<tr>
                    <td>{$res['transaction_day']}</td>
                    <td>{$res['member_code']}</td>
                    <td>{$res['mem_code']}</td>
                    <td>
                        <a href='?pgname=savingdetails&account_id={$res['id']}'>
                        <div class='prof_img'><img src='../assets/{$res['account_pic']}' alt=''></div> 
                        {$res['first_name']} {$res['last_name']} {$res['other_names']}
                    </a> 
                    </td>
                    <td class='tu'>{$res['transaction_type']} </td>
                    <td>{$amount_in_account}</td>
                    <td>{$amount_transacted}</td>
                    <td>{$balance_in_account}</td>
                    <td class='tu'>{$res['transacted_by']}</td>
                </tr>"; 
    }

    echo $data = "<table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Member ID</th>
                        <th>Account Name</th>
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