<?php
// Start of user session
    session_start();

    // Checking if user session is available, if not routes you back to the login page on line 7
    if(!$_SESSION["uid"]){
        header("location: ../index.php");
    }else{
        // Routing of the web application after sucessful login
        

        // Setting of initial page name
        $controller = "dashboard";

        // Checks if the page name is set, if not sets it.
        if(isset($_GET['pgname'])){
            $controller = $_GET['pgname'];
            $controller = strtolower($controller);
        }else if(!isset($_GET['pgname'])){
            $controller = strtolower($controller);
        }

        //Checks if file exists and routes to the veiw
        if(file_exists("./".$controller.".php")){
            require("header.php");// gets header file
            require("./".$controller.".php");
            require("footer.php");// gets footer file
        }else{
            $controller = "_404";
            require("./".$controller.".php");
        }

        
    }
?>