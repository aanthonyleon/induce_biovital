<?php
/* pdf_creator.php */

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

// set the sourcefile
// $mpdf->SetImportUse(); // <--- not needed for mPDF version 8.0+
$mpdf->setSourceFile(__DIR__ . '/saves/recibos_pago/IM_17_63039bfada430.pdf'); // absolute path to pdf file

// import page 1
$tplIdx = $mpdf->importPage(1);

// use the imported page and place it at point 10,10 with a width of 200 mm   (This is the image of the included pdf)
$mpdf->useTemplate($tplIdx, 10, 10, 200);

$mpdf->SetWatermarkImage('../../assets/img/pdf/pagado.svg');
$mpdf->showWatermarkImage = true;

// now write some text above the imported page
// $mpdf->SetTextColor(0, 0, 255);
// $mpdf->SetFont('Arial', 'B', 8);
// $mpdf->SetXY(95, 16);
// $mpdf->Write(0, 'Mindfire');
$mpdf->Output('newpdf.pdf');