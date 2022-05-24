<?php
    if(isset($_GET["applicant_id"])){
    $sql = "";
    include_once("../php/dbs.inc.php");
    $id = $_GET["applicant_id"];
    $sql = "SELECT * FROM `applicant` WHERE `id` = {$id}";
    $result = mysqli_query($conn, $sql);
    $applicant = mysqli_fetch_assoc($result);
    ?>

        <div class="main">
            <header class="main__header flex px1">
                <h2 class="">Loan Application</h2>
                <form class="search" action="../php/search.php" method="POST">
                    <input type="text" class="search__input" name="inputsearch" placeholder="Search">
                    <button name="search" class="search__btn">Search</button>
                </form>
                <div class="user flex">
                    <span class="flex">C</span>
                    <p><?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?></p>
                    <i class="fas fa-angle-down"></i>
                </div>
                
                <div class="userdetails">
                    <p><?=$_SESSION["username"]?></p>
                    <a href=">">edit user</a>
                    <form action="../php/logout.inc.php"><button type="submit">logout</button></form>
                </div>
            </header>
            <div class="wrapper">
                <section class="apply">
                    <h3 class="title">Applicant Detials</h3>
                    <form class="form apply__form" action="../php/applyloan.inc.php" method="POST">
                        <div class="form__group">
                            <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                            <div class="formControl flex-c">
                                <label for="">First name</label>
                                <input type="text" name="firstname" placeholder="First Name" value="<?=$applicant["first_name"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Last name</label>
                                <input type="text" name="lastname" placeholder="Last Name" value="<?=$applicant["last_name"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Other names</label>
                                <input type="text" name="othernames" placeholder="Other Name" value="<?=$applicant["other_names"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Phone Number</label>
                                <div>
                                    <span>+233</span><input type="text" name="phone" placeholder="eg. 201234567" value="<?=$applicant["phone_number"]?>">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Member Code CQC.</label>
                                <input type="text" name="memcode" placeholder="Member Code CQC" value="<?=$applicant["member_code"]?>">
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
                                        <input type="radio" name="membership" value="<?=$applicant["member_status"]?>"> <p>Member</p>
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
                                        <input type="radio" name="membership" value="<?=$applicant["member_status"]?>"> <p>Non-Member</p>
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
                                        <input type="radio" name="membership" value="<?=$applicant["member_status"]?>"> <p>Casual</p>
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
                                    <input type="number" class="loan" placeholder="Amount" name="loanreq" value="<?=$applicant["loan_amount"]?>">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Loan Interest (*20%)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" class="interest" name="loaninterest" value="<?=$applicant["loan_interest"]?>">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Expected Amount</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" name="totalloan" class="total" value="<?=$applicant["loan_to_be_payed"]?>">
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
                                <input type="date" name="customerdue" value="<?=$applicant["applicant_first_due_date"]?>">
                            </div>


                            <div class="formControl flex-c">
                                <label for="">Purpose for the loan</label>
                                <textarea name="purpose" id="" cols="30" rows="10" value="<?=$applicant["purpose"]?>"></textarea>
                            </div>
                        </div>

                        <h3 class="title my2">Guarantor Detials</h3>
                        <div class="form__group">
                            <div class="formControl flex-c">
                                <label for="">Guarantor's name (1st)</label>
                                <input type="text" name="first_guarantor_name" placeholder="Guarantor's name" value="<?=$applicant["guarantor_fullname_first"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Staff No. (1st)</label>
                                <input type="text" name="first_guarantor_staff_number" placeholder="Staff No." value="<?=$applicant["guarantor_staffnum_first"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Phone (1st)</label>
                                <div>
                                    <span>+233</span><input type="text" name="first_guarantor_phone_number" placeholder="eg. 201234567" value="<?=$applicant["guarantor_phone_first"]?>">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guaranteed Amount (1st)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" name="first_guarantor_guaranteed_amount" class="guaranteed1" placeholder="Amount" value="<?=$applicant["guaranteed_amount_first"]?>">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's name (2nd)</label>
                                <input type="text" name="second_guarantor_name" placeholder="Guarantor's name" value="<?=$applicant["guarantor_fullname_second"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Staff No. (2nd)</label>
                                <input type="text" name="second_guarantor_staff_number" placeholder="Staff No." value="<?=$applicant["guarantor_staffnum_second"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Phone (2nd)</label>
                                <div>
                                    <span>+233</span>
                                    <input type="text" name="second_guarantor_phone_number" placeholder="eg. 201234567" value="<?=$applicant["guarantor_phone_second"]?>">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guaranteed Amount (2nd)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" name="second_guarantor_guaranteed_amount" class="guaranteed2" placeholder="Amount" value="<?=$applicant["guaranteed_amount_second"]?>">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's name (3rd)</label>
                                <input type="text" name="third_guarantor_name" placeholder="Guarantor's name" value="<?=$applicant["guarantor_fullname_third"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Staff No. (3rd)</label>
                                <input type="text" name="third_guarantor_staff_number" placeholder="Staff No." value="<?=$applicant["guarantor_staffnum_third"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Phone (3rd)</label>
                                <div>
                                    <span>+233</span>
                                    <input type="text" name="third_guarantor_phone_number" placeholder="eg. 201234567" value="<?=$applicant["guarantor_phone_third"]?>">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guaranteed Amount (3rd)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" name="third_guarantor_guaranteed_amount" class="guaranteed3" placeholder="Amount" value="<?=$applicant["guaranteed_amount_third"]?>">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's name (4th)</label>
                                <input type="text" name="fourth_guarantor_name" placeholder="Guarantor's name" value="<?=$applicant["guarantor_fullname_fourth"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Staff No. (4th)</label>
                                <input type="text" name="fourth_guarantor_staff_number" placeholder="Staff No." value="<?=$applicant["guarantor_staffnum_fourth"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Phone (4th)</label>
                                <div>
                                    <span>+233</span>
                                    <input type="text" name="fourth_guarantor_phone_number" placeholder="eg. 201234567" value="<?=$applicant["guarantor_phone_fourth"]?>">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guaranteed Amount (4th)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" name="fourth_guarantor_guaranteed_amount" class="guaranteed4" placeholder="Amount" value="<?=$applicant["guaranteed_amount_fourth"]?>">
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
                                <input type="date" name="first_due_approved">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">second Due Date</label>
                                <input type="date" name="second_due_approved">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">third Due Date</label>
                                <input type="date" name="third_due_approved">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Fourth Due Date</label>
                                <input type="date" name="fourth_due_approved">
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
                                <!-- <button name="approve">Apply & Approve</button> -->
                                <?php
                                }else{
                            ?>
                            
                                <!-- <button name="disapprove" class="disable">disapprove</button> -->
                                <!-- <button name="approve">Approve</button> -->
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
        <div class="main">
            <header class="main__header flex px1">
                <h2 class="">Loan Application</h2>
                <form class="search" action="../php/search.php" method="POST">
                    <input type="text" class="search__input" name="inputsearch" placeholder="Search">
                    <button name="search" class="search__btn">Search</button>
                </form>
                <div class="user flex">
                    <span class="flex">C</span>
                    <p><?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?></p>
                    <i class="fas fa-angle-down"></i>
                </div>
                
                <div class="userdetails">
                    <p><?=$_SESSION["username"]?></p>
                    <a href=">">edit user</a>
                    <form action="../php/logout.inc.php"><button type="submit">logout</button></form>
                </div>
            </header>
            <div class="wrapper">
                <section class="apply">
                    <h3 class="title">Applicant Detials</h3>
                    <form class="form apply__form" action="../php/applyloan.inc.php" method="POST">
                        <div class="form__group">
                            <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                            <div class="formControl flex-c">
                                <label for="">First name</label>
                                <input type="text" name="firstname" placeholder="First Name">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Last name</label>
                                <input type="text" name="lastname" placeholder="Last Name">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Other names</label>
                                <input type="text" name="othernames" placeholder="Other Name">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Phone Number</label>
                                <div>
                                    <span>+233</span><input type="text" name="phone" placeholder="eg. 201234567">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Member Code CQC.</label>
                                <input type="text" name="memcode" placeholder="Member Code CQC">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Work Place</label>
                                <input type="text" placeholder="Work Place" name="workplace">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Staff No.</label>
                                <input type="text" placeholder="Staff No." name="staff_number">
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
                                    <input type="number" class="loan" placeholder="Amount" name="loanreq">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Loan Interest (*20%)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" class="interest" value="0" name="loaninterest">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Expected Amount</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" name="totalloan" class="total" value="0">
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
                                <input type="date" name="customerdue">
                            </div>


                            <div class="formControl flex-c">
                                <label for="">Purpose for the loan</label>
                                <textarea name="purpose" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <h3 class="title my2">Guarantor Detials</h3>
                        <div class="form__group">
                            <div class="formControl flex-c">
                                <label for="">Guarantor's name (1st)</label>
                                <input type="text" name="first_guarantor_name" placeholder="Guarantor's name">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Staff No. (1st)</label>
                                <input type="text" name="first_guarantor_staff_number" placeholder="Staff No.">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Phone (1st)</label>
                                <div>
                                    <span>+233</span><input type="text" name="first_guarantor_phone_number" placeholder="eg. 201234567">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guaranteed Amount (1st)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" name="first_guarantor_guaranteed_amount" class="guaranteed1" placeholder="Amount">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's name (2nd)</label>
                                <input type="text" name="second_guarantor_name" placeholder="Guarantor's name">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Staff No. (2nd)</label>
                                <input type="text" name="second_guarantor_staff_number" placeholder="Staff No.">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Phone (2nd)</label>
                                <div>
                                    <span>+233</span>
                                    <input type="text" name="second_guarantor_phone_number" placeholder="eg. 201234567">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guaranteed Amount (2nd)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" name="second_guarantor_guaranteed_amount" class="guaranteed2" placeholder="Amount">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's name (3rd)</label>
                                <input type="text" name="third_guarantor_name" placeholder="Guarantor's name">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Staff No. (3rd)</label>
                                <input type="text" name="third_guarantor_staff_number" placeholder="Staff No.">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Phone (3rd)</label>
                                <div>
                                    <span>+233</span>
                                    <input type="text" name="third_guarantor_phone_number" placeholder="eg. 201234567">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guaranteed Amount (3rd)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" name="third_guarantor_guaranteed_amount" class="guaranteed3" placeholder="Amount">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's name (4th)</label>
                                <input type="text" name="fourth_guarantor_name" placeholder="Guarantor's name">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Staff No. (4th)</label>
                                <input type="text" name="fourth_guarantor_staff_number" placeholder="Staff No.">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Phone (4th)</label>
                                <div>
                                    <span>+233</span>
                                    <input type="text" name="fourth_guarantor_phone_number" placeholder="eg. 201234567">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guaranteed Amount (4th)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" name="fourth_guarantor_guaranteed_amount" class="guaranteed4" placeholder="Amount">
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
                                <input type="date" name="first_due_approved">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">second Due Date</label>
                                <input type="date" name="second_due_approved">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">third Due Date</label>
                                <input type="date" name="third_due_approved">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Fourth Due Date</label>
                                <input type="date" name="fourth_due_approved">
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
                                <!-- <button name="approve">Apply & Approve</button> -->
                                <?php
                                }else{
                            ?>
                            
                                <!-- <button name="disapprove" class="disable">disapprove</button> -->
                                <!-- <button name="approve">Approve</button> -->
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
    }
?>

    <!-- <div class="main">
            <header class="main__header flex px1">
                <h2 class="">Loan Application</h2>
                <form class="search" action="">
                    <input type="text" class="search__input" placeholder="Search">
                    <button class="search__btn">Search</button>
                </form>
                <div class="user flex">
                    <span class="flex">C</span>
                    <p><?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?></p>
                    <i class="fas fa-angle-down"></i>
                </div>
                
                <div class="userdetails">
                    <p><?=$_SESSION["username"]?></p>
                    <a href=">">edit user</a>
                    <form action="../php/logout.inc.php"><button type="submit">logout</button></form>
                </div>
            </header>
            <div class="wrapper">
                <section class="apply">
                    <h3 class="title">Applicant Detials</h3>
                    <form class="form apply__form" action="../php/applyloan.inc.php" method="POST">
                        <div class="form__group">
                            <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                            <div class="formControl flex-c">
                                <label for="">First name</label>
                                <input type="text" name="firstname" placeholder="First Name">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Last name</label>
                                <input type="text" name="lastname" placeholder="Last Name">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Other names</label>
                                <input type="text" name="othernames" placeholder="Other Name">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Phone Number</label>
                                <div>
                                    <span>+233</span><input type="text" name="phone" placeholder="eg. 201234567">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Member Code CQC.</label>
                                <input type="text" name="memcode" placeholder="Member Code CQC">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Work Place</label>
                                <input type="text" placeholder="Work Place" name="workplace">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Staff No.</label>
                                <input type="text" placeholder="Staff No." name="staff_number">
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
                                    <input type="number" class="loan" placeholder="Amount" name="loanreq">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Loan Interest (*20%)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" class="interest" value="0" name="loaninterest">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Expected Amount</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" name="totalloan" class="total" value="0">
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
                                <input type="date" name="customerdue">
                            </div>


                            <div class="formControl flex-c">
                                <label for="">Purpose for the loan</label>
                                <textarea name="purpose" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <h3 class="title my2">Guarantor Detials</h3>
                        <div class="form__group">
                            <div class="formControl flex-c">
                                <label for="">Guarantor's name (1st)</label>
                                <input type="text" name="first_guarantor_name" placeholder="Guarantor's name">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Staff No. (1st)</label>
                                <input type="text" name="first_guarantor_staff_number" placeholder="Staff No.">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Phone (1st)</label>
                                <div>
                                    <span>+233</span><input type="text" name="first_guarantor_phone_number" placeholder="eg. 201234567">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guaranteed Amount (1st)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" name="first_guarantor_guaranteed_amount" class="guaranteed1" placeholder="Amount">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's name (2nd)</label>
                                <input type="text" name="second_guarantor_name" placeholder="Guarantor's name">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Staff No. (2nd)</label>
                                <input type="text" name="second_guarantor_staff_number" placeholder="Staff No.">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Phone (2nd)</label>
                                <div>
                                    <span>+233</span>
                                    <input type="text" name="second_guarantor_phone_number" placeholder="eg. 201234567">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guaranteed Amount (2nd)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" name="second_guarantor_guaranteed_amount" class="guaranteed2" placeholder="Amount">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's name (3rd)</label>
                                <input type="text" name="third_guarantor_name" placeholder="Guarantor's name">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Staff No. (3rd)</label>
                                <input type="text" name="third_guarantor_staff_number" placeholder="Staff No.">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Phone (3rd)</label>
                                <div>
                                    <span>+233</span>
                                    <input type="text" name="third_guarantor_phone_number" placeholder="eg. 201234567">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guaranteed Amount (3rd)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" name="third_guarantor_guaranteed_amount" class="guaranteed3" placeholder="Amount">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's name (4th)</label>
                                <input type="text" name="fourth_guarantor_name" placeholder="Guarantor's name">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Staff No. (4th)</label>
                                <input type="text" name="fourth_guarantor_staff_number" placeholder="Staff No.">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guarantor's Phone (4th)</label>
                                <div>
                                    <span>+233</span>
                                    <input type="text" name="fourth_guarantor_phone_number" placeholder="eg. 201234567">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Guaranteed Amount (4th)</label>
                                <div>
                                    <span>GH¢</span>
                                    <input type="number" name="fourth_guarantor_guaranteed_amount" class="guaranteed4" placeholder="Amount">
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
                                <input type="date" name="first_due_approved">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">second Due Date</label>
                                <input type="date" name="second_due_approved">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">third Due Date</label>
                                <input type="date" name="third_due_approved">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Fourth Due Date</label>
                                <input type="date" name="fourth_due_approved">
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
    </div>     -->
<script src="../js/interest.js"></script>