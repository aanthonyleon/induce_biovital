<?php 
	include("../../configuration/backend/helpers/session_check.php");
	include('../src/css.php');
	include("../../configuration/backend/private/conexion.php");
	include("../../configuration/backend/helpers/formats-date.php");
include("../../configuration/backend/helpers/permisos.php");

	if ($BIOVITAL_ACCESS=='true') {
		$rusuarios = $mysqli->query("SELECT * FROM usuarios WHERE type!='admin' ORDER BY nombre ASC");
	}else{
		$rusuarios = $mysqli->query("SELECT * FROM usuarios WHERE id_usuario=$BIOVITAL_ID ORDER BY nombre ASC");
	}

	
?>
	<title>Usuarios | Induce Marketing</title>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" data-sidebar="on" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">

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
									<h3 class="text-gray-900 fw-bold my-1">Usuarios</h3>
									<!--end::Title-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-line bg-transparent text-muted fw-semibold p-0 my-1 fs-7">
										<li class="breadcrumb-item">
											<a href="#" class="text-muted text-hover-primary">Inicio</a>
										</li>
										<li class="breadcrumb-item text-gray-900">Usuarios</li>
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

								<?php if ($permiso_Agregar_usuario=='true') { ?>
								<div class="d-grid gap-2 d-md-flex justify-content-md-end">
								  <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#modalAgregar">Agregar usuario</button>
								</div>
								<?php } ?>

								<table class="table table-bordered mt-3" id="tabla-usuarios">
								  <thead>
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">Nombre</th>
								      <th scope="col">Usuario</th>
								      <th scope="col">Password</th>
								      <th scope="col">Registrado por</th>
								      <th scope="col">Fecha de registro</th>
								      <th scope="col">Acciones</th>
								    </tr>
								  </thead>
								  <tbody>
								  	<?php 
								  		$cont = 0;
										if ($rusuarios)
										{
											while($array = $rusuarios->fetch_object())
											{
												$id            = $array->id;
												$id_usuario    = $array->id_usuario;
												$nombre        = $array->nombre;
												$usuario       = $array->usuario;
												$password      = $array->password;
												$date_register = $array->date_register;
												$cont++;

												$lista_permisos = '';
												$rget_permisos = $mysqli->query("SELECT * FROM usuarios_permisos WHERE id_usuario=$id");
												if ($rget_permisos)
												{
													if (mysqli_num_rows($rget_permisos)>0) {
														while($array = $rget_permisos->fetch_object())
														{
															$permiso = $array->permiso;

															if (empty($lista_permisos)) {
																$lista_permisos = '<i class="bi bi-check-lg text-success"></i> ' . $permiso;
															}else{
																$lista_permisos.= '<br><i class="bi bi-check-lg text-success"></i> ' . $permiso;
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
								      <td><?php echo $usuario; ?></td>
								      <td><?php echo $password; ?></td>
								      <td><?php echo $usuario_nombre; ?></td>
<td><?php echo formatearFecha($date_register); ?></td>
								      <td>
								      	<div class="d-grid gap-2 d-md-flex justify-content-md-center">

								      	  <?php if ($permiso_Consultar_usuario=='true') { ?>
										  <a class="btn btn-warning me-md-2" href="./pages/detalles-usuario.php?id=<?php echo $id; ?>">
										  	<i class="bi bi-eye"></i>
										  </a>
										  <?php } ?>

										  <?php if ($permiso_Editar_usuario=='true') { ?>
										  <button class="btn btn-primary me-md-2" type="button" onclick="set_editar('<?php echo $id; ?>','<?php echo $nombre; ?>','<?php echo $usuario; ?>','<?php echo $password; ?>')">
										  	<i class="bi bi-pencil"></i>
										  </button>
										  <?php } ?>

										  <?php if ($permiso_Eliminar_usuario=='true') { ?>
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
		<div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalAgregar" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalAgregar">Agregar usuario</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<label>Nombre</label>
		      	<input type="text" id="nombre" class="form-control" placeholder="Escribe aquí...">

		      	<label class="mt-3">Usuario</label>
		      	<input type="text" id="usuario" class="form-control" placeholder="Escribe aquí...">

		      	<label class="mt-3">Contraseña</label>
		      	<input type="text" id="password" class="form-control" placeholder="Escribe aquí...">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
		        <button type="button" class="btn btn-primary" onclick="agregar_usuario()">Agregar</button>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- Modal Editar -->
		<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalEditarLabel">Editar usuario</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<input type="hidden" id="editar_id" value="">

		      	<label>Nombre</label>
		      	<input type="text" id="editar_nombre" class="form-control" placeholder="Escribe aquí...">

		      	<label class="mt-5">Usuario</label>
		      	<input type="text" id="editar_usuario" class="form-control" placeholder="Escribe aquí...">

		      	<label class="mt-5">Password</label>
		      	<input type="text" id="editar_password" class="form-control" placeholder="Escribe aquí...">

		      	<label class="mt-5">Permisos</label>
		      	<div id="results-permisos"></div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
		        <button type="button" class="btn btn-warning" onclick="editar_usuario()">Editar</button>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- Modal ELIMINAR -->
		<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalEliminarLabel">Eliminar usuario</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<input type="hidden" id="eliminar_id" value="">
		      	<h3>¿Seguro que deseas eliminar este usuario?</h3>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
		        <button type="button" class="btn btn-danger" onclick="eliminar_usuario()">Sí, eliminar</button>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- Modal CAPACIDAD -->
		<!-- <div class="modal fade" id="modalGetPermisos" tabindex="-1" aria-labelledby="modalGetPermisosLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalGetPermisosLabel">Permisos del usuario</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<div id="results-permisos"></div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
		      </div>
		    </div>
		  </div>
		</div> -->

		<!-- Modal PERMISOS -->
		<div class="modal fade" id="modalPermisos" tabindex="-1" aria-labelledby="modalPermisosLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalPermisosLabel">Agregar permiso</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<input type="hidden" id="permiso_id" value="">

		      	<label>Selecciona el permiso</label>
		      	<select class="form-control" id="id_permiso">
		      		<option value="" disabled selected>Selecciona el permiso</option>
		      		<option value="Calendario">Calendario</option>
		      		<option value="Servicios">Servicios</option>
		      		<option value="Clientes">Clientes</option>
		      		<option value="Usuarios">Usuarios</option>
		      	</select>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
		        <button type="button" class="btn btn-warning" onclick="agregar_permiso_usuario()">Agregar</button>
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
			function set_editar(id,nombre,usuario,password){
				document.getElementById('editar_id').value = id;
				document.getElementById('editar_nombre').value = nombre;
				document.getElementById('editar_usuario').value = usuario;
				document.getElementById('editar_password').value = password;
				open_modal('modalEditar');

				get_permisos_usuaro(id);
			}

			function set_eliminar(id){
				document.getElementById('eliminar_id').value = id;
				open_modal('modalEliminar');
			}

			function set_permiso(id){
				document.getElementById('permiso_id').value = id;
				open_modal('modalPermisos');
			}
		</script>

		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>