<?php 

class Search{

	private $db;
	private $term;

	public function __construct($term){
		$this->db = DatabaseManager::getConnection();
		$this->term = $term;
	}

	public function search(){

		$term = $this->term;

		try{
			$sql = "SELECT * FROM `job_post` WHERE name LIKE '%$term%' OR job_description LIKE '%$term%'";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			$count = $stmt->rowCount();
			$result = $stmt->fetchAll();
			echo $count;
			return $result; 
		}
		catch(PDOException  $e ){
			echo "Error: ".$e;
			return false;
		}
	}



}

?>