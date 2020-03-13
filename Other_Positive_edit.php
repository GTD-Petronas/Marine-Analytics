<?php
@$INSPECTION_ID=$_SESSION['inspection_id_edit'];
$sqlInspection = "SELECT COUNT(*) as count FROM MarSIS_DW_Findings a LEFT JOIN MarSIS_MDM_InspectionItem b ON a.INS_ITEM_ID=b.NO
LEFT JOIN MarSIS_MDM_Status c ON a.STATUS_ID=c.STATUS_ID LEFT JOIN MarSIS_MDM_TimeFrame d ON a.TIMEFRAME_ID=d.TIMEFRAME_ID
WHERE INSPECTION_ID='$INSPECTION_ID' AND a.INS_ITEM_ID IN ('18')";
$stmtInspection = sqlsrv_query( $conn, $sqlInspection);
$row = sqlsrv_fetch_array($stmtInspection, SQLSRV_FETCH_ASSOC);
$count= $row['count'];
?>
<section id="main">
  <div class="container">
    <div class="row">
      <div class="col-md-10">

        <div class="row">
          <div class="col-md-12">

            <div class="form-inline">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="form-group mb-2">
                <a href="index.php?page=inspection_details_edit" class="bulat "></a>
                <p>Inspection</br>Details </br> &nbsp;</p>
              </div>
              <div class="form-group">
                <div class="rectangle"></div>
              </div>
              <div class="form-group mb-2">
                <a href="index.php?page=HSE1_ovid_edit" class="bulat"></a>
                <p>Mandatory</br>Inspection</br>HSE I</p>
              </div>
              <div class="form-group mb-2">
                <div class="rectangle"></div>
              </div>
              <div class="form-group mb-2">
                <a href="index.php?page=HSE2_LSA_edit" class="bulat"></a>
                <p>Mandatory</br>Inspection</br>HSE II</p>
              </div>
              <div class="form-group mb-2">
                <div class="rectangle"></div>
              </div>
              <div class="form-group mb-2">
                <a href="index.php?page=Other_other_edit" class="bulat bayang"></a>
                <p>&nbsp; Others</br> &nbsp; </br> &nbsp;</p>
              </div>
              <div class="form-group mb-2">
                <div class="rectangle"></div>
              </div>
              <div class="form-group mb-2">
                <a href="index.php?page=review_submit_edit" class="bulat"></a>
                <p>Review</br>& Submit</br>&nbsp;</br></p>
              </div>
              <div class="form-group mb-2">
                <div class="rectangle"></div>
              </div>
              <div class="form-group mb-2">
                <a href="index.php?page=corrective_action_plan_edit" class="bulat"></a>
                <p>Corrective</br>Action </br>Plan</br></p>
              </div>
              <div class="form-group mb-2">
                <div class="rectangle"></div>
              </div>
              <div class="form-group mb-2">
                <a href="index.php?page=closure_edit" class="bulat"></a>
                <p>Closure</br>&nbsp;</br>&nbsp;</br></p>
              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Mandatory HSE Inspection I</h3>
          </div>
          <div class="panel-body">


            <!--masukkan form disini-->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
              <li class="nav-item ">
                <a class="nav-link  border" id="pills-home-tab"  href="index.php?page=Other_other_edit" role="tab" aria-controls="pills-other" aria-selected="true" style="font-size: 11px; border:solid">Other Findings</a>
              </li>
              <li class="nav-item">
                <a class="nav-link border" id="pills-profile-tab"  href="index.php?page=Other_Brief_edit" role="tab" aria-controls="pills-Brief" aria-selected="false" style="font-size: 11px; border:solid">Briefing</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link border" id="pills-contact-tab"  href="index.php?page=Other_Positive_edit" role="tab" aria-controls="pills-Positive" aria-selected="false" style="font-size: 11px; border:solid">Positive Findings</a>
              </li>
              <!-- <li class="nav-item">
              <a class="nav-link border" id="pills-contact-tab" data-toggle="pill" href="#pills-Inspection" role="tab" aria-controls="pills-Inspection" aria-selected="false" style="font-size: 11px; border:solid">Inspection Pictures</a>
            </li> -->
          </ul>

            <form action="Other_Positive_edit_ps.php" method="POST" enctype="multipart/form-data">
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade active in" id="pills-ovid" role="tabpanel" aria-labelledby="pills-ovid-tab">

                </br>
                <div class="panel-heading">
                  <input class="btn btn-success btn-sm" type="button" value="Add New" onclick="addRow_ovid('dataTable_ovid')" />
                </div>
                <div class="table-responsive">

                  <table id="dataTable_ovid" class="table table-bordered table-responsive">
                    <tr>
                      <th style="background:#40E0D0 !important">Findings</th>
                      <th style="background:#40E0D0 !important">Status</th>
                      <th style="background:#40E0D0 !important">Time Frame</th>
                      <th style="background:#40E0D0 !important">Action</th>
                      <th style="background:#40E0D0 !important">Last Update</th>
                    </tr>
                    <?php
                    if(!empty($count)){
                      $sqlInspectionI = "SELECT * FROM MarSIS_DW_Findings a LEFT JOIN MarSIS_MDM_InspectionItem b ON a.INS_ITEM_ID=b.NO
                      LEFT JOIN MarSIS_MDM_Status c ON a.STATUS_ID=c.STATUS_ID LEFT JOIN MarSIS_MDM_TimeFrame d ON a.TIMEFRAME_ID=d.TIMEFRAME_ID
                      WHERE INSPECTION_ID='$INSPECTION_ID' AND a.INS_ITEM_ID IN ('18')";
                      $stmtInspectionI = sqlsrv_query( $conn, $sqlInspectionI);

                      while( $row = sqlsrv_fetch_array( $stmtInspectionI, SQLSRV_FETCH_ASSOC) ) {

                        echo'
                        <tr>
                        <td><textarea name="findings_Positive[]"  id="finding_Positive'.$row['FINDINGS_ID'].'" cols="65">'.$row['FINDINGS'].'</textarea></td>
                        <td><select id="status_Positive'.$row['FINDINGS_ID'].'" name="status_Positive[]">
                        <option value=""></option>';

                        $sql="SELECT * FROM MarSIS_MDM_Status WHERE STATUS_ID IN ('2','3')";
                        $stmt = sqlsrv_query( $conn, $sql);

                        while( $arr = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ){

                          echo	'<option '.($arr['STATUS_ID'] == $row['STATUS_ID'] ? 'SELECTED':'').' value="'.$arr['STATUS_ID'].'">'.($arr['STATUS_NAME']).'</option>';
                        }
                        echo'</select></td>

                        <td><select id="time_frame_Positive'.$row['FINDINGS_ID'].'" name="time_frame_Positive[]">
                        <option value=""></option>';

                        $sql1="SELECT * FROM MarSIS_MDM_TimeFrame";
                        $stmt1 = sqlsrv_query( $conn, $sql1);

                        while( $arr1 = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC) ){

                          echo	'<option '.($arr1['TIMEFRAME_ID'] == $row['TIMEFRAME_ID'] ? 'SELECTED':'').' value="'.$arr1['TIMEFRAME_ID'].'">'.($arr1['TIMEFRAME_NAME']).'</option>';
                        }

                        echo'</select></td>

                        <td><a onclick="update_data(\''.$row['FINDINGS_ID'].'\');location.reload();"><span class="glyphicon glyphicon-retweet"></span></a>&nbsp;&nbsp;
                        <a onclick="delete_data(\''.$row['FINDINGS_ID'].'\');location.reload();"><span class="glyphicon glyphicon-trash"></span></a></td>
                        <td><input style="border:none;"value="'.$row['LAST_UPDATED'].'"</td>


                        </tr>';
                      }
                      echo '</table>';
                    }else{
                      ?>
                      <tr>
                        <td><textarea name="findings_Positive[]"  cols="65"></textarea></td>
                        <td><select id="status_Positive[]" name="status_Positive[]">
                          <option value=""></option>
                          <?php
                          $sql="SELECT * FROM MarSIS_MDM_Status WHERE STATUS_ID IN ('2','3')";
                          $stmt = sqlsrv_query( $conn, $sql);

                          while( $arr = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ){

                            echo	'<option value="'.$arr['STATUS_ID'].'">'.$arr['STATUS_NAME'].'</option>';
                          }
                          ?>
                        </select>
                      </td>
                      <td><select id="time_frame" name="time_frame_Positive[]">
                        <option value=""></option>
                        <?php
                        $sql1="SELECT * FROM MarSIS_MDM_TimeFrame";
                        $stmt1 = sqlsrv_query( $conn, $sql1);

                        while( $arr1 = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC) ){

                          echo	'<option value="'.$arr1['TIMEFRAME_ID'].'">'.$arr1['TIMEFRAME_NAME'].'</option>';
                        }
                        ?>
                      </select>
                    </td>
                    <td><a onclick="deleteRow_ovid(this)"><span class="glyphicon glyphicon-trash"></span></a></td>
                    <td></td>

                  </tr>
                </table>
                <?php
              }
              ?>
            </div>

          </div>

        </div>
      </br>
      <button type="submit" name="submit" class="btn btn-md pull-right" style="background-color:#40E0D0">Save</button>
      </form>
      <button onclick="location.href='index.php?page=review_submit_edit'" class="btn btn-md pull-right" style="background-color:#40E0D0; margin-right:5px; ">Next</button>

  </div>
</div>



</div>
</div>
</div>
</section>

<script>

function delete_data(finding_id){
  var finding = document.getElementById("finding_Positive"+finding_id).value;
  var time_frame = document.getElementById("time_frame_Positive"+finding_id).value;
  var status = document.getElementById("status_Positive"+finding_id).value;
  var type = 1; //delete


  if (window.XMLHttpRequest) {

    xmlhttp = new XMLHttpRequest();
  } else {

    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

    }
  };
  xmlhttp.open("GET","Other_Positive_edit_ps.php?finding_id="+ finding_id + "&type="+type + "&finding="+finding + "&time_frame="+time_frame + "&status="+status,true);
  xmlhttp.send();
}
</script>

<script>

function update_data(finding_id){
  var finding = document.getElementById("finding_Positive"+finding_id).value;
  var time_frame = document.getElementById("time_frame_Positive"+finding_id).value;
  var status = document.getElementById("status_Positive"+finding_id).value;
  var type = 2; //update


  if (window.XMLHttpRequest) {

    xmlhttp = new XMLHttpRequest();
  } else {

    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

    }
  };
  xmlhttp.open("GET","Other_Positive_edit_ps.php?finding_id="+ finding_id + "&type="+type + "&finding="+finding + "&time_frame="+time_frame + "&status="+status,true);
  xmlhttp.send();
}
</script>
