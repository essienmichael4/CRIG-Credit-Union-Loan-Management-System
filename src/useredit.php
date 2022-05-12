    <div class="main">
        <header class="main__header flex px1">
            <h2 class="">User</h2>
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
                                <input type="text" placeholder="Staff No." name="staff_number" value="<?=$user["worker_id"]?>">
                            </div>
                            <div class="formControl flex-c">
                                <label for="">Phone Number</label>
                                <div>
                                    <span>+233</span><input type="text" placeholder="eg. 201234567" name="phone_number" value="<?=$user["phone"]?>">
                                </div>
                            </div>
                            <!-- <div class="formControl flex-c">
                                <label for="">password</label>
                                <div>
                                    <input type="password" class="pwd" name="password">
                                    <span class="ml1">
                                        <i class="fas fa-eye password"  onclick='passwordShow("pwd")'></i>
                                    </span>
                                </div>
                            </div>
                            <div class="formControl flex-c">
                                <label for="">password repeat</label>
                                <div>
                                    <input type="password" class="pwdrep" name="password_repeat">
                                    <span class="ml1">
                                        <i class="fas fa-eye passwordrep" onclick='passwordShowRep("pwdrep")'></i>
                                    </span>
                                </div>
                            </div> -->
                            <div class="formControl flex-c">
                                <label for="">Role</label>
    
                                <select name="role" id="">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                    <option value="super">Super Admin</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="new flex-c">
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
                                <button class="btn">change password</button>
                            </div>
                            <div class="formControl flex-c">
                                <button class="btn red">delete account</button>
                            </div>
                        </div>
                    </div>
                    <div class="action__btn flex">
                        <button>Approve</button>
                    </div>
                    
                </form>
            </section>
        </div>
    </div>    
<script src="../js/password.js"></script>
<script src="../js/passwordrep.js"></script>