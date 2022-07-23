    <?php
            $id = $_GET["applicant_id"];
            include_once("../php/dbs.inc.php");

            $sql = "SELECT * FROM `applicant` WHERE `id` = {$id}";
            $result = mysqli_query($conn, $sql);
            $applicant = mysqli_fetch_assoc($result);
        ?>
            <div class="wrapper">
                <div class="content_wrapper">
                    <div class="content_scroll">
                        <div class="action-head">
                            <h2 class="h3">
                                Loan Details
                            </h2>
                        </div>
    
                        <h2 class="h4">Applicant Detials</h2>
                        <div>
                            <div class="details">
                                <div class="details__card">
                                    <h4 class="title">Applicant Name</h4>
                                    <p class="content"><?=$applicant["applicant_name"]?></p>
                                </div>
                                <div class="details__card">
                                    <h4 class="title">Applicant Contact</h4>
                                    <p class="content"><?='+233 '.$applicant["phone_number"]?></p>
                                </div>
                                <div class="details__card">
                                    <h4 class="title">Applicant Membership Status</h4>
                                    <p class="content tt"><?=$applicant["member_code"]?></p>
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
                                    <p class="content tt"><?=$applicant["guarantor_staffnum_first"]?></p>
                                </div>
                                <div class="details__card">
                                    <h4 class="title">First Gaurantor Contact</h4>
                                    <p class="content"><?='+233 '.$applicant["guarantor_phone_first"]?></p>
                                </div>
                                
                                <div class="details__card">
                                    <h4 class="title">Gauranteed Amount</h4>
                                    <p class="content"><?=$applicant["guaranteed_amount_first"]?></p>
                                </div>
                                <div></div>
                                <div></div>
                                <div class="details__card">
                                    <h4 class="title">Second Gaurantor Name</h4>
                                    <p class="content"><?=$applicant["guarantor_fullname_second"]?></p>
                                </div>
                                <div class="details__card">
                                    <h4 class="title">Second Gaurantor Staff Num.</h4>
                                    <p class="content tt"><?=$applicant["guarantor_staffnum_second"]?></p>
                                </div>
                                <div class="details__card">
                                    <h4 class="title">Second Gaurantor Contact</h4>
                                    <p class="content"><?='+233 '.$applicant["guarantor_phone_second"]?></p>
                                </div>
                                <div class="details__card">
                                    <h4 class="title">Gauranteed Amount</h4>
                                    <p class="content"><?=$applicant["guaranteed_amount_second"]?></p>
                                </div>
                                <div></div>
                                <div></div>
                                <div class="details__card">
                                    <h4 class="title">Third Gaurantor Name</h4>
                                    <p class="content"><?=$applicant["guarantor_fullname_third"]?></p>
                                </div>
                                <div class="details__card">
                                    <h4 class="title">Third Gaurantor Staff Num.</h4>
                                    <p class="content tt"><?=$applicant["guarantor_staffnum_third"]?></p>
                                </div>
                                <div class="details__card">
                                    <h4 class="title">Third Gaurantor Contact</h4>
                                    <p class="content"><?='+233 '.$applicant["guarantor_phone_third"]?></p>
                                </div>
                                <div class="details__card">
                                    <h4 class="title">Gauranteed Amount</h4>
                                    <p class="content"><?=$applicant["guaranteed_amount_third"]?></p>
                                </div>
                                <div></div>
                                <div></div>
                                <div class="details__card">
                                    <h4 class="title">Fourth Gaurantor Name</h4>
                                    <p class="content"><?=$applicant["guarantor_fullname_fourth"]?></p>
                                </div>
                                <div class="details__card">
                                    <h4 class="title">Fourth Gaurantor Staff Num.</h4>
                                    <p class="content tt"><?=$applicant["guarantor_staffnum_fourth"]?></p>
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
                            <div class="savings__table mb2">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Receipt</th>
                                            <th>Amount paid</th>
                                            <th>Status</th>
                                            <th>Teller</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?=$applicant["first_due_date"]?></td>
                                            <td><?=$applicant["receipt_1"]?></td>
                                            <td><?=$applicant["amount_payed_1"]?></td>
                                            <td><?=$applicant["first_due_date_status"]?></td>
                                            <td><?=$applicant["first_due_recipient"]?></td>
                                        </tr>
                                        <tr>
                                            <td><?=$applicant["second_due_date"]?></td>
                                            <td><?=$applicant["receipt_2"]?></td>
                                            <td><?=$applicant["amount_payed_2"]?></td>
                                            <td><?=$applicant["second_due_date_status"]?></td>
                                            <td><?=$applicant["second_due_recipient"]?></td>
                                        </tr>
                                        <tr>
                                            <td><?=$applicant["third_due_date"]?></td>
                                            <td><?=$applicant["receipt_3"]?></td>
                                            <td><?=$applicant["amount_payed_3"]?></td>
                                            <td><?=$applicant["third_due_date_status"]?></td>
                                            <td><?=$applicant["third_due_recipient"]?></td>
                                        </tr>
                                        <tr>
                                            <td><?=$applicant["fourth_due_date"]?></td>
                                            <td><?=$applicant["receipt_4"]?></td>
                                            <td><?=$applicant["amount_payed_4"]?></td>
                                            <td><?=$applicant["fourth_due_date_status"]?></td>
                                            <td><?=$applicant["fourth_due_recipient"]?></td>
                                        </tr>
                                        <?php
                                            if($applicant["fifth_due_date"] != "0000-00-00"){
                                                ?>
                                                <tr>
                                                    <td><?=$applicant["fifth_due_date"]?></td>
                                                    <td><?=$applicant["receipt_5"]?></td>
                                                    <td><?=$applicant["amount_payed_5"]?></td>
                                                    <td><?=$applicant["fifth_due_date_status"]?></td>
                                                    <td><?=$applicant["fifth_due_recipient"]?></td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                        <?php
                                            if($applicant["sixth_due_date"] != "0000-00-00"){
                                                ?>
                                                <tr>
                                                    <td><?=$applicant["sixth_due_date"]?></td>
                                                    <td><?=$applicant["receipt_6"]?></td>
                                                    <td><?=$applicant["amount_payed_6"]?></td>
                                                    <td><?=$applicant["sixth_due_date_status"]?></td>
                                                    <td><?=$applicant["sixth_due_recipient"]?></td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="expense_list mt">
                        <div class="head">
                            <h2>Payment</h2>
                            <button class="onetime">One Time Payment</button>
                        </div>

                        <div class="payment_dates">
                           <p>Expected Payment Dates</p> 
                           <?php
                            if($applicant["loan_status"] != "paid"){
                           ?>
                           <button class="pay" id="pay">Pay Loan</button>
                           <?php
                            }
                           ?>
                           <div class="card">
                            <h3>First Due Date</h3>
                            <p><?=$applicant["first_due_date"]?></p>
                           </div>
                           <div class="card">
                            <h3>Second Due Date</h3>
                            <p><?=$applicant["second_due_date"]?></p>
                           </div>
                           <div class="card">
                            <h3>Third Due Date</h3>
                            <p><?=$applicant["third_due_date"]?></p>
                           </div>
                           <div class="card">
                            <h3>Fourth Due Date</h3>
                            <p><?=$applicant["fourth_due_date"]?></p>
                           </div>
                           <?php
                            if($applicant["fifth_due_date"] != "0000-00-00"){
                            ?>
                                <div class="card">
                                    <h3>Fifth Due Date</h3>
                                    <p><?=$applicant["fifth_due_date"]?></p>
                                </div>
                            <?php
                            }
                           ?>
                           <?php
                            if($applicant["sixth_due_date"] != "0000-00-00"){
                            ?>
                                <div class="card">
                                    <h3>Sixth Due Date</h3>
                                    <p><?=$applicant["sixth_due_date"]?></p>
                                </div>
                            <?php
                            }
                           ?>
                        </div>
                        <div class="payment_form">
                            <h3>Payment Form</h3>
                            <button class="pay" onclick="closepay()">Exit</button>
                            <?php
                                if($applicant["first_due_date_status"] != "paid"){
                                ?>
                            
                            <p>Applicant First Due Payment</p>
                            <form action="../php/loans/payments.inc.php" method="POST">
                                    <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                    <input type="text" name="duedate" value="first" hidden>
                                    <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                <div class="loan-amount">
                                    <p>Loan Amount</p>
                                    <p>GH¢ <?=$applicant["loan_arrears"]?></p>
                                </div>
                                <div class="form-control">
                                    <label for="">Amount Payed</label>
                                    <input type="text" placeholder="Amount payed" name="amount">
                                </div>
                                <div class="form-control">
                                    <label for="">Receipt Number</label>
                                    <input type="text" placeholder="Receipt" name="receipt">
                                </div>
                                
                                <button name="payment">Make Payment</button>
                            </form>
                                <?php
                                }
                                else if($applicant["second_due_date_status"] != "paid"){
                                ?>
                            <p>Applicant Second Due Payment</p>
                            <form action="../php/loans/payments.inc.php" method="POST">
                                    <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                    <input type="text" name="duedate" value="second" hidden>
                                    <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                <div class="loan-amount">
                                    <p>Loan Amount</p>
                                    <p>GH¢ <?=$applicant["loan_arrears"]?></p>
                                </div>
                                <div class="form-control">
                                    <label for="">Amount Payed</label>
                                    <input type="text" placeholder="Amount payed" name="amount">
                                </div>
                                <div class="form-control">
                                    <label for="">Receipt Number</label>
                                    <input type="text" placeholder="Receipt" name="receipt">
                                </div>
                                
                                <button name="payment">Make Payment</button>
                            </form>
                                <?php
                                }
                                else if($applicant["third_due_date_status"] != "paid"){
                                ?>
                            <p>Applicant Third Due Payment</p>
                            <form action="../php/loans/payments.inc.php" method="POST">
                            <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                    <input type="text" name="duedate" value="third" hidden>
                                    <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                <div class="loan-amount">
                                    <p>Loan Amount</p>
                                    <p>GH¢ <?=$applicant["loan_arrears"]?></p>
                                </div>
                                <div class="form-control">
                                    <label for="">Amount Payed</label>
                                    <input type="text" placeholder="Amount payed" name="amount">
                                </div>
                                <div class="form-control">
                                    <label for="">Receipt Number</label>
                                    <input type="text" placeholder="Receipt" name="receipt">
                                </div>
                                
                                <button name="payment">Make Payment</button>
                            </form>
                                <?php
                                }
                                else if($applicant["fourth_due_date_status"] != "paid"){
                                ?>
                            <p>Applicant Fourth Due Payment</p>
                            <form action="../php/loans/payments.inc.php" method="POST">
                            <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                    <input type="text" name="duedate" value="fourth" hidden>
                                    <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                <div class="loan-amount">
                                    <p>Loan Amount</p>
                                    <p>GH¢ <?=$applicant["loan_arrears"]?></p>
                                </div>
                                <div class="form-control">
                                    <label for="">Amount Payed</label>
                                    <input type="text" placeholder="Amount payed" name="amount">
                                </div>
                                <div class="form-control">
                                    <label for="">Receipt Number</label>
                                    <input type="text" placeholder="Receipt" name="receipt">
                                </div>
                                
                                <button name="payment">Make Payment</button>
                            </form>
                                <?php
                                }
                                else if($applicant["fifth_due_date_status"] != "paid" && $applicant["fifth_due_date"] != "0000-00-00"){
                                ?>
                            <p>Applicant Fifth Due Payment</p>
                            <form action="../php/loans/payments.inc.php" method="POST">
                            <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                    <input type="text" name="duedate" value="fifth" hidden>
                                    <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                <div class="loan-amount">
                                    <p>Loan Amount</p>
                                    <p>GH¢ <?=$applicant["loan_arrears"]?></p>
                                </div>
                                <div class="form-control">
                                    <label for="">Amount Payed</label>
                                    <input type="text" placeholder="Amount payed" name="amount">
                                </div>
                                <div class="form-control">
                                    <label for="">Reciept Number</label>
                                    <input type="text" placeholder="Reciept" name="receipt">
                                </div>
                                
                                <button name="payment">Make Payment</button>
                            </form>
                                <?php
                                }
                                else if($applicant["sixth_due_date_status"] != "paid" && $applicant["sixth_due_date"] != "0000-00-00"){
                                ?>
                            <p>Applicant Sixth Due Payment</p>
                            <form action="../php/loans/payments.inc.php" method="POST">
                            <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                    <input type="text" name="duedate" value="sixth" hidden>
                                    <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                <div class="loan-amount">
                                    <p>Loan Amount</p>
                                    <p>GH¢ <?=$applicant["loan_arrears"]?></p>
                                </div>
                                <div class="form-control">
                                    <label for="">Amount Payed</label>
                                    <input type="text" placeholder="Amount payed" name="amount">
                                </div>
                                <div class="form-control">
                                    <label for="">Receipt Number</label>
                                    <input type="text" placeholder="Receipt" name="receipt">
                                </div>
                                
                                <button name="payment">Make Payment</button>
                            </form>
                                <?php
                                }
                            ?>
                        </div>

                        <div class="payment_onetime">
                            <h3>One Time Payment</h3>
                            <form method="POST" action="../php/loans/payments.inc.php">
                                <input type="text" name="id" value="<?=$_GET["applicant_id"]?>" hidden>
                                <input type="text" name="recipient" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                                <input type="text" class="loanamount" name="loan_amount" value="<?=$applicant["loan_amount"]?>" hidden>
                                <div class="loan-amount">
                                    <p>Loan Amount</p>
                                    <p>GH¢ <?=$applicant["loan_amount"]?></p>
                                </div>

                                <div class="form-control">
                                    <label for="">New Loan Interest (%)</label>
                                    <input type="text" class="interest" placeholder="Interest" name="interest_percent">
                                </div>

                                <div class="form-control">
                                    <label for="">New Loan To Be Payed</label>
                                    <input type="text" class="newloan" placeholder="New Arrears" name="new_loan">
                                </div>

                                <div class="form-control">
                                    <label for="">Amount Payed</label>
                                    <input type="text" placeholder="Amount payed" name="amount_payed">
                                </div>
                                <div class="form-control">
                                    <label for="">Receipt Number</label>
                                    <input type="text" placeholder="Receipt" name="receipt_number">
                                </div>
                                <button name="payment_onetime">Make Payment</button>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- <script src="../js/applicantinfo.js"></script> -->
    <script>
        let onetime = document.querySelector(".onetime")
        let pay = document.querySelector("#pay")
        onetime.addEventListener("click", () => {
            let payment_dates = document.querySelector(".payment_dates")
            let payment_onetime = document.querySelector(".payment_onetime")
            let payment_form = document.querySelector(".payment_form")
            if(onetime.classList.contains("active")){
                payment_dates.style.display = "block";
                payment_onetime.style.display = "none";
                onetime.classList.remove("active")
            }else{
                payment_dates.style.display = "none";
                payment_form.style.display = "none";
                onetime.classList.add("active")
                payment_onetime.style.display = "block";
                
            }
        })

        pay.addEventListener("click", ()=>{
            let payment_form = document.querySelector(".payment_form")
            let payment_dates = document.querySelector(".payment_dates")

            payment_form.style.display = "block";
            payment_dates.style.display = "none";
        })

        function closepay(){
            let payment_form = document.querySelector(".payment_form")
            let payment_dates = document.querySelector(".payment_dates")

            payment_form.style.display = "none";
            payment_dates.style.display = "block";
        }

        document.querySelector(".interest").addEventListener("input", ()=>{
            let loanAmount = document.querySelector(".loanamount").value
            let interest = document.querySelector(".interest").value
            let new_loan = document.querySelector(".newloan")

            console.log(loanAmount)

            let newLoan =parseFloat(loanAmount) + (parseFloat(loanAmount) * (parseFloat(interest) / 100))

            new_loan.value = newLoan;
        })
    </script>