<?php
    include("../dbs.inc.php");
    include("../functions.inc.php");

    $firstdate = date('Y-m-d');
    $date = date('Y'."-01-16");
    $sql = "";

    if($firstdate <= date('Y'."-01-15")){
        $seconddate = date('Y'."-01-14");
        $date = date("Y");
        $date = (float)$date - 1;
        $date = date($date."-01-16");

        $sql = "SELECT DISTINCT member_code FROM `transactions` WHERE
        `transaction_day` BETWEEN '{$date}' AND '{$seconddate}' ORDER BY `id` DESC;";
    
    }else{
        $sql = "SELECT DISTINCT member_code FROM `transactions` WHERE
        `transaction_day` >= '{$date}' ORDER BY `id` DESC;";
    }

    $result = mysqli_query($conn, $sql);

    $data = "";
            
    $rows = "";

    while($res = mysqli_fetch_assoc($result)){
        $sql2 = "";
        $sql3 = "";
        if($firstdate <= date('Y'."-01-15")){
            $seconddate = date('Y'."-01-14");
            $date = date("Y");
            $date = (float)$date - 1;
            $date = date($date."-01-16");

            $sql2 = "SELECT SUM(amount_transacted) FROM `transactions` WHERE `member_code` = '{$res['member_code']}' AND
            `transaction_type`='deposit' AND `transaction_day` BETWEEN '{$date}' AND '{$seconddate}' ;";
            $sql3 = "SELECT SUM(amount_transacted) FROM `transactions` WHERE `member_code` = '{$res['member_code']}' AND
            `transaction_type`='debit' AND `transaction_day` BETWEEN '{$date}' AND '{$seconddate}' ;";
        }else{
            $sql2 = "SELECT SUM(amount_transacted) as dep FROM `transactions` WHERE`member_code` = '{$res['member_code']}' AND
            `transaction_type`='deposit' AND `transaction_day` >= '{$date}';";
            $sql3 = "SELECT SUM(amount_transacted) as deb FROM `transactions` WHERE`member_code` = '{$res['member_code']}' AND
            `transaction_type`='debit' AND `transaction_day` >= '{$date}';";
        }

        $result1 = mysqli_query($conn, $sql2);
        $result2 = mysqli_query($conn, $sql3);

        $allDeposit = mysqli_fetch_assoc($result1);
        $allDebit = mysqli_fetch_assoc($result2);

        
        $sql1 = "SELECT * FROM `savings` WHERE `mem_code` = '{$res['member_code']}' OR `staff_id` = '{$res['member_code']}' LIMIT 1;";
        $result1 = mysqli_query($conn, $sql1);
        $account = mysqli_fetch_assoc($result1);
        $deposit = number_format($allDeposit['dep'],2);
        $debit = number_format($allDebit['deb'],2);
        $balance_in_account = number_format($account['balance'],2);
        // $transaction_type = $res['transaction_type'];

        // if($transaction_type == "deposit"){
            $rows .= "<tr>
                    <td>{$account['mem_code']}</td>
                    <td>
                        <a href='?pgname=savingdetails&account_id={$account['id']}' >
                        <div class='prof_img des'><img src='../assets/{$account['account_pic']}' alt=''></div> 
                        {$account['first_name']} {$account['last_name']} {$account['other_names']}
                    </a> 
                    </td>
                    <td>{$deposit}</td>
                    <td>{$debit}</td>
                    <td>{$balance_in_account}</td>
                </tr>"; 
        // }
        // else{
        //     $rows .= "<tr>
                    
        //             <td>{$res['transaction_day']}</td>
        //             <td>{$account['mem_code']}</td>
        //             <td>
        //                 <a href='?pgname=savingdetails&account_id={$account['id']}'>
        //                 <div class='prof_img des'><img src='../assets/{$account['account_pic']}' alt=''></div> 
        //                 {$account['first_name']} {$account['last_name']} {$account['other_names']}
        //             </a> 
        //             </td>
        //             <td>{$res['receipt_number']}</td>
        //             <td class='tu'>{$res['transaction_type']} </td>
        //             <td>{$amount_in_account}</td>
        //             <td>{$amount_transacted}</td>
        //             <td>{$balance_in_account}</td>
        //             <td class='tu des'>{$res['transacted_by']}</td>
        //         </tr>"; 
        // } 
    }

    echo $data = "<table>
                <thead>
                    <tr>
                        <th>Member ID</th>
                        <th>Account Name</th>
                        <th>Deposit GH¢</th>
                        <th>Debit GH¢</th>
                        <th>Balance GH¢</th>
                    </tr>
                </thead>
                <tbody>"
                    .$rows.
                "</tbody>
            </table>";