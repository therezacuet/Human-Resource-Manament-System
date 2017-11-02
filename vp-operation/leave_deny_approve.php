<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VP Executive</title>
	<link rel="shortcut icon" href="../hrlogo.png">		
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-md-offset-4" style="margin-top:-30px">
					<img src="southland1.png" alt="SOUTHLAND" class="img-rounded">
				</div>
			
				<div class="col-md-2 col-md-offset-5">
				<h1>Sick Leave</h1>
				</div>
			</div>
			<?php include("background_print.php");?>
				<?php
				require ("../conn.php");   // Include the database class
					$select = "SELECT * FROM leaves, employee
								WHERE leaves.emp_id = employee.emp_id and leaves.leaveid='$_GET[id]'";
					$qry=mysql_query($select);
				?>
				<?php
					while($rec = mysql_fetch_array($qry))
					{
				?>
					<div class="col-md-12" style="margin-top:40px">
						<div class="col-md-4 col-md-offset-4">				
										Employee ID: &nbsp <strong><?php echo $rec['id_emp'];?></strong><hr/>
										Full Name: &nbsp <strong><?php echo $rec['emp_fname'];?> <style="margin-left: 20px;"/><?php echo $rec['emp_lname'];?></strong><hr/>
										Leave Type: &nbsp <strong><?php echo $rec['leavetype'];?></strong><hr/>
										Effective Date: &nbsp <strong><?php echo $rec['edate'];?></strong> &nbsp to &nbsp <strong><?php echo $rec['endate'];?></strong><hr/>
										Total Days Leave: &nbsp <strong><?php echo $rec['no_days'];?></strong><hr/>
						</div>
						<div class="col-md-6 col-md-offset-4">
								<div class="col-md-12">
									<a href="dapproved.php?id=<?php echo $rec['leaveid'];?>"><input type='button' value='Approve w/ Pay' class='btn btn-info'/></a>
									<a href="dapprovedpay.php?id=<?php echo $rec['leaveid'];?>"><input type='button' value='Approve w/o Pay' class='btn btn-info'/></a>
									<a href="approval_deny.php?id=<?php echo $rec['emp_id'];?>"><input type = "button" value="Back" class="btn btn-default"/></a>
								</div>
								
						</div>
					</div>
				<?php
					}
				?>
		</div>
		<br>
		<?php include("footer.php");?>
