<?php
ob_start();
//Plik konfiguracyjny

/* 	
	Tworzymy zmienną odpowiadająca za bezwzględny adres do naszego portalu
	Teraz będziemy mogli się odwoływać do niej z każdego miejsca
*/

$AbsoluteURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
$dirCat = dirname($_SERVER['PHP_SELF']);
$AbsoluteURL .= $_SERVER['HTTP_HOST'];
$AbsoluteURL .= $dirCat != '\\' ? $dirCat : "";
$slash = substr($AbsoluteURL, -1);

$NewURL = $slash != '/' ? $AbsoluteURL.'/' : $AbsoluteURL;

/* 	 
	Stałe używane do łączenia się z bazą danych.
*/

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASS', '');
define('DB_DB', 'gojob');

//Stała dla adresu i lokalizacji aplikacji 
define('SERVER_ADDRESS', $NewURL);
define('APP_URL', $NewURL);

set_include_path(get_include_path(). PATH_SEPARATOR . "class");
set_include_path(get_include_path(). PATH_SEPARATOR . "class/managers");
set_include_path(get_include_path(). PATH_SEPARATOR . "libs");

// Magiczna funkcja automatycznie ładująca klasy wg. zapotrzebowania

function __autoload($className) {
    
    @include_once($className.".class.php");
    
}