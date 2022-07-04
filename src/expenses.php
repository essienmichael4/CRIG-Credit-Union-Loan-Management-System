<div class="main">
            <header class="main__header flex px1">
                <h2 class="">Expenses</h2>
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
                    <a href="?pgname=useredit&userid=<?=$_SESSION["uid"]?>">edit user</a>
                    <form action="../php/logout.inc.php"><button type="submit">logout</button></form>
                </div>
            </header>
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

                <div class="filter savings flex">
                    <div class="filter__actions">
                        <a href="?pgname=applysavings" class="active">Add Expense<i class="fas fa-plus"></i></a>
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
                    <h2 class="account-title">All Expenses</h2>
                    <!-- <div class="searchname"><input type="text" class="namesort"></div> -->
                    <div class="actions">
                        <!-- <div class="searchname">
                            <input type="text" class="namesort">
                            <i class="fas fa-search"></i>
                        </div> -->
                        <!-- <button class="getallaccounts">All Expenses</button> -->
                        <!-- <button class="getalltransactions">Transactions</button>
                        <button class="getalldeposit">Deposits</button>
                        <button class="getalldebit">Withdrawals</button> -->
                    </div>
                </div>
                <div class="table_wrapper">
                    <section class="savings__table">
                    
                    </section>
                    <form class="add_expense">
                        <header>
                            <h3>Add New Expense</h3>
                        </header>
                        <input type="text" id="processor" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                        <div class="body">
                            <div class="form_control">
                                <label for="">Item's Name</label>
                                <input type="text" name="items" placeholder="Item Name">
                            </div>
                            <div class="form_control">
                                <label for="">Item Price</label>
                                <input type="text" name="price" placeholder="Price">
                            </div>
                            <div class="form_control">
                                <label for="">Purpose</label>
                                <textarea name="purpose" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form_control">
                                <label for="">Day Added</label>
                                <input type="date" name="dayadded">
                            </div>

                            <button name="addexpense">Add Expense</button>
                        </div>
                    </form>
                </div>
                

            </div>
        </div>
    </div>
    <script src="../js/searchUtils.js"></script>
    <script src="../js/searchmember.js"></script>
    <script src="../js/expenses.js"></script>
    <!-- <script src="../js/getallloans.js"></script> -->
    <script src="../js/filters.js"></script>
    <script src="../js/deposite.js"></script>
    <script src="../js/getcurrentaccount.js"></script>
    <script src="../js/getallarrears.js"></script>
    <script src="../js/allfunds.js"></script>
    <script src="../js/getinterest.js"></script>
    <!-- <script src="../js/sort.js"></script> -->
    <!-- <script src="../js/sortname.js"></script> -->

    <script>
        let toast = document.querySelector(".toast_container");
        
        setInterval(()=>{
            setTimeout(()=>{
                toast.classList.remove("active");
            }, 5000)
            
        },9000)
    </script>