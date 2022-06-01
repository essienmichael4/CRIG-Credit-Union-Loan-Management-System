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
                <!-- <div class="details-head">
                    <a href="?pgname=savings">	&#8592;</a>
                    <div class="details-right">
                        <h2 class="p"><span>Michael Essien</span></h2>
                        <p> Account Details & Statements</p>
                    </div>
                    <div class="actions">
                        <button class="deposite_btn"><span><i class="fas fa-plus-circle"></i></span> Deposite</button>
                        <button  class="withdrawal_btn"><span><i class="fas fa-minus-circle"></i></span> Withdrawal</button>
                        <button class="person_btn"><span><i class="fas fa-angle-down"></i></span> Personal Details</button>
                    </div>
                </div> -->

               
            
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

                <form class="apply_savings" action="../php/savings/createaccount.inc.php" method="POST">
                <input type="text" name="processor" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                    <div class="personal_info">
                        <h4>Membership Code</h4>
                        <input type="text">
                    </div>
                    <div class="personal_info">
                        <h4>First Name</h4>
                        <input type="text">
                    </div>
                    <div class="personal_info">
                        <h4>Last Name</h4>
                        <input type="text">
                    </div>
                    <div class="personal_info">
                        <h4>Other Names</h4>
                        <input type="text">
                    </div>
                    <div class="personal_info">
                        <h4>Staff ID</h4>
                        <input type="text">
                    </div>
                    <div class="personal_info">
                        <h4>Phone No.</h4>
                        <input type="text" autocomplete="FALSE">

                    </div>
                    <div class="personal_info">
                        <h4>Occupation/Rank</h4>
                        <input type="text">
                    </div>
                    <div class="personal_info">
                        <h4>Place of Work</h4>
                        <input type="text">
                    </div>
                    <div class="personal_info">
                        <h4>Division</h4>
                        <input type="text">
                    </div>
                    <div class="personal_info">
                        <h4>Home Town</h4>
                        <input type="text">
                    </div>
                    <div class="personal_info">
                        <h4>Address</h4>
                        <input type="text">
                    </div>
                    <div class="personal_info">
                        <h4>Residential Address</h4>
                        <input type="text">
                    </div>
                    <div class="personal_info">
                        <h4>Marital Status</h4>
                        <input type="text">
                    </div>
                    <div class="personal_info">
                        <h4>Name of Spouse(if any)</h4>
                        <input type="text">
                    </div>
                    <div class="personal_info">
                        <h4>No. of Children</h4>
                        <input type="text">
                    </div>
                    <div class="personal_info">
                        <h4>Next of Kin</h4>
                        <input type="text">

                    </div>
                    <div class="personal_info">
                        <h4>Next of Kin Relation</h4>
                        <input type="number">
                    </div>
                    <div class="personal_info">
                        <h4>Next of Kin Phone No.</h4>
                        <input type="number">
                    </div>
                    <div class="personal_info">
                        <h4>Next of Kin Occupation</h4>
                        <input type="number">
                    </div>
                    <div class="personal_info">
                        <h4>Next of Kin Address</h4>
                        <input type="number">
                    </div>
                    
                    <div class="personal_info bg">
                        <button name="createaccount">Create Account</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
