<?php


extract($_GET);



include "includes/fpdf/fpdf.php";
$pdf= new FPDF();
//$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->Image('public/img/logo_pdf.png',10,6);


//$pdf->Image('layout/img/logo_pdf.png',10,6);
$pdf->SetFont('Arial','B',18);
$pdf->Cell(276,5,'Les Informations d etudiant',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Times','',16);
$pdf->Cell(276,10,$nom." ".$prenom,0,0,'C');
$pdf->Ln(50);


$pdf->SetFont('Arial','',15);
$pdf->Cell(70,10,'nom : ',0,0,'L');
$pdf->Cell(210,10,$nom ,0,0,'L');
$pdf->Ln();
$pdf->Cell(70,10,'prenom : ',0,0,'L');
$pdf->Cell(210,10,$prenom,0,0,'L');
$pdf->Ln();
$pdf->Cell(70,10,'Note 1 : ',0,0,'L');
$pdf->Cell(210,10,$note1,0,0,'L');
$pdf->Ln();
$pdf->Cell(70,10,'Note 2 : ',0,0,'L');
$pdf->Cell(210,10,$note2,0,0,'L');
$pdf->Ln();
$pdf->Cell(70,10,'moyenne : ',0,0,'L');
$pdf->Cell(210,10,$moyenne,0,0,'L');
$pdf->Ln();

$pdf->Cell(70,10,'email : ',0,0,'L');
$pdf->Cell(210,10,$email,0,0,'L');
$pdf->Ln();
$pdf->Cell(70,10,'date de naissance : ',0,0,'L');
$pdf->Cell(210,10,$date_de_naissance,0,0,'L');

$pdf->Ln();


$pdf->SetY(-15);
$pdf->SetFont('Arial','',8);
//$pdf->Cell(0,10,'page '.$pdf->PageNo().'/{nb}',0,0,'C');




$file = $pdf->Output('fiche.pdf', 'D');
readfile($file);

