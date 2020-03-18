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



    $findings_Positive = $_POST['findings_Positive'];
    $status_Positive = $_POST['status_Positive'];
    $time_frame_Positive = $_POST['time_frame_Positive'];
    $result_Positive = array_filter($findings_Positive);
    $quanity2 = count($result_Positive);


    if(isset($findings_Positive) || $findings_Positive!=""){
      for($i=0;$i<$quanity2;$i++){
        $no=$i;

        $sql_ovid="SELECT * FROM MarSIS_DW_Findings ORDER BY FINDINGS_ID DESC";
        $stmt_ovid = sqlsrv_query($conn, $sql_ovid);
        $arr_ovid = sqlsrv_fetch_array( $stmt_ovid, SQLSRV_FETCH_ASSOC);
        $finding_id_ovid=$arr_ovid['FINDINGS_ID'];
        $FINDING_ID_OVID=++$finding_id_ovid;

        if($status_Positive[$i]==2 && $time_frame_Positive[$i]==NULL){
          $time_frame_Positive[$i]=1;
        }

        $sql = "IF NOT EXISTS (SELECT * FROM MarSIS_DW_Findings
        WHERE FINDINGS = '$findings_Positive[$i]' AND INSPECTION_ID ='$INSPECTION_ID')
        INSERT INTO MarSIS_DW_Findings (NO, INS_ITEM_ID, NO_OF_PAX, STATUS_ID, TIMEFRAME_ID, FINDINGS_ID, FINDINGS, CORRECTIVE_ACTION_PLAN,
        INSPECTION_ID, DUE_DATE, CLOSURE_DATE, UPDATED_BY, LAST_UPDATED)
        VALUES ('$no',18,NULL,'$status_Positive[$i]','$time_frame_Positive[$i]','$FINDING_ID_OVID','$findings_Positive[$i]',NULL,'$INSPECTION_ID',NULL,NULL,'$user','$update_time')";
        $stmt = sqlsrv_query($conn, $sql);


      }
    }
    echo "<script type= 'text/javascript'>location.href = 'index.php?page=Other_Positive_edit' </script>";

  }
}

?>
