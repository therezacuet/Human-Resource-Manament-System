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
		<style>
			.borderless tbody tr td, .borderless thead tr th {
			border: none;
			}
		</style>
		</style>
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
		if (($_POST['start_date'] == '')or($_POST['end_date'] == '') )
		{
			echo "You must fill those fields";
		}	
	else{ //dri namn is ang mga "name=stu_id" nga ara sa mga input type.
		$z = addslashes("$_POST[start_date]");
		$zz = addslashes("$_POST[end_date]");
		$dat = strtotime("now");
		$da = date("Y-m-d",$dat);
		
		$kk = date($z);
		$nd = strtotime ('+'.$zz.'month',strtotime($kk));
		$nd = date ('Y-m-d',$nd );
		
		$sqll = "SELECT * FROM contract, employee WHERE id_cont IN(SELECT MAX(id_cont) FROM contract GROUP BY emp_id)AND cont_stat != '1' AND emp_id = '$_GET[id]'";
		$qryy = mysql_query($sqll);
		$recc = mysql_fetch_array($qryy);

		if($recc == 0){
		//ma insert nah cia sa database
		$sql = "INSERT INTO contract
					(`id_cont`,`emp_id`,`start_date`,`end_date`,`cont_date`,`cont_stat`)
						values('','$_GET[id]','$z','$nd','$da','1')";
		$qry = mysql_query($sql);
			if ($qry){
				header("location:emp_provi.php");
				}
			else {
				echo "not posted!";
				}
		}
		else{
		echo " There is still on going contract ";
		}	
		}
	}
?>
<div class="row" style = "margin-top:30px">
	<div class = "col-md-6 col-md-offset-3">
		<div class="panel panel-default">
		  <div class="panel-heading">
			<h3 class="panel-title">Contract Information</h3>
		  </div>
				<div class="panel-body">
				<table class = "table borderless">
					<?php
						$sql="SELECT * FROM employee WHERE emp_id='$_GET[id]'";
						$qry=mysql_query($sql);
						$rw=mysql_fetch_array($qry)
					?>
					<tr>
						<td>
							<a href = "contract.htm"><input type="button" class="btn btn-info" value="Contact Agreement"></a>
						</td>
					</tr>
					<tr>
						<td>
							<strong>Name</strong>
						</td>
						<td>
							<?php echo $rw['emp_fname']?>
						</td>
						<td>
							<?php echo $rw['emp_lname']?>
						</td>
					</tr>
					
					<?php
						$sql="SELECT * FROM contract WHERE id_cont IN(SELECT MAX(id_cont) FROM contract GROUP BY emp_id) AND emp_id = '$_GET[id]'";
						$qry=mysql_query($sql);
					?>
						
					<?php
						while($row=mysql_fetch_array($qry))
						{
					?>	

							<tr>
								<td>
									<strong>Previous Contract</strong>
								</td>
								<td>
									<strong><?php echo $row['start_date']?></strong>
								</td>
								<td>
									<strong><?php echo $row['end_date']?></strong>
								</td>
							</tr>
						
					<?php } ?>
				</table>
						<form enctype="multipart/form-data" method="post" class="form-horizontal">
							<br>
							<h3>Current Contract</h3>
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="start_date">Date Hired:</label>  
							  <div class="col-md-5">
							  <input id="start_date" name="start_date" type="date" class="form-control input-md">
							  </div>
							
							</div>
							<!-- Select Basic -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="end_date">Contract End:</label>
							  <div class="col-md-5">
								<select id="end_date" name="end_date" class="form-control">
								  <option>Months</option>
								  <option>3</option>
								  <option>6</option>
								  <option>12</option>
								</select>
							  </div>
							</div>
				
							<div class="form-group">
							  <label class="col-md-6 control-label" for="submit"></label>
							  <div class="col-md-4">
								<button id="submit" name="submit" class="btn btn-primary">Submit</button>
								<a href = "emp_provi.php"><input type="button" class="btn btn-default" value="Cancel"></a>
							  </div>
							</div>
						</form>
				</div>
		</div>
	</div>
</div>
	</div>	<!--close div of container-->
	<?php include('footer.php'); ?>