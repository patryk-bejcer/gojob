<?php

// ========================================================================== //
//	Plik startowy (tutaj wszystko się zaczyna) - ładowany jest jako pierwszy
// ========================================================================== //

/* 	
	Rozpoczynamy sesje w tym miejscu dzięki czemu będziemy mogli korzystać ze zmiennych sesyjnych. 
*/

session_start();

/* 
	Dołączamy plik konfiguracyjny za pomocą funkcji require_once - once oznacza 
	że jeżeli już gdzies wczesniej był dołaczony ten plik to nie dołączy się 
	ponownie (takie zabezpieczenie) 
*/

require_once("config.php");



require_once "libs/template-parts/header.php";

if(!(isset($_GET['page']))) {

    require_once "home.php";

} else {

	$mp = new MainPage($_GET['page']);  

}

require_once "libs/template-parts/footer.php";


