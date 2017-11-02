<?php 
	include ('menu.php');
?>
<link rel="shortcut icon" href="../hrlogo.png">
<div class="container-fluid">
<?php
$query = $_GET['query'];
$min_length = 1;
if(strlen($query) >= $min_length){
	$query = htmlspecialchars($query);
		$query = mysql_real_escape_string($query);
			$sql = ("SELECT * FROM employee, department WHERE employee.id_dept = department.id_dept 
					AND `stat` = '1' AND
						(`id_emp` LIKE '%".$query."%'
							OR `emp_lname` LIKE '%".$query."%'
								OR `emp_fname` LIKE '%".$query."%'
									OR `emp_pos` LIKE '%".$query."%')");
		$qry = mysql_query($sql);
	if(mysql_num_rows($qry) > 0){
?>
<div class="col-md-10 col-md-offset-1">
<div class="container-fluid" style="margin-top:50px;">
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Employee ID</th>
							<th>Department</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Position</th>
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
							<?php echo $rec['depart_name'] ?>
						</td>
						<td>
							<?php echo $rec['emp_fname'] ?>
						</td>
						<td>
							<?php echo $rec['emp_lname'] ?>
						</td>
						<td>
							<?php echo $rec['emp_pos']?>
						</td>
						<td>
							<a href='emp_profile.php?id=<?php echo $rec['emp_id']?>'><input type='button' value='Profile' title ='View all Detials' class='btn btn-info'/></a>
							<a href='edit_emp.php?id=<?php echo $rec['emp_id']?>'><input type='button' value='Modify' title ='Edit' class='btn btn-primary'/></a>
						</td>
					</tr>
				</tbody>
			<?php
				}
				}
				else 
					{
						echo "<h2 style='margin-left:600px;margin-top:200px;'>No results<h2>";
					}
				}
				else
					{
						echo "Minimum length is ".$min_length;
					}
			?>
			</table>
				</div>
			</div>
		</div>
	</div>
</div>
	</div>
		<div class = "col-md-4 col-md-offset-1">
			<a href = "admin.php"><input type="button" value="Back" name="cancel" class="btn btn-default"/></a>
		</div>	
</div>
		<?php
			include ('footer.php');
		?>