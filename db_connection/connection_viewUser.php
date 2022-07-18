<?php
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "otms";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql= "SELECT * from user";
$result = $conn-> query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["user_ID"]. "</td><td>" . $row["user_Name"] . "</td><td>" . $row["user_email_ID"]. "</td><td>" . $row["mobile_No"]. "</td><td>" . $row["user_Address"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();

?>