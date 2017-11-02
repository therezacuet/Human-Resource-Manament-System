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
			<div class="row" style="margin-top:-50px">
				<div class="col-md-6 col-md-offset-4">
					<img src="southland1.png" alt="SOUTHLAND" class="img-rounded">
				</div>
				<div class="col-md-2 col-md-offset-5">
				<h2>Sick Leave</h2>
				</div>
			</div>
				<?php
				require ("../conn.php");   // Include the database class
					$select = "SELECT * FROM leaves, employee
									WHERE leaves.emp_id = employee.emp_id AND leaves.leaveid='$_GET[id]'";
					$qry=mysql_query($select);
				?>
				<?php
					while($rec = mysql_fetch_array($qry))
					{
				?>
				
					<div class="col-md-12" style="margin-top:50px">
						<div class="col-md-4 col-md-offset-4">
										Employee ID: &nbsp <strong><?php echo $rec['id_emp'];?></strong> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Date: &nbsp <strong><?php echo $rec['date']; ?></strong><hr/>
										Full Name: &nbsp <strong><?php echo $rec['emp_fname'];?> <style="margin-left: 20px;"/><?php echo $rec['emp_lname'];?></strong><hr/>
										Leave Type: &nbsp <strong><?php echo $rec['leavetype'];?></strong><hr/>
										Effective Date: &nbsp <strong><?php echo $rec['edate'];?></strong> &nbsp to &nbsp <strong><?php echo $rec['endate'];?></strong><hr/>
										Total Days Leave: &nbsp <strong><?php echo $rec['no_days'];?></strong><hr/>
						</div>
						<div class="col-md-8 col-md-offset-4">
								<a href="dapproved.php?id=<?php echo $rec['leaveid'];?>"><input type='button' value='Approve' data-toggle="tooltip" data-placement="top" title="Click to Approve" class='btn btn-info'/></a>
								<a href="approval_deny.php"><input type = "button" value="Back" class="btn btn-default"/></a>
								
						</div>
					</div>
				<?php
					}
				?>
		</div>
		<br>
	<?php
		include("footer.php");
	?>