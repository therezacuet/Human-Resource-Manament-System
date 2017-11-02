<?php 
	include("menu.php");
?>	
<link rel="shortcut icon" href="../hrlogo.png">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
				  <h1>Contract Option</h1>
				</div>
			</div>
		</div>

					<?php
						$sql="SELECT * FROM contract, employee, ldays WHERE id_cont in(SELECT MAX(id_cont) FROM contract GROUP BY emp_id)AND contract.emp_id = employee.emp_id AND employee.id_pos = ldays.id_pos 
							AND ldays.id_pos = '2' AND cont_stat = '1'";
						$qry=mysql_query($sql);
					?>
<div class="container-fluid">
	<?php include("background_print.php");?>
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Employee ID</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Contact Number</th>
								<th>Position</th>
								<th>Status</th>
								<th>Date Added</th>
								<th colspan=4 style="text-align:center">Actions</th>
							</tr>
						</thead>
						<?php
						while($rec=mysql_fetch_array($qry))
						{
						?>
						<tr>
							<tbody>
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
										<?php echo $rec['emp_cont'] ?>
									</td>
									<td>
										<?php echo $rec['emp_pos']?>
									</td>
									<td>
										<?php echo $rec['pos_stat']?>
									</td>
									<td>
										<?php echo $rec['emp_date']?>
									</td>
									<td>
										<a href='emp_profile.php?id=<?php echo $rec['emp_id']?>' data-toggle="tooltip" data-placement="top" title="Profile"><span class="glyphicon glyphicon-list-alt" style="font-size:20px"></span></a>
									</td>
									<td>
										<a href ="cont_update.php?id=<?php echo $rec['emp_id'];?>" data-toggle="tooltip" data-placement="top" title="Renew Contract"><span class="glyphicon glyphicon-file" style="font-size:20px"></span></a>
									</td>
									<td>
										<a href='emp_permanent.php?id=<?php echo $rec['emp_id']?>' data-toggle="tooltip" data-placement="top" title="Permanent"><span class="glyphicon glyphicon-pushpin" style="font-size:20px"></span></a>
									</td>	
									<td>
										<a href='emp_stat.php?id=<?php echo $rec['emp_id']?>' data-toggle="tooltip" data-placement="top" title="Disable Account"><span class="glyphicon glyphicon-trash" style="font-size:20px; color:red"></span></a>
									</td>
					<?php
						}
					?>			
							</tbody>
						</tr>
					</table>
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
<?php include("footer.php");?>