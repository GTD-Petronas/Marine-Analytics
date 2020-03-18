<?php
include('config/db.php');
session_start();
if(isset($_POST["submit"])){
  $user=$_SESSION['USER_ID'];

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
        echo "<script type= 'text/javascript'>location.href = 'index.php?page=HSE1_ovid_edit' </script>";

      }else{
        die( print_r( sqlsrv_errors(), true));
      }
}
    ?>
