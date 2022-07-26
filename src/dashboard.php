    <div class="toast_container ">
        <div class="toast">
            <p class="error"></p>
            <i class="fas fa-times"></i>
        </div>
    </div>
    
    <div class="dashboard_wrapper">
        <input type="text" id="processor" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>

        <div class="savings__card odd">
            <div class="card">
                <p>All Funds</p>
                <h4 class="all_funds"></h4>
            </div>
            <div class="card">
                <p>Current Account</p>
                <h4 class="current_account"></h4>
            </div>
            <div class="card">
                <p>All Loans</p>
                <h4 class="all_loans_total"></h4>
            </div>
            <div class="card">
                <p>All Paid Loans</p>
                <h4 class="paid_loans"></h4>
            </div>
            <div class="card">
                <p>Registration</p>
                <h4 class="registration_fee"></h4>
            </div>
        </div>


        <div class="content_wrapper">
            <div class="content_scroll">
                <div class="secondary_cards">
                    <a href="?pgname=savings" class="card">
                        <h3>Accounts</h3>
                        <p class="all_accounts"></span></p>
                    </a>
                    <a href="?pgname=expenses" class="card">
                        <h3>All Expenses</h3>
                        <p class="expense"></p>
                    </a>
                    <a href="?pgname=loans" class="card">
                        <h3>Loans</h3>
                        <p class="all_loans"></p>
                    </a>
                    <a class="card">
                        <h3>Interest On Loans</h3>
                        <p class="loan_interest"></p>
                    </a>
                </div>
                <div class="normal_cards">
                    <div class="card">
                        <h3>New Members</h3>
                        <p class="new_accounts"></p>
                    </div>
                    <!-- <div class="card">
                        <h3>Registration</h3>
                        <p class="registration_fee"></p>
                    </div> -->
                    <div class="card">
                        <h3>Loans Awaiting Approval</h3>
                        <p class="awaiting_approval"></p>
                    </div>
                    <div class="card">
                        <h3>Due Loans</h3>
                        <p class="due_loans"></p>
                    </div>
                    <div class="card">
                        <h3>Overdue Loans</h3>
                        <p class="overdue_loans"></p>
                    </div>
                    <div class="card">
                        <h3>Paid Loans</h3>
                        <p class="paid_loan"></p>
                    </div>
                </div>
                <div class="savings__table">
                    <h3>New Members</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Member Id</th>
                                <th>Balance</th>
                            </tr>
                        </thead>
                        <tbody class="new_members">
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="expense_list">
                <h3>New expenses</h3>
                <?php
                    include_once("../php/dbs.inc.php");
        
                    $sql = "SELECT * FROM `expenses`";
                    $result = mysqli_query($conn, $sql);
                    while($expense = mysqli_fetch_assoc($result)){
                        ?>
                        <div class="card">
                            <h4><?=$expense["item_name"]?></h4>
                            <p class="price">GH¢ <?=$expense["item_price"]?></p>
                        </div>
                        <?php
                    }

                ?>
            </div>
        </div>
    </div>
</div>
<script src="../js/getallloantotal.js"></script>
<script src="../js/getallpaidloans.js"></script>
<script src="../js/allfunds.js"></script>
<script src="../js/getcurrentaccount.js"></script>
<script>
    let toast = document.querySelector(".toast_container");
    
    setInterval(()=>{
        setTimeout(()=>{
            toast.classList.remove("active");
        }, 5000)
        
    },9000)
</script>
<script src="../js/savings/fetchnumaccounts.js"></script>
<script src="../js/loans/fetchnumloans.js"></script>
<script src="../js/expenses/expenses.js"></script>