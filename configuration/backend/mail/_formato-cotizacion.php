<?php 
  $message = '
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>

		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
		<title>Induce Marketing</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400&display=swap" rel="stylesheet">

		<style>

		.text-center{
			width: 420px;
			margin-left: auto;
			margin-right: auto;
		}

		.button {
			border-radius: 5px;
			-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		  border: none;
		  color: white;
		  padding: 10px 22px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 12px;
		  margin: 4px 2px;
		  cursor: pointer;
		}

		.button1 {background-color: #555555;} /* Green */
		
		@media only screen and (max-width:640px)

{
	body {width:auto!important;}
	table [class=main] {width:440px !important;}
	table [class=two-left] {width:420px !important; margin:0px auto;}
	table [class=full] {width:100% !important; margin:0px auto;}
	table [class=two-left-inner] {width:400px !important; margin:0px auto;}
	table [class=menu-icon] { display:none;}

	}

@media only screen and (max-width:479px)
{
	body {width:auto!important;}
	table [class=main]  {width:310px !important;}
	table [class=two-left] {width:300px !important; margin:0px auto;}
	table [class=full] {width:100% !important; margin:0px auto;}
	table [class=two-left-inner] {width:280px !important; margin:0px auto;}
	table [class=menu-icon] { display:none;}


}

		</style>

		</head>
		 <body>

				 <table style="max-width: 600px; width: 600px; word-break: break-word; border-collapse: collapse !important;" border="0" width="600" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF">
					 <tbody>
						 <tr>
						 <td class="inner-container" style="padding: 13px 40px;" align="left" valign="top">

							 <table >
								 <tbody>
									 <tr>
										 <td >
											 <table >
												 <tbody>
													 <tr>
														 <td >
														  <img  src="https://www.induce.mx/assets/img/email/logo.jpg" alt="induce" width="150" height="43" />
														 </td>
													 </tr>
												 </tbody>
											 </table>
										 </td>
									 </tr>
								 </tbody>
							 </table>


							 <table style="border-collapse: collapse !important; max-width: 600px; width: 600px;" border="0" width="600" cellspacing="0" cellpadding="0" align="center">
								 <tbody>
									 <tr>
										 <td class="inner-container" style="padding: 13px 40px;" align="center" valign="top">
											 <table style="border-collapse: collapse !important; max-width: 600px; width: 520px;" border="0" width="600" cellspacing="0" cellpadding="0" align="center">
												 <tbody>
													 <tr>
														<td style="color: #3c4043; font-family: Montserrat, sans-serif; font-size: calc(1em + 1vw); line-height: 30px; margin: 0px; padding: 0px; word-break: break-word;">
														 <div> <img class="logo no-arrow" src="https://www.induce.mx/assets/img/email/header-email.png" alt="induce" width="600"  /></div>
														</td>
													</tr>
													 <tr>
														 <td style="color: #666; font-family: Montserrat, sans-serif; font-size: calc(1em + 1vw); line-height: 30px; margin: 0px; padding: 0px; word-break: break-word;">
														  <div>'.$data_mensaje.'</div>
														 </td>
													 </tr>
													 <tr>
														 <td style="color: #3c4043; font-family: Montserrat, sans-serif; font-size: calc(1em + 1vw); line-height: 30px; margin: 0px; padding: 0px; word-break: break-word;">
															 &nbsp;
														 </td>
													 </tr>

													 <tr>
														 <td style="color: #3c4043; font-family: Montserrat, sans-serif; font-size: calc(1em + 1vw); line-height: 30px; margin: 0px; padding: 0px; word-break: break-word; text-align:center;">
															 <a href="'.$url.'" target="_blank" class="button button1">Descargar</a>
														 </td>
													 </tr>

													 ';

													 if ($id_prospecto>0) {
													 	$message.= '
													 	<tr>
															 <td style="color: #3c4043; font-family: Montserrat, sans-serif; font-size: calc(1em + 1vw); line-height: 30px; margin: 0px; padding: 0px; word-break: break-word; text-align:center;">
																 <a href="'.$url_factura.'" target="_blank" class="button button1">¿Deseas facturar tu recibo?, da cl&iacute;ck aqu&iacute;</a>
															 </td>
														 </tr>';
													 }

													 $message.= '

												 </tbody>
											 </table>
										 </td>
									 </tr>
								 </tbody>
							 </table>

							 <table style="border-collapse: collapse !important; max-width: 600px; width: 600px;" border="0" width="600" cellspacing="0" cellpadding="0" align="center">
								 <tbody>
									 <tr>
										 <td style="padding: 0px 60px 20px;" align="center" valign="top">
											 <table style="border-collapse: collapse !important;" border="0" cellspacing="0" cellpadding="0">
												 <tbody>
													 <tr>
														 <td style="color: #666; font-family: Montserrat, sans-serif; font-size:10px; line-height: 14px; margin: 0px; padding: 0px; word-break: break-word;" align="center">
															 <div>
																 <p>©2022 Induce Marketing SAS</p>
																 <p>Morelia, Michoac&aacute;n, Mexico</p>
																 <p> &nbsp;</p>
																 <p>Seg&uacute;n lo dispuesto en el Reglamento Mexicano en materia de Protecci&oacute;n de Datos,
																	le informo que los datos de car&aacute;cter personal que nos ha proporcionado son gestionados
																	por el responsable Induce Marketing SAS tras habernos facilitado/cedido sus datos
																	de manera voluntaria, garantizando as&iacute; la seguridad de su datos. La finalidad de este
																 fichero es incorporarte en nuestra lista de correo electr&oacute;nico. El usuario tiene derecho
																 de acceso, rectificaci&oacute;n, limitaci&oacute;n o suprimir los datos enviando un correo electr&oacute;nico
																 a soporte@induce.mx desde la direcci&oacute;n que usamos para el alta as&iacute; c&oacute;mo realizar una
																 reclamaci&oacute;n a la autoridad de control.</p>
																 <p style="font-weight:bold; color:#FF0000; margin: 10px; padding: 10px; "><a href="https://www.induce.mx" style="color:#006AB3;">https://www.induce.mx</a></p>
															 </div>
														 </td>
													 </tr>
												 </tbody>
											 </table>
										 </td>
									 </tr>
								 </tbody>
							 </table>


						 </td>
						 </tr>
					 </tbody>
				 </table>

  </body>
</html>';
?>