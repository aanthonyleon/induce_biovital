<?php 
	header("Content-Type: text/html;charset=utf-8");
	require_once __DIR__ . '/vendor/autoload.php';
	ob_start();
	include "../_recibo-pago.php"; 
	$template = ob_get_contents();
	ob_end_clean();

	$mpdf = new \Mpdf\Mpdf(['']);
	$mpdf = new \Mpdf\Mpdf([
	    'format' => [216, 140 ],  // Tamaño personalizado en milímetros (140mm x 216mm)
	]);

	$mpdf->AddPageByArray([
	    'margin-left' => .1,
	    'margin-right' => 0,
	    'margin-top' => 0,
	    'margin-bottom' => 0,
		'margin-footer' => 0
	]);

	$mpdf->WriteHTML($template);
	$mpdf->SetHTMLFooter('<div style="background-color:#222;  bottom: 120px; left: 0px;"><img src="../../../../sistema/assets/img/pdf/footer.svg" width="100%" ></div>');
	$mpdf->SetWatermarkImage('../../../../sistema/assets/img/pdf/por_pagar.svg');
	$mpdf->showWatermarkImage = true;
	$mpdf->SetDisplayMode('fullpage');
	$mpdf->SetFont('Montserrat');
	$mpdf->Output('Recibo de pago -' . $codigo,'I');
	$mpdf->Output('../../../../uploads/pdf/saves/recibos_pago/' . $nombre_archivo,'F');

?>