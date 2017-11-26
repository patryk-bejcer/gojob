<?php 

if (!empty($_SESSION['logged_user_id'])){

	$userPermission = Helpers::getUserType();

	if ( ($userPermission == '2') || ($userPermission == '3')){

		$userObject = new UserManager; //Create offers instance

		if($userObject->removeUser($_GET['id'])){
			Helpers::redirectToUsers();
		} else {
			echo 'error';
		}

	} 

} else {
	Helpers::redirectToLogin();
}

?>