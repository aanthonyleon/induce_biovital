<?php 
$message = '<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Induce Marketing">
    <title>Induce Marketing</title>

    <!-- Bootstrap core CSS -->
    <link href="https://induce.mx/sistema/mail/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://induce.mx/sistema/mail/assets/css/correo.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">

  </head>
  <body style="font-family: Montserrat, sans-serif;">

    <header class="site-header bg-white py-1">
      <nav class="container d-flex flex-column flex-md-row justify-content-between">
        <img src="https://induce.mx/sistema/mail/assets/imagenes/logo.jpg" width="200px">
      </nav>
    </header>

    <main>
      <div class="position-relative overflow-hidden p-3 p-md-2 m-md-3 text-center">
        <div class="col-md-8 p-lg-5 mx-auto">
          <img src="https://induce.mx/sistema/mail/assets/imagenes/header.png" class="w-100">
        </div>
       
      </div>


      <div class="position-relative overflow-hidden p-3 p-md-2 m-md-3 text-center bg-light">
        <div class="col-md-8 p-lg-5 pt-3 pb-3 mx-auto">
          <!-- <p class="lead fw-normal" >Tienes una nueva cotizacion</p> -->
          <p class="lead fw-normal" >'.$data_mensaje.'</p>
          <p style="color: #3c4043; font-family: Montserrat, sans-serif; font-size: calc(1em + 1vw); line-height: 30px; margin: 0px; padding: 0px; word-break: break-word; text-align:center;">
            <a href="'.$url.'" target="_blank" class="button button1">Descargar</a>
          </p>';

          if ($id_prospecto>0) {
            $message.= '
            <p style="color: #3c4043; font-family: Montserrat, sans-serif; font-size: calc(1em + 1vw); line-height: 30px; margin: 0px; padding: 0px; word-break: break-word; text-align:center;">
                 <a href="'.$url_factura.'" target="_blank" class="button button1">¿Deseas facturar tu recibo?, da cl&iacute;ck aqu&iacute;</a>
            </p>';
           }

           $message.= '
        </div>
      </div>
    </main>

    <footer class="container py-5">
      <div class="row">
        <div class="col-12 col-md text-center">
          <small class="d-block mb-3 text-muted">
            ©2022 Induce Marketing SAS</br>
            Morelia, Michoacán, Mexico
          </small>
          <small class="d-block mb-3 text-muted col-md-8 mx-auto " style="font-size: 10px;">
            Según lo dispuesto en el Reglamento Mexicano en materia de Protección de Datos, le informo que los datos de carácter personal que nos ha proporcionado son gestionados por el responsable Induce Marketing SAS tras habernos facilitado/cedido sus datos de manera voluntaria, garantizando así la seguridad de su datos. La finalidad de este fichero es incorporarte en nuestra lista de correo electrónico. El usuario tiene derecho de acceso, rectificación, limitación o suprimir los datos enviando un correo electrónico a soporte@induce.mx desde la dirección que usamos para el alta así cómo realizar una reclamación a la autoridad de control.
            </br></br>
            <a href="https://www.induce.mx">https://www.induce.mx</a>
          </small>
        </div>
      </div>
    </footer>
  </body>
</html>';

 ?>