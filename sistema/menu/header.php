<?php include("../../configuration/backend/helpers/session_check.php"); ?>
<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
  <!--begin::Container-->
  <div class="container-xxl d-flex align-items-stretch justify-content-between">
    <!--begin::Left-->
    <div class="d-flex align-items-center">
      <!--begin::Mega Menu Toggler-->
   
      <!--end::Mega Menu Toggler-->
      <!--begin::Logo-->
      <a href="#">
 <img alt="Logo" src="assets/media/logos/biovital.png" class="h-35px" />
      </a>
      <!--end::Logo-->
    </div>
    <!--end::Left-->
    <!--begin::Right-->
    <div class="d-flex align-items-center">
      <!--begin::Search-->

      
      <!--begin::User-->
      <div class="ms-1 ms-lg-6">
        <!--begin::Toggle-->
        <div class="btn btn-icon btn-sm btn-active-bg-accent" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" id="kt_header_user_menu_toggle">
          <i class="ki-duotone ki-user fs-1 text-gray-900">
            <span class="path1"></span>
            <span class="path2"></span>
          </i>
        </div>
        <!--begin::Menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-300px" data-kt-menu="true">
          <div class="menu-content fw-semibold d-flex align-items-center bgi-no-repeat bgi-position-y-top rounded-top" style="background-image:url('assets/media//misc/dropdown-header-bg.jpg')">
            <div class="symbol symbol-45px mx-5 py-5">
              <span class="symbol-label bg-primary align-items-end">
                <img alt="Logo" src="assets/media/svg/avatars/001-boy.svg" class="mh-35px" />
              </span>
            </div>
            <div class="">
              <span class="text-white fw-bold fs-4"><?php echo $BIOVITAL_NAME; ?></span>
              <span class="text-white fw-semibold fs-7 d-block"><?php echo $BIOVITAL_USER; ?></span>
            </div>
          </div>
          <!--begin::Row-->
          <div class="row row-cols-2 g-0">
            <a href="./pages/horarios.php" class="border-bottom border-end text-center py-10 btn btn-active-color-primary rounded-0">
              <i class="ki-duotone ki-time fs-3x me-n1">
                <span class="path1"></span>
                <span class="path2"></span>
              </i>
              <span class="fw-bold fs-6 d-block pt-3">Horarios</span>
            </a>
			  
			    <a href="./pages/mi-resumen.php?fecha=<?php echo $fecha_actual; ?>" class="col text-center border-end py-10 btn btn-active-color-primary rounded-0">
              <i class="ki-duotone ki-chart-line-up-2  fs-3x me-n1">
                <span class="path1"></span>
                <span class="path2"></span>
              </i>
              <span class="fw-bold fs-6 d-block pt-3">Mi Resumen</span>
            </a>
           
         
            <a href="../configuration/backend/helpers/close_session.php" class="col text-center py-10 btn btn-active-color-primary rounded-0">
              <i class="ki-duotone ki-entrance-right fs-3x me-n1">
                <span class="path1"></span>
                <span class="path2"></span>
              </i>
              <span class="fw-bold fs-6 d-block pt-3">Salir</span>
            </a>
          </div>
          <!--end::Row-->
        </div>
		 
      </div>
		
		
		
		
 <!--begin::User-->
      <div class="ms-1 ms-lg-6">
        <!--begin::Toggle-->
        <div class="btn btn-icon btn-sm btn-active-bg-accent" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" id="kt_header_user_menu_toggle">
         
        <i class="ki-duotone ki-burger-menu-2 fs-1">
          <span class="path1"></span>
          <span class="path2"></span>
          <span class="path3"></span>
          <span class="path4"></span>
          <span class="path5"></span>
          <span class="path6"></span>
          <span class="path7"></span>
          <span class="path8"></span>
          <span class="path9"></span>
          <span class="path10"></span>
  </i>
      

        </div>
        <!--begin::Menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-300px" data-kt-menu="true">
      
          <!--begin::Row-->
          <div class="row row-cols-2 g-0">
            <a href="#" class="border-bottom border-end text-center py-10 btn btn-active-color-primary rounded-0">
              <i class="ki-duotone ki-calendar-2 fs-3x me-n1">
				 <span class="path1"></span>
				 <span class="path2"></span>
				 <span class="path3"></span>
				 <span class="path4"></span>
				 <span class="path5"></span>
				</i>
              <span class="fw-bold fs-6 d-block pt-3">Calendario</span>
            </a>
            <a href="./pages/servicios.php" class="col border-bottom text-center py-10 btn btn-active-color-primary rounded-0">
              <i class="ki-duotone ki-office-bag fs-3x me-n1">
                <span class="path1"></span>
                <span class="path2"></span>
				  <span class="path3"></span>
				  <span class="path4"></span>
              </i>
              <span class="fw-bold fs-6 d-block pt-3">Servicios</span>
            </a>
            <a href="./pages/clientes.php" class="col text-center border-end py-10 btn btn-active-color-primary rounded-0">
              <i class="ki-duotone ki-people fs-3x me-n1">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
				<span class="path4"></span>
				  <span class="path5"></span>
              </i>
              <span class="fw-bold fs-6 d-block pt-3">Clientes</span>
            </a>
			   <a href="./pages/usuarios.php" class="col text-center border-end py-10 btn btn-active-color-primary rounded-0">
              <i class="ki-duotone ki-profile-user fs-3x me-n1">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
				<span class="path4"></span>
              </i>
              <span class="fw-bold fs-6 d-block pt-3">Usuarios</span>
            </a>
			 
          
          </div>
          <!--end::Row-->
        </div>
		 
      </div>
		
		
		
		
  
      <!--end::Sidebar Toggler-->
    </div>
    <!--end::Right-->
  </div>
  <!--end::Container-->
</div>          <!--end::Header-->