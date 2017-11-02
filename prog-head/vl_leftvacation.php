<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Program Head</title>
	<link rel="shortcut icon" href="../hrlogo.png">	
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container-fluid">
						<?php 
						require("../conn.php");   // Include the database class
						?>
<?php
			$sql="select SUM(credits) AS nod From vacation_credits 
					where vacation_credits.emp_id = '$_GET[id]'";
			$qry2 = mysql_query($sql);
			$rec = mysql_fetch_array($qry2);
			$cred = $rec['nod'];
			
			$sql="select SUM(nodays) AS nod1, id_emp, emp_fname, emp_lname, leavetype, nodays, sdate, eddate  From vacation_log, employee
					where vacation_log.emp_id = employee.emp_id AND vacation_log.emp_id = '$_GET[id]'";
			$qry2 = mysql_query($sql);
			$recc = mysql_fetch_array($qry2);
			
			$value2 = $recc ['nod1'];
			
			$value3 = $cred - $value2;
?>
			<div class="row">
				<div class="col-md-6 col-md-offset-4" style="margin-top:-30px;">
					<img src="southland.png" alt="SOUTHLAND" class="img-rounded">
				</div>
				<div class="col-md-4 col-md-offset-4">
							<h1>Vacation Leave</h1>
				</div>
			</div>
			<?php include("background_print.php");?>
			<br/>
					<div class="col-md-12" style="margin-top:40px">
						<div class="col-md-4 col-md-offset-4">
										Employee ID: &nbsp <strong><?php echo $recc['id_emp'];?></strong><hr/>
										Full Name: &nbsp <strong><?php echo $recc['emp_fname'];?> <style="margin-left: 20px;"/><?php echo $recc['emp_lname'];?></strong><hr/>
										Leave Type: &nbsp <strong><?php echo $recc['leavetype'];?></strong><hr/>
										Effective Date: &nbsp <strong><?php echo $recc['sdate'];?></strong> &nbsp to &nbsp <strong><?php echo $recc['eddate'];?></strong><hr/>
										Total Days Leave: &nbsp <strong><?php echo $recc['nodays'];?></strong> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Days Left: &nbsp <strong><?php echo "$value3";?></strong><hr/> 
						</div>
						<div class="col-md-4 col-md-offset-4">
							<input type = "button" value="Back" data-toggle="tooltip" data-placement="top" title="View Content" class="btn btn-default" onclick="window.history.back()"/></a>
						</div>
					</div>
		</div>
		<?php include('footer.php'); ?>