<?php include("./configuration/backend/private/conexion.php"); ?>
<?php 
  $rget = $mysqli->query("SELECT * FROM header_footer_links LIMIT 1");
  if ($rget)
  {
    if (mysqli_num_rows($rget)>0) {
      while($array = $rget->fetch_object())
      {
        $header = $array->header;
        $footer = $array->footer;
      }
    }else{
      $header = "";
      $footer = "";
    }
  }
  
  $header = str_replace("@...@","'",$header);
  $footer = str_replace("@...@","'",$footer);

  $header = str_replace("@.....@","&",$header);
  $footer = str_replace("@.....@","&",$footer);
?>
	<!-- Back to top button-->
    <a class="btn-scroll-top" href="#top" data-scroll data-fixed-element>
    	<span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Arriba</span>
    	<i class="btn-scroll-top-icon ai-arrow-up"></i>
    </a>
    
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="./assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="./assets/vendor/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="./assets/vendor/lightgallery.js/dist/js/lightgallery.min.js"></script>
    <script src="./assets/vendor/shufflejs/dist/shuffle.min.js"></script>
    

    <!-- Main theme script-->
    <script src="../js/theme.min.js"></script>
    
    <!-- JS ADDED-->
    <?php echo $footer; ?>