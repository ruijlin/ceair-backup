<?php
require_once("db_connection/connection_admin_login.php");
$db = dbConnection();
if(!$db){
  echo "DB NOT CONNECTED";
}
if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
  $email = $_COOKIE['email'];
  $pass = $_COOKIE['password'];
}
global $email;
global $pass;
?>
<!DOCTYPE html>
<html>

<head>
  <script src="js_validation/login_validation.js"></script>
  <link rel="stylesheet" href="stylesheets/login.css">
  <title>Sign in</title>
</head>

<body>
  <section class="parent">
  	<div></div>
  	<div class="main">
    <p class="sign" align="center">Sign in</p>
    <form class="form1" name="form_login" action="" onsubmit="return validateLoginForm()" method="post">
      <input class="un " type="text" align="center" id="mail_id" name="mail_id" placeholder="Username" value="<?=$email;?>">
      <input class="pass" type="password" align="center" id="login_password" name="login_password" placeholder="Password" value="<?=$pass;?>">
      <input  class="submit" type="submit" align="center" name="submit" value="Sign in">
      <?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>
       </form>     
                
    </div>
  </section>
     
</body>

</html>

<?php
  session_start();
  if(isset($_POST['submit'])){
    $email = $_POST['mail_id'];
    $pass = $_POST['login_password'];

    $sql = "select * from user where user_email_ID='$email' and user_Password='$pass'";
    $result = mysqli_query($db,$sql);

    if(mysqli_num_rows($result) == 0){
      echo "NO USER DOUNF";
    }
    else{
      while($row = mysqli_fetch_assoc($result)){
        if($row['role']== "Admin"){
          setcookie('email', $row['user_email_ID'], time() + (86400 * 30), "/");
          setcookie('password', $row['user_Password'], time() + (86400 * 30), "/");
          $_SESSION['name_user'] = $row['user_Name'];
          $_SESSION['user_ID'] = $row['user_ID'];
          header("location: viewUser.php");    
        }
        else if($row['role']== "Agency"){
          setcookie('email', $row['user_email_ID'], time() + (86400 * 30), "/");
          setcookie('password', $row['user_Password'], time() + (86400 * 30), "/");
          $_SESSION['user_ID'] = $row['user_ID'];
          $_SESSION['name_user'] = $row['user_Name'];
          
          header("location: agency.php");
        }
        else if($row['role']== "User" || $row['role']== "user"){
          setcookie('email', $row['user_email_ID'], time() + (86400 * 30), "/");
          setcookie('password', $row['user_Password'], time() + (86400 * 30), "/");
          $_SESSION['user_ID'] = $row['user_ID'];
          $_SESSION['name_user'] = $row['user_Name'];
          header("location: publihome2.php");
        }
      }
      
    }
  }
  
?>