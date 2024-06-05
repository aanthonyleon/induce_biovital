 <?php  
 	include('../../configuration/backend/helpers/permisos.php');

    $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
    $active = array();

    if ($curPageName === "archivo_prospectos.php") {
      $active[0] = "active";
    }
  ?>

	<div id="kt_aside" class="aside bg-dark" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="70px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggler">
		<!--begin::Primary-->
		<div class="aside-primary d-flex flex-column align-items-center flex-row-auto">
			<!--begin::Logo-->
			<div class="aside-logo d-flex flex-column align-items-center flex-column-auto py-4 pt-lg-10 pb-lg-7" id="kt_aside_logo">
				<a href="./index.php">
					<img alt="Logo" src="../assets/media/logos/logo.svg" class="mh-50px" width="30px"/>
				</a>
			</div>
			<!--end::Logo-->
			<!--begin::Nav Wrapper-->
			<div class="aside-nav d-flex flex-column align-items-center flex-column-fluid pt-0 pb-5" id="kt_aside_nav">
				<!--begin::Nav scroll-->
				<div class="hover-scroll-y" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_nav" data-kt-scroll-offset="10px">
					<!--begin::Nav-->
					<ul class="nav flex-column">

						<!--begin::Item-->
						<li class="nav-item mb-1" title="Clientes" data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-placement="right">
							<a href="./archivo_prospectos.php" class="nav-link h-40px w-40px h-lg-50px w-lg-50px btn btn-custom btn-icon btn-color-white <?php echo $active[0]; ?>" role="tab">
								<!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
								<span class="svg-icon svg-icon-2 svg-icon-lg-1">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black"/>
									<rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black"/>
									</svg></span>
								<!--end::Svg Icon-->
							</a>
						</li>

					</ul>
					<!--end::Nav-->
				</div>
				<!--end::Nav scroll-->
			</div>
			<!--end::Nav Wrapper-->

			<?php if ($usuario_permiso_configuraciones === "true") { ?>
			<!--begin::Footer-->
			<div class="aside-footer d-flex flex-column align-items-center flex-column-auto py-5 py-lg-7" id="kt_aside_footer">
				<!--begin::Menu-->
				<div class="mb-2" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="hover" title="Configuraciones">
					<button type="button" class="btn btn-custom h-40px w-40px h-lg-50px w-lg-50px btn-icon btn-color-white <?php echo $active[4]; ?>" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start" data-kt-menu-flip="top-end">
						<!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
						<span class="svg-icon svg-icon-2 svg-icon-lg-1">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z" fill="black" />
								<path opacity="0.3" d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z" fill="black" />
								<path opacity="0.3" d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z" fill="black" />
								<path opacity="0.3" d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z" fill="black" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</button>
					<!--begin::Menu-->
					<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-200px" data-kt-menu="true">
					
						<div class="separator mt-3 opacity-75"></div>
					
						<div class="menu-item px-3">
							<a href="./avanzado.php" class="menu-link px-3">Avanzado</a>
						</div>

						<div class="separator mt-3 opacity-75"></div>

					</div>
					<!--end::Menu-->
				</div>
				<!--end::Menu-->
			</div>
			<!--end::Footer-->
			<?php } ?>
		</div>
		<!--end::Primary-->
	</div>