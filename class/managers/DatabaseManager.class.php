<?php

class DatabaseManager
{

	//Statyczna metoda odpowiadająca za nawiązanie połączenia z bazą.
	public static function getConnection()
	{

        try {
           $db = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_DB, DB_USERNAME, DB_PASS);
           $db->exec("set names utf8");
           return $db;
        } catch (PDOException $e) {
           print "Error!: " . $e->getMessage() . "<br/>";
           die();
        }
        
    }


}