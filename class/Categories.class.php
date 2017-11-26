<?php 

class Categories{

	private $db;
	private $userID;

	//Get connection with DB when create instance to Offers.
	public function __construct(){
        $this->db = DatabaseManager::getConnection();
       	$this->setUserID();
    }



}