<?php
include("modelo.php");
if (!isset($_POST['work'])) 
{
	print false;
	exit;
}

$work = $_POST['work']; 
switch($work)
{
	case '1':
		archivo_orden_compra();
		break;

	case '2':
		upload_guardar_equipo();
		break;

	case '3':
		upload_guardar_equipo_edit();
		break;

	case 'mensaje_mail_default':
		mensaje_mail_default();
		break;

	case 'mensaje_mail_default_orden':
		mensaje_mail_default_orden();
		break;

	case 'save_new_post':
		save_new_post();
		break;

	case 'agregar_plantilla':
		agregar_plantilla();
		break;

	case 'guardar_servicio':
		guardar_servicio();
		break;

	case 'editar_servicio':
		editar_servicio();
		break;

	default:

		print false;
}

	function archivo_orden_compra(){
		include_once("../private/conexion.php");
		include_once("../helpers/identificador.php");

		ini_set("memory_limit","1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000M");
		set_time_limit(2000);
		ini_set('upload_max_filesize', '30M');
		ini_set('post_max_size', '30M');

		$path = $_FILES['archivo-orden-compra']['name'];
		$ext  = pathinfo($path, PATHINFO_EXTENSION);

		$identificador  = createRandomID().generateRandomStringdos();
		$nombre_archivo = $identificador . "." . $ext;

		$id_servicio  = $_POST['id_servicio'];
		$id_prospecto = $_POST['id_prospecto'];

		$location = "../sistema/docs/archivos/" . $nombre_archivo;
		$uploadOk = 1;

		$imageFileType    = pathinfo($location,PATHINFO_EXTENSION);
		$valid_extensions = array("jpg","jpeg","png");

		if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
		   $uploadOk = 1;
		}

		if($uploadOk == 0){
		   echo "El formato de la imagen debe de ser jpg o jpeg o png.";
		}else{
		   if(move_uploaded_file($_FILES['archivo-orden-compra']['tmp_name'],$location)){
		   	$radd_archive = $mysqli->query("INSERT INTO `prospecto_orden_compra`(`id`, `id_servicio`, `id_prospecto`, `archivo`, `nombre_archivo`, `date_register`) VALUES (NULL,'$id_servicio','$id_prospecto','$nombre_archivo','$path',NOW())");
		   	if ($radd_archive) {
		   		echo "added";
		   	}else{
		         echo "Error al registrar el archivo. Intenta nuevamente.";
		      }
		   }else{
		      echo "Error al recibir el archivo. Intenta nuevamente.";
		   }
		}
	}

	function upload_guardar_equipo(){
		include_once("../private/conexion.php");
		include_once("../helpers/identificador.php");

		ini_set("memory_limit","1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000M");
		set_time_limit(2000);
		ini_set('upload_max_filesize', '30M');
		ini_set('post_max_size', '30M');

		$path = $_FILES['fotografia']['name'];
		$ext  = pathinfo($path, PATHINFO_EXTENSION);

		$identificador  = createRandomID().generateRandomStringdos();
		$nombre_archivo = $identificador . "." . $ext;

		$id  = $_POST['id'];

		$location = "../sistema/archivos/equipos/fotografias/" . $nombre_archivo;
		$uploadOk = 1;

		$imageFileType    = pathinfo($location,PATHINFO_EXTENSION);
		$valid_extensions = array("jpg","jpeg","png");

		if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
		   $uploadOk = 1;
		}

		if($uploadOk == 0){
		   echo "El formato de la imagen debe de ser jpg o jpeg o png.";
		}else{
		   if(move_uploaded_file($_FILES['fotografia']['tmp_name'],$location)){
		   	$radd_archive = $mysqli->query("UPDATE `equipos` SET `fotografia`='$nombre_archivo' WHERE id=$id");
		   	if ($radd_archive) {
		   		echo "added";
		   	}else{
		         echo "Error al registrar la fotografía. Intenta nuevamente.";
		      }
		   }else{
		      echo "Error al recibir la fotografía. Intenta nuevamente.";
		   }
		}
	}

	function upload_guardar_equipo_edit(){
		include_once("../private/conexion.php");
		include_once("../helpers/identificador.php");

		ini_set("memory_limit","1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000M");
		set_time_limit(2000);
		ini_set('upload_max_filesize', '30M');
		ini_set('post_max_size', '30M');

		$id   = $_POST['id'];
		$path = $_FILES['fotografia-' . $id]['name'];
		$ext  = pathinfo($path, PATHINFO_EXTENSION);

		$identificador  = createRandomID().generateRandomStringdos();
		$nombre_archivo = $identificador . "." . $ext;

		$location = "../sistema/archivos/equipos/fotografias/" . $nombre_archivo;
		$uploadOk = 1;

		$imageFileType    = pathinfo($location,PATHINFO_EXTENSION);
		$valid_extensions = array("jpg","jpeg","png");

		if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
		   $uploadOk = 1;
		}

		if($uploadOk == 0){
		   echo "El formato de la imagen debe de ser jpg o jpeg o png.";
		}else{
		   if(move_uploaded_file($_FILES['fotografia-' . $id]['tmp_name'],$location)){
		   	$radd_archive = $mysqli->query("UPDATE `equipos` SET `fotografia`='$nombre_archivo' WHERE id=$id");
		   	if ($radd_archive) {
		   		echo "added";
		   	}else{
		         echo "Error al registrar la fotografía. Intenta nuevamente.";
		      }
		   }else{
		      echo "Error al recibir la fotografía. Intenta nuevamente.";
		   }
		}
	}

	function mensaje_mail_default(){
		include_once("../private/conexion.php");
		include_once("../helpers/identificador.php");
		include_once("../helpers/session_check.php");

		ini_set("memory_limit","1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000M");
		set_time_limit(2000);
		ini_set('upload_max_filesize', '30M');
		ini_set('post_max_size', '30M');

		if ($_POST['d'] === "si") {

			$path = $_FILES['img-logo']['name'];
			$ext  = pathinfo($path, PATHINFO_EXTENSION);

			$identificador  = createRandomID().generateRandomStringdos();
			$nombre_archivo = $identificador . "." . $ext;

			$mensaje  = $_POST['mensaje'];

			$location = "../sistema/archivos/mail/" . $nombre_archivo;
			$uploadOk = 1;

			$imageFileType    = pathinfo($location,PATHINFO_EXTENSION);
			$valid_extensions = array("jpg","jpeg","png");

			if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
			   $uploadOk = 1;
			}

			if($uploadOk == 0){
			   echo "El formato de la imagen debe de ser jpg o jpeg o png.";
			}else{
			   if(move_uploaded_file($_FILES['img-logo']['tmp_name'],$location)){

			   	$rcheck = $mysqli->query("SELECT * FROM `mail_data` WHERE id_admin=$_AMBIEZA_id AND tipo='cotizacion'");
			   	if (mysqli_num_rows($rcheck)>0) {
			   		$radd_archive = $mysqli->query("UPDATE `mail_data` SET mensaje='$mensaje',`imagen`='$nombre_archivo' WHERE id_admin=$_AMBIEZA_id AND tipo='cotizacion'");
			   	}else{
			   		$radd_archive = $mysqli->query("INSERT INTO `mail_data`(`id`, `id_admin`, `mensaje`, `imagen`, tipo) VALUES (NULL,'$_AMBIEZA_id','$mensaje','$nombre_archivo','cotizacion')");
			   	}
			   	
			   	if ($radd_archive) {
			   		echo "updated";
			   	}else{
			         echo "Error al actualizar la información. Err " . $mysqli->error;
			      }
			   }else{
			      echo "Error al subir la imagen.";
			   }
			}
		}else{
			$mensaje  = $_POST['mensaje'];
			$rcheck = $mysqli->query("SELECT * FROM `mail_data` WHERE id_admin=$_AMBIEZA_id AND tipo='cotizacion'");
		   	if (mysqli_num_rows($rcheck)>0) {
		   		$radd_archive = $mysqli->query("UPDATE `mail_data` SET mensaje='$mensaje' WHERE id_admin=$_AMBIEZA_id AND tipo='cotizacion'");
		   	}else{
		   		$radd_archive = $mysqli->query("INSERT INTO `mail_data`(`id`, `id_admin`, `mensaje`, tipo) VALUES (NULL,'$_AMBIEZA_id','$mensaje','cotizacion')");
		   	}
		   	
		   	if ($radd_archive) {
		   		echo "updated";
		   	}else{
		         echo "Error al actualizar la información. Err " . $mysqli->error;
		    }
		}
	}

	function mensaje_mail_default_orden(){
		include_once("../private/conexion.php");
		include_once("../helpers/identificador.php");
		include_once("../helpers/session_check.php");

		ini_set("memory_limit","1000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000M");
		set_time_limit(2000);
		ini_set('upload_max_filesize', '30M');
		ini_set('post_max_size', '30M');

		if ($_POST['d'] === "si") {

			$path = $_FILES['img-logo-os']['name'];
			$ext  = pathinfo($path, PATHINFO_EXTENSION);

			$identificador  = createRandomID().generateRandomStringdos();
			$nombre_archivo = $identificador . "." . $ext;

			$mensaje  = $_POST['mensaje'];

			$location = "../sistema/archivos/mail/os/" . $nombre_archivo;
			$uploadOk = 1;

			$imageFileType    = pathinfo($location,PATHINFO_EXTENSION);
			$valid_extensions = array("jpg","jpeg","png");

			if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
			   $uploadOk = 1;
			}

			if($uploadOk == 0){
			   echo "El formato de la imagen debe de ser jpg o jpeg o png.";
			}else{
			   if(move_uploaded_file($_FILES['img-logo-os']['tmp_name'],$location)){

			   	$rcheck = $mysqli->query("SELECT * FROM `mail_data` WHERE id_admin=$_AMBIEZA_id AND tipo='orden'");
			   	if (mysqli_num_rows($rcheck)>0) {
			   		$radd_archive = $mysqli->query("UPDATE `mail_data` SET mensaje='$mensaje',`imagen`='$nombre_archivo' WHERE id_admin=$_AMBIEZA_id AND tipo='orden'");
			   	}else{
			   		$radd_archive = $mysqli->query("INSERT INTO `mail_data`(`id`, `id_admin`, `mensaje`, `imagen`, tipo) VALUES (NULL,'$_AMBIEZA_id','$mensaje','$nombre_archivo','orden')");
			   	}
			   	
			   	if ($radd_archive) {
			   		echo "updated";
			   	}else{
			         echo "Error al actualizar la información. Err " . $mysqli->error;
			      }
			   }else{
			      echo "Error al subir la imagen.";
			   }
			}
		}else{
			$mensaje  = $_POST['mensaje'];
			$rcheck = $mysqli->query("SELECT * FROM `mail_data` WHERE id_admin=$_AMBIEZA_id AND tipo='orden'");
		   	if (mysqli_num_rows($rcheck)>0) {
		   		$radd_archive = $mysqli->query("UPDATE `mail_data` SET mensaje='$mensaje' WHERE id_admin=$_AMBIEZA_id AND tipo='orden'");
		   	}else{
		   		$radd_archive = $mysqli->query("INSERT INTO `mail_data`(`id`, `id_admin`, `mensaje`, tipo) VALUES (NULL,'$_AMBIEZA_id','$mensaje','orden')");
		   	}
		   	
		   	if ($radd_archive) {
		   		echo "updated";
		   	}else{
		         echo "Error al actualizar la información. Err " . $mysqli->error;
		    }
		}
	}

	function save_new_post(){
		include("../../../configuration/backend/private/conexion.php");

		$filename    = $_FILES['logo']['name'];
		$id          = $_POST['id'];
		$titulo_post = $_POST['pagina'];

		$ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);

		// $nombre_imagen = '_' . $id . '__' . $filename;
		$nombre_imagen = $titulo_post . '.' . $ext;

		$location = "../../../uploads/imgs/blog/" . $nombre_imagen;
		$uploadOk = 1;

		$imageFileType    = pathinfo($location,PATHINFO_EXTENSION);
		$valid_extensions = array("jpg","jpeg","png");

		if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
		   $uploadOk = 1;
		}

		if($uploadOk == 0){
		   echo "El formato de la imagen debe de ser jpg o jpeg o png.";
		}else{
		   if(move_uploaded_file($_FILES['logo']['tmp_name'],$location)){
		   	$rupload_img = $mysqli->query("UPDATE `blog_publicaciones` SET `imagen`='$nombre_imagen' WHERE id=$id");
		   	if ($rupload_img) {
		   		echo "uploaded";
		   	}
		   }else{
		      echo "Ocurrió un error al subir el logo de la publicación. Intenta nuevamente.";
		   }
		}
	}

	function agregar_plantilla(){
		include_once("../private/conexion.php");

		$filename = $_FILES['plantilla']['name'];
		$titulo   = $_POST['titulo'];

		$ext = pathinfo($_FILES['plantilla']['name'], PATHINFO_EXTENSION);

		// $name_file = '_' . $id . '__' . $filename;
		// $name_file = uniqid() . '.' . $ext;
		$name_file = $_FILES['plantilla']['name'];

		$location = "../mail/plantillas/" . $name_file;
		if(move_uploaded_file($_FILES['plantilla']['tmp_name'],$location)){
			$rupload_img = $mysqli->query("INSERT INTO `plantillas_correo`(`id`, `titulo`, `plantilla`, `date_register`) VALUES (NULL,'$titulo','$name_file',NOW())");
			if ($rupload_img) {
				echo "uploaded";
			}else{
				echo "Err. " . $mysqli->error;
			}
		}else{
			echo "Ocurrió un error al subir. Intenta nuevamente.";
		}
	}

	function guardar_servicio(){
		include("../../../configuration/backend/private/conexion.php");

		$filename = $_FILES['imagen']['name'];
		$id       = $_POST['id'];

		$ext           = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
		$nombre_imagen = uniqid() . '.' . $ext;

		$location = "../../../uploads/imgs/servicios/" . $nombre_imagen;
		if(move_uploaded_file($_FILES['imagen']['tmp_name'],$location)){
			$rupload_img = $mysqli->query("UPDATE `servicios` SET `imagen`='$nombre_imagen' WHERE id=$id");
			if ($rupload_img) {
				echo "uploaded";
			}else{
				echo "Ocurrió un error al subir la imagen. Intenta nuevamente.";
			}
		}
	}

	function editar_servicio(){
		include("../../../configuration/backend/private/conexion.php");

		$filename = $_FILES['imagen_editar']['name'];
		$id       = $_POST['id'];

		$ext           = pathinfo($_FILES['imagen_editar']['name'], PATHINFO_EXTENSION);
		$nombre_imagen = uniqid() . '.' . $ext;

		$location = "../../../uploads/imgs/servicios/" . $nombre_imagen;
		if(move_uploaded_file($_FILES['imagen_editar']['tmp_name'],$location)){
			$rupload_img = $mysqli->query("UPDATE `servicios` SET `imagen`='$nombre_imagen' WHERE id=$id");
			if ($rupload_img) {
				echo "uploaded";
			}else{
				echo "Ocurrió un error al subir la imagen. Intenta nuevamente.";
			}
		}
	}

?>