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
	</head>
	<body>
	<div class="container-fluid">
	<?php include("background_print.php");?>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="page-header">
							<h1>Sick Leave</h1>
					</div>
				</div>
			</div>
	
			<div class="col-md-6 col-md-offset-3">
<div class="container-fluid">
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
						<?php 
						require("../conn.php");   // Include the database class
						?>
						<?php
						$sql="SELECT * FROM employee where stat ='1'";
						$qry=mysql_query($sql);
						?>
						<table class='table table-hover' style='margin-top:10px;'>
									<thead>
										<tr>
											<th>Employee ID</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th></th>
										</tr>
									</thead>
						<?php
						while($rec=mysql_fetch_array($qry))
							{
						?>
						<tr>
						<tbody>
								<td>
									<?php echo $rec['id_emp']; ?>
								</td>
								<td>
									<?php echo $rec['emp_fname']; ?>
								</td>
								<td>
									<?php echo $rec['emp_lname']; ?>
								</td>
								<td>
									<a href='leaves.php?id=<?php echo $rec['emp_id'];?>'><input type='button' value='Apply' title ='View all Detials' class='btn btn-info'/></a>
								</td>
						<?php
							}
						?>
					</table>	
			</div>
		</div>
	</div>
</div>
</div>
		<div class = "col-md-4 col-md-offset-3">
			<a href = "admin.php"><input type="button" value="Back" name="cancel" class="btn btn-default"/></a>
		</div>
	</div>
		<?php
			include ('footer.php');
		?>
