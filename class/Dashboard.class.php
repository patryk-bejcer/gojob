<?php 

class Dashboard{

	private $db;

	public function __construct(){

        $this->db = DatabaseManager::getConnection();

    }

    public function getUserPermission($loggedUserID){

    	$userID = Helpers::getLoggedUserID($loggedUserID);

        $sql = "SELECT user_type_id FROM user_account WHERE id = $userID";

        $stmt = $this->db->prepare($sql);
        $data = array();
        $stmt->execute($data);
        $result = $stmt->fetchColumn();
        
    	return $result;

    }





}