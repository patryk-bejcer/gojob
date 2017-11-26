<?php 

$userID = Helpers::getLoggedUserFromSession();

?>

<div class="container dynamicTile">
<div class="row pt-3 pb-5">

    <div class="col-sm-2 col-xs-4">
    <a href="<?php echo APP_URL . "?page=offers&action=manage" ?>">
    	<div id="tile1" class="tile example hoverable">
         <i class="fa fa-files-o fa-5x"></i>
         <h4>Oferty</h4>
    	</div>
    </a>
	</div>
     <div class="col-sm-2 col-xs-4">
    <a href="<?php echo APP_URL . "?page=offers&action=show_applications" ?>">
        <div id="tile1" class="tile example hoverable">
         <i class="fa fa-address-card-o fa-5x"></i>
         <h4>Aplikacje</h4>
        </div>
    </a>
    </div>
	<div class="col-sm-2 col-xs-4">
        <a href="<?php echo APP_URL . "?page=user&action=profile&id=$userID" ?>">
		<div id="tile2" class="tile example hoverable">
         <i class="fa fa-user-o fa-5x"></i>
         <h4>Profil</h4>
    	</div>
        </a>
	</div>

</div>




  
</div>
