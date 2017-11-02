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
	if (isset($_POST['submit'])){
		//dri mah vl.an kung mai onud ang txtbox then ang mga "category or stu_id is  name sa entity sa database
		if (($_POST['edate'] == '')or($_POST['endate'] == ''))
		{
			echo "You must fill those fields";
		}	
	else{ //dri namn is ang mga "name=stu_id" nga ara sa mga input type. 
		
		$b = addslashes("$_POST[leavetype]");
		$a = addslashes("$_POST[edate]");
		$g = addslashes("$_POST[endate]");
		$c = strtotime("$_POST[edate]");
		$d = strtotime("$_POST[endate]");
		$dat = strtotime("now");
		$da = date("Y-m-d",$dat);
		
		$output = ($d-$c) / 86400;
		
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
					
			$sql="select SUM(no_days) AS nod From leaves where emp_id = '$_GET[id]' AND date >= '$cyrr-$cyr' AND date <= '$cya' ";
			$qry = mysql_query($sql);
			$rec = mysql_fetch_array($qry);
			$value=$rec ['nod'];
			
				if($value <= 15){
				$getval=$output+$value;
					if($getval <= 15){
						$insert = "INSERT INTO leaves
									(`leaveid`,`emp_id`,`date`,`leavetype`,`edate`,`endate`,`no_days`,`hr_approve`,`prog_head`,`vp_operation`,`exe_vp`)
										values('','$_GET[id]','$da','$b','$a','$g','$output','1','1','1','1')";
					$qry = mysql_query($insert);
					if ($qry){
						echo '<div class="container-fluid">
								<div class="row">
									<div class="col-md-4 col-md-offset-4">
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
												×</button>
										   <span class="glyphicon glyphicon-ok"></span> <strong>Done!</strong>
											<hr class="message-inner-separator">
											<p><strong>Success</strong> Sick Leave added!
											&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
											<a href="view-emp-pending.php"><button type="button" class="btn btn-success">Continue</button></a>
											</p>
										</div>
									</div>
								</div>
							</div>';
						}
						else {
							echo '<div class="container-fluid">
									<div class="row">
										<div class="col-md-4 col-md-offset-4">
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
													×</button>
											   <span class="glyphicon glyphicon-ok"></span> <strong>Warning!</strong>
												<hr class="message-inner-separator">
												<p><strong>Error!</strong> Not Posted!</p>
											</div>
										</div>
									</div>
								</div>';
							 }
					}
					else
						echo '<div class="container-fluid">
									<div class="row">
										<div class="col-md-4 col-md-offset-4">
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
													×</button>
											   <span class="glyphicon glyphicon-remove"></span> <strong>Warning!</strong>
												<hr class="message-inner-separator">
												<p><strong>Error!</strong> Not Enough Credits!</p>
											</div>
										</div>
									</div>
							</div>';
				}
				else
					echo '<div class="container-fluid">
									<div class="row">
										<div class="col-md-4 col-md-offset-4">
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
													×</button>
											   <span class="glyphicon glyphicon-ok"></span> <strong>Warning!</strong>
												<hr class="message-inner-separator">
												<p><strong>Error!</strong> No More Credits Left!</p>
											</div>
										</div>
									</div>
							</div>';
					
					
				elseif(($djan <= $tdy)&&($dmay >= $tdy)):
					
					$cyear = strtotime("June 1");
					$cyr = date("m-d",$cyear);
					
					$cyrs = strtotime("lastyear");
					$cyrr = date("Y",$cyrs);
					
					$cyaa = strtotime("now");
					$cya = date("Y-m-d",$cyaa);
				
			$sql="select SUM(no_days) AS nod From leaves where emp_id = '$_GET[id]' AND date >= '$cyrr-$cyr' AND date <= '$cya'";
			$qry = mysql_query($sql);
			$rec = mysql_fetch_array($qry);
			$value=$rec ['nod'];
			
				if($value <= 15){
				$getval=$output+$value;
					if($getval <= 15){
						$insert = "INSERT INTO leaves
									(`leaveid`,`emp_id`,`date`,`leavetype`,`edate`,`endate`,`no_days`,`hr_approve`,`prog_head`,`vp_operation`,`exe_vp`)
										values('','$_GET[id]','$da','$b','$a','$g','$output','1','1','1','1')";
					$qry = mysql_query($insert);
					if ($qry){
						echo '<div class="container-fluid">
								<div class="row">
									<div class="col-md-4 col-md-offset-4">
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
												×</button>
										   <span class="glyphicon glyphicon-ok"></span> <strong>Done!</strong>
											<hr class="message-inner-separator">
											<p><strong>Success!</strong> Sick Leave added!
											&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
											<a href="view-emp-pending.php"><button type="button" class="btn btn-success">Continue</button></a>
											</p>
										</div>
									</div>
								</div>
							</div>';
						}
						else {
							echo '<div class="container-fluid">
									<div class="row">
										<div class="col-md-4 col-md-offset-4">
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
													×</button>
											   <span class="glyphicon glyphicon-remove"></span> <strong>Warning</strong>
												<hr class="message-inner-separator">
												<p><strong>Error!</strong> Not Posted!</p>
											</div>
										</div>
									</div>
							</div>';
							 }
					}
					else
						echo'<div class="container-fluid">
									<div class="row">
										<div class="col-md-4 col-md-offset-4">
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
													×</button>
											   <span class="glyphicon glyphicon-remove"></span> <strong>Warning!</strong>
												<hr class="message-inner-separator">
												<p><strong>Error!</strong> Not Enough Credits!</p>
											</div>
										</div>
									</div>
							</div>';
				}
				else
					echo'<div class="container-fluid">
									<div class="row">
										<div class="col-md-4 col-md-offset-4">
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
													×</button>
											   <span class="glyphicon glyphicon-remove"></span> <strong>Warning!</strong>
												<hr class="message-inner-separator">
												<p><strong>Error!</strong> No more Credits left!</p>
											</div>
										</div>
									</div>
							</div>';
				
				else: echo "No Month";
				endif;
		//END FUNCTION
		}
	}
?>
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-default">
  <div class="panel-heading">Sick Leave</div>
	<div class="panel-body">
					<h1 class="text-center">Sick Leave Form</h1>
			<br/>
	<form method="POST" class="form-horizontal">
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="edate">Leave Type</label>  
			  <div class="col-md-4">
			  <input id="leavetype" name="leavetype" type="type" value="Sick Leave" class="form-control input-md" readonly>
				
			  </div>
			</div>
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="edate">Effective Date</label>  
			  <div class="col-md-4">
			  <input id="edate" name="edate" type="date" placeholder="Date Start" class="form-control input-md" required="">
				
			  </div>
			</div>
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="endate">Due Date</label>  
			  <div class="col-md-4">
			  <input id="endate" name="endate" type="date" placeholder="Date End" class="form-control input-md" required="">
				
			  </div>
			</div>
						

			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="submit"></label>
			  <div class="col-md-6">
				<button id="submit" name="submit" class="btn btn-success">Submit Leave</button>
				 <a href="apply_approve.php"><input type="button" value="Cancel" class="btn btn-default"></a>
			  </div>
			 
			</div>
	</form>
	</div>
</div>
</div>
</div>
		<?php include('footer.php'); ?>
