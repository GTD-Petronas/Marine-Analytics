<?php
include 'config/db.php';

$request = $_POST['request'];   // request

// Get username list
if($request == 1){
    $search = $_POST['search'];

    $query = "SELECT * FROM MarSIS_MDM_VesselDetails WHERE VESSEL_NAME like'%".$search."%'";
    $stmt = sqlsrv_query( $conn, $query);

    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
    $response[] = array("value"=>$row['VESSEL_ID'],"label"=>$row['VESSEL_NAME']);
    }

    // encoding array to json format
    echo json_encode($response);
    exit;
}

// Get details
if($request == 2){
    $userid = $_POST['userid'];
    $sql = "SELECT * FROM MarSIS_MDM_VesselDetails a LEFT JOIN MarSIS_MDM_Country b ON a.COUNTRY_ID=b.COUNTRY_ID LEFT JOIN MarSIS_MDM_VesselOwner c ON a.CONTRACTOR_ID=c.CONTRACTOR_ID  WHERE VESSEL_ID=".$userid;

      $stmt = sqlsrv_query( $conn, $sql);

    $users_arr = array();

    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
        $vessel_id = $row['VESSEL_ID'];
        $imo_official_number = $row['IMO_NO'];
        $vessel_type = $row['VESSEL_TYPE'];
        $vessel_age = $row['VESSEL_AGE'];
        $year_built = $row['YEAR_BUILT'];
        $vessel_owner = $row['VESSEL_OWNER_FULLNAME'];
        $country = $row['COUNTRY_NAME'];

        $users_arr[] = array("imo_official_number" => $imo_official_number, "vessel_type" => $vessel_type,"vessel_age" => $vessel_age, "year_built" =>$year_built, "vessel_owner" =>$vessel_owner,'country' =>$country, 'vessel_id'=>$vessel_id);
    }

    // encoding array to json format
    echo json_encode($users_arr);
    exit;
}
