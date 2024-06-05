<?php 
	include("../../configuration/backend/helpers/permisos.php");
	$fecha_actual = date('Y-m-d');
?>

<div class="modal bg-white fade" id="kt_mega_menu_modal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-fullscreen">
				<div class="modal-content shadow-none">
					<div class="container">
						<div class="modal-header d-flex flex-stack border-0">
							<div class="d-flex align-items-center">
								<!--begin::Logo-->
								<a href="index.php">
									<img alt="Logo" src="assets/media/logos/logo-default.svg" class="h-30px" />
								</a>
								<!--end::Logo-->
							</div>
							<!--begin::Close-->
							<div class="btn btn-icon btn-sm btn-light-primary ms-2" data-bs-dismiss="modal">
								<i class="ki-duotone ki-cross fs-1">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</div>
							<!--end::Close-->
						</div>
						<div class="modal-body">
							<!--begin::Row-->
							<div class="row py-10 g-5">
								<!--begin::Column-->
								<div class="col-lg-6 pe-lg-25">
									<!--begin::Row-->
									<div class="row">
										<div class="col-sm-4">
											<h3 class="fw-bold mb-5">Menú</h3>
											<ul class="menu menu-column menu-fit menu-rounded menu-gray-600 menu-hover-primary menu-active-primary fw-semibold fs-6 mb-10">
												<?php if ($permiso_Agregar_calendario == "true" || $permiso_Editar_calendario == "true" || $permiso_Consultar_calendario == "true" || $permiso_Eliminar_calendario == "true") {
												?>
												<li class="menu-item">
													<a class="menu-link ps-0 py-2" href="./pages/calendario.php">Calendario</a>
												</li>
												<?php 
													}
												?>
												
												<?php if ($permiso_Agregar_servicio == "true" || $permiso_Editar_servicio == "true" || $permiso_Consultar_servicio == "true" || $permiso_Eliminar_servicio == "true") {
												?>
												<li class="menu-item">
													<a class="menu-link ps-0 py-2" href="./pages/servicios.php">Servicios</a>
												</li>
												<?php 
													}
												?>
												
												<?php if ($permiso_Agregar_cliente == "true" || $permiso_Editar_cliente == "true" || $permiso_Consultar_cliente == "true" || $permiso_Eliminar_cliente == "true") {
												?>
												<li class="menu-item">
													<a class="menu-link ps-0 py-2" href="./pages/clientes.php">Clientes</a>
												</li>
												<?php 
													}
												?>
											</ul>
										</div>

										<div class="col-sm-4">
											<h3 class="fw-bold mb-5">Configuración</h3>
											<ul class="menu menu-column menu-fit menu-rounded menu-gray-600 menu-hover-primary menu-active-primary fw-semibold fs-6 mb-10">
												
												<?php if ($BIOVITAL_ACCESS === "true") { ?>
												<li class="menu-item">
													<a class="menu-link ps-0 py-2" href="./pages/horarios.php">Horarios</a>
												</li>
												<?php 
													}
												?>

												<?php if ($permiso_Agregar_usuario == "true" || $permiso_Editar_usuario == "true" || $permiso_Consultar_usuario == "true" || $permiso_Eliminar_usuario == "true") {
												?>
												<li class="menu-item">
													<a class="menu-link ps-0 py-2" href="./pages/usuarios.php">Usuarios</a>
												</li>
												<?php 
													}
												?>

												<li class="menu-item">
													<a class="menu-link ps-0 py-2" href="./pages/mi-resumen.php?fecha=<?php echo $fecha_actual; ?>">Mi resumen del día</a>
												</li>
											</ul>
										</div>
									</div>
									<!--end::Row-->
								</div>
								<!--end::Column-->
							</div>
							<!--end::Row-->
						</div>
					</div>
				</div>
			</div>
		</div>