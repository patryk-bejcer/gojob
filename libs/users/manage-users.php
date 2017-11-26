

<?php 
if (!empty($_SESSION['logged_user_id'])){

		$userPermission = Helpers::getUserType();

		if ( (!empty ($userPermission)) ){
			if  (($userPermission == '3')){
				?>	
					<div class="container">
						
						<h2>Lista użytkowników</h2>

						<table class="table table-responsive table-bordered mt-3 manage-offers-table">
						<thead>

						<?php 

							$userObject = new UserManager; //Create offers instance
							if ($userPermission == '3') {

							$users = $userObject->getUsers();

							echo 
							'<tr>
							      <th>#</th>
							      <th>E-mail</th>
							      <th>Numer kontaktowy</th>
							      <th>Data rejestracji</th>
							    </tr>
							  </thead>
							  <tbody>';

								$i = 0;
						    	foreach($users as $user) {
						    		
						    		$i++;
						    		
						    	echo '
								<tr>
							      <th scope="row">'.$i.'</th>
							      <td>'.$user['email'].'</td>
							      <td>'.$user['contact_number'].'</td>
							      <td>'.$user['registration_date'].'</td>
							      <td>
									
									'?>

									<?php echo '

							      	<a title="Edycja" href="'. APP_URL . '?page=manage-users&action=edit&id='.$user['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a class="confirm" title="Usuń" href="'. APP_URL . '?page=manage-users&action=remove&id='.$user['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a>
							      </td>
							    </tr>
						    	';
								}
							}

				    	?>

						</tbody>
					</table>

					</div>
				<?php
			} else {

				Helpers::redirectTo404();
				exit;
			}
		}
} else {
	Helpers::redirectToLogin();
	exit;
}

?>


