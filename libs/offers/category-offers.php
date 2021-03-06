<?php  

    if(isset($_GET['id_category'])){
    	$id_category = $_GET['id_category'];

    } else{
        $id_category = null;
    }
    if(isset($_GET['id_provinces'])){
        $id_provinces = $_GET['id_provinces'];
    } else {
        $id_provinces = null;
    }

    $offerObject = new Offers();
    

    if(isset($_SESSION['logged_user_id'])){
        $user_id = $_SESSION['logged_user_id'];
    }
    

?>


<section class="section offers magazine-section">


<div class="row text-left">
<div class="col-12 col-sm-3">
    <?php require_once ('template-parts/sidebar.php'); ?>
</div>

<div class="col-12 col-sm-9">

	<?php 

		if($jobPosts = $offerObject->getPostsByCategoryAndProvinces($id_category, $id_provinces)):
	?>

    <!--<h2 class="mb-4">Oferty pracy w kategorii "<?php echo $offerObject->getJobTypeByID($catID) ?>"</h2>
<!--Grid column-->
<?php
    foreach($jobPosts as $post) { 


        $postID = (string)$post['id'];
        $authorID = $offerObject->getAuthorID($post['id']);
        if ($post['is_active'] == 1){


        ?>

    <!--Grid row-->
    <div class="row"> 

        <!--Grid column-->
        <div class="col-lg-4 mb-3">
            <!--Featured image-->
            <div class="view overlay hm-white-slight z-depth-1-half">
                <img src="<?php echo APP_URL . $offerObject->getUserImage($authorID);?>" class="img-fluid" alt="First sample image">
                <a href="<?php echo APP_URL . "?page=offer&id=" . $post['id'] ?>">
                    <div class="mask"></div>
                </a>
            </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-8 mb-1">
            <!--Excerpt-->
            <a href="<?php echo APP_URL . "?page=offers&action=category&id=" . $post['job_type_id'] ?>" class="indigo-text"><h6 class=""><!-- <i class="fa fa-heart"></i> --><strong> <?php echo $offerObject->getJobTypeByID($post['job_type_id']); ?> </strong></h6></a>
            <a href="<?php echo APP_URL . "?page=offer&id=" . $post['id'] ?>"><h5 class=""><strong><?php echo $post['name']; ?></strong></h5></a>
            <p><?php echo strip_tags(Helpers::getExcerpt($post['job_description'],0,160)); ?></p>
            <p>przez: <a><strong><?php echo $offerObject->getCompanyNameByID($post['user_account_id']); ?></strong></a>, <?php echo $post['created_date']; ?></p>
            <!-- <a class="btn btn-primary btn-sm" href="<?php echo APP_URL . "?page=offer&id=" . $post['id'] ?>">Zobacz więcej</a> -->
        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->

    <hr class="mb-4">
<?php 

}
} 

else:

	echo '<h2>Brak ogłoszeń w wybranej kategorii</h2>';

endif;

?>
</div>

                <!--Grid column-->


            </div>
</section>