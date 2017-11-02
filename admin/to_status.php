<?php 
	include("menu.php");
?>
<link rel="shortcut icon" href="../hrlogo.png">
		<div class="container-fluid">
				<div class = "row" style = "margin-top:50px">	
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
						$sql = "SELECT * FROM employee, travel_ordr, department, accounting, program_head, finance, vp_academic, vp_oper, executive
									WHERE employee.emp_id = travel_ordr.emp_id AND employee.id_dept = department.id_dept 
									AND accounting.acctant = travel_ordr.acctant
									AND program_head.prog_head = travel_ordr.prog_head
									AND finance.vp_finance = travel_ordr.vp_finance 
									AND vp_academic.vp_acad = travel_ordr.vp_acad
									AND vp_oper.vp_operation = travel_ordr.vp_operation
									AND executive.exe_vp = travel_ordr.exe_vp 
									AND executive.exe_vp = '1' AND employee.stat='1' 
									AND travel_ordr.to_id = '$_GET[id]'";
						$qry=mysql_query($sql);
					?>
						<table class='table table-hover' style='margin-top:10px;'>
									<thead>
										<tr>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Accountant Status</th>
											<th>Program Head Status</th>
											<th>Finance Status</th>
											<th>ACAD Status</th>
											<th>Operation Status</th>
											<th>Executive Status</th>
										</tr>
									</thead>
					<?php
						while($rec=mysql_fetch_array($qry))
						{
					?>
					<tbody>
						<tr>
								<td>
									<?php echo $rec['emp_fname']; ?>
								</td>
								<td>
									<?php echo $rec['emp_lname']; ?>
								</td>
								<td>
									<?php echo $rec['name_stat_acc']; ?>
								</td>
								<td>
									<?php echo $rec['name_stat_prog']; ?>
								</td>
								<td>
									<?php echo $rec['name_stat_fnce']; ?>
								</td>
								<td>
									<?php echo $rec['name_stat_acad']; ?>
								</td>
								<td>
									<?php echo $rec['name_stat_oper']; ?>
								</td>
								<td>
									<?php echo $rec['name_stat_exe']; ?>
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
			<div class="col-md-4">
					<a href="to_leave_track.php"><input type = "button" value="Back" class="btn btn-default"/></a>
			</div>
	</div>
	<?php include('footer.php');?>
	