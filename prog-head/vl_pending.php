<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Program Head</title>
	<link rel="shortcut icon" href="../hrlogo.png">	
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container-fluid">

					<?php 
						include ('menu.php');
					?>
				<div class = "row" style = "margin-top:50px">	
					<div class = "col-md-4">
						<ul class="nav nav-tabs">
						<?php 
							$sql="SELECT * FROM department WHERE department.id_dept = '$_GET[id]'";
							$qry=mysql_query($sql);
							$rec=mysql_fetch_array($qry);
						?>
						  <li role="presentation" class="active"><a href="vl_pending.php?id=<?php echo $rec['id_dept']?>">Pending</a></li>
						  <li role="presentation"><a href="vl_approval_approve.php?id=<?php echo $rec['id_dept']?>">Approve</a></li>
						  <li role="presentation"><a href="vl_approval_deny.php?id=<?php echo $rec['id_dept']?>">Deny</a></li>
						</ul>
					</div>
					<div class = "col-md-3">
						<h1>Vacation Leave</h1>
					</div>
				</div>
<div class="container-fluid">
	<?php include("background_print.php")?>
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<?php	
						//view nia d ang all pending sa HR_approve
						$sql = "SELECT * FROM employee, vacation_log, department, approve_hr, program_head
									WHERE employee.emp_id = vacation_log.emp_id 
									AND employee.id_dept = department.id_dept 
									AND approve_hr.hr_approve = vacation_log.hr_approve
									AND program_head.prog_head = vacation_log.prog_head
									AND approve_hr.hr_approve = '2' AND program_head.prog_head = '1'
									AND department.id_dept = '$_GET[id]'";
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
									<?php echo $rec['name_stat_prog']; ?>
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