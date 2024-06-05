<?php 
	include("../../configuration/backend/helpers/session_check.php");
	include('../src/css.php');
	include("../../configuration/backend/private/conexion.php");
	include("../../configuration/backend/helpers/formats-date.php");
include("../../configuration/backend/helpers/permisos.php");

	// if ($BIOVITAL_ACCESS=='true') {
		$rservicios = $mysqli->query("SELECT * FROM servicios ORDER BY nombre ASC");
	// }else{
	// 	$rservicios = $mysqli->query("SELECT * FROM servicios WHERE id_usuario=$BIOVITAL_ID ORDER BY nombre ASC");
	// }
	
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
									<h3 class="text-gray-900 fw-bold my-1">Servicios</h3>
									<!--end::Title-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-line bg-transparent text-muted fw-semibold p-0 my-1 fs-7">
										<li class="breadcrumb-item">
											<a href="#" class="text-muted text-hover-primary">Inicio</a>
										</li>
										<li class="breadcrumb-item text-gray-900">Servicios</li>
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

								<?php if ($permiso_Agregar_servicio=='true') { ?>
								<div class="d-grid gap-2 d-md-flex justify-content-md-end">
								  <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#modalServicios">Agregar servicio</button>
								</div>
								<?php } ?>

								<table class="table table-bordered mt-3" id="tabla-servicios">
								  <thead>
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">Nombre</th>
								      <th scope="col">Descripción</th>
								      <th scope="col">Tipo</th>
								      <th scope="col">Capacidad</th>
								      <!-- <th scope="col">Registrado por</th> -->
								      <th scope="col">Fecha de registro</th>
								      <th scope="col">Acciones</th>
								    </tr>
								  </thead>
								  <tbody>
								  	<?php 
								  		$cont = 0;
										if ($rservicios)
										{
											while($array = $rservicios->fetch_object())
											{
												$id     = $array->id;
												$id_usuario     = $array->id_usuario;
												$nombre = $array->nombre;
												$descripcion = $array->descripcion;
												$no_doctor = $array->no_doctor;
												$no_spa = $array->no_spa;
												$tipo = $array->tipo;
												$date_register = $array->date_register;
												$cont++;

												$lista_capacidad = '';
												$rservicio_capacidad = $mysqli->query("SELECT * FROM servicios_ocupacion WHERE id_servicio=$id");
												if ($rservicio_capacidad)
												{
													if (mysqli_num_rows($rservicio_capacidad)>0) {
														while($array = $rservicio_capacidad->fetch_object())
														{
															$capacidad_id = $array->id;
															$capacidad_id_servicio = $array->id_servicio;
															$capacidad_nombre = $array->nombre;
															$capacidad_capacidad = $array->capacidad;
															$capacidad_date_register = $array->date_register;

															if (empty($lista_capacidad)) {
																$lista_capacidad.= $capacidad_nombre
																                 . '<br>Capacidad: ' . $capacidad_capacidad;
															}else{
																$lista_capacidad.= '<br><br>'
																                 . $capacidad_nombre
																                 . '<br>Capacidad: ' . $capacidad_capacidad;
															}
														}
													}
												}

												$rget_usuario = $mysqli->query("SELECT * FROM usuarios WHERE id=$id_usuario");
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
						            ?>
								    <tr>
								      <th scope="row"><?php echo $cont; ?></th>
								      <td><?php echo $nombre; ?></td>
								      <td><?php echo $descripcion; ?></td>
								      <td><?php echo $tipo; ?></td>
								      <td>
								      	<?php 
								      		if ($tipo=='Doctor') {
								      			echo $no_doctor;
								      		}else {
								      			echo $no_spa;
								      		}
								      	?>
								      </td>
								      <!-- <td><?php // echo $usuario_nombre; ?></td> -->
								      <!-- <td onclick="get_capacidad_servicio('<?php // echo $id; ?>')"><?php // echo $lista_capacidad; ?></td> -->
<td><?php echo formatearFecha($date_register); ?></td>
								      <td>
								      	<div class="d-grid gap-2 d-md-flex justify-content-md-end">

								      	  <!-- <button class="btn btn-warning me-md-2" type="button" onclick="get_capacidad_servicio('<?php // echo $id; ?>')">
										  	<i class="bi bi-border-all"></i>
										  </button> -->

										  <?php if ($permiso_Editar_servicio=='true') { ?>
										  <button class="btn btn-primary me-md-2" type="button" onclick="set_editar('<?php echo $id; ?>','<?php echo $nombre; ?>','<?php echo $descripcion; ?>')">
										  	<i class="bi bi-pencil"></i>
										  </button>
										  <?php } ?>

										  <?php if ($permiso_Eliminar_servicio=='true') { ?>
										  <button class="btn btn-danger" type="button" onclick="set_eliminar('<?php echo $id; ?>')">
										  	<i class="bi bi-trash"></i>
										  </button>
										  <?php } ?>
										  
										</div>
								      </td>
								    </tr>
								    <?php 
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

		<!-- MODALS -->
		<!-- Modal AGREGAR -->
		<div class="modal fade" id="modalServicios" tabindex="-1" aria-labelledby="modalServiciosLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalServiciosLabel">Agregar servicio</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<label>Nombre</label>
		      	<input type="text" id="servicio_nombre" class="form-control" placeholder="Escribe aquí...">

		      	<label class="mt-5">Descripción (opcional)</label>
		      	<input type="text" id="servicio_descripcion" class="form-control" placeholder="Escribe aquí...">

		      	<label class="mt-5">Tipo</label>
		      	<select class="form-control" id="tipo" onchange="get_tipo()">
		      		<option value="" disabled selected>Selcciona una opción</option>
		      		<option value="Doctor">Doctor</option>
		      		<option value="SPA">SPA</option>
		      	</select>

		      	<div id="show-type-doctor" style="display: none;">
	      			<label class="mt-5"># Doctor</label>
	      			<input type="number" id="no_doctor" class="form-control" placeholder="Escribe aquí..." value="0">
	      		</div>

	      		<div id="show-type-spa" style="display: none;">
	      			<label class="mt-5"># SPA</label>
	      			<input type="number" id="no_spa" class="form-control" placeholder="Escribe aquí..." value="0">
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
		        <button type="button" class="btn btn-primary" onclick="agregar_servicio()">Agregar</button>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- Modal Editar -->
		<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalEditarLabel">Editar servicio</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<input type="hidden" id="editar_id" value="">

		      	<label>Nombre</label>
		      	<input type="text" id="editar_nombre" class="form-control" placeholder="Escribe aquí...">

		      	<label class="mt-3">Descripción</label>
		      	<input type="text" id="editar_descripcion" class="form-control" placeholder="Escribe aquí...">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
		        <button type="button" class="btn btn-warning" onclick="editar_servicio()">Editar</button>
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

			function get_tipo(){
				if (document.getElementById('tipo').value=='Doctor') {
					document.getElementById('show-type-doctor').style.display = 'block';
					document.getElementById('show-type-spa').style.display    = 'none';
				}else{
					document.getElementById('show-type-doctor').style.display = 'none';
					document.getElementById('show-type-spa').style.display    = 'block';
				}
			}
		</script>

		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>