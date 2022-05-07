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
        $passwordrep = mysqli_real_escape_string($conn,$_POST["passwordrepeat"]);
    
        if(emptyField($firstname) || emptyField($lastname) || emptyField($username) ||
            emptyField($email) || emptyField($staffnumber) || emptyField($phonenumber)
            || emptyField($role) || emptyField($password) || emptyField($passwordrep)){
                
                header("location: ../src/routes.php?pgname=apply&error=emptyinput"); 
    
            }else{
                if($password != $passwordrep){
                    header("location: ../src/routes.php?pgname=apply&error=pwddonotmatch"); 
                }else{
                    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
                
                    $sql = "SELECT * FROM `users` WHERE `email` = '{$email}' OR `username` = '{$username}' OR `worker_id` = '{$staffnumber}';";
                
                    $result = mysqli_query($conn, $sql);
                
                    if($row = mysqli_fetch_assoc($result)){
                        header("location: ../src/routes.php?pgname=apply&error=userexists"); 
                    }else{
                        $sql = "INSERT INTO `users`(`first_name`, `last_name`,`other_names`, `email`, `worker_id`, `username`,`role`, `password`) 
                        VALUES('$firstname','$lastname', ''$othernames,'$email', '$staffnumber', '$username', '$role', '$hashedpwd')";
                
                        if(mysqli_query($conn, $sql)){
                            header("location: ../src/routes.php?pgname=users"); 
                        }else{
                            header("location: ../src/routes.php?pgname=users&error=sqlerror"); 
                        }
                    }
                }
    
            }
    }else{
        header("location: ../src/routes.php?pgname=users"); 
    }



