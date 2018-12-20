<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');
$this->load->helper('url');

?>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>Municipality Library Register</title>
  <link rel="shortcut icon" href="https://www.chrl.org/wp-content/uploads/2018/08/book-club-clip.png">

	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {

	         if( document.forms["register"]["UserName"].value == "" )
	         {
	            alert( "Please provide User name!" );
	            return false;
	         }

	         if( document.forms["register"]["Password"].value == "" )
	         {
	            alert( "Please providet Password!" );
	            return false;
	         }
					 if( document.forms["register"]["FirstName"].value == "" )
	         {
	            alert(  "Please provide First Name!" );
	            return false;
	         }
           if( document.forms["register"]["lastName"].value == ""  )
           {
              alert(  "Please provide Last Name!" );
              return false;
           }
	      }
	   //-->
	</script>
</head>
<body>
	<div><h1>Register</h1></div>
	<?php
	if(isset($result))
	{
		echo " Account added successfully";

 }
	else {
		echo '<form name="register" action="'. base_url().'library/register" onsubmit="return validateForm()" method="post">
	   User Name: <input type="text" name="UserName"><br>
		 Password: <input type="text" name="Password"><br>
		 Password: <input type="Password" name="Password"><br>

     First Name: <input type="text" name="FirstName"><br>
     Last Name: <input type="text" name="LastName"><br>';


		 echo '</select>
		    <input type="submit" value="Register">
		  </form>';
	}
	?>
<br><a href="<?php echo base_url();?>library/" /><input type="button" value="Login" /></a>





</body>
</html>
