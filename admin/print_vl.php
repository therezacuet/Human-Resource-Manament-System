<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print</title>
	<link rel="shortcut icon" href="../hrlogo.png">
    <!-- Bootstrap -->
	</head>
	<body>
		<script type="text/javascript">
        function PrintDiv() {
            var contents = document.getElementById("dvContents").innerHTML;
            var frame1 = document.createElement('iframe');
            frame1.name = "frame1";
            frame1.style.position = "absolute";
            frame1.style.top = "-1000000px";
            document.body.appendChild(frame1);
            var frameDoc = frame1.contentWindow ? frame1.contentWindow : frame1.contentDocument.document ? frame1.contentDocument.document : frame1.contentDocument;
            frameDoc.document.open();
            frameDoc.document.write('<html><head><title>SOUTHLAND COLLEGE</title>');
            frameDoc.document.write('</head><body>');
            frameDoc.document.write(contents);
            frameDoc.document.write('</body></html>');
            frameDoc.document.close();
            setTimeout(function () {
                window.frames["frame1"].focus();
                window.frames["frame1"].print();
                document.body.removeChild(frame1);
            }, 500);
            return false;
        }
    </script>
	<style type="text/css">
.styled-button-8 {
	background: #25A6E1;
	background: -moz-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,#25A6E1),color-stop(100%,#188BC0));
	background: -webkit-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: -o-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: -ms-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	filter: progid: DXImageTransform.Microsoft.gradient( startColorstr='#25A6E1',endColorstr='#188BC0',GradientType=0);
	width:60px;
	height:30px;
	color:#000;
	font-family:'Helvetica Neue',sans-serif;
	font-size:13px;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border:1px solid #1A87B9
}          
</style>
<?php include("background_print.php");?>
	<div style = "height:400px; width:800px; margin-left:200px;">
		<div id="dvContents">
			<div style = "margin-left:100px;">
				<img src="southland.png" alt="SOUTHLAND">
				<h3 style = "margin-left:200px;">Application for Leave of Absence</h3>
			</div>
<?php
			require("../conn.php"); 
			$sql="select * From vacation_log, employee, department
							where vacation_log.emp_id = employee.emp_id 
							AND employee.id_dept = department.id_dept 
							AND vacation_log.v_id = '$_GET[id]'";
			$qry2 = mysql_query($sql);
			$rec = mysql_fetch_array($qry2);
?>
					<div>
						<table border = "1" cellpadding = "10" cellspacing = "5" width="900">
							<tr>
								<td width="450">
									Date of Filing: &nbsp <strong><?php echo $rec['id_emp']; ?></strong>
								</td>
								<td width="450">
									Full Name: &nbsp <strong><?php echo $rec['emp_fname'];?> <?php echo $rec['emp_lname'];?></strong>
								</td>
							</tr>
							<tr>
								<td>
									Department: &nbsp <strong><?php echo $rec['depart_name'];?></strong>
								</td>
								<td>
									Designation: &nbsp <strong><?php echo $rec['emp_pos'];?></strong>
								</td>
							</tr>
							<tr>
								<td colspan=2>
									<p>Leave Applied For:<br>
										<p style="margin-left:100px"><strong>[<img src = "../check.png" width="20" height="20">]Vacation Leave  </strong>&nbsp&nbsp&nbsp
										&nbsp&nbsp&nbsp
										<strong>[&nbsp&nbsp&nbsp]
															Sick Leave</strong></p>
								</td>
							</tr>
							<tr>
								<td>
									Inclusive dates:<br>
									<p style="margin-left:60px;"/>From:&nbsp <strong><?php echo $rec['sdate'];?></strong>
								
									&nbsp&nbsp&nbsp To: &nbsp <strong><?php echo $rec['eddate'];?></strong>
								</td>
								<td>
									Number of days: &nbsp <strong><?php echo $rec['nodays'];?></strong>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									Prepared By: &nbsp <strong><?php echo $rec['addedby'];?></strong>
								</td>
							</tr>
						</table>
					</div>
					<div style="margin-top:100px">
						<table border = "1" cellpadding = "10" cellspacing = "5" width="900">
							<tr>
								<td width="450">
									Date of Filing: &nbsp <strong><?php echo $rec['id_emp']; ?></strong>
								</td>
								<td width="450">
									Full Name: &nbsp <strong><?php echo $rec['emp_fname'];?> <?php echo $rec['emp_lname'];?></strong>
								</td>
							</tr>
							<tr>
								<td>
									Department: &nbsp <strong><?php echo $rec['depart_name'];?></strong>
								</td>
								<td>
									Designation: &nbsp <strong><?php echo $rec['emp_pos'];?></strong>
								</td>
							</tr>
							<tr>
								<td colspan=2>
									<p>Leave Applied For:<br>
										<p style="margin-left:100px"><strong>[<img src = "../check.png" width="20" height="20">]Vacation Leave  </strong>&nbsp&nbsp&nbsp
										&nbsp&nbsp&nbsp
										<strong>[&nbsp&nbsp&nbsp]
															Sick Leave</strong></p>
								</td>
							</tr>
							<tr>
								<td>
									Inclusive dates:<br>
									<p style="margin-left:60px;"/>From:&nbsp <strong><?php echo $rec['sdate'];?></strong>
								
									&nbsp&nbsp&nbsp To: &nbsp <strong><?php echo $rec['eddate'];?></strong>
								</td>
								<td>
									Number of days: &nbsp <strong><?php echo $rec['nodays'];?></strong>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									Prepared By: &nbsp <strong><?php echo $rec['addedby'];?></strong>
								</td>
							</tr>
						</table>
					</div>
	</div>
</div>
						<div style ="margin-left:200px; margin-top:200px">
							<a href="vl_all_approve.php?id=<?php echo $rec['emp_id'];?>"><input type = "button" style = "background: #transparent; width:60px;height:30px;" value="Back"/></a>
							<button type="button" class="styled-button-8" onclick="PrintDiv();">Print</button>
						</div>