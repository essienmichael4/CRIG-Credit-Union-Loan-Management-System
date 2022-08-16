<?php
        include_once("./dbs.inc.php");
        include_once("./functions.inc.php");
        $approval_pending = "pending";
        $approval_approved  = "approved";
        $date = date('Y-m-d');

        $sql = "SELECT * FROM `applicant` WHERE `approval_status` != '{$approval_pending}' 
        AND `loan_status` != 'NULL' ORDER BY `id` DESC;";

        $result = mysqli_query($conn, $sql);

        $data = "";
            
        $rows = "";

        while($res = mysqli_fetch_assoc($result)){
            $status = "";
            $pay_date = $res["applicant_first_due_date"];
            $pay_due = "";
            $applicant_due="";

            if($res["loan_status"] != "paid"){
                if($res["first_due_date_status"] != "paid"){
                    if($pay_date == $date){
                        $status = "due";
                        $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
                        $conn->query($duesql);
                    }else if($date >= $pay_date){
                        $status = "overdue";
                        $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
                        $conn->query($duesql);
                    }else{
                        $status = "pending";
                        $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
                        $conn->query($duesql);
                        $applicant_due = $res["first_due_date"];
                    }
                }else if($res["second_due_date_status"] != "paid"){
                    $pay_date = $res["second_due_date"];
                    if($pay_date == $date){
                        $status = "due";
                        $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
                        $conn->query($duesql);
                    }else if($pay_date <= $date){
                        $status = "overdue";
                        $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
                        $conn->query($duesql);
                    }else{
                        $status = "pending";
                        $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
                        $conn->query($duesql);
                        $applicant_due = $pay_date;
                    }
                }else if($res["third_due_date_status"] != "paid"){
                    $pay_date = $res["third_due_date"];
                    if($pay_date == $date){
                        $status = "due";
                        $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
                        $conn->query($duesql);
                    }else if($pay_date <= $date){
                        $status = "overdue";
                        $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
                        $conn->query($duesql);
                    }else{
                        $status = "pending";
                        $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
                        $conn->query($duesql);
                        $applicant_due = $pay_date;
                    }
                }else if($res["fourth_due_date_status"] != "paid"){
                    $pay_date = $res["fourth_due_date"];
                    if($pay_date == $date){
                        $status = "due";
                        $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
                        $conn->query($duesql);
                    }else if($pay_date <= $date){
                        $status = "overdue";
                        $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
                        $conn->query($duesql);
                    }else{
                        $status = "pending";
                        $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
                        $conn->query($duesql);
                        $applicant_due = $pay_date;
                    }
                }else if($res["fifth_due_date_status"] != "paid"){
                    $pay_date = $res["fifth_due_date"];
                    if($pay_date == $date){
                        $status = "due";
                        $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
                        $conn->query($duesql);
                    }else if($pay_date <= $date){
                        $status = "overdue";
                        $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
                        $conn->query($duesql);
                    }else{
                        $status = "pending";
                        $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
                        $conn->query($duesql);
                        $applicant_due = $pay_date;
                    }
                }else if($res["six_due_date_status"] != "paid"){
                    $pay_date = $res["sixth_due_date"];
                    if($pay_date == $date){
                        $status = "due";
                        $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
                        $conn->query($duesql);
                    }else if($pay_date <= $date){
                        $status = "overdue";
                        $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
                        $conn->query($duesql);
                    }else{
                        $status = "pending";
                        $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
                        $conn->query($duesql);
                        $applicant_due = $pay_date;
                    }
                }
            }else{
                $status = "paid";
            }

            $row = "";

            if($status == "pending"){
                $row = "<td><span class='pending'>pending</span></td>";
            }else if($status == "due"){
                $row = "<td><span class='due'>due</span></td>";
            }else if($status == "overdue"){
                $row = "<td><span class='overdue'>overdue</span></td>";
            }else if($status == "paid"){
                $row = "<td><span class='paid'>paid</span></td>";
            }

            $id = "";

            if($res['member_code'] != ""){
                $id = $res['member_code'];
            }else{
                $id = $res['staff_id'];
            }

            $arrears = (float)$res["loan_to_be_payed"] - (float)$res["loan_paid"];

            $rows .= "<tr>
                        <td>{$id}</td>
                        <td><a href='?pgname=loandetails&applicant_id={$res['id']}'>{$res['applicant_name']}</a></td>
                        <td>{$res['phone_number']}</td>
                        <td>{$res['work_place']}</td>
                        <td>{$applicant_due}</td>
                        <td>{$res['loan_to_be_payed']}</td>
                        <td>{$arrears}</td>
                        <td>{$res['member_status']}</td>
                        {$row}
                    </tr>"; 
            }

            echo $data = "
                
                    $rows
                ";