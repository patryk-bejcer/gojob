<?php 
    $jobProvinces = $offerObject->getProvinces(); //get all provinces to array
    $jobTypes = $offerObject->getJobTypes(); // get all job types to array
    if(isset($_GET['id_category'])){
        $id_category = $_GET['id_category'];
    }
     if(isset($_GET['id_provinces'])){
        $id_provinces = $_GET['id_provinces'];
    }


?>

        <form class="form-inline" action="">
            <input name="s" class="form-control mr-sm-2" type="text" placeholder="Czego szukamy?" aria-label="Search">
        </form>
          <div class="sidebar-module">
            <h4>Kategorie:</h4>
            <ol class="list-unstyled">   
                <?php 
                    if(isset($id_provinces)){
                        foreach($jobTypes as $type) {

                            echo '<li><a href="'. APP_URL . "?page=offers&action=category&id_provinces=". $id_provinces ."&id_category=" . $type['id'] .'">'.ucfirst($type['name']).'</a></li>';
                        }
                         echo '<li><a class="text-muted" href="'. APP_URL . "?page=offers&action=category&id_provinces=" . $id_provinces .'" > wyczyść filtr Categorii</a></li>';
                    } else {
                        foreach($jobTypes as $type) {
                            echo '<li><a href="'. APP_URL . "?page=offers&action=category&id_category=" . $type['id'] .'">'.ucfirst($type['name']).'</a></li>';
                       }?>
                         <li ><a class="text-muted" href="<?php echo APP_URL . "?page=offer&action=category"?>"> Wyczyść filtr Categorii </a></li>
                   <?php }
                ?>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Regiony:</h4>
            <ol class="list-unstyled">
                <?php 
                if(isset($id_category)){
                        foreach($jobProvinces as $province) {
                            echo '<li><a href="'. APP_URL . "?page=offers&action=category&id_category=". $id_category ."&id_provinces=" . $province['id'] .'" class="province">'.ucfirst($province['name']).'</a></li>';
                        }
                        echo '<li><a class="text-muted" href="'. APP_URL . "?page=offers&action=category&id_category=" . $id_category .'" > wyczyść filtr Regionów</a></li>';
                    } else {
                        foreach($jobProvinces as $province) {
                            echo '<li><a href="'. APP_URL . "?page=offers&action=category&id_provinces=" . $province['id'] .'" class="province">'.ucfirst($province['name']).'</a></li>';
                        }?>
                         <li ><a class="text-muted" href="<?php echo APP_URL . "?page=offer&action=category"?>"> Wyczyść filtr Regionów </a></li>
                   <?php }
                ?>
        </ol>
   	</div>
