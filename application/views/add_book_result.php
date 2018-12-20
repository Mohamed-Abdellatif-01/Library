<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>Books</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
					<style media="screen">
						body{
							background: url('https://www.rd.com/wp-content/uploads/2017/11/How-Much-Does-a-Book-Need-to-Sell-to-Be-a-Bestseller-509582812-Billion-Photos-1024x683.jpg') no-repeat center center fixed;

								-webkit-background-size: cover;
									-moz-background-size: cover;
									-o-background-size: cover;
									background-size: cover;
								}
						</style>
			<iframe src="http://free.timeanddate.com/clock/i6jdrp3h/n107/fn7/fs20/tct/pct/ftb/tt0/tw1/tm1/th2" frameborder="0" width="366" height="30" allowTransparency="true"></iframe>


</head>
<body>
	<div><h1 style="font-size: 4vw; text-align: center; color: #fff" class="m-3">Add Book</h1></div>
	<h3 style="font-size: 3vw; text-align: center; color: #fff" class="m-3">Book Added Successfully</h3>

	<a href="<?php echo base_url();?>index.php/library/add_book"><input type="button" value="+ Add Book" class="btn btn-primary btn-block mt-4 col-md-4 offset-md-4 btn-lg"/></a>
	<a href="<?php echo base_url();?>index.php/library/showallitems"><input type="button" value="All Books >>" class="btn btn-success btn-block mt-2 col-md-4 offset-md-4 btn-lg"/></a>
	<a href="<?php echo base_url();?>library/mainpage" /><br><input type="button" value=" Back To mainpage >>" class="btn btn-success  mt-2 col-md-4 offset-md-4" /></a>




</body>
</html>
