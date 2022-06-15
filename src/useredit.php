    <div class="main">
        <header class="main__header flex px1">
            <h2 class="">User</h2>
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
                <form action="../php/logout.inc.php"><button type="submit">logout</button></form>
            </div>
        </header>

        <?php
            $id = $_GET["userid"];
            include_once("../php/dbs.inc.php");

            $sql = "SELECT * FROM `users` WHERE `id` = {$id}";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($result);
        ?>
        <div class="wrapper">
            <section class="apply">
                <h3 class="title">Edit User</h3>
                <form class="form apply__form">
                    <div class="form-container flex">
                        <div class="form__group less">
                            <input type="text" name="uid" class="uid" value="<?=$user["id"]?>" hidden>
                            <input type="text" name="sid" class="uid" value="<?=$_SESSION["uid"]?>" hidden>
                            <div class="formControl flex-c">
                                <label for="">First name</label>
                                <input type="text" placeholder="First Name" name="firstname" value="<?=$user["first_name"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Last name</label>
                                <input type="text" placeholder="Last Name" name="lastname" value="<?=$user["last_name"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Other names</label>
                                <input type="text" placeholder="Other Name" name="other_names" value="<?=$user["other_names"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">username</label>
                                <input type="text" placeholder="Username" name="username" value="<?=$user["username"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Email</label>
                                <input type="text" placeholder="Email" name="email" value="<?=$user["email"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Staff No.</label>
                                <input type="text" placeholder="Staff No." name="staff_number" value="<?=$user["staff_id"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Phone Number</label>
                                <div>
                                    <span>+233</span><input type="text" placeholder="eg. 201234567" name="phone_number" value="<?=$user["phone"]?>">
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Role</label>
    
                                <h4><?=$user["role"]?></h4>
                            </div>
                            <?php
                                if($_SESSION["role"]=="super"){
                            ?>
                            <div class="formControl flex-c">
                                <label for="">Change Role</label>
    
                                <select name="role" id="">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                    <option value="super">Super Admin</option>
                                </select>
                            </div>
                            <?php
                                }
                            ?> 
                        </div>
                        
                        <div class="new flex-c">
                            <?php
                                if($user["id"] == $_SESSION["uid"]){
                            ?>
                            <div class="formControl flex-c">
                                <label for="">old password</label>
                                <input type="password" name="old_password">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">new password</label>
                                <input type="password"  name="password">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">confirm new password</label>
                                <input type="password"  name="password_repeat">
                            </div>
                            <div class="formControl flex-c">
                                <button name="userpass" class="btn">change password</button>
                            </div>
                            
                            <?php
                                }else{
                            ?>
                            <div class="formControl flex-c">
                                <label for="">new password</label>
                                <input type="password"  name="password">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">confirm new password</label>
                                <input type="password"  name="password_repeat">
                            </div>
                            <div class="formControl flex-c">
                                <button name="adminpass" class="btn">change password</button>
                            </div>
                            <?php
                                }
                            ?>

                            <div class="formControl flex-c">
                                <a class="btn red deleteAccount">delete account</a>
                            </div>
                        </div>
                    </div>
                    <div class="apply_savings">
                        <div class="personal_info bg flex">
                            <button class="mro">Save Changes</button>
                            <a href="?pgname=users" class="disable">go back</a>
                        </div>
                    </div>
                    
                </form>
            </section>

            <div class="deleteUser">
                <form class="delContainer" action="../php/adduser.inc.php" method="POST">
                    
                    <input type="text" name="sid" class="sid" value="<?=$_SESSION["uid"]?>" hidden>
                    <input type="text" name="uid" class="uid" value="<?=$user["id"]?>" hidden>

                    <h3>Do you want to continue with this operation? This operation can't be reversed.</h3>
                    <label for="">Enter Password to Confirm</label>
                        <input type="password" name="password" class="oldPassword">
                    <div class="box">
                        <a class="cancelbtn">Cancel</a>
                        <button type="submit" name="deleteuser" class="deletebtn">Delete This User Account</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
<script src="../js/password.js"></script>
<script src="../js/passwordrep.js"></script>

<script>
    let cancelbtn = document.querySelector(".cancelbtn");
    let deleteAccount = document.querySelector(".deleteAccount");
    let deleteUser = document.querySelector(".deleteUser");

    deleteAccount.addEventListener("click", ()=>{
        deleteAccount.classList.toggle("active");

        if(deleteAccount.classList.contains("active")){
            deleteUser.style.display = "flex";
        }
    })

    cancelbtn.addEventListener("click", ()=>{
        deleteAccount.classList.toggle("active");

        if(!deleteAccount.classList.contains("active")){
            deleteUser.style.display = "none";
        }
    })
</script>