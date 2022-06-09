<div class="main">
            <header class="main__header flex px1">
                <h2 class="">Dashboard</h2>
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
                <!-- <section class="cards flex">
                    <div class="cards__card flex-c">
                        <span><i class="icon icon--first fas fa-arrow-down"></i></span>
                        <p class="all_loans_total"></p>
                        <h2 class="">All loans</h2>
                    </div>
                    <div class="cards__card flex-c">
                        <span><i class="icon icon--second fas fa-arrow-down"></i></span>
                        <p class="paid_loans"></p>
                        <h2 class="">All paid loans</h2>
                    </div>
                    <div class="cards__card flex-c">
                        <span><i class="icon icon--third fas fa-arrow-down"></i></span>
                        <p class="arrears"></p>
                        <h2 class="">All unpaid loans</h2>
                    </div>
                    <div class="cards__card flex-c">
                        <span><i class="icon icon--fourth fas fa-arrow-down"></i></span>
                        <p>GH¢ 1,000.00</p>
                        <h2 class="">Interest on Loans</h2>
                    </div>
                </section> -->
                <div class="savings__card">
                    <div class="card">
                        <p>All Funds</p>
                        <h4>GH¢ 100,000,000</h4>
                    </div>
                    <div class="card">
                        <p>Current Account</p>
                        <h4>GH¢ 80,000,000</h4>
                    </div>
                    <div class="card">
                        <p>All Loans</p>
                        <h4 class="all_loans_total"></h4>
                    </div>
                    <div class="card">
                        <p>All Paid Loans</p>
                        <h4 class="paid_loans"></h4>
                    </div>
                    
                </div>

                <section class="unapproved__table">
                    <input type='text' name="user" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden />
                </section>

                


                <section class="main__table">
                </section>
                <div class="action__btn flex">
                    <a href="?pgname=loans">view all <i class="fas fa-angle-down"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="../js/searchUtils.js"></script> -->
    <script src="../js/unapproved.js"></script>
    <!-- <script src="../js/grantloans.js"></script> -->
    <script src="../js/getlimitedloans.js"></script>
    <!-- <script src="../js/getallarrears.js"></script> -->
    <script src="../js/getallloantotal.js"></script>
    <script src="../js/getallpaidloans.js"></script>