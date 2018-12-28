<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');
$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>Add edition</title>
  	<link rel="shortcut icon" href="https://www.chrl.org/wp-content/uploads/2018/08/book-club-clip.png">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<iframe src="http://free.timeanddate.com/clock/i6jdrp3h/n107/fn7/fs20/tct/pct/ftb/tt0/tw1/tm1/th2" frameborder="0" width="366" height="30" allowTransparency="true"></iframe>

		<style media="screen">
		body{
	background: url('https://comms.worldreader.org/wp-content/uploads/2014/09/authors-thin1.jpg') no-repeat center center fixed;

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



	         if( document.forms["add_edition"]["ISBN"].value == "" )
	         {
	            alert( "Please provide ISBN !" );
	            return false;
	         }

				  if( document.forms["add_edition"]["EditionNum"].value == "" )
				  {
			  alert( "Please provide edition number !" );
		    return false;
			   }
			 if( document.forms["add_edition"]["PrintDate"].value == "" )
			 	{
				 alert( "Please provide print date !" );
				 return false;
			 	}
				if( document.forms["add_edition"]["ISBN"].value <= 0 )
		 		{
		 		 alert( "Please provide ISBN greater than 0!" );
		 		 return false;
		 		}
				if( document.forms["add_edition"]["EditionNum"].value <= 0 )
				{
				 alert( "Please provide edition number greater than 0!" );
				 return false;
				}

	      }
	   //-->
	</script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 offset-md-2">

	<div><h1  style="font-size: 4vw; text-align: center; color: #fff" class="m-3"> Municipality Library</h1></div>
	<div><h1  style="font-size: 3vw; text-align: center; color: #fff" class="m-3">Add edition</h1></div>
	<?php
	if(isset($result))
	{
		echo '<p  style="font-size: 2vw;" class="m-3">Edition added successfully to the book</p>';

	}
	else {
		echo '<form name="add_edition" action="'. base_url().'index.php/library/add_edition_by_id_result" onsubmit="return validateForm()" method="post">
		 <p style="color: #fff; font-size: 18pt" > ISBN:</p> <input type="text" name="ISBN"  pattern="[0-9]+" title="no letters allowed" class=" btn-block  mt-2 col-md-8 offset-md-2" placeholder="ISBN number">
      <p style="color: #fff; font-size: 18pt" > Edition number:</p> <input type="text" name="EditionNum"  pattern="[0-9]+" title="no letters allowed" class=" btn-block  mt-2 col-md-8 offset-md-2" placeholder="Edition number number">
      <p style="color: #fff; font-size: 18pt" > Print date:</p> <input type="date" name="PrintDate" class=" btn-block  mt-2 col-md-8 offset-md-2" placeholder="Print date">
      <br><br>';

     echo ' <input type="hidden" name="BookID" value="'.$BookID.'">
		 <input type="submit" value="Submit" class="btn btn-primary btn-block  mt-2 col-md-8 offset-md-2">
    		  </form>';

	}
	?>



 <a href="<?php echo base_url();?>library/showallitems" /><input type="button" value=" Back To All books >>" class="btn btn-success btn-block mt-5 col-md-6 offset-md-3" /></a>
 <a href="<?php echo base_url();?>library/mainpage" /><input type="button" value=" Back To mainpage >>" class="btn btn-success btn-block mt-2 col-md-6 offset-md-3" /></a>
 <a href="<?php echo base_url();?>library/logout" /><input type="button" value="Logout" class="btn btn-danger btn-block mt-3 col-md-4 offset-md-4"/></a>

</div>
</div>
</div>
</body>
</html>
