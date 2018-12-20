<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');
$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>Delete Genre</title>
  	<link rel="shortcut icon" href="https://www.chrl.org/wp-content/uploads/2018/08/book-club-clip.png">

	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {



	         if( document.forms["delete_genre"]["GenreName"].value == "" )
	         {
	            alert( "Please provide Genre Name!" );
	            return false;
	         }


	      }
	   //-->
	</script>
</head>
<body>
  <div><h1>Delete Genre</h1></div>
<form name="delete_genre" action="<?php echo base_url(); ?>index.php/library/delete_genre" onsubmit="return validateForm()" method="post">
 Genre Name: <input type="text" name="GenretName" value="<?php echo $genre->GenreName?>"><br>

<?php

 echo    '<input type="hidden" name="studentID" value="'.$genre->GenreID.'">
			<input type="submit" value="Update">
		  </form>';
?>



 <a href="<?php echo base_url();?>library/showallgenres" /><br><input type="button" value=" Back To All genres >>" /></a>
 <a href="<?php echo base_url();?>library/mainpage" /><br><input type="button" value=" Back To mainpage >>" /></a>
 <a href="<?php echo base_url();?>library/logout" /><br><input type="button" value="Logout" /></a>


</body>
</html>
