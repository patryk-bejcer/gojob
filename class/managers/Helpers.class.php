<?php 

class Helpers{

	private static $db;

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

    static public function getUserType(){
    	    	
    	$userID = $_SESSION['logged_user_id'];

        $sql = "SELECT user_type_id FROM user_account WHERE id = $userID";

        $conn = self::getConnection();

        $stmt = $conn->prepare($sql);
        $data = array();
        $stmt->execute($data);
        $result = $stmt->fetchColumn();

        return $result;

    }

    static public function getLoggedUserID($loggedUserID){

    	$userID = $loggedUserID;

    	return $userID;

    }

	static public function redirectToHome($url){
		header("Location: ". $url);
	}

	static public function redirectToLogin(){
		header("Location: ".APP_URL."?page=login");
	}

	static public function redirectToPanel(){
		header("Location: ".APP_URL."?page=dashboard");
	}

	static public function redirectTo404(){
		header("Location: ".APP_URL."?page=404");
	}

  static public function redirectToOffers(){
    header("Location: ".APP_URL."?page=offers");
  }

  static public function redirectToManageOffers(){
    header("Location: ".APP_URL."?page=offers&action=manage");
  }

  static public function redirectToUsers(){
    header("Location: ".APP_URL."?page=manage-users");
  }


  static public function getExcerpt($str, $startPos=0, $maxLength=100) {
      if(strlen($str) > $maxLength) {
        $excerpt   = substr($str, $startPos, $maxLength-3);
        $lastSpace = strrpos($excerpt, ' ');
        $excerpt   = substr($excerpt, 0, $lastSpace);
        $excerpt  .= '...';
      } else {
        $excerpt = $str;
      }
      
      return $excerpt;
    }

  static public function getLoggedUserFromSession(){
    if (!empty($_SESSION['logged_user_id'])){
      return $_SESSION['logged_user_id'];
    } else {
      return false;
    }
  }


}
