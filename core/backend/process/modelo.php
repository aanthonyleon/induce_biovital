<?php 
  session_start();
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  setlocale(LC_ALL,"es_ES@euro","es_ES","esp");
  date_default_timezone_set('UTC');
  date_default_timezone_set("America/Mexico_City");
  // include_once("../helpers/time-cdmx.php");

  class Modelo {
  //////////////////////////////////////
    
    // public function login($username,$password){
    //   include("../../../configuration/backend/private/conexion.php");
      
    //   $rcheckuser = $mysqli->query("SELECT * FROM administradores WHERE username='$username' AND password='$password'");
    //   if ($rcheckuser)
    //   {
    //     if (mysqli_num_rows($rcheckuser)>0) {
    //       setcookie('AMBIEZA_user', $username, time() + (86400 * 30), "/");
    //       if ($rcheckuser)
    //       {
    //         while($array = $rcheckuser->fetch_object())
    //         {
    //           $id     = $array->id;
    //           $nombre = $array->nombre;
    //           $rol    = $array->rol;
    //         }
    //       }
    //       setcookie('AMBIEZA_id', $id, time() + (86400 * 30), "/");
    //       setcookie('AMBIEZA_name', $nombre, time() + (86400 * 30), "/");
    //       if ($rol === "admin") {
    //         setcookie('AMBIEZA_rol', 1, time() + (86400 * 30), "/");
    //       }else if ($rol === "Ventas") {
    //         setcookie('AMBIEZA_rol', 2, time() + (86400 * 30), "/");
    //       }
    //       echo "exist";
    //     }else{
    //       echo "Verifica tus credenciales";
    //     }
    //   }
    // }

    public function login_admin($username,$password){
      include("../../../configuration/backend/private/conexion.php");

      $ruta = "calendario.php";
      
      $rcheckuser = $mysqli->query("SELECT * FROM usuarios WHERE usuario='$username' AND password='$password'");
      if ($rcheckuser)
      {
        if (mysqli_num_rows($rcheckuser)>0) {
          setcookie('BIOVITAL_USER', $username, time() + (86400 * 30), "/");
          if ($rcheckuser)
          {
            while($array = $rcheckuser->fetch_object())
            {
              $id     = $array->id;
              $nombre = $array->nombre;
              $type   = $array->type;
            }
          }
          setcookie('BIOVITAL_ID', $id, time() + (86400 * 30), "/");
          setcookie('BIOVITAL_NAME', $nombre, time() + (86400 * 30), "/");
          
          if ($type=='admin') {
            setcookie('BIOVITAL_ACCESS', "true", time() + (86400 * 30), "/");
          }else{
            setcookie('BIOVITAL_ACCESS', "false", time() + (86400 * 30), "/");
          }
          echo "exist," . $ruta;
        }else{
          // $this->login_usuarios($username,$password);
          echo "Verifica tus credenciales";
        }
      }
    }

    public function login_usuarios($username,$password){
      include("../../../configuration/backend/private/conexion.php");

      $ruta = "archivo_prospectos.php";
      
      $rcheckuser2 = $mysqli->query("SELECT * FROM usuarios WHERE usuario='$username' AND password='$password'");
      if ($rcheckuser2)
      {
        if (mysqli_num_rows($rcheckuser2)>0) {
          setcookie('INDUCE_PAGE_USER', $username, time() + (86400 * 30), "/");
          while($array = $rcheckuser2->fetch_object())
          {
            $id     = $array->id;
            $nombre = $array->nombre;
          }
          setcookie('INDUCE_PAGE_ID', $id, time() + (86400 * 30), "/");
          setcookie('INDUCE_PAGE_NAME', $nombre, time() + (86400 * 30), "/");

          if ($username === "nathanael@induce.mx") {
            $ruta = "dashboard.php";
            setcookie('INDUCE_PAGE_ACCESS', "true", time() + (86400 * 30), "/");
          }else{
            setcookie('INDUCE_PAGE_ACCESS', "false", time() + (86400 * 30), "/");
          }
          echo "exist," . $ruta;
        }else{
          echo "Verifica tus credenciales";
        }
      }
    }

    public function save_header_footer($header,$footer){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $radd = $mysqli->query("UPDATE `header_footer_links` SET 
          `header`='$header',
          `footer`='$footer'
        WHERE 1");
      if ($radd)
      {
        echo "updated";
      }else{
        echo "Error, intenta nuevamente.";
      }
    }

    public function agregar_cliente($nuevo_nombre,$nuevo_telefono){
      include("../../../configuration/backend/private/conexion.php");
      include("../../../configuration/backend/helpers/session_check.php");

      $response = array();
      $rcheck = $mysqli->query("SELECT * FROM `clientes` WHERE `telefono`='$nuevo_telefono'");
      if (mysqli_num_rows($rcheck)>0) {
        echo "Ya existe un registro con este Teléfono.";
      }else{
        $radd_prospect = $mysqli->query("INSERT INTO `clientes`(`id`, id_usuario, `nombre`, `telefono`, `email`, `date_register`) VALUES (NULL,'$BIOVITAL_ID','$nuevo_nombre','$nuevo_telefono','',NOW())");
        if ($radd_prospect)
        {
          echo "added";
        }else{
          echo "Err " . $mysqli->error;
        }
      }
    }

    public function get_cliente($id_cliente){
      include("../../../configuration/backend/private/conexion.php");

      $response = array();
      $rget = $mysqli->query("SELECT * FROM `clientes` WHERE id=$id_cliente");
      if ($rget) {
        while($array = $rget->fetch_object())
        {
          $nombre   = $array->nombre;
          $telefono = $array->telefono;
        }
        echo "exist|" . $telefono;
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

    public function agregar_calendario($id_cliente,$telefono,$id_servicio,$fecha_inicio,$hora_inicio,$fecha_fin,$hora_fin,$descripcion,$clienteNuevo,$nuevo_nombre,$nuevo_telefono){
      include("../../../configuration/backend/private/conexion.php");
      include("../../../configuration/backend/helpers/session_check.php");

      $response = array();

      if ($clienteNuevo=='true') {
        $rcheck = $mysqli->query("SELECT * FROM `clientes` WHERE `telefono`='$nuevo_telefono'");
        if (mysqli_num_rows($rcheck)>0) {
          echo "Ya existe un registro con este Teléfono.";
        }else{
          $radd_prospect = $mysqli->query("INSERT INTO `clientes`(`id`, id_usuario ,`nombre`, `telefono`, `email`, `date_register`) VALUES (NULL,'$BIOVITAL_ID','$nuevo_nombre','$nuevo_telefono','',NOW())");
          if ($radd_prospect)
          {
            $id_cliente = mysqli_insert_id($mysqli);

            $radd = $mysqli->query("INSERT INTO `agenda`(`id`, id_usuario, `id_cliente`, id_servicio, `telefono`, `titulo`, `fecha_inicio`, `hora_inicio`, `fecha_fin`, `hora_fin`, descripcion, `date_register`) VALUES (NULL,'$BIOVITAL_ID','$id_cliente','$id_servicio','$nuevo_telefono','','$fecha_inicio','$hora_inicio','$fecha_fin','$hora_fin','',NOW())");
            if ($radd)
            {
              echo "registered";
            }else{
              echo "Err. " . $mysqli->error;
            }
          }else{
            echo "Err " . $mysqli->error;
          }
        }
      }else{
        $radd = $mysqli->query("INSERT INTO `agenda`(`id`, id_usuario, `id_cliente`, id_servicio, `telefono`, `titulo`, `fecha_inicio`, `hora_inicio`, `fecha_fin`, `hora_fin`, descripcion, `date_register`) VALUES (NULL,'$BIOVITAL_ID','$id_cliente','$id_servicio','$telefono','','$fecha_inicio','$hora_inicio','$fecha_fin','$hora_fin','',NOW())");
        if ($radd)
        {
          echo "registered";
        }else{
          echo "Err. " . $mysqli->error;
        }
      }
      
    }
    
    public function cliente_add_service($id_servicio,$id_cliente){

      include("../../../configuration/backend/private/conexion.php");
      require_once("../helpers/multi.php");
      $response = array();

      $list = multiexplode(array(","),$id_servicio);

      foreach($list as $key=>$value) {
        $radd_prospect_service = $mysqli->query("INSERT INTO `cliente_servicios`(`id`, `id_cliente`, `id_servicio`, `date_register`) VALUES (NULL,'$id_cliente','$value',NOW())");
      }
      
      if ($radd_prospect_service)
      {
        echo "added";
      }else{
        echo "Error al agregar el servicio al cliente, intenta nuevamente.";
      }
    }

    public function tag_prospect($id,$tag){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rtag_prospect_service = $mysqli->query("UPDATE `prospecto` SET `tag`='$tag' WHERE id=$id");
      if ($rtag_prospect_service)
      {
        // if ($tag === "Cliente") {

          // $rcliente_details = $mysqli->query("SELECT * FROM prospecto WHERE id=$id");
          // if ($rcliente_details)
          // {
          //   while($array = $rcliente_details->fetch_object())
          //   {
          //     $nombre    = $array->nombre;
          //     $apellidos = $array->apellidos;
          //     $empresa   = $array->empresa;
          //     $direccion = $array->direccion;
          //     $puesto    = $array->puesto;
          //     $email     = $array->email;
          //     $telefono_oficina  = $array->telefono_oficina;
          //     $telefono_whatsapp = $array->telefono_whatsapp;
          //     $tag               = $array->tag;
          //     $date_register     = $array->date_register;
          //   }
          // }

          // prospecto_adicionales
          // $rpa = $mysqli->query("SELECT * FROM prospecto_adicionales WHERE id_prospecto=$id");
          // if ($rpa)
          // {
          //   while($array = $rpa->fetch_object())
          //   {
          //     $adicional = $array->adicional;
          //     $date_register = $array->date_register;

          //     $radd_pa = $mysqli->query("INSERT INTO `cliente_adicionales`(`id`, `id_cliente`, `adicional`, `date_register`) VALUES (NULL,'$id','$adicional','$date_register')");
          //   }
          // }

          // prospecto_contactos
          // $rpc = $mysqli->query("SELECT * FROM prospecto_contactos WHERE id_prospecto=$id");
          // if ($rpc)
          // {
          //   while($array = $rpc->fetch_object())
          //   {
          //     $nombre = $array->nombre;
          //     $puesto = $array->puesto;
          //     $correo = $array->correo;
          //     $telefono = $array->telefono;
          //     $date_register = $array->date_register;

          //     $radd_pc = $mysqli->query("INSERT INTO `cliente_contactos`(`id`, `id_cliente`, `nombre`, `puesto`, `correo`, `telefono`, `date_register`) VALUES (NULL,'$id','$nombre','$puesto','$correo','$telefono','$date_register')");
          //   }
          // }

          // prospecto_facturacion
          // $rpf = $mysqli->query("SELECT * FROM prospecto_facturacion WHERE id_prospecto=$id");
          // if ($rpf)
          // {
          //   while($array = $rpf->fetch_object())
          //   {
          //     $rfc = $array->rfc;
          //     $nombre = $array->nombre;
          //     $domicilio = $array->domicilio;
          //     $cp = $array->cp;
          //     $poblacion = $array->poblacion;
          //     $telefono = $array->telefono;
          //     $correo = $array->correo;
          //     $metodopago = $array->metodopago;
          //     $cfdi = $array->cfdi;
          //     $date_register = $array->date_register;

          //     $radd_pf = $mysqli->query("INSERT INTO `cliente_facturacion`(`id`, `id_cliente`, `rfc`, `nombre`, `domicilio`, `cp`, `poblacion`, `telefono`, `correo`, `metodopago`, `cfdi`, `date_register`) VALUES (NULL,'$id','$rfc','$nombre','$domicilio','$cp','$poblacion','$telefono','$correo','$metodopago','$cfdi','$date_register')");
          //   }
          // }

          // prospecto_servicios_lista
          // $rps = $mysqli->query("SELECT * FROM prospecto_servicios_lista WHERE id_prospecto=$id");
          // if ($rps)
          // {
          //   while($array = $rps->fetch_object())
          //   {
          //     $id_servicio = $array->id_servicio;
          //     $date_register = $array->date_register;

          //     $radd_ps = $mysqli->query("INSERT INTO `cliente_servicios`(`id`, `id_cliente`, `id_servicio`, `date_register`) VALUES (NULL,'$id','$id_servicio','$date_register')");
          //   }
          // }

          // $raddcliente = $mysqli->query("INSERT INTO `clientes`(`id`, `nombre`, `apellidos`, `empresa`, `direccion`, `puesto`, `email`, `telefono_oficina`, `telefono_whatsapp`, `tag`, `date_register`) VALUES (NULL,'$nombre','$apellidos','$empresa','$direccion','$puesto','$email','$telefono_oficina','$telefono_whatsapp','Cliente',NOW())");

          // if ($raddcliente) {
          //   $rdelete_prospect = $mysqli->query("DELETE FROM `prospecto` WHERE id=$id");
          //   $rdelete_pa = $mysqli->query("DELETE FROM prospecto_adicionales WHERE id_prospecto=$id");
          //   $rdelete_pc = $mysqli->query("DELETE FROM prospecto_contactos WHERE id_prospecto=$id");
          //   $rdelete_pf = $mysqli->query("DELETE FROM prospecto_facturacion WHERE id_prospecto=$id");
          //   $rdelete_ps = $mysqli->query("DELETE FROM prospecto_servicios_lista WHERE id_prospecto=$id");
          //   echo "updated";
          // }else{
          //   echo "Error al registrar el prospecto en clientes, intenta nuevamente.";
          // }

        // }else{
        //   echo "updated";
        // }
        echo "updated";
      }else{
        echo "Error al editar la etiqueta del prospecto, intenta nuevamente.";
      }
    }

    public function delete_prospect($id_prospecto){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete_prospect_service = $mysqli->query("DELETE FROM `prospecto` WHERE id=$id_prospecto");
      if ($rdelete_prospect_service)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar el prospecto. Err " . $mysqli->error;
      }
    }

    public function delete_brief($id_prospecto){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete = $mysqli->query("DELETE FROM `formulario_brief` WHERE id=$id_prospecto");
      if ($rdelete)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar el formulario. Err " . $mysqli->error;
      }
    }

   public function delete_cliente($id_cliente){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete_cliente = $mysqli->query("DELETE FROM `clientes` WHERE id=$id_cliente");
      if ($rdelete_cliente)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar el cliente, intenta nuevamente.";
      }
    }

    public function prospect_add_contact($nombre_contacto,$puesto_contacto,$correo_contacto,$telefono_contacto,$id,$extencion_contacto){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $radd_contact = $mysqli->query("INSERT INTO `prospecto_contactos`(`id`, `id_prospecto`, `nombre`, `puesto`, `correo`, `telefono`, extencion, `date_register`) VALUES (NULL,'$id','$nombre_contacto','$puesto_contacto','$correo_contacto','$telefono_contacto','$extencion_contacto',NOw())");
      if ($radd_contact)
      {
        echo "added";
      }else{
        echo "Error al agregar el contacto. Err " . $mysqli->error;
      }
    }

    public function prospect_add_facturacion($rfc_facturacion,$nombre_facturacion,$domicilio_facturacion,$cp_facturacion,$poblacion_facturacion,$telefono_facturacion,$correo_facturacion,$metodopago_facturacion,$cfdi_facturacion,$id){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $radd_facturacion_update = $mysqli->query("UPDATE `prospecto_facturacion` SET selected='' WHERE id_prospecto=$id");
      $radd_facturacion = $mysqli->query("INSERT INTO `prospecto_facturacion`(`id`, `id_prospecto`, `rfc`, `nombre`, `domicilio`, `cp`, `poblacion`, `telefono`, `correo`, `metodopago`, `cfdi`, `selected`, `date_register`) VALUES (NULL,'$id','$rfc_facturacion','$nombre_facturacion','$domicilio_facturacion','$cp_facturacion','$poblacion_facturacion','$telefono_facturacion','$correo_facturacion','$metodopago_facturacion','$cfdi_facturacion','true',NOW())");
      if ($radd_facturacion)
      {
        echo "added";
      }else{
        echo "Error al agregar el dato de facturación. Err " . $mysqli->error;
      }
    }

    public function prospect_add_facturacion_page($rfc_facturacion,$nombre_facturacion,$domicilio_facturacion,$cp_facturacion,$poblacion_facturacion,$telefono_facturacion,$correo_facturacion,$metodopago_facturacion,$cfdi_facturacion,$id){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $radd_facturacion_update = $mysqli->query("UPDATE `prospecto_facturacion` SET selected='' WHERE id_prospecto=$id");
      $radd_facturacion = $mysqli->query("INSERT INTO `prospecto_facturacion`(`id`, `id_prospecto`, `rfc`, `nombre`, `domicilio`, `cp`, `poblacion`, `telefono`, `correo`, `metodopago`, `cfdi`, `selected`, `date_register`) VALUES (NULL,'$id','$rfc_facturacion','$nombre_facturacion','$domicilio_facturacion','$cp_facturacion','$poblacion_facturacion','$telefono_facturacion','$correo_facturacion','$metodopago_facturacion','$cfdi_facturacion','true',NOW())");
      if ($radd_facturacion)
      {
        echo "added";
      }else{
        echo "Error al agregar el dato de facturación. Err " . $mysqli->error;
      }
    }

    public function prospect_add_adicional($id_prospecto,$dato_adicional,$fecha,$hora){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $radd = $mysqli->query("INSERT INTO `prospecto_adicionales`(`id`, `id_prospecto`, `adicional`, fecha, hora, `date_register`) VALUES (NULL,'$id_prospecto','$dato_adicional','$fecha','$hora',NOW())");
      if ($radd)
      {
        echo "added";
      }else{
        echo "Error al agregar el dato adicional.  Err " . $mysqli->error;
      }
    }

    public function client_add_contact($nombre_contacto,$puesto_contacto,$correo_contacto,$telefono_contacto,$id){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $radd_contact = $mysqli->query("INSERT INTO `cliente_contactos`(`id`, `id_cliente`, `nombre`, `puesto`, `correo`, `telefono`, `date_register`) VALUES (NULL,'$id','$nombre_contacto','$puesto_contacto','$correo_contacto','$telefono_contacto',NOw())");
      if ($radd_contact)
      {
        echo "added";
      }else{
        echo "Error al agregar el contacto, intenta nuevamente.";
      }
    }

    public function client_add_facturacion($rfc_facturacion,$nombre_facturacion,$domicilio_facturacion,$cp_facturacion,$poblacion_facturacion,$telefono_facturacion,$correo_facturacion,$metodopago_facturacion,$cfdi_facturacion,$id){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $radd_facturacion = $mysqli->query("INSERT INTO `cliente_facturacion`(`id`, `id_cliente`, `rfc`, `nombre`, `domicilio`, `cp`, `poblacion`, `telefono`, `correo`, `metodopago`, `cfdi`, `date_register`) VALUES (NULL,'$id','$rfc_facturacion','$nombre_facturacion','$domicilio_facturacion','$cp_facturacion','$poblacion_facturacion','$telefono_facturacion','$correo_facturacion','$metodopago_facturacion','$cfdi_facturacion',NOW())");
      if ($radd_facturacion)
      {
        echo "added";
      }else{
        echo "Error al agregar el dato de facturaci&oacute;n, intenta nuevamente.";
      }
    }

    public function client_add_adicional($id_cliente,$dato_adicional){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $radd = $mysqli->query("INSERT INTO `cliente_adicionales`(`id`, `id_cliente`, `adicional`, `date_register`) VALUES (NULL,'$id_cliente','$dato_adicional',NOW())");
      if ($radd)
      {
        echo "added";
      }else{
        echo "Error al agregar el dato adicional, intenta nuevamente.";
      }
    }
    
    public function delete_propecto_contacto($id_prospecto,$id){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete = $mysqli->query("DELETE FROM `prospecto_contactos` WHERE id=$id AND id_prospecto=$id_prospecto");
      if ($rdelete)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar el contacto. Err " . $mysqli->error;
      }
    }

    public function delete_propecto_facturacion($id_prospecto,$id){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete = $mysqli->query("DELETE FROM `prospecto_facturacion` WHERE id=$id AND id_prospecto=$id_prospecto");
      if ($rdelete)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar el dato de facturación. Err " . $mysqli->error;
      }
    }

    public function delete_propecto_adicional($id_prospecto,$id){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete = $mysqli->query("DELETE FROM `prospecto_adicionales` WHERE id=$id AND id_prospecto=$id_prospecto");
      if ($rdelete)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar el dato adicional. Err " . $mysqli->error;
      }
    }

    public function delete_cliente_contacto($id_cliente,$id){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete = $mysqli->query("DELETE FROM `cliente_contactos` WHERE id=$id AND id_cliente=$id_cliente");
      if ($rdelete)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar el contacto, intenta nuevamente.";
      }
    }

    public function delete_cliente_facturacion($id_cliente,$id){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete = $mysqli->query("DELETE FROM `cliente_facturacion` WHERE id=$id AND id_cliente=$id_cliente");
      if ($rdelete)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar el dato de facturaci&oacute;n, intenta nuevamente.";
      }
    }

    public function delete_cliente_adicional($id_cliente,$id){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete = $mysqli->query("DELETE FROM `cliente_adicionales` WHERE id=$id AND id_cliente=$id_cliente");
      if ($rdelete)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar el dato adicional, intenta nuevamente.";
      }
    }

    public function delete_servicio_code($id_prospecto,$id){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rget_id_servicio = $mysqli->query("SELECT * FROM `ordenes_servicio` WHERE id_servicio=$id");
        if ($rget_id_servicio)
        {
        if (mysqli_num_rows($rget_id_servicio)>0) {
          while($array = $rget_id_servicio->fetch_object())
          {
            $id_contrato     = $array->id;
            $codigo_contrato = $array->codigo;
          }
        }else{
          $id_contrato     = 0;
          $codigo_contrato = "";
        }
      }
      
      $rdelete = $mysqli->query("DELETE FROM `prospecto_servicios` WHERE id=$id AND id_prospecto=$id_prospecto");
      if ($rdelete)
      {
        $rdelete_list = $mysqli->query("DELETE FROM `prospecto_servicios_lista` WHERE id_servicio_codigo=$id");
        $rdelete_recibos = $mysqli->query("DELETE FROM `recibos_pago` WHERE codigo='$codigo_contrato'");
        $rdelete_cotizacion = $mysqli->query("DELETE FROM `cotizaciones` WHERE codigo='$codigo_contrato'");
        $rdelete_contratos = $mysqli->query("DELETE FROM `ordenes_servicio` WHERE id_servicio=$id");
        $rdelete_condiciones = $mysqli->query("DELETE FROM `prospecto_notas` WHERE id_servicio=$id");
        echo "deleted";
      }else{
        echo "Error al eliminar el servicio. Err " . $mysqli->error;
      } 
    }

    public function editar_propecto($nombre,$apellidos,$telefono_celular,$email,$estado_civil,$estado,$ciudad,$colonia,$calle,$no_exterior,$ine,$rfc,$curp,$id_prospecto){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rupdate = $mysqli->query("UPDATE `prospecto` SET 
          `nombre`='$nombre',
          `apellidos`='$apellidos',
          `telefono_oficina`='$telefono_celular',
          `email`='$email',
          `estado_civil`='$estado_civil',
          `estado`='$estado',
          `ciudad`='$ciudad',
          colonia='$colonia',
          calle='$calle',
          no_exterior='$no_exterior',
          ine='$ine',
          rfc='$rfc',
          curp='$curp'
        WHERE id=$id_prospecto");
      if ($rupdate)
      {
        echo "updated";
      }else{
        echo "Err " . $mysqli->error;
      }
    }

    public function guardar_prospecto_servicio($descripcion,$id_servicio,$unidad_medida_servicio,$precio_servicio,$cantidad_servicio){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      // echo "descripcion: " . $descripcion . ", id_servicio: " . $id_servicio;
      
      $rupdate = $mysqli->query("UPDATE `prospecto_servicios_lista` SET 
          `descripcion`='$descripcion',
          `unidad`='$unidad_medida_servicio',
          `precio`='$precio_servicio',
          `cantidad`='$cantidad_servicio',
          `status`='updated'
        WHERE id=$id_servicio");
      if ($rupdate)
      {
        echo "updated";
      }else{
        echo "Error al actualizar la informaci&oacute;n del servicio, intenta nuevamente.";
      }
    }

    public function get_description_service($id_servicio){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      $coincidencias = 0;

      $selects_list = array();
      
      $rget_info = $mysqli->query("SELECT * FROM `prospecto_servicios_lista` WHERE id=$id_servicio");
      if ($rget_info)
      {
        if (mysqli_num_rows($rget_info)>0) {
          while($array = $rget_info->fetch_object())
          {
            $descripcion          = $array->descripcion;
            $descripcion_original = $array->descripcion_original;
            $unidad               = $array->unidad;
            $precio               = $array->precio;
          }

          if (strpos($descripcion, '(Valor)') !== false) {
            $descripcion = str_replace("(Valor)",'<input type="text" id="" placeholder="Valor" value="">',$descripcion);
          }

          $rlistas = $mysqli->query("SELECT * FROM servicios_listas");
          if ($rlistas){
            if (mysqli_num_rows($rlistas)>0) {
              while($array = $rlistas->fetch_object())
              {
                $id_lista = $array->id;
                $lista    = $array->lista;

                if (strpos($descripcion, '('.$lista.')') !== false) {
                  $coincidencias++;

                  $lista_opciones = '<select name="lista_'.$id_lista.'"><option value="" disabled="" selected="">Selecciona una medida</option>';
                  $rlistas_opciones = $mysqli->query("SELECT * FROM servicios_listas_opciones WHERE id_lista=$id_lista");
                  if ($rlistas_opciones){
                    if (mysqli_num_rows($rlistas_opciones)>0) {
                      while($array = $rlistas_opciones->fetch_object())
                      {
                        $opcion = $array->opcion;

                        $lista_opciones.= '<option value="'.$opcion.'">'.$opcion.'</option>';
                      }
                    }
                  }

                  $descripcion = str_replace("(".$lista.")",$lista_opciones.'</select>',$descripcion);
                }

                $selects_list[] = array('id_lista'=> $id_lista,'valor'=> $lista_opciones.'</select>');
                
                // echo '<input type="text id="lista_'.$id_lista.'" value="'.$lista_opciones.'">';
                $lista_opciones = "";
              }
            }
          }

          // if (strpos($descripcion, '(LISTA A)') !== false) {
          //   $coincidencias++;
          //   $descripcion = str_replace("(LISTA A)",'<select name="lista_a"><option value="" disabled="" selected="">Selecciona una medida</option><option value="METROS LINEALES">METROS LINEALES</option><option value="KILOMETROS">KILOMETROS</option><option value="M3">M3</option><option value="M2">M2</option><option value="KILOS">KILOS</option><option value="TONELADAS">TONELADAS</option><option value="LITROS">LITROS</option><option value="PULGADAS">PULGADAS</option><option value="CM">CM</option></select>',$descripcion);
          // }
          // if (strpos($descripcion, '(LISTA B)') !== false) {
          //   $coincidencias++;
          //   $descripcion = str_replace("(LISTA B)",'<select name="lista_b"><option value="" disabled="" selected="">Selecciona una medida</option><option value="PLANTA DE TRATAMIENTO">PLANTA DE TRATAMIENTO</option><option value="FOSA SEPTICA">FOSA SEPTICA</option><option value="BIODIGESTOR">BIODIGESTOR</option><option value="CARCAMO">CARCAMO</option><option value="TRAMPA DE GRASA">TRAMPA DE GRASA</option><option value="POZOS DE ABSORCION">POZOS DE ABSORCION</option><option value="POZOS ARTESANALES">POZOS ARTESANALES</option><option value="REGILLAS">REGILLAS</option><option value="REGISTROS">REGISTROS</option><option value="TANQUE DE TORMENTA">TANQUE DE TORMENTA</option><option value="TRAMPAS DE RETENSION DE LODOS">TRAMPAS DE RETENSION DE LODOS</option><option value="LINEA Y RED DE DRENAJE">LINEA Y RED DE DRENAJE</option><option value="BAJADAS PLUVIALES">BAJADAS PLUVIALES</option><option value="TARJAS">TARJAS</option><option value="LAVABOS">LAVABOS</option><option value="DRENAJE SANITARIO">DRENAJE SANITARIO</option><option value="COLADERAS DE PISO">COLADERAS DE PISO</option><option value="BAÑERAS">BAÑERAS</option><option value="WC">WC</option><option value="TUBERIAS DE AGUA POTABLE">TUBERIAS DE AGUA POTABLE</option></select>',$descripcion);
          // }
          // if (strpos($descripcion, '(LISTA C)') !== false) {
          //   $coincidencias++;
          //   $descripcion = str_replace("(LISTA C)",'<select name="lista_c"><option value="" disabled="" selected="">Selecciona una medida</option><option value="PERIODO">PERIODO</option><option value="JORNADA">JORNADA</option></select>',$descripcion);
          // }
          // if (strpos($descripcion, '(LISTA D)') !== false) {
          //   $coincidencias++;
          //   $descripcion = str_replace("(LISTA D)",'<select name="lista_d"><option value="" disabled="" selected="">Selecciona una medida</option><option value="DIA">DIA</option><option value="SEMANA">SEMANA</option><option value="MES">MES</option><option value="HORAS">HORAS</option></select>',$descripcion);
          // }
          // echo "|_|";
          echo $descripcion . "|_|";
?>
          <div class="row mt-5">
            <div class="col-12 col-md-6">
              <h5>Unidad de medida</h5>
              <select class="form-control" id="unidad_medida_servicio" onchange="check_unidad_medida()">
                <option value="" disabled>Selecciona la unidad</option>
                <?php if (!empty($unidad)) {
                echo '<option value="'.$unidad.'">'.$unidad.'</option>';
                echo '<option value="Servicio">Servicio</option>';
                }else{
                echo '<option value="Servicio" selected>Servicio</option>';
                } ?>
                <option value="Jornada">Jornada</option>
                <option value="Mano de obra">Mano de obra</option>
                <option value="Materiales">Materiales</option>
                <option value="Viaje">Viaje</option>
              </select>
            </div>

            <div class="col-12 col-md-6">
              <h5>Precio del servicio:</h5>
              <input type="number" id="precio_servicio" class="form-control" placeholder="Precio" value="<?php echo $precio; ?>">
            </div>

            <div class="col-12 col-md-12 mt-3" style="display: none;" id="show_unidad_cantidad">
              <h5>Cantidad:</h5>
              <input type="number" id="cantidad_servicio" class="form-control" placeholder="Cantidad" value="0">
            </div>
          </div>
<?php 
          echo "|_|" . json_encode($selects_list);
        }else{
          echo "No se encontr&oacute; informaci&oacute;n de este servicio.";
        }
      }else{
        echo "Error al obtener la descripci&oacute;n del servicio, intenta nuevamente.";
      }
    }

    public function get_description_service_update($id_servicio){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      $coincidencias = 0;
      
      $rget_info = $mysqli->query("SELECT * FROM `prospecto_servicios_lista` WHERE id=$id_servicio");
      if ($rget_info)
      {
        if (mysqli_num_rows($rget_info)>0) {

          // echo "<h3 class='text-info'>Introduce nuevamente la información de la medidas.</h3>";

          while($array = $rget_info->fetch_object())
          {
            $descripcion          = $array->descripcion;
            $descripcion_original = $array->descripcion_original;
            $unidad               = $array->unidad;
            $precio               = $array->precio;
            $cantidad             = $array->cantidad;
          }

          if (strpos($descripcion_original, '(Valor)') !== false) {
            $descripcion_original = str_replace("(Valor)",'<input type="text" id="" placeholder="Valor" value="">',$descripcion_original);
          }

          $rlistas = $mysqli->query("SELECT * FROM servicios_listas");
          if ($rlistas){
            if (mysqli_num_rows($rlistas)>0) {
              while($array = $rlistas->fetch_object())
              {
                $id_lista = $array->id;
                $lista    = $array->lista;

                if (strpos($descripcion_original, '('.$lista.')') !== false) {
                  $coincidencias++;

                  $lista_opciones = '<select name="lista_'.$id_lista.'"><option value="" disabled="" selected="">Selecciona una medida</option>';
                  $rlistas_opciones = $mysqli->query("SELECT * FROM servicios_listas_opciones WHERE id_lista=$id_lista");
                  if ($rlistas_opciones){
                    if (mysqli_num_rows($rlistas_opciones)>0) {
                      while($array = $rlistas_opciones->fetch_object())
                      {
                        $opcion = $array->opcion;

                        $lista_opciones.= '<option value="'.$opcion.'">'.$opcion.'</option>';
                      }
                    }
                  }

                  $descripcion_original = str_replace("(".$lista.")",$lista_opciones.'</select>',$descripcion_original);
                }

                $selects_list[] = array('id_lista'=> $id_lista,'valor'=> $lista_opciones.'</select>');
                
                // echo '<input type="text id="lista_'.$id_lista.'" value="'.$lista_opciones.'">';
                $lista_opciones = "";
              }
            }
          }
          
          echo $descripcion_original . "|_|";
?>
          <div class="row mt-5">
            <div class="col-12 col-md-6">
              <h5>Unidad de medida</h5>
              <select class="form-control" id="unidad_medida_servicio" onchange="check_unidad_medida()">
                <option value="" disabled>Selecciona la unidad</option>
                <?php if (!empty($unidad)) {
                echo '<option value="'.$unidad.'">'.$unidad.'</option>';
                echo '<option value="Servicio">Servicio</option>';
                }else{
                echo '<option value="Servicio" selected>Servicio</option>';
                } ?>
                <option value="Jornada">Jornada</option>
                <option value="Mano de obra">Mano de obra</option>
                <option value="Materiales">Materiales</option>
                <option value="Viaje">Viaje</option>
              </select>
            </div>

            <div class="col-12 col-md-6">
              <h5>Precio del servicio:</h5>
              <input type="number" id="precio_servicio" class="form-control" placeholder="Precio" value="<?php echo $precio; ?>">
            </div>

            <?php if ($unidad === "Jornada" || $unidad === "Viaje") { ?>
            <div class="col-12 col-md-12 mt-3" style="display: block;" id="show_unidad_cantidad">
            <?php }else{ ?>
            <div class="col-12 col-md-12 mt-3" style="display: none;" id="show_unidad_cantidad">
            <?php } ?>
              <h5>Cantidad:</h5>
              <input type="number" id="cantidad_servicio" class="form-control" placeholder="Cantidad" value="<?php echo $cantidad; ?>">
            </div>
          </div>
<?php 
        }else{
          echo "No se encontr&oacute; informaci&oacute;n de este servicio.";
        }
      }else{
        echo "Error al obtener la descripci&oacute;n del servicio, intenta nuevamente.";
      }
    }

    public function get_description_service_update_otro($id_servicio){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      $coincidencias = 0;
      
      $rget_info = $mysqli->query("SELECT * FROM `prospecto_servicios_lista` WHERE id=$id_servicio");
      if ($rget_info)
      {
        if (mysqli_num_rows($rget_info)>0) {

          while($array = $rget_info->fetch_object())
          {
            $descripcion          = $array->descripcion;
            $descripcion_original = $array->descripcion_original;
            $unidad               = $array->unidad;
            $precio               = $array->precio;
            $nombre               = $array->nombre;
          }
?>
          <div class="row">
            <div class="col-12 col-md-12">
              <h5>Nombre del servicio</h5>
              <input type="text" class="form-control" id="nombre_servicio-<?php echo $id_servicio; ?>" value="<?php echo $nombre; ?>">
            </div>

            <div class="col-12 col-md-12 mt-3">
              <h5>Descripción</h5>
              <textarea class="form-control" id="descripcion_servicio-<?php echo $id_servicio; ?>" rows="5" cols="5"><?php echo $descripcion; ?></textarea>
            </div>

            <div class="col-12 col-md-6 mt-3">
              <h5>Unidad de medida</h5>
              <select class="form-control" id="unidad_medida_servicio-<?php echo $id_servicio; ?>">
                <option value="" disabled>Selecciona la unidad</option>
                <?php if (!empty($unidad)) {
                echo '<option value="'.$unidad.'">'.$unidad.'</option>';
                echo '<option value="Servicio">Servicio</option>';
                }else{
                echo '<option value="Servicio" selected>Servicio</option>';
                } ?>
                <option value="Jornada">Jornada</option>
                <option value="Mano de obra">Mano de obra</option>
                <option value="Materiales">Materiales</option>
                <option value="Viaje">Viaje</option>
              </select>
            </div>

            <div class="col-12 col-md-6 mt-3">
              <h5>Precio del servicio:</h5>
              <input type="number" id="precio_servicio-p<?php echo $id_servicio; ?>" class="form-control" placeholder="Precio" value="<?php echo $precio; ?>">
            </div>
          </div>

          <button type="button" class="btn btn-block btn-primary mt-5" onclick="guardar_prospecto_servicio_otro('<?php echo $id_servicio; ?>')">Guardar cambios</button>
<?php 
        }else{
          echo "No se encontr&oacute; informaci&oacute;n de este servicio.";
        }
      }else{
        echo "Error al obtener la descripci&oacute;n del servicio, intenta nuevamente.";
      }
    }

    public function eliminar_prospecto_servicio($id_servicio){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete = $mysqli->query("DELETE FROM `prospecto_servicios_lista` WHERE id=$id_servicio");
      if ($rdelete)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar el servicio del prospecto. Err " . $mysqli->error;
      }
    }

    public function guardar_equipo($equipo,$modelo,$placas,$descripcion,$accesorios,$equipo_seguridad,$herramientas){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $radd_equipo = $mysqli->query("INSERT INTO `equipos`(`id`, `equipo`, `modelo`, `placas`, `descripcion`, `accesorios`, `equipo_seguridad`, `herramientas`, `fotografia`, `date_register`) VALUES (NULL,'$equipo','$modelo','$placas','$descripcion','$accesorios','$equipo_seguridad','$herramientas','',NOW())");
      if ($radd_equipo)
      {
        $id_equipo = mysqli_insert_id($mysqli);
        echo "added," . $id_equipo;
      }else{
        echo "Error al agregar el equipo, intenta nuevamente.";
      }
    }

    public function guardar_cuadrilla($cuadrilla){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $radd_cuadrilla = $mysqli->query("INSERT INTO `cuadrillas`(`id`, `nombre`, `date_register`) VALUES (NULL,'$cuadrilla',NOW())");
      if ($radd_cuadrilla)
      {
        echo "added";
      }else{
        echo "Error al agregar la cuadrilla, intenta nuevamente.";
      }
    }

    public function agregar_equipo_prospecto($equipo_selected,$id_prospecto,$id_servicio){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $radd_cuadrilla = $mysqli->query("INSERT INTO `prospecto_equipo`(`id`, `id_prospecto`, `id_servicio`, `id_equipo`, `date_register`) VALUES (NULL,'$id_prospecto','$id_servicio','$equipo_selected',NOW())");
      if ($radd_cuadrilla)
      {
        echo "added";
      }else{
        echo "Error al agregar el equipo al prospecto, intenta nuevamente.";
      }
    }

    public function agregar_cuadrilla_prospecto($cuadrilla_selected,$cantidad,$id_prospecto,$id_servicio){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $radd_cuadrilla = $mysqli->query("INSERT INTO `prospecto_cuadrilla`(`id`, `id_prospecto`, `id_servicio`, `id_cuadrilla`, `cantidad`, `date_register`) VALUES (NULL,'$id_prospecto','$id_servicio','$cuadrilla_selected','$cantidad',NOW())");
      if ($radd_cuadrilla)
      {
        echo "added";
      }else{
        echo "Error al agregar la cuadrilla al prospecto, intenta nuevamente.";
      }
    }

    public function delete_equipo_prospecto($id_prospecto,$id,$id_servicio){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete_equipo = $mysqli->query("DELETE FROM prospecto_equipo WHERE id_prospecto=$id_prospecto AND id_servicio=$id_servicio AND id=$id");
      if ($rdelete_equipo)
      {
        echo "deleted";
      }else{
        echo "Error el equipo del prospecto, intenta nuevamente.";
      }
    }

    public function delete_cuadrilla_prospecto($id_prospecto,$id,$id_servicio){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete_cuadrilla = $mysqli->query("DELETE FROM prospecto_cuadrilla WHERE id_prospecto=$id_prospecto AND id_servicio=$id_servicio AND id=$id");
      if ($rdelete_cuadrilla)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar la cuadrilla del prospecto, intenta nuevamente.";
      }
    }

    public function delete_equipo_proteccion_prospecto($id_prospecto,$id,$id_servicio){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete_cuadrilla = $mysqli->query("DELETE FROM prospecto_equipo_proteccion WHERE id_prospecto=$id_prospecto AND id_servicio=$id_servicio AND id=$id");
      if ($rdelete_cuadrilla)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar el equipo de protección del prospecto, intenta nuevamente.";
      }
    }

    public function users_details($id_user){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();

        echo "<div class='row'>";
      $rget_user_details = $mysqli->query("SELECT * FROM `administradores` WHERE id=$id_user");
      if ($rget_user_details)
      {
        while($array = $rget_user_details->fetch_object())
        {
          $nombre        = $array->nombre;
          $apellidos     = $array->apellidos;
          $username      = $array->username;
          $password      = $array->password;
          $rol           = $array->rol;
          $telefono      = $array->telefono;
          $date_register = $array->date_register;

          echo '
            <div class="form-row">
            <div class="col-sm-6 mb-3">
              <label class="input-label" class="input-label">Nombre(s)</label>
              <input type="text" id="nombre-'.$id_user.'" class="form-control form-control" placeholder="Nombre(s) del equipo" value="'.$nombre.'">
            </div>

            <div class="col-sm-6 mb-3">
              <label class="input-label" class="input-label">Apellidos</label>
              <input type="text" id="apellidos-'.$id_user.'" class="form-control form-control" placeholder="Apellidos" value="'.$apellidos.'">
            </div>

            <div class="col-sm-12 mb-3">
              <label class="input-label" class="input-label">Email</label>
              <input type="email" id="email-'.$id_user.'" class="form-control form-control" placeholder="Email" value="'.$username.'">
            </div>

            <div class="col-sm-6 mb-3">
              <label class="input-label" class="input-label">Contraseña</label>
              <input type="password" id="password-'.$id_user.'" class="form-control form-control" placeholder="Contraseña" value="'.$password.'">
            </div>

            <div class="col-sm-6 mb-3">
              <label class="input-label" class="input-label">Confirmar contraseña</label>
              <input type="password" id="confirm_password-'.$id_user.'" class="form-control form-control" placeholder="Confirmar contraseña" value="'.$password.'">
            </div>

            <div class="col-sm-12 mb-3">
              <label class="input-label" class="input-label">Puesto</label>
              <select id="puesto-'.$id_user.'" class="form-control form-control">
                <option value="" disabled>Selecciona el puesto</option>
                <option value="'.$rol.'" selected>'.$rol.'</option>
                <option value="Ventas">Ventas</option>
              </select>
            </div>

            <div class="col-sm-12 mb-3">
              <label class="input-label" class="input-label">Teléfono</label>
              <input type="tel" id="telefono-'.$id_user.'" class="form-control form-control" placeholder="Teléfono" value="'.$telefono.'">
            </div>
          </div>

          <button class="btn btn-block btn-info" onclick="editar_usuario('.$id_user.')">Editar</button>
          ';
        }
        echo "</div>";
      }else{
        echo "Error, intenta nuevamente.";
      }
    }

    public function equipo_details($id_equipo){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();

        echo "<div class='row'>";
      $rget_equipo_details = $mysqli->query("SELECT * FROM `equipos` WHERE id=$id_equipo");
      if ($rget_equipo_details)
      {
        while($array = $rget_equipo_details->fetch_object())
        {
          $equipo = $array->equipo;
          $modelo = $array->modelo;
          $placas = $array->placas;
          $descripcion      = $array->descripcion;
          $accesorios       = $array->accesorios;
          $equipo_seguridad = $array->equipo_seguridad;
          $herramientas     = $array->herramientas;
          $fotografia       = $array->fotografia;

          $descripcion      = str_replace('<br>', PHP_EOL, $descripcion);
          $accesorios       = str_replace('<br>', PHP_EOL, $accesorios);
          $equipo_seguridad = str_replace('<br>', PHP_EOL, $equipo_seguridad);
          $herramientas     = str_replace('<br>', PHP_EOL, $herramientas);

          echo "<div class='col-12 col-md-12'>
                  <div class='col-sm-12 mb-3'>
                    <label class='input-label' class='input-label'>Equipo</label>
                    <input type='text' id='equipo-".$id_equipo."' value='".$equipo."' class='form-control'>
                  </div>

                  <div class='col-sm-12 mb-3'>
                    <label class='input-label' class='input-label'>Modelo</label>
                  <input type='text' id='modelo-".$id_equipo."' value='".$modelo."' class='form-control'>
                  </div>

                  <div class='col-sm-12 mb-3'>
                    <label class='input-label' class='input-label'>Placas</label>
                  <input type='text' id='placas-".$id_equipo."' value='".$placas."' class='form-control'>
                  </div>

                  <div class='col-sm-12 mb-3'>
                    <label class='input-label' class='input-label'>Descripci&oacute;n</label>
                    <textarea id='descripcion-".$id_equipo."' class='form-control form-control' placeholder='Descripci&oacute;n del equipo'>".$descripcion."</textarea>
                  </div>

                  <div class='col-sm-12 mb-3'>
                    <label class='input-label' class='input-label'>Accesorios del equipo</label>
                    <textarea id='accesorios-".$id_equipo."' class='form-control form-control' placeholder='Accesorios del equipo'>".$accesorios."</textarea>
                  </div>

                  <div class='col-sm-12 mb-3'>
                    <label class='input-label' class='input-label'>Equipo de seguridad</label>
                    <textarea id='equipo_seguridad-".$id_equipo."' class='form-control form-control' placeholder='Equipo de seguridad del equipo'>".$equipo_seguridad."</textarea>
                  </div>

                  <div class='col-sm-12 mb-3'>
                    <label class='input-label' class='input-label'>Herramientas</label>
                    <textarea id='herramientas-".$id_equipo."' class='form-control form-control' placeholder='Herramientas del equipo'>".$herramientas."</textarea>
                  </div>

                  <div class='col-sm-12 mb-3'>
                    <label class='input-label' class='input-label'>Fotograf&iacute;a</label>
                    <input type='file' id='fotografia-".$id_equipo."' class='form-control form-control' onchange='change_img(this)'>
                  </div>

                  <div class='col-sm-12 mb-3'>
                    <label class='input-label' class='input-label'>Fotograf&iacute;a actual</label>
                    <img src='./archivos/equipos/fotografias/".$fotografia."' class='w-100' id='img-change'>
                  </div>

                  <button type='button' class='btn btn-block btn-success mt-5' onclick='editar_equipo(".$id_equipo.")'>Editar</button>              
                </div>";
        }
        echo "</div>";
      }else{
        echo "Error, intenta nuevamente.";
      }
    }

    public function cuadrilla_details($id_cuadrilla){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();

        echo "<div class='row'>";
      $rget_cuadrilla_details = $mysqli->query("SELECT * FROM `cuadrillas` WHERE id=$id_cuadrilla");
      if ($rget_cuadrilla_details)
      {
        while($array = $rget_cuadrilla_details->fetch_object())
        {
          $nombre = $array->nombre;

          echo "<div class='col-12 col-md-12'>
                  <h3>Nombre del personal</h3>
                  <input type='text' id='cuadrilla-".$id_cuadrilla."' value='".$nombre."' class='form-control'>

                  <button type='button' class='btn btn-block btn-success mt-5' onclick='editar_cuadrilla(".$id_cuadrilla.")'>Editar</button>              
                </div>";
        }
        echo "</div>";
      }else{
        echo "Error, intenta nuevamente.";
      }
    }

    public function equipo_proteccion_details($id_equipo){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      echo "<div class='row'>";
      $rget_equipo_details = $mysqli->query("SELECT * FROM `equipo_proteccion` WHERE id=$id_equipo");
      if ($rget_equipo_details)
      {
        while($array = $rget_equipo_details->fetch_object())
        {
          $equipo_proteccion = $array->equipo_proteccion;

          echo "<div class='col-12 col-md-12'>
                  <h3>Nombre del equipo de protección</h3>
                  <input type='text' id='equipo-".$id_equipo."' value='".$equipo_proteccion."' class='form-control'>

                  <button type='button' class='btn btn-block btn-success mt-5' onclick='editar_equipo_proteccion(".$id_equipo.")'>Editar</button>              
                </div>";
        }
        echo "</div>";
      }else{
        echo "Error, intenta nuevamente.";
      }
    }

    public function nota_details($id_nota){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();

        echo "<div class='row'>";
      $rget_nota_details = $mysqli->query("SELECT * FROM `prospecto_notas` WHERE id=$id_nota");
      if ($rget_nota_details)
      {
        while($array = $rget_nota_details->fetch_object())
        {
          $nota = $array->nota;

          echo "<div class='col-12 col-md-12'>
                  <h3>Descripci&oacute;n</h3>
                  <textarea id='nota' class='form-control' rows='3' cols='3' placeholder='Notas...'>".$nota."</textarea>
                  <button type='button' class='btn btn-block btn-success mt-5' onclick='editar_nota(".$id_nota.")'>Editar</button>             
                </div>";
        }
        echo "</div>";
      }else{
        echo "Error, intenta nuevamente.";
      }
    }

    public function editar_equipo($equipo,$modelo,$placas,$descripcion,$accesorios,$equipo_seguridad,$herramientas,$id_equipo){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rupdate = $mysqli->query("UPDATE `equipos` SET 
          `equipo`='$equipo',
          `modelo`='$modelo',
          `placas`='$placas',
          `descripcion`='$descripcion',
          `accesorios`='$accesorios',
          `equipo_seguridad`='$equipo_seguridad',
          `herramientas`='$herramientas'
        WHERE id=$id_equipo");
      if ($rupdate)
      {
        echo "updated";
      }else{
        echo "Error al actualizar la información del equipo, intenta nuevamente.";
      }
    }

    public function delete_equipo($id_delete){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete = $mysqli->query("DELETE FROM `equipos` WHERE id=$id_delete");
      if ($rdelete)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar el equipo, intenta nuevamente.";
      }
    }

     public function editar_cuadrilla($cuadrilla,$id_cuadrilla){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rupdate = $mysqli->query("UPDATE `cuadrillas` SET 
          `nombre`='$cuadrilla'
        WHERE id=$id_cuadrilla");
      if ($rupdate)
      {
        echo "updated";
      }else{
        echo "Error al actualizar la información del cuadrilla, intenta nuevamente.";
      }
    }

    public function editar_equipo_proteccion($equipo,$id_equipo){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rupdate = $mysqli->query("UPDATE `equipo_proteccion` SET 
          `equipo_proteccion`='$equipo'
        WHERE id=$id_equipo");
      if ($rupdate)
      {
        echo "updated";
      }else{
        echo "Error al actualizar la información del equipo, intenta nuevamente.";
      }
    }

    public function delete_cuadrilla($id_delete){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete = $mysqli->query("DELETE FROM `cuadrillas` WHERE id=$id_delete");
      if ($rdelete)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar el personal, intenta nuevamente.";
      }
    }

    public function delete_equipo_proteccion($id_delete){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete = $mysqli->query("DELETE FROM `equipo_proteccion` WHERE id=$id_delete");
      if ($rdelete)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar el equipo, intenta nuevamente.";
      }
    }

    public function agregar_nota_prospecto($id_servicio,$id_prospecto,$condiciones){
      include("../../../configuration/backend/private/conexion.php");
      
      $response = array();
      
      $radd_note = $mysqli->query("INSERT INTO `prospecto_notas`(`id`, `id_prospecto`, `id_servicio`, `nota`, `date_register`) VALUES (NULL,'$id_prospecto','$id_servicio','$condiciones',NOW())");
      if ($radd_note)
      {
        echo "added";  
      }else{
        echo "Error al agregar la condición. Err " . $mysqli->error;
      }
    }

    public function agregar_nota_prospecto_lista($id_servicio,$id_prospecto,$id_lista){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rnotas = $mysqli->query("SELECT * FROM notas WHERE id_lista=$id_lista");
      if ($rnotas)
      {
        while($array = $rnotas->fetch_object())
        {
          $nota = $array->nota;
      
          $radd_note = $mysqli->query("INSERT INTO `prospecto_notas`(`id`, `id_prospecto`, `id_servicio`, `nota`, `date_register`) VALUES (NULL,'$id_prospecto','$id_servicio','$nota',NOW())");
        }
      }

      if ($radd_note)
      {
        echo "added";
      }else{
        echo "Error al agregar de la lista de notas. Err " . $mysqli->error;
      }
    }

    public function editar_nota($nota,$id_nota){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $radd_note = $mysqli->query("UPDATE `prospecto_notas` SET nota='$nota' WHERE id=$id_nota");
      if ($radd_note)
      {
        echo "updated";
      }else{
        echo "Error al editar la nota, intenta nuevamente.";
      }
    }

    public function crear_orden_compra_prospecto($id_servicio,$id_prospecto,$codigo,$fecha){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      if(empty($fecha)){
        $fecha = date('Y-m-d');
      }
      
      $radd_cotizacion = $mysqli->query("INSERT INTO `cotizaciones`(`id`, `id_prospecto`, `codigo`, `fecha`, `date_register`) VALUES (NULL,'$id_prospecto','$codigo','$fecha',NOW())");
      if ($radd_cotizacion) {

        $id_cotizacion = mysqli_insert_id($mysqli);

        // // GET RFC
        // $rprospecto_facturacion = $mysqli->query("SELECT * FROM prospecto_facturacion WHERE id_prospecto=$id_prospecto AND selected='true' ORDER BY id DESC LIMIT 1");
        // if ($rprospecto_facturacion)
        // {
        //   if (mysqli_num_rows($rprospecto_facturacion)>0) {
        //     while($array = $rprospecto_facturacion->fetch_object())
        //     {
        //       $rfc = $array->rfc;
        //     }
        //   }else{
        //     $rfc = "No registrado.";
        //   }
        // }

        // // PROSPECTO INFO
        // $rprospecto_details = $mysqli->query("SELECT * FROM prospecto WHERE id=$id_prospecto");
        // if ($rprospecto_details)
        // {
        //   while($array = $rprospecto_details->fetch_object())
        //   {
        //     $nombre            = $array->nombre;
        //     $apellidos         = $array->apellidos;
        //     $empresa           = $array->empresa;
        //     $direccion         = $array->direccion;
        //     $puesto            = $array->puesto;
        //     $email             = $array->email;
        //     $telefono_oficina  = $array->telefono_oficina;
        //     $telefono_whatsapp = $array->telefono_whatsapp;
        //   }
        // }

        // $raddprospecto = $mysqli->query("INSERT INTO `cotizacion_prospecto`(`id`, `id_cotizacion`, `id_prospecto`, `nombre`, `apellidos`, `empresa`, `direccion`, `puesto`, `email`, `telefono_oficina`, `telefono_whatsapp`, `rfc`, `date_register`) VALUES (NULL,'$id_cotizacion','$id_prospecto','$nombre','$apellidos','$empresa','$direccion','$puesto','$email','$telefono_oficina','$telefono_whatsapp','$rfc',NOW())");

        // // SERVICIOS
        // $rservice_lista = $mysqli->query("SELECT * FROM prospecto_servicios_lista WHERE id_servicio_codigo=$id_servicio");
        // if ($rservice_lista){
        //   while($array = $rservice_lista->fetch_object())
        //   {
        //     $id_service_lista = $array->id;
        //     $id_servicio_l    = $array->id_servicio;
        //     $descripcion      = $array->descripcion;
        //     $unidad           = $array->unidad;
        //     $precio           = $array->precio;
        //     $otro             = $array->otro;
        //     $nombre           = $array->nombre;

        //     $rservice_info = $mysqli->query("SELECT * FROM servicios WHERE id=$id_servicio_l");
        //     if (mysqli_num_rows($rservice_info)>0) {
        //       while($array = $rservice_info->fetch_object())
        //       {
        //         $servicio_l = $array->servicio;
        //       }
        //     }else{
        //       $servicio_l = "";
        //     }

        //     if ($otro === "otro") {
        //       $servicio_l = $nombre;
        //     }

        //     $raddservice_lista = $mysqli->query("INSERT INTO `cotizacion_prospecto_servicios_lista`(`id`, `id_cotizacion`, `id_prospecto`, `servicio`, `descripcion`, `unidad`, `precio`, `date_register`) VALUES (NULL,'$id_cotizacion','$id_prospecto','$servicio_l','$descripcion','$unidad','$precio',NOW())");

        //   }
        // }

        // // EQUIPO
        // $rprospecto_equipo = $mysqli->query("SELECT * FROM prospecto_equipo WHERE id_prospecto=$id_prospecto AND id_servicio=$id_servicio");
        // if ($rprospecto_equipo)
        // {
        //   if (mysqli_num_rows($rprospecto_equipo)>0) {
        //     while($array = $rprospecto_equipo->fetch_object())
        //     {
        //       $id_equipo            = $array->id_equipo;

        //       $rget_equipo = $mysqli->query("SELECT * FROM equipos WHERE id=$id_equipo");
        //       if ($rget_equipo)
        //       {
        //         if (mysqli_num_rows($rget_equipo)>0) {
        //           while($array = $rget_equipo->fetch_object())
        //           {
        //             $equipo = $array->equipo;
        //             $modelo = $array->modelo;
        //             $placas = $array->placas;
        //             $descripcion      = $array->descripcion;
        //             $accesorios       = $array->accesorios;
        //             $equipo_seguridad = $array->equipo_seguridad;
        //             $herramientas     = $array->herramientas;
        //             $fotografia       = $array->fotografia;
        //           }
        //         }else{
        //           $equipo = "No se encontr&oacute; este dato.";
        //           $modelo = "No se encontr&oacute; este dato.";
        //           $placas = "No se encontr&oacute; este dato.";
        //           $descripcion      = "No se encontr&oacute; este dato.";
        //           $accesorios       = "No se encontr&oacute; este dato.";
        //           $equipo_seguridad = "No se encontr&oacute; este dato.";
        //           $herramientas     = "No se encontr&oacute; este dato.";
        //           $fotografia       = "";
        //         }
        //       }

        //       $raddprospecto_equipo = $mysqli->query("INSERT INTO `cotizacion_prospecto_equipo`(`id`, `id_cotizacion`, `equipo`, `modelo`, `placas`, `descripcion`, `accesorios`, `equipo_seguridad`, `herramientas`, `fotografia`, `date_register`) VALUES (NULL,'$id_cotizacion','$equipo','$modelo','$placas','$descripcion','$accesorios','$equipo_seguridad','$herramientas','$fotografia',NOW())");
        //     }
        //   }
        // }

        // // EQUIPO PROTECCION
        // $rprospecto_equipo_proteccion = $mysqli->query("SELECT * FROM prospecto_equipo_proteccion WHERE id_prospecto=$id_prospecto AND id_servicio=$id_servicio");
        // if ($rprospecto_equipo_proteccion) {
        //   while($array = $rprospecto_equipo_proteccion->fetch_object())
        //   {
        //     $id_equipo_proteccion  = $array->id_equipo_proteccion;

        //     $rget_ep = $mysqli->query("SELECT * FROM equipo_proteccion WHERE id=$id_equipo_proteccion");
        //     if ($rget_ep)
        //     {
        //       if (mysqli_num_rows($rget_ep)>0) {
        //         while($array = $rget_ep->fetch_object())
        //         {
        //           $equipo_proteccion = $array->equipo_proteccion;
        //         }
        //       }else{
        //         $equipo_proteccion = "No se encontró este equipo de seguridad.";
        //       }
        //     }

        //     $raddprospecto_ep = $mysqli->query("INSERT INTO `cotizacion_prospecto_equipo_proteccion`(`id`, `id_cotizacion`, `equipo_proteccion`, `date_register`) VALUES (NULL,'$id_cotizacion','$equipo_proteccion',NOW())");

        //   }
        // }

        // // OBJETIVO
        // $rprospecto_objetivo_servicio = $mysqli->query("SELECT * FROM prospecto_objetivo_servicio WHERE id_servicio=$id_servicio AND id_prospecto=$id_prospecto");
        // if ($rprospecto_objetivo_servicio) {
        //   if (mysqli_num_rows($rprospecto_objetivo_servicio)>0) {
        //     while($array = $rprospecto_objetivo_servicio->fetch_object())
        //     {
        //       $objetivo_servicio = $array->objetivo;
        //     }
        //   }else{
        //     $objetivo_servicio = "No se encontró el objetivo.";
        //   }

        //   $raddprospecto_objetivo = $mysqli->query("INSERT INTO `cotizacion_prospecto_objetivo`(`id`, `id_cotizacion`, `objetivo`, `date_register`) VALUES (NULL,'$id_cotizacion','$objetivo_servicio',NOW())");
        // }

        // // CUADRILLA
        // $rprospecto_cuadrilla = $mysqli->query("SELECT * FROM prospecto_cuadrilla WHERE id_prospecto=$id_prospecto AND id_servicio=$id_servicio");
        // if ($rprospecto_cuadrilla)
        // {
        //   if (mysqli_num_rows($rprospecto_cuadrilla)>0) {
        //     while($array = $rprospecto_cuadrilla->fetch_object())
        //     {
        //       $id_cuadrilla = $array->id_cuadrilla;
        //       $cantidad     = $array->cantidad;

        //       $rget_cuadrilla = $mysqli->query("SELECT * FROM cuadrillas WHERE id=$id_cuadrilla");
        //       if ($rget_cuadrilla)
        //       {
        //         if (mysqli_num_rows($rget_cuadrilla)>0) {
        //           while($array = $rget_cuadrilla->fetch_object())
        //           {
        //             $nombre_cuadrilla = $array->nombre;
        //           }
        //         }else{
        //           $nombre_cuadrilla = "No se encontró la información de la cuadrilla.";
        //         }
        //       }

        //       $raddprospecto_cuadrilla = $mysqli->query("INSERT INTO `cotizacion_prospecto_cuadrilla`(`id`, `id_cotizacion`, `cuadrilla`, `cantidad`, `date_register`) VALUES (NULL,'$id_cotizacion','$nombre_cuadrilla','$cantidad',NOW())");
        //     }
        //   }
        // }

        // // NOTAS
        // $rnotas = $mysqli->query("SELECT * FROM prospecto_notas WHERE id_prospecto=$id_prospecto AND id_servicio=$id_servicio");
        // if ($rnotas){
        //   if (mysqli_num_rows($rnotas)>0) {
        //     while($array = $rnotas->fetch_object())
        //     {
        //       $nota = $array->nota;

        //       $raddnotas = $mysqli->query("INSERT INTO `cotizacion_prospecto_notas`(`id`, `id_cotizacion`, `id_prospecto`, `nota`, `date_register`) VALUES (NULL,'$id_cotizacion','$id_prospecto','$nota',NOW())");
              
        //     }
        //   }
        // }

        // // NOTAS GRAL
        // $rnotas_gral = $mysqli->query("SELECT * FROM notas");
        // if ($rnotas_gral){
        //   if (mysqli_num_rows($rnotas_gral)>0) {
        //     while($array = $rnotas_gral->fetch_object())
        //     {
        //       $nota = $array->nota;

        //       $raddnotas_gral = $mysqli->query("INSERT INTO `cotizacion_prospecto_notas_gral`(`id`, `id_cotizacion`, `id_prospecto`, `nota_gral`, `date_register`) VALUES (NULL,'$id_cotizacion','$id_prospecto','$nota',NOW())");
              
        //     }
        //   }
        // }

        // // RETENCION
        // $rprospecto_retencion = $mysqli->query("SELECT * FROM prospecto_iva WHERE id_prospecto=$id_prospecto AND id_servicio=$id_servicio");
        // if ($rprospecto_retencion)
        // {
        //   if (mysqli_num_rows($rprospecto_retencion)>0) {
        //     while($array = $rprospecto_retencion->fetch_object())
        //     {
        //       $status_iva = $array->status_iva;
        //       $retencion  = $array->retencion;
        //       $status_retencion = $array->status_retencion;
        //     }
        //   }else{
        //     $status_iva       = 1;
        //     $retencion        = "";
        //     $status_retencion = 0;
        //   }

        //   $raddnotas_gral = $mysqli->query("INSERT INTO `cotizacion_prospecto_iva`(`id`, `id_cotizacion`, `status_iva`, `status_retencion`, `retencion`, `date_register`) VALUES (NULL,'$id_cotizacion','$status_iva','$status_retencion','$retencion',NOW())");
        // }


        echo "created," . $id_cotizacion;
      }else{
        echo "Ocurrió un error al crear la cotización, intenta nuevamente.";
      }

    }

    public function crear_orden_servicio_prospecto($id_servicio,$id_prospecto,$codigo,$fecha,$pago_orden,$porcentaje_2exhibiciones_1,$porcentaje_2exhibiciones_2,$porcentaje_3exhibiciones_1,$porcentaje_3exhibiciones_2,$porcentaje_3exhibiciones_dias,$porcentaje_3exhibiciones_3,$pago_mensual_dias,$descuento,$check_descuento_iva,$tiempoMaximo){
      include("../../../configuration/backend/private/conexion.php");
      $response      = array();
      $ids_contratos = array();
      
      $radd_orden_servicio = $mysqli->query("INSERT INTO `ordenes_servicio`(`id`, `id_prospecto`, id_servicio, `codigo`, fecha, pago, porcentaje_2exhibiciones_1,porcentaje_2exhibiciones_2,porcentaje_3exhibiciones_1,porcentaje_3exhibiciones_2,porcentaje_3exhibiciones_dias,porcentaje_3exhibiciones_3,pago_mensual_dias, `date_register`) VALUES (NULL,'$id_prospecto','$id_servicio','$codigo','$fecha','$pago_orden','$porcentaje_2exhibiciones_1','$porcentaje_2exhibiciones_2','$porcentaje_3exhibiciones_1','$porcentaje_3exhibiciones_2','$porcentaje_3exhibiciones_dias','$porcentaje_3exhibiciones_3','$pago_mensual_dias',NOW())");
      if ($radd_orden_servicio) {
        $id_contrato = mysqli_insert_id($mysqli);

        // id_servicio=93&
        // id_prospecto=50&
        // codigo=TT500001&
        // fecha=&
        // pago_orden=2 exhibiciones&
        // porcentaje_2exhibiciones_1=70&
        // porcentaje_2exhibiciones_2=30&
        // porcentaje_3exhibiciones_1=0&
        // porcentaje_3exhibiciones_2=0&
        // porcentaje_3exhibiciones_dias=0&
        // porcentaje_3exhibiciones_3=0&
        // pago_mensual_dias=10


        // id_servicio=93&
        // id_prospecto=50&
        // codigo=TT500001&
        // fecha=&
        // descuento=0&
        // check_descuento_iva=true3&
        // metodo_pago=Efectivo&
        // id_contrato=48&
        // fecha_contrato=2023-11-28&
        // porcentaje_contrato=70

        // $descuento = 0;
        $porcentaje_contrato = 100;
        $metodo_pago         = "Efectivo";

        if ($pago_orden=="Único") {
          if(empty($fecha)){
            $fecha = date('Y-m-d');
          }

          $total = 0;
          $iva   = 0;
          $descuento_total = 0;
          $total_pago = 0;

          $rget_servicio = $mysqli->query("SELECT * FROM prospecto_servicios_lista WHERE id_servicio_codigo=$id_servicio");
          if ($rget_servicio)
          {
            while($array = $rget_servicio->fetch_object())
            {
              $psi_precio = $array->precio;
              $total+= $psi_precio;
            }
          }

          $iva = $total * 0.16;

          if ($check_descuento_iva == "true1") {
            $descuento_total = (($total + $iva) * $descuento) / 100;

            $total+= $iva;
            $total-= $descuento_total;
          }else if ($check_descuento_iva == "true2") {
            $descuento_total = ($total * $descuento) / 100;

            // $total+= $iva;
            $total-= $descuento_total;
          }else if ($check_descuento_iva == "true3") {
            $total+= $iva;
            // $total+= $descuento_total;
          }else if ($check_descuento_iva == "true4") {

          }

          $total_pago = $total;
          $total = $total * $porcentaje_contrato / 100;
        
          $radd_recibo = $mysqli->query("INSERT INTO `recibos_pago`(`id`, `id_prospecto`, `codigo`, `fecha`, total, descuento, check_descuento_iva, metodo_pago, status, date_register, fecha_vencimiento, id_contrato_relacionado,porcentaje_pago,total_pago) VALUES (NULL,'$id_prospecto','$codigo','$fecha','$total','$descuento','$check_descuento_iva','$metodo_pago','Pendiente',NOW(),'$fecha','$id_contrato','$porcentaje_contrato','$total_pago')");
          $id_recibo1 = mysqli_insert_id($mysqli);

          $ids_contratos[] = array('id' => $id_recibo1);
          // if ($radd) {
          //   $id_recibo = mysqli_insert_id($mysqli);

          //   echo "created," . $id_recibo;
          // }else{
          //   echo "Error al crear el recibo de pago. Err " . $mysqli->error;
          // }
        }else if ($pago_orden=="2 exhibiciones") {

          if(empty($fecha)){
            $fecha = date('Y-m-d');
          }

          $total = 0;
          $iva   = 0;
          $descuento_total = 0;
          $total_pago = 0;

          $rget_servicio = $mysqli->query("SELECT * FROM prospecto_servicios_lista WHERE id_servicio_codigo=$id_servicio");
          if ($rget_servicio)
          {
            while($array = $rget_servicio->fetch_object())
            {
              $psi_precio = $array->precio;
              $total+= $psi_precio;
            }
          }

          $iva = $total * 0.16;

          if ($check_descuento_iva == "true1") {
            $descuento_total = (($total + $iva) * $descuento) / 100;

            $total+= $iva;
            $total-= $descuento_total;
          }else if ($check_descuento_iva == "true2") {
            $descuento_total = ($total * $descuento) / 100;

            // $total+= $iva;
            $total-= $descuento_total;
          }else if ($check_descuento_iva == "true3") {
            $total+= $iva;
            // $total+= $descuento_total;
          }else if ($check_descuento_iva == "true4") {

          }

          $total_pago = $total;
          $total1 = $total * $porcentaje_2exhibiciones_1 / 100;
          $total2 = $total * $porcentaje_2exhibiciones_2 / 100;

          if($tiempoMaximo=='Inmediata'){
            $fecha_contrato_vencimiento = $fecha;
          }else if($tiempoMaximo=='24 horas'){
            $fecha_contrato_vencimiento = $fecha;
          }else if($tiempoMaximo=='48 horas'){
            $fecha_contrato_vencimiento = $fecha;
            $fecha_contrato_vencimiento = date("Y-m-d",strtotime($fecha_contrato_vencimiento."+ 2 days"));
          }else if($tiempoMaximo=='5 días hábiles'){
            $fecha_contrato_vencimiento = $fecha;
            $fecha_contrato_vencimiento = date("Y-m-d",strtotime($fecha_contrato_vencimiento."+ 5 days"));
          }else if($tiempoMaximo=='10 días hábiles'){
            $fecha_contrato_vencimiento = $fecha;
            $fecha_contrato_vencimiento = date("Y-m-d",strtotime($fecha_contrato_vencimiento."+ 10 days"));
          }else if($tiempoMaximo=='15 días hábiles'){
            $fecha_contrato_vencimiento = $fecha;
            $fecha_contrato_vencimiento = date("Y-m-d",strtotime($fecha_contrato_vencimiento."+ 15 days"));
          }
        
          $radd_recibo1 = $mysqli->query("INSERT INTO `recibos_pago`(`id`, `id_prospecto`, `codigo`, `fecha`, total, descuento, check_descuento_iva, metodo_pago, status, date_register, fecha_vencimiento, id_contrato_relacionado,porcentaje_pago,total_pago) VALUES (NULL,'$id_prospecto','$codigo','$fecha','$total1','$descuento','$check_descuento_iva','$metodo_pago','Pendiente',NOW(),'$fecha','$id_contrato','$porcentaje_2exhibiciones_1','$total_pago')");
          $id_recibo1 = mysqli_insert_id($mysqli);

          $radd_recibo2 = $mysqli->query("INSERT INTO `recibos_pago`(`id`, `id_prospecto`, `codigo`, `fecha`, total, descuento, check_descuento_iva, metodo_pago, status, date_register, fecha_vencimiento, id_contrato_relacionado,porcentaje_pago,total_pago) VALUES (NULL,'$id_prospecto','$codigo','$fecha','$total2','$descuento','$check_descuento_iva','$metodo_pago','Pendiente',NOW(),'$fecha_contrato_vencimiento','$id_contrato','$porcentaje_2exhibiciones_2','$total_pago')");
          $id_recibo2 = mysqli_insert_id($mysqli);
          // if ($radd) {
          //   $id_recibo = mysqli_insert_id($mysqli);

          //   echo "created," . $id_recibo;
          // }else{
          //   echo "Error al crear el recibo de pago. Err " . $mysqli->error;
          // }

          $ids_contratos[] = array('id' => $id_recibo1);
          $ids_contratos[] = array('id' => $id_recibo2);

        }else if ($pago_orden=="3 exhibiciones") {

          if(empty($fecha)){
            $fecha = date('Y-m-d');
          }

          $total = 0;
          $iva   = 0;
          $descuento_total = 0;
          $total_pago = 0;

          $rget_servicio = $mysqli->query("SELECT * FROM prospecto_servicios_lista WHERE id_servicio_codigo=$id_servicio");
          if ($rget_servicio)
          {
            while($array = $rget_servicio->fetch_object())
            {
              $psi_precio = $array->precio;
              $total+= $psi_precio;
            }
          }

          $iva = $total * 0.16;

          if ($check_descuento_iva == "true1") {
            $descuento_total = (($total + $iva) * $descuento) / 100;

            $total+= $iva;
            $total-= $descuento_total;
          }else if ($check_descuento_iva == "true2") {
            $descuento_total = ($total * $descuento) / 100;

            // $total+= $iva;
            $total-= $descuento_total;
          }else if ($check_descuento_iva == "true3") {
            $total+= $iva;
            // $total+= $descuento_total;
          }else if ($check_descuento_iva == "true4") {

          }

          $total_pago = $total;
          $total1 = $total * $porcentaje_3exhibiciones_1 / 100;
          $total2 = $total * $porcentaje_3exhibiciones_2 / 100;
          $total3 = $total * $porcentaje_3exhibiciones_3 / 100;

          if($tiempoMaximo=='Inmediata'){
            $fecha_contrato_vencimiento = $fecha;
          }else if($tiempoMaximo=='24 horas'){
            $fecha_contrato_vencimiento = $fecha;
          }else if($tiempoMaximo=='48 horas'){
            $fecha_contrato_vencimiento = $fecha;
            $fecha_contrato_vencimiento = date("Y-m-d",strtotime($fecha_contrato_vencimiento."+ 2 days"));
          }else if($tiempoMaximo=='5 días hábiles'){
            $fecha_contrato_vencimiento = $fecha;
            $fecha_contrato_vencimiento = date("Y-m-d",strtotime($fecha_contrato_vencimiento."+ 5 days"));
          }else if($tiempoMaximo=='10 días hábiles'){
            $fecha_contrato_vencimiento = $fecha;
            $fecha_contrato_vencimiento = date("Y-m-d",strtotime($fecha_contrato_vencimiento."+ 10 days"));
          }else if($tiempoMaximo=='15 días hábiles'){
            $fecha_contrato_vencimiento = $fecha;
            $fecha_contrato_vencimiento = date("Y-m-d",strtotime($fecha_contrato_vencimiento."+ 15 days"));
          }

          $fecha_contrato_vencimiento3 = date("Y-m-d",strtotime($fecha_contrato_vencimiento."+ $porcentaje_3exhibiciones_dias days"));
        
          $radd_recibo1 = $mysqli->query("INSERT INTO `recibos_pago`(`id`, `id_prospecto`, `codigo`, `fecha`, total, descuento, check_descuento_iva, metodo_pago, status, date_register, fecha_vencimiento, id_contrato_relacionado,porcentaje_pago,total_pago) VALUES (NULL,'$id_prospecto','$codigo','$fecha','$total1','$descuento','$check_descuento_iva','$metodo_pago','Pendiente',NOW(),'$fecha','$id_contrato','$porcentaje_3exhibiciones_1','$total_pago')");
          $id_recibo1 = mysqli_insert_id($mysqli);

          $radd_recibo2 = $mysqli->query("INSERT INTO `recibos_pago`(`id`, `id_prospecto`, `codigo`, `fecha`, total, descuento, check_descuento_iva, metodo_pago, status, date_register, fecha_vencimiento, id_contrato_relacionado,porcentaje_pago,total_pago) VALUES (NULL,'$id_prospecto','$codigo','$fecha','$total2','$descuento','$check_descuento_iva','$metodo_pago','Pendiente',NOW(),'$fecha_contrato_vencimiento','$id_contrato','$porcentaje_3exhibiciones_2','$total_pago')");
          $id_recibo2 = mysqli_insert_id($mysqli);

          $radd_recibo3 = $mysqli->query("INSERT INTO `recibos_pago`(`id`, `id_prospecto`, `codigo`, `fecha`, total, descuento, check_descuento_iva, metodo_pago, status, date_register, fecha_vencimiento, id_contrato_relacionado,porcentaje_pago,total_pago) VALUES (NULL,'$id_prospecto','$codigo','$fecha','$total2','$descuento','$check_descuento_iva','$metodo_pago','Pendiente',NOW(),'$fecha_contrato_vencimiento3','$id_contrato','$porcentaje_3exhibiciones_3','$total_pago')");
          $id_recibo3 = mysqli_insert_id($mysqli);
          // if ($radd) {
          //   $id_recibo = mysqli_insert_id($mysqli);

          //   echo "created," . $id_recibo;
          // }else{
          //   echo "Error al crear el recibo de pago. Err " . $mysqli->error;
          // }

          $ids_contratos[] = array('id' => $id_recibo1);
          $ids_contratos[] = array('id' => $id_recibo2);
          $ids_contratos[] = array('id' => $id_recibo3);

        }else if ($pago_orden=="Pago mensual") {

          if(empty($fecha)){
            $fecha = date('Y-m-d');
          }

          $total = 0;
          $iva   = 0;
          $descuento_total = 0;
          $total_pago = 0;

          $rget_servicio = $mysqli->query("SELECT * FROM prospecto_servicios_lista WHERE id_servicio_codigo=$id_servicio");
          if ($rget_servicio)
          {
            while($array = $rget_servicio->fetch_object())
            {
              $psi_precio = $array->precio;
              $total+= $psi_precio;
            }
          }

          $iva = $total * 0.16;

          if ($check_descuento_iva == "true1") {
            $descuento_total = (($total + $iva) * $descuento) / 100;

            $total+= $iva;
            $total-= $descuento_total;
          }else if ($check_descuento_iva == "true2") {
            $descuento_total = ($total * $descuento) / 100;

            // $total+= $iva;
            $total-= $descuento_total;
          }else if ($check_descuento_iva == "true3") {
            $total+= $iva;
            // $total+= $descuento_total;
          }else if ($check_descuento_iva == "true4") {

          }

          $total_pago = $total;
          $total1 = $total * $porcentaje_contrato / 100;

          $fecha_contrato_vencimiento = $fecha;
          // $fecha_contrato_vencimiento = date("Y-m-d",strtotime($fecha_contrato_vencimiento."+ 1 month"));
        
          $radd_recibo1 = $mysqli->query("INSERT INTO `recibos_pago`(`id`, `id_prospecto`, `codigo`, `fecha`, total, descuento, check_descuento_iva, metodo_pago, status, date_register, fecha_vencimiento, id_contrato_relacionado,porcentaje_pago,total_pago) VALUES (NULL,'$id_prospecto','$codigo','$fecha','$total1','$descuento','$check_descuento_iva','$metodo_pago','Pendiente',NOW(),'$fecha_contrato_vencimiento','$id_contrato','$porcentaje_contrato','$total_pago')");
          $id_recibo1 = mysqli_insert_id($mysqli);
          // if ($radd) {
          //   $id_recibo = mysqli_insert_id($mysqli);

          //   echo "created," . $id_recibo;
          // }else{
          //   echo "Error al crear el recibo de pago. Err " . $mysqli->error;
          // }

          $ids_contratos[] = array('id' => $id_recibo1);

        }else if ($pago_orden=="Pago anual") {

          if(empty($fecha)){
            $fecha = date('Y-m-d');
          }

          $total = 0;
          $iva   = 0;
          $descuento_total = 0;
          $total_pago = 0;

          $rget_servicio = $mysqli->query("SELECT * FROM prospecto_servicios_lista WHERE id_servicio_codigo=$id_servicio");
          if ($rget_servicio)
          {
            while($array = $rget_servicio->fetch_object())
            {
              $psi_precio = $array->precio;
              $total+= $psi_precio;
            }
          }

          $iva = $total * 0.16;

          if ($check_descuento_iva == "true1") {
            $descuento_total = (($total + $iva) * $descuento) / 100;

            $total+= $iva;
            $total-= $descuento_total;
          }else if ($check_descuento_iva == "true2") {
            $descuento_total = ($total * $descuento) / 100;

            // $total+= $iva;
            $total-= $descuento_total;
          }else if ($check_descuento_iva == "true3") {
            $total+= $iva;
            // $total+= $descuento_total;
          }else if ($check_descuento_iva == "true4") {

          }

          $total_pago = $total;
          $total1 = $total * $porcentaje_contrato / 100;

          $fecha_contrato_vencimiento = $fecha;
          // $fecha_contrato_vencimiento = date("Y-m-d",strtotime($fecha_contrato_vencimiento."+ 1 year"));
        
          $radd_recibo1 = $mysqli->query("INSERT INTO `recibos_pago`(`id`, `id_prospecto`, `codigo`, `fecha`, total, descuento, check_descuento_iva, metodo_pago, status, date_register, fecha_vencimiento, id_contrato_relacionado,porcentaje_pago,total_pago) VALUES (NULL,'$id_prospecto','$codigo','$fecha','$total1','$descuento','$check_descuento_iva','$metodo_pago','Pendiente',NOW(),'$fecha_contrato_vencimiento','$id_contrato','$porcentaje_contrato','$total_pago')");
          $id_recibo1 = mysqli_insert_id($mysqli);
          // if ($radd) {
          //   $id_recibo = mysqli_insert_id($mysqli);

          //   echo "created," . $id_recibo;
          // }else{
          //   echo "Error al crear el recibo de pago. Err " . $mysqli->error;
          // }

          $ids_contratos[] = array('id' => $id_recibo1);

        }
      echo "created|" . $id_contrato . '|' . json_encode($ids_contratos);
      }else{
        echo "Ocurrió un error al crear la orden de servicio. Err " . $mysqli->error;
      }

    }

    public function crear_recibo_prospecto2($id_servicio,$id_prospecto,$codigo,$fecha,$descuento,$check_descuento_iva,$metodo_pago,$id_contrato,$fecha_contrato,$porcentaje_contrato){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      if(empty($fecha)){
        $fecha = date('Y-m-d');
      }

      // $rcheck = $mysqli->query("SELECT * FROM `ordenes_servicio` WHERE id_prospecto='$id_prospecto' AND id_servicio='$id_servicio' ORDER BY id DESC LIMIT 1");
      // if (mysqli_num_rows($rcheck)>0) {
      //   while($array = $rcheck->fetch_object())
      //   {
      //     $contrato_id_servicio                   = $array->id_servicio;
      //     $contrato_fecha                         = $array->fecha;
      //     $contrato_pago                          = $array->pago;
      //     $contrato_porcentaje_2exhibiciones_1    = $array->porcentaje_2exhibiciones_1;
      //     $contrato_porcentaje_2exhibiciones_2    = $array->porcentaje_2exhibiciones_2;
      //     $contrato_porcentaje_3exhibiciones_1    = $array->porcentaje_3exhibiciones_1;
      //     $contrato_porcentaje_3exhibiciones_2    = $array->porcentaje_3exhibiciones_2;
      //     $contrato_porcentaje_3exhibiciones_dias = $array->porcentaje_3exhibiciones_dias;
      //     $contrato_porcentaje_3exhibiciones_3    = $array->porcentaje_3exhibiciones_3;
      //     $contrato_pago_mensual_dias             = $array->pago_mensual_dias;
      //   }

      //   $fecha_contrato    = "";
      //   $fecha_vencimiento = "NO";

        // if ($contrato_pago==="Único") {
        //   if ($contrato_fecha=="0000-00-00") {
        //     $fecha_contrato = date('Y-m-d');
        //   }else{
        //     $fecha_contrato = $contrato_fecha;
        //   }

        //   $fecha_vencimiento = date("Y-m-d");

        // }else if ($contrato_pago==="2 exhibiciones") {
        //   if ($contrato_fecha=="0000-00-00") {
        //     $fecha_contrato = date('Y-m-d');
        //   }else{
        //     $fecha_contrato = $contrato_fecha;
        //   }

        //   $fecha_vencimiento = date("Y-m-d",strtotime($fecha_contrato."+ 1 month"));
        // }else if ($contrato_pago==="3 exhibiciones") {
        //   if ($contrato_fecha=="0000-00-00") {
        //     $fecha_contrato = date('Y-m-d');
        //   }else{
        //     $fecha_contrato = $contrato_fecha;
        //   }

        //   $fecha_vencimiento = date("Y-m-d",strtotime($fecha_contrato."+ 1 month"));
        // }else if ($contrato_pago==="Pago mensual") {
        //   if ($contrato_fecha=="0000-00-00") {
        //     $fecha_contrato = date('Y-m-d');
        //   }else{
        //     $fecha_contrato = $contrato_fecha;
        //   }

        //   $fecha_vencimiento = date("Y-m-d",strtotime($fecha_contrato."+ 1 month"));
        // }else if ($contrato_pago==="Pago anual") {
        //   if ($contrato_fecha=="0000-00-00") {
        //     $fecha_contrato = date('Y-m-d');
        //   }else{
        //     $fecha_contrato = $contrato_fecha;
        //   }

        //   $fecha_vencimiento = date("Y-m-d",strtotime($fecha_contrato."+ 1 year"));
        // }

        $total = 0;
        $iva   = 0;
        $descuento_total = 0;
        $total_pago = 0;

        $rget_servicio = $mysqli->query("SELECT * FROM prospecto_servicios_lista WHERE id_servicio_codigo=$id_servicio");
        if ($rget_servicio)
        {
          while($array = $rget_servicio->fetch_object())
          {
            $psi_precio = $array->precio;
            $total+= $psi_precio;
          }
        }

        $iva = $total * 0.16;

        if ($check_descuento_iva == "true1") {
          $descuento_total = (($total + $iva) * $descuento) / 100;

          $total+= $iva;
          $total-= $descuento_total;
        }else if ($check_descuento_iva == "true2") {
          $descuento_total = ($total * $descuento) / 100;

          // $total+= $iva;
          $total-= $descuento_total;
        }else if ($check_descuento_iva == "true3") {
          $total+= $iva;
          // $total+= $descuento_total;
        }else if ($check_descuento_iva == "true4") {

        }

        $total_pago = $total;
        $total = $total * $porcentaje_contrato / 100;
      
        $radd = $mysqli->query("INSERT INTO `recibos_pago`(`id`, `id_prospecto`, `codigo`, `fecha`, total, descuento, check_descuento_iva, metodo_pago, status, date_register, fecha_vencimiento, id_contrato_relacionado,porcentaje_pago,total_pago,tipo) VALUES (NULL,'$id_prospecto','$codigo','$fecha','$total','$descuento','$check_descuento_iva','$metodo_pago','Pendiente',NOW(),'$fecha_contrato','$id_contrato','$porcentaje_contrato','$total_pago','Manual')");
        if ($radd) {
          $id_recibo = mysqli_insert_id($mysqli);

          echo "created," . $id_recibo;
        }else{
          echo "Error al crear el recibo de pago. Err " . $mysqli->error;
        }

      // }else{
      //   echo "Debes crear un contrato para este recibo de pago.";
      // }

    }

    public function get_contratos_recibo_pago($id_prospecto,$id_servicio){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rcheck = $mysqli->query("SELECT * FROM `ordenes_servicio` WHERE id_prospecto='$id_prospecto' AND id_servicio='$id_servicio' ORDER BY id DESC LIMIT 1");
      if (mysqli_num_rows($rcheck)>0) {
        while($array = $rcheck->fetch_object())
        {
          $contrato_id                            = $array->id;
          $contrato_codigo                        = $array->codigo;
          $contrato_date_register                 = $array->date_register;
          $contrato_pdf                           = $array->pdf;
          $contrato_id_servicio                   = $array->id_servicio;
          $contrato_fecha                         = $array->fecha;
          $contrato_pago                          = $array->pago;
          $contrato_porcentaje_2exhibiciones_1    = $array->porcentaje_2exhibiciones_1;
          $contrato_porcentaje_2exhibiciones_2    = $array->porcentaje_2exhibiciones_2;
          $contrato_porcentaje_3exhibiciones_1    = $array->porcentaje_3exhibiciones_1;
          $contrato_porcentaje_3exhibiciones_2    = $array->porcentaje_3exhibiciones_2;
          $contrato_porcentaje_3exhibiciones_dias = $array->porcentaje_3exhibiciones_dias;
          $contrato_porcentaje_3exhibiciones_3    = $array->porcentaje_3exhibiciones_3;
          $contrato_pago_mensual_dias             = $array->pago_mensual_dias;
        }

        $fecha_contrato    = "";
        $fecha_vencimiento = "NO";

        if ($contrato_pago==="Único") {
          if ($contrato_fecha=="0000-00-00") {
            $fecha_contrato = date('Y-m-d');
          }else{
            $fecha_contrato = $contrato_fecha;
          }

          $fecha_vencimiento = $fecha_contrato;

          // echo "<h5>Forma de pago: ".$contrato_pago."</h5>";
                // <div class='text-center'>
                //   <button class='btn btn-block btn-success mt-5' id='btn-contrato-1' onclick='set_id_contrato(".'"'.$contrato_id.'"'.", ".'"'.$fecha_vencimiento.'"'.", ".'"1"'.", ".'"1"'.")'>
                //     Fecha de vencimiento: ".$fecha_vencimiento."
                //     <br><br>Fecha de creación: ".$contrato_date_register."
                //   </button>
                // </div>

          echo "<input type='hidden' id='id_contrato' value='".$contrato_id."'>";
          echo "<input type='hidden' id='fecha_contrato' value='".$fecha_vencimiento."'>";
          echo "<input type='hidden' id='porcentaje_contrato' value='100'>";

        }else if ($contrato_pago==="2 exhibiciones") {
          if ($contrato_fecha=="0000-00-00") {
            $fecha_contrato = date('Y-m-d');
          }else{
            $fecha_contrato = $contrato_fecha;
          }

          $fecha_vencimiento1 = date("Y-m-d",strtotime($fecha_contrato."+ 1 month"));
          $fecha_vencimiento2 = date("Y-m-d",strtotime($fecha_contrato."+ 2 month"));

          echo "<h5 class='mt-5'>Selecciona la exhibición</h5>

                <div class='text-center'>
                  <button class='btn btn-block btn-info mt-5' id='btn-contrato-1' onclick='set_id_contrato(".'"'.$contrato_id.'"'.", ".'"'.$fecha_vencimiento1.'"'.", ".'"2"'.", ".'"1"'.",".'"'.$contrato_porcentaje_2exhibiciones_1.'"'.")'>

                    <br>Porcentaje de pago inicial: ".$contrato_porcentaje_2exhibiciones_1."%

                  </button>
                </div>";

          echo "<div class='text-center'>
                  <button class='btn btn-block btn-info mt-5' id='btn-contrato-2' onclick='set_id_contrato(".'"'.$contrato_id.'"'.", ".'"'.$fecha_vencimiento2.'"'.", ".'"2"'.", ".'"2"'.",".'"'.$contrato_porcentaje_2exhibiciones_2.'"'.")'>

                    <br>Porcentaje de pago liquidación: ".$contrato_porcentaje_2exhibiciones_2."%

                  </button>
                </div>";


          echo "<input type='hidden' id='id_contrato' value=''>";
          echo "<input type='hidden' id='fecha_contrato' value=''>";
          echo "<input type='hidden' id='porcentaje_contrato' value=''>";

        }else if ($contrato_pago==="3 exhibiciones") {
          if ($contrato_fecha=="0000-00-00") {
            $fecha_contrato = date('Y-m-d');
          }else{
            $fecha_contrato = $contrato_fecha;
          }

          $fecha_vencimiento1 = date("Y-m-d",strtotime($fecha_contrato."+ 1 month"));
          $fecha_vencimiento2 = date("Y-m-d",strtotime($fecha_contrato."+ 2 month"));
          $fecha_vencimiento3 = date("Y-m-d",strtotime($fecha_contrato."+ 3 month"));

          echo "<h5 class='mt-5'>Selecciona la exhibición</h5>

                <div class='text-center'>
                  <button class='btn btn-block btn-info mt-5' id='btn-contrato-1' onclick='set_id_contrato(".'"'.$contrato_id.'"'.", ".'"'.$fecha_vencimiento1.'"'.", ".'"3"'.", ".'"1"'.",".'"'.$contrato_porcentaje_3exhibiciones_1.'"'.")'>

                    <br>Porcentaje de pago inicial: ".$contrato_porcentaje_3exhibiciones_1."%

                  </button>
                </div>";

          echo "<div class='text-center'>
                  <button class='btn btn-block btn-info mt-5' id='btn-contrato-2' onclick='set_id_contrato(".'"'.$contrato_id.'"'.", ".'"'.$fecha_vencimiento2.'"'.", ".'"3"'.", ".'"2"'.",".'"'.$contrato_porcentaje_3exhibiciones_2.'"'.")'>

                    <br>Porcentaje de pago intermedio: ".$contrato_porcentaje_3exhibiciones_2."%

                  </button>
                </div>";

          echo "<div class='text-center'>
                  <button class='btn btn-block btn-info mt-5' id='btn-contrato-3' onclick='set_id_contrato(".'"'.$contrato_id.'"'.", ".'"'.$fecha_vencimiento3.'"'.", ".'"3"'.", ".'"3"'.",".'"'.$contrato_porcentaje_3exhibiciones_3.'"'.")'>

                    <br>Porcentaje de pago liquidación: ".$contrato_porcentaje_3exhibiciones_3."%

                  </button>
                </div>";

          echo "<input type='hidden' id='id_contrato' value=''>";
          echo "<input type='hidden' id='fecha_contrato' value=''>";
          echo "<input type='hidden' id='porcentaje_contrato' value=''>";
        }else if ($contrato_pago==="Pago mensual") {
          if ($contrato_fecha=="0000-00-00") {
            $fecha_contrato = date('Y-m-d');
          }else{
            $fecha_contrato = $contrato_fecha;
          }

          // $fecha_contrato    = explode('-', $fecha_contrato);
          // $fecha_contrato[2] = $contrato_pago_mensual_dias;
          // $fecha_contrato    = implode('-', $fecha_contrato);

          $fecha_vencimiento = date("Y-m-d",strtotime($fecha_contrato."+ 1 month"));

          // echo "<h5>Forma de pago: ".$contrato_pago."</h5>";
                // <div class='text-center'>
                //   <button class='btn btn-block btn-success mt-5' id='btn-contrato-1' onclick='set_id_contrato(".'"'.$contrato_id.'"'.", ".'"'.$fecha_vencimiento.'"'.", ".'"1"'.", ".'"1"'.")'>
                //     Fecha de vencimiento: ".$fecha_vencimiento."
                //     <br><br>Fecha de creación: ".$contrato_date_register."
                //   </button>
                // </div>

          echo "<input type='hidden' id='id_contrato' value='".$contrato_id."'>";
          echo "<input type='hidden' id='fecha_contrato' value='".$fecha_vencimiento."'>";
          echo "<input type='hidden' id='porcentaje_contrato' value='100'>";
        }else if ($contrato_pago==="Pago anual") {
          if ($contrato_fecha=="0000-00-00") {
            $fecha_contrato = date('Y-m-d');
          }else{
            $fecha_contrato = $contrato_fecha;
          }

          $fecha_vencimiento = date("Y-m-d",strtotime($fecha_contrato."+ 1 year"));

          /// echo "<h5>Forma de pago: ".$contrato_pago."</h5>";
                // <div class='text-center'>
                //   <button class='btn btn-block btn-success mt-5' id='btn-contrato-1' onclick='set_id_contrato(".'"'.$contrato_id.'"'.", ".'"'.$fecha_vencimiento.'"'.", ".'"1"'.", ".'"1"'.")'>
                //     Fecha de vencimiento: ".$fecha_vencimiento."
                //     <br><br>Fecha de creación: ".$contrato_date_register."
                //   </button>
                // </div>

          echo "<input type='hidden' id='id_contrato' value='".$contrato_id."'>";
          echo "<input type='hidden' id='fecha_contrato' value='".$fecha_vencimiento."'>";
          echo "<input type='hidden' id='porcentaje_contrato' value='100'>";
        }

      }else{
        echo "<h2 class='text-center text-danger mt-5'>No hay contratos previos.</h2>";
        echo "<input type='hidden' id='id_contrato' value=''>";
        echo "<input type='hidden' id='fecha_contrato' value=''>";
        echo "<input type='hidden' id='porcentaje_contrato' value=''>";
      }
    }

    public function guardar_nota($nota){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $radd_note = $mysqli->query("INSERT INTO `notas`(`id`, id_lista, `nota`, `date_register`) VALUES (NULL,'','$nota',NOW())");
      if ($radd_note)
      {
        echo "added";
      }else{
        echo "Error al agregar la nota. Err " . $mysqli->error;
      }
    }

    public function agregar_lista($lista_nombre){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $radd_note = $mysqli->query("INSERT INTO `lista_notas`(`id`, `nombre`, `date_register`) VALUES (NULL,'$lista_nombre',NOW())");
      if ($radd_note)
      {
        echo "added";
      }else{
        echo "Error al agregar la lista. Err " . $mysqli->error;
      }
    }

    public function nota_gral_details($id_nota){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();

        echo "<div class='row'>";
      $rget_nota_details = $mysqli->query("SELECT * FROM `notas` WHERE id=$id_nota");
      if ($rget_nota_details)
      {
        while($array = $rget_nota_details->fetch_object())
        {
          $nota = $array->nota;

          $nota = str_replace('<br>', PHP_EOL, $nota);

          echo "<div class='col-12 col-md-12'>
                  <h3>Nota</h3>
                  <textarea id='nota-edit' class='form-control' rows='3' cols='3' placeholder='Notas...'>".$nota."</textarea>
                  <button type='button' class='btn btn-block btn-success mt-5' onclick='editar_nota_gral(".$id_nota.")'>Editar</button>             
                </div>";
        }
        echo "</div>";
      }else{
        echo "Error, intenta nuevamente.";
      }
    }

    public function editar_nota_gral($id_nota,$nota){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $redit_note = $mysqli->query("UPDATE `notas` SET nota='$nota' WHERE id=$id_nota");
      if ($redit_note)
      {
        echo "updated";
      }else{
        echo "Error al editar la nota. Err " . $mysqli->error;
      }
    }

    public function eliminar_nota($id_delete){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete_note = $mysqli->query("DELETE FROM `notas` WHERE id=$id_delete");
      if ($rdelete_note)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar la nota. Err " . $mysqli->error;
      }
    }

    public function eliminar_prospecto_nota($id_delete){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete_note = $mysqli->query("DELETE FROM `prospecto_notas` WHERE id=$id_delete");
      if ($rdelete_note)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar la condición. Err " . $mysqli->error;
      }
    }

    public function cambiar_status_service($status,$id_prospecto,$id_servicio){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rstatus_service = $mysqli->query("UPDATE `prospecto_servicios` SET `status`='$status' WHERE id=$id_servicio AND id_prospecto=$id_prospecto");
      if ($rstatus_service)
      {
        echo "updated";
      }else{
        echo "Error al asignar el status del servicio, intenta nuevamente.";
      }
    }

    public function prospect_objetivo_servicio($objetivo_servicio,$id_prospecto,$id_servicio,$type){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      if ($type === "add") {
        $robjetive_service = $mysqli->query("INSERT INTO `prospecto_objetivo_servicio`(`id`, `id_prospecto`, `id_servicio`, `objetivo`, `date_register`) VALUES (NULL,'$id_prospecto','$id_servicio','$objetivo_servicio',NOW())");
      }else if ($type === "edit") {
        $robjetive_service = $mysqli->query("UPDATE `prospecto_objetivo_servicio` SET `objetivo`='$objetivo_servicio' WHERE id_prospecto=$id_prospecto AND id_servicio=$id_servicio");
      }

      if ($robjetive_service)
      {
        echo "added";
      }else{
        echo "Error al actualizar el objetivo del servicio, intenta nuevamente.";
      }
    }

    public function guardar_equipo_proteccion($equipo){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $radd_equipo_proteccion = $mysqli->query("INSERT INTO `equipo_proteccion`(`id`, `equipo_proteccion`, `date_register`) VALUES (NULL,'$equipo',NOW())");
      if ($radd_equipo_proteccion)
      {
        echo "added";
      }else{
        echo "Error al agregar el equipo de protección, intenta nuevamente.";
      }
    }

    public function agregar_equipo_proteccion_prospecto($id_equipo,$id_prospecto,$id_servicio){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $radd_equipo_proteccion_prospect = $mysqli->query("INSERT INTO `prospecto_equipo_proteccion`(`id`, `id_prospecto`, `id_servicio`, `id_equipo_proteccion`, `date_register`) VALUES (NULL,'$id_prospecto','$id_servicio','$id_equipo',NOW())");
      if ($radd_equipo_proteccion_prospect)
      {
        echo "added";
      }else{
        echo "Error al agregar el equipo de protección, intenta nuevamente.";
      }
    }

    public function prospecto_retencion($nuevo,$iva,$descuento,$descuento_status,$iva_status,$id_servicio,$id_prospecto){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rcheck = $mysqli->query("SELECT * FROM prospecto_iva WHERE id_prospecto=$id_prospecto AND id_servicio=$id_servicio");
      if (mysqli_num_rows($rcheck)>0) {
        $riva = $mysqli->query("UPDATE `prospecto_iva` SET `nuevo`='$nuevo',`iva`='$iva',`descuento`='$descuento',`descuento_status`='$descuento_status',`iva_status`='$iva_status' WHERE id_prospecto=$id_prospecto AND id_servicio=$id_servicio");
      }else{
        $riva = $mysqli->query("INSERT INTO `prospecto_iva`(`id`, `id_prospecto`, `id_servicio`, `nuevo`, `iva`, `descuento`, `descuento_status`, `iva_status`, `date_register`) VALUES (NULL,'$id_prospecto','$id_servicio','$nuevo','$iva','$descuento','$descuento_status','$iva_status',NOW())");
      }

      if ($riva)
      {
        echo "updated";
      }else{
        echo "Error al actualizar. Err " . $mysqli->error;
      }
    }

    public function set_facturacion_choose($id_facturacion,$id_prospecto,$status){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      if ($status == 1) {
        $rupdate_f_option_all = $mysqli->query("UPDATE `prospecto_facturacion` SET selected='' WHERE id_prospecto=$id_prospecto");
        $rupdate_f_option = $mysqli->query("UPDATE `prospecto_facturacion` SET selected='true' WHERE id_prospecto=$id_prospecto AND id=$id_facturacion");
        if ($rupdate_f_option)
        {
          echo "updated";
        }else{
          echo "Error al asignar este dato de facturación, intenta nuevamente.";
        }
      }
    }

    public function guardar_usuario($nombre,$apellidos,$email,$password,$puesto,$telefono){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rcheck_users = $mysqli->query("SELECT * FROM administradores WHERE username='$email'");
      if (mysqli_num_rows($rcheck_users)>0) {
        echo "Ya existe un usuario con este correo. Intenta con otro diferente.";
      }else{
        $radd_user = $mysqli->query("INSERT INTO `administradores`(`id`, `nombre`, `apellidos`, `username`, `password`, `rol`, `telefono`, `date_register`) VALUES (NULL,'$nombre','$apellidos','$email','$password','$puesto','$telefono',NOW())");
        if ($radd_user)
        {
          echo "added";
        }else{
          echo "Error al agregar el usuario, intenta nuevamente.";
        }
      }
      
    }

    // public function editar_usuario($nombre,$apellidos,$email,$password,$puesto,$telefono,$id_usuario){
    //   include("../../../configuration/backend/private/conexion.php");
    //   $response = array();

    //   $rupdate_user = $mysqli->query("UPDATE `administradores` SET 
    //       `nombre`='$nombre',
    //       `apellidos`='$apellidos',
    //       `username`='$email',
    //       `password`='$password',
    //       `rol`='$puesto',
    //       `telefono`='$telefono'
    //     WHERE id=$id_usuario");
    //   if ($rupdate_user)
    //   {
    //     echo "updated";
    //   }else{
    //     echo "Error al editar el usuario, intenta nuevamente.";
    //   }
    // }

    public function delete_user($id_delete){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete_user = $mysqli->query("DELETE FROM administradores WHERE id=$id_delete");
      if ($rdelete_user)
      {
        echo "deleted";
      }else{
        echo "Error el eliminar el usuario, intenta nuevamente.";
      }
    }

    public function prospect_add_service_to_list_other($nombre_servicio,$descripcion_servicio,$unidad_medida_servicio,$precio_servicio,$id_servicio,$id_prospecto){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      $descripcion_servicio = str_replace('<br>', PHP_EOL, $descripcion_servicio);
      
      $radd_service_list_other = $mysqli->query("INSERT INTO `prospecto_servicios_lista`(`id`, `id_servicio_codigo`, `id_servicio`, `descripcion`, `descripcion_original`, `unidad`, `precio`, `status`, `otro`, `nombre`, `date_register`) VALUES (NULL,'$id_servicio','','$descripcion_servicio','$descripcion_servicio','$unidad_medida_servicio','$precio_servicio','updated','otro','$nombre_servicio',NOW())");
      if ($radd_service_list_other)
      {
        echo "added";
      }else{
        echo "Error al agregar el nuevo servicio, intenta nuevamente.";
      }
    }

    public function guardar_prospecto_servicio_otro($nombre_servicio,$descripcion_servicio,$unidad_medida_servicio,$precio_servicio,$id_servicio){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      $descripcion_servicio = str_replace('<br>', PHP_EOL, $descripcion_servicio);
      
      $radd_service_list_other = $mysqli->query("UPDATE `prospecto_servicios_lista` SET 
          `descripcion`='$descripcion_servicio',
          `descripcion_original`='$descripcion_servicio',
          `unidad`='$unidad_medida_servicio',
          `precio`='$precio_servicio',
          `nombre`='$nombre_servicio'
        WHERE id=$id_servicio");
      if ($radd_service_list_other)
      {
        echo "updated";
      }else{
        echo "Error al editar el servicio, intenta nuevamente.";
      }
    }

    public function guardar_lista($lista){
      include("../../../configuration/backend/private/conexion.php");

      $response = array();
      
      $radd_list = $mysqli->query("INSERT INTO `servicios_listas`(`id`, `lista`, `date_register`) VALUES (NULL,'$lista',NOW())");
      if ($radd_list)
      {
        echo "added";
      }else{
        echo "Error al agregar la lista, intenta nuevamente.";
      }
    }

    public function guardar_servicio($servicio,$precio,$descripcion,$tiempo){
      include("../../../configuration/backend/private/conexion.php");

      $response = array();
      
      $radd_service = $mysqli->query("INSERT INTO `servicios`(`id`, `servicio`, precio, `descripcion`, tiempo, `date_register`) VALUES (NULL,'$servicio','$precio','$descripcion','$tiempo',NOW())");
      if ($radd_service)
      {
        $id_servicio = mysqli_insert_id($mysqli);
        echo "added," . $id_servicio;
      }else{
        echo "Error al agregar el servicio. Err " . $mysqli->error;
      }
    }

    public function service_details($id_service){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rget_service_details = $mysqli->query("SELECT * FROM `servicios` WHERE id=$id_service");
      if ($rget_service_details)
      {
        while($array = $rget_service_details->fetch_object())
        {
          $servicio    = $array->servicio;
          $precio      = $array->precio;
          $descripcion = $array->descripcion;
          $tiempo      = $array->tiempo;

          // $descripcion = str_replace('<br>', PHP_EOL, $descripcion);
        }
    ?>
        <div class="row mb-5">
          <div class="col-md-6">
            <h5>Nombre del servicio</h5>
            <input type="text" id="servicio_editar" class="form-control" placeholder="Escribe aquí el nombre" value="<?php echo $servicio; ?>">
          </div>

          <div class="col-md-6">
            <h5>Precio</h5>
            <input type="number" id="precio_editar" class="form-control" placeholder="Escribe aquí el precio" value="<?php echo $precio; ?>">
          </div>

          <div class="col-md-6 mt-2">
            <h5>Imagen</h5>
            <input type="file" id="imagen_editar" class="form-control">
          </div>

          <div class="col-md-6 mt-2">
            <h5>Tiempo de entrega</h5>
            <select class="form-control" id="tiempo-entrega_editar">
              <option value="<?php echo $tiempo; ?>" selected><?php echo $tiempo; ?></option>
              <option value="Inmediata">Inmediata</option>
              <option value="24 horas">24 horas</option>
              <option value="48 horas">48 horas</option>
              <option value="5 días hábiles">5 días hábiles</option>
              <option value="10 días hábiles">10 días hábiles</option>
              <option value="15 días hábiles">15 días hábiles</option>
            </select>
          </div>
        </div>

        <textarea id="kt_docs_tinymce_hidden2" name="kt_docs_tinymce_hidden2" class="tox-target"><?php echo $descripcion; ?></textarea>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
          <button type="button" class="btn btn-block btn-primary me-md-2 mt-5" onclick="editar_servicio('<?php echo $id_service; ?>')">Editar</button>
          <button type="button" class="btn btn-secondary mt-5" data-bs-dismiss="modal">Cancelar</button>
        </div>

    <?php 
      }else{
        echo "Error, intenta nuevamente.";
      }
    }

    public function delete_service($id_delete){
      include("../../../configuration/backend/private/conexion.php");

      $response = array();
      
      $rdelete_service = $mysqli->query("DELETE FROM `servicios` WHERE id=$id_delete");
      if ($rdelete_service)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar el servicio. Err " . $mysqli->error;
      }
    }

    public function list_details($id_lista,$lista){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      $cont = 0;

      echo '<h3>'.$lista.'</h3>';
      echo '<div class="form-row">
              <div class="col-sm-8">
                <input type="text" id="opcion" class="form-control form-control" placeholder="Nombre de la opci&oacute;n" value="">
              </div>

              <div class="col-sm-4">
                <button type="button" class="btn btn-block btn-primary" onclick="agregar_servicion_opcion(';
      echo "'" . $id_lista . "',"  . "'" . $lista . "'";
      echo ')">Agregar</button>
              </div>
            </div>';

      $rget_service_option_details = $mysqli->query("SELECT * FROM `servicios_listas_opciones` WHERE id_lista=$id_lista");
      if ($rget_service_option_details)
      {
        if (mysqli_num_rows($rget_service_option_details)>0) {
          echo '<div class="table-responsive" style="height: 15em;" id="check-list-option">
                  <table class="table">
                    <thead class="thead">
                     <tr>
                       <th class="table-column-pr-0" scope="col" style="width: 20rem;">#</th>
                       <th class="table-column-pl-0" scope="col" style="width: 20rem;">Opci&oacute;n</th>
                       <th scope="col"></th>
                     </tr>
                    </thead>

                    <tbody>';
          while($array = $rget_service_option_details->fetch_object())
          {
            $opcion = $array->opcion;
            $cont++;

            echo '<tr>
                    <td class="table-column-pr-0">'.$cont.'</td>
                    <td class="table-column-pl-0 text-justify">'.$opcion.'</td>
                    <td>
                      <i style="color: #000;" class="tio-add-to-trash" onclick="options_cuadrilla_prospecto()"></i>
                    </td>
                  </tr>';
          }

          echo '    </tbody>
                  </table>
                </div>';
        }else{
          echo "<h3 class='container mt-5'>No hay opciones agregadas.</h3>";
        }
      }else{
        echo "Error, intenta nuevamente.";
      }
    }

    public function lista_notas_details($id_lista,$lista){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      $cont = 0;

      echo '<h3>'.$lista.'</h3>';
      echo '<div class="form-row">
              <div class="col-sm-8">
                <input type="text" id="nota" class="form-control form-control" placeholder="Nombre de la nota" value="">
              </div>

              <div class="col-sm-4">
                <button type="button" class="btn btn-block btn-primary" onclick="agregar_nota_lista(';
      echo "'" . $id_lista . "',"  . "'" . $lista . "'";
      echo ')">Agregar</button>
              </div>
            </div>';

      $rget_service_option_details = $mysqli->query("SELECT * FROM `notas` WHERE id_lista=$id_lista");
      if ($rget_service_option_details)
      {
        if (mysqli_num_rows($rget_service_option_details)>0) {
          echo '<div class="table-responsive" style="height: 15em;" id="check-list-option">
                  <table class="table">
                    <thead class="thead">
                     <tr>
                       <th class="table-column-pr-0" scope="col" style="width: 20rem;">#</th>
                       <th class="table-column-pl-0" scope="col" style="width: 20rem;">Nota</th>
                     </tr>
                    </thead>

                    <tbody>';
          while($array = $rget_service_option_details->fetch_object())
          {
            $nota = $array->nota;
            $cont++;

            echo '<tr>
                    <td class="table-column-pr-0">'.$cont.'</td>
                    <td class="table-column-pl-0 text-justify">'.$nota.'</td>
                  </tr>';
          }

          echo '    </tbody>
                  </table>
                </div>';
        }else{
          echo "<h3 class='container mt-5'>No hay notas agregadas.</h3>";
        }
      }else{
        echo "Error, intenta nuevamente." . $mysqli->error;
      }
    }

    public function agregar_servicion_opcion($opcion,$id_lista){
      include("../../../configuration/backend/private/conexion.php");

      $response = array();
      
      $radd_list_option = $mysqli->query("INSERT INTO `servicios_listas_opciones`(`id`, `id_lista`, `opcion`, `date_register`) VALUES (NULL,'$id_lista','$opcion',NOW())");
      if ($radd_list_option)
      {
        echo "added";
      }else{
        echo "Error al agregar la opción." . $mysqli->error;
      }
    }
    
    public function agregar_nota_lista($nota,$id_lista){
      include("../../../configuration/backend/private/conexion.php");

      $response = array();
      
      $radd_list_option = $mysqli->query("INSERT INTO `notas`(`id`, `id_lista`, `nota`, `date_register`) VALUES (NULL,'$id_lista','$nota',NOW())");
      if ($radd_list_option)
      {
        echo "added";
      }else{
        echo "Error al agregar la nota. Err " . $mysqli->error;
      }
    }
    
    public function delete_list($id_delete){
      include("../../../configuration/backend/private/conexion.php");

      $response = array();
      
      $rdelete_list = $mysqli->query("DELETE FROM `servicios_listas` WHERE id=$id_delete");
      $rdelete_list_options = $mysqli->query("DELETE FROM `servicios_listas_opciones` WHERE id_lista=$id_delete");
      if ($rdelete_list)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar la lista, intenta nuevamente.";
      }
    }
    
    public function delete_list_notas($id_delete){
      include("../../../configuration/backend/private/conexion.php");

      $response = array();
      
      $rdelete_list = $mysqli->query("DELETE FROM `lista_notas` WHERE id=$id_delete");
      $rdelete_list_options = $mysqli->query("DELETE FROM `notas` WHERE id_lista=$id_delete");
      if ($rdelete_list)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar la lista. Err " . $mysqli->error;
      }
    }

    public function send_mail_contact($nombre,$apellidos,$email,$telefono,$detalles,$empresa,$publicidad){
      include("../../../configuration/backend/private/conexion.php");

      $response = array();
      
      $radd_form = $mysqli->query("INSERT INTO `forumario_contacto`(`id`, `nombre`, `apellidos`, `email`, `telefono`, `detalles`, `empresa`, `date_register`) VALUES (NULL,'$nombre','$apellidos','$email','$telefono','$detalles','$empresa',NOW())");

      $rcheck = $mysqli->query("SELECT * FROM `prospecto` WHERE `email`='$email'");
      if (mysqli_num_rows($rcheck)>0) {
        if ($rcheck)
        {
          while($array = $rcheck->fetch_object())
          {
            $id_prospecto = $array->id;
          }
        }

        $radd_adicional = $mysqli->query("INSERT INTO `prospecto_adicionales`(`id`, `id_prospecto`, `adicional`, `date_register`) VALUES (NULL,'$id_prospecto','$detalles',NOW())");
      }else{
          if($publicidad == "Publicidad"){$tag = "Publicidad";}else{$tag = "Nuevo Prospecto Web";}
        $radd_prospect = $mysqli->query("INSERT INTO `prospecto`(`id`, `id_admin`, `nombre`, `apellidos`, `empresa`, `direccion`, `puesto`, `email`, `telefono_oficina`, `telefono_whatsapp`, `tag`, status, `date_register`) VALUES (NULL,'0','$nombre','$apellidos','$empresa','No registrado','No registrado','$email','$telefono','$telefono','$tag','_sinprocesar',NOW())");
        $id_prospecto = mysqli_insert_id($mysqli);
        $radd_adicional = $mysqli->query("INSERT INTO `prospecto_adicionales`(`id`, `id_prospecto`, `adicional`, `date_register`) VALUES (NULL,'$id_prospecto','$detalles',NOW())");
      }

      if ($radd_form)
      {
        $to      = 'contacto@drenamex.com.mx';
        // $to      = 'compusmartok@gmail.com';
        $subject = 'Nueva solicitud página Drenamex';
        $message = 
                  "Nombre: " . $nombre . "\r\n" .
                  "Apellidos: " . $apellidos . "\r\n" .
                  "Email: " . $email . "\r\n" .
                  "Telefono: " . $telefono . "\r\n" .
                  "Empresa: " . $empresa . "\r\n" .
                  "Detalles: " . $detalles . "\r\n";
        $headers = 'From: ' . $email       . "\r\n" .
               'Reply-To: ' . $email       . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

        if(mail($to, $subject, $message, $headers)){
          echo "added";
        }else{
          echo "Error al enviar tu solicitud, intenta nuevamente.";
        }
      }else{
        echo "Error al enviar tu solicitud, intenta nuevamente. Err " . $mysqli->error;
      }
    }
    
    public function eliminar_cotizacion($id_delete){
      include("../../../configuration/backend/private/conexion.php");

      $response = array();
      
      $rdelete_list = $mysqli->query("DELETE FROM `cotizaciones` WHERE id=$id_delete");
      if ($rdelete_list)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar la cotización, intenta nuevamente.";
      }
    }
    
    public function eliminar_ordenservicio($id_delete){
      include("../../../configuration/backend/private/conexion.php");

      $response = array();
      
      $rdelete_list = $mysqli->query("DELETE FROM `ordenes_compra` WHERE id=$id_delete");
      if ($rdelete_list)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar la orden de servicio, intenta nuevamente.";
      }
    }

    public function mail_cotizacion_update($id_cotizacion,$mensaje){
      include("../../../configuration/backend/private/conexion.php");
      include("../../../configuration/backend/helpers/session_check.php");

      $response = array();
      
      $rupdate = $mysqli->query("UPDATE `cotizaciones` SET sent='enviado' WHERE id=$id_cotizacion");
      if ($rupdate)
      {
        $rupdate = $mysqli->query("INSERT INTO `mail_cotizacion_sent`(`id`, `id_admin`, `id_cotizacion`, `mensaje`, `date_register`) VALUES (NULL,'$_AMBIEZA_id','$id_cotizacion','$mensaje',NOW())");
        echo "updated";
      }else{
        echo "Error. Err " . $mysqli->error;
      }
    }
    
    public function mail_orden_servicio_update($id_orden_servicio,$mensaje){
      include("../../../configuration/backend/private/conexion.php");
      include("../../../configuration/backend/helpers/session_check.php");

      $response = array();
      
      $rupdate = $mysqli->query("UPDATE `ordenes_compra` SET sent='enviado' WHERE id=$id_orden_servicio");
      if ($rupdate)
      {
        $rupdate = $mysqli->query("INSERT INTO `mail_orden_servicio_sent`(`id`, `id_admin`, `id_cotizacion`, `mensaje`, `date_register`) VALUES (NULL,'$_AMBIEZA_id','$id_orden_servicio','$mensaje',NOW())");
        echo "updated";
      }else{
        echo "Error. Err " . $mysqli->error;
      }
    }

    public function asignar_prospecto($id_admin,$id_prospecto){
      include("../../../configuration/backend/private/conexion.php");

      $response = array();
      
      $rupdate = $mysqli->query("UPDATE `prospecto` SET id_admin=$id_admin WHERE id=$id_prospecto");
      if ($rupdate)
      {
        echo "updated";
      }else{
        echo "Error. Err " . $mysqli->error;
      }
    }

    public function recibos_pago_folios($cliente){
      include("../../../configuration/backend/private/conexion.php");

      $response = array();
      
      $rget = $mysqli->query("SELECT * FROM `prospecto_servicios` WHERE id_prospecto=$cliente");
      if ($rget)
      {
        if (mysqli_num_rows($rget)>0) {
          echo '<div class="row">';
          while($array = $rget->fetch_object())
          {
            $n_id     = $array->id;
            $n_codigo = $array->codigo;

            // MONTO
            $total_monto_servicio_d3 = 0;
            $rservice_lista_d3 = $mysqli->query("SELECT * FROM prospecto_servicios_lista WHERE id_servicio_codigo=$n_id");
            if ($rservice_lista_d3){
              while($array = $rservice_lista_d3->fetch_object())
              {
                $precio_d3 = $array->precio;
                $total_monto_servicio_d3+= $precio_d3;
              }
            }

            $rprospecto_retencion = $mysqli->query("SELECT * FROM prospecto_iva WHERE id_prospecto=$cliente AND id_servicio=$n_id");
            if ($rprospecto_retencion)
            {
              if (mysqli_num_rows($rprospecto_retencion)>0) {
                while($array = $rprospecto_retencion->fetch_object())
                {
                  $status_iva       = $array->status_iva;
                  $retencion        = $array->retencion;
                  $status_retencion = $array->status_retencion;
                }
              }else{
                $status_iva       = 1;
                $retencion        = "";
                $status_retencion = "";
              }
            }

            if ($status_iva == 1) {
              $iva = $total_monto_servicio_d3 * 0.16;
            }else{
              $iva = 0;
            }

            if ($status_retencion == 1) {
              $retencion_status = $retencion / 100;
              $retencion_t = $total_monto_servicio_d3 * $retencion_status;
            }else{
              $retencion_t = 0;
            }

            $total_monto_servicio_d3 = $total_monto_servicio_d3 + $iva + $retencion_t;
    ?>
            <div class="col-md-4 mt-2">
              <button class="btn btn-info" onclick="crear_recibo_pago('<?php echo $cliente; ?>','<?php echo $n_id; ?>','<?php echo $n_codigo; ?>','<?php echo $total_monto_servicio_d3; ?>')"><?php echo $n_codigo; ?> $<?php echo number_format($total_monto_servicio_d3,2); ?></button>
            </div>
    <?php 
            $total_monto_servicio_d3 = 0;
          }
          echo '</div>';
        }else{
          echo "<h3>Este cliente no tiene servicios.</h3>";
        }
      }else{
        echo "Error. Err " . $mysqli->error;
      }
    }

    public function crear_recibo_pago($id_cliente,$id_servicio,$codigo,$monto){
      include("../../../configuration/backend/private/conexion.php");

      $response = array();
      
      $radd = $mysqli->query("INSERT INTO `recibos_pago`(`id`, `id_prospecto`, `codigo`, `fecha`, `date_register`, id_servicio,status,monto) VALUES (NULL,'$id_cliente','$codigo','',NOW(),'$id_servicio','Creado','$monto')");
      if ($radd) {

        $id_recibo = mysqli_insert_id($mysqli);
        echo "created," . $id_recibo;
      }else{
        echo "Error. Err " . $mysqli->error;
      }
    }

    // public function status_recibo_pago($id_recibo,$status){
    //   include("../../../configuration/backend/private/conexion.php");

    //   $response = array();
      
    //   $rupdate = $mysqli->query("UPDATE `recibos_pago` SET `status`='$status' WHERE id=$id_recibo");
    //   if ($rupdate) {
    //     echo "updated";
    //   }else{
    //     echo "Error. Err " . $mysqli->error;
    //   }
    // }
    
    public function eliminar_recibo_pago($id_delete){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete_prospect_service = $mysqli->query("DELETE FROM `recibos_pago` WHERE id=$id_delete");
      if ($rdelete_prospect_service)
      {
        echo "deleted";
      }else{
        echo "Error al eliminar el recibo de pago. Err " . $mysqli->error;
      }
    }
    
    public function get_historial_recibos_pdf($id_recibo){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

        $rrecibos = $mysqli->query("SELECT * FROM recibos_pago WHERE id=$id_recibo");
        if ($rrecibos)
        {
          while($array = $rrecibos->fetch_object())
          {
            $rp_date_register = $array->date_register;
            $rp_pdf           = $array->pdf;
            $rp_status        = $array->status;
          }
        }
        
        $rget = $mysqli->query("SELECT * FROM recibos_pago_pdf WHERE id_recibo=$id_recibo ORDER BY id DESC");
        if ($rget)
        {
            $total = mysqli_num_rows($rget) + 1;
            echo "<h3>Total: ".$total."</h3>";
            echo "<div class='row'>";
            if(mysqli_num_rows($rget)>0){
                $cont = 0;
                while($array = $rget->fetch_object())
                {
                  $pdf           = $array->pdf;
                  $status        = $array->status;
                  $date_register = $array->date_register;
                  $cont++;
                  
                  if ($cont == 1) {
                    echo "<div class='col-md-12 mt-3 text-info'><a style='text-decoration: none; color:blue;' href='../docs/pdf/saves_recibos_pago/".$pdf."' target='_blank'><i class='tio-attachment-diagonal'></i> Estado: ".$status." - fecha: ".$date_register."</a></div>";
                  }else{
                    echo "<div class='col-md-12 mt-3 text-secondary'><a style='text-decoration: none; color:black;' href='../docs/pdf/saves_recibos_pago/".$pdf."' target='_blank'><i class='tio-attachment-diagonal'></i> Estado: ".$status." - fecha: ".$date_register."</a></div>";
                  }
                  
                }
            }else{
              // echo "No hay más PDF.";
            }
            
            echo "<hr><div class='col-md-12 mt-3'><a style='text-decoration: none; color:black;' href='../docs/pdf/saves_recibos_pago/".$rp_pdf."' target='_blank'><i class='tio-attachment-diagonal'></i> Estado: Creado - fecha: ".$rp_date_register." (original)</a></div>";
            echo "</div>";
        }else{
            echo "Error. Err " . $mysqli->error;
        }
    }
    
    public function agregar_servicio($nombre,$descripcion,$no_doctor,$no_spa,$tipo){
      include("../../../configuration/backend/private/conexion.php");
      include("../../../configuration/backend/helpers/session_check.php");

      $response = array();
      
      $radd = $mysqli->query("INSERT INTO `servicios`(`id`, id_usuario, `nombre`, `descripcion`, tipo, no_doctor, no_spa, `date_register`) VALUES (NULL,'$BIOVITAL_ID','$nombre','$descripcion','$tipo','$no_doctor','$no_spa',NOW())");
      if ($radd)
      {
        $id_servicio = mysqli_insert_id($mysqli);

        $radd1 = $mysqli->query("INSERT INTO `servicios_ocupacion`(`id`, `id_servicio`, `nombre`, `capacidad`, `date_register`) VALUES (NULL,'$id_servicio','Doctor','$no_doctor',NOW())");
        $radd2 = $mysqli->query("INSERT INTO `servicios_ocupacion`(`id`, `id_servicio`, `nombre`, `capacidad`, `date_register`) VALUES (NULL,'$id_servicio','SPA','$no_spa',NOW())");

        echo "registered";
      }else{
        echo "Err " . $mysqli->error;
      }
    }

    // PAGINA
    public function save_new_post($titulo,$descripcion,$titulo_seo,$descripcion_seo,$claves_seo,$lista_categorias){

      include("../../../configuration/backend/private/conexion.php");
      // include_once("../../helpers/create-post.php");
      // include_once("../../helpers/eliminar-acentos.php");
      
      $pagina   = $titulo;
      $response = array();

      // $pagina = eliminar_tildes($pagina);

      // $pagina = strtolower($pagina);
      // $pagina = str_replace('á','a',$pagina);
      // $pagina = str_replace('é','e',$pagina);
      // $pagina = str_replace('í','i',$pagina);
      // $pagina = str_replace('ó','o',$pagina);
      // $pagina = str_replace('ú','u',$pagina);
      
      $pagina = str_replace('.','',$pagina);
      $pagina = str_replace(',','',$pagina);
      $pagina = str_replace(':','',$pagina);
      $pagina = str_replace('-','',$pagina);
      $pagina = str_replace(' ','-',$pagina);
      $pagina = str_replace('¿','',$pagina);
      $pagina = str_replace('?','',$pagina);
      $pagina = str_replace('¡','',$pagina);
      $pagina = str_replace('!','',$pagina);

      $pagina = str_replace('á','a',$pagina);
      $pagina = str_replace('é','e',$pagina);
      $pagina = str_replace('í','i',$pagina);
      $pagina = str_replace('ó','o',$pagina);
      $pagina = str_replace('ú','u',$pagina);
      $pagina = str_replace('ñ','n',$pagina);

      $pagina = strtolower($pagina);

      $radd_post = $mysqli->query("INSERT INTO `blog_publicaciones`(`id`, `titulo`, `descripcion`, `titulo_seo`, `descripcion_seo`, `claves_seo`, `imagen`, `lista_categorias`, `pagina`, `date_register`) VALUES (NULL,'$titulo','$descripcion','$titulo_seo','$descripcion_seo','$claves_seo','','$lista_categorias','$pagina',NOW())");
      if ($radd_post)
      {
        // create_post($pagina . ".php");
        $id_post = mysqli_insert_id($mysqli);
        echo "added," . $id_post . ',' . $pagina;
      }else{
        echo "Error al agregar la publicación, intenta nuevamente.";
      }
    }

    public function edit_post($titulo,$descripcion,$titulo_seo,$descripcion_seo,$claves_seo,$lista_categorias,$id){

      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rupdate = $mysqli->query("UPDATE `blog_publicaciones` SET 
          `titulo`='$titulo',
          `descripcion`='$descripcion',
          `titulo_seo`='$titulo_seo',
          `descripcion_seo`='$descripcion_seo',
          `claves_seo`='$claves_seo',
          `lista_categorias`='$lista_categorias'
        WHERE id=$id");
      if ($rupdate)
      {
        echo "updated";
      }else{
        echo "Error, intenta nuevamente.";
      }
    }

    public function delete_post($id,$pagina){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rdelete = $mysqli->query("DELETE FROM `blog_publicaciones` WHERE id=$id");
      if ($rdelete)
      {
        // unlink("../articulo/" . $pagina . ".php");
        echo "deleted";
      }else{
        echo "Error, intenta nuevamente.";
      }
    }

    // PAGINA WEB
    public function enviar_cotizacion($nombre,$correo,$telefono,$empresa,$descripcion,$servicio,$g_recaptcha_response){
      require('../../../configuration/frontend/helpers/captcha/constant.php');
      include("../../../configuration/backend/private/conexion.php");

      // DATA RECEIVED

      // VALIDATIONS
      if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){ //email validation
          echo "Ingresa tu correo electronico.<br>";
      }else{

        if (!empty($g_recaptcha_response)) {
        // if (isset($g_recaptcha_response)) {   
          require('../../../configuration/frontend/helpers/captcha/component/recaptcha/src/autoload.php');   
          $recaptcha = new \ReCaptcha\ReCaptcha(SECRET_KEY);
          $resp = $recaptcha->verify($g_recaptcha_response, $_SERVER['REMOTE_ADDR']);

          if (!$resp->isSuccess()) {
            echo "Debes marcar la casilla No soy un robot";
          }
        // }

          $response = array();
          $rcheck = $mysqli->query("SELECT * FROM `prospecto` WHERE email='$correo'");
          if (mysqli_num_rows($rcheck)>0) {
            if ($rcheck)
            {
              while($array = $rcheck->fetch_object())
              {
                $id_prospecto = $array->id;
              }
            }

            $codigo = 0;

            $rget_prospecto = $mysqli->query("SELECT * FROM prospecto_servicios WHERE id_prospecto=$id_prospecto");
            if ($rget_prospecto)
            {
              while($array = $rget_prospecto->fetch_object())
              {
                $codigo = $array->codigo;
              }
            }
            
            $codigo++;
            $codigo = strtoupper($codigo);

            $radd_service = $mysqli->query("INSERT INTO `prospecto_servicios`(`id`, `id_prospecto`, `codigo`, `status`, nombre, descripcion, `date_register`) VALUES (NULL,'$id_prospecto','$codigo','','$servicio','$descripcion',NOW())");

          }else{

            $radd = $mysqli->query("INSERT INTO `prospecto`(`id`, `id_admin`, `nombre`, `apellidos`, `empresa`, `direccion`, `puesto`, `email`, `telefono_oficina`, `extencion`, `telefono_whatsapp`, `tag`, `visto`, status, `date_register`) VALUES (NULL,'1','$nombre','','$empresa','','','$correo','$telefono','','','Nuevo Prospecto Web','','_sinprocesar',NOW())");
            if ($radd) {
              $id_prospecto = mysqli_insert_id($mysqli);
              $codigo       = $nombre[0] . $nombre[1] . $id_prospecto . "0001";
              $codigo       = strtoupper($codigo);

              $radd_service = $mysqli->query("INSERT INTO `prospecto_servicios`(`id`, `id_prospecto`, `codigo`, `status`, nombre, descripcion, `date_register`) VALUES (NULL,'$id_prospecto','$codigo','','$servicio','$descripcion',NOW())");
              // $id_servicio = mysqli_insert_id($mysqli);

              // $radd_service_details = $mysqli->query("INSERT INTO `prospecto_servicios_lista`(`id`, `id_servicio_codigo`, `id_servicio`, `descripcion`, `descripcion_original`, `unidad`, `precio`, `cantidad`, `status`, `otro`, `nombre`, `date_register`) VALUES (NULL,'$id_servicio','','$descripcion','$descripcion','1','','1','','si','$servicio',NOW())");
            }

          }

          // DATA TO SEND
          // $toEmail = "ventas@induce.mx";
          // $mailBody = "Nombre: " . $nombre . "\n";
          // $mailBody .= "Correo: " . $correo . "\n";
          // $mailBody .= "Telefono: " . $telefono . "\n";
          // $mailBody .= "Servicio: " . $servicio . "\n";
          // $mailBody .= "Descripcion: " . $descripcion . "\n";

          // if (mail($toEmail, "Cotizacion de induce.mx", $mailBody)) {
          //   echo "sent";
          // } else {
          //   echo "Error al enviar mensaje, intenta nuevamente.";
          // }

          $data_mensaje = "Nombre: " . $nombre . "\n\n<br>Correo: " . $correo . "\n\n<br>Teléfono: " . $telefono . "\n\n<br>Servicio: " . $servicio . "\n\n<br>Descripción: " . $descripcion;

          include("../../../configuration/backend/mail/_formato-pagina.php");

          require '../../../configuration/backend/mail/src/PHPMailer.php';
          require '../../../configuration/backend/mail/src/Exception.php';
          require '../../../configuration/backend/mail/src/SMTP.php';

          $mail = new PHPMailer(true);
          $mail->CharSet = "UTF-8";

          try {
              $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
              $mail->isSMTP();                                            //Send using SMTP
              $mail->Host       = 'smtp.ionos.mx';                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
              $mail->Username   = 'ventas@induce.mx';                     //SMTP username
              $mail->Password   = '&$hi?FK!rK%D';                               //SMTP password
              // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
              $mail->Port       = 465;
              $mail->SMTPSecure = "ssl";

              $mail->From = "ventas@induce.mx";
              $mail->FromName = "Induce Marketing";
              $mail->AddReplyTo('ventas@induce.mx','Induce Marketing');

              $mail->setFrom('ventas@induce.mx', 'Induce Marketing');
              $mail->addAddress("ventas@induce.mx");               //Name is optional
              $mail->addReplyTo('ventas@induce.mx', 'Soporte');

              $mail->isHTML(true);                                  //Set email format to HTML
              $mail->Subject = "Cotizacion de induce.mx";
              $mail->Body    = $message;
              $mail->SMTPOptions = array(
                  'ssl' => array(
                      'verify_peer' => false,
                      'verify_peer_name' => false,
                      'allow_self_signed' => true
                      )
                  );

              if(!$mail->Send()) {
                 echo 'Mail not sent, error: ' . $mail->ErrorInfo;
              } else {
                 echo 'Message has been sent correctly.';
              }
          } catch (Exception $e) {
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }

        }else{
          echo "Debes marcar la casilla No soy un robot";
        }

      }
    }

    // BODY
    public function call_list_blog($param){
      include("../../../configuration/backend/private/conexion.php");
      include("../../../configuration/frontend/helpers/format-dates.php");

      $response = array();
      $list_ids = "";

      $rpost = $mysqli->query("SELECT * FROM blog_publicaciones ORDER BY id DESC LIMIT 8");
  ?>
      <!-- Blog grid-->
      <div class="masonry-grid overflow-hidden" data-columns="4">

      <?php 
        if (mysqli_num_rows($rpost)>0) {
          while($array = $rpost->fetch_object())
          {
            $id               = $array->id;
            $titulo           = $array->titulo;
            $imagen           = $array->imagen;
            $lista_categorias = $array->lista_categorias;
            $pagina           = $array->pagina;
            $date_register    = $array->date_register;
            
            if (empty($list_ids)) {
              $list_ids.= $id;
            }else{
              $list_ids.= "," . $id;
            }
      ?>

            <!-- Post-->
            <div class="masonry-grid-item">
              <article class="card card-hover">
                <!-- <a class="card-img-top" href="/articulo/<?php // echo $pagina; ?>">
                  <img src="./img/post/<?php // echo $imagen; ?>" alt="<?php // echo $titulo; ?>">
                </a> -->
                
                <a class="card-img-top" href="./articulo/<?php echo $pagina; ?>">
                  <img src="./uploads/imgs/blog/<?php echo $imagen; ?>" alt="<?php echo $titulo; ?>">
                </a>
                <div class="card-body">
                  <a class="meta-link fs-sm mb-2" href="./articulo/<?php echo $pagina; ?>">
                    <?php echo $lista_categorias; ?>
                  </a>
                  <h2 class="h5 nav-heading mb-4">
                    <a href="./articulo/<?php echo $pagina; ?>">
                      <?php echo $titulo; ?>
                    </a>
                  </h2>
                  <div class="mt-3 text-end text-nowrap">
                    <a class="meta-link fs-xs" href="./articulo/<?php echo $pagina; ?>">
                      <i class="ai-calendar me-1 mt-n1 align-middle"></i>&nbsp;
                    <?php echo fecha($date_register); ?>
                    </a>
                  </div>
                </div>
              </article>
            </div>
            <!-- Post-->

      <?php 
          }
        }else{ 
          echo "<h3>No hay publicaciones para ver.</h3>";
        } 
      ?>

      <input type="hidden" id="ids" value="<?php echo $list_ids; ?>">

      </div>
    <?php 
    }

    public function call_list_blog_more($ids){
      include("../../../configuration/backend/private/conexion.php");
      include("../../../configuration/frontend/helpers/format-dates.php");

      $response = array();
      $list_ids = "";

      $rpost = $mysqli->query("SELECT * FROM blog_publicaciones WHERE id not in($ids) ORDER BY id DESC LIMIT 8");
  ?>
      <!-- Blog grid-->
      <div class="masonry-grid overflow-hidden" data-columns="4">

      <?php 
        if (mysqli_num_rows($rpost)>0) {
          while($array = $rpost->fetch_object())
          {
            $id               = $array->id;
            $titulo           = $array->titulo;
            $imagen           = $array->imagen;
            $lista_categorias = $array->lista_categorias;
            $pagina           = $array->pagina;
            $date_register    = $array->date_register;
            
            if (empty($list_ids)) {
              $list_ids.= $id;
            }else{
              $list_ids.= "," . $id;
            }
      ?>

            <!-- Post-->
            <div class="masonry-grid-item">
              <article class="card card-hover">
                <a class="card-img-top" href="/articulo/<?php echo $pagina; ?>">
                  <img src="./uploads/imgs/blog/<?php echo $imagen; ?>" alt="<?php echo $titulo; ?>">
                </a>
                <div class="card-body">
                  <a class="meta-link fs-sm mb-2" href="/articulo/<?php echo $pagina; ?>">
                    <?php echo $lista_categorias; ?>
                  </a>
                  <h2 class="h5 nav-heading mb-4">
                    <a href="/articulo/<?php echo $pagina; ?>">
                      <?php echo $titulo; ?>
                    </a>
                  </h2>
                  <div class="mt-3 text-end text-nowrap">
                    <a class="meta-link fs-xs" href="/articulo/<?php echo $pagina; ?>">
                      <i class="ai-calendar me-1 mt-n1 align-middle"></i>&nbsp;
                    <?php echo fecha($date_register); ?>
                    </a>
                  </div>
                </div>
              </article>
            </div>
            <!-- Post-->

      <?php 
          }
        }else{ 
          echo "<h3>No hay publicaciones para ver.</h3>";
        } 
      ?>

      <input type="hidden" id="ids" value="<?php echo $list_ids; ?>">

      </div>
    <?php 
    }

    public function formulario_brief($nombre_logo,$industria,$dirigido,$comunicar,$personalidad_marca,$diseno,$elementos,$competencia,$empresa,$publicidad,$color1,$color2,$color3){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $radd = $mysqli->query("INSERT INTO `formulario_brief`(`id`, `nombre_logo`, `industria`, `dirigido`, `comunicar`, `personalidad_marca`, `diseno`, `elementos`, `competencia`, `empresa`, `publicidad`, `color1`, `color2`, `color3`, `date_register`) VALUES (NULL,'$nombre_logo','$industria','$dirigido','$comunicar','$personalidad_marca','$diseno','$elementos','$competencia','$empresa','$publicidad','$color1','$color2','$color3',NOW())");
      if ($radd)
      {
        echo "added";
        
      }else{
        echo "Error, intenta nuevamente. Err " . $mysqli->error;
      }
    }

    public function prospect_add_service_write($nombre_servicio,$descripcion_servicio,$id_prospecto){
      include("../../../configuration/backend/private/conexion.php");

      $codigo = 0;

      $rget_service_info = $mysqli->query("SELECT * FROM servicios WHERE id=$nombre_servicio");
      if ($rget_service_info)
      {
        if (mysqli_num_rows($rget_service_info)>0) {
          while($array = $rget_service_info->fetch_object())
          {
            $servicio    = $array->servicio;
            $precio      = $array->precio;
            $descripcion = $array->descripcion;
            $tiempo      = $array->tiempo;
          }
        }else{
          $descripcion = "";
        }
      }

      $rget_codigo = $mysqli->query("SELECT * FROM prospecto_servicios WHERE id_prospecto=$id_prospecto");
      if ($rget_codigo)
      {
        if (mysqli_num_rows($rget_codigo)>0) {
          while($array = $rget_codigo->fetch_object())
          {
            $codigo = $array->codigo;
          }

          $codigo++;
          $codigo = strtoupper($codigo);
        }else{
          
          $rget_prospecto = $mysqli->query("SELECT * FROM `prospecto` WHERE id=$id_prospecto");
          if (mysqli_num_rows($rget_prospecto)>0) {
            if ($rget_prospecto)
            {
              while($array = $rget_prospecto->fetch_object())
              {
                $nombre    = $array->nombre;
                $apellidos = $array->apellidos;

                if (empty($apellidos)) {
                  $apellidos = "N";
                }
              }
            }else{
              $nombre    = "NO";
              $apellidos = "NO";              
            }
          }

          $codigo = $nombre[0] . $apellidos[0] . $id_prospecto . "0001";
          $codigo = strtoupper($codigo);
        }
      }

      $radd_service = $mysqli->query("INSERT INTO `prospecto_servicios`(`id`, `id_prospecto`, `codigo`, `status`, `nombre`, `descripcion`, `date_register`) VALUES (NULL,'$id_prospecto','$codigo','','$servicio','$descripcion_servicio',NOW())");
      if ($radd_service) {
        $id_servicio_code = mysqli_insert_id($mysqli);

        $radd_service_list = $mysqli->query("INSERT INTO `prospecto_servicios_lista`(`id`, `id_servicio_codigo`, `id_servicio`, `descripcion`, `descripcion_original`, `unidad`, `precio`, `cantidad`, `nombre`, tiempo_entrega, `date_register`) VALUES (NULL,'$id_servicio_code','$nombre_servicio','$descripcion','$descripcion','1','$precio','1','$servicio','$tiempo',NOW())");
        echo "added";
      }else{
        echo "Err " . $mysqli->error;
      }
    }

    public function status_recibo_pago($id,$status,$metodo_pago){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      // $rupdate = $mysqli->query("UPDATE `recibos_pago` SET `status`='$status' WHERE id=$id");
      // if ($rupdate)
      // {
      //   echo "updated";
      // }else{
      //   echo "Error, intenta nuevamente. Err " . $mysqli->error;
      // }

      $rupdate = $mysqli->query("UPDATE `recibos_pago` SET `status_dashboard`='$status',metodo_pago='$metodo_pago' WHERE id=$id");
      if ($rupdate)
      {
        if ($status==="Pagado") {
          $rupdate_status = $mysqli->query("UPDATE `recibos_pago` SET `status`='Pagado' WHERE id=$id");

          $rcheck = $mysqli->query("SELECT * FROM recibos_pago WHERE id=$id");
          if ($rcheck)
          {
            while($array = $rcheck->fetch_object())
            {
              $recibo_id_prospecto        = $array->id_prospecto;
              $recibo_codigo              = $array->codigo;
              $recibo_fecha               = $array->fecha;
              $recibo_total               = $array->total;
              $recibo_descuento           = $array->descuento;
              $recibo_check_descuento_iva = $array->check_descuento_iva;
              $recibo_metodo_pago         = $array->metodo_pago;
              $recibo_fecha_vencimiento   = $array->fecha_vencimiento;
              $recibo_id_contrato_relacionado = $array->id_contrato_relacionado;
              $recibo_porcentaje_pago         = $array->porcentaje_pago;
              $recibo_total_pago              = $array->total_pago;
            }
          }

          $rcheck_contrato = $mysqli->query("SELECT * FROM ordenes_servicio WHERE id=$recibo_id_contrato_relacionado");
          if ($rcheck_contrato)
          {
            if (mysqli_num_rows($rcheck_contrato)>0) {
              while($array = $rcheck_contrato->fetch_object())
              {
                $id_servicio = $array->id_servicio;
                $pago        = $array->pago;
              }
            }else{
              $id_servicio = 0;
              $pago        = "Pago mensual";
            }
          }

          if ($pago === "Pago mensual") {
            $fecha_vencimiento = date("Y-m-d",strtotime($recibo_fecha_vencimiento."+ 1 month"));
          }else if ($pago === "Pago anual") {
            $fecha_vencimiento = date("Y-m-d",strtotime($recibo_fecha_vencimiento."+ 1 year"));
          }

          if ($pago === "Pago mensual" || $pago === "Pago anual") {
            $radd = $mysqli->query("INSERT INTO `recibos_pago`(`id`, `id_prospecto`, `codigo`, `fecha`, total, descuento, check_descuento_iva, metodo_pago, status, date_register, fecha_vencimiento, id_contrato_relacionado,porcentaje_pago,total_pago) VALUES (NULL,'$recibo_id_prospecto','$recibo_codigo','$recibo_fecha','$recibo_total','$recibo_descuento','$recibo_check_descuento_iva','','Pendiente',NOW(),'$fecha_vencimiento','$recibo_id_contrato_relacionado','$recibo_porcentaje_pago','$recibo_total_pago')");
            if ($radd) {
              $id_recibo = mysqli_insert_id($mysqli);

              echo "updated2"
                    . "," . $id_servicio
                    . "," . $recibo_id_prospecto
                    . "," . $recibo_codigo
                    . "," . $recibo_fecha
                    . "," . $id_recibo
                    . "," . $recibo_descuento
                    . "," . $recibo_check_descuento_iva
                    . "," . $pago;
            }else{
              echo "Error al crear el recibo de pago. Err " . $mysqli->error;
            }
          }else{
            echo "updated"
                . "," . $id_servicio
                . "," . $recibo_id_prospecto
                . "," . $recibo_codigo
                . "," . $recibo_fecha
                . ",0"
                . "," . $recibo_descuento
                . "," . $recibo_check_descuento_iva
                . "," . $pago;
          }
        }else{
          $rupdate_status = $mysqli->query("UPDATE `recibos_pago` SET `status`='$status' WHERE id=$id");
          echo "updated";
        }
      }else{
        echo "Error, intenta nuevamente. Err " . $mysqli->error;
      }
    }

    public function crear_historial_recibos_pago(){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $total_recibos            = 0;
      $total_recibos_pagados    = 0;
      $total_recibos_cancelados = 0;
      $total_pagado             = 0;
      $fechas                   = "";

      $rget_folios = $mysqli->query("SELECT * FROM historial_recibos_pago ORDER BY id DESC LIMIT 1");
      if ($rget_folios)
      {
        if (mysqli_num_rows($rget_folios)>0) {
          while($array = $rget_folios->fetch_object())
          {
            $folio = $array->folio;
          }
          $folio++;
        }else{
          $folio = "HRP0000";
          $folio++;
        }
      }

      $rrecibos_pago = $mysqli->query("SELECT * FROM recibos_pago WHERE id_historial=0 AND status_historial!='finalizado'");
      if ($rrecibos_pago)
      {
        while($array = $rrecibos_pago->fetch_object())
        {
          $recibo_fecha = $array->fecha;
          if (empty($fechas)) {
            $fechas.= $recibo_fecha;
          }else{
            $fechas.= "," . $recibo_fecha;
          }
        }
      }

      $rrecibos_pago_pagados_cantidad = $mysqli->query("SELECT * FROM recibos_pago WHERE status='Pagado' AND status_historial!='finalizado'");
      $rrecibos_pago_cancelados_cantidad = $mysqli->query("SELECT * FROM recibos_pago WHERE status='Cancelado' AND status_historial!='finalizado'");
      $rrecibos_pago_pagados = $mysqli->query("SELECT SUM(total) AS total_pagado FROM recibos_pago WHERE status='Pagado' AND status_historial!='finalizado'");
      if ($rrecibos_pago_pagados)
      {
        while($array = $rrecibos_pago_pagados->fetch_object())
        {
          $total_pagado = $array->total_pagado;
        }
      }

      $total_recibos            = mysqli_num_rows($rrecibos_pago);
      $total_recibos_pagados    = mysqli_num_rows($rrecibos_pago_pagados_cantidad);
      $total_recibos_cancelados = mysqli_num_rows($rrecibos_pago_cancelados_cantidad);
      
      $radd = $mysqli->query("INSERT INTO `historial_recibos_pago`(`id`, `folio`, total, `fechas`, `total_recibos`, `total_pagado`, `total_cancelado`, `date_register`) VALUES (NULL,'$folio','$total_pagado','$fechas','$total_recibos','$total_recibos_pagados','$total_recibos_cancelados',NOW())");
      if ($radd)
      {
        $id_historial = mysqli_insert_id($mysqli);
        $rupdate_recibos = $mysqli->query("UPDATE `recibos_pago` SET `id_historial`='$id_historial',`status_historial`='finalizado' WHERE id_historial=0 AND status_historial=''");
        echo "added";
        
      }else{
        echo "Error, intenta nuevamente. Err " . $mysqli->error;
      }
    }

    public function agregar_nota_adicional($nota){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $radd = $mysqli->query("INSERT INTO `recibos_pago_notas`(`id`, `nota`, `status`, `date_register`) VALUES (NULL,'$nota','',NOW())");
      if ($radd)
      {
        echo "registered";
        
      }else{
        echo "Error, intenta nuevamente. Err " . $mysqli->error;
      }
    }

    public function status_nota_adicional($status,$id_nota){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rupdate = $mysqli->query("UPDATE `prospecto_adicionales` SET `status`='$status' WHERE id=$id_nota");
      if ($rupdate)
      {
        echo "updated";
        
      }else{
        echo "Error, intenta nuevamente. Err " . $mysqli->error;
      }
    }

    public function status_recibo_dashboard($id,$status,$metodo_pago){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rupdate = $mysqli->query("UPDATE `recibos_pago` SET `status_dashboard`='$status',metodo_pago='$metodo_pago' WHERE id=$id");
      if ($rupdate)
      {
        if ($status==="Renovado" || $status==="Pagado") {
          $rupdate_status = $mysqli->query("UPDATE `recibos_pago` SET `status`='Pagado' WHERE id=$id");

          $rcheck = $mysqli->query("SELECT * FROM recibos_pago WHERE id=$id");
          if ($rcheck)
          {
            while($array = $rcheck->fetch_object())
            {
              $recibo_id_prospecto        = $array->id_prospecto;
              $recibo_codigo              = $array->codigo;
              $recibo_fecha               = $array->fecha;
              $recibo_total               = $array->total;
              $recibo_descuento           = $array->descuento;
              $recibo_check_descuento_iva = $array->check_descuento_iva;
              $recibo_metodo_pago         = $array->metodo_pago;
              $recibo_fecha_vencimiento   = $array->fecha_vencimiento;
              $recibo_id_contrato_relacionado = $array->id_contrato_relacionado;
              $recibo_porcentaje_pago         = $array->porcentaje_pago;
              $recibo_total_pago              = $array->total_pago;
            }
          }

          $rcheck_contrato = $mysqli->query("SELECT * FROM ordenes_servicio WHERE id=$recibo_id_contrato_relacionado");
          if ($rcheck_contrato)
          {
            if (mysqli_num_rows($rcheck_contrato)>0) {
              while($array = $rcheck_contrato->fetch_object())
              {
                $id_servicio = $array->id_servicio;
                $pago        = $array->pago;
              }
            }else{
              $id_servicio = 0;
              $pago        = "Pago mensual";
            }
          }

          if ($pago === "Pago mensual") {
            $fecha_vencimiento = date("Y-m-d",strtotime($recibo_fecha_vencimiento."+ 1 month"));
          }else{
            $fecha_vencimiento = date("Y-m-d",strtotime($recibo_fecha_vencimiento."+ 1 year"));
          }

          $radd = $mysqli->query("INSERT INTO `recibos_pago`(`id`, `id_prospecto`, `codigo`, `fecha`, total, descuento, check_descuento_iva, metodo_pago, status, date_register, fecha_vencimiento, id_contrato_relacionado,porcentaje_pago,total_pago) VALUES (NULL,'$recibo_id_prospecto','$recibo_codigo','$recibo_fecha','$recibo_total','$recibo_descuento','$recibo_check_descuento_iva','','Pendiente',NOW(),'$fecha_vencimiento','$recibo_id_contrato_relacionado','$recibo_porcentaje_pago','$recibo_total_pago')");
          if ($radd) {
            $id_recibo = mysqli_insert_id($mysqli);

            echo "updated2"
                  . "," . $id_servicio
                  . "," . $recibo_id_prospecto
                  . "," . $recibo_codigo
                  . "," . $recibo_fecha
                  . "," . $id_recibo
                  . "," . $recibo_descuento
                  . "," . $recibo_check_descuento_iva;
          }else{
            echo "Error al crear el recibo de pago. Err " . $mysqli->error;
          }
        }else{

          $rcheck = $mysqli->query("SELECT * FROM recibos_pago WHERE id=$id");
          if ($rcheck)
          {
            while($array = $rcheck->fetch_object())
            {
              $recibo_id_prospecto        = $array->id_prospecto;
              $recibo_codigo              = $array->codigo;
              $recibo_fecha               = $array->fecha;
              $recibo_total               = $array->total;
              $recibo_descuento           = $array->descuento;
              $recibo_check_descuento_iva = $array->check_descuento_iva;
              $recibo_metodo_pago         = $array->metodo_pago;
              $recibo_fecha_vencimiento   = $array->fecha_vencimiento;
              $recibo_id_contrato_relacionado = $array->id_contrato_relacionado;
              $recibo_porcentaje_pago         = $array->porcentaje_pago;
              $recibo_total_pago              = $array->total_pago;
            }
          }

          $rcheck_contrato = $mysqli->query("SELECT * FROM ordenes_servicio WHERE id=$recibo_id_contrato_relacionado");
          if ($rcheck_contrato)
          {
            if (mysqli_num_rows($rcheck_contrato)>0) {
              while($array = $rcheck_contrato->fetch_object())
              {
                $id_servicio = $array->id_servicio;
                $pago        = $array->pago;
              }
            }else{
              $id_servicio = 0;
              $pago        = "Pago mensual";
            }
          }

          echo "updated"
                . "," . $id_servicio
                . "," . $recibo_id_prospecto
                . "," . $recibo_codigo
                . "," . $recibo_fecha
                . ",0"
                . "," . $recibo_descuento
                . "," . $recibo_check_descuento_iva;
        }
      }else{
        echo "Error, intenta nuevamente. Err " . $mysqli->error;
      }
    }

    public function delete_recibo_pago($id){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rdelete = $mysqli->query("DELETE FROM `recibos_pago` WHERE id=$id");
      if ($rdelete)
      {
        echo "deleted";
        
      }else{
        echo "Error, intenta nuevamente. Err " . $mysqli->error;
      }
    }

    public function status_condicion($status,$id){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rupdate = $mysqli->query("UPDATE `notas` SET `status`='$status' WHERE id=$id");
      if ($rupdate)
      {
        echo "updated";
        
      }else{
        echo "Error, intenta nuevamente. Err " . $mysqli->error;
      }
    }

    public function agregar_usuario($nombre,$usuario,$password){
      include("../../../configuration/backend/private/conexion.php");
      include("../../../configuration/backend/helpers/session_check.php");

      $response = array();

      $radd = $mysqli->query("INSERT INTO `usuarios`(`id`, id_usuario, `nombre`, `usuario`, `password`, date_register) VALUES (NULL,'$BIOVITAL_ID','$nombre','$usuario','$password',NOW())");
      if ($radd)
      {
        $id_usuario = mysqli_insert_id($mysqli);

        $radd1 = $mysqli->query("INSERT INTO `usuarios_permisos`(`id`, `id_usuario`, permiso, status, date_register) VALUES (NULL,'$id_usuario','Agregar servicio','false',NOW())");
        $radd2 = $mysqli->query("INSERT INTO `usuarios_permisos`(`id`, `id_usuario`, permiso, status, date_register) VALUES (NULL,'$id_usuario','Editar servicio','false',NOW())");
        $radd3 = $mysqli->query("INSERT INTO `usuarios_permisos`(`id`, `id_usuario`, permiso, status, date_register) VALUES (NULL,'$id_usuario','Consultar servicio','false',NOW())");
        $radd4 = $mysqli->query("INSERT INTO `usuarios_permisos`(`id`, `id_usuario`, permiso, status, date_register) VALUES (NULL,'$id_usuario','Eliminar servicio','false',NOW())");

        $radd5 = $mysqli->query("INSERT INTO `usuarios_permisos`(`id`, `id_usuario`, permiso, status, date_register) VALUES (NULL,'$id_usuario','Agregar cliente','false',NOW())");
        $radd6 = $mysqli->query("INSERT INTO `usuarios_permisos`(`id`, `id_usuario`, permiso, status, date_register) VALUES (NULL,'$id_usuario','Editar cliente','false',NOW())");
        $radd7 = $mysqli->query("INSERT INTO `usuarios_permisos`(`id`, `id_usuario`, permiso, status, date_register) VALUES (NULL,'$id_usuario','Consultar cliente','false',NOW())");
        $radd8 = $mysqli->query("INSERT INTO `usuarios_permisos`(`id`, `id_usuario`, permiso, status, date_register) VALUES (NULL,'$id_usuario','Eliminar cliente','false',NOW())");

        $radd9 = $mysqli->query("INSERT INTO `usuarios_permisos`(`id`, `id_usuario`, permiso, status, date_register) VALUES (NULL,'$id_usuario','Agregar calendario','false',NOW())");
        $radd10 = $mysqli->query("INSERT INTO `usuarios_permisos`(`id`, `id_usuario`, permiso, status, date_register) VALUES (NULL,'$id_usuario','Editar calendario','false',NOW())");
        $radd11 = $mysqli->query("INSERT INTO `usuarios_permisos`(`id`, `id_usuario`, permiso, status, date_register) VALUES (NULL,'$id_usuario','Consultar calendario','false',NOW())");
        $radd12 = $mysqli->query("INSERT INTO `usuarios_permisos`(`id`, `id_usuario`, permiso, status, date_register) VALUES (NULL,'$id_usuario','Eliminar calendario','false',NOW())");

        $radd13 = $mysqli->query("INSERT INTO `usuarios_permisos`(`id`, `id_usuario`, permiso, status, date_register) VALUES (NULL,'$id_usuario','Agregar usuario','false',NOW())");
        $radd14 = $mysqli->query("INSERT INTO `usuarios_permisos`(`id`, `id_usuario`, permiso, status, date_register) VALUES (NULL,'$id_usuario','Editar usuario','false',NOW())");
        $radd15 = $mysqli->query("INSERT INTO `usuarios_permisos`(`id`, `id_usuario`, permiso, status, date_register) VALUES (NULL,'$id_usuario','Consultar usuario','false',NOW())");
        $radd16 = $mysqli->query("INSERT INTO `usuarios_permisos`(`id`, `id_usuario`, permiso, status, date_register) VALUES (NULL,'$id_usuario','Eliminar usuario','false',NOW())");



        echo "registered";
      }else{
        echo "Error. Err " . $mysqli->error;
      }
    }

    public function usuario_permisos($id_usuario){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rcheck = $mysqli->query("SELECT * FROM usuarios_permisos WHERE id_usuario='$id_usuario'");
      if ($rcheck)
      {
        if (mysqli_num_rows($rcheck)>0) {
          while($array = $rcheck->fetch_object())
          {
            $id                = $array->id;
            $dashboard_recibos = $array->dashboard_recibos;
            $prospectos        = $array->prospectos;
            $clientes          = $array->clientes;
            $recibos_pago      = $array->recibos_pago;
            $entradas          = $array->entradas;
            $brief             = $array->brief;
            $configuraciones   = $array->configuraciones;
          }
    ?>
      <div class="row">
        <div class="col-6 mt-5">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" onchange="status_permiso_usuario('dashboard_recibos','<?php echo $id; ?>')" id="check_dashboard_recibos" <?php if ($dashboard_recibos == "true"){ echo "checked"; } ?>>
            <label class="form-check-label" for="check_dashboard_recibos">
              Dashboard de recibos
            </label>
          </div>
        </div>

        <div class="col-6 mt-5">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" onchange="status_permiso_usuario('prospectos','<?php echo $id; ?>')" id="check_prospectos" <?php if ($prospectos == "true"){ echo "checked"; } ?>>
            <label class="form-check-label" for="check_prospectos">
              Prospectos
            </label>
          </div>
        </div>

        <div class="col-6 mt-5">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" onchange="status_permiso_usuario('clientes','<?php echo $id; ?>')" id="check_clientes" <?php if ($clientes == "true"){ echo "checked"; } ?>>
            <label class="form-check-label" for="check_clientes">
              Clientes
            </label>
          </div>
        </div>

        <div class="col-6 mt-5">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" onchange="status_permiso_usuario('recibos_pago','<?php echo $id; ?>')" id="check_recibos_pago" <?php if ($recibos_pago == "true"){ echo "checked"; } ?>>
            <label class="form-check-label" for="check_recibos_pago">
              Recibos de pago
            </label>
          </div>
        </div>

        <div class="col-6 mt-5">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" onchange="status_permiso_usuario('entradas','<?php echo $id; ?>')" id="check_entradas" <?php if ($entradas == "true"){ echo "checked"; } ?>>
            <label class="form-check-label" for="check_entradas">
              Entradas
            </label>
          </div>
        </div>

        <div class="col-6 mt-5">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" onchange="status_permiso_usuario('brief','<?php echo $id; ?>')" id="check_brief" <?php if ($brief == "true"){ echo "checked"; } ?>>
            <label class="form-check-label" for="check_brief">
              Brief
            </label>
          </div>
        </div>

        <div class="col-6 mt-5">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" onchange="status_permiso_usuario('configuraciones','<?php echo $id; ?>')" id="check_configuraciones" <?php if ($configuraciones == "true"){ echo "checked"; } ?>>
            <label class="form-check-label" for="check_configuraciones">
              Configuraciones
            </label>
          </div>
        </div>
      </div>

    <?php 
        }else{
          echo "No se encontraron los permisos del usuario.";
        }
      }
    }

    public function usuario_info($id_usuario){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rcheck = $mysqli->query("SELECT * FROM usuarios WHERE id='$id_usuario'");
      if ($rcheck)
      {
        if (mysqli_num_rows($rcheck)>0) {
          while($array = $rcheck->fetch_object())
          {
            $nombre    = $array->nombre;
            $usuario   = $array->usuario;
            $password  = $array->password;
            $telefono  = $array->telefono;
            $correo    = $array->correo;
            $direccion = $array->direccion;
          }
    ?>
      <div class="row">
        <div class="col-md-12 mb-3">
          <div class="js-form-message form-group">
            <label class="input-label" for="fullNameSrEmail">Nombre completo</label>
            <input type="text" class="form-control form-control" name="fullName" id="nombre_e" placeholder="Nombre" aria-label="Mark" value="<?php echo $nombre; ?>" data-msg="Escribe el nombre.">
          </div>
        </div>

        <div class="col-md-12 mt-5">
          <label class="input-label" class="input-label">Usuario</label>
          <input type="text" id="usuario_e" value="<?php echo $usuario; ?>" class="form-control form-control" placeholder="Usuario">
        </div>

        <div class="col-md-12 mt-5">
          <label class="input-label" class="input-label">Teléfono</label>
          <input type="tel" id="telefono_e" value="<?php echo $telefono; ?>" class="form-control form-control" placeholder="Teléfono">
        </div>

        <div class="col-md-12 mt-5">
          <label class="input-label" class="input-label">Correo electrónico</label>
          <input type="email" id="correo_e" value="<?php echo $correo; ?>" class="form-control form-control" placeholder="Correo electrónico">
        </div>

        <div class="col-md-12 mt-5">
          <label class="input-label" class="input-label">Dirección</label>
          <input type="text" id="direccion_e" value="<?php echo $direccion; ?>" class="form-control form-control" placeholder="Dirección">
        </div>

        <div class="col-md-6 mt-5">
          <label class="input-label" class="input-label">Contraseña</label>
          <input type="text" id="password_e" value="<?php echo $password; ?>" class="form-control form-control" placeholder="Contraseña">
        </div>

        <div class="col-md-6 mt-5">
          <label class="input-label" class="input-label">Confirmar contraseña</label>
          <input type="text" id="confirm_password_e" value="<?php echo $password; ?>" class="form-control form-control" placeholder="Confirmar contraseña">
        </div>
       </div>

       <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="editar_usuario('<?php echo $id_usuario; ?>')">Guardar</button>
       </div>
    <?php 
        }else{
          echo "<p>No hay información del usuario.</p>";
        }
      }
    }

    public function status_permiso($status,$id){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $consulta = "UPDATE usuarios_permisos SET status='$status' WHERE id=$id";

      // echo "<br>status: " . $status;
      // echo "<br>permiso: " . $permiso;
      // echo "<br>id: " . $id;
      // echo "<br>consulta: " . $consulta;

      $rupdate = $mysqli->query($consulta);
      if ($rupdate)
      {
        echo "updated";
      }else{
        echo "Error. Err " . $mysqli->error;
      }
    }

    // public function editar_usuario($nombre,$usuario,$password,$confirm_password,$telefono,$correo,$direccion,$id_usuario){
    //   include("../../../configuration/backend/private/conexion.php");
    //   $response = array();

    //   $rupdate = $mysqli->query("UPDATE `usuarios` SET 
    //     `nombre`='$nombre',
    //     `usuario`='$usuario',
    //     `password`='$password',
    //     `correo`='$correo',
    //     `telefono`='$telefono',
    //     `direccion`='$direccion'
    //   WHERE id=$id_usuario");
    //   if ($rupdate)
    //   {
    //     echo "updated";
    //   }else{
    //     echo "Error. Err " . $mysqli->error;
    //   }
    // }

    public function delete_usuario($id_eliminar){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rdelete = $mysqli->query("DELETE FROM `usuarios` WHERE id=$id_eliminar");
      if ($rdelete)
      {
        $rdelete_permisos = $mysqli->query("DELETE FROM `usuarios_permisos` WHERE id_usuario=$id_eliminar");
        echo "deleted";
      }else{
        echo "Error. Err " . $mysqli->error;
      }
    }

    public function crear_chat(){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
      } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
        $ip = $_SERVER['REMOTE_ADDR'];
      }

      $rcheck = $mysqli->query("SELECT * FROM `chat` WHERE ip='$ip'");
      if (mysqli_num_rows($rcheck)<=0) {
        $mensaje = '<div class="text-start">
              Hola, ¿cómo podemos ayudarte?
              <small style="font-size: 10px;">'.date("H:i").'</small>
            </div>';

        $radd = $mysqli->query("INSERT INTO `chat`(`id`, `ip`, `mensaje`, `date_register`) VALUES (NULL,'$ip','$mensaje',NOW())");
        if ($radd)
        {
          // echo "ad";
        }else{
          echo "Error. Err " . $mysqli->error;
        }
      }
      

      $lista_mensajes = "";
      $rget = $mysqli->query("SELECT * FROM `chat` WHERE ip='$ip'");
      if ($rget)
      {
        if (mysqli_num_rows($rget)>0) {
          while($array = $rget->fetch_object())
          {
            $chat_mensaje = $array->mensaje;
            $lista_mensajes.= $chat_mensaje;
          }
          echo $lista_mensajes;
        }else{
          echo "Inicia tu chat.";
        }
      }

      // <div class="media media-meta-day">Today</div>

      // <div class="media media-chat media-chat-reverse">
      //   <div class="media-body">
      //     <p>Hiii, I'm good.</p>
      //     <p>How are you doing?</p>
      //     <p>Long time no see! Tomorrow office. will be free on sunday.</p>
      //     <p class="meta"><time datetime="2018">00:06</time></p>
      //   </div>
      // </div>
      echo "";
    }

    public function responder_chat($chat_usuario){
      include("../../../configuration/backend/private/conexion.php");
      include_once("../helpers/chat.php");
      $response = array();

      if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
      } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
        $ip = $_SERVER['REMOTE_ADDR'];
      }

      $mensaje = '<div class="text-end">
            '.$chat_usuario.'
            <small style="font-size: 10px;">'.date("H:i").'</small>
          </div>';

      $radd = $mysqli->query("INSERT INTO `chat`(`id`, `ip`, `mensaje`, `date_register`) VALUES (NULL,'$ip','$mensaje',NOW())");
      if ($radd)
      {
        // echo "ad";
      }else{
        echo "Error. Err 1 " . $mysqli->error;
      }

      $respuesta = '<div class="text-start">
            '.respuesta_chat($chat_usuario).'
            <small style="font-size: 10px;">'.date("H:i").'</small>
          </div>';

      $radd2 = $mysqli->query("INSERT INTO `chat`(`id`, `ip`, `mensaje`, `date_register`) VALUES (NULL,'$ip','$respuesta',NOW())");
      if ($radd2)
      {
        // echo "ad";
      }else{
        echo "Error. Err 2 " . $mysqli->error;
      }

      $lista_mensajes = "";
      $rget = $mysqli->query("SELECT * FROM `chat` WHERE ip='$ip'");
      if ($rget)
      {
        if (mysqli_num_rows($rget)>0) {
          while($array = $rget->fetch_object())
          {
            $chat_mensaje = $array->mensaje;
            $lista_mensajes.= $chat_mensaje;
          }
          echo $lista_mensajes;
        }else{
          echo "Inicia tu chat.";
        }
      }
    }

    public function enviar_correo($para,$cc,$bcc,$titulo,$descripcion){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $radd = $mysqli->query("INSERT INTO `correos_enviados`(`id`, `id_prospecto`, `titulo`, `mensaje`, `date_register`) VALUES (NULL,'$para','$titulo','$descripcion',NOW())");
      if ($radd)
      {
        $rget_prospecto = $mysqli->query("SELECT * FROM prospecto WHERE id=$para");
        if ($rget_prospecto)
        {
          if (mysqli_num_rows($rget_prospecto)>0) {
            while($array = $rget_prospecto->fetch_object())
            {
              $email = $array->email;
            }
          }else{
            $email = "";
          }
        }
        echo "registered," . $email;
      }else{
        echo "Err. " , $mysqli->error;
      }
    }

    public function get_correo_enviado($id){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rget = $mysqli->query("SELECT * FROM correos_enviados WHERE id=$id");
      if ($rget)
      {
        if (mysqli_num_rows($rget)>0) {
          while($array = $rget->fetch_object())
          {
            $id_prospecto  = $array->id_prospecto;
            $titulo        = $array->titulo;
            $mensaje       = $array->mensaje;
            $date_register = $array->date_register;

            // GET CLIENTE
            $rget_prospecto = $mysqli->query("SELECT * FROM prospecto WHERE id=$id_prospecto");
            if ($rget_prospecto)
            {
              if (mysqli_num_rows($rget_prospecto)>0) {
                while($array = $rget_prospecto->fetch_object())
                {
                  $cliente_inbox_nombre    = $array->nombre;
                  $cliente_inbox_apellidos = $array->apellidos;
                  $cliente_inbox_empresa   = $array->empresa;
                  $cliente_inbox_email     = $array->email;
                }
              }else{
                $cliente_inbox_nombre    = "No se encontro.";
                $cliente_inbox_apellidos = "";
                $cliente_inbox_empresa   = "";
                $cliente_inbox_email     = "";
              }
            }
          }

          echo "get";
          echo "|" . $id_prospecto;
          echo "|" . $titulo;
          echo "|" . $mensaje;
          echo "|" . $date_register;
          echo "|" . $cliente_inbox_nombre;
          echo "|" . $cliente_inbox_apellidos;
          echo "|" . $cliente_inbox_empresa;
          echo "|" . $cliente_inbox_email;
        }else{
          echo "No se encontro información.";
        }
      }

    }

    public function get_mensajes_contacto($contacto){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      $data = "";

      $rget = $mysqli->query("SELECT * FROM `whatsapp_mensaje` WHERE contact='$contacto'");
      if ($rget)
      {
        if (mysqli_num_rows($rget)>0) {
          while($array = $rget->fetch_object())
          {
            $id            = $array->id;
            $response      = $array->response;
            $contact       = $array->contact;
            $text          = $array->text;
            $name          = $array->name;
            $tipo          = $array->tipo;
            $date_register = $array->date_register;

            // $data.= 
            // '
            //   <div class="d-flex justify-content-end mb-10">
            //     <div class="d-flex flex-column align-items-end">
            //       <div class="d-flex align-items-center mb-2">
            //         <div class="me-3">
            //           <span class="text-muted fs-7 mb-1">'.$date_register.'</span>
            //           <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">'.$name.'</a>
            //         </div>
            //         <div class="symbol symbol-35px symbol-circle">
            //           <img alt="Pic" src="assets/media/avatars/150-26.jpg" />
            //         </div>
            //       </div>
            //       <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">'.$text.'</div>
            //     </div>
            //   </div>
            // ';

            if ($tipo=="ADMIN") {
              $data.= '
                <div class="d-flex justify-content-end mb-10">
                  <!--begin::Wrapper-->
                  <div class="d-flex flex-column align-items-end">
                    <!--begin::User-->
                    <div class="d-flex align-items-center mb-2">
                      <!--begin::Details-->
                      <div class="me-3">
                        <span class="text-muted fs-7 mb-1">'.$date_register.'</span>
                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary ms-1">Tu</a>
                      </div>
                      <!--end::Details-->
                      <!--begin::Avatar-->
                      <div class="symbol symbol-35px symbol-circle">
                        <img alt="Pic" src="assets/media/avatars/blank.png" />
                      </div>
                      <!--end::Avatar-->
                    </div>
                    <!--end::User-->
                    <!--begin::Text-->
                    <div class="p-5 rounded bg-light-primary text-dark fw-bold mw-lg-400px text-end" data-kt-element="message-text">'.$text.'</div>
                    <!--end::Text-->
                  </div>
                  <!--end::Wrapper-->
                </div>
              ';
            }else{
              $data.= '
                <!--begin::Message(in)-->
                <div class="d-flex justify-content-start mb-10">
                  <!--begin::Wrapper-->
                  <div class="d-flex flex-column align-items-start">
                    <!--begin::User-->
                    <div class="d-flex align-items-center mb-2">
                      <!--begin::Avatar-->
                      <div class="symbol symbol-35px symbol-circle">
                        <img alt="Pic" src="assets/media/avatars/blank.png" />
                      </div>
                      <!--end::Avatar-->
                      <!--begin::Details-->
                      <div class="ms-3">
                        <a href="#" class="fs-5 fw-bolder text-gray-900 text-hover-primary me-1">'.$name.'</a>
                        <span class="text-muted fs-7 mb-1">'.$date_register.'</span>
                      </div>
                      <!--end::Details-->
                    </div>
                    <!--end::User-->
                    <!--begin::Text-->
                    <div class="p-5 rounded bg-light-info text-dark fw-bold mw-lg-400px text-start" data-kt-element="message-text">'.$text.'</div>
                    <!--end::Text-->
                  </div>
                  <!--end::Wrapper-->
                </div>
              ';
            }


          }

          echo "get";
          echo "|" . $name;
          echo "|" . $data;
        }else{

          $rget_name = $mysqli->query("SELECT * FROM `whatsapp_contactos` WHERE contacto='$contacto'");
          if ($rget_name)
          {
            if (mysqli_num_rows($rget_name)>0) {
              while($array = $rget_name->fetch_object())
              {
                $name = $array->nombre;
              }
            }else{
              $name = "No se encontro el nombre del contacto.";
            }
          }

          echo "get";
          echo "|" . $name;
          echo "|";
          echo "|No hay mensajes de este contacto.";
        }
      }else{
        echo "Err. " , $mysqli->error;
      }
    }

    public function enviar_contestacion($mensaje_contestacion,$whatsapp_id){
      include("../../../configuration/backend/private/conexion.php");
      include("../helpers/get_token.php");
      include("../helpers/tipo_mensaje_whatsapp.php");

      $fecha_actual = date('Y-m-d');

      $rget_last_msg = $mysqli->query("SELECT * FROM `whatsapp_mensaje` WHERE contact='$whatsapp_id'");
      if ($rget_last_msg)
      {
        if (mysqli_num_rows($rget_last_msg)>0) {
          while($array = $rget_last_msg->fetch_object())
          {
            $id            = $array->id;
            $response      = $array->response;
            $contact       = $array->contact;
            $text          = $array->text;
            $name          = $array->name;
            $fecha_ultimo_msg = $array->date_register;
          }
        }else{
          $fecha_ultimo_msg = "false";
        }
      }

      // echo "<br>". $fecha_actual;
      // echo "<br>". $fecha_ultimo_msg;

      if ($fecha_ultimo_msg=="false") {
        $rta_message = $tipo_1;
        // echo "<br>". "1";
      }else if ($fecha_actual>$fecha_ultimo_msg) {
        $rta_message = $tipo_1;
        // echo "<br>". "2";
      }else{
        // echo "<br>". "3";
        $rta_message = $tipo_2;
      }

      $response = array();

      $access_token = $token_token;

      $url="https://graph.facebook.com/v16.0/109965602060685/messages";
      $ch = curl_init();
      
      $headers = array(
         "Content-Type: application/json",
         "Authorization: Bearer $access_token"
      );

      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $rta_message);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $st = curl_exec($ch);
      $result = json_decode($st,TRUE);
      // print json_encode($result);
      echo "sent";

      $radd_message = $mysqli->query("INSERT INTO `whatsapp_mensaje`(`id`, `response`, `contact`, `text`, `name`, tipo, `date_register`) VALUES (NULL,'','$whatsapp_id','$mensaje_contestacion','','ADMIN',NOW())");

    }

    public function actualizar_token($token){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      $fecha_actual = date('Y-m-d');

      $rupdate = $mysqli->query("UPDATE `whatsapp_token` SET `token`='$token', actualizacion='$fecha_actual' WHERE 1");
      if ($rupdate)
      {
        echo "updated";
        
      }else{
        echo "Error, intenta nuevamente. Err " . $mysqli->error;
      }

    }

    public function agregar_contacto($nuevo_contacto,$nombre_contacto){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $radd = $mysqli->query("INSERT INTO `whatsapp_contactos`(`id`, `contacto`, `nombre`, `date_register`) VALUES (NULL,'$nuevo_contacto','$nombre_contacto',NOW())");
      if ($radd)
      {
        echo "added";
        
      }else{
        echo "Error, intenta nuevamente. Err " . $mysqli->error;
      }

    }

    public function agregar_plantilla($titulo,$plantilla){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $radd = $mysqli->query("INSERT INTO `plantillas_correo`(`id`, `titulo`, `plantilla`, `date_register`) VALUES (NULL,'$titulo','$plantilla',NOW())");
      if ($radd)
      {
        echo "added";
        
      }else{
        echo "Error, intenta nuevamente. Err " . $mysqli->error;
      }

    }

    public function get_plantilla_correo($id){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rget = $mysqli->query("SELECT * FROM plantillas_correo WHERE id=$id");
      if ($rget)
      {
        while($array = $rget->fetch_object())
        {
          $titulo    = $array->titulo;
          $plantilla = $array->plantilla;
        }
    ?>
      <div class="row">
        <div class="col-md-12">
          <label class="input-label" class="input-label">Título de la plantilla</label>
          <input type="text" id="editar_titulo" class="form-control form-control" placeholder="Título de la plantilla" value="<?php echo $titulo; ?>">
        </div>

        <div class="col-md-12 mt-5">
          <label class="input-label" class="input-label">Escribe la plantilla</label>
          <textarea id="kt_docs_tinymce_hidden2" name="kt_docs_tinymce_hidden2" class="tox-target"><?php echo $plantilla; ?></textarea>
        </div>
      </div>
    <?php 
      }else{
        echo "Error, intenta nuevamente. Err " . $mysqli->error;
      }

    }

    public function cargarDatosJkanban($tipo){
      include("../../../configuration/backend/private/conexion.php");
      
      $response = array();

      $rget = $mysqli->query("SELECT * FROM prospecto_servicios ORDER BY id ASC");
      if ($rget)
      {
        while($array = $rget->fetch_object())
        {
          $id_prospecto = $array->id_prospecto;

          $rget_prospecto = $mysqli->query("SELECT * FROM prospecto WHERE id=$id_prospecto");
          if ($rget_prospecto)
          {
            if (mysqli_num_rows($rget_prospecto)>0) {
              while($array_user = $rget_prospecto->fetch_object())
              {
                $nombre    = $array_user->nombre;
                $apellidos = $array_user->apellidos;
              }
            }else{
              $nombre    = "No se encontro.";
              $apellidos = "No se encontro.";
            }
          }

          $response[] = $array;
        }
      }

      echo json_encode($response);
    }

    public function actualizar_status($id,$status){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rupdate = $mysqli->query("UPDATE `prospecto_servicios` SET status_proceso='$status' WHERE id=$id");
      if ($rupdate)
      {
        echo "updated";
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

    public function get_tags_results($tag,$id_prospecto,$id_servicio,$codigo){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      if($tag=='cotizacion'){
        $rget = $mysqli->query("SELECT * FROM cotizaciones WHERE id_prospecto=$id_prospecto AND codigo='$codigo' ORDER BY id DESC LIMIT 1");
        if ($rget)
        {
          if (mysqli_num_rows($rget)>0) {
            while($array = $rget->fetch_object())
            {
              $cotizacion_id            = $array->id;
              $cotizacion_date_register = $array->date_register;
              $cotizacion_pdf           = $array->pdf;
            }
            echo "El link de la cotización es: <a href='https://induce.mx/sistema/docs/pdf/saves/cotizaciones/" . $cotizacion_pdf . "' target='_blank'>https://induce.mx/sistema/docs/pdf/saves/cotizaciones/" . $cotizacion_pdf . "</a>";
          }else{
            echo "No hay cotización creada para este prospecto.";
          }
        }
      }else if($tag=='nombre'){
        $rdo = $mysqli->query("SELECT nombre FROM `prospecto` WHERE id=$id_prospecto");
        if ($rdo)
        {
          if (mysqli_num_rows($rdo)>0) {
            while($array = $rdo->fetch_object())
            {
              $nombre = $array->nombre;
            }
            echo "Nombre del prospecto es: " . $nombre;
          }else{
            echo "No se encontro el nombre del prospecto.";
          }
        }else{
          echo "Err. " . $mysqli->error;
        }
      }else if($tag=='recibo'){
        $rget = $mysqli->query("SELECT * FROM recibos_pago WHERE id_prospecto=$id_prospecto AND codigo='$codigo' ORDER BY id DESC");
        if ($rget)
        {
          if (mysqli_num_rows($rget)>0) {
            while($array = $rget->fetch_object())
            {
              $recibo_id            = $array->id;
              $recibo_date_register = $array->date_register;
              $recibo_pdf           = $array->pdf;
              $recibo_status        = $array->status;
            }
            echo "El link del recibo es: <a href='https://induce.mx/sistema/docs/pdf/saves/recibos_pago/" . $recibo_pdf . "' target='_blank'>https://induce.mx/sistema/docs/pdf/saves/recibos_pago/" . $recibo_pdf . "</a>";
          }else{
            echo "No hay recibo creado para este prospecto.";
          }
        }
      }
    }

    public function get_data_whatsapp($id,$pdf,$email,$id_prospecto,$whatsapp,$url){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      // PROSPECTO INFO
      $rprospecto_indo = $mysqli->query("SELECT * FROM prospecto WHERE id=$id_prospecto");
      if ($rprospecto_indo)
      {
        while($array = $rprospecto_indo->fetch_object())
        {
          $nombre            = $array->nombre;
          $apellidos         = $array->apellidos;
          $empresa           = $array->empresa;
          $direccion         = $array->direccion;
          $puesto            = $array->puesto;
          $email             = $array->email;
          $telefono_oficina  = $array->telefono_oficina;
          $telefono_whatsapp = $array->telefono_whatsapp;
        }
      }

      function generarCodigoCorto() {
        $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $codigo_corto = '';
        $longitud = 5;

        for ($i = 0; $i < $longitud; $i++) {
          $codigo_corto .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }

        return $codigo_corto;
      }

      $codigo_corto = generarCodigoCorto();

      $radd = $mysqli->query("INSERT INTO `acortadores`(`id`, `codigo_corto`, `enlace_largo`) VALUES (NULL,'$codigo_corto','$url')");
      if ($radd)
      {
        $codigo_corto = "https://induce.mx/link?l=" . $codigo_corto;
        $mensaje = "Hola " . $nombre . " " . $apellidos . ", este es tu recibo de pago: " . $codigo_corto;
  ?>
    <textarea id="mensaje_whatsapp" class="form-control" rows="10" cols="10"><?php echo $mensaje; ?></textarea>

    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

      <button type="button" class="btn btn-info" id="button-copy" onclick="copyText('mensaje_whatsapp','button-copy')">Copiar</button>

      <a type="button" href="https://api.whatsapp.com/send?phone=52<?php echo $whatsapp; ?>&text=<?php echo $mensaje; ?>" target="_blank" class="btn btn-success">Enviar por WhatsApp</a>
    </div>

  <?php 
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

    public function get_plantilla_correo_set($id){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rget = $mysqli->query("SELECT * FROM plantillas_correo WHERE id=$id");
      if ($rget)
      {
        while($array = $rget->fetch_object())
        {
          $titulo    = $array->titulo;
          echo $plantilla = $array->plantilla;
        }
    ?>
      <!-- <h5>Cuerpo del mensaje</h5>
      <textarea class="form-control mb-3" rows="5" cols="5" id="mensaje_correo_recibo"><?php // echo $plantilla; ?></textarea> -->

    <?php 
      }
    }

    public function set_status_prospecto($ids,$status){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      print_r($ids);
      echo "<br> " . $status;

      foreach ($ids as $valor) {
        $rupdate = $mysqli->query("UPDATE `prospecto_servicios` SET `status_proceso`='$status' WHERE id='$valor'");
        if ($rupdate)
        {
          echo "updated " . $valor;
        }else{
          echo "Err. " . $mysqli->error;
        }
      }
    }
      
     public function set_status_prospecto_unitario($id,$status){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rupdate = $mysqli->query("UPDATE `prospecto_servicios` SET `status_proceso`='$status' WHERE id=$id");
      if ($rupdate)
      {
        echo "updated " . $valor;
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

    public function check_exist_prospecto($id_prospecto_buscar){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      echo "no";

      // $rcheck = $mysqli->query("SELECT * FROM `prospecto` WHERE nombre LIKE '%$id_prospecto_buscar%'");
      // if ($rcheck)
      // {
      //   echo "string";
      // }else{
      //   echo "Err. " . $mysqli->error;
      // }
    }

    public function guardar_propecto_servicio($id_prospecto_buscar_select,$id_servicio_buscar){

      include("../../../configuration/backend/private/conexion.php");

      $response = array();

      $rget_info_service = $mysqli->query("SELECT * FROM `prospecto_servicios` WHERE id_prospecto=$id_prospecto_buscar_select ORDER BY id DESC LIMIT 1");

      $radd_service = $mysqli->query("INSERT INTO `prospecto_servicios`(`id`, `id_prospecto`, `codigo`, status_proceso, `date_register`) VALUES (NULL,'$id_prospecto_buscar_select','','sin_procesar',NOW())");
      if ($radd_service) {
        $id_add_service = mysqli_insert_id($mysqli);

        if (mysqli_num_rows($rget_info_service)>0) {
          while($array = $rget_info_service->fetch_object())
          {
            $codigo = $array->codigo;
          }
          $codigo++;
          $code_name = $codigo;
        }else{
          // if (strlen($id_add_service) === 1) {
          //   $code_name = "CO" . $code_name . "000" . $id_add_service;
          // }else if (strlen($id_add_service) === 2) {
          //   $code_name = "CO" . $code_name . "00" . $id_add_service;
          // }else if (strlen($id_add_service) === 3) {
          //   $code_name = "CO" . $code_name . "0" . $id_add_service;
          // }else if (strlen($id_add_service) === 4) {
          //   $code_name = "CO" . $code_name . "" . $id_add_service;
          // }
          $code_name = "CO" . $code_name . "0001";
        }

        $code_name = strtoupper($code_name);

        

        
            $rget_service_info = $mysqli->query("SELECT * FROM servicios WHERE id=$id_servicio_buscar");
            if ($rget_service_info)
            {
              if (mysqli_num_rows($rget_service_info)>0) {
                while($array = $rget_service_info->fetch_object())
                {
                  $servicio = $array->servicio;
                  $descripcion = $array->descripcion;
                }
              }else{
                $servicio = "x";
                $descripcion = "s";
              }
            }

            $rcode_service = $mysqli->query("UPDATE `prospecto_servicios` SET 
              `codigo`='$code_name',
              nombre='$servicio',
              descripcion='$descripcion',
              status_proceso='sin_procesar'
            WHERE id=$id_add_service");

            $radd_service_list = $mysqli->query("INSERT INTO `prospecto_servicios_lista`(`id`, `id_servicio_codigo`, `id_servicio`, `descripcion`, `descripcion_original`, `date_register`) VALUES (NULL,'$id_add_service','$id_servicio_buscar','$descripcion','$descripcion',NOW())");
      
        echo "added";
      }else{
        echo "Error al agregar el servicio al prospecto, intenta nuevamente.";
      }
    }

    public function nuevo_propecto_servicio($nombre,$apellidos,$empresa,$direccion,$puesto,$email,$telefono_oficina,$telefono_celular,$mensaje,$extencion,$id_servicio){
      include("../../../configuration/backend/private/conexion.php");
      include("../../../configuration/backend/helpers/session_check.php");

      $response = array();
      $radd_prospect = $mysqli->query("INSERT INTO `prospecto`(`id`, `id_admin`, `nombre`, `apellidos`, `empresa`, `direccion`, `puesto`, `email`, `telefono_oficina`, `telefono_whatsapp`, `tag`, extencion, status, `date_register`) VALUES (NULL,'$INDUCE_PAGE_ID','$nombre','$apellidos','$empresa','$direccion','$puesto','$email','$telefono_oficina','$telefono_celular','Nuevo Prospecto','$extencion','_sinprocesar',NOW())");
      if ($radd_prospect)
      {
        $id_prospecto = mysqli_insert_id($mysqli);
        $codigo       = $nombre[0] . $nombre[1] . $id_prospecto . "0001";
        $codigo       = strtoupper($codigo);

        $rget_service_info = $mysqli->query("SELECT * FROM servicios WHERE id=$id_servicio");
        if ($rget_service_info)
        {
          if (mysqli_num_rows($rget_service_info)>0) {
            while($array = $rget_service_info->fetch_object())
            {
              $servicio = $array->servicio;
              $descripcion = $array->descripcion;
            }
          }else{
            $servicio = "x";
            $descripcion = "s";
          }
        }

        $radd_service = $mysqli->query("INSERT INTO `prospecto_servicios`(`id`, `id_prospecto`, `codigo`, `status`, nombre, descripcion, status_proceso, `date_register`) VALUES (NULL,'$id_prospecto','$codigo','','$servicio','$descripcion','sin_procesar',NOW())");
        if ($radd_service) {
          $id_add_service = mysqli_insert_id($mysqli);
          $radd_service_list = $mysqli->query("INSERT INTO `prospecto_servicios_lista`(`id`, `id_servicio_codigo`, `id_servicio`, `descripcion`, `descripcion_original`, `date_register`) VALUES (NULL,'$id_add_service','$id_servicio','$descripcion','$descripcion',NOW())");
        }

        echo "added";
      }else{
        echo "Error al agregar el prospecto. Err " . $mysqli->error;
      }
    }

    public function servicio_status($id_servicio,$status){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rupdate = $mysqli->query("UPDATE `prospecto_servicios` SET `status_proceso`='$status' WHERE id=$id_servicio");
      if ($rupdate)
      {
        echo "updated";
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

    public function agregar_operacion($operacion,$id_prospecto,$compraventa_vendedor,$compraventa_comprador,$compraventa_monto,$compraventa_descripcion,$permutantes_permutantes,$permutantes_monto,$permutantes_descripcion,$donacion_donante,$donacion_donatario,$donacion_descripcion,$testamento_testador,$testamento_testigos,$poder_poderdante,$poder_apoderado,$constitucion_compareciente,$constitucion_sociedad,$constitucion_tipo,$actas_socios,$actas_sociedad,$actas_tipo,$compraventa_requiere,$compraventa_reserva,$permutantes_requiere,$donacion_requiere,$donacion_reserva,$poder_tipo){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $radd_operacion = $mysqli->query("INSERT INTO `operaciones`(`id`, `id_prospecto`, `tipo`, `date_register`) VALUES (NULL,'$id_prospecto','$operacion',NOW())");
      if ($radd_operacion) {
        if($operacion=="Compraventa"){ 
          $radd = $mysqli->query("INSERT INTO `operaciones_compraventa`(`id`, `id_prospecto`, `vendedor`, `comprador`, `monto`, `descripcion`, requiere, reserva, `date_register`) VALUES (NULL,'$id_prospecto','$compraventa_vendedor','$compraventa_comprador','$compraventa_monto','$compraventa_descripcion','$compraventa_requiere','$compraventa_reserva',NOW())");
        }else if($operacion=="Permuta"){ 
          $radd = $mysqli->query("INSERT INTO `operaciones_permuta`(`id`, `id_prospecto`, `permutante`, `monto`, `descripcion`, requiere, `date_register`) VALUES (NULL,'$id_prospecto','$permutantes_permutantes','$permutantes_monto','$permutantes_descripcion','$permutantes_requiere',NOW())");
        }else if($operacion=="Donación"){ 
          $radd = $mysqli->query("INSERT INTO `operaciones_donacion`(`id`, `id_prospecto`, `donante`, `donatario`, `descripcion`, requiere, reserva, `date_register`) VALUES (NULL,'$id_prospecto','$donacion_donante','$donacion_donatario','$donacion_descripcion','$donacion_requiere','$donacion_reserva',NOW())");
        }else if($operacion=="Testamento"){ 
          $radd = $mysqli->query("INSERT INTO `operaciones_testamento`(`id`, `id_prospecto`, `testador`, `testigos`, `date_register`) VALUES (NULL,'$id_prospecto','$testamento_testador','$testamento_testigos',NOW())");
        }else if($operacion=="Poder"){ 
          $radd = $mysqli->query("INSERT INTO `operaciones_poder`(`id`, `id_prospecto`, `poderdante`, `apoderado`, tipo, `date_register`) VALUES (NULL,'$id_prospecto','$poder_poderdante','$poder_apoderado','$poder_tipo',NOW())");
        }else if($operacion=="Constitución de sociedad"){ 
          $radd = $mysqli->query("INSERT INTO `operaciones_constitucion`(`id`, `id_prospecto`, `compareciente`, `sociedad`, `tipo`, `date_register`) VALUES (NULL,'$id_prospecto','$constitucion_compareciente','$constitucion_sociedad','$constitucion_tipo',NOW())");
        }else if($operacion=="Actas de asamblea de sociedad"){ 
          $radd = $mysqli->query("INSERT INTO `operaciones_actas`(`id`, `id_prospecto`, `socios`, `sociedad`, `tipo`, `date_register`) VALUES (NULL,'$id_prospecto','$actas_socios','$actas_sociedad','$actas_tipo',NOW())");
        }
        if ($radd)
        {
          echo "registered";
        }else{
          echo "Err. " . $mysqli->error;
        }
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

    public function eliminar_compraventa($id_delete)  {

      include("../../../configuration/backend/private/conexion.php");
      $response = array();
      
      $rdelete = $mysqli->query("DELETE FROM `operaciones_compraventa` WHERE id=$id_delete");
      if ($rdelete)
      {
        echo "deleted";
      }else{
        echo "Err " . $mysqli->error;
      }
    }

    public function get_codigo_postal($codigoPostal){
      $apiKey  = 'AIzaSyAsMES2wkYybQFwFFiwiiEt4eRT5wYMsTA';
      $country = 'MX';
      $url     = 'https://maps.googleapis.com/maps/api/geocode/json?components=country:' . $country 
               . '|postal_code:' . $codigoPostal 
               . '&key=' . $apiKey;

      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($curl);
      if ($response === false) {
        die("Error al conectarse a la API de Google Maps: " . curl_error($curl));
      }
      $data = json_decode($response, true);

      if(isset($data['status']) && $data['status'] == "OK") {
        // $colonias = array();
        // foreach ($data['results'] as $result) {
        //   foreach ($result['address_components'] as $component) {
        //     if (in_array('postcode_localities', $component['types'])) {
        //       $colonias[] = $component['long_name'];
        //     }
        //   }
        // }
        // echo json_encode($colonias);
        
        $postcode_localities = $data['results'][0]['postcode_localities'];
        echo '<option value="" disabled selected>Selecciona tu colonia</option>';
        foreach ($postcode_localities as $locality) {
          echo '<option value="'.$locality.'">' . $locality . '</option>';
        }
      }else {
        echo '<option value="" disabled selected>No se encontraron colonias para el código postal proporcionado.</option>';
      }
      curl_close($curl);

    }

    public function get_agenda($id){
      include("../../../configuration/backend/private/conexion.php");

      $response = array();

      $rclientes2  = $mysqli->query("SELECT * FROM clientes ORDER BY nombre ASC");
      $rservicios2 = $mysqli->query("SELECT * FROM servicios ORDER BY nombre ASC");
      
      $rget_agenda = $mysqli->query("SELECT * FROM agenda WHERE id=$id");
      if ($rget_agenda)
      {
        while($array = $rget_agenda->fetch_object())
        {
          $agenda_id_cliente    = $array->id_cliente;
          $agenda_id_servicio   = $array->id_servicio;
          $agenda_telefono      = $array->telefono;
          $agenda_titulo        = $array->titulo;
          $agenda_fecha_inicio  = $array->fecha_inicio;
          $agenda_hora_inicio   = $array->hora_inicio;
          $agenda_fecha_fin     = $array->fecha_fin;
          $agenda_hora_fin      = $array->hora_fin;
          $agenda_descripcion   = $array->descripcion;
          $agenda_date_register = $array->date_register;

          $rget_cliente = $mysqli->query("SELECT * FROM clientes WHERE id=$agenda_id_cliente");
          if ($rget_cliente)
          {
            if (mysqli_num_rows($rget_cliente)>0) {
              while($array = $rget_cliente->fetch_object())
              {
                $agenda_nombre = $array->nombre;
              }
            }else{
              $agenda_nombre = 'No se encontro.';
            }
          }

          $rget_servicio = $mysqli->query("SELECT * FROM servicios WHERE id=$agenda_id_servicio");
          if ($rget_servicio)
          {
            if (mysqli_num_rows($rget_servicio)>0) {
              while($array = $rget_servicio->fetch_object())
              {
                $agenda_servicio_nombre      = $array->nombre;
                $agenda_servicio_descripcion = $array->descripcion;
              }
            }else{
              $agenda_servicio_nombre      = 'No se encontro.';
              $agenda_servicio_descripcion = 'No se encontro.';
            }
          }
    ?>
      <div class="modal-body py-10 px-lg-17">
        <div class="fv-row mb-9">
          <label class="fs-6 fw-semibold required mb-2">Cliente</label>

          <input list="editar_clientes" id="editar_id_cliente" name="editar_id_cliente" class="form-control" placeholder="Escribe aquí..." value="<?php echo $agenda_nombre; ?>">
          <datalist id="editar_clientes">
            <option value="<?php echo $agenda_nombre; ?>" data-cliente-id="<?php echo $agenda_id_cliente; ?>">
            <?php 
            if ($rclientes2)
            {
              while($array = $rclientes2->fetch_object())
              {
                $cliente_id = $array->id;
                $cliente_nombre = $array->nombre;
                $cliente_telefono = $array->telefono;
                    ?>
            <option value="<?php echo $cliente_nombre; ?>" data-cliente-id="<?php echo $cliente_id; ?>">
            <?php 
              }
            }
            ?>
          </datalist>
        </div>

        <div class="fv-row mb-9">
          <label class="fs-6 fw-semibold mb-2">Servicio</label>
          <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" id="editar_id_servicio">
            <option value="" disabled>Selecciona una opción</option>
            <option value="<?php echo $agenda_id_servicio; ?>" selected><?php echo $agenda_servicio_nombre; ?></option>
            <?php 
            if ($rservicios2)
            {
              while($array = $rservicios2->fetch_object())
              {
                $servicio_id     = $array->id;
                $servicio_nombre = $array->nombre;
            ?>
              <option value="<?php echo $servicio_id; ?>"><?php echo $servicio_nombre; ?></option>
            <?php 
              }
            }
            ?>
          </select>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="fv-row mb-9">
              <label class="fs-6 fw-semibold mb-2 required">Fecha de Inicio</label>
              <input type="date" class="form-control form-control-solid" name="calendar_event_start_date" placeholder="Selecciona la fecha" id="editar_kt_calendar_datepicker_start_date" value="<?php echo $agenda_fecha_inicio; ?>" />
            </div>
          </div>

          <div class="col-6" data-kt-calendar="datepicker">
            <div class="fv-row mb-9">
              <label class="fs-6 fw-semibold mb-2">Hora de Inicio</label>
              <input type="time" class="form-control form-control-solid" name="calendar_event_start_time" placeholder="Selecciona la hora" id="editar_kt_calendar_datepicker_start_time" value="<?php echo $agenda_hora_inicio; ?>" />
            </div>
          </div>

          <div class="col-6" data-kt-calendar="datepicker">
            <div class="fv-row mb-9">
              <label class="fs-6 fw-semibold mb-2">Hora de fin</label>
              <input type="time" class="form-control form-control-solid" name="calendar_event_end_time" placeholder="Selecciona la hora" id="editar_kt_calendar_datepicker_end_time" value="<?php echo $agenda_hora_fin; ?>" />
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-warning" onclick="editar_calendario()">Editar</button>
      </div>

    <?php 
        }
      }else{
        echo "Err " . $mysqli->error;
      }
    }

    public function editar_calendario($id_cliente,$telefono,$id_servicio,$fecha_inicio,$hora_inicio,$fecha_fin,$hora_fin,$descripcion,$clienteNuevo,$nuevo_nombre,$nuevo_telefono,$id_agenda_editar){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rupdate = $mysqli->query("UPDATE `agenda` SET 
        `id_cliente`='$id_cliente',
        `id_servicio`='$id_servicio',
        `fecha_inicio`='$fecha_inicio',
        `hora_inicio`='$hora_inicio',
        `hora_fin`='$hora_fin'
        WHERE id=$id_agenda_editar");
      if ($rupdate)
      {
        echo "updated";
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

    public function eliminar_calendario($id){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rdelete = $mysqli->query("DELETE FROM `agenda` WHERE id=$id");
      if ($rdelete)
      {
        echo "deleted";
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

    public function eliminar_servicio($id){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rdelete = $mysqli->query("DELETE FROM `servicios` WHERE id=$id");
      if ($rdelete)
      {
        echo "deleted";
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

    public function editar_servicio($nombre,$descripcion,$id){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rupdate = $mysqli->query("UPDATE `servicios` SET 
        `nombre`='$nombre',
        `descripcion`='$descripcion'
        WHERE id=$id");
      if ($rupdate)
      {
        echo "updated";
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

    public function eliminar_cliente($id){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rdelete = $mysqli->query("DELETE FROM `clientes` WHERE id=$id");
      if ($rdelete)
      {
        echo "deleted";
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

    public function editar_cliente($nombre,$telefono,$id){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rupdate = $mysqli->query("UPDATE `clientes` SET 
        `nombre`='$nombre',
        `telefono`='$telefono'
        WHERE id=$id");
      if ($rupdate)
      {
        echo "updated";
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

    public function status_calendario($id,$status,$nota){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rupdate = $mysqli->query("UPDATE `agenda` SET 
        `estatus`='$status',
        `nota`='$nota'
        WHERE id=$id");
      if ($rupdate)
      {
        echo "updated";
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

    public function capacidad_servicio($id,$nombre,$capacidad){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $radd = $mysqli->query("INSERT INTO `servicios_ocupacion`(`id`, `id_servicio`, `nombre`, `capacidad`, `date_register`) VALUES (NULL,'$id','$nombre','$capacidad',NOW())");
      if ($radd)
      {
        echo "registered";
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

    public function capacidad_servicio2($id,$capacidad,$campo){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rupdate = $mysqli->query("UPDATE `servicios` SET $campo='$capacidad' WHERE id=$id");
      if ($rupdate)
      {
        echo "updated";
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

    public function get_capacidad_servicio($id_servicio){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

    ?>
        <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button class="btn btn-primary me-md-2" type="button" onclick="set_capacidad('<?php // echo $id_servicio; ?>')">Agregar capacidad</button>
        </div> -->
    <?php 
      echo '
        <table class="table table-bordered mt-5">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Capacidad</th>
              <th scope="col">Fecha de registro</th>
            </tr>
          </thead>
          <tbody>';

      $cont = 0;
      $rget = $mysqli->query("SELECT * FROM servicios WHERE id=$id_servicio");
      if ($rget)
      {
        if (mysqli_num_rows($rget)>0) {
          while($array = $rget->fetch_object())
          {
            $id = $array->id;
            // $id_servicio = $array->id_servicio;
            // $nombre = $array->nombre;
            $no_doctor = $array->no_doctor;
            $no_spa = $array->no_spa;
            $date_register = $array->date_register;
            $cont++;
          }
    ?>
            <tr>
              <th scope="row">1</th>
              <td>Doctor</td>
              <td><input type="number" id="capacidad-no_doctor-<?php echo $id; ?>" value="<?php echo $no_doctor; ?>" onchange="capacidad_servicio2('<?php echo $id; ?>','no_doctor')"></td>
              <td><?php echo $date_register; ?></td>
            </tr>

            <tr>
              <th scope="row">2</th>
              <td>SPA</td>
              <td><input type="number" id="capacidad-no_spa-<?php echo $id; ?>" value="<?php echo $no_spa; ?>" onchange="capacidad_servicio2('<?php echo $id; ?>','no_spa')"></td>
              <td><?php echo $date_register; ?></td>
            </tr>

    <?php 
        }
      }

      echo '
          </tbody>
        </table>';
    }

    public function get_permisos_usuaro($id_usuario){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

    ?>
        <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button class="btn btn-primary me-md-2" type="button" onclick="set_permiso('<?php // echo $id_usuario; ?>')">Agregar permiso</button>
        </div> -->
    <?php 
      // echo '
      //   <table class="table table-bordered mt-5">
      //     <thead>
      //       <tr>
      //         <th scope="col">#</th>
      //         <th scope="col">Permiso</th>
      //         <th scope="col">Fecha de registro</th>
      //       </tr>
      //     </thead>
      //     <tbody>';

      // echo '<div class="row">';

      $cont = 0;
      $rget = $mysqli->query("SELECT * FROM usuarios_permisos WHERE id_usuario=$id_usuario");
      if ($rget)
      {
        if (mysqli_num_rows($rget)>0) {
          while($array = $rget->fetch_object())
          {
            $id            = $array->id;
            $permiso       = $array->permiso;
            $status        = $array->status;
            $date_register = $array->date_register;
            $cont++;
    ?>
            <!-- <tr>
              <th scope="row"><?php // echo $cont; ?></th>
              <td><?php // echo $permiso; ?></td>
              <td><?php // echo $date_register; ?></td>
            </tr> -->

            <!-- <div class="col-4"> -->
              <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" value="" id="check-<?php echo $id; ?>" <?php if($status=='true'){ echo "checked"; } ?> onchange="status_permiso('<?php echo $id; ?>')">
                <label class="form-check-label" for="check-<?php echo $id; ?>">
                  <?php echo $permiso; ?>
                </label>
              </div>
            <!-- </div> -->

    <?php 

          }
        }
      }

      // echo '
      //     </tbody>
      //   </table>';

      // echo '</div>';
    }

    public function agregar_permiso_usuario($permiso_id,$id_permiso){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $radd = $mysqli->query("INSERT INTO `usuarios_permisos`(`id`, `id_usuario`, `permiso`, `date_register`) VALUES (NULL,'$permiso_id','$id_permiso',NOW())");
      if ($radd)
      {
        echo "registered";
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

    public function editar_usuario($nombre,$usuario,$password,$id){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rupdate = $mysqli->query("UPDATE `usuarios` SET 
        `nombre`='$nombre',
        `usuario`='$usuario',
        `password`='$password'
        WHERE id=$id");
      if ($rupdate)
      {
        echo "updated";
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

    public function eliminar_usuario($id){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rdelete = $mysqli->query("DELETE FROM `usuarios` WHERE id=$id");
      if ($rdelete)
      {
        echo "deleted";
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

    public function agregar_horario_servicio($id_servicio,$hora_inicio,$hora_fin){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $radd = $mysqli->query("INSERT INTO `horarios`(`id`, `id_servicio`, `hora_inicio`, `hora_fin`) VALUES (NULL,'$id_servicio','$hora_inicio','$hora_fin')");
      if ($radd)
      {
        echo "registered";
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

    public function editar_horario($hora_inicio,$hora_fin,$dia_inicio,$dia_cierre){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $rupdate = $mysqli->query("UPDATE `horarios` SET 
        `hora_inicio`='$hora_inicio',
        `hora_fin`='$hora_fin',
        `dia_inicio`='$dia_inicio',
        `dia_cierre`='$dia_cierre'
        WHERE 1");
      if ($rupdate)
      {
        echo "updated";
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

    public function get_horarios_servicio($id_servicio,$fecha){
      include("../../../configuration/backend/private/conexion.php");
      $response = array();

      $ocupado_doctor = false;
      $ocupado_spa    = false;
      // $ocupado_total_pedido = 0;

      $rservicios = $mysqli->query("SELECT * FROM servicios WHERE id=$id_servicio");
      if ($rservicios)
      {
        while($array = $rservicios->fetch_object())
        {
          $tipo      = $array->tipo;
          $no_doctor = $array->no_doctor;
          $no_spa    = $array->no_spa;
        }
      }

      if ($tipo=='Doctor') {
        $ocupado_total_pedido = $no_doctor;
      }else if ($tipo=='SPA') {
        $ocupado_total_pedido = $no_spa;
      }

      // echo $permitir_agendar ? "Se permite agendar" : "No se permite agendar";

      $rget_horarios = $mysqli->query("SELECT * FROM horarios");
      if ($rget_horarios)
      {
        if (mysqli_num_rows($rget_horarios)>0) {
          echo '<option value="" disabled selected>Selecciona una hora</option>';
          while($array = $rget_horarios->fetch_object())
          {
            $hora_inicio = $array->hora_inicio;
            $hora_fin    = $array->hora_fin;

            $startTime   = strtotime($hora_inicio);
            $endTime     = strtotime($hora_fin);
            $interval = 30;
            // $timeOptions = [];

            for ($time = $startTime; $time <= $endTime; $time += $interval * 60) {
              $hora_ = date('H:i', $time);

              $ocupado_id_servicio = 0;
              $ocupado_tipo      = '';
              $ocupado_no_doctor = 0;
              $ocupado_no_spa    = 0;
              $ocupado_total     = 0;
              $permitir_agendar = false;
              $ocupado_id        = 0;

              $rget_agenda_ocupado = $mysqli->query("SELECT * FROM agenda WHERE fecha_inicio='$fecha' AND hora_inicio='$hora_'");
              if ($rget_agenda_ocupado) {
                while($array = $rget_agenda_ocupado->fetch_object())
                {
                  $ocupado_id = $array->id;
                  $ocupado_id_servicio = $array->id_servicio;
                }
              }

              $rger_servicio_ocupado = $mysqli->query("SELECT * FROM servicios WHERE id=$ocupado_id_servicio");
              // $rger_servicio_ocupado = $mysqli->query("SELECT * FROM servicios WHERE id=$ocupado_id_servicio AND tipo='$tipo'");
              if ($rger_servicio_ocupado) {
                while($array = $rger_servicio_ocupado->fetch_object())
                {
                  // $ocupado_id        = $array->id;
                  $ocupado_tipo      = $array->tipo;
                  $ocupado_no_doctor = $array->no_doctor;
                  $ocupado_no_spa    = $array->no_spa;
                }
              }

              if ($tipo == $ocupado_tipo) {
                if ($ocupado_tipo=='Doctor') {
                  $ocupado_total = $ocupado_no_doctor;
                }else if ($ocupado_tipo=='SPA') {
                  $ocupado_total = $ocupado_no_spa;
                }

                if ($ocupado_tipo>=$ocupado_total_pedido) {
                  $permitir_agendar = false;
                }else if ($ocupado_tipo<$ocupado_total_pedido) {
                  $permitir_agendar = true;
                }  
              }else{
                if ($ocupado_no_doctor>=$ocupado_total_pedido) {
                  $permitir_agendar = false;
                }else if ($ocupado_no_doctor<$ocupado_total_pedido) {
                  $permitir_agendar = true;
                }else if ($ocupado_no_spa>=$ocupado_total_pedido) {
                  $permitir_agendar = false;
                }else if ($ocupado_no_spa<$ocupado_total_pedido) {
                  $permitir_agendar = true;
                }
              }

              // $rget_agenda = $mysqli->query("SELECT * FROM agenda WHERE id_servicio=$id_servicio AND fecha_inicio='$fecha' AND hora_inicio='$hora_'");
              // if ($rget_agenda) {
              //   $num_reservas = mysqli_num_rows($rget_agenda);

              //   if ($num_reservas > 0) {
              //     if ($no_doctor > $num_reservas) {
              //       $permitir_agendar = true;
              //     }
              //     else if ($no_spa > ($num_reservas - $no_doctor)) {
              //       $permitir_agendar = true;
              //     }
              //   } else {
              //     $permitir_agendar = true;
              //   }
              // }

              if ($permitir_agendar) {
                // echo '<option value="'.$hora_.'">' . $ocupado_tipo.' - '.$hora_.' - permitir: '.$permitir_agendar.' - tipo: '.$tipo.' - '.$ocupado_no_doctor.' - '.$ocupado_total_pedido.' - '.$ocupado_no_spa.' - '.$ocupado_id.'</option>';
                echo '<option value="'.$hora_.'">' . $hora_ . '</option>';
              }
            }

            // $timeOptions = $this->generateTimeOptions($hora_inicio, $hora_fin);
            // print_r($timeOptions);
          }
        }else{
          echo '<option value="" disabled selected>No hay horarios disponibles.</option>';
        }
      }else{
        echo "Err. " . $mysqli->error;
      }

    }

    public function generateTimeOptions($start, $end, $interval = 30) {
      $startTime   = strtotime($start);
      $endTime     = strtotime($end);
      $timeOptions = [];

      for ($time = $startTime; $time <= $endTime; $time += $interval * 60) {
        $timeOptions[] = date('H:i', $time);
      }
      return $timeOptions;
    }

    public function get_calendario_info($id){
      include("../../../configuration/backend/private/conexion.php");
      include("../../../configuration/backend/helpers/formats-date.php");

      $response = array();

      $rget_agenda = $mysqli->query("SELECT * FROM `agenda` WHERE id=$id");
      if ($rget_agenda) {
        while($array = $rget_agenda->fetch_object()) {
          $agenda_id            = $array->id;
          $agenda_id_usuario    = $array->id_usuario;
          $agenda_id_cliente    = $array->id_cliente;
          $agenda_id_servicio   = $array->id_servicio;
          $agenda_titulo        = $array->titulo;
          $agenda_fecha_inicio  = $array->fecha_inicio;
          $agenda_hora_inicio   = $array->hora_inicio;
          $agenda_fecha_fin     = $array->fecha_fin;
          $agenda_hora_fin      = $array->hora_fin;
          $agenda_descripcion   = $array->descripcion;
          $agenda_estatus       = $array->estatus;
          $agenda_nota          = $array->nota;
          $agenda_date_register = $array->date_register;

          $agenda_nombre = 'No se encontró';
          $rget_cliente = $mysqli->query("SELECT nombre,id_usuario FROM clientes WHERE id=$agenda_id_cliente");
          if ($rget_cliente && $rget_cliente->num_rows > 0) {
              $cliente = $rget_cliente->fetch_object();
              $agenda_nombre = htmlspecialchars($cliente->nombre);
              $agenda_id_usuario_cliente = htmlspecialchars($cliente->id_usuario);
          }

          $agenda_servicio_nombre = 'No se encontró';
          $agenda_servicio_descripcion = 'No se encontró';
          $rget_servicio = $mysqli->query("SELECT nombre, descripcion FROM servicios WHERE id=$agenda_id_servicio");
          if ($rget_servicio && $rget_servicio->num_rows > 0) {
              $servicio = $rget_servicio->fetch_object();
              $agenda_servicio_nombre = htmlspecialchars($servicio->nombre);
              $agenda_servicio_descripcion = htmlspecialchars($servicio->descripcion);
          }

          if (empty($agenda_estatus)) {
            $agenda_estatus = 'pendiente';
          }

          $rget_usuario = $mysqli->query("SELECT * FROM usuarios WHERE id=$agenda_id_usuario");
          if ($rget_usuario)
          {
            if (mysqli_num_rows($rget_usuario)>0) {
              while($array = $rget_usuario->fetch_object())
              {
                $usuario_nombre = $array->nombre;
              }
            }else{
              $usuario_nombre = 'No se encontro.';
            }
          }

          $rget_usuario2 = $mysqli->query("SELECT * FROM usuarios WHERE id=$agenda_id_usuario_cliente");
          if ($rget_usuario2)
          {
            if (mysqli_num_rows($rget_usuario2)>0) {
              while($array = $rget_usuario2->fetch_object())
              {
                $usuario_nombre2 = $array->nombre;
              }
            }else{
              $usuario_nombre2 = 'No se encontro.';
            }
          }

          if ($agenda_estatus == 'aprobado') {
            $agenda_estatus_bg              = 'bg-success';
            $agenda_estatus_backgroundColor =  '#198754';
            $agenda_estatus_borderColor     =  '#00ff00';
            $agenda_estatus_textColor       =  'white';
          } else if ($agenda_estatus == 'cancelado') {
            $agenda_estatus_bg              = 'bg-danger';
            $agenda_estatus_backgroundColor =  '#dc3545';
            $agenda_estatus_borderColor     =  '#00ff00';
            $agenda_estatus_textColor       =  'white';
          } else {
            $agenda_estatus_bg              = 'bg-primary';
            $agenda_estatus_backgroundColor =  '#0d6efd';
            $agenda_estatus_borderColor     =  '#00ff00';
            $agenda_estatus_textColor       =  'white';
          }
        }
    ?>

      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <!--begin::Edit-->
        <div class="btn btn-icon btn-sm btn-color-gray-500 btn-active-icon-primary me-2" data-bs-toggle="tooltip" title="Editar agenda" id="kt_modal_view_event_edit" onclick="get_agenda()">
          <i class="ki-duotone ki-pencil fs-2">
            <span class="path1"></span>
            <span class="path2"></span>
          </i>
        </div>
        <!--end::Edit-->

        <!--begin::Edit-->
        <!-- <div class="btn btn-icon btn-sm btn-color-gray-500 btn-active-icon-danger me-2" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Eliminar agenda" id="kt_modal_view_event_delete" onclick="open_modal('modalEliminarAgenda')">
          <i class="ki-duotone ki-trash fs-2">
            <span class="path1"></span>
            <span class="path2"></span>
            <span class="path3"></span>
            <span class="path4"></span>
            <span class="path5"></span>
          </i>
        </div> -->
        <!--end::Edit-->

        <!--begin::Close-->
        <div class="btn btn-icon btn-sm btn-color-gray-500 btn-active-icon-primary" data-bs-toggle="tooltip" title="Cerrar" data-bs-dismiss="modal">
          <i class="ki-duotone ki-cross fs-2x">
            <span class="path1"></span>
            <span class="path2"></span>
          </i>
        </div>
        <!--end::Close-->
      </div>

        <!--begin::Modal body-->
        <div class="modal-body pt-0 pb-20 px-lg-17">

          <!--begin::Row-->
          <div class="d-flex align-items-center">
            <!--begin::Event location-->
            <div class="fs-6">
              <span class="fw-bold">Cliente:</span>
              <span data-kt-calendar="event_location"><?php echo $agenda_nombre; ?></span>
            </div>
            <!--end::Event location-->
          </div>
          <!--end::Row-->

          <!--begin::Row-->
          <div class="d-flex align-items-center">
            <!--begin::Event location-->
            <div class="fs-6">
              <span class="fw-bold">Agendado por:</span>
              <span data-kt-calendar="event_location"><?php echo $usuario_nombre; ?></span>
            </div>
            <!--end::Event location-->
          </div>
          <!--end::Row-->

          <!--begin::Row-->
          <div class="d-flex align-items-center">
            <!--begin::Event location-->
            <div class="fs-6">
              <span class="fw-bold">Registrado por:</span>
              <span data-kt-calendar="event_location"><?php echo $usuario_nombre2; ?></span>
            </div>
            <!--end::Event location-->
          </div>
          <!--end::Row-->

          <!--begin::Row-->
          <div class="d-flex mt-5">
            <!--begin::Icon-->
            <i class="ki-duotone ki-calendar-8 fs-1 text-muted me-5">
              <span class="path1"></span>
              <span class="path2"></span>
              <span class="path3"></span>
              <span class="path4"></span>
              <span class="path5"></span>
              <span class="path6"></span>
            </i>
            <!--end::Icon-->
            <div class="mb-9">
              <!--begin::Event name-->
              <div class="d-flex align-items-center mb-2">
                <span class="fs-3 fw-bold me-3" data-kt-calendar="event_name"><?php echo $agenda_servicio_nombre; ?></span>
              </div>
              <!--end::Event name-->
              <!--begin::Event description-->
              <div class="fs-6" data-kt-calendar="event_description"><?php echo $agenda_servicio_descripcion; ?></div>
              <!--end::Event description-->
            </div>
          </div>
          <!--end::Row-->
          <!--begin::Row-->
          <div class="d-flex align-items-center mb-2">
            <!--begin::Bullet-->
            <span class="bullet bullet-dot h-10px w-10px bg-success ms-2 me-7"></span>
            <!--end::Bullet-->
            <!--begin::Event start date/time-->
            <div class="fs-6">
              <span class="fw-bold">Fecha:</span>
              <span data-kt-calendar="event_start_date"><?php echo fecha($agenda_fecha_inicio); ?></span>
            </div>
            <!--end::Event start date/time-->
          </div>
          <!--end::Row-->

          <!--begin::Row-->
          <div class="d-flex align-items-center mb-9">
            <span class="bullet bullet-dot h-10px w-10px bg-danger ms-2 me-7"></span>
            <div class="fs-6">
              <span class="fw-bold">Horario:</span>
              <span data-kt-calendar="event_end_date"><?php echo $agenda_hora_inicio; ?> hrs a <?php echo $agenda_hora_fin; ?> hrs</span>
            </div>
          </div>
          <!--end::Row-->

          <input type="hidden" id="id_agenda_editar" value="">

          <textarea id="nota_status" class="form-control mt-5" rows="5" cols="5" placeholder="Escribe una nota..."><?php echo $agenda_nota; ?></textarea>

          <?php if ($agenda_estatus=='aprobado' || $agenda_estatus=='cancelado') { ?>
            <?php if ($agenda_estatus=='aprobado') { ?>
              <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-5">
                <button class="btn btn-success me-md-2" type="button">
                  Asistencia confirmada <i class="bi bi-check"></i>
                </button>
              </div>
            <?php } ?>

            <?php if ($agenda_estatus=='cancelado') { ?>
              <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-5">
                <button class="btn btn-danger" type="button">
                  Cancelo cita <i class="bi bi-x-lg"></i>
                </button>
              </div>
            <?php } ?>

          <?php }else{ ?>
          <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-5">
            <button class="btn btn-success me-md-2" type="button" onclick="status_calendario('aprobado')">
              Confirmar asistencia <i class="bi bi-check"></i>
            </button>

            <button class="btn btn-danger" type="button" onclick="status_calendario('cancelado')">
              Cancelo cita <i class="bi bi-x-lg"></i>
            </button>
          </div>
          <?php } ?>

        </div>
        <!--end::Modal body-->

    <?php 
      }else{
        echo "Err. " . $mysqli->error;
      }
    }

  //////////////////////////////////////
  }
?>