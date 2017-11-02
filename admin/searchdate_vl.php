<?php 
	include ('menu.php');
?>
<link rel="shortcut icon" href="../hrlogo.png">
<div class="container-fluid">
	<?php include("background_print.php");?>
		<div class="container" style="margin-top:50px;">
			<div class="row">
					<form method="post" action="searchdate_vl.php" class="form-inline" >

						<strong>From:</strong><input type="date" name="from" class="form-control">&nbsp;
						<strong>To:</strong><input name="to" type="date" class="form-control">
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
			</div>
		</div>
<?php
	function formatMoney($number, $fractional=false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}
$a=$_POST['from'];
$b=$_POST['to'];
$qry = mysql_query ("SELECT * FROM employee, vacation_log, department
						where employee.id_dept = department.id_dept 
							AND vacation_log.emp_id = employee.emp_id
								AND vacation_log.vdate BETWEEN '$a' AND '$b'");
	if(mysql_num_rows($qry) > 0){
?>
<div class="container-fluid">
	<div class = "row" style="margin-top:30px;">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Employee ID</th>
							<th>Department</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Leave Type</th>
							<th>Position</th>
							<th></th>
						</tr>
					</thead>
				<?php
				while($rec=mysql_fetch_array($qry))
				{
				?>
				<tbody>
					<tr>
						<td>
							<?php echo $rec['id_emp'] ?>
						</td>
						<td>
							<?php echo $rec['depart_name'] ?>
						</td>
						<td>
							<?php echo $rec['emp_fname'] ?>
						</td>
						<td>
							<?php echo $rec['emp_lname'] ?>
						</td>
						<td>
							<?php echo $rec['leavetype'] ?>
						</td>
						<td>
							<?php echo $rec['emp_pos']?>
						</td>
						<td>
							<a href='emp_profile.php?id=<?php echo $rec['emp_id']?>'><input type='button' value='Profile' title ='View all Detials' class='btn btn-info'/></a>
							<a href='edit_emp.php?id=<?php echo $rec['emp_id']?>'><input type='button' value='Modify' title ='Edit' class='btn btn-primary'/></a>
						</td>
					</tr>
				</tbody>
			<?php
				}
				}
				else 
					echo "<h2 style='margin-left:600px;margin-top:150px;'>No results<h2>";
			?>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
	</div>
</div>