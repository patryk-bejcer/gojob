<?php 

if (!empty($_SESSION['logged_user_id'])){



		$userID = Helpers::getLoggedUserFromSession();

		$dashboard = new Dashboard;

		$userType = $dashboard->getUserPermission($_SESSION['logged_user_id']);

		// echo $userType;

		if ( (!empty ($userType)) ){

			if ($userType == '1'){

				echo '<h3>Witaj jesteś zalogowany jako kandydat</h3>';

				require_once 'index-seeker.php';

			} else if ($userType == '2') {

				echo '<h3>Witaj jesteś zalogowany jako pracodawca</h3>';

				require_once 'index-company.php';

			} else if ($userType == '3') {

				echo '<h3>Witaj jesteś zalogowany jako administrator</h3>';

				require_once 'index-admin.php';

			} else {

				Helpers::redirectToLogin();

			}

		}


} else {

	Helpers::redirectToLogin();
}

?>

