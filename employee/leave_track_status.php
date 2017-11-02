<?php 
	include ('menu.php');
?>
<link rel="shortcut icon" href="../hrlogo.png">
	<div class="container-fluid">	
		<?php include("background_print.php");?>
				<div class = "row" style = "margin-top:50px">	
					<div class = "col-md-2 col-md-offset-1">
						<h1>Sick Leave</h1>
					</div>
				</div>
					<br/>
				
			<div class = "col-md-10 col-md-offset-1">
					<?php
						//this codes is that all the approve will go to the approve submenu
						$sql = "SELECT * FROM employee, leaves, department, approve_hr, program_head, vp_oper, executive
									WHERE employee.emp_id = leaves.emp_id AND employee.id_dept = department.id_dept 
									AND approve_hr.hr_approve = leaves.hr_approve
									AND program_head.prog_head = leaves.prog_head 
									AND vp_oper.vp_operation = leaves.vp_operation
									AND executive.exe_vp = leaves.exe_vp 
									AND executive.exe_vp ='1'
									AND employee.stat='1'
									AND leaves.leaveid = '$_GET[id]'";
						$qry=mysql_query($sql);
						$rec=mysql_fetch_array($qry)
					?>
				<table class='table table-hover' style='margin-top:10px;'>
									<thead>
										<tr>
											<th>First Name</th>
											<th>Last Name</th>
											<th>HR Status</th>
											<th>Head Status</th>
											<th>Operation Status</th>
											<th>Executive Status</th>
										</tr>
									</thead>
					<tbody>
						<tr>
								<td>
									<?php echo $rec['emp_fname']; ?>
								</td>
								<td>
									<?php echo $rec['emp_lname']; ?>
								</td>
								<td>
									<?php echo $rec['name_stat']; ?>
								</td>
								<td>
									<?php echo $rec['name_stat_prog']; ?>
								</td>
								<td>
									<?php echo $rec['name_stat_oper']; ?>
								</td>
								<td>
									<?php echo $rec['name_stat_exe']; ?>
								</td>
							</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-4 col-md-offset-1">
					<a href="leave_track.php"><input type = "button" value="Back" class="btn btn-default"/></a>
			</div>
	</div>
	<?php include('footer.php');?>
