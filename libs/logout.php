<?php 
ob_start();
$session_uid='';
$_SESSION['logged_user_id']=''; 
if(empty($session_uid) && empty($_SESSION['logged_user_id']))
{

	Helpers::redirectToHome(SERVER_ADDRESS);

}

ob_end_flush();

 ?>