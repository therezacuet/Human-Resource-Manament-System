<link rel="shortcut icon" href="../hrlogo.png">
		<div class="container-fluid">
			<div class="row">
				<?php include ('menu.php'); ?>
			</div>
		</div>
	<div class = "col-md-3 col-md-offset-9" style="margin-top:50px;">
		<form method="GET" action="search.php" class="navbar-form navbar-left" role="search">
			<div class="form-group">
				<input type="text" name="query" data-toggle='tooltip' data-placement='top' title='Find Employee' class="form-control" placeholder="Search Employee">
			</div>
				<button type="submit" class="btn btn-default">Search</button>
		</form>
	</div>

	<div class="container-fluid">
		<?php include("background_print.php");?>
		<div class = "col-md-12">
			<div style="margin-top:100px;" class="text-center">
				<p style ="font-family:Georgia; font-size:60px;">Human Resource Support System</p>
			</div>
		</div>
	</div>
	
					<?php
						//this will get the data in database
						$sql = "SELECT * FROM contract, employee, ldays WHERE cont_stat = 1
									AND contract.emp_id = employee.emp_id AND employee.id_pos = ldays.id_pos
									AND ldays.id_pos='2'";
						$qry = mysql_query($sql);
						while($rec = mysql_fetch_array($qry))
						{
							$idget = "$rec[emp_id]";
							$n_emp = "$rec[emp_fname]";
							$a = $rec['end_date'];
							$aa = strtotime("$a");

							$dd = strtotime("now");
							$ddd = date('Y-m-d', $dd);
														
							$datetime1 = new DateTime($ddd);
							$datetime2 = new DateTime($a);
							$interval = $datetime1->diff($datetime2);
							$diffnum = $interval->format('%a');
							
							
							if(($diffnum <= 30) && ($diffnum != 0) && !($diffnum < 0)):
							echo"<div class = 'col-md-3 col-md-offset-9' style ='margin-top:200px'>
								<div class='alert alert-danger' role='alert'>
									<strong>$diffnum</strong> days remaining of <strong>$n_emp</strong> <a href = 'cont_action.php?id=$idget' data-toggle='tooltip' data-placement='top' title='Take Action'>Click Here</a>
								</div>
								</div>";
							elseif($diffnum == 0):
							echo"<div class = 'col-md-3 col-md-offset-9' style ='margin-top:200px'>
								<div class='alert alert-danger' role='alert'>
									<strong>$diffnum</strong> days remaining of <strong>$n_emp</strong> <a href = 'cont_action.php?id=$idget' data-toggle='tooltip' data-placement='top' title='Take Action'> Click here </a>
								</div>
								</div>";
							elseif($diffnum < 0):
							echo"<div class = 'col-md-3 col-md-offset-9' style ='margin-top:200px'>
								<div class='alert alert-danger' role='alert'>
									Contract of <strong>$n_emp</strong> must be taken into actions. <a href = 'cont_action.php?id=$idget' data-toggle='tooltip' data-placement='top' title='Take Action'> Click here </a>
								</div>
								</div>";
							else:
							echo"";
							endif;
							}
					?>
	<script>
		$(function () {
		$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
		<?php
			include ('footer.php');
		?>