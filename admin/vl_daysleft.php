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
		<?php 
			require("../conn.php");   // Include the database class
		?>
<?php
			$sql="select SUM(credits) AS nod From vacation_credits
					where vacation_credits.emp_id = '$_GET[id]'";
			$qry2 = mysql_query($sql);
			$rec = mysql_fetch_array($qry2);
			$cred = $rec['nod'];
			
			$sql="select SUM(nodays) AS nod1, id_emp, emp_fname, emp_lname, leavetype, nodays, sdate, eddate  From vacation_log, employee,executive
					where executive.exe_vp = vacation_log.exe_vp
						  AND executive.exe_vp = '2'
						  AND vacation_log.emp_id = employee.emp_id 
						  AND vacation_log.emp_id = '$_GET[id]'";
			$qry2 = mysql_query($sql);
			$recc = mysql_fetch_array($qry2);
			
			$value2 = $recc ['nod1'];
			
			$value3 = $cred - $value2;
?>
		<div class="col-md-6 col-md-offset-3">
			<div class = "row">
					<div class="col-md-12">
						<div class="page-header">
								<h1>Vacation Leave</h1>
						</div>
					</div>
				</div>
			<br/>
						<div class="panel panel-success">
							<div class="panel-heading">
								<h3 class="panel-title">Information</h3>
							</div>
							<div class="panel-body">
									Employee ID: &nbsp <strong><?php echo $recc['id_emp'];?></strong><hr/>
									Full Name: &nbsp <strong><?php echo $recc['emp_fname'];?> <style="margin-left: 20px;"/><?php echo $recc['emp_lname'];?></strong><hr/>
									Days Left: &nbsp <strong><?php echo "$value3";?></strong><hr/>
							</div>
						</div>
					<div class = "col-md-4">
							<input type="button" value="Back" name="cancel" 
							onclick="history.back()" class="btn btn-default"/>
					</div>
		</div>
	</div>
		<?php include('footer.php'); ?>