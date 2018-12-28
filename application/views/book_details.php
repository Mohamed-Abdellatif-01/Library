
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


	                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	            <style media="screen">
	body{
		background: url('http://portal.sdl.edu.sa/arabic/wp-content/uploads/punjab-digital-library-in-pipeline-1388182958-8431.jpg') no-repeat center center fixed;

	  -webkit-background-size: cover;
	  -moz-background-size: cover;
	  -o-background-size: cover;
	  background-size: cover;
	}
	</style>
<iframe src="http://free.timeanddate.com/clock/i6jdrp3h/n107/fn7/fs20/tct/pct/ftb/tt0/tw1/tm1/th2" frameborder="0" width="366" height="30" allowTransparency="true"></iframe>

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

				<h3 style="font-size: 4vw; text-align: center; color: #fff" class="m-3">Welcome To Municipality Library</h3>



<div><h1 style="font-size: 4vw; text-align: center; color: #fff" class="m-3">All Items</h1></div>



<form name="searchitemsbyname" action="<?php echo base_url(); ?>library/search_items_by_name" onsubmit="return validateForm()" method="post">
 <div style="color: #fff; font-size:20pt;">Search:</div> <input type="text" name="BookTittle" placeholder="Book title">
 <input type="submit" value="Search"  class="btn btn-primary btn-sm">
</form><br>

<div class="divTable">
<div class="divTableHeading">
<div class="divTableRow">
<div class="divTableHead">BookTittle</div>
<div class="divTableHead">ISBN</div>
<div class="divTableHead">Edition Num</div>
<div class="divTableHead">Print Date</div>

<div class="divTableHead">Number Of Pages</div>
<div class="divTableHead">Publishing Date</div>
<div class="divTableHead">Quantity</div>
<div class="divTableHead">Best Of Collection</div>
<div class="divTableHead">Author</div>
<div class="divTableHead">Type</div>
<div class="divTableHead">Genre</div>
<div class="divTableHead">Edit</a></div>
<div class="divTableHead">Delete</a></div>
<div class="divTableHead">Add edition</a></div>
<div class="divTableHead">delete edition</a></div>

</div>
</div>
<div class="divTableBody">

      <?php
			foreach ($itemdetails as $item) {

				echo '<div class="divTableRow">';

				echo '<div class="divTableCell"  style="color: #000000; background-color:#D9F9FA;">'.$item->BookTittle.'</div>';
				echo '<div class="divTableCell"  style="color: #000000; background-color:#D9F9FA">'.$item->ISBN.'</div>';

				echo '<div class="divTableCell"  style="color: #000000; background-color:#D9F9FA">'.$item->EditionNum.'</div>';
				echo '<div class="divTableCell"  style="color: #000000; background-color:#D9F9FA">'.$item->PrintDate.'</div>';

				echo '<div class="divTableCell"  style="color: #000000; background-color:#D9F9FA;">'.$item->NumOfPages.'</div>';
				echo '<div class="divTableCell"  style="color: #000000; background-color:#D9F9FA">'.$item->PublishingDate.'</div>';
				echo '<div class="divTableCell"  style="color: #000000; background-color:#D9F9FA">'.$item->Quantity.'</div>';
				echo '<div class="divTableCell"  style="color: #000000; background-color:#D9F9FA">'.$item->BestOfCollection.'</div>';

        echo '<div class="divTableCell"  style="color: #000000; background-color:#D9F9FA">'.$itemauthors->BookAuthors.'</div>';
        echo '<div class="divTableCell"  style="color: #000000; background-color:#D9F9FA">'.$itemtype->Booktypes.'</div>';
        echo '<div class="divTableCell"  style="color: #000000; background-color:#D9F9FA">'.$itemgenre->Bookgenres.'</div>';
				echo '<div class="divTableCell" style=" background-color:#D9F9FA"> <a href="'. base_url().'index.php/library/editbook/'.$item->BookID.'" />
				<img src="https://lh3.googleusercontent.com/PWdAD0Dhj_P2908ls8UUiog5T9zM7lKQzfrLGrACBc90BAKj_kyKEgj1HjYfEV5Fn8xFUmHIBee-3UOma-V4D4MXxAGqoZ74TXrjtZBk1Hu9_984F3VUd2KpPjeBEUGZCRWM-cohqG4yq41BtArJJJ37a2u7XEfYVRa_zR6PGWEkTf_ffxK8qpMeyYB0513Tvdv7vwblmC6a-l8OTQhVVChWCTpOucsmqAIT20mssV_j_xFXdvk8Y-FgieTAOH5nlC9V2UrJcwFk65vzD8LCEgQoSvbvd_efNbXVzKqyb2dvV2nz2wCPeqBvHQjmKTuIgiuVnmGVu-ofXviEcmHqSS_IFxxSvG1g_JE4nis-jGbukZOzuZMPwwn4rdJnKJDJXfVkkeLKGzRxQoI5tJzv3MRoJ-NTN1Ege9xrnPjdU1EjUO8hBfYOgnPIOp1PcUdWzcXfA_Hq9FsKx1hlOlpEjS4rOSX_pq9hUfWOSZWsgENVwEQwTDtYt-laqLlOZZoZezr68zLRg-se6mjHO6fSIKQh3y3djmdKM-cPT0J9-RMDsRTP38f3hUs1pDD0lpABrMt06pSlhdEfKu5-JOnTv1sSoPDWv9Uj7nEuioYdNzgplZIEFCvPVz9d_skUDvXApwV2nwHHdIcSaZPH9W6MgNXD=s64-no"/>
        </a></div>';
				echo '<div class="divTableCell" style="color: #000000; background-color:#DEDEA2;"><a href="'. base_url().'index.php/library/delete_book/'.$item->BookID.'"><img src="https://lh3.googleusercontent.com/GU4LpUJEQLsJS7JXYT9G_-0gtYB54ZR2jw6___SdOoIamCk0fOGJjGajjSYvlTMF9w31MCVylHK47kG-0JEqva0CQGHTu1eh4G6P3_hBHj1iqDfbDPIroFXJjhD5lbNWF6zBZe1PIVzkE81_2xXqws2c3Dvc5oN6oYlInopvDNjUyi54Lxzb1GLRkf_zQgVEUsou0CdulppgoZdu5lI1MbZcx-CJv7DveZdZ8hN-nJ1stFM-s2SeuVhOMapH8epSHZu0Y1miNwQXE_gKORDDsLU_sFRHLxsJRy68ViM_CcmoeAZlficFQZ1O9xw0pnlMSuoNQtsYPOs7J2fCGEE14gel9iLVlu4ptbzUuQzNMy0A6s8qLasMMiYeueCP9SQD_C-eaC5-K9DCRuZ3ghUUIeT7InKs1V1589mnPqHAFbP8z-TI6r-Jrtl1Z-kA2zih4fZ2L6qMsZAvTpBRk3HxH2VutXQLo9GZd-eeJoIfqfynr4-K3Es4k-ciKUIpXaxwJEVu430BLmo4iqSjL6Qun6cFnt4Xev2zAt6s2y1lhh0DGO0bZyGqPc_g0WzVi9wHwy_YzJpbsLzoBuT6XmnOFxQTtTSmLUaetXaAToXHzu-bbTOyTlVL7KWsRM_3n0EqYXk8xkvUaIQJHjBbkQ3OushU=s32-no"/></a></div>';
				echo '<div class="divTableCell" style="color: #000000; background-color:#DEDEA2;"><a href="'. base_url().'index.php/library/addeditionbyid/'.$item->BookID.'">Add edition</a></div>';
				echo '<div class="divTableCell" style="color: #000000; background-color:#DEDEA2;"><a href="'. base_url().'index.php/library/delete_edition_by_editionid/'.$item->EditionID.'">Delete edition</a></div>';



				echo '</div>';
			}
			?>
		</div>
</div>
<a href="<?php echo base_url();?>library/showallitems"/><br><input type="button" value="Back To All Books >>" class="btn btn-success mt-2"/></a>

<a href="<?php echo base_url();?>library/mainpage"/><br><input type="button" value="Back To Main Page >>" class="btn btn-success mt-2"/></a>
<a href="<?php echo base_url();?>library/logout" /><br><input type="button" value="Logout" class="btn btn-danger mt-2"/></a>

</div>
<br>
<br>
<br>
</body>
</html>
