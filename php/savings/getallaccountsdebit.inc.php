<?php
    include_once("../dbs.inc.php");
    include_once("../functions.inc.php");
    $transactiontype = "debit";
    $date = date('Y'."-01-16");
    $sql = "";
    $firstdate = date('Y-m-d');

    if($firstdate <= date('Y'."-01-15")){
        $seconddate = date('Y'."-01-14");
        $date = date("Y");
        $date = (float)$date - 1;
        $date = date($date."-01-16"); 
        
        $sql = "SELECT * FROM `transactions` WHERE
        `transaction_type` = '$transactiontype'  AND
        `transaction_day` BETWEEN '{$date}' AND '{$seconddate}' ORDER BY `id` DESC;";
    }else{
        $sql = "SELECT * FROM `transactions` WHERE
        `transaction_type` = '$transactiontype' AND
        `transaction_day` >= '{$date}' ORDER BY `id` DESC;";
    }

    $result = mysqli_query($conn, $sql);

    $data = "";
            
    $rows = "";

    while($res = mysqli_fetch_assoc($result)){
        $sql1 = "SELECT * FROM `savings` WHERE `mem_code` = '{$res['member_code']}' OR `staff_id` = '{$res['member_code']}';";
        $result1 = mysqli_query($conn, $sql1);
        $account = mysqli_fetch_assoc($result1);
        $amount_in_account = number_format($res['amount_in_account'],2);
        $amount_transacted = number_format($res['amount_transacted'],2);
        $balance_in_account = number_format($res['balance_in_account'],2);

        $rows .= "<tr>
                    <td>{$res['transaction_day']}</td>
                    <td>{$account['mem_code']}</td>
                    <td>
                        <a href='?pgname=savingdetails&account_id={$account['id']}'>
                        <div class='prof_img des'><img src='../assets/{$account['account_pic']}' alt=''></div> 
                        {$account['first_name']} {$account['last_name']} {$account['other_names']}
                    </a> 
                    </td>
                    <td>{$res['receipt_number']}</td>
                    <td class='tu'>{$res['transaction_type']} </td>
                    <td>{$amount_in_account}</td>
                    <td>{$amount_transacted}</td>
                    <td>{$balance_in_account}</td>
                    <td class='tu des'>{$res['transacted_by']}</td>
                </tr>"; 
    }

    echo $data = "<table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Member ID</th>
                        <th>Account Name</th>
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