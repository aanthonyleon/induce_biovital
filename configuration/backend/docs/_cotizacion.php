<?php 
  include_once("../../private/conexion.php");
  include_once("../../helpers/few-words.php");
  include_once("../../helpers/number-letters.php");
  include_once("../../helpers/formats-date.php");
  include_once("../../helpers/identificador.php");

  if (!empty($_GET['_id_p_s']) && !empty($_GET['_id_prospecto']) && !empty($_GET['codigo']) && !empty($_GET['id_cotizacion']) && !empty($_GET['tiempoMaximo'])) {
    $_id_p_s       = $_GET['_id_p_s'];
    $_id_prospecto = $_GET['_id_prospecto'];
    $codigo        = $_GET['codigo'];
    $id_cotizacion = $_GET['id_cotizacion'];
    $tiempoMaximo  = $_GET['tiempoMaximo'];
    
    $_descuento           = $_GET['descuento'];
    $_check_descuento_iva = $_GET['check_descuento_iva'];

    if(!empty($_GET['fecha'])){
      $fecha = $_GET['fecha'];
      $fecha = fecha($fecha);
    }else{
      $fecha = date("d-m-Y");
      $fecha = fecha($fecha);
    }

    $nombre_archivo      = "IM_" . $id_cotizacion . '_' . uniqid() . '.pdf';
    $radd_pdf_cotizacion = $mysqli->query("UPDATE `cotizaciones` SET `pdf`='$nombre_archivo' WHERE id=$id_cotizacion");
    
    $list_services  = "";
    $list_personal  = "";
    $list_cuadrilla = "";
  
    $rprospecto_details = $mysqli->query("SELECT * FROM prospecto WHERE id=$_id_prospecto");
    if ($rprospecto_details)
    {
      if (mysqli_num_rows($rprospecto_details)>0) {
        while($array = $rprospecto_details->fetch_object())
        {
          $user_nombre            = $array->nombre;
          $user_apellidos         = $array->apellidos;
          $user_empresa           = $array->empresa;
          $user_direccion         = $array->direccion;
          $user_puesto            = $array->puesto;
          $user_email             = $array->email;
          $user_telefono_oficina  = $array->telefono_oficina;
          $user_telefono_whatsapp = $array->telefono_whatsapp;
        }
      
      if(empty($user_nombre)){ $user_nombre = "N/A"; }
      if(empty($user_empresa)){ $user_empresa = "N/A"; }
      if(empty($user_direccion)){ $user_direccion = "N/A"; }
      if(empty($user_email)){ $user_email = "N/A"; }
      if(empty($user_telefono_oficina)){ $user_telefono_oficina = "N/A"; }
      if(empty($user_telefono_whatsapp)){ $user_telefono_whatsapp = "N/A"; }
      }
    }

    $rprospecto_servicio_details = $mysqli->query("SELECT * FROM prospecto_servicios WHERE id=$_id_p_s AND id_prospecto=$_id_prospecto");
    if (mysqli_num_rows($rprospecto_servicio_details)>0) {
      while($array = $rprospecto_servicio_details->fetch_object())
      {
        $codigo         = $array->codigo;
        $date_register  = $array->date_register;
      }
    }

    $rservice_lista = $mysqli->query("SELECT * FROM prospecto_servicios_lista WHERE id_servicio_codigo=$_id_p_s ORDER BY id DESC");
    $rservicios = $mysqli->query("SELECT * FROM servicios ORDER BY servicio ASC");
    $rprospecto_equipo = $mysqli->query("SELECT * FROM prospecto_equipo WHERE id_prospecto=$_id_prospecto AND id_servicio=$_id_p_s");
    $rnotas = $mysqli->query("SELECT * FROM prospecto_notas WHERE id_prospecto=$_id_prospecto AND id_servicio=$_id_p_s");
    $rnotas_comerciales = $mysqli->query("SELECT * FROM notas WHERE status='true' ORDER BY id DESC");
    $rnotas_comerciales_prospecto = $mysqli->query("SELECT * FROM prospecto_notas_comerciales WHERE id_prospecto=$_id_prospecto AND id_servicio=$_id_p_s ORDER BY id DESC");
?>

<head>
  <title>Cotizaci&oacute;n - <?php echo $codigo; ?></title>
  
  <link rel="stylesheet" type="text/css" href="../../../../sistema/assets/css/bootstrap.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">



  <link rel="shortcut icon" href="../../favicon.ico">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<style type="text/css">
		
		html, body {
  margin: 0;
  padding: 0;
 font-family:montserratregular;			
}
    

  .bg-dark {
	 background-color: #111;
	  
	 height: 150px; /* You must set a specified height */
  	 background-size: cover; /* Resize the background image to cover the entire container */
  	 background-repeat: no-repeat, repeat;
     color:#000;
	  align-items: center;
	  padding: 0px 13px;
  }

  .bg-white  {
    color:#fff;
    margin-top: 0px;
    width: 100%;
    padding: 10px 15px;
  }

  .container{
 	 width: 100%;
  }
		
.ficha{
margin-top: -20px; /* Ajusta el valor negativo según tus necesidades */
  width: 100%;
  border-top: none; /* Elimina el borde superior */
	padding-top:20px;
	padding-bottom:20px;
	color:#fff;
  }

tbody tr:nth-child(odd) {
  background-color: #ddd;
}

tbody tr:nth-child(even) {
  background-color: #fff;
}

tbody tr {
}

thead tr {
	background-color: #000;
	color:#fff;
}

 body {
            background-color: #fff;
            margin: 0;
font-family:montserratregular;        }
        h1, h2, h3, h4, h5, h6 {
font-family:montserratregular;		}
		
  </style> 

</head>
  <body>
	  
	   <div style="background-color: #fff; color:#000;">
          <div class="table-responsive">
            <table class="text-white">
                  <tr>
                  <td style="width: 400px; color:#000; padding-bottom: 15px; padding-top: 15px; padding-left: 20px; padding-right: 20px; "><h2>Propuesta económica</h2></td>
                  <td colspan="2" style=" color:#fff; background-color: #6a9bf4; padding-bottom: 15px; padding-top: 15px; padding-left: 20px; padding-right: 50px;">
					  <b>Folio:</b> <?php echo $codigo; ?><br>
					  <b>Fecha:</b> <?php echo $fecha; ?><br><br>
					  <h2><?php echo $user_nombre; ?> <?php echo $user_apellidos; ?></h2>
					  <b>Tel&eacute;fono:</b> <?php echo $user_telefono_oficina; ?><br>
					  
					  <b>Empresa:</b> <?php echo $user_empresa; ?><br>
					  <b>Email:</b> <?php echo $user_email; ?>
					  </td>
					  
                </tr>
            </table>
          </div>
        </div>
	  
	  
      <div class="container">

        <div class="bg-white">
          <div class="table-responsive">
            <?php if (mysqli_num_rows($rservice_lista)>0) { ?>
            <table style="width: 100%; border-radius: 10px;">
              <thead>
               <tr>
                       <th scope="col" class="table-column-pr-0 text-left text-white" style="width: 720px; padding-bottom: 15px; padding-top: 15px; padding-left: 20px; padding-right: 20px; "><h3>Descripci&oacute;n</h3></th>

      <th scope="col" class="text-left text-white" style="width: 80px; padding-left: 20px; padding-right: 20px;"><h3>Precio</h3></th>
               </tr>
              </thead>
				<tbody>
              <?php 
                $cont = 0;
                $total_monto_servicio = 0;
                $iva = 0;
                $descuento_total = 0;

                $subtotal = 0;
                if ($rservice_lista){
                  while($array = $rservice_lista->fetch_object())
                  {
                    $id_service_lista = $array->id;
                    $id_servicio      = $array->id_servicio;
                    $descripcion      = $array->descripcion;
                    $unidad           = $array->unidad;
                    $precio           = $array->precio;
                    $cantidad         = $array->cantidad;
                    $otro             = $array->otro;
                    $nombre           = $array->nombre;

                    $total_monto_servicio+= $precio;
                    $cont++;
                    // $descripcion = ucfirst(mb_strtolower($descripcion,"UTF-8"));
                    $descripcion = str_replace("<ul>",'<ul class="liststyle">',$descripcion);

                    // $rservice_info = $mysqli->query("SELECT * FROM servicios WHERE id=$id_servicio");
                    // if (mysqli_num_rows($rservice_info)>0) {
                    //   while($array = $rservice_info->fetch_object())
                    //   {
                    //     $servicio = $array->servicio;
                    //   }
                    // }else{
                    //   $servicio = "";
                    // }
              ?>

                <tr>
                  <td class="table-column-pr-0 text-left text-muted" style="width: 720px; padding-left: 20px; padding-right: 20px; padding-top:20px;">
					<b><?php echo $nombre; ?></b>
                    <br><br>
                    <?php echo $descripcion; ?>
                    <br><br>
                  </td>
                  <td class="text-left text-muted " style="width: 80px; padding-left: 20px; padding-right: 20px; vertical-align: top; padding-top:20px;"><b>$<?php echo number_format($precio,2); ?></b>
                    <br><br>
                  </td>
                </tr>
              <?php 
                  }
                }

                $subtotal = $total_monto_servicio;

                $iva = $total_monto_servicio * 0.16;

                // lleva iva y descuento
                if ($_check_descuento_iva == "true1") {
                  // $descuento_total = (($total_monto_servicio + $iva) * $_descuento) / 100;
                  $descuento_total = ($total_monto_servicio * $_descuento) / 100;
					                  $descuento_total = round($descuento_total, 2);
                  $iva = ($total_monto_servicio - $descuento_total) * 0.16;

                  $total_monto_servicio+= $iva;
                  $total_monto_servicio-= $descuento_total;
                }else if ($_check_descuento_iva == "true2") {
                  $descuento_total = ($total_monto_servicio * $_descuento) / 100;

                  $descuento_total = round($descuento_total, 2);

                  // $total_monto_servicio+= $iva;
                  $total_monto_servicio-= $descuento_total;
                }else if ($_check_descuento_iva == "true3") {
                  $total_monto_servicio+= $iva;
                  // $total_monto_servicio+= $descuento_total;
                }else if ($_check_descuento_iva == "true4") {

                }
    
                $whole    = intval($total_monto_servicio);
                $decimal1 = ($total_monto_servicio) - $whole;
                $decimal2 = round($decimal1, 2);
                $decimals = substr($decimal2, 2);
                if ($decimals == 0) { $decimals = "00"; }
                if ($decimals == 1) { $decimals = "10"; }
                if ($decimals == 2) { $decimals = "20"; }
                if ($decimals == 3) { $decimals = "30"; }
                if ($decimals == 4) { $decimals = "40"; }
                if ($decimals == 5) { $decimals = "50"; }
                if ($decimals == 6) { $decimals = "60"; }
                if ($decimals == 7) { $decimals = "70"; }
                if ($decimals == 8) { $decimals = "80"; }
                if ($decimals == 9) { $decimals = "90"; }
              ?>
              </tbody>
            </table>
            <?php } ?>
          </div>
        </div>

        <div class="bg-white">
          <div class="table-responsive">
            <table class="mt-2">
              <thead>
               <tr></tr>
              </thead>
              <tbody>
                <tr>
                  <td style="width:530px; background-color:white;"></td>
                  <td style="background-color:white;"><b>Total de tiempo:</b></td>
                  <td><b><?php echo $tiempoMaximo; ?></b></td>
                </tr>

                <tr>
				          <td style="width:530px; background-color:white;"></td>
                  <td style="background-color:white;"><b>Subtotal:</b></td>
                  <td><b>$<?php echo number_format($subtotal,2); ?></b></td>
                </tr>
                <!-- true1
                  + descuento + iva

                true2
                  + descuento - iva

                true3
                  - descuento + iva

                true4
                  - descuento - iva -->

                <?php if ($_check_descuento_iva == "true1") { ?>
                <tr>
					     <td></td>
                  <td><b>Descuento (<?php echo $_descuento; ?>%):</b></td>
                  <td><b>$<?php echo number_format($descuento_total,2); ?></b></td>
                </tr>

                <tr>
				 <td style="background-color:white;"></td>
                  <td style="background-color:white;"><b>IVA (16%):</b></td>
                  <td><b>$<?php echo number_format($iva,2); ?></b></td>
                </tr>
                <?php } ?>

                <?php if ($_check_descuento_iva == "true2") { ?>
                <tr>
					<td></td>
                  <td><b>Descuento (<?php echo $_descuento; ?>%):</b></td>
                  <td><b>$<?php echo number_format($descuento_total,2); ?></b></td>
                </tr>

                <tr>
                  <td style="background-color:white;"></td>
                  <td style="background-color:white;"><b>IVA (16%):</b></td>
                  <td ><b>No aplica</b></td>
                </tr>
                <?php } ?>

                <?php if ($_check_descuento_iva == "true3") { ?>
                <tr>
                  <td></td>
                  <td><b>Descuento (0%):</b></td>
                  <td><b>No aplica</b></td>
                </tr>

                <tr>
                  <td style="background-color:white;"></td>
                  <td style="background-color:white;"><b>IVA (16%):</b></td>
                  <td><b>$<?php echo number_format($iva,2); ?></b></td>
                </tr>
                <?php } ?>

                <?php if ($_check_descuento_iva == "true4") { ?>
                <tr>
                  <td></td>
                  <td><b>Descuento (0%):</b></td>
                  <td><b>No aplica</b></td>
                </tr>

                <tr>
                  <td></td>
                  <td style="background-color:white;"><b>IVA (16%):</b></td>
                  <td><b>No aplica</b></td>
                </tr>
                <?php } ?>

                <!-- <?php // if ($_check_descuento_iva == "true3" || $_check_descuento_iva == "true4") { ?>
                <tr>
                  <td></td>
                  <td><b>IVA (16%):</b></td>
                  <td><b>$<?php // echo number_format($iva,2); ?></b></td>
                </tr>
                <?php // } ?>

                <?php // if ($_check_descuento_iva == "true1" || $_check_descuento_iva == "true2") { ?>
                <tr>
                  <td></td>
                  <td><b>Descuento (<?php // echo $_descuento; ?>%):</b></td>
                  <td><b>$<?php // echo number_format($descuento_total,2); ?></b></td>
                </tr>
                <?php // } ?> -->

                <tr>
                  <td style="font-family:montserratregular;">
                    <?php echo ucfirst(convertir(intval(($total_monto_servicio)))); ?> pesos <?php echo ($decimals); ?>/100 M.N.
                  <br>
                  </td>
                  <td><b>Total:</b></td>
                  <td><b>$<?php echo number_format($total_monto_servicio,2); ?></b></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="container">
          <div class="table-responsive" style="font-family:montserratregular;">

            <div class="text-left text-muted " style=" padding-left: 20px; padding-right: 20px; vertical-align: top; padding-top:20px;">
              <?php if (mysqli_num_rows($rnotas)>0 || mysqli_num_rows($rnotas_comerciales)>0) { ?>
              <b>Condiciones del servicio:</b><br><br>
              <?php } ?>
              
              <?php 
                if (mysqli_num_rows($rnotas)>0) {
                  if ($rnotas){
                    while($array = $rnotas->fetch_object())
                    {
                      $nota = $array->nota;
                      echo $nota . "<br>";
                    }
                  }
                }else{
                  echo "";
                }
              ?>
              <?php 
                if (mysqli_num_rows($rnotas_comerciales)>0) {
                  if ($rnotas_comerciales){
                    while($array = $rnotas_comerciales->fetch_object())
                    {
                      $nota = $array->nota;
                      echo $nota . "<br>";
                    }
                  }
                }
              ?>
            </div>
          </div>
        </div>

      </div>
    
    </div>

  </body>
<?php 
  }else{
//     header("Location: ./index");
	  echo "faltan datos";
  }
?>