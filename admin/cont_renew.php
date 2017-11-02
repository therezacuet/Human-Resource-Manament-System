<?php 
	include("menu.php");
?>
<link rel="shortcut icon" href="../hrlogo.png">
<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
				  <h1>Contract Update</h1>
				</div>
			</div>
		</div>
<div class="container-fluid">
	<?php include("background_print.php");?>
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<?php
						$sql="SELECT * FROM contract, employee, ldays WHERE id_cont IN(SELECT MAX(id_cont) FROM contract GROUP BY emp_id)AND contract.emp_id = employee.emp_id AND employee.id_pos = ldays.id_pos 
							AND ldays.id_pos = '2' AND contract.cont_stat = '0' AND employee.emp_id='$_GET[id]'";
						$qry=mysql_query($sql);
						/*ang ari nga line is for delete to identify which id is to be deleted*/
						
					?>
					<table class="table table-hover" style="margin-top:10px;" id = "table">
						<thead>
							<tr>
								<th>Employee ID</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Contact Number</th>
								<th>Position</th>
								<th>Date Added</th>
								<th colspan=2 style="text-align:center">Actions</th>
							</tr>
						</thead>
						<?php
						while($rec=mysql_fetch_array($qry))
						{
						?>
						<tr>
							<tbody>
									<td>
										<?php echo $rec['emp_id'] ?>
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
										<?php echo $rec['emp_date']?>
									</td>
									<td>
										<a href='emp_profile.php?id=<?php echo $rec['emp_id']?>' data-toggle="tooltip" data-placement="top" title="Profile"><span class="glyphicon glyphicon-list-alt" style="font-size:20px"></span></a>
									</td>
									<td>
										<a href ="cont_add.php?id=<?php echo $rec['emp_id'];?>"data-toggle="tooltip" data-placement="top" title="Renew Now"><span class="glyphicon glyphicon-file" style="font-size:20px;color:green"></span></a>
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