<?php 
	include ('menu.php');
?>
<link rel="shortcut icon" href="../hrlogo.png">
<div class="container-fluid">
	<?php include("background_print.php");?>
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
						$welcome_view = "SELECT * FROM employee WHERE stat='1'";
						
						//i-query yah ang gng basa sang $welcome_view then i pasa yah sa $welcome_viewed
						$welcome_viewed = mysql_query($welcome_view);
						
						//i-basahun yah kung pila ang rows nga na query sa $welcome_viewed
						$num_rows = mysql_num_rows($welcome_viewed);
						
								//then the output kung 1 data lng sa database i-echo yah ang 1st line then kung more than 1 echo yah ang 2nd line
								if($num_rows == 1){
								echo "<h2> $num_rows Employee </h2>";
								}
								else
								echo "<h2> $num_rows Employees </h2>";
					?>
			</div>
	
	</div>
<div class="container-fluid" style="margin-top:80px;">
	<?php include("background_print.php");?>
	<div class = "row">
		<div class="panel panel-default">
			<div class="panel-body">
					<?php
						$sql="SELECT * FROM employee, ldays WHERE employee.id_pos = ldays.id_pos 
								AND employee.stat='1' order by emp_date DESC LIMIT $start_from, $endlimit";
						$qry=mysql_query($sql);
					?>

					<table class="table table-hover table-list-search">
						<thead>
							<tr>
								<th>Employee ID</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Contact Number</th>
								<th>Position</th>
								<th>Status</th>
								<th>Date Added</th>
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
										<?php echo $rec['pos_stat'] ?>
									</td>
									<td>
										<?php echo $rec['emp_date']?>
									</td>
									<td>
										<!-- Single button -->
										<div class="btn-group">
										  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
											Action <span class="caret"></span>
										  </button>
										  <ul class="dropdown-menu" role="menu">
											<li><a href='emp_profile.php?id=<?php echo $rec['emp_id']?>' data-toggle="tooltip" data-placement="left" title="Information">Profile</a></li>
											<li><a href='edit_emp.php?id=<?php echo $rec['emp_id']?>'data-toggle="tooltip" data-placement="left" title="Edit Information">Update</a></li>
										   
											<li class="divider"></li>
											<li><a href='emp_stat.php?id=<?php echo $rec['emp_id']?>' data-toggle="tooltip" data-placement="left" title="Disable Account">Remove</a></li>
										  </ul>
										</div>
									</td>
					<?php
						}
					?>
							</tr>
						</tbody>
					</table>
			</div>
		</div>
	</div>
</div>
		<?php
			//paging codes "$welcome_viewed halin ni sa ging query sang $welcome_view"
			$num_rows = mysql_num_rows($welcome_viewed);
			$total_pages = ceil($num_rows / $endlimit);
			$i=0;
			echo '
				 Page Number :&nbsp'.$_REQUEST["page"].' &nbsp&nbsp&nbsp&nbsp';
					for($i=1; $i<=$total_pages; $i++ )
						{
						 echo"<ul class='pagination pagination-sm'> <li>&nbsp<a href = 'emp_list.php?page=".$i."'>".$i."</a></li></ul>";
						}
						echo'&nbsp&nbsp';
					?>
</div>
	<?php include('footer.php'); ?>