    <?php
        $id = $_GET["account_id"];
        include_once("../php/dbs.inc.php");

        $sql = "SELECT * FROM `savings` WHERE `id` = {$id}";
        $result = mysqli_query($conn, $sql);
        $account = mysqli_fetch_assoc($result);
        $memcode = $account["mem_code"];
        $balance = number_format($account['balance'],2);
    ?>
    <input type="text" class="account_code" value="<?=$memcode?>" hidden>            
            <div class="wrapper">
                <div class="tblwrapper_header">
                    <h2>CRIG QUALITY CLUB</h2>
                    <p class="box_info">BOX 8, NEW TAFO. | TEL: +233 55-875-7533</p>
                    <p>Account Details & Statements</p>
                </div>
                <div class="details-head">
                    <a href="?pgname=savings" class="navBack">	&#8592;</a>
                    <div class="prof_img"><img src="../assets/<?=$account["account_pic"]?>" alt=""></div>
                    <div class="details-right">
                        <h2 class="p"><span><?=$account["first_name"].' '.$account["last_name"].' '.$account["other_names"]?></span></h2>
                        
                        <p><?=$account["mem_code"]?></p>
                    </div>
                    <div class="actions accActions">
                        <button class="deposite_btn"><span><i class="fas fa-plus-circle"></i></span> Deposit</button>
                        <button  class="withdrawal_btn"><span><i class="fas fa-minus-circle"></i></span> Withdrawal</button>
                        <button class="person_btn"><span><i class="fas fa-angle-down"></i></span> Personal Details</button>
                        <a href="?pgname=editsavingaccount&account_id=<?=$account['id']?>" class="edit_btn">Edit Details <span><i class="fas fa-angle-right"></i></span></a>
                    </div>
                </div>

                <div class="personal__details">
                    <div class="personal_info">
                        <h4>Mem. Code</h4>
                        <p><?=$account["mem_code"]?></p>
                    </div>
                    <div class="personal_info">
                        <h4>Staff ID</h4>
                        <p><?=$account["staff_id"]?></p>
                    </div>
                    <div class="personal_info">
                        <h4>Date of Birth</h4>
                        <p><?=$account["date_of_birth"]?></p>
                    </div>
                    <div class="personal_info">
                        <h4>Phone Number</h4>
                        <p><?=$account["phone"]?></p>
                    </div>
                    <div class="personal_info">
                        <h4>Marital Status</h4>
                        <p><?=$account["marital_status"]?></p>
                    </div>
                    <div class="personal_info">
                        <h4>Name of Spouse</h4>
                        <p><?=$account["name_of_spouse"]?></p>
                    </div>
                    <div class="personal_info">
                        <h4>Number of Children</h4>
                        <p><?=$account["number_of_children"]?></p>
                    </div>
                    <div class="personal_info">
                        <h4>Occupation</h4>
                        <p><?=$account["occupation"]?></p>
                    </div>
                    <div class="personal_info">
                        <h4>Place of Work</h4>
                        <p><?=$account["place_of_work"]?></p>
                    </div>
                    <div class="personal_info">
                        <h4>Division</h4>
                        <p><?=$account["division"]?></p>
                    </div>
                    <div class="personal_info">
                        <h4>Address</h4>
                        <p><?=$account["address"]?></p>
                    </div>
                    <div class="personal_info">
                        <h4>Residential Address</h4>
                        <p><?=$account["residential_address"]?></p>
                    </div>
                    <div class="personal_info">
                        <h4>Hometown</h4>
                        <p><?=$account["home_town"]?></p>
                    </div>
                    <div class="personal_info">
                        <h4>Next of Kin</h4>
                        <p><?=$account["next_of_kin"]?></p>
                    </div>
                    <div class="personal_info">
                        <h4>Next of Kin Relation</h4>
                        <p><?=$account["next_of_kin_relation"]?></p>
                    </div>
                    <div class="personal_info">
                        <h4>Next of Kin Phone</h4>
                        <p><?=$account["next_of_kin_phone"]?></p>
                    </div>
                    <div class="personal_info">
                        <h4>Next of Kin Address</h4>
                        <p><?=$account["next_of_kin_address"]?></p>
                    </div>
                    <div class="personal_info">
                        <h4>Next of Kin Occupation</h4>
                        <p><?=$account["next_of_kin_occupation"]?></p>
                    </div>
                    <div class="personal_info">
                        <h4>Account Created On:</h4>
                        <p><?=$account["day_created"]?></p>
                    </div>
                    <div class="personal_info">
                        <h4>Account Created By:</h4>
                        <p><?=$account["created_by"]?></p>
                    </div>

                </div>
            
                <div class="savings__card">
                    <div class="card">
                        <p>Current Account</p>
                        <h4 class="current_account">GH¢ <?=$balance?></h4>
                    </div>
                    <h3 class="headline des"> Account Details & Statements</h3>
                </div>

                <div class="account-details">
                    <h2 class="account-title">Transactions</h2>
                    <div class="actions">
                        <button class="print" onclick="printAccountStatement()">Print Statement</button>
                        <button class="fill one active getalltransactions" name="<?=$_GET["account_id"]?>" onclick="activate('one')">All Transactions</button>
                        <button class="fill two getalldeposit" name="<?=$_GET["account_id"]?>" onclick="activate('two')">Deposits</button>
                        <button class="fill three getalldebit" name="<?=$_GET["account_id"]?>" onclick="activate('three')">Withdrawals</button>
                    </div>
                </div>
                <section class="savings__table">
                    
                </section>

                <div class="withdraw_form ">
                    <form action="../php/savings/deposit_debit_account.inc.php" method="POST">
                        <header>
                            <h4>Withdrawal Form</h4>
                            <a class="withdrawal_close">	&#8594;</a>
                        </header>

                        <div class="withdrawal__body">
                            <div class="error">
                                <!-- <p class="err">This is an error</p> -->
                            </div>
                            <input type="text" name="processor" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                            <input type="text" name="account_id" value="<?=$_GET["account_id"]?>" hidden>
                            <div class="form-control">
                                <label for="">Name<span></span></label>
                                <h4><?=$account["first_name"].' '.$account["last_name"].' '.$account["other_names"]?></h4>
                            </div>
                            <div class="form-control">
                                <label for="">Mem. Code <span></span></label>
                                <h4 class="sw"><?=$account["mem_code"]?></h4>
                                <input type="text" name="memcode" value="<?=$account["mem_code"]?>" hidden>
                            </div>
                            <div class="form-control">
                                <label for="">Balance <span>GH¢</span></label>
                                <h4 class="sw"><?=$account["balance"]?></h4>
                            </div>
                            <div class="form-control">
                                <label for="">Amount <span>GH¢</span></label>
                                <input type="text" name="debitamount">
                            </div>
                            <div class="form-control dep">
                                <label for="">Cheque No.<span></span></label>
                                <input type="text" placeholder="" name="chequenum">
                            </div>
                            <div class="form-control">
                                <label for="">Date <span></span></label>
                                <input type="date" name="debitdate">
                            </div>
                            <button name="debit">Withdraw</button>
                        </div>
                    </form>
                </div>

                <div class="deposite_form ">
                    <form action="../php/savings/deposit_debit_account.inc.php" method="POST">
                        <header>
                            <h4>Deposit Form</h4>
                            <a class="deposite_close">	&#8594;</a>
                        </header>

                        <div class="withdrawal__body dep">
                            <div class="error">
                                <!-- <p class="err">This is an error</p> -->
                            </div>
                            <input type="text" name="processor" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                            <input type="text" name="account_id" value="<?=$_GET["account_id"]?>" hidden>

                            <div class="form-control dep">
                                <label for="">Mem. Code <span></span></label>
                                <h4  class="sw"><?=$account["mem_code"]?></h4>
                                <input type="text" name="memcode" value="<?=$account["mem_code"]?>" hidden>
                            </div>
                            
                            <div class="form-control dep">
                                <label for="">Name<span></span></label>
                                <h4><?=$account["first_name"].' '.$account["last_name"].' '.$account["other_names"]?></h4>
                            </div>
                            
                            <div class="form-control dep">
                                <label for="">Balance <span>GH¢</span></label>
                                <h4 class="sw"><?=$account["balance"]?></h4>
                            </div>
                            
                            <div class="form-control">
                                <label for="">Date <span></span></label>
                                <input type="date" name="depositdate">
                            </div>
                            <div class="form-control dep">
                                <label for="">Receipt No.<span></span></label>
                                <input type="text" name="receiptnum">
                            </div>
                            <div class="form-control dep">
                                <label for="">Deposit Type <span></span></label>
                                <select name="deposittype">
                                    <option value="monthly">Monthly</option>
                                    <option value="bulk">Bulk</option>
                                </select>
                            </div>
                            
                            <div class="form-control">
                                <label for="">Description <span></span></label>
                                <input type="text" name="description">
                            </div>
                            <div class="form-control dep">
                                <label for="">Amount <span>GH¢</span></label>
                                <input type="text" name="depositamount">
                            </div>
                            <button name="deposit">Deposit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/details.js"></script>
    <script src="../js/deposite.js"></script>
    <script src="../js/getaccounttransactions.js"></script>
    <script src="../js/getCurrentAccountBalance.js"></script>
    <script src="../js/print.js"></script>
    <script>
        function activate(id){
            const btns = document.querySelectorAll(".fill")
            btns.forEach(btn => {
                if(btn.classList.contains("active") && !btn.classList.contains(`${id}`)){
                    btn.classList.remove("active")
                }
                if(btn.classList.contains("active") && btn.classList.contains(`${id}`)){
                    return
                }
                if(!btn.classList.contains("active") && btn.classList.contains(`${id}`)){
                    btn.classList.add("active")
                }
                
            })
        }
    </script>