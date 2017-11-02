<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>HR</title>
		<link rel="shortcut icon" href="../hrlogo.png">
		<!-- Bootstrap -->
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<style>
			.borderless tbody tr td, .borderless thead tr th {
			border: 0;
			}
		</style>
		</style>
	</head>
	<body>
		<div class="container-fluid">
		<?php include("background_print.php");?>
<?php 
	require("../conn.php");   // Include the database class
?>
<div class="row" style = "margin-top:30px">
	<div class = "col-md-6 col-md-offset-3">
		<div class="panel panel-default">
		  <div class="panel-heading">
			<h3 class="panel-title">Contract Information</h3>
		  </div>
				<div class="panel-body">
					<table class = "table borderless">
						<?php
							$sql="SELECT * FROM employee, contract WHERE contract.id_cont IN(SELECT MAX(contract.id_cont) FROM contract GROUP BY contract.emp_id)
									AND employee.emp_id = contract.emp_id
									AND id_cont='$_GET[id]'";
							$qry=mysql_query($sql);
							$rw=mysql_fetch_array($qry)
						?>
						<tr>
							<td>
								<a href = "contract.htm"><input type="button" class="btn btn-info" value="Contact Agreement"></a>
							</td>
						</tr>
						<tr>
							<td>
								<strong>Name</strong>
							</td>
							<td colspan = 3>
								<strong style="margin-left:80px">Contract</strong>
							</td>
						</tr>
						<tr>
							<td>
								<?php echo $rw['emp_fname']?>
							
								<?php echo $rw['emp_lname']?>
							</td>
							<td>
								<strong><?php echo $rw['start_date']?></strong>
							</td>
							<td>
								<strong><?php echo $rw['end_date']?></strong>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<button type="button" class="btn btn-default" onclick="window.history.back();"/> Back</button> 
	</div>
</div>
	
	</div>
		<?php include('footer.php'); ?>