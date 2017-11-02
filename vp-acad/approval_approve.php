<?php 
	include ('menu.php');
?>
<link rel="shortcut icon" href="../hrlogo.png">
<div class="container-fluid">
				<div class = "row" style = "margin-top:50px">
					<div class = "col-md-4">
						<ul class="nav nav-tabs">
						  <li role="presentation"><a href="view-emp-pending.php">Pending</a></li>
						  <li role="presentation" class="active"><a href="approval_approve.php">Approve</a></li>
						  <li role="presentation"><a href="to_approval_deny.php">Deny</a></li>
						   
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
						 
						$sql = "SELECT * FROM employee, travel_ordr, accounting, department
									WHERE employee.emp_id = travel_ordr.emp_id
									AND department.id_dept = employee.id_dept
									AND travel_ordr.acctant = accounting.acctant
									AND accounting.acctant = '2'";
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
											<th>Designation</th>
											<th>Host</th>
											<th>Activity</th>
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
									<?php echo $rec['date']; ?>
								</td>
								<td>
									<?php echo $rec['emp_pos']; ?>
								</td>
								<td>
									<?php echo $rec['to_host']; ?>
								</td>
								<td>
									<?php echo $rec['to_activ']; ?>
								</td>
								<td>
									<?php echo $rec['name_stat_acc']; ?>
								</td>
								<td>
									<a href='to_view_all.php?id=<?php echo $rec['to_id']?>'><input type='button' value='View' data-toggle="tooltip" data-placement="top" title="View Content" class='btn btn-info'/></a>
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
	<?php include('footer.php'); ?>