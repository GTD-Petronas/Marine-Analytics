<?php



//redirect $url  $time=seconds
	function redirect($url, $time=0)
	{
	if (!headers_sent())
	{
	header("refresh:$time;URL=$url");
	exit;
	}
	else
	{
	echo "<meta http-equiv=\"refresh\" content=\"$time;url=$url\">\r\n";
	}
	}



	function date_dmy($date){

	if($date != '0000-00-00' && $date != ''&& $date != '1970-01-01')
	$date_formated = date('Y-m-d',strtotime($date));
	else
	$date_formated = '';

	return $date_formated;
	}
 ?>
