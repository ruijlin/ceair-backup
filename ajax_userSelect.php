<html>
<head>
<script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","ajaxUser.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
<link rel="stylesheet" type="text/css" href="stylesheets/mystyle.css"> 	
</head>
<body>

	<div>
			<header><h1>TravelX</h1>
				<hr>
			</header>
		</div>




<form>
<select name="users" onchange="showUser(this.value)">
<option value="">Select a person:</option>
<option value="1001">Zahin</option>
<option value="1002">Siam</option>

</select>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here.</b></div>



</body>
</html>