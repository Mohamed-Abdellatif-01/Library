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

					function validateFormauthor()
					{


							if( document.forms["searchitemsbyauthor"]["AuthorName"].value == "" )
								 {
									alert( "Please provide author name!" );
										return false;
								 }

					}
			 //-->
		</script>
</head>
<body>

	<div class="container-fluid">


				<h3 style="font-size: 4vw; text-align: center; color: #fff" class="m-3">Municipality Library</h3>



			<div><h2 style="font-size: 3vw; text-align: center; color: #fff" class="m-3">Search for books by author</h2></div>

<form name="searchitemsbyauthor" action="<?php echo base_url(); ?>library/search_items_by_authorname" onsubmit="return validateFormauthor()" method="post" >
 <p style="color: #fff; font-size: 18pt;" class=" btn-block  mt-2">Search by author :<p> <input type="text" name="AuthorName" placeholder="Author name" >
 <input type="submit" value="Search" class="btn btn-info">
				</form><br>


				<?php
				 if(isset($authors))
				 {
					 if(count($authors) == 0)
					 {
						 echo '<div style="color: #fff; font-size: 18pt;">No results found.</div>';
					 }
					 else {
						 	echo '<div><h1 style="font-size: 2vw;  color: #fff" class="m-3">Search result</h1></div>
						  <div class="divTable">
						  <div class="divTableHeading">
					  <div class="divTableRow">
 				 <div class="divTableHead">BookTittle</div>
         <div class="divTableHead">AuthorName</div>

 				 <div class="divTableHead">Number Of Pages</div>
 				 <div class="divTableHead">Publishing Date</div>
 				 <div class="divTableHead">Quantity</div>
 				 <div class="divTableHead">Best Of Collection</div>
				 <div class="divTableHead">Details</a></div>
				 <div class="divTableHead">Edit</a></div>
				 <div class="divTableHead">Delete</a></div>
				 <div class="divTableHead">Add edition</a></div>
					  </div>
					  </div>
					  <div class="divTableBody">';


					  			foreach ($authors as $a) {

					  				echo '<div class="divTableRow">';
                    echo '<div class="divTableCell" style="color: #000000; background-color:#D9F9FA;">'.$a->BookTittle.'</div>';
				    				echo '<div class="divTableCell" style="color: #000000; background-color:#D9F9FA;">'.$a->AuthorName.'</div>';
				    				echo '<div class="divTableCell" style="color: #000000; background-color:#D9F9FA;">'.$a->NumOfPages.'</div>';
				    				echo '<div class="divTableCell" style="color: #000000; background-color:#D9F9FA;">'.$a->PublishingDate.'</div>';
				            echo '<div class="divTableCell" style="color: #000000; background-color:#D9F9FA;">'.$a->Quantity.'</div>';
				    				echo '<div class="divTableCell" style="color: #000000; background-color:#D9F9FA;">'.$a->BestOfCollection.'</div>';
	echo '<div class="divTableCell"  style="color: #000000; background-color:#D9F9FA"><a href="'. base_url().'index.php/library/show_items_details/'.$a->BookID.'"><img src="https://lh3.googleusercontent.com/oYX842b9wBKTo63sGg3EvnrUqx_3g1AE99mQEAER-kesIdqQoWiUAJ7TGEa99ckML_rZcpoIn9RXZ6Pi5KeKhUzEQEk8EZKJQW_sDCJVL1n5h-sF3kMjHLidQ9wyNhoGCsbaD-WGgctF3BqA-zQIl-nEHw2GsSTjlvna20zLLbL5P13dDcym8Z0BL4Ot_C8IekJW16te_2dg65s9cxQVd79dt6JoN1ruwIqO0U6WOF2rQPcOSmT7u1hKTmAPYedMW6QvZsUWtWL5WTeTFQPEA7KLNGGAn6kX4VQFEpf6s6wL_EAaUkSGnByP54flO-PhOplo70WAhiCBwbj1zi_ZbJhqwzCqoFoE_d8ciRYP0fiFf87vU83VZ75mzlf_26NDFMnEhqTQKce_TCMXiCvcFM1wz0m4Mllw6lFlhBMOAU1b46UwcaGRkuCklKcJrr6KoAfXf9Cp_wdWHPnEtKF4txTEVjCv0j2VCc6b3dSPgd6WVdDuGeR2jZYTFDWnfZ1OGmXPm3_GqClxPaXxRjesIC6vwvFuV09o7XwHnoQOZmNig7rIoaS2NDLERgS2MAyvLUZof_uHysZ9uKL6qR2eF-T1Xht6yMOkGGnPn50Zspe68e9BAgpMY_IXMdb7qPIRIkSudafRdOzerXMLtQAu2XHC=s32-no"/></a></div>';
										echo '<div class="divTableCell" style=" background-color:#D9F9FA"> <a href="'. base_url().'index.php/library/editbook/'.$a->BookID.'">
										<img src="https://lh3.googleusercontent.com/PWdAD0Dhj_P2908ls8UUiog5T9zM7lKQzfrLGrACBc90BAKj_kyKEgj1HjYfEV5Fn8xFUmHIBee-3UOma-V4D4MXxAGqoZ74TXrjtZBk1Hu9_984F3VUd2KpPjeBEUGZCRWM-cohqG4yq41BtArJJJ37a2u7XEfYVRa_zR6PGWEkTf_ffxK8qpMeyYB0513Tvdv7vwblmC6a-l8OTQhVVChWCTpOucsmqAIT20mssV_j_xFXdvk8Y-FgieTAOH5nlC9V2UrJcwFk65vzD8LCEgQoSvbvd_efNbXVzKqyb2dvV2nz2wCPeqBvHQjmKTuIgiuVnmGVu-ofXviEcmHqSS_IFxxSvG1g_JE4nis-jGbukZOzuZMPwwn4rdJnKJDJXfVkkeLKGzRxQoI5tJzv3MRoJ-NTN1Ege9xrnPjdU1EjUO8hBfYOgnPIOp1PcUdWzcXfA_Hq9FsKx1hlOlpEjS4rOSX_pq9hUfWOSZWsgENVwEQwTDtYt-laqLlOZZoZezr68zLRg-se6mjHO6fSIKQh3y3djmdKM-cPT0J9-RMDsRTP38f3hUs1pDD0lpABrMt06pSlhdEfKu5-JOnTv1sSoPDWv9Uj7nEuioYdNzgplZIEFCvPVz9d_skUDvXApwV2nwHHdIcSaZPH9W6MgNXD=s64-no"/>
										</a>
										</div>';
										echo '<div class="divTableCell" style="color: #000000; background-color:#DEDEA2;"><a href="'. base_url().'index.php/library/delete_book/'.$a->BookID.'">	<img src="https://lh3.googleusercontent.com/GU4LpUJEQLsJS7JXYT9G_-0gtYB54ZR2jw6___SdOoIamCk0fOGJjGajjSYvlTMF9w31MCVylHK47kG-0JEqva0CQGHTu1eh4G6P3_hBHj1iqDfbDPIroFXJjhD5lbNWF6zBZe1PIVzkE81_2xXqws2c3Dvc5oN6oYlInopvDNjUyi54Lxzb1GLRkf_zQgVEUsou0CdulppgoZdu5lI1MbZcx-CJv7DveZdZ8hN-nJ1stFM-s2SeuVhOMapH8epSHZu0Y1miNwQXE_gKORDDsLU_sFRHLxsJRy68ViM_CcmoeAZlficFQZ1O9xw0pnlMSuoNQtsYPOs7J2fCGEE14gel9iLVlu4ptbzUuQzNMy0A6s8qLasMMiYeueCP9SQD_C-eaC5-K9DCRuZ3ghUUIeT7InKs1V1589mnPqHAFbP8z-TI6r-Jrtl1Z-kA2zih4fZ2L6qMsZAvTpBRk3HxH2VutXQLo9GZd-eeJoIfqfynr4-K3Es4k-ciKUIpXaxwJEVu430BLmo4iqSjL6Qun6cFnt4Xev2zAt6s2y1lhh0DGO0bZyGqPc_g0WzVi9wHwy_YzJpbsLzoBuT6XmnOFxQTtTSmLUaetXaAToXHzu-bbTOyTlVL7KWsRM_3n0EqYXk8xkvUaIQJHjBbkQ3OushU=s32-no"/>
											<br>delete</a></div>';
										echo '<div class="divTableCell" style="color: #000000; background-color:#DEDEA2;"><a href="'. base_url().'index.php/library/addeditionbyid/'.$a->BookID.'">add edition</a></div>';


										echo '</div>';
					  			}
					  	echo"</div></div>";
					 }

					}
				 ?>
				 <div style="text-align: left;">
				 <a href="<?php echo base_url();?>library/showallitems" /><br><input type="button" value=" Back To All Items >>"class="btn btn-success  mt-2 col-md-3" /></a>
				 <a href="<?php echo base_url();?>library/mainpage" /><br><input type="button" value=" Back To mainpage >>"class="btn btn-success  mt-2 col-md-3" /></a><br>
				<a href="<?php echo base_url();?>library/logout" /><input type="button" value="Logout" class="btn btn-danger mt-2 col-md-2 "/></a>
			</div>
</div>
<br>
<br>

</body>
</html>
