<?php 

$userObject = new UserManager();

$user = $userObject->getSeekerProfile($_GET['id']);

if (file_exists($user['user_image'])){

  $user_cv = $user['user_image'];
}

if (!empty($_SESSION['logged_user_id'])){

    $userID = Helpers::getLoggedUserFromSession();

    $dashboard = new Dashboard;

    $userType = $dashboard->getUserPermission($_SESSION['logged_user_id']);

    // echo $userType;

    if ( (!empty ($userType)) ){

      if ($userType == '2'){ //for company

        $userProfile = $userObject->getCompanyProfile(Helpers::getLoggedUserFromSession());

        ?>

        
        
        <div class="col-md-9" style="padding-left: 0;">



        <div class="panel panel-default">

          <div class="panel-heading"> 
          
           <div class="panel-body"> 

            <div class="box box-info">
                <div class="box-body">
                         <div class="col-sm-6">
                          <a class="pb-3" href="<?php echo APP_URL . "?page=users&action=edit&id=" . $userProfile['user_account_id'] ?>"><button type="button" class="btn btn-primary mb-3 btn-sm">Edytuj dane</button></a>

           <h3 class="pb-2" style=""><?php echo $userProfile['company_name']; ?></h3></div>
                         <div  align="left"> <img alt="User Pic" src="<?php echo APP_URL . $userProfile['user_image']; ?>" id="profile-image1" class="img-circle img-responsive"> 
                  </div>
                    <br>
                    </div>
                    <div class="col-sm-12">
                    <h4 >Informacje o firmie </h4></span>  
                    </div>
                    <div class="clearfix"></div>
                    <hr style="margin:5px 0 5px 0;">
            
                    <div class="col-sm-5 col-xs-6 tital " >Nazwa firmy:</div><div class="col-sm-12 col-xs-6 "><?php echo $userProfile['company_name']; ?></div>
                         <div class="clearfix"></div>
                    <div class="bot-border"></div>  
                    <div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7 col-xs-6 "><?php echo $userProfile['email']; ?></div>
                         <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <div class="col-sm-5 col-xs-6 tital " >Telefon:</div><div class="col-sm-7 col-xs-6 "><?php echo $userProfile['contact_number']; ?></div>
                         <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <div class="col-sm-5 col-xs-6 tital " >Strona WWW:</div><div class="col-sm-7 col-xs-6 "><a target="_blank" href="<?php echo $userProfile['company_website_url']; ?>"><?php echo $userProfile['company_website_url']; ?></a></div>
                         <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <div class="col-sm-5 col-xs-6 tital " >O firmie:</div><div class="col-sm-12 col-xs-12 "><?php echo $userProfile['profile_description']; ?></div>
                         <div class="clearfix"></div>
                    <div class="bot-border"></div>  
                    <div class="col-sm-5 col-xs-6 tital " >Data założenia:</div><div class="col-sm-7 col-xs-6 "><?php echo $userProfile['date_of_birth']; ?></div>
                         <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <div class="col-sm-5 col-xs-6 tital " >Data dołączenia do portalu:</div><div class="col-sm-7 col-xs-6 "><?php echo $userProfile['registration_date']; ?></div>
                         <div class="clearfix"></div>
                    <div class="bot-border"></div>

                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>      
            </div> 
            </div>
        </div>  
 
        <?php

      } else if ($userType == '1') {

        $userProfile = $userObject->getSeekerProfile(Helpers::getLoggedUserFromSession());
        ?>

        <div class="col-md-9" style="padding-left: 0;">

        <div class="panel panel-default">
         <div class="col-sm-6">
                          <a class="pb-3" href="<?php echo APP_URL . "?page=users&action=edit&id=" . $userProfile['user_account_id'] ?>"><button type="button" class="btn btn-primary mb-3 btn-sm">Edytuj dane</button></a>

          <div class="panel-heading">  <h4 class="pb-4" style="padding-left: 15px;"><?php echo $userProfile['first_name'] . ' ' . $userProfile['last_name']; ; ?></h4></div>
           <div class="panel-body"> 
            <div class="box box-info">
                <div class="box-body">
                         <div class="col-sm-6">
                         <div  align="left"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 
                  </div>
                    <br>
                    </div>
                    <div class="col-sm-12">
                    <h4 >Informacje o firmie </h4></span>  
                    </div>
                    <div class="clearfix"></div>
                    <hr style="margin:5px 0 5px 0;">
            
                    <div class="col-sm-5 col-xs-6 tital " >Imię i nazwisko:</div><div class="col-sm-12 col-xs-6 "><?php echo $userProfile['first_name'] . ' ' . $userProfile['last_name']; ; ?></div>
                         <div class="clearfix"></div>
                    <div class="bot-border"></div>  
                    <div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7 col-xs-6 "><?php echo $userProfile['email']; ?></div>
                         <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <div class="col-sm-5 col-xs-6 tital " >Oczekwiane zarobki:</div><div class="col-sm-7 col-xs-6 "><?php echo $userProfile['current_salary'] . ' ' . $userProfile['currency']; ?></div>
                         <div class="clearfix"></div>
                    <div class="bot-border"></div>  
                    <div class="col-sm-5 col-xs-6 tital " >Data urodzenia:</div><div class="col-sm-7 col-xs-6 "><?php echo $userProfile['date_of_birth']; ?></div>
                         <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <div class="col-sm-5 col-xs-6 tital " >Data dołączenia do portalu:</div><div class="col-sm-7 col-xs-6 "><?php echo $userProfile['registration_date']; ?></div>
                         <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <?php if(file_exists($user['user_image'])){
                      ?>
                        <div class= "bot-border">
                          <div class ="col-sm-5 col-xs-6 tital">
                            <a class = "bootstrap-link" target = "_blank" href="<?php echo APP_URL . $user['user_image'] ?>"> Zobacz swoje CV </a>
                            </div>
                        </div>
                      <?php } ?>


                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>      
            </div> 
            </div>
        </div> 


        <?php


      } else if ($userType == '3') {

        $userProfile = $userObject->getAdminProfile(Helpers::getLoggedUserFromSession());


        ?>

        <div class="col-md-5" style="padding-left: 0;">

        <div class="panel panel-default">
          <div class="panel-heading">  <h4 class="pb-4" style="padding-left: 15px;">Profil Administratora</h4></div>
           <div class="panel-body"> 
            <div class="box box-info">
                    <div class="box-body">
                             <div class="col-sm-6">
                             <div  align="left"> <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="img-circle img-responsive"> 
                      </div>
                      <br>
                    </div>
                    <div class="col-sm-12">
                    <h4 >Informacje o użytkowniku </h4></span>  
                    </div>
                    <div class="clearfix"></div>
                    <hr style="margin:5px 0 5px 0;">
            
                      
                    <div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7 col-xs-6 "><?php echo $userProfile['email']; ?></div>
                         <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <div class="col-sm-5 col-xs-6 tital " >Telefon:</div><div class="col-sm-7 col-xs-6 "><?php echo $userProfile['contact_number']; ?></div>
                         <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <div class="col-sm-5 col-xs-6 tital " >Data urodzenia:</div><div class="col-sm-7 col-xs-6 "><?php echo $userProfile['date_of_birth']; ?></div>
                         <div class="clearfix"></div>
                    <div class="bot-border"></div>
                    <div class="col-sm-5 col-xs-6 tital " >Data rejestracji:</div><div class="col-sm-7 col-xs-6 "><?php echo $userProfile['registration_date']; ?></div>
                         <div class="clearfix"></div>
                    <div class="bot-border"></div>

                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>      
            </div> 
            </div>
        </div>  


        <?php

      } else {

        Helpers::redirectToLogin();

      }

    }


} else {

  Helpers::redirectToLogin();
}

?>

       
       
       
       
       
       
       
 

         