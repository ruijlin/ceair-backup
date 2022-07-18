<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="stylesheets/registration.css">
  <title>Sign up</title>
</head>

<body>

<?php 
$userRole= 'Agency' ;
?>

 <?php include 'php_validation\user_registration_validation.php';?>

  <section class="parent">
    <div></div>
    <div class="main">
    <p class="sign" align="center">Sign Up!</p>
    <p align="center"> <a href="registration.php">Are you a client?CLick here to register</a></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
      <div align="center">
      Name <input class="un" type="text" name="name" id="name" align="center" placeholder="name" value="<?php echo $name;?>">
      <span class="error">* <?php echo $nameErr;?></span>
      <br>     
      Email <input class="un" type="text" name="email" id="email" align="center" placeholder="email" value="<?php echo $email;?>">
      <span class="error">* <?php echo $emailErr;?></span>    
      <br>
      Phone <input class="un" type="text" name="phone" id="phone" align="center" placeholder="phone" value="<?php echo $phone;?>">
      <span class="error">* <?php echo $phoneErr;?></span>
      <br>
      Adress <input class="un" type="text" name="address" id="address" align="center" placeholder="name" value="<?php echo $address;?>">
      <span class="error">* <?php echo $addressErr;?></span>    
      <br>
      <br>

      Password<input class="pass" type="password" name="password" id="password" align="center" placeholder="Password" value="<?php echo $password;?>">
      <span class="error">* <?php echo $passwordErr;?></span>
      <br>
      Confirm Password <input class="pass" type="password" name="confirmpassword" id="confirmpassword" align="center" placeholder="Confirm Password" value="<?php echo $confirmpassword;?>">
      <br>
      <span class="error">* <?php echo $confirmpasswordErr;?></span>  
      <br>
      <br>

      <input  class="submit" type="submit" align="center" name="submit" value="Sign in">
      </form>

  
       </div>     
          <br> <br>     
    
  </section>

  <?php include 'db_connection\connection_user_registration.php';?>
     
</body>

</html>