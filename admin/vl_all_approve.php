<?php 
	include ('menu.php');
?>
<link rel="shortcut icon" href="../hrlogo.png">
	<div class="container-fluid">
				<div class = "row" style = "margin-top:50px">	
					<div class = "col-md-5">
						<ul class="nav nav-tabs">
						  <li role="presentation"><a href="vl_pending.php">Pending</a></li>
						  <li role="presentation"><a href="vl_approval_approve.php">Approve</a></li>
						  <li role="presentation"><a href="vl_approval_deny.php">Deny</a></li>
						  <li role="presentation"><a href="vl_leave_track.php">Trace Leave</a></li>
						  <li role="presentation" class="active"><a href="vl_all_approve.php">All Approve</a></li>
						</ul>
					</div>
					<div class = "col-md-3">
						<h1>Vacation Leave</h1>
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
						$sql = "SELECT * FROM employee, department, vacation_log, approve_hr, executive
									WHERE employee.emp_id = vacation_log.emp_id 
									AND employee.id_dept = department.id_dept 
									AND approve_hr.hr_approve = vacation_log.hr_approve
									AND executive.exe_vp = vacation_log.exe_vp
									AND employee.stat='1'
									AND executive.exe_vp = '2' AND vl_stat='0' ORDER BY id_emp";
						$qry=mysql_query($sql);
					?>
						<table class='table table-hover' style='margin-top:10px;'>
									<thead>
										<tr>
											<th>Employee ID</th>
											<th>Department</th>
											<th>First Name</th>
											<th>Last Name</th>
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
									<?php echo $rec['vdate']; ?>
								</td>
								<td>
									<?php echo $rec['name_stat_exe']; ?>
								</td>
								<td>
									<a href="print_vl_vacation.php?id=<?php echo $rec['v_id'];?>"><input type='button' value='Print' data-toggle="tooltip" data-placement="top" title="View Content" class='btn btn-warning'/></a>
									<a href="vl_move.php?id=<?php echo $rec['v_id'];?>"><input type='button' value='Remove' data-toggle="tooltip" data-placement="top" title="Move to Archive" class='btn btn-danger'/></a>
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