
<?php
    session_start();
    if(isset($_SESSION['name_user'])){
        $name = $_SESSION['name_user'];
    
    global $name;
   
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="agency1.css">
    <link rel="stylesheet" href="agency3.css">
    <link rel="stylesheet" href="agency2.css">
    <!-- <link rel="stylesheet" href="../../../assets/css/profileDetails.css"> -->

    <script src="../../../assets/js/admin/dashboard_script.js" ></script>

    <title>Agency Home</title>
</head>
<body>
    <section>
    <div class="hg">
            <div class="banner-content">
                <h1>Travel X</h1>
                <p>The one stop service for travelling</p>
            </div>
        </div>
        <div class="main">
            <div class="fixed-area" >
    
                <div class="menu-list">
                    <ul>
                        <li class="menu-li"></i><a class="menu-title" href="agency.php"></i>DashBoard</a></li>
                        <li class="menu-li">
                            <a class="menu-title" href="profile.php" >Your Profile</a>    
                        </li>
                        <li class="menu-li">
                            <a class="menu-title" href="default_package.php" >Add Default Package</a>    
                        </li>
                        <li class="menu-li">
                            <a class="menu-title" href="" >Tourist Spot</a>    
                        </li>
                        <li class="menu-li">
                            <a class="menu-title" href="packageView.php" >Package List</a>    
                        </li>
                        <li class="menu-li">
                            <a class="menu-title cusMenu" id="cusMenu" href="">Hotels</a>       
                        </li>

                        <li class="menu-li">
                            <a class="menu-title" href="">Transport</a>
                        </li>
                        <li class="menu-li">
                            <a class="menu-title" href="customerList.php">Customer List</a>
                        </li>
                        <br>
                        <li class="menu-li">
                            <a class="menu-title" href="">Logout</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <div class="textarea">
                <h4>Travel Agency Dashborad</h4>

                <div align = 'center'>
                    <h4>Welcome <?=$name;?></h4>
                </div>
                
            </div>

        </div>
    
    </section>

                   


    
</body>
</html>
<?php
    }
    else{
        header("location: login.php");
    }
?>