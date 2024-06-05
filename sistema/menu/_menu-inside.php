	<?php 
		include("../../configuration/backend/helpers/permisos.php");
		$curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
	    $active = array();

	    if ($curPageName === "calendario.php") {
	      $active[0] = "active";
	    }else if ($curPageName === "servicios.php") {
	      $active[1] = "active";
	    }else if ($curPageName === "clientes.php" || $curPageName === "detalle-cliente.php") {
	      $active[2] = "active";
	    }else if ($curPageName === "usuarios.php" || $curPageName === "detalles-usuario.php") {
	      $active[3] = "active";
	    }else if ($curPageName === "horarios.php") {
	      $active[4] = "active";
	    }else if ($curPageName === "mi-resumen.php") {
	      $active[5] = "active";
	    }else if ($curPageName === "agenda.php") {
	      $active[6] = "active";
	    }

	    $fecha_actual = date('Y-m-d');
	?>

	<div class="d-flex align-items-center flex-nowrap text-nowrap overflow-auto py-1">

		<?php 
			if ($permiso_Agregar_calendario=='true' || $permiso_Editar_calendario=='true' || $permiso_Consultar_calendario=='true' || $permiso_Eliminar_calendario=='true') {
		?>
		<a href="./pages/calendario.php" class="btn btn-active-accent <?php echo $active[0]; ?> fw-bold">Calendario</a>
		<?php } ?>

		<?php 
			if ($permiso_Agregar_servicio=='true' || $permiso_Editar_servicio=='true' || $permiso_Consultar_servicio=='true' || $permiso_Eliminar_servicio=='true') {
		?>
		<a href="./pages/servicios.php" class="btn btn-active-accent <?php echo $active[1]; ?> fw-bold ms-3">Servicios</a>
		<?php } ?>

		<?php 
			if ($permiso_Agregar_cliente=='true' || $permiso_Editar_cliente=='true' || $permiso_Consultar_cliente=='true' || $permiso_Eliminar_cliente=='true') {
		?>
		<a href="./pages/clientes.php" class="btn btn-active-accent <?php echo $active[2]; ?> fw-bold ms-3">Clientes</a>
		<?php } ?>

		<?php 
			if ($permiso_Agregar_usuario=='true' || $permiso_Editar_usuario=='true' || $permiso_Consultar_usuario=='true' || $permiso_Eliminar_usuario=='true') {
		?>
		<a href="./pages/usuarios.php" class="btn btn-active-accent <?php echo $active[3]; ?> fw-bold ms-3">Usuarios</a>
		<?php } ?>

		<?php // if ($permiso_Consultar_calendario=='true') { ?>
		<!-- <a href="./pages/agenda.php" class="btn btn-active-accent <?php // echo $active[6]; ?> fw-bold ms-3">Agenda</a> -->
		<?php // } ?>

<?php if ($BIOVITAL_ACCESS === "true") { ?>
		<a href="./pages/horarios.php" class="btn btn-active-accent <?php echo $active[4]; ?> fw-bold ms-3">Horarios</a>
		<?php } ?>
		
		<a href="./pages/mi-resumen.php?fecha=<?php echo $fecha_actual; ?>" class="btn btn-active-accent <?php echo $active[5]; ?> fw-bold ms-3">Mi resumen del día</a>
	</div>