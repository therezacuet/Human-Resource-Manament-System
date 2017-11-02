
<table cellpadding="0" cellspacing="0" border="1" class="table table-horizontal table-highlight" id="example" >
								
										<thead>
										  <tr>
												<th>Date Login</th>
												<th>Date logout</th>
												<th>Username</th>
										   </tr>
										</thead>
										<tbody>
													<?php
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
	$welcome_view = "SELECT * FROM user_log";
	
	//i-query yah ang gng basa sang $welcome_view then i pasa yah sa $welcome_viewed
	$welcome_viewed = mysql_query($welcome_view);
	
	//i-basahun yah kung pila ang rows nga na query sa $welcome_viewed
	$num_rows = mysql_num_rows($welcome_viewed);
													//this part lantawun nia ang activity ka user
													$user_query = mysql_query("select * from user_log order by user_log_id ASC LIMIT $start_from, $endlimit")or die(mysql_error());
													while($row = mysql_fetch_array($user_query)){
													$id = $row['user_log_id'];
													?>
									
												<tr style="text-align:center;">
												<td><?php echo $row['username']; ?></td>
												<td><?php echo $row['login_date']; ?></td>
												<td><?php echo $row['logout_date']; ?></td>
												</tr>
												<?php } ?>
										</tbody>
<tr style ="text-align:center;">
<td colspan = "3">
<?php				
					error_reporting(E_ALL & ~E_NOTICE);
					//paging codes "$welcome_viewed halin ni sa ging query sang $welcome_view"
					$num_rows = mysql_num_rows($welcome_viewed);
					$total_pages = ceil($num_rows / $endlimit);
					$i=0;
					echo 'Page Number: '.$_REQUEST["page"].'&nbsp&nbsp[&nbsp';
					for($i=1; $i<=$total_pages; $i++ )
					{
						
					   echo"&nbsp<a href = 'user_log.php?page=".$i."'>".$i."</a>";
					  	
					}
					
					echo'&nbsp&nbsp]';

?>
</td>
</tr>
</table>
</div>
	<div>
	<footer style ="text-align:center; float:left; width:1000px; height:50px; position:relative; left: 180px; border-top: 3px solid #da70d6; color: #ffffff; background:#8b008b">
	<p> Courtesy of: <i>Southland College </i></p>						
	</footer>
	</div>
	</body>
</html>