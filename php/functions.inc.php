<?php

    function emptyField($data){
        $result = true;
        if(empty($data)){
            return $result = true;
        } else{
            return $result = false;
        }
    }

    function invalidUsername($username){
        $result = true;
        if(!preg_match('/^[a-zA-Z0-9]*$/', $username )){
            return $result = true;
        } else{
            return $result = false;
        }
    }

    //Check for invalid email
    function invalidEmail($email){
        $result = true;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return $result = true;
        } else{
            return $result = false;
        }
    }

    //Password Check
    function invalidPassword($pwd, $pwdCheck){
        $result=true;
        if($pwd !== $pwdCheck){
            return $result = true;
        } else{
            return $result = false;
        }
    }

    function loginUser($username, $password, $conn){

        $sql = "SELECT * FROM `users` WHERE username = '$username' or email = '$username' or staff_id = '$username'; ";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);

            $pwdVerify = password_verify($password, $row['password']);

            if($password == $row['password'] || $pwdVerify == true){
                session_start();
                $status = "logged in";
                $_SESSION["username"] = $row['username'];
                $_SESSION["firstname"] = $row['first_name'];
                $_SESSION["lastname"] = $row['last_name'];
                $_SESSION["othername"] = $row['other_names'];
                $_SESSION["worker_id"] = $row['staff_id'];
                $_SESSION["email"] = $row['email'];
                $_SESSION["role"] = $row['role'];
                $_SESSION["uid"] = $row['id'];

                $sql = "UPDATE `users` SET `status` = '$status' WHERE `id`= {$row['id']}";
                mysqli_query($conn, $sql); 

                header("location: ../src/routes.php?pgname=dashboard");
            }else{
                header("location: ../index.php?error=wrongpwd&user=".$username);
            }
        }else{
            header("location: ../index.php?error=userNotExist");
        }
    }

    function show($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    function getallloans(){
        include_once("./dbs.inc.php");
        $approval_pending = "pending";
        $date = date('Y-m-d');

        $sql = "SELECT * FROM `applicant` WHERE `approval_status` != '{$approval_pending}' 
        AND `loan_status` != 'NULL' ORDER BY `id` DESC;";

        $result = mysqli_query($conn, $sql);

        $tabledata = "";
            
        $rows = "";

        while($res = mysqli_fetch_assoc($result)){
            $status = "";
            $pay_date = $res["applicant_first_due_date"];
            $pay_due = "";
            $applicant_due="";

            if($res["loan_status" != "paid"]){
                if($res["first_due_date_status"] != "paid"){
                    if($pay_date == $date){
                        $status = "due";
                        $duesql = "UPDATE `applicant` SET `loan_status` = '{$status}' WHERE `id` = {$res["id"]};";
                        $conn->query($duesql);
                    }else if($pay_date >= $date){
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
                    }else if($pay_date >= $date){
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
                    }else if($pay_date >= $date){
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
                    }else if($pay_date >= $date){
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
                    }else if($pay_date >= $date){
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
                    }else if($pay_date >= $date){
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
                $row = "<td class='tc'><span class='pending'>pending</span></td>";
            }else if($status == "due"){
                $row = "<td class='tc'><span class='due'>due</span></td>";
            }else if($status == "overdue"){
                $row = "<td class='tc'><span class='overdue'>overdue</span></td>";
            }else if($status == "paid"){
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

            echo $tabledata = "<table>
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
    }

    function searchQueryloans($conn, $search){
        // include_once("./dbs.inc.php");
        $date = date('Y-m-d');
        $newsearch = mysqli_real_escape_string($conn,$search);
        
        $sql = "SELECT * FROM `applicant` WHERE CONCAT(`first_name`,' ',`last_name`,' ',`other_names`) 
        LIKE '%". $search ."%' OR `phone_number` LIKE '%". $newsearch ."%'
        OR `member_code` LIKE '%". $newsearch ."%' OR `staff_id` LIKE '%". $newsearch ."%'
        ORDER BY `id` DESC;";

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
                    }else if($pay_date <= $date){
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
                $row = "<td class='tc'><span class='pending'>pending</span></td>";
            }else if($status == "due"){
                $row = "<td class='tc'><span class='due'>due</span></td>";
            }else if($status == "overdue"){
                $row = "<td class='tc'><span class='overdue'>overdue</span></td>";
            }else if($status == "paid"){
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
    }

    function checkGuarantorStatus($conn, $search, $amount){
        $sql = "SELECT SUM(`guaranteed_amount_first`, `guaranteed_amount_second`,
                    `guaranteed_amount_third`, `guaranteed_amount_fourth`) AS guaranteed FROM `applicant` 
                    WHERE `guarantor_staffnum_first` = '{$search}' 
                    or `guarantor_staffnum_second` = '{$search}' or `guarantor_staffnum_third` = '{$search}'
                    or `guarantor_staffnum_fourth` = '{$search}' 
                    and `loan_status` != 'paid'";

        $result = mysqli_query($conn, $sql);
        $sum = mysqli_fetch_assoc($result);
        $guaranteed = (float)$sum["guaranteed"];
        $guaranteed = $guaranteed + $amount;

        $sql = "SELECT * FROM `savings` WHERE `mem_code` = '{$search}' OR `staff_id` = '{$search}';";

        $result2 = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result2);

        $balance = (float)$row["balance"];

        if($balance < $guaranteed){
            $sql = "SELECT * FROM `users` WHERE `staff_id` = '{$search}';";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0){
                return true;
            }
            return false;
        }
        
        return true;
        
    }

    function checkApplicantStatus($conn, $search, $search2){
        $sql = "SELECT * FROM `applicant` WHERE 
        `member_code` = '{$search}' OR `staff_id` = '{$search}'
        `member_code` = '{$search2}' OR `staff_id` = '{$search2}' 
        and `loan_status` != 'paid';";
        $result2 = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result2) > 0){
            return false;
        }else{
            return true;
        }
    }