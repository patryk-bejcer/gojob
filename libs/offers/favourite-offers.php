<?php 
if (!empty($_SESSION['logged_user_id'])){

		$userPermission = Helpers::getUserType();
				?>	
					<div class="container">

						<h2>Ulubione oferty:</h2>

						<table class="table table-responsive table-bordered mt-3 manage-offers-table">
						<thead>

						<?php 


							$offerObject = new Offers; //Create offers instance
							if($userPermission == '1'){

							$jobPosts = $offerObject->getFavourite($_SESSION['logged_user_id']);

							foreach ($jobPosts as $post) { ?>
								<div class="col-lg-8 mb-1">
         
						        
						            <a href="<?php echo APP_URL . "?page=offer&id=" . $post['id'] ?>"><h5 class=""><strong><?php echo $post['name']; ?></strong></h5></a>
						            <p><?php echo strip_tags(Helpers::getExcerpt($post['job_description'],0,160)); ?></p>
						            <p> data dodania : <?php echo $post['created_date']; ?></p>
						            <!-- <a class="btn btn-primary btn-sm" href="<?php echo APP_URL . "?page=offer&id=" . $post['id'] ?>">Zobacz więcej</a> -->
						        </div>

							<?php }

							exit;

							echo 
							'<tr>
							      <th>#</th>
							      <th>Nazwa oferty</th>
							      <th>Branża</th>
							      <th>Województwo</th>
							      <th>Dodano</th>
							      <th>Aktywne</th>
							    </tr>
							  </thead>
							  <tbody>';

								$i = 0;
						    	foreach($jobPosts as $post) {
						    		if($post['is_active'] == '1') $active = 'Tak'; 
						    		else $active = 'Nie';
						    		$i++;

						    	echo '
								<tr>
							      <th scope="row">'.$i.'</th>
							      <td>'.$post['name'].'</td>
							      <td>'.ucfirst($offerObject->getJobTypeByID($post['job_type_id'])).'</td>
							      <td>'.ucfirst($offerObject->getJobProvinceByID($post['job_province_id'])).'</td>
							      <td>'.$post['created_date'].'</td>
							      <td>'.$active .'</td>
							      <td>
							      	<a title="Podgląd" href="'. APP_URL . '?page=offer&id='.$post['id'].'"><i class="fa fa-eye" aria-hidden="true"></i></a>
							      	<a title="Edycja" href="'. APP_URL . '?page=offers&action=edit&id='.$post['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a title="Usuń" class="confirm" href="'. APP_URL . '?page=offers&action=remove&id='.$post['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a>
							      </td>
							    </tr>
						    	';
								}

							} else if ($userPermission == '3') {

							$jobPosts = $offerObject->getJobPosts();

							echo 
							'<tr>
							      <th>#</th>
							      <th>Nazwa oferty</th>
							      <th>Branża</th>
							      <th>Województwo</th>
							      <th>Dodano</th>
							      <th>Aktywne</th>
							      <th>Autor</th>
							    </tr>
							  </thead>
							  <tbody>';

								$i = 0;
						    	foreach($jobPosts as $post) {
						    		if($post['is_active'] == '1') $active = 'Tak'; 
						    		else $active = 'Nie';
						    		$i++;
						    		
						    	echo '
								<tr>
							      <th scope="row">'.$i.'</th>
							      <td>'.$post['name'].'</td>
 								  <td>'.ucfirst($offerObject->getJobTypeByID($post['job_type_id'])).'</td>
							      <td>'.ucfirst($offerObject->getJobProvinceByID($post['job_province_id'])).'</td>
							      <td>'.$post['created_date'].'</td>
							      <td>'.$active .'</td>
							      <td>'.$offerObject->getCompanyNameByID($post['user_account_id']).'</td>
							      <td>
									
									'?>

									<?php if ($post['is_active'] == 0) :?>
	

									<?php echo '

									<a title="Aktywuj" href="'. APP_URL . '?page=active-offer&id='.$post['id'].'"><i class="fa fa-check" aria-hidden="true"></i></a>



									'?>

									<?php else: ?>

									<?php echo '<a title="Deaktywuj" href="'. APP_URL . '?page=deactive-offer&id='.$post['id'].'"><i class="fa fa-times" aria-hidden="true"></i></a>' ?>

									<?php endif; ?>

									<?php echo '

							      	<a title="Podgląd" href="'. APP_URL . '?page=offer&id='.$post['id'].'"><i class="fa fa-eye" aria-hidden="true"></i></a>
							      	
							      	<a title="Edycja" href="'. APP_URL . '?page=offers&action=edit&id='.$post['id'].'"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a title="Usuń" class="confirm" href="'. APP_URL . '?page=offers&action=remove&id='.$post['id'].'"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
	Helpers::redirectToLogin();
	exit;
}

?>


