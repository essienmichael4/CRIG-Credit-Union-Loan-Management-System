<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/styles.css">

    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <header class="sidebar__header header p1">
                <h1>Loan app</h1>
            </header>
            <nav class="sidebar__nav nav">
                <ul class="nav__list">
                <?php
                        if($_GET['pgname']=="dashboard" || !$_GET['pgname']){
                            echo '<li class="list__item"><a href="?pgname=dashboard" class="item__link active py1"><span><i class="fas fa-home"></i> Dashboard</span></a></li>';
                        }else{
                            echo '<li class="list__item"><a href="?pgname=dashboard" class="item__link py1"><span><i class="fas fa-home"></i> Dashboard</span></a></li>';
                        }

                        if($_GET['pgname']=="loans" || $_GET['pgname']=="loandetails"){
                            echo '<li class="list__item "><a href="?pgname=loans" class="item__link active py1"><span><i class="fas fa-piggy-bank"></i> loans</span></a></li>';
                        }else{
                            echo '<li class="list__item "><a href="?pgname=loans" class="item__link py1"><span><i class="fas fa-piggy-bank"></i> loans</span></a></li>';
                        }

                        if($_GET['pgname']=="apply"){
                            echo '<li class="list__item "><a href="?pgname=apply" class="item__link active py1"><span><i class="fas fa-fill"></i> loan Application</span></a></li>';
                        }else{
                            echo '<li class="list__item "><a href="?pgname=apply" class="item__link py1"><span><i class="fas fa-fill"></i> loan Application</span></li>';
                        }

                        if($_GET['pgname']=="users"|| $_GET['pgname']=="useredit"){
                            echo '<li class="list__item "><a href="?pgname=users" class="item__link active py1"><span><i class="fas fa-users"></i> users</span></a></li>';
                        }else{
                            echo '<li class="list__item "><a href="?pgname=users" class="item__link py1"><span><i class="fas fa-users"></i> users</span></a></li>';
                        }
                ?>
                    <!-- <li class="list__item "><a href="./index.html" class="item__link active py1"><span><i class="fas fa-home"></i> Dashboard</span></a></li>                     -->
                    <!-- <li class="list__item "><a href="./loans.html" class="item__link py1"><span><i class="fas fa-home"></i> loans</span></a></li>                    
                    <li class="list__item "><a href="./apply.html" class="item__link py1"><span><i class="fas fa-home"></i> loan Application</span></a></li>                    
                    <li class="list__item "><a href="./users.html" class="item__link py1"><span><i class="fas fa-home"></i> users</span></a></li>                    
                    <li class="list__item "><a href="" class="item__link py1"><span><i class="fas fa-home"></i> home</span></a></li>                     -->
                </ul>
            </nav>
            <footer class="sidebar__footer flex-c">
                <h3 class=".p">created by Michael Essein</h3>
                <p>copyrights &copy; 2022</p> 
                <p>all rights reserved</p>
            </footer>
        </aside>