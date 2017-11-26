<?php

class UserManager {
    
    private $db;


    public function __construct(){

        $this->db = DatabaseManager::getConnection();

    }

    public function create( $fields = array() ){



        //Data for default user - no relationship
        $user_type_id = trim($fields['user_type']);
        $email = trim($fields['email']);
        $password =     md5(trim($fields['password']));
        $date_of_birth = "1990-10-10";
        $contact_number = trim($fields['contact_number']);
        $user_image = "/images/logoo.png";
        $registration_date = date("Y-n-j"); 

        $sql = "SELECT * FROM `user_account` WHERE email = '{$email}'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount() != 0){
            exit;
            return false;
        } else {
                $this->db->exec(
                    "INSERT INTO `user_account` (`user_type_id`, `email`, `password`, `date_of_birth`, `contact_number`, `user_image`, `registration_date`)  
                    VALUES (".$user_type_id.", '".$email."', '".$password."', '".$date_of_birth."', '".$contact_number."', '".$user_image."', '".$registration_date."')"
                );


                $lastInsertID = $this->db->lastInsertId();

                $_SESSION['logged_user_id']= $lastInsertID;
                    
                //Data input for Seeker Profile
                if($fields['user_type'] == '1'){ 

                    $first_name = trim($fields['first_name']);
                    $last_name = trim($fields['last_name']);
                    $current_salary = trim($fields['current_salary']);
                    $currency = "PLN";


                    if ($this->db->exec(
                        "INSERT INTO `seeker` ( `user_account_id`, `first_name`, `last_name`, `current_salary`, `currency`) VALUES (" . $lastInsertID .", '".$first_name."', '".$last_name."', '".$current_salary."', '".$currency."');"
                    )) return true;
                    

                } 

                //Data input for Company Profile
                else { //company

                    $company_name = trim($fields['company_name']);
                    $company_website = trim($fields['company_website']);
                    $company_description = trim($fields['company_description']);

                    if ($this->db->exec(
                        "INSERT INTO `company` (`user_account_id`, `company_name`, `profile_description`, `company_website_url`) 
                        VALUES ('". $lastInsertID ."', '".$company_name."', '".$company_description."', '".$company_website."');"
                    )) return true;
                  
                }   
        }
           
    }

    public function login($email, $password){


     try{
            
            $hash_password = md5($password);
            $stmt = $this->db->prepare("SELECT id FROM user_account WHERE (email=:usernameEmail) AND password=:hash_password LIMIT 1"); 
            $stmt->bindParam("usernameEmail", $email,PDO::PARAM_STR) ;
            $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
            $stmt->execute();
            $count=$stmt->rowCount();
            $data=$stmt->fetch(PDO::FETCH_OBJ);
            $this->db = null;

            if($count)
            {
                $_SESSION['logged_user_id']=$data->id; // Storing user session value
                return true;
            }
            else
            {
                return false;
            } 
        }
        catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    
    }

    public function getUsers(){

        try{
            $sql = "SELECT * FROM user_account";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $result = $stmt->fetchAll();
        }
        catch(PDOException  $e ){
            echo "Error: ".$e;
            return false;
        }

    }

    public function getUserByID($id){
        try{
            $sql = "SELECT * FROM user_account WHERE id = $id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $result = $stmt->fetch();
        }
        catch(PDOException  $e ){
            echo "Error: ".$e;
            return false;
        }   
    }

    public function removeUser($id){
        try{
            $sql = "DELETE FROM `user_account` WHERE `id` = $id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $sql = "DELETE FROM `job_post` WHERE `user_account_id` = $id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $sql = "DELETE FROM `seeker` WHERE `user_account_id` = $id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $sql = "DELETE FROM `company` WHERE `user_account_id` = $id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return true;
        }
        catch(PDOException  $e ){
            echo "Error: ".$e;
            return false;
        }
    }



    public function updateCompany($fields, $id, $imgPath){

        try{
            $sql = "
            UPDATE company
            inner join  user_account on (company.user_account_id = user_account.id)
            SET 
                company.company_name = :company, 
                company.company_website_url = :website, 
                company.profile_description = :company_description, 
                user_account.contact_number = :contact,
                user_account.user_image = :image,
                user_account.date_of_birth = :establishment
            WHERE 
            user_account_id = $id
            ";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':company', $companyName);
            $stmt->bindParam(':contact', $contact);
            $stmt->bindParam(':website', $website);
            $stmt->bindParam(':establishment', $establishment_date);
            $stmt->bindParam(':company_description', $companyDescription);
            $stmt->bindParam(':image', $imgPath);

            $companyName = $fields['company_name'];
            $contact = $fields['contact_number'];
            $contact = $fields['contact_number'];
            $establishment_date = $fields['establishment_date'];
            $website = $fields['website'];
            $companyDescription = $fields['company_description'];

            $stmt->execute();

            return true;

        }
        catch(PDOException  $e ){
            echo "Error: ".$e;
            // return false;
        }

    }


    public function updateSeeker($fields, $id, $imgPath){

        try{
            $sql = "
            UPDATE seeker
            inner join  user_account on (seeker.user_account_id = user_account.id)
            SET 
                seeker.first_name = :first, 
                seeker.last_name = :last, 
                seeker.profile_description = :description, 
                seeker.current_salary = :salary, 
                user_account.contact_number = :contact,
                user_account.user_image = :image,
                user_account.date_of_birth = :establishment
            WHERE 
            user_account_id = $id
            ";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':first', $fisrtName);
            $stmt->bindParam(':last', $lastName);
            $stmt->bindParam(':description',  $description);
            $stmt->bindParam(':establishment', $establishment_date);
            $stmt->bindParam(':salary', $currentSalary);
            $stmt->bindParam(':contact', $contact);
            $stmt->bindParam(':image', $imgPath);

            $fisrtName = $fields['first_name'];
            $description = 'przykladowy opis';
            $contact = "222 333 444";
            $lastName = $fields['last_name'];
            $currentSalary = $fields['salary'];
            $establishment_date = $fields['date_of_birth'];
            

            $stmt->execute();

            return true;


        }
        catch(PDOException  $e ){
            echo "Error: ".$e;
            // return false;
        }

    }



    public function getUserTypeByID($id){
        try{
            $sql = "SELECT user_type_id FROM user_account WHERE id = '{$id}'";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $result = $stmt->fetchColumn();
        }catch(PDOException  $e ){
            echo "Error: ".$e;
            return false;
        }
    }

    public function getCompanyID($id){
        $user_id = $id;
        try{
            $sql = "SELECT * FROM company WHERE user_account_id= $user_id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $result = $stmt->fetch();
        }
        catch(PDOException  $e ){
            echo "Error: ".$e;
            return false;
        }

    }


    public function getSeekerID($id){
        $user_id = $id;
        try{
            $sql = "SELECT * FROM seeker WHERE user_account_id= $user_id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $result = $stmt->fetch();
        }
        catch(PDOException  $e ){
            echo "Error: ".$e;
            return false;
        }

    }

    public function getCompanyProfile($id){
        $userID = $id;
        try{
            $sql = "SELECT * FROM user_account LEFT JOIN company ON user_account.id = company.user_account_id WHERE user_account.id = $userID";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $result = $stmt->fetch();
        }
        catch(PDOException  $e ){
            echo "Error: ".$e;
            return false;
        }
    }

    public function getSeekerProfile($id){
        $userID = $id;
        try{
            $sql = "SELECT * FROM user_account LEFT JOIN seeker ON user_account.id = seeker.user_account_id WHERE user_account.id = $userID";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $result = $stmt->fetch();
        }
        catch(PDOException  $e ){
            echo "Error: ".$e;
            return false;
        }
    }

    public function getSeekerCv($id){

        try{
            $sql = "SELECT user_image FROM user_account WHERE id = $id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $result = $stmt->fetch();


        }catch(PDOException $e){

        }
    }
    public function getAdminProfile($id){
        $userID = $id;
        try{
            $sql = "SELECT * FROM user_account WHERE id = $userID";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $result = $stmt->fetch();
        }
        catch(PDOException  $e ){
            echo "Error: ".$e;
            return false;
        }
    }


}
    

?>