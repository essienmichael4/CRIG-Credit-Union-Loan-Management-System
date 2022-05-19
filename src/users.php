
    <div class="main">
        <header class="main__header flex px1">
            <h2 class="">All Users</h2>
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

        <?php
            if($_SESSION["role"] == "super" || $_SESSION["role"] == "admin"){
        ?>
            <div class="filter flex">
                <div class="filter__actions">
                    <a class="addUser">Add User <i class="fas fa-plus"></i></a>
                </div>
                
            </div>

        <?php 
            }
        ?>

<?php
    include_once("../php/dbs.inc.php");
    $sql = "";
    if($_SESSION["role"] =="user"){
        $sql = "SELECT * FROM `users` WHERE `role` = '{$_SESSION["role"]}';";
    }else if($_SESSION["role"] =="admin"){
        $sql = "SELECT * FROM `users` WHERE `role` = 'user' OR `role` = '{$_SESSION["role"]}';";
    }else{
        $sql = "SELECT * FROM `users`";
    }
    $result = mysqli_query($conn, $sql);
?>
            <section class="main__table">
                <table>
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>User Full Name</th>
                            <th>username</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th class="tc">Status</th>
                            <?php
                                if($_SESSION["role"] == "super" || $_SESSION["role"] == "admin"){
                            ?>
                                <th class="tc">Actions</th>
                            <?php
                                }
                            ?>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($user = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td><?=$user["id"]?></td>
                            <td><a><?=$user["first_name"]." ".$user["last_name"]." ".$user["other_names"]?></a></td>
                            <td><?=$user["username"]?></td>
                            <td><?=$user["phone"]?></td>
                            <td><?=$user["email"]?></td>
                            
                            <?php
                                if($user["status"] == "logged in"){
                            ?>
                            <td class="tc"><span class="in"><?=$user["status"]?></span></td>
                            <?php
                                }else{
                            ?>
                            <td class="tc"><span class="out"><?=$user["status"]?></span></td>
                            <?php
                                }
                            ?>
                            <?php
                                if($_SESSION["role"] == "super" || $_SESSION["role"] == "admin"){
                            ?>
                            <td class="tc">
                                <button class="enable">enable</button> 
                                <a href="?pgname=useredit&userid=<?=$user["id"]?>" class="edit">Edit</a>
                            </td>
                            <?php
                                }
                            ?>
                        </tr>

                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </section>
                
        </div>

        <div class="main__user">
            <form action="../php/adduser.inc.php" method="POST">
                <header class="flex">
                    <h3 class="title">User form</h3>
                    <i class="fas fa-times closeForm"></i>
                </header>

                <div class="form__group">
                    <div class="formControl flex-c">
                        <label for="">First name</label>
                        <input type="text" name="firstname" placeholder="First Name">
                    </div>
                    <div class="formControl flex-c">
                        <label for="">Last name</label>
                        <input type="text" name="lastname" placeholder="Last Name">
                    </div>
                    <div class="formControl flex-c">
                        <label for="">Other names</label>
                            <input type="text" name="other_names" placeholder="Other Name">
                    </div>
                    <div class="formControl flex-c">
                        <label for="">username</label>
                        <input type="text" name="username" placeholder="Username">
                    </div>
                    <div class="formControl flex-c">
                        <label for="">Email</label>
                        <input type="text" name="email" placeholder="Email">
                    </div>
                    <div class="formControl flex-c">
                        <label for="">Staff No.</label>
                            <input type="text" name="staff_number" placeholder="Staff No.">
                    </div>
                    <div class="formControl flex-c">
                    <label for="">Phone Number</label>
                    <div>
                        <span>+233</span><input type="text" name="phone_number" placeholder="eg. 201234567">
                        </div>
                    </div>
                    <div class="formControl flex-c">
                        <label for="">password</label>
                    <div>
                        <input type="password" name="password" class="pwd">
                        <span class="ml1">
                            <i class="fas fa-eye password" onclick='passwordShow("pwd")'></i>
                        </span>
                            </div>
                    </div>
                    <div class="formControl flex-c">
                        <label for="">password repeat</label>
                    <div>
                        <input type="password" name="password_repeat" class="pwdrep">
                            <span class="ml1">
                                <i class="fas fa-eye passwordrep" onclick='passwordShowRep("pwdrep")'></i>
                            </span>
                        </div>
                        </div>
                    <div class="formControl flex-c">
                        <label for="">Role</label>

                            <select name="role" id="">
                            <option value="user">User</option>
                                <option value="admin">Admin</option>
                                <option value="super">Super Admin</option>
                            </select>
                        </div>
                        
                    </div>
                    <div class="action__btn flex">
                        <button>Add User</button>
                    </div>

                </form>
            </div>
        </div>
    </div>   
    <script src="../js/password.js"></script>
<script src="../js/passwordrep.js"></script>
    <script src="../js/user.js"></script> 
