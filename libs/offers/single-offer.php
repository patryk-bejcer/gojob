<?php 

	 $offersObj = new Offers;
	 $post = $offersObj->getPostByID($_GET['id']);

?>


<!-- <div class="divider-new wow fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                <h2>Classic Blog Listing</h2>
            </div>
 -->
<?php if ($post['is_active'] == 1) :?>
<div class="row">
                <!--Main listing-->
                <div class="col-md-12">
                    
                    <!--Section: Classic blog listing-->
                    <section class="section classic-blog-listing">
                        
                        
                        <!--Second post-->
                        <div class="single-post wow fadeIn" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
                           
                            <!--First row-->
                            <div class="row">
                               <!--First column-->
                                <div class="col-md-12">

                                    <!--Image-->
                                    <!-- <div class="view overlay hm-black-light">
                                        <img src="http://mdbootstrap.com/images/regular/nature/img%20(88)" class="img-fluid">
                                        <a href="#!">
                                            <div class="mask waves-effect waves-light"></div>
                                        </a>
                                    </div> -->
                                    
                                    <!--Excerpt-->
                                    <?php if (!empty($_SESSION['logged_user_id'])): ?>
                                    	<h6 style="text-align: right!important;display: block;float:right;" class="text-right"><i class="fa fa-star" aria-hidden="true"></i><a style="padding-left: 3px;" href="<?php echo APP_URL . "?page=offers&action=add-favourite&id=" . $post['id'] ?>">Dodaj do obserwowanych</a></h6>
                                	<?php endif; ?>
                                    <h6 class="text-left mb-0 pb-0"><i class="fa fa-tags" aria-hidden="true"></i>
									Kategoria:<a class="text-left" href="<?php echo APP_URL . "?page=offers&action=category&id=" . $post['job_type_id'] ?>" class="cyan-text"> <?php echo $offersObj->getJobTypeByID($post['job_type_id']); ?></a></h6>
                                    <h6 class="text-left mt-1 province"><i class="fa fa-map-marker" aria-hidden="true"></i>
									Województwo: <a class="text-left province" href="<?php echo APP_URL . "?page=offers&action=province&id=" . $post['job_province_id'] ?>" class="cyan-text"><?php echo ucfirst($offersObj->getJobProvinceByID($post['job_province_id'])); ?></a></h6>

                                     
                                    <h2 class=""><?php echo $post['name']; ?></h2>
                                    
                                    <p><?php echo $post['job_description']; ?></p>
                                    
                                    
                                    <!--Post data-->
                                    <div class="post-data">
                                        <h6>przez: <a><strong><?php echo $offersObj->getCompanyNameByID($post['user_account_id']); ?></strong></a> dnia <?php echo $post['created_date']; ?> <a href="#!" class="black-text"> </a></h6>
                                                          
                                    </div>

                                    <div class = "col-6 col-centered" >
                                            <a href = "<?php echo APP_URL . "?page=offers&action=application&id=" . $post['id'] ?>"><button class ="btn btn-primary" > Aplikuj </button></a>
                                    </div>
                                    
                                </div>
                                <!--First column-->
                            </div>
                            <!--/.First row-->
                            
                        </div>
                        <!--/.Second post-->
                        
                    </section>
                    <!--/.Section: Classic blog listing-->
                   
                </div> 
                <!--/.Main listing-->
            </div>
<?php else: Helpers::redirectTo404() ?>
<?php endif; ?>