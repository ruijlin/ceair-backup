<?php
    session_start();
    if(isset($_SESSION['name_user'])){
        $name = $_SESSION['name_user'];
        $id = $_GET['package_id'];
        $user_id = $_SESSION['user_ID'];
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

<body onload="getpackageById(<?=$id;?>)">
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
                            <a class="menu-title" href="">Customer List</a>
                        </li>
                        <br>
                        <li class="menu-li">
                            <a class="menu-title" href="php_validation/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="textarea">
                <table>
                    <thead>
                        <th colspan=2>Package Details</th>
                    </thead>
                    <tbody id="bodyText">
                        <tr>
                            <th style="width: 15%;">Package name</th>
                            <td id="name"></td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Package Type</th>
                            <td id="type"></td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Price</th>
                            <td id="price"><input type="text" name="priceInp" id="priceInp"></td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Transportation Type</th>
                            <td id="tran_type"></td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Residency</th>
                            <td id="res"></td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Tourist Spot</th>
                            <td id="tSpot"></td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Departure Date</th>
                            <td id=""><input type="date" name="dep_date" id="dep_date"></td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Return date</th>
                            <td id=""><input type="date" name="ret_date" id="ret_date"></td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">no of people</th>
                            <td id=""><input type="number" name="no_people" id="no_people"></td>
                        </tr>
                        <tr>
                            <th style="width: 15%;">Night Stay</th>
                            <td id=""><input type="number" name="night" id="night"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button onclick="confirm(<?=$id;?>,<?=$user_id;?>)">Confirm</button>
                            </td>
                        </tr>
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