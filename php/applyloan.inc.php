<?php
    if(isset($_POST["apply"])){

        include_once("./dbs.inc.php");
        include_once("./functions.inc.php");

        define('LOAN_INTEREST_PERCENTAGE', 0.20);
        define('LOAN_GUARANTEED', 4);

        //CUSTOMER DETAILS
        $firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
        $lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
        $othernames = mysqli_real_escape_string($conn, $_POST["othernames"]);
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

        if(emptyField($firstname) || emptyField($lastname) || emptyField($phone_number) ||
        emptyField($staff_number) || emptyField($work_place) || emptyField($requested_loan)
        || emptyField($loan_interest) || emptyField($loan_total) || emptyField($membership_status)
        || emptyField($mode_of_payment) || emptyField($customer_due_payment) || emptyField($purpose_of_loan)
        || emptyField($first_guarantor_name) || emptyField($first_guarantor_phone_number) || emptyField($first_guarantor_staff_number)
        || emptyField($first_guarantor_guaranteed_amount)|| emptyField($second_guarantor_name) || emptyField($second_guarantor_phone_number) || emptyField($second_guarantor_staff_number)
        || emptyField($second_guarantor_guaranteed_amount)|| emptyField($third_guarantor_name) || emptyField($third_guarantor_phone_number) || emptyField($third_guarantor_staff_number)
        || emptyField($third_guarantor_guaranteed_amount)|| emptyField($fourth_guarantor_name) || emptyField($fourth_guarantor_phone_number) || emptyField($fourth_guarantor_staff_number)
        || emptyField($fourth_guarantor_guaranteed_amount)){

            header("location: ../src/routes.php?pgname=apply&error=emptyInput"); 

        }else{

            if($membership_status == 'member' && emptyField($membership_code)){
                header("location: ../src/routes.php?pgname=apply&error=emptyInput"); 
            }else{

                $fullname = "";
                $fullnamerev = "";
                $partialname = "";
                $sql = "";
                if(empty($othernames)){
                    $fullname = $firstname. " " .$lastname;
                    $fullnamerev = $lastname. " " .$firstname;
                    $sql = "SELECT * FROM `applicant` WHERE `first_name` = '{$firstname}' 
                    and `last_name` = '{$lastname}' and `first_due_date_status` != 'paid' or 
                    `second_due_date_status` != 'paid' or `third_due_date_status` != 'paid' or
                    `fourth_due_date_status` != 'paid' or `fifth_due_date_status` != 'paid' or
                    `sixth_due_date_status` != 'paid'";
                }else{
                    $fullname = $firstname. " " .$lastname." ".$othernames;
                    $fullnamerev = $lastname. " " .$firstname." ".$othernames;
                    $partialname = $firstname. " " .$lastname;
                    $sql = "SELECT * FROM `applicant` WHERE `first_name` = '{$firstname}' 
                    and `last_name` = '{$lastname}' and `other_name` = '{$othernames}'
                    and `first_due_date_status` != 'paid' or 
                    `second_due_date_status` != 'paid' or `third_due_date_status` != 'paid' or
                    `fourth_due_date_status` != 'paid' or `fifth_due_date_status` != 'paid' or
                    `sixth_due_date_status` != 'paid'";
                }
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result)>0){
                    header("location: ../src/routes.php?pgname=apply&error=userhasoutstandingloan"); 
                }else{
                    $sql = "SELECT * FROM `applicant` WHERE `guarantor_fullname_first` = '{$first_guarantor_name}' 
                    or `guarantor_fullname_second` = '{$first_guarantor_name}' or `guarantor_fullname_third` = '{$first_guarantor_name}'
                    or `guarantor_fullname_fourth` = '{$first_guarantor_name}' 
                    and `first_due_date_status` != 'paid' or 
                    `second_due_date_status` != 'paid' or `third_due_date_status` != 'paid' or
                    `fourth_due_date_status` != 'paid' or `fifth_due_date_status` != 'paid' or
                    `sixth_due_date_status` != 'paid'";
                    
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)>0){
                        header("location: ../src/routes.php?pgname=apply&error=firstguarantoroutstanding"); 
                    }else{
                        $sql = "SELECT * FROM `applicant` WHERE `guarantor_fullname_first` = '{$second_guarantor_name}' 
                        or `guarantor_fullname_second` = '{$second_guarantor_name}' or `guarantor_fullname_third` = '{$second_guarantor_name}'
                        or `guarantor_fullname_fourth` = '{$second_guarantor_name}' 
                        and `first_due_date_status` != 'paid' or 
                        `second_due_date_status` != 'paid' or `third_due_date_status` != 'paid' or
                        `fourth_due_date_status` != 'paid' or `fifth_due_date_status` != 'paid' or
                        `sixth_due_date_status` != 'paid'";
                        
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result)>0){
                            header("location: ../src/routes.php?pgname=apply&error=secondguarantoroutstanding"); 
                        }else{
                            $sql = "SELECT * FROM `applicant` WHERE `guarantor_fullname_first` = '{$third_guarantor_name}' 
                            or `guarantor_fullname_second` = '{$third_guarantor_name}' or `guarantor_fullname_third` = '{$third_guarantor_name}'
                            or `guarantor_fullname_fourth` = '{$third_guarantor_name}' 
                            and `first_due_date_status` != 'paid' or 
                            `second_due_date_status` != 'paid' or `third_due_date_status` != 'paid' or
                            `fourth_due_date_status` != 'paid' or `fifth_due_date_status` != 'paid' or
                            `sixth_due_date_status` != 'paid'";
                            
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result)>0){
                                header("location: ../src/routes.php?pgname=apply&error=thirdguarantoroutstanding"); 
                            }else{
                                $sql = "SELECT * FROM `applicant` WHERE `guarantor_fullname_first` = '{$fourth_guarantor_name}' 
                                or `guarantor_fullname_second` = '{$fourth_guarantor_name}' or `guarantor_fullname_third` = '{$fourth_guarantor_name}'
                                or `guarantor_fullname_fourth` = '{$fourth_guarantor_name}' 
                                and `first_due_date_status` != 'paid' or 
                                `second_due_date_status` != 'paid' or `third_due_date_status` != 'paid' or
                                `fourth_due_date_status` != 'paid' or `fifth_due_date_status` != 'paid' or
                                `sixth_due_date_status` != 'paid'";
                                
                                $result = mysqli_query($conn, $sql);
                                if(mysqli_num_rows($result)>0){
                                    header("location: ../src/routes.php?pgname=apply&error=fourthguarantoroutstanding"); 
                                }else{
                                    if($partialname != ""){
                                        $sql = "SELECT * FROM `applicant` WHERE `guarantor_fullname_first` = '{$partialname}' 
                                        or `guarantor_fullname_second` = '{$partialname}' or `guarantor_fullname_third` = '{$partialname}'
                                        or `guarantor_fullname_fourth` = '{$partialname}' 
                                        and `first_due_date_status` != 'paid' or 
                                        `second_due_date_status` != 'paid' or `third_due_date_status` != 'paid' or
                                        `fourth_due_date_status` != 'paid' or `fifth_due_date_status` != 'paid' or
                                        `sixth_due_date_status` != 'paid'";
                                    }
                                    
                                    $result = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($result)>0){
                                        header("location: ../src/routes.php?pgname=apply&error=customerguarantoroutstanding"); 
                                        exit();
                                    }

                                    $sql = "SELECT * FROM `applicant` WHERE `guarantor_fullname_first` = '{$fullname}' 
                                    or `guarantor_fullname_second` = '{$fullname}' or `guarantor_fullname_third` = '{$fullname}'
                                    or `guarantor_fullname_fourth` = '{$fullname}' or `guarantor_fullname_first` = '{$fullnamerev}' 
                                    or `guarantor_fullname_second` = '{$fullnamerev}' or `guarantor_fullname_third` = '{$fullnamerev}'
                                    or `guarantor_fullname_fourth` = '{$fullnamerev}' 
                                    and `first_due_date_status` != 'paid' or 
                                    `second_due_date_status` != 'paid' or `third_due_date_status` != 'paid' or
                                    `fourth_due_date_status` != 'paid' or `fifth_due_date_status` != 'paid' or
                                    `sixth_due_date_status` != 'paid'";

                                    $result = mysqli_query($conn, $sql);
                                    if(mysqli_num_rows($result)>0){
                                        header("location: ../src/routes.php?pgname=apply&error=customerguarantoroutstanding"); 
                                        exit();
                                    }else{
                                        
                                        $loan_interest = $requested_loan * LOAN_INTEREST_PERCENTAGE;
                                        $loan_total = $requested_loan + $loan_interest;
                                        $gauranteed_amount = $loan_total / LOAN_GUARANTEED;
                                        
                                        $sql = 'INSERT INTO `applicant`(`first_name`, `last_name`, `other_names`, `phone_number`, `member_code`, `staff_id`, 
                                        `work_place`, `member_status`, `purpose`, `loan_amount`, `loan_amount_interest`, `apply_date`, `mode_of_payment`,
                                         `guarantor_fullname_first`, `guarantor_phone_first`, `guarantor_staffnum_first`, `guaranteed_amount_first`, 
                                         `guarantor_fullname_second`, `guarantor_phone_second`, `guarantor_staffnum_second`, `guaranteed_amount_second`, 
                                         `guarantor_fullname_third`, `guarantor_phone_third`, `guarantor_staffnum_third`, `guaranteed_amount_third`, 
                                         `guarantor_fullname_fourth`, `guarantor_phone_fourth`, `guarantor_staffnum_fourth`, `guaranteed_amount_fourth`, 
                                         `recipient_name`) VALUES()';
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        

        // var_dump($result);
        // if(mysqli_num_rows($result)>0){
        //     $row = mysqli_fetch_assoc($result);
        // }

    }
    if(isset($_POST["approve"])){
        //CUSTOMER DETAILS
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $othernames = $_POST["othernames"];
        $phone_number = $_POST["phone"];
        $staff_number = $_POST["staff_number"];
        $membership_code = $_POST["memcode"];
        $work_place = $_POST["workplace"];
        $reqested_loan = $_POST["loanreq"];
        $loan_interest = $_POST["loaninterest"];
        $membership_status = $_POST["membership"];
        $mode_of_payment = $_POST["mode"];
        $customer_due_payment = $_POST["customerdue"];
        $purpose_of_loan = $_POST["purpose"];

        //GUARANTOR DETAILS
        $first_guarantor_name = $_POST["first_guarantor_name"];
        $first_guarantor_staff_number = $_POST["first_guarantor_staff_number"];
        $first_guarantor_phone_number = $_POST["first_guarantor_phone_number"];
        $first_guarantor_guaranteed_amount = $_POST["first_guarantor_guaranteed_amount"];
        
        $second_guarantor_name = $_POST["second_guarantor_name"];
        $second_guarantor_staff_number = $_POST["second_guarantor_staff_number"];
        $second_guarantor_phone_number = $_POST["second_guarantor_phone_number"];
        $second_guarantor_guaranteed_amount = $_POST["second_guarantor_guaranteed_amount"];
        
        $third_guarantor_name = $_POST["third_guarantor_name"];
        $third_guarantor_staff_number = $_POST["third_guarantor_staff_number"];
        $third_guarantor_phone_number = $_POST["third_guarantor_phone_number"];
        $third_guarantor_guaranteed_amount = $_POST["third_guarantor_guaranteed_amount"];
        
        $fourth_guarantor_name = $_POST["fourth_guarantor_name"];
        $fourth_guarantor_staff_number = $_POST["fourth_guarantor_staff_number"];
        $fourth_guarantor_phone_number = $_POST["fourth_guarantor_phone_number"];
        $fourth_guarantor_guaranteed_amount = $_POST["fourth_guarantor_guaranteed_amount"];

    }else{
        // header("location: ../src/routes.php?pgname=loans");
    }