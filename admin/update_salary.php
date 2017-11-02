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
		 
		if (($_POST['ammount'] == '')or($_POST['pay'] == ''))
		{
			echo "You must fill those fields";
		}	
	else{  
		
		$amm = addslashes("$_POST[ammount]");
		$pay = addslashes("$_POST[pay]");
		 
	 
	 
					
			$sql="UPDATE employee SET salary_status='$_POST[pay]',pay='$_POST[ammount]'  where emp_id = '$_GET[id]' ";
			$qry = mysql_query($sql);
			 
			 
					if ($qry){
						echo '<div class="container-fluid">
								<div class="row">
									<div class="col-md-4 col-md-offset-4">
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
												×</button>
										   <span class="glyphicon glyphicon-ok"></span> <strong>Done!</strong>
											<hr class="message-inner-separator">
											<p><strong>Success</strong> Salary Update!
											&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
											<a href="salary.php"><button type="button" class="btn btn-success">Continue</button></a>
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
					 
	 
	}
?>
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-default">
  <div class="panel-heading">Salary Details</div>
	<div class="panel-body">
					<h1 class="text-center">Update Salary Status</h1>
			<br/>
	<form method="POST" class="form-horizontal">
			<!-- Text input-->
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="ammount">Paid Ammount</label>  
			  <div class="col-md-4">
			  <input id="ammount" name="ammount" type="text" placeholder="Paid Ammount" class="form-control input-md" required="">
				
			  </div>
			</div>
			
			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="salary_stat">Salary Status</label>  
			  <div class="col-md-4">
			   
								<select id="pay" name="pay" class="form-control">
								  <option>Paid</option>
								  <option>Unpaid</option>
								   
								</select>
				 
				
			  </div>
			</div>
						

			<!-- Button -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="submit"></label>
			  <div class="col-md-6">
				<button id="submit" name="submit" class="btn btn-success">Update</button>
				 <a href="salary.php"><input type="button" value="Cancel" class="btn btn-default"></a>
			  </div>
			 
			</div>
	</form>
	</div>
</div>
</div>
</div>
		<?php include('footer.php'); ?>
