<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="theme-color" content="#9d4edd"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/styles.css">

    <link rel="stylesheet" href="./css/fontawesome.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <title>CRIG QUALITY CLUB</title>
</head>
<body>
        <div class="hero">
            <h1>CRIG QUALITY CLUB MANAGEMENT SYSTEM</h1>
            <form action="./php/login.inc.php" method="POST" class="login">
                <h2>Welcome back...</h2>
                <p>Please enter your username or email or worker id and password.</p>
                <div class="formControl">
                    <?php
                        if(isset($_GET["user"])){
                            echo '<input type="text" name="username" placeholder="Username or Email..." value="'.$_GET["user"].'">';
                        }else{
                            echo '<input type="text" name="username" placeholder="Username or Email...">';
                        }
                    ?>
                    <!-- <input type="text" placeholder="Username or Email..."> -->
                    <i class="fas fa-user"></i>
                </div>
                <div class="formControl">
                    
                    <input type="password" class="pwd" placeholder="Password..." name="password">
                    <i class="fas fa-eye password" onclick='passwordShow("pwd")'></i>
                </div>

                <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "userNotExist"){
                        echo '<p class="err">User does not Exist</p>';
                    }else if($_GET["error"] == "wrongpwd"){
                        echo '<p class="err">Wrong Passsword</p>';
                    }
                }
                ?>
                <!-- <p class="err">username not available</p> -->
                <button>Login ...</button>

                <hr>

                <p>Forgot passsword or Don't have an account?</p>
                <span>Contact Manager ...</span>
            </form>
        </div>
</body>

<script src="./js/password.js"></script>
</html>