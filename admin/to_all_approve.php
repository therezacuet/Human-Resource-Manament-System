<?php 
	include("menu.php");
?>
<link rel="shortcut icon" href="../hrlogo.png">
		<div class="container-fluid">
				<div class = "row" style = "margin-top:50px">	
					<div class = "col-md-5">
						<ul class="nav nav-tabs">
						  <li role="presentation"><a href="">Pending</a></li>
						  <li role="presentation"><a href="to_leave_track.php">Trace Leave</a></li>
						  <li role="presentation" class="active"><a href="to_all_approve.php">All Approve</a></li>
						</ul>
					</div>
					<div class = "col-md-3">
						<h1>Travel Order</h1>
					</div>
				</div>
<div class="container-fluid">
	<?php include("background_print.php");?>
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<?php
						//this codes is that all the approve will go to the approve submenu
						$sql = "SELECT * FROM employee, department, travel_ordr, accounting, executive
									WHERE employee.emp_id = travel_ordr.emp_id AND department.id_dept = employee.id_dept
									AND accounting.acctant = travel_ordr.acctant
									AND executive.exe_vp = travel_ordr.exe_vp
									AND employee.stat='1'
									AND executive.exe_vp = '2' AND to_stat='0' ORDER BY id_emp";
						$qry=mysql_query($sql);
					?>
						<table class='table table-hover' style='margin-top:10px;'>
									<thead>
										<tr>
											<th>Employee ID</th>
											<th>Department</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Designation</th>
											<th>Venue</th>
											<th>Activity</th>
											<th>Filed Date</th>
											<th>Status</th>
											<th></th>
										</tr>
									</thead>
					<?php
						while($rec=mysql_fetch_array($qry))
						{
					?>
					<tbody>
						<tr>
								<td>
									<?php echo $rec['id_emp']; ?>
								</td>
								<td>
									<?php echo $rec['depart_name']; ?>
								</td>
								<td>
									<?php echo $rec['emp_fname']; ?>
								</td>
								<td>
									<?php echo $rec['emp_lname']; ?>
								</td>
								<td>
									<?php echo $rec['emp_pos'] ?>
								</td>
								<td>
									<?php echo $rec['to_venue']?>
								</td>
								<td>
									<?php echo $rec['to_activ']?>
								</td>
								<td>
									<?php echo $rec['date']; ?>
								</td>
								<td>
									<?php echo $rec['name_stat_exe']; ?>
								</td>
								<td>
									<a href="print_to.php?id=<?php echo $rec['to_id'];?>"><input type='button' value='Print' data-toggle="tooltip" data-placement="top" title="View Content" class='btn btn-warning'/></a>
									<a href="to_move.php?id=<?php echo $rec['to_id'];?>"><input type='button' value='Remove' data-toggle="tooltip" data-placement="top" title="Move to Archive" class='btn btn-danger'/></a>
								</td>
							</tr>
					</tbody>
				<?php
					}
					echo"</table>";
				?>
				</div>
			</div>
		</div>
	</div>
</div>
	</div>
			<script>
				$(function () {
				  $('[data-toggle="tooltip"]').tooltip()
				})
			</script>
	<?php include('footer.php');?>
	