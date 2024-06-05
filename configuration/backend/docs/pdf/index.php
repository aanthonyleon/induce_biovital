<?php 
	header("Content-Type: text/html;charset=utf-8");
	require_once __DIR__ . '/vendor/autoload.php';
	ob_start();
	include "../_cotizacion.php"; 
	$template = ob_get_contents();
	ob_end_clean();

	$mpdf = new \Mpdf\Mpdf(['']);

	$mpdf->AddPageByArray([
	    'margin-left' => .1,
	    'margin-right' => 0,
	    'margin-top' => 0,
	    'margin-bottom' => -2,
	]);

	$mpdf->WriteHTML('
		<div>
	        <img src="../../../../sistema/assets/img/pdf/portada.jpg" width="100%" style="position: absolute; top: 0px; left: 0px;">
		</div>
	');
	$mpdf->SetHTMLHeader('<div style="background-color:#111111; position: absolute; top: 0px; left: 0px;">
	 <img src="../../../../sistema/assets/img/pdf/header_light.svg" width="100%" >
	</div>');
	
	$mpdf->SetHTMLFooter('<div style="background-color:#222;  bottom: 120px; left: 0px;"><img src="../../../../sistema/assets/img/pdf/footer.svg" width="100%" ></div>');

	$mpdf->AddPageByArray([
	    'margin-left' => .1,
	    'margin-right' => 0,
	    'margin-top' => 30,
	    'margin-bottom' => 20,
		'margin-footer' => 0,
	]);

	$mpdf->WriteHTML($template);

	$mpdf->SetDisplayMode('fullpage');
	$mpdf->SetFont('Montserrat');
	$mpdf->Output('Cotización -' . $codigo,'I');
	$mpdf->Output('../../../../uploads/pdf/saves/cotizaciones/' . $nombre_archivo,'F');

?>