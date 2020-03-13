<?php
if(@$_GET['session']==1){
  unset($_SESSION['inspection_id']);
  unset($_SESSION['inspection_id_edit']);
}

 ?>
<section id="main">
	<div class="container">
		<div class="row">
			<div class="col-md-10">

				<div class="panel panel-default">
					<div class="panel-heading main-color-bg">
						<h3 class="panel-title">Summary</h3>
					</div>

				</div>

				<div class="table-responsive">

					<table id="dataTable_ovid" class="table table-bordered table-responsive">
						<tr>
							<th style="background:#40E0D0 !important">Inspection No</th>
							<th style="background:#40E0D0 !important">Date</th>
							<th style="background:#40E0D0 !important">Inspector 1</th>
						</tr>

						<?php
						$user_id = $_SESSION['USER_ID'];
						$sql="SELECT * From MarSIS_DW_InspectionDetails a LEFT JOIN MarSIS_MDM_User b ON a.UPDATED_BY=b.USER_ID WHERE b.USER_ID='$user_id' AND  YEAR(a.INSPECTION_DATE) >=  YEAR(2020)  ORDER BY a.INSPECTION_ID DESC";
						$stmt = sqlsrv_query($conn, $sql);
						$i = 1;
						while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
							$INSPECTION_ID = $row['INSPECTION_ID'];
							$INSPECTOR_1 = $row['USER_NAME'];
							$date = $row['INSPECTION_DATE'];
							echo '<tr>
							<td><a href="index.php?page=inspection_details_edit&inspec_id='.$INSPECTION_ID.'"><p>'.$INSPECTION_ID.'</p></a></td>
							<td><p>'.date_format($date, 'Y-m-d').'</p></td>
							<td><p>'.$INSPECTOR_1.'</p></td>
							</tr>';
							$i++;
						}
						?>
					</table>
				</div>



			</div>
		</div>
	</div>
</section>
