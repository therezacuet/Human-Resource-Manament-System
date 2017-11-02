<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="../hrlogo.png">	
		<title>Program Head</title>
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
		if (!isset($_SESSION['id'])){
		header('location:login_proghead.php');
		}
	?>
<?php
		//mag show sang information sang user nga nag login
		$id=$_SESSION['id'];

		$result=mysql_query("select * from department, employee where department.emp_id = employee.emp_id AND department.id_dept='$id'")or die(mysql_error);
		$row=mysql_fetch_array($result);

		$name=$row['emp_fname'];
		$name2=$row['emp_lname'];
		$name3=$row['depart_name'];
?>
					<?php
						error_reporting(E_ALL & ~E_NOTICE);

						//this will get the data in database		
						$welcome_view = "SELECT * FROM employee, leaves, department, program_head, approve_hr
									WHERE employee.emp_id = leaves.emp_id
									AND employee.id_dept = department.id_dept 
									AND program_head.prog_head = leaves.prog_head
									AND approve_hr.hr_approve = leaves.hr_approve 
									AND approve_hr.hr_approve = '2' 
									AND program_head.prog_head = '1' 
									AND department.id_dept = '$_GET[id]'";
						
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
						$welcome_view = "SELECT * FROM employee, vacation_log, department, approve_hr, program_head
									WHERE employee.emp_id = vacation_log.emp_id AND employee.id_dept = department.id_dept 
									AND approve_hr.hr_approve = vacation_log.hr_approve
									AND program_head.prog_head = vacation_log.prog_head
									AND approve_hr.hr_approve = '2' AND program_head.prog_head = '1'
									AND department.id_dept = '$_GET[id]'";
						
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
						$welcome_view = "SELECT * FROM employee, department, travel_ordr, accounting, program_head
									WHERE employee.emp_id = travel_ordr.emp_id 
										AND employee.id_dept = department.id_dept
										AND travel_ordr.acctant = accounting.acctant 
										AND travel_ordr.prog_head = program_head.prog_head 
										AND accounting.acctant = '2' 
										AND program_head.prog_head = '1'
										AND department.id_dept = '$_GET[id]'";
						
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
						<li><a href="home.php?id=<?php echo $row['id_dept'];?>">Home<span class="sr-only">(current)</span></a></li>
						<li><a href="view-emp-pending.php?id=<?php echo $row['id_dept'];?>">Sick Leave <span class="badge"> <?php echo $num_rows ?></span></a></li>
						<li><a href="vl_pending.php?id=<?php echo $row['id_dept'];?>">Vacation Leave <span class="badge"> <?php echo $num_rows2 ?></span></a></li>
						<li><a href="to_view.php?id=<?php echo $row['id_dept'];?>">Travel Order <span class="badge"> <?php echo $num_rows1 ?></span></a></li>
					  </ul>
					<ul class="nav navbar-nav navbar-right">
						<!-- Brand and toggle get grouped for better mobile display -->
						<p class="navbar-text">Welcome! <strong><?php echo " ".$name." "; ?> <?php echo " ".$name2." "; ?></strong></p>

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