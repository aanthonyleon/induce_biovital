<?php 
	include("../../configuration/backend/helpers/session_check.php");
	include('../src/css.php');
	include("../../configuration/backend/private/conexion.php");
	include("../../configuration/backend/helpers/formats-date.php");
include("../../configuration/backend/helpers/permisos.php");

	if (!empty($_GET['fecha'])) {
		$fecha = $_GET['fecha'];
		$fecha_bd = $fecha . '23:59:59';

		$_id = $BIOVITAL_ID;

		$rusuarios = $mysqli->query("SELECT * FROM usuarios WHERE id=$_id");
		if ($rusuarios)
		{
			while($array = $rusuarios->fetch_object())
			{
				$id_usuario    = $array->id_usuario;
				$nombre        = $array->nombre;
				$usuario       = $array->usuario;
				$password      = $array->password;
				$date_register = $array->date_register;
			}
		}

		$rget_agenda_agendados   = $mysqli->query("SELECT * FROM agenda WHERE id_usuario=$_id AND DATE(date_register)='$fecha'");
		$rget_agenda_confirmados = $mysqli->query("SELECT * FROM agenda WHERE id_usuario=$_id AND estatus='aprobado' AND DATE(date_register)='$fecha'");
		$rget_agenda_cancelados   = $mysqli->query("SELECT * FROM agenda WHERE id_usuario=$_id AND estatus='cancelado' AND DATE(date_register) ='$fecha'");
		$rget_clientes           = $mysqli->query("SELECT * FROM clientes WHERE id_usuario=$_id AND DATE(date_register)='$fecha' ORDER BY nombre ASC");
		// $rget_servicios = $mysqli->query("SELECT * FROM servicios WHERE id_usuario=$_id ORDER BY nombre ASC");
		// $rget_usuarios = $mysqli->query("SELECT * FROM usuarios WHERE id_usuario=$_id ORDER BY nombre ASC");
?>
	<title><?php echo $nombre; ?> | Induce Marketing</title>
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
									<h3 class="text-gray-900 fw-bold my-1">Mi resumen de día</h3>
									<!--end::Title-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-line bg-transparent text-muted fw-semibold p-0 my-1 fs-7">
										<li class="breadcrumb-item">
											<a href="#" class="text-muted text-hover-primary">Inicio</a>
										</li>
										<li class="breadcrumb-item text-gray-900">Resumen del día</li>
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

								<h3 class="text-center"><?php echo fecha($fecha); ?></h3>
								<div class="d-grid gap-2 col-6 mx-auto">
								  <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalFecha">Cambiar fecha</button>
								</div>

								<div class="row mt-5">
									<div class="col-3">
										<div class="d-flex flex-wrap flex-center justify-content-lg-between mx-auto w-xl-900px">
											<div class="d-flex flex-column flex-center h-100px w-150px h-lg-150px w-lg-200px m-3 bg-primary ">
												
												<div class="mb-0">
													<div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
														<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="<?php echo mysqli_num_rows($rget_agenda_agendados) ?>" data-kt-countup-suffix="+">0</div>
													</div>
													<span class="text-white fw-semibold fs-5 lh-0">
														Servicios agendados
													</span>
												</div>
											</div>
										</div>
									</div>

									<div class="col-3">
										<div class="d-flex flex-wrap flex-center justify-content-lg-between mx-auto w-xl-900px">
											<div class="d-flex flex-column flex-center h-100px w-150px h-lg-150px w-lg-200px m-3 bg-success">
												
												<div class="mb-0">
													<div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
														<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="<?php echo mysqli_num_rows($rget_agenda_confirmados) ?>" data-kt-countup-suffix="+">0</div>
													</div>
													<span class="text-white fw-semibold fs-5 lh-0">
														Servicios confirmados
													</span>
												</div>
											</div>
										</div>
									</div>

									<div class="col-3 mt-4">
										<div class="d-flex flex-wrap flex-center justify-content-lg-between mx-auto w-xl-900px">
											<div class="d-flex flex-column flex-center h-100px w-150px h-lg-150px w-lg-200px m-3 bg-danger ">
												
												<div class="mb-0">
													<div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
														<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="<?php echo mysqli_num_rows($rget_agenda_cancelados) ?>" data-kt-countup-suffix="+">0</div>
													</div>
													<span class="text-white fw-semibold fs-5 lh-0">
														Servicios cancelados
													</span>
												</div>
											</div>
										</div>
									</div>

									<div class="col-3 mt-4">
										<div class="d-flex flex-wrap flex-center justify-content-lg-between mx-auto w-xl-900px">
											<div class="d-flex flex-column flex-center h-100px w-150px h-lg-150px w-lg-200px m-3 bg-dark">
												
												<div class="mb-0">
													<div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
														<div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="<?php echo mysqli_num_rows($rget_clientes) ?>" data-kt-countup-suffix="+">0</div>
													</div>
													<span class="text-white fw-semibold fs-5 lh-0">
														Clientes registrados
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>

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

		<!-- Modal -->
		<div class="modal fade" id="modalFecha" tabindex="-1" aria-labelledby="modalFechaLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="modalFechaLabel">Fecha de resumen</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<form action="" method="GET">
			      	<label>Selecciona la fecha</label>
			      	<input type="date" id="fecha" name="fecha" class="form-control" required>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-primary">Filtrar</button>
					</div>
			     </form>
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

		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>
<?php }else{
	header("Location: ./mi-resumen.php?fecha=" . date('Y-m-d'));
} ?>