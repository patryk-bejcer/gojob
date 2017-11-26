<?php
echo'
<div class = "container">
<p><strong> Twoje Aplikacje :</strong></p>';



	$App = new ApplicationsManager;
	$UserManagerObject = new UserManager;
	$logged_user_id = $_SESSION['logged_user_id'];
	$OfferObject = new Offers;

	$company = $UserManagerObject->getCompanyID($logged_user_id);
	
	$applications = $App->getApplicationsByCompanyID($company['id']);


	echo '<table class="table table-responsive table-bordered mt-3 ">
						<thead>
						<tr>
						<td>#</td>
						<td>Imię</td>
						<td>Nazwisko</td>
						<td>Oczekiwane Zarobki</td>
						<td>CV Kandydata</td>
						<td>Twoja Oferta</td>
						</tr>

						';
						
	if(!empty($applications)){


		
	foreach($applications as $application){ ?>

		<tr>
			<td> </td>
			<td><?php echo $application['seeker_name'] ?> </td>
			<td><?php echo $application['seeker_lastname'] ?> </td>
			<td><?php echo $application['seeker_salary'] ?> </td>
			<td><?php echo $application['seeker_name'] ?> </td>
			<td><a href="<?php echo APP_URL; ?>?page=offer&id=<?php echo $application['id_post'];  ?>"><?php echo $OfferObject->getPostByID($application['id_post'])['name']; ?></a> </td>
		</tr>
			

	
	<?php } ?>

	</table>

	<?php

	 }else {

		echo 'Nie ma żadnych aplikacji';
	}

	
?>

