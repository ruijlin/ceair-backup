<?php

$insertPassword=$password;
;

if($nameErr == "" && $emailErr == "" && $phoneErr == "" && $addressErr == "" && $passwordErr =="" && $confirmpasswordErr == ""  )
{

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "otms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user (user_Name,user_email_ID,mobile_No,user_Address,user_Password,role)
VALUES ('$name', '$email','$phone','$address','$insertPassword','". $userRole. "')";

if ($conn->query($sql) === TRUE) {
  echo "Record created successfully";
}
 else 
{
  echo "Error1: " . $sql . "<br>" . $conn->error;
}



$conn->close();

}
else
{
	echo "Please provide your information properly!";
}




?>