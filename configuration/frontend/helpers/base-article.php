<?php include("./configuration/backend/private/conexion.php"); ?>
<?php include("./configuration/frontend/helpers/format-dates.php"); ?>

<?php 
  if(!empty($_GET['articulo'])){
      $_page = $_GET['articulo'];
      // $_page = basename($_SERVER["PHP_SELF"]);
      // $_page = str_replace(".php","",$_page);
      $rpost_detail = $mysqli->query("SELECT * FROM blog_publicaciones WHERE pagina='$_page'");
      if (mysqli_num_rows($rpost_detail)>0) {
        if ($rpost_detail) {
          while($array = $rpost_detail->fetch_object())
          {
            $titulo           = $array->titulo;
            $descripcion      = $array->descripcion;
            $titulo_seo       = $array->titulo_seo;
            $descripcion_seo  = $array->descripcion_seo;
            $claves_seo       = $array->claves_seo;
            $imagen           = $array->imagen;
            $lista_categorias = $array->lista_categorias;
            $pagina           = $array->pagina;
            $date_register    = $array->date_register;
          }
        }
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <title><?php echo $titulo; ?> | Induce Marketing Digital</title>
    
    <!-- SEO Meta Tags-->
    <meta charset="utf-8">
    <meta name="title" content="<?php echo $titulo_seo; ?>"/>
    <meta name="description" content="<?php echo $descripcion_seo; ?>">
    <meta name="keywords" content="<?php echo $claves_seo; ?>">
    <meta name="author" content="Induce Marketing Digital">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/phone/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/phone/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/phone/favicon-16x16.png">
    <link rel="manifest" href="../assets/img/phone/site.webmanifest">
    <link rel="mask-icon" color="#5bbad5" href="../assets/img/phone/safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#766df4">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" media="screen" href="../assets/vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen" href="../assets/vendor/tiny-slider/dist/tiny-slider.css"/>
    <link rel="stylesheet" media="screen" href="../assets/vendor/lightgallery.js/dist/css/lightgallery.min.css"/>
    <link rel="stylesheet" media="screen" href="../assets/css/theme.min.css">
    
    <!-- Facebook Tags-->
    <meta property="og:title" content="<?php echo $titulo; ?>"/>
    <meta property="og.type" content="articulo"/>
    <meta property="og:description" content="<?php echo $descripcion_seo; ?>"/> 
    <meta property="og:image" content="../uploads/imgs/blog/<?php echo $imagen; ?>">
    <meta property="og:site_name" content="inducemarketing">
    <meta property="og:url" content="https://www.induce.mx/articulo/<?php echo $pagina; ?>">

    <!-- Twitter Tags-->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@inducemarketing">
    <meta name="twitter:creator" content="@inducemarketing">
    <meta name="twitter:description" content="<?php echo $descripcion_seo; ?>">
    <meta name="twitter:title" content="<?php echo $titulo; ?>">
    <meta name="twitter:image" content="../uploads/imgs/blog/<?php echo $imagen; ?>">
    
    <!-- Tags Added -->
    <?php include("index-added-blog.php"); ?>


  </head>

  <body oncontextmenu="return false;" onselectstart="return false;">

    <main class="page-wrapper">

      <!-- HEADER -->
      <?php include("./configuration/frontend/menu/header-blog.php"); ?>
      <!-- /HEADER -->
      
      <div class="container">
        <div class="row justify-content-center">
          <!-- Content-->
          <div class="col-lg-9 py-4 mb-2 mb-sm-0 pb-sm-5">
            <div class="pb-2" style="max-width: 48rem;">
              <nav aria-label="breadcrumb">
                <ol class="py-1 my-2 breadcrumb">
                  <li class="breadcrumb-item"><a href="../index">Inicio</a></li>
                  <li class="breadcrumb-item"><a href="../blog">Blog</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#"><?php echo $lista_categorias; ?></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    <?php echo $titulo; ?>
                  </li>
                </ol>
              </nav>
              <h1>
                <?php echo $titulo; ?>
              </h1>
            </div>
            <!-- Post author + Sharing-->
            <!-- Hero-->

            <!-- Background image parallax -->

            <div class="bg-size-cover bg-position-center rounded-3 " style="background-image: url(../uploads/imgs/blog/<?php echo $imagen; ?>); height:400px;">
            </div>

            <!-- Post content-->
            <p class="py-4" align="justify">
              <?php echo $descripcion; ?>
            </p>
            
            <!-- Tags + Sharing-->
            <div class="row g-0 position-relative align-items-center border-top border-bottom my-5">
              <div class="col-md-6 py-2 py-dm-3 pe-md-3 text-center text-md-start"></div>
              <div class="d-none d-md-block position-absolute border-start h-100" style="top: 0; left: 50%; width: 1px;"></div>
              <div class="col-md-6 ps-md-3 py-2 py-md-3">
                <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                  <h6 class="text-nowrap my-2 me-3">Compartir:</h6>
                  
                  <a class="btn-social bs-outline bs-facebook ms-2 my-2" href="https://www.facebook.com/sharer/sharer.php?u=https://induce.mx/articulo/<?php echo $pagina; ?>" target="_blank">
                      <i class="ai-facebook"></i>
                  </a>
                  
                  <!--<a class="btn-social bs-outline bs-twitter ms-2 my-2" href="https://twitter.com/share?url=https://induce.mx/articulo/<?php //echo $pagina; ?>&via=TWITTER_HANDLE" target="_blank">-->
                  <a class="btn-social bs-outline bs-twitter ms-2 my-2" href="https://twitter.com/share?url=https://induce.mx/articulo/<?php echo $pagina; ?>" target="_blank">
                      <i class="ai-twitter"></i>
                  </a>
                  
                </div>
              </div>
            </div>

            <?php 
              $cont = 0;
              $titulo_next1 = "";
              $imagen_next1 = "";
              $pagina_next1 = "";
              $titulo_next2 = "";
              $imagen_next2 = "";
              $pagina_next2 = "";
              $rpost_next = $mysqli->query("SELECT * FROM blog_publicaciones WHERE pagina!='$_page' LIMIT 2");
              if (mysqli_num_rows($rpost_next)>0) {
                if ($rpost_next) {
                  while($array = $rpost_next->fetch_object())
                  {
                    if ($cont == 0) {
                      $titulo_next1 = $array->titulo;
                      $imagen_next1 = $array->imagen;
                      $pagina_next1 = $array->pagina;
                    }

                    if ($cont == 1) {
                      $titulo_next2 = $array->titulo;
                      $imagen_next2 = $array->imagen;
                      $pagina_next2 = $array->pagina;
                    }
                    $cont++;
                  }
                }
              }
            ?>

            <!-- Prev / Next post navigation-->
            <nav class="d-flex justify-content-between pb-4 mb-5" aria-label="Entry navigation">

              <?php if (!empty($titulo_next1)) { ?>
              <a class="entry-nav me-3" href="./<?php echo $pagina_next1; ?>">
                <h3 class="h5 pb-sm-2">Anterior</h3>
                <div class="d-flex align-items-start">
                  <div class="entry-nav-thumb flex-shrink-0 d-none d-sm-block"><img class="rounded" src="../uploads/imgs/blog/<?php echo $imagen_next1; ?>" alt="Post thumbnail"></div>
                  <div class="ps-sm-3">
                    <h4 class="nav-heading fs-md fw-medium mb-0">
                      <?php echo $titulo_next1; ?>
                    </h4>
                  </div>
                </div>
              </a>
              <?php } ?>

              <?php if (!empty($titulo_next2)) { ?>
              <a class="entry-nav ms-3" href="./<?php echo $pagina_next2; ?>">
                <h3 class="h5 pb-sm-2 text-end">Siguiente</h3>
                <div class="d-flex align-items-start">
                  <div class="text-end pe-sm-3">
                    <h4 class="nav-heading fs-md fw-medium mb-0">
                      <?php echo $titulo_next2; ?>
                    </h4>
                  </div>
                  <div class="entry-nav-thumb flex-shrink-0 d-none d-sm-block"><img class="rounded" src="../uploads/imgs/blog/<?php echo $imagen_next2; ?>" alt="Post thumbnail"></div>
                </div>
              </a>
              <?php } ?>

            </nav>
            
          </div>
        </div>
      </div>
    </main>

    <!-- FOOTER-->
    <?php include("./configuration/frontend/menu/footer-clean.php"); ?>
    <!-- /FOOTER -->

    <!-- JS FILE -->
    <?php include("./configuration/frontend/helpers/index-js-blog.php"); ?>

  </body>
</html>
<?php 
        }else{
            // header("Location: ./index");
        }
    }else{
            // header("Location: ./index");
    }
?>