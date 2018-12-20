<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');
$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>Author</title>
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


</head>
<body>




<div><h1  style="font-size: 4vw; text-align: center; color: #fff" class="m-3">Search for Authors</h1></div>
<a href="<?php echo base_url();?>index.php/library/showallauthors"><input type="button" value="All Authors"/></br></a><br><br>
<form action="<?php echo base_url(); ?>library/search_author_by_name" method="post" >
 Search: <input type="text" name="AuthorName"><br>
 <input type="submit" value="Go">
</form><br>


<?php
 if(isset($libauthors))
 {
	 if(count($libauthors) == 0)
	 {
		 echo "no results found";
	 }
	 else {
	 	echo '<div><h1>Search result</h1></div>
	  <div class="divTable">
	  <div class="divTableHeading">
	  <div class="divTableRow">
    <div class="divTableHead">Author ID</div>
    <div class="divTableHead">Author Name</div>
		<div class="divTableHead"> Delete</div>
		

	  </div>
	  </div>
	  <div class="divTableBody">';


	  			foreach ($libauthors as $author) {

	  				echo '<div class="divTableRow">';
            echo '<div class="divTableCell">'.$author->AuthorID.'</div>';
    				echo '<div class="divTableCell">'.$author->AuthorName.'</div>';
						echo '<div class="divTableCell"><a href="'. base_url().'index.php/library/delete_author/'.$author->AuthorID.'">Delete</a></div>';

	  				echo '</div>';
	  			}
	  	echo"</div></div>";
	 }

	}
 ?>
 <a href="<?php echo base_url();?>library/showallauthors" /><br><input type="button" value=" Back To All Authors >>" /></a>
 <a href="<?php echo base_url();?>library/mainpage" /><br><input type="button" value=" Back To mainpage >>" /></a>
<a href="<?php echo base_url();?>library/logout" /><input type="button" value="Logout" /></a>

</body>
</html>
