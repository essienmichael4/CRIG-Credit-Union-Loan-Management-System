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
                <div class="savings__card">
                    <div class="card">
                        <p>All Loans</p>
                        <h4 class="all_loans_total"></h4>
                    </div>
                    <div class="card">
                        <p>All Paid Loans</p>
                        <h4 class="paid_loans"></h4>
                    </div>
                    <div class="card">
                        <p>Unpaid Loans</p>
                        <h4 class="arrears"></h4>
                    </div>
                    <div class="card">
                        <p>Interest</p>
                        <h4>GH¢ 100,000,000</h4>
                    </div>
                    
                </div>
                <div class="filter flex">
                    <div class="filter__actions">
                        <a href="?pgname=apply" class="active">Loan Application <i class="fas fa-plus"></i></a>
                        <a class="loanfilter all active">All Loans</a>
                        <a class="loanfilter approved">Approved</a>
                        <a class="loanfilter due">Due</a>
                        <a class="loanfilter overdue">Overdue</a>
                        <a class="loanfilter paid">Paid</a>
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
                <section class="main__table">
                    <?php
                        if($_GET["data"]){
                            require("../php/dbs.inc.php");
                            require("../php/functions.inc.php");

                            searchQueryloans($conn, $_GET["data"]);
                        }
                    ?>
                </section>
            </div>
        </div>
    </div>
    <script src="../js/searchUtils.js"></script>
    <script src="../js/getallloans.js"></script>
    <script src="../js/filters.js"></script>
    <!-- <script src="../js/getlimitedloans.js"></script> -->
    <script src="../js/getallarrears.js"></script>
    <script src="../js/getallloantotal.js"></script>
    <script src="../js/getallpaidloans.js"></script>
