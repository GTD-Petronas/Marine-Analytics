<?php
include('config/db.php');

@$finding_id=$_GET['finding_id'];
@$finding=$_GET['finding'];
@$time_frame=$_GET['time_frame'];
@$status=$_GET['status'];
@$type=$_GET['type'];
@$update_time=date("H:i:s");

if($type==1){
  $sql1 = "DELETE FROM MarSIS_DW_Findings
  WHERE FINDINGS_ID='$finding_id'";
  $stmt1 = sqlsrv_query($conn, $sql1);
}if($type==2){
  $sql ="UPDATE MarSIS_DW_Findings
  SET STATUS_ID = '$status'
  ,TIMEFRAME_ID = '$time_frame'
  ,FINDINGS = '$finding'
  ,LAST_UPDATED = '$update_time'
  WHERE FINDINGS_ID='$finding_id'";
  $stmt = sqlsrv_query($conn, $sql);

}else{

  if(isset($_POST["submit"])){
    session_start();
    $INSPECTION_ID=$_SESSION['inspection_id_edit'];
    $user=$_SESSION['USER_ID'];
    $update_time=date("H:i:s");


    //ovid



    $findings_fifi = $_POST['findings_fifi'];
    $status_fifi = $_POST['status_fifi'];
    $time_frame_fifi = $_POST['time_frame_fifi'];
    $result_fifi = array_filter($findings_fifi);
    $quanity6 = count($result_fifi);;


    if(isset($findings_fifi) || $findings_fifi!=""){
      for($i=0;$i<$quanity6;$i++){
        $no=$i;

        $sql_ovid="SELECT * FROM MarSIS_DW_Findings ORDER BY FINDINGS_ID DESC";
        $stmt_ovid = sqlsrv_query($conn, $sql_ovid);
        $arr_ovid = sqlsrv_fetch_array( $stmt_ovid, SQLSRV_FETCH_ASSOC);
        $finding_id_ovid=$arr_ovid['FINDINGS_ID'];
        $FINDING_ID_OVID=++$finding_id_ovid;

        $sql = "IF NOT EXISTS (SELECT * FROM MarSIS_DW_Findings
        WHERE FINDINGS = '$finding_ovid[$i]' AND INSPECTION_ID ='$INSPECTION_ID')
        INSERT INTO MarSIS_DW_Findings (NO, INS_ITEM_ID, NO_OF_PAX, STATUS_ID, TIMEFRAME_ID, FINDINGS_ID, FINDINGS, CORRECTIVE_ACTION_PLAN,
        INSPECTION_ID, DUE_DATE, CLOSURE_DATE, UPDATED_BY, LAST_UPDATED)
        VALUES ('$no',7,NULL,'$status_fifi[$i]','$time_frame_fifi[$i]','$FINDING_ID_OVID','$findings_fifi[$i]',NULL,'$INSPECTION_ID',NULL,NULL,'$user','$update_time')";
        $stmt = sqlsrv_query($conn, $sql);


      }
    }
    echo "<script type= 'text/javascript'>location.href = 'index.php?page=HSE1_fifi_edit' </script>";

  }
}

?>
