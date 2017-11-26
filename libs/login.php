<?php

if (empty($_SESSION['logged_user_id'])){

	if(isset($_POST['email']) && isset($_POST['password'])) {
	    
	//Używamy instancji klasy validator do przewalidowania pól.

	$validator = new FormValidator();

	$validator->addRule('email', 'Podaj adres email', 'required');
	$validator->addRule('password', 'Podaj hasło', 'required');
	$validator->addRule('password', 'Hasło musi zawierac conajmniej 5 znaków', 'minlength', 5);
	// $validator->addRule('accept', 'Zaakceptowanie regulaminu jest wymagane', 'required');

    // Input the POST data and check it
    $validator->addEntries($_POST);
    $validator->validate();
    
    // Retrieve an associative array of "sanitized" form inputs (HTML tags stripped, etc.)
    $entries = $validator->getEntries();
    
    // Replace the default field values with what the user submitted
    foreach ($entries as $key => $value) {
        ${$key} = $value;
    }
    
    if ($validator->foundErrors()) {
        $errors = $validator->getErrors();
    } else {


	    $um = new UserManager;
	    
	    if($um->login($_POST['email'], $_POST['password'])) {
	        
	        Helpers::redirectToPanel();
	        
	    } else {
	       
	        header("Location: ".$_SERVER['HTTP_REFERER']);
	         echo 'złe hasło';
	        die("Przekierowanie na stronę błędu...");
	        
	    }
	    
	} 
} 

} else {
	Helpers::redirectToLogin();
}