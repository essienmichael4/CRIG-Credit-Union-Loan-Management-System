    <?php
        $id = $_GET["account_id"];
        include_once("../php/dbs.inc.php");

        $sql = "SELECT * FROM `savings` WHERE `id` = {$id}";
        $result = mysqli_query($conn, $sql);
        $account = mysqli_fetch_assoc($result);
        $memcode = $account["mem_code"];
        $balance = number_format($account['balance'],2);
    ?>
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
                    <a href="?pgname=useredit&userid=<?=$_SESSION["uid"]?>">edit user</a>
                    <form action="../php/logout.inc.php"><button type="submit">logout</button></form>
                </div>
            </header>
            
            <div class="wrapper">
                <div class="details-head">
                    <a href="?pgname=savingdetails&account_id=<?=$account['id']?>">	&#8592;</a>
                    
                    <div class="details-right">
                        <h2 class="p"><span><?=$account["first_name"].' '.$account["last_name"].' '.$account["other_names"]?></span></h2>
                        <p> Account Details & Statements</p>
                    </div>
                    <div class="actions">
                    <h3>Edit Account Details</h3>
                    </div>
                </div>

                <div class="details-head">
                    <div class="actions  mt1 mnot">
                       <h4>Personal Information</h4>
                    </div>
                </div>

                <form  action="../php/savings/createaccount.inc.php" method="POST">
                    <div class="apply_savings">
                        <div class="personal_info bg">
                            <button type="submit" name="partialedit">Edit Account</button>
                        </div>
                    </div>
                    <div class="apply_savings">
                        <input type="text" name="processor" value="<?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?>" hidden>
                        <input type="text" name="memcode" value="<?=$account['mem_code']?>" hidden>
                        <input type="text" name="profile" value="<?=$account['account_pic']?>" hidden>
                        <input type="text" name="uid" value="<?=$account['id']?>" hidden>
                        <div class="personal_info bgb">
                            <h4>Membership Code</h4>
                            <p><?=$account['mem_code']?></p>
                        </div>
                        <div class="personal_info">
                            <h4>First Name</h4>
                            <input type="text" name="firstname" required autocomplete="FALSE" value="<?=$account['first_name']?>">
                        </div>
                        <div class="personal_info">
                            <h4>Surname</h4>
                            <input type="text"name="lastname" required autocomplete="FALSE" value="<?=$account['last_name']?>">
                        </div>
                        <div class="personal_info">
                            <h4>Middle Name</h4>
                            <input type="text" name="othernames" autocomplete="FALSE" value="<?=$account['other_names']?>">
                        </div>
                        <div class="personal_info">
                            <h4>Date of Birth</h4>
                            <input type="date" name="dateofbirth" value="<?=$account['date_of_birth']?>">
                        </div>
                        <div class="personal_info">
                            <h4>Staff ID</h4>
                            <input type="text" name="staffid" autocomplete="FALSE" value="<?=$account['staff_id']?>">
                        </div>
                        <div class="personal_info">
                            <h4>Phone No.</h4>
                            <input type="number"  autocomplete="FALSE" name="phonenumber" value="<?=$account['phone']?>">
                        </div>
                        <div class="personal_info">
                            <h4>Marital Status</h4>
                            <input type="text" name="maritalstatus" autocomplete="FALSE"value="<?=$account['marital_status']?>">
                        </div>
                        <div class="personal_info">
                            <h4>Name of Spouse(if any)</h4>
                            <input type="text" name="nameofspouse" autocomplete="FALSE" value="<?=$account['name_of_spouse']?>">
                        </div>
                        <div class="personal_info">
                            <h4>No. of Children(if any)</h4>
                            <input type="number" name="children" autocomplete="FALSE" value="<?=$account['number_of_children']?>">
                        </div>
                        <div class="personal_info">
                            <h4>Account Picture</h4>
                            <input type="file" name="pic">
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
                            <input type="text" name="occupation" autocomplete="FALSE" value="<?=$account['occupation']?>">
                        </div>
                        <div class="personal_info">
                            <h4>Place of Work</h4>
                            <input type="text" name="placeofwork" autocomplete="FALSE" value="<?=$account['place_of_work']?>">
                        </div>
                        <div class="personal_info">
                            <h4>Division</h4>
                            <input type="text" name="division" autocomplete="FALSE" value="<?=$account['division']?>">
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
                            <input type="text" name="address" autocomplete="FALSE" value="<?=$account['address']?>">
                        </div>
                        <div class="personal_info">
                            <h4>Home Town</h4>
                            <input type="text" name="hometown" autocomplete="FALSE" value="<?=$account['home_town']?>">
                        </div>
                        <div class="personal_info">
                            <h4>Residential Address</h4>
                            <input type="text" name="residentialaddress" autocomplete="FALSE" value="<?=$account['residential_address']?>">
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
                            <input type="text" name="nextofkin" value="<?=$account['next_of_kin']?>">

                        </div>
                        <div class="personal_info">
                            <h4>Next of Kin Relation</h4>
                            <input type="text" name="nextofkinrelation" autocomplete="FALSE" value="<?=$account['next_of_kin_relation']?>">
                        </div>
                        <div class="personal_info">
                            <h4>Next of Kin Phone No.</h4>
                                <input type="number" name="nextofkinphone" value="<?=$account['next_of_kin_phone']?>">
                            
                        </div>
                        <div class="personal_info">
                            <h4>Next of Kin Occupation</h4>
                            <input type="text" name="nextofkinoccupation" autocomplete="FALSE" value="<?=$account['next_of_kin_occupation']?>">
                        </div>
                    </div>
                    <div class="apply_savings add">
                        <div class="personal_info">
                            <h4>Next of Kin Address</h4>
                            <input type="text" name="nextofkinaddress" value="<?=$account['next_of_kin_address']?>">
                        </div>
                    </div>
                    <div class="apply_savings add">
                        <div class="personal_info">
                            <h4>Remarks</h4>
                            <input type="text" name="remarks" >
                        </div>
                    </div>
                    <div class="apply_savings">
                        <div class="personal_info bg">
                            <button name="editaccount">Edit Account</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
