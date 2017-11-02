<?php 
	include ('menu.php');
?>
<link rel="shortcut icon" href="../hrlogo.png">
	<div class="container-fluid">
		<?php include("background_print.php");?>
				<div class = "row" style = "margin-top:50px">	
					<div class = "col-md-5">
						<ul class="nav nav-tabs">
						  <li role="presentation"><a href="view-emp-pending.php">Pending</a></li>
						  <li role="presentation"><a href="approval_approve.php">Approve</a></li>
						  <li role="presentation" class="active"><a href="approval_deny.php">Deny</a></li>
						  <li role="presentation"><a href="leave_track.php">Trace Leave</a></li>
						  <li role="presentation"><a href="all_approve.php">All Approve</a></li>
						</ul>
					</div>
					<div class = "col-md-2">
						<h1>Sick Leave</h1>
					</div>
				</div>
<div class="container-fluid">
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
			<?php
				//INITIALIZE DATE RANGE Start
				$nw = strtotime("now");
				$tdy = date("m-d",$nw);
				
				$mjune = strtotime("june 1");
				$djune = date("m-d",$mjune);
				
				$mdec = strtotime("December 31");
				$ddec = date("m-d",$mdec);
				
				$mjan = strtotime("January 1");
				$djan = date("m-d",$mjan);
				
				$mmay = strtotime("May 31");
				$dmay = date("m-d",$mmay);
			//INITIALIZE DATE RANGE End
			
			//START FUNCTION
				if(($djune <= $tdy)&&($ddec >= $tdy)):
					$cyear = strtotime("June 1");
					$cyr = date("m-d",$cyear);
					
					$cyrs = strtotime("now");
					$cyrr = date("Y",$cyrs);
					
					$cyaa = strtotime("now");
					$cya = date("Y-m-d",$cyaa);
					
						//this codes is that all the approve will go to the approve submenu
						$sql = "SELECT * FROM employee, leaves, department, approve_hr
									WHERE employee.emp_id = leaves.emp_id AND employee.id_dept = department.id_dept AND approve_hr.hr_approve = leaves.hr_approve AND 
									approve_hr.hr_approve = '3' 
									AND employee.stat='1' 
									AND sl_stat='0'
									AND date >= '$cyrr-$cyr' AND date <= '$cya'";
						$qry=mysql_query($sql);
						
					elseif(($djan <= $tdy)&&($dmay >= $tdy)):
					
					$cyear = strtotime("June 1");
					$cyr = date("m-d",$cyear);
					
					$cyrs = strtotime("lastyear");
					$cyrr = date("Y",$cyrs);
					
					$cyaa = strtotime("now");
					$cya = date("Y-m-d",$cyaa);
					
						//this codes is that all the approve will go to the approve submenu
						$sql = "SELECT * FROM employee, leaves, department, approve_hr
									WHERE employee.emp_id = leaves.emp_id AND employee.id_dept = department.id_dept AND approve_hr.hr_approve = leaves.hr_approve AND 
									approve_hr.hr_approve = '3' 
									AND employee.stat='1' 
									AND sl_stat='0'
									AND date >= '$cyrr-$cyr' AND date <= '$cya'";
						$qry=mysql_query($sql);
					endif;
					?>
						<table class='table table-hover'>
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
									<?php echo $rec['name_stat']; ?>
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
	<script>
		$(function () {
		$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
	<?php include('footer.php');?>
