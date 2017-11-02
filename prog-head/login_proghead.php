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
  
	<style>
			body {
			margin-top: 50px;
			margin-bottom: 50px;
			
		  background: url('../background.jpg') no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
		}
		.panel-default {
		opacity: .9;
		margin-top:30px;
		}
		.form-group.last { margin-bottom:0px; }

		hr.message-inner-separator
		{
			clear: both;
			margin-top: 10px;
			margin-bottom: 13px;
			border: 0;
			height: 1px;
			background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
			background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
			background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
			background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
		}
	</style>
  </head>
  <body>
<div class="container-fluid">
	<?php include("../drop.php");?>
		<?php
			include('../conn.php');//para sa connection sang database
			if (isset($_POST['submit'])) {//condition kun e click ang button
			$UserName=$_POST['depart_name'];//variable ang $Username kag ang $_POST['UserName'] ay value sang textbox nga UserName
			$Password=$_POST['emp_id'];//variable ang $Username kag ang $_POST['Password'] ay value sang textbox nga Password
			$result=mysql_query("select * from department,employee where department.emp_id AND employee.emp_id AND department.depart_name='$UserName' and employee.id_emp='$Password'")or die (mysql_error());//query sang database 
		
			$count=mysql_num_rows($result);//isipon kn may tyakto sa query
			$row=mysql_fetch_array($result);//ma return row sa database
		
			if ($count > 0){//kun may tyakto sa query e execute yah ang code sa dalom
			session_start();//para mag start ang session
			$_SESSION['id']=$row['id_dept'];//kwaon ang id sang may tyakto nga username kag password ang ibotang sa $_SESSION['member_id']
			header('location:home.php?id='.$row['id_dept'].'');
			mysql_query("insert into user_log (username,login_date,id)values('$username',NOW(),".$row['id'].")")or die(mysql_error());
			}
			else
			{
			echo'<div class="container-fluid">
					<div class="row">
							<div class="col-md-4 col-md-offset-1" style="position:absolute; top:50px; left:30px">
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
										×</button>
								   <span class="glyphicon glyphicon-remove"></span> <strong>Warning!</strong>
									<hr class="message-inner-separator">
									<p><strong>Invalid</strong> Username or Password! Please Try again.</p>
								</div>
							</div>
					</div>
				</div>';
				
			}
	}
?>
	<div class="container">
		<div class="row">
			<div class="col-md-6" style = "margin-top:110px;">
				<div class="panel panel-default">
				   <div class="page-header">
					  <h1 style = "margin-left:50px;">Deparment Head <small>Login</small></h1>
					</div>
					<div class="panel-body">
						<form method="post" class="form-horizontal" role="form">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-1 control-label"></label>
								<div class="col-sm-10">
									<input type="text" id="depart_name" name="depart_name" data-toggle="tooltip" data-placement="right" title="Department Name" class="form-control" placeholder="Username" required>
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-1 control-label"></label>
								<div class="col-sm-10">
									<input type="password" id="emp_id" name="emp_id" data-toggle="tooltip" data-placement="right" title="Employee ID" class="form-control" placeholder="Password" required>
								</div>
							</div>
							
							<div class="form-group last">
								<div class="col-sm-offset-1 col-sm-9">
									<button type="submit" id="submit" name="submit" class="btn btn-success">Sign in</button>
								</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript">
				$(function () {
				$('[data-toggle="tooltip"]').tooltip()
				})
		</script>
  </body>
</html>