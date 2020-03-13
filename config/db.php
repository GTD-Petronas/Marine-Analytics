<?php
date_default_timezone_set ("Asia/Kuala_Lumpur");
// $serverName = "CEN302DB-PR1"; //serverName\instanceName
$serverName = "10.14.49.121"; //serverName\instanceName
$connectionInfo = array( "Database"=>"DEV_PDTHSEPM_CDS", "UID"=>"ecmhsetest", "PWD"=>"AdminAdmin1");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
}else{
     die( print_r( sqlsrv_errors(), true));
}


?>
