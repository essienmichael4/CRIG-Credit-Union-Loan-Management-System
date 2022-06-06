<?php
    include_once("./dbs.inc.php");
    include_once("./functions.inc.php");
    // $memcode = mysqli_real_escape_string($conn,$_POST["memcode"]);
    $deposittype=  "monthly";

    $sql = "SELECT * FROM `transactions` WHERE `transaction_type` = '{$transactiontype}'
    AND `deposite_type` = '{$deposittype}' ORDER BY `id` DESC;";
    
    $result = mysqli_query($conn, $sql);

    $data = "";
            
    $rows = "";

    while($res = mysqli_fetch_assoc($result)){
        $balance = number_format($res['balance'],2);
        $row .= "<tr>
                    <td>{$res['mem_code']}</td>
                    <td><a href='?pgname=savingdetails&account_id={$res['id']}'>{$res['first_name']} {$res['last_name']} {$res['other_names']}</a> </td>
                    <td>{$res['staff_id']}</td>
                    <td>{$res['phone_number']}</td>
                    <td>GH¢ {$balance}</td>
                    <td>{$res['account_status']}</td>
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
                        <th>Account Status</th>
                    </tr>
                </thead>
                <tbody>"
                    .$rows.
                "</tbody>
            </table>";