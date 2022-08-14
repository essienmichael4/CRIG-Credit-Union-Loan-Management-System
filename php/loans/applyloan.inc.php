<?php
    if(isset($_POST["apply"])){

        include_once("../dbs.inc.php");
        include_once("../functions.inc.php");

        define('LOAN_INTEREST_PERCENTAGE', 0.20);
        define('LOAN_GUARANTEED', 4);
        // define('LOAN_STATUS', "awaiting approval");
        $approval_status = "awaiting approval";

        //CUSTOMER DETAILS
        $applicant_name = mysqli_real_escape_string($conn, $_POST["applicant_name"]);
        $sponsor = mysqli_real_escape_string($conn, $_POST["sponsor"]);
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
        $pic = $_FILES["pic"];

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

        if(emptyField($applicant_name) || emptyField($requested_loan)
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

        if(empty(!$pic['name'])){
            $picName = $pic['name'];
            $picTempName = $pic['tmp_name'];
            $picSize = $pic['size'];
            $picError = $pic['error'];

            $picExt = explode('.', $picName);
            $picActExt = strtolower(end($picExt));

            $allowedExt = array('jpg', 'jpeg', 'png');
            
            if(in_array($picActExt, $allowedExt)){
                if($picError === 0){
                    if($picSize < 5000000){
                        $picNewName = $applicant_name.uniqid('',true).".".$picActExt;
                        $fileDes = '../../assets/'.$picNewName;

                        $sql = "INSERT INTO `applicant`(`applicant_name`,`sponsor`, `phone_number`, `member_code`, `staff_id`, 
                        `work_place`, `member_status`, `purpose`, `loan_amount`, `loan_interest`, `loan_arrears`, `loan_to_be_payed`, `mode_of_payment`,
                        `guarantor_fullname_first`, `guarantor_phone_first`, `guarantor_staffnum_first`, `guaranteed_amount_first`, 
                        `guarantor_fullname_second`, `guarantor_phone_second`, `guarantor_staffnum_second`, `guaranteed_amount_second`, 
                        `guarantor_fullname_third`, `guarantor_phone_third`, `guarantor_staffnum_third`, `guaranteed_amount_third`, 
                        `guarantor_fullname_fourth`, `guarantor_phone_fourth`, `guarantor_staffnum_fourth`, `guaranteed_amount_fourth`, 
                        `recipient_name`,`applicant_first_due_date`, `applicant_pic`, `approval_status`) VALUES('{$applicant_name}', '$sponsor', '{$phone_number}', '{$membership_code}', '{$staff_number}',
                        '{$work_place}', '{$membership_status}', '{$purpose_of_loan}', {$requested_loan}, {$loan_interest}, {$loan_total}, {$loan_total}, '{$mode_of_payment}',
                        '{$first_guarantor_name}', '{$first_guarantor_phone_number}', '{$first_guarantor_staff_number}', {$gauranteed_amount},
                        '{$second_guarantor_name}', '{$second_guarantor_phone_number}', '{$second_guarantor_staff_number}', {$gauranteed_amount},
                        '{$third_guarantor_name}', '{$third_guarantor_phone_number}', '{$third_guarantor_staff_number}', {$gauranteed_amount},
                        '{$fourth_guarantor_name}', '{$fourth_guarantor_phone_number}', '{$fourth_guarantor_staff_number}', {$gauranteed_amount},
                        '{$recipientname}', '{$customer_due_payment}', '{$picNewName}', '{$approval_status}')";
                            
                        if(mysqli_query($conn, $sql)){
                            move_uploaded_file($picTempName, $fileDes);
                            header("location: ../../src/routes.php?pgname=dashboard");
                            exit();
                        }else{
                            header("location: ../../src/routes.php?pgname=applysavings&error=sqlerror");
                            exit();
                        }

                    }else {
                        header("Location: ../../src/index.php?pgname=applysavings&error=fileTooBig");
                        exit();
                    }
                }else {
                    header("Location: ../../src/index.php?pgname=apply&success=errorOccured");
                    exit();   
                }
            }else {
                header("location: ../../src/routes.php?pgname=apply&error=sqlerror");
                exit();
            }            
        }
                
        $sql = "INSERT INTO `applicant`(`applicant_name`, `sponsor`, `phone_number`, `member_code`, `staff_id`, 
        `work_place`, `member_status`, `purpose`, `loan_amount`, `loan_interest`, `loan_arrears`, 
        `loan_to_be_payed`, `mode_of_payment`,
        `guarantor_fullname_first`, `guarantor_phone_first`, `guarantor_staffnum_first`, `guaranteed_amount_first`, 
        `guarantor_fullname_second`, `guarantor_phone_second`, `guarantor_staffnum_second`, `guaranteed_amount_second`, 
        `guarantor_fullname_third`, `guarantor_phone_third`, `guarantor_staffnum_third`, `guaranteed_amount_third`, 
        `guarantor_fullname_fourth`, `guarantor_phone_fourth`, `guarantor_staffnum_fourth`, `guaranteed_amount_fourth`, 
        `recipient_name`,`applicant_first_due_date`, `applicant_pic`, `approval_status`) 
        VALUES('{$applicant_name}', '$sponsor', '{$phone_number}', '{$membership_code}', '{$staff_number}',
        '{$work_place}', '{$membership_status}', '{$purpose_of_loan}', {$requested_loan}, {$loan_interest}, {$loan_total},
         {$loan_total}, '{$mode_of_payment}',
        '{$first_guarantor_name}', '{$first_guarantor_phone_number}', '{$first_guarantor_staff_number}', {$gauranteed_amount},
        '{$second_guarantor_name}', '{$second_guarantor_phone_number}', '{$second_guarantor_staff_number}', {$gauranteed_amount},
        '{$third_guarantor_name}', '{$third_guarantor_phone_number}', '{$third_guarantor_staff_number}', {$gauranteed_amount},
        '{$fourth_guarantor_name}', '{$fourth_guarantor_phone_number}', '{$fourth_guarantor_staff_number}', {$gauranteed_amount},
        '{$recipientname}', '{$customer_due_payment}', 'general.png', '{$approval_status}')";

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
        $applicant_name = mysqli_real_escape_string($conn, $_POST["applicant_name"]);
        $sponsor = mysqli_real_escape_string($conn, $_POST["sponsor"]);
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
        $day_approved = mysqli_real_escape_string($conn, $_POST["approval_day"]);

        if(emptyField($applicant_name) || emptyField($requested_loan)
        || emptyField($loan_interest) || emptyField($loan_total) || emptyField($membership_status)
        || emptyField($mode_of_payment) || emptyField($customer_due_payment) || emptyField($purpose_of_loan)
        || emptyField($first_guarantor_name) || emptyField($first_guarantor_phone_number) || emptyField($first_guarantor_staff_number)
        || emptyField($first_guarantor_guaranteed_amount)|| emptyField($second_guarantor_name) || emptyField($second_guarantor_phone_number) || emptyField($second_guarantor_staff_number)
        || emptyField($second_guarantor_guaranteed_amount)|| emptyField($third_guarantor_name) || emptyField($third_guarantor_phone_number) || emptyField($third_guarantor_staff_number)
        || emptyField($third_guarantor_guaranteed_amount)|| emptyField($fourth_guarantor_name) || emptyField($fourth_guarantor_phone_number) || emptyField($fourth_guarantor_staff_number)
        || emptyField($fourth_guarantor_guaranteed_amount) || emptyField($first_due_approved)
        || emptyField($second_due_approved) || emptyField($third_due_approved) || emptyField($fourth_due_approved)
        || emptyField($day_approved)){

            header("location: ../../src/routes.php?pgname=apply&error=emptyInput"); 
        }

        if($membership_status == 'member' && emptyField($membership_code)){
            header("location: ../../src/routes.php?pgname=apply&error=memberstatusinput");
            exit();
        }

        $checksql = "";

        if($membership_status == 'member'){
            $checksql = "SELECT * FROM `applicant` WHERE 
            `member_code` = '{$membership_code}' and `loan_status` != 'paid';";

            if(checkApplicantStatus($conn, $checksql) == "true"){
                header("location: ../../src/routes.php?pgname=apply&error=userhasoutstandingloan");
                exit(); 
            }
        }else{
            $checksql = "SELECT * FROM `applicant` WHERE `staff_id` = '{$staff_number}' 
            and `loan_status` != 'paid';";

            if(checkApplicantStatus($conn, $checksql) == "true"){
                header("location: ../../src/routes.php?pgname=apply&error=userhasoutstandingloan");
                exit(); 
            }
        }

        if(checkGuarantorStatus($conn, $first_guarantor_staff_number, $first_guarantor_guaranteed_amount) == "true"){
            header("location: ../../src/routes.php?pgname=apply&error=firstguarantoroutstanding");
                exit();
        }
        if(checkGuarantorStatus($conn, $second_guarantor_staff_number, $second_guarantor_guaranteed_amount) == "true"){
            header("location: ../../src/routes.php?pgname=apply&error=secondguarantoroutstanding");
                exit();
        }
        if(checkGuarantorStatus($conn, $third_guarantor_staff_number, $third_guarantor_guaranteed_amount) == "true"){
            header("location: ../../src/routes.php?pgname=apply&error=thirdguarantoroutstanding");
                exit();
        }
        if(checkGuarantorStatus($conn, $fourth_guarantor_staff_number, $fourth_guarantor_guaranteed_amount) == "true"){
            header("location: ../../src/routes.php?pgname=apply&error=fourthguarantoroutstanding");
            exit();
        }
                
        // $day_approved = date('Y-m-d');
        $approval_status = "approved";
        $loan_interest = $requested_loan * LOAN_INTEREST_PERCENTAGE;
        $loan_total = $requested_loan + $loan_interest;
        $gauranteed_amount = $loan_total / LOAN_GUARANTEED;
        $loan_status = "pending";
        
        if(empty(!$pic['name'])){
            $picName = $pic['name'];
            $picTempName = $pic['tmp_name'];
            $picSize = $pic['size'];
            $picError = $pic['error'];

            $picExt = explode('.', $picName);
            $picActExt = strtolower(end($picExt));

            $allowedExt = array('jpg', 'jpeg', 'png');
            
            if(in_array($picActExt, $allowedExt)){
                if($picError === 0){
                    if($picSize < 5000000){
                        $picNewName = $applicant_name.uniqid('',true).".".$picActExt;
                        $fileDes = '../../assets/'.$picNewName;

                        $sql = "INSERT INTO `applicant`(`applicant_name`, `sponsor`, `phone_number`, `member_code`, `staff_id`, 
                        `work_place`, `member_status`, `purpose`, `loan_amount`, `loan_interest`, `loan_to_be_payed`,`loan_arrears`, `mode_of_payment`,
                        `guarantor_fullname_first`, `guarantor_phone_first`, `guarantor_staffnum_first`, `guaranteed_amount_first`, 
                        `guarantor_fullname_second`, `guarantor_phone_second`, `guarantor_staffnum_second`, `guaranteed_amount_second`, 
                        `guarantor_fullname_third`, `guarantor_phone_third`, `guarantor_staffnum_third`, `guaranteed_amount_third`, 
                        `guarantor_fullname_fourth`, `guarantor_phone_fourth`, `guarantor_staffnum_fourth`, `guaranteed_amount_fourth`, 
                        `recipient_name`,`applicant_first_due_date`,`first_due_date`, `second_due_date`, `third_due_date`, `fourth_due_date`,
                        `fifth_due_date`,`sixth_due_date`, `approved_by`, `day_approved`, `approval_status`, `applicant_pic`,`loan_status`) 
                        VALUES('{$applicant_name}', '$sponsor', '{$phone_number}', '{$membership_code}', '{$staff_number}',
                        '{$work_place}', '{$membership_status}', '{$purpose_of_loan}', {$requested_loan}, {$loan_interest}, {$loan_total}, {$loan_total}, '{$mode_of_payment}',
                        '{$first_guarantor_name}', '{$first_guarantor_phone_number}', '{$first_guarantor_staff_number}', {$gauranteed_amount},
                        '{$second_guarantor_name}', '{$second_guarantor_phone_number}', '{$second_guarantor_staff_number}', {$gauranteed_amount},
                        '{$third_guarantor_name}', '{$third_guarantor_phone_number}', '{$third_guarantor_staff_number}', {$gauranteed_amount},
                        '{$fourth_guarantor_name}', '{$fourth_guarantor_phone_number}', '{$fourth_guarantor_staff_number}', {$gauranteed_amount},
                        '{$recipientname}', '{$customer_due_payment}', '{$first_due_approved}', '{$second_due_approved}', '{$third_due_approved}'
                        , '{$fourth_due_approved}', '{$fifth_due_approved}', '{$sixth_due_approved}', '{$recipientname}', '{$day_approved}', '{$approval_status}'
                        , '{$picNewName}', '$loan_status')";
                            
                        if(mysqli_query($conn, $sql)){
                            move_uploaded_file($picTempName, $fileDes);
                            header("location: ../../src/routes.php?pgname=loans");
                            exit();
                        }else{
                            header("location: ../../src/routes.php?pgname=applysavings&error=sqlerror");
                            exit();
                        }

                    }else {
                        header("Location: ../../src/index.php?pgname=applysavings&error=fileTooBig");
                        exit();
                    }
                }else {
                    header("Location: ../../src/index.php?pgname=applysavings&success=picerror");
                    exit();   
                }
            }else {
                header("location: ../../src/routes.php?pgname=apply&error=picexterror");
                exit();
            }            
        }

        $sql = "INSERT INTO `applicant`(`applicant_name`, `sponsor`, `phone_number`, `member_code`, `staff_id`, 
        `work_place`, `member_status`, `purpose`, `loan_amount`, `loan_interest`, `loan_to_be_payed`,`loan_arrears`, `mode_of_payment`,
            `guarantor_fullname_first`, `guarantor_phone_first`, `guarantor_staffnum_first`, `guaranteed_amount_first`, 
            `guarantor_fullname_second`, `guarantor_phone_second`, `guarantor_staffnum_second`, `guaranteed_amount_second`, 
            `guarantor_fullname_third`, `guarantor_phone_third`, `guarantor_staffnum_third`, `guaranteed_amount_third`, 
            `guarantor_fullname_fourth`, `guarantor_phone_fourth`, `guarantor_staffnum_fourth`, `guaranteed_amount_fourth`, 
            `recipient_name`,`applicant_first_due_date`,`first_due_date`, `second_due_date`, `third_due_date`, `fourth_due_date`,
            `fifth_due_date`,`sixth_due_date`, `approved_by`, `day_approved`, `approval_status`, `applicant_pic`, `loan_status`) 
            VALUES('{$applicant_name}', '$sponsor', '{$phone_number}', '{$membership_code}', '{$staff_number}',
            '{$work_place}', '{$membership_status}', '{$purpose_of_loan}', {$requested_loan}, {$loan_interest}, {$loan_total}, {$loan_total}, '{$mode_of_payment}',
            '{$first_guarantor_name}', '{$first_guarantor_phone_number}', '{$first_guarantor_staff_number}', {$gauranteed_amount},
            '{$second_guarantor_name}', '{$second_guarantor_phone_number}', '{$second_guarantor_staff_number}', {$gauranteed_amount},
            '{$third_guarantor_name}', '{$third_guarantor_phone_number}', '{$third_guarantor_staff_number}', {$gauranteed_amount},
            '{$fourth_guarantor_name}', '{$fourth_guarantor_phone_number}', '{$fourth_guarantor_staff_number}', {$gauranteed_amount},
            '{$recipientname}', '{$customer_due_payment}', '{$first_due_approved}', '{$second_due_approved}', '{$third_due_approved}'
            , '{$fourth_due_approved}', '{$fifth_due_approved}', '{$sixth_due_approved}', '{$recipientname}', '{$day_approved}', '{$approval_status}', 'general.png',
            '$loan_status')";

            if(mysqli_query($conn, $sql)){
            header("location: ../../src/routes.php?pgname=loans"); 
            exit();
            }else{
            header("location: ../../src/routes.php?pgname=apply&error=sqlerror"); 
            exit();
            }
    }else if(isset($_POST["approve"])){
        include_once("../dbs.inc.php");
        include_once("../functions.inc.php");

        $recipientname = mysqli_real_escape_string($conn, $_POST["recipient"]);
        $day_approved = mysqli_real_escape_string($conn, $_POST["approval_day"]);
        $approval_status = "approved";
        // $loan_status = "pending";

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
            WHERE `id` = '{$applicant_id}'";

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
        exit();
    }