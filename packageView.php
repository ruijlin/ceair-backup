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
    <title>Default Packages</title>
</head>

<body onload="getpackageList('agency')">
    <section>
        <div class="hg">
            <div class="banner-content">
                <h1>Travel X</h1>
                <p>The one stop service for travelling</p>
            </div>
        </div>
        <div class="main">
            <div class="fixed-area">
                <div class="menu-list">
                    <ul>
                        <li class="menu-li"></i><a class="menu-title" href="agency.php"></i>DashBoard</a></li>
                        <li class="menu-li">
                            <a class="menu-title" href="profile.php">Your Profile</a>
                        </li>
                        <li class="menu-li">
                            <a class="menu-title" href="default_package.php">Add Default Package</a>
                        </li>
                        <li class="menu-li">
                            <a class="menu-title" href="">Tourist Spot</a>
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
                            <a class="menu-title" href="php_validation/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="textarea">
                <div class="row">
                    <div class="mn">
                        <h4>Travel Agency Dashborad</h4>
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