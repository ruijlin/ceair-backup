<?php
$nameErr = $emailErr = $phoneErr = $addressErr = $passwordErr =$confirmpasswordErr = "Insert input";
$name = $email = $phone = $address = $password = $confirmpassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
    else
    {
    	$nameErr = "";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
    else
    {
    	$emailErr = "";
    }
  }
    
  if (empty($_POST["phone"])) {
    $phoneErr = "phone is required";
  } else {
    $phone = test_input($_POST["phone"]);
    
    if (!preg_match("/^[0-9 ]*$/",$phone) || strlen($phone)!=11) {
      $phoneErr = "Invalid phone number";
    }
    else
    {
    	$phoneErr = "";
    }
  }

  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  } else {
    $address = test_input($_POST["address"]);
    $addressErr = "";
  }

 

  if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  } else {
    $password = test_input($_POST["password"]);
    $passwordErr = "";
  }

  if (empty($_POST["confirmpassword"])) {
    $confirmpasswordErr = "Confirm password is required";
  } else {
    $confirmpassword = test_input($_POST["confirmpassword"]);
    if ($confirmpassword != $password) {
      $confirmpasswordErr = "Passwords doesn't match!";
    }
    else
    {
    	$confirmpasswordErr = "";
    }
  }



}





function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>