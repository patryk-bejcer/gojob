<h1>offers</h1>

<?php 

	if((isset($_GET['action']))) {

		$om = new OffersManager($_GET['action']);

	} else {

		require_once "offers/index.php";
		
	}




	

 ?>