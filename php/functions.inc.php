<?php

    function emptyField($data){
        $result = true;
        if(empty($data)){
            return $result = true;
        } else{
            return $result = false;
        }
    }

    function invalidUsername($username){
        $result = true;
        if(!preg_match('/^[a-zA-Z0-9]*$/', $username )){
            return $result = true;
        } else{
            return $result = false;
        }
    }

    //Check for invalid email
    function invalidEmail($email){
        $result = true;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return $result = true;
        } else{
            return $result = false;
        }
    }

    //Password Check
    function invalidPassword($pwd, $pwdCheck){
        $result=true;
        if($pwd !== $pwdCheck){
            return $result = true;
        } else{
            return $result = false;
        }
    }

    function loginUser($username, $password, $conn){

        $sql = "SELECT * FROM `users` WHERE username = '$username' or email = '$username' or worker_id = '$username'; ";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);

            $pwdVerify = password_verify($password, $row['password']);

            if($password == $row['password'] || $pwdVerify == "true"){
                session_start();
                $_SESSION["username"] = $row['username'];
                $_SESSION["firstname"] = $row['first_name'];
                $_SESSION["lastname"] = $row['last_name'];
                // $_SESSION["othername"] = $row['othername'];
                $_SESSION["worker_id"] = $row['workerid'];
                $_SESSION["email"] = $row['email'];
                $_SESSION["usertype"] = $row['role'];
                $_SESSION["uid"] = $row['id'];
                header("location: ../src/routes.php?pgname=dashboard");
            }else{
                header("location: ../index.php?error=wrongpwd&user=".$username);
            }
        }else{
            header("location: ../index.php?error=userNotExist");
        }
    }

    function show($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }