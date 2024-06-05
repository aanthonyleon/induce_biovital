<?php 
	include("../../configuration/backend/helpers/session_check.php");
	include('../src/css.php');
	include("../../configuration/backend/private/conexion.php");
	include("../../configuration/backend/helpers/formats-date.php");
include("../../configuration/backend/helpers/permisos.php");

	$rget_agenda   = $mysqli->query("SELECT * FROM agenda WHERE id_usuario=$BIOVITAL_ID");
?>
	<title>Agenda | Induce Marketing</title>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" data-sidebar="on" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled sidebar-enabled">

		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					
					<!--begin::Header-->
					<?php include('../menu/header.php');; ?>
					<!--end::Header-->

					<!--begin::Main-->
					<div class="d-flex flex-column flex-column-fluid">
						<!--begin::toolbar-->
						<div class="toolbar" id="kt_toolbar">
							<div class="container-xxl d-flex flex-stack flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex flex-column align-items-start justify-content-center flex-wrap me-1">
									<!--begin::Title-->
									<h3 class="text-gray-900 fw-bold my-1">Agenda</h3>
									<!--end::Title-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-line bg-transparent text-muted fw-semibold p-0 my-1 fs-7">
										<li class="breadcrumb-item">
											<a href="#" class="text-muted text-hover-primary">Inicio</a>
										</li>
										<li class="breadcrumb-item text-gray-900">Agenda</li>
									</ul>
									<!--end::Breadcrumb-->
								</div>
								<!--end::Info-->
								
								<!--begin::Nav-->
								<?php // include('../menu/menu-inside.php'); ?>
								<!--end::Nav-->

							</div>
						</div>
						<!--end::toolbar-->
						<!--begin::Content-->
						<div class="content fs-6 d-flex flex-column-fluid" id="kt_content">
							<!--begin::Container-->
							<div class="container-xxl">

							   <table class="table table-bordered mt-3" id="tabla-agenda">
								  <thead>
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">Cliente</th>
								      <th scope="col">Servicio</th>
								      <th scope="col">Fecha y hora</th>
								      <th scope="col">Estatus</th>
								      <th scope="col">Nota</th>
								      <th scope="col">Fecha de registro</th>
								    </tr>
								  </thead>
								  <tbody>
								  	<?php 
								  		$cont = 0;
								  		if ($rget_agenda) {
								  			if (mysqli_num_rows($rget_agenda)>0) {
								            	while($array = $rget_agenda->fetch_object()) {
									                $agenda_id            = $array->id;
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
									                $cont++;

									                $agenda_nombre = 'No se encontró';
									                $rget_cliente = $mysqli->query("SELECT nombre FROM clientes WHERE id=$agenda_id_cliente");
									                if ($rget_cliente && $rget_cliente->num_rows > 0) {
									                    $cliente = $rget_cliente->fetch_object();
									                    $agenda_nombre = $cliente->nombre;
									                }

									                $agenda_servicio_nombre = 'No se encontró';
									                $agenda_servicio_descripcion = 'No se encontró';
									                $rget_servicio = $mysqli->query("SELECT nombre, descripcion FROM servicios WHERE id=$agenda_id_servicio");
									                if ($rget_servicio && $rget_servicio->num_rows > 0) {
									                    $servicio = $rget_servicio->fetch_object();
									                    $agenda_servicio_nombre = $servicio->nombre;
									                    $agenda_servicio_descripcion = $servicio->descripcion;
									                }

									                if (empty($agenda_estatus)) {
									                    $agenda_estatus = 'pendiente';
									                }
						            ?>
								    <tr>
								      <th scope="row"><?php echo $cont; ?></th>
								      <td><?php echo $agenda_nombre; ?></td>
								      <td><?php echo $agenda_servicio_nombre; ?></td>
								      <td>
								      	<?php echo fecha($agenda_fecha_inicio); ?> 
								      	<br>
								      	a las <?php echo $agenda_hora_inicio; ?> a <?php echo $agenda_hora_fin; ?> horas
								      </td>
								      <td><?php echo $agenda_estatus; ?></td>
								      <td><?php echo $agenda_nota; ?></td>
								      <td><?php echo $agenda_date_register; ?></td>
								    </tr>
								    <?php 
								    			}
								    		}else{
								    			echo "<h3>No hay registros de agenda.</h3>";
								    		}
								    	}
								    ?>
								  </tbody>
							   </table>

							</div>
							<!--end::Container-->
						</div>
						<!--end::Content-->
					</div>
					<!--end::Main-->

					<!--begin::Footer-->
					<?php include('../menu/footer.php'); ?>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->

			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->

		<!--begin::Mega Menu-->
		<?php include('../menu/menu.php'); ?>
		<!--end::Mega Menu-->

		<!--end::Drawers-->
		<!--end::Main-->
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-duotone ki-arrow-up">
				<span class="path1"></span>
				<span class="path2"></span>
			</i>
		</div>
		<!--end::Scrolltop-->

		<!--begin::Javascript-->
		<?php include('../src/js.php'); ?>
		<!--end::Custom Javascript-->

		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
