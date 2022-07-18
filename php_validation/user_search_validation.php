<?php
	$searchName= "";
	$nameErr= "Insert Name To Search";

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