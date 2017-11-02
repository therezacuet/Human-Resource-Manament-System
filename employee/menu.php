<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Employee</title>
		<link rel="shortcut icon" href="../hrlogo.png">
		<!-- Bootstrap -->
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<style>
			body {
			margin-top: 50px;
			margin-bottom: 50px;
			
		  background: url('../background2.jpg') no-repeat center center fixed; 
		  -webkit-background-size: cover;
		  -moz-background-size: cover;
		  -o-background-size: cover;
		  background-size: cover;
			}
			.navbar-default{
			opacity: .8;
			}
			.dropdown:hover .dropdown-menu {
		display: block;
		}
		.panel-default{
		opacity: .9;
		}
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
<!--welcome user in menu-->
	<?php
		require("../conn.php");   // Include the database class
		session_start();
		if (!isset($_SESSION['emp_id'])){
		header('location:login_emp.php');
		}
	?>
<?php
		//mag show sang information sang user nga nag login
		$id=$_SESSION['emp_id'];

		$result=mysql_query("select * from employee where emp_id='$id'")or die(mysql_error);
		$row=mysql_fetch_array($result);

		$FirstName=$row['emp_fname'];
		$LastName=$row['emp_lname'];
?>
				<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-slide-dropdown">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="#">HR</a>
					</div>
					
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-slide-dropdown">
					  <ul class="nav navbar-nav">
						<li><a href="home.php?id=<?php echo $row['emp_id'];?>">Home<span class="sr-only">(current)</span></a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Sick Leave <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="leaves.php?id=<?php echo $row['emp_id'];?>"> File Sick Leave </a></li>
									<li><a href="leave_track.php?id=<?php echo $row['emp_id'];?>"> Sick Leave Status</a></li>
									<li><a href="sl_daysleft.php?id=<?php echo $row['emp_id'];?>"> Days Left</a></li>
								</ul>
						</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Vacation Leave <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="vl_addvacation.php?id=<?php echo $row['emp_id'];?>"> File Vacation Leave </a></li>
									<li><a href="vl_leave_track.php?id=<?php echo $row['emp_id'];?>"> Vacation Leave Status</a></li>
									<li><a href="vl_daysleft.php?id=<?php echo $row['emp_id'];?>"> Days Left</a></li>
								</ul>
						</li>
						
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> Travel Order <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="to_add.php?id=<?php echo $row['emp_id'];?>"> File Travel Order </a></li>
									<li><a href="to_leave_track.php?id=<?php echo $row['emp_id'];?>"> Travel Order Status</a></li>
								</ul>
						</li>
						 
					   <li><a href="emp_profile.php?id=<?php echo $row['emp_id'];?>"> Profile </a></li>
						 
					  </ul>
					<ul class="nav navbar-nav navbar-right">
						<!-- Brand and toggle get grouped for better mobile display -->
						<p class="navbar-text">Welcome! <strong><?php echo " ".$FirstName."&nbsp".$LastName." "; ?></strong></p>
						
						
						<li><p class="navbar-text"><a href="logout.php" class="navbar-link" data-toggle="tooltip" data-placement="bottom" title="Log Out">Logout</a></p></li>
					</ul>
					
					</div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
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