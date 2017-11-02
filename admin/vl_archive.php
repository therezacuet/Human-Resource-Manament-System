<?php 
	include ('menu.php');
?>
<link rel="shortcut icon" href="../hrlogo.png">
<div class="container-fluid">
				<div class = "row" style = "margin-top:50px">	
					<div class = "col-md-4">
						<ul class="nav nav-tabs">
						  <li role="presentation"><a href="sl_archive.php">Sick Leave</a></li>
						  <li role="presentation" class="active"><a href="vl_archive.php">Vacation Leave</a></li>
						   <li role="presentation"><a href="to_archive.php">Travel Order</a></li>
						</ul>
					</div>
					<div class = "col-md-4">
						<h1>Vacation Leave Archive</h1>
					</div>
				</div>
<div class="container-fluid">
	<?php include("background_print.php");?>
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				 <div class="table-responsive">
					<?php
						$sql = "SELECT *, COUNT(vacation_log.emp_id) AS total FROM employee, vacation_log 
									WHERE employee.emp_id = vacation_log.emp_id AND vl_stat='1' Group by employee.emp_id";
						$qry=mysql_query($sql);
					?>
				
						<table class='table table-hover' style='margin-top:10px;'>
									<thead>
										<tr>
											<th>Employee ID</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Filed Date</th>
											<th>Start Date</th>
											<th>End Date</th>
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
										<?php echo $rec['emp_fname'] ?>
									</td>
									<td>
										<?php echo $rec['emp_lname'] ?>
									</td>
									<td>
										<?php echo $rec['vdate']?>
									</td>
									<td>
										<?php echo $rec['sdate']?>
									</td>
									<td>
										<?php echo $rec['eddate']?>
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