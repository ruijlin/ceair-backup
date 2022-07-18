<?php
    session_start();
    require_once("db_connection/connection_admin_login.php");
	$db = dbConnection();
	if(!$db){
	  echo "DB NOT CONNECTED";
	}
    if(isset($_SESSION['name_user'])){
        $name = $_SESSION['name_user'];
        if(isset($_SESSION['user_ID'])){
			$user_id = $_SESSION['user_ID'];
	    	$sql = "select * from user where user_ID='$user_id'";
	    	$res = mysqli_query($db,$sql);
	    	while($row = mysqli_fetch_assoc($res)){
	    		$name = $row['user_Name'];
	    		$email = $row['user_email_ID'];
	    		$phone = $row['mobile_No'];
	    		$address = $row['user_Address'];
	    		$role = $row['role'];
	    	}
        }
    	
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

    <script src="../../../assets/js/admin/dashboard_script.js"></script>
    <style>
        .pro{
            width: 30%;
            margin: auto;
        }
    </style>
    <title>Profile</title>
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
            <div class="fixed-area">

                <div class="menu-list">
                    <ul>
                        <li class="menu-li"></i><a class="menu-title" href="#"></i>DashBoard</a></li>
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
                            <a class="menu-title" href="packageView.php">Package List</a>
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
                <h4>Travel Agency Dashborad</h4>
                
                <div class="pro">
                    <h1>Name : <?=$name;?></h1>
                    <h1>Email : <?=$email;?></h1>
                    <h1>Phone : <?=$phone;?></h1>
                    <h1>role : <?=$role;?></h1>
                    <h1>Address : <?=$address;?></h1>
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