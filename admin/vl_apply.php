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
								<h1>Vacation Leave</h1>
						</div>
					</div>
					<div class = "col-md-6">
						<ul class="nav nav-tabs">
						  <li role="presentation" class="active"><a href="vl_apply.php">Ungranted</a></li>
						  <li role="presentation"><a href="vl_credits_granted.php">Granted</a></li>
						</ul>
					</div>
					
				</div>
				<br/>
			<?php 
				require("../conn.php");   // Include the database class
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
					
					$cyyy = strtotime("May 31");
					$cyy = date("m-d", $cyyy);
					
					$csss = strtotime("nextyear");
					$csx = date("Y",$csss);
						
							$sql="SELECT * FROM employee, ldays where 
								NOT EXISTS (SELECT * FROM vacation_credits WHERE date >= '$cyrr-$cyr' 
								AND date <= '$csx-$cyy' AND employee.emp_id = vacation_credits.emp_id) 
								AND employee.id_pos = ldays.id_pos AND ldays.id_pos = '1'";
								$qry=mysql_query($sql);
					
					elseif(($djan <= $tdy)&&($dmay >= $tdy)):
					
					$cyear = strtotime("June 1");
					$cyr = date("m-d",$cyear);
					
					$cyrs = strtotime("lastyear");
					$cyrr = date("Y",$cyrs);
					
					$cmayr = strtotime("May 31");
					$cmr = date("m-d",$cmayr);
					
					$cyrx = strtotime("now");
					$cyx = date("Y",$cyrx);
								
							$sql="SELECT * FROM employee, ldays where 
							NOT EXISTS (SELECT * FROM vacation_credits WHERE date >= '$cyrr-$cyr' 
							AND date <= '$cyx-$cmr' AND employee.emp_id = vacation_credits.emp_id)
							AND employee.id_pos = ldays.id_pos AND ldays.id_pos = '1'";
							$qry=mysql_query($sql);
							
						endif;
						//END FUNCTION
			?>
<div class="container-fluid">
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
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
						<tbody>
							<tr>
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
									<form name="form" enctype="multipart/form-data" method="post" action="vl_apply.php?id=<?php echo $rec['emp_id'];?>" class="form-horizontal">
										<!-- Button (Double) -->
											<div class="form-group">
												<label class="col-md-3 control-label" for="submit"></label>
												<div class="col-md-8">
													<button id="submit" name="submit" class="btn btn-success">Grant Leave</button>
												</div>
											</div>
									</form>								
								</td>
							</tr>
						</tbody>
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
	if (isset($_POST['submit'])){
		 
		$dat = strtotime("now");
		$da = date("Y-m-d",$dat);
		
		 
		$sql = "INSERT INTO vacation_credits
					(`vl_id`,`emp_id`,`credits`,`date`)
						values('','$_GET[id]','15','$da')";
		$qry = mysql_query($sql);
			if ($qry){
				header("Location:vl_credits_granted.php");
				}
			else {
				echo "not posted!";
				}
	}
?>
		<?php
			include ('footer.php');
		?>