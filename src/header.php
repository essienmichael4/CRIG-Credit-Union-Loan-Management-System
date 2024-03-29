<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRIG QUALITY CLUB</title>
    <link rel="stylesheet" href="../css/styles.css">

    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
</head>
<body class="">
    <div class="container">
        <aside class="sidebar">
            <header class="sidebar__header header p1">
                <h1>CRIG QUALITY CLUB</h1>
            </header>
            <nav class="sidebar__nav nav">
                <ul class="nav__list">
                    <?php
                        if($_GET['pgname']=="dashboard" || !$_GET['pgname']){
                            echo '<li class="list__item"><a href="?pgname=dashboard" class="item__link active py1"><span><i class="fas fa-home"></i> Dashboard</span></a></li>';
                        }else{
                            echo '<li class="list__item"><a href="?pgname=dashboard" class="item__link py1"><span><i class="fas fa-home"></i> Dashboard</span></a></li>';
                        }
                    ?>

                    <?php
                        if($_GET['pgname']=="savings" || $_GET['pgname']=="savingdetails"|| $_GET['pgname']=="editsavingaccount" || $_GET['pgname']=="applysavings"){
                    ?>
                        <li class="list__item ">
                            <div class="item__link active saving_sub py1">
                                <span>
                                <i class="fas fa-th-large"></i>
                                    Savings
                                    <i class="fas fa-angle-down arrow"></i> 
                                </span>
                                <ol class="saving_sub_menus hide">
                                    
                                        <?php
                                            if($_GET['pgname']=="savings" || $_GET['pgname']=="savingdetails"){
                                                echo '<li>
                                                <a href="?pgname=savings" class=" active py1"><span><i class="fas fa-piggy-bank"></i> savings</span></a></li>';
                                            }else{
                                                echo '<li>
                                                <a href="?pgname=savings" class=" py1"><span><i class="fas fa-piggy-bank"></i> savings</span></a></li>';
                                            }

                                        ?>
                                    
                                    
                                        <?php
                                            if($_GET['pgname']=="applysavings"){
                                                echo '<li>
                                                <a href="?pgname=applysavings" class="active py1"><span><i class="fab fa-wpforms"></i> savings Application</span></a></li>';
                                            }else{
                                                echo '<li>
                                                <a href="?pgname=applysavings" class="py1"><span><i class="fab fa-wpforms"></i> savings Application</span></a></li>';
                                            }
                                        ?>
                                       
                                </ol>
                            </div>
                        </li>
                    <?php
                        }else{
                    
                        echo '<li class="list__item ">
                            <div class="item__link saving_sub py1">
                                <span>
                                <i class="fas fa-th-large"></i>
                                    savings
                                    <i class="fas fa-angle-down arrow"></i> 
                                </span>
                                <ol class="saving_sub_menus">
                                    <li>
                                        <a href="?pgname=savings" class="py1"><span><i class="fas fa-piggy-bank"></i> savings</span></a>
                                    </li>
                                    <li>
                                        <a href="?pgname=applysavings" class="py1"><span><i class="fab fa-wpforms"></i> savings Application</span></a>
                                    </li>   
                                </ol>
                            </div>
                        </li>';
                    
                        }
                    ?>

                    <?php
                        if($_GET['pgname']=="loans" || $_GET['pgname']=="loandetails" || $_GET['pgname']=="apply"){
                    ?>
                        <li class="list__item ">
                            <div class="item__link active loan_sub py1">
                                <span>
                                <i class="fas fa-boxes"></i>
                                    loans
                                    <i class="fas fa-angle-down arrow"></i> 
                                </span>
                                <ol class="loan_sub_menus hide">
                                    
                                        <?php
                                            if($_GET['pgname']=="loans" || $_GET['pgname']=="loandetails"){
                                                echo '<li>
                                                <a href="?pgname=loans" class=" active py1"><span><i class="far fa-credit-card"></i> loans</span></a></li>';
                                            }else{
                                                echo '<li>
                                                <a href="?pgname=loans" class=" py1"><span><i class="far fa-credit-card"></i> loans</span></a></li>';
                                            }

                                        ?>
                                    
                                    
                                        <?php
                                            if($_GET['pgname']=="apply"){
                                                echo '<li>
                                                <a href="?pgname=apply" class="active py1"><span><i class="fas fa-fill"></i> loan Application</span></a></li>';
                                            }else{
                                                echo '<li>
                                                <a href="?pgname=apply" class="py1"><span><i class="fas fa-fill"></i> loan Application</span></a></li>';
                                            }
                                        ?>
                                       
                                </ol>
                            </div>
                        </li>
                    <?php
                        }else{
                    
                        echo '<li class="list__item ">
                            <div class="item__link loan_sub py1">
                                <span>
                                <i class="fas fa-boxes"></i>
                                    loans
                                    <i class="fas fa-angle-down arrow"></i> 
                                </span>
                                <ol class="loan_sub_menus">
                                    <li>
                                        <a href="?pgname=loans" class="py1"><span><i class="far fa-credit-card"></i> loans</span></a>
                                    </li>
                                    <li>
                                        <a href="?pgname=apply" class="py1"><span><i class="fas fa-fill"></i> loan Application</span></a>
                                    </li>   
                                </ol>
                            </div>
                        </li>';
                    
                        }
                    ?>

                    <?php
                        if($_GET['pgname']=="expenses"){
                            echo '<li class="list__item"><a href="?pgname=expenses" class="item__link active py1"><span><i class="fab fa-bity"></i> Expenses</span></a></li>';
                        }else{
                            echo '<li class="list__item"><a href="?pgname=expenses" class="item__link py1"><span><i class="fab fa-bity"></i> Expenses</span></a></li>';
                        }
                    ?>

                    <?php
                        if($_GET['pgname']=="analytics"){
                            echo '<li class="list__item"><a href="?pgname=analytics" class="item__link active py1"><span><i class="fas fa-bacon"></i> Analytics</span></a></li>';
                        }else{
                            echo '<li class="list__item"><a href="?pgname=analytics" class="item__link py1"><span><i class="fas fa-bacon"></i> Analytics</span></a></li>';
                        }
                    ?>
                    

                    <?php

                        if($_GET['pgname']=="users"|| $_GET['pgname']=="useredit"){
                            echo '<li class="list__item "><a href="?pgname=users" class="item__link active py1"><span><i class="fas fa-users"></i> users</span></a></li>';
                        }else{
                            echo '<li class="list__item "><a href="?pgname=users" class="item__link py1"><span><i class="fas fa-users"></i> users</span></a></li>';
                        }
                    ?>
                    
                </ul>
            </nav>
            <footer class="sidebar__footer flex-c">
                <h3 class=".p">created by Michael Essien</h3>
                <p>copyrights &copy; 2022</p> 
                <p>all rights reserved</p>
            </footer>
        </aside>
        <div class="main">
            <header class="main__header flex px1">
                <h2 class=""><?php
                if($_GET["pgname"] == "applysavings" || $_GET["pgname"] == "savingdetails" ||
                $_GET["pgname"] == "editsavingaccount"){
                    echo "savings";
                }elseif($_GET["pgname"] == "apply" || $_GET["pgname"] == "loandetails"){
                    echo "Loans";
                }  else{
                    echo $_GET["pgname"];
                }?></h2>
                <!-- <form class="search" action="../php/search.php" method="POST">
                    <input type="text" class="search__input" name="inputsearch" placeholder="Search">
                    <button name="search" class="search__btn">Search</button>
                </form> -->
                <div class="user flex">
                    <span class="flex">C</span>
                    <p><?=$_SESSION["firstname"].' '.$_SESSION["lastname"]?></p>
                    <i class="fas fa-angle-down"></i>
                </div>
                
                <div class="userdetails">
                    <p><?=$_SESSION["username"]?></p>
                    <a href="?pgname=useredit&userid=<?=$_SESSION["uid"]?>">edit user</a>
                    <form action="../php/logout.inc.php"><button type="submit">logout</button></form>
                </div>
            </header>