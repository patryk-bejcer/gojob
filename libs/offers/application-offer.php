<?php 


$App = new ApplicationsManager();

	echo 'cos tam';
	$UserObject = new UserManager;
	$OfferObject = new Offers;


	$seeker =  $UserObject->getSeekerProfile($_SESSION['logged_user_id']);
	$company = $UserObject->getCompanyProfile($OfferObject->getAuthorID($_GET['id']));

	

	if($App->create($company,$seeker,$_GET['id'])){
		echo "przesłano twoje CV do pracodawcy";
	}else{
		echo "Nie udalo sie przeslac twojego CV";
	}

	


	





    

?>



