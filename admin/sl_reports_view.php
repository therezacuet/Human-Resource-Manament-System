<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HR</title>
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
<div style = "height:400px; width:800px; margin-left:300px;">
	<div id="dvContents">
			 
				<h3 style = "margin-left:250px;">Application for Leave of Absence</h3>
			</div>
				<?php
					require ("../conn.php");   // Include the database class
					$select = "SELECT *,SUM(no_days) AS total FROM employee, leaves
									WHERE employee.emp_id = leaves.emp_id AND employee.emp_id='$_GET[id]'";
					$qry=mysql_query($select);
					$rec = mysql_fetch_array($qry)
				?>
				<table border="0" cellspacing="10" cellpadding="10" width="600px" style="margin-left:100px">
					<tr>
						<td>
							Employee ID: &nbsp <strong><?php echo $rec['id_emp'];?></strong>
						</td>
						<td>
							Date: &nbsp <strong><?php echo $rec['date']; ?></strong>
						</td>
					</tr>
					<tr>
						<td>
						Full Name: &nbsp <strong><?php echo $rec['emp_fname'];?> <?php echo $rec['emp_lname'];?></strong>
						</td>
					</tr>
					<tr>
						<td>
						Leave Type: &nbsp <strong><?php echo $rec['leavetype'];?></strong>
						</td>
						<td>
						Total Leave: &nbsp <strong><?php echo $rec['total'];?></strong>
						</td>
					</tr>
				</table>
				<?php
					require ("../conn.php");   // Include the database class
					$select = "SELECT * FROM employee, leaves
									WHERE employee.emp_id = leaves.emp_id AND employee.emp_id='$_GET[id]'";
					$qry=mysql_query($select);
				?>
				<?php
					while($rec1 = mysql_fetch_array($qry))
					{
				?>
						<h2 style="margin-left:120px;">List Leave</h2>
					<table border="0" cellspacing="10" cellpadding="10" width="600px" style="margin-left:100px">
						
						<tr>
							<td>
							Effective Date: &nbsp <strong><?php echo $rec1['edate'];?></strong> &nbsp to &nbsp <strong><?php echo $rec1['endate'];?></strong>
							</td>
						</tr>
						<tr>
							<td>
							Total Days Leave: &nbsp <strong><?php echo $rec1['no_days'];?></strong><hr/>
							</td>
						</tr>
				<?php
					}
				?>
					</table>
	</div>
						<div style="margin-left:120px">
							<a href="sl_reports.php"><input type = "button" value="Back" style = "background: #transparent; width:60px;height:30px;"/></a>
							<button type="button" class="styled-button-8" onclick="PrintDiv();">Print</button>
						</div>
						<br>
	</div>
	