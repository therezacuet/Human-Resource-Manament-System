<?php 
	include ('menu.php');
?>
<link rel="shortcut icon" href="../hrlogo.png">
		<div class="container-fluid">
				<div class = "row" style = "margin-top:50px">	
					<div class = "col-md-4">
						<ul class="nav nav-tabs">
						  <li role="presentation"><a href="sl_reports.php">Sick Leave</a></li>
						  <li role="presentation"><a href="vl_reports.php">Vacation Leave</a></li>
						  <li role="presentation" class="active"><a href="to_reports.php">Travel Order</a></li>
						</ul>
					</div>
					<div class = "col-md-4">
						<h1>Travel Order Reports</h1>
					</div>
				</div>
<div class="container-fluid">
	<?php include("background_print.php");?>
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				 <div class="table-responsive">
					<?php
						$sql = "SELECT *,COUNT(travel_ordr.emp_id) AS total,sum(to_total)AS tot FROM employee, travel_ordr 
									WHERE employee.emp_id = travel_ordr.emp_id AND to_stat='0' Group by employee.emp_id";
						$qry=mysql_query($sql);
					?>
				
						<table class='table table-hover' style='margin-top:10px;'>
									<thead>
										<tr>
											<th>Employee ID</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Filed Date</th>
											<th class="text-center">No. of T.O. </th>
											<th class="text-center">Total Expenses</th>
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
										<?php echo $rec['date']?>
									</td>
									<td class="text-center">
										<?php echo $rec['total']?>
									</td>
									<td class="text-center">
										<?php echo $rec['tot']?>
									</td>
									<td>
										<a href='to_reports_view.php?id=<?php echo $rec['emp_id'];?>'><input type='button' value='View' data-toggle="tooltip" data-placement="top" title="View Content" class='btn btn-info'/></a>
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
	