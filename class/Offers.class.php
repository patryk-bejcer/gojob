<?php

class Offers{

	private $db;
	private $userID;

	//Get connection with DB when create instance to Offers.
	public function __construct(){
        $this->db = DatabaseManager::getConnection();
       	$this->setUserID();
    }

    public function setUserID(){
    	if(isset($_SESSION['logged_user_id'])){
        	if(!empty($_SESSION['logged_user_id'])){
        		$this->userID = $_SESSION['logged_user_id'];
        	} else {
        		$this->userID = '';
        	}
        } else {
        	$this->userID = '';
        }
    }


    // Create new post method
    public function create($fields, $userID, $userPermission){

		try{

			if($userPermission == '3'){
				$is_active = '1';
			} else {
				$is_active = '0';
			}

			$sql = "
			INSERT INTO `job_post` (`user_account_id`, `name`, `created_date`, `job_description`, `job_province_id`, `job_type_id`, `is_active`) 
			VALUES ( :user, :name, :create, :description, :province, :type, '".$is_active."')
			";

			$stmt = $this->db->prepare($sql);



			$stmt->bindParam(':user', $userID);
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':create', $created_date);
			$stmt->bindParam(':type', $job_type);
			$stmt->bindParam(':province', $province);
			$stmt->bindParam(':description', $job_description);

			$name = $fields['name'];
    		$job_description = $fields['job_description'];
    		$date = new DateTime();
    		$created_date = $date->format('Y-m-d H:i:s');
    		$job_type = $fields['job_type']; 
    		$province = $fields['province']; 

			$stmt->execute();
			return true;
		}
		catch(PDOException  $e ){
			echo "Error: ".$e;
			return false;
		}

    }

    public function getPostByID($id){
		try{
			$sql = "SELECT * FROM job_post WHERE id = $id";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			return $result = $stmt->fetch();
		}
		catch(PDOException  $e ){
			echo "Error: ".$e;
			return false;
		}	
    }

    public function update($fields, $id){

		try{
			$sql = "
			UPDATE `job_post` SET `name` = :name, `created_date` = :create, `job_description` = :description, `job_province_id` = :province, `job_type_id` = :type WHERE `id` = :id
			";

			$stmt = $this->db->prepare($sql);

			$stmt->bindParam(':id', $id);
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':create', $created_date);
			$stmt->bindParam(':type', $job_type);
			$stmt->bindParam(':province', $province);
			$stmt->bindParam(':description', $job_description);

			$name = $fields['name'];
    		$job_description = $fields['job_description'];
    		$created_date = date("Y-n-j"); 
    		$job_type = $fields['job_type']; 
    		$province = $fields['province']; 

    		

			$stmt->execute();

			return true;

		}
		catch(PDOException  $e ){
			echo "Error: ".$e;
			// return false;
		}

    }


    public function remove($id){
		try{
			$sql = "DELETE FROM `job_post` WHERE `job_post`.`id` = $id";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			return true;
		}
		catch(PDOException  $e ){
			echo "Error: ".$e;
			return false;
		}
    }


    public function active($id){

		try{
			$sql = "UPDATE `job_post` SET `is_active` = '1' WHERE `id` = '".$id."'";

			$stmt = $this->db->prepare($sql);
			$stmt->execute();

			return true;

		}
		catch(PDOException  $e ){
			echo "Error: ".$e;
			// return false;
		}

    }


    public function deactive($id){

		try{
			$sql = "UPDATE `job_post` SET `is_active` = '0' WHERE `id` = '".$id."'";

			$stmt = $this->db->prepare($sql);
			$stmt->execute();

			return true;

		}
		catch(PDOException  $e ){
			echo "Error: ".$e;
			// return false;
		}

    }


    public function getJobPosts(){

		try{
			$sql = "SELECT * FROM job_post ORDER BY created_date DESC";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			return $result = $stmt->fetchAll();
		}
		catch(PDOException  $e ){
			echo "Error: ".$e;
			return false;
		}

    }

    public function getLimitJobPosts($limit){

		try{
			$sql = "SELECT * FROM job_post ORDER BY created_date DESC LIMIT $limit";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			return $result = $stmt->fetchAll();
		}
		catch(PDOException  $e ){
			echo "Error: ".$e;
			return false;
		}

    }


    public function getJobPostsForCompany($id){

		try{
			$sql = "SELECT * FROM job_post WHERE user_account_id = '$id'";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			return $result = $stmt->fetchAll();
		}
		catch(PDOException  $e ){
			echo "Error: ".$e;
			return false;
		}

    }

    // Get all provinces from DB
    public function getAuthorID($id){
		try{
			$sql = "SELECT user_account_id FROM job_post WHERE id = '{$id}'";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			return $result = $stmt->fetchColumn();
		}catch(PDOException  $e ){
			echo "Error: ".$e;
			return false;
		}
    }


    // Get all provinces from DB
    public function getProvinces(){
		try{
			$sql = "SELECT * FROM job_province";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			return $result = $stmt->fetchAll();
		}catch(PDOException  $e ){
			echo "Error: ".$e;
			return false;
		}
    }

    // Get all Job Types from DB
    public function getJobTypes(){
		try{
			$sql = "SELECT * FROM job_type";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			return $result = $stmt->fetchAll();
		}catch(PDOException  $e ){
			echo "Error: ".$e;
			return false;
		}
    }

    public function getJobTypeByID($id){
    	try{
			$sql = "SELECT name FROM job_type WHERE id = $id";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			return $result = $stmt->fetchColumn();
		}catch(PDOException  $e ){
			echo "Error: ".$e;
			return false;
		}
    }

    public function getJobProvinceByID($id){
    	try{
			$sql = "SELECT name FROM job_province WHERE id = $id";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			return $result = $stmt->fetchColumn();
		}catch(PDOException  $e ){
			echo "Error: ".$e;
			return false;
		}
    }

    public function getCompanyNameByID($id){
    	try{
			$sql = "SELECT company_name FROM company WHERE user_account_id = $id";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			return $result = $stmt->fetchColumn();
		}catch(PDOException  $e ){
			echo "Error: ".$e;
			return false;
		}
    }

    public function addToFavourite($userID, $offerID){
    	try{
			$sql = "INSERT INTO user_favorite_job_post (`user_account_id`, `job_post_id`) VALUES($userID, $offerID)";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			return true;
		}catch(PDOException  $e ){
			echo "Error: ".$e;
			return false;
		}
    }

    public function getFavourite($userID){
    	try{
			$sql = "SELECT * FROM job_post as e INNER JOIN user_favorite_job_post as c ON e.id = c.job_post_id WHERE c.user_account_id = $userID";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			
			return $result = $stmt->fetchAll();
		}catch(PDOException  $e ){
			echo "Error: ".$e;
			return false;
		}
    }



    public function getUserImage($id){
    	try{
			$sql = "SELECT user_image FROM user_account WHERE id =  $id";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			return $result = $stmt->fetchColumn();
		}catch(PDOException  $e ){
			echo "Error: ".$e;
			return false;
		}
    }
    

    public function getPostsByCategory($categoryID){
		try{
			$sql = "SELECT * FROM job_post WHERE job_type_id = $categoryID";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			return $result = $stmt->fetchAll();
		}
		catch(PDOException  $e ){
			echo "Error: ".$e;
			return false;
		}
    }

    public function getPostsByProvince($provinceID){
		try{
			$sql = "SELECT * FROM job_post WHERE job_province_id = $provinceID";
			$stmt = $this->db->prepare($sql);
			$stmt->execute();
			return $result = $stmt->fetchAll();
		}
		catch(PDOException  $e ){
			echo "Error: ".$e;
			return false;
		}
    }

    public function getPostsByCategoryAndProvinces($CategoryID, $ProvincesID){

    	try{
    		if ($CategoryID != null and $ProvincesID != null){
	    		$sql = "SELECT * FROM job_post e WHERE e.job_type_id = $CategoryID AND e.job_province_id = $ProvincesID";
	    		$stmt = $this->db->prepare($sql);
	    		$stmt -> execute();
	    		return $result = $stmt->fetchAll();
    		} else if($CategoryID != null and $ProvincesID ==null){
    			$sql = "SELECT * FROM job_post WHERE job_type_id = $CategoryID";
				$stmt = $this->db->prepare($sql);
				$stmt->execute();
				return $result = $stmt->fetchAll();
    		} else if ($CategoryID == null and $ProvincesID != null){
    			$sql = "SELECT * FROM job_post WHERE job_province_id = $ProvincesID";
				$stmt = $this->db->prepare($sql);
				$stmt->execute();
				return $result = $stmt->fetchAll();
	    	} 

    	} catch (PDOException $e){
    		echo "nic nie ma";
    		echo "Error:".$e;
    		return false;
    	}
    }

}

