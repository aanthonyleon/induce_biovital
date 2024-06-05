<?php
   //Reseteamos variables a 0.
   $nombre = $apellidos = $email = $telefono = $mensaje = $para = $subject = $headers = $msjCorreo = NULL;

   //if (isset($_POST['submit'])) {
      //Obtenemos valores input formulario
      $nombre    = $_POST['nombre'];
      $apellidos = $_POST['apellidos'];
      $email     = $_POST['email'];
      $telefono  = $_POST['telefono'];
      $mensaje   = $_POST['mensaje'];
      $para      = 'contacto@ambieza.com';
      $subject   = 'Mensaje enviado de pagina web';

      //Creamos cabecera.
      $headers = 'De:' . " " . $email . "\r\n";
      $headers .= "Content-type: text/html; charset=utf-8";

      //Componemos cuerpo correo.
      $msjCorreo = "Nombre: " . $nombre;
      $msjCorreo .= "\r\n";
      $msjCorreo .= "Apellidos: " . $apellidos;
      $msjCorreo .= "\r\n";
      $msjCorreo .= "Email: " . $email;
      $msjCorreo .= "\r\n";
      $msjCorreo .= "Telefono: " . $telefono;
      $msjCorreo .= "\r\n";
      $msjCorreo .= "Mensaje: " . $mensaje;
      $msjCorreo .= "\r\n";

    if (mail($para, $subject, $msjCorreo, $headers)) {
         echo "sent";
    } else {
        echo "Ocurrió un error al enviar el correo, intenta nuevamente.";
    }
  //}
?>
