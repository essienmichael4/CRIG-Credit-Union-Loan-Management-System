<input type='text' name="user" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden />
            <div class="toast_container ">
                <div class="toast">
                    <p class="error"></p>
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="wrapper">
                <div class="savings__card">
                    <div class="card">
                        <p>All Funds</p>
                        <h4 class="all_funds"></h4>
                    </div>
                    <div class="card">
                        <p>Current Account</p>
                        <h4 class="current_account"></h4>
                    </div>
                    <div class="card">
                        <p>Loans</p>
                        <h4 class="arrears"></h4>
                    </div>
                    <div class="card">
                        <p>Interest</p>
                        <h4 class="interest"></h4>
                    </div>                    
                </div>

                <div class="details-head">
                    <div class="actions mnot my_5">
                        <button class="deposite_btn"><span><i class="fas fa-plus-circle"></i></span> Deposit</button>
                        <button  class="withdrawal_btn"><span><i class="fas fa-minus-circle"></i></span> Withdrawal</button>
                    </div>
                </div>

                <div class="filter savings flex">
                    <div class="filter__actions">
                        <a href="?pgname=applysavings" class="active">Savings Application <i class="fas fa-plus"></i></a>
                    </div>
                    <div class="filter__time">
                        <a class="time allTime active">All Time</a>
                        <input type="date" class="dayInput1">
                        <input type="date" class="dayInput2">
                        <input type="month" class="monthInput1">
                        <input type="month" class="monthInput2">
                        <input type="month" class="yearInput">
                        
                        <a class="time day">D</a>
                        <a class="time month">M</a>
                        <a class="time year">Y</a>
                    </div>
                </div>
                <div class=" account-details">
                    <h2 class="account-title">Accounts</h2>
                    <div class="actions">
                        <div class="searchname">
                            <input type="text" class="namesort">
                            <i class="fas fa-search"></i>
                        </div>
                        <button class="getallaccounts">Accounts</button>
                        <button class="getalltransactions">Transactions</button>
                        <button class="getalldeposit">Deposits</button>
                        <button class="getalldebit">Withdrawals</button>
                    </div>
                </div>
                <section class="savings__table">
                    
                </section>

                <div class="withdraw_form ">
                    <form action="../php/savings/deposit_debit.inc.php" method="POST">
                        <header>
                            <h4>Withdrawal Form</h4>
                            <a class="withdrawal_close">&#8594;</a>
                        </header>

                        <div class="withdrawal__body">
                            <div class="error deberror">
                            </div>
                            <input type="text" name="processor" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                            <div class="form-control">
                                <label for="">Mem. Code <span></span></label>
                                <input type="text" name="memcode" class="debmemcode" placeholder="member code">
                                <a class="searchdebmember">search</a>
                            </div>
                            
                            <div class="form-control">
                                <label for="">Name<span></span></label>
                                <h4 class="sw memname"></h4>
                            </div>
                            
                            <div class="form-control">
                                <label for="">Balance <span>GH¢</span></label>
                                <h4 class="sw membal">Michael Essien</h4>
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
                    <form action="../php/savings/deposit_debit.inc.php" method="POST">
                        <header>
                            <h4>Deposit Form</h4>
                            <a class="deposite_close">&#8594;</a>
                        </header>

                        <div class="withdrawal__body dep">
                            <div class="error depositerror">
                            </div>
                            <input type="text" name="processor" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                            <div class="form-control dep">
                                <label for="">Mem. Code <span></span></label>
                                <input type="text" name="memcode" placeholder="member code" class="depmemcode">
                                <a class="searchdepmember">search</a>
                            </div>
                            
                            <div class="form-control dep">
                                <label for="">Name<span></span></label>
                                <h4 class="sw depmemname"></h4>
                            </div>
                            
                            <div class="form-control dep">
                                <label for="">Balance <span>GH¢</span></label>
                                <h4 class="sw depmembal"></h4>
                            </div>
                            
                            <div class="form-control">
                                <label for="">Date <span></span></label>
                                <input type="date" name="depositdate">
                            </div>
                            <div class="form-control dep">
                                <label for="">Receipt No.<span></span></label>
                                <input type="text" placeholder="" name="receiptnum">
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
                                <input type="text" name="deposite_amount">
                            </div>
                            <button name="deposit">Deposit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/searchUtils.js"></script>
    <script src="../js/searchmember.js"></script>
    <script src="../js/accounts.js"></script>
    <!-- <script src="../js/getallloans.js"></script> -->
    <script src="../js/filters.js"></script>
    <script src="../js/deposite.js"></script>
    <script src="../js/getcurrentaccount.js"></script>
    <script src="../js/getallarrears.js"></script>
    <script src="../js/allfunds.js"></script>
    <script src="../js/getinterest.js"></script>
    <script src="../js/sort.js"></script>
    <script src="../js/sortname.js"></script>

    <script>
        let toast = document.querySelector(".toast_container");
        
        setInterval(()=>{
            setTimeout(()=>{
                toast.classList.remove("active");
            }, 5000)
            
        },9000)

        function disablemember(id){
            let params = "id="+id+"&user="+user;

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../php/savings/disablemember.inc.php");
            xhr.setRequestHeader("Content-type", 'application/x-www-form-urlencoded');
            xhr.onload = () =>{
                if(xhr.readyState == XMLHttpRequest.DONE){
                    if(xhr.status == 200){
                        location.href = "routes.php?pgname=savings";
                    }
                }
            }
            xhr.send(params)
        }
    </script>