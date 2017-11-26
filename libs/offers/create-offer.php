<?php 

if (!empty($_SESSION['logged_user_id'])){

$userPermission = Helpers::getUserType();

if (($userPermission == '2') || ($userPermission == '3')){

$offerObject = new Offers; //Create offers instance
$jobProvinces = $offerObject->getProvinces(); //get all provinces to array
$jobTypes = $offerObject->getJobTypes(); // get all job types to array

//Memory old values
$name = '';
$job_type = '';
$province = '';
$job_description = '';

if(isset($_POST['submit'])){

	//Validate fields in create form.
	$validator = new FormValidator();

	$validator->addRule('name', 'Tytuł oferty wymagany', 'required');
	$validator->addRule('name', 'Tytuł oferty musi zawierać conajmniej 5 znaków.', 'minlength', 5);
	$validator->addRule('name', 'Tytuł oferty może zawierać maksymalnie 100 znaków.', 'maxlength', 100);
	$validator->addRule('job_description', 'Opis oferty wymagany', 'required');
	$validator->addRule('job_description', 'Opis oferty musi zawierać conajmniej 50 znaków.', 'minlength', 50);
	$validator->addRule('job_description', 'Opis oferty może zawierać maksymalnie 1500 znaków.', 'maxlength', 2500);

	// Input the POST data and check it
    $validator->addEntries($_POST);
    $validator->validate();

    // Retrieve an associative array of "sanitized" form inputs (HTML tags stripped, etc.)
    $entries = $validator->getEntries();

	// Replace the default field values with what the user submitted
    foreach ($entries as $key => $value) {
        ${$key} = $value;
    }

	if ($validator->foundErrors()) {
        $errors = $validator->getErrors();
    } else { 

    	//If all field is okay use method create
		if($offerObject->create($_POST, $_SESSION['logged_user_id'],$userPermission)){
			echo 'dodano oferte pracy';
			Helpers::redirectToManageOffers();
		}
		else {
			Helpers::redirectToManageOffers();
		}

	}
}

?>

<div class="container pb-5">
	<div class="col-12 col-xs-6 col-xs-offset-3">
		
		<a href="<?php echo APP_URL . "?page=offers" ?>"><button type="button" class="btn btn-primary" style="float: right;">
		<i style="padding-right: 10px;padding-top: 0px !important;margin-top: -5px;" class="fa fa-angle-double-left" aria-hidden="true"></i>Powrót do ofert</button></a>
		<h3 class="pt-3 pb-3">Dodawanie nowej oferty</h3> 

		<!-- Display errors -->
		<?php if (!empty($errors)) : ?>
            <div class="alert alert-danger mt-4" role="alert">
                <?php foreach($errors as $field => $msg) : ?>
                  <?php echo $msg; ?> <br/>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

		<!-- CREATE JOB POST FORM -->
		<form method="POST">

		  <div class="form-group">
		    <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nazwa oferty" value="<?php echo $name ?>" required>
		  </div>

		  <div class="form-group">
		    <label for="exampleFormControlSelect1">Kategoria</label>
		    <select name="job_type" class="form-control" id="exampleFormControlSelect1">
		      <?php 
		    	foreach($jobTypes as $type) {
		    		echo '<option value="'.$type['id'].'">'.ucfirst($type['name']).'</option>';
				}
		    	?>
		    </select>
		  </div>

		<div class="form-group">
		    <label for="exampleFormControlSelect1">Województwo</label>
		    <select name="province" class="form-control" id="exampleFormControlSelect1">
		    <?php 
		    	foreach($jobProvinces as $province) {
		    		echo '<option value="'.$province['id'].'">'.ucfirst($province['name']).'</option>';
				}
		    ?>
		    </select>
		  </div>

		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Opis oferty</label>
		    <textarea name="job_description" id="text" ><?php echo $job_description ?></textarea>
			<script>
			 CKEDITOR.replace( 'text' );
			</script>
		  </div>

			<input type="submit" name="submit" class="btn btn-success" value="Dodaj">

		</form>
		<!-- END CREATE JOB POST FORM -->

	</div>
</div>
<?php } 
else {
	Helpers::redirectToLogin();
}}
else {
	Helpers::redirectToLogin();
}
?>