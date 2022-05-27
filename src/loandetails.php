    <?php
            $id = $_GET["applicant_id"];
            include_once("../php/dbs.inc.php");

            $sql = "SELECT * FROM `applicant` WHERE `id` = {$id}";
            $result = mysqli_query($conn, $sql);
            $applicant = mysqli_fetch_assoc($result);
        ?>
    <div class="main">
            <header class="main__header flex px1">
                <h2 class="">Loans</h2>
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
                <div class="action-head">
                    <h2 class="h3">
                        Loan Details
                    </h2>

                    <button class="paybtn">Make Payment</button>
                </div>

                <h2 class="h4">Applicant Detials</h2>
                <div>
                    <div class="details">
                        <div class="details__card">
                            <h4 class="title">Applicant Name</h4>
                            <p class="content"><?=$applicant["first_name"].' '.$applicant["last_name"].' '.$applicant["other_names"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Applicant Contact</h4>
                            <p class="content"><?='+233 '.$applicant["phone_number"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Applicant Membership Status</h4>
                            <p class="content"><?=$applicant["member_code"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Applicant Work Place</h4>
                            <p class="content"><?=$applicant["work_place"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Loan Requested</h4>
                            <p class="content"><?=$applicant["loan_amount"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Loan With Interest</h4>
                            <p class="content"><?=$applicant["loan_interest"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Loan To Be Payed</h4>
                            <p class="content"><?=$applicant["loan_to_be_payed"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Loan Arrears</h4>
                            <p class="content"><?=$applicant["loan_arrears"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Purpose of Loan</h4>
                            <p class="content"><?=$applicant["purpose"]?></p>
                        </div>
                        
                        <div class="details__card">
                            <h4 class="title">Day Applied</h4>
                            <p class="content"><?=$applicant["apply_date"]?></p>
                        </div>
                        
                        <div class="details__card">
                            <h4 class="title">Mode of Payment</h4>
                            <p class="content"><?=$applicant["mode_of_payment"]?></p>
                        </div>
                        
                        <div class="details__card">
                            <h4 class="title">Loan Status</h4>
                            <p class="content"><?=$applicant["loan_status"]?></p>
                        </div>
                    </div>
                    <h2 class="h4">Gaurantor Detials</h2>
                    <div class="details">
                        <div class="details__card">
                            <h4 class="title">First Gaurantor Name</h4>
                            <p class="content"><?=$applicant["guarantor_fullname_first"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">First Gaurantor Staff Num.</h4>
                            <p class="content"><?=$applicant["guarantor_staffnum_first"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">First Gaurantor Contact</h4>
                            <p class="content"><?='+233 '.$applicant["guarantor_phone_first"]?></p>
                        </div>
                        
                        <div class="details__card">
                            <h4 class="title">Gauranteed Amount</h4>
                            <p class="content"><?=$applicant["guaranteed_amount_first"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Second Gaurantor Name</h4>
                            <p class="content"><?=$applicant["guarantor_fullname_second"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Second Gaurantor Staff Num.</h4>
                            <p class="content"><?=$applicant["guarantor_staffnum_second"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Second Gaurantor Contact</h4>
                            <p class="content"><?='+233 '.$applicant["guarantor_phone_second"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Gauranteed Amount</h4>
                            <p class="content"><?=$applicant["guaranteed_amount_second"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Third Gaurantor Name</h4>
                            <p class="content"><?=$applicant["guarantor_fullname_third"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Third Gaurantor Staff Num.</h4>
                            <p class="content"><?=$applicant["guarantor_staffnum_third"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Third Gaurantor Contact</h4>
                            <p class="content"><?='+233 '.$applicant["guarantor_phone_third"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Gauranteed Amount</h4>
                            <p class="content"><?=$applicant["guaranteed_amount_third"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Fourth Gaurantor Name</h4>
                            <p class="content"><?=$applicant["guarantor_fullname_fourth"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Fourth Gaurantor Staff Num.</h4>
                            <p class="content"><?=$applicant["guarantor_staffnum_fourth"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Fourth Gaurantor Contact</h4>
                            <p class="content"><?='+233 '.$applicant["guarantor_phone_fourth"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Gauranteed Amount</h4>
                            <p class="content"><?=$applicant["guaranteed_amount_fourth"]?></p>
                        </div>
                    </div>
                    <h2 class="h4">Bank Detials</h2>
                    <div class="details">
                        <div class="details__card">
                            <h4 class="title">Recepient</h4>
                            <p class="content"><?=$applicant["recipient_name"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Mode of Payment</h4>
                            <p class="content"><?=$applicant["mode_of_payment"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">First Due Date</h4>
                            <p class="content"><?=$applicant["first_due_date"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Approval Status</h4>
                            <p class="content"><?=$applicant["approval_status"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Approved By</h4>
                            <p class="content"><?=$applicant["approved_by"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Day Approved</h4>
                            <p class="content"><?=$applicant["day_approved"]?></p>
                        </div>
                        
                    </div>
                    <h2 class="h4">Payment Detials</h2>
                    <div class="details">
                        <div class="details__card">
                            <h4 class="title">First Due Date</h4>
                            <p class="content"><?=$applicant["first_due_date"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">First Due Date Status</h4>
                            <p class="content"><?=$applicant["first_due_date_status"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Recipient</h4>
                            <p class="content"><?=$applicant["first_due_recipient"]?></p>
                        </div>
                        <div></div>

                        <div class="details__card">
                            <h4 class="title">Second Due Date</h4>
                            <p class="content"><?=$applicant["second_due_date"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Second Due Date Status</h4>
                            <p class="content"><?=$applicant["second_due_date_status"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Recipient</h4>
                            <p class="content"><?=$applicant["second_due_recipient"]?></p>
                        </div>
                        <div></div>
                        <div class="details__card">
                            <h4 class="title">Third Due Date</h4>
                            <p class="content"><?=$applicant["third_due_date"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Third Due Date Status</h4>
                            <p class="content"><?=$applicant["third_due_date_status"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Recipient</h4>
                            <p class="content"><?=$applicant["third_due_recipient"]?></p>
                        </div>
                        <div></div>
                        <div class="details__card">
                            <h4 class="title">Fourth Due Date</h4>
                            <p class="content"><?=$applicant["fourth_due_date"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Fourth Due Date Status</h4>
                            <p class="content"><?=$applicant["fourth_due_date_status"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Recipient</h4>
                            <p class="content"><?=$applicant["fourth_due_recipient"]?></p>
                        </div>
                        <div></div>
                        <div class="details__card">
                            <h4 class="title">Fifth Due Date</h4>
                            <p class="content"><?=$applicant["fifth_due_date"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Fifth Due Date Status</h4>
                            <p class="content"><?=$applicant["fifth_due_date_status"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Recipient</h4>
                            <p class="content"><?=$applicant["fifth_due_recipient"]?></p>
                        </div>
                        <div></div>
                        <div class="details__card">
                            <h4 class="title">Sixth Due Date</h4>
                            <p class="content"><?=$applicant["sixth_due_date"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Sixth Due Date Status</h4>
                            <p class="content"><?=$applicant["sixth_due_date_status"]?></p>
                        </div>
                        <div class="details__card">
                            <h4 class="title">Recipient</h4>
                            <p class="content"><?=$applicant["first_due_recipient"]?></p>
                        </div>
                        <div></div>
                        
                    </div>
                </div>
                
                <?php
                    if($applicant["loan_status"] == "paid"){
                ?>
                    <div class="payment">
                        <div class="payment__card">
                            <header>
                                <h2 class="h3">Payment Plan</h2>
                                <i class="fas fa-times closeForm"></i>
                            </header>
                            <form action="../php/payments.inc.php" method="POST" class="payment__details disabled">
                                <div>
                                    <h4 class="title">First Due Payment</h4>
                                    <input type="number" name="amount">
                                    <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                    <input type="text" name="duedate" value="first" hidden>
                                    <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                </div>
                                <div class="payment__status">
                                    <h4 class="title">Status: pending</h4>
                                    <button name="payment">make payment</button>
                                </div>
                            </form>
                            <form class="payment__details disabled" action="../php/payments.inc.php" method="POST">
                                <div>
                                    <h4 class="title">Second Due Payment</h4>
                                    <input type="number" name="amount">
                                    <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                    <input type="text" name="duedate" value="second" hidden>
                                    <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                </div>
                                <div class="payment__status">
                                    <h4 class="title">Status: pending</h4>
                                    <button name="payment">make payment</button>
                                </div>
                            </form>
                            <form action="../php/payments.inc.php" method="POST" class="payment__details disabled">
                                <div>
                                    <h4 class="title">Third Due Payment</h4>
                                    <input type="number" name="amount">
                                    <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                    <input type="text" name="duedate" value="third" hidden>
                                    <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                </div>
                                <div class="payment__status">
                                    <h4 class="title">Status: pending</h4>
                                    <button name="payment">make payment</button>
                                </div>
                            </form>
                            <form class="payment__details disabled" action="../php/payments.inc.php" method="POST">
                                <div>
                                    <h4 class="title">Fourth Due Payment</h4>
                                    <input type="number" name="amount">
                                    <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                    <input type="text" name="duedate" value="fourth" hidden>
                                    <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                </div>
                                <div class="payment__status">
                                    <h4 class="title">Status: pending</h4>
                                    <button name="payment">make payment</button>
                                </div>
                            </form>
                            <form action="../php/payments.inc.php" method="POST" class="payment__details disabled">
                                <div>
                                    <h4 class="title">Fifth Due Payment</h4>
                                    <input type="number" name="amount">
                                    <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                    <input type="text" name="duedate" value="fifth" hidden>
                                    <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                </div>
                                <div class="payment__status">
                                    <h4 class="title">Status: pending</h4>
                                    <button name="payment">make payment</button>
                                </div>
                            </form>
                            <form class="payment__details disabled" action="../php/payments.inc.php" method="POST">
                                <div>
                                    <h4 class="title">Sixth Due Payment</h4>
                                    <input type="number" name="amount">
                                    <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                    <input type="text" name="duedate" value="sixth" hidden>
                                    <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                </div>
                                <div class="payment__status">
                                    <h4 class="title">Status: pending</h4>
                                    <button name="payment">make payment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php
                    }else{
                        if($applicant["first_due_date_status"] == "paid" && $applicant["second_due_date_status"] == "paid" &&
                        $applicant["third_due_date_status"] == "paid" && $applicant["fourth_due_date_status"] == "paid" && 
                        $applicant["fifth_due_date_status"] == "paid" && $applicant["Sixth_due_date_status"] != "paid"){
                            ?>
                                <div class="payment">
                                    <div class="payment__card">
                                        <header>
                                            <h2 class="h3">Payment Plan</h2>
                                            <i class="fas fa-times closeForm"></i>
                                        </header>
                                        <form action="../php/payments.inc.php" method="POST" class="payment__details disabled">
                                            <div>
                                                <h4 class="title">First Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="first" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form class="payment__details disabled" action="../php/payments.inc.php" method="POST">
                                            <div>
                                                <h4 class="title">Second Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="second" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form action="../php/payments.inc.php" method="POST" class="payment__details disabled">
                                            <div>
                                                <h4 class="title">Third Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="third" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form class="payment__details disabled" action="../php/payments.inc.php" method="POST">
                                            <div>
                                                <h4 class="title">Fourth Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="fourth" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form action="../php/payments.inc.php" method="POST" class="payment__details disabled">
                                            <div>
                                                <h4 class="title">Fifth Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="fifth" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form class="payment__details" action="../php/payments.inc.php" method="POST">
                                            <div>
                                                <h4 class="title">Sixth Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="sixth" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php
                        }elseif($applicant["first_due_date_status"] == "paid" && $applicant["second_due_date_status"] == "paid" &&
                        $applicant["third_due_date_status"] == "paid" && $applicant["fourth_due_date_status"] == "paid" && 
                        $applicant["fifth_due_date_status"] != "paid"){
                            ?>
                                <div class="payment">
                                    <div class="payment__card">
                                        <header>
                                            <h2 class="h3">Payment Plan</h2>
                                            <i class="fas fa-times closeForm"></i>
                                        </header>
                                        <form action="../php/payments.inc.php" method="POST" class="payment__details disabled">
                                            <div>
                                                <h4 class="title">First Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="first" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form class="payment__details" action="../php/payments.inc.php" method="POST">
                                            <div>
                                                <h4 class="title">Second Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="second" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form action="../php/payments.inc.php" method="POST" class="payment__details">
                                            <div>
                                                <h4 class="title">Third Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="third" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form class="payment__details" action="../php/payments.inc.php" method="POST">
                                            <div>
                                                <h4 class="title">Fourth Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="fourth" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form action="../php/payments.inc.php" method="POST" class="payment__details">
                                            <div>
                                                <h4 class="title">Fifth Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="fifth" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form class="payment__details" action="../php/payments.inc.php" method="POST">
                                            <div>
                                                <h4 class="title">Sixth Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="sixth" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php
                        }else if($applicant["first_due_date_status"] == "paid" && $applicant["second_due_date_status"] == "paid" &&
                        $applicant["third_due_date_status"] == "paid" && $applicant["fourth_due_date_status"] != "paid"){
                            ?>
                                <div class="payment">
                                    <div class="payment__card">
                                        <header>
                                            <h2 class="h3">Payment Plan</h2>
                                            <i class="fas fa-times closeForm"></i>
                                        </header>
                                        <form action="../php/payments.inc.php" method="POST" class="payment__details disabled">
                                            <div>
                                                <h4 class="title">First Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="first" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form class="payment__details disabled" action="../php/payments.inc.php" method="POST">
                                            <div>
                                                <h4 class="title">Second Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="second" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form action="../php/payments.inc.php" method="POST" class="payment__details disabled">
                                            <div>
                                                <h4 class="title">Third Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="third" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form class="payment__details disabled" action="../php/payments.inc.php" method="POST">
                                            <div>
                                                <h4 class="title">Fourth Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="fourth" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form action="../php/payments.inc.php" method="POST" class="payment__details">
                                            <div>
                                                <h4 class="title">Fifth Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="fifth" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form class="payment__details disabled" action="../php/payments.inc.php" method="POST">
                                            <div>
                                                <h4 class="title">Sixth Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="sixth" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php
                        }else if($applicant["first_due_date_status"] == "paid" && $applicant["second_due_date_status"] == "paid" &&
                        $applicant["third_due_date_status"] != "paid"){
                            ?>
                                <div class="payment">
                                    <div class="payment__card">
                                        <header>
                                            <h2 class="h3">Payment Plan</h2>
                                            <i class="fas fa-times closeForm"></i>
                                        </header>
                                        <form action="../php/payments.inc.php" method="POST" class="payment__details disabled">
                                            <div>
                                                <h4 class="title">First Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="first" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form class="payment__details disabled" action="../php/payments.inc.php" method="POST">
                                            <div>
                                                <h4 class="title">Second Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="second" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form action="../php/payments.inc.php" method="POST" class="payment__details">
                                            <div>
                                                <h4 class="title">Third Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="third" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form class="payment__details disabled" action="../php/payments.inc.php" method="POST">
                                            <div>
                                                <h4 class="title">Fourth Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="fourth" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form action="../php/payments.inc.php" method="POST" class="payment__details disabled">
                                            <div>
                                                <h4 class="title">Fifth Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="fifth" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form class="payment__details disabled" action="../php/payments.inc.php" method="POST">
                                            <div>
                                                <h4 class="title">Sixth Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="sixth" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php
                        }else if($applicant["first_due_date_status"] == "paid" && $applicant["second_due_date_status"] != "paid"){
                            ?>
                                <div class="payment">
                                    <div class="payment__card">
                                        <header>
                                            <h2 class="h3">Payment Plan</h2>
                                            <i class="fas fa-times closeForm"></i>
                                        </header>
                                        <form action="../php/payments.inc.php" method="POST" class="payment__details disabled">
                                            <div>
                                                <h4 class="title">First Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="first" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form class="payment__details" action="../php/payments.inc.php" method="POST">
                                            <div>
                                                <h4 class="title">Second Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="second" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form action="../php/payments.inc.php" method="POST" class="payment__details disabled">
                                            <div>
                                                <h4 class="title">Third Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="third" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form class="payment__details disabled" action="../php/payments.inc.php" method="POST">
                                            <div>
                                                <h4 class="title">Fourth Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="fourth" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form action="../php/payments.inc.php" method="POST" class="payment__details disabled">
                                            <div>
                                                <h4 class="title">Fifth Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="fifth" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form class="payment__details disabled" action="../php/payments.inc.php" method="POST">
                                            <div>
                                                <h4 class="title">Sixth Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="sixth" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php
                        }else if($applicant["first_due_date_status"] != "paid"){
                            ?>
                                <div class="payment">
                                    <div class="payment__card">
                                        <header>
                                            <h2 class="h3">Payment Plan</h2>
                                            <i class="fas fa-times closeForm"></i>
                                        </header>
                                        <form action="../php/payments.inc.php" method="POST" class="payment__details">
                                            <div>
                                                <h4 class="title">First Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="first" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form class="payment__details disabled" action="../php/payments.inc.php" method="POST">
                                            <div>
                                                <h4 class="title">Second Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="second" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form action="../php/payments.inc.php" method="POST" class="payment__details disabled">
                                            <div>
                                                <h4 class="title">Third Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="third" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form class="payment__details disabled" action="../php/payments.inc.php" method="POST">
                                            <div>
                                                <h4 class="title">Fourth Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="fourth" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form action="../php/payments.inc.php" method="POST" class="payment__details disabled">
                                            <div>
                                                <h4 class="title">Fifth Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="fifth" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                        <form class="payment__details disabled" action="../php/payments.inc.php" method="POST">
                                            <div>
                                                <h4 class="title">Sixth Due Payment</h4>
                                                <input type="number" name="amount">
                                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                                <input type="text" name="duedate" value="sixth" hidden>
                                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                            </div>
                                            <div class="payment__status">
                                                <h4 class="title">Status: pending</h4>
                                                <button name="payment">make payment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php
                        }
                        
                ?>
                <?php
                    }
                ?>
                
            </div>
        </div>
    </div>
    <script src="../js/applicantinfo.js"></script>