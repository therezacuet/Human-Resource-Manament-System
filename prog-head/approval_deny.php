<?php 
	include ('menu.php');
?>
<link rel="shortcut icon" href="../hrlogo.png">	
		<div class="container-fluid">
				<div class = "row" style = "margin-top:50px">	
					<div class = "col-md-4">
						<ul class="nav nav-tabs">
						
						<?php
							//dri gng call yah ang id xng department w/c is id_dept pra macall ya ang id xng ng.login
							$sql = "Select * FROM department WHERE department.id_dept = '$_GET[id]'";
							$qry = mysql_query($sql);
							$rec = mysql_fetch_array($qry);
						?>
						  <li role="presentation"><a href="view-emp-pending.php?id=<?php echo $rec['id_dept']?>">Pending</a></li>
						  <li role="presentation" ><a href="approval_approve.php?id=<?php echo $rec['id_dept']?>">Approve</a></li>
						  <li role="presentation" class="active"><a href="approval_deny.php?id=<?php echo $rec['id_dept']?>">Deny</a></li>
						</ul>
					</div>
					<div class = "col-md-2">
						<h1>Sick Leave<h1>
					</div>
				</div>
<div class="container-fluid">
	<?php include("background_print.php")?>
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<?php
						//diri is icall ya ang tatlo ka table then iview nia lng ang mai 2 nga data sa table w/c is approve 
						$sql = "SELECT * FROM employee, leaves, department, program_head
									WHERE employee.emp_id = leaves.emp_id 
									AND employee.id_dept = department.id_dept 
									AND program_head.prog_head = leaves.prog_head 
									AND program_head.prog_head = '3'";
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
									<?php echo $rec['date']; ?>
								</td>
								<td>
									<?php echo $rec['name_stat_prog']; ?>
								</td>
								<td>
									<a href="approval_deny_approve.php?id=<?php echo $rec['leaveid'];?>"><input type='button' value='View' data-toggle="tooltip" data-placement="top" title="View Content" class='btn btn-info'/></a>
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
<?php include("footer.php")?>