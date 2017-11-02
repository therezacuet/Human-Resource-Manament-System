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
		<div id="dvContents">
			<div class="row">
				<div class="col-md-6 col-md-offset-4" style="margin-top:-30px;">
					<img src="southland1.png" alt="SOUTHLAND" class="img-rounded">
				</div>
			
				<div class="col-md-4 col-md-offset-5">
					<h1>Travel Order</h1>
				</div>
			</div>
			<?php include("background_print.php");?>
				<?php
				require ("../conn.php");   // Include the database class
					$select = "SELECT * FROM travel_ordr, employee
									WHERE travel_ordr.emp_id = employee.emp_id AND travel_ordr.to_id='$_GET[id]'";
					$qry=mysql_query($select);
				?>
				<?php
					while($rec = mysql_fetch_array($qry))
					{
				?>
					<div class="col-md-12" style="margin-top:40px">
						<div class="col-md-6 col-md-offset-3">
								<div class="panel panel-default">
									<div class="panel-body">
										Date Apply: &nbsp <strong><?php echo $rec['date'];?></strong><hr/>
										Employee ID: &nbsp <strong><?php echo $rec['id_emp'];?></strong><hr/>
										Full Name: &nbsp <strong><?php echo $rec['emp_fname'];?> <style="margin-left: 20px;"/><?php echo $rec['emp_lname'];?><style="margin-left: 20px;"/> <?php echo $rec['emp_mname'];?></strong> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Designation: &nbsp <strong><?php echo $rec['emp_pos'];?></strong><hr/>
										Venue: &nbsp <strong><?php echo $rec['to_venue'];?></strong><hr/>
										Host: &nbsp <strong><?php echo $rec['to_host'];?></strong> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Activity: &nbsp <strong><?php echo $rec['to_activ']; ?></strong><hr/>
										

								<div class="panel panel-success">
									<div class="panel-heading">ITINERARY OF TRAVEL</div>
										<div class="panel-body">
										Departure: &nbsp <strong><?php echo $rec['to_etd']; ?></strong>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Arrival: &nbsp <strong><?php echo $rec['to_eta']; ?></strong><hr/>
										Transportation: &nbsp <strong><?php echo $rec['to_trans']; ?></strong><hr/>
										Registration: &nbsp <strong><?php echo $rec['to_regis']; ?></strong><hr/>
										Board and Lodging: &nbsp <strong><?php echo $rec['to_bal']; ?></strong><hr/>
										Total: &nbsp <strong><?php echo $rec['to_total']; ?></strong>
										</div>
								</div>
									</div>
								</div>
					<div class="col-md-4">
						<input type="button" value="Back" name="cancel" 
							onclick="history.back()" class="btn btn-default"/>
					</div>
						</div>
					</div>
				<?php
					}
				?>
		</div>
	</div>
		
		<br>
	<?php include('footer.php');?>