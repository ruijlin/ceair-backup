<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheets/publichome.css">
    <link rel="stylesheet" href="agency1.css">
    <link rel="stylesheet" href="agency3.css">
    <link rel="stylesheet" href="agency2.css">
    <script src="js_validation/package_script.js"></script>

    <style>
    .field {
        display: block;
        margin-bottom: 15px;
    }

    .formArea {
        margin: auto;
        width: 50%;
    }
    .result{
        display: none;
    }
    .row{
        width: 95%;
        margin: auto;
        margin-top: 25px;
        display: flex;
        justify-content: space-between;
    }
    .mn{
        width: 35%;
    }
    .search{
        width: 25%;
    }
    table{
        width: 95%;
        margin: auto;
    }
    </style>

    <title>Public Home</title>
</head>
<body onload="getpackageList('User')">

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
                            <a class="nav-link hover-ani" href="aboutus.php">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="contact_us.php">Contact Us</a>
                        </li>
                        <?php
                            if(isset($_SESSION['name_user'])){
                        ?>
                            <h2>Welcome <?php echo $_SESSION['name_user'];?></h2>
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
        <div class="textarea">
            <div class="row">
                <div class="mn">
                    <h4>Package List Available</h4>
                </div>
                <div class="search">
                    <label>Search : </label>
                    <input type="search" name="search" id="search" onkeyup="search()" onkeydown="hide()">
                    <div class="result">

                    </div>
                </div>
            </div>
            <table>
                <thead>
                    <th>Package Name</th>
                    <th>Package Type</th>
                    <th>Price</th>
                    <th>Transportation Type</th>
                    <th>Residency</th>
                    <th>Tourist Spot</th>
                    <th>Action</th>
                </thead>
                <tbody id="bodyText">
                    
                </tbody>
            </table>
        </div>
    </section>
    
    <section class="footer-menu" id="footermenu" >
        <p align="center">&copy; Copyright 2020 TravelX.com </p>
    </section>

</body>
</html>