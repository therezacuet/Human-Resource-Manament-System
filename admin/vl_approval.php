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
			<div class="row" style="margin-top:-50px;">
				<div class="col-md-8">
					 
					<div class="col-md-4" style="margin-left:530px;">
						<h2>Vacation Leave</h2>
					</div>
				</div>
			</div>
			<?php include("background_print.php");?>
				<?php
					require ("../conn.php");   // Include the database class
					$select = "SELECT * FROM vacation_log, employee
									WHERE vacation_log.emp_id = employee.emp_id AND vacation_log.v_id='$_GET[id]'";
					$qry=mysql_query($select);
				?>
				<?php
					while($rec = mysql_fetch_array($qry))
					{
				?>
				
					<div class="col-md-12" style="margin-top:40px">
						<div class="col-md-4 col-md-offset-4">
										Employee ID: &nbsp <strong><?php echo $rec['id_emp'];?></strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Date: &nbsp <strong><?php echo $rec['vdate']; ?></strong><hr/>
										Full Name: &nbsp <strong><?php echo $rec['emp_fname'];?> <style="margin-left: 20px;"/><?php echo $rec['emp_lname'];?></strong><hr/>
										Leave Type: &nbsp <strong><?php echo $rec['leavetype'];?></strong><hr/>
										Effective Date: &nbsp <strong><?php echo $rec['sdate'];?></strong> &nbsp to &nbsp <strong><?php echo $rec['eddate'];?></strong><hr/>
										Total Days Leave: &nbsp <strong><?php echo $rec['nodays'];?></strong><hr/>
						</div>
						<div class="col-md-4 col-md-offset-4">
								<a href="vl_dapproved.php?id=<?php echo $rec['v_id'];?>"><input type='button' value='Approve' class='btn btn-info'/></a>
								<a href="vl_ddeny.php?id=<?php echo $rec['v_id'];?>"><input type='button' value='Deny' class='btn btn-primary'/></a>
								<a href="vl_pending.php"><input type = "button" value="Back" class="btn btn-default"/></a>
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