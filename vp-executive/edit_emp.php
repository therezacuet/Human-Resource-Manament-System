			<?php 
						include ('menu.php');
			?>
	<link rel="shortcut icon" href="../hrlogo.png">
		<div class="container-fluid">
			<?php include("background_print.php");?>

			
	<?php
					$select = "SELECT * FROM dbhr.employee, dbhr.department, dbhr.ldays WHERE 
								employee.id_dept = department.id_dept AND
								ldays.id_pos = employee.id_pos AND employee.emp_id='$_GET[id]'";
					$qry=mysql_query($select);
						if($qry)
						{
						while($rec = mysql_fetch_array($qry)){
						$id = "$rec[id_emp]";
						$fname = "$rec[emp_fname]";
						$lname = "$rec[emp_lname]";
						$mname = "$rec[emp_mname]";
						$bday = "$rec[emp_bday]";
						$age = "$rec[emp_age]";
						$gen = "$rec[emp_gen]";
						$add = "$rec[emp_add]";
						$stat = "$rec[emp_stat]";
						$cont = "$rec[emp_cont]";
						$sss = "$rec[sss]";
						$pagibig = "$rec[pagibig]";
						$philhealth = "$rec[philhealth]";
						$tin = "$rec[tin]";
						$email = "$rec[email]";
						$pos = "$rec[emp_pos]";
						$statpos = "$rec[pos_stat]";
						$depart = "$rec[depart_name]";
						$idpos = "$rec[id_pos]";
						$iddepart = "$rec[id_dept]";
						$empid = "$rec[emp_id]";
						}
						}

	if (isset($_POST['submit']))
	{
		$a = addslashes("$_POST[id_emp]");
		$b = addslashes("$_POST[emp_fname]");
		$c = addslashes("$_POST[emp_lname]");
		$d = addslashes("$_POST[emp_mname]");
		$e = addslashes("$_POST[emp_bday]");
		$f = addslashes("$_POST[emp_age]");
		$g = addslashes("$_POST[emp_gen]");
		$h = addslashes("$_POST[emp_add]");
		$j = addslashes("$_POST[emp_cont]");
		$q = addslashes("$_POST[sss]");
		$w = addslashes("$_POST[pagibig]");
		$p = addslashes("$_POST[philhealth]");
		$o = addslashes("$_POST[tin]");
		$u = addslashes("$_POST[email]");
		$i = addslashes("$_POST[emp_stat]");
		$k = addslashes("$_POST[emp_pos]");
		$m = addslashes("$_POST[pos_stat]");
		$t = addslashes("$_POST[id_dept]");
		
		//dri nah mah edit xng data
		$update = "UPDATE `dbhr`.`employee` SET
					`id_emp` = '$a',
					`emp_fname` = '$b',
					`emp_lname` = '$c',
					`emp_mname` = '$d',
					`emp_bday` = '$e',
					`emp_age` = '$f',
					`emp_gen` = '$g',
					`emp_add` = '$h',
					`emp_cont` = '$j',
					`sss` = '$q',
					`pagibig` = '$w',
					`philhealth` = '$p',
					`tin` = '$o',
					`email` = '$u',
					`emp_stat` = '$i',
					`emp_pos` = '$k',
					`id_pos` = '$m',
					`id_dept` = '$t'
					
					WHERE `employee`.`emp_id`='$_GET[id]' LIMIT 1";
		$qry = mysql_query($update);
			if ($qry){
				echo'<div class="col-md-4 col-md-offset-4" style = "margin-top:50px">
						<div class="alert alert-success" role="alert">Done! Successfully Updated! <br><br><a href="emp_list.php">
						<div class ="col-md- col-md-offset-10"><button type="button" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Continue">Next</button></div></a></div>
					</div>';
					exit();
			}
			else{
				echo "not posted!";
				}
	}
?>
			<div class="row">
				<div class="col-md-12">
					<div class="page-header">
							<h1>Edit Employee</h1>
					</div>
				</div>
			</div>
<div class="container-fluid">
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
		<form method="post" class="form-horizontal">
						<fieldset>
						<div class = "col-md-10 col-md-offset-2">
							<h3>Employee Information</h3>
						</div>
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="id_emp">Employee ID</label>  
							  <div class="col-md-2">
							  <input id="id_emp" name="id_emp" type="text" value = "<?php echo $id;?>" placeholder="Employee ID" class="form-control input-md" required="">
								
							  </div>
							</div>

							<!-- Text input-->
							<div class="form-group" >
							  <label class="col-md-2 control-label" for="emp_fname">Full Name</label>  
							  <div class="col-md-3">
							  <input id="emp_fname" name="emp_fname" type="text" value = "<?php echo $fname;?>" placeholder="First Name" class="form-control input-md" required="">
							  </div>
								<label class="col-md- control-label" for="emp_mname"></label>  
							  <div class="col-md-3">
							  <input id="emp_mname" name="emp_mname" type="text" value = "<?php echo $mname;?>" placeholder="Middle Name" class="form-control input-md" required="">
							  </div>
								<label class="col-md- control-label" for="emp_lname"></label>  
							  <div class="col-md-3">
							  <input id="emp_lname" name="emp_lname" type="text" value = "<?php echo $lname;?>" placeholder="Last Name" class="form-control input-md" required="">
							  </div>
							</div>

							<!-- Select Input -->
							

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="emp_bday">Birth of Date</label>  
							  <div class="col-md-2">
							  <input id="emp_bday" name="emp_bday" type="text" value = "<?php echo $bday;?>" placeholder="Birthday" class="form-control input-md" required="">
								
							  </div>
							  
							  <label class="col-md-1 control-label" for="emp_age">Age</label>  
							  <div class="col-md-2">
							  <input id="emp_age" name="emp_age" type="text" value = "<?php echo $age;?>" placeholder="Age" class="form-control input-md" required="">
								
							  </div>
							  
							  <label class="col-md-1 control-label" for="gen">Gender</label>
							  <div class="col-md-2">
								<select id="emp_gen" name="emp_gen" class="form-control">
								  <option><?php echo $gen;?></option>
								  <option>Female</option>
								  <option>Male</option>
								</select>
							  </div>
							</div>

							<!-- Textarea -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="emp_add">Address</label>
							  <div class="col-md-4">                     
								<textarea class="form-control" id="emp_add" name="emp_add" placeholder="Address"><?php echo $add;?></textarea>
							  </div>
							</div>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="emp_cont">Contact Number</label>  
							  <div class="col-md-4">
							  <input id="emp_cont" name="emp_cont" type="text" value = "<?php echo $cont;?>" placeholder="Contact Number" class="form-control input-md" required="">
								
							  </div>
							</div>
						<div class = "col-md-10 col-md-offset-2">
							<h3>Insurance Information</h3>
						</div>
							<div class="form-group">
							  <label class="col-md-2 control-label" for="sss">SSS Number</label>  
							  <div class="col-md-3">
							  <input id="sss" name="sss" type="text" value = "<?php echo $sss;?>" placeholder="SSS Number" class="form-control input-md" required="">
								
							  </div>
							  <label class="col-md-2 control-label" for="pagibig">Pagibig Number</label>
							  <div class="col-md-3">
							  <input id="pagibig" name="pagibig" type="text" value = "<?php echo $pagibig;?>" placeholder="Pag-ibig Number" class="form-control input-md" required="">
								
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="col-md-2 control-label" for="philhealth">Phil Health Number</label>  
							  <div class="col-md-3">
							  <input id="philhealth" name="philhealth" type="text" value = "<?php echo $philhealth;?>" placeholder="Phil Health Number" class="form-control input-md" required="">
								
							  </div>
							  <label class="col-md-2 control-label" for="TIN">TIN Number</label>  
							  <div class="col-md-3">
							  <input id="tin" name="tin" type="text" value = "<?php echo $tin;?>" placeholder="TIN Number" class="form-control input-md" required="">
								
							  </div>
							</div>
							
						<div class = "col-md-10 col-md-offset-2">
							<h3>Status Information</h3>
						</div>
							<div class="form-group">
							  <label class="col-md-2 control-label" for="email">Email Address</label>  
							  <div class="col-md-4">
							  <input id="email" name="email" type="text" value = "<?php echo $email;?>" placeholder="Email Address" class="form-control input-md" required="">
								
							  </div>
							</div>
							
							<!-- Select Basic -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="emp_stat">Status</label>
							  <div class="col-md-2">
								<select id="emp_stat" name="emp_stat" class="form-control">
								  <option><?php echo $stat;?></option>
								  <option>Single</option>
								  <option>Married</option>
								  <option>Widow</option>
								  <option>Widower</option>
								</select>
							  </div>
							  
							  <div class="col-md-2">
								<select id="emp_pos" name="emp_pos" class="form-control">
								  <option><?php echo $pos;?></option>
								  <option>Administrative</option>
								  <option>Teaching Personnel</option>
								  <option>Secretary</option>
								  <option>Staff</option>
								</select>
							  </div>
							  
							  <div class="col-md-2">
								<select id="pos_stat" name="pos_stat" class="form-control">
									<option value ="<?php echo $idpos; ?>"><?php echo $statpos;?></option>
								<?php
								   $select = "SELECT * FROM ldays";
								   $qry = mysql_query($select);
									
								   while($rec = mysql_fetch_array($qry)){
									  echo"<option value = '$rec[id_pos]'>$rec[pos_stat]</option>";
								   }
								
								?>
								</select>
							  </div>
							  
							   <div class="col-md-2">
								<select id="id_dept" name="id_dept" class="form-control">
									<option value ="<?php echo $iddepart;?>"><?php echo $depart;?></option>
							   <?php
								   $select = "SELECT * FROM department";
								   $qry = mysql_query($select);

								   while($rec = mysql_fetch_array($qry)){
									  echo"<option value = '$rec[id_dept]'>$rec[depart_name]</option>";
								   }
								
								?>
							
								</select>
							  </div>
							</div>
							
							<!-- Button (Double) -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="submit"></label>
							  <div class="col-md-8">
								<button id="submit" name="submit" class="btn btn-primary">Submit</button>
								<a href = "emp_list.php"><input type="button" value="Back" name="cancel" class="btn btn-default"/></a>
							  </div>
							</div>

						</fieldset>
					</form>
			</div>
		</div>
	</div>
</div>
</div>
	<?php include('footer.php'); ?>