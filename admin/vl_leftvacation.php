<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee * List</title>
	<link rel="shortcut icon" href="../hrlogo.png">
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container-fluid">
						<?php include("background_print.php");?>
						<?php 
						require("../conn.php");   // Include the database class
						?>
<?php
			$sql="select SUM(nodays) AS nod1, employee.emp_id, id_emp, emp_fname, emp_lname, vdate, leavetype, nodays, sdate, eddate  From vacation_log, employee
					where vacation_log.emp_id = employee.emp_id AND vacation_log.v_id = '$_GET[id]'";
			$qry2 = mysql_query($sql);
			$recc = mysql_fetch_array($qry2);
?>
			<div class="row">
				<div class="col-md-6 col-md-offset-4" style="margin-top:-50px">
					<img src="southland1.png" alt="SOUTHLAND" class="img-rounded">
				</div>
				<div class="col-md-4 col-md-offset-5">
							<h1>Vacation Leave</h1>
				</div>
			</div>
			<br/>
					<div class="col-md-12" style="margin-top:20px">
						<div class="col-md-4 col-md-offset-4">
										Employee ID: &nbsp <strong><?php echo $recc['id_emp'];?></strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Date: &nbsp <strong><?php echo $recc['vdate']; ?></strong><hr/>
										Full Name: &nbsp <strong><?php echo $recc['emp_fname'];?> <style="margin-left: 20px;"/><?php echo $recc['emp_lname'];?></strong><hr/>
										Leave Type: &nbsp <strong><?php echo $recc['leavetype'];?></strong><hr/>
										Effective Date: &nbsp <strong><?php echo $recc['sdate'];?></strong> &nbsp to &nbsp <strong><?php echo $recc['eddate'];?></strong><hr/>
										Total Days Leave: &nbsp <strong><?php echo $recc['nod1'];?></strong><hr/>
						</div>
						<div class="col-md-4 col-md-offset-4">
								<a href="vl_approval_approve.php"><input type = "button" value="Back" class="btn btn-default"/></a>
						</div>
					</div>
		</div>
		<br>
		<?php include('footer.php'); ?>