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
		if (!isset($_SESSION['id'])){
		header('location:login_vp_executive.php');
		}
	?>
<?php
		$id=$_SESSION['id'];
		//mag show sang information sang user nga nag login
		$result=mysql_query("select * from members where id = $id")or die(mysql_error);
		$row=mysql_fetch_array($result);

		$FirstName=$row['FirstName'];
		$LastName=$row['LastName'];
?>
					<?php
						error_reporting(E_ALL & ~E_NOTICE);

						//this will get the data in database		
						$welcome_view = "SELECT * FROM employee, leaves, department, vp_oper, executive
									WHERE employee.emp_id = leaves.emp_id 
									AND employee.id_dept = department.id_dept 
									AND leaves.exe_vp = executive.exe_vp
									AND vp_oper.vp_operation = leaves.vp_operation 
									AND vp_oper.vp_operation = '2' AND executive.exe_vp = '1'
									OR
									employee.emp_id = leaves.emp_id 
									AND employee.id_dept = department.id_dept 
									AND leaves.exe_vp = executive.exe_vp
									AND vp_oper.vp_operation = leaves.vp_operation 
									AND vp_oper.vp_operation = '3' AND executive.exe_vp = '1'";
						
						//i-query yah ang gng basa sang $welcome_view then i pasa yah sa $welcome_viewed
						$welcome_viewed = mysql_query($welcome_view);
						
						//i-basahun yah kung pila ang rows nga na query sa $welcome_viewed
						$num_rows = mysql_num_rows($welcome_viewed);
						
								//then the output kung 1 data lng sa database i-echo yah ang 1st line then kung more than 1 echo yah ang 2nd line
								if($num_rows == 1);
					?>
					<?php
						error_reporting(E_ALL & ~E_NOTICE);

						//this will get the data in database		
						$welcome_view = "SELECT * FROM employee, vacation_log, department, vp_oper, executive
									WHERE employee.emp_id = vacation_log.emp_id AND employee.id_dept = department.id_dept
									AND vp_oper.vp_operation = vacation_log.vp_operation
									AND executive.exe_vp = vacation_log.exe_vp
									AND vp_oper.vp_operation = '2' AND executive.exe_vp = '1'
									OR
									employee.emp_id = vacation_log.emp_id AND employee.id_dept = department.id_dept
									AND vp_oper.vp_operation = vacation_log.vp_operation
									AND executive.exe_vp = vacation_log.exe_vp
									AND vp_oper.vp_operation = '3' AND executive.exe_vp = '1'";
						
						//i-query yah ang gng basa sang $welcome_view then i pasa yah sa $welcome_viewed
						$welcome_viewed = mysql_query($welcome_view);
						
						//i-basahun yah kung pila ang rows nga na query sa $welcome_viewed
						$num_rows2 = mysql_num_rows($welcome_viewed);
						
								//then the output kung 1 data lng sa database i-echo yah ang 1st line then kung more than 1 echo yah ang 2nd line
								if($num_rows2 == 1);
					?>
					<?php
						error_reporting(E_ALL & ~E_NOTICE);

						//this will get the data in database		
						$welcome_view = "SELECT * FROM employee, travel_ordr, vp_oper, executive
											WHERE employee.emp_id = travel_ordr.emp_id AND travel_ordr.vp_operation = vp_oper.vp_operation AND
												travel_ordr.exe_vp = executive.exe_vp AND vp_oper.vp_operation = '2' AND executive.exe_vp = '1'";
						
						//i-query yah ang gng basa sang $welcome_view then i pasa yah sa $welcome_viewed
						$welcome_viewed = mysql_query($welcome_view);
						
						//i-basahun yah kung pila ang rows nga na query sa $welcome_viewed
						$num_rows1 = mysql_num_rows($welcome_viewed);
						
								//then the output kung 1 data lng sa database i-echo yah ang 1st line then kung more than 1 echo yah ang 2nd line
								if($num_rows1 == 1);
								
					?>
				<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				  <div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="#">HR</a>
					</div>
					
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav">
						<li><a href="home.php?id=<?php echo $row['id'];?>">Home<span class="sr-only">(current)</span></a></li>
						<li><a href="emp_list.php?id=<?php echo $row['id'];?>">View Employee</a></li>
						<li><a href="view-emp-pending.php?id=<?php echo $row['id'];?>">Sick Leave <span class="badge"> <?php echo $num_rows ?></span></a></li>
						<li><a href="vl_pending.php?id=<?php echo $row['id'];?>">Vacation Leave <span class="badge"> <?php echo $num_rows2 ?></span></a></li>
						<li><a href="to_view.php?id=<?php echo $row['id'];?>">Travel Order <span class="badge"> <?php echo $num_rows1 ?></span></a></li>
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