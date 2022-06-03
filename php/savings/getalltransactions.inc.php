<?php
    include_once("./dbs.inc.php");
    include_once("./functions.inc.php");

    $sql = "SELECT * FROM `transactions` ORDER BY `id` DESC;";

    $result = mysqli_query($conn, $sql);

    $data = "";
            
    $rows = "";

    while($res = mysqli_fetch_assoc($result)){
        $row .= "<tr>
                    <td>{$res['mem_code']}</td>
                    <td><a href='?pgname=savingdetails&account_id={$res['id']}'>{$res['first_name']} {$res['last_name']} {$res['other_names']}</a> </td>
                    <td>{$res['staff_id']}</td>
                    <td>{$res['phone_number']}</td>
                    <td>GH¢ {$res['balance']}</td>
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