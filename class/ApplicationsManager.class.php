<?php

class ApplicationsManager{

	private $db;

	public function __construct(){
		 $this->db = DatabaseManager::getConnection();
	}
	
	public function create($company,$seeker,$id){
		try{
				$sql = "INSERT INTO job_applications (ID,id_seeker,id_company,id_post,seeker_name,seeker_lastname,seeker_salary)
				VALUES (null, :id_seeker, :id_company,:id_post, :seeker_name, :seeker_lastname, :seeker_salary)";
				$stmt = $this->db->prepare($sql);
				$stmt->bindParam(':id_seeker' , $seeker['id']);
				$stmt->bindParam(':id_company', $company['id']);
				$stmt->bindParam(':id_post', $id);
				$stmt->bindParam(':seeker_name', $seeker['first_name']);
				$stmt->bindParam(':seeker_lastname', $seeker['last_name']);
				$stmt->bindParam(':seeker_salary', $seeker['current_salary']);
				

				$stmt->execute();

				

				return true;
				

		}catch(Exception $e){
			return false;
			
		}



	}


	public function getApplicationsByCompanyID($id){
		try{
				$sql = "SELECT * FROM job_applications WHERE id_company = $id";
				$stmt = $this->db->prepare($sql);

				$stmt->execute();
				return $result = $stmt->fetchAll();
		

		}catch(Exception $e){
			return false;
			
		}

	}
	
	}