<?php 
  include("../../configuration/backend/helpers/session_check.php");

    $permiso_Agregar_servicio     = "false";
    $permiso_Editar_servicio      = "false";
    $permiso_Consultar_servicio   = "false";
    $permiso_Eliminar_servicio    = "false";

    $permiso_Agregar_cliente      = "false";
    $permiso_Editar_cliente       = "false";
    $permiso_Consultar_cliente    = "false";
    $permiso_Eliminar_cliente     = "false";

    $permiso_Agregar_calendario   = "false";
    $permiso_Editar_calendario    = "false";
    $permiso_Consultar_calendario = "false";
    $permiso_Eliminar_calendario  = "false";

    $permiso_Agregar_usuario      = "false";
    $permiso_Editar_usuario       = "false";
    $permiso_Consultar_usuario    = "false";
    $permiso_Eliminar_usuario     = "false";

    $rget_permisos_usuario = $mysqli->query("SELECT * FROM usuarios_permisos WHERE id_usuario=$BIOVITAL_ID");
    if ($rget_permisos_usuario)
    {
      if (mysqli_num_rows($rget_permisos_usuario)>0) {
        while($array = $rget_permisos_usuario->fetch_object())
        {
          $usuario_permiso_permiso = $array->permiso;
          $usuario_permiso_status  = $array->status;

          if (empty($usuario_permiso_status)) {
            $usuario_permiso_status = "false";
          }

          if($usuario_permiso_permiso == "Agregar servicio"){ $permiso_Agregar_servicio = $usuario_permiso_status; }
          if($usuario_permiso_permiso == "Editar servicio"){ $permiso_Editar_servicio = $usuario_permiso_status; }
          if($usuario_permiso_permiso == "Consultar servicio"){ $permiso_Consultar_servicio = $usuario_permiso_status; }
          if($usuario_permiso_permiso == "Eliminar servicio"){ $permiso_Eliminar_servicio = $usuario_permiso_status; }
          if($usuario_permiso_permiso == "Agregar cliente"){ $permiso_Agregar_cliente = $usuario_permiso_status; }
          if($usuario_permiso_permiso == "Editar cliente"){ $permiso_Editar_cliente = $usuario_permiso_status; }
          if($usuario_permiso_permiso == "Consultar cliente"){ $permiso_Consultar_cliente = $usuario_permiso_status; }
          if($usuario_permiso_permiso == "Eliminar cliente"){ $permiso_Eliminar_cliente = $usuario_permiso_status; }
          if($usuario_permiso_permiso == "Agregar calendario"){ $permiso_Agregar_calendario = $usuario_permiso_status; }
          if($usuario_permiso_permiso == "Editar calendario"){ $permiso_Editar_calendario = $usuario_permiso_status; }
          if($usuario_permiso_permiso == "Consultar calendario"){ $permiso_Consultar_calendario = $usuario_permiso_status; }
          if($usuario_permiso_permiso == "Eliminar calendario"){ $permiso_Eliminar_calendario = $usuario_permiso_status; }
          if($usuario_permiso_permiso == "Agregar usuario"){ $permiso_Agregar_usuario = $usuario_permiso_status; }
          if($usuario_permiso_permiso == "Editar usuario"){ $permiso_Editar_usuario = $usuario_permiso_status; }
          if($usuario_permiso_permiso == "Consultar usuario"){ $permiso_Consultar_usuario = $usuario_permiso_status; }
          if($usuario_permiso_permiso == "Eliminar usuario"){ $permiso_Eliminar_usuario = $usuario_permiso_status; }
        }
      }
    }

    if ($BIOVITAL_ACCESS === "true") {
      $permiso_Agregar_servicio     = "true";
      $permiso_Editar_servicio      = "true";
      $permiso_Consultar_servicio   = "true";
      $permiso_Eliminar_servicio    = "true";

      $permiso_Agregar_cliente      = "true";
      $permiso_Editar_cliente       = "true";
      $permiso_Consultar_cliente    = "true";
      $permiso_Eliminar_cliente     = "true";

      $permiso_Agregar_calendario   = "true";
      $permiso_Editar_calendario    = "true";
      $permiso_Consultar_calendario = "true";
      $permiso_Eliminar_calendario  = "true";

      $permiso_Agregar_usuario      = "true";
      $permiso_Editar_usuario       = "true";
      $permiso_Consultar_usuario    = "true";
      $permiso_Eliminar_usuario     = "true";
    }
?>