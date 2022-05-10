<div class="main">
            <header class="main__header flex px1">
                <h2 class="">Dashboard</h2>
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
                <section class="cards flex">
                    <div class="cards__card flex-c">
                        <span><i class="icon icon--first fas fa-arrow-down"></i></span>
                        <p>GH¢ 1,000,000,000.00</p>
                        <h2 class="">All loans</h2>
                    </div>
                    <div class="cards__card flex-c">
                        <span><i class="icon icon--second fas fa-arrow-down"></i></span>
                        <p>GH¢ 1,000,000.00</p>
                        <h2 class="">All paid loans</h2>
                    </div>
                    <div class="cards__card flex-c">
                        <span><i class="icon icon--third fas fa-arrow-down"></i></span>
                        <p>GH¢ 1,000.00</p>
                        <h2 class="">All unpaid loans</h2>
                    </div>
                    <div class="cards__card flex-c">
                        <span><i class="icon icon--fourth fas fa-arrow-down"></i></span>
                        <p>GH¢ 1,000.00</p>
                        <h2 class="">Interest on Loans</h2>
                    </div>
                    
                </section>

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
    <script src="../js/grantloans.js"></script>
    <script src="../js/getlimitedloans.js"></script>