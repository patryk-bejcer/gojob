<?php 

if (!empty($_SESSION['logged_user_id'])){

    $user_id = $_SESSION['logged_user_id'];

	$userPermission = Helpers::getUserType();

		$offerObject = new Offers; //Create offers instance

		if($offerObject->addToFavourite($user_id, $_GET['id'])){
			Helpers::redirectToOffers();
		} else {
			echo 'error';
		}

} else {
	Helpers::redirectToLogin();
}

?>