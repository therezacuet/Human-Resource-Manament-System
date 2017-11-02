<?php 
	include ('menu.php');
?>
<link rel="shortcut icon" href="../hrlogo.png">
		<div class="container-fluid">	
		<?php include("background_print.php");?>		
<?php
	require ("../conn.php");   // Include the database class
	$sql = "SELECT leaves.leaveid, employee.emp_id, leaves.date, leaves.emp_id, emp_fname, emp_lname, leavetype, DATE_FORMAT(edate, '%M %d, %Y') AS dts,  DATE_FORMAT(endate, '%M %d, %Y') AS dte, DATEDIFF(endate, edate) AS dtot, reason, recommending FROM leaves, employee 
			WHERE leaves.emp_id = employee.emp_id and leaves.deanstatus = 'pending' and employee.emp_id='$_GET[id]'";
						$qry=mysql_query($sql);
						
						echo"<table class='table table-hover' style='margin-top:10px;'>
									<thead>
										<tr>
											<th>Employee ID</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Leave Type</th>
											<th>Effective Date</th>
											<th>Due Date</th>
											<th>Status</th>
										</tr>
									</thead>";
						while($rec=mysql_fetch_array($qry))
						{
						echo"<tr>";
						echo"
						<tbody>
								<td>
									$rec[emp_id]
								</td>
								<td>
									$rec[emp_fname]
								</td>
								<td>
									$rec[emp_lname]
								</td>
								<td>
									$rec[leavetype]
								</td>
								<td>
									$rec[dts]
								</td>
								<td>
									$rec[dte]
								</td>
								<td>
									$rec[date]
								</td>
								<td>
								<a href='emp_profile.php?id=$rec[emp_id]'><input type='button' value='Profile' title ='View all Detials' class='btn btn-info'/></a>
								<a href='edit_emp.php?id=$rec[emp_id]'><input type='button' value='Modify' title ='Edit' class='btn btn-primary'/></a>
								</td>
							</tr>
						</tbody>";

						}
						echo"</table>";
					?>
	</div>
	<?php include("footer.php");?>