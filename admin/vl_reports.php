<?php 
	
	include ('conn.php');
?>
<link rel="shortcut icon" href="../hrlogo.png">
		<div class="container-fluid">
				<?php 
					include ('menu.php');
				?>
				<div class = "row" style = "margin-top:50px">	
					<div class = "col-md-4">
						<ul class="nav nav-tabs">
						  <li role="presentation"><a href="sl_reports.php">Sick Leave</a></li>
						  <li role="presentation" class="active"><a href="vl_reports.php">Vacation Leave</a></li>
						   <li role="presentation"><a href="to_reports.php">Travel Order</a></li>
						</ul>
					</div>
					<div class = "col-md-4">
						<h1>Vacation Leave Reports</h1>
					</div>
				</div>
<div class="container-fluid">
	<?php include("background_print.php");?>
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				 <div class="table-responsive">
					<?php
						$sql = "SELECT *, COUNT(vacation_log.emp_id) AS total FROM employee, vacation_log, department 
									WHERE employee.emp_id = vacation_log.emp_id 
									AND employee.id_dept = department.id_dept ";
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
											<th class="text-center">Number of Leave</th>
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
										<?php echo $rec['depart_name']?>
									</td>
									<td>
										<?php echo $rec['emp_fname'] ?>
									</td>
									<td>
										<?php echo $rec['emp_lname'] ?>
									</td>
									<td>
										<?php echo $rec['vdate']?>
									</td>
									<td class="text-center">
										<?php echo $rec['total']?>
									</td>
									<td>
										<a href='vl_reports_view.php?id=<?php echo $rec['emp_id'];?>'><input type='button' value='View' data-toggle="tooltip" data-placement="top" title="View Content" class='btn btn-info'/></a>
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
			<script>
				$(function () {
				  $('[data-toggle="tooltip"]').tooltip()
				})
			</script>
		</div>	<!--close div of container-->
	<?php include('footer.php'); ?>
	