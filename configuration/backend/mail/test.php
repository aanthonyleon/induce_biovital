<?php 
$message = '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantilla de Correo Electrónico</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Agregar las fuentes de Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Valera+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,500&display=swap" rel="stylesheet">
    <style>
		
		body, html {
        margin: 0 !important;
        padding: 0 !important;
        border: 0 !important;
		background-color: #111111;
    }
	
        body {
            background-color: #111111;
            margin: 0;
            font-family: "Montserrat", sans-serif; /* Cambiar la fuente a Montserrat */
			font-size: 18px; /* Tamaño de fuente 10px */

        }
		a {
			text-decoration: none; /* Elimina el subrayado de los enlaces */
			color: inherit; /* Hereda el color del texto del elemento padre */
		}

		/* Si deseas un color específico para los enlaces no visitados, puedes agregar lo siguiente: */
		a:link {
			color: tu-color-aqui;
		}

		/* Si deseas un color específico para los enlaces visitados, puedes agregar lo siguiente: */
		a:visited {
			color: tu-color-aqui;
		}

		/* Si deseas un color específico para los enlaces al pasar el cursor, puedes agregar lo siguiente: */
		a:hover {
			color: tu-color-aqui;
		}

        h1, h2, h3, h4, h5, h6 {
            font-family: "Valera Round", sans-serif; /* Aplicar la fuente Valera Round a los encabezados */
        }
        /* Establece un ancho máximo para el contenido en dispositivos móviles */
        .container {
            max-width: 600px;
            padding: 20px;
            border-radius: 5px;
            margin: 0 auto;
        }
        /* Estilos para las secciones con fondos */
        .black-bg {
            background-color: #111;
            color: #fff;
        }
        .orange-bg {
            background-color: #ffA500;
            color: #000;
			
        }
		
		.espacio-top {
			margin-top: 30px;
			margin-bottom: 0px;
		}
		
		.espacio-vertical {
			margin-top: 30px;
			margin-bottom: 30px;
		}


        /* Estilos para el logo */
        .logo {
            display: block;
            margin: 0 auto;
            width: 200px; /* Ancho de 200px */
        }
        /* Estilos para el encabezado debajo del logo */
        .header {
            text-align: center;
            margin: 10px 0;
        }
        /* Estilos para la imagen responsiva */
        .responsive-img {
            max-width: 100%;
            height: auto;
        }

         /* Estilos para el botón blanco */
         .white-btn {
            background-color: #fff;
            color: #000;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 18px; /* Tamaño de fuente 10px */
            font-weight: 400;        }

        /* Estilos para el pie de página */
        .footer {
            background-color: #111;
            color: #fff;
            text-align: center;
            padding: 10px;
            font-size: 14px; /* Tamaño de fuente 10px */
        }

        

    </style>
</head>
<body>
    <!-- Sección con fondo negro y logo -->
    <section class="black-bg">
        <div class="container">
            <img src="https://induce.mx/assets/img/logo/logo-light.svg" alt="Logo" class="logo">
            <div class="header">
                <img src="https://induce.mx/assets/img/encabezado.png" alt="Imagen Responsiva" class="responsive-img">
            </div>
        </div>
    </section>

    <!-- Sección con fondo negro -->
    <section class="orange-bg">
        <div class="container">
            <p>'.$data_mensaje.'</p>
            <!-- formato de contenido <p>Aquí va el contenido de la sección con fondo negro. Limitado a 600px de ancho.</p> -->
            <div class="d-flex justify-content-center espacio-vertical">
                <a href="'.$url.'" class="white-btn text-primary">Ver comprobante</a><br>
            </div>
			
			<!-- facturacion pendiente
			<p class="espacio-top">¿Deseas facturar tu recibo?</p><br>
			<div class="d-flex justify-content-center">
			';
          if ($id_prospecto>0) {
            $message.= '
          <a href="'.$url_factura.'" class="white-btn text-primary" >Facturar recibo</a>';
        }
        $message.= '
			</div> -->
		
        </div>
    </section>

    <!-- Sección con fondo naranja 
<section class="orange-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="https://induce.mx/assets/img/promo.png" alt="Imagen Responsiva" class="responsive-img">
            </div>
            <div class="col-md-6">
                <p>Aquí va el contenido de la sección con fondo naranja. Limitado a 600px de ancho.</p>
                <a href="#" class="btn btn-primary">Botón 1</a>
                <a href="#" class="btn btn-secondary">Botón 2</a>
            </div>
        </div>
    </div>
</section> -->


    <!-- Sección de pie de página con fondo negro -->
    <section class="black-bg">
        <div class="container footer">
            <p>©2022 Induce Marketing SAS</p>
            <p>Morelia, Michoacán, Mexico</p>
            <p>Según lo dispuesto en el Reglamento Mexicano en materia de Protección de Datos,
            le informo que los datos de carácter personal que nos ha proporcionado son gestionados
            por el responsable Induce Marketing SAS tras habernos facilitado/cedido sus datos de 
            manera voluntaria, garantizando así la seguridad de su datos. La finalidad de este 
            fichero es incorporarte en nuestra lista de correo electrónico. 
            El usuario tiene derecho de acceso, rectificación, limitación o suprimir los datos 
            enviando un correo electrónico a soporte@induce.mx desde la dirección que usamos para 
            el alta así cómo realizar una reclamación a la autoridad de control.</p>
            <p>https://www.induce.mx</p>
        </div>
    </section>
</body>
</html>
';

// echo $message;

?>
