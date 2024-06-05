<?php 
	if (!isset($_POST['estado'])) 
	{
		print false;
		exit;
	}

	echo $estado = $_POST['estado']; 
	switch($estado)
	{
		case 'Aguascalientes':
			aguascalientes();
			break;

		case 'Baja California':
			baja_california();
			break;

		case 'Baja California Sur':
			baja_california_sur();
			break;

		case 'Campeche':
			campeche();
			break;

		case 'Chiapas':
			chiapas();
			break;

		case 'Chihuahua':
			chihuahua();
			break;

		case 'Ciudad de México':
			cdmx();
			break;

		case 'Coahuila':
			coahuila();
			break;

		case 'Colima':
			colima();
			break;

		case 'Durango':
			durango();
			break;

		case 'Estado de México':
			estado_mexico();
			break;

		case 'Guanajuato':
			guanajuato();
			break;

		case 'Guerrero':
			guerrero();
			break;

		case 'Hidalgo':
			hidalgo();
			break;

		case 'Jalisco':
			jalisco();
			break;

		case 'Michoacán':
			michoacan();
			break;

		case 'Morelos':
			morelos();
			break;

		case 'Nayarit':
			nayarit();
			break;

		case 'Nuevo León':
			nuevo_leon();
			break;

		case 'Oaxaca':
			oaxaca();
			break;

		case 'Puebla':
			puebla();
			break;

		case 'Querétaro':
			queretaro();
			break;

		case 'Quintana Roo':
			quintana_roo();
			break;

		case 'San Luis Potosí':
			san_luis_potosi();
			break;

		case 'Sinaloa':
			sinaloa();
			break;

		case 'Sonora':
			sonora();
			break;

		case 'Tabasco':
			tabasco();
			break;

		case 'Tamaulipas':
			tamaulipas();
			break;

		case 'Tlaxcala':
			tlaxcala();
			break;

		case 'Veracruz':
			veracruz();
			break;

		case 'Yucatán':
			yucatan();
			break;

		case 'Zacatecas':
			zacatecas();
			break;

		default:
		print false;
}

    function aguascalientes(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Aguascalientes">Aguascalientes</option>
		<option value="Asientos">Asientos</option>
		<option value="Calvillo">Calvillo</option>
		<option value="Cosío">Cosío</option>
		<option value="Jesús María">Jesús María</option>
		<option value="Pabellón de Arteaga">Pabellón de Arteaga</option>
		<option value="Rincón de Romos">Rincón de Romos</option>
		<option value="San José de Gracia">San José de Gracia</option>
		<option value="Tepezalá">Tepezalá</option>
		<option value="El Llano">El Llano</option>
		<option value="San Francisco de los Romo">San Francisco de los Romo</option>';
    }

    function baja_california(){
    	echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Ensenada">Ensenada</option>
		<option value="Mexicali">Mexicali</option>
		<option value="Tecate">Tecate</option>
		<option value="Tijuana">Tijuana</option>
		<option value="Playas de Rosarito">Playas de Rosarito</option>';
	}

	function baja_california_sur(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Comondú">Comondú</option>
		<option value="Mulegé">Mulegé</option>
		<option value="La Paz">La Paz</option>
		<option value="Los Cabos">Los Cabos</option>
		<option value="Loreto">Loreto</option>';
	}

	function campeche(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Calkiní">Calkiní</option>
		<option value="Campeche">Campeche</option>
		<option value="Carmen">Carmen</option>
		<option value="Champotón">Champotón</option>
		<option value="Hecelchakán">Hecelchakán</option>
		<option value="Hopelchén">Hopelchén</option>
		<option value="Palizada">Palizada</option>
		<option value="Tenabo">Tenabo</option>
		<option value="Escárcega">Escárcega</option>
		<option value="Calakmul">Calakmul</option>
		<option value="Candelaria">Candelaria</option>';
	}

	function chiapas(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Acacoyagua">Acacoyagua</option>
		<option value="Osumacinta">Osumacinta</option>
		<option value="Acala">Acala</option>
		<option value="Oxchuc">Oxchuc</option>
		<option value="Acapetahua">Acapetahua</option>
		<option value="Palenque">Palenque</option>
		<option value="Altamirano">Altamirano</option>
		<option value="Pantelhó">Pantelhó</option>
		<option value="Amatán">Amatán</option>
		<option value="Pantepec">Pantepec</option>
		<option value="Amatenango de la Frontera">Amatenango de la Frontera</option>
		<option value="Pichucalco">Pichucalco</option>
		<option value="Amatenango del Valle">Amatenango del Valle</option>
		<option value="Pijijiapan">Pijijiapan</option>
		<option value="ángel Albino Corzo">ángel Albino Corzo</option>
		<option value="El Porvenir">El Porvenir</option>
		<option value="Arriaga">Arriaga</option>
		<option value="Villa Comaltitlán">Villa Comaltitlán</option>
		<option value="Bejucal de Ocampo">Bejucal de Ocampo</option>
		<option value="Pueblo Nuevo Solistahuacán">Pueblo Nuevo Solistahuacán</option>
		<option value="Bella Vista">Bella Vista</option>
		<option value="Rayón">Rayón</option>
		<option value="Berriozábal">Berriozábal</option>
		<option value="Reforma">Reforma</option>
		<option value="Bochil">Bochil</option>
		<option value="Las Rosas">Las Rosas</option>
		<option value="El Bosque">El Bosque</option>
		<option value="Sabanilla">Sabanilla</option>
		<option value="Cacahoatán">Cacahoatán</option>
		<option value="Salto de Agua">Salto de Agua</option>
		<option value="Catazajá">Catazajá</option>
		<option value="San Cristóbal de las Casas">San Cristóbal de las Casas</option>
		<option value="Cintalapa">Cintalapa</option>
		<option value="San Fernando">San Fernando</option>
		<option value="Coapilla">Coapilla</option>
		<option value="Siltepec">Siltepec</option>
		<option value="Comitán de Domínguez">Comitán de Domínguez</option>
		<option value="Simojovel">Simojovel</option>
		<option value="La Concordia">La Concordia</option>
		<option value="Sitalá">Sitalá</option>
		<option value="Copainalá">Copainalá</option>
		<option value="Socoltenango">Socoltenango</option>
		<option value="Chalchihuitán">Chalchihuitán</option>
		<option value="Solosuchiapa">Solosuchiapa</option>
		<option value="Chamula">Chamula</option>
		<option value="Soyaló">Soyaló</option>
		<option value="Chanal">Chanal</option>
		<option value="Suchiapa">Suchiapa</option>
		<option value="Chapultenango">Chapultenango</option>
		<option value="Ciudad Hidalgo">Ciudad Hidalgo</option>
		<option value="Chenalhó">Chenalhó</option>
		<option value="Sunuapa">Sunuapa</option>
		<option value="Chiapa de Corzo">Chiapa de Corzo</option>
		<option value="Tapachula">Tapachula</option>
		<option value="Chiapilla">Chiapilla</option>
		<option value="Tapalapa">Tapalapa</option>
		<option value="Chicoasén">Chicoasén</option>
		<option value="Tapilula">Tapilula</option>
		<option value="Chicomuselo">Chicomuselo</option>
		<option value="Tecpatán">Tecpatán</option>
		<option value="Chilón">Chilón</option>
		<option value="Tenejapa">Tenejapa</option>
		<option value="Escuintla">Escuintla</option>
		<option value="Teopisca">Teopisca</option>
		<option value="Francisco León">Francisco León</option>
		<option value="Frontera Comalapa">Frontera Comalapa</option>
		<option value="Tila">Tila</option>
		<option value="Frontera Hidalgo">Frontera Hidalgo</option>
		<option value="Tonalá">Tonalá</option>
		<option value="La Grandeza">La Grandeza</option>
		<option value="Totolapa">Totolapa</option>
		<option value="Huehuetán">Huehuetán</option>
		<option value="La Trinitaria">La Trinitaria</option>
		<option value="Huixtán">Huixtán</option>
		<option value="Tumbalá">Tumbalá</option>
		<option value="Huitiupán">Huitiupán</option>
		<option value="Tuxtla Gutiérrez">Tuxtla Gutiérrez</option>
		<option value="Huixtla">Huixtla</option>
		<option value="Tuxtla Chico">Tuxtla Chico</option>
		<option value="La Independencia">La Independencia</option>
		<option value="Tuzantán">Tuzantán</option>
		<option value="Ixhuatán">Ixhuatán</option>
		<option value="Tzimol">Tzimol</option>
		<option value="Ixtacomitán">Ixtacomitán</option>
		<option value="Unión Juárez">Unión Juárez</option>
		<option value="Ixtapa">Ixtapa</option>
		<option value="Venustiano Carranza">Venustiano Carranza</option>
		<option value="Ixtapangajoya">Ixtapangajoya</option>
		<option value="Ciudad de Villa Corzo">Ciudad de Villa Corzo</option>
		<option value="Jiquipilas">Jiquipilas</option>
		<option value="Villaflores">Villaflores</option>
		<option value="Jitotol">Jitotol</option>
		<option value="Yajalón">Yajalón</option>
		<option value="Juárez">Juárez</option>
		<option value="San Lucas">San Lucas</option>
		<option value="Larráinzar">Larráinzar</option>
		<option value="Zinacantán">Zinacantán</option>
		<option value="La Libertad">La Libertad</option>
		<option value="San Juan Cancuc">San Juan Cancuc</option>
		<option value="Mapastepec">Mapastepec</option>
		<option value="Aldama">Aldama</option>
		<option value="Las Margaritas">Las Margaritas</option>
		<option value="Benemérito de las Américas">Benemérito de las Américas</option>
		<option value="Mazapa de Madero">Mazapa de Madero</option>
		<option value="Maravilla Tenejapa">Maravilla Tenejapa</option>
		<option value="Mazatán">Mazatán</option>
		<option value="Marqués de Comillas">Marqués de Comillas</option>
		<option value="Metapa">Metapa</option>
		<option value="Montecristo de Guerrero">Montecristo de Guerrero</option>
		<option value="Mitontic">Mitontic</option>
		<option value="San Andrés Duraznal">San Andrés Duraznal</option>
		<option value="Motozintla">Motozintla</option>
		<option value="Santiago el Pinar">Santiago el Pinar</option>
		<option value="Nicolás Ruíz">Nicolás Ruíz</option>
		<option value="Belisario Domínguez">Belisario Domínguez</option>
		<option value="Ocosingo">Ocosingo</option>
		<option value="Emiliano Zapata">Emiliano Zapata</option>
		<option value="Ocotepec">Ocotepec</option>
		<option value="El Parral">El Parral</option>
		<option value="Ocozocoautla de Espinosa">Ocozocoautla de Espinosa</option>
		<option value="Mezcalapa">Mezcalapa</option>
		<option value="Ostuacán">Ostuacán</option>';
	}

	function chihuahua(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Ahumada">Ahumada</option>
		<option value="Aldama">Aldama</option>
		<option value="Allende">Allende</option>
		<option value="Aquiles Serdán">Aquiles Serdán</option>
		<option value="Ascensión">Ascensión</option>
		<option value="Bachíniva">Bachíniva</option>
		<option value="Balleza">Balleza</option>
		<option value="Batopilas">Batopilas</option>
		<option value="Bocoyna">Bocoyna</option>
		<option value="Buenaventura">Buenaventura</option>
		<option value="Camargo">Camargo</option>
		<option value="Carichí">Carichí</option>
		<option value="Casas Grandes">Casas Grandes</option>
		<option value="Coronado">Coronado</option>
		<option value="Coyame del Sotol">Coyame del Sotol</option>
		<option value="La Cruz">La Cruz</option>
		<option value="Cuauhtémoc">Cuauhtémoc</option>
		<option value="Cusihuiriachi">Cusihuiriachi</option>
		<option value="Chihuahua">Chihuahua</option>
		<option value="Chínipas">Chínipas</option>
		<option value="Delicias">Delicias</option>
		<option value="Dr. Belisario Domínguez">Dr. Belisario Domínguez</option>
		<option value="Galeana">Galeana</option>
		<option value="Santa Isabel">Santa Isabel</option>
		<option value="Gómez Farías">Gómez Farías</option>
		<option value="Gran Morelos">Gran Morelos</option>
		<option value="Guadalupe">Guadalupe</option>
		<option value="Guadalupe y Calvo">Guadalupe y Calvo</option>
		<option value="Guazapares">Guazapares</option>
		<option value="Guerrero">Guerrero</option>
		<option value="Hidalgo del Parral">Hidalgo del Parral</option>
		<option value="Huejotitán">Huejotitán</option>
		<option value="Ignacio Zaragoza">Ignacio Zaragoza</option>
		<option value="Janos">Janos</option>
		<option value="Jiménez">Jiménez</option>
		<option value="Juárez">Juárez</option>
		<option value="Julimes">Julimes</option>
		<option value="Octaviano López">Octaviano López</option>
		<option value="Madera">Madera</option>
		<option value="Maguarichi">Maguarichi</option>
		<option value="Manuel Benavides">Manuel Benavides</option>
		<option value="Matachí">Matachí</option>
		<option value="Matamoros">Matamoros</option>
		<option value="Meoqui">Meoqui</option>
		<option value="Morelos">Morelos</option>
		<option value="Moris">Moris</option>
		<option value="Namiquipa">Namiquipa</option>
		<option value="Nonoava">Nonoava</option>
		<option value="Nuevo Casas Grandes">Nuevo Casas Grandes</option>
		<option value="Ocampo">Ocampo</option>
		<option value="Ojinaga">Ojinaga</option>
		<option value="Práxedis G. Guerrero">Práxedis G. Guerrero</option>
		<option value="San Andrés">San Andrés</option>
		<option value="Rosales">Rosales</option>
		<option value="Rosario">Rosario</option>
		<option value="San Francisco de Borja">San Francisco de Borja</option>
		<option value="San Francisco de Conchos">San Francisco de Conchos</option>
		<option value="San Francisco del Oro">San Francisco del Oro</option>
		<option value="Santa Bárbara">Santa Bárbara</option>
		<option value="Satevó">Satevó</option>
		<option value="Saucillo">Saucillo</option>
		<option value="Temósachi">Temósachi</option>
		<option value="El Tule">El Tule</option>
		<option value="Urique">Urique</option>
		<option value="Uruachi">Uruachi</option>
		<option value="Valle de Zaragoza">Valle de Zaragoza</option>';
	}

	function cdmx(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Álvaro Obregón">Álvaro Obregón</option>
		<option value="Azcapotzalco">Azcapotzalco</option>
		<option value="Benito Juárez">Benito Juárez</option>
		<option value="Coyoacán">Coyoacán</option>
		<option value="Cuajimalpa de Morelos">Cuajimalpa de Morelos</option>
		<option value="Cuauhtémoc">Cuauhtémoc</option>
		<option value="Gustavo A. Madero">Gustavo A. Madero</option>
		<option value="Iztacalco">Iztacalco</option>
		<option value="Iztapalapa">Iztapalapa</option>
		<option value="La Magdalena Contreras">La Magdalena Contreras</option>
		<option value="Miguel Hidalgo">Miguel Hidalgo</option>
		<option value="Milpa Alta">Milpa Alta</option>
		<option value="Tláhuac">Tláhuac</option>
		<option value="Tlalpan">Tlalpan</option>
		<option value="Venustiano Carranza">Venustiano Carranza</option>
		<option value="Xochimilco">Xochimilco</option>';
	}

	function coahuila(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value"Abasolo">Abasolo</option>
		<option value"Acuña">Acuña</option>
		<option value"Allende">Allende</option>
		<option value"Arteaga">Arteaga</option>
		<option value"Candela">Candela</option>
		<option value"Castaños">Castaños</option>
		<option value"Cuatrociénegas">Cuatrociénegas</option>
		<option value"Escobedo">Escobedo</option>
		<option value"Francisco I. Madero">Francisco I. Madero</option>
		<option value"Frontera">Frontera</option>
		<option value"General Cepeda">General Cepeda</option>
		<option value"Guerrero">Guerrero</option>
		<option value"Hidalgo">Hidalgo</option>
		<option value"Jiménez">Jiménez</option>
		<option value"Juárez">Juárez</option>
		<option value"Lamadrid">Lamadrid</option>
		<option value"Matamoros">Matamoros</option>
		<option value"Monclova">Monclova</option>
		<option value"Morelos">Morelos</option>
		<option value"Múzquiz">Múzquiz</option>
		<option value"Nadadores">Nadadores</option>
		<option value"Nava">Nava</option>
		<option value"Ocampo">Ocampo</option>
		<option value"Parras">Parras</option>
		<option value"Piedras Negras">Piedras Negras</option>
		<option value"Progreso">Progreso</option>
		<option value"Ramos Arizpe">Ramos Arizpe</option>
		<option value"Sabinas">Sabinas</option>
		<option value"Sacramento">Sacramento</option>
		<option value"Saltillo">Saltillo</option>
		<option value"San Buenaventura">San Buenaventura</option>
		<option value"San Juan de Sabinas">San Juan de Sabinas</option>
		<option value"San Pedro">San Pedro</option>
		<option value"Sierra Mojada">Sierra Mojada</option>
		<option value"Torreón">Torreón</option>
		<option value"Viesca">Viesca</option>
		<option value"Villa Unión">Villa Unión</option>
		<option value"Zaragoza">Zaragoza</option>
		<option value"Ignacio Zaragoza">Ignacio Zaragoza</option>';
	}

	function colima(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Armería">Armería</option>
		<option value="Ixtlahuacán">Ixtlahuacán</option>
		<option value="Colima">Colima</option>
		<option value="Manzanillo">Manzanillo</option>
		<option value="Comala">Comala</option>
		<option value="Minatitlán">Minatitlán</option>
		<option value="Coquimatlán">Coquimatlán</option>
		<option value="Tecomán">Tecomán</option>
		<option value="Cuauhtémoc">Cuauhtémoc</option>
		<option value="Villa de álvarez">Villa de álvarez</option>';
	}

	function durango(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value"Canatlán">Canatlán</option>
		<option value"Peñón Blanco">Peñón Blanco</option>
		<option value"Canelas">Canelas</option>
		<option value"Ciudad Villa Unión">Ciudad Villa Unión</option>
		<option value"Coneto de Comonfort">Coneto de Comonfort</option>
		<option value"El Salto">El Salto</option>
		<option value"Cuencamé">Cuencamé</option>
		<option value"Rodeo">Rodeo</option>
		<option value"Durango">Durango</option>
		<option value"San Bernardo">San Bernardo</option>
		<option value"General Simón Bolívar">General Simón Bolívar</option>
		<option value"San Dimas">San Dimas</option>
		<option value"Gómez Palacio">Gómez Palacio</option>
		<option value"San Juan de Guadalupe">San Juan de Guadalupe</option>
		<option value"Guadalupe Victoria">Guadalupe Victoria</option>
		<option value"San Juan del Río">San Juan del Río</option>
		<option value"Guanaceví">Guanaceví</option>
		<option value"San Luis del Cordero">San Luis del Cordero</option>
		<option value"Hidalgo">Hidalgo</option>
		<option value"San Pedro del Gallo">San Pedro del Gallo</option>
		<option value"Indé">Indé</option>
		<option value"Santa Clara">Santa Clara</option>
		<option value"Lerdo">Lerdo</option>
		<option value"Santiago Papasquiaro">Santiago Papasquiaro</option>
		<option value"Mapimí">Mapimí</option>
		<option value"Súchil">Súchil</option>
		<option value"Mezquital">Mezquital</option>
		<option value"Tamazula">Tamazula</option>
		<option value"Nazas">Nazas</option>
		<option value"Santa Catarina de Tepehuanes">Santa Catarina de Tepehuanes</option>
		<option value"Nombre de Dios">Nombre de Dios</option>
		<option value"Tlahualilo">Tlahualilo</option>
		<option value"Ocampo">Ocampo</option>
		<option value"Topia">Topia</option>
		<option value"El Oro">El Oro</option>
		<option value"Santa María de Otáez">Santa María de Otáez</option>
		<option value"Nuevo Ideal">Nuevo Ideal</option>
		<option value"Pánuco de Coronado">Pánuco de Coronado</option>';
	}

	function estado_mexico(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Acambay de Ruiz Castañeda">Acambay de Ruiz Castañeda</option>
		<option value="Acolman">Acolman</option>
		<option value="Aculco">Aculco</option>
		<option value="Almoloya de Alquisiras">Almoloya de Alquisiras</option>
		<option value="Almoloya de Juárez">Almoloya de Juárez</option>
		<option value="Almoloya del Río">Almoloya del Río</option>
		<option value="Amanalco de Becerra">Amanalco de Becerra</option>
		<option value="Amatepec">Amatepec</option>
		<option value="Amecameca de Juárez">Amecameca de Juárez</option>
		<option value="Apaxco de Ocampo">Apaxco de Ocampo</option>
		<option value="San Salvador Atenco">San Salvador Atenco</option>
		<option value="Atizapán">Atizapán</option>
		<option value="Atizapán de Zaragoza">Atizapán de Zaragoza</option>
		<option value="Atlacomulco de Fabela">Atlacomulco de Fabela</option>
		<option value="Atlautla">Atlautla</option>
		<option value="Axapusco">Axapusco</option>
		<option value="Ayapango de Gabriel Ramos Millán">Ayapango de Gabriel Ramos Millán</option>
		<option value="Calimaya de Díaz González">Calimaya de Díaz González</option>
		<option value="Capulhuac">Capulhuac</option>
		<option value="Coacalco de Berriozábal">Coacalco de Berriozábal</option>
		<option value="Coatepec Harinas">Coatepec Harinas</option>
		<option value="Cocotitlán">Cocotitlán</option>
		<option value="Coyotepec">Coyotepec</option>
		<option value="Cuautitlán">Cuautitlán</option>
		<option value="Chalco">Chalco</option>
		<option value="Chapa de Mota">Chapa de Mota</option>
		<option value="Chapultepec">Chapultepec</option>
		<option value="Chiautla">Chiautla</option>
		<option value="Chicoloapan">Chicoloapan</option>
		<option value="Chiconcuac">Chiconcuac</option>
		<option value="Chimalhuacán">Chimalhuacán</option>
		<option value="Donato Guerra">Donato Guerra</option>
		<option value="Ecatepec de Morelos">Ecatepec de Morelos</option>
		<option value="Ecatzingo de Hidalgo">Ecatzingo de Hidalgo</option>
		<option value="Huehuetoca">Huehuetoca</option>
		<option value="Hueypoxtla">Hueypoxtla</option>
		<option value="Huixquilucan">Huixquilucan</option>
		<option value="Isidro Fabela">Isidro Fabela</option>
		<option value="Ixtapaluca">Ixtapaluca</option>
		<option value="Ixtapan de la Sal">Ixtapan de la Sal</option>
		<option value="Ixtapan del Oro">Ixtapan del Oro</option>
		<option value="Ixtlahuaca">Ixtlahuaca</option>
		<option value="Xalatlaco">Xalatlaco</option>
		<option value="Jaltenco">Jaltenco</option>
		<option value="Jilotepec">Jilotepec</option>
		<option value="Jilotzingo">Jilotzingo</option>
		<option value="Jiquipilco">Jiquipilco</option>
		<option value="Jocotitlán">Jocotitlán</option>
		<option value="Joquicingo">Joquicingo</option>
		<option value="Juchitepec">Juchitepec</option>
		<option value="Lerma">Lerma</option>
		<option value="Malinalco">Malinalco</option>
		<option value="Melchor Ocampo">Melchor Ocampo</option>
		<option value="Metepec">Metepec</option>
		<option value="Mexicaltzingo">Mexicaltzingo</option>
		<option value="Morelos">Morelos</option>
		<option value="Naucalpan de Juárez">Naucalpan de Juárez</option>
		<option value="Nezahualcóyotl">Nezahualcóyotl</option>
		<option value="Nextlalpan">Nextlalpan</option>
		<option value="Nicolás Romero">Nicolás Romero</option>
		<option value="Nopaltepec">Nopaltepec</option>
		<option value="Ocoyoacac">Ocoyoacac</option>
		<option value="Ocuilan">Ocuilan</option>
		<option value="El Oro">El Oro</option>
		<option value="Otumba">Otumba</option>
		<option value="Otzoloapan">Otzoloapan</option>
		<option value="Otzolotepec">Otzolotepec</option>
		<option value="Ozumba">Ozumba</option>
		<option value="Papalotla">Papalotla</option>
		<option value="La Paz">La Paz</option>
		<option value="Polotitlán">Polotitlán</option>
		<option value="Rayón">Rayón</option>
		<option value="San Antonio la Isla">San Antonio la Isla</option>
		<option value="San Felipe del Progreso">San Felipe del Progreso</option>
		<option value="San Martín de las Pirámides">San Martín de las Pirámides</option>
		<option value="San Mateo Atenco">San Mateo Atenco</option>
		<option value="San Simón de Guerrero">San Simón de Guerrero</option>
		<option value="Santo Tomás">Santo Tomás</option>
		<option value="Soyaniquilpan de Juárez">Soyaniquilpan de Juárez</option>
		<option value="Sultepec">Sultepec</option>
		<option value="Tecámac">Tecámac</option>
		<option value="Tejupilco">Tejupilco</option>
		<option value="Temamatla">Temamatla</option>
		<option value="Temascalapa">Temascalapa</option>
		<option value="Temascalcingo">Temascalcingo</option>
		<option value="Temascaltepec">Temascaltepec</option>
		<option value="Temoaya">Temoaya</option>
		<option value="Tenancingo">Tenancingo</option>
		<option value="Tenango del Aire">Tenango del Aire</option>
		<option value="Tenango del Valle">Tenango del Valle</option>
		<option value="Teoloyucan">Teoloyucan</option>
		<option value="Teotihuacán">Teotihuacán</option>
		<option value="Tepetlaoxtoc">Tepetlaoxtoc</option>
		<option value="Tepetlixpa">Tepetlixpa</option>
		<option value="Tepotzotlán">Tepotzotlán</option>
		<option value="Tequixquiac">Tequixquiac</option>
		<option value="Texcaltitlán">Texcaltitlán</option>
		<option value="Texcalyacac">Texcalyacac</option>
		<option value="Texcoco">Texcoco</option>
		<option value="Tezoyuca">Tezoyuca</option>
		<option value="Tianguistenco">Tianguistenco</option>
		<option value="Timilpan">Timilpan</option>
		<option value="Tlalmanalco">Tlalmanalco</option>
		<option value="Tlalnepantla de Baz">Tlalnepantla de Baz</option>
		<option value="Tlatlaya">Tlatlaya</option>
		<option value="Toluca">Toluca</option>
		<option value="Tonatico">Tonatico</option>
		<option value="Tultepec">Tultepec</option>
		<option value="Tultitlán">Tultitlán</option>
		<option value="Valle de Bravo">Valle de Bravo</option>
		<option value="Villa de Allende">Villa de Allende</option>
		<option value="Villa del Carbón">Villa del Carbón</option>
		<option value="Villa Guerrero">Villa Guerrero</option>
		<option value="Villa Victoria">Villa Victoria</option>
		<option value="Xonacatlán">Xonacatlán</option>
		<option value="Zacazonapan">Zacazonapan</option>
		<option value="Zacualpan">Zacualpan</option>
		<option value="Zinacantepec">Zinacantepec</option>
		<option value="Zumpahuacán">Zumpahuacán</option>
		<option value="Zumpango">Zumpango</option>
		<option value="Cuautitlán Izcalli">Cuautitlán Izcalli</option>
		<option value="Valle de Chalco Solidaridad">Valle de Chalco Solidaridad</option>
		<option value="Luvianos">Luvianos</option>
		<option value="San José del Rincón">San José del Rincón</option>
		<option value="Tonanitla">Tonanitla</option>';
	}

	function guanajuato(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Abasolo">Abasolo</option>
		<option value="Acámbaro">Acámbaro</option>
		<option value="San Miguel de Allende">San Miguel de Allende</option>
		<option value="Apaseo el Alto">Apaseo el Alto</option>
		<option value="Apaseo el Grande">Apaseo el Grande</option>
		<option value="Atarjea">Atarjea</option>
		<option value="Celaya">Celaya</option>
		<option value="Manuel Doblado">Manuel Doblado</option>
		<option value="Comonfort">Comonfort</option>
		<option value="Coroneo">Coroneo</option>
		<option value="Cortazar">Cortazar</option>
		<option value="Cuerámaro">Cuerámaro</option>
		<option value="Cuerámaro">Cuerámaro</option>
		<option value="Doctor Mora">Doctor Mora</option>
		<option value="Dolores Hidalgo Cuna de la Independencia Nacional">Dolores Hidalgo Cuna de la Independencia Nacional</option>
		<option value="Guanajuato">Guanajuato</option>
		<option value="Huanímaro">Huanímaro</option>
		<option value="Irapuato">Irapuato</option>
		<option value="Jaral del Progreso">Jaral del Progreso</option>
		<option value="Jerécuaro">Jerécuaro</option>
		<option value="León">León</option>
		<option value="Moroleón">Moroleón</option>
		<option value="Ocampo">Ocampo</option>
		<option value="Pénjamo">Pénjamo</option>
		<option value="Pueblo Nuevo">Pueblo Nuevo</option>
		<option value="Purísima del Rincón">Purísima del Rincón</option>
		<option value="Romita">Romita</option>
		<option value="Salamanca">Salamanca</option>
		<option value="Salvatierra">Salvatierra</option>
		<option value="San Diego de la Unión">San Diego de la Unión</option>
		<option value="San Felipe">San Felipe</option>
		<option value="San Francisco del Rincón">San Francisco del Rincón</option>
		<option value="San José Iturbide">San José Iturbide</option>
		<option value="San Luis de la Paz">San Luis de la Paz</option>
		<option value="Santa Catarina">Santa Catarina</option>
		<option value="Santa Cruz de Juventino Rosas">Santa Cruz de Juventino Rosas</option>
		<option value="Santiago Maravatío">Santiago Maravatío</option>
		<option value="Silao de la Victoria">Silao de la Victoria</option>
		<option value="Tarandacuao">Tarandacuao</option>
		<option value="Tarimoro">Tarimoro</option>
		<option value="Tierra Blanca">Tierra Blanca</option>
		<option value="Uriangato">Uriangato</option>
		<option value="Valle de Santiago">Valle de Santiago</option>
		<option value="Victoria">Victoria</option>
		<option value="Villagrán">Villagrán</option>
		<option value="Xichú">Xichú</option>
		<option value="Yuriria">Yuriria</option>';
	}

	function guerrero(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Acapulco de Juárez">Acapulco de Juárez</option>
		<option value="Ahuacuotzingo">Ahuacuotzingo</option>
		<option value="Ajuchitlán del Progreso">Ajuchitlán del Progreso</option>
		<option value="Alcozauca de Guerrero">Alcozauca de Guerrero</option>
		<option value="Alpoyeca">Alpoyeca</option>
		<option value="Ciudad Apaxtla de Castrejón">Ciudad Apaxtla de Castrejón</option>
		<option value="Arcelia">Arcelia</option>
		<option value="Atenango del Río">Atenango del Río</option>
		<option value="Atlamajalcingo del Monte">Atlamajalcingo del Monte</option>
		<option value="Atlixtac">Atlixtac</option>
		<option value="Atoyac de álvarez">Atoyac de álvarez</option>
		<option value="Ayutla de los Libres">Ayutla de los Libres</option>
		<option value="Azoyú">Azoyú</option>
		<option value="Benito Juárez">Benito Juárez</option>
		<option value="Buenavista de Cuéllar">Buenavista de Cuéllar</option>
		<option value="Coahuayutla de José María Izazaga">Coahuayutla de José María Izazaga</option>
		<option value="Cocula">Cocula</option>
		<option value="Copala">Copala</option>
		<option value="Copalillo">Copalillo</option>
		<option value="Copanatoyac">Copanatoyac</option>
		<option value="Coyuca de Benítez">Coyuca de Benítez</option>
		<option value="Coyuca de Catalán">Coyuca de Catalán</option>
		<option value="Cuajinicuilapa">Cuajinicuilapa</option>
		<option value="Cualác">Cualác</option>
		<option value="Cuautepec">Cuautepec</option>
		<option value="Cuetzala del Progreso">Cuetzala del Progreso</option>
		<option value="Cutzamala de Pinzón">Cutzamala de Pinzón</option>
		<option value="Chilapa de álvarez">Chilapa de álvarez</option>
		<option value="Chilpancingo de los Bravo">Chilpancingo de los Bravo</option>
		<option value="Florencio Villarreal">Florencio Villarreal</option>
		<option value="General Canuto A. Neri">General Canuto A. Neri</option>
		<option value="General Heliodoro Castillo">General Heliodoro Castillo</option>
		<option value="Huamuxtitlán">Huamuxtitlán</option>
		<option value="Huitzuco de los Figueroa">Huitzuco de los Figueroa</option>
		<option value="Iguala de la Independencia">Iguala de la Independencia</option>
		<option value="Igualapa">Igualapa</option>
		<option value="Ixcateopan de Cuauhtémoc">Ixcateopan de Cuauhtémoc</option>
		<option value="Zihuatanejo de Azueta">Zihuatanejo de Azueta</option>
		<option value="Juan R. Escudero">Juan R. Escudero</option>
		<option value="Leonardo Bravo">Leonardo Bravo</option>
		<option value="Malinaltepec">Malinaltepec</option>
		<option value="Mártir de Cuilapan">Mártir de Cuilapan</option>
		<option value="Metlatónoc">Metlatónoc</option>
		<option value="Mochitlán">Mochitlán</option>
		<option value="Olinalá">Olinalá</option>
		<option value="Ometepec">Ometepec</option>
		<option value="Pedro Ascencio Alquisiras">Pedro Ascencio Alquisiras</option>
		<option value="Petatlán">Petatlán</option>
		<option value="Pilcaya">Pilcaya</option>
		<option value="Pungarabato">Pungarabato</option>
		<option value="Quechultenango">Quechultenango</option>
		<option value="San Luis Acatlán">San Luis Acatlán</option>
		<option value="San Marcos">San Marcos</option>
		<option value="San Miguel Totolapan">San Miguel Totolapan</option>
		<option value="Taxco de Alarcón">Taxco de Alarcón</option>
		<option value="Tecoanapa">Tecoanapa</option>
		<option value="Técpan de Galeana">Técpan de Galeana</option>
		<option value="Teloloapan">Teloloapan</option>
		<option value="Tepecoacuilco de Trujano">Tepecoacuilco de Trujano</option>
		<option value="Tetipac">Tetipac</option>
		<option value="Tixtla de Guerrero">Tixtla de Guerrero</option>
		<option value="Tlacoachistlahuaca">Tlacoachistlahuaca</option>
		<option value="Tlacoapa">Tlacoapa</option>
		<option value="Tlalchapa">Tlalchapa</option>
		<option value="Tlalixtaquilla de Maldonado">Tlalixtaquilla de Maldonado</option>
		<option value="Tlapa de Comonfort">Tlapa de Comonfort</option>
		<option value="Tlapehuala">Tlapehuala</option>
		<option value="La Unión de Isidoro Montes de Oca">La Unión de Isidoro Montes de Oca</option>
		<option value="Xalpatláhuac">Xalpatláhuac</option>
		<option value="Xochihuehuetlán">Xochihuehuetlán</option>
		<option value="Xochistlahuaca">Xochistlahuaca</option>
		<option value="Zapotitlán Tablas">Zapotitlán Tablas</option>
		<option value="Zirándaro de los Chávez">Zirándaro de los Chávez</option>
		<option value="Zitlala">Zitlala</option>
		<option value="Eduardo Neri">Eduardo Neri</option>
		<option value="Acatepec">Acatepec</option>
		<option value="Marquelia">Marquelia</option>
		<option value="Cochoapa el Grande">Cochoapa el Grande</option>
		<option value="José Joaquín de Herrera">José Joaquín de Herrera</option>
		<option value="Juchitán">Juchitán</option>
		<option value="Iliatenco">Iliatenco</option>';
	}

	function hidalgo(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Acatlán">Acatlán</option>
		<option value="Acaxochitlán">Acaxochitlán</option>
		<option value="Actopan">Actopan</option>
		<option value="Agua Blanca de Iturbide">Agua Blanca de Iturbide</option>
		<option value="Ajacuba">Ajacuba</option>
		<option value="Alfajayucan">Alfajayucan</option>
		<option value="Almoloya">Almoloya</option>
		<option value="Apan">Apan</option>
		<option value="El Arenal">El Arenal</option>
		<option value="Atitalaquia">Atitalaquia</option>
		<option value="Atlapexco">Atlapexco</option>
		<option value="Atotonilco el Grande">Atotonilco el Grande</option>
		<option value="Atotonilco de Tula">Atotonilco de Tula</option>
		<option value="Calnali">Calnali</option>
		<option value="Cardonal">Cardonal</option>
		<option value="Cuautepec de Hinojosa">Cuautepec de Hinojosa</option>
		<option value="Chapantongo">Chapantongo</option>
		<option value="Chapulhuacán">Chapulhuacán</option>
		<option value="Chilcuautla">Chilcuautla</option>
		<option value="Eloxochitlán">Eloxochitlán</option>
		<option value="Emiliano Zapata">Emiliano Zapata</option>
		<option value="Epazoyucan">Epazoyucan</option>
		<option value="Franciso I. Madero">Franciso I. Madero</option>
		<option value="Huasca de Ocampo">Huasca de Ocampo</option>
		<option value="Huautla">Huautla</option>
		<option value="Huazalingo">Huazalingo</option>
		<option value="Huehuetla">Huehuetla</option>
		<option value="Huejutla de Reyes">Huejutla de Reyes</option>
		<option value="Huichapan">Huichapan</option>
		<option value="Ixmiquilpan">Ixmiquilpan</option>
		<option value="Jacala de Ledezma">Jacala de Ledezma</option>
		<option value="Jaltocán">Jaltocán</option>
		<option value="Juárez Hidalgo">Juárez Hidalgo</option>
		<option value="Lolotla">Lolotla</option>
		<option value="Metepec">Metepec</option>
		<option value="San Agustín Metzquititlán">San Agustín Metzquititlán</option>
		<option value="Metztitlán">Metztitlán</option>
		<option value="Mineral del Chico">Mineral del Chico</option>
		<option value="Mineral del Monte">Mineral del Monte</option>
		<option value="La Misión">La Misión</option>
		<option value="Mixquiahuala de Juárez">Mixquiahuala de Juárez</option>
		<option value="Molango de Escamilla">Molango de Escamilla</option>
		<option value="Nicolás Flores">Nicolás Flores</option>
		<option value="Nopala de Villagrán">Nopala de Villagrán</option>
		<option value="Omitlán de Juárez">Omitlán de Juárez</option>
		<option value="San Felipe Orizatlán">San Felipe Orizatlán</option>
		<option value="Pacula">Pacula</option>
		<option value="Pachuca de Soto">Pachuca de Soto</option>
		<option value="Pisaflores">Pisaflores</option>
		<option value="Progreso de Obregón">Progreso de Obregón</option>
		<option value="Mineral de la Reforma">Mineral de la Reforma</option>
		<option value="San Agustín Tlaxiaca">San Agustín Tlaxiaca</option>
		<option value="San Bartolo Tutotepec">San Bartolo Tutotepec</option>
		<option value="San Salvador">San Salvador</option>
		<option value="Santiago de Anaya">Santiago de Anaya</option>
		<option value="Santiago Tulantepec de Lugo Guerrero">Santiago Tulantepec de Lugo Guerrero</option>
		<option value="Singuilucan">Singuilucan</option>
		<option value="Tasquillo">Tasquillo</option>
		<option value="Tecozautla">Tecozautla</option>
		<option value="Tenango de Doria">Tenango de Doria</option>
		<option value="Tepeapulco">Tepeapulco</option>
		<option value="Tepehuacán de Guerrero">Tepehuacán de Guerrero</option>
		<option value="Tepeji del Río de Ocampo">Tepeji del Río de Ocampo</option>
		<option value="Tepetitlán">Tepetitlán</option>
		<option value="Tetepango">Tetepango</option>
		<option value="Villa de Tezontepec">Villa de Tezontepec</option>
		<option value="Tezontepec de Aldama">Tezontepec de Aldama</option>
		<option value="Tianguistengo">Tianguistengo</option>
		<option value="Tizayuca">Tizayuca</option>
		<option value="Tlahuelilpan">Tlahuelilpan</option>
		<option value="Tlahuiltepa">Tlahuiltepa</option>
		<option value="Tlanalapa">Tlanalapa</option>
		<option value="Tlanchinol">Tlanchinol</option>
		<option value="Tlaxcoapan">Tlaxcoapan</option>
		<option value="Tolcayuca">Tolcayuca</option>
		<option value="Tula de Allende">Tula de Allende</option>
		<option value="Tulancingo de Bravo">Tulancingo de Bravo</option>
		<option value="Xochiatipan">Xochiatipan</option>
		<option value="Xochicoatlán">Xochicoatlán</option>
		<option value="Yahualica">Yahualica</option>
		<option value="Zacualtipán de ángeles">Zacualtipán de ángeles</option>
		<option value="Zapotlán de Juárez">Zapotlán de Juárez</option>
		<option value="Zempoala">Zempoala</option>
		<option value="Zimapán">Zimapán</option>';
	}

	function jalisco(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Acatic">Acatic</option>
		<option value="Acatlán de Juárez">Acatlán de Juárez</option>
		<option value="Ahualulco de Mercado">Ahualulco de Mercado</option>
		<option value="Amacueca">Amacueca</option>
		<option value="Amatitán">Amatitán</option>
		<option value="Ameca">Ameca</option>
		<option value="San Juanito de Escobedo">San Juanito de Escobedo</option>
		<option value="Arandas">Arandas</option>
		<option value="El Arenal">El Arenal</option>
		<option value="Atemajac de Brizuela">Atemajac de Brizuela</option>
		<option value="Atengo">Atengo</option>
		<option value="Atenguillo">Atenguillo</option>
		<option value="Atotonilco el Alto">Atotonilco el Alto</option>
		<option value="Atoyac">Atoyac</option>
		<option value="Autlán de Navarro">Autlán de Navarro</option>
		<option value="Ayotlán">Ayotlán</option>
		<option value="Ayutla">Ayutla</option>
		<option value="La Barca">La Barca</option>
		<option value="Bolaños">Bolaños</option>
		<option value="Cabo Corrientes">Cabo Corrientes</option>
		<option value="Casimiro Castillo">Casimiro Castillo</option>
		<option value="Cihuatlán">Cihuatlán</option>
		<option value="Zapotlán el Grande">Zapotlán el Grande</option>
		<option value="Cocula">Cocula</option>
		<option value="Colotlán">Colotlán</option>
		<option value="Concepción de Buenos Aires">Concepción de Buenos Aires</option>
		<option value="Cuautitlán de García Barragán">Cuautitlán de García Barragán</option>
		<option value="Cuautla">Cuautla</option>
		<option value="Cuquío">Cuquío</option>
		<option value="Chapala">Chapala</option>
		<option value="Chimaltitán">Chimaltitán</option>
		<option value="Chiquilistlán">Chiquilistlán</option>
		<option value="Degollado">Degollado</option>
		<option value="Ejutla">Ejutla</option>
		<option value="Encarnación de Díaz">Encarnación de Díaz</option>
		<option value="Etzatlán">Etzatlán</option>
		<option value="El Grullo">El Grullo</option>
		<option value="Guachinango">Guachinango</option>
		<option value="Guadalajara">Guadalajara</option>
		<option value="Hostotipaquillo">Hostotipaquillo</option>
		<option value="Huejúcar">Huejúcar</option>
		<option value="Huejuquilla el Alto">Huejuquilla el Alto</option>
		<option value="La Huerta">La Huerta</option>
		<option value="Ixtlahuacán de los Membrillos">Ixtlahuacán de los Membrillos</option>
		<option value="Ixtlahuacán del Río">Ixtlahuacán del Río</option>
		<option value="Jalostotitlán">Jalostotitlán</option>
		<option value="Jamay">Jamay</option>
		<option value="Jesús María">Jesús María</option>
		<option value="Jilotlán de los Dolores">Jilotlán de los Dolores</option>
		<option value="Jocotepec">Jocotepec</option>
		<option value="Juanacatlán">Juanacatlán</option>
		<option value="Juchitlán">Juchitlán</option>
		<option value="Lagos de Moreno">Lagos de Moreno</option>
		<option value="El Limón">El Limón</option>
		<option value="Magdalena">Magdalena</option>
		<option value="Santa María del Oro">Santa María del Oro</option>
		<option value="La Manzanilla de la Paz">La Manzanilla de la Paz</option>
		<option value="Mascota">Mascota</option>
		<option value="Mazamitla">Mazamitla</option>
		<option value="Mexticacán">Mexticacán</option>
		<option value="Mezquitic">Mezquitic</option>
		<option value="Mixtlán">Mixtlán</option>
		<option value="Ocotlán">Ocotlán</option>
		<option value="Ojuelos de Jalisco">Ojuelos de Jalisco</option>
		<option value="Pihuamo">Pihuamo</option>
		<option value="Poncitlán">Poncitlán</option>
		<option value="Puerto Vallarta">Puerto Vallarta</option>
		<option value="Villa Purificación">Villa Purificación</option>
		<option value="Quitupan">Quitupan</option>
		<option value="El Salto">El Salto</option>
		<option value="San Cristóbal de la Barranca">San Cristóbal de la Barranca</option>
		<option value="San Diego de Alejandría">San Diego de Alejandría</option>
		<option value="San Juan de los Lagos">San Juan de los Lagos</option>
		<option value="San Julián">San Julián</option>
		<option value="San Marcos">San Marcos</option>
		<option value="San Martín de Bolaños">San Martín de Bolaños</option>
		<option value="San Martín Hidalgo">San Martín Hidalgo</option>
		<option value="San Miguel el Alto">San Miguel el Alto</option>
		<option value="Gómez Farías">Gómez Farías</option>
		<option value="San Sebastián del Oeste">San Sebastián del Oeste</option>
		<option value="Santa María de los ángeles">Santa María de los ángeles</option>
		<option value="Sayula">Sayula</option>
		<option value="Tala">Tala</option>
		<option value="Talpa de Allende">Talpa de Allende</option>
		<option value="Tamazula de Gordiano">Tamazula de Gordiano</option>
		<option value="Tapalpa">Tapalpa</option>
		<option value="Tecalitlán">Tecalitlán</option>
		<option value="Tecolotlán">Tecolotlán</option>
		<option value="Techaluta de Montenegro">Techaluta de Montenegro</option>
		<option value="Tenamaxtlán">Tenamaxtlán</option>
		<option value="Teocaltiche">Teocaltiche</option>
		<option value="Teocuitatlán de Corona">Teocuitatlán de Corona</option>
		<option value="Tepatitlán de Morelos">Tepatitlán de Morelos</option>
		<option value="Tequila">Tequila</option>
		<option value="Teuchitlán">Teuchitlán</option>
		<option value="Tizapán el Alto">Tizapán el Alto</option>
		<option value="Tlajomulco de Zúñiga">Tlajomulco de Zúñiga</option>
		<option value="Tlaquepaque">Tlaquepaque</option>
		<option value="Tolimán">Tolimán</option>
		<option value="Tomatlán">Tomatlán</option>
		<option value="Tonalá">Tonalá</option>
		<option value="Tonaya">Tonaya</option>
		<option value="Tonila">Tonila</option>
		<option value="Totatiche">Totatiche</option>
		<option value="Tototlán">Tototlán</option>
		<option value="Tuxcacuesco">Tuxcacuesco</option>
		<option value="Tuxcueca">Tuxcueca</option>
		<option value="Tuxpan">Tuxpan</option>
		<option value="Unión de San Antonio">Unión de San Antonio</option>
		<option value="Unión de Tula">Unión de Tula</option>
		<option value="Valle de Guadalupe">Valle de Guadalupe</option>
		<option value="Valle de Juárez">Valle de Juárez</option>
		<option value="San Gabriel">San Gabriel</option>
		<option value="Villa Corona">Villa Corona</option>
		<option value="Villa Guerrero">Villa Guerrero</option>
		<option value="Villa Hidalgo">Villa Hidalgo</option>
		<option value="Cañadas de Obregón">Cañadas de Obregón</option>
		<option value="Yahualica de González Gallo">Yahualica de González Gallo</option>
		<option value="Zacoalco de Torres">Zacoalco de Torres</option>
		<option value="Zapopan">Zapopan</option>
		<option value="Zapotiltic">Zapotiltic</option>
		<option value="Zapotitlán de Vadillo">Zapotitlán de Vadillo</option>
		<option value="Zapotlán del Rey">Zapotlán del Rey</option>
		<option value="Zapotlanejo">Zapotlanejo</option>
		<option value="San Ignacio Cerro Gordo">San Ignacio Cerro Gordo</option>';
	}

	function michoacan(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Acuitzio">Acuitzio</option>
		<option value="Aguililla">Aguililla</option>
		<option value="Álvaro Obregón">Álvaro Obregón</option>
		<option value="Angamacutiro">Angamacutiro</option>
		<option value="Angangueo">Angangueo</option>
		<option value="Apatzingán">Apatzingán</option>
		<option value="Aporo">Aporo</option>
		<option value="Aquila">Aquila</option>
		<option value="Ario">Ario</option>
		<option value="Arteaga">Arteaga</option>
		<option value="Briseñas">Briseñas</option>
		<option value="Buenavista">Buenavista</option>
		<option value="Carácuaro">Carácuaro</option>
		<option value="Coahuayana">Coahuayana</option>
		<option value="Coalcomán de Vázquez Pallares">Coalcomán de Vázquez Pallares</option>
		<option value="Coeneo">Coeneo</option>
		<option value="Contepec">Contepec</option>
		<option value="Copándaro">Copándaro</option>
		<option value="Cotija">Cotija</option>
		<option value="Cuitzeo">Cuitzeo</option>
		<option value="Charapan">Charapan</option>
		<option value="Charo">Charo</option>
		<option value="Chavinda">Chavinda</option>
		<option value="Cherán">Cherán</option>
		<option value="Chilchota">Chilchota</option>
		<option value="Chinicuila">Chinicuila</option>
		<option value="Chucándiro">Chucándiro</option>
		<option value="Churintzio">Churintzio</option>
		<option value="Churumuco">Churumuco</option>
		<option value="Ecuandureo">Ecuandureo</option>
		<option value="Epitacio Huerta">Epitacio Huerta</option>
		<option value="Erongarícuaro">Erongarícuaro</option>
		<option value="Gabriel Zamora">Gabriel Zamora</option>
		<option value="Hidalgo">Hidalgo</option>
		<option value="La Huacana">La Huacana</option>
		<option value="Huandacareo">Huandacareo</option>
		<option value="Huaniqueo">Huaniqueo</option>
		<option value="Huetamo">Huetamo</option>
		<option value="Huiramba">Huiramba</option>
		<option value="Indaparapeo">Indaparapeo</option>
		<option value="Irimbo">Irimbo</option>
		<option value="Ixtlán">Ixtlán</option>
		<option value="Jacona">Jacona</option>
		<option value="Jiménez">Jiménez</option>
		<option value="Jiquilpan">Jiquilpan</option>
		<option value="Juárez">Juárez</option>
		<option value="Jungapeo">Jungapeo</option>
		<option value="Lagunillas">Lagunillas</option>
		<option value="Madero">Madero</option>
		<option value="Maravatío">Maravatío</option>
		<option value="Marcos Castellanos">Marcos Castellanos</option>
		<option value="Lázaro Cárdenas">Lázaro Cárdenas</option>
		<option value="Morelia">Morelia</option>
		<option value="Morelos">Morelos</option>
		<option value="Múgica">Múgica</option>
		<option value="Nahuatzen">Nahuatzen</option>
		<option value="Nocupétaro">Nocupétaro</option>
		<option value="Nuevo Parangaricutiro">Nuevo Parangaricutiro</option>
		<option value="Nuevo Urecho">Nuevo Urecho</option>
		<option value="Numarán">Numarán</option>
		<option value="Ocampo">Ocampo</option>
		<option value="Pajacuarán">Pajacuarán</option>
		<option value="Panindícuaro">Panindícuaro</option>
		<option value="Parácuaro">Parácuaro</option>
		<option value="Paracho">Paracho</option>
		<option value="Pátzcuaro">Pátzcuaro</option>
		<option value="Penjamillo">Penjamillo</option>
		<option value="Peribán">Peribán</option>
		<option value="La Piedad">La Piedad</option>
		<option value="Purépero">Purépero</option>
		<option value="Puruándiro">Puruándiro</option>
		<option value="Queréndaro">Queréndaro</option>
		<option value="Quiroga">Quiroga</option>
		<option value="Cojumatlán de Régules">Cojumatlán de Régules</option>
		<option value="Los Reyes">Los Reyes</option>
		<option value="Sahuayo">Sahuayo</option>
		<option value="San Lucas">San Lucas</option>
		<option value="Santa Ana Maya">Santa Ana Maya</option>
		<option value="Salvador Escalante">Salvador Escalante</option>
		<option value="Senguio">Senguio</option>
		<option value="Susupuato">Susupuato</option>
		<option value="Tacámbaro">Tacámbaro</option>
		<option value="Tancítaro">Tancítaro</option>
		<option value="Tangamandapio">Tangamandapio</option>
		<option value="Tangancícuaro">Tangancícuaro</option>
		<option value="Tanhuato">Tanhuato</option>
		<option value="Taretan">Taretan</option>
		<option value="Tarímbaro">Tarímbaro</option>
		<option value="Tepalcatepec">Tepalcatepec</option>
		<option value="Tingambato">Tingambato</option>
		<option value="Tinguindín">Tinguindín</option>
		<option value="Tiquicheo de Nicolás Romero">Tiquicheo de Nicolás Romero</option>
		<option value="Tlalpujahua">Tlalpujahua</option>
		<option value="Tlazazalca">Tlazazalca</option>
		<option value="Tocumbo">Tocumbo</option>
		<option value="Tumbiscatío">Tumbiscatío</option>
		<option value="Turicato">Turicato</option>
		<option value="Tuxpan">Tuxpan</option>
		<option value="Tuzantla">Tuzantla</option>
		<option value="Tzintzuntzan">Tzintzuntzan</option>
		<option value="Tzitzio">Tzitzio</option>
		<option value="Uruapan">Uruapan</option>
		<option value="Venustiano Carranza">Venustiano Carranza</option>
		<option value="Villamar">Villamar</option>
		<option value="Vista Hermosa">Vista Hermosa</option>
		<option value="Yurécuaro">Yurécuaro</option>
		<option value="Zacapu">Zacapu</option>
		<option value="Zamora">Zamora</option>
		<option value="Zináparo">Zináparo</option>
		<option value="Zinapécuaro">Zinapécuaro</option>
		<option value="Ziracueretiro">Ziracueretiro</option>
		<option value="Zitácuaro">Zitácuaro</option>
		<option value="José Sixto Verduzco">José Sixto Verduzco</option>';
	}

	function morelos(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Amacuzac">Amacuzac</option>
		<option value="Atlatlahucan">Atlatlahucan</option>
		<option value="Axochiapan">Axochiapan</option>
		<option value="Ayala">Ayala</option>
		<option value="Coatlán del Río (municipio)">Coatlán del Río (municipio)</option>
		<option value="Cuautla">Cuautla</option>
		<option value="Cuernavaca">Cuernavaca</option>
		<option value="Emiliano Zapata">Emiliano Zapata</option>
		<option value="Huitzilac">Huitzilac</option>
		<option value="Jantetelco">Jantetelco</option>
		<option value="Jiutepec">Jiutepec</option>
		<option value="Jojutla">Jojutla</option>
		<option value="Jonacatepec">Jonacatepec</option>
		<option value="Mazatepec">Mazatepec</option>
		<option value="Miacatlán">Miacatlán</option>
		<option value="Ocuituco">Ocuituco</option>
		<option value="Puente de Ixtla">Puente de Ixtla</option>
		<option value="Temixco">Temixco</option>
		<option value="Tepalcingo">Tepalcingo</option>
		<option value="Tepoztlán">Tepoztlán</option>
		<option value="Tetecala">Tetecala</option>
		<option value="Tetela del Volcán">Tetela del Volcán</option>
		<option value="Tlalnepantla">Tlalnepantla</option>
		<option value="Tlaltizapán">Tlaltizapán</option>
		<option value="Tlaquiltenango">Tlaquiltenango</option>
		<option value="Tlayacapan">Tlayacapan</option>
		<option value="Totolapan">Totolapan</option>
		<option value="Xochitepec">Xochitepec</option>
		<option value="Yautepec">Yautepec</option>
		<option value="Yecapixtla">Yecapixtla</option>
		<option value="Zacatepec">Zacatepec</option>
		<option value="Zacualpan">Zacualpan</option>
		<option value="Temoac">Temoac</option>';
	}

	function nayarit(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Acaponeta">Acaponeta</option>
		<option value="Ruiz">Ruiz</option>
		<option value="Ahuacatlán">Ahuacatlán</option>
		<option value="San Blas">San Blas</option>
		<option value="Amatlán de Cañas">Amatlán de Cañas</option>
		<option value="San Pedro Lagunillas">San Pedro Lagunillas</option>
		<option value="Compostela">Compostela</option>
		<option value="Santa María del Oro">Santa María del Oro</option>
		<option value="Huajicori">Huajicori</option>
		<option value="Santiago Ixcuintla">Santiago Ixcuintla</option>
		<option value="Ixtlán del Río">Ixtlán del Río</option>
		<option value="Tecuala">Tecuala</option>
		<option value="Jala">Jala</option>
		<option value="Tepic">Tepic</option>
		<option value="Xalisco">Xalisco</option>
		<option value="Tuxpan">Tuxpan</option>
		<option value="Del Nayar">Del Nayar</option>
		<option value="La Yesca">La Yesca</option>
		<option value="Rosamorada">Rosamorada</option>
		<option value="Bahía de Banderas">Bahía de Banderas</option>';
	}

	function nuevo_leon(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Abasolo">Abasolo</option>
		<option value="Agualeguas">Agualeguas</option>
		<option value="Los Aldamas">Los Aldamas</option>
		<option value="Allende">Allende</option>
		<option value="Anáhuac">Anáhuac</option>
		<option value="Ciudad Apodaca">Ciudad Apodaca</option>
		<option value="Aramberri">Aramberri</option>
		<option value="Bustamante">Bustamante</option>
		<option value="Cadereyta Jiménez">Cadereyta Jiménez</option>
		<option value="Carmen">Carmen</option>
		<option value="Cerralvo">Cerralvo</option>
		<option value="Ciénega de Flores">Ciénega de Flores</option>
		<option value="China">China</option>
		<option value="Doctor Arroyo">Doctor Arroyo</option>
		<option value="Doctor Coss">Doctor Coss</option>
		<option value="Doctor González">Doctor González</option>
		<option value="Galeana">Galeana</option>
		<option value="García">García</option>
		<option value="San Pedro Garza García">San Pedro Garza García</option>
		<option value="General Bravo">General Bravo</option>
		<option value="General Escobedo">General Escobedo</option>
		<option value="General Terán">General Terán</option>
		<option value="General Treviño">General Treviño</option>
		<option value="General Zaragoza">General Zaragoza</option>
		<option value="General Zuazua">General Zuazua</option>
		<option value="Guadalupe">Guadalupe</option>
		<option value="Los Herreras">Los Herreras</option>
		<option value="Higueras">Higueras</option>
		<option value="Hualahuises">Hualahuises</option>
		<option value="Iturbide">Iturbide</option>
		<option value="Juárez">Juárez</option>
		<option value="Lampazos de Naranjo">Lampazos de Naranjo</option>
		<option value="Linares">Linares</option>
		<option value="Marín">Marín</option>
		<option value="Melchor Ocampo">Melchor Ocampo</option>
		<option value="Mier y Noriega">Mier y Noriega</option>
		<option value="Mina">Mina</option>
		<option value="Montemorelos">Montemorelos</option>
		<option value="Monterrey">Monterrey</option>
		<option value="Parás">Parás</option>
		<option value="Pesquería">Pesquería</option>
		<option value="Los Ramones">Los Ramones</option>
		<option value="Rayones">Rayones</option>
		<option value="Sabinas Hidalgo">Sabinas Hidalgo</option>
		<option value="Salinas Victoria">Salinas Victoria</option>
		<option value="San Nicolás de los Garza">San Nicolás de los Garza</option>
		<option value="Hidalgo">Hidalgo</option>
		<option value="Santa Catarina">Santa Catarina</option>
		<option value="Santiago">Santiago</option>
		<option value="Vallecillo">Vallecillo</option>
		<option value="Villaldama">Villaldama</option>';
	}

	function oaxaca(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Abejones">Abejones</option>
		<option value="San Miguel Tlacotepec">San Miguel Tlacotepec</option>
		<option value="Acatlán de Pérez Figueroa">Acatlán de Pérez Figueroa</option>
		<option value="San Miguel Tulancingo">San Miguel Tulancingo</option>
		<option value="Asunción Cacalotepec">Asunción Cacalotepec</option>
		<option value="San Miguel Yotao">San Miguel Yotao</option>
		<option value="Asunción Cuyotepeji">Asunción Cuyotepeji</option>
		<option value="San Nicolás">San Nicolás</option>
		<option value="Asunción Ixtaltepec">Asunción Ixtaltepec</option>
		<option value="San Nicolás Hidalgo">San Nicolás Hidalgo</option>
		<option value="Asunción Nochixtlán">Asunción Nochixtlán</option>
		<option value="San Pablo Coatlán">San Pablo Coatlán</option>
		<option value="Asunción Ocotlán">Asunción Ocotlán</option>
		<option value="San Pablo Cuatro Venados">San Pablo Cuatro Venados</option>
		<option value="Asunción Tlacolulita">Asunción Tlacolulita</option>
		<option value="San Pablo Etla">San Pablo Etla</option>
		<option value="Ayotzintepec">Ayotzintepec</option>
		<option value="San Pablo Huitzo">San Pablo Huitzo</option>
		<option value="El Barrio de la Soledad">El Barrio de la Soledad</option>
		<option value="San Pablo Huixtepec">San Pablo Huixtepec</option>
		<option value="Calihualá">Calihualá</option>
		<option value="San Pablo Macuiltianguis">San Pablo Macuiltianguis</option>
		<option value="Candelaria Loxicha">Candelaria Loxicha</option>
		<option value="San Pablo Tijaltepec">San Pablo Tijaltepec</option>
		<option value="San Pablo Tijaltepec">San Pablo Tijaltepec</option>
		<option value="Ciénega de Zimatlán">Ciénega de Zimatlán</option>
		<option value="San Pablo Villa de Mitla">San Pablo Villa de Mitla</option>
		<option value="Ciudad Ixtepec">Ciudad Ixtepec</option>
		<option value="San Pablo Yaganiza">San Pablo Yaganiza</option>
		<option value="Coatecas Altas">Coatecas Altas</option>
		<option value="San Pedro Amuzgos">San Pedro Amuzgos</option>
		<option value="Coicoyán de las Flores">Coicoyán de las Flores</option>
		<option value="San Pedro Apóstol">San Pedro Apóstol</option>
		<option value="La Compañía">La Compañía</option>
		<option value="San Pedro Atoyac">San Pedro Atoyac</option>
		<option value="Concepción Buenavista">Concepción Buenavista</option>
		<option value="San Pedro Cajonos">San Pedro Cajonos</option>
		<option value="Concepción Pápalo">Concepción Pápalo</option>
		<option value="San Pedro Coxcaltepec Cántaros">San Pedro Coxcaltepec Cántaros</option>
		<option value="Constancia del Rosario">Constancia del Rosario</option>
		<option value="San Pedro Comitancillo">San Pedro Comitancillo</option>
		<option value="Cosolapa">Cosolapa</option>
		<option value="San Pedro el Alto">San Pedro el Alto</option>
		<option value="Cosoltepec">Cosoltepec</option>
		<option value="San Pedro Huamelula">San Pedro Huamelula</option>
		<option value="Cuilápam de Guerrero">Cuilápam de Guerrero</option>
		<option value="San Pedro Huilotepec">San Pedro Huilotepec</option>
		<option value="Cuyamecalco Villa de Zaragoza">Cuyamecalco Villa de Zaragoza</option>
		<option value="San Pedro Ixcatlán">San Pedro Ixcatlán</option>
		<option value="Chahuites">Chahuites</option>
		<option value="San Pedro Ixtlahuaca">San Pedro Ixtlahuaca</option>
		<option value="Chalcatongo de Hidalgo">Chalcatongo de Hidalgo</option>
		<option value="San Pedro Jaltepetongo">San Pedro Jaltepetongo</option>
		<option value="Chiquihuitlán de Benito Juárez">Chiquihuitlán de Benito Juárez</option>
		<option value="San Pedro Jicayán">San Pedro Jicayán</option>
		<option value="Heroica Ciudad de Ejutla de Crespo">Heroica Ciudad de Ejutla de Crespo</option>
		<option value="San Pedro Jocotipac">San Pedro Jocotipac</option>
		<option value="Eloxochitlán de Flores Magón">Eloxochitlán de Flores Magón</option>
		<option value="San Pedro Juchatengo">San Pedro Juchatengo</option>
		<option value="El Espinal">El Espinal</option>
		<option value="San Pedro Mártir">San Pedro Mártir</option>
		<option value="Tamazulapam del Espíritu Santo">Tamazulapam del Espíritu Santo</option>
		<option value="San Pedro Mártir Quiechapa">San Pedro Mártir Quiechapa</option>
		<option value="Fresnillo de Trujano">Fresnillo de Trujano</option>
		<option value="San Pedro Mártir Yucuxaco">San Pedro Mártir Yucuxaco</option>
		<option value="Guadalupe Etla">Guadalupe Etla</option>
		<option value="San Pedro Mixtepec - Distrito 22 ">San Pedro Mixtepec - Distrito 22 </option>
		<option value="Guadalupe de Ramírez">Guadalupe de Ramírez</option>
		<option value="San Pedro Mixtepec - Distrito 26">San Pedro Mixtepec - Distrito 26</option>
		<option value="Guelatao de Juárez">Guelatao de Juárez</option>
		<option value="San Pedro Molinos">San Pedro Molinos</option>
		<option value="Guevea de Humboldt">Guevea de Humboldt</option>
		<option value="San Pedro Nopala">San Pedro Nopala</option>
		<option value="Mesones Hidalgo">Mesones Hidalgo</option>
		<option value="San Pedro Ocopetatillo">San Pedro Ocopetatillo</option>
		<option value="Villa Hidalgo">Villa Hidalgo</option>
		<option value="San Pedro Ocotepec">San Pedro Ocotepec</option>
		<option value="Heroica Ciudad de Huajuapan de León">Heroica Ciudad de Huajuapan de León</option>
		<option value="San Pedro Pochutla">San Pedro Pochutla</option>
		<option value="Huautepec">Huautepec</option>
		<option value="San Pedro Quiatoni">San Pedro Quiatoni</option>
		<option value="Huautla de Jiménez">Huautla de Jiménez</option>
		<option value="San Pedro Sochiapam">San Pedro Sochiapam</option>
		<option value="Ixtlán de Juárez">Ixtlán de Juárez</option>
		<option value="San Pedro Tapanatepec">San Pedro Tapanatepec</option>
		<option value="Heroica Ciudad de Juchitán de Zaragoza">Heroica Ciudad de Juchitán de Zaragoza</option>
		<option value="San Pedro Taviche">San Pedro Taviche</option>
		<option value="Loma Bonita">Loma Bonita</option>
		<option value="San Pedro Teozacoalco">San Pedro Teozacoalco</option>
		<option value="Magdalena Apasco">Magdalena Apasco</option>
		<option value="San Pedro Teutila">San Pedro Teutila</option>
		<option value="Magdalena Jaltepec">Magdalena Jaltepec</option>
		<option value="San Pedro Tidaá">San Pedro Tidaá</option>
		<option value="Santa Magdalena Jicotlán">Santa Magdalena Jicotlán</option>
		<option value="San Pedro Topiltepec">San Pedro Topiltepec</option>
		<option value="Magdalena Mixtepec">Magdalena Mixtepec</option>
		<option value="San Pedro Totolapa">San Pedro Totolapa</option>
		<option value="Magdalena Ocotlán">Magdalena Ocotlán</option>
		<option value="Villa de Tututepec de Melchor Ocampo">Villa de Tututepec de Melchor Ocampo</option>
		<option value="Magdalena Peñasco">Magdalena Peñasco</option>
		<option value="San Pedro Yaneri">San Pedro Yaneri</option>
		<option value="Magdalena Teitipac">Magdalena Teitipac</option>
		<option value="San Pedro Yólox">San Pedro Yólox</option>
		<option value="Magdalena Tequisistlán">Magdalena Tequisistlán</option>
		<option value="San Pedro y San Pablo Ayutla">San Pedro y San Pablo Ayutla</option>
		<option value="Magdalena Tlacotepec">Magdalena Tlacotepec</option>
		<option value="Villa de Etla">Villa de Etla</option>
		<option value="Magdalena Zahuatlán">Magdalena Zahuatlán</option>
		<option value="San Pedro y San Pablo Teposcolula">San Pedro y San Pablo Teposcolula</option>
		<option value="Mariscala de Juárez">Mariscala de Juárez</option>
		<option value="San Pedro y San Pablo Tequixtepec">San Pedro y San Pablo Tequixtepec</option>
		<option value="Mártires de Tacubaya">Mártires de Tacubaya</option>
		<option value="San Pedro Yucunama">San Pedro Yucunama</option>
		<option value="Matías Romero Avendaño">Matías Romero Avendaño</option>
		<option value="San Raymundo Jalpan">San Raymundo Jalpan</option>
		<option value="Mazatlán Villa de Flores">Mazatlán Villa de Flores</option>
		<option value="San Sebastián Abasolo">San Sebastián Abasolo</option>
		<option value="Miahuatlán de Porfirio Díaz">Miahuatlán de Porfirio Díaz</option>
		<option value="San Sebastián Coatlán">San Sebastián Coatlán</option>
		<option value="Mixistlán de la Reforma">Mixistlán de la Reforma</option>
		<option value="San Sebastián Ixcapa">San Sebastián Ixcapa</option>
		<option value="Monjas">Monjas</option>
		<option value="San Sebastián Nicananduta">San Sebastián Nicananduta</option>
		<option value="Natividad">Natividad</option>
		<option value="San Sebastián Río Hondo">San Sebastián Río Hondo</option>
		<option value="Nazareno Etla">Nazareno Etla</option>
		<option value="San Sebastián Tecomaxtlahuaca">San Sebastián Tecomaxtlahuaca</option>
		<option value="Nejapa de Madero">Nejapa de Madero</option>
		<option value="San Sebastián Teitipac">San Sebastián Teitipac</option>
		<option value="Ixpantepec Nieves">Ixpantepec Nieves</option>
		<option value="San Sebastián Tutla">San Sebastián Tutla</option>
		<option value="Santiago Niltepec">Santiago Niltepec</option>
		<option value="San Simón Almolongas">San Simón Almolongas</option>
		<option value="Oaxaca de Juárez">Oaxaca de Juárez</option>
		<option value="San Simón Zahuatlán">San Simón Zahuatlán</option>
		<option value="Ocotlán de Morelos">Ocotlán de Morelos</option>
		<option value="Santa Ana">Santa Ana</option>
		<option value="La Pe">La Pe</option>
		<option value="Santa Ana Ateixtlahuaca">Santa Ana Ateixtlahuaca</option>
		<option value="Pinotepa de Don Luis">Pinotepa de Don Luis</option>
		<option value="Santa Ana Cuauhtémoc">Santa Ana Cuauhtémoc</option>
		<option value="Pluma Hidalgo">Pluma Hidalgo</option>
		<option value="Santa Ana del Valle">Santa Ana del Valle</option>
		<option value="San José del Progreso">San José del Progreso</option>
		<option value="Santa Ana Tavela">Santa Ana Tavela</option>
		<option value="Putla Villa de Guerrero">Putla Villa de Guerrero</option>
		<option value="Santa Ana Tlapacoyan">Santa Ana Tlapacoyan</option>
		<option value="Santa Catarina Quioquitani">Santa Catarina Quioquitani</option>
		<option value="Santa Ana Yareni">Santa Ana Yareni</option>
		<option value="Reforma de Pineda">Reforma de Pineda</option>
		<option value="Santa Ana Zegache">Santa Ana Zegache</option>
		<option value="La Reforma">La Reforma</option>
		<option value="Santa Catalina Quieri">Santa Catalina Quieri</option>
		<option value="Reyes Etla">Reyes Etla</option>
		<option value="Santa Catarina Cuixtla">Santa Catarina Cuixtla</option>
		<option value="Rojas de Cuauhtémoc">Rojas de Cuauhtémoc</option>
		<option value="Santa Catarina Ixtepeji">Santa Catarina Ixtepeji</option>
		<option value="Salina Cruz">Salina Cruz</option>
		<option value="Santa Catarina Juquila">Santa Catarina Juquila</option>
		<option value="San Agustín Amatengo">San Agustín Amatengo</option>
		<option value="Santa Catarina Lachatao">Santa Catarina Lachatao</option>
		<option value="San Agustín Atenango">San Agustín Atenango</option>
		<option value="Santa Catarina Loxicha">Santa Catarina Loxicha</option>
		<option value="San Agustín Chayuco">San Agustín Chayuco</option>
		<option value="Santa Catarina Mechoacán">Santa Catarina Mechoacán</option>
		<option value="San Agustín de las Juntas">San Agustín de las Juntas</option>
		<option value="Santa Catarina Minas">Santa Catarina Minas</option>
		<option value="San Agustín Etla">San Agustín Etla</option>
		<option value="Santa Catarina Quiané">Santa Catarina Quiané</option>
		<option value="San Agustín Loxicha">San Agustín Loxicha</option>
		<option value="Santa Catarina Tayata">Santa Catarina Tayata</option>
		<option value="San Agustín Tlacotepec">San Agustín Tlacotepec</option>
		<option value="Santa Catarina Ticuá">Santa Catarina Ticuá</option>
		<option value="San Agustín Yatareni">San Agustín Yatareni</option>
		<option value="Santa Catarina Yosonotú">Santa Catarina Yosonotú</option>
		<option value="San Andrés Cabecera Nueva">San Andrés Cabecera Nueva</option>
		<option value="Santa Catarina Zapoquila">Santa Catarina Zapoquila</option>
		<option value="San Andrés Dinicuiti">San Andrés Dinicuiti</option>
		<option value="Santa Cruz Acatepec">Santa Cruz Acatepec</option>
		<option value="San Andrés Huaxpaltepec">San Andrés Huaxpaltepec</option>
		<option value="Santa Cruz Amilpas">Santa Cruz Amilpas</option>
		<option value="San Andrés Huayapam">San Andrés Huayapam</option>
		<option value="Santa Cruz de Bravo">Santa Cruz de Bravo</option>
		<option value="San Andrés Ixtlahuaca">San Andrés Ixtlahuaca</option>
		<option value="Santa Cruz Itundujia">Santa Cruz Itundujia</option>
		<option value="San Andrés Lagunas">San Andrés Lagunas</option>
		<option value="Santa Cruz Mixtepec">Santa Cruz Mixtepec</option>
		<option value="San Andrés Nuxiño">San Andrés Nuxiño</option>
		<option value="Santa Cruz Nundaco">Santa Cruz Nundaco</option>
		<option value="San Andrés Paxtlán">San Andrés Paxtlán</option>
		<option value="Santa Cruz Papalutla">Santa Cruz Papalutla</option>
		<option value="San Andrés Sinaxtla">San Andrés Sinaxtla</option>
		<option value="Santa Cruz Tacache de Mina">Santa Cruz Tacache de Mina</option>
		<option value="San Andrés Solaga">San Andrés Solaga</option>
		<option value="Santa Cruz Tacahua">Santa Cruz Tacahua</option>
		<option value="San Andrés Teotilálpam">San Andrés Teotilálpam</option>
		<option value="Santa Cruz Tayata">Santa Cruz Tayata</option>
		<option value="San Andrés Tepetlapa">San Andrés Tepetlapa</option>
		<option value="Santa Cruz Xitla">Santa Cruz Xitla</option>
		<option value="San Andrés Yaá">San Andrés Yaá</option>
		<option value="Santa Cruz Xoxocotlán">Santa Cruz Xoxocotlán</option>
		<option value="San Andrés Zabache">San Andrés Zabache</option>
		<option value="Santa Cruz Zenzontepec">Santa Cruz Zenzontepec</option>
		<option value="San Andrés Zautla">San Andrés Zautla</option>
		<option value="Santa Gertrudis">Santa Gertrudis</option>
		<option value="San Antonino Castillo Velasco">San Antonino Castillo Velasco</option>
		<option value="Santa Inés del Monte">Santa Inés del Monte</option>
		<option value="San Antonino el Alto">San Antonino el Alto</option>
		<option value="Santa Inés Yatzeche">Santa Inés Yatzeche</option>
		<option value="San Antonino Monte Verde">San Antonino Monte Verde</option>
		<option value="Santa Lucía del Camino">Santa Lucía del Camino</option>
		<option value="San Antonio Acutla">San Antonio Acutla</option>
		<option value="Santa Lucía Miahuatlán">Santa Lucía Miahuatlán</option>
		<option value="San Antonio de la Cal">San Antonio de la Cal</option>
		<option value="Santa Lucía Monteverde">Santa Lucía Monteverde</option>
		<option value="San Antonio Huitepec">San Antonio Huitepec</option>
		<option value="Santa Lucía Ocotlán">Santa Lucía Ocotlán</option>
		<option value="San Antonio Nanahuatipam">San Antonio Nanahuatipam</option>
		<option value="Santa María Alotepec">Santa María Alotepec</option>
		<option value="San Antonio Sinicahua">San Antonio Sinicahua</option>
		<option value="Santa María Apazco">Santa María Apazco</option>
		<option value="San Antonio Tepetlapa">San Antonio Tepetlapa</option>
		<option value="Santa María la Asunción">Santa María la Asunción</option>
		<option value="San Baltazar Chichicapam">San Baltazar Chichicapam</option>
		<option value="Heroica Ciudad de Tlaxiaco">Heroica Ciudad de Tlaxiaco</option>
		<option value="San Baltazar Loxicha">San Baltazar Loxicha</option>
		<option value="Ayoquezco de Aldama">Ayoquezco de Aldama</option>
		<option value="San Baltazar Yatzachi el Bajo">San Baltazar Yatzachi el Bajo</option>
		<option value="Santa María Atzompa">Santa María Atzompa</option>
		<option value="San Bartolo Coyotepec">San Bartolo Coyotepec</option>
		<option value="Santa María Camotlán">Santa María Camotlán</option>
		<option value="San Bartolomé Ayautla">San Bartolomé Ayautla</option>
		<option value="Santa María Colotepec">Santa María Colotepec</option>
		<option value="San Bartolomé Loxicha">San Bartolomé Loxicha</option>
		<option value="Santa María Cortijo">Santa María Cortijo</option>
		<option value="San Bartolomé Quialana">San Bartolomé Quialana</option>
		<option value="Santa María Coyotepec">Santa María Coyotepec</option>
		<option value="San Bartolomé Yucuañe">San Bartolomé Yucuañe</option>
		<option value="Santa María Chachoapam">Santa María Chachoapam</option>
		<option value="San Bartolomé Zoogocho">San Bartolomé Zoogocho</option>
		<option value="Villa de Chilapa de Díaz">Villa de Chilapa de Díaz</option>
		<option value="San Bartolo Soyaltepec">San Bartolo Soyaltepec</option>
		<option value="Santa María Chilchotla">Santa María Chilchotla</option>
		<option value="San Bartolo Yautepec">San Bartolo Yautepec</option>
		<option value="Santa María Chimalapa">Santa María Chimalapa</option>
		<option value="San Bernardo Mixtepec">San Bernardo Mixtepec</option>
		<option value="Santa María del Rosario">Santa María del Rosario</option>
		<option value="San Blas Atempa">San Blas Atempa</option>
		<option value="Santa María del Tule">Santa María del Tule</option>
		<option value="San Carlos Yautepec">San Carlos Yautepec</option>
		<option value="Santa María Ecatepec">Santa María Ecatepec</option>
		<option value="San Cristóbal Amatlán">San Cristóbal Amatlán</option>
		<option value="Santa María Guelacé">Santa María Guelacé</option>
		<option value="San Cristóbal Amoltepec">San Cristóbal Amoltepec</option>
		<option value="Santa María Guienagati">Santa María Guienagati</option>
		<option value="San Cristóbal Lachirioag">San Cristóbal Lachirioag</option>
		<option value="Santa María Huatulco">Santa María Huatulco</option>
		<option value="San Cristóbal Suchixtlahuaca">San Cristóbal Suchixtlahuaca</option>
		<option value="Santa María Huazolotitlán">Santa María Huazolotitlán</option>
		<option value="San Dionisio del Mar">San Dionisio del Mar</option>
		<option value="Santa María Ipalapa">Santa María Ipalapa</option>
		<option value="San Dionisio Ocotepec">San Dionisio Ocotepec</option>
		<option value="Santa María Ixcatlán">Santa María Ixcatlán</option>
		<option value="San Dionisio Ocotlán">San Dionisio Ocotlán</option>
		<option value="Santa María Jacatepec">Santa María Jacatepec</option>
		<option value="San Esteban Atatlahuca">San Esteban Atatlahuca</option>
		<option value="Santa María Jalapa del Marqués">Santa María Jalapa del Marqués</option>
		<option value="San Felipe Jalapa de Díaz">San Felipe Jalapa de Díaz</option>
		<option value="Santa María Jaltianguis">Santa María Jaltianguis</option>
		<option value="San Felipe Tejalapam">San Felipe Tejalapam</option>
		<option value="Santa María Lachixío">Santa María Lachixío</option>
		<option value="San Felipe Usila">San Felipe Usila</option>
		<option value="Santa María Mixtequilla">Santa María Mixtequilla</option>
		<option value="San Francisco Cahuacúa">San Francisco Cahuacúa</option>
		<option value="Santa María Nativitas">Santa María Nativitas</option>
		<option value="San Francisco Cajonos">San Francisco Cajonos</option>
		<option value="Santa María Nduayaco">Santa María Nduayaco</option>
		<option value="San Francisco Chapulapa">San Francisco Chapulapa</option>
		<option value="Santa María Ozolotepec">Santa María Ozolotepec</option>
		<option value="San Francisco Chindúa">San Francisco Chindúa</option>
		<option value="Santa María Pápalo">Santa María Pápalo</option>
		<option value="San Francisco del Mar">San Francisco del Mar</option>
		<option value="Santa María Peñoles">Santa María Peñoles</option>
		<option value="San Francisco Huehuetlán">San Francisco Huehuetlán</option>
		<option value="Santa María Petapa">Santa María Petapa</option>
		<option value="San Francisco Ixhuatán">San Francisco Ixhuatán</option>
		<option value="Santa María Quiegolani">Santa María Quiegolani</option>
		<option value="San Francisco Jaltepetongo">San Francisco Jaltepetongo</option>
		<option value="Santa María Sola">Santa María Sola</option>
		<option value="San Francisco Lachigoló">San Francisco Lachigoló</option>
		<option value="Santa María Tataltepec">Santa María Tataltepec</option>
		<option value="San Francisco Logueche">San Francisco Logueche</option>
		<option value="Santa María Tecomavaca">Santa María Tecomavaca</option>
		<option value="San Francisco Nuxaño">San Francisco Nuxaño</option>
		<option value="Santa María Temaxcalapa">Santa María Temaxcalapa</option>
		<option value="San Francisco Ozolotepec">San Francisco Ozolotepec</option>
		<option value="Santa María Temaxcaltepec">Santa María Temaxcaltepec</option>
		<option value="San Francisco Sola">San Francisco Sola</option>
		<option value="Santa María Teopoxco">Santa María Teopoxco</option>
		<option value="San Francisco Telixtlahuaca">San Francisco Telixtlahuaca</option>
		<option value="Santa María Tepantlali">Santa María Tepantlali</option>
		<option value="San Francisco Teopan">San Francisco Teopan</option>
		<option value="Santa María Texcatitlán">Santa María Texcatitlán</option>
		<option value="San Francisco Tlapancingo">San Francisco Tlapancingo</option>
		<option value="Santa María Tlahuitoltepec">Santa María Tlahuitoltepec</option>
		<option value="San Gabriel Mixtepec">San Gabriel Mixtepec</option>
		<option value="Santa María Tlalixtac">Santa María Tlalixtac</option>
		<option value="San Ildefonso Amatlán">San Ildefonso Amatlán</option>
		<option value="Santa María Tonameca">Santa María Tonameca</option>
		<option value="San Ildefonso Sola">San Ildefonso Sola</option>
		<option value="Santa María Totolapilla">Santa María Totolapilla</option>
		<option value="San Ildefonso Villa Alta">San Ildefonso Villa Alta</option>
		<option value="Santa María Xadani">Santa María Xadani</option>
		<option value="San Jacinto Amilpas">San Jacinto Amilpas</option>
		<option value="Santa María Yalina">Santa María Yalina</option>
		<option value="San Jacinto Tlacotepec">San Jacinto Tlacotepec</option>
		<option value="Santa María Yavesía">Santa María Yavesía</option>
		<option value="San Jerónimo Coatlán">San Jerónimo Coatlán</option>
		<option value="Santa María Yolotepec">Santa María Yolotepec</option>
		<option value="San Jerónimo Silacayoapilla">San Jerónimo Silacayoapilla</option>
		<option value="Santa María Yosoyúa">Santa María Yosoyúa</option>
		<option value="San Jerónimo Sosola">San Jerónimo Sosola</option>
		<option value="Santa María Yucuhiti">Santa María Yucuhiti</option>
		<option value="San Jerónimo Taviche">San Jerónimo Taviche</option>
		<option value="Santa María Zacatepec">Santa María Zacatepec</option>
		<option value="San Jerónimo Tecoatl">San Jerónimo Tecoatl</option>
		<option value="Santa María Zaniza">Santa María Zaniza</option>
		<option value="San Jorge Nuchita">San Jorge Nuchita</option>
		<option value="Santa María Zoquitlán">Santa María Zoquitlán</option>
		<option value="San José Ayuquila">San José Ayuquila</option>
		<option value="Santiago Amoltepec">Santiago Amoltepec</option>
		<option value="San José Chiltepec">San José Chiltepec</option>
		<option value="Santiago Apoala">Santiago Apoala</option>
		<option value="San José del Peñasco">San José del Peñasco</option>
		<option value="Santiago Apóstol">Santiago Apóstol</option>
		<option value="San José Estancia Grande">San José Estancia Grande</option>
		<option value="Santiago Astata">Santiago Astata</option>
		<option value="San José Independencia">San José Independencia</option>
		<option value="Santiago Atitlán">Santiago Atitlán</option>
		<option value="San José Lachiguirí">San José Lachiguirí</option>
		<option value="Santiago Ayuquililla">Santiago Ayuquililla</option>
		<option value="San José Tenango">San José Tenango</option>
		<option value="Santiago Cacaloxtepec">Santiago Cacaloxtepec</option>
		<option value="San Juan Achiutla">San Juan Achiutla</option>
		<option value="Santiago Camotlán">Santiago Camotlán</option>
		<option value="San Juan Atepec">San Juan Atepec</option>
		<option value="Santiago Comaltepec">Santiago Comaltepec</option>
		<option value="ánimas Trujano">ánimas Trujano</option>
		<option value="Santiago Chazumba">Santiago Chazumba</option>
		<option value="San Juan Bautista Atatlahuca">San Juan Bautista Atatlahuca</option>
		<option value="Santiago Choapam">Santiago Choapam</option>
		<option value="San Juan Bautista Coixtlahuaca">San Juan Bautista Coixtlahuaca</option>
		<option value="Santiago del Río">Santiago del Río</option>
		<option value="San Juan Bautista Cuicatlán">San Juan Bautista Cuicatlán</option>
		<option value="Santiago Huajolotitlán">Santiago Huajolotitlán</option>
		<option value="San Juan Bautista Guelache">San Juan Bautista Guelache</option>
		<option value="Santiago Huauclilla">Santiago Huauclilla</option>
		<option value="San Juan Bautista Jayacatlán">San Juan Bautista Jayacatlán</option>
		<option value="Santiago Ihuitlán Plumas">Santiago Ihuitlán Plumas</option>
		<option value="San Juan Bautista Lo de Soto">San Juan Bautista Lo de Soto</option>
		<option value="Santiago Ixcuintepec">Santiago Ixcuintepec</option>
		<option value="San Juan Bautista Suchitepec">San Juan Bautista Suchitepec</option>
		<option value="Santiago Ixtayutla">Santiago Ixtayutla</option>
		<option value="San Juan Bautista Tlacoatzintepec">San Juan Bautista Tlacoatzintepec</option>
		<option value="Santiago Jamiltepec">Santiago Jamiltepec</option>
		<option value="San Juan Bautista Tlachichilco">San Juan Bautista Tlachichilco</option>
		<option value="Santiago Jocotepec">Santiago Jocotepec</option>
		<option value="San Juan Bautista Tuxtepec">San Juan Bautista Tuxtepec</option>
		<option value="Santiago Juxtlahuaca">Santiago Juxtlahuaca</option>
		<option value="San Juan Cacahuatepec">San Juan Cacahuatepec</option>
		<option value="Santiago Lachiguiri">Santiago Lachiguiri</option>
		<option value="San Juan Cieneguilla">San Juan Cieneguilla</option>
		<option value="Santiago Lalopa">Santiago Lalopa</option>
		<option value="San Juan Coatzospam">San Juan Coatzospam</option>
		<option value="Santiago Laollaga">Santiago Laollaga</option>
		<option value="San Juan Colorado">San Juan Colorado</option>
		<option value="Santiago Laxopa">Santiago Laxopa</option>
		<option value="San Juan Comaltepec">San Juan Comaltepec</option>
		<option value="Santiago Llano Grande">Santiago Llano Grande</option>
		<option value="San Juan Cotzocón">San Juan Cotzocón</option>
		<option value="Santiago Matatlán">Santiago Matatlán</option>
		<option value="San Juan Chicomezúchil">San Juan Chicomezúchil</option>
		<option value="Santiago Miltepec">Santiago Miltepec</option>
		<option value="San Juan Chilateca">San Juan Chilateca</option>
		<option value="Santiago Minas">Santiago Minas</option>
		<option value="San Juan del Estado">San Juan del Estado</option>
		<option value="Santiago Nacaltepec">Santiago Nacaltepec</option>
		<option value="San Juan del Río">San Juan del Río</option>
		<option value="Santiago Nejapilla">Santiago Nejapilla</option>
		<option value="San Juan Diuxi">San Juan Diuxi</option>
		<option value="Santiago Nundiche">Santiago Nundiche</option>
		<option value="San Juan Evangelista Analco">San Juan Evangelista Analco</option>
		<option value="Santiago Nuyoó">Santiago Nuyoó</option>
		<option value="San Juan Guelavía">San Juan Guelavía</option>
		<option value="Santiago Pinotepa Nacional">Santiago Pinotepa Nacional</option>
		<option value="San Juan Guichicovi">San Juan Guichicovi</option>
		<option value="Santiago Suchilquitongo">Santiago Suchilquitongo</option>
		<option value="San Juan Ihualtepec">San Juan Ihualtepec</option>
		<option value="Santiago Tamazola">Santiago Tamazola</option>
		<option value="San Juan Juquila Mixes">San Juan Juquila Mixes</option>
		<option value="Santiago Tapextla">Santiago Tapextla</option>
		<option value="San Juan Juquila Vijanos">San Juan Juquila Vijanos</option>
		<option value="Villa Tejúpam de la Unión">Villa Tejúpam de la Unión</option>
		<option value="San Juan Lachao">San Juan Lachao</option>
		<option value="Santiago Tenango">Santiago Tenango</option>
		<option value="San Juan Lachigalla">San Juan Lachigalla</option>
		<option value="Santiago Tepetlapa">Santiago Tepetlapa</option>
		<option value="San Juan Lajarcia">San Juan Lajarcia</option>
		<option value="Santiago Tetepec">Santiago Tetepec</option>
		<option value="San Juan Lalana">San Juan Lalana</option>
		<option value="Santiago Texcalcingo">Santiago Texcalcingo</option>
		<option value="San Juan de los Cues">San Juan de los Cues</option>
		<option value="Santiago Textitlán">Santiago Textitlán</option>
		<option value="San Juan Mazatlán">San Juan Mazatlán</option>
		<option value="Santiago Tilantongo">Santiago Tilantongo</option>
		<option value="San Juan Mixtepec -Distrito 08">San Juan Mixtepec -Distrito 08</option>
		<option value="Santiago Tillo">Santiago Tillo</option>
		<option value="San Juan Mixtepec -Distrito 26">San Juan Mixtepec -Distrito 26</option>
		<option value="Santiago Tlazoyaltepec">Santiago Tlazoyaltepec</option>
		<option value="San Juan Ã‘umí">San Juan Ã‘umí</option>
		<option value="Santiago Xanica">Santiago Xanica</option>
		<option value="San Juan Ozolotepec">San Juan Ozolotepec</option>
		<option value="Santiago Xiacuí">Santiago Xiacuí</option>
		<option value="San Juan Petlapa">San Juan Petlapa</option>
		<option value="Santiago Yaitepec">Santiago Yaitepec</option>
		<option value="San Juan Quiahije">San Juan Quiahije</option>
		<option value="Santiago Yaveo">Santiago Yaveo</option>
		<option value="San Juan Quiotepec">San Juan Quiotepec</option>
		<option value="Santiago Yolomécatl">Santiago Yolomécatl</option>
		<option value="San Juan Sayultepec">San Juan Sayultepec</option>
		<option value="Santiago Yosondúa">Santiago Yosondúa</option>
		<option value="San Juan Tabaá">San Juan Tabaá</option>
		<option value="Santiago Yucuyachi">Santiago Yucuyachi</option>
		<option value="San Juan Tamazola">San Juan Tamazola</option>
		<option value="Santiago Zacatepec">Santiago Zacatepec</option>
		<option value="San Juan Teita">San Juan Teita</option>
		<option value="Santiago Zoochila">Santiago Zoochila</option>
		<option value="San Juan Teitipac">San Juan Teitipac</option>
		<option value="Nuevo Zoquiapam">Nuevo Zoquiapam</option>
		<option value="San Juan Tepeuxila">San Juan Tepeuxila</option>
		<option value="Santo Domingo Ingenio">Santo Domingo Ingenio</option>
		<option value="San Juan Teposcolula">San Juan Teposcolula</option>
		<option value="Santo Domingo Albarradas">Santo Domingo Albarradas</option>
		<option value="San Juan Yaeé">San Juan Yaeé</option>
		<option value="Santo Domingo Armenta">Santo Domingo Armenta</option>
		<option value="San Juan Yatzona">San Juan Yatzona</option>
		<option value="Santo Domingo Chihuitán">Santo Domingo Chihuitán</option>
		<option value="San Juan Yucuita">San Juan Yucuita</option>
		<option value="Santo Domingo de Morelos">Santo Domingo de Morelos</option>
		<option value="San Lorenzo">San Lorenzo</option>
		<option value="Santo Domingo Ixcatlán">Santo Domingo Ixcatlán</option>
		<option value="San Lorenzo Albarradas">San Lorenzo Albarradas</option>
		<option value="Santo Domingo Nuxaá">Santo Domingo Nuxaá</option>
		<option value="San Lorenzo Cacaotepec">San Lorenzo Cacaotepec</option>
		<option value="Santo Domingo Ozolotepec">Santo Domingo Ozolotepec</option>
		<option value="San Lorenzo Cuaunecuiltitla">San Lorenzo Cuaunecuiltitla</option>
		<option value="Santo Domingo Petapa">Santo Domingo Petapa</option>
		<option value="San Lorenzo Texmelucan">San Lorenzo Texmelucan</option>
		<option value="Santo Domingo Roayaga">Santo Domingo Roayaga</option>
		<option value="San Lorenzo Victoria">San Lorenzo Victoria</option>
		<option value="Santo Domingo Tehuantepec">Santo Domingo Tehuantepec</option>
		<option value="San Lucas Camotlán">San Lucas Camotlán</option>
		<option value="Santo Domingo Teojomulco">Santo Domingo Teojomulco</option>
		<option value="San Lucas Ojitlán">San Lucas Ojitlán</option>
		<option value="Santo Domingo Tepuxtepec">Santo Domingo Tepuxtepec</option>
		<option value="San Lucas Quiaviní">San Lucas Quiaviní</option>
		<option value="Santo Domingo Tlatayapam">Santo Domingo Tlatayapam</option>
		<option value="San Lucas Zoquiapam">San Lucas Zoquiapam</option>
		<option value="Santo Domingo Tomaltepec">Santo Domingo Tomaltepec</option>
		<option value="San Luis Amatlán">San Luis Amatlán</option>
		<option value="Santo Domingo Tonalá">Santo Domingo Tonalá</option>
		<option value="San Marcial Ozolotepec">San Marcial Ozolotepec</option>
		<option value="Santo Domingo Tonaltepec">Santo Domingo Tonaltepec</option>
		<option value="San Marcos Arteaga">San Marcos Arteaga</option>
		<option value="Santo Domingo Xagacía">Santo Domingo Xagacía</option>
		<option value="San Martín de los Cansecos">San Martín de los Cansecos</option>
		<option value="Santo Domingo Yanhuitlán">Santo Domingo Yanhuitlán</option>
		<option value="San Martín Huamelulpam">San Martín Huamelulpam</option>
		<option value="Santo Domingo Yodohino">Santo Domingo Yodohino</option>
		<option value="San Martín Itunyoso">San Martín Itunyoso</option>
		<option value="Santo Domingo Zanatepec">Santo Domingo Zanatepec</option>
		<option value="San Martín Lachilá">San Martín Lachilá</option>
		<option value="Santos Reyes Nopala">Santos Reyes Nopala</option>
		<option value="San Martín Peras">San Martín Peras</option>
		<option value="Santos Reyes Pápalo">Santos Reyes Pápalo</option>
		<option value="San Martín Tilcajete">San Martín Tilcajete</option>
		<option value="Santos Reyes Tepejillo">Santos Reyes Tepejillo</option>
		<option value="San Martín Toxpalan">San Martín Toxpalan</option>
		<option value="Santos Reyes Yucuná">Santos Reyes Yucuná</option>
		<option value="San Martín Zacatepec">San Martín Zacatepec</option>
		<option value="Santo Tomás Jalieza">Santo Tomás Jalieza</option>
		<option value="San Mateo Cajonos">San Mateo Cajonos</option>
		<option value="Santo Tomás Mazaltepec">Santo Tomás Mazaltepec</option>
		<option value="Capulálpam de Méndez">Capulálpam de Méndez</option>
		<option value="Santo Tomás Ocotepec">Santo Tomás Ocotepec</option>
		<option value="San Mateo del Mar">San Mateo del Mar</option>
		<option value="Santo Tomás Tamazulapan">Santo Tomás Tamazulapan</option>
		<option value="San Mateo Yoloxochitlán">San Mateo Yoloxochitlán</option>
		<option value="San Vicente Coatlán">San Vicente Coatlán</option>
		<option value="San Mateo Etlatongo">San Mateo Etlatongo</option>
		<option value="San Vicente Lachixío">San Vicente Lachixío</option>
		<option value="San Mateo Nejapam">San Mateo Nejapam</option>
		<option value="San Vicente Nuñú">San Vicente Nuñú</option>
		<option value="San Mateo Peñasco">San Mateo Peñasco</option>
		<option value="Silacayoapam">Silacayoapam</option>
		<option value="San Mateo Piñas">San Mateo Piñas</option>
		<option value="Sitio de Xitlapehua">Sitio de Xitlapehua</option>
		<option value="San Mateo Río Hondo">San Mateo Río Hondo</option>
		<option value="Soledad Etla">Soledad Etla</option>
		<option value="San Mateo Sindihui">San Mateo Sindihui</option>
		<option value="Villa de Tamazulapam del Progreso">Villa de Tamazulapam del Progreso</option>
		<option value="San Mateo Tlapiltepec">San Mateo Tlapiltepec</option>
		<option value="Tanetze de Zaragoza">Tanetze de Zaragoza</option>
		<option value="San Melchor Betaza">San Melchor Betaza</option>
		<option value="Taniche">Taniche</option>
		<option value="San Miguel Achiutla">San Miguel Achiutla</option>
		<option value="Tataltepec de Valdés">Tataltepec de Valdés</option>
		<option value="San Miguel Ahuehuetitlán">San Miguel Ahuehuetitlán</option>
		<option value="Teococuilco de Marcos Pérez">Teococuilco de Marcos Pérez</option>
		<option value="San Miguel Aloápam">San Miguel Aloápam</option>
		<option value="Teotitlán de Flores Magón">Teotitlán de Flores Magón</option>
		<option value="San Miguel Amatitlán">San Miguel Amatitlán</option>
		<option value="Teotitlán del Valle">Teotitlán del Valle</option>
		<option value="San Miguel Amatlán">San Miguel Amatlán</option>
		<option value="Teotongo">Teotongo</option>
		<option value="San Miguel Coatlán">San Miguel Coatlán</option>
		<option value="Tepelmeme Villa de Morelos">Tepelmeme Villa de Morelos</option>
		<option value="San Miguel Chicahua">San Miguel Chicahua</option>
		<option value="Tezoatlán de Segura y Luna">Tezoatlán de Segura y Luna</option>
		<option value="San Miguel Chimalapa">San Miguel Chimalapa</option>
		<option value="San Jerónimo Tlacochahuaya">San Jerónimo Tlacochahuaya</option>
		<option value="San Miguel del Puerto">San Miguel del Puerto</option>
		<option value="Tlacolula de Matamoros">Tlacolula de Matamoros</option>
		<option value="San Miguel del Río">San Miguel del Río</option>
		<option value="Tlacotepec Plumas">Tlacotepec Plumas</option>
		<option value="San Miguel Ejutla">San Miguel Ejutla</option>
		<option value="Tlalixtac de Cabrera">Tlalixtac de Cabrera</option>
		<option value="San Miguel el Grande">San Miguel el Grande</option>
		<option value="Totontepec Villa de Morelos">Totontepec Villa de Morelos</option>
		<option value="San Miguel Huautla">San Miguel Huautla</option>
		<option value="Trinidad Zaachila">Trinidad Zaachila</option>
		<option value="San Miguel Mixtepec">San Miguel Mixtepec</option>
		<option value="La Trinidad Vista Hermosa">La Trinidad Vista Hermosa</option>
		<option value="San Miguel Panixtlahuaca">San Miguel Panixtlahuaca</option>
		<option value="Unión Hidalgo">Unión Hidalgo</option>
		<option value="San Miguel Peras">San Miguel Peras</option>
		<option value="Valerio Trujano">Valerio Trujano</option>
		<option value="San Miguel Piedras">San Miguel Piedras</option>
		<option value="San Juan Bautista Valle Nacional">San Juan Bautista Valle Nacional</option>
		<option value="San Miguel Quetzaltepec">San Miguel Quetzaltepec</option>
		<option value="Villa Díaz Ordaz">Villa Díaz Ordaz</option>
		<option value="San Miguel Santa Flor">San Miguel Santa Flor</option>
		<option value="Yaxe">Yaxe</option>
		<option value="Villa Sola de Vega">Villa Sola de Vega</option>
		<option value="Magdalena Yodocono de Porfirio Díaz">Magdalena Yodocono de Porfirio Díaz</option>
		<option value="San Miguel Soyaltepec">San Miguel Soyaltepec</option>
		<option value="Yogana">Yogana</option>
		<option value="San Miguel Suchixtepec">San Miguel Suchixtepec</option>
		<option value="Yutanduchi de Guerrero">Yutanduchi de Guerrero</option>
		<option value="Villa Talea de Castro">Villa Talea de Castro</option>
		<option value="Villa de Zaachila">Villa de Zaachila</option>
		<option value="San Miguel Tecomatlán">San Miguel Tecomatlán</option>
		<option value="Zapotitlán del Río">Zapotitlán del Río</option>
		<option value="San Miguel Tenango">San Miguel Tenango</option>
		<option value="Zapotitlán Lagunas">Zapotitlán Lagunas</option>
		<option value="San Miguel Tequixtepec">San Miguel Tequixtepec</option>
		<option value="Zapotitlán Palmas">Zapotitlán Palmas</option>
		<option value="San Miguel Tilquiapam">San Miguel Tilquiapam</option>
		<option value="Santa Inés de Zaragoza">Santa Inés de Zaragoza</option>
		<option value="San Miguel Tlacamama">San Miguel Tlacamama</option>
		<option value="Zimatlán de álvarez">Zimatlán de álvarez</option>';
	}

	function puebla(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Acajete">Acajete</option>
		<option value="Acateno">Acateno</option>
		<option value="Acatlán de Osorio">Acatlán de Osorio</option>
		<option value="Acatzingo">Acatzingo</option>
		<option value="Acteopan">Acteopan</option>
		<option value="Ahuacatlán">Ahuacatlán</option>
		<option value="Ahuatlán">Ahuatlán</option>
		<option value="Ahuazotepec">Ahuazotepec</option>
		<option value="Ahuehuetitla">Ahuehuetitla</option>
		<option value="Ajalpan">Ajalpan</option>
		<option value="Acaxtlahuacán de Albino Zertuche">Acaxtlahuacán de Albino Zertuche</option>
		<option value="Aljojuca">Aljojuca</option>
		<option value="Altepexi">Altepexi</option>
		<option value="Amixtlán">Amixtlán</option>
		<option value="Amozoc">Amozoc</option>
		<option value="Aquixtla">Aquixtla</option>
		<option value="Atempan">Atempan</option>
		<option value="Atexcal">Atexcal</option>
		<option value="Atlixco">Atlixco</option>
		<option value="Atoyatempan">Atoyatempan</option>
		<option value="Atzala">Atzala</option>
		<option value="Atzitzihuacán">Atzitzihuacán</option>
		<option value="Atzitzintla">Atzitzintla</option>
		<option value="Axutla">Axutla</option>
		<option value="Ayotoxco de Guerrero">Ayotoxco de Guerrero</option>
		<option value="Calpan">Calpan</option>
		<option value="Caltepec">Caltepec</option>
		<option value="Camocuautla">Camocuautla</option>
		<option value="Caxhuacán">Caxhuacán</option>
		<option value="Coatepec">Coatepec</option>
		<option value="Coatzingo">Coatzingo</option>
		<option value="Cohetzala">Cohetzala</option>
		<option value="Cohuecán">Cohuecán</option>
		<option value="Coronango">Coronango</option>
		<option value="Coxcatlán">Coxcatlán</option>
		<option value="Coyomeapan">Coyomeapan</option>
		<option value="Coyotepec">Coyotepec</option>
		<option value="Cuapiaxtla de Madero">Cuapiaxtla de Madero</option>
		<option value="Cuautempan">Cuautempan</option>
		<option value="Cuautinchán">Cuautinchán</option>
		<option value="Cuautlancingo">Cuautlancingo</option>
		<option value="Cuayuca de Andrade">Cuayuca de Andrade</option>
		<option value="Cuetzalan del Progreso">Cuetzalan del Progreso</option>
		<option value="Cuyoaco">Cuyoaco</option>
		<option value="Chalchicomula de Sesma">Chalchicomula de Sesma</option>
		<option value="Chapulco">Chapulco</option>
		<option value="Chiautla">Chiautla</option>
		<option value="Chiautzingo">Chiautzingo</option>
		<option value="Chiconcuautla">Chiconcuautla</option>
		<option value="Chichiquila">Chichiquila</option>
		<option value="Chietla">Chietla</option>
		<option value="Chigmecatitlán">Chigmecatitlán</option>
		<option value="Chignahuapan">Chignahuapan</option>
		<option value="Chignautla">Chignautla</option>
		<option value="Chila de las Flores">Chila de las Flores</option>
		<option value="Chila de la Sal">Chila de la Sal</option>
		<option value="Honey">Honey</option>
		<option value="Chilchotla">Chilchotla</option>
		<option value="Chinantla">Chinantla</option>
		<option value="Domingo Arenas">Domingo Arenas</option>
		<option value="Eloxochitlán">Eloxochitlán</option>
		<option value="Epatlán">Epatlán</option>
		<option value="Esperanza">Esperanza</option>
		<option value="Francisco Z. Mena">Francisco Z. Mena</option>
		<option value="General Felipe ángeles">General Felipe ángeles</option>
		<option value="Guadalupe">Guadalupe</option>
		<option value="Guadalupe Victoria">Guadalupe Victoria</option>
		<option value="Hermenegildo Galeana">Hermenegildo Galeana</option>
		<option value="Huaquechula">Huaquechula</option>
		<option value="Huatlatlauca">Huatlatlauca</option>
		<option value="Huauchinango">Huauchinango</option>
		<option value="Huehuetla">Huehuetla</option>
		<option value="Huehuetlán el Chico">Huehuetlán el Chico</option>
		<option value="Huejotzingo">Huejotzingo</option>
		<option value="Hueyapan">Hueyapan</option>
		<option value="Hueytamalco">Hueytamalco</option>
		<option value="Hueytlalpan">Hueytlalpan</option>
		<option value="Huitzilan de Serdán">Huitzilan de Serdán</option>
		<option value="Huitziltepec">Huitziltepec</option>
		<option value="Atlequizayan">Atlequizayan</option>
		<option value="Ixcamilpa de Guerrero">Ixcamilpa de Guerrero</option>
		<option value="Ixcaquixtla">Ixcaquixtla</option>
		<option value="Ixtacamaxtitlán">Ixtacamaxtitlán</option>
		<option value="Ixtepec">Ixtepec</option>
		<option value="Izúcar de Matamoros">Izúcar de Matamoros</option>
		<option value="Jalpan">Jalpan</option>
		<option value="Jolalpan">Jolalpan</option>
		<option value="Jonotla">Jonotla</option>
		<option value="Jopala">Jopala</option>
		<option value="Juan C. Bonilla">Juan C. Bonilla</option>
		<option value="Juan Galindo">Juan Galindo</option>
		<option value="Juan N. Méndez">Juan N. Méndez</option>
		<option value="Lafragua">Lafragua</option>
		<option value="Libres">Libres</option>
		<option value="La Magdalena Tlatlauquitepec">La Magdalena Tlatlauquitepec</option>
		<option value="Mazapiltepec de Juárez">Mazapiltepec de Juárez</option>
		<option value="Mixtla">Mixtla</option>
		<option value="Molcaxac">Molcaxac</option>
		<option value="Cañada Morelos">Cañada Morelos</option>
		<option value="Naupan">Naupan</option>
		<option value="Nauzontla">Nauzontla</option>
		<option value="Nealtican">Nealtican</option>
		<option value="Nicolás Bravo">Nicolás Bravo</option>
		<option value="Nopalucan">Nopalucan</option>
		<option value="Ocotepec">Ocotepec</option>
		<option value="Ocoyucan">Ocoyucan</option>
		<option value="Olintla">Olintla</option>
		<option value="Oriental">Oriental</option>
		<option value="Pahuatlán">Pahuatlán</option>
		<option value="Palmar de Bravo">Palmar de Bravo</option>
		<option value="Pantepec">Pantepec</option>
		<option value="Petlalcingo">Petlalcingo</option>
		<option value="Piaxtla">Piaxtla</option>
		<option value="Puebla">Puebla</option>
		<option value="Quecholac">Quecholac</option>
		<option value="Quimixtlán">Quimixtlán</option>
		<option value="Rafael Lara Grajales">Rafael Lara Grajales</option>
		<option value="Los Reyes de Juárez">Los Reyes de Juárez</option>
		<option value="San Andrés Cholula">San Andrés Cholula</option>
		<option value="San Antonio Cañada">San Antonio Cañada</option>
		<option value="San Diego La Mesa Tochimiltzingo">San Diego La Mesa Tochimiltzingo</option>
		<option value="San Felipe Teotlalcingo">San Felipe Teotlalcingo</option>
		<option value="San Felipe Tepatlán">San Felipe Tepatlán</option>
		<option value="San Gabriel Chilac">San Gabriel Chilac</option>
		<option value="San Gregorio Atzompa">San Gregorio Atzompa</option>
		<option value="San Jerónimo Tecuanipan">San Jerónimo Tecuanipan</option>
		<option value="San Jerónimo Xayacatlán">San Jerónimo Xayacatlán</option>
		<option value="San José Chiapa">San José Chiapa</option>
		<option value="San José Miahuatlán">San José Miahuatlán</option>
		<option value="San Juan Atenco">San Juan Atenco</option>
		<option value="San Juan Atzompa">San Juan Atzompa</option>
		<option value="San Martín Texmelucan">San Martín Texmelucan</option>
		<option value="San Martín Totoltepec">San Martín Totoltepec</option>
		<option value="San Matías Tlalancaleca">San Matías Tlalancaleca</option>
		<option value="San Miguel Ixitlán">San Miguel Ixitlán</option>
		<option value="San Miguel Xoxtla">San Miguel Xoxtla</option>
		<option value="San Nicolás Buenos Aires">San Nicolás Buenos Aires</option>
		<option value="San Nicolás de los Ranchos">San Nicolás de los Ranchos</option>
		<option value="San Pablo Anicano">San Pablo Anicano</option>
		<option value="San Pedro Cholula">San Pedro Cholula</option>
		<option value="San Pedro Yeloixtlahuaca">San Pedro Yeloixtlahuaca</option>
		<option value="San Salvador el Seco">San Salvador el Seco</option>
		<option value="San Salvador el Verde">San Salvador el Verde</option>
		<option value="San Salvador Huixcolotla">San Salvador Huixcolotla</option>
		<option value="San Sebastián Tlacotepec">San Sebastián Tlacotepec</option>
		<option value="Santa Catarina Tlaltempan">Santa Catarina Tlaltempan</option>
		<option value="Santa Inés Ahuatempan">Santa Inés Ahuatempan</option>
		<option value="Santa Isabel Cholula">Santa Isabel Cholula</option>
		<option value="Santiago Miahuatlán">Santiago Miahuatlán</option>
		<option value="Huehuetlán el Grande">Huehuetlán el Grande</option>
		<option value="Santo Tomás Hueyotlipan">Santo Tomás Hueyotlipan</option>
		<option value="Soltepec">Soltepec</option>
		<option value="Tecali de Herrera">Tecali de Herrera</option>
		<option value="Tecamachalco">Tecamachalco</option>
		<option value="Tecomatlán">Tecomatlán</option>
		<option value="Tehuacán">Tehuacán</option>
		<option value="Tehuitzingo">Tehuitzingo</option>
		<option value="Tenampulco">Tenampulco</option>
		<option value="Teopantlán">Teopantlán</option>
		<option value="Teotlalco">Teotlalco</option>
		<option value="Tepanco de López">Tepanco de López</option>
		<option value="Tepango de Rodríguez">Tepango de Rodríguez</option>
		<option value="Tepatlaxco de Hidalgo">Tepatlaxco de Hidalgo</option>
		<option value="Tepeaca">Tepeaca</option>
		<option value="Tepemaxalco">Tepemaxalco</option>
		<option value="Tepeojuma">Tepeojuma</option>
		<option value="Tepetzintla">Tepetzintla</option>
		<option value="Tepexco">Tepexco</option>
		<option value="Tepexi de Rodríguez">Tepexi de Rodríguez</option>
		<option value="Tepeyahualco">Tepeyahualco</option>
		<option value="Tepeyahualco de Cuauhtémoc">Tepeyahualco de Cuauhtémoc</option>
		<option value="Tetela de Ocampo">Tetela de Ocampo</option>
		<option value="Teteles de ávila Castillo">Teteles de ávila Castillo</option>
		<option value="Teziutlán">Teziutlán</option>
		<option value="Tianguismanalco">Tianguismanalco</option>
		<option value="Tilapa">Tilapa</option>
		<option value="Tlachichuca">Tlachichuca</option>
		<option value="Tlacotepec de Benito Juárez">Tlacotepec de Benito Juárez</option>
		<option value="Tlacuilotepec">Tlacuilotepec</option>
		<option value="Tlahuapan">Tlahuapan</option>
		<option value="Tlaltenango">Tlaltenango</option>
		<option value="Tlanepantla">Tlanepantla</option>
		<option value="Tlaola">Tlaola</option>
		<option value="Tlapacoya">Tlapacoya</option>
		<option value="Tlapanalá">Tlapanalá</option>
		<option value="Tlatlauquitepec">Tlatlauquitepec</option>
		<option value="Tlaxco">Tlaxco</option>
		<option value="Tochimilco">Tochimilco</option>
		<option value="Tochtepec">Tochtepec</option>
		<option value="Totoltepec de Guerrero">Totoltepec de Guerrero</option>
		<option value="Tulcingo">Tulcingo</option>
		<option value="Tuzamapan de Galeana">Tuzamapan de Galeana</option>
		<option value="Tzicatlacoyan">Tzicatlacoyan</option>
		<option value="Venustiano Carranza">Venustiano Carranza</option>
		<option value="Vicente Guerrero">Vicente Guerrero</option>
		<option value="Xayacatlán de Bravo">Xayacatlán de Bravo</option>
		<option value="Xicotepec">Xicotepec</option>
		<option value="Xicotlán">Xicotlán</option>
		<option value="Xiutetelco">Xiutetelco</option>
		<option value="Xochiapulco">Xochiapulco</option>
		<option value="Xochiltepec">Xochiltepec</option>
		<option value="Xochitlán de Vicente Suárez">Xochitlán de Vicente Suárez</option>
		<option value="Xochitlán Todos Santos">Xochitlán Todos Santos</option>
		<option value="Yaonáhuac">Yaonáhuac</option>
		<option value="Yehualtepec">Yehualtepec</option>
		<option value="Zacapala">Zacapala</option>
		<option value="Zacapoaxtla">Zacapoaxtla</option>
		<option value="Zacatlán">Zacatlán</option>
		<option value="Zapotitlán">Zapotitlán</option>
		<option value="Zapotitlán de Méndez">Zapotitlán de Méndez</option>
		<option value="Zaragoza">Zaragoza</option>
		<option value="Zautla">Zautla</option>
		<option value="Zihuateutla">Zihuateutla</option>
		<option value="Zinacatepec">Zinacatepec</option>
		<option value="Zongozotla">Zongozotla</option>
		<option value="Zoquiapan">Zoquiapan</option>
		<option value="Zoquitlán">Zoquitlán</option>';
	}

	function queretaro(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Amealco de Bonfil">Amealco de Bonfil</option>
		<option value="Pinal de Amoles">Pinal de Amoles</option>
		<option value="Arroyo Seco">Arroyo Seco</option>
		<option value="Cadereyta de Montes">Cadereyta de Montes</option>
		<option value="Colón">Colón</option>
		<option value="Corregidora">Corregidora</option>
		<option value="Ezequiel Montes">Ezequiel Montes</option>
		<option value="Huimilpan">Huimilpan</option>
		<option value="Jalpan de Serra">Jalpan de Serra</option>
		<option value="Landa de Matamoros">Landa de Matamoros</option>
		<option value="El Marqués">El Marqués</option>
		<option value="Pedro Escobedo">Pedro Escobedo</option>
		<option value="Peñamiller">Peñamiller</option>
		<option value="Querétaro">Querétaro</option>
		<option value="San Joaquín">San Joaquín</option>
		<option value="San Juan del Río">San Juan del Río</option>
		<option value="Tequisquiapan">Tequisquiapan</option>
		<option value="Tolimán">Tolimán</option>';
	}

	function quintana_roo(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Cozumel">Cozumel</option>
		<option value="José María Morelos">José María Morelos</option>
		<option value="Felipe Carrillo Puerto">Felipe Carrillo Puerto</option>
		<option value="Lázaro Cárdenas">Lázaro Cárdenas</option>
		<option value="Isla Mujeres">Isla Mujeres</option>
		<option value="Solidaridad">Solidaridad</option>
		<option value="Othón P. Blanco">Othón P. Blanco</option>
		<option value="Tulum">Tulum</option>
		<option value="Benito Juárez">Benito Juárez</option>
		<option value="Bacalar">Bacalar</option>';
	}

	function san_luis_potosi(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Ahualulco">Ahualulco</option>
		<option value="Alaquines">Alaquines</option>
		<option value="Aquismón">Aquismón</option>
		<option value="Armadillo de los Infante">Armadillo de los Infante</option>
		<option value="Cárdenas">Cárdenas</option>
		<option value="Catorce">Catorce</option>
		<option value="Cedral">Cedral</option>
		<option value="Cerritos">Cerritos</option>
		<option value="Cerro de San Pedro">Cerro de San Pedro</option>
		<option value="Ciudad del Maíz">Ciudad del Maíz</option>
		<option value="Ciudad Fernández">Ciudad Fernández</option>
		<option value="Tancanhuitz">Tancanhuitz</option>
		<option value="Ciudad Valles">Ciudad Valles</option>
		<option value="Coxcatlán">Coxcatlán</option>
		<option value="Charcas">Charcas</option>
		<option value="Ã‰bano">Ã‰bano</option>
		<option value="Guadalcázar">Guadalcázar</option>
		<option value="Huehuetlán">Huehuetlán</option>
		<option value="Lagunillas">Lagunillas</option>
		<option value="Matehuala">Matehuala</option>
		<option value="Mexquitic de Carmona">Mexquitic de Carmona</option>
		<option value="Moctezuma">Moctezuma</option>
		<option value="Rayón">Rayón</option>
		<option value="Rioverde">Rioverde</option>
		<option value="Salinas">Salinas</option>
		<option value="San Antonio">San Antonio</option>
		<option value="San Ciro de Acosta">San Ciro de Acosta</option>
		<option value="San Luis Potosí">San Luis Potosí</option>
		<option value="San Martín Chalchicuautla">San Martín Chalchicuautla</option>
		<option value="San Nicolás Tolentino">San Nicolás Tolentino</option>
		<option value="Santa Catarina">Santa Catarina</option>
		<option value="Santa María del Río">Santa María del Río</option>
		<option value="Santo Domingo">Santo Domingo</option>
		<option value="San Vicente Tancuayalab">San Vicente Tancuayalab</option>
		<option value="Soledad de Graciano Sánchez">Soledad de Graciano Sánchez</option>
		<option value="Tamasopo">Tamasopo</option>
		<option value="Tamazunchale">Tamazunchale</option>
		<option value="Tampacán">Tampacán</option>
		<option value="Tampamolón Corona">Tampamolón Corona</option>
		<option value="Tamuín">Tamuín</option>
		<option value="Tanlajás">Tanlajás</option>
		<option value="Tanquián de Escobedo">Tanquián de Escobedo</option>
		<option value="Tierra Nueva">Tierra Nueva</option>
		<option value="Vanegas">Vanegas</option>
		<option value="Venado">Venado</option>
		<option value="Villa de Arriaga">Villa de Arriaga</option>
		<option value="Villa de Guadalupe">Villa de Guadalupe</option>
		<option value="Villa de la Paz">Villa de la Paz</option>
		<option value="Villa de Ramos">Villa de Ramos</option>
		<option value="Villa de Reyes">Villa de Reyes</option>
		<option value="Villa Hidalgo">Villa Hidalgo</option>
		<option value="Villa Juárez">Villa Juárez</option>
		<option value="Axtla de Terrazas">Axtla de Terrazas</option>
		<option value="Xilitla">Xilitla</option>
		<option value="Zaragoza">Zaragoza</option>
		<option value="Villa de Arista">Villa de Arista</option>
		<option value="Matlapa">Matlapa</option>
		<option value="El Naranjo">El Naranjo</option>';
	}

	function sinaloa(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Ahome">Ahome</option>
		<option value="El Fuerte">El Fuerte</option>
		<option value="Angostura">Angostura</option>
		<option value="Guasave">Guasave</option>
		<option value="Badiraguato">Badiraguato</option>
		<option value="Mazatlán">Mazatlán</option>
		<option value="Concordia">Concordia</option>
		<option value="Mocorito">Mocorito</option>
		<option value="Cosalá">Cosalá</option>
		<option value="Rosario">Rosario</option>
		<option value="Culiacán">Culiacán</option>
		<option value="Salvador Alvarado">Salvador Alvarado</option>
		<option value="Choix">Choix</option>
		<option value="San Ignacio">San Ignacio</option>
		<option value="Elota">Elota</option>
		<option value="Sinaloa">Sinaloa</option>
		<option value="Escuinapa">Escuinapa</option>
		<option value="Navolato">Navolato</option>';
	}

	function sonora(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value"Aconchi">Aconchi</option>
		<option value"Agua Prieta">Agua Prieta</option>
		<option value"álamos">álamos</option>
		<option value"Altar">Altar</option>
		<option value"Arivechi">Arivechi</option>
		<option value"Arizpe">Arizpe</option>
		<option value"Atil">Atil</option>
		<option value"Bacadéhuachi">Bacadéhuachi</option>
		<option value"Bacanora">Bacanora</option>
		<option value"Bacerac">Bacerac</option>
		<option value"Bacoachi">Bacoachi</option>
		<option value"Bácum">Bácum</option>
		<option value"Banámichi">Banámichi</option>
		<option value"Baviácora">Baviácora</option>
		<option value"Bavispe">Bavispe</option>
		<option value"Benjamín Hill">Benjamín Hill</option>
		<option value"Caborca">Caborca</option>
		<option value"Cajeme">Cajeme</option>
		<option value"Cananea">Cananea</option>
		<option value"Carbó">Carbó</option>
		<option value"La Colorada">La Colorada</option>
		<option value"Cucurpe">Cucurpe</option>
		<option value"Cumpas">Cumpas</option>
		<option value"Divisaderos">Divisaderos</option>
		<option value"Empalme">Empalme</option>
		<option value"Etchojoa">Etchojoa</option>
		<option value"Fronteras">Fronteras</option>
		<option value"Granados">Granados</option>
		<option value"Guaymas">Guaymas</option>
		<option value"Hermosillo">Hermosillo</option>
		<option value"Huachinera">Huachinera</option>
		<option value"Huásabas">Huásabas</option>
		<option value"Huatabampo">Huatabampo</option>
		<option value"Huépac">Huépac</option>
		<option value"Imuris">Imuris</option>
		<option value"Magdalena">Magdalena</option>
		<option value"Mazatán">Mazatán</option>
		<option value"Moctezuma">Moctezuma</option>
		<option value"Naco">Naco</option>
		<option value"Nácori Chico">Nácori Chico</option>
		<option value"Nacozari de García">Nacozari de García</option>
		<option value"Navojoa">Navojoa</option>
		<option value"Nogales">Nogales</option>
		<option value"Onavas">Onavas</option>
		<option value"Opodepe">Opodepe</option>
		<option value"Oquitoa">Oquitoa</option>
		<option value"Pitiquito">Pitiquito</option>
		<option value"Puerto Peñasco">Puerto Peñasco</option>
		<option value"Quiriego">Quiriego</option>
		<option value"Rayón">Rayón</option>
		<option value"Rosario">Rosario</option>
		<option value"Sahuaripa">Sahuaripa</option>
		<option value"San Felipe de Jesús">San Felipe de Jesús</option>
		<option value"San Javier">San Javier</option>
		<option value"San Luis Río Colorado">San Luis Río Colorado</option>
		<option value"San Miguel de Horcasitas">San Miguel de Horcasitas</option>
		<option value"San Pedro de la Cueva">San Pedro de la Cueva</option>
		<option value"Santa Ana">Santa Ana</option>
		<option value"Santa Cruz">Santa Cruz</option>
		<option value"Sáric">Sáric</option>
		<option value"Soyopa">Soyopa</option>
		<option value"Suaqui Grande">Suaqui Grande</option>
		<option value"Tepache">Tepache</option>
		<option value"Trincheras">Trincheras</option>
		<option value"Tubutama">Tubutama</option>
		<option value"Ures">Ures</option>
		<option value"Villa Hidalgo">Villa Hidalgo</option>
		<option value"Villa Pesqueira">Villa Pesqueira</option>
		<option value"Yécora">Yécora</option>
		<option value"General Plutarco Elías Calles">General Plutarco Elías Calles</option>
		<option value"Benito Juárez">Benito Juárez</option>
		<option value"San Ignacio Río Muerto">San Ignacio Río Muerto</option>';
	}
	
	function tabasco(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Balancán">Balancán</option>
		<option value="Cárdenas">Cárdenas</option>
		<option value="Jalpa de Méndez">Jalpa de Méndez</option>
		<option value="Jonuta">Jonuta</option>
		<option value="Centla">Centla</option>
		<option value="Macuspana">Macuspana</option>
		<option value="Centro">Centro</option>
		<option value="Nacajuca">Nacajuca</option>
		<option value="Comalcalco">Comalcalco</option>
		<option value="Paraíso">Paraíso</option>
		<option value="Cunduacán">Cunduacán</option>
		<option value="Tacotalpa">Tacotalpa</option>
		<option value="Emiliano Zapata">Emiliano Zapata</option>
		<option value="Teapa">Teapa</option>
		<option value="Huimanguillo">Huimanguillo</option>
		<option value="Tenosique">Tenosique</option>
		<option value="Jalapa">Jalapa</option>';
	}

	function tamaulipas(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Abasolo">Abasolo</option>
		<option value="Aldama">Aldama</option>
		<option value="Altamira">Altamira</option>
		<option value="Antiguo Morelos">Antiguo Morelos</option>
		<option value="Burgos">Burgos</option>
		<option value="Bustamante">Bustamante</option>
		<option value="Camargo">Camargo</option>
		<option value="Casas">Casas</option>
		<option value="Ciudad Madero">Ciudad Madero</option>
		<option value="Cruillas">Cruillas</option>
		<option value="Gomez Farías">Gomez Farías</option>
		<option value="González">González</option>
		<option value="GÃ¼émez">GÃ¼émez</option>
		<option value="Guerrero">Guerrero</option>
		<option value="Gustavo Díaz Ordaz">Gustavo Díaz Ordaz</option>
		<option value="Hidalgo">Hidalgo</option>
		<option value="Jaumave">Jaumave</option>
		<option value="Jiménez">Jiménez</option>
		<option value="Llera">Llera</option>
		<option value="Mainero">Mainero</option>
		<option value="El Mante">El Mante</option>
		<option value="Matamoros">Matamoros</option>
		<option value="Méndez">Méndez</option>
		<option value="Mier">Mier</option>
		<option value="Miguel Alemán">Miguel Alemán</option>
		<option value="Miquihuana">Miquihuana</option>
		<option value="Nuevo Laredo">Nuevo Laredo</option>
		<option value="Nuevo Morelos">Nuevo Morelos</option>
		<option value="Ocampo">Ocampo</option>
		<option value="Padilla">Padilla</option>
		<option value="Palmillas">Palmillas</option>
		<option value="Reynosa">Reynosa</option>
		<option value="Río Bravo">Río Bravo</option>
		<option value="San Carlos">San Carlos</option>
		<option value="San Fernando">San Fernando</option>
		<option value="San Nicolás">San Nicolás</option>
		<option value="Soto la Marina">Soto la Marina</option>
		<option value="Tampico">Tampico</option>
		<option value="Tula">Tula</option>
		<option value="Valle Hermoso">Valle Hermoso</option>
		<option value="Victoria">Victoria</option>
		<option value="Villagrán">Villagrán</option>
		<option value="Xicoténcatl">Xicoténcatl</option>';
	}

	function tlaxcala(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Amaxac de Guerrero">Amaxac de Guerrero</option>
		<option value="Tetla de la Solidaridad">Tetla de la Solidaridad</option>
		<option value="Apetatitlán de Antonio Carvajal">Apetatitlán de Antonio Carvajal</option>
		<option value="Tetlatlahuca">Tetlatlahuca</option>
		<option value="Atlangatepec">Atlangatepec</option>
		<option value="Tlaxcala">Tlaxcala</option>
		<option value="Altzayanca">Altzayanca</option>
		<option value="Tlaxco">Tlaxco</option>
		<option value="Apizaco">Apizaco</option>
		<option value="Tocatlán">Tocatlán</option>
		<option value="Calpulalpan">Calpulalpan</option>
		<option value="Totolac">Totolac</option>
		<option value="El Carmen Tequexquitla">El Carmen Tequexquitla</option>
		<option value="Zitlaltepec de Trinidad Sánchez Santos">Zitlaltepec de Trinidad Sánchez Santos</option>
		<option value="Cuapiaxtla">Cuapiaxtla</option>
		<option value="Tzompantepec">Tzompantepec</option>
		<option value="Cuaxomulco">Cuaxomulco</option>
		<option value="Xalostoc">Xalostoc</option>
		<option value="Chiautempan">Chiautempan</option>
		<option value="Xaltocan">Xaltocan</option>
		<option value="Muñoz de Domingo Arenas">Muñoz de Domingo Arenas</option>
		<option value="Papalotla de Xicohténcatl">Papalotla de Xicohténcatl</option>
		<option value="Españita">Españita</option>
		<option value="Xicohtzinco">Xicohtzinco</option>
		<option value="Huamantla">Huamantla</option>
		<option value="Yauhquemecan">Yauhquemecan</option>
		<option value="Hueyotlipan">Hueyotlipan</option>
		<option value="Zacatelco">Zacatelco</option>
		<option value="Ixtacuixtla de Mariano Matamoros">Ixtacuixtla de Mariano Matamoros</option>
		<option value="Benito Juárez">Benito Juárez</option>
		<option value="Ixtenco">Ixtenco</option>
		<option value="Emiliano Zapata">Emiliano Zapata</option>
		<option value="Mazatecochco de José María Morelos">Mazatecochco de José María Morelos</option>
		<option value="Lázaro Cárdenas">Lázaro Cárdenas</option>
		<option value="Contla de Juan Cuamatzi">Contla de Juan Cuamatzi</option>
		<option value="La Magdalena Tlaltelulco">La Magdalena Tlaltelulco</option>
		<option value="Tepetitla de Lardizábal">Tepetitla de Lardizábal</option>
		<option value="San Damián Texoloc">San Damián Texoloc</option>
		<option value="Sanctórum de Lázaro Cárdenas">Sanctórum de Lázaro Cárdenas</option>
		<option value="San Francisco Tetlanohcan">San Francisco Tetlanohcan</option>
		<option value="Nanacamilpa de Mariano Arista">Nanacamilpa de Mariano Arista</option>
		<option value="San Jerónimo Zacualpan">San Jerónimo Zacualpan</option>
		<option value="Acuamanala de Miguel Hidalgo">Acuamanala de Miguel Hidalgo</option>
		<option value="San José Teacalco">San José Teacalco</option>
		<option value="Natívitas">Natívitas</option>
		<option value="San Juan Huactzingo">San Juan Huactzingo</option>
		<option value="Panotla">Panotla</option>
		<option value="San Lorenzo Axocomanitla">San Lorenzo Axocomanitla</option>
		<option value="San Pablo del Monte">San Pablo del Monte</option>
		<option value="San Lucas Tecopilco">San Lucas Tecopilco</option>
		<option value="Santa Cruz Tlaxcala">Santa Cruz Tlaxcala</option>
		<option value="Santa Ana Nopalucan">Santa Ana Nopalucan</option>
		<option value="Tenancingo">Tenancingo</option>
		<option value="Santa Apolonia Teacalco">Santa Apolonia Teacalco</option>
		<option value="Teolocholco">Teolocholco</option>
		<option value="Santa Catarina Ayometla">Santa Catarina Ayometla</option>
		<option value="Tepeyanco">Tepeyanco</option>
		<option value="Santa Cruz Quilehtla">Santa Cruz Quilehtla</option>
		<option value="Terrenate">Terrenate</option>
		<option value="Santa Isabel Xiloxoxtla">Santa Isabel Xiloxoxtla</option>';
	}

	function veracruz(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Acajete">Acajete</option>
		<option value="Las Minas">Las Minas</option>
		<option value="Acatlán">Acatlán</option>
		<option value="Minatitlán">Minatitlán</option>
		<option value="Acayucan">Acayucan</option>
		<option value="Misantla">Misantla</option>
		<option value="Actopan">Actopan</option>
		<option value="Mixtla de Altamirano">Mixtla de Altamirano</option>
		<option value="Acula">Acula</option>
		<option value="Moloacán">Moloacán</option>
		<option value="Acultzingo">Acultzingo</option>
		<option value="Naolinco">Naolinco</option>
		<option value="Camarón de Tejeda">Camarón de Tejeda</option>
		<option value="Naranjal">Naranjal</option>
		<option value="Alpatláhuac">Alpatláhuac</option>
		<option value="Nautla">Nautla</option>
		<option value="Alto Lucero de Gutiérrez Barrios">Alto Lucero de Gutiérrez Barrios</option>
		<option value="Nogales">Nogales</option>
		<option value="Altotonga">Altotonga</option>
		<option value="Oluta">Oluta</option>
		<option value="Alvarado">Alvarado</option>
		<option value="Omealca">Omealca</option>
		<option value="Amatitlán">Amatitlán</option>
		<option value="Orizaba">Orizaba</option>
		<option value="Naranjos Amatlán">Naranjos Amatlán</option>
		<option value="Otatitlán">Otatitlán</option>
		<option value="Amatlán de los Reyes">Amatlán de los Reyes</option>
		<option value="Oteapan">Oteapan</option>
		<option value="ángel R. Cabada">ángel R. Cabada</option>
		<option value="Ozuluama de Mascareñas">Ozuluama de Mascareñas</option>
		<option value="La Antigua">La Antigua</option>
		<option value="Pajapan">Pajapan</option>
		<option value="Apazapan">Apazapan</option>
		<option value="Pánuco">Pánuco</option>
		<option value="Aquila">Aquila</option>
		<option value="Papantla">Papantla</option>
		<option value="Astacinga">Astacinga</option>
		<option value="Paso del Macho">Paso del Macho</option>
		<option value="Atlahuilco">Atlahuilco</option>
		<option value="Paso de Ovejas">Paso de Ovejas</option>
		<option value="Atoyac">Atoyac</option>
		<option value="La Perla">La Perla</option>
		<option value="Atzacan">Atzacan</option>
		<option value="Perote">Perote</option>
		<option value="Atzalan">Atzalan</option>
		<option value="Platón Sánchez">Platón Sánchez</option>
		<option value="Tlaltetela">Tlaltetela</option>
		<option value="Playa Vicente">Playa Vicente</option>
		<option value="Ayahualulco">Ayahualulco</option>
		<option value="Poza Rica de Hidalgo">Poza Rica de Hidalgo</option>
		<option value="Banderilla">Banderilla</option>
		<option value="Las Vigas de Ramírez">Las Vigas de Ramírez</option>
		<option value="Benito Juárez">Benito Juárez</option>
		<option value="Pueblo Viejo">Pueblo Viejo</option>
		<option value="Boca del Río">Boca del Río</option>
		<option value="Puente Nacional">Puente Nacional</option>
		<option value="Calcahualco">Calcahualco</option>
		<option value="Rafael Delgado">Rafael Delgado</option>
		<option value="Camerino Z. Mendoza">Camerino Z. Mendoza</option>
		<option value="Rafael Lucio">Rafael Lucio</option>
		<option value="Carrillo Puerto">Carrillo Puerto</option>
		<option value="Los Reyes">Los Reyes</option>
		<option value="Catemaco">Catemaco</option>
		<option value="Río Blanco">Río Blanco</option>
		<option value="Cazones de Herrera">Cazones de Herrera</option>
		<option value="Saltabarranca">Saltabarranca</option>
		<option value="Cerro Azul">Cerro Azul</option>
		<option value="San Andrés Tenejapan">San Andrés Tenejapan</option>
		<option value="Citlaltépetl">Citlaltépetl</option>
		<option value="San Andrés Tuxtla">San Andrés Tuxtla</option>
		<option value="Coacoatzintla">Coacoatzintla</option>
		<option value="San Juan Evangelista">San Juan Evangelista</option>
		<option value="Coahuitlán">Coahuitlán</option>
		<option value="Santiago Tuxtla">Santiago Tuxtla</option>
		<option value="Coatepec">Coatepec</option>
		<option value="Sayula de Alemán">Sayula de Alemán</option>
		<option value="Coatzacoalcos">Coatzacoalcos</option>
		<option value="Soconusco">Soconusco</option>
		<option value="Coatzintla">Coatzintla</option>
		<option value="Sochiapa">Sochiapa</option>
		<option value="Coetzala">Coetzala</option>
		<option value="Soledad Atzompa">Soledad Atzompa</option>
		<option value="Colipa">Colipa</option>
		<option value="Soledad de Doblado">Soledad de Doblado</option>
		<option value="Comapa">Comapa</option>
		<option value="Soteapan">Soteapan</option>
		<option value="Córdoba">Córdoba</option>
		<option value="Tamalín">Tamalín</option>
		<option value="Cosamaloapan de Carpio">Cosamaloapan de Carpio</option>
		<option value="Tamiahua">Tamiahua</option>
		<option value="Cosautlán de Carvajal">Cosautlán de Carvajal</option>
		<option value="Tampico Alto">Tampico Alto</option>
		<option value="Coscomatepec">Coscomatepec</option>
		<option value="Tancoco">Tancoco</option>
		<option value="Cosoleacaque">Cosoleacaque</option>
		<option value="Tantima">Tantima</option>
		<option value="Cotaxtla">Cotaxtla</option>
		<option value="Tantoyuca">Tantoyuca</option>
		<option value="Coxquihui">Coxquihui</option>
		<option value="Tatatila">Tatatila</option>
		<option value="Coyutla">Coyutla</option>
		<option value="Castillo de Teayo">Castillo de Teayo</option>
		<option value="Cuichapa">Cuichapa</option>
		<option value="Tecolutla">Tecolutla</option>
		<option value="Cuitláhuac">Cuitláhuac</option>
		<option value="Tehuipango">Tehuipango</option>
		<option value="Chacaltianguis">Chacaltianguis</option>
		<option value="Temapache">Temapache</option>
		<option value="Chalma">Chalma</option>
		<option value="Tempoal">Tempoal</option>
		<option value="Chiconamel">Chiconamel</option>
		<option value="Tenampa">Tenampa</option>
		<option value="Chiconquiaco">Chiconquiaco</option>
		<option value="Tenochtitlán">Tenochtitlán</option>
		<option value="Chicontepec">Chicontepec</option>
		<option value="Teocelo">Teocelo</option>
		<option value="Chinameca">Chinameca</option>
		<option value="Tepatlaxco">Tepatlaxco</option>
		<option value="Chinampa de Gorostiza">Chinampa de Gorostiza</option>
		<option value="Tepetlán">Tepetlán</option>
		<option value="Las Choapas">Las Choapas</option>
		<option value="Tepetzintla">Tepetzintla</option>
		<option value="Chocamán">Chocamán</option>
		<option value="Tequila">Tequila</option>
		<option value="Chontla">Chontla</option>
		<option value="José Azueta">José Azueta</option>
		<option value="Chumatlán">Chumatlán</option>
		<option value="Texcatepec">Texcatepec</option>
		<option value="Emiliano Zapata">Emiliano Zapata</option>
		<option value="Texhuacán">Texhuacán</option>
		<option value="Espinal">Espinal</option>
		<option value="Texistepec">Texistepec</option>
		<option value="Filomeno Mata">Filomeno Mata</option>
		<option value="Tezonapa">Tezonapa</option>
		<option value="Fortín">Fortín</option>
		<option value="Tierra Blanca">Tierra Blanca</option>
		<option value="Gutiérrez Zamora">Gutiérrez Zamora</option>
		<option value="Tihuatlán">Tihuatlán</option>
		<option value="Hidalgotitlán">Hidalgotitlán</option>
		<option value="Tlacojalpan">Tlacojalpan</option>
		<option value="Huatusco">Huatusco</option>
		<option value="Tlacolulan">Tlacolulan</option>
		<option value="Huayacocotla">Huayacocotla</option>
		<option value="Tlacotalpan">Tlacotalpan</option>
		<option value="Hueyapan de Ocampo">Hueyapan de Ocampo</option>
		<option value="Tlacotepec de Mejía">Tlacotepec de Mejía</option>
		<option value="Huiloapan de Cuauhtémoc">Huiloapan de Cuauhtémoc</option>
		<option value="Tlachichilco">Tlachichilco</option>
		<option value="Ignacio de la Llave">Ignacio de la Llave</option>
		<option value="Tlalixcoyan">Tlalixcoyan</option>
		<option value="Ilamatlán">Ilamatlán</option>
		<option value="Tlalnelhuayocan">Tlalnelhuayocan</option>
		<option value="Isla">Isla</option>
		<option value="Tlapacoyan">Tlapacoyan</option>
		<option value="Ixcatepec">Ixcatepec</option>
		<option value="Tlaquilpa">Tlaquilpa</option>
		<option value="Ixhuacán de los Reyes">Ixhuacán de los Reyes</option>
		<option value="Tlilapan">Tlilapan</option>
		<option value="Ixhuatlán del Café">Ixhuatlán del Café</option>
		<option value="Tomatlán">Tomatlán</option>
		<option value="Ixhuatlancillo">Ixhuatlancillo</option>
		<option value="Tonayán">Tonayán</option>
		<option value="Ixhuatlán del Sureste">Ixhuatlán del Sureste</option>
		<option value="Totutla">Totutla</option>
		<option value="Ixhuatlán de Madero">Ixhuatlán de Madero</option>
		<option value="Túxpam">Túxpam</option>
		<option value="Ixmatlahuacan">Ixmatlahuacan</option>
		<option value="Tuxtilla">Tuxtilla</option>
		<option value="Ixtaczoquitlán">Ixtaczoquitlán</option>
		<option value="Ãšrsulo Galván">Ãšrsulo Galván</option>
		<option value="Jalacingo">Jalacingo</option>
		<option value="Vega de Alatorre">Vega de Alatorre</option>
		<option value="Xalapa">Xalapa</option>
		<option value="Veracruz">Veracruz</option>
		<option value="Jalcomulco">Jalcomulco</option>
		<option value="Villa Aldama">Villa Aldama</option>
		<option value="Jáltipan">Jáltipan</option>
		<option value="Xoxocotla">Xoxocotla</option>
		<option value="Jamapa">Jamapa</option>
		<option value="Yanga">Yanga</option>
		<option value="Jesús Carranza">Jesús Carranza</option>
		<option value="Yecuatla">Yecuatla</option>
		<option value="Xico">Xico</option>
		<option value="Zacualpan">Zacualpan</option>
		<option value="Jilotepec">Jilotepec</option>
		<option value="Zaragoza">Zaragoza</option>
		<option value="Juan Rodríguez Clara">Juan Rodríguez Clara</option>
		<option value="Zentla">Zentla</option>
		<option value="Juchique de Ferrer">Juchique de Ferrer</option>
		<option value="Zongolica">Zongolica</option>
		<option value="Landero y Coss">Landero y Coss</option>
		<option value="Zontecomatlán de López y Fuentes">Zontecomatlán de López y Fuentes</option>
		<option value="Lerdo de Tejada">Lerdo de Tejada</option>
		<option value="Zozocolco de Hidalgo">Zozocolco de Hidalgo</option>
		<option value="Magdalena">Magdalena</option>
		<option value="Agua Dulce">Agua Dulce</option>
		<option value="Maltrata">Maltrata</option>
		<option value="El Higo">El Higo</option>
		<option value="Manlio Fabio Altamirano">Manlio Fabio Altamirano</option>
		<option value="Nanchital de Lázaro Cárdenas del Río">Nanchital de Lázaro Cárdenas del Río</option>
		<option value="Mariano Escobedo">Mariano Escobedo</option>
		<option value="Tres Valles">Tres Valles</option>
		<option value="Martínez de la Torre">Martínez de la Torre</option>
		<option value="Carlos A. Carrillo">Carlos A. Carrillo</option>
		<option value="Mecatlán">Mecatlán</option>
		<option value="Tatahuicapan de Juárez">Tatahuicapan de Juárez</option>
		<option value="Mecayapan">Mecayapan</option>
		<option value="Uxpanapa">Uxpanapa</option>
		<option value="Medellín">Medellín</option>
		<option value="San Rafael">San Rafael</option>
		<option value="Miahuatlán">Miahuatlán</option>
		<option value="Santiago Sochiapan">Santiago Sochiapan</option>';
	}

	function yucatan(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Abalá">Abalá</option>
		<option value="Muxupip">Muxupip</option>
		<option value="Acanceh">Acanceh</option>
		<option value="Opichén">Opichén</option>
		<option value="Akil">Akil</option>
		<option value="Oxkutzcab">Oxkutzcab</option>
		<option value="Baca">Baca</option>
		<option value="Panabá">Panabá</option>
		<option value="Bokobá">Bokobá</option>
		<option value="Peto">Peto</option>
		<option value="Buctzotz">Buctzotz</option>
		<option value="Progreso">Progreso</option>
		<option value="Cacalchén">Cacalchén</option>
		<option value="Quintana Roo">Quintana Roo</option>
		<option value="Calotmul">Calotmul</option>
		<option value="Río Lagartos">Río Lagartos</option>
		<option value="Cansahcab">Cansahcab</option>
		<option value="Sacalum">Sacalum</option>
		<option value="Cantamayec">Cantamayec</option>
		<option value="Samahil">Samahil</option>
		<option value="Celestún">Celestún</option>
		<option value="Sanahcat">Sanahcat</option>
		<option value="Cenotillo">Cenotillo</option>
		<option value="San Felipe">San Felipe</option>
		<option value="Conkal">Conkal</option>
		<option value="Santa Elena">Santa Elena</option>
		<option value="Cuncunul">Cuncunul</option>
		<option value="Seyé">Seyé</option>
		<option value="Cuzamá">Cuzamá</option>
		<option value="Sinanché">Sinanché</option>
		<option value="Chacsinkín">Chacsinkín</option>
		<option value="Sotuta">Sotuta</option>
		<option value="Chankom">Chankom</option>
		<option value="Sucilá">Sucilá</option>
		<option value="Chapab">Chapab</option>
		<option value="Sudzal">Sudzal</option>
		<option value="Chemax">Chemax</option>
		<option value="Suma">Suma</option>
		<option value="Chicxulub Pueblo">Chicxulub Pueblo</option>
		<option value="Tahdziú">Tahdziú</option>
		<option value="Chichimilá">Chichimilá</option>
		<option value="Tahmek">Tahmek</option>
		<option value="Chikindzonot">Chikindzonot</option>
		<option value="Teabo">Teabo</option>
		<option value="Chocholá">Chocholá</option>
		<option value="Tecoh">Tecoh</option>
		<option value="Chumayel">Chumayel</option>
		<option value="Tekal de Venegas">Tekal de Venegas</option>
		<option value="Dzan">Dzan</option>
		<option value="Tekantó">Tekantó</option>
		<option value="Dzemul">Dzemul</option>
		<option value="Tekax">Tekax</option>
		<option value="Dzidzantún">Dzidzantún</option>
		<option value="Tekit">Tekit</option>
		<option value="Dzilam de Bravo">Dzilam de Bravo</option>
		<option value="Tekom">Tekom</option>
		<option value="Dzilam González">Dzilam González</option>
		<option value="Telchac Pueblo">Telchac Pueblo</option>
		<option value="Dzitás">Dzitás</option>
		<option value="Telchac Puerto">Telchac Puerto</option>
		<option value="Dzoncauich">Dzoncauich</option>
		<option value="Temax">Temax</option>
		<option value="Espita">Espita</option>
		<option value="Temozón">Temozón</option>
		<option value="Halachó">Halachó</option>
		<option value="Tepakán">Tepakán</option>
		<option value="Hocabá">Hocabá</option>
		<option value="Tetiz">Tetiz</option>
		<option value="Hoctún">Hoctún</option>
		<option value="Teya">Teya</option>
		<option value="Homún">Homún</option>
		<option value="Ticul">Ticul</option>
		<option value="Huhí">Huhí</option>
		<option value="Timucuy">Timucuy</option>
		<option value="Hunucmá">Hunucmá</option>
		<option value="Tinum">Tinum</option>
		<option value="Ixil">Ixil</option>
		<option value="Tixcacalcupul">Tixcacalcupul</option>
		<option value="Izamal">Izamal</option>
		<option value="Tixkokob">Tixkokob</option>
		<option value="Kanasín">Kanasín</option>
		<option value="Tixméhuac">Tixméhuac</option>
		<option value="Kantunil">Kantunil</option>
		<option value="Tixpéhual">Tixpéhual</option>
		<option value="Kaua">Kaua</option>
		<option value="Tizimín">Tizimín</option>
		<option value="Kinchil">Kinchil</option>
		<option value="Tunkás">Tunkás</option>
		<option value="Kopomá">Kopomá</option>
		<option value="Tzucacab">Tzucacab</option>
		<option value="Mama">Mama</option>
		<option value="Uayma">Uayma</option>
		<option value="Maní">Maní</option>
		<option value="Ucú">Ucú</option>
		<option value="Maxcanú">Maxcanú</option>
		<option value="Umán">Umán</option>
		<option value="Mayapán">Mayapán</option>
		<option value="Valladolid">Valladolid</option>
		<option value="Mérida">Mérida</option>
		<option value="Xocchel">Xocchel</option>
		<option value="Mocochá">Mocochá</option>
		<option value="Yaxcabá">Yaxcabá</option>
		<option value="Motul">Motul</option>
		<option value="Yaxkukul">Yaxkukul</option>
		<option value="Muna">Muna</option>
		<option value="Yobaín">Yobaín</option>';
	}

	function zacatecas(){
		echo '
		<option value="" disabled selected>Selecciona tu ciudad</option>
		<option value="Apozol">Apozol</option>
		<option value="Apulco">Apulco</option>
		<option value="Atolinga">Atolinga</option>
		<option value="Benito Juárez">Benito Juárez</option>
		<option value="Calera">Calera</option>
		<option value="Cañitas de Felipe Pescador">Cañitas de Felipe Pescador</option>
		<option value="Concepción del Oro">Concepción del Oro</option>
		<option value="Cuauhtémoc">Cuauhtémoc</option>
		<option value="Chalchihuites">Chalchihuites</option>
		<option value="Fresnillo">Fresnillo</option>
		<option value="Trinidad García de la Cadena">Trinidad García de la Cadena</option>
		<option value="Genaro Codina">Genaro Codina</option>
		<option value="General Enrique Estrada">General Enrique Estrada</option>
		<option value="General Francisco R. Murguía">General Francisco R. Murguía</option>
		<option value="El Plateado de Joaquín Amaro">El Plateado de Joaquín Amaro</option>
		<option value="General Pánfilo Natera">General Pánfilo Natera</option>
		<option value="Guadalupe">Guadalupe</option>
		<option value="Huanusco">Huanusco</option>
		<option value="Jalpa">Jalpa</option>
		<option value="Jerez">Jerez</option>
		<option value="Jiménez del Teul">Jiménez del Teul</option>
		<option value="Juan Aldama">Juan Aldama</option>
		<option value="Juchipila">Juchipila</option>
		<option value="Loreto">Loreto</option>
		<option value="Luis Moya">Luis Moya</option>
		<option value="Mazapil">Mazapil</option>
		<option value="Melchor Ocampo">Melchor Ocampo</option>
		<option value="Mezquital del Oro">Mezquital del Oro</option>
		<option value="Miguel Auza">Miguel Auza</option>
		<option value="Momax">Momax</option>
		<option value="Monte Escobedo">Monte Escobedo</option>
		<option value="Morelos">Morelos</option>
		<option value="Moyahua de Estrada">Moyahua de Estrada</option>
		<option value="Nochistlán de Mejía">Nochistlán de Mejía</option>
		<option value="Noria de ángeles">Noria de ángeles</option>
		<option value="Ojocaliente">Ojocaliente</option>
		<option value="Pánuco">Pánuco</option>
		<option value="Pinos">Pinos</option>
		<option value="Río Grande">Río Grande</option>
		<option value="Saín Alto">Saín Alto</option>
		<option value="El Salvador">El Salvador</option>
		<option value="Sombrerete">Sombrerete</option>
		<option value="Susticacán">Susticacán</option>
		<option value="Tabasco">Tabasco</option>
		<option value="Tepechitlán">Tepechitlán</option>
		<option value="Tepetongo">Tepetongo</option>
		<option value="Teul de González Ortega">Teul de González Ortega</option>
		<option value="Tlaltenango de Sánchez Román">Tlaltenango de Sánchez Román</option>
		<option value="Valparaíso">Valparaíso</option>
		<option value="Vetagrande">Vetagrande</option>
		<option value="Villa de Cos">Villa de Cos</option>
		<option value="Villa García">Villa García</option>
		<option value="Villa González Ortega">Villa González Ortega</option>
		<option value="Villa Hidalgo">Villa Hidalgo</option>
		<option value="Villanueva">Villanueva</option>
		<option value="Zacatecas">Zacatecas</option>
		<option value="Trancoso">Trancoso</option>
		<option value="Santa María de la Paz">Santa María de la Paz</option>';
	}
