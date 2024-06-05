<?php 

	function create_post($post){
		include("context-post2.php");
		$myfile = fopen("../articulo/" . $post, "w") or die("No se creo landing");
		fwrite($myfile, $VAR);
		fclose($myfile);
	}

?>