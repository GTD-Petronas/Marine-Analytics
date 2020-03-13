<?php

include("config/db.php");

if(isset($_REQUEST['finding_id'])) {

  $finding_id = $_REQUEST['finding_id'];
  $duedate = $_REQUEST['duedate'];
  $date_closure = $_REQUEST['date_closure'];
  $textarea = $_REQUEST['textarea'];
    $status = $_REQUEST['status'];
  $update_time=date("H:i:s");

  $sql=" UPDATE MarSIS_DW_Findings SET CORRECTIVE_ACTION_PLAN ='$textarea', DUE_DATE ='$duedate' ,CLOSURE_DATE ='$date_closure' ,LAST_UPDATED ='$update_time', STATUS_ID='$status' WHERE FINDINGS_ID ='$finding_id'";
  $stmt = sqlsrv_query($conn, $sql);
  if( !$stmt ) {

  }else{
    echo "<script type= 'text/javascript'>location.href = 'index.php?page=corrective_action_plan_edit'; alert('success') </script>";
  }
}

?>
