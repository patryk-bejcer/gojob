<?php



$register_error_message = '';

$email = '';
$password = '';
$phone = '';
$birth_date = '';


if (empty($_SESSION['logged_user_id'])){
if(isset($_POST['email'])) {

	//Używamy instancji klasy validator do przewalidowania pól.

	$validator = new FormValidator();

	$validator->addRule('email', 'Podaj adres email', 'required');
	$validator->addRule('password', 'Podaj hasło', 'required');
	$validator->addRule('contact_number', 'Podaj numer telefonu', 'required');
	$validator->addRule('password', 'Hasło musi zawierac conajmniej 5 znaków', 'minlength', 5);
	// $validator->addRule('accept', 'Zaakceptowanie regulaminu jest wymagane', 'required');

	if($_POST['user_type'] == '2'){
		$validator->addRule('company_name', 'Podaj nazwe firmy', 'required');
		$validator->addRule('company_website', 'Podaj twoją strone internetową', 'required');
		$validator->addRule('company_description', 'Napisz kilka słów na temat Twojej firmy', 'required');
	} else {
		$validator->addRule('first_name', 'Podaj twoje imie', 'required');
		$validator->addRule('last_name', 'Podaj twoje nazwisko', 'required');
	}



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

	    if($um->create($_POST)) {
	        
	        Helpers::redirectToPanel();
	        
	    } else {
	        
	        die("Przekierowanie na stronę błędu...");
	        header("Location: ".$_SERVER['HTTP_REFERER']);
	        
	    }

    }
   
    
} 

} else {
	header("Location: ".APP_URL);
}