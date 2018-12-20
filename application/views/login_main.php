<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
//isset($_SESSION['isuserloggedin'])  OR exit('please login <a href="'.base_url().'">login here</a>');


?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Municipality Library login</title>
	<link rel="shortcut icon" href="https://www.chrl.org/wp-content/uploads/2018/08/book-club-clip.png">
							<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
							<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
							<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
							<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
					<style media="screen">
body{
background: url('https://static1.squarespace.com/static/5aa49e82b40b9d681b6ec95d/t/5aa9d288e4966b4716218def/1521080268155/paper_book_folded_in_heart_shape.jpg.650x0_q70_crop-smart.jpg') no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}
</style>

	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {

	         if( document.forms["login"]["UserName"].value == '' )
	         {
	            alert( "Please provide User name!" );
	            return false;
	         }

	         if( document.forms["login"]["Password"].value == '' )
	         {
	            alert( "Please provide Password!" );
	            return false;
	         }


	      }
	   //-->
	</script>


</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">

<div><h1 style="font-size: 4vw; text-align: center; color: #fff" class="m-3">Welcome To Municipality Library</h1></div>
<div><h2 style="font-size: 4vw; text-align: left; color: #000" class="m-3">Login</h2></div>


<form name="login" action="<?php echo base_url(); ?>library/login" method="post" onsubmit="return validateForm()">
 UserName: <input type="text" name="UserName" class=" btn-block  mt-2"><br>
 Password: <input type="password" name="Password" class=" btn-block  mt-2"><br><br><br>
 <input type="submit" value="Login" class="btn btn-primary btn-block mt-2 col-md-6 offset-md-3">
</form>


</div>
</div>
</div>

</body>
</html>
