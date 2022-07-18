<!DOCTYPE HTML>
<HTML>
<HEAD>
</HEAD>
<BODY>
<?php
$q = intval($_GET['q']);

$con = mysqli_connect("localhost","root","");
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"otms");
$sql="SELECT user_ID,user_Name,user_email_ID,mobile_No,user_Address FROM user WHERE user_ID = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Mobile No</th>
			<th>Address</th>	
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['user_ID'] . "</td>";
  echo "<td>" . $row['user_Name'] . "</td>";
  echo "<td>" . $row['user_email_ID'] . "</td>";
  echo "<td>" . $row['mobile_No'] . "</td>";
  echo "<td>" . $row['user_Address'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>

</BODY>
</HTML>