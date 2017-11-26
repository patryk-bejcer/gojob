<?php

	if(isset($_GET['s'])){
		$searchObj = new Search($_GET['s']);
		if($searchObj->search()){
			$_SESSION['searchResultArr'] = $searchObj->search();
			header("Location: " . APP_URL . "?page=search&term=" . $_GET['s']);
		} else {
			header("Location: " . APP_URL . "?page=search");
		}
	}

?>

<form class="form-inline" action="">
	<input name="s" class="form-control mr-sm-2" type="text" placeholder="Szukaj" aria-label="Search">
</form>



