<?php
	include("../config.php");
	$fromdate = $_REQUEST['fromdate'];
	$fromto = $_REQUEST['todate'];
	$paymentmode = $_REQUEST['paymentmode'];
	
	$d1 = implode("-", array_reverse(explode("/",$fromdate)));
	if($fromto == "")	$d2 = $d1;
	else $d2 = implode("-", array_reverse(explode("/",$fromto)));
	
	$sql = "SELECT cast(datentime as date) as billdate, billno, patientname, drname, totalamt, paymentmode FROM tbl_billing WHERE (cast(datentime as date) BETWEEN '$d1' AND '$d2') AND ";
	if($paymentmode == "all")
		$sql .= "paymentmode like '%' AND ";
	else
		$sql .= "paymentmode = '$paymentmode' AND ";
		
	$sql .= "status = 1";
	$array = array();
	$res = mysql_query($sql);
	$xtotal = 0;
	
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Sales_Report.xls");
header("Pragma: no-cache");
header("Expires: 0");

	$header = array("Date","Bill #","Patient Name","Doctor Name","Payment Mode", "Bill Amount");
	echo implode("\t",$header). "\r\n";
	while($rs = mysql_fetch_array($res)){
		$xtotal += $rs['totalamt'];

		echo implode("/", array_reverse(explode("-",$rs['billdate']))) . "\t" . $rs['billno'] . "\t" . $rs['patientname'] . "\t" . $rs['drname'] . "\t" . $rs['paymentmode'] . "\t" . number_format($rs['totalamt'],2,".","") . "\r\n";		
		
	}
	echo "\t\t\t\tTotal\t" . number_format($xtotal,2,".","")  . "\r\n";

?>