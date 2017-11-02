<?php 
	include ('menu.php');
?>
<link rel="shortcut icon" href="../hrlogo.png">
<div class="container-fluid">
					<?php include("background_print.php");?>
		<div class="row">
			<div class = "col-md-10 col-md-offset-1">

					<?php
						$sql="SELECT *,date_sub(end_date, interval 1 MONTH) < curdate() FROM contact";
						$qry=mysql_query($sql);
					?>
					<table class="table table-hover" style="margin-top:100px;" id = "table">
									<thead>
										<tr>
											
											<th>Date Hired</th>
											<th>Contract End</th>
											
											<th></th>
										</tr>
									</thead>
						<?php
						while($rec=mysql_fetch_array($qry))
						{	
						?>
						
						<tr>
							<tbody>
									<td>
										<?php echo $rec['start_date']?>
									</td>
									<td>
										<?php echo $rec['end_date']?>
									</td>
									<td>
										<a href='emp_profile.php?id=<?php echo $rec['emp_id']?>'><input type='button' value='Profile' data-toggle="tooltip" data-placement="top" title="View Profile" class='btn btn-info'/></a>
										<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><div data-toggle="tooltip" data-placement="top" title="View Contract"> Contract </div></button>
									</td>
							</tbody>
						</tr>
						<?php
						}
						?>
					</table>
<!-- Modal for contract -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Contract Form</h4>
      </div>
      <div class="modal-body">
					<form enctype="multipart/form-data" method="post" action="cont_add.php?id=<?php echo $rec['emp_id'];?>" class="form-horizontal">
							<!-- Text input-->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="start_date">Date Hired:</label>  
							  <div class="col-md-5">
							  <input id="start_date" name="start_date" type="date" class="form-control input-md">
							  </div>
							
							</div>
							<!-- Select Basic -->
							<div class="form-group">
							  <label class="col-md-4 control-label" for="end_date">Contract End:</label>
							  <div class="col-md-5">
								<select id="end_date" name="end_date" class="form-control">
								  <option>Months</option>
								  <option>3</option>
								  <option>6</option>
								  <option>12</option>
								</select>
							  </div>
							</div>
				<div class="modal-footer">
							<div class="form-group">
							  <label class="col-md-8 control-label" for="submit"></label>
							  <div class="col-md-4">
								<button id="submit" name="submit" class="btn btn-primary">Submit</button>
								 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							  </div>
							</div>
					</form>
				</div>
      </div>
    </div>
  </div>
</div>
					
			</div>
		</div>
	
	</div>	<!--close div of container-->
	<script>
		$(function () {
		$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
	<?php include('footer.php'); ?>
