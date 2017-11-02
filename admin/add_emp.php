<?php 
	include ('menu.php');
?>
<link rel="shortcut icon" href="../hrlogo.png">
<div class="container-fluid">
	<?php include("background_print.php");?>
<?php	
	if (isset($_POST['submit'])){
		 
		if (($_POST['emp_fname'] == '')or($_POST['emp_lname'] == '')or($_POST['emp_mname'] == '')or($_POST['month'] == '')
		or($_POST['day'] == '')or($_POST['year'] == '')or($_POST['emp_age'] == '')or($_POST['emp_gen'] == '')or($_POST['emp_add'] == '')
		or($_POST['emp_cont'] == '')or($_POST['sss'] == '')or($_POST['pagibig'] == '')or($_POST['philhealth'] == '')or($_POST['tin'] == '')
		or($_POST['email'] == '')or($_POST['emp_stat'] == '')or($_POST['emp_pos'] == '')or($_POST['id_pos'] == '')or($_POST['addedby'] == ''))
		{
			echo "You must fill those fields";
		}	
	else{  
		$a = addslashes("$_POST[id_emp]");
		$b = addslashes("$_POST[emp_fname]");
		$c = addslashes("$_POST[emp_lname]");
		$d = addslashes("$_POST[emp_mname]");
		$e = addslashes("".$_POST['month']."-".$_POST['day']."-".$_POST['year']."");
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
		$n = addslashes("$_POST[id_dept]");
		$m = addslashes("$_POST[id_pos]");
		$l = addslashes("$_POST[addedby]");
		$dat = strtotime("now");
		$da = date("Y-m-d",$dat);
		
		//ma insert nah cia sa database
		$sql = "INSERT INTO employee
					(`emp_id`,`id_emp`,`emp_fname`,`emp_lname`,`emp_mname`,`emp_bday`,`emp_age`,`emp_gen`,`emp_add`,`emp_cont`,`sss`,`pagibig`,`philhealth`,`tin`,`email`,`emp_stat`,`emp_pos`,`id_dept`,`id_pos`,`addedby`,`emp_date`,`stat`)
						values('','$a','$b','$c','$d','$e','$f','$g','$h','$j','$q','$w','$p','$o','$u','$i','$k','$n','$m','$l','$da','1')";
		$qry = mysql_query($sql);
			if ($qry){
				echo '<div style="position:absolute; left:450px; top:200px; width: 450px">
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
										×</button>
								   <span class="glyphicon glyphicon-ok"></span> <strong>Done!</strong>
									<hr class="message-inner-separator">
									<p><strong>Success!</strong> Employee Information added!
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									<a href="emp_list.php"><button type="button" class="btn btn-success">Continue</button></a>
									</p>
								</div>
							</div>';
					exit();
				}
			else {
				echo "not posted!";
				}
		}
	}
?>
			<div class="row">
				<div class="col-md-12">
					<div class="page-header">
						<h1>Add Employee</h1>
					</div>
				</div>
			</div>
<div class="container-fluid">
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
					<form enctype="multipart/form-data" method="post" class="form-horizontal">
						<fieldset>
							<div class = "col-md-9 col-md-offset-2">
								<h3>Employee Information</h3>
							</div>
							
							<!-- Text input-->
							<div class="form-group">
								<label class="col-md-2 control-label" for="id_emp">Employee ID</label>
							  <div class="col-md-2">
							  <input id="id_emp" name="id_emp" type="text" placeholder="Employee ID" class="form-control input-md">
							  </div>
							
							</div>

							<!-- Text input-->
							<div class="form-group" >
							  <label class="col-md-2 control-label" for="emp_fname">Full Name</label>  
							  <div class="col-md-3">
							  <input id="emp_fname" name="emp_fname" type="text" placeholder="First Name" class="form-control input-md" required="">
							  </div>
								<label class="col-md- control-label" for="emp_mname"></label>  
							  <div class="col-md-3">
							  <input id="emp_mname" name="emp_mname" type="text" placeholder="Middle Name" class="form-control input-md" required="">
							  </div>
								<label class="col-md- control-label" for="emp_lname"></label>
							  <div class="col-md-3">
								<input id="emp_lname" name="emp_lname" type="text" placeholder="Last Name" class="form-control input-md" required="">
							  </div>
							</div>

							<!-- Select Basic -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="month">Birth of Date</label>
							  <div class="col-md-2">
								<select id="month" name="month" class="form-control">
								  <option>Month</option>
								  <option>January</option>
								  <option>February</option>
								  <option>March</option>
								  <option>April</option>
								  <option>May</option>
								  <option>June</option>
								  <option>July</option>
								  <option>August</option>
								  <option>September</option>
								  <option>October</option>
								  <option>November</option>
								  <option>December</option>
								</select>
							  </div>
							
							  <div class="col-md-1">
								<select id="day" name="day" class="form-control">
								  <option>Day</option>
								  <option>1</option>
								  <option>2</option>
								  <option>3</option>
								  <option>4</option>
								  <option>5</option>
								  <option>6</option>
								  <option>7</option>
								  <option>8</option>
								  <option>9</option>
								  <option>10</option>
								  <option>11</option>
								  <option>12</option>
								  <option>13</option>
								  <option>14</option>
								  <option>15</option>
								  <option>16</option>
								  <option>17</option>
								  <option>18</option>
								  <option>19</option>
								  <option>20</option>
								  <option>21</option>
								  <option>22</option>
								  <option>23</option>
								  <option>24</option>
								  <option>25</option>
								  <option>26</option>
								  <option>27</option>
								  <option>28</option>
								  <option>29</option>
								  <option>30</option>
								  <option>31</option>
								</select>
							  </div>
							
							  <div class="col-md-2">
								<select id="year" name="year" class="form-control">
								  <option>Year</option>
								  <option>1970</option>
								  <option>1971</option>
								  <option>1972</option>
								  <option>1973</option>
								  <option>1974</option>
								  <option>1975</option>
								  <option>1976</option>
								  <option>1977</option>
								  <option>1978</option>
								  <option>1979</option>
								  <option>1980</option>
								  <option>1981</option>
								  <option>1982</option>
								  <option>1983</option>
								  <option>1984</option>
								  <option>1985</option>
								  <option>1986</option>
								  <option>1987</option>
								  <option>1988</option>
								  <option>1989</option>
								  <option>1990</option>
								  <option>1991</option>
								  <option>1992</option>
								  <option>1993</option>
								  <option>1994</option>
								  <option>1995</option>
								  <option>1996</option>
								  <option>1997</option>
								  <option>1998</option>
								  <option>1999</option>
								  <option>2000</option>
								  <option>2001</option>
								  <option>2002</option>
								  <option>2003</option>
								  <option>2004</option>
								  <option>2005</option>
								  <option>2006</option>
								  <option>2007</option>
								  <option>2008</option>
								  <option>2009</option>
								  <option>2010</option>
								  <option>2011</option>
								  <option>2012</option>
								  <option>2013</option>
								  <option>2014</option>
								</select>
							  </div>
							</div>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="emp_age">Age</label>  
							  <div class="col-md-2">
							  <input id="emp_age" name="emp_age" type="text" placeholder="Age" class="form-control input-md" required="">
								
							  </div>
							  
							  <label class="col-md-1 control-label" for="gen">Gender</label>
							  <div class="col-md-2">
								<select id="emp_gen" name="emp_gen" class="form-control">
								  <option>Gender</option>
								  <option>Female</option>
								  <option>Male</option>
								</select>
							  </div>
							</div>

							<!-- Textarea -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="emp_add">Address</label>
							  <div class="col-md-4">                     
								<textarea class="form-control" id="emp_add" name="emp_add" placeholder="Address"></textarea>
							  </div>
							</div>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="emp_cont">Contact Number</label>  
							  <div class="col-md-4">
							  <input id="emp_cont" name="emp_cont" type="text" placeholder="Contact Number" class="form-control input-md" required="">
								
							  </div>
							</div>
							<div class = "col-md-10 col-md-offset-2">
								<h3>Insurance Information</h3>
							</div>
							<div class="form-group">
							  <label class="col-md-2 control-label" for="sss">SSS Number</label>  
							  <div class="col-md-3">
							  <input id="sss" name="sss" type="text" placeholder="SSS Number" class="form-control input-md" required="">
								
							  </div>
							  <label class="col-md-2 control-label" for="pagibig">Pagibig Number</label>
							  <div class="col-md-3">
							  <input id="pagibig" name="pagibig" type="text" placeholder="Pag-ibig Number" class="form-control input-md" required="">
								
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="col-md-2 control-label" for="philhealth">Phil Health Number</label>  
							  <div class="col-md-3">
							  <input id="philhealth" name="philhealth" type="text" placeholder="Phil Health Number" class="form-control input-md" required="">
								
							  </div>
							  <label class="col-md-2 control-label" for="TIN">TIN Number</label>  
							  <div class="col-md-3">
							  <input id="tin" name="tin" type="text" placeholder="TIN Number" class="form-control input-md" required="">
								
							  </div>
							</div>
							
							<div class = "col-md-10 col-md-offset-2">
								<h3>Employee Status</h3>
							</div>
							
							<div class="form-group">
							  <label class="col-md-2 control-label" for="email">Email Address</label>  
							  <div class="col-md-4">
							  <input id="email" name="email" type="text" placeholder="Email Address" class="form-control input-md" required="">
								
							  </div>
							</div>
							<div class="form-group">
							  <label class="col-md-2 control-label" for="salary">Salary</label>  
							  <div class="col-md-4">
							  <input id="salary" name="salary" type="text" placeholder="Salary" class="form-control input-md" required="">
								
							  </div>
							</div>
							
							<!-- Select Basic -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="emp_stat">Status</label>
							  <div class="col-md-2">
								<select id="emp_stat" name="emp_stat" class="form-control">
								  <option>Status</option>
								  <option>Single</option>
								  <option>Married</option>
								  <option>Widow</option>
								  <option>Widower</option>
								</select>
							  </div>
							  
							  <div class="col-md-2">
								<select id="emp_pos" name="emp_pos" class="form-control">
								  <option>Position</option>
								  <option>Administrative</option>
								  <option>Teaching Personnel</option>
								  <option>Secretary</option>
								  <option>Staff</option>
								</select>
							  </div>
							  
							  <div class="col-md-2">
								   <?php
									   $select = "SELECT * FROM ldays";
									   $qry = mysql_query($select);
									   
									   echo "<select id='id_pos' name='id_pos' class='form-control'>";
									   echo "<option>Position Type</option>";
									   while($recs = mysql_fetch_array($qry)){
										  echo"<option value = '$recs[id_pos]'>$recs[pos_stat]</option>";
									   }
										echo"</select>";
									?>
							  </div>
							  
							   <div class="col-md-2">
								   <?php
									   $select = "SELECT * FROM department";
									   $qry = mysql_query($select);
									   
									   echo "<select id='id_dept' name='id_dept' class='form-control'>";
									   echo "<option>Department</option>";
									   while($rec = mysql_fetch_array($qry)){
										  echo"<option value = '$rec[id_dept]'>$rec[depart_name]</option>";
									   }
										echo"</select>";
									?>
							  </div>
							</div>

							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="addedby">Added By</label>  
							  <div class="col-md-3">
							  <input id="addedby" name="addedby" type="text" class="form-control input-md" value="<?php echo " ".$FirstName." ".$LastName." ";?>" readonly>
								
							  </div>
							</div>

							<!-- Button (Double) -->
							<div class="form-group">
							  <label class="col-md-2 control-label" for="submit"></label>
							  <div class="col-md-8">
								<button id="submit" name="submit" class="btn btn-primary">Submit</button>
								<a href = "emp_list.php"><input type = "button" value = "Cancel" class="btn btn-default"></a>
							  </div>
							</div>

						</fieldset>
					</form>
			</div>
		</div>
	</div>
</div>

		</div>	<!--close div of container-->
	<?php include('footer.php');?>