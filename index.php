<?php

session_start();

include 'config/db.php';
include 'func/function.php';

if (empty($_SESSION['USER_ID'])){
	redirect('login.php', $time=0);

}else{
	include 'header.php';
	if(isset($_GET['page']))//cek include page
	include $_GET['page'].'.php';
	else{
		include 'home.php';
	}
	include 'footer.php';

}
?>
