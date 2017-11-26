<?php  
    $offerObject = new Offers();
    
    $jobPosts = $offerObject->getJobPosts();


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
    <h2 class="mb-4">Oferty pracy:</h2>
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
            <div class="view overlay hm-white-slight z-depth-1-half pb-2">
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
} ?>
</div>

                <!--Grid column-->


            </div>
</section>