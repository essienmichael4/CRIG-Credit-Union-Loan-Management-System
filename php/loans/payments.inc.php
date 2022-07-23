<?php
    if(isset($_POST["payment"])){
        include_once("./dbs.inc.php");

        $id = $_POST["id"];
        $amount = (float)mysqli_real_escape_string($conn, $_POST["amount"]);
        $receipt = (float)mysqli_real_escape_string($conn, $_POST["receipt"]);
        $recipient = mysqli_real_escape_string($conn, $_POST["recipient"]);
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
        $guaranted = $loanarrears/4;

        if($loanamount <= $loanpaid){
            $loanstatus = "paid";
        }

        if($time == "first"){
            $sql = "UPDATE `applicant` SET `loan_arrears`={$loanarrears}, `loan_paid` = {$loanpaid},
            `first_due_recipient` = '{$recipient}', `first_due_date_status`= '{$status}'
            ,`loan_status` = '{$loanstatus}', `guaranteed_amount_first` = '{$guaranted}'
            , `guaranteed_amount_second` = '{$guaranted}', `guaranteed_amount_third` = '{$guaranted}'
            , `guaranteed_amount_fourth` = '{$guaranted}', `receipt_1`='$receipt', `amount_payed_1` = $amount WHERE id = {$id} ;";
        }else if($time == "second"){
            $sql = "UPDATE `applicant` SET `loan_arrears`={$loanarrears}, `loan_paid` = {$loanpaid},
            `second_due_recipient` = '{$recipient}', `second_due_date_status`= '{$status}'
            ,`loan_status` = '{$loanstatus}', `guaranteed_amount_first` = '{$guaranted}'
            , `guaranteed_amount_second` = '{$guaranted}', `guaranteed_amount_third` = '{$guaranted}'
            , `guaranteed_amount_fourth` = '{$guaranted}', `receipt_2`='$receipt', `amount_payed_2` = $amount  WHERE id = {$id};";
        }else if($time == "third"){
            $sql = "UPDATE `applicant` SET `loan_arrears`={$loanarrears}, `loan_paid` = {$loanpaid},
            `third_due_recipient` = '{$recipient}', `third_due_date_status`= '{$status}'
            ,`loan_status` = '{$loanstatus}', `guaranteed_amount_first` = '{$guaranted}'
            , `guaranteed_amount_second` = '{$guaranted}', `guaranteed_amount_third` = '{$guaranted}'
            , `guaranteed_amount_fourth` = '{$guaranted}', `receipt_3`='$receipt', `amount_payed_3` = $amount WHERE id = {$id};";
        }else if($time == "fourth"){
            $sql = "UPDATE `applicant` SET `loan_arrears`={$loanarrears}, `loan_paid` = {$loanpaid},
            `fourth_due_recipient` = '{$recipient}', `fourth_due_date_status`= '{$status}'
            ,`loan_status` = '{$loanstatus}', `guaranteed_amount_first` = '{$guaranted}'
            , `guaranteed_amount_second` = '{$guaranted}', `guaranteed_amount_third` = '{$guaranted}'
            , `guaranteed_amount_fourth` = '{$guaranted}', `receipt_4`='$receipt', `amount_payed_4` = $amount WHERE id = {$id};";
        }else if($time == "fifth"){
            $sql = "UPDATE `applicant` SET `loan_arrears`={$loanarrears}, `loan_paid` = {$loanpaid},
            `fifth_due_recipient` = '{$recipient}', `fifth_due_date_status`= '{$status}'
            ,`loan_status` = '{$loanstatus}', `guaranteed_amount_first` = '{$guaranted}'
            , `guaranteed_amount_second` = '{$guaranted}', `guaranteed_amount_third` = '{$guaranted}'
            , `guaranteed_amount_fourth` = '{$guaranted}', `receipt_5`='$receipt', `amount_payed_5` = $amount WHERE id = {$id};";
        }else if($time == "sixth"){
            $sql = "UPDATE `applicant` SET `loan_arrears`={$loanarrears}, `loan_paid` = {$loanpaid},
            `sixth_due_recipient` = '{$recipient}', `sixth_due_date_status`= '{$status}'
            ,`loan_status` = '{$loanstatus}', `guaranteed_amount_first` = '{$guaranted}'
            , `guaranteed_amount_second` = '{$guaranted}', `guaranteed_amount_third` = '{$guaranted}'
            , `guaranteed_amount_fourth` = '{$guaranted}', `receipt_6`='$receipt', `amount_payed_6` = $amount WHERE id = {$id};";
        }

        if(mysqli_query($conn, $sql)){
            header("location: ../src/routes.php?pgname=loandetails&applicant_id={$id}&message=success"); 
        }else{
            header("location: ../src/routes.php?pgname=loandetails&applicant_id={$id}&message=error"); 
        }

    }else if(isset($_POST["payment_onetime"])){
        include_once("../dbs.inc.php");

        $id = $_POST["id"];
        $amount = (float)mysqli_real_escape_string($conn, $_POST["amount_payed"]);
        $recipient = mysqli_real_escape_string($conn, $_POST["recipient"]);
        $loan_amount = (float)mysqli_real_escape_string($conn, $_POST["loan_amount"]);
        $interest_percent = (float)mysqli_real_escape_string($conn, $_POST["interest_percent"]);
        $new_loan = mysqli_real_escape_string($conn, $_POST["new_loan"]);
        $receipt_number = mysqli_real_escape_string($conn, $_POST["receipt_number"]);
        $loanstatus = "paid";
        $guaranteed = $loanarrears/4;
        
        $newloaninterest = $loan_amount * ($interest_percent / 100);
        $newloantobepayed = $loan_amount + $newloaninterest;
        $loanarrears = $newloantobepayed;
        $loanpaid = $amount;

        if(($newloantobepayed - $amount) <= 0){
            header("location: ../src/routes.php?pgname=loandetails&applicant_id={$id}&error=amountnotreached");
        }else{
            $loanarrears = $newloantobepayed - $loan_amount;
            $guaranted = 0;
        }

        $sql = "UPDATE `applicant` SET `loan_interest`={$newloaninterest}, `loan_to_be_payed`={$newloantobepayed},`loan_arrears`={$loanarrears}, `loan_paid` = {$loanpaid},
        `first_due_recipient` = '{$recipient}', `loan_status`= '{$loanstatus}'
        ,`loan_status` = '{$loanstatus}', `guaranteed_amount_first` = '{$guaranteed}'
        , `guaranteed_amount_second` = '{$guaranteed}', `guaranteed_amount_third` = '{$guaranteed}'
        , `guaranteed_amount_fourth` = '{$guaranteed}', 
        `receipt_one_time`='$receipt', `onetime_payment` = 'onetime' WHERE id = {$id} ;";

        if(mysqli_query($conn, $sql)){
            header("location: ../src/routes.php?pgname=loandetails&applicant_id={$id}&message=success"); 
        }else{
            header("location: ../src/routes.php?pgname=loandetails&applicant_id={$id}&message=error"); 
        }

    }
    else{
        header("location: ../src/routes.php?pgname=dashboard");
    }