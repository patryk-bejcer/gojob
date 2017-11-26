<?php

class MainPage{

	private $active_page;

    public function __construct($ACTIVE_PAGE) {
        
        $this->active_page = $ACTIVE_PAGE;
        
        switch($this->active_page) {

        	case 'user':
        		if(isset($_GET['action'])){

					switch ($_GET['action']){
						case 'profile':
							if(isset($_GET['id'])){
								require_once "users/user-profile.php";
							} else {
								echo 'please enter offer id';
							}
						break;
					}

				}
        	break;

        	case 'manage-users':
    			if(isset($_GET['action'])){
        			switch ($_GET['action']){
						case 'remove':
							if(isset($_GET['id'])){
								require_once "users/remove-user.php";
							} else {
								echo 'please enter offer id';
							}
						break;
						case 'edit':
							if(isset($_GET['id'])){
								require_once "users/edit-user.php";
							} else {
								echo 'please enter offer id';
							}
						break;
					}
    			} else {
    				require_once "users/manage-users.php";
    			}	
        	break;

        	case 'users':
        		if(isset($_GET['action'])){
        			switch ($_GET['action']){
						case 'edit':
							if(isset($_GET['id'])){
								require_once "users/edit-user.php";
							} else {
								echo 'please enter offer id';
							}
						break;
					}
        		}
        	break;


        	/* JOB OFFERS */
			case 'offers':
				if(isset($_GET['action'])){

					switch ($_GET['action']){

						case 'category':

							if(isset($_GET['id_category'])){
								require_once "offers/category-offers.php";
							}
								if(isset($_GET['id_provinces'])){
								require_once "offers/category-offers.php";
							}

							if(isset($_GET['id'])){
								require_once "offers/category-offers.php";
							}
								
							
							
						break;

						case 'province':
							if(isset($_GET['id_provinces'])){
								require_once "offers/category-offer.php";
							}
						break;

						case 'create':
							require_once "offers/create-offer.php";
						break;

						case 'edit':
							if(isset($_GET['id'])){
								require_once "offers/edit-offer.php";
							} else {
								echo 'please enter offer id';
							}
						break;
						case 'application':
							if(isset($_GET['id'])){
								require_once "offers/application-offer.php";


							} else {
								Helpers::redirectToHome();
							}

						break;

						case 'remove':
							if(isset($_GET['id'])){
								require_once "offers/remove-offer.php";
							} else {
								echo 'please enter offer id';
							}
						break;

						case 'favourite-offers':
							require_once "offers/favourite-offers.php";
						break;

						case 'add-favourite':
							if(isset($_GET['id'])){
								require_once "offers/add-to-favourite.php";
							} else {
								echo 'please enter offer id';
							}
						break;

						case 'manage':
							require_once "offers/manage-offers.php";
						break;

						case 'show_applications':
							require_once "offers/show_applications-offer.php";
						break;

						default:	
						require_once "offers/manage-offers.php";
						break;

					}

				} else {
					require_once "offers/offers-page.php";
				}
				break;

				case 'offer':
					if(isset($_GET['id'])){
						require_once "offers/single-offer.php";
					} else {
						require_once "offers/offers-page.php";
					}
				break;

				case 'active-offer':
					if(isset($_GET['id'])){
						require_once "offers/active-offer.php";
					} else {
						echo 'please enter offer id';
					}
				break;

				case 'deactive-offer':
					if(isset($_GET['id'])){
						require_once "offers/deactive-offer.php";
					} else {
						echo 'please enter offer id';
					}
				break;

				/* ENF OF JOB OFFERS */

        	/* JOB OFFERS */
			case 'dashboard':
				if(isset($_GET['action'])){

					switch ($_GET['action']){

						default:	
						require_once  "dashboard/index.php";
						break;

					}

				}
				require_once  "dashboard/index.php";
				break;

				/* ENF OF JOB OFFERS */


			case 'login':
				require_once "templates/login.php";
				break;

			case 'logout':
				require_once $this->active_page.".php";
				break;

			case 'register':
				require_once "templates/register.php";
				break;	


			case 'contact':
				require_once $this->active_page.".php";
				break;

			case 'search':
				require_once "search-page.php";
				break;
			
			default:
				require_once "404.php";
				break;
		}



	}


	
}