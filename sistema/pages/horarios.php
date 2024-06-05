<?php 
	include("../../configuration/backend/helpers/session_check.php");
	include('../src/css.php');
	include("../../configuration/backend/private/conexion.php");
	include("../../configuration/backend/helpers/formats-date.php");
include("../../configuration/backend/helpers/permisos.php");

	$rhorarios = $mysqli->query("SELECT * FROM horarios");
	$rservicios  = $mysqli->query("SELECT * FROM servicios ORDER BY nombre ASC");

	if ($rhorarios)
	{
		while($array = $rhorarios->fetch_object())
		{
			$id          = $array->id;
			$id_servicio = $array->id_servicio;
			$hora_inicio = $array->hora_inicio;
			$hora_fin    = $array->hora_fin;
			$dia_inicio  = $array->dia_inicio;
			$dia_cierre  = $array->dia_cierre;

			$rget_servicio = $mysqli->query("SELECT * FROM servicios WHERE id=$id_servicio");
			if ($rget_servicio)
			{
				if (mysqli_num_rows($rget_servicio)>0) {
					while($array = $rget_servicio->fetch_object())
					{
						$servicio_nombre = $array->nombre;
					}
				}else{
					$servicio_nombre = "No se encontro.";
				}
			}
		}
	}
?>
	<title>Calendario | Induce Marketing</title>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" data-sidebar="on" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled ">

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
									<h3 class="text-gray-900 fw-bold my-1">Horarios</h3>
									<!--end::Title-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-line bg-transparent text-muted fw-semibold p-0 my-1 fs-7">
										<li class="breadcrumb-item">
											<a href="#" class="text-muted text-hover-primary">Inicio</a>
										</li>
										<li class="breadcrumb-item text-gray-900">Horarios</li>
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

								<!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
								  <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#modalServicios">Agregar horario a servicio</button>
								</div> -->

								<table class="table table-bordered mt-3" id="tabla-servicios">
								  <thead>
								    <tr>
								      <th scope="col">#</th>
								      <!-- <th scope="col">Servicio</th> -->
								      <th scope="col">Hora de inicio</th>
								      <th scope="col">Hora de cierre</th>
								      <th scope="col">Día de inicio</th>
								      <th scope="col">Día de cierre</th>
								      <th>Acctiones</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <th scope="row">1</th>
								      <!-- <td><?php // echo $servicio_nombre; ?></td> -->
								      <td><?php echo $hora_inicio; ?></td>
								      <td><?php echo $hora_fin; ?></td>
								      <td><?php echo $dia_inicio; ?></td>
								      <td><?php echo $dia_cierre; ?></td>
								      <td>
								      	<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditar"><i class="bi bi-pencil"></i></button>
								      </td>
								    </tr>
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

		<!-- MODALS -->
		<!-- Modal AGREGAR -->
		<div class="modal fade" id="modalServicios" tabindex="-1" aria-labelledby="modalServiciosLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalServiciosLabel">Agregar horario a servicio</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<label class="fs-6 fw-semibold mb-2">Servicio</label>
				<!--end::Label-->
				<select class="form-control" data-control="select2" data-hide-search="true" id="id_servicio">
					<option value="" disabled selected>Selecciona una opción</option>
				<?php 
				if ($rservicios)
				{
					while($array = $rservicios->fetch_object())
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

		      	<label class="mt-5">Hora de inicio</label>
		      	<input type="time" id="hora_inicio" class="form-control" placeholder="Escribe aquí...">

		      	<label class="mt-5">Hora de fin</label>
		      	<input type="time" id="hora_fin" class="form-control" placeholder="Escribe aquí...">

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
		        <button type="button" class="btn btn-primary" onclick="agregar_horario_servicio()">Agregar</button>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- Modal Editar -->
		<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalEditarLabel">Editar horario</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<div class="row">
		      		<div class="col-6">
				      	<label class="">Hora de inicio</label>
				      	<input type="time" id="editar_hora_inicio" class="form-control" placeholder="Escribe aquí..." value="<?php echo $hora_inicio; ?>">
				    </div>

				    <div class="col-6">
				      	<label class="">Hora de fin</label>
				      	<input type="time" id="editar_hora_fin" class="form-control" placeholder="Escribe aquí..." value="<?php echo $hora_fin; ?>">
				    </div>

				    <div class="col-6 mt-4">
				      	<label class="">Día de inicio</label>
				      	<select id="editar_dia_inicio" class="form-control">
				      		<option value="" disabled>Selecciona un día</option>
				      		<option value="<?php echo $dia_inicio; ?>" selected><?php echo $dia_inicio; ?></option>
				      		<option value="Lunes">Lunes</option>
				      		<option value="Martes">Martes</option>
				      		<option value="Miércoles">Miércoles</option>
				      		<option value="Jueves">Jueves</option>
				      		<option value="Viernes">Viernes</option>
				      		<option value="Sábado">Sábado</option>
				      		<option value="Domingo">Domingo</option>
				      	</select>
				    </div>

				    <div class="col-6 mt-4">
				      	<label class="">Día de cierre</label>
				      	<select id="editar_dia_cierre" class="form-control">
				      		<option value="" disabled selected>Selecciona un día</option>
				      		<option value="<?php echo $dia_cierre; ?>" selected><?php echo $dia_cierre; ?></option>
				      		<option value="Lunes">Lunes</option>
				      		<option value="Martes">Martes</option>
				      		<option value="Miércoles">Miércoles</option>
				      		<option value="Jueves">Jueves</option>
				      		<option value="Viernes">Viernes</option>
				      		<option value="Sábado">Sábado</option>
				      		<option value="Domingo">Domingo</option>
				      	</select>
				    </div>
			     </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
		        <button type="button" class="btn btn-warning" onclick="editar_horario()">Editar</button>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- Modal ELIMINAR -->
		<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalEliminarLabel">Eliminar servicio</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<input type="hidden" id="eliminar_id" value="">
		      	<h3>¿Seguro que deseas eliminar este servicio?</h3>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
		        <button type="button" class="btn btn-danger" onclick="eliminar_servicio()">Sí, eliminar</button>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- Modal CAPACIDAD -->
		<div class="modal fade" id="modalGetCapacidad" tabindex="-1" aria-labelledby="modalGetCapacidadLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalGetCapacidadLabel">Capacidad del servicio</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<div id="results-capacidad"></div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- Modal CAPACIDAD -->
		<div class="modal fade" id="modalCapacidad" tabindex="-1" aria-labelledby="modalCapacidadLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalCapacidadLabel">Capacidad del servicio</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<input type="hidden" id="capacidad_id" value="">

		      	<label>Nombre</label>
		      	<input type="text" id="capacidad_nombre" class="form-control" placeholder="Escribe aquí...">

		      	<label class="mt-3">Capacidad</label>
		      	<input type="number" id="capacidad_capacidad" class="form-control" placeholder="Escribe aquí...">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
		        <button type="button" class="btn btn-warning" onclick="capacidad_servicio()">Agregar</button>
		      </div>
		    </div>
		  </div>
		</div>

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

		<script type="text/javascript">
			function set_editar(id,nombre,descripcion){
				document.getElementById('editar_id').value = id;
				document.getElementById('editar_nombre').value = nombre;
				document.getElementById('editar_descripcion').value = descripcion;
				open_modal('modalEditar');
			}

			function set_eliminar(id){
				document.getElementById('eliminar_id').value = id;
				open_modal('modalEliminar');
			}

			function set_capacidad(id){
				document.getElementById('capacidad_id').value = id;
				open_modal('modalCapacidad');
			}
		</script>

		<script>
	        $(document).ready(function() {
	            // Inicializa Select2 cuando el modal se muestra completamente
	            $('#modalServicios').on('shown.bs.modal', function () {
	                $('#id_servicio').select2({
	                    dropdownParent: $('#modalServicios')
	                });
	            });
	        });
	    </script>

		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>