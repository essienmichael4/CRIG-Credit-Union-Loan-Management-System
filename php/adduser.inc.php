<?php
    if(isset($_POST["adduser"])){

        include_once("./dbs.inc.php");
        include_once("./functions.inc.php");
    
        $firstname = mysqli_real_escape_string($conn,$_POST["firstname"]);
        $lastname = mysqli_real_escape_string($conn,$_POST["lastname"]);
        $othernames = mysqli_real_escape_string($conn,$_POST["other_names"]);
        $username = mysqli_real_escape_string($conn,$_POST["username"]);
        $email = mysqli_real_escape_string($conn,$_POST["email"]);
        $phonenumber = mysqli_real_escape_string($conn,$_POST["phone_number"]);
        $staffnumber = mysqli_real_escape_string($conn,$_POST["staff_number"]);
        $role = mysqli_real_escape_string($conn,$_POST["role"]);
        $password = mysqli_real_escape_string($conn,$_POST["password"]);
        $passwordrep = mysqli_real_escape_string($conn,$_POST["password_repeat"]);
    
        if(emptyField($firstname) || emptyField($lastname) || emptyField($username) ||
            emptyField($email) || emptyField($staffnumber) || emptyField($phonenumber)
            || emptyField($password) || emptyField($role)|| emptyField($passwordrep)){
                header("location: ../src/routes.php?pgname=users&error=emptyinput"); 
                exit();
            }else{
                if($password != $passwordrep){
                    header("location: ../src/routes.php?pgname=users&error=pwddonotmatch"); 
                    exit();
                }else{
                    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
                
                    $sql = "SELECT * FROM `users` WHERE `email` = '{$email}' OR `username` = '{$username}' OR `staff_id` = '{$staffnumber}';";
                
                    $result = mysqli_query($conn, $sql);
                
                    if($row = mysqli_fetch_assoc($result)){
                        header("location: ../src/routes.php?pgname=apply&error=userexists"); 
                        exit();
                    }else{
                        $sql = "INSERT INTO `users`(`first_name`, `last_name`,`other_names`, 
                        `email`, `staff_id`, `username`,`role`, `password`, `status`, `phone`) 
                        VALUES('$firstname','$lastname', '$othernames','$email', '$staffnumber',
                         '$username', '$role', '$hashedpwd', 'logged out', '$phonenmber')";
                
                        if(mysqli_query($conn, $sql)){
                            header("location: ../src/routes.php?pgname=users"); 
                            exit();
                        }else{
                            header("location: ../src/routes.php?pgname=users&error=sqlerror"); 
                            exit();
                        }
                    }
                }
    
            }
    }else if(isset($_POST["edituser"])){

        include_once("./dbs.inc.php");
        include_once("./functions.inc.php");
    
        $uid = mysqli_real_escape_string($conn,$_POST["uid"]);
        $sessionid = mysqli_real_escape_string($conn,$_POST["sid"]);
        $firstname = mysqli_real_escape_string($conn,$_POST["firstname"]);
        $lastname = mysqli_real_escape_string($conn,$_POST["lastname"]);
        $othernames = mysqli_real_escape_string($conn,$_POST["other_names"]);
        $username = mysqli_real_escape_string($conn,$_POST["username"]);
        $email = mysqli_real_escape_string($conn,$_POST["email"]);
        $phonenumber = mysqli_real_escape_string($conn,$_POST["phone_number"]);
        $staffnumber = mysqli_real_escape_string($conn,$_POST["staff_number"]);
        $role = mysqli_real_escape_string($conn,$_POST["role"]);
        $password = mysqli_real_escape_string($conn,$_POST["password"]);
        $passwordrep = mysqli_real_escape_string($conn,$_POST["password_repeat"]);

        $sql = "SELECT * FROM `users` WHERE `id` = {$uid};";

        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);

        if($firstname == $row["first_name"] || empty($firstname)){
            $firstname = $row["first_name"];
        }
    
        if($lastname == $row["last_name"] || empty($lastname)){
            $lastname = $row["last_name"];
        }
        if($othernames == $row["other_names"] || empty($othernames)){
            $othernames = $row["other_names"];
        }
    
        if($username == $row["username"] || empty($username)){
            $username == $row["username"];
        }
        if($phonenumber == $row["phone"] || empty($phonenumber)){
            $phonenumber == $row["phone"];
        }
        if($staffnumber == $row["staff_id"] || empty($staffnumber)){
            $staffnumber == $row["staff_id"];
        }
    
        if($email == $row["email"] || empty($email)){
            $email = $row["email"];
        }
    
        if($role == $row["role"]){
            $role = $row["role"];
        }
    
        $sql = "UPDATE `users` SET `first_name` = '$firstname', `last_name` = '$lastname',  `other_names` = '$othernames'
        , `email` = '$email', `username` = '$username',`role` = '$role', `phone` = '$phonenmber'
        , `staff_id` = '$staffnumber' WHERE `id`= {$uid}";

        if(mysqli_query($conn, $sql)){
            header("location: ../src/routes.php?pgname=users"); 
            exit();
        }else{
            header("Location: ../src/routes.php?pgname=users&userid=".$uid."error=updatefailed");
            exit();
        }
    }else if(isset($_POST["deleteuser"])){
        session_start();
        include_once("./dbs.inc.php");

        $password = mysqli_real_escape_string($conn,$_POST["password"]);
        $sid = mysqli_real_escape_string($conn,$_POST["sid"]);
        $uid = mysqli_real_escape_string($conn,$_POST["uid"]);

        $sql = "SELECT * FROM `users` WHERE `id` = $sid;";

        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);
        $name = $row['firstname']." ".$row['lastname']." ".$row['other_names'];


        if(password_verify($password, $row['password']) == "true" || $password == $row['password']){
            $sql1 = "SELECT * FROM `users` WHERE `id` = $uid;";
            $newresult = mysqli_query($conn, $sql1);
            $newrow = mysqli_fetch_assoc($newresult);
            $fullname = $newrow['first_name']." ".$newrow['last_name']." ".$newrow['other_names'];
            $id = $newrow['id'];

            $sql2 = "INSERT INTO `deletedusers`(`name`, `uid`, `deletedby`) 
            VALUES('$fullname', $id, '$name')";

            if(mysqli_query($conn, $sql2)){
                $sql3 = "DELETE FROM `users` WHERE `id` = $uid;";
                if(mysqli_query($conn, $sql3)){
                    if($sid == $uid){
                        session_unset();
                        session_destroy();
                        header("Location: ../index.php");
                        exit();
                    }else{
                        header("Location: ../src/routes.php?pgname=users");
                        exit();
                    }
                }else{
                    header("Location: ../src/routes.php?pgname=users&userid=".$uid."error=sql3error");
                    exit();
                }
            }else{
                header("Location: ../src/routes.php?pgname=users&userid=".$uid."error=sql2error");
                exit();
            }
        }else{
            header("Location: ../src/routes.php?pgname=users&userid=".$uid."error=pwderror");
            exit();
        }
    }else if(isset($_POST["userpass"])){
        include_once("./dbs.inc.php");

        $oldPassword = mysqli_real_escape_string($conn,$_POST["old_Password"]);
        $newPassword = mysqli_real_escape_string($conn,$_POST["password"]);
        $repPassword = mysqli_real_escape_string($conn,$_POST["password_repeat"]);
        
        $uid = mysqli_real_escape_string($conn,$_POST["uid"]);

        if($newPassword != $repPassword){
            header("Location: ../src/routes.php?pgname=useredit&userid=".$uid."error=passdonotmatch");
            exit();
            
        }else{
            
            $sql = "SELECT * FROM `users` WHERE `id` = $uid;";
    
            $result = mysqli_query($conn, $sql);
    
            $row = mysqli_fetch_assoc($result);
    
            if(password_verify($oldPassword, $row['password']) == "true"){
                $hashedpwd = password_hash($newPassword, PASSWORD_DEFAULT);
                $sql = "UPDATE `users` SET `password` = '$hashedpwd' WHERE `id`= {$uid}";
    
                if(mysqli_query($conn, $sql)){
                    header("location: ../src/routes.php?pgname=users"); 
                    exit();
                }else{
                    header("Location: ../src/routes.php?pgname=useredit&userid=".$uid."error=passupdatefailed");
                    exit();
                }
            }else{
                header("Location: ../src/routes.php?pgname=useredit&userid=".$uid."error=passwrong");
                exit();
            }
        }

    }else if(isset($_POST["adminpass"])){

        include_once("./dbs.inc.php");

        $newPassword = mysqli_real_escape_string($conn,$_POST["password"]);
        $repPassword = mysqli_real_escape_string($conn,$_POST["password_repeat"]);
        
        $uid = mysqli_real_escape_string($conn,$_POST["uid"]);

        if($newPassword != $repPassword){
            header("Location: ../src/routes.php?pgname=useredit&userid=".$uid."error=passdonotmatch");
            exit();
        }else{
            $sql = "SELECT * FROM `users` WHERE `id` = $uid;";
    
            $result = mysqli_query($conn, $sql);
    
            $row = mysqli_fetch_assoc($result);
    
            if(password_verify($oldPassword, $row['password']) == "true"){
                $hashedpwd = password_hash($newPassword, PASSWORD_DEFAULT);
                $sql = "UPDATE `users` SET `password` = '$hashedpwd' WHERE `id`= {$uid}";
    
                if(mysqli_query($conn, $sql)){
                    header("location: ../src/routes.php?pgname=users"); 
                    exit();
                }else{
                    header("Location: ../src/routes.php?pgname=useredit&userid=".$uid."error=passupdatefailed");
                    exit();
                }
            }else{
                header("Location: ../src/routes.php?pgname=useredit&userid=".$uid."error=passwrong");
                exit();
            }
        }
    }else{
        header("location: ../src/routes.php?pgname=users"); 
    }