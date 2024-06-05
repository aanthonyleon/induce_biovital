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

<?php echo $header; ?>