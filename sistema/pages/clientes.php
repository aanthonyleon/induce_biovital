<?php 
	include("../../configuration/backend/helpers/session_check.php");
	include('../src/css.php');
	include("../../configuration/backend/private/conexion.php");
	include("../../configuration/backend/helpers/formats-date.php");
include("../../configuration/backend/helpers/permisos.php");

	if ($BIOVITAL_ACCESS=='true') {
		$rclientes = $mysqli->query("SELECT * FROM clientes ORDER BY nombre ASC");
	}else{
		$rclientes = $mysqli->query("SELECT * FROM clientes WHERE id_usuario=$BIOVITAL_ID ORDER BY nombre ASC");
	}
?>
	<title>Clientes | Induce Marketing</title>
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
									<h3 class="text-gray-900 fw-bold my-1">Clientes</h3>
									<!--end::Title-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-line bg-transparent text-muted fw-semibold p-0 my-1 fs-7">
										<li class="breadcrumb-item">
											<a href="#" class="text-muted text-hover-primary">Inicio</a>
										</li>
										<li class="breadcrumb-item text-gray-900">Clientes</li>
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

								<?php if ($permiso_Agregar_cliente === "true") { ?>
								<div class="d-grid gap-2 d-md-flex justify-content-md-end">
								  <button class="btn btn-primary me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#modalAgregar">Agregar cliente</button>
								</div>
								<?php } ?>

								<table class="table table-bordered mt-3" id="tabla-clientes">
								  <thead>
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">Nombre</th>
								      <th scope="col">Teléfono</th>
								      <th scope="col">Registrado por</th>
								      <th scope="col">Fecha de registro</th>
								      <th scope="col">Acciones</th>
								    </tr>
								  </thead>
								  <tbody>
								  	<?php 
								  		$cont = 0;
										if ($rclientes)
										{
											while($array = $rclientes->fetch_object())
											{
												$id            = $array->id;
												$id_usuario    = $array->id_usuario;
												$nombre        = $array->nombre;
												$telefono      = $array->telefono;
												$date_register = $array->date_register;
												$cont++;

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
								      <td><?php echo $telefono; ?></td>
								      <td><?php echo $usuario_nombre; ?></td>
<td><?php echo formatearFecha($date_register); ?></td>
								      <td>
								      	<div class="d-grid gap-2 d-md-flex justify-content-md-center">

								      	  <?php if ($permiso_Consultar_cliente === "true") { ?>
										  <a class="btn btn-success me-md-2" href="./pages/detalle-cliente.php?id=<?php echo $id; ?>">
										  	<i class="bi bi-eye"></i>
										  </a>
										  <?php } ?>

										  <?php if ($permiso_Editar_cliente === "true") { ?>
										  <button class="btn btn-primary me-md-2" type="button" onclick="set_editar('<?php echo $id; ?>','<?php echo $nombre; ?>','<?php echo $telefono; ?>')">
										  	<i class="bi bi-pencil"></i>
										  </button>
										  <?php } ?>

										  <?php if ($permiso_Eliminar_cliente === "true") { ?>
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
		        <h5 class="modal-title" id="modalAgregar">Agregar cliente</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<label>Nombre</label>
		      	<input type="text" id="nuevo_nombre" class="form-control" placeholder="Escribe aquí...">

		      	<label class="mt-3">Teléfono</label>
		      	<input type="text" id="nuevo_telefono" class="form-control" placeholder="Escribe aquí...">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
		        <button type="button" class="btn btn-primary" onclick="agregar_cliente()">Agregar</button>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- Modal Editar -->
		<div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalEditarLabel">Editar cliente</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<input type="hidden" id="editar_id" value="">

		      	<label>Nombre</label>
		      	<input type="text" id="editar_nombre" class="form-control" placeholder="Escribe aquí...">

		      	<label class="mt-3">Teléfono</label>
		      	<input type="text" id="editar_telefono" class="form-control" placeholder="Escribe aquí...">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
		        <button type="button" class="btn btn-warning" onclick="editar_cliente()">Editar</button>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- Modal ELIMINAR -->
		<div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalEliminarLabel">Eliminar cliente</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<input type="hidden" id="eliminar_id" value="">
		      	<h3>¿Seguro que deseas eliminar este cliente?</h3>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
		        <button type="button" class="btn btn-danger" onclick="eliminar_cliente()">Sí, eliminar</button>
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
			function set_editar(id,nombre,telefono){
				document.getElementById('editar_id').value = id;
				document.getElementById('editar_nombre').value = nombre;
				document.getElementById('editar_telefono').value = telefono;
				open_modal('modalEditar');
			}

			function set_eliminar(id){
				document.getElementById('eliminar_id').value = id;
				open_modal('modalEliminar');
			}
		</script>

		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>