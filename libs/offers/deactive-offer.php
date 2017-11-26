<?php 
if (!empty($_SESSION['logged_user_id'])){

	if(Helpers::getUserType() == '3'){
		
		$offersObj = new Offers;
		$offersObj->deactive($_GET['id']);

		header("Location: " . APP_URL . "?page=offers");
	} else {
		header("Location: " . APP_URL . "?page=offers");
	}
}


 ?>