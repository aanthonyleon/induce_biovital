<?php 
  include_once("../../private/conexion.php");
  include_once("../../helpers/few-words.php");
  include_once("../../helpers/number-letters.php");
  include_once("../../helpers/formats-date.php");
  include_once("../../helpers/identificador.php");

  if (!empty($_GET['_id_p_s']) && !empty($_GET['_id_prospecto']) && !empty($_GET['codigo']) && !empty($_GET['id_recibo'])) {
    $_id_p_s       = $_GET['_id_p_s'];
    $_id_prospecto = $_GET['_id_prospecto'];
    $codigo        = $_GET['codigo'];
    $id_recibo = $_GET['id_recibo'];

    $_descuento           = $_GET['descuento'];
    $_check_descuento_iva = $_GET['check_descuento_iva'];

    if(!empty($_GET['fecha'])){
      $fecha = $_GET['fecha'];
      $fecha = fecha($fecha);
    }else{
      $fecha = date("d-m-Y");
      $fecha = fecha($fecha);
    }

    // $nombre_archivo      = $id_recibo . '___' . createRandomID() . generateRandomStringdos() . '.pdf';
    $nombre_archivo      = "IM_" . $id_recibo . '_' . uniqid() . '.pdf';
    $radd_pdf_cotizacion = $mysqli->query("UPDATE `recibos_pago` SET `pdf`='$nombre_archivo' WHERE id=$id_recibo");
    
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

    // GET INFO RECIBO
    $rrecibo_info = $mysqli->query("SELECT * FROM recibos_pago WHERE id=$id_recibo");
    if ($rrecibo_info)
    {
      if (mysqli_num_rows($rrecibo_info)>0) {
        while($array = $rrecibo_info->fetch_object())
        {
          $id_contrato_relacionado = $array->id_contrato_relacionado;
          $total                   = $array->total;
          $porcentaje_pago         = $array->porcentaje_pago;
          $fecha_vencimiento       = $array->fecha_vencimiento;
        }
      }else{
        $id_contrato_relacionado = 0;
        $total                   = 0;
        $porcentaje_pago         = 0;
        $fecha_vencimiento       = "No se encontro.";
      }
    }

    // GET INFO CONTRATO
    $rget_contrato = $mysqli->query("SELECT * FROM ordenes_servicio WHERE id=$id_contrato_relacionado");
    if ($rget_contrato)
    {
      if (mysqli_num_rows($rget_contrato)>0) {
        while($array = $rget_contrato->fetch_object())
        {
          $contrato_pago = $array->pago;
        }
      }else{
        $contrato_pago = "";
      }
    }

    $total_antes_iva = $total;

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
    $rnotas_comerciales_prospecto = $mysqli->query("SELECT * FROM prospecto_notas_comerciales WHERE id_prospecto=$_id_prospecto AND id_servicio=$_id_p_s ORDER BY id DESC");
?>

<head>
  <title>Recibo de pago - <?php echo $codigo; ?></title>
  <link rel="stylesheet" type="text/css" href="../../../../sistema/assets/css/bootstrap.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../../../sistema/assets/css/recibo_pago.css">
  <link rel="shortcut icon" href="../../favicon.ico">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
  <body style="font-family:montserratregular;"> 
    
<section class="bg-white">
    <div class="container bg-white">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td class="bg-white"  style="font-family:montserratregular; text-align: left; padding-left: 10px; padding-right: 10px; padding-top: 10px; padding-bottom: 10px; vertical-align: top;">
                       <img src="https://induce.mx/assets/img/logo/logo.svg" alt="Logo" class="logo" width="150px">
            
            
                    </td>
          <td class="bg-white"  style=" width:290px; font-family:montserratregular; text-align: left; padding-left: 10px; padding-right: 10px; padding-top: 10px; padding-bottom: 10px; ">
                        <p style="font-family:montserratregular;"><b><?php echo $user_nombre; ?> <?php echo $user_apellidos; ?></b></p>           <b>Tel&eacute;fono:</b> <?php echo $user_telefono_oficina; ?><br>
            <b>Email:</b> <?php echo $user_email; ?><br>
            <b>Empresa:</b> <?php echo $user_empresa; ?><br>
            
            
                    </td>
                    <td class="bg-white" style="font-family:montserratregular; text-align: left; padding-left: 10px; padding-right: 10px; padding-top: 10px; padding-bottom: 10px; " >
            <p style="font-family:montserratregular; color:#ffc700;"><b>Recibo por pagar</b></p>
            <p style="color:#ffc700;"> <b>Folio:</b> RIM_0000<?php echo $id_recibo; ?></p>
            
            
            <p><b>Fecha:<br></b> <?php echo fecha($fecha_vencimiento); ?></p>


                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
    
    
  <section class="bg-white">
    <div class="container">
      <?php if (mysqli_num_rows($rservice_lista)>0) { ?>
      <table style="width: 100%; font-family:montserratregular;">
        <thead>
          <tr>
            <th colspan="2" style="color: #fff; text-align: left; padding-left: 10px; padding-right: 10px; padding-top: 10px; padding-bottom: 10px; ">Concepto</th>
            <th style="width: 150px; color: #fff; text-align: left; padding-left: 10px; padding-right: 10px; padding-top: 10px; padding-bottom: 10px; ">Precio</th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $cont                 = 0;
          $total_monto_servicio = 0;
          $iva                  = 0;
          $descuento_total      = 0;
          $subtotal             = 0;

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

              $rservice_info = $mysqli->query("SELECT * FROM servicios WHERE id=$id_servicio");
              if (mysqli_num_rows($rservice_info)>0) {
                while($array = $rservice_info->fetch_object())
                {
                  $servicio = $array->servicio;
                }
              }else{
                $servicio = "";
              }
          ?>
          <tr>
            <td colspan="2" style="padding-left: 10px; padding-right: 10px; padding-top: 10px; padding-bottom: 10px; "><b><?php echo $nombre; ?></b>
              <?php if ($contrato_pago=="Pago mensual" || $contrato_pago=="Pago anual") { ?>
              <p><b>Vence el: <?php echo fecha($fecha_vencimiento); ?></b> </p>
              <?php } ?>
            </td>
            <td style="padding-left: 10px; padding-right: 10px; padding-top: 10px; padding-bottom: 10px; "><b>$<?php echo number_format($precio,2); ?></b></td>
          </tr>
          <?php 
              }
            }

            $subtotal = $total_monto_servicio;
            $iva      = $total_monto_servicio * 0.16;

            // lleva iva y descuento
            if ($_check_descuento_iva == "true1") {
              // $descuento_total = (($total_monto_servicio + $iva) * $_descuento) / 100;
              $descuento_total = ($total_monto_servicio * $_descuento) / 100;
              $iva = ($total_monto_servicio - $descuento_total) * 0.16;

              $total_monto_servicio+= $iva;
              $total_monto_servicio-= $descuento_total;
            }else if ($_check_descuento_iva == "true2") {
              $descuento_total = ($total_monto_servicio * $_descuento) / 100;

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

            <table style="width: 100%; font-family:montserratregular;">
              <thead>
               <tr>
                 <th class="table-column-pr-0 text-left" style="width: 430px; background-color: #fff; color: #111;">
                  
                 </th>
                 <th class="text-left" style="color: #fff; text-align: left; background-color: #fff; color: #111;" >Subtotal:</th>
                 <th  style="width: 150px; color: #fff; text-align: left; padding-left: 10px; padding-right: 10px;" class="text-left">$<?php echo number_format($subtotal,2); ?></th>
               </tr>
              </thead>
              <tbody>

                <?php if ($_check_descuento_iva == "true1") { ?>
                <tr>
                  <td style="background-color: #fff; color: #111;"></td>
                  <td style="background-color: #fff; color: #111;"><b>Descuento (<?php echo $_descuento; ?>%):</b></td>
                  <td style="padding-left: 10px; padding-right: 10px;"><b>$<?php echo number_format($descuento_total,2); ?></b></td>
                </tr>

                <tr>
                  <td></td>
                  <td><b>IVA (16%):</b></td>
                  <td style="padding-left: 10px; padding-right: 10px;"><b>$<?php echo number_format($iva,2); ?></b></td>
                </tr>
                <?php } ?>

                <?php if ($_check_descuento_iva == "true2") { ?>
                <tr>
                  <td style="background-color: #fff; color: #111;"></td>
                  <td style="background-color: #fff; color: #111;"><b>Descuento (<?php echo $_descuento; ?>%):</b></td>
                  <td style="padding-left: 10px; padding-right: 10px;"><b>$<?php echo number_format($descuento_total,2); ?></b></td>
                </tr>

                <tr>
                  <td></td>
                  <td><b>IVA (16%):</b></td>
                  <td style="padding-left: 10px; padding-right: 10px;"><b>No aplica</b></td>
                </tr>
                <?php } ?>

                <?php if ($_check_descuento_iva == "true3") { ?>
                <tr>
                  <td style="background-color: #fff; color: #111;"></td>
                  <td style="background-color: #fff; color: #111;"><b>Descuento (0%):</b></td>
                  <td style="padding-left: 10px; padding-right: 10px;"><b>No aplica</b></td>
                </tr>

                <tr>
                  <td></td>
                  <td><b>IVA (16%):</b></td>
                  <td style="padding-left: 10px; padding-right: 10px;"><b>$<?php echo number_format($iva,2); ?></b></td>
                </tr>
                <?php } ?>

                <?php if ($_check_descuento_iva == "true4") { ?>
                <tr>
                  <td style="background-color: #fff; color: #111;"></td>
                  <td style="background-color: #fff; color: #111;"><b>Descuento (0%):</b></td>
                  <td style="padding-left: 10px; padding-right: 10px;"><b>No aplica</b></td>
                </tr>

                <tr>
                  <td></td>
                  <td><b>IVA (16%):</b></td>
                  <td style="padding-left: 10px; padding-right: 10px;"><b>No aplica</b></td>
                </tr>
                <?php } ?>

                <tr>
                  <td style="background-color: #fff; color: #111; padding-left: 10px; padding-right: 10px; padding-top: 0px; padding-bottom: 10px;"><?php echo ucfirst(convertir(intval(($total_monto_servicio)))); ?> pesos <?php echo ($decimals); ?>/100 M.N.</td>
                  <td style="background-color: #fff; color: #111;"><b>Total a pagar:</b></td>
                  <td style="padding-left: 10px; padding-right: 10px;"><b>$<?php echo number_format($total_monto_servicio,2); ?></b></td>
                </tr>
              </tbody>
            </table>
      
        </div>
    </section>


  </body>



<?php 
  }else{
    header("Location: ./index");
  }
?>