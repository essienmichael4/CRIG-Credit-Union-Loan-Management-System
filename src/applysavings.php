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
                <div class="details-head">
                    <div class="actions mnot my1">
                       <h3> Savings Application</h3>
                    </div>
                </div>               
            
                <div class="savings__card mnot">
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
                    <div class="actions  mt1 mnot">
                       <h4>Personal Information</h4>
                    </div>
                </div>

                <form  action="../php/savings/createaccount.inc.php" method="POST">
                    <div class="apply_savings">
                        <input type="text" name="processor" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                        <div class="personal_info bgb">
                            <h4>Membership Code</h4>
                            <input type="text" name="memcode" autocomplete="FALSE" placeholder="Membership Code">
                        </div>
                        <div class="personal_info">
                            <h4>First Name</h4>
                            <input type="text" name="firstname" autocomplete="FALSE" placeholder="First Name">
                        </div>
                        <div class="personal_info">
                            <h4>Last Name</h4>
                            <input type="text"name="lastname" autocomplete="FALSE" placeholder="Last Name">
                        </div>
                        <div class="personal_info">
                            <h4>Other Names</h4>
                            <input type="text" name="othernames" autocomplete="FALSE" placeholder="Other Names">
                        </div>
                        <div class="personal_info">
                            <h4>Date of Birth</h4>
                            <input type="date" name="dateofbirth">
                        </div>
                        <div class="personal_info">
                            <h4>Staff ID</h4>
                            <input type="text" name="staffid" autocomplete="FALSE" placeholder="Staff ID">
                        </div>
                        <div class="personal_info">
                            <h4>Phone No.</h4>
                            <input type="number" autocomplete="FALSE" name="phonenumber" placeholder="Phone">
                        </div>
                        <div class="personal_info">
                            <h4>Marital Status</h4>
                            <input type="text" name="maritalstatus" autocomplete="FALSE" placeholder="Marital Status">
                        </div>
                        <div class="personal_info">
                            <h4>Name of Spouse(if any)</h4>
                            <input type="text" name="nameofspouse" autocomplete="FALSE" placeholder="Spouse">
                        </div>
                        <div class="personal_info">
                            <h4>No. of Children</h4>
                            <input type="number" name="children" autocomplete="FALSE" placeholder="Children">
                        </div>
                    </div>
                    <div class="details-head">
                        <div class="actions  mt1 mnot">
                        <h4>Work Information</h4>
                        </div>
                    </div>
                    <div class="apply_savings">
                        <div class="personal_info">
                            <h4>Occupation/Rank</h4>
                            <input type="text" name="occupation" autocomplete="FALSE" placeholder="Occupation">
                        </div>
                        <div class="personal_info">
                            <h4>Place of Work</h4>
                            <input type="text" name="placeofwork" autocomplete="FALSE" placeholder="Place of Work">
                        </div>
                        <div class="personal_info">
                            <h4>Division</h4>
                            <input type="text" name="division" autocomplete="FALSE" placeholder="Division">
                        </div>
                    </div>
                    <div class="details-head">
                        <div class="actions  mt1 mnot">
                        <h4>Address Information</h4>
                        </div>
                    </div>
                    <div class="apply_savings add">
                        <div class="personal_info">
                            <h4>Address</h4>
                            <input type="text" name="address" autocomplete="FALSE" placeholder="Address">
                        </div>
                        <div class="personal_info">
                            <h4>Home Town</h4>
                            <input type="text" name="hometown" autocomplete="FALSE" placeholder="Home Town">
                        </div>
                        <div class="personal_info">
                            <h4>Residential Address</h4>
                            <input type="text" name="residentialaddress" autocomplete="FALSE" placeholder="Residential Address">
                        </div>
                    </div>
                    <div class="details-head">
                        <div class="actions  mt1 mnot">
                        <h4>Next of Kin Information</h4>
                        </div>
                    </div>
                    <div class="apply_savings">
                        <div class="personal_info">
                            <h4>Next of Kin</h4>
                            <input type="text" name="nextofkin" placeholder="Next of Kin">

                        </div>
                        <div class="personal_info">
                            <h4>Next of Kin Relation</h4>
                            <input type="text" name="nextofkinrelation" autocomplete="FALSE" placeholder="Relation">
                        </div>
                        <div class="personal_info">
                            <h4>Next of Kin Phone No.</h4>
                                <input type="number" name="nextofkinphone" placeholder="Next of Kin Phone">
                            
                        </div>
                        <div class="personal_info">
                            <h4>Next of Kin Occupation</h4>
                            <input type="text" name="nextofkinoccupation" autocomplete="FALSE" placeholder="Occupation">
                        </div>
                    </div>
                    <div class="apply_savings add">
                        <div class="personal_info">
                            <h4>Next of Kin Address</h4>
                            <input type="text" name="nextofkinaddress" placeholder="Next of Kin Address">
                        </div>
                    </div>
                    <div class="details-head">
                        <div class="actions  mt1 mnot">
                        <h4>Account Information</h4>
                        </div>
                    </div>
                    <div class="apply_savings">
                        <!-- <div class="personal_info">
                            <h4>Registration Fee</h4>
                            <div>
                                <span>Gh¢</span>
                                <input type="number" name="regfee" placeholder="">
                            </div>
                        </div> -->
                        <div class="personal_info">
                            <h4>Bulk Deposite</h4>
                            <div>
                                <span>Gh¢</span>
                                <input type="number" name="bulkdeposite" placeholder="">
                            </div>
                        </div>
                        <div class="personal_info">
                            <h4>Monthly Deposite</h4>
                            <div>
                                <span>Gh¢</span>
                                <input type="number" name="monthlydeposite" placeholder="">
                            </div>
                        </div>
                        <div class="personal_info">
                            <h4>Receipt No.</h4>
                            <input type="number" autocomplete="FALSE" name="receiptnumber" placeholder="Receipt">
                        </div>
                    </div>
                    <div class="apply_savings">
                        <div class="personal_info bg">
                            <button name="createaccount">Create Account</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
