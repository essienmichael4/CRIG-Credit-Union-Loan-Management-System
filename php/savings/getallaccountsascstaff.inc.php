<?php
    include_once("../dbs.inc.php");
    include_once("../functions.inc.php");
    $status = "disabled";

    $sql = "SELECT * FROM `savings` WHERE `account_status` != '{$status}' ORDER BY `staff_id` ASC";
    $result = mysqli_query($conn, $sql);

    $data = "";
            
    $rows = "";

    while($res = mysqli_fetch_assoc($result)){
        $balance = number_format($res['balance'],2);
        $rows .= "<tr>
                    <td>{$res['mem_code']}</td>
                    <td>
                        <a href='?pgname=savingdetails&account_id={$res['id']}'>
                        <div class='prof_img'><img src='../assets/{$res['account_pic']}' alt=''></div> 
                        {$res['first_name']} {$res['last_name']} {$res['other_names']}
                    </a> 
                    </td>
                    <td>{$res['staff_id']}</td>
                    <td>{$res['phone']}</td>
                    <td>{$balance}</td>
                    <td class='des'><button onclick='disablemember({$res['id']})'>{$res['account_status']}</button></td>
                </tr>"; 
    }

    echo $data = "<table>
                <thead>
                    <tr>
                        <th class='orderbyid orderby asc' onclick='idsort()'>Member ID &#9674;</th>
                        <th class='orderbyname orderby asc' onclick='namesort()'>Member Name</th>
                        <th class='orderbystaff orderby dsc' onclick='staffsort()'>Staff ID</th>
                        <th>Contact</th>
                        <th class='orderbybalance orderby asc' onclick='balancesort()'>Balance GH¢</th>
                        <th class='des'>Account Status</th>
                    </tr>
                </thead>
                <tbody class='accounttable'>"
                    .$rows.
                "</tbody>
            </table>";