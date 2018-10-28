<?php

include 'includes/db.php';

$stmt = $db->prepare("select * from config");
$stmt->execute();
$row = $stmt->fetch();


extract($_GET);



include "includes/fpdf/fpdf.php";
$pdf= new FPDF();
//$pdf->AliasNbPages();
$pdf->AddPage('Letter','A5',0);
$pdf->Image('upload/config/'. $row['logo'],10,6);


//$pdf->Image('layout/img/logo_pdf.png',10,6);
$pdf->SetFont('Arial','B',28);
$pdf->Cell(276,5,'MIAGE',0,0,'C');
$pdf->Ln('40');



$pdf->SetFont('Arial','',19);
$pdf->Cell(210,10,'Addresse : ' . $adresse ,0,0,'C');
$pdf->Ln('20');

$pdf->Cell(210,10,'Telephone : ' . $telephone,0,0,'C');
$pdf->Ln('20');

$pdf->Cell(210,10,'Telephone : ' . $email,0,0,'C');
$pdf->Ln('20');



$pdf->SetY(-15);



$file = $pdf->Output((rand(1,1000).'_infos.pdf'), 'D');
readfile($file);

