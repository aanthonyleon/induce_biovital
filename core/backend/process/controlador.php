<?php
include("modelo.php");
if (!isset($_POST['work'])) 
{
    print false;
    exit;
}

$work = $_POST['work']; 
switch($work)
{
    case 'agregar_cliente':
        agregar_cliente();
        break;

    case 'editar_cliente':
        editar_cliente();
        break;

    case '3':
        login();
        break;

    case 'login_admin':
        login_admin();
        break;

    // case 'save_header_footer':
    //  save_header_footer();
    //  break;

    case 'get_codigo_postal':
        get_codigo_postal();
        break;

    case 'status_recibo_dashboard':
        status_recibo_dashboard();
        break;

    case 'eliminar_servicio':
        eliminar_servicio();
        break;

    case 'delete_brief':
        delete_brief();
        break;
    
    case 'eliminar_cliente':
        eliminar_cliente();
        break;
    
    case '7':
        cliente_add_service();
        break;

    case 'enviar_correo':
        enviar_correo();
        break;

    case 'get_correo_enviado':
        get_correo_enviado();
        break;

    case 'prospect_add_contact':
        prospect_add_contact();
        break;

    case 'get_hora_fin':
        get_hora_fin();
        break;

    case 'get_hora_fin_page':
        get_hora_fin_page();
        break;

    case 'delete_propecto_contacto':
        delete_propecto_contacto();
        break;

    case 'status_calendario':
        status_calendario();
        break;

    case 'prospect_add_adicional':
        prospect_add_adicional();
        break;

    case 'cargarDatosJkanban':
        cargarDatosJkanban();
        break;

    case 'actualizar_status':
        actualizar_status();
        break;

    case 'get_data_whatsapp':
        get_data_whatsapp();
        break;

    case 'delete_propecto_adicional':
        delete_propecto_adicional();
        break;
    
    case '14':
        agregar_cliente();
        break;

    case 'editar_propecto':
        editar_propecto();
        break;

    case 'agregar_operacion':
        agregar_operacion();
        break;

    case 'get_agenda':
        get_agenda();
        break;

    case '17':
        delete_cliente_contacto();
        break;

    case '18':
        delete_cliente_facturacion();
        break;

    case 'get_calendario_info':
        get_calendario_info();
        break;

    case '20':
        delete_cliente();
        break;

    case '21':
        client_add_adicional();
        break;

    case '22':
        client_add_contact();
        break;

    case '23':
        client_add_facturacion();
        break;
    
    case '24':
        guardar_prospecto_servicio();
        break;

    case 'prospect_add_service_to_list':
        prospect_add_service_to_list();
        break;

    case '26':
        get_description_service();
        break;

    case 'agregar_servicio':
        agregar_servicio();
        break;

    case 'editar_servicio':
        editar_servicio();
        break;

    case 'get_plantilla_correo':
        get_plantilla_correo();
        break;

    case '28':
        guardar_equipo();
        break;

    case 'get_contratos_recibo_pago':
        get_contratos_recibo_pago();
        break;

    case 'get_plantilla_correo_set':
        get_plantilla_correo_set();
        break;

    case '29':
        guardar_cuadrilla();
        break;

    case '30':
        agregar_equipo_prospecto();
        break;

    case '31':
        agregar_cuadrilla_prospecto();
        break;

    case '32':
        delete_equipo_prospecto();
        break;

    case '33':
        delete_cuadrilla_prospecto();
        break;

    case '34':
        equipo_details();
        break;

    case '35':
        editar_equipo();
        break;

    case '36':
        delete_equipo();
        break;

    case '37':
        cuadrilla_details();
        break;

    case '38':
        editar_cuadrilla();
        break;

    case '39':
        delete_cuadrilla();
        break;

    case 'delete_servicio_code':
        delete_servicio_code();
        break;

    case 'agregar_nota_prospecto':
        agregar_nota_prospecto();
        break;

    case 'agregar_nota_prospecto_lista':
        agregar_nota_prospecto_lista();
        break;

    case '41':
        nota_details();
        break;

    case '42':
        editar_nota();
        break;

    case 'crear_orden_compra_prospecto':
        crear_orden_compra_prospecto();
        break;

    case 'crear_recibo_prospecto2':
        crear_recibo_prospecto2();
        break;

    case 'guardar_nota':
        guardar_nota();
        break;

    case 'agregar_lista':
        agregar_lista();
        break;

    case '45':
        nota_gral_details();
        break;

    case 'editar_nota_gral':
        editar_nota_gral();
        break;

    case 'eliminar_nota':
        eliminar_nota();
        break;

    case 'eliminar_prospecto_nota':
        eliminar_prospecto_nota();
        break;

    case '49':
        cambiar_status_service();
        break;

    case '50':
        get_description_service_update();
        break;

    case '51':
        prospect_objetivo_servicio();
        break;

    case '52':
        guardar_equipo_proteccion();
        break;

    case '53':
        equipo_proteccion_details();
        break;

    case '54':
        editar_equipo_proteccion();
        break;

    case '55':
        delete_equipo_proteccion();
        break;

    case '56':
        agregar_equipo_proteccion_prospecto();
        break;

    case '57':
        delete_equipo_proteccion_prospecto();
        break;

    case 'prospecto_retencion':
        prospecto_retencion();
        break;

    case '59':
        set_facturacion_choose();
        break;

    case 'crear_orden_servicio_prospecto':
        crear_orden_servicio_prospecto();
        break;

    case '61':
        guardar_usuario();
        break;

    case '62':
        users_details();
        break;

    case 'editar_usuario':
        editar_usuario();
        break;

    case '64':
        delete_user();
        break;

    case '65':
        prospect_add_service_to_list_other();
        break;

    case '66':
        get_description_service_update_otro();
        break;

    case '67':
        guardar_prospecto_servicio_otro();
        break;

    case '68':
        guardar_lista();
        break;

    case 'guardar_servicio':
        guardar_servicio();
        break;

    case 'service_details':
        service_details();
        break;

    case 'delete_service':
        delete_service();
        break;

    case '73':
        list_details();
        break;
    
    case 'lista_notas_details':
        lista_notas_details();
        break;

    case '74':
        agregar_servicion_opcion();
        break;
    
    case 'agregar_nota_lista':
        agregar_nota_lista();
        break;
    
    case '75':
        delete_list();
        break;
    
    case 'delete_list_notas':
        delete_list_notas();
        break;

    case 'send_mail_contact':
        send_mail_contact();
        break;
    
    case 'eliminar_cotizacion':
        eliminar_cotizacion();
        break;

    case 'eliminar_compraventa':
        eliminar_compraventa();
        break;
    
    case 'eliminar_ordenservicio':
        eliminar_ordenservicio();
        break;

    case 'mail_cotizacion_update':
        mail_cotizacion_update();
        break;
    
    case 'mail_orden_servicio_update':
        mail_orden_servicio_update();
        break;

    case 'asignar_prospecto':
        asignar_prospecto();
        break;

    case 'recibos_pago_folios':
        recibos_pago_folios();
        break;

    case 'crear_recibo_pago':
        crear_recibo_pago();
        break;

    // case 'agregar_horario_servicio':
    //  agregar_horario_servicio();
    //  break;
    
    case 'eliminar_recibo_pago':
        eliminar_recibo_pago();
        break;
    
    case 'get_capacidad_servicio':
        get_capacidad_servicio();
        break;

    case 'get_horarios_servicio':
        get_horarios_servicio();
        break;
    
    case 'eliminar_notas_lista_prospect':
        eliminar_notas_lista_prospect();
        break;

    // PAGINA
    case 'save_new_post':
        save_new_post();
        break;

    case 'edit_post':
        edit_post();
        break;

    case 'save_header_footer':
        save_header_footer();
        break;

    case 'delete_post':
        delete_post();
        break;

    // PAGINA WEB
    case 'enviar_cotizacion':
        enviar_cotizacion();
        break;

    // BODY
    case 'call_list_blog':
        call_list_blog();
        break;

    case 'call_list_blog_more':
        call_list_blog_more();
        break;

    case 'eliminar_calendario':
        eliminar_calendario();
        break;

    case 'prospect_add_service_write':
        prospect_add_service_write();
        break;

    case 'agregar_horario_servicio':
        agregar_horario_servicio();
        break;

    case 'editar_horario':
        editar_horario();
        break;

    case 'agregar_nota_adicional':
        agregar_nota_adicional();
        break;

    case 'agregar_permiso_usuario':
        agregar_permiso_usuario();
        break;

    case 'get_permisos_usuaro':
        get_permisos_usuaro();
        break;

    case 'status_condicion':
        status_condicion();
        break;

    case 'agregar_usuario':
        agregar_usuario();
        break;

    case 'usuario_permisos':
        usuario_permisos();
        break;

    case 'usuario_info':
        usuario_info();
        break;

    case 'status_permiso':
        status_permiso();
        break;

    case 'delete_usuario':
        delete_usuario();
        break;

    case 'crear_chat':
        crear_chat();
        break;

    case 'responder_chat':
        responder_chat();
        break;

    case 'capacidad_servicio':
        capacidad_servicio();
        break;

    case 'capacidad_servicio2':
        capacidad_servicio2();
        break;

    case 'enviar_contestacion':
        enviar_contestacion();
        break;

    case 'eliminar_usuario':
        eliminar_usuario();
        break;

    case 'agregar_contacto':
        agregar_contacto();
        break;

    case 'set_status_prospecto':
        set_status_prospecto();
        break;

    case 'agregar_calendario':
        agregar_calendario();
        break;

    case 'editar_calendario':
        editar_calendario();
        break;

    case 'check_exist_prospecto':
        check_exist_prospecto();
        break;

    case 'get_cliente':
        get_cliente();
        break;

    case 'nuevo_propecto_servicio':
        nuevo_propecto_servicio();
        break;

    case 'servicio_status':
        servicio_status();
        break;

    default:

        print false;
}

    function agregar_cliente(){
        $nuevo_nombre = $_POST['nuevo_nombre'];
        $nuevo_telefono = $_POST['nuevo_telefono'];

        $ob = new Modelo();
        $ob->agregar_cliente($nuevo_nombre,$nuevo_telefono);
    }

    function editar_cliente(){
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $id = $_POST['id'];

        $ob = new Modelo();
        $ob->editar_cliente($nombre,$telefono,$id);
    }

    function eliminar_cliente(){
        $id = $_POST['id'];

        $ob = new Modelo();
        $ob->eliminar_cliente($id);
    }

    function editar_propecto(){
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $telefono_celular = $_POST['telefono_celular'];
        $email = $_POST['email'];
        $estado_civil = $_POST['estado_civil'];
        $estado = $_POST['estado'];
        $ciudad = $_POST['ciudad'];
        $colonia = $_POST['colonia'];
        $calle = $_POST['calle'];
        $no_exterior = $_POST['no_exterior'];
        $ine = $_POST['ine'];
        $rfc = $_POST['rfc'];
        $curp = $_POST['curp'];
        $id_prospecto = $_POST['id_prospecto'];

        $ob = new Modelo();
        $ob->editar_propecto($nombre,$apellidos,$telefono_celular,$email,$estado_civil,$estado,$ciudad,$colonia,$calle,$no_exterior,$ine,$rfc,$curp,$id_prospecto);
    }

    function agregar_operacion(){
        $operacion               = $_POST['operacion'];
        $id_prospecto            = $_POST['id_prospecto'];

        $compraventa_vendedor = $_POST['compraventa_vendedor'];
        $compraventa_comprador = $_POST['compraventa_comprador'];
        $compraventa_monto = $_POST['compraventa_monto'];
        $compraventa_descripcion = $_POST['compraventa_descripcion'];
        $compraventa_requiere = $_POST['compraventa_requiere'];
        $compraventa_reserva = $_POST['compraventa_reserva'];

        $permutantes_permutantes = $_POST['permutantes_permutantes'];
        $permutantes_monto = $_POST['permutantes_monto'];
        $permutantes_descripcion = $_POST['permutantes_descripcion'];
        $permutantes_requiere = $_POST['permutantes_requiere'];

        $donacion_donante = $_POST['donacion_donante'];
        $donacion_donatario = $_POST['donacion_donatario'];
        $donacion_descripcion = $_POST['donacion_descripcion'];

        $testamento_testador = $_POST['testamento_testador'];
        $testamento_testigos = $_POST['testamento_testigos'];

        $poder_poderdante = $_POST['poder_poderdante'];
        $poder_apoderado = $_POST['poder_apoderado'];
        $poder_tipo = $_POST['poder_tipo'];

        $constitucion_compareciente = $_POST['constitucion_compareciente'];
        $constitucion_sociedad = $_POST['constitucion_sociedad'];
        $constitucion_tipo = $_POST['constitucion_tipo'];

        $actas_socios = $_POST['actas_socios'];
        $actas_sociedad = $_POST['actas_sociedad'];
        $actas_tipo = $_POST['actas_tipo'];

        $donacion_requiere = $_POST['donacion_requiere'];
        $donacion_reserva = $_POST['donacion_reserva'];


        $ob = new Modelo();
        $ob->agregar_operacion($operacion,$id_prospecto,$compraventa_vendedor,$compraventa_comprador,$compraventa_monto,$compraventa_descripcion,$permutantes_permutantes,$permutantes_monto,$permutantes_descripcion,$donacion_donante,$donacion_donatario,$donacion_descripcion,$testamento_testador,$testamento_testigos,$poder_poderdante,$poder_apoderado,$constitucion_compareciente,$constitucion_sociedad,$constitucion_tipo,$actas_socios,$actas_sociedad,$actas_tipo,$compraventa_requiere,$compraventa_reserva,$permutantes_requiere,$donacion_requiere,$donacion_reserva,$poder_tipo);
    }

    function get_agenda(){

        $id = $_POST['id'];

        $ob = new Modelo();
        $ob->get_agenda($id);
    }

    function login_admin(){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $ob = new Modelo();
        $ob->login_admin($username,$password);
    }

    // function save_header_footer(){

    //  $header = $_POST['header'];
    //  $footer = $_POST['footer'];

    //  $ob = new Modelo();
    //  $ob->save_header_footer($header,$footer);
    // }

    function prospect_add_service(){
        $id_servicio  = $_POST['id_servicio'];
        $id_prospecto = $_POST['id_prospecto'];
        $code_name    = $_POST['code_name'];

        $ob = new Modelo();
        $ob->prospect_add_service($id_servicio,$id_prospecto,$code_name);
    }

    function prospect_add_service_to_list(){
        $id_servicio_code = $_POST['id_servicio_code'];
        $id_prospecto     = $_POST['id_prospecto'];
        $id_servicio      = $_POST['id_servicio'];

        $ob = new Modelo();
        $ob->prospect_add_service_to_list($id_servicio_code,$id_prospecto,$id_servicio);
    }
    
    function cliente_add_service(){
        $id_servicio = $_POST['id_servicio'];
        $id_cliente = $_POST['id_cliente'];

        $ob = new Modelo();
        $ob->cliente_add_service($id_servicio,$id_cliente);
    }

    function enviar_correo(){
        $para        = $_POST['para'];
        $cc          = $_POST['cc'];
        $bcc         = $_POST['bcc'];
        $titulo      = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        $ob = new Modelo();
        $ob->enviar_correo($para,$cc,$bcc,$titulo,$descripcion);
    }

    function get_correo_enviado(){
        $id = $_POST['id'];

        $ob = new Modelo();
        $ob->get_correo_enviado($id);
    }

    function login(){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $ob = new Modelo();
        $ob->login($username,$password);
    }

    function get_codigo_postal(){
        $cp  = $_POST['cp'];

        $ob = new Modelo();
        $ob->get_codigo_postal($cp);
    }

    function status_recibo_dashboard(){
        $id          = $_POST['id'];
        $status      = $_POST['status'];
        $metodo_pago = $_POST['metodo_pago'];

        $ob = new Modelo();
        $ob->status_recibo_dashboard($id,$status,$metodo_pago);
    }

    function eliminar_servicio(){
        $id = $_POST['id'];

        $ob = new Modelo();
        $ob->eliminar_servicio($id);
    }

    function get_data_whatsapp(){
        $id = $_POST['id'];
        $pdf = $_POST['pdf'];
        $email = $_POST['email'];
        $id_prospecto = $_POST['id_prospecto'];
        $whatsapp = $_POST['whatsapp'];
        $url = $_POST['url'];

        $ob = new Modelo();
        $ob->get_data_whatsapp($id,$pdf,$email,$id_prospecto,$whatsapp,$url);
    }

    function delete_brief(){
        $id_prospecto = $_POST['id_prospecto'];

        $ob = new Modelo();
        $ob->delete_brief($id_prospecto);
    }
    
    function delete_cliente(){
        $id_cliente = $_POST['id_cliente'];

        $ob = new Modelo();
        $ob->delete_cliente($id_cliente);
    }

    function prospect_add_contact(){
        $nombre_contacto    = $_POST['nombre_contacto'];
        $puesto_contacto    = $_POST['puesto_contacto'];
        $correo_contacto    = $_POST['correo_contacto'];
        $telefono_contacto  = $_POST['telefono_contacto'];
        $extencion_contacto = $_POST['extencion_contacto'];
        $id                 = $_POST['id'];

        $ob = new Modelo();
        $ob->prospect_add_contact($nombre_contacto,$puesto_contacto,$correo_contacto,$telefono_contacto,$id,$extencion_contacto);
    }

    function get_hora_fin(){
        // if(isset($_POST['hora_inicio'])){
        //     $hora_inicio = $_POST['hora_inicio'];
            
        //     list($hora, $minutos) = explode(':', $hora_inicio);
        //     $hora = intval($hora);
        //     $minutos = intval($minutos);

        //     $opciones = '';
        //     for ($i = 1; $i < 24; $i++) {
        //         $hora2 = ($hora + $i) % 24;
        //         $hora2Formatted = sprintf("%02d:%02d", $hora2, $minutos);
        //         $opciones .= "<option value='$hora2Formatted'>$hora2Formatted</option>";
        //     }
        //     echo $opciones;
        // }

        // Obtener la hora seleccionada del primer campo de tiempo
        if(isset($_POST['hora_inicio'])){
            $hora_inicio = $_POST['hora_inicio'];
            
            // Separar la hora y los minutos
            list($hora, $minutos) = explode(':', $hora_inicio);
            $hora = intval($hora);
            $minutos = intval($minutos);

            // Construir opciones de hora para el segundo campo de tiempo
            $opciones = '';
            $interval = 30; // Intervalo en minutos
            $time = mktime($hora, $minutos);

            for ($i = 1; $i <= 4; $i++) { // Cambia el límite del bucle para generar 2 horas en intervalos de media hora
                $time += $interval * 60; // Sumar el intervalo en segundos
                $hora2Formatted = date('H:i', $time); // Formatear la hora
                $opciones .= "<option value='$hora2Formatted'>$hora2Formatted</option>";
            }

            echo $opciones;
        }

    }

    function get_hora_fin_page(){
        $rfc_facturacion        = $_POST['rfc_facturacion'];
        $nombre_facturacion     = $_POST['nombre_facturacion'];
        $domicilio_facturacion  = $_POST['domicilio_facturacion'];
        $cp_facturacion         = $_POST['cp_facturacion'];
        $poblacion_facturacion  = $_POST['poblacion_facturacion'];
        $telefono_facturacion   = $_POST['telefono_facturacion'];
        $correo_facturacion     = $_POST['correo_facturacion'];
        $metodopago_facturacion = $_POST['metodopago_facturacion'];
        $cfdi_facturacion       = $_POST['cfdi_facturacion'];
        $id                     = $_POST['id'];

        $ob = new Modelo();
        $ob->get_hora_fin_page($rfc_facturacion,$nombre_facturacion,$domicilio_facturacion,$cp_facturacion,$poblacion_facturacion,$telefono_facturacion,$correo_facturacion,$metodopago_facturacion,$cfdi_facturacion,$id);
    }

    function prospect_add_adicional(){
        $id_prospecto   = $_POST['id_prospecto'];
        $dato_adicional = $_POST['dato_adicional'];
        $fecha          = $_POST['fecha'];
        $hora           = $_POST['hora'];       

        $ob = new Modelo();
        $ob->prospect_add_adicional($id_prospecto,$dato_adicional,$fecha,$hora);
    }

    function cargarDatosJkanban(){
        $tipo = $_POST['tipo'];
        
        $ob = new Modelo();
        $ob->cargarDatosJkanban($tipo);
    }

    function actualizar_status(){
        $id     = $_POST['id'];
        $status = $_POST['status'];
        
        $ob = new Modelo();
        $ob->actualizar_status($id,$status);
    }

    function client_add_contact(){
        $nombre_contacto = $_POST['nombre_contacto'];
        $puesto_contacto = $_POST['puesto_contacto'];
        $correo_contacto = $_POST['correo_contacto'];
        $telefono_contacto = $_POST['telefono_contacto'];
        $id = $_POST['id'];

        $ob = new Modelo();
        $ob->client_add_contact($nombre_contacto,$puesto_contacto,$correo_contacto,$telefono_contacto,$id);
    }

    function client_add_facturacion(){
        $rfc_facturacion = $_POST['rfc_facturacion'];
        $nombre_facturacion = $_POST['nombre_facturacion'];
        $domicilio_facturacion = $_POST['domicilio_facturacion'];
        $cp_facturacion = $_POST['cp_facturacion'];
        $poblacion_facturacion = $_POST['poblacion_facturacion'];
        $telefono_facturacion = $_POST['telefono_facturacion'];
        $correo_facturacion = $_POST['correo_facturacion'];
        $metodopago_facturacion = $_POST['metodopago_facturacion'];
        $cfdi_facturacion = $_POST['cfdi_facturacion'];
        $id = $_POST['id'];

        $ob = new Modelo();
        $ob->client_add_facturacion($rfc_facturacion,$nombre_facturacion,$domicilio_facturacion,$cp_facturacion,$poblacion_facturacion,$telefono_facturacion,$correo_facturacion,$metodopago_facturacion,$cfdi_facturacion,$id);
    }

    function client_add_adicional(){
        $id_cliente = $_POST['id_cliente'];
        $dato_adicional = $_POST['dato_adicional'];

        $ob = new Modelo();
        $ob->client_add_adicional($id_cliente,$dato_adicional);
    }

    function delete_propecto_contacto(){
        $id_prospecto = $_POST['id_prospecto'];
        $id           = $_POST['id'];

        $ob = new Modelo();
        $ob->delete_propecto_contacto($id_prospecto,$id);
    }

    function status_calendario(){
        $id     = $_POST['id'];
        $status = $_POST['status'];
        $nota = $_POST['nota'];

        $ob = new Modelo();
        $ob->status_calendario($id,$status,$nota);
    }

    function delete_propecto_adicional(){
        $id_prospecto = $_POST['id_prospecto'];
        $id           = $_POST['id'];

        $ob = new Modelo();
        $ob->delete_propecto_adicional($id_prospecto,$id);
    }

    function delete_cliente_contacto(){
        $id_cliente = $_POST['id_cliente'];
        $id = $_POST['id'];

        $ob = new Modelo();
        $ob->delete_cliente_contacto($id_cliente,$id);
    }

    function delete_cliente_facturacion(){
        $id_cliente = $_POST['id_cliente'];
        $id = $_POST['id'];

        $ob = new Modelo();
        $ob->delete_cliente_facturacion($id_cliente,$id);
    }

    function get_calendario_info(){
        $id = $_POST['id'];

        $ob = new Modelo();
        $ob->get_calendario_info($id);
    }
    
    function guardar_prospecto_servicio(){
        $descripcion = $_POST['descripcion'];
        $id_servicio = $_POST['id_servicio'];
        $unidad_medida_servicio = $_POST['unidad_medida_servicio'];
        $precio_servicio        = $_POST['precio_servicio'];
        $cantidad_servicio      = $_POST['cantidad_servicio'];

        $ob = new Modelo();
        $ob->guardar_prospecto_servicio($descripcion,$id_servicio,$unidad_medida_servicio,$precio_servicio,$cantidad_servicio);
    }

    function get_description_service(){
        $id_servicio = $_POST['id_servicio'];

        $ob = new Modelo();
        $ob->get_description_service($id_servicio);
    }

    function get_description_service_update(){
        $id_servicio = $_POST['id_servicio'];

        $ob = new Modelo();
        $ob->get_description_service_update($id_servicio);
    }

    function get_description_service_update_otro(){
        $id_servicio = $_POST['id_servicio'];

        $ob = new Modelo();
        $ob->get_description_service_update_otro($id_servicio);
    }

    function agregar_servicio(){
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $no_doctor = $_POST['no_doctor'];
        $no_spa = $_POST['no_spa'];
        $tipo = $_POST['tipo'];

        $ob = new Modelo();
        $ob->agregar_servicio($nombre,$descripcion,$no_doctor,$no_spa,$tipo);
    }

    function editar_servicio(){
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $id = $_POST['id'];

        $ob = new Modelo();
        $ob->editar_servicio($nombre,$descripcion,$id);
    }

    function agregar_plantilla(){
        $titulo    = $_POST['titulo'];
        $plantilla = $_POST['plantilla'];

        $ob = new Modelo();
        $ob->agregar_plantilla($titulo,$plantilla);
    }

    function get_plantilla_correo(){
        $id = $_POST['id'];

        $ob = new Modelo();
        $ob->get_plantilla_correo($id);
    }

    function get_contratos_recibo_pago(){
        $id_prospecto = $_POST['id_prospecto'];
        $id_servicio  = $_POST['id_servicio'];

        $ob = new Modelo();
        $ob->get_contratos_recibo_pago($id_prospecto,$id_servicio);
    }

    function get_plantilla_correo_set(){
        $id = $_POST['id'];

        $ob = new Modelo();
        $ob->get_plantilla_correo_set($id);
    }

    function guardar_equipo(){
        $equipo = $_POST['equipo'];
        $modelo = $_POST['modelo'];
        $placas = $_POST['placas'];
        $descripcion      = $_POST['descripcion'];
        $accesorios       = $_POST['accesorios'];
        $equipo_seguridad = $_POST['equipo_seguridad'];
        $herramientas     = $_POST['herramientas'];

        $ob = new Modelo();
        $ob->guardar_equipo($equipo,$modelo,$placas,$descripcion,$accesorios,$equipo_seguridad,$herramientas);
    }

    function guardar_cuadrilla(){
        $cuadrilla = $_POST['cuadrilla'];

        $ob = new Modelo();
        $ob->guardar_cuadrilla($cuadrilla);
    }

    function agregar_cuadrilla_prospecto(){
        $cuadrilla_selected = $_POST['cuadrilla_selected'];
        $cantidad           = $_POST['cantidad'];
        $id_prospecto       = $_POST['id_prospecto'];
        $id_servicio        = $_POST['id_servicio'];

        $ob = new Modelo();
        $ob->agregar_cuadrilla_prospecto($cuadrilla_selected,$cantidad,$id_prospecto,$id_servicio);
    }

    function agregar_equipo_prospecto(){
        $equipo_selected = $_POST['equipo_selected'];
        $id_prospecto    = $_POST['id_prospecto'];
        $id_servicio     = $_POST['id_servicio'];

        $ob = new Modelo();
        $ob->agregar_equipo_prospecto($equipo_selected,$id_prospecto,$id_servicio);
    }

    function delete_equipo_prospecto(){
        $id_prospecto = $_POST['id_prospecto'];
        $id_servicio  = $_POST['id_servicio'];
        $id = $_POST['id'];

        $ob = new Modelo();
        $ob->delete_equipo_prospecto($id_prospecto,$id,$id_servicio);
    }

    function delete_cuadrilla_prospecto(){
        $id_prospecto = $_POST['id_prospecto'];
        $id_servicio  = $_POST['id_servicio'];
        $id = $_POST['id'];

        $ob = new Modelo();
        $ob->delete_cuadrilla_prospecto($id_prospecto,$id,$id_servicio);
    }

    function delete_servicio_code(){
        $id_prospecto = $_POST['id_prospecto'];
        $id           = $_POST['id'];

        $ob = new Modelo();
        $ob->delete_servicio_code($id_prospecto,$id);
    }

    function equipo_details(){
        $id_equipo = $_POST['id_equipo'];

        $ob = new Modelo();
        $ob->equipo_details($id_equipo);
    }

    function cuadrilla_details(){
        $id_cuadrilla = $_POST['id_cuadrilla'];

        $ob = new Modelo();
        $ob->cuadrilla_details($id_cuadrilla);
    }

    function editar_equipo(){
        $equipo = $_POST['equipo'];
        $modelo = $_POST['modelo'];
        $placas = $_POST['placas'];
        $descripcion      = $_POST['descripcion'];
        $accesorios       = $_POST['accesorios'];
        $equipo_seguridad = $_POST['equipo_seguridad'];
        $herramientas     = $_POST['herramientas'];
        $id_equipo        = $_POST['id_equipo'];

        $ob = new Modelo();
        $ob->editar_equipo($equipo,$modelo,$placas,$descripcion,$accesorios,$equipo_seguridad,$herramientas,$id_equipo);
    }

    function delete_equipo(){
        $id_delete = $_POST['id_delete'];

        $ob = new Modelo();
        $ob->delete_equipo($id_delete);
    }

    function editar_cuadrilla(){
        $cuadrilla    = $_POST['cuadrilla'];
        $id_cuadrilla = $_POST['id_cuadrilla'];

        $ob = new Modelo();
        $ob->editar_cuadrilla($cuadrilla,$id_cuadrilla);
    }

    function delete_cuadrilla(){
        $id_delete = $_POST['id_delete'];

        $ob = new Modelo();
        $ob->delete_cuadrilla($id_delete);
    }

    function agregar_nota_prospecto(){
        $id_servicio  = $_POST['id_servicio'];
        $id_prospecto = $_POST['id_prospecto'];
        $condiciones  = $_POST['condiciones'];

        $ob = new Modelo();
        $ob->agregar_nota_prospecto($id_servicio,$id_prospecto,$condiciones);
    }

    function agregar_nota_prospecto_lista(){
        $id_servicio  = $_POST['id_servicio'];
        $id_prospecto = $_POST['id_prospecto'];
        $id_lista     = $_POST['id_lista'];

        $ob = new Modelo();
        $ob->agregar_nota_prospecto_lista($id_servicio,$id_prospecto,$id_lista);
    }
    
    function eliminar_notas_lista_prospect(){
        $id_nota = $_POST['id_nota'];

        $ob = new Modelo();
        $ob->eliminar_notas_lista_prospect($id_nota);
    }

    function nota_details(){
        $id_nota = $_POST['id_nota'];

        $ob = new Modelo();
        $ob->nota_details($id_nota);
    }

    function editar_nota(){
        $nota    = $_POST['nota'];
        $id_nota = $_POST['id_nota'];

        $ob = new Modelo();
        $ob->editar_nota($nota,$id_nota);
    }

    function crear_orden_compra_prospecto(){
        $id_servicio  = $_POST['id_servicio'];
        $id_prospecto = $_POST['id_prospecto'];
        $codigo       = $_POST['codigo'];
        $fecha        = $_POST['fecha'];

        $ob = new Modelo();
        $ob->crear_orden_compra_prospecto($id_servicio,$id_prospecto,$codigo,$fecha);
    }

    function crear_orden_servicio_prospecto(){
        $id_servicio  = $_POST['id_servicio'];
        $id_prospecto = $_POST['id_prospecto'];
        $codigo       = $_POST['codigo'];
        $fecha        = $_POST['fecha'];
        $pago_orden   = $_POST['pago_orden'];
        $porcentaje_2exhibiciones_1    = $_POST['porcentaje_2exhibiciones_1'];
        $porcentaje_2exhibiciones_2    = $_POST['porcentaje_2exhibiciones_2'];
        $porcentaje_3exhibiciones_1    = $_POST['porcentaje_3exhibiciones_1'];
        $porcentaje_3exhibiciones_2    = $_POST['porcentaje_3exhibiciones_2'];
        $porcentaje_3exhibiciones_dias = $_POST['porcentaje_3exhibiciones_dias'];
        $porcentaje_3exhibiciones_3    = $_POST['porcentaje_3exhibiciones_3'];
        $pago_mensual_dias             = $_POST['pago_mensual_dias'];
        $descuento           = $_POST['descuento'];
        $check_descuento_iva = $_POST['check_descuento_iva'];
        $tiempoMaximo        = $_POST['tiempoMaximo'];

        $ob = new Modelo();
        $ob->crear_orden_servicio_prospecto($id_servicio,$id_prospecto,$codigo,$fecha,$pago_orden,$porcentaje_2exhibiciones_1,$porcentaje_2exhibiciones_2,$porcentaje_3exhibiciones_1,$porcentaje_3exhibiciones_2,$porcentaje_3exhibiciones_dias,$porcentaje_3exhibiciones_3,$pago_mensual_dias,$descuento,$check_descuento_iva,$tiempoMaximo);
    }

    function crear_recibo_prospecto2(){
        $id_servicio         = $_POST['id_servicio'];
        $id_prospecto        = $_POST['id_prospecto'];
        $codigo              = $_POST['codigo'];
        $fecha               = $_POST['fecha'];
        $descuento           = $_POST['descuento'];
        $check_descuento_iva = $_POST['check_descuento_iva'];
        $metodo_pago         = $_POST['metodo_pago'];
        $id_contrato         = $_POST['id_contrato'];
        $fecha_contrato      = $_POST['fecha_contrato'];
        $porcentaje_contrato = $_POST['porcentaje_contrato'];

        $ob = new Modelo();
        $ob->crear_recibo_prospecto2($id_servicio,$id_prospecto,$codigo,$fecha,$descuento,$check_descuento_iva,$metodo_pago,$id_contrato,$fecha_contrato,$porcentaje_contrato);
    }

    function guardar_nota(){
        $nota = $_POST['nota'];

        $ob = new Modelo();
        $ob->guardar_nota($nota);
    }

    function agregar_lista(){
        $lista_nombre = $_POST['lista_nombre'];

        $ob = new Modelo();
        $ob->agregar_lista($lista_nombre);
    }

    function nota_gral_details(){
        $id_nota = $_POST['id_nota'];

        $ob = new Modelo();
        $ob->nota_gral_details($id_nota);
    }

    function editar_nota_gral(){
        $id   = $_POST['id'];
        $nota = $_POST['nota'];

        $ob = new Modelo();
        $ob->editar_nota_gral($id,$nota);
    }

    function eliminar_nota(){
        $id_delete = $_POST['id_delete'];

        $ob = new Modelo();
        $ob->eliminar_nota($id_delete);
    }

    function eliminar_prospecto_nota(){
        $id_delete = $_POST['id_delete'];

        $ob = new Modelo();
        $ob->eliminar_prospecto_nota($id_delete);
    }

    function cambiar_status_service(){
        $status       = $_POST['status'];
        $id_prospecto = $_POST['id_prospecto'];
        $id_servicio  = $_POST['id_servicio'];

        $ob = new Modelo();
        $ob->cambiar_status_service($status,$id_prospecto,$id_servicio);
    }

    function prospect_objetivo_servicio(){
        $objetivo_servicio = $_POST['objetivo_servicio'];
        $id_prospecto      = $_POST['id_prospecto'];
        $id_servicio       = $_POST['id_servicio'];
        $type              = $_POST['type'];

        $ob = new Modelo();
        $ob->prospect_objetivo_servicio($objetivo_servicio,$id_prospecto,$id_servicio,$type);
    }

    function guardar_equipo_proteccion(){
        $equipo = $_POST['equipo'];

        $ob = new Modelo();
        $ob->guardar_equipo_proteccion($equipo);
    }

    function equipo_proteccion_details(){
        $id_equipo = $_POST['id_equipo'];

        $ob = new Modelo();
        $ob->equipo_proteccion_details($id_equipo);
    }

    function editar_equipo_proteccion(){
        $equipo = $_POST['equipo'];
        $id_equipo = $_POST['id_equipo'];

        $ob = new Modelo();
        $ob->editar_equipo_proteccion($equipo,$id_equipo);
    }

    function delete_equipo_proteccion(){
        $id_delete = $_POST['id_delete'];

        $ob = new Modelo();
        $ob->delete_equipo_proteccion($id_delete);
    }

    function agregar_equipo_proteccion_prospecto(){
        $id_equipo    = $_POST['id_equipo'];
        $id_prospecto = $_POST['id_prospecto'];
        $id_servicio  = $_POST['id_servicio'];

        $ob = new Modelo();
        $ob->agregar_equipo_proteccion_prospecto($id_equipo,$id_prospecto,$id_servicio);
    }

    function delete_equipo_proteccion_prospecto(){
        $id           = $_POST['id'];
        $id_prospecto = $_POST['id_prospecto'];
        $id_servicio  = $_POST['id_servicio'];

        $ob = new Modelo();
        $ob->delete_equipo_proteccion_prospecto($id_prospecto,$id,$id_servicio);
    }

    function prospecto_retencion(){
        $nuevo            = $_POST['nuevo'];
        $iva              = $_POST['iva'];
        $descuento        = $_POST['descuento'];
        $descuento_status = $_POST['descuento_status'];
        $iva_status       = $_POST['iva_status'];
        $id_servicio      = $_POST['id_servicio'];
        $id_prospecto     = $_POST['id_prospecto'];     

        $ob = new Modelo();
        $ob->prospecto_retencion($nuevo,$iva,$descuento,$descuento_status,$iva_status,$id_servicio,$id_prospecto);
    }

    function set_facturacion_choose(){
        $id_facturacion = $_POST['id_facturacion'];
        $id_prospecto   = $_POST['id_prospecto'];
        $status         = $_POST['status'];

        $ob = new Modelo();
        $ob->set_facturacion_choose($id_facturacion,$id_prospecto,$status);
    }

    function guardar_usuario(){
        $nombre    = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email     = $_POST['email'];
        $password  = $_POST['password'];
        $puesto    = $_POST['puesto'];
        $telefono  = $_POST['telefono'];        

        $ob = new Modelo();
        $ob->guardar_usuario($nombre,$apellidos,$email,$password,$puesto,$telefono);
    }

    function users_details(){
        $id_user  = $_POST['id_user'];      

        $ob = new Modelo();
        $ob->users_details($id_user);
    }

    // function editar_usuario(){
    //  $nombre     = $_POST['nombre'];
    //  $apellidos  = $_POST['apellidos'];
    //  $email      = $_POST['email'];
    //  $password   = $_POST['password'];
    //  $puesto     = $_POST['puesto'];
    //  $telefono   = $_POST['telefono'];
    //  $id_usuario = $_POST['id_usuario']; 

    //  $ob = new Modelo();
    //  $ob->editar_usuario($nombre,$apellidos,$email,$password,$puesto,$telefono,$id_usuario);
    // }

    function delete_user(){
        $id_delete  = $_POST['id_delete'];      

        $ob = new Modelo();
        $ob->delete_user($id_delete);
    }

    function prospect_add_service_to_list_other(){
        $nombre_servicio        = $_POST['nombre_servicio'];
        $descripcion_servicio   = $_POST['descripcion_servicio'];
        $unidad_medida_servicio = $_POST['unidad_medida_servicio'];
        $precio_servicio        = $_POST['precio_servicio'];
        $id_servicio            = $_POST['id_servicio'];
        $id_prospecto           = $_POST['id_prospecto'];

        $ob = new Modelo();
        $ob->prospect_add_service_to_list_other($nombre_servicio,$descripcion_servicio,$unidad_medida_servicio,$precio_servicio,$id_servicio,$id_prospecto);
    }

    function guardar_prospecto_servicio_otro(){
        $nombre_servicio        = $_POST['nombre_servicio'];
        $descripcion_servicio   = $_POST['descripcion_servicio'];
        $unidad_medida_servicio = $_POST['unidad_medida_servicio'];
        $precio_servicio        = $_POST['precio_servicio'];
        $id_servicio            = $_POST['id_servicio'];

        $ob = new Modelo();
        $ob->guardar_prospecto_servicio_otro($nombre_servicio,$descripcion_servicio,$unidad_medida_servicio,$precio_servicio,$id_servicio);
    }

    function guardar_lista(){
        $lista = $_POST['lista'];

        $ob = new Modelo();
        $ob->guardar_lista($lista);
    }

    function guardar_servicio(){
        $servicio    = $_POST['servicio'];
        $precio      = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $tiempo      = $_POST['tiempo'];

        $ob = new Modelo();
        $ob->guardar_servicio($servicio,$precio,$descripcion,$tiempo);
    }

    function service_details(){
        $id_service = $_POST['id_service'];

        $ob = new Modelo();
        $ob->service_details($id_service);
    }

    function delete_service(){
        $id_delete = $_POST['id_delete'];

        $ob = new Modelo();
        $ob->delete_service($id_delete);
    }

    function list_details(){
        $id_lista = $_POST['id_lista'];
        $lista    = $_POST['lista'];

        $ob = new Modelo();
        $ob->list_details($id_lista,$lista);
    }

    function lista_notas_details(){
        $id_lista = $_POST['id_lista'];
        $lista    = $_POST['lista'];

        $ob = new Modelo();
        $ob->lista_notas_details($id_lista,$lista);
    }

    function agregar_servicion_opcion(){
        $opcion   = $_POST['opcion'];
        $id_lista = $_POST['id_lista'];

        $ob = new Modelo();
        $ob->agregar_servicion_opcion($opcion,$id_lista);
    }
    
    function agregar_nota_lista(){
        $nota     = $_POST['nota'];
        $id_lista = $_POST['id_lista'];

        $ob = new Modelo();
        $ob->agregar_nota_lista($nota,$id_lista);
    }
    
    function delete_list(){
        $id_delete = $_POST['id_delete'];

        $ob = new Modelo();
        $ob->delete_list($id_delete);
    }
    
    function delete_list_notas(){
        $id_delete = $_POST['id_delete'];

        $ob = new Modelo();
        $ob->delete_list_notas($id_delete);
    }

    function send_mail_contact(){
        $nombre    = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email     = $_POST['email'];
        $telefono  = $_POST['telefono'];
        $detalles  = $_POST['detalles'];
        $empresa   = $_POST['empresa'];
        $publicidad = $_POST['publicidad'];

        $ob = new Modelo();
        $ob->send_mail_contact($nombre,$apellidos,$email,$telefono,$detalles,$empresa,$publicidad);
    }

    function eliminar_cotizacion(){
        $id = $_POST['id'];

        $ob = new Modelo();
        $ob->eliminar_cotizacion($id);
    }

    function eliminar_compraventa(){
        $id_delete = $_POST['id_delete'];

        $ob = new Modelo();
        $ob->eliminar_compraventa($id_delete);
    }
    
    function eliminar_ordenservicio(){
        $id_delete = $_POST['id_delete'];

        $ob = new Modelo();
        $ob->eliminar_ordenservicio($id_delete);
    }

    function mail_cotizacion_update(){
        $id_cotizacion = $_POST['id_cotizacion'];
        $mensaje       = $_POST['mensaje'];

        $ob = new Modelo();
        $ob->mail_cotizacion_update($id_cotizacion,$mensaje);
    }
    
    function mail_orden_servicio_update(){
        $id_orden_servicio = $_POST['id_orden_servicio'];
        $mensaje       = $_POST['mensaje'];

        $ob = new Modelo();
        $ob->mail_orden_servicio_update($id_orden_servicio,$mensaje);
    }

    function asignar_prospecto(){
        $id_admin = $_POST['id_admin'];
        $id_prospecto = $_POST['id_prospecto'];

        $ob = new Modelo();
        $ob->asignar_prospecto($id_admin,$id_prospecto);
    }

    function recibos_pago_folios(){
        $cliente = $_POST['cliente'];

        $ob = new Modelo();
        $ob->recibos_pago_folios($cliente);
    }

    function crear_recibo_pago(){
        $id_cliente = $_POST['id_cliente'];
        $id_servicio = $_POST['id_servicio'];
        $codigo = $_POST['codigo'];
        $monto = $_POST['monto'];

        $ob = new Modelo();
        $ob->crear_recibo_pago($id_cliente,$id_servicio,$codigo,$monto);
    }

    // function agregar_horario_servicio(){
    //  $id_recibo = $_POST['id_recibo'];
    //  $status = $_POST['status'];

    //  $ob = new Modelo();
    //  $ob->agregar_horario_servicio($id_recibo,$status);
    // }
    
    function eliminar_recibo_pago(){
        $id_delete = $_POST['id_delete'];

        $ob = new Modelo();
        $ob->eliminar_recibo_pago($id_delete);
    }
    
    function get_capacidad_servicio(){
        $id_servicio = $_POST['id_servicio'];

        $ob = new Modelo();
        $ob->get_capacidad_servicio($id_servicio);
    }

    function get_horarios_servicio(){
        $id_servicio  = $_POST['id_servicio'];
        $fecha  = $_POST['fecha'];
        
        $ob = new Modelo();
        $ob->get_horarios_servicio($id_servicio,$fecha);
    }

    // PAGINA
    function save_new_post(){

        $titulo          = $_POST['titulo'];
        $descripcion     = $_POST['descripcion'];
        $titulo_seo      = $_POST['titulo_seo'];
        $descripcion_seo = $_POST['descripcion_seo'];
        $claves_seo      = $_POST['claves_seo'];
        $lista_categorias = $_POST['lista_categorias'];

        $ob = new Modelo();
        $ob->save_new_post($titulo,$descripcion,$titulo_seo,$descripcion_seo,$claves_seo,$lista_categorias);
    }

    function edit_post(){

        $titulo          = $_POST['titulo'];
        $descripcion     = $_POST['descripcion'];
        $titulo_seo      = $_POST['titulo_seo'];
        $descripcion_seo = $_POST['descripcion_seo'];
        $claves_seo      = $_POST['claves_seo'];
        $lista_categorias = $_POST['lista_categorias'];
        $id               = $_POST['id'];

        $ob = new Modelo();
        $ob->edit_post($titulo,$descripcion,$titulo_seo,$descripcion_seo,$claves_seo,$lista_categorias,$id);
    }

    function save_header_footer(){

        $header = $_POST['header'];
        $footer = $_POST['footer'];

        $ob = new Modelo();
        $ob->save_header_footer($header,$footer);
    }

    function delete_post(){

        $id = $_POST['id'];
        $pagina = $_POST['pagina'];

        $ob = new Modelo();
        $ob->delete_post($id,$pagina);
    }

    // PAGINA WEB
    
    function enviar_cotizacion(){
        
        $nombre               = $_POST['nombre'];
        $correo               = $_POST['correo'];
        $telefono             = $_POST['telefono'];
        $empresa              = $_POST['empresa'];
        $descripcion          = $_POST['descripcion'];
        $servicio             = $_POST['servicio'];
        $g_recaptcha_response = $_POST['g_recaptcha_response'];

        $ob = new Modelo();
        $ob->enviar_cotizacion($nombre,$correo,$telefono,$empresa,$descripcion,$servicio,$g_recaptcha_response);
    }

    // BODY
    function call_list_blog(){
        $param = $_POST['param'];

        $ob = new Modelo();
        $ob->call_list_blog($param);
    }

    function call_list_blog_more(){
        $ids = $_POST['ids'];

        $ob = new Modelo();
        $ob->call_list_blog_more($ids);
    }

    function eliminar_calendario(){
        $id = $_POST['id'];
    
        $ob = new Modelo();
        $ob->eliminar_calendario($id);
    }

    function prospect_add_service_write(){
        $nombre       = $_POST['nombre'];
        // $precio       = $_POST['precio'];
        $descripcion  = $_POST['descripcion'];
        $id_prospecto = $_POST['id_prospecto'];

        $ob = new Modelo();
        $ob->prospect_add_service_write($nombre,$descripcion,$id_prospecto);
    }

    function agregar_horario_servicio(){
        $id_servicio          = $_POST['id_servicio'];
        $hora_inicio      = $_POST['hora_inicio'];
        $hora_fin = $_POST['hora_fin'];

        $ob = new Modelo();
        $ob->agregar_horario_servicio($id_servicio,$hora_inicio,$hora_fin);
    }

    function editar_horario(){
        $hora_inicio = $_POST['hora_inicio'];
        $hora_fin = $_POST['hora_fin'];
        $dia_inicio = $_POST['dia_inicio'];
        $dia_cierre = $_POST['dia_cierre'];

        $ob = new Modelo();
        $ob->editar_horario($hora_inicio,$hora_fin,$dia_inicio,$dia_cierre);
    }

    function crear_historial_recibos_pago(){
        $ob = new Modelo();
        $ob->crear_historial_recibos_pago();    
    }

    function agregar_nota_adicional(){
        $nota = $_POST['nota'];

        $ob = new Modelo();
        $ob->agregar_nota_adicional($nota);
    }

    function agregar_permiso_usuario(){
        $permiso_id  = $_POST['permiso_id'];
        $id_permiso = $_POST['id_permiso'];

        $ob = new Modelo();
        $ob->agregar_permiso_usuario($permiso_id,$id_permiso);
    }

    function get_permisos_usuaro(){
        $id_usuario = $_POST['id_usuario'];

        $ob = new Modelo();
        $ob->get_permisos_usuaro($id_usuario);
    }

    function status_condicion(){
        $status = $_POST['status'];
        $id     = $_POST['id'];

        $ob = new Modelo();
        $ob->status_condicion($status,$id);
    }

    function agregar_usuario(){
        $nombre           = $_POST['nombre'];
        $usuario          = $_POST['usuario'];
        $password         = $_POST['password'];
        // $confirm_password = $_POST['confirm_password'];
        // $telefono         = $_POST['telefono'];
        // $correo           = $_POST['correo'];
        // $direccion        = $_POST['direccion'];

        $ob = new Modelo();
        $ob->agregar_usuario($nombre,$usuario,$password);
    }

    function editar_usuario(){
        $nombre           = $_POST['nombre'];
        $usuario          = $_POST['usuario'];
        $password         = $_POST['password'];
        $id         = $_POST['id'];
        // $confirm_password = $_POST['confirm_password'];
        // $telefono         = $_POST['telefono'];
        // $correo           = $_POST['correo'];
        // $direccion        = $_POST['direccion'];

        $ob = new Modelo();
        $ob->editar_usuario($nombre,$usuario,$password,$id);
    }

    function usuario_permisos(){
        $id_usuario = $_POST['id_usuario'];

        $ob = new Modelo();
        $ob->usuario_permisos($id_usuario);
    }

    function usuario_info(){
        $id_usuario = $_POST['id_usuario'];

        $ob = new Modelo();
        $ob->usuario_info($id_usuario);
    }

    function status_permiso(){
        $status  = $_POST['status'];
        // $permiso = $_POST['permiso'];
        $id      = $_POST['id'];

        $ob = new Modelo();
        $ob->status_permiso($status,$id);
    }

    function delete_usuario(){
        $id_eliminar = $_POST['id_eliminar'];

        $ob = new Modelo();
        $ob->delete_usuario($id_eliminar);
    }

    function crear_chat(){

        $ob = new Modelo();
        $ob->crear_chat();
    }

    function responder_chat(){
        $chat_usuario = $_POST['chat_usuario'];

        $ob = new Modelo();
        $ob->responder_chat($chat_usuario);
    }

    function capacidad_servicio(){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $capacidad = $_POST['capacidad'];

        $ob = new Modelo();
        $ob->capacidad_servicio($id,$nombre,$capacidad);
    }

    function capacidad_servicio2(){
        $id = $_POST['id'];
        $capacidad = $_POST['capacidad'];
        $campo = $_POST['campo'];

        $ob = new Modelo();
        $ob->capacidad_servicio2($id,$capacidad,$campo);
    }

    function enviar_contestacion(){
        $mensaje_contestacion = $_POST['mensaje_contestacion'];
        $whatsapp_id          = $_POST['whatsapp_id'];

        $ob = new Modelo();
        $ob->enviar_contestacion($mensaje_contestacion,$whatsapp_id);
    }

    function eliminar_usuario(){
        $id = $_POST['id'];

        $ob = new Modelo();
        $ob->eliminar_usuario($id);
    }

    function agregar_contacto(){
        $nuevo_contacto = $_POST['nuevo_contacto'];
        $nombre_contacto = $_POST['nombre_contacto'];

        $ob = new Modelo();
        $ob->agregar_contacto($nuevo_contacto,$nombre_contacto);
    }

    function set_status_prospecto(){
        $ids    = $_POST['ids'];
        $status = $_POST['status'];

        $ob = new Modelo();
        $ob->set_status_prospecto($ids,$status);
    }

    function agregar_calendario(){
        $id_cliente = $_POST['id_cliente'];
        $telefono = $_POST['telefono'];
        $id_servicio = $_POST['id_servicio'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $hora_inicio = $_POST['hora_inicio'];
        $fecha_fin = "";
        $hora_fin = $_POST['hora_fin'];
        $descripcion = "";
        $clienteNuevo = $_POST['clienteNuevo'];
        $nuevo_nombre = $_POST['nuevo_nombre'];
        $nuevo_telefono = $_POST['nuevo_telefono'];

        $ob = new Modelo();
        $ob->agregar_calendario($id_cliente,$telefono,$id_servicio,$fecha_inicio,$hora_inicio,$fecha_fin,$hora_fin,$descripcion,$clienteNuevo,$nuevo_nombre,$nuevo_telefono);
    }

    function editar_calendario(){
        $id_cliente = $_POST['id_cliente'];
        $telefono = "";
        $id_servicio = $_POST['id_servicio'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $hora_inicio = $_POST['hora_inicio'];
        $fecha_fin = "";
        $hora_fin = $_POST['hora_fin'];
        $descripcion = "";
        $clienteNuevo = "";
        $nuevo_nombre = $_POST['nuevo_nombre'];
        $nuevo_telefono = $_POST['nuevo_telefono'];
        $id_agenda_editar = $_POST['id_agenda_editar'];

        $ob = new Modelo();
        $ob->editar_calendario($id_cliente,$telefono,$id_servicio,$fecha_inicio,$hora_inicio,$fecha_fin,$hora_fin,$descripcion,$clienteNuevo,$nuevo_nombre,$nuevo_telefono,$id_agenda_editar);
    }

    function check_exist_prospecto(){
        $id_prospecto_buscar = $_POST['id_prospecto_buscar'];

        $ob = new Modelo();
        $ob->check_exist_prospecto($id_prospecto_buscar);
    }

    function get_cliente(){
        $id_cliente = $_POST['id_cliente'];

        $ob = new Modelo();
        $ob->get_cliente($id_cliente);
    }

    function nuevo_propecto_servicio(){

        $nombre              = $_POST['nombre'];
        $apellidos           = $_POST['apellidos'];
        $empresa             = $_POST['empresa'];
        $direccion           = $_POST['direccion'];
        $puesto              = $_POST['puesto'];
        $email               = $_POST['email'];
        $telefono_oficina    = $_POST['telefono_oficina'];
        $telefono_celular    = $_POST['telefono_celular'];
        $mensaje             = $_POST['mensaje'];
        $extencion           = $_POST['extencion'];
        $id_servicio_buscar2 = $_POST['id_servicio_buscar2'];

        $ob = new Modelo();
        $ob->nuevo_propecto_servicio($nombre,$apellidos,$empresa,$direccion,$puesto,$email,$telefono_oficina,$telefono_celular,$mensaje,$extencion,$id_servicio_buscar2);
    }

    function servicio_status(){
        $id_servicio = $_POST['id_servicio'];
        $status      = $_POST['status'];

        $ob = new Modelo();
        $ob->servicio_status($id_servicio,$status);
    }

?>