<?php 

if (!empty($_SESSION['logged_user_id'])){

	$userPermission = Helpers::getUserType();

	if ( ($userPermission == '2') || ($userPermission == '3')){

		$offerObject = new Offers; //Create offers instance

		if($offerObject->remove($_GET['id'])){
			Helpers::redirectToManageOffers();
		} else {
			echo 'error';
		}

	} 

} else {
	Helpers::redirectToLogin();
}

?>