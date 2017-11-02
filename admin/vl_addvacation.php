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
		if (($_POST['sdate'] == '')or($_POST['eddate'] == ''))
		{
			echo "You must fill those fields";
		}	
	else{ //dri namn is ang mga "name=stu_id" nga ara sa mga input type. 
		
		$b = addslashes("$_POST[leavetype]");
		$a = addslashes("$_POST[sdate]");
		$g = addslashes("$_POST[eddate]");
		
		$c = strtotime("$_POST[sdate]");
		$d = strtotime("$_POST[eddate]");
		$dat = strtotime("now");
		$da = date("Y-m-d",$dat);
		
		$output = ($d-$c) / 86400;
		
			$sql="select SUM(credits) AS cred From vacation_credits where emp_id = '$_GET[id]'";
			$qry1 = mysql_query($sql);
			$rec = mysql_fetch_array($qry1);
			$value1 = $rec ['cred'];
			
			$sql="select SUM(nodays) AS nod1 From vacation_log where emp_id = '$_GET[id]'";
			$qry2 = mysql_query($sql);
			$rec = mysql_fetch_array($qry2);
			$value2 = $rec ['nod1'];
			
			$value3 = $value1 - $value2;
			$value4 = $value3 - $output;
			

				if($value4 >= 0){
					$insert = "INSERT INTO vacation_log
									(`v_id`,`emp_id`,`vdate`,`leavetype`,`sdate`,`eddate`,`nodays`,`hr_approve`,`prog_head`,`vp_operation`,`exe_vp`)
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
												<p><strong>Success!</strong> Vacation Leave added!
												&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
												<a href="vl_pending.php"><button type="button" class="btn btn-success">Continue</button></a>
												</p>
											</div>
										</div>
									</div>
							</div>';
						}
					else
						echo "Not Posted";
				}else
			if($value4 < 0){
				echo '<div class="container-fluid">
									<div class="row">
										<div class="col-md-4 col-md-offset-4">
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
													×</button>
											   <span class="glyphicon glyphicon-remove"></span> <strong>Warning!</strong>
												<hr class="message-inner-separator">
												<p><strong>Notice:</strong> You have only '.$value3.' day(s) left</p>
											</div>
										</div>
									</div>
						</div>';
					}
		}
	}
?>
<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading">Vacation Leave</div>
		<div class="panel-body">
					<h1 class="text-center">Vacation Leave Form</h1>
			<br/>
	<form method="POST" class="form-horizontal">
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="edate">Leave Type</label>  
			  <div class="col-md-4">
			  <input id="leavetype" name="leavetype" type="type" value="Vacation Leave" class="form-control input-md" readonly>
				
			  </div>
			</div>
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="sdate">Effective Date</label>  
			  <div class="col-md-4">
			  <input id="sdate" name="sdate" type="date" placeholder="Date Start" class="form-control input-md" required="">
				
			  </div>
			</div>
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="eddate">Due Date</label>  
			  <div class="col-md-4">
			  <input id="eddate" name="eddate" type="date" placeholder="Date End" class="form-control input-md" required="">
				
			  </div>
			</div>
						

			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="submit"></label>
			  <div class="col-md-6">
				<button id="submit" name="submit" class="btn btn-success">Submit Leave</button>
				<a href="vl_add.php"><input type="button" value="Cancel" class="btn btn-default"></a>
			  </div>
			</div>
	</form>
		</div>
	</div>
</div>
		</div>
		<?php include('footer.php'); ?>