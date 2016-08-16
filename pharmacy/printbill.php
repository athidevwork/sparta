<?php
	$billno = $_REQUEST['billno'];

	require('fpdf/fpdf.php');
	include("config.php");
	
	class PDF extends FPDF {
		function Header() {
		    $this->SetFont('Times','',16);
		    $this->SetY(0.25);
	//		$this->Image("images/hycare.jpg", 2.25, .25, 4, .75);
//		    $this->SetY(1);
			//$this->Image("images/NEWIMG.jpg", 0.2, 2.4, 2, 1);
		}
		function Footer() {
	//	    $this->Image("images/address.jpg", 2.30, 10.8, 4, .75);
		}
	}
$pdf=new PDF("P","in",array(2.95,6));
$pdf->SetMargins(0.01,0.1);
$pdf->AddPage();
$pdf->SetFont('Times','B',12);

$pdf->MultiCell(3, 0.25, "VASANTHAM PHARMACY" , '0', "C");
//$pdf->SetFont('Times','B',16);
//$pdf->MultiCell(3, 0.25, "(Unit of xxx Hospitals)" , '0', "C");
$pdf->SetFont('Times','',8);
$pdf->MultiCell(3, 0.25, "Old No. 1/114, New No.6/71" , '0', "C");
$pdf->MultiCell(3, 0.25, "Pillaiyar Koil Street, Ayyappanthangal,CH-600 056." , '0', "C");
$pdf->MultiCell(3, 0.25, "Phone : 7401530644, 9941610087" , '0', "C");
//$pdf->MultiCell(3, 0.25, "E-mail : xxx@gmail.com" , '0', "C");
$pdf->SetFont('Times','B',12);
$pdf->MultiCell(3, 0.25, "DL No  : 587/KPM/20/21" , '0', "C");


$pdf->Ln(.10);

$cmd = mysql_query("SELECT datentime, patientname, drname, billno, paidamt FROM tbl_billing WHERE billno = $billno");
$rs = mysql_fetch_array($cmd);

$amount = $rs['paidamt'];
$pdf->SetFont('Times','',7);
$pdf->Cell(1.6, 0.25, "Name   : ".$rs['patientname'], '0','0', "L");
$pdf->Cell(1.4, 0.25, "Date  : ".$rs['datentime'], '0','0', "L");
$pdf->Ln();
$pdf->Cell(1.6, 0.25, "Dr.Name : ".$rs['drname'], '0','0', "L");
$pdf->Cell(1.4, 0.25, "Bill # : ".$rs['billno'], '0','0', "L");

$pdf->Ln(.25);

$i = 1;
$pdf->SetFont('Times','B',9);
$pdf->Cell(0.2, 0.26, "s.no", '1','0', "C");
$pdf->Cell(1.1, 0.26, "Particulars", '1','0', "C");
$pdf->Cell(0.2, 0.26, "qty", '1','0', "C");
$pdf->Cell(0.5, 0.26, "Batch #", '1','0', "C");
$pdf->Cell(0.4, 0.26, "Exp", '1','0', "C");

$pdf->Cell(0.5, 0.26, "Amount", '1','0', "C");
$pdf->Ln();
$pdf->SetFont('Times','',7);
$sql = mysql_query("SELECT * FROM tbl_billing_items WHERE billno = $billno AND status = 1");
while($r = mysql_fetch_array($sql)){

	$code = $r['code'];
	$q =  mysql_query("SELECT * FROM tbl_productlist WHERE id = $code");
	$r1 = mysql_fetch_array($q);
//	$desc = substr($r1['stocktype'],0,3) . '. ' .$r1['productname'];
	$desc = $r1['productname'];
		
	$expirydate = implode("/",array_reverse(explode("-",$r['expirydate'])));
	$expirydate = substr($expirydate,3);
		
	$pdf->Cell(0.2, 0.26, $i++, 'L','0', "C");
	$pdf->Cell(1.1, 0.26, $desc, 'L','0', "L");
	$pdf->Cell(0.2, 0.26, $r['qty'], 'L','0', "C");
	$pdf->Cell(0.5, 0.26, $r['batchno'], 'L','0', "C");
	$pdf->Cell(0.4, 0.26, $expirydate, 'L','0', "C");
	
	$pdf->Cell(0.5, 0.26, $r['amount'], 'LR','0', "C");
	
	$pdf->Ln();
}
$b =  mysql_query("SELECT * FROM tbl_billing WHERE billno =".$rs['billno']);
	$r2 = mysql_fetch_array($b);
$pdf->SetFont('Times','',10);
	$pdf->Cell(1.3, 0.25, 'Discount Amount  ', '1','0', "R");
$pdf->Cell(1.6, 0.25, $r2['discount'], '1','0', "C");
$pdf->Ln();
$pdf->Cell(1.3, 0.25, 'Total ', '1','0', "R");
$pdf->Cell(1.6, 0.25, $r2['totalamt'], '1','0', "C");
$pdf->Ln(.35);
$pdf->MultiCell(2.8, 0.25, "~~~Thank You. Get Well Soon.~~~" , '0', "C");
$pdf->MultiCell(2.8, 0.25, "" , '0', "C");
	$pdf->Output();
?>