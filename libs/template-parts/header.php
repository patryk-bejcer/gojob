<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>GoJob - Twój portal z pracą</title>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo APP_URL ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo APP_URL ?>assets/css/font-awesome.min.css">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo APP_URL ?>assets/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?php echo APP_URL ?>assets/css/style.css" rel="stylesheet">
    <!-- <script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script> -->
    <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>


</head>
<body>

<header>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
				<div class="container">
                <a class="navbar-brand" href="<?php echo APP_URL ?>">GoJob</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-3" aria-controls="navbarSupportedContent-3" aria-expanded="false" aria-label="Toggle navigation" style="">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-3">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link waves-effect waves-light" href="<?php echo APP_URL ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" href="<?php echo APP_URL . "?page=offers" ?>">Oferty</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" href="<?php echo APP_URL ?>">Nasze porady</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" href="<?php echo APP_URL . "?page=contact" ?>">Kontakt</a>
                        </li>
                        
<!--                         <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown 
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-unique" aria-labelledby="navbarDropdownMenuLink-3">
                                <a class="dropdown-item waves-effect waves-light" href="#">Action</a>
                                <a class="dropdown-item waves-effect waves-light" href="#">Another action</a>
                                <a class="dropdown-item waves-effect waves-light" href="#">Something else here</a>
                            </div>
                        </li> -->

                    </ul>
                    <!-- Search form -->
                    
                    <ul class="navbar-nav ml-auto nav-flex-icons">
                    	<li class="nav-item">
                            <a class="nav-link waves-effect waves-light"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <?php if (!empty($_SESSION['logged_user_id'])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> 
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-unique" aria-labelledby="navbarDropdownMenuLink" style="position: absolute;">
                                <a class="dropdown-item waves-effect waves-light" href="<?php echo APP_URL . "?page=dashboard"; ?>">GoJob Panel</a>
                                <a class="dropdown-item waves-effect waves-light" href="<?php echo APP_URL . "?page=user&action=profile&id=" . $_SESSION['logged_user_id'] . '"' ?>">Mój profil</a>
                                <a class="dropdown-item waves-effect waves-light" href="<?php echo APP_URL . "?page=logout" ?>">Wyloguj</a>
                            </div>
                        </li>
                    <?php endif; ?>
                    </ul>
                    <?php require_once ('widgets/search-widget.php'); ?>
                </div></div>
            </nav>

		<?php if(!isset($_GET['page'])): ?>
		
        <!--Intro Section-->
        <section class="view intro-2 hm-gradient">
            <div class="full-bg-img">
                <div class="container flex-center">
                    <div class="row flex-center pt-5 mt-3">
                        <div class="col-md-6 text-center text-md-left margins">
                            <div class="white-text">
                                <h1 class="h1-responsive wow fadeInLeft pt-5" data-wow-delay="0.3s" style="animation-name: none; visibility: visible;">Szukasz pracy? <br>Trafiłeś w dobre miejsce </h1>
                                    <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s" style="animation-name: none; visibility: visible;">
                                    <h6 class="wow fadeInLeft" data-wow-delay="0.3s" style="animation-name: none; visibility: visible;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga nesciunt dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea dolor molestiae iste.</h6>
                                    <br>
                                    <?php if (empty($_SESSION['logged_user_id'])): ?>
                                    <a  href="<?php echo APP_URL . "?page=register" ?>" class="btn btn-outline-white wow fadeInLeft waves-effect waves-light" data-wow-delay="0.3s" style="animation-name: none; visibility: visible;">Dołącz do nas</a>
                                    <a  href="<?php echo APP_URL . "?page=login" ?>" class="btn btn-outline-white wow fadeInLeft waves-effect waves-light" data-wow-delay="0.3s" style="animation-name: none; visibility: visible;">Zaloguj się
                                    </a>
                                	<?php endif; ?>
                            </div>
                        </div>
                        
                        <div class="col-md-6 wow fadeInRight d-flex justify-content-center" data-wow-delay="0.3s" style="animation-name: none; visibility: visible;">
                            <img style="margin-bottom: -50px;" src="<?php echo APP_URL; ?>assets/img/Businesswoman.png" alt="" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php else: ?>

            <!--Intro Section-->
        <section class="view intro-2 hm-gradient" style="height: 200px;">
            <div class="full-bg-img">

            </div>
        </section>	

    <?php endif; ?>
    
    </header>

	<main role="main" class="container pt-5 pb-4">


