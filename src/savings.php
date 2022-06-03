<div class="main">
            <header class="main__header flex px1">
                <h2 class="">Savings</h2>
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
                        <p>All Funds</p>
                        <h4>GH¢ 100,000,000</h4>
                    </div>
                    <div class="card">
                        <p>Current Account</p>
                        <h4>GH¢ 80,000,000</h4>
                    </div>
                    <div class="card">
                        <p>All Funds</p>
                        <h4>GH¢ 100,000,000</h4>
                    </div>
                    <div class="card">
                        <p>All Funds</p>
                        <h4>GH¢ 100,000,000</h4>
                    </div>
                    
                </div>

                <div class="details-head">
                    <div class="actions mnot my_5">
                        <button class="deposite_btn"><span><i class="fas fa-plus-circle"></i></span> Deposite</button>
                        <button  class="withdrawal_btn"><span><i class="fas fa-minus-circle"></i></span> Withdrawal</button>
                        <!-- <button class="person_btn"><span><i class="fas fa-angle-down"></i></span> Personal Details</button> -->
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
                <section class="savings__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Member ID</th>
                                <th>Member Name</th>
                                <th>Staff ID</th>
                                <th>Contact</th>
                                <th>Balance</th>
                                <th>Account Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>cqc1234567465</td>
                                <td><a href="?pgname=savingdetails">Michael Essien</a> </td>
                                <td>+233 263436049</td>
                                <td>Unknown</td>
                                <td>GH¢ 891,500,000</td>
                                <td>Unknown</td>
                                <td>Unknown</td>
                            </tr>
                            <tr>
                                <td>cqc1234567465</td>
                                <td><a href="">Michael Essien</a> </td>
                                <td>+233 263436049</td>
                                <td>Unknown</td>
                                <td>GH¢ 1,500</td>
                                <td>Unknown</td>
                                <td>Unknown</td>
                            </tr>
                            <tr>
                                <td>cqc1234567465</td>
                                <td><a href="">Michael Essien</a> </td>
                                <td>+233 263436049</td>
                                <td>Unknown</td>
                                <td>GH¢ 1,500</td>
                                <td>Unknown</td>
                                <td>Unknown</td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <div class="withdraw_form ">
                    <form action="../php/savings/deposit_debit.inc.php" method="POST">
                        <header>
                            <h4>Withdrawal Form</h4>
                            <a class="withdrawal_close">	&#8594;</a>
                        </header>

                        <div class="withdrawal__body">
                            <div class="error">
                            <!-- <p class="err">This is an error</p> -->
                            </div>
                            <input type="text" name="processor" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                            <div class="form-control">
                                <label for="">Mem. Code <span></span></label>
                                <input type="text" name="memcode" placeholder="member code">
                                <a>search</a>
                            </div>
                            
                            <div class="form-control">
                                <label for="">Name<span></span></label>
                                <input type="text" name="name" placeholder="Name">
                            </div>
                            
                            <div class="form-control">
                                <label for="">Balance <span>GH¢</span></label>
                                <h4 class="sw">Michael Essien</h4>
                            </div>
                            <div class="form-control">
                                <label for="">Amount <span>GH¢</span></label>
                                <input type="number" name="debitamount">
                            </div>
                            <button name="deit">Withdraw</button>
                        </div>
                    </form>
                </div>

                <div class="deposite_form ">
                    <form action="../php/savings/deposit_debit.inc.php" method="POST">
                        <header>
                            <h4>Deposit Form</h4>
                            <a class="deposite_close">	&#8594;</a>
                        </header>

                        <div class="withdrawal__body dep">
                            <div class="error">
                            <!-- <p class="err">This is an error</p> -->
                            </div>
                            <input type="text" name="processor" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                            <div class="form-control dep">
                                <label for="">Mem. Code <span></span></label>
                                <input type="text" name="memcode" placeholder="member code">
                                <a>search</a>
                            </div>

                            <div class="form-control dep">
                                <label for="">Receipt No.<span></span></label>
                                <input type="text" placeholder="" name="receiptnum">
                                
                            </div>
                            
                            <div class="form-control dep">
                                <label for="">Name<span></span></label>
                                <input type="text" name="name" placeholder="Name">
                            </div>
                            
                            <div class="form-control dep">
                                <label for="">Balance <span>GH¢</span></label>
                                <h4 class="sw"></h4>
                            </div>
                            
                            <div class="form-control dep">
                                <label for="">Amount <span>GH¢</span></label>
                                <input type="number">
                            </div>
                            
                            <div class="form-control dep">
                                <label for="">Deposit Type <span></span></label>
                                <select name="deposittype">
                                    <option value="monthly">Monthly</option>
                                    <option value="bulk">Bulk</option>
                                </select>
                            </div>
                            <button name="deposit">Deposit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/searchUtils.js"></script>
    <!-- <script src="../js/getallloans.js"></script> -->
    <script src="../js/filters.js"></script>
    <script src="../js/deposite.js"></script>