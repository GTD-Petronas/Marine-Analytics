<?php

include("config/db.php");

if(isset($_REQUEST['finding_id'])) {

  $finding_id = $_REQUEST['finding_id'];
  $date_closure = $_GET['date_closure'];
  $date_due= $_GET['duedate'];
  $textarea = $_REQUEST['textarea'];
    $status = $_REQUEST['status'];
  $update_time=date("H:i:s");

  $sql=" UPDATE MarSIS_DW_Findings SET CORRECTIVE_ACTION_PLAN ='$textarea',CLOSURE_DATE ='$date_closure' ,LAST_UPDATED ='$update_time', STATUS_ID='$status',DUE_DATE='$date_due' WHERE FINDINGS_ID ='$finding_id'";
  $stmt = sqlsrv_query($conn, $sql);
  if( !$stmt ) {

  }else{
    echo "<script type= 'text/javascript'>location.href = 'index.php?page=corrective_action_plan_edit'; alert('success') </script>";
  }
}

?>
