<?php

	include ('config/db.php');

	session_start();

	echo $username = $_POST['email'];
	echo $password = $_POST['password'];

	$sql = "SELECT * FROM [DEV_PDTHSEPM_CDS].[dbo].[MarSIS_MDM_User] WHERE USER_EMAIL='$username' AND PASSWORD='$password'";

$stmt = sqlsrv_query($conn, $sql);
 $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);


if($stmt == true){

		$_SESSION['USER_ID'] = $row['USER_ID'];
		$_SESSION['name'] = $row['USER_NAME'];


        header("Location: index.php");
    }
    else
        echo '<script> alert("Wrong Username And Password");
                    </script>'




?>
