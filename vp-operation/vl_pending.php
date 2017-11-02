<?php 
	include ('menu.php');
?>	
	<link rel="shortcut icon" href="../hrlogo.png">		
		<div class="container-fluid">
				<div class = "row" style = "margin-top:50px">	
					<div class = "col-md-4">
						<ul class="nav nav-tabs">
						  <li role="presentation" class="active"><a href="vl_pending.php">Pending</a></li>
						  <li role="presentation"><a href="vl_approval_approve.php">Approve</a></li>
						  <li role="presentation"><a href="vl_approval_deny.php">Deny</a></li>
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
						//view nia d ang all pending sa HR_approve
						$sql = "SELECT * FROM employee, vacation_log, department, program_head, vp_oper
									WHERE employee.emp_id = vacation_log.emp_id AND employee.id_dept = department.id_dept
									AND program_head.prog_head = vacation_log.prog_head
									AND vp_oper.vp_operation = vacation_log.vp_operation
									AND program_head.prog_head = '2' 
									AND vp_oper.vp_operation = '1'";
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
									<?php echo $rec['name_stat_oper']; ?>
								</td>
								<td>
								<a href='vl_approval.php?id=<?php echo $rec['v_id'];?>'><input type='button' value='View' data-toggle="tooltip" data-placement="top" title="View to Approve" class='btn btn-info'/></a>
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
	<?php include('footer.php');?>