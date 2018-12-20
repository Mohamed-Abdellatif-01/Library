<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');
$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>Genre</title>
	<link rel="shortcut icon" href="https://www.chrl.org/wp-content/uploads/2018/08/book-club-clip.png">


</head>
<body>




<div><h1>Search for Genres</h1></div>
<a href="<?php echo base_url();?>index.php/library/showallgenres"><input type="button" value="All Genres"/></br></a><br><br>
<form action="<?php echo base_url(); ?>library/search_genre_by_name" method="post" >
 Search: <input type="text" name="GenreName"><br>
 <input type="submit" value="Go">
</form><br>


<?php
 if(isset($genre))
 {
	 if(count($genre) == 0)
	 {
		 echo "no results found";
	 }
	 else {
	 	echo '<div><h1>Search result</h1></div>
	  <div class="divTable">
	  <div class="divTableHeading">
	  <div class="divTableRow">
    <div class="divTableHead">Genre ID</div>
    <div class="divTableHead">Genre Name</div>

	  </div>
	  </div>
	  <div class="divTableBody">';


	  			foreach ($genre as $genres) {

	  				echo '<div class="divTableRow">';
            echo '<div class="divTableCell">'.$genres->GenreID.'</div>';
    				echo '<div class="divTableCell">'.$genres->GenreName.'</div>';

	  				echo '</div>';
	  			}
	  	echo"</div></div>";
	 }

	}
 ?>
 <a href="<?php echo base_url();?>library/showallgenres" /><br><input type="button" value=" Back To All Genres >>" /></a>
 <a href="<?php echo base_url();?>library/mainpage" /><br><input type="button" value=" Back To mainpage >>" /></a>
 
<a href="<?php echo base_url();?>library/logout" /><input type="button" value="Logout" /></a>

</body>
</html>
