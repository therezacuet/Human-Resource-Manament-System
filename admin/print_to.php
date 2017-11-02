<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HR</title>
	<link rel="shortcut icon" href="../hrlogo.png">
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
	<div style = "height:400px; width:800px; margin-left:250px;">
		<div id="dvContents">
			<div style = "margin-left:30px; margin-top:-50px">
					<img src="southland2.png" alt="SOUTHLAND" class="img-rounded" width=800 height=130>
				<h1 style = "margin-left:320px;margin-top:-10px">Travel Order</h1>
			</div>
				<?php include("background_print.php");?>
				<?php
				require ("../conn.php");   // Include the database class
					$select = "SELECT * FROM travel_ordr, employee
									WHERE travel_ordr.emp_id = employee.emp_id AND travel_ordr.to_id='$_GET[id]'";
					$qry=mysql_query($select);
					$rec = mysql_fetch_array($qry)
				?>
				
					<table border="0" cellspacing="10" cellpadding="10" style="family-font:time new roman; font-size:18px;margin-left:100px;" width=690>
								<tr>
									<td>
										No. <strong><?php echo $rec['to_id'];?>
									</td>
									<td style="text-align:center;">
										Date <strong><?php echo $rec['date'];?>
									</td>
								</tr>
								<tr>
									<td>
										Full Name: &nbsp <u><strong><?php echo $rec['emp_fname'];?> <?php echo $rec['emp_lname'];?> <?php echo $rec['emp_mname'];?></u></strong>
									</td>
									<td>
										Designation: <u><strong><?php echo $rec['emp_pos'];?></strong></u>
									</td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:justify;">
										You &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										are  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										hereby  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										directed  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										to  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										proceed  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										to  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<u><strong><?php echo $rec['to_venue'];?></strong></u>
									</td>
								</tr>
								<tr>
									<td colspan="2">
									
										to &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										attend &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
										<u><strong><?php echo $rec['to_host'];?></strong></u> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
										hosted &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										/ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
										organized &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										by &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<u><strong><?php echo $rec['to_activ']; ?></strong></u>
									</td>
								</tr>
					</table>
					<table border="1" cellspacing="0" cellpadding="5" style="family-font:time new roman; font-size:18px;margin-left:110px;border-collapse: collapse; border: 1px solid #999;
  padding: 0.5rem;
  text-align: left;" width="650">
						<tr>
							<th colspan="6">
								ITINERARY OF TRAVEL
							</th>
						</tr>
						<tr>
							<td colspan='3'>
							</td>
							<th colspan ="3">
								Expenses
							</th>
						</tr>
						<tr>
							<th>
								Deployment
							</th>
							<th style="text-align:center">
								Arrival
							</th>
							<th>
								Transportation
							</th>
							<th>
								Registration
							</th>
							<th>
								Board and Lodging
							</th>
							<th>
								Total
							</th>
						</tr>
						<tr>
							<td style="text-align:center;">
								<strong><?php echo $rec['to_etd']; ?></strong> 
							</td>
							<td style="text-align:center;">
								<strong><?php echo $rec['to_eta']; ?></strong>
							</td>
							<td style="text-align:center;">
								<strong><?php echo $rec['to_trans']; ?></strong>
							</td>
							<td style="text-align:center;">
								<strong><?php echo $rec['to_regis']; ?></strong>
							</td>
							<td style="text-align:center;">
								<strong><?php echo $rec['to_bal']; ?></strong>
							</td>
							<td style="text-align:center;">
								<strong><?php echo $rec['to_total']; ?></strong>
							</td>
						</tr>
					</table>
					<table border="0" cellspacing="0" cellpadding="0" style="family-font:time new roman; font-size:18px;margin-left:110px;margin-top:30px;" width="650">
						<tr>
							<td style="text-align:left" width=327>
								Prepared by:
							</td>
							<td style="text-align:left">
								Verified by:
							</td>
						</tr>
						<tr>
							<td style="text-align:center">
								_________________________<br>
								Name of Employee
							</td>
							<td style="text-align:center">
								<u>EMILY T. DIAZ</u><br>
								  Accountant
							</td>
						</tr>
						<tr>
							<td>
								&nbsp
							</td>
							<td>
								&nbsp
							</td>
						</tr>
						<tr>
							<td colspan=2 style="text-align:center">
								Noted by:
							</td>
						</tr>
						<tr>
							<td>
								&nbsp
							</td>
							<td>
								&nbsp
							</td>
						</tr>
						
						<tr>
							<td style="text-align:center">
								_______________________
							</td>
							<td style="text-align:center">
								<u>HENLY S. PAHILAGAO, CPA, PhD</u>
							</td>
						</tr>
						<tr>
							<td style="text-align:center">
								Department Head / Dean
							</td>
							<td style="text-align:center">
								      VP for Finance
							</td>
						</tr>
						<tr>
							<td>
								&nbsp
							</td>
							<td>
								&nbsp
							</td>
						</tr>
						<tr>
							<td>
								&nbsp
							</td>
							<td>
								&nbsp
							</td>
						</tr>
						<tr>
							<td style="text-align:center">
								<u>RHODA J. AMOR, PhD</u>
							</td>
							<td style="text-align:center">
								<u>ANNETTE Z. VILLALUZ</u>
							</td>
						</tr>
						
						<tr>
							<td style="text-align:center">
								VP for Academics & Student Life
							</td>
							<td style="text-align:center">
								      VP for Operation
							</td>
						</tr>
						<tr>
							<td>
								&nbsp
							</td>
							<td>
								&nbsp
							</td>
						</tr>
						<tr>
							<td>
								&nbsp
							</td>
							<td>
								&nbsp
							</td>
						</tr>
						<tr>
							<td style="text-align:left">
								Approved by:
							</td>
							<td style="text-align:center">
								
							</td>
						</tr>
						<tr>
							<td colspan=2 style="text-align:center">
								<u>ANECITO D. VILLALUZ JR., CPA, PhD</u><br>
								<i>President</i>
							</td>
						</tr>
						<tr>
							<td colspan=2>
								&nbsp;
							<td>
						</tr>
						<tr>
							<td colspan=2>
								<i style="font-size:12px">NOTE:</i><b style="font-size:10px">SIGNATURE IN THIS FORM IS NOT REQUIRED DUE TO ELECTRONICALLY PROCESSED.</b>
							</td>
						</tr>
					</table>
	</div>
		<br>
			<div style="margin-left:80px;">
				<a href="to_all_approve.php?id=<?php echo $rec['to_id'];?>"><input type = "button" style = "background: #transparent; width:60px;height:30px;" value="Back"/></a>
				<button type="button" class="styled-button-8" onclick="PrintDiv();">Print</button>
			</div>
			<br>
	</div>