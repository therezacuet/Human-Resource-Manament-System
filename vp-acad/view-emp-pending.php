<?php 
	include ('menu.php');
?>	
	<link rel="shortcut icon" href="../hrlogo.png">
		<div class="container-fluid">
					
				<div class = "row" style = "margin-top:50px">	
					<div class = "col-md-4">
						<ul class="nav nav-tabs">
						
						  <li role="presentation" class="active"><a href="">Pending</a></li>
						  <li role="presentation"><a href="approval_approve.php">Approve</a></li>
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
						//view nia d ang all pending sa HR_approve
						$sql = "SELECT * FROM employee, travel_ordr, department, accounting
									WHERE employee.emp_id = travel_ordr.emp_id
									AND employee.id_dept = department.id_dept 
									AND accounting.acctant = travel_ordr.acctant
									AND accounting.acctant = '1'
									AND employee.stat = '1' AND to_stat='0'";
						$qry=mysql_query($sql);
					?>
				
						<table class='table table-hover' style='margin-top:10px;'>
									<thead>
										<tr>
											<th>Employee ID</th>
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
										<?php echo $rec['id_emp'] ?>
									</td>
									<td>
										<?php echo $rec['emp_fname'] ?>
									</td>
									<td>
										<?php echo $rec['emp_lname'] ?>
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
										<?php echo $rec['date']?>
									</td>
									<td>
										<?php echo $rec['name_stat_acc']; ?>
									</td>
									<td>
										<a href='to_approve.php?id=<?php echo $rec['to_id']?>'><input type='button' value='View' data-toggle="tooltip" data-placement="top" title="View to Approve" class='btn btn-info'/></a>
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
