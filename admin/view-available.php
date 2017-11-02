<link rel="shortcut icon" href="../hrlogo.png">
		<div class="container-fluid">
				<?php 
						include ('menu.php');
						require("../conn.php");   // Include the database class
				?>
			<div class="row" style ="margin-top:50px">
				<div class="col-md-10 col-md-offset-1">
					<div class="page-header">
							<h1>Available Days</h1>
					</div>
				</div>
			</div>
		<div class = "col-md-10 col-md-offset-1">
				<?php
					$sql = "SELECT
								employee.emp_id, employee.emp_fname, employee.emp_lname, ldays.pos_stat, ldays.adays, leaves.emp_id, SUM(no_days) AS nod
							FROM
								dbhr.leaves, dbhr.employee, dbhr.ldays WHERE
								leaves.emp_id = employee.emp_id AND
								employee.id_pos = ldays.id_pos AND employee.emp_id = '$_GET[id]'";
						$qry=mysql_query($sql);

						echo"<table class='table table-hover' style='margin-top:10px;'>
									<thead>
										<tr>
											<th>Employee ID</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Position</th>
											<th>Days</th>
										</tr>
									</thead>";
						while($rec=mysql_fetch_array($qry))
						{
		$value = $rec['nod'];
		$get = $rec['adays'];
		
		$getval = $get - $value;
		
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
									$rec[pos_stat]
								</td>
								<td>
									$getval
								</td>
							</tr>
						</tbody>";
							
						}
						echo"</table>";
					?>
		</div>
	</div>
	<?php include('footer.php'); ?>
	