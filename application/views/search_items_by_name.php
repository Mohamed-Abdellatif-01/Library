<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');
$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>Items</title>
	<link rel="shortcut icon" href="https://www.chrl.org/wp-content/uploads/2018/08/book-club-clip.png">
			<?php
			//html tool (bootstrap)
			?>
		                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

				<?php
				//clock and date
				?>
					<iframe src="http://free.timeanddate.com/clock/i6jdrp3h/n107/fn7/fs20/tct/pct/ftb/tt0/tw1/tm1/th2" frameborder="0" width="366" height="30" allowTransparency="true"></iframe>

							  <style media="screen">
		body{
		  background: url('https://www.rd.com/wp-content/uploads/2017/11/How-Much-Does-a-Book-Need-to-Sell-to-Be-a-Bestseller-509582812-Billion-Photos-1024x683.jpg') no-repeat center center fixed;
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

						 if( document.forms["searchitemsbyname"]["BookTittle"].value == "" )
						 {
								alert( "Please provide Book title!" );
								return false;
						 }
					}
			 //-->
		</script>
</head>
<body>

	<div class="container-fluid">


				<h3 style="font-size: 4vw; text-align: center; color: #fff" class="m-3">Municipality Library</h3>



			<div><h1 style="font-size: 4vw; text-align: center; color: #fff" class="m-3">Search</h1></div>

<form name="searchitemsbyname" action="<?php echo base_url(); ?>library/search_items_by_name" onsubmit="return validateForm()" method="post" >
 <p style="color: #fff; font-size: 18pt;" class=" btn-block  mt-2">Search :<p> <input type="text" name="BookTittle" placeholder="Book title" >
 <input type="submit" value="Search" class="btn btn-info">
				</form><br>


				<?php
				 if(isset($items))
				 {
					 if(count($items) == 0)
					 {
						 echo '<div style="color: #fff; font-size: 18pt;">No results found.</div>';
					 }
					 else {
						 	echo '<div><h1 style="font-size: 2vw;  color: #fff" class="m-3">Search result</h1></div>
						  <div class="divTable">
						  <div class="divTableHeading">
					  <div class="divTableRow">
				    <div class="divTableHead">ISBN</div>
				    <div class="divTableHead">BookTittle</div>
				    <div class="divTableHead">Number Of Pages</div>
				    <div class="divTableHead">Publishing Date</div>
				    <div class="divTableHead">Edition Num</div>
				    <div class="divTableHead">Print Date</div>
				    <div class="divTableHead">Quantity</div>
				    <div class="divTableHead">Best Of Collection</div>
				    <div class="divTableHead">Author</div>
				    <div class="divTableHead">Type</div>
				    <div class="divTableHead">Genre</div>
					  </div>
					  </div>
					  <div class="divTableBody">';


					  			foreach ($items as $item) {

					  				echo '<div class="divTableRow">';
				            echo '<div class="divTableCell" style="color: #000000; background-color:#D9F9FA;">'.$item->ISBN.'</div>';
				    				echo '<div class="divTableCell" style="color: #000000; background-color:#D9F9FA;">'.$item->BookTittle.'</div>';
				    				echo '<div class="divTableCell" style="color: #000000; background-color:#D9F9FA;">'.$item->NumOfPages.'</div>';
				    				echo '<div class="divTableCell" style="color: #000000; background-color:#D9F9FA;">'.$item->PublishingDate.'</div>';
				    				echo '<div class="divTableCell" style="color: #000000; background-color:#D9F9FA;">'.$item->EditionNum.'</div>';
				            echo '<div class="divTableCell" style="color: #000000; background-color:#D9F9FA;">'.$item->PrintDate.'</div>';
				            echo '<div class="divTableCell" style="color: #000000; background-color:#D9F9FA;">'.$item->Quantity.'</div>';
				    				echo '<div class="divTableCell" style="color: #000000; background-color:#D9F9FA;">'.$item->BestOfCollection.'</div>';
				            echo '<div class="divTableCell" style="color: #000000; background-color:#D9F9FA;">'.$item->AuthorName.'</div>';
				            echo '<div class="divTableCell" style="color: #000000; background-color:#D9F9FA;">'.$item->NameOfType.'</div>';
				            echo '<div class="divTableCell" style="color: #000000; background-color:#D9F9FA;">'.$item->GenreName.'</div>';
					  				echo '</div>';
					  			}
					  	echo"</div></div>";
					 }

					}
				 ?>
				 <div style="text-align: left;">
				 <a href="<?php echo base_url();?>library/showallitems" /><br><input type="button" value=" Back To All Items >>"class="btn btn-info  mt-2" /></a>
				 <a href="<?php echo base_url();?>library/mainpage" /><br><input type="button" value=" Back To mainpage >>"class="btn btn-info  mt-2" /></a><br>
				<a href="<?php echo base_url();?>library/logout" /><input type="button" value="Logout" class="btn btn-info  mt-2"/></a>
			</div>
</div>
<br>
<br>

</body>
</html>
