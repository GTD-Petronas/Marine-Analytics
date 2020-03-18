<?php
@$INSPECTION_ID=$_SESSION['inspection_id_edit'];
$query = "SELECT * FROM MarSIS_DW_InspectionDetails a JOIN MarSIS_MDM_VesselDetails b ON a.VESSEL_ID=b.VESSEL_ID
JOIN MarSIS_MDM_Country c ON b.COUNTRY_ID=c.COUNTRY_ID JOIN MarSIS_MDM_VesselOwner d ON b.CONTRACTOR_ID=d.CONTRACTOR_ID
JOIN MarSIS_MDM_InspectionType e ON a.TYPE_OF_INSPECTION=e.INS_TYPE_ID JOIN MarSIS_MDM_Requestor f ON a.REQUESTED_BY=f.REQUESTOR_ID
JOIN MarSIS_MDM_OperationArea g ON a.AREA_OF_OPERATION=g.OPERATIONAREA_ID JOIN MarSIS_MDM_Activity h ON a.ACTIVITY=h.ACTIVITY_ID
WHERE INSPECTION_ID = '$INSPECTION_ID'";

$stmt = sqlsrv_query($conn, $query);
$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

@$vessel_name=$row['VESSEL_NAME'];
@$IMO_no=$row['IMO_NO'];
@$vessel_type=$row['VESSEL_TYPE'];
@$country=$row['COUNTRY_NAME'];
@$vessel_age=$row['VESSEL_AGE'];
@$contractor=$row['VESSEL_OWNER_FULLNAME'];
@$location=$row['LOCATION'];
@$vessel_master=$row['VESSEL_MASTER'];
@$person_on_board=$row['PERSON_ON_BOARD'];
@$chief=$row['CHIEF_ENGINEER'];
@$inspection_date=$row['INSPECTION_DATE'];

@$on_hire_date=$row['ON_HIRED_DATE'];
@$type_of_inspection=$row['INS_TYPE_NAME'];
@$requested_by=$row['REQUESTOR_NAME'];
@$area_operation=$row['OPERATION_AREA'];
@$activity=$row['ACTIVITY_NAME'];
@$inspector1=$row['INSPECTOR_1'];
@$inspector2=$row['INSPECTOR_2'];
@$scope_inspection=$row['SCOPE_OF_INSPECTION'];

if($inspector1!=NULL){
  $query2 = " SELECT * FROM MarSIS_MDM_User WHERE USER_ID=$inspector1";
  $result2 = sqlsrv_query($conn,$query2);
  $row2 = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC);
  $inspector_name1 = $row2['USER_NAME'];

}


if($inspector2!=0){
  $query3 = " SELECT * FROM MarSIS_MDM_User WHERE USER_ID=$inspector2";
  $result3 = sqlsrv_query($conn,$query3);
  $row3 = sqlsrv_fetch_array($result3, SQLSRV_FETCH_ASSOC);
  $inspector_name2 = $row3['USER_NAME'];

}else{
  $inspector_name2 ="";
}

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
                <a href="index.php?page=Other_other_edit" class="bulat"></a>
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
                <a href="index.php?page=closure_edit" class="bulat bayang"></a>
                <p>Closure</br>&nbsp;</br>&nbsp;</br></p>
              </div>
            </div>
          </div>
        </div>
      </br>


      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne" style="background:#40E0D0 !important">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed text-white btn-sm" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Vessel & Inspection Details
              </button>
            </h2>
          </div>

          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body" style="background-color:#E3E3E3;">

              <!-- inspection details -->
              <div class="row">
                <div class="col-md-5">
                  <p><b>Vessel Details</b></p>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <div class="row">

                    <div class="col-md-4">
                      <p>Vessel Name: </p>
                    </div>

                    <div class="col-md-2">
                      <?php  echo $vessel_name ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <p>IMO Number:</p>
                    </div>
                    <div class="col-md-8">
                      <?php  echo $IMO_no ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <p>Vessel Type: </p>
                    </div>
                    <div class="col-md-8">
                      <?php  echo $vessel_type ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <p>Country of Registry:</p>
                    </div>
                    <div class="col-md-8">
                      <?php  echo $country ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <p>Vessel Age: </p>
                    </div>
                    <div class="col-md-8">
                      <?php  echo $vessel_age ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <p>Contractor/Ship Owner:</p>
                    </div>
                    <div class="col-md-8">
                      <?php  echo $contractor ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <p>Location: </p>
                    </div>
                    <div class="col-md-8">
                      <?php  echo $location ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <p>Vessel Master:</p>
                    </div>
                    <div class="col-md-8">
                      <?php  echo $vessel_master ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <p>Person On Board: </p>
                    </div>
                    <div class="col-md-8">
                      <?php  echo $person_on_board ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <p>Chief Engineer:</p>
                    </div>
                    <div class="col-md-8">
                      <?php  echo $chief ?>
                    </div>
                  </div>
                </div>
              </div>

            </br>
            <div class="row">
              <div class="col-md-5">
                <p><b>Inspection Details</b></p>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Inspection Date:</p>
                  </div>
                  <div class="col-md-8">
                    <?php
                    echo @date_format($inspection_date, 'd-m-Y');
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>On Hired Date:</p>
                  </div>
                  <div class="col-md-8">
                    <?php
                    echo @date_format($on_hire_date, 'd-m-Y');
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Type of Inspection:</p>
                  </div>
                  <div class="col-md-8">
                    <?php
                    echo $type_of_inspection
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Requested By:</p>
                  </div>
                  <div class="col-md-8">
                    <?php
                    echo $requested_by
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Area of Operation:</p>
                  </div>
                  <div class="col-md-8">
                    <?php
                    echo $area_operation
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Activity:</p>
                  </div>
                  <div class="col-md-8">
                    <?php
                    echo $activity
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Inspector No. 1:</p>
                  </div>
                  <div class="col-md-8">
                    <?php
                    echo @$inspector_name1
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Inspector No. 2:</p>
                  </div>
                  <div class="col-md-8">
                    <?php
                    echo @$inspector_name2;
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 form-group">
                <div class="row">
                  <div class="col-md-2">
                    <p for="">Scope of Inspection:</p>
                  </div>
                  <div class="col-md-8">
                    <?php
                    echo $scope_inspection
                    ?>
                  </div>
                </div>
              </div>
            </div>

            <!--dwd-->
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingTwo" style="background:#40E0D0 !important">
          <h2 class="mb-0">
            <button class="btn btn-link collapsed text-white btn-sm" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              Mandatory HSE Inspection I
            </button>
          </h2>
        </div>
        <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionExample">
          <div class="card-body">

            <!-- Hse 1 -->
            <div class="table-responsive">

              <table id="dataTable_ovid" class="table table-bordered table-responsive">
                <tr>
                  <th style="background:#40E0D0 !important">No</th>
                  <th style="background:#40E0D0 !important">Area</th>
                  <th style="background:#40E0D0 !important">Findings</th>
                  <th style="background:#40E0D0 !important">No Of Pax</th>
                  <th style="background:#40E0D0 !important">Status</th>
                  <th style="background:#40E0D0 !important">Time Frame</th>
                  <th style="background:#40E0D0 !important">Last Update</th>
                </tr>
                <tr>
                  <?php
                  $sqlInspectionI = "SELECT * FROM MarSIS_DW_Findings a LEFT JOIN MarSIS_MDM_InspectionItem b ON a.INS_ITEM_ID=b.NO
                  LEFT JOIN MarSIS_MDM_Status c ON a.STATUS_ID=c.STATUS_ID LEFT JOIN MarSIS_MDM_TimeFrame d ON a.TIMEFRAME_ID=d.TIMEFRAME_ID
                  WHERE INSPECTION_ID='$INSPECTION_ID' AND a.INS_ITEM_ID IN ('1','2','3','4','5','6','7')";
                  $stmtInspectionI = sqlsrv_query( $conn, $sqlInspectionI);
$i=1;
                  while( $row = sqlsrv_fetch_array( $stmtInspectionI, SQLSRV_FETCH_ASSOC) ) {
                    echo"
                    <tr>
                    <td>".$i."</td>
                    <td>".$row['INS_GROUP_ITEM']."</td>
                    <td>".$row['FINDINGS']."</td>";
                    if(!empty($row['NO_OF_PAX'])){
                      echo "<td>".$row['NO_OF_PAX']."</td>";
                    }else{
                      echo "<td>N/A</td>";
                    }
                    echo "<td>".$row['STATUS_NAME']."</td>
                    <td>".$row['TIMEFRAME_NAME']."</td>
                    <td>".$row['LAST_UPDATED']."</td>


                    </tr>";
                    $i++;
                  }
                  echo "</table>";

                  ?>
                </div>


              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree" style="background:#40E0D0 !important">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed text-white btn-sm" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Mandatory HSE Inspection II
                </button>
              </h2>
            </div>
            <div id="collapseThree" class="collapse " aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">

                <div class="table-responsive">

                  <table id="dataTable_ovid" class="table table-bordered table-responsive">
                    <tr>
                      <th style="background:#40E0D0 !important">No</th>
                      <th style="background:#40E0D0 !important">Area</th>
                      <th style="background:#40E0D0 !important">Findings</th>
                      <th style="background:#40E0D0 !important">No Of Pax</th>
                      <th style="background:#40E0D0 !important">Status</th>
                      <th style="background:#40E0D0 !important">Time Frame</th>
                      <th style="background:#40E0D0 !important">Last Update</th>
                    </tr>
                    <tr>
                      <?php
                      $sqlInspectionI = "SELECT * FROM MarSIS_DW_Findings a LEFT JOIN MarSIS_MDM_InspectionItem b ON a.INS_ITEM_ID=b.NO
                      LEFT JOIN MarSIS_MDM_Status c ON a.STATUS_ID=c.STATUS_ID LEFT JOIN MarSIS_MDM_TimeFrame d ON a.TIMEFRAME_ID=d.TIMEFRAME_ID
                      WHERE INSPECTION_ID='$INSPECTION_ID' AND a.INS_ITEM_ID IN ('8','9','10','11','12','13','14','15')";
                      $stmtInspectionI = sqlsrv_query( $conn, $sqlInspectionI);
$j=1;
                      while( $row = sqlsrv_fetch_array( $stmtInspectionI, SQLSRV_FETCH_ASSOC) ) {
                        echo"
                        <tr>
                        <td>".$j."</td>
                        <td>".$row['INS_GROUP_ITEM']."</td>
                        <td>".$row['FINDINGS']."</td>
                        <td>N/A</td>
                        <td>".$row['STATUS_NAME']."</td>
                        <td>".$row['TIMEFRAME_NAME']."</td>
                        <td>".$row['LAST_UPDATED']."</td>


                        </tr>";
                        $j++;
                      }
                      echo "</table>";

                      ?>
                    </div>

                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingFour" style="background:#40E0D0 !important">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed text-white btn-sm" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      Others
                    </button>
                  </h2>
                </div>
                <div id="collapseFour" class="collapse " aria-labelledby="headingFour" data-parent="#accordionExample">
                  <div class="card-body">

                    <div class="table-responsive">

                      <table id="dataTable_ovid" class="table table-bordered table-responsive">
                        <tr>
                          <th style="background:#40E0D0 !important">No</th>
                          <th style="background:#40E0D0 !important">Area</th>
                          <th style="background:#40E0D0 !important">Findings</th>
                          <th style="background:#40E0D0 !important">No Of Pax</th>
                          <th style="background:#40E0D0 !important">Status</th>
                          <th style="background:#40E0D0 !important">Time Frame</th>
                          <th style="background:#40E0D0 !important">Last Update</th>
                        </tr>
                        <tr>
                          <?php
                          $sqlInspectionI = "SELECT * FROM MarSIS_DW_Findings a LEFT JOIN MarSIS_MDM_InspectionItem b ON a.INS_ITEM_ID=b.NO
                          LEFT JOIN MarSIS_MDM_Status c ON a.STATUS_ID=c.STATUS_ID LEFT JOIN MarSIS_MDM_TimeFrame d ON a.TIMEFRAME_ID=d.TIMEFRAME_ID
                          WHERE INSPECTION_ID='$INSPECTION_ID' AND a.INS_ITEM_ID IN ('16','17','18','19')";
                          $stmtInspectionI = sqlsrv_query( $conn, $sqlInspectionI);
$k=1;
                          while( $row = sqlsrv_fetch_array( $stmtInspectionI, SQLSRV_FETCH_ASSOC) ) {
                            echo"
                            <tr>
                            <td>".$k."</td>
                            <td>".$row['INS_GROUP_ITEM']."</td>
                            <td>".$row['FINDINGS']."</td>
                            <td>N/A</td>
                            <td>".$row['STATUS_NAME']."</td>
                            <td>".$row['TIMEFRAME_NAME']."</td>
                            <td>".$row['LAST_UPDATED']."</td>


                            </tr>";
                            $k++;
                          }
                          echo "</table>";

                          ?>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header" id="headingFour" style="background:#40E0D0 !important">
                      <h2 class="mb-0">
                        <button class="btn btn-link collapsed text-white btn-sm" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                          Corrective Action Plan
                        </button>
                      </h2>
                    </div>
                    <div id="collapseFive" class="collapse-open" aria-labelledby="headingFive" data-parent="#accordionExample">
                      <div class="card-body">


                        <div class="table-responsive">

                          <table id="dataTable_ovid" class="table table-bordered table-responsive">
                            <tr>
                              <th style="background:#40E0D0 !important">No</th>
                              <th style="background:#40E0D0 !important">Area</th>
                              <th style="background:#40E0D0 !important">Findings</th>
                              <th style="background:#40E0D0 !important">No Of Pax</th>
                              <th style="background:#40E0D0 !important">Status</th>
                              <th style="background:#40E0D0 !important">Time Frame</th>
                              <th style="background:#40E0D0 !important">Correction Action Plan</th>
                              <th style="background:#40E0D0 !important">Due Date</th>
                              <th style="background:#40E0D0 !important">Date of Closure</th>
                              <th style="background:#40E0D0 !important">Last Modified</th>
                            </tr>
                            <tr>
                              <?php
                              $sqlInspectionI = "SELECT * FROM MarSIS_DW_Findings a LEFT JOIN MarSIS_MDM_InspectionItem b ON a.INS_ITEM_ID=b.NO
                              LEFT JOIN MarSIS_MDM_Status c ON a.STATUS_ID=c.STATUS_ID LEFT JOIN MarSIS_MDM_TimeFrame d ON a.TIMEFRAME_ID=d.TIMEFRAME_ID
                              WHERE INSPECTION_ID='$INSPECTION_ID' AND c.STATUS_ID IN('2','4') ORDER BY FINDINGS_ID ASC";
                              $stmtInspectionI = sqlsrv_query( $conn, $sqlInspectionI);
$l=1;
                              while( $row = sqlsrv_fetch_array( $stmtInspectionI, SQLSRV_FETCH_ASSOC) ) {
                                echo"
                                <tr>
                                <td>".$l."</td>
                                <td>".$row['INS_GROUP_ITEM']."</td>
                                <td>".$row['FINDINGS']."</td>";
                                if(!empty($row['NO_OF_PAX'])){
                                  echo "<td>".$row['NO_OF_PAX']."</td>";
                                }else{
                                  echo "<td>N/A</td>";
                                }
                                echo "<td>".$row['STATUS_NAME']."</td>
                                <td>".$row['TIMEFRAME_NAME']."</td>
                                <td><textarea id='name' disabled>".$row['CORRECTIVE_ACTION_PLAN']."</textarea></td>
                                <td>".@date_format($row['DUE_DATE'], 'Y-m-d')."</td>
                                <td>".@date_format($row['CLOSURE_DATE'], 'Y-m-d')."</td>
                                <td>".$row['LAST_UPDATED']."</td>


                                </tr>";
                                $l++;
                              }
                              echo "</table>";

                              ?>
                            </div>

                          </div>
                        </div>
                      </div>

                    </div>
                  </br>
                  <?php
                  $query5="SELECT COUNT(*) as count FROM MarSIS_DW_Findings WHERE INSPECTION_ID='$INSPECTION_ID' AND STATUS_ID =2";

                  $stmt5 = sqlsrv_query($conn, $query5);
                  $row5 = sqlsrv_fetch_array($stmt5, SQLSRV_FETCH_ASSOC);
                  $count=$row5['count'];
                  if($count==0){
                    ?>
                    <button onclick="location.href='index.php?page=home'" style="background-color:#40E0D0" class="btn btn-info btn-md pull-right">
                    <i class="fa fa-dot-circle-o"></i> Close Inspection Report
                  </button>
              <?php  }else{
                  ?>
                    <button style="background-color:#40E0D0" class="btn btn-info btn-md pull-right">
                      <i class="fa fa-dot-circle-o"></i> Close Inspection Report
                    </button>
                  <?php
                }?>
                  </div>
                </div>
              </div>




            </div>
          </div>
        </section>
