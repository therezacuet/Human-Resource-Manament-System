<?php 
	include ('menu.php');
?>
<link rel="shortcut icon" href="../hrlogo.png">
<div class="container-fluid">
	<?php include("background_print.php");?>
				<div class = "row" style ="margin-top:50px">	
					<div class = "col-md-4">
						<ul class="nav nav-tabs">
							<li role="presentation"><a href="emp_list.php">All list</a></li>
							<li role="presentation"><a href="emp_perma.php">Permanent</a></li>
							<li role="presentation"  class="active"><a href="emp_provi.php">Provisionary</a></li>
							<li role="presentation"><a href="emp_left.php">Left</a></li>
						</ul>
					</div>
					<div class ="col-md-4">
						<h1>Provisionary Employee</h1>
					</div>
				</div>
			<br>
			<div class="row">
					<div class="col-md-4">
						<a href="emp_provi.php">Employee With Contract</a>
					</div>
			</div>
		<div class="col-md-12">
			<div class = "col-md-10">
					<?php
						error_reporting(E_ALL & ~E_NOTICE);
						//paging codes
						if (isset($_GET["page"])) 
											{ 
												$page = $_GET["page"]; 
											} else { 
												$page=1; 
											};
											$endlimit = 10; 
											$start_from = ($page-1) * $endlimit;
						//this will get the data in database		
						$welcome_view = "SELECT * FROM employee, ldays WHERE emp_id NOT IN (SELECT emp_id FROM contract WHERE contract.emp_id = employee.emp_id)
							AND employee.id_pos = ldays.id_pos
							AND ldays.id_pos = '2'
							AND employee.stat='1'";
						
						//i-query yah ang gng basa sang $welcome_view then i pasa yah sa $welcome_viewed
						$welcome_viewed = mysql_query($welcome_view);
						
						//i-basahun yah kung pila ang rows nga na query sa $welcome_viewed
						$num_rows = mysql_num_rows($welcome_viewed);
						
								//then the output kung 1 data lng sa database i-echo yah ang 1st line then kung more than 1 echo yah ang 2nd line
								if($num_rows == 1){
								echo "<h2> $num_rows Employee without contract</h2>";}
								else
								echo "<h2> $num_rows Employee's without contract </h2>";
					?>
		</div>
		<div class="col-md-2">
			<p class="text-right"><a href = "add_emp.php"><button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Add Employee">Add New Employee</button></a></p>
		</div>
	</div>
<div class="container-fluid" style="margin-top:80px;">
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="table-responsive">
					<?php
						$sql="SELECT * FROM employee, ldays WHERE emp_id NOT IN (SELECT emp_id FROM contract WHERE contract.emp_id = employee.emp_id)
							AND employee.id_pos = ldays.id_pos
							AND ldays.id_pos = '2'
							AND employee.stat='1' order by emp_date LIMIT $start_from, $endlimit";
						$qry=mysql_query($sql);
					?>
							<table class="table table-hover" id = "table">
									<thead>
										<tr>
											<th>Employee ID</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Contact Number</th>
											<th>Position</th>
											<th>Date Added</th>
											<th colspan=3 style="text-align:center">Actions</th>
										</tr>
									</thead>
						<?php
						while($rec=mysql_fetch_array($qry))
						{
						?>
						<tr>
							<tbody>
									<td>
										<?php echo $rec['emp_id'] ?>
									</td>
									<td>
										<?php echo $rec['emp_fname'] ?>
									</td>
									<td>
										<?php echo $rec['emp_lname'] ?>
									</td>
									<td>
										<?php echo $rec['emp_cont'] ?>
									</td>
									<td>
										<?php echo $rec['emp_pos']?>
									</td>
									<td>
										<?php echo $rec['emp_date']?>
									</td>
									<td>
									<td>
										<a href='emp_profile.php?id=<?php echo $rec['emp_id']?>' data-toggle="tooltip" data-placement="top" title="Profile"><span class="glyphicon glyphicon-list-alt" style="font-size:20px"></span></a>
									</td>
									<td>
										<a href='edit_emp.php?id=<?php echo $rec['emp_id']?>' data-toggle="tooltip" data-placement="top" title="Edit Information"><span class="glyphicon glyphicon-edit" style="font-size:20px"></span></a>
									</td>
									<td> 
										<a href ="cont_add.php?id=<?php echo $rec['emp_id'];?>" data-toggle="tooltip" data-placement="top" title="Add Contract"><span class="glyphicon glyphicon-briefcase" style="font-size:20px;color:green"></span></a>
									</td>
					<?php
						}
					?>			
									
										
							</tbody>
						</tr>
					
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
		//paging codes "$welcome_viewed halin ni sa ging query sang $welcome_view"
		$num_rows = mysql_num_rows($welcome_viewed);
		$total_pages = ceil($num_rows / $endlimit);
		$i=0;
		echo ' '.$_REQUEST["page"].' ';
				for($i=1; $i<=$total_pages; $i++ )
					{
						 echo"<ul class='pagination '> <li>&nbsp<a href = 'emp_list.php?page=".$i."'>".$i."</a></li></ul>";
					}
						echo'&nbsp&nbsp';
?>
			</div>
		</div>
	
	</div>	<!--close div of container-->
	<script>
		$(function () {
		$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
	<?php include('footer.php'); ?>
