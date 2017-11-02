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
			<div class="col-md-6 col-md-offset-3">
				<div class = "row">
					<div class="col-md-12">
						<div class="page-header">
								<h1>Sick Leave</h1>
						</div>
					</div>
				</div>
				<br/>
						<?php 
						require("../conn.php");   // Include the database class
						?>
						<?php
						//INITIALIZE DATE RANGE Start
				$nw = strtotime("now");
				$tdy = date("m-d",$nw);
				
				$mjune = strtotime("june 1");
				$djune = date("m-d",$mjune);
				
				$mdec = strtotime("December 31");
				$ddec = date("m-d",$mdec);
				
				$mjan = strtotime("January 1");
				$djan = date("m-d",$mjan);
				
				$mmay = strtotime("May 31");
				$dmay = date("m-d",$mmay);
			//INITIALIZE DATE RANGE End
			
			//START FUNCTION
				if(($djune <= $tdy)&&($ddec >= $tdy)):
					$cyear = strtotime("June 1");
					$cyr = date("m-d",$cyear);
					
					$cyrs = strtotime("now");
					$cyrr = date("Y",$cyrs);
					
					$cyaa = strtotime("now");
					$cya = date("Y-m-d",$cyaa);
					
							$sql="SELECT *,SUM(no_days)AS nod FROM employee, ldays, leaves, executive
								where employee.emp_id = leaves.emp_id 
								AND employee.id_pos = ldays.id_pos
								AND executive.exe_vp = leaves.exe_vp
								AND executive.exe_vp = '2'
								AND employee.emp_id = '$_GET[id]'";
							$qry=mysql_query($sql);
							$rec=mysql_fetch_array($qry);
							
							$value = $rec['nod'];
							$get = $rec['adays'];
							
							$getval = $get - $value;
							
					elseif(($djan <= $tdy)&&($dmay >= $tdy)):
					
					$cyear = strtotime("June 1");
					$cyr = date("m-d",$cyear);
					
					$cyrs = strtotime("lastyear");
					$cyrr = date("Y",$cyrs);
					
					$cyaa = strtotime("now");
					$cya = date("Y-m-d",$cyaa);
					
							$sql="SELECT *,SUM(no_days)AS nod FROM employee, ldays, leaves, executive
								where employee.emp_id = leaves.emp_id 
								AND employee.id_pos = ldays.id_pos
								AND executive.exe_vp = leaves.exe_vp
								AND executive.exe_vp = '2'
								AND employee.emp_id = '$_GET[id]'";
							$qry=mysql_query($sql);
							$rec=mysql_fetch_array($qry);
							
							$value = $rec['nod'];
							$get = $rec['adays'];
							
							$getval = $get - $value;
					endif;
			?>
							<div class="panel panel-success">
							  <div class="panel-heading">
								<h3 class="panel-title">Information</h3>
							  </div>
							  <div class="panel-body">
									ID: <strong><?php echo $rec['id_emp']; ?></strong><hr/>
								
									Name: <strong><?php echo $rec['emp_fname']; ?> <?php echo $rec['emp_lname']; ?></strong> <hr/>
								
									Days Left: <strong><?php echo $getval; ?></strong><hr/>
							  </div>
							</div>
					
					<div class = "col-md-4">
							<input type="button" value="Back" name="cancel" 
							onclick="history.back()" class="btn btn-default"/>
					</div>
			</div>
	</div>
	<script>
		$(function () {
		$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
		<?php
			include ('footer.php');
		?>