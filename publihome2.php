<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheets/publichome.css">

    <script src="js_validation/package_script.js"></script>

    <style>
        .profile{
            display: none;
        }
    </style>
    <title>Public Home</title>
</head>
<body >

<!-- Content Area Start-->
    <!-- Header or Banner Area Start-->
     <div class="hg">
            <div class="banner-content">
                <h1>Travel X</h1>
                <p>The one stop service for travelling</p>
            </div>
        </div>
    <section class="header-area">
        <div class="menu-container">
            <nav class="navbar">
                
                <div class="navbar-menulist" id="navbarMenuList">
                    <ul class="navbar-list">
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="#">Home</a>
                        </li>
                        
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="package.php">Packages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="http://localhost:8080/travelx-master/aboutus.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="http://localhost:8080/travelx-master/contact_us.php">Contact Us</a>
                        </li>
                        <?php
                            if(isset($_SESSION['name_user'])){
                        ?>
                            <h2>Welcome <?php echo $_SESSION['name_user'];?></h2>
                            <li class="nav-item btn-align">
                                <button class="nav-link btn-custom" onclick="profile(<?=$_SESSION['user_ID'];?>)">Profile</button>
                            </li>
                            <li class="nav-item btn-align">
                                <a class="nav-link btn-custom" href="php_validation/logout.php">Logout</a>
                            </li>
                        <?php
                            }
                            else{
                        ?>
                            <li class="nav-item btn-align">
                                <a class="nav-link btn-custom" href="registration.php">Sign up</a>
                            </li>
                            <li class="nav-item btn-align">
                                <a class="nav-link btn-custom" href="login.php">Sign in</a>
                            </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </nav>
        </div>
    </section>
    
    <section class="packages">
    
    </section>
    
    <section class="footer-menu" id="footermenu" >
        <p align="center">&copy; Copyright 2020 TravelX.com </p>
    </section>

</body>
</html>