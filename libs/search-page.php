<?php 
    $offerObject = new Offers();
	$searchResult = $_SESSION['searchResultArr'];
	$offersObj = new Offers;

?>



<!--Section: Blog v.3-->
<section class="section extra-margins pb-3 text-center text-lg-left offers">
	
<div class="row text-left">
<div class="col-sm-3">
    <?php require_once ('template-parts/sidebar.php'); ?>
</div>

<div class="col-9">

	<?php if(isset($_GET['term']) && ($_GET['term'] != '')): ?>

		<h2 class="section-heading h1 pt-4 pb-4">Wyniki wyszukiwania dla "<?php echo $_GET['term']; ?>"</h2>

	<?php foreach($searchResult as $post) { ?>

	<?php if ($post['is_active'] == 1) :?>
    <!--Grid row-->
    <!--Grid row-->
    <div class="row"> 

        <!--Grid column-->
        <div class="col-lg-4 mb-1">
            <!--Featured image-->
            <div class="view overlay hm-white-slight z-depth-1-half">
                <img src="<?php echo APP_URL . $offerObject->getUserImage($_SESSION['logged_user_id']);?>" class="img-fluid" alt="First sample image">
                <a href="<?php echo APP_URL . "?page=offer&id=" . $post['id'] ?>">
                    <div class="mask"></div>
                </a>
            </div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-8 mb-1">
            <!--Excerpt-->
            <a href="<?php echo APP_URL . "?page=offers&action=category&id_category=" . $post['job_type_id']  ?>" class="indigo-text"><h6 class=""><!-- <i class="fa fa-heart"></i> --><strong> <?php echo $offerObject->getJobTypeByID($post['job_type_id']); ?> </strong></h6></a>
            <a href="<?php echo APP_URL . "?page=offer&id=" . $post['id'] ?>"><h5 class=""><strong><?php echo $post['name']; ?></strong></h5></a>
            <p><?php echo strip_tags(Helpers::getExcerpt($post['job_description'],0,160)); ?></p>
            <p>przez: <a><strong><?php echo $offerObject->getCompanyNameByID($post['user_account_id']); ?></strong></a>, <?php echo $post['created_date']; ?></p>
            <!-- <a class="btn btn-primary btn-sm" href="<?php echo APP_URL . "?page=offer&id=" . $post['id'] ?>">Zobacz więcej</a> -->
        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->

    <hr class="mb-4">

	<?php endif; ?>

	<?php } ?>

	<?php else: ?>

		<h2 class="section-heading h1 pt-4 pb-4">Brak wyników wyszukiwania!</h2>

	<?php endif; ?>

</section>
<!--Section: Blog v.3-->