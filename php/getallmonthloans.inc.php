<?php
        include_once("./dbs.inc.php");
        include_once("./functions.inc.php");
        $sentstatus = $_POST["loanrequest"];
        $startday = $_POST["startmonth"];
        $endday = $_POST["endmonth"];
        $approval_pending = "pending";
        $approval_approved  = "approved";
        $date = date('Y-m-d');
        $sql = "";

        if($sentstatus == "all"){
            $sql = "SELECT * FROM `applicant` WHERE `approval_status` != '{$approval_pending}' 
            AND `loan_status` != 'NULL' AND `apply_date` BETWEEN '{$startday}' AND
            '{$endday}' ORDER BY `id` DESC;";
        }else{
            $sql = "SELECT * FROM `applicant` WHERE `approval_status` != '{$approval_pending}' 
            AND `loan_status` != '{$sentstatus}' AND `apply_date` BETWEEN '{$startday}' AND
            '{$endday}' ORDER BY `id` DESC;";
        }

        $result = mysqli_query($conn, $sql);

        $data = "";
            
        $rows = "";

        while($res = mysqli_fetch_assoc($result)){
            $status = "";
            $pay_date = $res["applicant_first_due_date"];
            $pay_due = "";
            $applicant_due="";

            
            if($res["first_due_date_status"] != "paid"){
                $applicant_due = $res["first_due_date"];
            }else if($res["second_due_date_status"] != "paid"){
                $pay_date = $res["second_due_date"];
                
                $applicant_due = $pay_date;
            }else if($res["third_due_date_status"] != "paid"){
                $pay_date = $res["third_due_date"];
                $applicant_due = $pay_date;
                
            }else if($res["fourth_due_date_status"] != "paid"){
                $pay_date = $res["fourth_due_date"];
                $applicant_due = $pay_date;
                
            }else if($res["fifth_due_date_status"] != "paid"){
                $pay_date = $res["fifth_due_date"];
                $applicant_due = $pay_date;
            }else if($res["six_due_date_status"] != "paid"){
                $pay_date = $res["sixth_due_date"];
                $applicant_due = $pay_date;
            }
            
            $row = "";

            if($res["loan_status"] == "pending"){
                $row = "<td class='tc'><span class='pending'>pending</span></td>";
            }else if($res["loan_status"]  == "due"){
                $row = "<td class='tc'><span class='due'>due</span></td>";
            }else if($res["loan_status"]  == "overdue"){
                $row = "<td class='tc'><span class='overdue'>overdue</span></td>";
            }else if($res["loan_status"]  == "paid"){
                $row = "<td class='tc'><span class='paid'>paid</span></td>";
            }

            $arrears = (float)$res["loan_to_be_payed"] - (float)$res["loan_arrears"];

            $rows .= "<tr>
                        <td>{$res['id']}</td>
                        <td><a href='?pgname=apply&applicant_id={$res['id']}'>{$res['first_name']} {$res['last_name']} {$res['other_names']}</a></td>
                        <td>+233{$res['phone_number']}</td>
                        <td>{$res['work_place']}</td>
                        <td>{$applicant_due}</td>
                        <td>{$res['loan_to_be_payed']}</td>
                        <td>{$arrears}</td>
                        {$row}
                </tr>"; 
            }

            echo $data = "<table>
                <thead>
                    <tr>
                        <th>Applicant ID</th>
                        <th>Applicant Name</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Arrears</th>
                        <th class='tc'>Status</th>
                    </tr>
                </thead>
                <tbody>"
                    .$rows.
                "</tbody>
            </table>";