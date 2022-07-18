<!DOCTYPE html>
<html>

<head>
    <title>Delete</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/mystyle.css">
</head>

<body>
    <?php
$searchName= "";
$nameErr= "Insert Name To Delete!";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $searchName = test_input($_POST["name"]);
	$nameErr= "";   
  }
  
 



}





function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>

    <div>
        <header>
            <h1>TravelX</h1>
            <hr>
        </header>
    </div>
    <div>
        <h2>Delete User</h2>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <fieldset>
                <label><b>Search Name :</b></label>
                <input type="text" name="name" id="name" value="<?php echo $searchName;?>">
                <span class="error">* <?php echo $nameErr;?></span>
                <br><br>
                <input type="submit" name="submit" value="Delete">
            </fieldset>
        </form>
    </div>


    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Credit Card</th>
            <th>Mobile No</th>
            <th>Address</th>
        </tr>
        <?php
if($nameErr == "")
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "otms";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql= "DELETE from user WHERE user_Name LIKE " . "'" . $searchName .  "%" . "'" ;

if ($conn->query($sql) === TRUE) {
  echo "Deleted successfully";
  }else 
{
  echo "Error1: " . $sql . "<br>" . $conn->error;
}

echo "$sql" ;
$conn->close();
}
else
{
	echo "Input Name To Delete!" ;
}

?>



    </table>
    <hr>
    </div>
    <br>

    <a href="viewUser.php">View User</a>


    <div class="footer">
        <p>&copy; Copyright 2020 TravelX.com </p>
    </div>


</body>

</html>