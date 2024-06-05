<?php 
  // header("Location: ./pages/calendario.php"); 
  if(isset($_COOKIE['BIOVITAL_USER']) 
    && isset($_COOKIE['BIOVITAL_ID']) 
    && isset($_COOKIE['BIOVITAL_NAME']) 
    && isset($_COOKIE['BIOVITAL_ACCESS'])) { 
    header("Location: ./pages/calendario.php");
  } 
?>
<!DOCTYPE html>
<html lang="es">
  <!--begin::Head-->
  <head><base href="./">
    <title>Inicio | Sistema</title>
    <meta charset="utf-8" />
    <meta name="keywords" content="Induce" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Induce" />
    <link rel="shortcut icon" href="./assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="./assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="./assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

    <!-- MANIFEST -->
    <link rel="manifest" href="../manifest.json">
  
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    
    <link rel="mask-icon" color="#5bbad5" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#766df4">
    <meta name="theme-color" content="#ffffff">
    <!--end::Global Stylesheets Bundle-->
	  
	  <style>
      .swal2-shown {
        overflow: unset !important;
        padding-right: 0px !important;
      }
	  </style>
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body id="kt_body" >
    
    <div class="loader " id="cargador" style="display: none;"></div>
    
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
      <!--begin::Login-->
      <div class="d-flex flex-column flex-lg-row flex-column-fluid" id="kt_login">
        <!--begin::Aside-->
        <div class="d-flex flex-column flex-lg-row-auto bg-black w-lg-600px pt-15 pt-lg-0">
          <!--begin::Aside Top-->
          <div class="d-flex flex-row-fluid flex-center flex-column-auto flex-column text-center mb-5">
            <!--begin::Aside Logo-->
            <a href="../dist/index.html" class="mb-6">
              <img alt="Logo" src="./assets/media/logos/logow.png" class="h-200px h-lg-200px" />
            </a>
            <!--end::Aside Logo-->
            <!--begin::Aside Subtitle-->
            <!--end::Aside Subtitle-->
          </div>
          <!--end::Aside Top-->
          <!--begin::Illustration-->

          <!--end::Illustration-->
        </div>
        <!--begin::Aside-->
        <!--begin::Content-->
        <div class="login-content flex-lg-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden py-10 py-lg-20 px-10 p-lg-7 mx-auto mw-450px w-100">
          <!--begin::Wrapper-->
          <div class="d-flex flex-column-fluid flex-center py-10">
            <!--begin::Signin Form-->
            <div class="form w-100" id="kt_login_signin_form">
              <!--begin::Title-->
              <div class="pb-5 pb-lg-15">
                <h3 class="fw-bolder text-dark display-6">Inicio de sesión</h3>
              </div>
              <!--begin::Title-->
              <!--begin::Form group-->
              <div class="fv-row mb-10">
                <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                <input class="form-control form-control-lg form-control-solid" type="text" name="username" autocomplete="off" id="username" placeholder="Escribe tu email" />
              </div>
              <!--end::Form group-->
              <!--begin::Form group-->
              <div class="fv-row mb-10">
                <div class="d-flex justify-content-between mt-n5">
                  <label class="form-label fs-6  fw-bolder text-dark pt-5">Contraseña</label>
                </div>
                <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" id="password" placeholder="Escribe tu contraseña" />
              </div>
              <!--end::Form group-->
              <!--begin::Action-->
              <div class="pb-lg-0 pb-5">
                <button type="button" class="btn btn-primary fw-bolder fs-6 px-8 py-4 my-3 me-3" onclick="login_admin()">Iniciar sesi&oacute;n</button>
              </div>
              <!--end::Action-->
            </div>
            <!--end::Signin Form-->
            <!--begin::Signup Form-->

          </div>
          <!--end::Wrapper-->
          <!--begin::Footer-->
          <div class="d-flex justify-content-lg-start justify-content-center align-items-center py-2 py-lg-7 py-lg-0 fs-5 fw-bolder">
            <a href="https://induce.mx" target="_blank" class="text-gray-600 text-hover-primary">Acerca de nosotros</a>
            <a href="https://induce.mx/contacto" target="_blank" class="text-gray-600 text-hover-primary ms-10">Soporte</a>
            
          </div>
          <!--end::Footer-->
        </div>
        <!--end::Content-->
      </div>
      <!--end::Login-->
    </div>

    <!--end::Main-->
    <script>var hostUrl = "./assets/";</script>
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="./assets/plugins/global/plugins.bundle.js"></script>
    <script src="./assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="./assets/js/custom/general/login.js"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->

    <script src="../core/backend/js/sweetalert/sweetalert2@9"></script>
    <script src="../core/backend/js/sweetalert/promise-polyfill"></script>
    <script src="../core/backend/js/sistem.js"></script>
    <script src="../core/backend/js/jquery.min.js"></script>
  </body>
  <!--end::Body-->
</html>