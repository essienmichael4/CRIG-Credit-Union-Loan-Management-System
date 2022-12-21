<?php
    include_once("./dbs.inc.php");
    include_once("./functions.inc.php");
    $deposittype=  "monthly";
    $firstdate = date('Y-m-d');
    $date = date('Y'."-01-16");
    $sql = "";

    if($firstdate <= date('Y'."-01-15")){
        $seconddate = date('Y'."-01-14");
        $date = date("Y");
        $date = (float)$date - 1;
        $date = date($date."-01-16");

        $sql = "SELECT * FROM `transactions` WHERE `transaction_type` = '{$transactiontype}'
        AND `deposite_type` = '{$deposittype}' AND
        `transaction_day` BETWEEN '{$date}' AND '{$seconddate}' ORDER BY `id` DESC;";
    }else{
        $sql = "SELECT * FROM `transactions` WHERE `transaction_type` = '{$transactiontype}'
        AND `deposite_type` = '{$deposittype}' AND
        `transaction_day` >= '{$date}' ORDER BY `id` DESC;";
    }
    
    $result = mysqli_query($conn, $sql);

    $data = "";
            
    $rows = "";

    while($res = mysqli_fetch_assoc($result)){
        $balance = number_format($res['balance'],2);
        $row .= "<tr>
                    <td>{$res['mem_code']}</td>
                    <td>{$res['mem_code']}</td>
                    <td>
                        <a href='?pgname=savingdetails&account_id={$res['id']}'>
                        <div class='prof_img'><img src='../assets/{$res['account_pic']}' alt=''></div> 
                        {$res['first_name']} {$res['last_name']} {$res['other_names']}
                    </a> 
                    </td>
                    <td>{$res['staff_id']}</td>
                    <td>{$res['phone_number']}</td>
                    <td>GH¢ {$balance}</td>
                    <td class='des'>{$res['account_status']}</td>
                </tr>"; 
    }

    echo $data = "<table>
                <thead>
                    <tr>
                        <th>Member ID</th>
                        <th>Member Name</th>
                        <th>Staff ID</th>
                        <th>Contact</th>
                        <th>Balance</th>
                        <th class='des'>Account Status</th>
                    </tr>
                </thead>
                <tbody>"
                    .$rows.
                "</tbody>
            </table>";