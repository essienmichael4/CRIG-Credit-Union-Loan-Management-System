<?php
    if(isset($_POST["search"])){

        
        include_once("./dbs.inc.php");
        $search = mysqli_real_escape_string($conn,$_POST["inputsearch"]);
        
        // $sql = "SELECT * FROM `applicant` WHERE CONCAT(`first_name`,' ',`last_name`,' ',`other_names`) 
        // LIKE '%". $search ."%' OR `phone_number` LIKE '%". $search ."%'
        // OR `member_code` LIKE '%". $search ."%' OR `staff_id` LIKE '%". $search ."%'
        // ORDER BY `id` DESC;";

        // $result = mysqli_query($conn, $sql);

        // $data = "";
            
        // $rows = "";

        // while($res = mysqli_fetch_assoc($result)){
        //     $status = "";
        //     $pay_date = $res["applicant_first_due_date"];
        //     $pay_due = "";
        //     $applicant_due="";

        //     if($res["loan_status" != "paid"]){
        //         if($res["first_due_date_status"] != "paid"){
        //             if($pay_date == $date){
        //                 $status = "due";
        //                 $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
        //                 $conn->query($duesql);
        //             }else if($pay_date >= $date){
        //                 $status = "overdue";
        //                 $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
        //                 $conn->query($duesql);
        //             }else{
        //                 $status = "pending";
        //                 $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
        //                 $conn->query($duesql);
        //                 $applicant_due = $res["first_due_date"];
        //             }
        //         }else if($res["second_due_date_status"] != "paid"){
        //             $pay_date = $res["second_due_date"];
        //             if($pay_date == $date){
        //                 $status = "due";
        //                 $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
        //                 $conn->query($duesql);
        //             }else if($pay_date >= $date){
        //                 $status = "overdue";
        //                 $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
        //                 $conn->query($duesql);
        //             }else{
        //                 $status = "pending";
        //                 $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
        //                 $conn->query($duesql);
        //                 $applicant_due = $pay_date;
        //             }
        //         }else if($res["third_due_date_status"] != "paid"){
        //             $pay_date = $res["third_due_date"];
        //             if($pay_date == $date){
        //                 $status = "due";
        //                 $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
        //                 $conn->query($duesql);
        //             }else if($pay_date >= $date){
        //                 $status = "overdue";
        //                 $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
        //                 $conn->query($duesql);
        //             }else{
        //                 $status = "pending";
        //                 $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
        //                 $conn->query($duesql);
        //                 $applicant_due = $pay_date;
        //             }
        //         }else if($res["fourth_due_date_status"] != "paid"){
        //             $pay_date = $res["fourth_due_date"];
        //             if($pay_date == $date){
        //                 $status = "due";
        //                 $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
        //                 $conn->query($duesql);
        //             }else if($pay_date >= $date){
        //                 $status = "overdue";
        //                 $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
        //                 $conn->query($duesql);
        //             }else{
        //                 $status = "pending";
        //                 $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
        //                 $conn->query($duesql);
        //                 $applicant_due = $pay_date;
        //             }
        //         }else if($res["fifth_due_date_status"] != "paid"){
        //             $pay_date = $res["fifth_due_date"];
        //             if($pay_date == $date){
        //                 $status = "due";
        //                 $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
        //                 $conn->query($duesql);
        //             }else if($pay_date >= $date){
        //                 $status = "overdue";
        //                 $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
        //                 $conn->query($duesql);
        //             }else{
        //                 $status = "pending";
        //                 $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
        //                 $conn->query($duesql);
        //                 $applicant_due = $pay_date;
        //             }
        //         }else if($res["six_due_date_status"] != "paid"){
        //             $pay_date = $res["sixth_due_date"];
        //             if($pay_date == $date){
        //                 $status = "due";
        //                 $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
        //                 $conn->query($duesql);
        //             }else if($pay_date >= $date){
        //                 $status = "overdue";
        //                 $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
        //                 $conn->query($duesql);
        //             }else{
        //                 $status = "pending";
        //                 $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
        //                 $conn->query($duesql);
        //                 $applicant_due = $pay_date;
        //             }
        //         }
        //     }else{
        //         $status = "paid";
        //     }

        //     $row = "";

        //     if($status == "pending"){
        //         $row = "<td class='tc'><span class='pending'>pending</span></td>";
        //     }else if($status == "due"){
        //         $row = "<td class='tc'><span class='due'>due</span></td>";
        //     }else if($status == "overdue"){
        //         $row = "<td class='tc'><span class='overdue'>overdue</span></td>";
        //     }else if($status == "paid"){
        //         $row = "<td class='tc'><span class='paid'>paid</span></td>";
        //     }

        //     $arrears = (float)$res["loan_to_be_payed"] - (float)$res["loan_arrears"];

        //     $rows .= "<tr>
        //                 <td>{$res['id']}</td>
        //                 <td><a href='?pgname=apply&applicant_id={$res['id']}'>{$res['first_name']} {$res['last_name']} {$res['other_names']}</a></td>
        //                 <td>+233{$res['phone_number']}</td>
        //                 <td>{$res['work_place']}</td>
        //                 <td>{$applicant_due}</td>
        //                 <td>{$res['loan_to_be_payed']}</td>
        //                 <td>{$arrears}</td>
        //                 {$row}
        //         </tr>"; 
        //     }

        //     $data = "<table>
        //         <thead>
        //             <tr>
        //                 <th>Applicant ID</th>
        //                 <th>Applicant Name</th>
        //                 <th>Contact</th>
        //                 <th>Address</th>
        //                 <th>Date</th>
        //                 <th>Amount</th>
        //                 <th>Arrears</th>
        //                 <th class='tc'>Status</th>
        //             </tr>
        //         </thead>
        //         <tbody>"
        //             .$rows.
        //         "</tbody>
        //     </table>";

            header("location: ../src/routes.php?pgname=loans&data={$search}");

    }else{
        header("location: ../src/routes.php?pgname=dashboard");
    }