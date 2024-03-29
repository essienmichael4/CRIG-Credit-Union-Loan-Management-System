<?php
    if(isset($_GET["applicant_id"])){
    $sql = "";
    include_once("../php/dbs.inc.php");
    $id = $_GET["applicant_id"];
    $sql = "SELECT * FROM `applicant` WHERE `id` = {$id}";
    $result = mysqli_query($conn, $sql);
    $applicant = mysqli_fetch_assoc($result);
    ?>
            <div class="toast_container">
                <div class="toast">
                    <p class="error"></p>
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="wrapper">
                <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "emptyInput"){
                            echo "<p class='err'>Please, fill out all the required inputs.</p>";
                        }else if($_GET["error"] == "memberstatusinput"){
                            echo "<p class='err'>Please, the loan applicant is a member but the member code seems to be empty.</p>";
                        }else if($_GET["error"] == "userhasoutstandingloan"){
                            echo "<p class='err'>Please, the loan applicant seems to have some unpaid loans.</p>";
                        }else if($_GET["error"] == "firstguarantoroutstanding"){
                            echo "<p class='err'>Please, the first guarantor does not have sufficeint funds to guarant the loan.</p>";
                        }else if($_GET["error"] == "secondguarantoroutstanding"){
                            echo "<p class='err'>Please, the second guarantor does not have sufficeint funds to guarant the loan.</p>";
                        }else if($_GET["error"] == "thirdguarantoroutstanding"){
                            echo "<p class='err'>Please, the third guarantor does not have sufficeint funds to guarant the loan.</p>";
                        }else if($_GET["error"] == "fourthguarantoroutstanding"){
                            echo "<p class='err'>Please, the fourth guarantor does not have sufficeint funds to guarant the loan.</p>";
                        }else if($_GET["error"] == "sqlerror"){
                            echo "<p class='err'>Please, check if the database is online.</p>";
                        }else if($_GET["error"] == "picexterror"){
                            echo "<p class='err'>Please, the image extension is of the wrong format. Use (PNG, JPG or JPEG)</p>";
                        }else if($_GET["error"] == "picerror"){
                            echo "<p class='err'>Please, there was an error with the image. Try again.</p>";
                        }else if($_GET["error"] == "fileTooBig"){
                            echo "<p class='err'>Please, the image size is too big.</p>";
                        }else if($_GET["error"] == "fileTooBig"){
                            echo "<p class='err'>Please, the image size is too big.</p>";
                        }
                    }
                ?>
                <section class="apply">
                    <h3 class="title">Applicant Detials</h3>
                    <form class="form apply__form" action="../php/loans/applyloan.inc.php" method="POST">
                        <div class="form__group">
                            <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                            <div class="formControl flex-c">
                                <label for="">Member Code CQC.</label>
                                <input type="text" name="memcode" placeholder="Member Code CQC" value="<?=$applicant["member_code"]?>">
                            </div>
                            <datalist id="accounts">
                            </datalist>
                            <div class="formControl flex-c">
                                <label for="">Applicant name</label>
                                <input type="text" list="accounts"  class="applicant_name first_name" name="applicant_name" value="<?=$applicant["applicant_name"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Sponsor name</label>
                                <input type="text" class="" name="sponsor" placeholder="Sponsor Name" value="<?=$applicant["sponsor"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Phone Number</label>
                                <div>
                                    <span>+233</span><input type="text" name="phone" placeholder="eg. 201234567" value="<?=$applicant["phone_number"]?>">
                                </div>
                            </div>
                            
                            <div class="formControl flex-c">
                                <label for="">Work Place</label>
                                <input type="text" placeholder="Work Place" name="workplace" value="<?=$applicant["work_place"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Staff No.</label>
                                <input type="text" placeholder="Staff No." name="staff_number" value="<?=$applicant["staff_id"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Status</label>

                                <?php
                                if($applicant["member_status"] == "member"){
                                ?>
                                <div class="flex">
                                    <div class="flex">
                                        <input type="radio" name="membership" checked> <p>Member</p>
                                    </div>
    
                                    <div class="flex">
                                        <input type="radio" name="membership" value="non-member"> <p>Non-Member</p>
                                    </div>
    
                                    <div class="flex">
                                        <input type="radio" name="membership" value="casual"> <p>Casual</p>
                                    </div>
                                </div>
                                <?php
                                }else if($applicant["member_status"] == "non-member"){
                                ?>
                                <div class="flex">
                                    <div class="flex">
                                        <input type="radio" name="membership" value="member"> <p>Member</p>
                                    </div>
    
                                    <div class="flex">
                                        <input type="radio" name="membership" checked> <p>Non-Member</p>
                                    </div>
    
                                    <div class="flex">
                                        <input type="radio" name="membership" value="casual"> <p>Casual</p>
                                    </div>
                                </div>
                                <?php
                                }else{
                                ?>
                                <div class="flex">
                                    <div class="flex">
                                        <input type="radio" name="membership" value="member"> <p>Member</p>
                                    </div>
    
                                    <div class="flex">
                                        <input type="radio" name="membership" value="non-member"> <p>Non-Member</p>
                                    </div>
    
                                    <div class="flex">
                                        <input type="radio" name="membership" checked> <p>Casual</p>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                                
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Loan Amount</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" class="loan" required placeholder="Amount" name="loanreq" value="<?=$applicant["loan_amount"]?>">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Loan Interest (*20%)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" class="interest" required name="loaninterest" value="<?=$applicant["loan_interest"]?>">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Expected Amount</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" name="totalloan" class="total" required value="<?=$applicant["loan_to_be_payed"]?>">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Mode of Payment</label>
                                <div class="flex">
                                    <div class="flex">
                                        <input type="radio" name="mode" value="cash"> <p>By Cash</p>
                                    </div>
    
                                    <div class="flex">
                                        <input type="radio" name="mode" value="source"> <p>At Source</p>
                                    </div>
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">First Due Date</label>
                                <input type="date" name="customerdue" required value="<?=$applicant["applicant_first_due_date"]?>">
                            </div>

                            <div class="formControl flex-c">
                                <label for="">Applicant Pic</label>
                                <input type="file" required name="pic">
                            </div>

                            <div class="formControl flex-c">
                                <label for="">Purpose for the loan</label>
                                <textarea name="purpose" id="" cols="30" rows="10" required><?=$applicant["purpose"]?></textarea>
                            </div>
                        </div>

                        <h3 class="title my2">Guarantor Detials</h3>
                        <div class="form__group">
                            <div class="formControl flex-c bgb">
                                <label for="">Guarantor's Staff No. (1st)</label>
                                <div>
                                    <input type="text" required class="gaurantoroneid" name="first_guarantor_staff_number" placeholder="Mem. Code/Staff No." value="<?=$applicant["guarantor_staffnum_first"]?>">
                                    <span class="gaurantoronesearch"><i class="fas fa-search "></i></span>
                                </div>
                            </div>
                            <div class="formControl flex-c bgb">
                                <label for="">Guarantor's name (1st)</label>
                                <div>
                                    <input type="text" required list="savingsaccountfirst"  class="gaurantoronename" name="first_guarantor_name" placeholder="Guarantor's name" value="<?=$applicant["guarantor_fullname_first"]?>">
                                    <span class="gaurantoronenamesearch"><i class="fas fa-search "></i></span>
                                </div>
                            </div>

                            <datalist id="savingsaccountfirst">
                            </datalist>
                            <datalist id="savingsaccountsecond">
                            </datalist>
                            <datalist id="savingsaccountthird">
                            </datalist>
                            <datalist id="savingsaccountfourth">
                            </datalist>
                            
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Phone (1st)</label>
                                    <input type="text" required  class="gaurantoronephone" name="first_guarantor_phone_number" placeholder="eg. 201234567"  value="<?=$applicant["guarantor_phone_first"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guaranteed Amount (1st)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="text" required name="first_guarantor_guaranteed_amount" class="guaranteed1" placeholder="Amount" value="<?=$applicant["guaranteed_amount_first"]?>">
                                </div>
                            </div>
                            <div class="formControl flex-c bgb">
                                <label for="">Guarantor's Staff No. (2nd)</label>
                                <div>
                                    <input type="text"  required class="gaurantortwoid" name="second_guarantor_staff_number" placeholder="Mem. Code/Staff No." value="<?=$applicant["guarantor_staffnum_second"]?>">
                                    <span class="gaurantortwosearch"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                            <div class="formControl flex-c bgb">
                                <label for="">Guarantor's name (2nd)</label>
                                <div>
                                    <input type="text" value="<?=$applicant["guarantor_fullname_second"]?>" list="savingsaccountsecond"  required class="gaurantortwoname" name="second_guarantor_name" placeholder="Guarantor's name">
                                    <span class="gaurantortwonamesearch"><i class="fas fa-search "></i></span>
                                </div>
                            </div>
                            
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Phone (2nd)</label>
                                    <input type="text" value="<?=$applicant["guarantor_phone_second"]?>"  required class="gaurantortwophone" name="second_guarantor_phone_number" placeholder="eg. 201234567">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guaranteed Amount (2nd)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="text" value="<?=$applicant["guaranteed_amount_second"]?>"  required name="second_guarantor_guaranteed_amount" class="guaranteed2" placeholder="Amount">
                                </div>
                            </div>
                            <div class="formControl flex-c bgb">
                                <label for="">Guarantor's Staff No. (3rd)</label>
                                <div>
                                    <input type="text" value="<?=$applicant["guarantor_staffnum_third"]?>" required class="gaurantorthreeid" name="third_guarantor_staff_number" placeholder="Mem. Code/Staff No.">
                                    <span class="gaurantorthreesearch"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                            <div class="formControl flex-c bgb">
                                <label for="">Guarantor's name (3rd)</label>
                                <div>
                                    <input type="text" value="<?=$applicant["guarantor_fullname_third"]?>" list="savingsaccountthird" required class="gaurantorthreename" name="third_guarantor_name" placeholder="Guarantor's name">
                                    <span class="gaurantorthreenamesearch"><i class="fas fa-search "></i></span>
                                </div>
                            </div>
                            
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Phone (3rd)</label>
                                    <input type="text" value="<?=$applicant["guarantor_phone_third"]?>" required class="gaurantorthreephone" name="third_guarantor_phone_number" placeholder="eg. 201234567">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guaranteed Amount (3rd)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="text" value="<?=$applicant["guaranteed_amount_third"]?>" required name="third_guarantor_guaranteed_amount" class="guaranteed3" placeholder="Amount">
                                </div>
                            </div>
                            <div class="formControl flex-c bgb">
                                <label for="">Guarantor's Staff No. (4th)</label>
                                <div>
                                    <input type="text" value="<?=$applicant["guarantor_staffnum_fourth"]?>" required class="gaurantorfourid" name="fourth_guarantor_staff_number" placeholder="Mem. Code/Staff No.">
                                    <span class="gaurantorfoursearch"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                            <div class="formControl flex-c bgb">
                                <label for="">Guarantor's name (4th)</label>
                                <div>
                                    <input type="text" value="<?=$applicant["guarantor_fullname_fourth"]?>" list="savingsaccountfourth" required class="gaurantorfourname" name="fourth_guarantor_name" placeholder="Guarantor's name">
                                    <span class="gaurantorfournamesearch"><i class="fas fa-search "></i></span>
                                </div>
                            </div>
                            
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Phone (4th)</label>
                                    <input type="text" value="<?=$applicant["guarantor_phone_fourth"]?>" required class="gaurantorfourphone" name="fourth_guarantor_phone_number" placeholder="eg. 201234567">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guaranteed Amount (4th)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="text" value="<?=$applicant["guaranteed_amount_fourth"]?>" required name="fourth_guarantor_guaranteed_amount" class="guaranteed4" placeholder="Amount">
                                </div>
                            </div>
                        </div>
                        <?php
                            if($_SESSION["role"]=="admin" || $_SESSION["role"]=="super"){
                            ?>
                        <h3 class="title my2">Loan Repayment Schedule</h3>
                        <div class="form__group">
                            <div class="formControl flex-c">
                                <label for="">First Due Date</label>
                                <input type="date" required name="first_due_approved" class="currentStartDay">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">second Due Date</label>
                                <input type="date" required name="second_due_approved" class="secondduemonth">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">third Due Date</label>
                                <input type="date" required name="third_due_approved" class="thirdduemonth">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Fourth Due Date</label>
                                <input type="date" required name="fourth_due_approved" class="fourthduemonth">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Fifth Due Date</label>
                                <input type="date" name="fifth_due_approved">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">sixth Due Date</label>
                                <input type="date" name="sixth_due_approved">
                            </div>
                        </div>
                        <?php
                            }
                        ?>

                        <div class="action__btn flex">
                            <?php
                            if($_SESSION["role"]=="user"){
                            ?>
                                <!-- <p><?=$_SESSION["usertype"]?></p> -->
                                <button name="apply">Apply</button>
                            <?php
                            }else{
                                if(isset($_GET["applicant_id"])){
                                ?>
                                    <input type="text" name="applicant_id" value="<?=$_GET["applicant_id"]?>" hidden>
                                    <button name="disapprove" class="disable">disapprove</button>
                                    <button name="approve">Approve</button>

                                <?php
                                }else{
                            ?>
                                <button name="approveapply">Apply & Approve</button>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>  

    <?php
    }else{
        ?>
            <div class="toast_container">
                <div class="toast">
                    <p class="error"></p>
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="wrapper">
                <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "emptyInput"){
                            echo "<p class='err'>Please, fill out all the required inputs.</p>";
                        }else if($_GET["error"] == "memberstatusinput"){
                            echo "<p class='err'>Please, the loan applicant is a member but the member code seems to be empty.</p>";
                        }else if($_GET["error"] == "userhasoutstandingloan"){
                            echo "<p class='err'>Please, the loan applicant seems to have some unpaid loans.</p>";
                        }else if($_GET["error"] == "firstguarantoroutstanding"){
                            echo "<p class='err'>Please, the first guarantor does not have sufficeint funds to guarant the loan.</p>";
                        }else if($_GET["error"] == "secondguarantoroutstanding"){
                            echo "<p class='err'>Please, the second guarantor does not have sufficeint funds to guarant the loan.</p>";
                        }else if($_GET["error"] == "thirdguarantoroutstanding"){
                            echo "<p class='err'>Please, the third guarantor does not have sufficeint funds to guarant the loan.</p>";
                        }else if($_GET["error"] == "fourthguarantoroutstanding"){
                            echo "<p class='err'>Please, the fourth guarantor does not have sufficeint funds to guarant the loan.</p>";
                        }else if($_GET["error"] == "sqlerror"){
                            echo "<p class='err'>Please, check if the database is online.</p>";
                        }else if($_GET["error"] == "picexterror"){
                            echo "<p class='err'>Please, the image extension is of the wrong format. Use (PNG, JPG or JPEG)</p>";
                        }else if($_GET["error"] == "picerror"){
                            echo "<p class='err'>Please, there was an error with the image. Try again.</p>";
                        }else if($_GET["error"] == "fileTooBig"){
                            echo "<p class='err'>Please, the image size is too big.</p>";
                        }else if($_GET["error"] == "fileTooBig"){
                            echo "<p class='err'>Please, the image size is too big.</p>";
                        }
                    }
                ?>
                <section class="apply">
                <h3>LOAN APPLICATION</h3>
                    <h3 class="title">Applicant Detials</h3>
                    <form class="form apply__form" action="../php/loans/applyloan.inc.php" method="POST">
                        <div class="form__group">
                            <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                            <div class="formControl flex-c bgb">
                                <label for="">Member Code CQC.</label>
                                <div>
                                    <input type="text" class="applicant-search" name="memcode" placeholder="Member Code CQC">
                                    <span class="search-applicant"><i class="fas fa-search "></i></span>
                                </div>
                            </div>

                            <datalist id="accounts">
                            </datalist>
                            
                            <div class="formControl flex-c bgb">
                                <label for="">Applicant name</label>
                                <div>
                                    <input type="text" list="accounts" required class="applicant_name first_name" name="applicant_name" placeholder="Applicant Name">
                                    <span class="applicant_name_search"><i class="fas fa-search "></i></span>
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Sponsor name</label>
                                <input type="text" class="" name="sponsor" placeholder="Sponsor Name">
                            </div>
                            
                            <div class="formControl flex-c">
                                <label for="">Phone Number</label>
                                <input type="text" required name="phone" class="phone" placeholder="eg. 201234567">
                            </div>
                            
                            <div class="formControl flex-c">
                                <label for="">Work Place</label>
                                <input type="text" required placeholder="Work Place" class="work" name="workplace">
                            </div>
                            
                            <div class="formControl flex-c">
                                <label for="">Staff No.</label>
                                <input type="text" placeholder="Staff No." class="staff" name="staff_number">
                            </div>

                            <div class="formControl flex-c">
                                <label for="">Status</label>
                                <div class="flex">
                                    <div class="flex">
                                        <input type="radio" name="membership" value="member"> <p>Member</p>
                                    </div>
    
                                    <div class="flex">
                                        <input type="radio" name="membership" value="non-member"> <p>Non-Member</p>
                                    </div>
    
                                    <div class="flex">
                                        <input type="radio" name="membership" value="casual"> <p>Casual</p>
                                    </div>
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Loan Amount</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" required class="loan" placeholder="Amount" name="loanreq">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Loan Interest (*20%)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" required class="interest" value="0" name="loaninterest">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Expected Amount</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" required name="totalloan" class="total" value="0">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Mode of Payment</label>
                                <div class="flex">
                                    <div class="flex">
                                        <input type="radio" name="mode" value="cash"> <p>By Cash</p>
                                    </div>
    
                                    <div class="flex">
                                        <input type="radio" name="mode" value="source"> <p>At Source</p>
                                    </div>
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">First Due Date</label>
                                <input type="date" required name="customerdue">
                            </div>

                            <div class="formControl flex-c">
                                <label for="">Applicant Pic</label>
                                <input type="file" name="pic">
                            </div>

                            <div class="formControl flex-c">
                                <label for="">Purpose for the loan</label>
                                <textarea name="purpose" required id="" cols="30" rows="10"></textarea>
                            </div>

                        </div>

                        <h3 class="title my2">Guarantor Detials</h3>
                        <div class="form__group">
                            <div class="formControl flex-c bgb">
                                <label for="">Guarantor's Staff No. (1st)</label>
                                <div>
                                    <input type="text" required class="gaurantoroneid" name="first_guarantor_staff_number" placeholder="Mem. Code/Staff No.">
                                    <span class="gaurantoronesearch"><i class="fas fa-search "></i></span>
                                </div>
                            </div>
                            <div class="formControl flex-c bgb">
                                <label for="">Guarantor's name (1st)</label>
                                <div>
                                    <input type="text" required list="savingsaccountfirst"  class="gaurantoronename" name="first_guarantor_name" placeholder="Guarantor's name">
                                    <span class="gaurantoronenamesearch"><i class="fas fa-search "></i></span>
                                </div>
                            </div>

                            <datalist id="savingsaccountfirst">
                            </datalist>
                            <datalist id="savingsaccountsecond">
                            </datalist>
                            <datalist id="savingsaccountthird">
                            </datalist>
                            <datalist id="savingsaccountfourth">
                            </datalist>
                            
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Phone (1st)</label>
                                    <input type="text" required  class="gaurantoronephone" name="first_guarantor_phone_number" placeholder="eg. 201234567">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guaranteed Amount (1st)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" required name="first_guarantor_guaranteed_amount" class="guaranteed1" placeholder="Amount">
                                </div>
                            </div>
                            <div class="formControl flex-c bgb">
                                <label for="">Guarantor's Staff No. (2nd)</label>
                                <div>
                                    <input type="text"  required class="gaurantortwoid" name="second_guarantor_staff_number" placeholder="Mem. Code/Staff No.">
                                    <span class="gaurantortwosearch"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                            <div class="formControl flex-c bgb">
                                <label for="">Guarantor's name (2nd)</label>
                                <div>
                                    <input type="text" list="savingsaccountsecond"  required class="gaurantortwoname" name="second_guarantor_name" placeholder="Guarantor's name">
                                    <span class="gaurantortwonamesearch"><i class="fas fa-search "></i></span>
                                </div>
                            </div>
                            
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Phone (2nd)</label>
                                    <input type="text"  required class="gaurantortwophone" name="second_guarantor_phone_number" placeholder="eg. 201234567">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guaranteed Amount (2nd)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" required name="second_guarantor_guaranteed_amount" class="guaranteed2" placeholder="Amount">
                                </div>
                            </div>
                            <div class="formControl flex-c bgb">
                                <label for="">Guarantor's Staff No. (3rd)</label>
                                <div>
                                    <input type="text"  required class="gaurantorthreeid" name="third_guarantor_staff_number" placeholder="Mem. Code/Staff No.">
                                    <span class="gaurantorthreesearch"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                            <div class="formControl flex-c bgb">
                                <label for="">Guarantor's name (3rd)</label>
                                <div>
                                    <input type="text" list="savingsaccountthird" required class="gaurantorthreename" name="third_guarantor_name" placeholder="Guarantor's name">
                                    <span class="gaurantorthreenamesearch"><i class="fas fa-search "></i></span>
                                </div>
                            </div>
                            
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Phone (3rd)</label>
                                    <input type="text" required class="gaurantorthreephone" name="third_guarantor_phone_number" placeholder="eg. 201234567">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guaranteed Amount (3rd)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" required name="third_guarantor_guaranteed_amount" class="guaranteed3" placeholder="Amount">
                                </div>
                            </div>
                            <div class="formControl flex-c bgb">
                                <label for="">Guarantor's Staff No. (4th)</label>
                                <div>
                                    <input type="text" required class="gaurantorfourid" name="fourth_guarantor_staff_number" placeholder="Mem. Code/Staff No.">
                                    <span class="gaurantorfoursearch"><i class="fas fa-search"></i></span>
                                </div>
                            </div>
                            <div class="formControl flex-c bgb">
                                <label for="">Guarantor's name (4th)</label>
                                <div>
                                    <input type="text" list="savingsaccountfourth" required class="gaurantorfourname" name="fourth_guarantor_name" placeholder="Guarantor's name">
                                    <span class="gaurantorfournamesearch"><i class="fas fa-search "></i></span>
                                </div>
                            </div>
                            
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Phone (4th)</label>
                                    <input type="text" required class="gaurantorfourphone" name="fourth_guarantor_phone_number" placeholder="eg. 201234567">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guaranteed Amount (4th)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" required name="fourth_guarantor_guaranteed_amount" class="guaranteed4" placeholder="Amount">
                                </div>
                            </div>
                        </div>
                        <?php
                            if($_SESSION["role"]=="admin" || $_SESSION["role"]=="super"){
                            ?>
                        <h3 class="title my2">Loan Repayment Schedule</h3>
                        <div class="form__group">
                            <div class="formControl flex-c">
                                <label for="">First Due Date</label>
                                <input type="date" required name="first_due_approved" class="currentStartDay">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">second Due Date</label>
                                <input type="date" required name="second_due_approved" class="secondduemonth">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">third Due Date</label>
                                <input type="date" required name="third_due_approved" class="thirdduemonth">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Fourth Due Date</label>
                                <input type="date" required name="fourth_due_approved" class="fourthduemonth">
                            </div>
                            <div>
                                <a class="btn extension">Extension</a>
                            </div>
                            <div class="formControl flex-c hidefirst hiddenone">
                                <label for="">Fifth Due Date</label>
                                <input type="date" name="fifth_due_approved">
                            </div>
                            <div class="formControl flex-c hidesec hiddentwo">
                                <label for="">sixth Due Date</label>
                                <input type="date" name="sixth_due_approved">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Approval Date</label>
                                <input type="date" required name="approval_day">
                            </div>
                        </div>
                        <?php
                            }
                        ?>

                        <div class="apply_savings">
                            <div class="personal_info bg">
                                <?php
                                if($_SESSION["role"]=="user"){
                                ?>
                                    <!-- <p><?=$_SESSION["usertype"]?></p> -->
                                    <button name="apply">Apply</button>
                                <?php
                                }else{
                                    if(isset($_GET["applicant_id"])){
                                    ?>
                                        <input type="text" name="applicant_id" value="<?=$_GET["applicant_id"]?>" hidden>
                                        <button name="disapprove" class="disable">disapprove</button>
                                        <button name="approve">Approve</button>
                                    <?php
                                    }else{
                                ?>
                                    <button name="approveapply">Apply & Approve</button>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>  
    <?php
    }
?>
<script src="../js/interest.js"></script>
<script src="../js/calcdays.js"></script>
<script src="../js/loans/getapplicant.js"></script>
<script src="../js/searchmemberandgaurator.js"></script>
<script>
    let toast = document.querySelector(".toast_container");
    
    setInterval(()=>{
        setTimeout(()=>{
            toast.classList.remove("active");
        }, 5000)
        
    },9000)
</script>