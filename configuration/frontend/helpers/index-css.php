<?php include("./configuration/backend/private/conexion.php"); ?>
<?php 
  $rget = $mysqli->query("SELECT * FROM header_footer_links LIMIT 1");
  if ($rget)
  {
    if (mysqli_num_rows($rget)>0) {
      while($array = $rget->fetch_object())
      {
        $header = $array->header;
      }
    }else{
      $header = "";
    }
  }

  $header = str_replace("@...@","'",$header);
  $header = str_replace("@.....@","&",$header);
?>

<!-- CSS HEADER -->
<?php echo $header; ?>