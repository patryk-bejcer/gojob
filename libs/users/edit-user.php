<?php 

if (!empty($_SESSION['logged_user_id'])){

$userPermission = Helpers::getUserType();

$userObject = new UserManager; //Create offers instance

$user = $userObject->getUserByID($_GET['id']);

if (($_GET['id'] == $_SESSION['logged_user_id']) || ($userPermission == '3')){


//Memory old values
$email = $user['email'];
$contactNumber = $user['contact_number'];


if(isset($_POST['submit'])){


		if ($userObject->getUserTypeByID($_SESSION['logged_user_id']) == '2' || $user['user_type_id'] == '1'){
			echo 'cos tam';

			$target_dir = 'uploads/users/';
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 1;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			/*if ($_FILES["fileToUpload"]["size"] > 1000000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			*/
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			    } else {
			        
			    }
			}

	    	//If all field is okay use method create
	    	if($user['user_type_id'] == '2'){
				if($userObject->updateCompany($_POST, $user['id'], $target_file)){
					Helpers::redirectToPanel();
				}
				else {
					Helpers::redirectToPanel();
				}
			}else if($user['user_type_id'] == '1'){
				if($userObject->updateSeeker($_POST, $user['id'], $target_file)){
					Helpers::redirectToPanel();
				}
				else {
					Helpers::redirectToHome();
				}
			}
		} 


	
}
$company = $userObject->getCompanyProfile($_GET['id']);
$seeker = $userObject->getSeekerProfile($_GET['id']);

if($user['user_type_id']=='1'){
$user_name = $seeker['first_name'];
$user_lastname = $seeker['last_name'];
$user_email = $seeker['email'];
$user_sallary = $seeker['current_salary'];
$user_dateofbirth = $seeker['date_of_birth'];

?>
	<div class="container pb-5">
	<div class="col-12 col-sm-6 offset-sm-0">
		
		<!-- <a href="<?php echo APP_URL . "?page=manage-users" ?>"><button type="button" class="btn btn-primary" style="float: right;">
		<i style="padding-right: 10px;padding-top: 0px !important;margin-top: -5px;" class="fa fa-angle-double-left" aria-hidden="true"></i>Powrót do listy użytkowników</button></a> -->
		<h3 class="pt-3 pb-3">Edycja użytkownika:</h3> 

		<!-- CREATE JOB POST FORM -->
		<form method="POST" enctype="multipart/form-data">

		  <div class="md-form">
		    <input name="first_name" type="text" class="form-control enabled" id="exampleFormControlInput1" placeholder="Imie" value="<?php echo $user_name ?>" required>
		    <label for="orangeForm-pass">Imię</label>
		  </div>

		  <div class = "md-form">
		  	<input name = "last_name" type="text" class = "form-control enabled" id = "exampleFormControlInput1" placeholder="Nazwisko" value="<?php echo $user_lastname ?>" required>
		  	<label for="orangeForm-pass"> Nazwisko </label>
		  </div>

		   <div class = "md-form">
		  	<input name = "date_of_birth" type="date" class = "form-control" id = "exampledatainput1" value="<?php echo $user_dateofbirth ?>" required>
		  	
		  </div>

		    <div class = "md-form">
		  	<input name = "salary" type="number" class = "form-control" min="1" id = "examplenumberinput1" value="<?php echo $user_sallary ?>" required>
		  	
		    <div class = "md-form">
			    <div class = "col-12"
			    <label> Przeslij swoje CV </label>
			    </div>
		  	<input type="file" class = "form-control" name="fileToUpload" id="fileToUpload"  >
		  		<div class = "col-12">
		  		<!-- <label> <strong> dodaj swoje CV  </strong></label> -->
		  		</div>
		  	
		 	 </div>

		  <div class = "md-form" >
		  	
		  	<input type="submit" name = "submit" class = "btn btn-success" value="zapisz">
		  	
		  </div>		
	

		</form>
		<!-- END CREATE JOB POST FORM -->

	</div>
</div>

<?php } ?>
<?php if (($user['user_type_id']=='2') && (($company['user_account_id'] == $_GET['id']) || ($userPermission == '3'))):




$companyName = $company['company_name'];
$website = $company['company_website_url'];
$profileDescription = $company['profile_description'];


?>

<div class="container pb-5">
	<div class="col-12 col-sm-6 offset-sm-0">
		
		<!-- <a href="<?php echo APP_URL . "?page=manage-users" ?>"><button type="button" class="btn btn-primary" style="float: right;">
		<i style="padding-right: 10px;padding-top: 0px !important;margin-top: -5px;" class="fa fa-angle-double-left" aria-hidden="true"></i>Powrót do listy użytkowników</button></a> -->
		<h3 class="pt-3 pb-3">Edycja firmy:</h3> 

		<!-- CREATE JOB POST FORM -->
		<form method="POST" enctype="multipart/form-data">

		  <div class="md-form">
		    <input name="name" type="text" class="form-control disabled" id="exampleFormControlInput1" placeholder="Adres email" value="<?php echo $email ?>" required>
		    <label for="orangeForm-pass">Adres E-mail</label>
		  </div>

		  <div class="md-form">
		    <input name="company_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Company name" value="<?php echo $companyName; ?>" required>
		    <label for="orangeForm-pass">Nazwa firmy</label>
		  </div>

		  <div class="md-form">
		    <input name="contact_number" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Numer kontaktowy" value="<?php echo $contactNumber?>" required>
		    <label for="orangeForm-pass">Numer kontatowy</label>
		  </div>

		  <div class="md-form">
		    <input name="website" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Adres strony WWW" value="<?php echo $website; ?>" required>
		    <label for="orangeForm-pass">Strona WWW</label>
		  </div>

		<div class="form-group row">
		  <label for="example-date-input" class="col-6 col-form-label">Data założenia</label>
		  <div class="col-12">
		    <input class="form-control" name="establishment_date" type="date" value="2012-12-12" id="example-date-input">
		  </div>
		</div>

       <div class="md-form">
        <textarea type="text" id="form7" class="md-textarea " name="company_description"><?php echo $profileDescription; ?></textarea>
        <label for="form7">Krótki opis działalności</label>
    	</div>

		<div class="form-group">
			<label for="orangeForm-pass">Logo firmy</label> <br>
		<label class="custom-file">
		 <input type="file" name="fileToUpload" id="fileToUpload">
		  <span class="custom-file-control"></span>
		</label>
		</div>

		<input type="submit" name="submit" class="btn btn-success" value="Zapisz">

		</form>
		<!-- END CREATE JOB POST FORM -->

	</div>
</div>

<?php endif; ?>

<?php } else {
	Helpers::redirectToLogin();
	exit;
}}
else {
	Helpers::redirectToLogin();
	exit;
}
?>
