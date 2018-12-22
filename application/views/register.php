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
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">
	<div><h2 style="font-size: 4vw; text-align: left; color: #000" class="m-3">Register</h2></div>

	<?php
	if(isset($result))
	{
		echo '<p  style="font-size: 2vw;" class="m-3"> Account added successfully </p>';

 }
	else {
		echo '<form name="register" action="'. base_url().'library/register" onsubmit="return validateForm()" method="post">
	  <p style="color: #fff; font-size: 16pt"> User Name:</p> <input type="text" name="UserName" class=" btn-block  mt-2"><br>
		<p style="color: #fff; font-size: 16pt"> Password:</p> <input type="Password" name="Password" class=" btn-block  mt-2"><br>

    <p style="color: #fff; font-size: 16pt"> First Name: </p><input type="text" name="FirstName" class=" btn-block  mt-2"><br>
    <p style="color: #fff; font-size: 16pt"> Last Name:</p> <input type="text" name="LastName" class=" btn-block  mt-2"><br>';


		 echo '</select>
		    <input type="submit" value="Register" class="btn btn-primary btn-block mt-2 col-md-8 offset-md-2">
		  </form>';
	}
	?>
	<a href="<?php echo base_url();?>library/mainpage" /><input type="button" value=" Back To mainpage >>" class="btn btn-success btn-block mt-4 col-md-6 offset-md-3" /></a>
	<a href="<?php echo base_url();?>library/logout" /><input type="button" value="Logout" class="btn btn-danger btn-block mt-2 mt-2 col-md-4 offset-md-4" /></a>



</div>
</div>
</div>

</body>
</html>
