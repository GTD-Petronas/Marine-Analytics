<?php
	unset($_SESSION["USER_ID"]);
	unset($_SESSION["name"]);
	unset($_SESSION["inspection_id"]);
	unset($_SESSION["inspection_id_edit"]);
	redirect('index.php');
?>
