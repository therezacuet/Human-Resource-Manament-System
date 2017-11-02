<?php 
	include ('menu.php');
?>
<link rel="shortcut icon" href="../hrlogo.png">
	<div class="container-fluid">
				<div class = "row" style = "margin-top:10px">	
					<div class = "col-md-5">
						<h1>Sick Leave</h1>
					</div>
				</div>
	<ul class="nav nav-tabs">
	  <li role="presentation" class="active"><a href="leave_track.php">Recently Approve</a></li>
	  <li role="presentation"><a href="all_approve.php">Done Approve</a></li>
	</ul>
	<br>
<div class="container-fluid">
	<?php include("background_print.php");?>
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
						$sql = "SELECT * FROM employee, department, leaves, executive
									WHERE employee.emp_id = leaves.emp_id 
									AND employee.id_dept = department.id_dept 
									AND executive.exe_vp = leaves.exe_vp 
									AND employee.stat='1' AND executive.exe_vp = '1' 
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
						$sql = "SELECT * FROM employee, department, leaves, executive
									WHERE employee.emp_id = leaves.emp_id 
									AND employee.id_dept = department.id_dept 
									AND executive.exe_vp = leaves.exe_vp 
									AND employee.stat='1' AND executive.exe_vp = '1'
									AND date >= '$cyrr-$cyr' AND date <= '$cya'";
						$qry=mysql_query($sql);
					
					endif;
					//END FUNCTION
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
									<a href='leave_track_status.php?id=<?php echo $rec['leaveid'];?>'><input type='button' value='View' data-toggle="tooltip" data-placement="top" title="View Status" class='btn btn-info'/></a>
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