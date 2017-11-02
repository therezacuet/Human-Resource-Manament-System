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
<?php include("background_print.php")?>
  </head>
  <body>
<?php
include('../conn.php');
$select="select * from department";
$id=mysql_query($select);
$rec=mysql_fetch_array($id);

mysql_query("UPDATE travel_ordr SET acctant='3' where to_id='$_GET[id]'");
echo'<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
							×</button>
					   <span class="glyphicon glyphicon-remove"></span> <strong>Done!</strong>
						<hr class="message-inner-separator">
						<p><strong> Travel Order Denied!</strong></p><br>
						<div class="col-md-offset-9">
							<a href="to_approval_deny.php?id='.$rec['id_dept'].'"><button type="button" class="btn btn-danger">Continue</button></a>
						</div>
					</div>
			</div>
		</div>
	</div>';
?>