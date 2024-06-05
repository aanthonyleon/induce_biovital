<?php 
	include("../../configuration/backend/helpers/session_check.php");
	include('../src/css.php');
	include("../../configuration/backend/private/conexion.php");
	include("../../configuration/backend/helpers/formats-date.php");
include("../../configuration/backend/helpers/permisos.php");

	if (!empty($_GET['id'])) {
		$_id = $_GET['id'];

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

		$rget_agenda   = $mysqli->query("SELECT * FROM agenda WHERE id_usuario=$_id");
		$rget_clientes = $mysqli->query("SELECT * FROM clientes WHERE id_usuario=$_id ORDER BY nombre ASC");
		$rget_servicios = $mysqli->query("SELECT * FROM servicios WHERE id_usuario=$_id ORDER BY nombre ASC");
		$rget_usuarios = $mysqli->query("SELECT * FROM usuarios WHERE id_usuario=$_id ORDER BY nombre ASC");
?>
	<title><?php echo $nombre; ?> | Induce Marketing</title>
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
									<h3 class="text-gray-900 fw-bold my-1">Estadísticas Usuarios</h3>
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

							   <h3>Agendados</h3>
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

								<hr><br>

								<table class="table table-bordered mt-3" id="tabla-clientes">
								  <thead>
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">Nombre</th>
								      <th scope="col">Teléfono</th>
								      <th scope="col">Fecha de registros</th>
								    </tr>
								  </thead>
								  <tbody>
								  	<?php 
								  		$cont = 0;
										if ($rget_clientes)
										{
											if (mysqli_num_rows($rget_agenda)>0) {
												while($array = $rget_clientes->fetch_object())
												{
													$id            = $array->id;
													$id_usuario    = $array->id_usuario;
													$nombre        = $array->nombre;
													$telefono      = $array->telefono;
													$date_register = $array->date_register;
													$cont++;
								            ?>
										    <tr>
										      <th scope="row"><?php echo $cont; ?></th>
										      <td><?php echo $nombre; ?></td>
										      <td><?php echo $telefono; ?></td>
										      <td><?php echo $date_register; ?></td>
										    </tr>
								    <?php 
								    			}
								    		}else{
								    			echo "<h3>No hay registros de clientes.</h3>";
								    		}
								    	}
								    ?>
								  </tbody>
								</table>

								<hr><br>

								<table class="table table-bordered mt-3" id="tabla-servicios">
								  <thead>
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">Nombre</th>
								      <th scope="col">Descripción</th>
								      <th scope="col">Tipo</th>
								      <th scope="col">Capacidad</th>
								      <th scope="col">Fecha de registro</th>
								    </tr>
								  </thead>
								  <tbody>
								  	<?php 
								  		$cont = 0;
										if ($rget_servicios)
										{
											if (mysqli_num_rows($rget_agenda)>0) {
												while($array = $rget_servicios->fetch_object())
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
								      <!-- <td onclick="get_capacidad_servicio('<?php // echo $id; ?>')"><?php // echo $lista_capacidad; ?></td> -->
								      <td><?php echo $date_register; ?></td>
								    </tr>
								    <?php 
								    			}
								    		}else{
								    			echo "<h3>No hay registros de servicios.</h3>";
								    		}
								    	}
								    ?>
								  </tbody>
								</table>

								<hr><br>

								<table class="table table-bordered mt-3" id="tabla-usuarios">
								  <thead>
								    <tr>
								      <th scope="col">#</th>
								      <th scope="col">Nombre</th>
								      <th scope="col">Usuario</th>
								      <th scope="col">Password</th>
								      <th scope="col">Fecha de registro</th>
								    </tr>
								  </thead>
								  <tbody>
								  	<?php 
								  		$cont = 0;
										if ($rget_usuarios)
										{
											if (mysqli_num_rows($rget_agenda)>0) {
												while($array = $rget_usuarios->fetch_object())
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
						            ?>
								    <tr>
								      <th scope="row"><?php echo $cont; ?></th>
								      <td><?php echo $nombre; ?></td>
								      <td><?php echo $usuario; ?></td>
								      <td><?php echo $password; ?></td>
								      <td><?php echo $date_register; ?></td>
								    </tr>
								    <?php 
								    			}
								    		}else{
								    			echo "<h3>No hay registros de usuarios.</h3>";
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
<?php }else{
	header("Location: ./usuarios.php");
} ?>