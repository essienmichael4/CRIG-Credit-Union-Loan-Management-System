<?php

    function loginUser($username, $password, $conn){

        $sql = "SELECT * FROM `users` WHERE username = '$username' or email = '$username' or workerid = '$username'; ";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);

            $pwdVerify = password_verify($password, $row['password']);

            if($password == $row['password'] || $pwdVerify == "true"){
                session_start();
                $_SESSION["username"] = $row['username'];
                $_SESSION["firstname"] = $row['firstname'];
                $_SESSION["lastname"] = $row['lastname'];
                $_SESSION["othername"] = $row['othername'];
                $_SESSION["workerid"] = $row['workerid'];
                $_SESSION["email"] = $row['email'];
                $_SESSION["usertype"] = $row['usertype'];
                $_SESSION["uid"] = $row['id'];
                header("location: ../src/routes.php");
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