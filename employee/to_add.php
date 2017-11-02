<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HR</title>
	
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
<div class="container-fluid">
<?php include("background_print.php");?>
<?php 
	include("../conn.php");
?>
<?php
	if (isset($_POST['submit'])){
		//dri mah vl.an kung mai onud ang txtbox then ang mga "category or stu_id is  name sa entity sa database
		if (($_POST['to_venue'] == '')or($_POST['to_host'] == ''))
		{
			echo "You must fill those fields";
		}	
	else{ //dri namn is ang mga "name=stu_id" nga ara sa mga input type. 
		$b = addslashes("$_POST[to_venue]");
		$c = addslashes("$_POST[to_host]");
		$i = addslashes("$_POST[to_activ]");
		$d = addslashes("$_POST[to_etd]");
		$e = addslashes("$_POST[to_eta]");
		$f = addslashes("$_POST[to_trans]");
		$g = addslashes("$_POST[to_regis]");
		$h = addslashes("$_POST[to_bal]");
		$j = addslashes("$_POST[to_total]");
		$dat = strtotime("now");
		$da = date("Y-m-d",$dat);
		
		$add = $f + $g + $h;
		
		//ma insert nah cia sa database
		$sql = "INSERT INTO travel_ordr
					(`to_id`,`emp_id`,`date`,`to_venue`,`to_host`,`to_activ`,`to_etd`,`to_eta`,`to_trans`,`to_regis`,`to_bal`,`to_total`,`acctant`,`prog_head`,`vp_finance`,`vp_acad`,`vp_operation`,`exe_vp`)
						values('','$_GET[id]','$da','$b','$c','$i','$d','$e','$f','$g','$h','$add','1','1','1','1','1','1')";
		$qry = mysql_query($sql);
			if ($qry){
				echo '<div style="position:absolute; left:470px; top:200px; width: 400px">
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
										×</button>
								   <span class="glyphicon glyphicon-ok"></span> <strong>Done!</strong>
									<hr class="message-inner-separator">
									<p><strong>Success!</strong> Travel Order added! 
									<div class="col-md-offset-9">
										<a href="to_leave_track.php"><button type="button" class="btn btn-success">Continue</button></a>
									</div>
									</p>
								</div>
							</div>';
						exit();
				}
			else {
				echo "not posted!";
				}
		}
	}
?>
	<div class="row">
			
				<div class="col-md-6 col-md-offset-4">
						
								<h1 style = "margin-left:80px">Travel Order Form</h1>
				</div>
			<br>
		<div class="col-md-12">
				<script type="text/javascript">
					<!--
					function updatesum() {
					document.form.to_total.value = (document.form.to_trans.value -0) + (document.form.to_regis.value -0) + (document.form.to_bal.value -0);
					}
					//-->
				</script>
					<form name="form" enctype="multipart/form-data" method="post" class="form-horizontal">
							<fieldset>
							<!-- Textarea -->
							<div class="form-group">
							  <label class="col-md-3 control-label" for="to_venue">Venue</label>
							  <div class="col-md-4">                     
								<textarea class="form-control" id="to_venue" name="to_venue" placeholder = "Venue"></textarea>
							  </div>
							</div>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-3 control-label" for="to_host">Host</label>  
							  <div class="col-md-3">
							  <input id="to_host" name="to_host" type="text" placeholder="Host" class="form-control input-md" required="">
							  </div>
						
							  <label class="col-md-1 control-label" for="to_activ">Activity</label>  
							  <div class="col-md-3">
							  <input id="to_activ" name="to_activ" type="text" placeholder="Activity" class="form-control input-md" required="">
								
							  </div>
							</div>
			<div class = "col-md-8 col-md-offset-2">		  
				<div class="panel panel-default">
					<div class="panel-heading">ITINERARY OF TRAVEL</div>
						<div class="panel-body">
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-3 control-label" for="to_etd">Time Departure</label>  
							  <div class="col-md-3">
							  <input id="to_etd" name="to_etd" type="date" placeholder="Estimated Time Departure" class="form-control input-md">
							  </div>
							  
							  <label class="col-md-2 control-label" for="to_eta">Time Arrival</label>  
							  <div class="col-md-3">
							  <input id="to_eta" name="to_eta" type="date" placeholder="Estimated Time Arrival" class="form-control input-md" required="">
								
							  </div>
							</div>
							
								<div class = "col-md-9 col-md-offset-4">
									<h4>Expenses</h4>
								</div>
							<!-- Text input-->
							
							<div class="form-group">
							  <label class="col-md-4 control-label" for="to_trans">Transportation</label>  
							  <div class="col-md-3">
							  <input id="to_trans" name="to_trans" onChange="updatesum()" type="text" placeholder="Transportation" class="form-control input-md">
							
							  </div>
							</div>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="to_regis">Registration</label>  
							  <div class="col-md-3">
							  <input id="to_regis" name="to_regis" type="text" onChange="updatesum()" placeholder="Registration" class="form-control input-md">
							
							  </div>
							</div>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="to_bal">Board and Lodging</label>
							  <div class="col-md-3">
							  <input id="to_bal" name="to_bal" type="text" onChange="updatesum()" placeholder="Board and Lodging" class="form-control input-md">
								
							  </div>
							</div>
							
							<!-- Text input-->
							<div class="form-group">
							  
							  <label class="col-md-4 control-label" for="to_total">Total</label>  
							  <div class="col-md-3">
							  <input id="to_total" name="to_total" readonly class="form-control input-md">
								
							  </div>
							</div>
						</div>
				</div>
			</div>

							<!-- Button (Double) -->
							<div class="form-group">
							  <label class="col-md-3 control-label" for="submit"></label>
							  <div class="col-md-8">
								<button id="submit" name="submit" class="btn btn-success">Submit</button>
								<a href="home.php"><input type="button" value="Cancel" class="btn btn-default"></a>
							  </div>
							</div>

							</fieldset>
					</form>
		</div>
		</div>
	</div>	<!--close div of container-->
	<?php include('footer.php');?>
	