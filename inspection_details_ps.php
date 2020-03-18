<?php
include('config/db.php');
session_start();
$user=$_SESSION['USER_ID'];
if(isset($_POST["submit"])){

if(!empty($_SESSION['inspection_id'])){

  $INSPECTION_ID=$_POST['inspection_id'];
  $vessel_id=$_POST['vessel_id'];
  $location=$_POST['location'];
  $vessel_master=$_POST['vessel_master'];
  $person_on_board=$_POST['person_on_board'];
  $chief=$_POST['chief'];
  $inspection_date=$_POST['inspection_date'];
  $on_hire_date=$_POST['on_hire_date'];
  $type_of_inspection=$_POST['type_of_inspection'];
  $requested_by=$_POST['requested_by'];
  $area_operation=$_POST['area_operation'];
  $activity=$_POST['activity'];
  $inspector1=$_POST['inspector1'];
  isset($_POST["inspector2"]) ? $inspector2 = $_POST["inspector2"] : $inspector2="";
  $scope_inspection=$_POST['scope_inspection'];
  $update_time=date("H:i:s");

  $sql = "UPDATE MarSIS_DW_InspectionDetails
   SET VESSEL_ID = '$vessel_id'
      ,LOCATION = '$location'
      ,PERSON_ON_BOARD = '$person_on_board'
      ,VESSEL_MASTER = '$vessel_master'
      ,CHIEF_ENGINEER = '$chief'
      ,INSPECTION_DATE = '$inspection_date'
      ,TYPE_OF_INSPECTION = '$type_of_inspection'
      ,AREA_OF_OPERATION = '$area_operation'
      ,INSPECTOR_1 = '$inspector1'
      ,INSPECTOR_2 = '$inspector2'
      ,ON_HIRED_DATE = '$on_hire_date'
      ,REQUESTED_BY = '$requested_by'
      ,ACTIVITY = $activity
      ,SCOPE_OF_INSPECTION = '$scope_inspection'
      ,UPDATED_BY = '$user'
      ,UPDATED_TIME ='$update_time'
  WHERE INSPECTION_ID = '$INSPECTION_ID'";
      $stmt = sqlsrv_query($conn, $sql);
      //
      if ($stmt) {
        echo "<script type= 'text/javascript'>location.href = 'index.php?page=HSE1_ovid' </script>";

      }else{
        die( print_r( sqlsrv_errors(), true));
      }


}else{

  $sql2="SELECT * FROM MarSIS_DW_InspectionDetails ORDER BY INSPECTION_ID DESC";
  $stmt2 = sqlsrv_query($conn, $sql2);
  $arr2 = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC);
  $INSPECTION_ID=$arr2['INSPECTION_ID'];
  $pieces = explode("INSP", $INSPECTION_ID);
  $pieces[1];
  $INSPECTION_ADD=++$pieces[1];
  $INSPECTION_ADD_PLUSS="INSP$INSPECTION_ADD";


  $sql="SELECT * FROM MarSIS_DW_InspectionDetails ORDER BY NO DESC";
  $stmt = sqlsrv_query($conn, $sql);
  $arr = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
  $no=$arr['NO'];
  $NO=++$no;

  $INSPECTION_ID=$_POST['inspection_value'];
  $vessel_id=$_POST['vessel_id'];
  $location=$_POST['location'];
  $vessel_master=$_POST['vessel_master'];
  $person_on_board=$_POST['person_on_board'];
  $chief=$_POST['chief'];
  $inspection_date=$_POST['inspection_date'];
  $on_hire_date=$_POST['on_hire_date'];
  $type_of_inspection=$_POST['type_of_inspection'];
  $requested_by=$_POST['requested_by'];
  $area_operation=$_POST['area_operation'];
  $activity=$_POST['activity'];
  $inspector1=$_POST['inspector1'];
  isset($_POST["inspector2"]) ? $inspector2 = $_POST["inspector2"] : $inspector2="";
  $scope_inspection=$_POST['scope_inspection'];
  $update_time=date("H:i:s");

  $sql1 = "INSERT INTO MarSIS_DW_InspectionDetails (NO, INSPECTION_ID, VESSEL_ID, LOCATION, PERSON_ON_BOARD,VESSEL_MASTER, CHIEF_ENGINEER,
    INSPECTION_DATE, TYPE_OF_INSPECTION, AREA_OF_OPERATION, INSPECTOR_1, INSPECTOR_2, ON_HIRED_DATE, REQUESTED_BY, ACTIVITY,
    SCOPE_OF_INSPECTION,UPDATED_BY,UPDATED_TIME)
    VALUES ('$NO','$INSPECTION_ADD_PLUSS','$vessel_id','$location','$person_on_board','$vessel_master','$chief','$inspection_date','$type_of_inspection',
      '$area_operation','$inspector1','$inspector2','$on_hire_date','$requested_by','$activity','$scope_inspection','$user','$update_time')";
      $stmt1 = sqlsrv_query($conn, $sql1);
      //
      if ($stmt1) {

        $_SESSION['inspection_id'] = $INSPECTION_ADD_PLUSS;

        echo "<script type= 'text/javascript'>location.href = 'index.php?page=HSE1_ovid' </script>";

      }else{
        die( print_r( sqlsrv_errors(), true));
      }

    }
  }

    ?>
