function validateLoginForm() 
{
	  var test_email = document.forms["form_login"]["mail_id"].value;
	  var test_password = document.forms["form_login"]["login_password"].value;
	  
	  if(test_email == "" || test_password == "")
	   {
	         alert("inputs must be filled");
	         return false;
	   }
	   else if( test_email.indexOf("@")==-1 || test_email.indexOf(" ")!= -1 ) 
	   {
	   		 alert("Invalid Email");
	         return false;
	   }




}
