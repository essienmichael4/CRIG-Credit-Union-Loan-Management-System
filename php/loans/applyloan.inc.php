<?php
    if(isset($_POST["apply"])){

        include_once("../dbs.inc.php");
        include_once("../functions.inc.php");

        define('LOAN_INTEREST_PERCENTAGE', 0.20);
        define('LOAN_GUARANTEED', 4);

        //CUSTOMER DETAILS
        $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
        $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
        $othernames = mysqli_real_escape_string($conn, $_POST["othernames"]);
        $recipientname = mysqli_real_escape_string($conn, $_POST["recipient"]);
        $phone_number = mysqli_real_escape_string($conn, $_POST["phone"]);
        $staff_number = mysqli_real_escape_string($conn, $_POST["staff_number"]);
        $membership_code = mysqli_real_escape_string($conn, $_POST["memcode"]);
        $work_place = mysqli_real_escape_string($conn, $_POST["workplace"]);
        $requested_loan = (float)mysqli_real_escape_string($conn, $_POST["loanreq"]);
        $loan_interest = (float)mysqli_real_escape_string($conn, $_POST["loaninterest"]);
        $loan_total = (float)mysqli_real_escape_string($conn, $_POST["totalloan"]);
        $membership_status = mysqli_real_escape_string($conn, $_POST["membership"]);
        $mode_of_payment = mysqli_real_escape_string($conn, $_POST["mode"]);
        $customer_due_payment = mysqli_real_escape_string($conn, $_POST["customerdue"]);
        $purpose_of_loan = mysqli_real_escape_string($conn, $_POST["purpose"]);

        //GUARANTOR DETAILS
        $first_guarantor_name = mysqli_real_escape_string($conn, $_POST["first_guarantor_name"]);
        $first_guarantor_staff_number = mysqli_real_escape_string($conn, $_POST["first_guarantor_staff_number"]);
        $first_guarantor_phone_number = mysqli_real_escape_string($conn, $_POST["first_guarantor_phone_number"]);
        $first_guarantor_guaranteed_amount = mysqli_real_escape_string($conn, $_POST["first_guarantor_guaranteed_amount"]);
        
        $second_guarantor_name = mysqli_real_escape_string($conn, $_POST["second_guarantor_name"]);
        $second_guarantor_staff_number = mysqli_real_escape_string($conn, $_POST["second_guarantor_staff_number"]);
        $second_guarantor_phone_number = mysqli_real_escape_string($conn, $_POST["second_guarantor_phone_number"]);
        $second_guarantor_guaranteed_amount = mysqli_real_escape_string($conn, $_POST["second_guarantor_guaranteed_amount"]);
        
        $third_guarantor_name = mysqli_real_escape_string($conn, $_POST["third_guarantor_name"]);
        $third_guarantor_staff_number = mysqli_real_escape_string($conn, $_POST["third_guarantor_staff_number"]);
        $third_guarantor_phone_number = mysqli_real_escape_string($conn, $_POST["third_guarantor_phone_number"]);
        $third_guarantor_guaranteed_amount = mysqli_real_escape_string($conn, $_POST["third_guarantor_guaranteed_amount"]);
        
        $fourth_guarantor_name = mysqli_real_escape_string($conn, $_POST["fourth_guarantor_name"]);
        $fourth_guarantor_staff_number = mysqli_real_escape_string($conn, $_POST["fourth_guarantor_staff_number"]);
        $fourth_guarantor_phone_number = mysqli_real_escape_string($conn, $_POST["fourth_guarantor_phone_number"]);
        $fourth_guarantor_guaranteed_amount = mysqli_real_escape_string($conn, $_POST["fourth_guarantor_guaranteed_amount"]);

        if(emptyField($firstname) || emptyField($lastname) || emptyField($phone_number)
        || emptyField($work_place) || emptyField($requested_loan)
        || emptyField($loan_interest) || emptyField($loan_total) || emptyField($membership_status)
        || emptyField($mode_of_payment) || emptyField($customer_due_payment) || emptyField($purpose_of_loan)
        || emptyField($first_guarantor_name) || emptyField($first_guarantor_phone_number) || emptyField($first_guarantor_staff_number)
        || emptyField($first_guarantor_guaranteed_amount)|| emptyField($second_guarantor_name) || emptyField($second_guarantor_phone_number) || emptyField($second_guarantor_staff_number)
        || emptyField($second_guarantor_guaranteed_amount)|| emptyField($third_guarantor_name) || emptyField($third_guarantor_phone_number) || emptyField($third_guarantor_staff_number)
        || emptyField($third_guarantor_guaranteed_amount)|| emptyField($fourth_guarantor_name) || emptyField($fourth_guarantor_phone_number) || emptyField($fourth_guarantor_staff_number)
        || emptyField($fourth_guarantor_guaranteed_amount)){

            header("location: ../../src/routes.php?pgname=apply&error=emptyInput");
            exit();

        }

        if($membership_status == 'member' && emptyField($membership_code)){
            header("location: ../../src/routes.php?pgname=apply&error=emptyInput");
            exit();
        }

        $fullname = "";
        $fullnamerev = "";
        $partialname = "";
        $sql = "";
        if(empty($othernames)){
            $fullname = $firstname. " " .$lastname;
            $fullnamerev = $lastname. " " .$firstname;
        }else{
            $fullname = $firstname. " " .$lastname." ".$othernames;
            $fullnamerev = $lastname. " " .$firstname." ".$othernames;
            $partialname = $firstname. " " .$lastname;
        }
        if(checkApplicantStatus($conn, $membership_code, $staff_number) == "false"){
            header("location: ../../src/routes.php?pgname=apply&error=userhasoutstandingloan");
            exit(); 
        }

        if(checkGuarantorStatus($conn, $first_guarantor_staff_number, $first_guarantor_guaranteed_amount) == "false"){
            header("location: ../../src/routes.php?pgname=apply&error=firstguarantoroutstanding");
                exit();
        }
        if(checkGuarantorStatus($conn, $second_guarantor_staff_number, $second_guarantor_guaranteed_amount) == "false"){
            header("location: ../../src/routes.php?pgname=apply&error=secondguarantoroutstanding");
                exit();
        }
        if(checkGuarantorStatus($conn, $third_guarantor_staff_number, $third_guarantor_guaranteed_amount) == "false"){
            header("location: ../../src/routes.php?pgname=apply&error=thirdguarantoroutstanding");
                exit();
        }
        if(checkGuarantorStatus($conn, $fourth_guarantor_staff_number, $fourth_guarantor_guaranteed_amount) == "false"){
            header("location: ../../src/routes.php?pgname=apply&error=fourthguarantoroutstanding");
            exit();
        }
                
        $loan_interest = $requested_loan * LOAN_INTEREST_PERCENTAGE;
        $loan_total = $requested_loan + $loan_interest; 
        $gauranteed_amount = $loan_total / LOAN_GUARANTEED;
                
        $sql = "INSERT INTO `applicant`(`first_name`, `last_name`, `other_names`, `phone_number`, `member_code`, `staff_id`, 
        `work_place`, `member_status`, `purpose`, `loan_amount`, `loan_interest`, `loan_arrears`, `loan_to_be_payed`, `mode_of_payment`,
        `guarantor_fullname_first`, `guarantor_phone_first`, `guarantor_staffnum_first`, `guaranteed_amount_first`, 
        `guarantor_fullname_second`, `guarantor_phone_second`, `guarantor_staffnum_second`, `guaranteed_amount_second`, 
        `guarantor_fullname_third`, `guarantor_phone_third`, `guarantor_staffnum_third`, `guaranteed_amount_third`, 
        `guarantor_fullname_fourth`, `guarantor_phone_fourth`, `guarantor_staffnum_fourth`, `guaranteed_amount_fourth`, 
        `recipient_name`,`applicant_first_due_date`) VALUES('{$firstname}', '{$lastname}', '{$othernames}', '{$phone_number}', '{$membership_code}', '{$staff_number}',
        '{$work_place}', '{$membership_status}', '{$purpose_of_loan}', {$requested_loan}, {$loan_interest}, {$loan_total} {$loan_total}, '{$mode_of_payment}',
        '{$first_guarantor_name}', '{$first_guarantor_phone_number}', '{$first_guarantor_staff_number}', {$gauranteed_amount},
        '{$second_guarantor_name}', '{$second_guarantor_phone_number}', '{$second_guarantor_staff_number}', {$gauranteed_amount},
        '{$third_guarantor_name}', '{$third_guarantor_phone_number}', '{$third_guarantor_staff_number}', {$gauranteed_amount},
        '{$fourth_guarantor_name}', '{$fourth_guarantor_phone_number}', '{$fourth_guarantor_staff_number}', {$gauranteed_amount},
        '{$recipientname}', '{$customer_due_payment}')";

        if(mysqli_query($conn, $sql)){
            header("location: ../../src/routes.php?pgname=dashboard"); 
            exit();
        }else{
            header("location: ../../src/routes.php?pgname=apply&error=sqlerror"); 
            exit();
        }
    }else if(isset($_POST["approveapply"])){
        include_once("../dbs.inc.php");
        include_once("../functions.inc.php");

        define('LOAN_INTEREST_PERCENTAGE', 0.20);
        define('LOAN_GUARANTEED', 4);

        //CUSTOMER DETAILS
        $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
        $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
        $othernames = mysqli_real_escape_string($conn, $_POST["othernames"]);
        $recipientname = mysqli_real_escape_string($conn, $_POST["recipient"]);
        $phone_number = mysqli_real_escape_string($conn, $_POST["phone"]);
        $staff_number = mysqli_real_escape_string($conn, $_POST["staff_number"]);
        $membership_code = mysqli_real_escape_string($conn, $_POST["memcode"]);
        $work_place = mysqli_real_escape_string($conn, $_POST["workplace"]);
        $requested_loan = (float)mysqli_real_escape_string($conn, $_POST["loanreq"]);
        $loan_interest = (float)mysqli_real_escape_string($conn, $_POST["loaninterest"]);
        $loan_total = (float)mysqli_real_escape_string($conn, $_POST["totalloan"]);
        $membership_status = mysqli_real_escape_string($conn, $_POST["membership"]);
        $mode_of_payment = mysqli_real_escape_string($conn, $_POST["mode"]);
        $customer_due_payment = mysqli_real_escape_string($conn, $_POST["customerdue"]);
        $purpose_of_loan = mysqli_real_escape_string($conn, $_POST["purpose"]);

        //GUARANTOR DETAILS
        $first_guarantor_name = mysqli_real_escape_string($conn, $_POST["first_guarantor_name"]);
        $first_guarantor_staff_number = mysqli_real_escape_string($conn, $_POST["first_guarantor_staff_number"]);
        $first_guarantor_phone_number = mysqli_real_escape_string($conn, $_POST["first_guarantor_phone_number"]);
        $first_guarantor_guaranteed_amount = mysqli_real_escape_string($conn, $_POST["first_guarantor_guaranteed_amount"]);
        
        $second_guarantor_name = mysqli_real_escape_string($conn, $_POST["second_guarantor_name"]);
        $second_guarantor_staff_number = mysqli_real_escape_string($conn, $_POST["second_guarantor_staff_number"]);
        $second_guarantor_phone_number = mysqli_real_escape_string($conn, $_POST["second_guarantor_phone_number"]);
        $second_guarantor_guaranteed_amount = mysqli_real_escape_string($conn, $_POST["second_guarantor_guaranteed_amount"]);
        
        $third_guarantor_name = mysqli_real_escape_string($conn, $_POST["third_guarantor_name"]);
        $third_guarantor_staff_number = mysqli_real_escape_string($conn, $_POST["third_guarantor_staff_number"]);
        $third_guarantor_phone_number = mysqli_real_escape_string($conn, $_POST["third_guarantor_phone_number"]);
        $third_guarantor_guaranteed_amount = mysqli_real_escape_string($conn, $_POST["third_guarantor_guaranteed_amount"]);
        
        $fourth_guarantor_name = mysqli_real_escape_string($conn, $_POST["fourth_guarantor_name"]);
        $fourth_guarantor_staff_number = mysqli_real_escape_string($conn, $_POST["fourth_guarantor_staff_number"]);
        $fourth_guarantor_phone_number = mysqli_real_escape_string($conn, $_POST["fourth_guarantor_phone_number"]);
        $fourth_guarantor_guaranteed_amount = mysqli_real_escape_string($conn, $_POST["fourth_guarantor_guaranteed_amount"]);

        $first_due_approved = mysqli_real_escape_string($conn, $_POST["first_due_approved"]);
        $second_due_approved = mysqli_real_escape_string($conn, $_POST["second_due_approved"]);
        $third_due_approved = mysqli_real_escape_string($conn, $_POST["third_due_approved"]);
        $fourth_due_approved = mysqli_real_escape_string($conn, $_POST["fourth_due_approved"]);
        $fifth_due_approved = mysqli_real_escape_string($conn, $_POST["fifth_due_approved"]);
        $sixth_due_approved = mysqli_real_escape_string($conn, $_POST["sixth_due_approved"]);

        if(emptyField($firstname) || emptyField($lastname) || emptyField($phone_number) ||
        emptyField($staff_number) || emptyField($work_place) || emptyField($requested_loan)
        || emptyField($loan_interest) || emptyField($loan_total) || emptyField($membership_status)
        || emptyField($mode_of_payment) || emptyField($customer_due_payment) || emptyField($purpose_of_loan)
        || emptyField($first_guarantor_name) || emptyField($first_guarantor_phone_number) || emptyField($first_guarantor_staff_number)
        || emptyField($first_guarantor_guaranteed_amount)|| emptyField($second_guarantor_name) || emptyField($second_guarantor_phone_number) || emptyField($second_guarantor_staff_number)
        || emptyField($second_guarantor_guaranteed_amount)|| emptyField($third_guarantor_name) || emptyField($third_guarantor_phone_number) || emptyField($third_guarantor_staff_number)
        || emptyField($third_guarantor_guaranteed_amount)|| emptyField($fourth_guarantor_name) || emptyField($fourth_guarantor_phone_number) || emptyField($fourth_guarantor_staff_number)
        || emptyField($fourth_guarantor_guaranteed_amount) || emptyField($first_due_approved)
        || emptyField($second_due_approved) || emptyField($third_due_approved) || emptyField($fourth_due_approved)){

            header("location: ../../src/routes.php?pgname=apply&error=emptyInput"); 
        }

        if($membership_status == 'member' && emptyField($membership_code)){
            header("location: ../../src/routes.php?pgname=apply&error=emptyInput");
            exit();
        }

        $fullname = "";
        $fullnamerev = "";
        $partialname = "";
        $sql = "";
        if(empty($othernames)){
            $fullname = $firstname. " " .$lastname;
            $fullnamerev = $lastname. " " .$firstname;
        }else{
            $fullname = $firstname. " " .$lastname." ".$othernames;
            $fullnamerev = $lastname. " " .$firstname." ".$othernames;
            $partialname = $firstname. " " .$lastname;
        }

        if(checkApplicantStatus($conn, $membership_code, $staff_number) == "false"){
            header("location: ../../src/routes.php?pgname=apply&error=userhasoutstandingloan");
            exit(); 
        }

        if(checkGuarantorStatus($conn, $first_guarantor_staff_number, $first_guarantor_guaranteed_amount) == "false"){
            header("location: ../../src/routes.php?pgname=apply&error=firstguarantoroutstanding");
                exit();
        }
        if(checkGuarantorStatus($conn, $second_guarantor_staff_number, $second_guarantor_guaranteed_amount) == "false"){
            header("location: ../../src/routes.php?pgname=apply&error=secondguarantoroutstanding");
                exit();
        }
        if(checkGuarantorStatus($conn, $third_guarantor_staff_number, $third_guarantor_guaranteed_amount) == "false"){
            header("location: ../../src/routes.php?pgname=apply&error=thirdguarantoroutstanding");
                exit();
        }
        if(checkGuarantorStatus($conn, $fourth_guarantor_staff_number, $fourth_guarantor_guaranteed_amount) == "false"){
            header("location: ../../src/routes.php?pgname=apply&error=fourthguarantoroutstanding");
            exit();
        }
                
        $day_approved = date('Y-m-d');
        $approval_status = "approved";
        $loan_interest = $requested_loan * LOAN_INTEREST_PERCENTAGE;
        $loan_total = $requested_loan + $loan_interest;
        $gauranteed_amount = $loan_total / LOAN_GUARANTEED;
        
        $sql = "INSERT INTO `applicant`(`first_name`, `last_name`, `other_names`, `phone_number`, `member_code`, `staff_id`, 
        `work_place`, `member_status`, `purpose`, `loan_amount`, `loan_interest`, `loan_to_be_payed`, `mode_of_payment`,
            `guarantor_fullname_first`, `guarantor_phone_first`, `guarantor_staffnum_first`, `guaranteed_amount_first`, 
            `guarantor_fullname_second`, `guarantor_phone_second`, `guarantor_staffnum_second`, `guaranteed_amount_second`, 
            `guarantor_fullname_third`, `guarantor_phone_third`, `guarantor_staffnum_third`, `guaranteed_amount_third`, 
            `guarantor_fullname_fourth`, `guarantor_phone_fourth`, `guarantor_staffnum_fourth`, `guaranteed_amount_fourth`, 
            `recipient_name`,`applicant_first_due_date`,`first_due_date`, `second_due_date`, `third_due_date`, `fourth_due_date`,
            `fifth_due_date`,`sixth_due_date`, `approved_by`, `day_approved`, `approval_status`) VALUES('{$firstname}', '{$lastname}', '{$othernames}', '{$phone_number}', '{$membership_code}', '{$staff_number}',
            '{$work_place}', '{$membership_status}', '{$purpose_of_loan}', {$requested_loan}, {$loan_interest}, {$loan_total}, '{$mode_of_payment}',
            '{$first_guarantor_name}', '{$first_guarantor_phone_number}', '{$first_guarantor_staff_number}', {$gauranteed_amount},
            '{$second_guarantor_name}', '{$second_guarantor_phone_number}', '{$second_guarantor_staff_number}', {$gauranteed_amount},
            '{$third_guarantor_name}', '{$third_guarantor_phone_number}', '{$third_guarantor_staff_number}', {$gauranteed_amount},
            '{$fourth_guarantor_name}', '{$fourth_guarantor_phone_number}', '{$fourth_guarantor_staff_number}', {$gauranteed_amount},
            '{$recipientname}', '{$customer_due_payment}', '{$first_due_approved}', '{$second_due_approved}', '{$third_due_approved}'
            , '{$fourth_due_approved}', '{$fifth_due_approved}', '{$sixth_due_approved}', '{$recipientname}', '{$day_approved}', '{$approval_status}')";

            if(mysqli_query($conn, $sql)){
            header("location: ../../src/routes.php?pgname=dashboard"); 
            exit();
            }else{
            header("location: ../../src/routes.php?pgname=apply&error=sqlerror"); 
            exit();
            }
    }else if(isset($_POST["approve"])){
        include_once("../dbs.inc.php");
        include_once("../functions.inc.php");

        $recipientname = mysqli_real_escape_string($conn, $_POST["recipient"]);
        $day_approved = date('Y-m-d');
        $approval_status = "approved";
        $loan_status = "pending";

        $applicant_id = mysqli_real_escape_string($conn, $_POST["applicant_id"]);
        $first_due_approved = mysqli_real_escape_string($conn, $_POST["first_due_approved"]);
        $second_due_approved = mysqli_real_escape_string($conn, $_POST["second_due_approved"]);
        $third_due_approved = mysqli_real_escape_string($conn, $_POST["third_due_approved"]);
        $fourth_due_approved = mysqli_real_escape_string($conn, $_POST["fourth_due_approved"]);
        $fifth_due_approved = mysqli_real_escape_string($conn, $_POST["fifth_due_approved"]);
        $sixth_due_approved = mysqli_real_escape_string($conn, $_POST["sixth_due_approved"]);

        if(emptyField($first_due_approved) || emptyField($second_due_approved) || emptyField($third_due_approved) || 
        emptyField($fourth_due_approved)){
            header("location: ../../src/routes.php?pgname=apply&error=emptyInput"); 
        }else{

            $sql = "UPDATE `applicant` SET `first_due_date` = '{$first_due_approved}', `second_due_date` = '{$second_due_approved}',
            `third_due_date` = '{$third_due_approved}', `fourth_due_date` = '{$fourth_due_approved}',
            `fifth_due_date` = '{$fifth_due_approved}',`sixth_due_date` = '{$sixth_due_approved}', 
            `approved_by` = '{$recipientname}', `day_approved` = '{$day_approved}', `approval_status` = '{$approval_status}'
            , `loan_status` = '{$loan_status}' WHERE `id` = '{$applicant_id}'";

            if(mysqli_query($conn, $sql)){
                header("location: ../../src/routes.php?pgname=dashboard"); 
                exit();
             }else{
                header("location: ../../src/routes.php?pgname=apply&error=sqlerror"); 
                exit();
             }
        }
    }else{
        header("location: ../../src/routes.php?pgname=apply");
    }