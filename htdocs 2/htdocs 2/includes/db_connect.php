<?php
	error_reporting(E_ERROR);
	//$db=mysql_connect("192.168.43.101","root","") or die(mysql_error());
	$db=mysql_connect("localhost","root","", 3307) or die(mysql_error());
	$db_sel=mysql_select_db("payroll_management_system") or die(mysql_error());
?>
