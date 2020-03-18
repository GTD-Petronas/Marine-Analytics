<?php
if(@$_GET['session']==1){
  unset($_SESSION['inspection_id']);
  unset($_SESSION['inspection_id_edit']);
}

@$INSPECTION_ID_edit=$_SESSION['inspection_id'];
@$USER_ID=$_SESSION['USER_ID'];
if(!empty($INSPECTION_ID_edit)){
  // $INSPECTION_ID_edit=$_SESSION['inspection_id'];
  $query = "SELECT * FROM MarSIS_DW_InspectionDetails a JOIN MarSIS_MDM_VesselDetails b ON a.VESSEL_ID=b.VESSEL_ID
  JOIN MarSIS_MDM_Country c ON b.COUNTRY_ID=c.COUNTRY_ID JOIN MarSIS_MDM_VesselOwner d ON b.CONTRACTOR_ID=d.CONTRACTOR_ID
  JOIN MarSIS_MDM_InspectionType e ON a.TYPE_OF_INSPECTION=e.INS_TYPE_ID JOIN MarSIS_MDM_Requestor f ON a.REQUESTED_BY=f.REQUESTOR_ID
  JOIN MarSIS_MDM_OperationArea g ON a.AREA_OF_OPERATION=g.OPERATIONAREA_ID JOIN MarSIS_MDM_Activity h ON a.ACTIVITY=h.ACTIVITY_ID
  WHERE INSPECTION_ID = '$INSPECTION_ID_edit'";

  $stmt = sqlsrv_query($conn, $query);
  $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

  $vessel_name=$row['VESSEL_NAME'];
  $IMO_no=$row['IMO_NO'];
  $vessel_type=$row['VESSEL_TYPE'];
  $country=$row['COUNTRY_NAME'];
  $vessel_age=$row['VESSEL_AGE'];
  $contractor=$row['VESSEL_OWNER_FULLNAME'];
  $location=$row['LOCATION'];
  $vessel_master=$row['VESSEL_MASTER'];
  $person_on_board=$row['PERSON_ON_BOARD'];
  $chief=$row['CHIEF_ENGINEER'];
  $inspection_date=$row['INSPECTION_DATE'];

  $on_hire_date=$row['ON_HIRED_DATE'];
  $type_of_inspection=$row['INS_TYPE_NAME'];
  $requested_by=$row['REQUESTOR_NAME'];
  $area_operation=$row['OPERATION_AREA'];
  $activity=$row['ACTIVITY_NAME'];
  $inspector1=$row['INSPECTOR_1'];
  $inspector2=$row['INSPECTOR_2'];
  $scope_inspection=$row['SCOPE_OF_INSPECTION'];

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


}else{
  $sql="SELECT * FROM MarSIS_DW_InspectionDetails ORDER BY INSPECTION_ID DESC";
  $stmt = sqlsrv_query($conn, $sql);
  $arr = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
  $INSPECTION_ID=$arr['INSPECTION_ID'];
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
                <a href="index.php?page=inspection_details" class="bulat bayang"></a>
                <p>Inspection</br>Details </br> &nbsp;</p>
              </div>
              <div class="form-group">
                <div class="rectangle"></div>
              </div>
              <div class="form-group mb-2">
                <a href="index.php?page=HSE1_ovid" class="bulat"></a>
                <p>Mandatory</br>Inspection</br>HSE I</p>
              </div>
              <div class="form-group mb-2">
                <div class="rectangle"></div>
              </div>
              <div class="form-group mb-2">
                <a href="index.php?page=HSE2_LSA" class="bulat"></a>
                <p>Mandatory</br>Inspection</br>HSE II</p>
              </div>
              <div class="form-group mb-2">
                <div class="rectangle"></div>
              </div>
              <div class="form-group mb-2">
                <a href="index.php?page=Other_other" class="bulat"></a>
                <p>&nbsp; Others</br> &nbsp; </br> &nbsp;</p>
              </div>
              <div class="form-group mb-2">
                <div class="rectangle"></div>
              </div>
              <div class="form-group mb-2">
                <a href="index.php?page=review_submit" class="bulat"></a>
                <p>Review</br>& Submit</br>&nbsp;</br></p>
              </div>
              <div class="form-group mb-2">
                <div class="rectangle"></div>
              </div>
              <div class="form-group mb-2">
                <a href="index.php?page=corrective_action_plan" class="bulat"></a>
                <p>Corrective</br>Action </br>Plan</br></p>
              </div>
              <div class="form-group mb-2">
                <div class="rectangle"></div>
              </div>
              <div class="form-group mb-2">
                <a href="index.php?page=closure" class="bulat"></a>
                <p>Closure</br>&nbsp;</br>&nbsp;</br></p>
              </div>
            </div>

          </div>
        </div>

      </br>
      <div class="panel panel-default">
        <div class="panel-heading main-color-bg">
          <h3 class="panel-title">Vessel Details</h3>
        </div>
        <div class="panel-body">

          <form action="inspection_details_ps.php" method="POST" autocomplete="off">
            <input type="hidden" class="form-control" id="vessel_id" name="vessel_id" value="<?php echo @$row['VESSEL_ID'] ?>">
            <?php
            if(!empty($INSPECTION_ID_edit)){

              echo'<input type="hidden" class="form-control" id="inspection_id_edit" name="inspection_id" value="'.$INSPECTION_ID_edit.'">';
            }else{

              echo'<input type="hidden" class="form-control" id="inspection_id" name="inspection_id" value="'.$INSPECTION_ID.'">';
            }
            ?>

            <input type="hidden" class="form-control" id="inspection_value" name="inspection_value">

            <div class="row">
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Vessel Name:</p>
                  </div>
                  <div class="col-md-8">
                    <input type="text" class="form-control" id="vessel_name" name="vessel_name"  value="<?php echo @$vessel_name ?>" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>IMO Number:</p>
                  </div>
                  <div class="col-md-8">
                    <input class="form-control" id="IMO_Number" name="IMO_Number" value="<?php echo @$IMO_no ?>" required>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Vessel Type:</p>
                  </div>
                  <div class="col-md-8">
                    <input class="form-control" id="vessel_type" name="vessel_type" value="<?php echo @$vessel_type ?>"required>
                  </div>
                </div>
              </div>
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Country of Registry:</p>
                  </div>
                  <div class="col-md-8">
                    <input class="form-control" id="country" name="country" value="<?php echo @$country ?>"required>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Vessel Age:</p>
                  </div>
                  <div class="col-md-8">
                    <input class="form-control" id="vessel_age" name="vessel_age" value="<?php echo @$vessel_age ?>"required>
                  </div>
                </div>
              </div>
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Contractor/Ship Owner:</p>
                  </div>
                  <div class="col-md-8">
                    <input class="form-control" id="Contractor_owner" name="Contractor_owner" value="<?php echo @$contractor ?>"required>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Location:</p>
                  </div>
                  <div class="col-md-8">
                    <input class="form-control" id="location" name="location" value="<?php echo @$location ?>"required>

                  </div>
                </div>
              </div>
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Vessel Master:</p>
                  </div>
                  <div class="col-md-8">
                    <input class="form-control" id="vessel_master" name="vessel_master" value="<?php echo @$vessel_master ?>"required>

                  </div>
                </div>
              </div>
            </div>

            <?php
            $sql="SELECT * FROM MARSIS_NO WHERE NO NOT IN ('0')";
            $stmt = sqlsrv_query( $conn, $sql);

            ?>
            <div class="row">
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Person On Board:</p>
                  </div>
                  <div class="col-md-8">
                    <select id="person_board" name="person_on_board" class="form-control" required>
                      <option value=""> </option>
                      <?php
                      while( $arr = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
                        if(!empty($INSPECTION_ID_edit)){
                          echo	'<option '.($arr['NO'] == $row['PERSON_ON_BOARD'] ? 'SELECTED':'').' value="'.$arr['NO'].'">'.$arr['NUMBER'].'</option>';

                        }else{
                          echo	'<option value="'.$arr['NO'].'">'.$arr['NUMBER'].'</option>';
                        }
                      }

                      ?>

                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Chief Engineer:</p>
                  </div>
                  <div class="col-md-8">
                    <input class="form-control"  name="chief" value="<?php echo @$chief ?>" required>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>


        <div class="panel panel-default">
          <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Inspection Details</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">

              </div>
            </div>
            <br/>
            <div class="row">
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Inspection Date:</p>
                  </div>
                  <div class="col-md-8">
                    <input type="date" class="form-control" id="projectenddate" name="inspection_date" value="<?php echo @date_format($inspection_date, 'Y-m-d') ?>" required>
                  </div>
                </div>
              </div>
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>On Hired Date:</p>
                  </div>
                  <div class="col-md-8">
                    <input type="date" class="form-control" name="on_hire_date" id="on_hire_date"  value="<?php echo @date_format($on_hire_date, 'Y-m-d') ?>" required>
                  </div>
                </div>
              </div>
            </div>

            <?php
            $sql="SELECT * FROM MarSIS_MDM_InspectionType";
            $stmt = sqlsrv_query( $conn, $sql);

            ?>
            <div class="row">
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Type of Inspection:</p>
                  </div>
                  <div class="col-md-8">
                    <select id="" name="type_of_inspection" class="form-control" required>
                      <option value=""> </option>
                      <?php
                      while( $arr = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
                        if(!empty($INSPECTION_ID_edit)){
                          echo	'<option '.($arr['INS_TYPE_ID'] == $row['TYPE_OF_INSPECTION'] ? 'SELECTED':'').' value="'.$arr['INS_TYPE_ID'].'">'.$arr['INS_TYPE_NAME'].'</option>';

                        }else{
                          echo	'<option value="'.$arr['INS_TYPE_ID'].'">'.$arr['INS_TYPE_NAME'].'</option>';
                        }
                      }

                      ?>
                    </select>
                  </div>
                </div>
              </div>

              <?php
              $sql="SELECT * FROM MarSIS_MDM_Requestor";
              $stmt = sqlsrv_query( $conn, $sql);

              ?>

              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Requested By:</p>
                  </div>
                  <div class="col-md-8">

                    <select id="" name="requested_by" class="form-control" required>
                      <option value=""> </option>
                      <?php
                      while( $arr = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
                        if(!empty($INSPECTION_ID_edit)){
                          echo	'<option '.($arr['REQUESTOR_ID'] == $row['REQUESTED_BY'] ? 'SELECTED':'').' value="'.$arr['REQUESTOR_ID'].'">'.$arr['REQUESTOR_NAME'].'</option>';

                        }else{
                          echo	'<option value="'.$arr['REQUESTOR_ID'].'">'.$arr['REQUESTOR_NAME'].'</option>';
                        }
                      }

                      ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <?php
            $sql="SELECT * FROM MarSIS_MDM_OperationArea";
            $stmt = sqlsrv_query( $conn, $sql);

            ?>

            <div class="row">
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Area of Operation:</p>
                  </div>
                  <div class="col-md-8">

                    <select id="" name="area_operation" class="form-control" required>
                      <option value=""> </option>
                      <?php
                      while( $arr = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
                        if(!empty($INSPECTION_ID_edit)){
                          echo	'<option '.($arr['OPERATIONAREA_ID'] == $row['AREA_OF_OPERATION'] ? 'SELECTED':'').' value="'.$arr['OPERATIONAREA_ID'].'">'.$arr['OPERATION_AREA'].'</option>';

                        }else{
                          echo	'<option value="'.$arr['OPERATIONAREA_ID'].'">'.$arr['OPERATION_AREA'].'</option>';
                        }
                      }

                      ?>
                    </select>
                  </div>
                </div>
              </div>

              <?php
              $sql="SELECT * FROM MarSIS_MDM_Activity";
              $stmt = sqlsrv_query( $conn, $sql);

              ?>

              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Activity:</p>
                  </div>
                  <div class="col-md-8">
                    <select id="" name="activity" class="form-control" required>
                      <option value=""> </option>
                      <?php
                      while( $arr = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
                        if(!empty($INSPECTION_ID_edit)){
                          echo	'<option '.($arr['ACTIVITY_ID'] == $row['ACTIVITY'] ? 'SELECTED':'').' value="'.$arr['ACTIVITY_ID'].'">'.$arr['ACTIVITY_NAME'].'</option>';

                        }else{
                          echo	'<option value="'.$arr['ACTIVITY_ID'].'">'.$arr['ACTIVITY_NAME'].'</option>';
                        }
                      }

                      ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <?php
            $sql="SELECT * FROM MarSIS_MDM_User ORDER BY USER_NAME ASC";
            $stmt = sqlsrv_query( $conn, $sql);

            ?>

            <div class="row">
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Inspector No. 1:</p>
                  </div>
                  <div class="col-md-8">
                    <?php
                    $query_user = " SELECT * FROM MarSIS_MDM_User WHERE USER_ID=$USER_ID";
                    $result_user = sqlsrv_query($conn,$query_user);
                    $row_user = sqlsrv_fetch_array($result_user, SQLSRV_FETCH_ASSOC);
                    $user_name = $row_user['USER_NAME'];
                    ?>
                    <input type="hidden" class="form-control" id="inspector1" name="inspector1" value="<?php echo @$USER_ID ?>">
                    <input class="form-control"   value="<?php echo @$user_name ?>" disabled>
                  </div>
                </div>
              </div>

              <?php
              $sql="SELECT * FROM MarSIS_MDM_User ORDER BY USER_NAME ASC";
              $stmt = sqlsrv_query( $conn, $sql);

              ?>

              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                    <p>Inspector No. 2:</p>
                  </div>
                  <div class="col-md-8">
                    <select id="inspector2" name="inspector2" class="form-control" disabled>
                      <option value=""> </option>
                      <?php
                      while( $arr = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){
                        if(!empty($INSPECTION_ID_edit)){
                          echo	'<option '.($arr['USER_ID'] == $row['INSPECTOR_2'] ? 'SELECTED':'').' value="'.$arr['USER_ID'].'">'.$arr['USER_NAME'].'</option>';

                        }else{
                          echo	'<option value="'.$arr['USER_ID'].'">'.$arr['USER_NAME'].'</option>';
                        }
                      }

                      ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 form-group">
                <div class="row">
                  <div class="col-md-4">
                  </div>
                  <div class="col-md-8">
                    <label for="checkbox3" class="">
                      <?php
                      if(!empty($INSPECTION_ID_edit)){
                        echo'<input type="checkbox" id="checkbox" name="checkbox3" value="" class="form-check-input" checked>If more than one Inspector involved';
                      }else{
                        echo'<input type="checkbox" id="checkbox" name="checkbox3" value="" class="form-check-input">If more than one Inspector involved';
                      }
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
                    <div class="col-md-10">
                      <?php
                      if(!empty($INSPECTION_ID_edit)){
                        echo'<textarea class="form-control" rows="3" cols="50" name="scope_inspection" placeholder="*Optional">'.$scope_inspection.'</textarea>';
                      }else{
                        echo'<textarea class="form-control" rows="3" cols="50" name="scope_inspection" placeholder="*Optional"></textarea>';
                      }
                      ?>

                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" name="submit" class="btn btn-md pull-right" style="background-color:#40E0D0">Save and Next</button>
            </form>

          </div>
        </div>

      </div>
    </section>
    <script type="text/javascript">
    $(document).ready(function(){

      $(document).on("keydown", "#vessel_name", function() {



        $( "#vessel_name").autocomplete({
          source: function( request, response ) {
            $.ajax({
              url: "getDetails.php",
              type: 'post',
              dataType: "json",
              data: {
                search: request.term,request:1
              },
              success: function( data ) {
                response( data );
              }
            });
          },
          select: function (event, ui) {
            $(this).val(ui.item.label);
            var userid = ui.item.value;


            $.ajax({
              url: 'getDetails.php',
              type: 'post',
              data: {userid:userid,request:2},
              dataType: 'json',
              success:function(response){

                var len = response.length;

                if(len > 0){

                  var imo_official_number = response[0]['imo_official_number'];
                  var vessel_type = response[0]['vessel_type'];
                  var vessel_age = response[0]['vessel_age'];
                  var year_built = response[0]['year_built'];
                  var vessel_owner = response[0]['vessel_owner'];
                  var country = response[0]['country'];
                  var vessel_id = response[0]['vessel_id'];

                  document.getElementById('vessel_id').value = vessel_id;
                  document.getElementById('IMO_Number').value = imo_official_number;
                  document.getElementById('vessel_type').value = vessel_type;
                  document.getElementById('vessel_age').value = vessel_age;
                  document.getElementById('Contractor_owner').value = vessel_owner;
                  document.getElementById('country').value = country;

                }

              }
            });

            return false;
          }
        });
      });

    });

    </script>
    <script>
    document.getElementById('checkbox').onchange = function() {
      document.getElementById('inspector2').disabled = !this.checked;
    };
    </script>
