<?php
    if(isset($_POST["payment"])){
        include_once("./dbs.inc.php");

        $id = $_POST["id"];
        $amount = (float)mysqli_real_escape_string($conn, $_POST["amount"]);
        $recipient = mysqli_real_escape_string($conn, $_POST["amount"]);
        $time = $_POST["duedate"];
        $status = 'paid';
        $loanstatus = "pending";

        $sql = "SELECT `loan_arrears`, `loan_to_be_payed`, `loan_paid` FROM `applicant` where id = {$id};";
        $result = $conn->query($sql);

        $loan = mysqli_fetch_assoc($result);
        $loanamount = (float)$loan['loan_to_be_payed'];
        $loanarrears = (float)$loan['loan_arrears'];
        $loanpaid = (float)$loan['loan_paid'];

        $loanarrears = $loanarrears - $amount;
        $loanpaid = $loanpaid + $amount;

        if($loanamount <= $loanpaid){
            $loanstatus = "paid";
        }

        if($time = "first"){
            $sql = "UPDATE `applicant` SET `loan_arrears`={$loanarrears}, `loan_paid` = {$loanpaid},
            `first_due_recipient` = '{$recipient}', `first_due_date_status`= '{$status}'
            ,`loan_status` = '{$loanstatus}' WHERE id = {$id};";
        }else if($time = "second"){
            $sql = "UPDATE `applicant` SET `loan_arrears`={$loanarrears}, `loan_paid` = {$loanpaid},
            `second_due_recipient` = '{$recipient}', `second_due_date_status`= '{$status}',
            ,`loan_status` = '{$loanstatus}' WHERE id = {$id};";
        }else if($time = "third"){
            $sql = "UPDATE `applicant` SET `loan_arrears`={$loanarrears}, `loan_paid` = {$loanpaid},
            `third_due_recipient` = '{$recipient}', `third_due_date_status`= '{$status}',
            ,`loan_status` = '{$loanstatus}' WHERE id = {$id};";
        }else if($time = "fourth"){
            $sql = "UPDATE `applicant` SET `loan_arrears`={$loanarrears}, `loan_paid` = {$loanpaid},
            `fourth_due_recipient` = '{$recipient}', `fourth_due_date_status`= '{$status}',
            ,`loan_status` = '{$loanstatus}' WHERE id = {$id};";
        }else if($time = "fifth"){
            $sql = "UPDATE `applicant` SET `loan_arrears`={$loanarrears}, `loan_paid` = {$loanpaid},
            `fifth_due_recipient` = '{$recipient}', `fifth_due_date_status`= '{$status}',
            ,`loan_status` = '{$loanstatus}' WHERE id = {$id};";
        }else if($time = "sixth"){
            $sql = "UPDATE `applicant` SET `loan_arrears`={$loanarrears}, `loan_paid` = {$loanpaid},
            `sixth_due_recipient` = '{$recipient}', `sixth_due_date_status`= '{$status}',
            ,`loan_status` = '{$loanstatus}' WHERE id = {$id};";
        }

        if(mysqli_query($conn, $sql)){
            header("location: ../src/routes.php?pgname=loandetails&applicant_id={$id}&message=success"); 
        }else{
            header("location: ../src/routes.php?pgname=loandetails&applicant_id={$id}&message=error"); 
        }

    }else{
        header("location: ../src/routes.php?pgname=dashboard");
    }