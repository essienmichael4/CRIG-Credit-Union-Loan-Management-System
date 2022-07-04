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
                <input type="text" id="processor" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>

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