<!DOCTYPE html>    
	<html>    
	<head>    
	    <title>Search</title>
	    <link rel="stylesheet" type="text/css" href="stylesheets/mystyle.css">        
	</head>    
	<body>
	<?php include 'php_validation\user_search_validation.php';?>

		<div>
			<header><h1>TravelX</h1>
				<hr>
			</header>
		</div>
	 <div>  
		    <h2>Search user</h2>    
		       
		    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		    	 <fieldset>
		    	 	<label><b>Search Name :</b></label>    
			        <input type="text" name="name" id="name" value="<?php echo $searchName;?>">
			        <span class="error">* <?php echo $nameErr;?></span>    
			        <br><br>
			        <input type="submit" name="submit" value="Search">
			    </fieldset>
			</form>
		</div>


			<table>
				<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Mobile No</th>
				<th>Address</th>	
				</tr>
	<?php include 'db_connection\connection_searchUser.php';?>
			</table>
			<hr>
			</div>
			<br>

			<a href="deleteUser.php">Delete User</a>


	<div class="footer">
  	<p>&copy; Copyright 2020 TravelX.com </p>
	</div>
	
		 
	</body>    
	</html>   