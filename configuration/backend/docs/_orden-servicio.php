<?php 
  include_once("../../private/conexion.php");
  include_once("../../helpers/few-words.php");
  include_once("../../helpers/number-letters.php");
  include_once("../../helpers/formats-date.php");
  include_once("../../helpers/identificador.php");
  include_once('../../helpers/get_decimales_total.php');
  include_once('../../helpers/session_check.php');

  if (!empty($_GET['_id_p_s']) && !empty($_GET['_id_prospecto']) && !empty($_GET['codigo']) && !empty($_GET['id_orden_servicio']) && !empty($_GET['pago_orden'])) {
    $_id_p_s           = $_GET['_id_p_s'];
    $_id_prospecto     = $_GET['_id_prospecto'];
    $codigo            = $_GET['codigo'];
    $id_orden_servicio = $_GET['id_orden_servicio'];
    $pago_orden        = $_GET['pago_orden'];

    $_descuento           = $_GET['descuento'];
    $_check_descuento_iva = $_GET['check_descuento_iva'];

    $clausula_iva = "";
    $fecha_vencimiento = "";

    if ($_check_descuento_iva === "true1" || $_check_descuento_iva === "true3") {
      $clausula_iva = " ";
    }else{
      $clausula_iva = " El precio estipulado no incluye los impuestos aplicables previstos en la legislación mexicana.";
    }

    if(!empty($_GET['fecha'])){
        $fecha = $_GET['fecha'];
        $fecha = fecha($fecha);
        $fecha_recibida = $_GET['fecha'];
    }else{
        $fecha = date("d-m-Y");
        $fecha = fecha($fecha);
        $fecha_recibida = "";
    }

    if ($pago_orden==="Único") {
      if ($fecha_recibida=="0000-00-00" || empty($fecha_recibida)) {
        $fecha_contrato = date('Y-m-d');
      }else{
        $fecha_contrato = $fecha;
      }

      $fecha_vencimiento = date("Y-m-d");

    }else if ($pago_orden==="2 exhibiciones") {
      if ($fecha_recibida=="0000-00-00" || empty($fecha_recibida)) {
        $fecha_contrato = date('Y-m-d');
      }else{
        $fecha_contrato = $fecha;
      }

      $fecha_vencimiento = date("Y-m-d",strtotime($fecha_contrato."+ 1 month"));
    }else if ($pago_orden==="3 exhibiciones") {
      if ($fecha_recibida=="0000-00-00" || empty($fecha_recibida)) {
        $fecha_contrato = date('Y-m-d');
      }else{
        $fecha_contrato = $fecha;
      }

      $fecha_vencimiento = date("Y-m-d",strtotime($fecha_contrato."+ 1 month"));
    }else if ($pago_orden==="Pago mensual") {
      if ($fecha_recibida=="0000-00-00" || empty($fecha_recibida)) {
        $fecha_contrato = date('Y-m-d');
      }else{
        $fecha_contrato = $fecha;
      }

      $fecha_vencimiento = date("Y-m-d",strtotime($fecha_contrato."+ 1 month"));
    }else if ($pago_orden==="Pago anual") {
      if ($fecha_recibida=="0000-00-00" || empty($fecha_recibida)) {
        $fecha_contrato = date('Y-m-d');
      }else{
        $fecha_contrato = $fecha;
      }

      $fecha_vencimiento = date("Y-m-d",strtotime($fecha_contrato."+ 1 year"));
    }

    $total_monto_servicio = 0;
    
    //$nombre_archivo          = $id_orden_servicio . '___' . createRandomID() . generateRandomStringdos() . '.pdf';
	  $nombre_archivo      = "IM_" . $id_orden_servicio . '_' . uniqid() . '.pdf';
    $radd_pdf_orden_servicio = $mysqli->query("UPDATE `ordenes_servicio` SET `pdf`='$nombre_archivo', fecha_vencimiento='$fecha_vencimiento' WHERE id=$id_orden_servicio");
    
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
      }
    }

    if(empty($user_nombre)){ $user_nombre = "N/A"; }
    if(empty($user_apellidos)){ $user_apellidos = ""; }
    if(empty($user_empresa)){ $user_empresa = "N/A"; }
    if(empty($user_direccion)){ $user_direccion = "N/A"; }
    if(empty($user_puesto)){ $user_puesto = "N/A"; }
    if(empty($user_email)){ $user_email = "N/A"; }
    if(empty($user_telefono_oficina)){ $user_telefono_oficina = "N/A"; }
    if(empty($user_telefono_whatsapp)){ $user_telefono_whatsapp = "N/A"; }    

    $rprospecto_servicio_details = $mysqli->query("SELECT * FROM prospecto_servicios WHERE id=$_id_p_s AND id_prospecto=$_id_prospecto");
    if (mysqli_num_rows($rprospecto_servicio_details)>0) {
      while($array = $rprospecto_servicio_details->fetch_object())
      {
        $codigo               = $array->codigo;
        $servicio_nombre      = $array->nombre;
        $servicio_descripcion = $array->descripcion;
        $date_register        = $array->date_register;
      }
    }

    $rservice_lista = $mysqli->query("SELECT * FROM prospecto_servicios_lista WHERE id_servicio_codigo=$_id_p_s ORDER BY id DESC");
    $rservicios = $mysqli->query("SELECT * FROM servicios ORDER BY servicio ASC");
    $rprospecto_equipo = $mysqli->query("SELECT * FROM prospecto_equipo WHERE id_prospecto=$_id_prospecto AND id_servicio=$_id_p_s");
    $rnotas = $mysqli->query("SELECT * FROM prospecto_notas WHERE id_prospecto=$_id_prospecto AND id_servicio=$_id_p_s");
    $rnotas_gral = $mysqli->query("SELECT * FROM notas");
    $rprospecto_facturacion = $mysqli->query("SELECT * FROM prospecto_facturacion WHERE id_prospecto=$_id_prospecto AND selected='true' ORDER BY id DESC LIMIT 1");
    $rprospecto_equipo_proteccion = $mysqli->query("SELECT * FROM prospecto_equipo_proteccion WHERE id_prospecto=$_id_prospecto AND id_servicio=$_id_p_s");
    if ($rprospecto_equipo_proteccion) {
      while($array = $rprospecto_equipo_proteccion->fetch_object())
      {
        $id_equipo_proteccion  = $array->id_equipo_proteccion;

        $rget_ep = $mysqli->query("SELECT * FROM equipo_proteccion WHERE id=$id_equipo_proteccion");
        if ($rget_ep)
        {
          if (mysqli_num_rows($rget_ep)>0) {
            while($array = $rget_ep->fetch_object())
            {
              $equipo_proteccion = $array->equipo_proteccion;
            }
          }else{
            $equipo_proteccion = "No se encontró este dato";
          }
        }

        if (empty($list_personal)) {
          $list_personal = $equipo_proteccion;
        }else{
          $list_personal.= ", " . $equipo_proteccion;
        }

      }
    }
    if ($rprospecto_facturacion)
    {
      if (mysqli_num_rows($rprospecto_facturacion)>0) {
        while($array = $rprospecto_facturacion->fetch_object())
        {
          $rfc = $array->rfc;
        }
      }else{
        $rfc = "No registrado.";
      }
    }

    $rservice_lista_l = $mysqli->query("SELECT * FROM prospecto_servicios_lista WHERE id_servicio_codigo=$_id_p_s");
    if ($rservice_lista_l){
      while($array = $rservice_lista_l->fetch_object())
      {
        $id_servicio_l = $array->id_servicio;
        $precio = $array->precio;
        $total_monto_servicio+= $precio;

        $rservice_info_l = $mysqli->query("SELECT (servicio) FROM servicios WHERE id=$id_servicio_l");
        if (mysqli_num_rows($rservice_info_l)>0) {
          while($array = $rservice_info_l->fetch_object())
          {
           $servicio_l = $array->servicio;
          }
        }else{
          $servicio_l = "";
        }

        if (empty($list_services)) {
          $servicio_l = ucfirst(mb_strtolower($servicio_l,"UTF-8"));
          $list_services = $servicio_l;
        }else{
          $servicio_l = ucfirst(mb_strtolower($servicio_l,"UTF-8"));
          $list_services.= ", " . $servicio_l;
        }
      }
    }

    $rprospecto_cuadrilla = $mysqli->query("SELECT * FROM prospecto_cuadrilla WHERE id_prospecto=$_id_prospecto AND id_servicio=$_id_p_s");
    if ($rprospecto_cuadrilla)
    {
      while($array = $rprospecto_cuadrilla->fetch_object())
      {
        $id_cuadrilla         = $array->id_cuadrilla;
        $cantidad             = $array->cantidad;

        $rget_cuadrilla = $mysqli->query("SELECT * FROM cuadrillas WHERE id=$id_cuadrilla");
        if ($rget_cuadrilla)
        {
          if (mysqli_num_rows($rget_cuadrilla)>0) {
            while($array = $rget_cuadrilla->fetch_object())
            {
              $nombre_cuadrilla = $array->nombre;
            }
          }else{
            $nombre_cuadrilla = "No se encontr&oacute; este dato";
          }
        }

        if (empty($list_cuadrilla)) {
          $list_cuadrilla = "" . $cantidad . " " . $nombre_cuadrilla;
        }else{
          $list_cuadrilla.= ", " . "" . $cantidad . " " . $nombre_cuadrilla;
        }
      }
    }

    $iva = $total_monto_servicio * 0.16;

    if ($_check_descuento_iva == "true1") {
      $descuento_total = (($total_monto_servicio + $iva) * $_descuento) / 100;

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
    if ($decimals == 9) { $decimals = "90"; }?>
  <title>Contrato de servicios - <?php echo $codigo; ?></title>
  <link rel="stylesheet" type="text/css" href="../../assets/css/contrato.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="../../favicon.ico">

  <body style="font-family:montserratregular;">
    <div class="body-pdf " #boby_pdf id="printableArea">
      <div class="header-pdf">      
        <div class="text-center" >
          <div style=" margin-top:10px; text-center font-size: 15px;">
            <h2 style="font-family:montserratregular; font-weight: 300;">Contrato de servicios</h2>
          </div> 
        </div>
      </div>

      <div class="main-pdf">
        <div class="nocolor-table">
          <div class="table-responsive">
            <table >
              <tbody>
                  <tr>
                  <td style="font-family:montserratregular; vertical-align: top; text-align: justify; ">
					Que celebran por una parte el <b>C. <?php echo $user_nombre; ?> <?php echo $user_apellidos; ?></b> en su carácter de Representante de <b> "<?php echo $user_empresa; ?>"</b>, que en lo sucesivo se denominará como el <b>"Cliente"</b> y de otra parte <b>C. <?php echo $INDUCE_PAGE_NAME; ?></b> en su carácter de Representante de <b>"Induce Marketing SAS"</b> como el  prestador de servicios profesionales que en lo sucesivo se denominará como <b>"Prestador"</b>, conforme al tenor de las siguientes Declaraciones y Cláusulas:

					  
				  </td>
                </tr>  
              </tbody>
            </table>
          </div>
        </div>

        <div class="nocolor-table">
          <div class="table-responsive " >
            <table>
              <tbody>
              <tr>
				  <td width="50%" style="font-family:montserratregular; vertical-align: top; text-align: justify; padding-right: 15px;">
					  Declara el <b>"Cliente"</b>:<br>
				
					  <ol>
						  <li value="1">Ser Mexicano, mayor de edad y legítimo representante de la Empresa denominada <b> "<?php echo $user_empresa; ?>"</b> </li>
						  <li>Que para los efectos del presente contrato señala cómo domicilio ubicado en <b> "<?php echo $user_direccion; ?>"</b></li>
					 </ol>


				  </td>
				  
				   <td width="50%" style="font-family:montserratregular; vertical-align: top; text-align: justify; padding-left: 15px;">
					  Declara el <b>"Prestador"</b>:<br>
					   <ol>
						   <li value="1">
                Ser Mexicano, mayor de edad y legítimo representante de la Empresa denominada <b>“Induce Marketing SAS”</b>.</li><li>
                Que para los efectos del presente contrato señala como domicilio el ubicado en <b>Primera Cda. Batalla de Casa Mata #17, Oficina 6, Chapultepec Sur, 58260 Morelia, Michoacán</b></li>
						  </ol>
				  </td>
			   </tr>
              </tbody>
            </table>
          </div>
        </div>
		  
		  
		  <div class="nocolor-table">
          <div class="table-responsive">
            <table >
              <tbody>
                  <tr>
                  	<td style="font-family:montserratregular; vertical-align: top; text-align: center; ">
						Expuesto lo anterior, las partes sujetan sus compromisos a los términos y condiciones en las siguientes,
				  	</td>
                 </tr> 
				 <tr >
				   <td style="font-family:montserratregular; vertical-align: top; text-align: center; margin-top:10px; "><br>
					<h2>CLAUSULAS</h2><br>
				  </td>
			     </tr>
				  <tr >
				   <td style="font-family:montserratregular; vertical-align: top; text-align: justify; margin-top:10px; "><br>
					<b>PRIMERA.- OBJETO DEL CONTRATO.</b> El presente contrato regula el proceso de <b> "<b><?php echo $servicio_nombre; ?></b>"</b> titularidad del <b>“Cliente”</b>. quién será el único propietario de la obra. Los contenidos desarrollados en virtud de este contrato, serán proporcionados en exclusiva por el <b>“Cliente”</b>, siendo los mismos intransferibles a terceros. Los contenidos electrónicos serán en todo caso indicados en el <b>Anexo I</b>. 
					<br>
				   </td>
			     </tr>
				  
				  <tr >
				   <td style="font-family:montserratregular; vertical-align: top; text-align: justify; margin-top:10px; "><br>
					<b>SEGUNDA.- PROPIEDAD INTELECTUAL.</b> El <b>“Cliente”</b> se compromete a proporcionar al <b>“Prestador”</b> material  que no sea ilegal y que no infrinja los derechos de terceras personas, en todo caso deben contar con licencias y permisos necesarios, en especial los referidos a propiedad industrial e intelectual. El “Prestador” reconoce que las herramientas y elementos que utilizará y empleará en el desarrollo del proyecto objeto del contrato, cumplen con las licencias y permisos y no vulneran ninguna ley, ni dañan o lesionan en forma alguna, derechos o intereses de terceros. El “Prestador” renuncia expresamente y de forma definitiva al derecho de ejercitar cualquier tipo de acción referente a los derechos de propiedad intelectual e industrial adquiridos por el “Cliente” mediante la contratación de los servicios profesionales objeto del presente consenso de voluntades, en la inteligencia de que una vez concluido el desarrollo del proyecto, el “Prestador” lo pondrá bajo la única e inmediata disposición del “Cliente”, en los archivos, diseños, esquemas, formatos y condiciones que éste último indique de manera fehaciente, sin que el “Prestador” pueda reservarse ninguna especie de datos, información, accesos, ni derechos sobre los contenidos desarrollados, so pena de indemnizar al “Cliente” por los hechos ilícitos o delitos en lo que pudiera incurrir.
					<br>
				   </td>
			     </tr>			  
				  <tr>
				  <td style="font-family:montserratregular; vertical-align: top; text-align: justify; margin-top:10px; "><br>
					<b>TERCERA.- OBLIGACIONES DEL PRESTADOR.</b> Entregar al “Cliente” los contenidos objeto de la prestación con las condiciones de calidad, en la forma y en los plazos establecidos en el Anexo I y conforme a las mejores prácticas existentes en el mercado. Cumplir con las obligaciones estipuladas en el presente contrato sin retrasos, salvo que éstos sean imputables a indudables errores del “Cliente”. El “Prestador” no responderá de los hechos o circunstancias de fuerza mayor que legalmente encuadren en esa tipicidad y deriven en retrasos o defectos en la entrega del desarrollo de los contenidos objeto del contrato. El mal funcionamiento de cualquiera de los servicios que ocasione la falta recursos necesarios por parte del cliente en el proyecto no son imputables al “Prestador”. Se garantiza que en ningún momento empleará técnicas ilegales (duplicación de contenidos, granjas de enlaces, ni ningunas otras similares o análogas) que puedan suponer algún tipo de penalización para el “Cliente” por parte de los responsables de servicios de búsqueda por Internet.

					<br>
				   </td>
			     </tr>
				  
				  <tr>
				  <td style="font-family:montserratregular; vertical-align: top; text-align: justify; margin-top:10px; "><br>
					<b>CUARTA.-OBLIGACIONES DEL CLIENTE.</b>   Realizar el pago del precio en los términos indicados en la Cláusula Sexta del presente contrato. Proporcionar los contenidos en tiempo y forma en los plazos definidos en el Anexo I. Permitir la promoción del ERP únicamente en el portafolio de proyectos del “Prestador”, con propósitos de promoción personal del mismo. Permitir un link al “Prestador” en el pie de página del ERP con el propósito de promoción personal del mismo. Informar en tiempo y forma al “Prestador” de las posibles modificaciones que consideren necesarias sobre el proyecto inicial, que aparecen enumeradas en el Anexo I. El “Cliente” utilizará para ello los medios de comunicación establecidos en Cláusula Quinta del presente contrato. Entregar al “Prestador” un manual, guía de estilo o similar relativo a su imagen corporativa, para que el “Prestador” pueda garantizar la aplicación exacta de colores y tipografías detallados en la guía cuando deban de ser convertidos a un medio distinto de aquel para el que hubieran sido diseñados especificados.

					<br>
				   </td>
			     </tr>
				  
				 <tr>
				  <td style="font-family:montserratregular; vertical-align: top; text-align: justify; margin-top:10px; "><br>
					<b>QUINTA.- COMUNICACIONES.</b> Las partes se obligan a comunicarse toda la información que pudiera ser necesaria para el correcto desarrollo de la prestación profesional objeto del contrato, cualquier cambio de domicilio o dirección de contacto deberá ser comunicado a la otra parte por escrito y/o de manera electrónica con una antelación mínima de 3 días hábiles. Toda comunicación entre las partes relativa al presente contrato se realizará por escrito o telefónicamente, debiendo quedar siempre constancia o acuse de recibo de una parte a la otra.
					<br>
				   </td>
			     </tr>

          <?php if ($pago_orden === "Único") { ?>
          <tr>
            <td style="font-family:montserratregular; vertical-align: top; text-align: justify; margin-top:10px; "><br>
              <b>SEXTA.- DURACIÓN Y PRECIO.</b> El presente contrato entrará en vigor el mismo día de su firma. El precio a abonar por parte del “Cliente” como pago por la prestación del servicio de <b><?php echo $list_services; ?></b> equivale a <b>$<?php echo number_format($total_monto_servicio,2); ?></b> <b>(<?php echo ucfirst(convertir(intval(($total_monto_servicio)))); ?> pesos <?php echo ($decimals); ?>/100 M.N. Moneda Nacional)</b> único pago.<?php echo $clausula_iva; ?> Si el “Cliente” no abona el precio acordado en plazo o no proporciona en tiempo y forma los contenidos a publicar, el “Prestador” considerará resuelto el contrato, sin reintegrar al “Cliente” cualquier cantidad adelantada y retirando cualquier contenido publicado si el incumplimiento no es subsanado, sin menoscabo de otras acciones legales pertinentes. 
            </td>
          </tr>
          <?php } ?>

          <?php 
            if ($pago_orden === "2 exhibiciones") {

              $porcentaje_2exhibiciones_1 = $_GET['porcentaje_2exhibiciones_1'];
              $porcentaje_2exhibiciones_2 = $_GET['porcentaje_2exhibiciones_2'];

              $total_procentaje1_2_exhibiciones = 0;
              $total_procentaje1_2_exhibiciones = $total_monto_servicio * $porcentaje_2exhibiciones_1 / 100;

              $total_procentaje2_2_exhibiciones = 0;
              $total_procentaje2_2_exhibiciones = $total_monto_servicio * $porcentaje_2exhibiciones_2 / 100;
          ?>
          <tr>
            <td style="font-family:montserratregular; vertical-align: top; text-align: justify; margin-top:10px; "><br>
              <b>SEXTA.- DURACIÓN Y PRECIO.</b> El presente contrato entrará en vigor el mismo día de su firma. El precio a abonar por parte del “Cliente” como pago por la prestación del servicio de <b><?php echo $list_services; ?></b> equivale a <b>$<?php echo number_format($total_monto_servicio,2); ?></b> (<b><?php echo ucfirst(convertir(intval(($total_monto_servicio)))); ?> pesos <?php echo ($decimals); ?>/100 M.N.)</b>. La cantidad estipulada será cubierta en dos exhibiciones, la primera por la cantidad del <b><?php echo $porcentaje_2exhibiciones_1; ?></b>% correspondiente a <b><?php echo number_format($total_procentaje1_2_exhibiciones,2); ?></b> (<b><?php echo ucfirst(convertir(intval(($total_procentaje1_2_exhibiciones)))); ?> pesos <?php echo get_decimales($total_procentaje1_2_exhibiciones); ?>/100)</b> pagadera como anticipo de garantía del servicio de <b><?php echo $list_services; ?></b> por parte del “Prestador”. Y el <b><?php echo $porcentaje_2exhibiciones_2; ?></b>% restante a la entrega del proyecto por la cantidad de <b><?php echo number_format($total_procentaje2_2_exhibiciones,2); ?></b> (<b><?php echo ucfirst(convertir(intval(($total_procentaje2_2_exhibiciones)))); ?> pesos <?php echo get_decimales($total_procentaje2_2_exhibiciones); ?>/100)</b>.<?php echo $clausula_iva; ?> Si el “Cliente” no abona el precio acordado en plazo o no proporciona en tiempo y forma los contenidos a publicar, el “Prestador” considerará resuelto el contrato, sin reintegrar al “Cliente” cualquier cantidad adelantada y retirando cualquier contenido publicado si el incumplimiento no es subsanado, sin menoscabo de otras acciones legales pertinentes
            </td>
          </tr>
          <?php } ?>

          <?php 
            if ($pago_orden === "3 exhibiciones") {
              
              $porcentaje_3exhibiciones_1    = $_GET['porcentaje_3exhibiciones_1'];
              $porcentaje_3exhibiciones_2    = $_GET['porcentaje_3exhibiciones_2'];
              $porcentaje_3exhibiciones_dias = $_GET['porcentaje_3exhibiciones_dias'];
              $porcentaje_3exhibiciones_3    = $_GET['porcentaje_3exhibiciones_3'];              

              $total_procentaje1_3_exhibiciones = 0;
              $total_procentaje1_3_exhibiciones = $total_monto_servicio * $porcentaje_3exhibiciones_1 / 100;

              $total_procentaje2_3_exhibiciones = 0;
              $total_procentaje2_3_exhibiciones = $total_monto_servicio * $porcentaje_3exhibiciones_2 / 100;

              $total_procentaje3_3_exhibiciones = 0;
              $total_procentaje3_3_exhibiciones = $total_monto_servicio * $porcentaje_3exhibiciones_3 / 100;
          ?>
          <tr>
            <td style="font-family:montserratregular; vertical-align: top; text-align: justify; margin-top:10px; "><br>
              <b>SEXTA.- DURACIÓN Y PRECIO.</b> El presente contrato entrará en vigor el mismo día de su firma. El precio a abonar por parte del “Cliente” como pago por la prestación del servicio de <b><?php echo $list_services; ?></b> equivale a <b>$<?php echo number_format($total_monto_servicio,2); ?></b> (<b><?php echo ucfirst(convertir(intval(($total_monto_servicio)))); ?> pesos <?php echo ($decimals); ?>/100 M.N.</b>). La cantidad estipulada será cubierta en tres exhibiciones, la primera por el <b><?php echo $porcentaje_3exhibiciones_1; ?>%</b> correspondiente a <b>$<?php echo number_format($total_procentaje1_3_exhibiciones,2); ?></b> (<b><?php echo ucfirst(convertir(intval(($total_procentaje1_3_exhibiciones)))); ?> pesos <?php echo get_decimales($total_procentaje1_3_exhibiciones); ?>/100</b>) pagadera como anticipo de garantía del servicio de <b><?php echo $list_services; ?></b> por parte del “Prestador”. La segunda <b><?php echo $porcentaje_3exhibiciones_dias; ?> días</b> despues de iniciado el proyecto por el <b><?php echo $porcentaje_3exhibiciones_2; ?>%</b>  correspondiente a <b>$<?php echo number_format($total_procentaje2_3_exhibiciones,2); ?></b> (<b><?php echo ucfirst(convertir(intval(($total_procentaje2_3_exhibiciones)))); ?> pesos <?php echo get_decimales($total_procentaje2_3_exhibiciones); ?>/100</b>). Y el <b><?php echo $porcentaje_3exhibiciones_3; ?></b>% restante a la entrega del proyecto por la cantidad de <b>$<?php echo number_format($total_procentaje3_3_exhibiciones,2); ?></b> (<b><?php echo ucfirst(convertir(intval(($total_procentaje3_3_exhibiciones)))); ?> pesos <?php echo get_decimales($total_procentaje3_3_exhibiciones); ?>/100</b>).<?php echo $clausula_iva; ?> Si el “Cliente” no abona el precio acordado en plazo o no proporciona en tiempo y forma los contenidos a publicar, el “Prestador” considerará resuelto el contrato, sin reintegrar al “Cliente” cualquier cantidad adelantada y retirando cualquier contenido publicado si el incumplimiento no es subsanado, sin menoscabo de otras acciones legales pertinentes.
            </td>
          </tr>
          <?php } ?>

          <?php 
            if ($pago_orden === "Pago mensual") {
              $day = date('d');
              $pago_mensual_dias = $_GET['pago_mensual_dias'];
          ?>
          <tr>
            <td style="font-family:montserratregular; vertical-align: top; text-align: justify; margin-top:10px; "><br>
              <b>SEXTA.- DURACIÓN Y PRECIO.</b> El presente contrato entrará en vigor el mismo día de su firma. El precio a abonar por parte del “Cliente” como pago por la prestación del servicio de <b><?php echo $list_services; ?></b> equivale a <b>$<?php echo number_format($total_monto_servicio,2); ?></b> (<b><?php echo ucfirst(convertir(intval(($total_monto_servicio)))); ?> pesos <?php echo $decimals; ?>/100 M.N.</b>) mensuales durante la vigencia del presente contrato, pagadera los días <b><?php echo $pago_mensual_dias; ?></b> de cada mes.<?php echo $clausula_iva; ?> Si el “Cliente” no abona el precio acordado en plazo o no proporciona en tiempo y forma los contenidos a publicar, el “Prestador” considerará resuelto el contrato, sin reintegrar al “Cliente” cualquier cantidad adelantada y retirando cualquier contenido publicado si el incumplimiento no es subsanado, sin menoscabo de otras acciones legales pertinentes.
            </td>
          </tr>
          <?php } ?>

          <?php 
            if ($pago_orden === "Pago anual") {
          ?>
          <tr>
            <td style="font-family:montserratregular; vertical-align: top; text-align: justify; margin-top:10px; "><br>
              <b>SEXTA.- DURACIÓN Y PRECIO.</b> El presente contrato entrará en vigor el mismo día de su firma. El precio a abonar por parte del “Cliente” como pago por la prestación del servicio de <b><?php echo $list_services; ?></b> equivale a <b>$<?php echo number_format($total_monto_servicio,2); ?></b> (<b><?php echo ucfirst(convertir(intval(($total_monto_servicio)))); ?> pesos <?php echo ($decimals); ?>/100 M.N.</b>) anuales, el servicio se podra renovar con 15 días de anticipación antes de su vencimiento.<?php echo $clausula_iva; ?> Si el “Cliente” no abona el precio acordado en plazo o no proporciona en tiempo y forma los contenidos a publicar, el “Prestador” considerará resuelto el contrato, sin reintegrar al “Cliente” cualquier cantidad adelantada y retirando cualquier contenido publicado si el incumplimiento no es subsanado, sin menoscabo de otras acciones legales pertinentes. 
            </td>
          </tr>
          <?php } ?>

				  <!-- <tr>
				  <td style="font-family:montserratregular; vertical-align: top; text-align: justify; margin-top:10px; "><br>
					<b>SEXTA.- DURACIÓN Y PRECIO.</b> El presente contrato entrará en vigor el mismo día de su firma. El precio a abonar por parte del “Cliente” como pago por la prestación del servicio prestado equivale a <b>Precio del servicio</b> (<b>Cantidad en letra</b> 00/100 Moneda Nacional), La cantidad estipulada será cubierta en <b>dos exhibiciones</b>, la primera por la cantidad de <b>mitad de Precio del servicio</b> (<b>Cantidad en letra</b> 00/100 Moneda Nacional) pagadera como anticipo de garantía del servicio de <b><?php // echo $list_services; ?></b> por parte del “Prestador”. Y el 50% restante a la entrega del proyecto por la cantidad de <b>Precio del servicio</b> (<b>Cantidad en letra</b> 00/100 Moneda Nacional).
					<br>
				   </td>
			     </tr> -->
				  
				  <tr>
				  <td style="font-family:montserratregular; vertical-align: top; text-align: justify; margin-top:10px; "><br>
					<b>SÉPTIMA.- SERVICIOS ADICIONALES </b>Un servicio de mantenimiento, diseño, desarrollo e implementación que se encuentre fuera del Anexo I se considerará un nuevo proyecto, y estará sometido a las cláusulas y condiciones del contrato redactado para el caso. El pago de los servicios y trabajos posteriores a la finalización del proyecto principal y solicitados por el “Cliente” para modificar , actualizar diseñar o implementar, en caso de que no se haya contratado el mantenimiento, diseño, desarrollo e implementación del mismo, se efectuará según las condiciones y precio detallado en cada factura emitida.
					<br>
				   </td>
			     </tr>
				  
				   <tr>
				  <td style="font-family:montserratregular; vertical-align: top; text-align: justify; margin-top:10px; "><br>
					<b>OCTAVA.- CONFIDENCIALIDAD Y PROTECCIÓN DE DATOS.</b> Las partes contratantes declaran conocer y cumplir la legislación Mexicana sobre protección de datos, comprometiéndose a tratar los datos personales obtenidos durante y a la conclusión del desarrollo del trabajo profesional contratado, de acuerdo con dicha normativa.  
					<br>
				   </td>
			     </tr>
				  
				  <tr>
				  <td style="font-family:montserratregular; vertical-align: top; text-align: justify; margin-top:10px; "><br>
					<b>NOVENA.- EXTINCIÓN.</b> Quedan expresamente convenidas las causales de rescisión establecidas en las leyes de la materia, además que este contrato se extinguirá por las causales siguientes: 1) Por el cumplimiento del mismo. 2) Por ser declarados judicialmente en situación de suspensión de pagos, quiebra cualquiera de las partes. 3) Por incumplimiento de las obligaciones estipuladas en el presente contrato. 4) Será obligatorio que en caso de conflicto,  las partes intenten previamente resolver la cuestión de mutuo acuerdo, sometiéndose en su caso a los Juzgados o Tribunales que por orden y competencia correspondan en la ciudad de Morelia, Michoacán, con independencia de cualquier cambio de domicilio de alguna de las partes. Será motivo de pago de daños y perjuicios el incumplimiento que cualquiera de las partes deba llevar a interpelación extrajudicial, judicial o a juicio.
					<br>
				   </td>
			     </tr>
				  
				  <tr>
				  <td style="font-family:montserratregular; vertical-align: top; text-align: justify; margin-top:10px; "><br>
					<b>DECIMA.-CONSENTIMIENTO.</b> Las partes manifiestan que a la firma del presente contrato no ha habido error, dolo, violencia, lesión, ni mala fe o cualquier otro vicio del consentimiento que lo pudiera invalidar.
					<br>
				   </td>
			     </tr>
				  
				  <tr>
				  <td style="font-family:montserratregular; vertical-align: top; text-align: justify; margin-top:10px; "><br>
					<b>DECIMA PRIMERA.-</b>  Leído por las partes y habiendo quedado enteradas del contenido y los alcances legales de todas y cada una de las cláusulas de este contrato, lo avalan señal de la plena aceptación con las firmas al calce, siendo el día <b><?php echo $fecha; ?></b><br><br>
					<br>
				   </td>
			     </tr>

              </tbody>
            </table>
          </div>
        </div>
		  
		  
		  <div class="nocolor-table">
          <div class="table-responsive " >
            <table>
              <tbody>
				  <tr>
					<td colspan="3">
						&nbsp;<br><br><br><br><br><br>
					</td>
				 </tr>
              <tr>

	
				  
				  
				  <td width="30%" style="font-family:montserratregular; vertical-align: top; text-align: center; padding-left: 30px;">
					  <hr/>
                        <div>
                            <span><b>C. <?php echo $user_nombre; ?> <?php echo $user_apellidos; ?></b><br>
                            <b><?php echo $user_empresa; ?></b><br><br></span>
                        </div>


				  </td>
				  
				  <td width="20%" style="font-family:montserratregular; vertical-align: top; text-align: center; padding-right: 15px;">
		&nbsp;
				  </td>
				  
				   <td width="30%" style="font-family:montserratregular; vertical-align: top; text-align: center; padding-right: 30px;">
					 <hr/>
                        <div>
                            <span><b>C. <?php echo $INDUCE_PAGE_NAME; ?></b><br>
                            <b>Induce Marketing SAS</b><br><br></span>
                        </div>

				  </td>
			   </tr>
              </tbody>
            </table>
          </div>
        </div>
		  
		  
		<pagebreak/> 
		  
		  
		  <div class="nocolor-table">
        <div class="table-responsive">
          <table>
            <tbody>
              <tr>
                <td style="font-family:montserratregular; vertical-align: top; text-align: justify; ">
					        <h2>Anexo I</h2><br>
        					El “Prestador” en conjunto con el “Cliente” serán los encargados de vigilar los cumplimientos de tiempos de entrega mediante la coordinación de trabajo para la elaboración del <b>Servicio</b> con las siguientes caracteristicas incluidas:
        				</td>
				      </tr>
				      <tr>	  
			         <td style="font-family:montserratregular; vertical-align: top; text-align: justify; "><br><br>
					       <h3>Caracteristicas del servicio:</h3><br>

                 <div class="main-table" >
                  <div class="table-responsive">
                    <?php if (mysqli_num_rows($rservice_lista)>0) { ?>
                    <table>
                      <thead>
                       <tr>
                         <th scope="col" class="text-left text-primary" style="width: 520px;"><h3>Descripci&oacute;n</h3></th>
                       </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $cont = 0;
                        $total_monto_servicio = 0;
                        $iva = 0;
                        $descuento_total = 0;
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
                        <tr> &nbsp;<td></td><td>&nbsp;</td></tr>
                        <tr>
                          <td align="justify" style="font-family:montserratregular; vertical-align: top; padding-right: 20px">
                            <?php echo $nombre; ?>
                            <br>
                            <?php echo $descripcion; ?>
                          </td>
                        </tr>
                      <?php 
                          }
                        }
                      ?>
                      </tbody>
                    </table>
                    <?php } ?>
                  </div>
                </div>

				        </td>
              </tr>
              <tr>
			         <td style="font-family:montserratregular; vertical-align: top; text-align: justify; "><br><br>
					       <h3>Condiciones comerciales:</h3><br>

                 <div class="main-table">
                  <div class="table-responsive datosb-container" style="font-family:montserratregular;">

                    <div class="mt-4">
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
                        $rnotas_comerciales = $mysqli->query("SELECT * FROM notas WHERE status='true' ORDER BY id DESC");
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

				       </td>
              </tr> 
              </tbody>
            </table>
          </div>
        </div>
		
      </div>
		
 
    </div>

  </body>
<?php 
  }else{
    header("Location: ./index");
  }
?>