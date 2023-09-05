<?php 
	include_once("includes/header.php"); 
	include_once("includes/db_connect.php"); 
	include 'phpqrcode/qrlib.php'; 
	$SQL="SELECT * FROM `month`,`salary`,`department`,`designation`, `user`,`record` WHERE record_designation = designation_id AND record_department = department_id AND record_user_id = user_id AND salary_user_id = user_id AND month_id = salary_month AND salary_id = ".$_REQUEST['salary_id'];
	$rs=mysql_query($SQL) or die(mysql_error());
	$data = mysql_fetch_assoc($rs);
?>
<script>
function delete_assignment(assignment_id)
{
	if(confirm("Do you want to delete the assignment?"))
	{
		this.frm_assignment.assignment_id.value=assignment_id;
		this.frm_assignment.act.value="delete_assignment";
		this.frm_assignment.submit();
	}
}
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"

        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"

        crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.3.5/jspdf.plugin.autotable.min.js"></script>

<script>
function generate-qr()
{
	echo "in the function";
	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
 	$url = "https://";   
	else  
 	$url = "http://";   
	// Append the host(domain name, ip) to the URL.   
	$url.= $_SERVER['HTTP_HOST'];   

	// Append the requested resource location to the URL   
	$url.= $_SERVER['REQUEST_URI'];    


$text = "$url"; 
echo "$url";
  
// $path variable store the location where to  
// store image and $file creates directory name 
// of the QR code file by using 'uniqid' 
// uniqid creates unique id based on microtime 
$path = 'images/'; 
$file = $path.uniqid().".png"; 
  
// $ecc stores error correction capability('L') 
$ecc = 'L'; 
$pixel_Size = 10; 
$frame_Size = 10; 
  
// Generates QR Code and Stores it in directory given 
QRcode::png($text, $file, $ecc, $pixel_Size, $frame_size); 
  
// Displaying the stored QR code from directory 
echo "<center><img src='".$file."'></center>"; 
}

</script>

<style>
.static tr td{
	border:none;
}

th{
	text-align:left;
}
table {
	border:1px solid #000000;
	padding:8px;
}
</style>

	<div class="crumb">
    </div>
    <div class="clear"></div>
	<div id="content_sec">
		<div class="col1" style="width:100%">
		<div class="contact">
			<h4 class="heading colr" style="text-align:center">Payslip</h4>
			<?php
			if($_REQUEST['msg']) { 
			?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
			<?php
			}
			?>
			<form name="frm_assignment" action="lib/assignment.php" method="post">
				<div class="static">
<table style="width:100%">
	<tr>
		<td style="text-align:center; font-size:14px; font-weight:bold; font-family:Arial, Helvetica, sans-serif">
			RVCE Pvt. Ltd.<br>
			Block E<br>
			Sector : 2<br>
			Bengaluru - 560059<br>
			Karnataka
			<h2>Payslip for the period of <?=$data['month_name']?> 2017</h2>
		</td>
	</tr>
	<tr>
		<td>
			<table style="width:100%">
				<tr>
					<th style="width:25%">Employee ID</th>
					<td style="width:25%">: <?=$data['user_id']?></td>
					<th style="width:25%">Name</th>
					<td style="width:25%">: <?=$data['user_name']?></td>
				</tr>
				<tr>
					<th>Department</th>
					<td>: <?=$data['department_title']?></td>
					<th>Designation</th>
					<td>: <?=$data['designation_title']?></td>
				</tr>
				<tr>
					<th>Date of Joining</th>
					<td>: <?=$data['record_doj']?></td>
					<th>PF Account Number</th>
					<td>: <?=$data['record_pf_account_no']?></td>
				</tr>
				<tr>
					<th>Days of Working</th>
					<td>: <?=$data['salary_working_days']?></td>
					<th>Salary Account No.</th>
					<td>: <?=$data['record_salary_account_no']?></td>
				</tr>
				<tr>
					<th>Transaction ID</th>
					<td>: <?=$data['salary_id']?></td>
					<th></th>
					<td></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table style="width:100%">
				<tr style="border-bottom:1px solid #000000">
					<th style="width:25%; height:30px; border-bottom:2px solid #000000">Earnings</th>
					<th style="width:25%; height:30px; border-bottom:2px solid #000000">Amount</th>
					<th style="width:25%; height:30px; border-bottom:2px solid #000000">Deductions</th>
					<th style="width:25%; height:30px; border-bottom:2px solid #000000">Amount</th>
				</tr>
				<tr>
					<th>Basic Pay</th>
					<td>: <?=$data['salary_basic']?></td>
					<th>Insurance</th>
					<td>: 0</td>
				</tr>
				<tr>
					<th>Dearness Allowance</th>
					<td>: <?=$data['salary_da']?></td>
					<th>Provident Fund</th>
					<td>: <?=$data['salary_dpf']?></td>
				</tr>
				<tr>
					<th>Medical Allowance</th>
					<td>: <?=$data['salary_mediclaim']?></td>
					<th>Professional Tax</th>
					<td>: <?=$data['salary_dtax']?></td>
				</tr>
				<tr>
					<th>House Rent Allowance</th>
					<td>: <?=$data['salary_hra']?></td>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
				<tr>
					<th>Conveyance Allowance</th>
					<td>: <?=$data['salary_ca']?></td>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
				<tr>
					<th>Reimbursement</th>
					<td>: <?=$data['salary_reimbursement']?></td>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
				<tr>
					<th style="border-top:2px solid">Total Earnings</th>
					<td style="border-top:2px solid">: <?=$data['salary_total']?></td>
					<th style="border-top:2px solid">Total Deduction</th>
					<th style="border-top:2px solid">: <?=$data['salary_dedc']?></th>
				</tr>
			</table>
		</td>
	</tr>
</table>
<div style="float:right; padding:5px;">
	<input type="button" class="simplebtn" value="Print Salary Slip" onClick="window.print()">
	<a href="qr.php?id=<?=$data['salary_id']?>"input type="button" class="simplebtn" value="Scan QR">Scan QR </a>
	
</div>
				</div>
				<input type="hidden" name="act" />
				<input type="hidden" name="assignment_id" />
			</form>
		</div>
		</div>
	</div>
	
<?php include_once("includes/footer.php"); ?> 

