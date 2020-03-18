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
    $sql_ovid="SELECT * FROM MarSIS_DW_Findings ORDER BY FINDINGS_ID DESC";
    $stmt_ovid = sqlsrv_query($conn, $sql_ovid);
    $arr_ovid = sqlsrv_fetch_array( $stmt_ovid, SQLSRV_FETCH_ASSOC);
    $finding_id_ovid=$arr_ovid['FINDINGS_ID'];
    $FINDING_ID_OVID=++$finding_id_ovid;


    $findings_Brief = $_POST['findings_Brief'];
    $status_Brief = $_POST['status_Brief'];
    $time_frame_Brief = $_POST['time_frame_Brief'];
  $result_Brief = array_filter($findings_Brief);
  $quanity1 = count($result_Brief);


    if(isset($findings_Brief) || $findings_Brief!=""){
      for($i=0;$i<$quanity1;$i++){
        $no=$i;

        $sql_ovid="SELECT * FROM MarSIS_DW_Findings ORDER BY FINDINGS_ID DESC";
        $stmt_ovid = sqlsrv_query($conn, $sql_ovid);
        $arr_ovid = sqlsrv_fetch_array( $stmt_ovid, SQLSRV_FETCH_ASSOC);
        $finding_id_ovid=$arr_ovid['FINDINGS_ID'];
        $FINDING_ID_OVID=++$finding_id_ovid;

        if($status_Brief[$i]==2 && $time_frame_Brief[$i]==NULL){
          $time_frame_Brief[$i]=1;
        }

        $sql = "IF NOT EXISTS (SELECT * FROM MarSIS_DW_Findings
        WHERE FINDINGS = '$findings_Brief[$i]' AND INSPECTION_ID ='$INSPECTION_ID')
        INSERT INTO MarSIS_DW_Findings (NO, INS_ITEM_ID, NO_OF_PAX, STATUS_ID, TIMEFRAME_ID, FINDINGS_ID, FINDINGS, CORRECTIVE_ACTION_PLAN,
        INSPECTION_ID, DUE_DATE, CLOSURE_DATE, UPDATED_BY, LAST_UPDATED)
        VALUES ('$no',17,NULL,'$status_Brief[$i]','$time_frame_Brief[$i]','$FINDING_ID_OVID','$findings_Brief[$i]',NULL,'$INSPECTION_ID',NULL,NULL,'$user','$update_time')";
            $stmt = sqlsrv_query($conn, $sql);


          }
        }
        echo "<script type= 'text/javascript'>location.href = 'index.php?page=Other_Brief_edit' </script>";

      }
    }

      ?>
