<?php 
	header("Content-Type: text/html;charset=utf-8");
	require_once __DIR__ . '/vendor/autoload.php';
	ob_start();
	include "../_orden-servicio.php"; 
	$template = ob_get_contents();
	ob_end_clean();
	$mpdf = new \Mpdf\Mpdf();
	$mpdf->AddPage(
			'P', // L - landscape, P - portrait 
            '', '', '', '',
            0, // margin_left
            0, // margin right
            0, // margin top
           	20, // margin bottom
            0, // margin header
            0  // margin footer
        );
	$mpdf->setAutoTopMargin='stretch';

	$mpdf->SetHTMLHeader('
						  <div class="contrato-header">
						  	<div class="">&nbsp;</div>
						  </div>
						 ');
	
	$mpdf->SetHTMLFooter('
						  <div class="footer-container ">
							<p class="">&nbsp;</p>
						  </div>
						 ');

	$mpdf->WriteHTML($template);

	$mpdf->SetDisplayMode('fullpage');
	$mpdf->SetFont('Montserrat');
	$mpdf->Output('Orden de servicio -' . $codigo,'I');
	$mpdf->Output('../../../../uploads/pdf/saves/ordenes_compra/' . $nombre_archivo,'F');

?>