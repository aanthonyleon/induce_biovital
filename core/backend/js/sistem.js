	function turn_on_cargando(){
	  console.log("cargador...");
	  boton = document.getElementById("cargador");
	  boton.style.display='block';
	}

	function turn_off_cargando(){
	  boton = document.getElementById("cargador");
	  boton.style.display='none';
	}

	function messageConfirmation(message,type){
		Swal.fire(
			'Aviso',
			message,
			type
		);
	}

	function redirection(page){
		setTimeout(function(){ location = page; }, 2000);
	}

	function message(title,type){
		Swal.fire({
		  position: 'top-center',
		  icon: type,
		  title: title,
		  showConfirmButton: false,
		  timer: 2000,
		  scrollbarPadding: false,
    	  heightAuto: false
	      // width: '3000px',
	      // height: '1000px'
	      // className: 'swal-wide'
		});
	}

	function message_buttons(){
		// Swal.fire({
		//   title: 'Qué deseas hacer?',
		//   showDenyButton: true,
		//   showCancelButton: true,
		//   confirmButtonText: `Agregar otra tienda`,
		//   denyButtonText: `Ver lista de tiendas`,
		// }).then((result) => {
		//   /* Read more about isConfirmed, isDenied below */
		//   if (result.isConfirmed) {
		//     location = "";
		//   } else if (result.isDenied) {
		//     location = "./list-companies.php";
		//   }
		// })

		const swalWithBootstrapButtons = Swal.mixin({
			  customClass: {
			    confirmButton: 'btn btn-danger',
			    cancelButton: 'btn btn-info'
			  },
			  buttonsStyling: false
			})

		swalWithBootstrapButtons.fire({
		  title: 'Tienda registrada',
		  text: "¿Qué deseas hacer?",
		  icon: 'success',
		  showCancelButton: true,
		  confirmButtonText: 'Ver lista de tiendas',
		  cancelButtonText: 'Agregar otra tienda',
		  reverseButtons: true
		}).then((result) => {
		  if (result.isConfirmed) {
		    location = "./list-companies.php";
		  } else if (
		    /* Read more about handling dismissals below */
		    result.dismiss === Swal.DismissReason.cancel
		  ) {
		    location = "";
		  }
		})
	}

	function message_buttons_product(){

		const swalWithBootstrapButtons = Swal.mixin({
			  customClass: {
			    confirmButton: 'btn btn-danger',
			    cancelButton: 'btn btn-info'
			  },
			  buttonsStyling: false
			})

		swalWithBootstrapButtons.fire({
		  title: 'Producto registrado',
		  text: "¿Qué deseas hacer?",
		  icon: 'success',
		  showCancelButton: true,
		  confirmButtonText: 'Ver lista de productos',
		  cancelButtonText: 'Agregar otro producto',
		  reverseButtons: true
		}).then((result) => {
		  if (result.isConfirmed) {
		    location = "./list-products.php";
		  } else if (
		    /* Read more about handling dismissals below */
		    result.dismiss === Swal.DismissReason.cancel
		  ) {
		    location = "";
		  }
		})
	}

	function message_buttons_2(){
		const swalWithBootstrapButtons = Swal.mixin({
			  customClass: {
			    confirmButton: 'btn btn-danger',
			    cancelButton: 'btn btn-info'
			  },
			  buttonsStyling: false
			})

		swalWithBootstrapButtons.fire({
		  title: 'Información de la tienda actualizada',
		  text: "¿Qué deseas hacer?",
		  icon: 'success',
		  showCancelButton: true,
		  confirmButtonText: 'Ver lista de tiendas',
		  cancelButtonText: 'Agregar otra tienda',
		  reverseButtons: true
		}).then((result) => {
		  if (result.isConfirmed) {
		    location = "./list-companies.php";
		  } else if (
		    /* Read more about handling dismissals below */
		    result.dismiss === Swal.DismissReason.cancel
		  ) {
		    location = "./add-company.php";
		  }
		})
	}

	function setDataTables(tabla){
	  $(tabla).DataTable().destroy();
	  $(tabla).DataTable( {
	  	  retrive: true,
	  	  destroy: true,
	      language: {
	            search: "B&uacute;squeda:",
	            processing: "Procesando...",
	            lengthMenu: "Filtrar _MENU_ registros",
	            info: "_START_ - _END_ de _TOTAL_ registros",
	            infoEmpty: "Visualización de 0 elementos",
	            infoFiltered: "(filtro de _MAX_ registros)",
	            infoPostFix: "",
	            loadingRecords: "Cargando...",
	            zeroRecords: "Nada sobre lo que escribir, mostrar",
	            emptyTable: "No hay datos disponibles en la tabla",
	            paginate: {
	                first: "Inicio",
	                previous: "Anterior",
	                next: "Siguiente",
	                last: "Final"
	            },
	            aria: {
	                sortAscending: ": activar para ordenar la columna en orden ascendente",
	                sortDescending: ": habilitar para ordenar la columna en orden descendente"
	            }
	        }
	  } );
	}

	function close_modal(modal){
		$('#' + modal).modal('hide');
	}

	function open_modal(modal){
		$('#' + modal).modal('show');
	}

	function toast(message,type){
		if (type === "error") {
			var color = "red"
		}else{
			var color = "green";
		}

		const Toast = Swal.mixin({
		  toast: true,
		  position: 'top',
		  showConfirmButton: false,
		  timer: 3000,
		  timerProgressBar: true,
		  background: color,
		  // customClass: {title: 'toast'},
		  // html: true,
		  didOpen: (toast) => {
		    toast.addEventListener('mouseenter', Swal.stopTimer)
		    toast.addEventListener('mouseleave', Swal.resumeTimer)
		  }
		});

		Toast.fire({
		  icon: type,
		  title: "<span style='color: white;'>" + message + "</span>"
		});
	}

	function description_clean_ascii(description){
		console.log("functon: ", description);
		description = description.replace(/&aacute;/gi, 'á');
		description = description.replace(/&eacute;/gi, 'é');	
		description = description.replace(/&iacute;/gi, 'í');
		description = description.replace(/&oacute;/gi, 'ó');
		description = description.replace(/&uacute;/gi, 'ú');
		description = description.replace(/&ntilde;/gi, 'ñ');

		description = description.replace(/aacute;/gi, 'á');
		description = description.replace(/eacute;/gi, 'é');	
		description = description.replace(/iacute;/gi, 'í');
		description = description.replace(/oacute;/gi, 'ó');
		description = description.replace(/uacute;/gi, 'ú');
		description = description.replace(/ntilde;/gi, 'ñ');
		description = description.replace(/&/gi, '');
		return description;
	}

	function imagenes_upload(work, id, imagen, pagina){
		console.log(work + ", " + id + ", " + imagen + ", " + pagina);
		
		var fd = new FormData();
		var files = $('#' + imagen)[0].files[0];
		fd.append(imagen, files);
		fd.append('id', id);
		fd.append('work', work);
		fd.append('pagina', pagina);

		console.log(JSON.stringify(fd));
		console.log(fd.get(imagen));
		console.log(fd);

		turn_on_cargando();
		console.log("Images cargador");

		$.ajax({
			data: fd,
			url:   '../../core/backend/process/controlador-imgs.php',
			type: 'POST',    
	        contentType: false,
	        processData: false,
	        beforeSend: function () {

	        },
	        error:  function () {
	        	messageConfirmation("ERROR, al conectarse al SERVIDOR DE IMAGENES...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("Images apagado");
	        	console.log("Img: " + data);
	    //     	if (data === "uploaded") {
	    //     		message("Imagen del entrenador subida", "success");
	    //     	}else{
					// message(data, "error");
	    //     	}
	        }
	    });
	}

	function imagenes_array_upload(work,id){
	   console.log("Images Array cargador");
	   turn_on_cargando();

	   var form_data = new FormData();
	   var totalfiles = document.getElementById('files').files.length;

	   for (var index = 0; index < totalfiles; index++) {
	      form_data.append("files[]", document.getElementById('files').files[index]);
	   }

	   form_data.append('id', id);
	   form_data.append('work', work);

	   $.ajax({
	     url: '../process/controlador-imgs.php',
	     type: 'POST',
	     data: form_data,
	     dataType: 'json',
	     contentType: false,
	     processData: false,
	     error:  function () {
	    	// messageConfirmation("ERROR, al conectarse al SERVIDOR DE IMAGENES...","error");
	        turn_off_cargando();
	     },
	     success: function (response) {

	     	turn_off_cargando();
	     	console.log("Images Array apagado");

	       for(var index = 0; index < response.length; index++) {
	         var src = response[index];

	         $('#preview').append('<div class="col-12 col-md-6"><img src="'+src+'" class="w-100"></div>');
	       }

	       document.getElementById('response-gallery').innerHTML = "Imágenes subidas (" + response.length + ")";

	     }
	   });
	}

	function imagenes_array_upload_r(work,id_img){
	   console.log("Images Array cargador work: " + work + ", id_img: " + id_img);
	   turn_on_cargando();

	   var form_data = new FormData();
	   var totalfiles = document.getElementById(id_img).files.length;

	   for (var index = 0; index < totalfiles; index++) {
	      form_data.append(id_img + "[]", document.getElementById(id_img).files[index]);
	   }

	   form_data.append('work', work);

	   $.ajax({
	     url: '../process/controlador-imgs.php',
	     type: 'POST',
	     data: form_data,
	     dataType: 'json',
	     contentType: false,
	     processData: false,
	     error:  function () {
	    	// messageConfirmation("ERROR, al conectarse al SERVIDOR DE IMAGENES...","error");
	        turn_off_cargando();
	     },
	     success: function (response) {

	     	turn_off_cargando();
	     	console.log("Images Array apagado");

	       for(var index = 0; index < response.length; index++) {
	         var src = response[index];

	         // $('#preview').append('<div class="col-12 col-md-6"><img src="'+src+'" class="w-100"></div>');
	       }

	       toast("Imagenes guardadas.");

	       // document.getElementById('response-gallery').innerHTML = "Imágenes subidas (" + response.length + ")";

	     }
	   });
	}

	function close_session(){
		message("Cerrando sesión","info");
		redirection("../process/close_session.php");
	}

	function login(){

		if ($('#username').val() !=""
			&& $('#password').val() !=""){

			let username = $('#username').val();
			let password = $('#password').val();

			turn_on_cargando();

			let data = "work=3&username=" + username +
						"&password=" + password;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "exist") {
						message("Accediendo...","success");
						setTimeout(function(){ redirection("./dashboard.php"); }, 1000);
		        	}else{
		        		message(data,"error");
		        	}

		        } 
		    });
			
		}else{

			document.getElementById('username').classList.add('is-invalid');
			document.getElementById('password').classList.add('is-invalid');
		}
	}

	function login_admin(){

		if ($('#username').val() !=""
			&& $('#password').val() !=""){

			let username = $('#username').val();
			let password = $('#password').val();

			turn_on_cargando();

			let data = {
				work: 'login_admin',
				username,
				password
			};
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));
		        	var data_check = data.split(",");

		        	if (data_check[0] === "exist") {
						message("Accediendo...","success");
						setTimeout(function(){ redirection("./pages/" + data_check[1]); }, 500);
		        	}else{
		        		message(data_check[0],"error");
		        	}

		        } 
		    });
			
		}else{
			message("Ingresa tus credenciales.","error");
		}
	}

	function save_header_footer(){

		let header = $('#header').val();
		let footer = $('#footer').val();

		turn_on_cargando();

		// '
		header = header.replace(/'/gi, "@...@");
		footer = footer.replace(/'/gi, "@...@");

		// &
		header = header.replace(/&/gi, "@.....@");
		footer = footer.replace(/&/gi, "@.....@");

		// +
		header = header.replace(/\+/gi, "@??@");
		footer = footer.replace(/\+/gi, "@??@");

		let data = "work=save_header_footer&header=" + header +
							"&footer=" + footer;

		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	if (data === "updated") {
	        		message("Links actualizados","success");
	        	}else{
	        		messageConfirmation(data,"error");
	        	}

	        } 
	    });
	}

	function agregar_cliente(){
		if (
			$('#nuevo_nombre').val()!=''
			&& $('#nuevo_telefono').val()!=''
				){

			let nuevo_nombre   = $('#nuevo_nombre').val();
			let nuevo_telefono = $('#nuevo_telefono').val();

			turn_on_cargando();

			let data1 = {
				work: 'agregar_cliente',
				nuevo_nombre,
				nuevo_telefono
			};
			console.log(data1);

			$.ajax({
		        data:  data1,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		    //     		document.getElementById('show-cliente').style.display = 'none';
						// document.getElementById('show-cliente2').style.display = 'block';
						// $('#id_cliente').val('');
						close_modal('modalAgregar');
						$('#nuevo_nombre').val('');
						$('#nuevo_telefono').val('');

		        		$("#tabla-clientes").load(location.href+" #tabla-clientes>*","");
						message("Cliente registrado.","success");
						redirection('./pages/clientes.php');

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Ingresa los datos solicitados.","error");
		}
	}

	function editar_cliente(){
		if (
			$('#editar_nombre').val()!=''
			&& $('#editar_telefono').val()!=''
			&& $('#editar_id').val()!=''
				){

			let nombre   = $('#editar_nombre').val();
			let telefono = $('#editar_telefono').val();
			let id = $('#editar_id').val();

			turn_on_cargando();

			let data1 = {
				work: 'editar_cliente',
				nombre,
				telefono,
				id
			};
			console.log(data1);

			$.ajax({
		        data:  data1,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "updated") {
		    //     		document.getElementById('show-cliente').style.display = 'none';
						// document.getElementById('show-cliente2').style.display = 'block';
						// $('#id_cliente').val('');
						close_modal('modalEditar');

		        		$("#tabla-clientes").load(location.href+" #tabla-clientes>*","");
						message("Cliente actualizado.","success");

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Ingresa los datos solicitados.","error");
		}
	}

	function eliminar_cliente(){
		if ($('#eliminar_id').val()!=""){

			let id = $('#eliminar_id').val();

			turn_on_cargando();

			let data = {
				work: 'eliminar_cliente',
				id
			};
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
						message("Cliente eliminado","success");
						redirection("./pages/clientes.php");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Selecciona el servicio.","error");
		}
	}

	function editar_propecto(id_prospecto){
		if (
			$('#nombre').val()!=''
			&& $('#apellidos').val()!=''
			&& $('#telefono_celular').val()!=''
			&& $('#email').val()!=''
			&& $('#estado_civil').val()!=undefined
			&& $('#estado').val()!=undefined
			&& $('#ciudad').val()!=undefined
			&& $('#colonia').val()!=''
			&& $('#calle').val()!=''
			&& $('#no_exterior').val()!=''
			// && $('#ine').val()!=''
			// && $('#rfc').val()!=''
			// && $('#curp').val()!=''
				){

			let nombre = $('#nombre').val();
			let apellidos = $('#apellidos').val();
			let telefono_celular = $('#telefono_celular').val();
			let email = $('#email').val();
			let estado_civil = $('#estado_civil').val();
			let estado = $('#estado').val();
			let ciudad = $('#ciudad').val();
			let colonia = $('#colonia').val();
			let calle = $('#calle').val();
			let no_exterior = $('#no_exterior').val();
			let ine = $('#ine').val();
			let rfc = $('#rfc').val();
			let curp = $('#curp').val();

			turn_on_cargando();

			let data1 = {
				work: 'editar_propecto',
				nombre,
				apellidos,
				telefono_celular,
				email,
				estado_civil,
				estado,
				ciudad,
				colonia,
				calle,
				no_exterior,
				ine,
				rfc,
				curp,
				id_prospecto
			};
			console.log(data1);

			$.ajax({
		        data:  data1,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "updated") {
		        		message("Información actualiada.","success");
						redirection("");

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Ingresa los datos solicitados.","error");
		}
	}

	function get_plantilla_correo(id){

		turn_on_cargando();

		var data = "work=get_plantilla_correo"
			     + "&id=" + id;

		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	$('#results').html(data);
	        	open_modal('modalEditar');

	        	setTimeout(function(){ 
	        		console.log(true);
	        		tinymce.init({
					    selector: "#kt_docs_tinymce_hidden2",
					    content_style: "@import url('https://fonts.googleapis.com/css?family=Poppins');",
					    menubar: false,
					    toolbar: ["styleselect fontselect fontsizeselect",
					        "undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify",
					        "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code"],
					    plugins : "advlist autolink link image lists charmap print preview code",
					    font_formats: "Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats, montserratregular; Poppins=poppins;"
					});
        		}, 3000);
		
	        } 
	    });
	}
	
	function editar_propecto_formulario(id_prospecto){

		if ($('#nombre').val()!=""
				&& $('#apellidos').val()!=""
				&& $('#empresa').val()!=""
				&& $('#direccion').val()!=""
				&& $('#puesto').val()!=""
				&& $('#email').val()!=""
				// && $('#telefono_oficina').val()!=""
				// && $('#telefono_celular').val()!=""
				){

			let nombre           = $('#nombre').val();
			let apellidos        = $('#apellidos').val();
			let empresa          = $('#empresa').val();
			let direccion        = $('#direccion').val();
			let puesto           = $('#puesto').val();
			let email            = $('#email').val();
			let telefono_oficina = $('#telefono_oficina').val();
			let telefono_celular = $('#telefono_celular').val();
			let extencion = $('#extencion').val();

			turn_on_cargando();

			var data = "work=15&nombre=" + nombre +
						"&apellidos=" + apellidos +
						"&empresa=" + empresa +
						"&direccion=" + direccion +
						"&puesto=" + puesto +
						"&email=" + email +
						"&telefono_oficina=" + telefono_oficina +
						"&extencion=" + extencion +
						"&telefono_celular=" + telefono_celular +
						"&id_prospecto=" + id_prospecto;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "updated") {
		        		message("Información del prospecto actualizada","success");
						redirection("");

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Ingresa los datos solicitados.","error");
		}
	}

	function opciones_plantilla_correo(option,id,rol){
		if (option === "editar") {
			get_plantilla_correo(id);
		}else if (option === "tag") {
			document.getElementById('id_prospect_tag').value = id;
			open_modal('modalTagProspect');
		}
	}

	function options_propect(option,id,rol){
		if (option === "edit") {
			// message("Cargando información del prospecto...","info");
			// redirection("./details-prospect.php?_id=" + id);
			location = "./detalles-prospecto.php?_id=" + id + "&_rol=" + rol;
		}else if (option === "tag") {
			document.getElementById('id_prospect_tag').value = id;
			open_modal('modalTagProspect');
		}
	}

	function option_recibo_pago(option,id,rol){
		if (option === "edit") {
			// message("Cargando información del prospecto...","info");
			// redirection("./details-prospect.php?_id=" + id);
			location = "./detalles-prospecto.php?_id=" + id + "&_rol=" + rol;
		}else if (option === "status") {
			document.getElementById('id_status').value = id;
			open_modal('modalStatus');
		}
	}

	function options_service(option,id){
		if (option === "edit") {
			service_details(id);
		}else if (option === "delete") {
			document.getElementById('id_delete_service').value = id;
			open_modal('modalDeleteService');
		}
	}

	function options_list(option,id,lista){
		if (option === "edit") {
			list_details(id,lista);
		}else if (option === "delete") {
			document.getElementById('id_delete_list').value = id;
			open_modal('modalDeleteList');
		}
	}
	
	function options_listas_notas(option,id,lista){
		if (option === "edit") {
			lista_notas_details(id,lista);
		}else if (option === "delete") {
			document.getElementById('id_delete_list').value = id;
			open_modal('modalDeleteList');
		}
	}

	function options_notas(option,id){
	    console.log(options_notas,option,id);
		if (option === "edit") {
			nota_gral_details(id);
		}else if (option === "delete") {
			document.getElementById('id_delete').value = id;
			open_modal('modalDeleteNote');
		}
	}

	function options_notas_prospect(option,id){
		if (option === "edit") {
			nota_details(id);
		}else if (option === "delete") {
			document.getElementById('id_delete_note').value = id;
			open_modal('modalDeleteNote');
		}
	}

	function options_users(option,id){
		if (option === "edit") {
			users_details(id);
		}else if (option === "delete") {
			document.getElementById('id_delete').value = id;
			open_modal('modalDelete');
		}
	}

	function options_equipo(option,id){
		if (option === "edit") {
			equipo_details(id);
		}else if (option === "delete") {
			document.getElementById('id_delete').value = id;
			open_modal('modalDelete');
		}
	}

	function options_cuadrilla(option,id){
		if (option === "edit") {
			cuadrilla_details(id);
		}else if (option === "delete") {
			document.getElementById('id_delete').value = id;
			open_modal('modalDelete');
		}
	}

	function options_equipo_proteccion(option,id){
		if (option === "edit") {
			equipo_proteccion_details(id);
		}else if (option === "delete") {
			document.getElementById('id_delete_equipo').value = id;
			open_modal('modalDeleteEquipo');
		}
	}

	function options_equipo_prospecto(option,id){
		if (option === "delete") {
			document.getElementById('id_equipo_prospecto').value = id;
			open_modal('modalDeleteEquipo');
		}
	}

	function options_cuadrilla_prospecto(option,id){
		if (option === "delete") {
			document.getElementById('id_cuadrilla_prospecto').value = id;
			open_modal('modalDeleteCuadrilla');
		}
	}

	function options_equipo_proteccion_prospecto(option,id){
		if (option === "delete") {
			document.getElementById('id_equipo_proteccion_prospecto').value = id;
			open_modal('modalDeleteEquipoProteccion');
		}
	}

	function option_contacto_prospecto(option,id){
		if (option === "edit") {
			// message("Cargando información del prospecto...","info");
			// redirection("./details-prospect.php?_id=" + id);
			location = "./details-prospect.php?_id=" + id;
		}else if (option === "delete") {
			document.getElementById('id_delete_contact').value = id;
			open_modal('modalDeleteContact');
		}
	}

	function option_facturacion_prospecto(option,id,id_prospecto){
		if (option === "edit") {
			// message("Cargando información del prospecto...","info");
			// redirection("./details-prospect.php?_id=" + id);
			location = "./details-prospect.php?_id=" + id;
		}else if (option === "delete") {
			document.getElementById('id_delete_facturacion').value = id;
			open_modal('modalDeleteFacturacion');
		}
		else if (option === "checkbox") {
			set_facturacion_choose(id,id_prospecto);
		}
	}

	function option_adicional_prospecto(option,id){
		if (option === "edit") {
			// message("Cargando información del prospecto...","info");
			// redirection("./details-prospect.php?_id=" + id);
			location = "./details-prospect.php?_id=" + id;
		}else if (option === "delete") {
			document.getElementById('id_delete_adicional').value = id;
			open_modal('modalDeleteDatoAdicional');
		}
	}

	function nota_details(id_nota){
		turn_on_cargando();

		var data = "work=41&id_nota=" + id_nota;
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();

	        	$('#edit-note').html(data);
	        	open_modal('modalEditNote');

	        } 
	    });
	}

	function nota_gral_details(id_nota){
		turn_on_cargando();

		var data = "work=45&id_nota=" + id_nota;
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();

	        	$('#edit-note').html(data);
	        	open_modal('modalEditNote');

	        } 
	    });
	}

	function users_details(id_user){
		turn_on_cargando();

		var data = "work=62&id_user=" + id_user;
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();

	        	$('#show-edit').html(data);
	        	open_modal('modalEdit');

	        } 
	    });
	}

	function equipo_details(id_equipo){
		turn_on_cargando();

		var data = "work=34&id_equipo=" + id_equipo;
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();

	        	$('#show').html(data);
	        	open_modal('modalEdit');

	        } 
	    });
	}

	function cuadrilla_details(id_cuadrilla){
		turn_on_cargando();

		var data = "work=37&id_cuadrilla=" + id_cuadrilla;
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();

	        	$('#show').html(data);
	        	open_modal('modalEdit');

	        } 
	    });
	}

	function equipo_proteccion_details(id_equipo){
		turn_on_cargando();

		var data = "work=53&id_equipo=" + id_equipo;
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();

	        	$('#show-equipo').html(data);
	        	open_modal('modalEditEquipo');

	        } 
	    });
	}

	function editar_equipo(id_equipo){
		if ($('#equipo-' + id_equipo).val() !=""
			&& $('#modelo-' + id_equipo).val() !=""
			&& $('#placas-' + id_equipo).val() !=""
			&& $('#descripcion-' + id_equipo).val() != ""
			&& $('#accesorios-' + id_equipo).val() != ""
			&& $('#equipo_seguridad-' + id_equipo).val() != ""
			&& $('#herramientas-' + id_equipo).val() != ""
			// && $('#fotografia-' + id_equipo).val() != ""
			){

			let equipo = $('#equipo-' + id_equipo).val();
			let modelo = $('#modelo-' + id_equipo).val();
			let placas = $('#placas-' + id_equipo).val();

			let descripcion      = $('#descripcion-' + id_equipo).val();
			let accesorios       = $('#accesorios-' + id_equipo).val();
			let equipo_seguridad = $('#equipo_seguridad-' + id_equipo).val();
			let herramientas     = $('#herramientas-' + id_equipo).val();

			turn_on_cargando();

			var data = "work=35&equipo=" + equipo 
								+ "&modelo=" + modelo 
								+ "&placas=" + placas
								+ "&descripcion=" + descripcion
								+ "&accesorios=" + accesorios
								+ "&equipo_seguridad=" + equipo_seguridad
								+ "&herramientas=" + herramientas
								+ "&id_equipo=" + id_equipo;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "updated") {
		        		imagenes_upload("3", id_equipo, "fotografia-" + id_equipo);

		        		setTimeout(function(){ 
		        			turn_off_cargando();

		        			close_modal("modalEdit");
							message("Información del equipo actualizado.","success");
							redirection("");
		        		}, 2000);

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Completa los datos solicitados, intenta nuevamente.","error");
		}
	}

	function editar_cuadrilla(id_cuadrilla){
		if ($('#cuadrilla-' + id_cuadrilla).val() !=""){

			let cuadrilla = $('#cuadrilla-' + id_cuadrilla).val();

			turn_on_cargando();

			var data = "work=38&cuadrilla=" + cuadrilla + "&id_cuadrilla=" + id_cuadrilla;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "updated") {
		        		close_modal("modalEdit");
						message("Información del personal actualizada.","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Completa los datos solicitados, intenta nuevamente.","error");
		}
	}

	function editar_equipo_proteccion(id_equipo){
		if ($('#equipo-' + id_equipo).val() !=""){

			let equipo = $('#equipo-' + id_equipo).val();

			turn_on_cargando();

			var data = "work=54&equipo=" + equipo + "&id_equipo=" + id_equipo;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "updated") {
		        		close_modal("modalEditEquipo");
						message("Información del equipo actualizada.","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Completa los datos solicitados, intenta nuevamente.","error");
		}
	}

	function editar_nota(id_nota){
		if ($('#nota').val() !=""){

			let nota = $('#nota').val();

			turn_on_cargando();

			var data = "work=42&nota=" + nota + "&id_nota=" + id_nota;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "updated") {
		        		$("#check-notes").load(location.href+" #check-notes>*","");
		        		close_modal("modalEditNote");
						message("Información de la nota actualizada.","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Completa los datos solicitados, intenta nuevamente.","error");
		}
	}

	function editar_nota_gral(id_nota){
		if ($('#editar_nota').val() !="" && $('#id_nota_editar').val()!=""){

			let nota = $('#editar_nota').val();
			let id   = $('#id_nota_editar').val();

			nota = nota.replace(/(?:\r\n|\r|\n)/g, '<br>');

			turn_on_cargando();

			var data = "work=editar_nota_gral"
							+ "&nota=" + nota 
							+ "&id=" + id;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "updated") {
		        		close_modal("modalEditar");
						message("Información de la condición actualizada.","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Escribe la condición.","error");
		}
	}

    function delete_list(){
		if ($('#id_delete_list').val()!=""){

			let id_delete_list = $('#id_delete_list').val();
			turn_on_cargando();

			var data = "work=75&id_delete=" + id_delete_list;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		close_modal("modalDeleteList");
						message("Lista eliminada","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}
	
	function delete_list_notas(){
		if ($('#id_delete_list').val()!=""){

			let id_delete_list = $('#id_delete_list').val();
			turn_on_cargando();

			var data = "work=delete_list_notas&id_delete=" + id_delete_list;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		close_modal("modalDeleteList");
						message("Lista eliminada","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}
	
	function delete_user(){
		if ($('#id_delete').val()!=""){

			let id_delete = $('#id_delete').val();
			turn_on_cargando();

			var data = "work=64&id_delete= " + id_delete;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		close_modal("modalDelete");
						message("Usuario eliminado","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}

	function delete_equipo(){
		if ($('#id_delete').val()!=""){

			let id_delete = $('#id_delete').val();
			turn_on_cargando();

			var data = "work=36&id_delete= " + id_delete;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		close_modal("modalDelete");
						message("Equipo eliminado","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}

	function delete_cuadrilla(){
		if ($('#id_delete').val()!=""){

			let id_delete = $('#id_delete').val();
			turn_on_cargando();

			var data = "work=39&id_delete= " + id_delete;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		close_modal("modalDelete");
						message("Cuadrilla eliminada","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}

	function delete_equipo_proteccion(){
		if ($('#id_delete_equipo').val()!=""){

			let id_delete = $('#id_delete_equipo').val();
			turn_on_cargando();

			var data = "work=55&id_delete= " + id_delete;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		close_modal("modalDeleteEquipo");
						message("Equipo de protección eliminado.","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}

	function eliminar_nota(){
		if ($('#id_delete').val()!=""){

			let id_delete = $('#id_delete').val();
			turn_on_cargando();

			var data = "work=eliminar_nota&id_delete=" + id_delete;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		close_modal("modalDeleteNote");
						message("Condición eliminada.","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}

	function eliminar_compraventa(id_prospecto){
		if ($('#compraventa_id_delete').val()!=""){

			let id_delete = $('#compraventa_id_delete').val();
			turn_on_cargando();

			let data = {
				work: 'eliminar_compraventa',
				id_delete
			};
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		close_modal("modalDelete");
						message("Registro eliminado.","success");
						$("#refresh-content").load(location.href+" #refresh-content>*","");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}

	function delete_cuadrilla_prospecto(id_servicio,id_prospecto){
		if ($('#id_cuadrilla_prospecto').val()!=""){

			let id_cuadrilla_prospecto = $('#id_cuadrilla_prospecto').val();
			turn_on_cargando();

			var data = "work=33&id_prospecto=" + id_prospecto + "&id=" + id_cuadrilla_prospecto + "&id_servicio=" + id_servicio;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		close_modal("modalDeleteCuadrilla");
						message("Cuadrilla eliminada","success");
						$("#check-cuadrilla").load(location.href+" #check-cuadrilla>*","");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}

	function delete_equipo_proteccion_prospecto(id_servicio,id_prospecto){
		if ($('#id_equipo_proteccion_prospecto').val()!=""){

			let id_equipo = $('#id_equipo_proteccion_prospecto').val();
			turn_on_cargando();

			var data = "work=57&id_prospecto=" + id_prospecto 
								+ "&id=" + id_equipo 
								+ "&id_servicio=" + id_servicio;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		close_modal("modalDeleteEquipoProteccion");
						message("Equipo de protección eliminado.","success");
						$("#check-equipo-proteccion").load(location.href+" #check-equipo-proteccion>*","");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}

	function delete_equipo_prospecto(id_servicio,id_prospecto){
		if ($('#id_equipo_prospecto').val()!=""){

			let id_equipo_prospecto = $('#id_equipo_prospecto').val();
			turn_on_cargando();

			var data = "work=32&id_prospecto=" + id_prospecto + "&id=" + id_equipo_prospecto + "&id_servicio=" + id_servicio;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		close_modal("modalDeleteEquipo");
						message("Equipo eliminado","success");
						$("#check-equipo").load(location.href+" #check-equipo>*","");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}

	function delete_propecto_facturacion(id_prospecto){
		if ($('#id_delete_facturacion').val()!=""){

			let id_delete_facturacion = $('#id_delete_facturacion').val();
			turn_on_cargando();

			let data = "work=delete_propecto_facturacion"
							+ "&id_prospecto=" + id_prospecto 
							+ "&id=" + id_delete_facturacion;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		close_modal("modalDeleteFacturacion");
						message("Dato de facturación eliminado","success");
						$("#check-facturacion").load(location.href+" #check-facturacion>*","");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}

	function agregar_servicio(){
		if (
			$('#servicio_nombre').val()!=""
			&& $('#tipo').val()!=""
			// && $('#no_doctor').val()!=""
			// && $('#no_spa').val()!=""
		){

			let nombre      = $('#servicio_nombre').val();
			let descripcion = $('#servicio_descripcion').val();
			let tipo = $('#tipo').val();
			let no_doctor = $('#no_doctor').val();
			let no_spa = $('#no_spa').val();
			turn_on_cargando();

			let data = {
				work: 'agregar_servicio',
				nombre,
				descripcion,
				no_doctor,
				no_spa,
				tipo
			};
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "registered") {
		        		close_modal("modalServicios");

						message("Servicio registrado.","success");
						$("#id_servicio").load(location.href+" #id_servicio>*","");
						$("#tabla-servicios").load(location.href+" #tabla-servicios>*","");

						$('#servicio_nombre').val('');
						$('#servicio_descripcion').val('');
						redirection('./pages/servicios.php');
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Ingresa los datos solicitados.","error");
		}
	}

	function editar_servicio(){
		if (
			$('#editar_id').val()!=""
			&& $('#editar_nombre').val()!=""
		){

			let nombre      = $('#editar_nombre').val();
			let descripcion = $('#editar_descripcion').val();
			let id          = $('#editar_id').val();

			turn_on_cargando();

			let data = {
				work: 'editar_servicio',
				nombre,
				descripcion,
				id
			};
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "updated") {
		        		close_modal("modalEditar");

						message("Servicio actualizado.","success");
						$("#tabla-servicios").load(location.href+" #tabla-servicios>*","");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Ingresa los datos solicitados.","error");
		}
	}

	function eliminar_servicio(){
		if ($('#eliminar_id').val()!=""){

			let id = $('#eliminar_id').val();

			turn_on_cargando();

			let data = {
				work: 'eliminar_servicio',
				id
			};
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
						message("Servicio eliminado","success");
						redirection("./pages/servicios.php");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Selecciona el servicio.","error");
		}
	}

	function delete_brief(){
		if ($('#id_eliminar').val()!=""){

			let id_prospecto = $('#id_eliminar').val();

			turn_on_cargando();

			var data = "work=delete_brief&id_prospecto=" + id_prospecto;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
						message("Formulario eliminado","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Selecciona el formulario.","error");
		}
	}

	function delete_cliente(id_cliente){

		turn_on_cargando();

		var data = "work=6&id_cliente=" + id_cliente;
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	if (data === "deleted") {
					message("Cliente eliminado","success");
					redirection("./clientes.php");
	        	}else{
	        		messageConfirmation(data,"error");
	        	}

	        } 
	    });
	}


	function prospect_add_service(id_prospecto,code_name){
		if ($('#id_servicio').val()!=""){

			let id_servicio = $('#id_servicio').val();

			turn_on_cargando();

			var data = "work=2&id_servicio=" + id_servicio +
						"&id_prospecto=" + id_prospecto +
						"&code_name=" + code_name;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$("#check").load(location.href+" #check>*","");
		        		$('#modalAddService').modal('hide');
						message("Servicio agregado","success");

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Selecciona el servicio.","error");
		}
	}

	function prospect_add_service_write(id_prospecto){
		if ($('#nombre_servicio').val()!=undefined
			// && $('#precio_servicio').val()!=''
			&& $('#descripcion_servicio').val()!=''
			){

			let nombre      = $('#nombre_servicio').val();
			let descripcion = $('#descripcion_servicio').val();


			turn_on_cargando();

			let data = {
				work: 'prospect_add_service_write',
				nombre,
				descripcion,
				id_prospecto
			};

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$('#modalAddService').modal('hide');
						message("Servicio agregado","success");
						redirection('');
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Completa los datos de servicio.","error");
		}
	}

	function prospect_add_service_to_list(id_prospecto,id_servicio_code){
		if ($('#id_servicio_new').val()!=undefined){

			let id_servicio = $('#id_servicio_new').val();

			turn_on_cargando();

			let data = "work=prospect_add_service_to_list"
						+ "&id_servicio_code=" + id_servicio_code
						+ "&id_prospecto=" + id_prospecto
						+ "&id_servicio=" + id_servicio;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$("#check-list-services").load(location.href+" #check-list-services>*","");
		        		$('#modalNuevoServicio').modal('hide');
						message("Servicio agregado","success");
						redirection('');
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Selecciona el servicio.","error");
		}
	}

	function cliente_add_service(id_cliente){
		if ($('#id_servicio').val()!=""){

			let id_servicio = $('#id_servicio').val();

			turn_on_cargando();

			var data = "work=7&id_servicio=" + id_servicio +
						"&id_cliente=" + id_cliente;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$("#check").load(location.href+" #check>*","");
		        		$('#modalAddService').modal('hide');
						message("Servicio agregado","success");

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Selecciona el servicio.","error");
		}
	}

	function prospect_add_adicional(id_prospecto){
		if ($('#dato_adicional').val()!=""
			&& $('#fecha_adicional').val()!=""
			&& $('#hora_adicional').val()!=""
			){

			let dato_adicional  = $('#dato_adicional').val();
			let fecha_adicional = $('#fecha_adicional').val();
			let hora_adicional  = $('#hora_adicional').val();

			turn_on_cargando();

			let data = "work=prospect_add_adicional"
						+ "&dato_adicional=" + dato_adicional
						+ "&fecha=" + fecha_adicional
						+ "&hora=" + hora_adicional						
						+ "&id_prospecto=" + id_prospecto;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$("#check-adicionales").load(location.href+" #check-adicionales>*","");
		        		$('#modalAddDatoAdicional').modal('hide');
						message("Dato adicional agregado","success");

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Escribe la nota, fecha y hora.","error");
		}
	}
	
	function prospect_add_adicional_formulario(id_prospecto){
		if ($('#dato_adicional').val()!=""){

			let dato_adicional = $('#dato_adicional').val();

			turn_on_cargando();

			var data = "work=12&dato_adicional=" + dato_adicional +
						"&id_prospecto=" + id_prospecto;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$("#check-adicionales").load(location.href+" #check-adicionales>*","");
		        		$('#modalAddDatoAdicional').modal('hide');
						message("Dato adicional agregado","success");

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Escribe el dato adicional.","error");
		}
	}

	function tag_prospect(tag){
		if ($('#id_prospect_tag').val()!=""){

			let id = $('#id_prospect_tag').val();

			turn_on_cargando();

			var data = "work=4&id=" + id +
						"&tag=" + tag;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "updated") {
		        		$("#check").load(location.href+" #check>*","");
		        		$('#modalTagProspect').modal('hide');
						message("Etiqueta modificada","success");

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Error, intenta nuevamente.","error");
		}	
	}

	function status_recibo_dashboard(status){
		if ($('#id_recibo_status').val()!=""){

			let id = $('#id_recibo_status').val();
			let metodo_pago = "";
			let bandera = false;

			if(status == 'Pagado'){
				if ($('#metodos_pago_recibo').val()!=undefined){
					metodo_pago = $('#metodos_pago_recibo').val();
					bandera = true;
				}else{
					bandera = false;
				}
			}else{
				bandera = true;
			}

			let data = {
				work: 'status_recibo_dashboard',
				id,
				status,
				metodo_pago
			};
			console.log(data);

			if(bandera){
				turn_on_cargando();

				$.ajax({
			        data:  data,
			        url:   '../../core/backend/process/controlador.php',
			        type:  'POST',
			        beforeSend: function () {

			        },
			        error:  function () {
			            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
			            turn_off_cargando();
			        },
			        success: function(data){
			        	turn_off_cargando();
			        	console.log("RESPONSE: " + JSON.stringify(data));
			        	var data_check = data.split(",");

						let id_servicio         = data_check[1];
						let id_prospecto        = data_check[2];
						let codigo              = data_check[3];
						let fecha               = data_check[4];
						let id_recibo           = data_check[5];
						let descuento           = data_check[6];
						let check_descuento_iva = data_check[7];

			        	if (data_check[0] === "updated") {
							// message("Status actualizado.","success");
							// redirection('');

							update_pdf_recibo_pago(id,id_prospecto,id_servicio,codigo);
              				message("Status actualizado","success");

              				setTimeout(function () {
						      $("#lista-recibos").load(location.href + " #lista-recibos>*", "");
						    }, 7000);
			        	}else if (data_check[0] === "updated2") {
			    //     		let url = "./docs/pdf/recibo-pago.php?_id_p_s=" + data_check[1] 
							// 			+ "&_id_prospecto=" + data_check[2]
							// 			+ "&codigo=" + data_check[3]
							// 			+ "&fecha=" + data_check[4]
							// 			+ "&id_recibo=" + data_check[5]
							// 			+ "&descuento=" + data_check[6]
							// 			+ "&check_descuento_iva=" + data_check[7];

							// window.open(url,"_blank"); 
							// setTimeout(function(){ redirection(''); }, 5000 );

							update_pdf_recibo_pago(id,id_prospecto,id_servicio,codigo);
				            message("Status actualizado","success");

							setTimeout(function(){
							    let url = "../../configuration/backend/docs/pdf/recibo-pago.php?_id_p_s=" + data_check[1] 
							      + "&_id_prospecto=" + data_check[2]
							      + "&codigo=" + data_check[3]
							      + "&fecha=" + data_check[4]
							      + "&id_recibo=" + data_check[5]
							      + "&descuento=" + data_check[6]
							      + "&check_descuento_iva=" + data_check[7];

							// window.open(url,"_blank");
							// // setTimeout(function(){ redirection(''); }, 5000 );

							var modalContent = document.getElementById("modalContentRecibo");
							  modalContent.src = url;

							  let url2 = "https://induce.mx/configuration/backend/docs/pdf/recibo-pago.php?_id_p_s=" + data_check[1] 
							      + "&_id_prospecto=" + data_check[2]
							      + "&codigo=" + data_check[3]
							      + "&fecha=" + data_check[4]
							      + "&id_recibo=" + data_check[5]
							      + "&descuento=" + data_check[6]
							      + "&check_descuento_iva=" + data_check[7];
							  console.log("url2", url2);
							  document.getElementById('downloadButtonRecibo').href = url2;
							$('#modalChargeContentRecibo').modal('show');
							}, 5000);

							setTimeout(function () {
							  $("#lista-recibos").load(location.href + " #lista-recibos>*", "");
							}, 7000);
			        	}else{
			        		messageConfirmation(data,"error");
			        	}

			        } 
			    });
			}else{
				message("Selecciona el método de pago.","info");
			}
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}

	function status_recibo_pago(status,id_prospecto,id_servicio,codigo){
		if ($('#id_status').val()!=""){

			let id = $('#id_status').val();
			let metodo_pago = "";
			let bandera = false;

			if(status == 'Pagado'){
				if ($('#metodos_pago_recibo_status').val()!=undefined){
					metodo_pago = $('#metodos_pago_recibo_status').val();
					bandera = true;
				}else{
					bandera = false;
				}
			}else{
				bandera = true;
			}

			if(bandera){
				turn_on_cargando();

				let data = {
					work: 'status_recibo_pago',
					id,
					status,
					metodo_pago
				};

				console.log(data);

				$.ajax({
			        data:  data,
			        url:   '../../core/backend/process/controlador.php',
			        type:  'POST',
			        beforeSend: function () {

			        },
			        error:  function () {
			            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
			            turn_off_cargando();
			        },
			        success: function(data){
			        	turn_off_cargando();
			        	console.log("RESPONSE: " + JSON.stringify(data));

			        	var data_check = data.split(",");

			        	if (data_check[0] === "updated") {
							update_pdf_recibo_pago(id,id_prospecto,id_servicio,codigo);
							message("Status actualizado","success");

							setTimeout(function () {
						      $("#lista-recibos").load(location.href + " #lista-recibos>*", "");
						    }, 7000);
			        	}else if (data_check[0] === "updated2") {
			        		update_pdf_recibo_pago(id,id_prospecto,id_servicio,codigo);
							message("Status actualizado","success");

							setTimeout(function(){
				        		let url = "../../configuration/backend/docs/pdf/recibo-pago.php?_id_p_s=" + data_check[1] 
											+ "&_id_prospecto=" + data_check[2]
											+ "&codigo=" + data_check[3]
											+ "&fecha=" + data_check[4]
											+ "&id_recibo=" + data_check[5]
											+ "&descuento=" + data_check[6]
											+ "&check_descuento_iva=" + data_check[7];

								// window.open(url,"_blank");
								// // setTimeout(function(){ redirection(''); }, 5000 );

								var modalContent = document.getElementById("modalContentRecibo");
							    modalContent.src = url;

							    let url2 = "https://induce.mx/configuration/backend/docs/pdf/recibo-pago.php?_id_p_s=" + data_check[1] 
											+ "&_id_prospecto=" + data_check[2]
											+ "&codigo=" + data_check[3]
											+ "&fecha=" + data_check[4]
											+ "&id_recibo=" + data_check[5]
											+ "&descuento=" + data_check[6]
											+ "&check_descuento_iva=" + data_check[7];
							    console.log("url2", url2);
							    document.getElementById('downloadButtonRecibo').href = url2;
								$('#modalChargeContentRecibo').modal('show');
							}, 5000);

							setTimeout(function () {
						      $("#lista-recibos").load(location.href + " #lista-recibos>*", "");
						    }, 7000);
			        	}else{
			        		messageConfirmation(data,"error");
			        	}


			    //     	if (data === "updated") {
			    //     		update_pdf_recibo_pago(id,id_prospecto,id_servicio,codigo);
							// message("Status actualizado","success");
			    //     	}else{
			    //     		messageConfirmation(data,"error");
			    //     	}

			        } 
			    });
			}else{
				message("Selecciona el método de pago.","info");
			}
			
		}else{
			message("Error, intenta nuevamente.","error");
		}	
	}

	function update_pdf_recibo_pago(id,id_prospecto,id_servicio,codigo){
		let url_n = "../../configuration/backend/docs/pdf/recibo-pago-update.php?_id_recibo=" + id 
						+ "&_id_prospecto=" + id_prospecto
						+ "&_id_servicio=" + id_servicio
						+ "&_codigo=" + codigo;
		// window.open(url_n,"_blank");
		// redirection('');

		var modalContent = document.getElementById("modalContent");
	    modalContent.src = url_n;

	    let url2_n = "https://induce.mx/configuration/backend/docs/pdf/recibo-pago-update.php?_id_recibo=" + id 
						+ "&_id_prospecto=" + id_prospecto
						+ "&_id_servicio=" + id_servicio
						+ "&_codigo=" + codigo;
	    console.log("url2_n", url2_n);
	    document.getElementById('downloadButton').href = url2_n;
		$('#modalChargeContent').modal('show');
	}

	function prospect_add_contact(id){
		if ($('#nombre_contacto').val() != ""
			&& $('#puesto_contacto').val() != ""
			&& $('#correo_contacto').val() != ""
			&& $('#telefono_contacto').val() != ""
			&& $('#extencion_contacto').val() != ""
			){

			let nombre_contacto    = $('#nombre_contacto').val();
			let puesto_contacto    = $('#puesto_contacto').val();
			let correo_contacto    = $('#correo_contacto').val();
			let telefono_contacto  = $('#telefono_contacto').val();
			let extencion_contacto = $('#extencion_contacto').val();

			turn_on_cargando();

			var data = "work=prospect_add_contact"
						+ "&nombre_contacto=" + nombre_contacto
						+ "&puesto_contacto=" + puesto_contacto
						+ "&correo_contacto=" + correo_contacto
						+ "&telefono_contacto=" + telefono_contacto
						+ "&extencion_contacto=" + extencion_contacto
						+ "&id=" + id;


			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$("#check-contacts").load(location.href+" #check-contacts>*","");
		        		$('#modalAddContact').modal('hide');
						message("Contacto agregado","success");

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Completa los datos del contacto.","error");
		}	
	}
	
	function prospect_add_contact_formulario(id){
		if ($('#nombre_contacto').val() != ""
			&& $('#puesto_contacto').val() != ""
			&& $('#correo_contacto').val() != ""
			&& $('#telefono_contacto').val() != ""
			&& $('#extencion_contacto').val() != ""
			){

			let nombre_contacto = $('#nombre_contacto').val();
			let puesto_contacto = $('#puesto_contacto').val();
			let correo_contacto = $('#correo_contacto').val();
			let telefono_contacto = $('#telefono_contacto').val();
			let extencion_contacto = $('#extencion_contacto').val();

			turn_on_cargando();

			var data = "work=8&nombre_contacto=" + nombre_contacto +
				"&puesto_contacto=" + puesto_contacto +
				"&correo_contacto=" + correo_contacto +
				"&telefono_contacto=" + telefono_contacto +
				"&extencion_contacto=" + extencion_contacto +
				"&id=" + id;


			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$("#check-contacts").load(location.href+" #check-contacts>*","");
		        		$('#modalAddContact').modal('hide');
						message("Contacto agregado","success");

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Completa los datos del contacto.","error");
		}	
	}

	function prospect_add_facturacion(id){
		if ($('#rfc_facturacion').val() != ""
			&& $('#nombre_facturacion').val() != ""
			&& $('#domicilio_facturacion').val() != ""
			&& $('#cp_facturacion').val() != ""
			&& $('#poblacion_facturacion').val() != ""
			&& $('#telefono_facturacion').val() != ""
			&& $('#correo_facturacion').val() != ""
			&& $('#metodopago_facturacion').val() != undefined
			&& $('#cfdi_facturacion').val() != undefined){

			let rfc_facturacion        = $('#rfc_facturacion').val();
			let nombre_facturacion     = $('#nombre_facturacion').val();
			let domicilio_facturacion  = $('#domicilio_facturacion').val();
			let cp_facturacion         = $('#cp_facturacion').val();
			let poblacion_facturacion  = $('#poblacion_facturacion').val();
			let telefono_facturacion   = $('#telefono_facturacion').val();
			let correo_facturacion     = $('#correo_facturacion').val();
			let metodopago_facturacion = $('#metodopago_facturacion').val();
			let cfdi_facturacion       = $('#cfdi_facturacion').val();

			turn_on_cargando();

			var data = "work=prospect_add_facturacion"
						+ "&rfc_facturacion=" + rfc_facturacion
						+ "&nombre_facturacion=" + nombre_facturacion
						+ "&domicilio_facturacion=" + domicilio_facturacion
						+ "&cp_facturacion=" + cp_facturacion
						+ "&poblacion_facturacion=" + poblacion_facturacion
						+ "&telefono_facturacion=" + telefono_facturacion
						+ "&correo_facturacion=" + correo_facturacion
						+ "&metodopago_facturacion=" + metodopago_facturacion
						+ "&cfdi_facturacion=" + cfdi_facturacion
						+ "&id=" + id;


			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$("#check-facturacion").load(location.href+" #check-facturacion>*","");
		        		$('#modalAddFacturacion').modal('hide');
						message("Dato de facturación agregada","success");

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Completa los datos de facturación.","error");
		}	
	}

	function prospect_add_facturacion_page(id){
		if ($('#rfc_facturacion').val() != ""
			&& $('#nombre_facturacion').val() != ""
			&& $('#domicilio_facturacion').val() != ""
			&& $('#cp_facturacion').val() != ""
			&& $('#poblacion_facturacion').val() != ""
			&& $('#telefono_facturacion').val() != ""
			&& $('#correo_facturacion').val() != ""
			&& $('#metodopago_facturacion').val() != undefined
			&& $('#cfdi_facturacion').val() != undefined){

			let rfc_facturacion        = $('#rfc_facturacion').val();
			let nombre_facturacion     = $('#nombre_facturacion').val();
			let domicilio_facturacion  = $('#domicilio_facturacion').val();
			let cp_facturacion         = $('#cp_facturacion').val();
			let poblacion_facturacion  = $('#poblacion_facturacion').val();
			let telefono_facturacion   = $('#telefono_facturacion').val();
			let correo_facturacion     = $('#correo_facturacion').val();
			let metodopago_facturacion = $('#metodopago_facturacion').val();
			let cfdi_facturacion       = $('#cfdi_facturacion').val();

			turn_on_cargando();

			var data = "work=prospect_add_facturacion_page"
						+ "&rfc_facturacion=" + rfc_facturacion
						+ "&nombre_facturacion=" + nombre_facturacion
						+ "&domicilio_facturacion=" + domicilio_facturacion
						+ "&cp_facturacion=" + cp_facturacion
						+ "&poblacion_facturacion=" + poblacion_facturacion
						+ "&telefono_facturacion=" + telefono_facturacion
						+ "&correo_facturacion=" + correo_facturacion
						+ "&metodopago_facturacion=" + metodopago_facturacion
						+ "&cfdi_facturacion=" + cfdi_facturacion
						+ "&id=" + id;


			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../sistema/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$("#check-facturacion").load(location.href+" #check-facturacion>*","");
		        		$('#modalAddFacturacion').modal('hide');
						message("Dato de facturación agregada","success");

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Completa los datos de facturación.","error");
		}	
	}
	
	function prospect_add_facturacion_formulario(id){
		if ($('#rfc_facturacion').val() != ""
			&& $('#nombre_facturacion').val() != ""
			&& $('#domicilio_facturacion').val() != ""
			&& $('#cp_facturacion').val() != ""
			&& $('#poblacion_facturacion').val() != ""
			&& $('#telefono_facturacion').val() != ""
			&& $('#correo_facturacion').val() != ""
			&& $('#metodopago_facturacion').val() != ""
			&& $('#cfdi_facturacion').val() != ""){

			let rfc_facturacion = $('#rfc_facturacion').val();
			let nombre_facturacion = $('#nombre_facturacion').val();
			let domicilio_facturacion = $('#domicilio_facturacion').val();
			let cp_facturacion = $('#cp_facturacion').val();
			let poblacion_facturacion = $('#poblacion_facturacion').val();
			let telefono_facturacion = $('#telefono_facturacion').val();
			let correo_facturacion = $('#correo_facturacion').val();
			let metodopago_facturacion = $('#metodopago_facturacion').val();
			let cfdi_facturacion = $('#cfdi_facturacion').val();

			turn_on_cargando();

			var data = "work=9&rfc_facturacion=" + rfc_facturacion +
						"&nombre_facturacion=" + nombre_facturacion +
						"&domicilio_facturacion=" + domicilio_facturacion +
						"&cp_facturacion=" + cp_facturacion +
						"&poblacion_facturacion=" + poblacion_facturacion +
						"&telefono_facturacion=" + telefono_facturacion +
						"&correo_facturacion=" + correo_facturacion +
						"&metodopago_facturacion=" + metodopago_facturacion +
						"&cfdi_facturacion=" + cfdi_facturacion +
						"&id=" + id;


			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$("#check-facturacion").load(location.href+" #check-facturacion>*","");
		        		$('#modalAddFacturacion').modal('hide');
						message("Dato de facturación agregada","success");

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Completa los datos de facturación.","error");
		}	
	}

	function send_mail_contact(){

		if ($('#nombre').val()!=""
				&& $('#apellidos').val()!=""
				&& $('#empresa').val()!=""
				&& $('#email').val()!=""
				&& $('#telefono').val()!=""
				&& $('#mensaje').val()!=""
				){

			let nombre    = $('#nombre').val();
			let apellidos = $('#apellidos').val();
			let empresa   = $('#empresa').val();
			let direccion = "No registrada";
			let email     = $('#email').val();
			let telefono_oficina = $('#telefono').val();
			let telefono_celular = "No registrado";
			let mensaje   = $('#mensaje').val();
			let puesto = "pagina_web";
			
			let publicidad    = $('#publicidad').val();

			turn_on_cargando();

			var data = "work=14&nombre=" + nombre +
						"&apellidos=" + apellidos +
						"&empresa=" + empresa +
						"&direccion=" + direccion +
						"&puesto=" + puesto +
						"&email=" + email +
						"&telefono_oficina=" + telefono_oficina +
						"&telefono_celular=" + telefono_celular +
						"&mensaje=" + mensaje
						"&publicidad=" + publicidad;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        	    send_mail(nombre,apellidos,empresa,email,telefono_oficina,mensaje);
                        $('#nombre').val("");
                        $('#apellidos').val("");
                        $('#empresa').val("");
                        $('#email').val("");
                        $('#telefono').val("");
                        $('#mensaje').val("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Ingresa los datos solicitados.","error");
		}
	}

	function send_mail(nombre,apellidos,empresa,email,telefono,mensaje){
		turn_on_cargando();

		var data = "nombre=" + nombre +
					"&apellidos=" + apellidos +
					"&empresa=" + empresa +
					"&email=" + email +
					"&telefono=" + telefono +
					"&mensaje=" + mensaje;

		console.log(data);

		$.ajax({
	        data:  data,
	        url:   './process/envio.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	if (data === "sent") {
					messageConfirmation("Tu mensaje fue enviado, pronto estaremos en contacto contigo.","info");
	        	}else{
	        		messageConfirmation(data,"error");
	        	}

	        } 
	    });
	}

	function option_contacto_cliente(option,id){
		if (option === "edit") {
			// message("Cargando información del cliente...","info");
			// redirection("./details-client.php?_id=" + id);
			location = "./details-client.php?_id=" + id;
		}else if (option === "delete") {
			document.getElementById('id_delete_contact').value = id;
			open_modal('modalDeleteContact');
		}
	}

	function option_service_prospect(option,id_servicio){
		if (option === "description") {
			get_description_service(id_servicio);
		}else if (option === "delete") {
			document.getElementById('id_servicio_delete').value = id_servicio;
			$('#modalDeleteService').modal('show');
		}
    }

	function option_facturacion_cliente(option,id){
		if (option === "edit") {
			// message("Cargando información del cliente...","info");
			// redirection("./details-client.php?_id=" + id);
			location = "./details-client.php?_id=" + id;
		}else if (option === "delete") {
			document.getElementById('id_delete_facturacion').value = id;
			open_modal('modalDeleteFacturacion');
		}
	}

	function option_adicional_cliente(option,id){
		if (option === "edit") {
			// message("Cargando información del cliente...","info");
			// redirection("./details-client.php?_id=" + id);
			location = "./details-client.php?_id=" + id;
		}else if (option === "delete") {
			document.getElementById('id_delete_adicional').value = id;
			open_modal('modalDeleteDatoAdicional');
		}
	}

    function get_description_service(id_servicio){
		turn_on_cargando();

		var data = "work=26&id_servicio=" + id_servicio;
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	var data_check = data.split("|_|");

	        	document.getElementById('descripcion').innerHTML = data_check[0];
	        	document.getElementById('descripcion_up').innerHTML = data_check[1];
	        	document.getElementById('id_servicio_modificar').value = id_servicio;
	        	document.getElementById('ids_lista').value = data_check[2];
	        	
      			$('#modalDescripcion').modal('show');

	        } 
	    });
	}

	function get_description_service_update(id_servicio){
		turn_on_cargando();

		var data = "work=50&id_servicio=" + id_servicio;
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	var data_check = data.split("|_|");

	        	document.getElementById('descripcion').innerHTML = data_check[0];
	        	document.getElementById('descripcion_up').innerHTML = data_check[1];
	        	document.getElementById('id_servicio_modificar').value = id_servicio;
      			$('#modalDescripcion').modal('show');

	        } 
	    });
	}

	function get_description_service_update_otro(id_servicio){
		turn_on_cargando();

		var data = "work=66&id_servicio=" + id_servicio;
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	document.getElementById('descripcion_otro').innerHTML = data;
	        	document.getElementById('id_servicio_modificar_otro').value = id_servicio;
      			$('#modalDescripcionOtro').modal('show');

	        } 
	    });
	}

	function get_contratos_recibo_pago(id_prospecto,id_servicio){
		turn_on_cargando();

		let data = "work=get_contratos_recibo_pago"
						+ "&id_prospecto=" + id_prospecto
						+ "&id_servicio=" + id_servicio;
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	document.getElementById('data-contrato').innerHTML = data;
      			$('#modalReciboPago').modal('show');

	        } 
	    });
	}

	function eliminar_prospecto_servicio(id_cliente){
		if ($('#id_servicio_delete').val()!=""){

			let id_servicio_delete = $('#id_servicio_delete').val();
			turn_on_cargando();

			var data = "work=eliminar_prospecto_servicio&id_servicio=" + id_servicio_delete;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		close_modal("modalDeleteService");
						message("Servicio eliminado","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}

	function delete_servicio_code(id_prospecto){
		if ($('#id_delete_servicio').val()!=""){

			let id = $('#id_delete_servicio').val();
			turn_on_cargando();

			let data = "work=delete_servicio_code"
							+ "&id_prospecto=" + id_prospecto
							+ "&id=" + id;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		close_modal("modalDeleteService");
						message("Servicio eliminado.","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}

	function eliminar_prospecto_nota(id_cliente){
		if ($('#id_delete_note').val()!=""){

			let id_delete_note = $('#id_delete_note').val();
			turn_on_cargando();

			let data = "work=eliminar_prospecto_nota&id_delete=" + id_delete_note;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		$("#check-notes").load(location.href+" #check-notes>*","");
		        		close_modal("modalDeleteNote");
						message("Condición eliminada.","success");
						// redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}

	function delete_cliente_contacto(id_cliente){
		if ($('#id_delete_contact').val()!=""){

			let id_delete_contact = $('#id_delete_contact').val();
			turn_on_cargando();

			var data = "work=17&id_cliente=" + id_cliente + "&id=" + id_delete_contact;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		close_modal("modalDeleteContact");
						message("Contacto eliminado","success");
						$("#check-contacts").load(location.href+" #check-contacts>*","");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}

	function delete_cliente_facturacion(id_cliente){
		if ($('#id_delete_facturacion').val()!=""){

			let id_delete_facturacion = $('#id_delete_facturacion').val();
			turn_on_cargando();

			var data = "work=18&id_cliente=" + id_cliente + "&id=" + id_delete_facturacion;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		close_modal("modalDeleteFacturacion");
						message("Dato de facturación eliminado","success");
						$("#check-facturacion").load(location.href+" #check-facturacion>*","");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}

	function delete_cliente_adicional(id_cliente){
		if ($('#id_delete_adicional').val()!=""){

			let id_delete_adicional = $('#id_delete_adicional').val();
			turn_on_cargando();

			var data = "work=19&id_cliente=" + id_cliente + "&id=" + id_delete_adicional;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		close_modal("modalDeleteDatoAdicional");
						message("Dato adicional eliminado","success");
						$("#check-adicionales").load(location.href+" #check-adicionales>*","");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}

	function delete_cliente(id_cliente){

		turn_on_cargando();

		var data = "work=20&id_cliente=" + id_cliente;
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	if (data === "deleted") {
					message("cliente eliminado","success");
					redirection("./admin.php");
	        	}else{
	        		messageConfirmation(data,"error");
	        	}

	        } 
	    });
	}

	function client_add_adicional(id_cliente){
		if ($('#dato_adicional').val()!=""){

			let dato_adicional = $('#dato_adicional').val();

			turn_on_cargando();

			var data = "work=21&dato_adicional=" + dato_adicional +
						"&id_cliente=" + id_cliente;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$("#check-adicionales").load(location.href+" #check-adicionales>*","");
		        		$('#modalAddDatoAdicional').modal('hide');
						message("Dato adicional agregado","success");

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Escribe el dato adicional.","error");
		}
	}

	function client_add_contact(id){
		if ($('#nombre_contacto').val() != ""
			&& $('#puesto_contacto').val() != ""
			&& $('#correo_contacto').val() != ""
			&& $('#telefono_contacto').val() != ""){

			let nombre_contacto = $('#nombre_contacto').val();
			let puesto_contacto = $('#puesto_contacto').val();
			let correo_contacto = $('#correo_contacto').val();
			let telefono_contacto = $('#telefono_contacto').val();

			turn_on_cargando();

			var data = "work=22&nombre_contacto=" + nombre_contacto +
				"&puesto_contacto=" + puesto_contacto +
				"&correo_contacto=" + correo_contacto +
				"&telefono_contacto=" + telefono_contacto +
				"&id=" + id;


			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$("#check-contacts").load(location.href+" #check-contacts>*","");
		        		$('#modalAddContact').modal('hide');
						message("Contacto agregado","success");

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Completa los datos del contacto.","error");
		}	
	}

	function client_add_facturacion(id){
		if ($('#rfc_facturacion').val() != ""
			&& $('#nombre_facturacion').val() != ""
			&& $('#domicilio_facturacion').val() != ""
			&& $('#cp_facturacion').val() != ""
			&& $('#poblacion_facturacion').val() != ""
			&& $('#telefono_facturacion').val() != ""
			&& $('#correo_facturacion').val() != ""
			&& $('#metodopago_facturacion').val() != ""
			&& $('#cfdi_facturacion').val() != ""){

			let rfc_facturacion = $('#rfc_facturacion').val();
			let nombre_facturacion = $('#nombre_facturacion').val();
			let domicilio_facturacion = $('#domicilio_facturacion').val();
			let cp_facturacion = $('#cp_facturacion').val();
			let poblacion_facturacion = $('#poblacion_facturacion').val();
			let telefono_facturacion = $('#telefono_facturacion').val();
			let correo_facturacion = $('#correo_facturacion').val();
			let metodopago_facturacion = $('#metodopago_facturacion').val();
			let cfdi_facturacion = $('#cfdi_facturacion').val();

			turn_on_cargando();

			var data = "work=23&rfc_facturacion=" + rfc_facturacion +
						"&nombre_facturacion=" + nombre_facturacion +
						"&domicilio_facturacion=" + domicilio_facturacion +
						"&cp_facturacion=" + cp_facturacion +
						"&poblacion_facturacion=" + poblacion_facturacion +
						"&telefono_facturacion=" + telefono_facturacion +
						"&correo_facturacion=" + correo_facturacion +
						"&metodopago_facturacion=" + metodopago_facturacion +
						"&cfdi_facturacion=" + cfdi_facturacion +
						"&id=" + id;


			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$("#check-facturacion").load(location.href+" #check-facturacion>*","");
		        		$('#modalAddFacturacion').modal('hide');
						message("Dato de facturación agregada","success");

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Completa los datos de facturación.","error");
		}	
	}

	function guardar_prospecto_servicio(id_servicio){

		if ($('#id_servicio_modificar').val() != ""
			&& $('#unidad_medida_servicio').val() != ""
			&& $('#precio_servicio').val() != ""){

			let descripcion            = $('#descripcion').html();
			let id_servicio_modificar  = $('#id_servicio_modificar').val();
			let unidad_medida_servicio = $('#unidad_medida_servicio').val();
			let precio_servicio        = $('#precio_servicio').val();
			let cantidad_servicio      = $('#cantidad_servicio').val();

			let ids_lista = $('#ids_lista').val();

			let inputs = $('#descripcion > input');
			let selects_1 = $('#descripcion > select[name="lista_1"]');
			let selects_2 = $('#descripcion > select[name="lista_2"]');
			let selects_c = $('#descripcion > select[name="lista_c"]');
			let selects_d = $('#descripcion > select[name="lista_d"]');
			let selects = $('#descripcion > select');

			// console.log("ids_lista: " + ids_lista[0].valor);
			// console.log("ids_lista: " + ids_lista);
			// console.log("ids_lista: ",ids_lista[0].valor);

			console.log("inputs: " + inputs);

			// LISTA A
			// for ( key_a in selects_a){
			// 	if (isNaN(key_a)) {
			// 		break;
			// 	}
			// 	console.log("selects_a: " , selects_a[key_a].value);

			// 	// if (descripcion.includes('<select><option value="" disabled="" selected="">Selecciona una medida</option><option value="METROS LINEALES">METROS LINEALES</option><option value="KILOMETROS">KILOMETROS</option><option value="M3">M3</option><option value="M2">M2</option><option value="KILOS">KILOS</option><option value="TONELADAS">TONELADAS</option><option value="LITROS">LITROS</option><option value="PULGADAS">PULGADAS</option><option value="CM">CM</option></select>')) {
			// 		// alert("lista a");
			// 		descripcion = descripcion.replace('<select><option value="" disabled="" selected="">Selecciona una medida</option><option value="METROS LINEALES">METROS LINEALES</option><option value="KILOMETROS">KILOMETROS</option><option value="M3">M3</option><option value="M2">M2</option><option value="KILOS">KILOS</option><option value="TONELADAS">TONELADAS</option><option value="LITROS">LITROS</option><option value="PULGADAS">PULGADAS</option><option value="CM">CM</option></select>', selects_a[key_a].value);
			// 	// }
			// 	// else if (descripcion.includes('<select><option value="" disabled="" selected="">Selecciona una medida</option><option value="PLANTA DE TRATAMIENTO">PLANTA DE TRATAMIENTO</option><option value="FOSA SEPTICA">FOSA SEPTICA</option><option value="BIODIGESTOR">BIODIGESTOR</option><option value="CARCAMO">CARCAMO</option><option value="TRAMPA DE GRASA">TRAMPA DE GRASA</option><option value="POZOS DE ABSORCION">POZOS DE ABSORCION</option><option value="POZOS ARTESANALES">POZOS ARTESANALES</option><option value="REGILLAS">REGILLAS</option><option value="REGISTROS">REGISTROS</option><option value="TANQUE DE TORMENTA">TANQUE DE TORMENTA</option><option value="TRAMPAS DE RETENSION DE LODOS">TRAMPAS DE RETENSION DE LODOS</option><option value="LINEA Y RED DE DRENAJE">LINEA Y RED DE DRENAJE</option><option value="BAJADAS PLUVIALES">BAJADAS PLUVIALES</option><option value="TARJAS">TARJAS</option><option value="LAVABOS">LAVABOS</option><option value="DRENAJE SANITARIO">DRENAJE SANITARIO</option><option value="COLADERAS DE PISO">COLADERAS DE PISO</option><option value="BAÑERAS">BAÑERAS</option><option value="WC">WC</option><option value="TUBERIAS DE AGUA POTABLE">TUBERIAS DE AGUA POTABLE</option></select>')) {
			// 		// alert("lista b");
			// 		descripcion = descripcion.replace('<select><option value="" disabled="" selected="">Selecciona una medida</option><option value="PLANTA DE TRATAMIENTO">PLANTA DE TRATAMIENTO</option><option value="FOSA SEPTICA">FOSA SEPTICA</option><option value="BIODIGESTOR">BIODIGESTOR</option><option value="CARCAMO">CARCAMO</option><option value="TRAMPA DE GRASA">TRAMPA DE GRASA</option><option value="POZOS DE ABSORCION">POZOS DE ABSORCION</option><option value="POZOS ARTESANALES">POZOS ARTESANALES</option><option value="REGILLAS">REGILLAS</option><option value="REGISTROS">REGISTROS</option><option value="TANQUE DE TORMENTA">TANQUE DE TORMENTA</option><option value="TRAMPAS DE RETENSION DE LODOS">TRAMPAS DE RETENSION DE LODOS</option><option value="LINEA Y RED DE DRENAJE">LINEA Y RED DE DRENAJE</option><option value="BAJADAS PLUVIALES">BAJADAS PLUVIALES</option><option value="TARJAS">TARJAS</option><option value="LAVABOS">LAVABOS</option><option value="DRENAJE SANITARIO">DRENAJE SANITARIO</option><option value="COLADERAS DE PISO">COLADERAS DE PISO</option><option value="BAÑERAS">BAÑERAS</option><option value="WC">WC</option><option value="TUBERIAS DE AGUA POTABLE">TUBERIAS DE AGUA POTABLE</option></select>', selects_a[key_a].value);
			// 	// }
			// 	// else if (descripcion.includes('<select><option value="" disabled="" selected="">Selecciona una medida</option><option value="PERIODO">PERIODO</option><option value="JORNADA">JORNADA</option></select>')) {
			// 		// alert("lista c");
			// 		descripcion = descripcion.replace('<select><option value="" disabled="" selected="">Selecciona una medida</option><option value="PERIODO">PERIODO</option><option value="JORNADA">JORNADA</option></select>', selects_a[key_a].value);
			// 	// }
			// 	// else if (descripcion.includes('<select><option value="" disabled="" selected="">Selecciona una medida</option><option value="DIA">DIA</option><option value="SEMANA">SEMANA</option><option value="MES">MES</option><option value="HORAS">HORAS</option></select>')) {
			// 		// alert("lista d");
			// 		descripcion = descripcion.replace('<select><option value="" disabled="" selected="">Selecciona una medida</option><option value="DIA">DIA</option><option value="SEMANA">SEMANA</option><option value="MES">MES</option><option value="HORAS">HORAS</option></select>', selects_a[key_a].value);
			// 	// }

			// }

			descripcion = descripcion.replace(/select>/, '_%');

			for (key in selects){
				if (isNaN(key)) {
					break;
				}
				console.log("selects: " , selects[key].value);
				let medida = '<span class="text-success">' + selects[key].value + '</span>';
				descripcion = descripcion.replace(/<select.*_%/, medida);
				console.log("descripcion: " + descripcion);

				descripcion = descripcion.replace(/select>/, '_%');
			}

			// // LISTA A
			// for ( key_a in selects_a){
			// 	if (isNaN(key_a)) {
			// 		break;
			// 	}
			// 	console.log("selects_a: " , selects_a[key_a].value);
			// 	let medida_a = '<span class="text-success">' + selects_a[key_a].value + '</span>';
			// 	descripcion = descripcion.replace('<select name="lista_a"><option value="" disabled="" selected="">Selecciona una medida</option><option value="METROS LINEALES">METROS LINEALES</option><option value="KILOMETROS">KILOMETROS</option><option value="M3">M3</option><option value="M2">M2</option><option value="KILOS">KILOS</option><option value="TONELADAS">TONELADAS</option><option value="LITROS">LITROS</option><option value="PULGADAS">PULGADAS</option><option value="CM">CM</option></select>', medida_a);
			// }

			// LISTA B
			// for ( key_b in selects_b){
			// 	if (isNaN(key_b)) {
			// 		break;
			// 	}
			// 	console.log("selects_b: " , selects_b[key_b].value);
			// 	let medida_b = '<span class="text-success">' + selects_b[key_b].value + '</span>'
			// 	descripcion = descripcion.replace('<select name="lista_b"><option value="" disabled="" selected="">Selecciona una medida</option><option value="PLANTA DE TRATAMIENTO">PLANTA DE TRATAMIENTO</option><option value="FOSA SEPTICA">FOSA SEPTICA</option><option value="BIODIGESTOR">BIODIGESTOR</option><option value="CARCAMO">CARCAMO</option><option value="TRAMPA DE GRASA">TRAMPA DE GRASA</option><option value="POZOS DE ABSORCION">POZOS DE ABSORCION</option><option value="POZOS ARTESANALES">POZOS ARTESANALES</option><option value="REGILLAS">REGILLAS</option><option value="REGISTROS">REGISTROS</option><option value="TANQUE DE TORMENTA">TANQUE DE TORMENTA</option><option value="TRAMPAS DE RETENSION DE LODOS">TRAMPAS DE RETENSION DE LODOS</option><option value="LINEA Y RED DE DRENAJE">LINEA Y RED DE DRENAJE</option><option value="BAJADAS PLUVIALES">BAJADAS PLUVIALES</option><option value="TARJAS">TARJAS</option><option value="LAVABOS">LAVABOS</option><option value="DRENAJE SANITARIO">DRENAJE SANITARIO</option><option value="COLADERAS DE PISO">COLADERAS DE PISO</option><option value="BAÑERAS">BAÑERAS</option><option value="WC">WC</option><option value="TUBERIAS DE AGUA POTABLE">TUBERIAS DE AGUA POTABLE</option></select>', medida_b);
			// }

			// // LISTA C
			// for ( key_c in selects_c){
			// 	if (isNaN(key_c)) {
			// 		break;
			// 	}
			// 	console.log("selects_c: " , selects_c[key_c].value);
			// 	let medida_c = '<span class="text-success">' + selects_c[key_c].value + '</span>'
			// 	descripcion = descripcion.replace('<select name="lista_c"><option value="" disabled="" selected="">Selecciona una medida</option><option value="PERIODO">PERIODO</option><option value="JORNADA">JORNADA</option></select>', medida_c);
			// }

			// // LISTA D
			// for ( key_d in selects_d){
			// 	if (isNaN(key_d)) {
			// 		break;
			// 	}
			// 	console.log("selects_d: " , selects_d[key_d].value);
			// 	let medida_d = '<span class="text-success">' + selects_d[key_d].value + '</span>'
			// 	descripcion = descripcion.replace('<select name="lista_d"><option value="" disabled="" selected="">Selecciona una medida</option><option value="DIA">DIA</option><option value="SEMANA">SEMANA</option><option value="MES">MES</option><option value="HORAS">HORAS</option></select>', medida_d);
			// }

			// VALOR
			for ( key in inputs){
				if (isNaN(key)) {
					break;
				}
				console.log("inputs: " , inputs[key].value);

				let valor = '<span class="text-success">' + inputs[key].value + '</span>'
				descripcion = descripcion.replace('<input type="text" id="" placeholder="Valor" value="">', valor); 
			}

			turn_on_cargando();

			var data = "work=24&descripcion=" + descripcion +
						"&id_servicio=" + id_servicio_modificar +
						"&unidad_medida_servicio=" + unidad_medida_servicio +
						"&precio_servicio=" + precio_servicio +
						"&cantidad_servicio=" + cantidad_servicio;

			console.log("final: " + descripcion);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "updated") {
		        		$('#modalDescripcion').modal('hide');
						message("Información del servicio actualizada.","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Selecciona la unidad y precio del servicio.","error");
		}	
	}

	function guardar_equipo(){
		if ($('#equipo').val() != ""
			&& $('#modelo').val() != ""
			&& $('#placas').val() != ""
			&& $('#descripcion').val() != ""
			&& $('#accesorios').val() != ""
			&& $('#equipo_seguridad').val() != ""
			&& $('#herramientas').val() != ""
			&& $('#fotografia').val() != ""){

			let equipo = $('#equipo').val();
			let modelo = $('#modelo').val();
			let placas = $('#placas').val();

			let descripcion      = $('#descripcion').val();
			let accesorios       = $('#accesorios').val();
			let equipo_seguridad = $('#equipo_seguridad').val();
			let herramientas     = $('#herramientas').val();

			descripcion      = descripcion.replace(/(?:\r\n|\r|\n)/g, '<br>');
			accesorios       = accesorios.replace(/(?:\r\n|\r|\n)/g, '<br>');
			equipo_seguridad = equipo_seguridad.replace(/(?:\r\n|\r|\n)/g, '<br>');
			herramientas     = herramientas.replace(/(?:\r\n|\r|\n)/g, '<br>');

			turn_on_cargando();

			var data = "work=28&equipo=" + equipo +
						"&modelo=" + modelo +
						"&placas=" + placas +
						"&descripcion=" + descripcion +
						"&accesorios=" + accesorios +
						"&equipo_seguridad=" + equipo_seguridad +
						"&herramientas=" + herramientas;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	console.log("RESPONSE: " + JSON.stringify(data));
		        	var data_check = data.split(",");

		        	if (data_check[0] === "added") {

		        		imagenes_upload("2", data_check[1], "fotografia");

		        		setTimeout(function(){ 
		        			turn_off_cargando();

		        			$('#modalAddTeam').modal('hide');
							message("Datos del equipo agregados.","success");
							redirection("");
		        		}, 2000);
		        	}else{
		        		messageConfirmation(data_check[0],"error");
		        	}

		        } 
		    });
			
		}else{
			message("Completa los datos del equipo.","error");
		}	
	}

	function guardar_cuadrilla(){
		if ($('#cuadrilla').val() != ""){

			let cuadrilla = $('#cuadrilla').val();
			turn_on_cargando();

			var data = "work=29&cuadrilla=" + cuadrilla;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$('#modalAddCuadrilla').modal('hide');
						message("Nombre del personal agregada.","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Completa el nombre de la cuadrilla.","error");
		}
	}

	function guardar_equipo_proteccion(){
		if ($('#equipo').val() != ""){

			let equipo = $('#equipo').val();
			turn_on_cargando();

			var data = "work=52&equipo=" + equipo;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$('#modalAddEquipo').modal('hide');
						message("Equipo de protección agregado.","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Completa el nombre del equipo.","error");
		}
	}

	function guardar_nota(){
		if ($('#nota').val() != ""
			// && $('#id_lista').val() != undefined
			){

			let nota = $('#nota').val();
			turn_on_cargando();

			nota = nota.replace(/(?:\r\n|\r|\n)/g, '<br>');

			var data = "work=guardar_nota"
						+ "&nota=" + nota;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$('#modalCondiciones').modal('hide');
						message("Condición agregada.","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Completa la condición.","error");
		}
	}

	function agregar_lista(){
		if ($('#lista_nombre').val() != ""){

			let lista_nombre = $('#lista_nombre').val();
			turn_on_cargando();

			var data = "work=agregar_lista&lista_nombre=" + lista_nombre;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
						message("Lista de nota agregada.","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Completa el nombre de la lista.","error");
		}
	}

	function agregar_equipo_prospecto(id_servicio,id_prospecto){
		if ($('#equipo_selected').val() != ""){

			let equipo_selected = $('#equipo_selected').val();
			turn_on_cargando();

			var data = "work=30&equipo_selected=" + equipo_selected + "&id_prospecto=" + id_prospecto + "&id_servicio=" + id_servicio;


			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$("#check-equipo").load(location.href+" #check-equipo>*","");
		        		// $('#modalAddEquipo').modal('hide');
						message("Equipo agregado.","success");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Completa el nombre de la cuadrilla.","error");
		}
	}

	function agregar_cuadrilla_prospecto(id_servicio,id_prospecto){
		if ($('#cuadrilla_selected').val() != undefined && $('#cantidad_cuadrilla').val() != ""){

			let cuadrilla_selected = $('#cuadrilla_selected').val();
			let cantidad = $('#cantidad_cuadrilla').val();

			turn_on_cargando();

			var data = "work=31&cuadrilla_selected=" + cuadrilla_selected + "&cantidad=" + cantidad + "&id_prospecto=" + id_prospecto + "&id_servicio=" + id_servicio;


			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$('#cuadrilla_selected').val("");
		        		$('#cantidad_cuadrilla').val("");
		        		$("#check-cuadrilla").load(location.href+" #check-cuadrilla>*","");
		        		// $('#modalAddCuadrilla').modal('hide');
						// message("Cuadrilla agregada.","success");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Selecciona el personal y la cantidad.","error");
		}
	}

	function agregar_equipo_proteccion_prospecto(id_servicio,id_prospecto){
		if ($('#equipo_proteccion_selected').val() != undefined){

			let id_equipo = $('#equipo_proteccion_selected').val();

			turn_on_cargando();

			var data = "work=56&id_equipo=" + id_equipo 
							+ "&id_prospecto=" + id_prospecto 
							+ "&id_servicio=" + id_servicio;


			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$("#check-equipo-proteccion").load(location.href+" #check-equipo-proteccion>*","");
		        		// $('#modalAddCuadrilla').modal('hide');
						// message("Cuadrilla agregada.","success");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Completa el nombre de la cuadrilla.","error");
		}
	}

	function agregar_nota_prospecto(id_prospecto,id_servicio){
		if ($('#condiciones').val() != ""){

			let condiciones = $('#condiciones').val();

			turn_on_cargando();

			condiciones = condiciones.replace(/(?:\r\n|\r|\n)/g, '<br>');

			let data = "work=agregar_nota_prospecto"
						+ "&condiciones=" + condiciones
						+ "&id_prospecto=" + id_prospecto 
						+ "&id_servicio=" + id_servicio;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$('#id_lista').val('');
		        		$("#check-notes").load(location.href+" #check-notes>*","");
		        		// $('#modalAddNote').modal('hide');
						message("Condición agregada.","success");
						// redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Ingresa las condiciones.","error");
		}
	}

	function agregar_nota_adicional(){
		if ($('#nota').val() != ""){

			let nota = $('#nota').val();

			turn_on_cargando();

			nota = nota.replace(/(?:\r\n|\r|\n)/g, '<br>');

			let data = "work=agregar_nota_adicional"
						+ "&nota=" + nota;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "registered") {
		        		$('#nota').val('');
		        		$("#tabla-notas").load(location.href+" #tabla-notas>*","");
		        		$('#modalAgregarNota').modal('hide');
						message("Nota agregada.","success");
						// redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Ingresa la nota.","error");
		}
	}

	function status_nota_adicional(id_nota){

		let status = "";

		if (document.getElementById('check-nota-' + id_nota).checked == true) {
			status = "true";
		}else{
			status = "false";
		}

		turn_on_cargando();

		let data = "work=status_nota_adicional"
					+ "&status=" + status
					+ "&id_nota=" + id_nota;

		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	if (data === "updated") {
	        		$("#tabla-notas").load(location.href+" #tabla-notas>*","");
					message("Status actualizado.","success");
					// redirection("");
	        	}else{
	        		messageConfirmation(data,"error");
	        	}

	        } 
	    });
	}

	function agregar_nota_prospecto_lista(id_servicio,id_prospecto){
		if ($('#id_lista').val() != undefined){

			let id_lista = $('#id_lista').val();
			turn_on_cargando();

			var data = "work=agregar_nota_prospecto_lista&id_lista=" + id_lista + "&id_prospecto=" + id_prospecto + "&id_servicio=" + id_servicio;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$("#check-notes").load(location.href+" #check-notes>*","");
		        		// $('#modalAddNote').modal('hide');
						message("Lista de nota agregada.","success");
						// redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Selecciona la lista.","error");
		}
	}

	function crear_orden_compra_prospecto(_id_prospecto,_id_p_s,codigo){

		let check_descuento = document.getElementById('check-descuento');
    	let descuento       = document.getElementById('descuento').value;
    	let check_iva       = document.getElementById('check-iva');
    	let tiempoMaximo    = document.getElementById('tiempoMaximo').value;

    	let check_descuento_iva = "";

    	if (check_descuento.checked == true) {
    		if (check_iva.checked == true) {
	    		check_descuento_iva = "true1";
	    	}else{
	    		check_descuento_iva = "true2";
	    	}
    	}else{
    		if (check_iva.checked == true) {
	    		check_descuento_iva = "true3";
	    	}else{
	    		check_descuento_iva = "true4";
	    	}
    	}

		let check1  = document.getElementById('radios_fecha_cotizacion_1');
		let check2  = document.getElementById('radios_fecha_cotizacion_2');
		let bandera = 0;
		let fecha   = "";

		if (check2.checked == true) {
			if ($('#fecha_cotizacion_selecta').val() != ""){
				bandera = 1;
				fecha   = $('#fecha_cotizacion_selecta').val();
			}else{
				bandera = 0;
				fecha   = "";
			}
		}else{
			bandera = 1;
			fecha   = "";
		}

		if(bandera == 1){

			turn_on_cargando();

			// nota = nota.replace(/(?:\r\n|\r|\n)/g, '<br>');

			var data = "work=crear_orden_compra_prospecto&id_servicio=" + _id_p_s 
							+ "&id_prospecto=" + _id_prospecto 
							+ "&codigo=" + codigo
							+ "&fecha=" + fecha;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));
		        	var data_check = data.split(",");

		        	if (data_check[0] === "created") {
		        		let url = "../../configuration/backend/docs/pdf/?_id_p_s=" + _id_p_s 
		        		        + "&_id_prospecto=" + _id_prospecto 
		        		        + "&codigo=" + codigo 
		        		        + "&fecha=" + fecha 
		        		        + "&id_cotizacion=" + data_check[1] 
		        		        + "&descuento=" + descuento 
		        		        + "&check_descuento_iva=" + check_descuento_iva
		        		        + "&tiempoMaximo=" + tiempoMaximo;
						// window.open(url,"_blank"); 
						// redirection('');
						console.log(url);
						var modalContent = document.getElementById("modalContent");
					    modalContent.src = url;

					    let url2 = "https://induce.mx/configuration/backend/docs/pdf/?_id_p_s=" + _id_p_s + "&_id_prospecto=" + _id_prospecto + "&codigo=" + codigo + "&fecha=" + fecha + "&id_cotizacion=" + data_check[1] + "&descuento=" + descuento + "&check_descuento_iva=" + check_descuento_iva + "&tiempoMaximo=" + tiempoMaximo;
					    console.log("url2", url2);
					    document.getElementById('downloadButton').href = url2;
						$('#modalChargeContent').modal('show');

						$('#modalCotizacion').modal('hide');
						setTimeout(function(){ $("#lista-cotizaciones").load(location.href+" #lista-cotizaciones>*",""); }, 5000 );
		        	}else{
		        		messageConfirmation(data_check[0],"error");
		        	}

		        } 
		    });

		}else{
			message("Selecciona la fecha.","info");
		}
	}

	function crear_orden_servicio_prospecto(_id_prospecto,_id_p_s,codigo){

		if ($('#pago_orden').val()!=undefined) {

			let check_descuento = document.getElementById('check-descuento');
	    	let descuento       = document.getElementById('descuento').value;
	    	let check_iva       = document.getElementById('check-iva');

	    	let check_descuento_iva = "";

	    	if (check_descuento.checked == true) {
	    		if (check_iva.checked == true) {
		    		check_descuento_iva = "true1";
		    	}else{
		    		check_descuento_iva = "true2";
		    	}
	    	}else{
	    		if (check_iva.checked == true) {
		    		check_descuento_iva = "true3";
		    	}else{
		    		check_descuento_iva = "true4";
		    	}
	    	}

			let check1  = document.getElementById('radios_fecha_orden_1');
			let check2  = document.getElementById('radios_fecha_orden_2');
			let bandera = 0;
			let fecha   = $('#fecha_orden_selecta').val();

			if (check2.checked == true) {
				if ($('#fecha_orden_selecta').val() != ""){
					bandera = 1;
				}else{
					bandera = 0;
				}
			}else{
				bandera = 1;
			}

			let pago_orden = $('#pago_orden').val();

			let porcentaje_2exhibiciones_1 = $('#porcentaje_2exhibiciones_1').val();
			let porcentaje_2exhibiciones_2 = $('#porcentaje_2exhibiciones_2').val();

			let porcentaje_3exhibiciones_1    = $('#porcentaje_3exhibiciones_1').val();
			let porcentaje_3exhibiciones_2    = $('#porcentaje_3exhibiciones_2').val();
			let porcentaje_3exhibiciones_dias = $('#porcentaje_3exhibiciones_dias').val();
			let porcentaje_3exhibiciones_3    = $('#porcentaje_3exhibiciones_3').val();

			let pago_mensual_dias = $('#pago_mensual_dias').val();
			let tiempoMaximo      = $('#tiempoMaximo').val();

			if(bandera == 1){

				turn_on_cargando();

				// nota = nota.replace(/(?:\r\n|\r|\n)/g, '<br>');

				let data = {
					work: 'crear_orden_servicio_prospecto',
					id_servicio: _id_p_s,
					id_prospecto: _id_prospecto,
					codigo,
					fecha,
					pago_orden,
					porcentaje_2exhibiciones_1,
					porcentaje_2exhibiciones_2,
					porcentaje_3exhibiciones_1,
					porcentaje_3exhibiciones_2,
					porcentaje_3exhibiciones_dias,
					porcentaje_3exhibiciones_3,
					pago_mensual_dias,
					descuento,
					check_descuento_iva,
					tiempoMaximo
				};
				console.log(data);

				$.ajax({
			        data:  data,
			        url:   '../../core/backend/process/controlador.php',
			        type:  'POST',
			        beforeSend: function () {

			        },
			        error:  function () {
			            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
			            turn_off_cargando();
			        },
			        success: function(data){
			        	turn_off_cargando();
			        	console.log("RESPONSE: " + JSON.stringify(data));
			        	var data_check = data.split("|");

			        	if (data_check[0] === "created") {
			        		// let url = "../docs/orden-compra.php?_id_p_s=" + _id_p_s + "&_id_prospecto=" + _id_prospecto + "&codigo=" + codigo;
			        		let url = "../../configuration/backend/docs/pdf/orden-servicio.php?_id_p_s=" + _id_p_s 
			        					+ "&_id_prospecto=" + _id_prospecto 
			        					+ "&codigo=" + codigo 
			        					+ "&fecha=" + fecha 
			        					+ "&id_orden_servicio=" + data_check[1] 
			        					+ "&pago_orden=" + pago_orden
										+ "&descuento=" + descuento
										+ "&check_descuento_iva=" + check_descuento_iva
										+ "&porcentaje_2exhibiciones_1=" + porcentaje_2exhibiciones_1
										+ "&porcentaje_2exhibiciones_2=" + porcentaje_2exhibiciones_2
										+ "&porcentaje_3exhibiciones_1=" + porcentaje_3exhibiciones_1
										+ "&porcentaje_3exhibiciones_2=" + porcentaje_3exhibiciones_2
										+ "&porcentaje_3exhibiciones_dias=" + porcentaje_3exhibiciones_dias
										+ "&porcentaje_3exhibiciones_3=" + porcentaje_3exhibiciones_3
										+ "&pago_mensual_dias=" + pago_mensual_dias;				
							// window.open(url,"_blank"); 
							// redirection('');

							var modalContent = document.getElementById("modalContent");
						    modalContent.src = url;
							$('#modalChargeContent').modal('show');

							var downloadButton = document.getElementById("downloadButton");
							downloadButton.href = url;
							downloadButton.download = "contrato.pdf";
							
							$('#modalOrdenServicio').modal('hide');
							setTimeout(function(){ $("#lista-ordenes").load(location.href+" #lista-ordenes>*",""); }, 5000 );

							console.log(data_check[2]);
							let arr = [];
							arr      = data_check[2];
							arr = JSON.parse(arr);

							setTimeout(function(){
								// $('#modalChargeContent').modal('hide');
								procesarRecibos(arr, 0,_id_p_s,_id_prospecto,codigo,fecha,descuento,check_descuento_iva);
							}, 7000);

							// 	for (var i = 0; i < arr.length; i++) {
							// 		console.log(arr[i]);
							// 		let url_recibo = "../../configuration/backend/docs/pdf/recibo-pago.php?_id_p_s=" + _id_p_s 
					  //       			+ "&_id_prospecto=" + _id_prospecto 
					  //       			+ "&codigo=" + codigo 
					  //       			+ "&fecha=" + fecha 
					  //       			+ "&id_recibo=" + arr[i].id
					  //       			+ "&descuento=" + descuento 
					  //       			+ "&check_descuento_iva=" + check_descuento_iva;

							// 		var modalContent = document.getElementById("modalContent");
							// 	    modalContent.src = url_recibo;
							// 		$('#modalChargeContent').modal('show');
							// 		$('#modalReciboPago').modal('hide');
							// 		setTimeout(function(){ $("#lista-recibos").load(location.href+" #lista-recibos>*",""); }, 5000 );
							// 	}
			        	}else{
			        		messageConfirmation(data,"error");
			        	}

			        } 
			    });

			}else{
				message("Selecciona la fecha.","info");
			}
		}else{
			message("Selecciona la forma de pago.","info");
		}
	}

	function procesarRecibos(arr, index, _id_p_s, _id_prospecto, codigo, fecha, descuento, check_descuento_iva) {
	  if (index < arr.length) {
	    console.log(arr[index]);
	    
	    let url_recibo = "../../configuration/backend/docs/pdf/recibo-pago.php?_id_p_s=" + _id_p_s +
	      "&_id_prospecto=" + _id_prospecto +
	      "&codigo=" + codigo +
	      "&fecha=" + fecha +
	      "&id_recibo=" + arr[index].id +
	      "&descuento=" + descuento +
	      "&check_descuento_iva=" + check_descuento_iva;
	    console.log(url_recibo);

	    var modalContent = document.getElementById("modalContentRecibo");
	    modalContent.src = url_recibo;
	    $('#modalChargeContentRecibo').modal('show');
	    $('#modalChargeContent').modal('show');

	    var downloadButton = document.getElementById("downloadButtonRecibo");
		downloadButton.href = url_recibo;
		downloadButton.download = "recibo.pdf";

	    setTimeout(function () {
	    	// $('#modalChargeContent').modal('hide');
	      $("#lista-recibos").load(location.href + " #lista-recibos>*", "");
	      // Llamar recursivamente para procesar el siguiente elemento después de 3 segundos
	      procesarRecibos(arr, index + 1, _id_p_s, _id_prospecto, codigo, fecha, descuento, check_descuento_iva);

			// $('#modalChargeContentRecibo').modal('hide');
			// $('#modalChargeContent').modal('hide');
			// $('#modalChargeContent').modal('show');
	    }, 7000); // 3000 milisegundos = 3 segundos
	  }

		// $('#modalChargeContentRecibo').modal('hide');
		// $('#modalChargeContent').modal('hide');
		// $('#modalChargeContent').modal('show');
	}

	function crear_recibo_prospecto(_id_prospecto,_id_p_s,codigo){

		if (
			// $('#metodos_pago_recibo').val()!= undefined
			$('#id_contrato').val() != ''
			&& $('#fecha_contrato').val() != ''
			&& $('#porcentaje_contrato').val() != ''
			) {

			let metodo_pago         = $('#metodos_pago_recibo').val();
			let id_contrato         = $('#id_contrato').val();
			let fecha_contrato      = $('#fecha_contrato').val();
			let porcentaje_contrato = $('#porcentaje_contrato').val();

			let check_descuento = document.getElementById('check-descuento');
	    	let descuento       = document.getElementById('descuento').value;
	    	let check_iva       = document.getElementById('check-iva');

	    	let check_descuento_iva = "";

	    	if (check_descuento.checked == true) {
	    		if (check_iva.checked == true) {
		    		check_descuento_iva = "true1";
		    	}else{
		    		check_descuento_iva = "true2";
		    	}
	    	}else{
	    		if (check_iva.checked == true) {
		    		check_descuento_iva = "true3";
		    	}else{
		    		check_descuento_iva = "true4";
		    	}
	    	}

			let check1  = document.getElementById('radios_fecha_recibo_1');
			let check2  = document.getElementById('radios_fecha_recibo_2');
			let bandera = 0;
			let fecha   = $('#fecha_recibo_selecta').val();

			if (check2.checked == true) {
				if ($('#fecha_recibo_selecta').val() != ""){
					bandera = 1;
				}else{
					bandera = 0;
				}
			}else{
				bandera = 1;
			}

			if(bandera == 1){

				turn_on_cargando();

				// nota = nota.replace(/(?:\r\n|\r|\n)/g, '<br>');

				var data = "work=crear_recibo_prospecto2"
								+ "&id_servicio=" + _id_p_s 
								+ "&id_prospecto=" + _id_prospecto 
								+ "&codigo=" + codigo
								+ "&fecha=" + fecha
								+ "&descuento=" + descuento
								+ "&check_descuento_iva=" + check_descuento_iva
								+ "&metodo_pago=" + metodo_pago
								+ "&id_contrato=" + id_contrato
								+ "&fecha_contrato=" + fecha_contrato
								+ "&porcentaje_contrato=" + porcentaje_contrato;

				console.log(data);

				$.ajax({
			        data:  data,
			        url:   '../../core/backend/process/controlador.php',
			        type:  'POST',
			        beforeSend: function () {

			        },
			        error:  function () {
			            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
			            turn_off_cargando();
			        },
			        success: function(data){
			        	turn_off_cargando();
			        	console.log("RESPONSE: " + JSON.stringify(data));
			        	var data_check = data.split(",");

			        	if (data_check[0] === "created") {
			        		// let url = "../docs/orden-compra.php?_id_p_s=" + _id_p_s + "&_id_prospecto=" + _id_prospecto + "&codigo=" + codigo;
			        		let url = "../../configuration/backend/docs/pdf/recibo-pago.php?_id_p_s=" + _id_p_s 
			        			+ "&_id_prospecto=" + _id_prospecto 
			        			+ "&codigo=" + codigo 
			        			+ "&fecha=" + fecha 
			        			+ "&id_recibo=" + data_check[1] 
			        			+ "&descuento=" + descuento 
			        			+ "&check_descuento_iva=" + check_descuento_iva;

							// window.open(url,"_blank");
							// redirection('');
							var modalContent = document.getElementById("modalContent");
						    modalContent.src = url;

						    var downloadButton = document.getElementById("downloadButton");
							downloadButton.href = url;
							downloadButton.download = "recibo.pdf";

							$('#modalChargeContent').modal('show');
							$('#modalReciboPago').modal('hide');
							setTimeout(function(){ $("#lista-recibos").load(location.href+" #lista-recibos>*",""); }, 5000 );
			        	}else{
			        		messageConfirmation(data,"error");
			        	}

			        } 
			    });

			}else{
				message("Selecciona la fecha.","info");
			}
		}else{
			message("Selecciona el método de pago y el contrato.","info");
		}
	}

	function archivo_orden_compra(id_servicio,id_prospecto){
		if ($('#archivo-orden-compra').val() != "") {
		
			var fd = new FormData();
			var files = $('#archivo-orden-compra')[0].files[0];
			fd.append('archivo-orden-compra', files);
			fd.append('id_servicio', id_servicio);
			fd.append('id_prospecto', id_prospecto);
			fd.append('work', '1');

			console.log(JSON.stringify(fd));
			console.log(fd.get('archivo-orden-compra'));
			console.log(fd);

			turn_on_cargando();
			console.log("Images cargador");

			$.ajax({
				data: fd,
				url: '../process/controlador-imgs.php',
				type: 'POST',    
		        contentType: false,
		        processData: false,
		        beforeSend: function () {

		        },
		        error:  function () {
		        	messageConfirmation("ERROR, al conectarse al SERVIDOR DE IMAGENES...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("Data: " + data);

		        	if (data === "added") {
		        		$("#check-orden-compra").load(location.href+" #check-orden-compra>*","");
		        		close_modal("modalAddOrdenCompra");
		        		$('#archivo-orden-compra').val("");
		        		message("Archivo agregado.", "success");
		        	}else{
						message(data, "error");
		        	}
		        }
		    });
		}else{
			message("info","Selecciona el archivo.");
		}
	}
	
	function cambiar_status_service(id_servicio,id_prospecto){
		// if ($('#status-service').val() != ""){

			let status = $('#status-service').val();
			turn_on_cargando();

			var data = "work=49&status=" + status 
						+ "&id_prospecto=" + id_prospecto 
						+ "&id_servicio=" + id_servicio;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "updated") {
		        		$('#modalStatusService').modal('hide');
						message("Status actualizado.","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		// }else{
		// 	message("Error, intenta nuevamente.","error");
		// }
	}

	function prospect_objetivo_servicio(type,id_servicio,id_prospecto){
		if ($('#objetivo_servicio').val() != ""){

			let objetivo_servicio = $('#objetivo_servicio').val();
			objetivo_servicio = objetivo_servicio.replace(/(?:\r\n|\r|\n)/g, '<br>');

			turn_on_cargando();

			var data = "work=51&objetivo_servicio=" + objetivo_servicio 
						+ "&id_prospecto=" + id_prospecto 
						+ "&id_servicio=" + id_servicio
						+ "&type=" + type;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$('#modalAddObjetivo').modal('hide');
						message("Objetivo actualizado.","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Redacta el objetivo del servicio.","error");
		}
	}

	// function prospecto_retencion(id_servicio,id_prospecto){
	// 	let retencion = document.getElementById('retencion-iva');
	// 	let status    = "";

	// 	if (retencion.checked) {
	// 		status = 1;
	// 	}else{
	// 		status = 0;
	// 	}

	// 	if ($('#retencion-iva-valor').val() != ""){

	// 		let retencion_valor = $('#retencion-iva-valor').val();

	// 		if (Number(retencion_valor)>0 && Number(retencion_valor)<100) {

	// 			turn_on_cargando();

	// 			var data = "work=58&retencion_valor=" + retencion_valor
	// 						+ "&status=" + status
	// 						+ "&option=custom"
	// 						+ "&id_prospecto=" + id_prospecto
	// 						+ "&id_servicio=" + id_servicio;

	// 			console.log(data);

	// 			$.ajax({
	// 		        data:  data,
	// 		        url:   '../process/controlador.php',
	// 		        type:  'POST',
	// 		        beforeSend: function () {

	// 		        },
	// 		        error:  function () {
	// 		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	// 		            turn_off_cargando();
	// 		        },
	// 		        success: function(data){
	// 		        	turn_off_cargando();
	// 		        	console.log("RESPONSE: " + JSON.stringify(data));

	// 		        	if (data === "updated") {
	// 		        		if (status == 1) {
	// 		        			message("Retención actualizada y activada.","success");
	// 		        		}else if (status == 0) {
	// 		        			message("Retención desactivada.","success");
	// 		        		}
	// 		        	}else{
	// 		        		messageConfirmation(data,"error");
	// 		        	}

	// 		        } 
	// 		    });

	// 		}else{
	// 			retencion.checked = false;
	// 			message("Escribe un valor mayor a 0 y menor a 100.","error");
	// 		}
			
	// 	}else{
	// 		retencion.checked = false;
	// 		message("Escribe el valor de retención.","error");
	// 	}
	// }

	function prospecto_retencion(nuevo,iva,descuento,descuento_status,iva_status,id_servicio,id_prospecto){
		console.log(nuevo,iva,descuento,descuento,iva,id_servicio,id_prospecto);

		turn_on_cargando();

		var data = "work=prospecto_retencion"
					+ "&nuevo=" + nuevo
					+ "&iva=" + iva
					+ "&descuento=" + descuento
					+ "&descuento_status=" + descuento_status
					+ "&iva_status=" + iva_status
					+ "&id_servicio=" + id_servicio
					+ "&id_prospecto=" + id_prospecto;	

		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	if (data === "updated") {
	        		// if (status == 1) {
	        		// 	// retencion_custom.checked = false;
	        		// 	message("IVA del 16% activada.","success");
	        		// }else if (status == 0) {
	        		// 	message("IVA desactivada.","success");
	        		// }
	        	}else{
	        		messageConfirmation(data,"error");
	        	}

	        } 
	    });
	}

	function set_facturacion_choose(id_facturacion,id_prospecto){
		let btn_facturacion = document.getElementById('check-facturacion-' + id_facturacion);
		let status    = "";

		if (btn_facturacion.checked) {
			status = 1;
		// }else{
		// 	status = 0;
		// }

			turn_on_cargando();

			var data = "work=59&id_facturacion=" + id_facturacion
						+ "&id_prospecto=" + id_prospecto
						+ "&status=" + status;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "updated") {
		        		if (status == 1) {
		        			// retencion_custom.checked = false;
		        			message("Dato de facturación seleccionado.","info");
		        			$("#check-facturacion").load(location.href+" #check-facturacion>*","");
		        		}else if (status == 0) {

		        		}
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		 }
	}

	function guardar_usuario(){

		if ($('#nombre').val() != ""
			&& $('#apellidos').val() != ""
			&& $('#email').val() != ""
			&& $('#password').val() != ""
			&& $('#confirm_password').val() != ""
			&& $('#puesto').val() != undefined
			&& $('#telefono').val() != ""
			){

			let nombre           = $('#nombre').val();
			let apellidos        = $('#apellidos').val();
			let email            = $('#email').val();
			let password         = $('#password').val();
			let confirm_password = $('#confirm_password').val();
			let puesto           = $('#puesto').val();
			let telefono         = $('#telefono').val();

			if (password === confirm_password) {

				turn_on_cargando();

				var data = "work=61&nombre=" + nombre +
							"&apellidos=" + apellidos +
							"&email=" + email +
							"&password=" + password +
							"&confirm_password=" + confirm_password +
							"&puesto=" + puesto +
							"&telefono=" + telefono;

				console.log(data);

				$.ajax({
			        data:  data,
			        url:   '../process/controlador.php',
			        type:  'POST',
			        beforeSend: function () {

			        },
			        error:  function () {
			            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
			            turn_off_cargando();
			        },
			        success: function(data){
			        	turn_off_cargando();
			        	console.log("RESPONSE: " + JSON.stringify(data));

			        	if (data === "added") {
			        		$('#modalAddUser').modal('hide');
							message("Usuario registrado.","success");
							redirection("");
			        	}else{
			        		messageConfirmation(data,"error");
			        	}

			        } 
			    });
			}else{
				message("Verifica tu contraseña.","error");
			}
			
		}else{
			message("Ingresa todos los datos del usuario.","error");
		}
	}

	// function editar_usuario(id_user){

	// 	if (
	// 		$('#nombre-' + id_user).val() != ""
	// 		&& $('#apellidos-' + id_user).val() != ""
	// 		&& $('#email-' + id_user).val() != ""
	// 		&& $('#password-' + id_user).val() != ""
	// 		&& $('#confirm_password-' + id_user).val() != ""
	// 		&& $('#puesto-' + id_user).val() != undefined
	// 		&& $('#telefono-' + id_user).val() != ""
	// 		){

	// 		let nombre           = $('#nombre-' + id_user).val();
	// 		let apellidos        = $('#apellidos-' + id_user).val();
	// 		let email            = $('#email-' + id_user).val();
	// 		let password         = $('#password-' + id_user).val();
	// 		let confirm_password = $('#confirm_password-' + id_user).val();
	// 		let puesto           = $('#puesto-' + id_user).val();
	// 		let telefono         = $('#telefono-' + id_user).val();

	// 		if (password === confirm_password) {

	// 			turn_on_cargando();

	// 			var data = "work=63&nombre=" + nombre +
	// 						"&apellidos=" + apellidos +
	// 						"&email=" + email +
	// 						"&password=" + password +
	// 						"&confirm_password=" + confirm_password +
	// 						"&puesto=" + puesto +
	// 						"&telefono=" + telefono +
	// 						"&id_usuario=" + id_user;

	// 			console.log(data);

	// 			$.ajax({
	// 		        data:  data,
	// 		        url:   '../process/controlador.php',
	// 		        type:  'POST',
	// 		        beforeSend: function () {

	// 		        },
	// 		        error:  function () {
	// 		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	// 		            turn_off_cargando();
	// 		        },
	// 		        success: function(data){
	// 		        	turn_off_cargando();
	// 		        	console.log("RESPONSE: " + JSON.stringify(data));

	// 		        	if (data === "updated") {
	// 		        		$('#modalEdit').modal('hide');
	// 						message("Usuario modificado.","success");
	// 						redirection("");
	// 		        	}else{
	// 		        		messageConfirmation(data,"error");
	// 		        	}

	// 		        } 
	// 		    });
	// 		}else{
	// 			message("Verifica tu contraseña.","error");
	// 		}
			
	// 	}else{
	// 		message("Ingresa todos los datos del usuario.","error");
	// 	}
	// }

	function prospect_add_service_to_list_other(id_servicio,id_prospecto){
		if ($('#nombre_servicio_otro').val() != ""
			&& $('#descripcion_servicio_otro').val() != ""
			&& $('#unidad_medida_servicio_otro').val() != undefined
			&& $('#precio_servicio_otro').val() != ""
			){

			let nombre_servicio        = $('#nombre_servicio_otro').val();
			let descripcion_servicio   = $('#descripcion_servicio_otro').val();
			let unidad_medida_servicio = $('#unidad_medida_servicio_otro').val();
			let precio_servicio        = $('#precio_servicio_otro').val();

			turn_on_cargando();

			var data = "work=65&nombre_servicio=" + nombre_servicio +
						"&descripcion_servicio=" + descripcion_servicio +
						"&unidad_medida_servicio=" + unidad_medida_servicio +
						"&precio_servicio=" + precio_servicio +
						"&id_servicio=" + id_servicio +
						"&id_prospecto=" + id_prospecto;


			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$('#modalAddServiceOther').modal('hide');
						message("Servicio agregado a la lista.","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Ingresa todos los datos del nuevo servicio.","error");
		}
	}

	function guardar_prospecto_servicio_otro(id_servicio){
		if ($('#nombre_servicio-' + id_servicio).val() != ""
			&& $('#descripcion_servicio-' + id_servicio).val() != ""
			&& $('#unidad_medida_servicio-' + id_servicio).val() != ""
			&& $('#precio_servicio-' + id_servicio).val() != "") {

			let nombre_servicio        = $('#nombre_servicio-' + id_servicio).val();
			let descripcion_servicio   = $('#descripcion_servicio-' + id_servicio).val();
			let unidad_medida_servicio = $('#unidad_medida_servicio-' + id_servicio).val();
			let precio_servicio        = $('#precio_servicio-' + id_servicio).val();

			turn_on_cargando();

			var data = "work=67&nombre_servicio=" + nombre_servicio +
						"&descripcion_servicio=" + descripcion_servicio +
						"&unidad_medida_servicio=" + unidad_medida_servicio +
						"&precio_servicio=" + precio_servicio +
						"&id_servicio=" + id_servicio;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "updated") {
		        		$('#modalDescripcionOtro').modal('hide');
						message("Información del servicio modificada.","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });

		}else{
			message("Completa todos los datos del servicio.","error");
		}
	}

	function guardar_lista(){
		if ($('#lista').val() != "") {

			let lista = $('#lista').val();

			turn_on_cargando();

			var data = "work=68&lista=" + lista;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		$('#modalAddList').modal('hide');
						message("Lista agregada.","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });

		}else{
			message("Ingresa el nombre de la lista.","error");
		}
	}

	function guardar_servicio(){
		if ($('#servicio').val() != ""
			&& $('#precio').val() != ""
			&& $('#imagen').val() != ""
			&& $('#tiempo-entrega').val() != undefined
			) {

			let servicio = $('#servicio').val();
			let precio   = $('#precio').val();
			let tiempo   = $('#tiempo-entrega').val();
			
			let descripcion = tinymce.get("kt_docs_tinymce_hidden").getContent();
			descripcion = description_clean_ascii(descripcion);

			turn_on_cargando();

			let data = {
				work: 'guardar_servicio',
				servicio,
				precio,
				descripcion,
				tiempo
			};

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));
		        	var data_check = data.split(",");
    	        	
    	        	if (data_check[0] === "added") {
		        		imagenes_upload_pagina("guardar_servicio", data_check[1], "imagen", '');

		        		$("#check").load(location.href+" #check>*","");
		        		$('#modalNuevoServicio').modal('hide');
						message("Servicio agregado.","success");
						$('#servicio').val('');
						$('#precio').val('');
						$('#kt_docs_tinymce_hidden').val('');
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });

		}else{
			message("Ingresa los datos del servicio.","error");
		}
	}

	function service_details(id_service){
		turn_on_cargando();

		var data = "work=service_details&id_service=" + id_service;
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log(data);

	        	$('#edit-service').html(data);
	        	open_modal('modalEditService');

	        	tinymce.init({
				    selector: "#kt_docs_tinymce_hidden2",
				    content_style: "@import url('https://fonts.googleapis.com/css?family=Poppins');",
				    menubar: false,
				    toolbar: ["styleselect fontselect fontsizeselect",
				        "undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify",
				        "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code"],
				    plugins : "advlist autolink link image lists charmap print preview code",
				    font_formats: "Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats, montserratregular; Poppins=poppins;"
				});

	        } 
	    });
	}

	function delete_service(){
		if ($('#id_delete_service').val()!=""){

			let id_delete = $('#id_delete_service').val();
			turn_on_cargando();

			var data = "work=delete_service&id_delete= " + id_delete;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		close_modal("modalDeleteService");
						message("Servicio eliminado.","success");
						redirection("");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}

	function list_details(id_lista,lista){
		turn_on_cargando();

		var data = "work=73&id_lista=" + id_lista + 
						"&lista=" + lista;
						
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log(data);

	        	$('#edit-list-option').html(data);
	        	open_modal('modalEditListOption');

	        } 
	    });
	}
	
	function lista_notas_details(id_lista,lista){
		turn_on_cargando();

		let data = "work=lista_notas_details&id_lista=" + id_lista + 
						"&lista=" + lista;
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log(data);

	        	$('#edit-list-option').html(data);
	        	open_modal('modalEditListOption');

	        } 
	    });
	}

	function agregar_servicion_opcion(id_lista,lista){
		if ($('#opcion').val()!=""){

			let opcion = $('#opcion').val();

			turn_on_cargando();

			var data = "work=74&opcion=" + opcion +
						"&id_lista=" + id_lista;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		// close_modal("modalEditListOption");
		        		message("Opción agregada.","success");
		        		list_details(id_lista,lista);
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Ingresa la opción.","error");
		}
	}
	
	function agregar_nota_lista(id_lista,lista){
		if ($('#nota').val()!=""){

			let nota = $('#nota').val();

			turn_on_cargando();

			var data = "work=agregar_nota_lista&nota=" + nota +
						"&id_lista=" + id_lista;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		// close_modal("modalEditListOption");
		        		message("Nota agregada a la lista " + lista,"success");
		        		lista_notas_details(id_lista,lista);
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Ingresa la nota.","error");
		}
	}

function send_mail_contact(){

	if($('#nombre').val()!=''){
		if($('#apellidos').val()!=''){
			if($('#email').val()!=''){
				if($('#telefono').val()!=''){
					// if($('#detalles').val()!=''){

						turn_on_cargando();

						let nombre    = $('#nombre').val();
						let apellidos = $('#apellidos').val();
						let email     = $('#email').val();
						let telefono  = $('#telefono').val();
						let detalles  = $('#detalles').val();
						let empresa   = $('#empresa').val();
						let publicidad   = $('#publicidad').val();

						var data = "work=send_mail_contact"
									+ "&nombre=" + nombre
									+ "&apellidos=" + apellidos
									+ "&email=" + email
									+ "&telefono=" + telefono
									+ "&detalles=" + detalles
									+ "&empresa=" + empresa
									+ "&publicidad=" + publicidad;

						console.log(data);

						$.ajax({
					        data:  data,
					        url:   '../../core/backend/process/controlador.php',
					        type:  'POST',
					        beforeSend: function () {

					        },
					        error:  function () {
					            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
					            turn_off_cargando();
					        },
					        success: function(data){
					        	turn_off_cargando();
					        	console.log("RESPONSE: " + JSON.stringify(data));

					        	if (data === "added") {
					        		// close_modal("modalEditListOption");
					        		message("¡Tu solicitud fue enviada! Pronto estaremos en contacto.","success");
					        	}else{
					        		messageConfirmation(data,"error");
					        	}

					        } 
					    });

					// }else{ message("Ingresa tus detalles.","info"); }
				}else{ message("Ingresa tu teléfono.","info"); }
			}else{ message("Ingresa tu email.","info"); }
		}else{ message("Ingresa tus apellidos.","info"); }
	}else{ message("Ingresa tu nombre.","info"); }

}

function eliminar_cotizacion(id){

	turn_on_cargando();

	var data = "work=eliminar_cotizacion"
				+ "&id=" + id;

	console.log(data);

	$.ajax({
        data:  data,
        url:   '../process/controlador.php',
        type:  'POST',
        beforeSend: function () {

        },
        error:  function () {
            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
            turn_off_cargando();
        },
        success: function(data){
        	turn_off_cargando();
        	console.log("RESPONSE: " + JSON.stringify(data));

        	if (data === "deleted") {
        		// close_modal("modalEditListOption");
        		$("#lista-cotizaciones").load(location.href+" #lista-cotizaciones>*","");
        		message("Cotización eliminada.","success");
        		redirection('');
        	}else{
        		messageConfirmation(data,"error");
        	}

        } 
    });

}

function eliminar_ordenservicio(id){

	turn_on_cargando();

	var data = "work=eliminar_ordenservicio"
				+ "&id=" + id;

	console.log(data);

	$.ajax({
        data:  data,
        url:   '../process/controlador.php',
        type:  'POST',
        beforeSend: function () {

        },
        error:  function () {
            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
            turn_off_cargando();
        },
        success: function(data){
        	turn_off_cargando();
        	console.log("RESPONSE: " + JSON.stringify(data));

        	if (data === "deleted") {
        		// close_modal("modalEditListOption");
        		$("#lista-ordenesservicio").load(location.href+" #lista-cotizaciones>*","");
        		message("Orden de servicio eliminada.","success");
        		redirection('');
        	}else{
        		messageConfirmation(data,"error");
        	}

        } 
    });

}

function mensaje_mail_default(){
	if($('#mensaje').val()!=''){
		let mensaje = $('#mensaje').val();

		let d = "";
		if($('#img-logo').val()!=''){
			d = "si";
		}else{
			d = "no";
		}

		var fd = new FormData();
		var files = $('#img-logo')[0].files[0];
		fd.append("img-logo", files);
		fd.append('mensaje', mensaje);
		fd.append('work', "mensaje_mail_default");
		fd.append('d', d);

		console.log(JSON.stringify(fd));
		console.log(fd.get("img-logo"));
		console.log(fd);

		turn_on_cargando();
		console.log("Images cargador");

		$.ajax({
			data: fd,
			url: '../process/controlador-imgs.php',
			type: 'POST',    
	        contentType: false,
	        processData: false,
	        beforeSend: function () {

	        },
	        error:  function () {
	        	messageConfirmation("ERROR, al conectarse al SERVIDOR DE IMAGENES...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("Images apagado");
	        	console.log("Img: " + data);

	        	if (data === "updated") {
	        		message("Información actualizada.", "success");
	        	}else{
					message(data, "error");
	        	}
	        }
	    });
	}else{
		message("Selecciona la imagen y el mensaje.", "error");
	}
}

function mensaje_mail_default_orden(){
	if($('#mensaje_os').val()!=''){
		let mensaje = $('#mensaje_os').val();

		let d = "";
		if($('#img-logo').val()!=''){
			d = "si";
		}else{
			d = "no";
		}

		var fd = new FormData();
		var files = $('#img-logo-os')[0].files[0];
		fd.append("img-logo-os", files);
		fd.append('mensaje', mensaje);
		fd.append('work', "mensaje_mail_default_orden");

		console.log(JSON.stringify(fd));
		console.log(fd.get("img-logo-os"));
		console.log(fd);

		turn_on_cargando();
		console.log("Images cargador");

		$.ajax({
			data: fd,
			url: '../process/controlador-imgs.php',
			type: 'POST',    
	        contentType: false,
	        processData: false,
	        beforeSend: function () {

	        },
	        error:  function () {
	        	messageConfirmation("ERROR, al conectarse al SERVIDOR DE IMAGENES...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("Images apagado");
	        	console.log("Img: " + data);

	        	if (data === "updated") {
	        		message("Información actualizada.", "success");
	        	}else{
					message(data, "error");
	        	}
	        }
	    });
	}else{
		message("Selecciona la imagen y el mensaje.", "error");
	}
}

function mail_cotizacion(){
	
	if(
		$('#send_id_cotizacion').val() != ''
		&& $('#send_pdf').val() != ''
		// && $('#send_email').val() != ''
		&& $('#mensaje_correo').val() != ''
		&& $('#email_correo').val() != ''
		&& $('#asunto_correo').val() != ''
		){

		let id_cotizacion = $('#send_id_cotizacion').val();
		let pdf           = $('#send_pdf').val();
		let email         = $('#email_correo').val();
		let mensaje       = $('#mensaje_correo').val();
		let asunto        = $('#asunto_correo').val();

		turn_on_cargando();

		mensaje = mensaje.replace(/(?:\r\n|\r|\n)/g, '<br>');

		let data = "work=mail_cotizacion"
					+ "&id_cotizacion=" + id_cotizacion
					+ "&pdf=" + pdf
					+ "&mail=" + email
					+ "&mensaje=" + mensaje
					+ "&asunto=" + asunto;

		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador-mails.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	if (data.includes('Message has been sent correctly.')) {
	        		// mail_cotizacion_update(id_cotizacion,mensaje);
	        		// $("#lista-ordenesservicio").load(location.href+" #lista-cotizaciones>*","");
	        		message("Cotización enviada.","success");
	        		close_modal('modalCotizacionDataMail');
	        		// redirection('');
	        	}else{
	        		messageConfirmation(data,"error");
	        	}

	        } 
	    });
	}else{
		messageConfirmation("Completa el cuerpo del correo.","error");
	}
}

function mail_cotizacion2(){
	
	if(
		$('#send_pdf').val() != ''
		&& $('#mensaje_correo').val() != ''
		&& $('#email_correo').val() != ''
		){

		let imagen = "";

		let pdf           = $('#send_pdf').val();
		let email         = $('#email_correo').val();
		let mensaje       = $('#mensaje_correo').val();

		turn_on_cargando();

		imagen = "no";

		mensaje = mensaje.replace(/(?:\r\n|\r|\n)/g, '<br>');

		let data = "work=mail_cotizacion2"
					+ "&pdf=" + pdf
					+ "&mail=" + email
					+ "&mensaje=" + mensaje
					+ "&imagen=" + imagen;

		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../process/controlador-mails.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	if (data === "sent") {
	        	    $('#modalCotizacionDataMail').modal('hide');
	        		// $("#lista-ordenesservicio").load(location.href+" #lista-cotizaciones>*","");
	        		message("Recibo de pago reenviado.","success");
	        		// redirection('');
	        	}else{
	        		messageConfirmation(data,"error");
	        	}

	        } 
	    });
	}else{
		messageConfirmation("Falta el PDF o algún dato.","error");
	}
}

function mail_cotizacion_update(id_cotizacion,mensaje){

	turn_on_cargando();

	var data = "work=mail_cotizacion_update"
				+ "&id_cotizacion=" + id_cotizacion
				+ "&mensaje=" + mensaje;

	console.log(data);

	$.ajax({
        data:  data,
        url:   '../process/controlador.php',
        type:  'POST',
        beforeSend: function () {

        },
        error:  function () {
            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
            turn_off_cargando();
        },
        success: function(data){
        	turn_off_cargando();
        	console.log("RESPONSE: " + JSON.stringify(data));

        	if (data === "updated") {
        		$("#lista-cotizaciones").load(location.href+" #lista-cotizaciones>*","");
        		redirection('');
        	}else{
        		messageConfirmation(data,"error");
        	}

        } 
    });

}

function mail_orden(){
	
	if(
		$('#send_orden_id').val() != ''
		&& $('#send_orden_pdf').val() != ''
		&& $('#email_correo_orden').val() != ''
		&& $('#mensaje_correo_orden').val() != ''
		&& $('#asunto_correo_orden').val() != ''
		){

		let id_orden = $('#send_orden_id').val();
		let pdf      = $('#send_orden_pdf').val();
		let email    = $('#email_correo_orden').val();
		let mensaje  = $('#mensaje_correo_orden').val();
		let asunto   = $('#asunto_correo_orden').val();

		turn_on_cargando();
				
		mensaje = mensaje.replace(/(?:\r\n|\r|\n)/g, '<br>');

		let data = "work=mail_orden"
					+ "&id_orden=" + id_orden
					+ "&pdf=" + pdf
					+ "&mail=" + email
					+ "&mensaje=" + mensaje
					+ "&asunto=" + asunto;

		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador-mails.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	if (data.includes('Message has been sent correctly.')) {
	        		// mail_cotizacion_update(id_cotizacion,mensaje);
	        		// $("#lista-ordenesservicio").load(location.href+" #lista-cotizaciones>*","");
	        		message("Orden de compra enviada a " + email + ".","success");
	        		close_modal('modalOrdenDataMail');
	        		// redirection('');
	        	}else{
	        		messageConfirmation(data,"error");
	        	}

	        } 
	    });
	}else{
		messageConfirmation("Completa el cuerpo del correo.","error");
	}
}

function mail_recibo(){
	
	if(
		$('#send_recibo_id').val() != ''
		&& $('#send_recibo_pdf').val() != ''
		&& $('#email_correo_recibo').val() != ''
		&& $('#mensaje_correo_recibo').val() != ''
		&& $('#asunto_correo_recibo').val() != ''
		// && $('#plantilla_id').val() != ''
		){

		let id_recibo = $('#send_recibo_id').val();
		let pdf       = $('#send_recibo_pdf').val();
		let mail      = $('#email_correo_recibo').val();
		let mensaje   = $('#mensaje_correo_recibo').val();
		let asunto    = $('#asunto_correo_recibo').val();
		let id_prospecto = $('#send_recibo_id_prospecto').val();
		let plantilla_id = $('#plantilla_id').val();

		turn_on_cargando();
				
		mensaje = mensaje.replace(/(?:\r\n|\r|\n)/g, '<br>');

		let data = {
			work: 'mail_recibo',
			id_recibo,
			pdf,
			mail,
			mensaje,
			asunto,
			id_prospecto,
			plantilla_id
		};

		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador-mails.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	if (data.includes('Message has been sent correctly.')) {
	        		// mail_cotizacion_update(id_cotizacion,mensaje);
	        		// $("#lista-ordenesservicio").load(location.href+" #lista-cotizaciones>*","");
	        		message("Recibo de pago enviado a " + email + ".","success");
	        		close_modal('modalReciboDataMail');
	        		// redirection('');
	        	}else{
	        		messageConfirmation(data,"error");
	        	}

	        } 
	    });
	}else{
		messageConfirmation("Completa el cuerpo del correo.","error");
	}
}

function whatsapp_recibox(){
	console.log("entro");
	
	// if($('#whatsapp_send_recibo_id').val()!=''
	// 	&& $('#whatsapp_send_recibo_pdf').val()!=''
	// 	&& $('#whatsapp_send_recibo_id_prospecto').val()!=''
	// 	&& $('#whatsapp_asunto_correo_recibo').val()!=''
	// 	&& $('#whatsapp_send_recibo_mensaje').val()!=''
	// 	&& $('#whatsapp_send_recibo_telefono').val()!=''
	// 	){

	// 	let whatsapp_send_recibo_id = $('#whatsapp_send_recibo_id').val();
	// 	let whatsapp_send_recibo_pdf = $('#whatsapp_send_recibo_pdf').val();
	// 	let whatsapp_send_recibo_id_prospecto = $('#whatsapp_send_recibo_id_prospecto').val();
	// 	let whatsapp_asunto_correo_recibo = $('#whatsapp_asunto_correo_recibo').val();
	// 	let whatsapp_send_recibo_mensaje = $('#whatsapp_send_recibo_mensaje').val();
	// 	let whatsapp_send_recibo_telefono = $('#whatsapp_send_recibo_telefono').val();

	// 	turn_on_cargando();
	// 	whatsapp_send_recibo_mensaje = whatsapp_send_recibo_mensaje.replace(/(?:\r\n|\r|\n)/g, '<br>');

	// 	let data = "work=whatsapp_recibo"
	// 			+ "&whatsapp_send_recibo_id=" + whatsapp_send_recibo_id
	// 			+ "&whatsapp_send_recibo_pdf=" + whatsapp_send_recibo_pdf
	// 			+ "&whatsapp_send_recibo_id_prospecto=" + whatsapp_send_recibo_id_prospecto
	// 			+ "&whatsapp_asunto_correo_recibo=" + whatsapp_asunto_correo_recibo
	// 			+ "&whatsapp_send_recibo_mensaje=" + whatsapp_send_recibo_mensaje
	// 			+ "&whatsapp_send_recibo_telefono=" + whatsapp_send_recibo_telefono;

	// 	console.log(data);

	// 	$.ajax({
	//         data:  data,
	//         url:   '../../core/backend/process/controlador-mails.php',
	//         type:  'POST',
	//         beforeSend: function () {

	//         },
	//         error:  function () {
	//             messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	//             turn_off_cargando();
	//         },
	//         success: function(data){
	//         	turn_off_cargando();
	//         	console.log("RESPONSE: " + JSON.stringify(data));

	//         	if (data.includes('Message has been sent correctly.')) {
	//         		// mail_cotizacion_update(id_cotizacion,mensaje);
	//         		// $("#lista-ordenesservicio").load(location.href+" #lista-cotizaciones>*","");
	//         		message("Recibo de pago enviado al tel " + whatsapp_send_recibo_telefono + ".","success");
	//         		close_modal('modalWhatsapp');
	//         		// redirection('');
	//         	}else{
	//         		messageConfirmation(data,"error");
	//         	}

	//         } 
	//     });
	// }else{
	// 	messageConfirmation("Completa los datos del mensaje.","error");
	// }
}

function mail_orden_servicio_update(id_orden_servicio,mensaje){

	turn_on_cargando();

	var data = "work=mail_orden_servicio_update"
				+ "&id_orden_servicio=" + id_orden_servicio
				+ "&mensaje=" + mensaje;

	console.log(data);

	$.ajax({
        data:  data,
        url:   '../process/controlador.php',
        type:  'POST',
        beforeSend: function () {

        },
        error:  function () {
            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
            turn_off_cargando();
        },
        success: function(data){
        	turn_off_cargando();
        	console.log("RESPONSE: " + JSON.stringify(data));

        	if (data === "updated") {
        		$("#lista-ordenesservicio").load(location.href+" #lista-ordenesservicio>*","");
        		redirection('');
        	}else{
        		messageConfirmation(data,"error");
        	}

        } 
    });

}

function asignar_prospecto(){

	if($('#id_admin_selected').val()!=undefined && $('#id_prospecto_selected').val()!=''){

		let id_admin = $('#id_admin_selected').val();
		let id_prospecto = $('#id_prospecto_selected').val();

		turn_on_cargando();

		var data = "work=asignar_prospecto"
					+ "&id_admin=" + id_admin
					+ "&id_prospecto=" + id_prospecto;

		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	if (data === "updated") {
	        		message("Registro actualizado","success");
	        		redirection('');
	        	}else{
	        		messageConfirmation(data,"error");
	        	}

	        } 
	    });
	}else{
		message("Selecciona el administrador","info");
	}

}

    function recibos_pago_folios(){
	if($('#cliente').val()!=undefined) {

		let cliente = $('#cliente').val();

		turn_on_cargando();

		var data = "work=recibos_pago_folios"
					+ "&cliente=" + cliente;

		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	$('#modalNuevoReciboShow').modal('show');
	    		$('#data-nuevo-recibo').html(data);

	        } 
	    });
	}else{
		message("Selecciona el cliente","info");
	}
}

    function get_historial_recibos_pdf(id_recibo){

		turn_on_cargando();

		var data = "work=get_historial_recibos_pdf"
					+ "&id_recibo=" + id_recibo;

		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	$('#modalRecibosPdf').modal('show');
	    		$('#data-pdf').html(data);

	        } 
	    });
    }

    function crear_recibo_pago(id_cliente,id_servicio,codigo,monto){
    
    		turn_on_cargando();
    
    		// nota = nota.replace(/(?:\r\n|\r|\n)/g, '<br>');
    
    		var data = "work=crear_recibo_pago&id_cliente=" + id_cliente 
    						+ "&id_servicio=" + id_servicio
    						+ "&codigo=" + codigo
    						+ "&monto=" + monto;
    
    		console.log(data);
    
    		$.ajax({
    	        data:  data,
    	        url:   '../process/controlador.php',
    	        type:  'POST',
    	        beforeSend: function () {
    
    	        },
    	        error:  function () {
    	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
    	            turn_off_cargando();
    	        },
    	        success: function(data){
    	        	turn_off_cargando();
    	        	console.log("RESPONSE: " + JSON.stringify(data));
    	        	var data_check = data.split(",");
    	        	
    	        	if (data_check[0] === "created") {
    	        		let url = "../docs/pdf/recibo-pago.php?_id_prospecto=" + id_cliente + "&_id_p_s=" + id_servicio + "&codigo=" + codigo + "&id_recibo=" + data_check[1] + "&status=Creado";
    					window.open(url,"_blank"); 
    					redirection('');
    	        	}else{
    	        		messageConfirmation(data_check[0],"error");
    	        	}
    
    	        } 
    	    });
    
    	}
    	
    function crear_recibo_pago_pdf_status(id_recibo,id_prospecto,codigo,id_servicio,status){
    
		turn_on_cargando();

		let url = "../docs/pdf/recibo-pago.php?_id_prospecto=" + id_prospecto + "&_id_p_s=" + id_servicio + "&codigo=" + codigo + "&id_recibo=" + id_recibo + "&status=" + status + "&nuevo=true";
		window.open(url,"_blank");
		redirection('');
    
    }

// function status_recibo_pago(status){

// if(
// $('#s_id_recibo').val()!=undefined
// && $('#s_id_prospecto').val()!=undefined
// && $('#s_codigo').val()!=undefined
// && $('#s_id_servicio').val()!=undefined
// ) {

// let id_recibo    = $('#s_id_recibo').val();
// let id_prospecto = $('#s_id_prospecto').val();
// let codigo       = $('#s_codigo').val();
// let id_servicio  = $('#s_id_servicio').val();

// turn_on_cargando();

// var data = "work=status_recibo_pago"
// 	+ "&id_recibo=" + id_recibo
// 	+ "&status=" + status;

// console.log(data);

// $.ajax({
// data:  data,
// url:   '../process/controlador.php',
// type:  'POST',
// beforeSend: function () {

// },
// error:  function () {
// messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
// turn_off_cargando();
// },
// success: function(data){
// turn_off_cargando();
// console.log("RESPONSE: " + JSON.stringify(data));

// if (data === "updated") {
// 	message("Status del recibo actualizado","success");
// 	crear_recibo_pago_pdf_status(id_recibo,id_prospecto,codigo,id_servicio,status);
// 	// redirection('');
// }else{
// 	messageConfirmation(data,"error");
// }

// } 
// });
// }else{
// message("Selecciona el recibo","info");
// }
// }

function eliminar_recibo_pago(){
    
    if($('#id_delete').val()!=undefined) {

        let id_delete = $('#id_delete').val();
        
		turn_on_cargando();

		// nota = nota.replace(/(?:\r\n|\r|\n)/g, '<br>');

		var data = "work=eliminar_recibo_pago&id_delete=" + id_delete;

		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));
	        	
	        	if (data === "deleted") {
	        	    message("Recibo eliminado","success");
					redirection('');
	        	}else{
	        		messageConfirmation(data,"error");
	        	}

	        } 
	    });
	   
    }else{
		message("Selecciona el recibo","info");
	}

}

function eliminar_notas_lista_prospect(id_nota){
    
	turn_on_cargando();

	var data = "work=eliminar_notas_lista_prospect&id_nota=" + id_nota;

	console.log(data);

	$.ajax({
        data:  data,
        url:   '../process/controlador.php',
        type:  'POST',
        beforeSend: function () {

        },
        error:  function () {
            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
            turn_off_cargando();
        },
        success: function(data){
        	turn_off_cargando();
        	console.log("RESPONSE: " + JSON.stringify(data));
        	
        	if (data === "deleted") {
        	    message("Lista eliminada","success");
        		$("#check-notes").load(location.href+" #check-notes>*","");
        	}else{
        		messageConfirmation(data,"error");
        	}

        } 
    });
	   
}

	// PAGINA
	function imagenes_upload_pagina(work, id, imagen, titulo_post){
		console.log(work + ", " + id + ", " + imagen);
		
		var fd = new FormData();
		var files = $('#' + imagen)[0].files[0];
		fd.append(imagen, files);
		fd.append('id', id);
		fd.append('work', work);
		fd.append('pagina', titulo_post);

		console.log(JSON.stringify(fd));
		console.log(fd.get(imagen));
		console.log(fd);

		turn_on_cargando();
		console.log("Images cargador");

		$.ajax({
			data: fd,
			url:   '../../core/backend/process/controlador-imgs.php',
			type: 'POST',    
	        contentType: false,
	        processData: false,
	        beforeSend: function () {

	        },
	        error:  function () {
	        	messageConfirmation("ERROR, al conectarse al SERVIDOR DE IMAGENES...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("Img: " + data);
	    //     	if (data === "uploaded") {
	    //     		message("Imagen del entrenador subida", "success");
	    //     	}else{
					// message(data, "error");
	    //     	}
	        }
	    });
	}

	function save_new_post(){
		console.log("ok");
		if ($('#titulo').val() != ""
			// && $('#logo').val() != ""
			&& $('#titulo_seo').val() != ""
			&& $('#descripcion_seo').val() != ""
			&& $('#claves_seo').val() != ""
			) {

			let titulo      = $('#titulo').val();

			// var quill = new Quill('#editor');
			// var descripcion = quill.root.innerHTML;

			let titulo_seo       = $('#titulo_seo').val();
			let descripcion_seo  = $('#descripcion_seo').val();
			let claves_seo       = $('#claves_seo').val();
			let lista_categorias = $('#lista_categorias').val();
			// let descripcion = $('#descripcion').val();

			let descripcion = tinymce.get("kt_docs_tinymce_hidden").getContent();
			
			descripcion = description_clean_ascii(descripcion.toString());

			turn_on_cargando();

			var data = "work=save_new_post&titulo=" + titulo +
							"&descripcion=" + descripcion +
							"&titulo_seo=" + titulo_seo +
							"&descripcion_seo=" + descripcion_seo +
							"&claves_seo=" + claves_seo +
							"&lista_categorias=" + lista_categorias;
			console.log(data);

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	var data_check = data.split(",");
		        	console.log(data_check[0]);
		        	console.log(data_check[1]);

		        	if (data_check[0] === "added") {
		        		imagenes_upload_pagina("save_new_post", data_check[1], "logo", data_check[2]);
		        		setTimeout(function(){ message("Publicación agregada","success"); }, 2000 );
						setTimeout(function(){ redirection("./entradas.php"); }, 2000);
		        	}else{
		        		messageConfirmation(data_check[0],"error");
		        	}

		        } 
		    });
			
		}else{
			message("Completa los datos de la publicación.","error");
		}
	}

	function edit_post(id,pagina){
		console.log("editar");
		if ($('#titulo').val() != ""
			// && $('#logo').val() != ""
			&& $('#titulo_seo').val() != ""
			&& $('#descripcion_seo').val() != ""
			&& $('#claves_seo').val() != ""
			) {

			let titulo = $('#titulo').val();

			// var quill = new Quill('#editor');
			// var descripcion = quill.root.innerHTML;

			let titulo_seo       = $('#titulo_seo').val();
			let descripcion_seo  = $('#descripcion_seo').val();
			let claves_seo       = $('#claves_seo').val();
			let lista_categorias = $('#lista_categorias').val();

			// let descripcion       = $('#descripcion').val();

			let descripcion = tinymce.get("kt_docs_tinymce_hidden").getContent();
			descripcion = description_clean_ascii(descripcion.toString());

			turn_on_cargando();

			var data = "work=edit_post&titulo=" + titulo +
							"&descripcion=" + descripcion +
							"&titulo_seo=" + titulo_seo +
							"&descripcion_seo=" + descripcion_seo +
							"&claves_seo=" + claves_seo +
							"&lista_categorias=" + lista_categorias +
							"&id=" + id;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "updated") {
		        		if ($('#logo').val() != "") {
		        			imagenes_upload("save_new_post", id, "logo",pagina);
		        		}
						message("Publicación actualizada","success");
						setTimeout(function(){ redirection("./entradas.php"); }, 1000);
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Completa los datos de la publicación.","error");
		}
	}

	function save_header_footer(){

		let header = $('#header').val();
		let footer = $('#footer').val();

		turn_on_cargando();

		// '
		header = header.replace(/'/gi, "@...@");
		footer = footer.replace(/'/gi, "@...@");

		// &
		header = header.replace(/&/gi, "@.....@");
		footer = footer.replace(/&/gi, "@.....@");

		let data = "work=save_header_footer&header=" + header +
							"&footer=" + footer;

		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	if (data === "updated") {
	        		message("Links actualizados","success");
	        	}else{
	        		messageConfirmation(data,"error");
	        	}

	        } 
	    });
	}

	function options_post(id,pagina,option){
		if (option === "delete") {
			document.getElementById('id_post_delete').value = id;
			document.getElementById('pagina_post_delete').value = pagina;
			$('#modalEliminarPost').modal('show');
		}
	}

	function delete_post(){

		if ($('#id_post_delete').val() != "" 
		    && $('#pagina_post_delete').val()){

			let id = $('#id_post_delete').val();
			let pagina = $('#pagina_post_delete').val();

			turn_on_cargando();

			let data = "work=delete_post&id=" + id + "&pagina=" + pagina;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		$("#check").load(location.href+" #check>*","");
		        		$('#modalEliminarPost').modal('hide');
		        		message("Publicación eliminada.","success");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Completa los datos de tu proyecto.","error");
		}
	}

	// PAGINA WEB
	function enviar_cotizacion(){

		document.getElementById('nombre').classList.add("is-invalid");
		document.getElementById('correo').classList.add("is-invalid");
		document.getElementById('telefono').classList.add("is-invalid");
		document.getElementById('empresa').classList.add("is-invalid");
		document.getElementById('descripcion').classList.add("is-invalid");

		if ($('#nombre').val() != ""
			&& $('#correo').val() != ""
			&& $('#telefono').val() != ""
			&& $('#empresa').val() != ""
			&& $('#descripcion').val() != ""){

			let servicio = "";

			document.getElementById('nombre').classList.remove("is-invalid");
			document.getElementById('correo').classList.remove("is-invalid");
			document.getElementById('telefono').classList.remove("is-invalid");
			document.getElementById('empresa').classList.remove("is-invalid");
			document.getElementById('descripcion').classList.remove("is-invalid");

			document.getElementById('nombre').classList.add("is-valid");
			document.getElementById('correo').classList.add("is-valid");
			document.getElementById('telefono').classList.add("is-valid");
			document.getElementById('empresa').classList.add("is-valid");
			document.getElementById('descripcion').classList.add("is-valid");

			document.getElementById('message-captcha').style.display = "none";

			if(document.getElementById('servicio-paginas').checked === true){
				servicio = "paginas";
			}

			if(document.getElementById('servicio-comercio').checked === true){
				servicio = "comercio";
			}

			if(document.getElementById('servicio-seo').checked === true){
				servicio = "seo";
			}

			if(document.getElementById('servicio-software').checked === true){
				servicio = "software";
			}


			let nombre      = $('#nombre').val();
			let correo      = $('#correo').val();
			let telefono    = $('#telefono').val();
			let empresa     = $('#empresa').val();
			let descripcion = $('#descripcion').val();
			let g_recaptcha_response = $('textarea[id="g-recaptcha-response"]').val();

			turn_on_cargando();

			let data = "work=enviar_cotizacion" +
						"&nombre=" + nombre +
						"&correo=" + correo +
						"&telefono=" + telefono +
						"&empresa=" + empresa +
						"&descripcion=" + descripcion +
						"&servicio=" + servicio +
						"&g_recaptcha_response=" + g_recaptcha_response;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   './core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE data: " + JSON.stringify(data));

		        	if (data.includes('Message has been sent correctly')) {
		        		console.error(1);
		        	// if (data === "sent") {
		        		message("Mensaje enviado.","success");
		        		redirection("./gracias");
		        	}else if(data.includes("error_captcha")){
		        		console.error(2);
		        		document.getElementById('message-captcha').style.display = "block";
		        	}else if(data.includes("Ingresa tu correo electronico.<br>")){
		        		console.error(3);
						document.getElementById('correo').classList.remove("is-invalid");
						document.getElementById('correo').classList.remove("is-valid");
						document.getElementById('correo').classList.add("is-invalid");
						messageConfirmation(data,"error");
		        	}
		        	// else{
		        	// 	messageConfirmation(data,"error");
		        	// }

		        } 
		    });
		}else if ($('#nombre').val() == ""){
			document.getElementById('nombre').classList.add("is-invalid");
		}else if ($('#correo').val() == ""){
			document.getElementById('nombre').classList.remove("is-invalid");
			document.getElementById('correo').classList.add("is-invalid");
		}else if ($('#telefono').val() == ""){
			document.getElementById('nombre').classList.remove("is-invalid");
			document.getElementById('correo').classList.remove("is-invalid");
			document.getElementById('telefono').classList.add("is-invalid");
		}else if ($('#empresa').val() == ""){
			document.getElementById('nombre').classList.remove("is-invalid");
			document.getElementById('correo').classList.remove("is-invalid");
			document.getElementById('telefono').classList.remove("is-invalid");
			document.getElementById('empresa').classList.add("is-invalid");
		}else if ($('#descripcion').val() == ""){
			document.getElementById('nombre').classList.remove("is-invalid");
			document.getElementById('correo').classList.remove("is-invalid");
			document.getElementById('telefono').classList.remove("is-invalid");
			document.getElementById('empresa').classList.remove("is-invalid");
			document.getElementById('descripcion').classList.add("is-invalid");
		}else{
			document.getElementById('nombre').classList.add("is-invalid");
			document.getElementById('correo').classList.add("is-invalid");
			document.getElementById('telefono').classList.add("is-invalid");
			document.getElementById('empresa').classList.add("is-invalid");
			document.getElementById('descripcion').classList.add("is-invalid");
		}
	}

	// BODY
	function call_list_blog(param){
        document.getElementById('btn-show-call-list-blog-more').style.display = "block";
        
		let data = "work=call_list_blog&param=" + param;

		console.log(data);

		$.ajax({
	        data:  data,
	        url:   './core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	        },
	        success: function(data){
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	document.getElementById('btn-show-call-list-blog').style.display = "none";
	        	$('#show_table_results').html(data);

	        } 
	    });
	}

	function call_list_blog_more(){

		let ids = $('#ids').val();

		let data = "work=call_list_blog_more&ids=" + ids;

		console.log(data);

		$.ajax({
	        data:  data,
	        url:   './core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	        },
	        success: function(data){
	        	console.log("RESPONSE: " + JSON.stringify(data));
	        	
	        	if(data.includes("No hay publicaciones para ver.")){
	        	    document.getElementById('btn-show-call-list-blog-more').style.display = "none";
	        	}
	        	
	        	document.getElementById('btn-show-call-list-blog').style.display = "block";
	        	$('#show_table_results').html(data);

	        } 
	    });
	}

	function formulario_brief(){
	    if($('#nombre_logo').val()!=''
			&& $('#industria').val()!=undefined
			// && $('#dirigido').val()!=''
			// && $('#comunicar').val()!=''
			// && $('#personalidad_marca').val()!=''
			// && $('#diseno').val()!=''
			// && $('#elementos').val()!=''
			// && $('#competencia').val()!=''
			// && $('#empresa').val()!=''
			// && $('#publicidad').val()!=''
			// && $('#color1').val()!=''
			// && $('#color2').val()!=''
			// && $('#color3').val()!=''
			){

			let nombre_logo        = $('#nombre_logo').val();
			let industria          = $('#industria').val();
			let dirigido           = $('#dirigido').val();
			let comunicar          = $('#comunicar').val();
			let personalidad_marca = $('#personalidad_marca').val();
			let diseno             = $('#diseno').val();
			let elementos          = $('#elementos').val();
			let competencia        = $('#competencia').val();
			let empresa            = $('#empresa').val();
			let publicidad         = $('#publicidad').val();
			let color1             = $('#color1').val();
			let color2             = $('#color2').val();
			let color3             = $('#color3').val();

			let data = "work=formulario_brief"
						+ "&nombre_logo=" + nombre_logo
						+ "&industria=" + industria
						+ "&dirigido=" + dirigido
						+ "&comunicar=" + comunicar
						+ "&personalidad_marca=" + personalidad_marca
						+ "&diseno=" + diseno
						+ "&elementos=" + elementos
						+ "&competencia=" + competencia
						+ "&empresa=" + empresa
						+ "&publicidad=" + publicidad
						+ "&color1=" + color1
						+ "&color2=" + color2
						+ "&color3=" + color3;	

			console.log(data);

			$.ajax({
		        data:  data,
		        	        url:   './core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		        },
		        success: function(data){
		        	console.log("RESPONSE: " + JSON.stringify(data));
		        	
		        	if(data == "added"){
		        	    message("Tus datos fueron enviados, pronto estaremos en contacto contigo.","success");
	        	    }else{
	        	        message(data,"error");
	        	    }

		        } 
		    });
		}else{
	       
			var campos = document.querySelectorAll(".campo-validar"); // Asigna la clase "campo-validar" a los campos que deseas validar

  var primerCampoVacio = null; // Almacenará el primer campo vacío

  campos.forEach(function (campo) {
    var valorCampo = campo.value.trim();

    if (valorCampo === "") {
      // El campo está vacío, marca el borde en rojo
      campo.style.border = "1.5px solid red";

      // Si es el primer campo vacío, guárdalo como el primer campo vacío
      if (!primerCampoVacio) {
        primerCampoVacio = campo;
      }
    } else {
      // El campo no está vacío, marca el borde en verde
      campo.style.border = "1.5px solid green";
    }
  });

  if (primerCampoVacio) {
    // Si hay un campo vacío, desplázate automáticamente a ese campo
    primerCampoVacio.focus();
    var elemento = primerCampoVacio.getBoundingClientRect().top + window.scrollY;
    window.scroll({ top: elemento, behavior: 'smooth' });
  }

  var formularioValido = Array.from(campos).every(function(campo) {
    return campo.value.trim() !== "";
  });
			
		}
	}

	function crear_historial_recibos_pago(){
		let data = "work=crear_historial_recibos_pago";

		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	        },
	        success: function(data){
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	if (data === "added") {
	        		message("Historial de recibos de pago creado.","success");
	        		redirection('./historial-recibos-de-pago.php');
	        	}else{
	        		messageConfirmation(data,"error");
	        	}

	        } 
	    });
	}

	function delete_recibo_pago(){

		if ($('#id_eliminar_recibo').val()!= '') {

			let id = $('#id_eliminar_recibo').val();

			turn_on_cargando();

			// nota = nota.replace(/(?:\r\n|\r|\n)/g, '<br>');

			let data = "work=delete_recibo_pago"
							+ "&id=" + id;

			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		message("Recibo eliminado","success");
						$('#modalDeleteRecibo').modal('hide');
						$("#lista-recibos").load(location.href+" #lista-recibos>*","");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, vuelve a intentarlo.","info");
		}
	}

	function status_condicion(status,id){

		turn_on_cargando();

		// nota = nota.replace(/(?:\r\n|\r|\n)/g, '<br>');

		let data = "work=status_condicion"
						+ "&status=" + status
						+ "&id=" + id;

		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	if (data === "updated") {
	        		$("#lista-condiciones-generales").load(location.href+" #lista-condiciones-generales>*","");
	        	}else{
	        		messageConfirmation(data,"error");
	        	}

	        } 
	    });
	}

	// function agregar_usuario(){

	// 	if ($('#nombre').val()!= ''
	// 		&& $('#usuario').val()!= ''
	// 		&& $('#password').val()!= ''
	// 		&& $('#telefono').val()!= ''
	// 		&& $('#correo').val()!= ''
	// 		&& $('#direccion').val()!= ''
	// 		&& $('#confirm_password').val()!= '') {

	// 		let nombre           = $('#nombre').val();
	// 		let usuario          = $('#usuario').val();
	// 		let password         = $('#password').val();
	// 		let telefono         = $('#telefono').val();
	// 		let correo           = $('#correo').val();
	// 		let direccion        = $('#direccion').val();
	// 		let confirm_password = $('#confirm_password').val();

	// 		if (password == confirm_password) {

	// 			turn_on_cargando();

	// 			let data = "work=agregar_usuario"
	// 						+ "&nombre=" + nombre
	// 						+ "&usuario=" + usuario
	// 						+ "&password=" + password
	// 						+ "&telefono=" + telefono
	// 						+ "&correo=" + correo
	// 						+ "&direccion=" + direccion
	// 						+ "&confirm_password=" + confirm_password;

	// 			console.log(data);

	// 			$.ajax({
	// 		        data:  data,
	// 		        url:   '../../core/backend/process/controlador.php',
	// 		        type:  'POST',
	// 		        beforeSend: function () {

	// 		        },
	// 		        error:  function () {
	// 		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	// 		            turn_off_cargando();
	// 		        },
	// 		        success: function(data){
	// 		        	turn_off_cargando();
	// 		        	console.log("RESPONSE: " + JSON.stringify(data));
	// 		        	var data_check = data.split(",");

	// 		        	if (data_check[0] === "added") {
	// 		        		message("Usuario registrado","success");
	// 		        		$("#check").load(location.href+" #check>*","");
	// 		        		close_modal("modalAddUser");
	// 		        		usuario_permisos(data_check[1]);
	// 		        	}else{
	// 		        		messageConfirmation(data_check[0],"error");
	// 		        	}

	// 		        } 
	// 		    });
	// 		}else{
	// 			message("Verifica tu contraseña.","info");
	// 		}

	// 	}else{
	// 		message("Ingresa los campos solicitados.","info");
	// 	}
	// }

	// function editar_usuario(id_usuario){

	// 	if ($('#nombre_e').val()!= ''
	// 		&& $('#usuario_e').val()!= ''
	// 		&& $('#password_e').val()!= ''
	// 		&& $('#telefono_e').val()!= ''
	// 		&& $('#correo_e').val()!= ''
	// 		&& $('#direccion_e').val()!= ''
	// 		&& $('#confirm_password_e').val()!= '') {

	// 		let nombre           = $('#nombre_e').val();
	// 		let usuario          = $('#usuario_e').val();
	// 		let password         = $('#password_e').val();
	// 		let telefono         = $('#telefono_e').val();
	// 		let correo           = $('#correo_e').val();
	// 		let direccion        = $('#direccion_e').val();
	// 		let confirm_password = $('#confirm_password_e').val();

	// 		if (password == confirm_password) {

	// 			turn_on_cargando();

	// 			let data = "work=editar_usuario"
	// 						+ "&nombre=" + nombre
	// 						+ "&usuario=" + usuario
	// 						+ "&password=" + password
	// 						+ "&telefono=" + telefono
	// 						+ "&correo=" + correo
	// 						+ "&direccion=" + direccion
	// 						+ "&confirm_password=" + confirm_password
	// 						+ "&id_usuario=" + id_usuario;

	// 			console.log(data);

	// 			$.ajax({
	// 		        data:  data,
	// 		        url:   '../../core/backend/process/controlador.php',
	// 		        type:  'POST',
	// 		        beforeSend: function () {

	// 		        },
	// 		        error:  function () {
	// 		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	// 		            turn_off_cargando();
	// 		        },
	// 		        success: function(data){
	// 		        	turn_off_cargando();
	// 		        	console.log("RESPONSE: " + JSON.stringify(data));

	// 		        	if (data === "updated") {
	// 		        		message("Usuario actualizado.","success");
	// 		        		$("#check").load(location.href+" #check>*","");
	// 		        		close_modal("modalInfoUser");
	// 		        	}else{
	// 		        		messageConfirmation(data,"error");
	// 		        	}

	// 		        } 
	// 		    });
	// 		}else{
	// 			message("Verifica tu contraseña.","info");
	// 		}

	// 	}else{
	// 		message("Ingresa los campos solicitados.","info");
	// 	}
	// }

	function usuario_permisos(id_usuario){
		turn_on_cargando();

		let data = "work=usuario_permisos"
					+ "&id_usuario=" + id_usuario;
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + data);

	        	$('#results').html(data);
	        	open_modal('modalPermisos');

	        } 
	    });
	}

	function usuario_info(id_usuario){
		turn_on_cargando();

		let data = "work=usuario_info"
					+ "&id_usuario=" + id_usuario;
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + data);

	        	$('#data-user').html(data);
	        	open_modal('modalInfoUser');

	        } 
	    });
	}

	function status_permiso(id){

		let check = document.getElementById('check-' + id);
		let status = "";

		if (check.checked) {
			status = "true";
		}else{
			status = "false";
		}

		turn_on_cargando();

		let data = {
			work: 'status_permiso',
			status,
			id
		};
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + data);

	        	if (data === "updated") {

	        	}else{
	        		messageConfirmation(data,"error");
	        	}

	        } 
	    });
	}

	function delete_usuario(){
		if ($('#id_eliminar').val()!=""){

			let id_eliminar = $('#id_eliminar').val();

			turn_on_cargando();

			let data = "work=delete_usuario"
						+ "&id_eliminar=" + id_eliminar;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		$("#check").load(location.href+" #check>*","");
		        		close_modal("modalDeleteProspect");
						message("Usuario eliminado.","success");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Error, intenta nuevamente.","error");
		}
	}

	function crear_chat(){
		console.log("chat");
		// turn_on_cargando();

		let data = "work=crear_chat";
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   './sistema/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            // turn_off_cargando();
	        },
	        success: function(data){
	        	// turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

        		// $("#check-chat").load(location.href+" #check-chat>*","");
        		$('#data-chat').html(data);

        		// document.getElementById('page-content').style.display = "block";

	        } 
	    });
	}

	function responder_chat(){
		if ($('#chat_usuario').val()!=""){

			let chat_usuario = $('#chat_usuario').val();

			// turn_on_cargando();

			let data = "work=responder_chat"
						+ "&chat_usuario=" + chat_usuario;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   './sistema/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            // turn_off_cargando();
		        },
		        success: function(data){
		        	// turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	// $("#check-chat").load(location.href+" #check-chat>*","");
        			$('#data-chat').html(data);
        			$('#chat_usuario').val("");

		        } 
		    });
		}else{
			message("Escribe el mensaje.","error");
		}
	}

	function enviar_correo(){
		if(
			$('#para').val()!=''
			// && $('#cc').val()!=''
			// && $('#bcc').val()!=''
			&& $('#titulo').val()!=''
		){
			turn_off_cargando();

			let para   = $('#para').val();
			let cc     = $('#cc').val();
			let bcc    = $('#bcc').val();
			let titulo = $('#titulo').val();

			let descripcion = tinymce.get("kt_docs_tinymce_hidden").getContent();
			descripcion     = description_clean_ascii(descripcion);

			let data = "work=enviar_correo"
					 + "&para=" + para
					 + "&cc=" + cc
					 + "&bcc=" + bcc
					 + "&titulo=" + titulo
					 + "&descripcion=" + descripcion;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));
		        	var data_check = data.split(",");

		        	if (data_check[0] === "registered") {
		        		enviar_correo_mail(data_check[1],cc,bcc,titulo,descripcion);
		        	}else{
		        		messageConfirmation(data_check[0]);
		        	}
		        } 
		    });
		}else{
			message("Completa los datos del mensaje.","info");
		}
	}

	function enviar_correo_mail(para,cc,bcc,titulo,descripcion){

		turn_off_cargando();

		let data = "work=enviar_correo"
				 + "&para=" + para
				 + "&cc=" + cc
				 + "&bcc=" + bcc
				 + "&titulo=" + titulo
				 + "&descripcion=" + descripcion;
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador-mails.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	if (data.includes('Message has been sent correctly.')) {
	        		// mail_cotizacion_update(id_cotizacion,mensaje);
	        		// $("#lista-ordenesservicio").load(location.href+" #lista-cotizaciones>*","");
	        		message("Correo enviado a " + para,"success");
	        		// redirection('');
	        		setTimeout(function(){ location = ""; }, 2000);
	        	}else{
	        		messageConfirmation(data,"error");
	        	}
	        } 
	    });
	}

	function get_correo_enviado(id){

		turn_off_cargando();

		let data = "work=get_correo_enviado"
				 + "&id=" + id;
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));
				var data_check = data.split("|");

	        	if (data_check[0] === "get") {
					let id_prospecto = data_check[1];
					let titulo       = data_check[2];
					let mensaje      = data_check[3];
					let fecha        = data_check[4];
					let nombre       = data_check[5];
					let apellidos    = data_check[6];
					let empresa      = data_check[7];
					let email        = data_check[8];

					document.getElementById('mostrar_titulo').innerHTML = titulo;
					document.getElementById('mostrar_nombre_completo').innerHTML = nombre + " " + apellidos;
					document.getElementById('mostrar_fecha').innerHTML = fecha;
					document.getElementById('mostrar_mensaje').innerHTML = mensaje;
					document.getElementById('reenviar_para').value = email;
					document.getElementById('reenviar_titulo').value = titulo;
					
	        	}else{
	        		message(data_check[0],"error");
	        	}
	        } 
	    });

	}

	function get_mensajes_contacto(contacto){

		turn_off_cargando();

		let data = "work=get_mensajes_contacto"
				 + "&contacto=" + contacto;
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));
				var data_check = data.split("|");

	        	if (data_check[0] === "get") {
					document.getElementById('not-show').style.display = "none";
					document.getElementById('show').style.display = "block";
					let nombre  = data_check[1];
					let mensaje = data_check[2];

					document.getElementById('whatsapp_nombre').innerHTML = nombre;
					document.getElementById('whatsapp_mensaje').innerHTML = mensaje;
					document.getElementById('whatsapp_id').value = contacto;
					
	        	}else{
	        		message(data_check[0],"error");
	        	}
	        } 
	    });

	}

	function enviar_contestacion(){
		if (
			$('#mensaje_contestacion').val()!=''
			&& $('#whatsapp_id').val()!=''
			) {

			let mensaje_contestacion = $('#mensaje_contestacion').val();
			let whatsapp_id          = $('#whatsapp_id').val();

			turn_off_cargando();

			let data = "work=enviar_contestacion"
					 + "&mensaje_contestacion=" + mensaje_contestacion
					 + "&whatsapp_id=" + whatsapp_id;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "sent") {
		        		messageConfirmation("Mensaje enviado.","info");
		        		$('#mensaje_contestacion').val('');
		        		get_mensajes_contacto(whatsapp_id);
		        	}else{
		        		messageConfirmation(data,"error");
		        	}
		        } 
		    });
		}else{
			messageConfirmation("Ingresa el mensaje.","error");	
		}
	}

	function actualizar_token(){
		if ($('#token').val()!='') {

			let token = $('#token').val();

			turn_off_cargando();

			let data = "work=actualizar_token"
					 + "&token=" + token;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "updated") {
		        		document.getElementById('btn-actualizar').classList.remove('btn-info');
		        		document.getElementById('btn-actualizar').classList.add('btn-success');
		        		document.getElementById('btn-actualizar').innerHTML = "Actualizado";

		        		document.getElementById('btn-cerrar').innerHTML = "Cerrar";
		        	}else{
		        		message(data,"error");
		        	}
		        } 
		    });
		}else{
			messageConfirmation("Ingresa el token.","error");
		}
	}

	function agregar_contacto(){
		if ($('#nuevo_contacto').val()!='' && $('#nombre_contacto').val()!='') {

			let nuevo_contacto = $('#nuevo_contacto').val();
			let nombre_contacto = $('#nombre_contacto').val();

			turn_off_cargando();

			let data = "work=agregar_contacto"
					 + "&nuevo_contacto=" + nuevo_contacto
					 + "&nombre_contacto=" + nombre_contacto;
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
		        		message("Contacto registrado.","success");
		        		redirection("");
		        	}else{
		        		message(data,"error");
		        	}
		        } 
		    });
		}else{
			messageConfirmation("Ingresa los datos del contacto.","error");
		}
	}

	function agregar_plantilla(){
		if($('#titulo').val()!='' && $('#plantilla').val()!=''){

			// var fd = new FormData();
			// var files = $('#plantilla')[0].files[0];
			// fd.append('plantilla', files);
			// fd.append('work', 'agregar_plantilla');
			// fd.append('titulo', titulo);

			// console.log(JSON.stringify(fd));
			// console.log(fd.get('plantilla'));
			// console.log(fd);

			// turn_on_cargando();
			// console.log("Images cargador");

			// $.ajax({
			// 	data: fd,
			// 	url: './process/controlador-imgs.php',
			// 	type: 'POST',    
		 //        contentType: false,
		 //        processData: false,
		 //        beforeSend: function () {

		 //        },
		 //        error:  function () {
		 //        	messageConfirmation("ERROR, al conectarse al SERVIDOR DE IMAGENES...","error");
		 //            turn_off_cargando();
		 //        },
		 //        success: function(data){
		 //        	turn_off_cargando();
		 //        	console.log("Img: " + data);
		 //        	if (data === "uploaded") {
		 //        		message("Plantilla agregada.", "success");
		 //        		redirection('');
		 //        	}else{
			// 			message(data, "error");
		 //        	}
		 //        }
		 //    });

			let titulo    = $('#titulo').val();

			let plantilla = tinymce.get("kt_docs_tinymce_hidden").getContent();
			plantilla = description_clean_ascii(plantilla);

			plantilla = plantilla.replace(/'/gi, "@...@");
			plantilla = plantilla.replace(/&/gi, "@.....@");

			turn_off_cargando();

			let data = "work=agregar_plantilla"
					 + "&titulo=" + titulo
					 + "&plantilla=" + plantilla;
			console.log(data);

			$.ajax({
				data:  data,
				url:   '../../core/backend/process/controlador.php',
				type:  'POST',
			beforeSend: function () {

			},
			error:  function (err) {
				messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
				turn_off_cargando();
			},
			success: function(data){
				turn_off_cargando();
				console.log("RESPONSE: " + JSON.stringify(data));

				if (data === "added") {
					message("Contacto registrado.","success");
					redirection("");
				}else{
					message(data,"error");
				}
			}
			})
		}else{
			messageConfirmation("Ingresa el título y plantilla.","error");
		}
	}

	function show_pdf(url,nombre_archivo){
		console.log(url,nombre_archivo);
		var modalContent = document.getElementById("modalContent");
		modalContent.src = url;

		var downloadButton = document.getElementById("downloadButton");
		downloadButton.href = url;
		downloadButton.download = nombre_archivo;

		$('#modalChargeContent').modal('show');
	}

	function go_role(id_prospecto){
		message("Cargando información","info");
		redirection('./detalles-prospecto.php?_id=' + id_prospecto + '&_rol=Prospecto');
	}

	function cargarDatosJkanban(tipo){
		turn_off_cargando();

		let data = {
			work: "cargarDatosJkanban",
			tipo: tipo
		};
		console.log(data);

		$.ajax({
			data:  data,
			url:   '../../core/backend/process/controlador.php',
			type:  'POST',
			beforeSend: function () {

			},
			error:  function (err) {
				messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
				turn_off_cargando();
			},
			success: function(data){
				turn_off_cargando();
				console.log("RESPONSE: ", data);

				var datos                = JSON.parse(data);
	            var jKanbanElement       = document.getElementById("kt_docs_jkanban_basic");
	            jKanbanElement.innerHTML = '';

	            var kanban = new jKanban({
	                element: '#kt_docs_jkanban_basic',
	                gutter: '0',
	                widthBoard: '200px',
	                boards: [
	                    {
	                        'id': '_sinprocesar',
	                        'title': 'Sin procesar',
	                        'item': []
	                    },
	                    {
	                        'id': '_encurso',
	                        'title': 'En curso',
	                        'item': []
	                    },
	                    {
	                        'id': '_interesado',
	                        'title': 'Interesados',
	                        'item': []
	                    },
						{
	                        'id': '_ganados',
	                        'title': 'Ganados',
	                        'item': []
	                    }
	                ],
    				dragBoards: false,
	                dropEl: function(el, target, source, sibling) {
	                    var targetId = target.parentElement.getAttribute('data-id');
	                    var elId     = el.getAttribute('data-eid');
	                    
	                    var data = {
	                    	work: "actualizar_status",
	                        id: elId,
	                        status: targetId
	                    };
	                    console.log(data);
	                    $.ajax({
	                        type: "POST",
	                        url: "./process/controlador.php",
	                        data: data,
	                        success: function(response) {
	                            console.log(response);

	                            if(response=="updated"){
	                            	cargarDatosJkanban('prospecto');	
	                            }else{
	                            	messageConfirmation(response,"error");
	                            }
	                            
	                        }
	                    });
	                }
	            });

	            datos.forEach(function(dato) {
	                var nuevoElemento = {
	                    title: 
	                    	'<div class="card bg-light mb-2">'
								+ '<div class="card-body" onclick="go_role(' + dato.id + ');">'
									+ '<a href="./detalles-prospecto.php?_id=' + dato.id + '&_rol=Prospecto">'
										+ dato.codigo
									+ '</a>'
									+ '<br>'
									+ '<small>'
										+ dato.nombre
									+ '</small>'
								+ '</div>'
							+ '</div>',
	                    id: dato.id
	                };
	                kanban.addElement(dato.status_proceso, nuevoElemento);
	            });        
			}
		});
	}

	function get_tags_results(tag,id_prospecto,id_servicio,codigo){
		turn_on_cargando();

		let data = {
			work: 'get_tags_results',
			tag: tag,
			id_prospecto: id_prospecto,
			id_servicio: id_servicio,
			codigo: codigo
		};
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

				var resultadoDiv       = document.getElementById('resultado');
				resultadoDiv.innerHTML = '';
				resultadoDiv.innerHTML += data;
	        } 
	    });
	}

	function get_data_whatsapp(){

		turn_on_cargando();

		let id           = $('#send_recibo_id').val();
		let pdf          = $('#send_recibo_pdf').val();
		let email        = $('#send_recibo_email').val();
		let id_prospecto = $('#send_recibo_id_prospecto').val();
		let whatsapp     = $('#send_recibo_whatsapp').val();
		let url          = "https://induce.mx/uploads/pdf/saves/recibos_pago/" + pdf;

		let data = {
			work: 'get_data_whatsapp',
			id,
			pdf,
			email,
			id_prospecto,
			whatsapp,
			url
		};
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));
	        	
	        	$('#mensaje-whatsapp').html(data);
	        	open_modal('modalGetWhatsapp');
	        } 
	    });
	}

	function get_plantilla_correo_set(){
		turn_on_cargando();

		let id = $('#plantilla_id').val();

		let data = {
			work: 'get_plantilla_correo_set',
			id
		};
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));
	        	
	        	// $('#show_cuerpo_recibo').html(data);
	        	$('#mensaje_correo_recibo').html(data);
	        } 
	    });
	}

	function set_status_prospecto(ids,status){
		turn_on_cargando();

		let id = $('#plantilla_id').val();

		let data = {
			work: 'set_status_prospecto',
			ids,
			status
		};
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));
	        	
	        } 
	    });
	}

	function set_status_prospecto_unitario(id,status){
		turn_on_cargando();

		let data = {
			work: 'set_status_prospecto_unitario',
			id,
			status
		};
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));
	        	
	        } 
	    });
	}

	function check_exist_prospecto(){
		if($('#id_prospecto_buscar').val()!=''){

			let id_prospecto_buscar = $('#id_prospecto_buscar').val();
			turn_on_cargando();

			let data = {
				work: 'check_exist_prospecto',
				id_prospecto_buscar
			};
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data == 'no') {
		        		// message("No existe este cliente, agregalo.","info");
		        		// document.getElementById('show-add1').style.display = 'none';
		        		document.getElementById('show-add2').style.display = 'block';
		        	}else{
		        		document.getElementById('show-add1').style.display = 'block';
		        		document.getElementById('show-add2').style.display = 'none';
		        	}
		        	
		        } 
		    });
		}else{
			messageConfirmation("Ingresa el nombre.","info");
		}
	}

	function guardar_propecto_servicio(){
		if($('#id_prospecto_buscar_select').val()!=''
			&& $('#id_servicio_buscar').val()!=undefined
			){

			let id_prospecto_buscar_select = $('#id_prospecto_buscar_select').val();
			let id_servicio_buscar         = $('#id_servicio_buscar').val();
			turn_on_cargando();

			let data = {
				work: 'guardar_propecto_servicio',
				id_prospecto_buscar_select,
				id_servicio_buscar
			};
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data == 'added') {
		        		message("Servicio agregado.","success");
		        		redirection('');
		        	}else{
		        		messageConfirmation(data,"error");
		        	}
		        	
		        } 
		    });
		}else{
			messageConfirmation("Selecciona el prospecto y servicio.","info");
		}
	}

	function nuevo_propecto_servicio(){
		console.log("nuevo_propecto_servicio");

		if ($('#nombre').val()!=""
				&& $('#id_servicio_buscar2').val()!=undefined
				// && $('#empresa').val()!=""
				// && $('#direccion').val()!=""
				// && $('#puesto').val()!=""
				// && $('#email').val()!=""
				// && $('#telefono_oficina').val()!=""
				// && $('#telefono_celular').val()!=""
				){

			let nombre              = $('#nombre').val();
			let apellidos           = $('#apellidos').val();
			let empresa             = $('#empresa').val();
			let direccion           = $('#direccion').val();
			// let puesto           = $('#puesto').val();
			let puesto              = "";
			let email               = $('#email').val();
			let telefono_oficina    = $('#telefono_oficina').val();
			let telefono_celular    = $('#telefono_celular').val();
			let extencion           = $('#extencion').val();
			let id_servicio_buscar2 = $('#id_servicio_buscar2').val();

			turn_on_cargando();

			let data = {
				work: 'nuevo_propecto_servicio',
				nombre,
				apellidos,
				empresa,
				direccion,
				puesto,
				email,
				telefono_oficina,
				telefono_celular,
				extencion,
				mensaje: 'NO',
				id_servicio_buscar2
			};
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "added") {
						message("Prospecto agregado con servicio.","success");
						redirection("");

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Ingresa los datos solicitados.","error");
		}
	}

	function servicio_status(id_servicio,status){
		console.log("servicio_status");
		turn_on_cargando();

		let data = {
			work: 'servicio_status',
			id_servicio,
			status
		};
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	if (data === "updated") {
					message("Servicio " + status,"success");
					redirection("");

	        	}else{
	        		messageConfirmation(data,"error");
	        	}

	        } 
	    });
	}

	function get_ciudad(){
		let estado = $('#estado').val();

		let data = "estado=" + estado;

		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/estados-ciudades.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	        	messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	console.log(JSON.stringify(data));
	        	turn_off_cargando();

	        	$('#ciudad').html(data);
	        } 
		});
	}

	function agregar_operacion(id_prospecto){
		console.log("agregar_operacion");
		if($('#operacion_set').val()!=''){
			let operacion = $('#operacion_set').val();

			let compraventa_vendedor    = $('#compraventa_vendedor').val();
			let compraventa_comprador   = $('#compraventa_comprador').val();
			let compraventa_monto       = $('#compraventa_monto').val();
			let compraventa_descripcion = $('#compraventa_descripcion').val();
			let compraventa_requiere    = $('#compraventa_requiere').val();
			let compraventa_reserva     = $('#compraventa_reserva').val();

			let permutantes_permutantes = $('#permutantes_permutantes').val();
			let permutantes_monto       = $('#permutantes_monto').val();
			let permutantes_descripcion = $('#permutantes_descripcion').val();
			let permutantes_requiere    = $('#permutantes_requiere').val();

			let donacion_donante     = $('#donacion_donante').val();
			let donacion_donatario   = $('#donacion_donatario').val();
			let donacion_descripcion = $('#donacion_descripcion').val();
			let donacion_requiere    = $('#donacion_requiere').val();
			let donacion_reserva     = $('#donacion_reserva').val();

			let testamento_testador = $('#testamento_testador').val();
			let testamento_testigos = $('#testamento_testigos').val();

			let poder_poderdante = $('#poder_poderdante').val();
			let poder_apoderado  = $('#poder_apoderado').val();
			let poder_tipo       = $('#poder_tipo').val();

			let constitucion_compareciente = $('#constitucion_compareciente').val();
			let constitucion_sociedad      = $('#constitucion_sociedad').val();
			let constitucion_tipo          = $('#constitucion_tipo').val();

			let actas_socios   = $('#actas_socios').val();
			let actas_sociedad = $('#actas_sociedad').val();
			let actas_tipo     = $('#actas_tipo').val();

			turn_on_cargando();

			let data1 = {
				work: 'agregar_operacion',
				operacion,
				id_prospecto,
				compraventa_vendedor,
				compraventa_comprador,
				compraventa_monto,
				compraventa_descripcion,
				permutantes_permutantes,
				permutantes_monto,
				permutantes_descripcion,
				donacion_donante,
				donacion_donatario,
				donacion_descripcion,
				testamento_testador,
				testamento_testigos,
				poder_poderdante,
				poder_apoderado,
				constitucion_compareciente,
				constitucion_sociedad,
				constitucion_tipo,
				actas_socios,
				actas_sociedad,
				actas_tipo,
				compraventa_requiere,
				compraventa_reserva,
				permutantes_requiere,
				donacion_requiere,
				donacion_reserva,
				poder_tipo
			};
			console.log(data1);

			$.ajax({
		        data:  data1,
		        url:   '../../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "registered") {
						message("Operación " + operacion + " registrada.","success");
						redirection("");

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			messageConfirmation("Selecciona una operación e ingresa todos los datos.","info");
		}
	}

	function crear_contrato_compraventa(id_cliente,id){
		// turn_on_cargando();

		let check1  = document.getElementById('radios_fecha_orden_1');
		let check2  = document.getElementById('radios_fecha_orden_2');
		let bandera = 0;
		let fecha   = "";

		if (check2.checked == true) {
			if ($('#fecha_orden_selecta').val() != ""){
				bandera = 1;
				fecha   = $('#fecha_orden_selecta').val();
			}else{
				bandera = 0;
				fecha   = "";
			}
		}else{
			bandera = 1;
			fecha   = "";
		}

		let url = "../../configuration/backend/docs/pdf/contrato-compraventa.php"
				+ "?id_cliente=" + id_cliente 
		        + "&id=" + id
		        + "&fecha=" + fecha;
		console.log(url);
		var modalContent = document.getElementById("modalContent");
	    modalContent.src = url;

	    let url2 = "http://localhost/trabajos/induce/notaria103/configuration/backend/docs/pdf/contrato-compraventa.php?id_cliente=" + id_cliente + "&id=" + id + "&fecha=" + fecha;
	    console.log("url2", url2);
	    document.getElementById('downloadButton').href = url2;
		$('#modalChargeContent').modal('show');

		$('#modalCotizacion').modal('hide');
		setTimeout(function(){ $("#lista-cotizaciones").load(location.href+" #lista-cotizaciones>*",""); }, 5000 );
	}

	function get_codigo_postal(){
		let cp = $('#cp').val();

		let data = {
			work: 'get_codigo_postal',
			cp
		};

		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function () {
	        	messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	console.log('RESPONSE: ', data);
	        	turn_off_cargando();

	        	$('#colonia').html(data);
	        } 
		});
	}

	function get_cliente(clienteId){
		// var selectedOption = document.querySelector('#clientes option[value="' + this.value + '"]');
		// var clienteId = selectedOption ? selectedOption.getAttribute('data-cliente-id') : null;
		// console.log('ID del cliente seleccionado:', clienteId);

		let id_cliente = clienteId;
		console.log(id_cliente);

		document.getElementById('show-cliente').style.display = 'none';
		document.getElementById('show-cliente2').style.display = 'block';

		if (id_cliente=='agregar') {
			document.getElementById('show-cliente').style.display = 'block';
			document.getElementById('show-cliente2').style.display = 'none';
			// $('#id_cliente').val('');
			$('#clienteNuevo').val('true');
		}else if (id_cliente!='agregar' && id_cliente!=undefined) {
			$('#clienteNuevo').val('false');

			turn_on_cargando();

			let data = {
				work: 'get_cliente',
				id_cliente
			};
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	var data_check = data.split("|");

		        	if (data_check[0] === "exist") {
		        		$('#telefono').val(data_check[1]);
		        		document.getElementById("telefono").readOnly = true;
		        	}else{
		        		message(data_check[0],"error");
		        	}
		        } 
		    });
		}
	}

	function get_cliente2(){
		// var selectedOption = document.querySelector('#clientes option[value="' + this.value + '"]');
		// var clienteId = selectedOption ? selectedOption.getAttribute('data-cliente-id') : null;
		// console.log('ID del cliente seleccionado:', clienteId);

		let id_cliente = $('#id_cliente').val();
		console.log(id_cliente);

		document.getElementById('show-cliente').style.display = 'none';
		document.getElementById('show-cliente2').style.display = 'block';

		if (id_cliente=='agregar') {
			document.getElementById('show-cliente').style.display = 'block';
			document.getElementById('show-cliente2').style.display = 'none';
			// $('#id_cliente').val('');
			$('#clienteNuevo').val('true');
		}else if (id_cliente!='agregar' && id_cliente!=undefined) {
			$('#clienteNuevo').val('false');

			turn_on_cargando();

			let data = {
				work: 'get_cliente',
				id_cliente
			};
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	var data_check = data.split("|");

		        	if (data_check[0] === "exist") {
		        		$('#telefono').val(data_check[1]);
		        		document.getElementById("telefono").readOnly = true;
		        	}else{
		        		message(data_check[0],"error");
		        	}
		        } 
		    });
		}
	}

	function agregar_calendario(){
		if(
			$('#id_cliente').val()!=''
			// $('#telefono').val()!=''
			&& $('#id_servicio').val()!=''
			&& $('#kt_calendar_datepicker_start_date').val()!=''
			&& $('#kt_calendar_datepicker_start_time').val()!=''
			&& $('#kt_calendar_datepicker_end_date').val()!=''
			&& $('#kt_calendar_datepicker_end_time').val()!=''
			// && $('#descripcion').val()!=''
			&& $('#clienteNuevo').val()!=''
		){

			/*
			var selectedValue = document.getElementById('id_cliente').value;
			var selectedOption = document.querySelector('#clientes option[value="' + selectedValue + '"]');
			var clienteId = selectedOption ? selectedOption.getAttribute('data-cliente-id') : null;
			console.log('ID del cliente seleccionado:', clienteId);
			*/

			let id_cliente   = $('#id_cliente').val();
			let telefono     = $('#telefono').val();
			let id_servicio  = $('#id_servicio').val();
			let fecha_inicio = $('#kt_calendar_datepicker_start_date').val();
			let hora_inicio  = $('#kt_calendar_datepicker_start_time').val();
			// let fecha_fin    = $('#kt_calendar_datepicker_end_date').val();
			let fecha_fin    = "";
			let hora_fin     = $('#kt_calendar_datepicker_end_time').val();
			let descripcion  = $('#descripcion').val();
			let clienteNuevo = $('#clienteNuevo').val();

			let bandera        = false;
			let nuevo_nombre   = '';
			let nuevo_telefono = '';

			if (clienteNuevo=='true') {
				if(
					$('#nuevo_nombre').val()!=''
					&& $('#nuevo_telefono').val()!=''
				){
					bandera        = true;
					nuevo_nombre   = $('#nuevo_nombre').val();
					nuevo_telefono = $('#nuevo_telefono').val();
				}else{
					bandera = false;
					messageConfirmation("Ingresa los datos del nuevo cliente.","info");
				}
			}else{
				bandera = true;
			}

			if (bandera) {
				turn_on_cargando();

				let data = {
					work: 'agregar_calendario',
					id_cliente,
					telefono,
					id_servicio,
					fecha_inicio,
					hora_inicio,
					fecha_fin,
					hora_fin,
					descripcion,
					clienteNuevo,
					nuevo_nombre,
					nuevo_telefono
				};
				console.log(data);

				$.ajax({
			        data:  data,
			        url:   '../core/backend/process/controlador.php',
			        type:  'POST',
			        beforeSend: function () {

			        },
			        error:  function (err) {
			            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
			            turn_off_cargando();
			        },
			        success: function(data){
			        	turn_off_cargando();
			        	console.log("RESPONSE: " + JSON.stringify(data));

			        	if (data === "registered") {
			        		message("Agregada al calendario.","success");
							redirection('./pages/calendario.php');
			        	}else{
			        		message(data,"error");
			        	}
			        } 
			    });
			}
		}else{
			messageConfirmation("Ingresa los datos solicitados.","info");
		}
	}

	function get_agenda(){
		if ($('#id_agenda_editar').val()!='') {

			let id = $('#id_agenda_editar').val();

			turn_on_cargando();

			let data = {
				work: 'get_agenda',
				id
			};
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	$('#results-edit').html(data);
	        		open_modal('modalEditarAgenda');
		        } 
		    });
		}
	}

	function editar_calendario(){
		if(
			$('#id_agenda_editar').val()!=''
			// $('#editar_telefono').val()!=''
			&& $('#editar_id_servicio').val()!=''
			&& $('#editar_kt_calendar_datepicker_start_date').val()!=''
			// && $('#editar_kt_calendar_datepicker_start_time').val()!=''
			&& $('#editar_kt_calendar_datepicker_end_date').val()!=''
			// && $('#editar_kt_calendar_datepicker_end_time').val()!=''
			// && $('#editar_descripcion').val()!=''
			&& $('#editar_clienteNuevo').val()!=''
		){
			var selectedValue = document.getElementById('editar_id_cliente').value;
			var selectedOption = document.querySelector('#editar_clientes option[value="' + selectedValue + '"]');
			var clienteId = selectedOption ? selectedOption.getAttribute('data-cliente-id') : null;
			console.log('ID del cliente seleccionado:', clienteId);

			let id_cliente   = clienteId;
			let telefono     = $('#editar_telefono').val();
			let id_servicio  = $('#editar_id_servicio').val();
			let fecha_inicio = $('#editar_kt_calendar_datepicker_start_date').val();
			let hora_inicio  = $('#editar_kt_calendar_datepicker_start_time').val();
			// let fecha_fin    = $('#editar_kt_calendar_datepicker_end_date').val();
			let fecha_fin    = "";
			let hora_fin     = $('#editar_kt_calendar_datepicker_end_time').val();
			let descripcion  = $('#editar_descripcion').val();
			let clienteNuevo = $('#editar_clienteNuevo').val();

			let id_agenda_editar = $('#id_agenda_editar').val();

			let bandera        = true;
			let nuevo_nombre   = '';
			let nuevo_telefono = '';

			if (bandera) {
				turn_on_cargando();

				let data = {
					work: 'editar_calendario',
					id_cliente,
					telefono,
					id_servicio,
					fecha_inicio,
					hora_inicio,
					fecha_fin,
					hora_fin,
					descripcion,
					clienteNuevo,
					nuevo_nombre,
					nuevo_telefono,
					id_agenda_editar
				};
				console.log(data);

				$.ajax({
			        data:  data,
			        url:   '../core/backend/process/controlador.php',
			        type:  'POST',
			        beforeSend: function () {

			        },
			        error:  function (err) {
			            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
			            turn_off_cargando();
			        },
			        success: function(data){
			        	turn_off_cargando();
			        	console.log("RESPONSE: " + JSON.stringify(data));

			        	if (data === "updated") {
			        		message("Agregada actualizada.","success");
							redirection('');
			        	}else{
			        		message(data,"error");
			        	}
			        } 
			    });
			}
		}else{
			messageConfirmation("Ingresa los datos solicitados.","info");
		}
	}

	function eliminar_calendario(){
		if(
			$('#id_agenda_editar').val()!=''
		){
			let id = $('#id_agenda_editar').val();

			turn_on_cargando();

			let data = {
				work: 'eliminar_calendario',
				id
			};
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
		        		message("Eliminado de tu calendario.","success");
						redirection('');
		        	}else{
		        		message(data,"error");
		        	}
		        } 
		    });
		}else{
			messageConfirmation("Ingresa los datos solicitados.","info");
		}
	}

	function get_hora_fin(){
		let hora_inicio = $('#kt_calendar_datepicker_start_time').val();
		turn_on_cargando();

		let data1 = {
			work: 'get_hora_fin',
			hora_inicio
		};
		console.log(data1);

		$.ajax({
	        data:  data1,
	        url:   '../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	$('#kt_calendar_datepicker_end_time').html(data);
                // $('#kt_calendar_datepicker_end_time').prop('disabled', false);
	        } 
	    });
	}

	function status_calendario(status){
		if(
			$('#nota_status').val()!=''
		){
			let id = $('#id_agenda_editar').val();
			let nota = $('#nota_status').val();
			turn_on_cargando();

			let data1 = {
				work: 'status_calendario',
				id,
				status,
				nota
			};
			console.log(data1);

			$.ajax({
		        data:  data1,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "updated") {
		        		message("Agenda " + status,"success");
		        		redirection('./pages/calendario.php');
		        	}else{
		        		message(data,"error");
		        	}
		        } 
		    });
		}else{
			messageConfirmation("Ingresa una nota.","info");
		}
	}

	function capacidad_servicio(){
		if(
			$('#capacidad_id').val()!=''
			&& $('#capacidad_nombre').val()!=''
			&& $('#capacidad_capacidad').val()!=''
		){
			let id = $('#capacidad_id').val();
			let nombre = $('#capacidad_nombre').val();
			let capacidad = $('#capacidad_capacidad').val();

			turn_on_cargando();

			let data = {
				work: 'capacidad_servicio',
				id,
				nombre,
				capacidad
			};
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "registered") {
		        		message("Capacidad de servicio registrada.","success");
						redirection('./pages/servicios.php');
		        	}else{
		        		message(data,"error");
		        	}
		        } 
		    });
		}else{
			messageConfirmation("Ingresa los datos solicitados.","info");
		}
	}

	function capacidad_servicio2(id,campo){
		if(
			$('#capacidad-' + campo + '-' + id).val()!=''
		){
			let capacidad = $('#capacidad-' + campo + '-' + id).val();

			turn_on_cargando();

			let data = {
				work: 'capacidad_servicio2',
				id,
				capacidad,
				campo
			};
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "updated") {

		        	}else{
		        		message(data,"error");
		        	}
		        } 
		    });
		}else{
			messageConfirmation("Ingresa los datos solicitados.","info");
		}
	}

	function get_capacidad_servicio(id_servicio){

		turn_on_cargando();

		let data = {
			work: 'get_capacidad_servicio',
			id_servicio
		};
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	$('#results-capacidad').html(data);
        		open_modal('modalGetCapacidad');
	        } 
	    });
	}

	function agregar_usuario(){
		if (
			$('#nombre').val()!=''
			&& $('#usuario').val()!=''
			&& $('#password').val()!=''
				){

			let nombre   = $('#nombre').val();
			let usuario  = $('#usuario').val();
			let password = $('#password').val();

			turn_on_cargando();

			let data1 = {
				work: 'agregar_usuario',
				nombre,
				usuario,
				password
			};
			console.log(data1);

			$.ajax({
		        data:  data1,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "registered") {
						close_modal('modalAgregar');
						$('#nombre').val('');
						$('#usuario').val('');
						$('#password').val('');

		        		$("#tabla-usuarios").load(location.href+" #tabla-usuarios>*","");
						message("Usuario registrado.","success");
						redirection('./pages/usuarios.php');

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Ingresa los datos solicitados.","error");
		}
	}

	function editar_usuario(){
		if (
			$('#editar_nombre').val()!=''
			&& $('#editar_usuario').val()!=''
			&& $('#editar_password').val()!=''
			&& $('#editar_id').val()!=''
				){

			let nombre   = $('#editar_nombre').val();
			let usuario  = $('#editar_usuario').val();
			let password = $('#editar_password').val();
			let id       = $('#editar_id').val();

			turn_on_cargando();

			let data1 = {
				work: 'editar_usuario',
				nombre,
				usuario,
				password,
				id
			};
			console.log(data1);

			$.ajax({
		        data:  data1,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "updated") {
						message("Usuario actualizado.","success");
						redirection('./pages/usuarios.php');
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Ingresa los datos solicitados.","error");
		}
	}

	function eliminar_usuario(){
		if ($('#eliminar_id').val()!=""){

			let id = $('#eliminar_id').val();

			turn_on_cargando();

			let data = {
				work: 'eliminar_usuario',
				id
			};
			console.log(data);

			$.ajax({
		        data:  data,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "deleted") {
						message("Usuario eliminado","success");
						redirection("./pages/usuarios.php");
		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
		}else{
			message("Selecciona el servicio.","error");
		}
	}

	function get_permisos_usuaro(id_usuario){

		turn_on_cargando();

		let data = {
			work: 'get_permisos_usuaro',
			id_usuario
		};
		console.log(data);

		$.ajax({
	        data:  data,
	        url:   '../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	$('#results-permisos').html(data);
        		// open_modal('modalGetPermisos');
	        } 
	    });
	}

	function agregar_permiso_usuario(){
		if (
			$('#permiso_id').val()!=''
			&& $('#id_permiso').val()!=undefined
				){

			let permiso_id = $('#permiso_id').val();
			let id_permiso = $('#id_permiso').val();

			turn_on_cargando();

			let data1 = {
				work: 'agregar_permiso_usuario',
				permiso_id,
				id_permiso
			};
			console.log(data1);

			$.ajax({
		        data:  data1,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "registered") {
						message("Permiso agregado.","success");
						redirection('./pages/clientes.php');

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Ingresa los datos solicitados.","error");
		}
	}

	function agregar_horario_servicio(){
		if (
			$('#id_servicio').val()!=undefined
			&& $('#hora_inicio').val()!=''
			&& $('#hora_fin').val()!=''
				){

			let id_servicio = $('#id_servicio').val();
			let hora_inicio = $('#hora_inicio').val();
			let hora_fin = $('#hora_fin').val();

			turn_on_cargando();

			let data1 = {
				work: 'agregar_horario_servicio',
				id_servicio,
				hora_inicio,
				hora_fin
			};
			console.log(data1);

			$.ajax({
		        data:  data1,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "registered") {
						message("Horario registrado.","success");
						redirection('./pages/horarios.php');

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Ingresa los datos solicitados.","error");
		}
	}

	function editar_horario(){
		if (
			$('#editar_hora_inicio').val()!=''
			&& $('#editar_hora_fin').val()!=''
			&& $('#editar_dia_inicio').val()!=undefined
			&& $('#editar_dia_cierre').val()!=undefined
		){

			let hora_inicio = $('#editar_hora_inicio').val();
			let hora_fin    = $('#editar_hora_fin').val();
			let dia_inicio  = $('#editar_dia_inicio').val();
			let dia_cierre  = $('#editar_dia_cierre').val();

			turn_on_cargando();

			let data1 = {
				work: 'editar_horario',
				hora_inicio,
				hora_fin,
				dia_inicio,
				dia_cierre
			};
			console.log(data1);

			$.ajax({
		        data:  data1,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function () {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR...","error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	if (data === "updated") {
						message("Horario actualizado.","success");
						redirection('./pages/horarios.php');

		        	}else{
		        		messageConfirmation(data,"error");
		        	}

		        } 
		    });
			
		}else{
			message("Ingresa los datos solicitados.","error");
		}
	}

	function get_horarios_servicio(){
		if (
			$('#id_servicio').val()!=''
			&& $('#kt_calendar_datepicker_start_date').val()!=''
		){
			let id_servicio = $('#id_servicio').val();
			let fecha = $('#kt_calendar_datepicker_start_date').val();
			turn_on_cargando();

			let data1 = {
				work: 'get_horarios_servicio',
				id_servicio,
				fecha
			};
			console.log(data1);

			$.ajax({
		        data:  data1,
		        url:   '../core/backend/process/controlador.php',
		        type:  'POST',
		        beforeSend: function () {

		        },
		        error:  function (err) {
		            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
		            turn_off_cargando();
		        },
		        success: function(data){
		        	turn_off_cargando();
		        	console.log("RESPONSE: " + JSON.stringify(data));

		        	$('#kt_calendar_datepicker_start_time').html(data);
	                // $('#kt_calendar_datepicker_end_time').prop('disabled', false);
		        } 
		    });
		}else{
			// message("Selecciona el servicio y la fecha.","error");
		}
	}

	function get_calendario_info(id){
		turn_on_cargando();

		let data1 = {
			work: 'get_calendario_info',
			id
		};
		console.log(data1);

		$.ajax({
	        data:  data1,
	        url:   '../core/backend/process/controlador.php',
	        type:  'POST',
	        beforeSend: function () {

	        },
	        error:  function (err) {
	            messageConfirmation("ERROR, al conectarse al SERVIDOR..." + JSON.stringify(err),"error");
	            turn_off_cargando();
	        },
	        success: function(data){
	        	turn_off_cargando();
	        	console.log("RESPONSE: " + JSON.stringify(data));

	        	$('#results-agenda').html(data);
	        	open_modal('modalGetAgenda');

	        } 
	    });
	}


