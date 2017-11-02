<?php 
	include ('menu.php');
?>
<link rel="shortcut icon" href="../hrlogo.png">
	<div class="container-fluid">
		<?php include("background_print.php");?>
			<div class="row">
				<div class="col-md-12">
					<div class="page-header">
							<h1>Employee Profile</h1>
					</div>
				</div>
			</div>
				<?php
					$select = "SELECT * FROM dbhr.employee, dbhr.department, dbhr.ldays WHERE
								employee.id_dept = department.id_dept 
								AND ldays.id_pos = employee.id_pos 
								AND employee.emp_id='$_GET[id]'";
					
					$qry=mysql_query($select);
					$rec = mysql_fetch_array($qry);
								$id = "$rec[id_emp]";
								$fname = "$rec[emp_fname]";
								$lname = "$rec[emp_lname]";
								$mname = "$rec[emp_mname]";
								$bday = "$rec[emp_bday]";
								$age = "$rec[emp_age]";
								$gender = "$rec[emp_gen]";
								$address = "$rec[emp_add]";
								$cont = "$rec[emp_cont]";
								$sss = "$rec[sss]";
								$pagibig = "$rec[pagibig]";
								$philhealth = "$rec[philhealth]";
								$tin = "$rec[tin]";
								$email = "$rec[email]";
								$status = "$rec[emp_stat]";
								$pos1 = "$rec[pos_stat]";
								$pos = "$rec[emp_pos]";
								$statpos = "$rec[pos_stat]";
								$depart = "$rec[depart_name]";
								$added = "$rec[addedby]";
								$date = "$rec[emp_date]";
				?>
<div class="container-fluid">
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
						<div class = "col-md-4 col-md-offset-2">
							<h3>Employee Information</h3>
						</div>
		<div class="row">
			<div class="col-md-11 col-md-offset-1">
				<form class="form-horizontal">
					<fieldset>
						<!-- Text input-->
							<div class="form-group">
								<label class="col-md-2 control-label" for="id_emp">Employee ID</label>  
							  <div class="col-md-2">
							  <input type = "text" value = "<?php echo $id;?>" class="form-control input-md" readonly>
							  </div>
							   <label class="col-md-2 control-label" for="emp_cont_end">Date Added</label>  
								<div class="col-md-2">
									<input type = "text" value="<?php echo $date;?>" class="form-control input-md" readonly>
								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="emp_fname">Full Name</label>  
							  <div class="col-md-3">
							  <input type = "text" value="<?php echo $fname?> <?php echo $lname?> <?php echo $mname;?>" class="form-control input-md" readonly>
							  </div>
							</div>

							<!-- Select Basic -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="month">Birth of Date</label>
								<div class="col-md-3">
									<input type = "text" value="<?php echo $bday;?>" class="form-control input-md" readonly>
								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="emp_age">Age</label>  
								<div class="col-md-1">
									<input type = "text" value="<?php echo $age;?>" class="form-control input-md" readonly>
								</div>
							  
							  <label class="col-md-1 control-label" for="gen">Gender</label>
							  <div class="col-md-2">
									<input type = "text" value="<?php echo $gender;?>" class="form-control input-md" readonly>
								</div>
							</div>

							<!-- Textarea -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="emp_add">Address</label>
								<div class="col-md-4">
									<input type = "text" value="<?php echo $address;?>" class="form-control input-md" readonly>
								</div>
							</div>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="emp_cont">Contact Number</label>  
							  <div class="col-md-3">
									<input type = "text" value="<?php echo $cont;?>" class="form-control input-md" readonly>
								</div>
							</div>
							<div class = "col-md-10 col-md-offset-2">
								<h3>Insurance Information</h3>
							</div>
							<div class="form-group">
							  <label class="col-md-2 control-label" for="sss">SSS Number</label>  
								<div class="col-md-2">
									<input type = "text" value="<?php echo $sss;?>" class="form-control input-md" readonly>
								</div>
							  <label class="col-md-2 control-label" for="pagibig">Pagibig Number</label>
							  <div class="col-md-2">
									<input type = "text" value="<?php echo $pagibig;?>" class="form-control input-md" readonly>
								</div>
							</div>
							
							<div class="form-group">
							  <label class="col-md-2 control-label" for="philhealth">Phil Health Number</label>  
								<div class="col-md-2">
									<input type = "text" value="<?php echo $philhealth;?>" class="form-control input-md" readonly>
								</div>
							  <label class="col-md-2 control-label" for="tin">TIN Number</label>  
								<div class="col-md-2">
									<input type = "text" value="<?php echo $tin;?>" class="form-control input-md" readonly>
								</div>
							</div>
							
							<div class = "col-md-10 col-md-offset-2">
								<h3>Employee Status</h3>
							</div>
							
							<div class="form-group">
							  <label class="col-md-2 control-label" for="email">Email Address</label>  
								<div class="col-md-3">
									<input type = "text" value="<?php echo $email;?>" class="form-control input-md" readonly>
								</div>
							</div>
							
							<!-- Select Basic -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="emp_stat">Status</label>
								<div class="col-md-2">
									<input type = "text" value="<?php echo $status;?>" class="form-control input-md" readonly>
								</div>

								<div class="col-md-2">
									<input type = "text" value="<?php echo $pos;?>" class="form-control input-md" readonly>
								</div>
								
								<div class="col-md-2">
									<input type = "text" value="<?php echo $pos1;?>" class="form-control input-md" readonly>
								</div>
							  
							   <div class="col-md-2">
									<input type = "text" value="<?php echo $depart;?>" class="form-control input-md" readonly>
								</div>
							</div>
							<div class="form-group">
							  <label class="col-md-2 control-label" for="addedby">Added By</label>  
							  <div class="col-md-2">
							  <input id="addedby" name="addedby" type="text" class="form-control input-md" value="<?php echo " ".$FirstName." ".$LastName." ";?>" readonly>
							  </div>
							</div>
							
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-2 control-label" for="addedby"></label>
								<div class="col-md-2">
								<input type = "button" value = "Back" onclick="history.back()" class="btn btn-default"></a>
								</div>
							</div>
					</fieldset>
				</form>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
	</div>
	<?php include('footer.php');?>
		