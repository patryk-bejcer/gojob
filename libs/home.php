<?php  
    $offerObject = new Offers();
    $jobPosts = $offerObject->getLimitJobPosts(8);

?>

<h3 class="mb-4">Ostatnie oferty pracy:</h3>
<section class="section magazine-section offers offers-home">
<div class="row text-left">

<!--Grid column-->
<?php
    foreach($jobPosts as $post) { 


        if ($post['is_active'] == 1){
        ?>

    <div class="col-lg-6 col-md-6">

                    <!--Small news-->
                    <div class="single-news">

                        <div class="row">
                           <!--  <div class="col-md-3" style="padding:0px;"> -->

                                <!--Image-->
                                <!-- <div class="view overlay hm-white-slight z-depth-1-half">
                                    <img src="<?php echo APP_URL ?>/images/logoo.png" class="img-fluid" alt="Minor sample post image">
                                    <a href="<?php echo APP_URL . "?page=offer&id=" . $post['id'] ?>">
                                        <div class="mask waves-effect waves-light"></div>
                                    </a>
                                </div>
                            </div> -->

                            <!--Excerpt-->
                            <div class="col-md-11 pb-2">
                                <!-- <strong><?php echo $post['created_date']; ?></strong> -->
                                <a href="<?php echo APP_URL . "?page=offers&action=category&id_category=" . $post['job_type_id'] ?>" class="indigo-text"><h6 class=""><!-- <i class="fa fa-heart"></i> --><strong> <?php echo $offerObject->getJobTypeByID($post['job_type_id']); ?> </strong></h6></a>
                                <a href="<?php echo APP_URL . "?page=offer&id=" . $post['id'] ?>"><h3 style="font-size:1.35rem; margin-bottom: 0.20rem;"><?php echo $post['name']; ?></h3>
                                    
                                </a>
                                <?php echo strip_tags(Helpers::getExcerpt($post['job_description'],0,140)); ?>
                            </div>

                        </div>
                    </div>

                </div>
                    <!--/Small news-->
<?php 
}
} ?>


                <!--Grid column-->


            </div>
</section>