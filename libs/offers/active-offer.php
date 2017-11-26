<?php 
if (!empty($_SESSION['logged_user_id'])){

	if(Helpers::getUserType() == '3'){
		
		$offersObj = new Offers;
		$offersObj->active($_GET['id']);

		Helpers::redirectToManageOffers();
	} else {
		Helpers::redirectToManageOffers();
	}
}


 ?>