<link rel="shortcut icon" href="../hrlogo.png">
<link rel="stylesheet" type="text/css" href="pop.css">
		<div class="container-fluid">
			<div class="row">
				<?php include ('menu.php'); ?>
			</div>
		</div>
<div class="container-fluid">
	<?php include("background_print.php");?>
	<div class="row" style="margin-top:20px">
		<div class="col-xs-9 col-md-offset-3">
			<div class="col-xs-4">
						<?php
						//INITIALIZE DATE RANGE Start
				$nw = strtotime("now");
				$tdy = date("m-d",$nw);
				
				$mjune = strtotime("june 1");
				$djune = date("m-d",$mjune);
				
				$mdec = strtotime("December 31");
				$ddec = date("m-d",$mdec);
				
				$mjan = strtotime("January 1");
				$djan = date("m-d",$mjan);
				
				$mmay = strtotime("May 31");
				$dmay = date("m-d",$mmay);
			//INITIALIZE DATE RANGE End
			
			//START FUNCTION
				if(($djune <= $tdy)&&($ddec >= $tdy)):
					$cyear = strtotime("June 1");
					$cyr = date("m-d",$cyear);
					
					$cyrs = strtotime("now");
					$cyrr = date("Y",$cyrs);
					
					$cyaa = strtotime("now");
					$cya = date("Y-m-d",$cyaa);
					
							$sql="SELECT *,SUM(no_days)AS nod FROM employee, ldays, leaves, executive
								where employee.emp_id = leaves.emp_id 
								AND employee.id_pos = ldays.id_pos
								AND executive.exe_vp = leaves.exe_vp
								AND executive.exe_vp = '2'
								AND employee.emp_id = '$_GET[id]' AND date >= '$cyrr-$cyr' AND date <= '$cya'";
							$qry=mysql_query($sql);
							$rec=mysql_fetch_array($qry);
							
							$value = $rec['nod'];
							$get = $rec['adays'];
							
							$getval = $get - $value;
					
					elseif(($djan <= $tdy)&&($dmay >= $tdy)):
					
					$cyear = strtotime("June 1");
					$cyr = date("m-d",$cyear);
					
					$cyrs = strtotime("lastyear");
					$cyrr = date("Y",$cyrs);
					
					$cyaa = strtotime("now");
					$cya = date("Y-m-d",$cyaa);
						
						$sql="SELECT *,SUM(no_days)AS nod FROM employee, ldays, leaves, executive
								where employee.emp_id = leaves.emp_id 
								AND employee.id_pos = ldays.id_pos
								AND executive.exe_vp = leaves.exe_vp
								AND executive.exe_vp = '2'
								AND employee.emp_id = '$_GET[id]' AND date >= '$cyrr-$cyr' AND date <= '$cya'";
							$qry=mysql_query($sql);
							$rec=mysql_fetch_array($qry);
							
							$value = $rec['nod'];
							$get = $rec['adays'];
							
							$getval = $get - $value;
							
					endif;
						?>
				<div class="offer offer-info">
					<div class="shape">
						<div class="shape-text">
														
						</div>
					</div>
					<div class="offer-content">
						<h3 class="lead">
							Sick Leave
						</h3>						
						<p>
							Days Left: <strong><?php echo $getval; ?></strong> <br>
							Total Days Leave: <strong><?php echo $value; ?></strong>
						</p>
					</div>
				</div>
			</div>
			<div class="col-xs-4">
		<?php
			
		//INITIALIZE DATE RANGE Start
				$nw = strtotime("now");
				$tdy = date("m-d",$nw);
				
				$mjune = strtotime("june 1");
				$djune = date("m-d",$mjune);
				
				$mdec = strtotime("December 31");
				$ddec = date("m-d",$mdec);
				
				$mjan = strtotime("January 1");
				$djan = date("m-d",$mjan);
				
				$mmay = strtotime("May 31");
				$dmay = date("m-d",$mmay);
				//INITIALIZE DATE RANGE End
			
				//START FUNCTION
					if(($djune <= $tdy)&&($ddec >= $tdy)):
					$cyear = strtotime("June 1");
					$cyr = date("m-d",$cyear);
					
					$cyrs = strtotime("now");
					$cyrr = date("Y",$cyrs);
					
					$cyyy = strtotime("May 31");
					$cyy = date("m-d", $cyyy);
					
					$csss = strtotime("nextyear");
					$csx = date("Y",$csss);
					
			$sql1="select SUM(credits) AS nod From vacation_credits
					where AND date >= '$cyrr-$cyr' 
						AND date <= '$csx-$cyy' AND vacation_credits.emp_id = '$_GET[id]'";
			$qry1 = mysql_query($sql1);
			
			$cred = $rec['nod'];
			

			$sql="select SUM(nodays) AS nod1, id_emp, emp_fname, emp_lname, leavetype, nodays, sdate, eddate  From vacation_log, employee,executive
					where executive.exe_vp = vacation_log.exe_vp
						  AND executive.exe_vp = '2'
						  AND vacation_log.emp_id = employee.emp_id 
							 AND vacation_log.emp_id = '$_GET[id]'";
							
			$qry2 = mysql_query($sql);
			$recc = mysql_fetch_array($qry2);
			
			$value2 = $recc['nod1'];
			$value3 = $cred - $value2;
			
					elseif(($djan <= $tdy)&&($dmay >= $tdy)):
					
					$cyear = strtotime("June 1");
					$cyr = date("m-d",$cyear);
					
					$cyrs = strtotime("lastyear");
					$cyrr = date("Y",$cyrs);
					
					$cmayr = strtotime("May 31");
					$cmr = date("m-d",$cmayr);
					
					$cyrx = strtotime("now");
					$cyx = date("Y",$cyrx);
					
			$sql1="select SUM(credits) AS nod From vacation_credits
					where date >= '$cyrr-$cyr' 
							AND date <= '$cyx-$cmr' AND vacation_credits.emp_id = '$_GET[id]' ";
			$qry1 = mysql_query($sql1);
			$rec = mysql_fetch_array($qry1);
			$cred = $rec['nod'];
			
			$sql="select SUM(nodays) AS nod1, id_emp, emp_fname, emp_lname, leavetype, nodays, sdate, eddate  From vacation_log, employee,executive
					where executive.exe_vp = vacation_log.exe_vp
						  AND executive.exe_vp = '2'
						  AND vacation_log.emp_id = employee.emp_id 
							 AND vacation_log.emp_id = '$_GET[id]'";
							
			$qry2 = mysql_query($sql);
			$recc = mysql_fetch_array($qry2);
			
			$value2 = $recc['nod1'];
			$value3 = $cred - $value2;
			
			endif;
		?>
				<div class="offer offer-info">
					<div class="shape">
						<div class="shape-text">
														
						</div>
					</div>
					<div class="offer-content">
						<h3 class="lead">
							Vacation Leave
						</h3>						
						<p>
							Days Left: &nbsp <strong><?php echo $value3;?></strong> <br>
							Total Days Leave: &nbsp <strong><?php echo $value2;?></strong>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<div class="container-fluid">
		<div class = "col-md-12">
			<div style="margin-top:100px;" class="text-center">
				<p style ="font-family:Georgia; font-size:60px;">Human Resource Support System</p>
			</div>
		</div>
	</div>
		<?php
			include ('footer.php');
		?>