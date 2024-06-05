<?php
// Obtener la hora seleccionada del primer campo de tiempo
if(isset($_POST['hora1'])){
    $hora1 = $_POST['hora1'];
    
    // Separar la hora y los minutos
    list($hora, $minutos) = explode(':', $hora1);
    $hora = intval($hora);
    $minutos = intval($minutos);

    // Construir opciones de hora para el segundo campo de tiempo
    $opciones = '';
    for ($i = 1; $i < 24; $i++) {
        $hora2 = ($hora + $i) % 24; // Sumar una hora a la hora seleccionada
        $hora2Formatted = sprintf("%02d:%02d", $hora2, $minutos); // Formatear la hora
        $opciones .= "<option value='$hora2Formatted'>$hora2Formatted</option>";
    }
    echo $opciones;
}
?>
