<?php 
  include_once("../../private/conexion.php");
  include_once("../../helpers/few-words.php");
  include_once("../../helpers/number-letters.php");
  include_once("../../helpers/formats-date.php");
  include_once("../../helpers/identificador.php");
  include_once('../../helpers/get_decimales_total.php');
  include_once('../../helpers/session_check.php');

  if (!empty($_GET['id_cliente']) && !empty($_GET['id']))  {
    $id_cliente = $_GET['id_cliente'];
    $id         = $_GET['id'];

    if(!empty($_GET['fecha'])){
      $fecha = $_GET['fecha'];
      $fecha = fecha($fecha);
      $fecha_recibida = $_GET['fecha'];
    }else{
      $fecha = date("d-m-Y");
      $fecha = fecha($fecha);
      $fecha_recibida = "";
    }

    $hora = date('H:i');

    $rprospecto_details = $mysqli->query("SELECT * FROM prospecto WHERE id=$id_cliente");
    if ($rprospecto_details)
    {
      while($array = $rprospecto_details->fetch_object())
      {
        $nombre = $array->nombre;
        $apellidos = $array->apellidos;
        $telefono_oficina = $array->telefono_oficina;
        $email = $array->email;
        $estado_civil = $array->estado_civil;
        $estado = $array->estado;
        $ciudad = $array->ciudad;
        $colonia = $array->colonia;
        $calle = $array->calle;
        $no_exterior = $array->no_exterior;
        $ine = $array->ine;
        $rfc = $array->rfc;
        $curp = $array->curp;
        $date_register     = $array->date_register;
      }
    }

    $rget_operaciones_compraventa = $mysqli->query("SELECT * FROM operaciones_compraventa WHERE id=$id");
    if ($rget_operaciones_compraventa)
    {
      while($array = $rget_operaciones_compraventa->fetch_object())
      {
        $compraventa_id = $array->id;
        $compraventa_id_prospecto = $array->id_prospecto;
        $compraventa_vendedor = $array->vendedor;
        $compraventa_comprador = $array->comprador;
        $compraventa_monto = $array->monto;
        $compraventa_descripcion = $array->descripcion;
        $compraventa_date_register = $array->date_register;
      }
    }

    $nombre_archivo = uniqid() . "_" . $nombre . "-" . $apellidos;
?>
  <title>Contrato de compraventa - <?php echo $nombre; ?></title>
  <link rel="stylesheet" type="text/css" href="../../assets/css/contrato.css">
  <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css">
  <link rel="preconnect" href="https://fonts.googleapis.com"> 
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="../../favicon.ico">

  <body style="font-family:montserratregular;">
    <div class="body-pdf " #boby_pdf id="printableArea">
      <div class="header-pdf">      
        <div class="text-center" >
          <div style="margin-top: 10px; font-size: 15px;">
            <h2 style="font-family: montserratregular; font-weight: 300; text-align: text-center;">Contrato de compraventa</h2>
          </div> 
        </div>
      </div>

      <div class="main-pdf">
        <div class="nocolor-table">
          <div class="table-responsive" style="padding: 50px;">
            <h3><b>-----ESCRITURA PÚBLICA NÚMERO MIL SEISCIENTOS OCHENTA Y CUATRO----</b></h3>
            <b>---------------------------VOLUMEN VEINTITRÉS-----------------------</b>
            <p style="text-align: justify;">
              En la ciudad de Tacámbaro, Michoacán, siendo las <?php echo $hora; ?> doce horas del día <?php echo $fecha; ?>, YO, el suscrito Licenciado JESÚS SOLÓRZANO OCHOA, Notario Público Número 103 Ciento Tres en el Estado de Michoacán de Ocampo, en ejercicio y con residencia en esta ciudad de Tacámbaro, Michoacán, con Registro Federal de Contribuyentes SOOJ-681218NP4, HAGO CONSTAR: el CONTRATO DE COMPRAVENTA DE INMUEBLE EN UN 33.33% TREINTA Y TRES PUNTO TREINTA Y TRES POR CIENTO DE DERECHOS Y ACCIONES DE PROPIEDAD, que celebran y formalizan: De una parte como VENDEDORA, la señora ARMIDA GUTIÉRREZ HERRERA, representada por su apoderada jurídica la Licenciada MA. ANGÉLICA MARÍN GAMA, y por la otra parte como COMPRADOR el señor MARCO VINICIO GUTIÉRREZ HERRERA, el que sujetan al tenor de las siguientes cláusulas que se insertan, previos los siguientes:-----------------------
            </p>
            
            <b style="text-align: center">-------------------------A N T E C E D E N T E S----------------------</b>
            <p style="text-align: justify;">
              I.- ANTECEDENTE REGISTRAL Y ORIGEN DE ADQUISICIÓN.- Mediante instrumento privado número 7,668 siete mil seiscientos sesenta y ocho, de fecha 11 once de mayo del 2009 dos mil nueve, pasada ante la fe del Notario Público número 54 cincuenta y cuatro, con ejercicio y residencia en la ciudad de Morelia, misma que se encuentra inscrita en el Registro Público de Propiedad Raíz en el Estado BAJO EL NÚMERO 33 TREINTA Y TRES, DEL TOMO 9174 NUEVE MIL CIENTO SETENTA Y CUATRO, DEL LIBRO DE PROPIEDAD CORRESPONDIENTE AL DISTRITO DE MORELIA, que contiene el contrato de compraventa de inmueble que celebran de una parte como vendedora Silvia Vázquez Villegas, y de la otra parte en cuanto comprador J Jesús Gutiérrez Soto, quien compra para sí y para sus hijos Armida Gutiérrez Herrera y Marco Vinicio Gutiérrez Herrera como compradores, respecto del siguiente inmueble.-----------------------------------------------------
              Lote número 9 nueve, de la manzana 39 treinta y nueve, de la zona 1 uno, ubicado en la calle sin nombre del fraccionamiento Ejido de Sindurio, de la ciudad de Morelia, Michoacán, con una extensión superficial de 136.00 m2 ciento treinta y seis metros cuadrados y las siguientes medidas y linderos: al Noreste, 17.00 diecisiete metros, con el lote número 10 diez; al Sureste, 8.00 ocho metros, con la calle sin nombre; al Suroeste, 17.00 diecisiete metros, con lote número 8 ocho; al Noroeste, 8.00 ocho metros, con lote número 3 tres.-------------------------------
              II.- Expuesto lo anterior las partes que celebran este contrato de compraventa, otorgan las siguientes:------------------------------------
            </p>

            <b style="text-align: center">------------------------CLAUSULAS--------------------------</b>
            <p style="text-align: justify;">
              <b>PRIMERA.-</b> La señora ARMIDA GUTIÉRREZ HERRERA, VENDE, por conducto de su apoderada Jurídica la Licenciada MA. ANGÉLICA MARÍN GAMA, un porcentaje del 33.33% treinta y tres punto treinta y tres por ciento de sus DERECHOS Y ACCIONES de PROPIEDAD, en favor del señor MARCO VINICIO GUTIÉRREZ HERRERA, quien COMPRA PARA SI, el coeficiente porcentual señalado de los DERECHOS Y ACCIONES DE PROPIEDAD, del inmueble descrito en el Antecedente Registral I de este instrumento, con la superficie, medidas y colindancias que se especifican en él, las cuales se tienen por reproducidas en esta cláusula como si se insertarán a la letra para todos los efectos legales procedentes.-----------------------------------------
            </p>

            <p style="text-align: justify;">
              <b>SEGUNDA.-</b> El precio de esta compraventa es por la cantidad de $50,000.00 (Cincuenta Mil Pesos 00/100 Moneda Nacional), los cuales declara la apoderada de la vendedora haber recibido su representada del comprador con anterioridad a este acto y a su entera satisfacción.----------------
            </p>

            <p style="text-align: justify;">
              <b>TERCERA.-</b> En virtud de esta enajenación, el inmueble deslindado en el Antecedente Registral Único y al que se refiere la Cláusula Primera de este contrato, pasa a poder de la parte compradora y dueño en un 100% cien por ciento de la propiedad, recibiendo ésta en pleno dominio, propiedad y posesión, con todas sus entradas y salidas, usos, costumbres, servidumbres activas y pasivas, y con todo cuanto de hecho y por derecho le toca y corresponde, al corriente en el pago de contribuciones prediales.-----------------------------------------------
            </p>

            <p style="text-align: justify;">
              <b>CUARTA.-</b> Los contratantes declaran que en esta operación de compraventa, no existe lesión, dolo o error y, a mayor abundamiento, renuncian expresamente al derecho de pedir su nulidad o rescisión que pudieran fundar en los artículos mil trescientos noventa y tres, mil trescientos noventa y cinco, mil cuatrocientos uno y demás relativos del Código Civil vigente en el Estado.---------------------------------------------
            </p>

            <p style="text-align: justify;">
              <b>QUINTA.-</b> La parte vendedora manifiesta, bajo protesta de decir verdad, que el inmueble materia de ésta compraventa y por ende los derechos y acciones de propiedad que transmite, se encuentran libres de todo gravamen, con lo que está de acuerdo la parte compradora, liberando ambas partes al suscrito notario de cualquier responsabilidad al respecto.---------------------------------------------------------------
            </p>

            <p style="text-align: justify;">
              <b>SEXTA.-</b> La vendedora queda obligada a responder del saneamiento para el caso de evicción de la presente operación, en forma y con arreglo a la ley.--------------------------------------------------------------------
            </p>

            <p style="text-align: justify;">
              <b>SÉPTIMA.-</b> Los gastos de escrituración hasta su inscripción en el Registro Público de la Propiedad Raíz en el Estado, serán cubiertos por la parte compradora.----------------------------------------------------
            </p>

            <b>---------------------------PERSONALIDAD---------------------------</b>
            <p style="text-align: justify;">
              Tacámbaro, Michoacán, Jueves 08 ocho de Febrero de 2018 dos mil dieciocho. LICENCIADA MA ANGÉLICA MARÍN GAMA. P R E S E N T E.- En los términos de los Artículos 1714 MIL SETECIENTOS CATORCE y 1715 MIL SETECIENTOS QUINCE del Código Civil para el Estado de Michoacán y sus concordantes de los Códigos Civiles de las demás Entidades Federativas y de la Ciudad de México, en materia común, y de los Artículos 2553 DOS MIL QUINIENTOS CINCUENTA Y TRES y 2554 DOS MIL QUINIENTOS CINCUENTA Y CUATRO del Código Civil Federal, aplicable en toda la República Mexicana en materia federal, con todas las facultades generales y aún las especiales que requieran cláusula especial conforme a la ley, la suscrita ARMIDA GUTIÉRREZ HERRERA, por mi propio derecho y en cuanto albacea testamentaria dentro de la sucesión a bienes de J. JESÚS GUTIÉRREZ SOTO, te confiero PODER GENERAL PARA PLEITOS, COBRANZAS Y LIMITADO PARA ACTOS DE ADMINISTRACIÓN Y DOMINIO, con todas las facultades generales y aún las especiales para cuyo ejercicio se requiera cláusula especial conforme a la Ley, con toda la amplitud que establece el Artículo dos mil quinientos cincuenta y cuatro del Código Civil Federal, y sus correlativos en los demás Estados de la República Mexicana, para que obre bajo mis órdenes, respondiendo de los actas que ejecute, facultándole para transigir, comprometer en árbitros, articular y absolver posiciones y para desistirte de cualquier acción o recurso aún del juicio de amparo, así como para recusar y recibir pagos a fin de que la apoderada pueda celebrar o hacer celebrar, ejecutar o hacer ejecutar toda clase de hechos, actos, convenios, contratos, suscribir toda clase de documentos privados e instrumentos públicos con facultades administrativas. En consecuencia de éste mandato que le otorgo, me podrá representar ante particulares y toda clase de autoridades, oficinas administrativas, funcionarios federales, locales o municipales, ante las Juntas de Conciliación y Arbitraje, Sindicatos, Uniones y en general ante toda clase de autoridades o corporaciones creadas o reconocidas por la Ley Federal de Trabajo, y ante cualquier tribunal, sea de carácter Federal o Local, Civil, Penal o Fiscal. CLAUSULA ESPECIAL: La faculto de forma limitada y exclusiva para que a mi nombre y representación; en lo personal y en cuanto albacea testamentaria dentro del Juicio Sucesorio Testamentario número 26/2018, radicado en el Juzgado Primero de lo Civil del distrito judicial de Morelia, Michoacán, a bienes de J. Jesús Gutiérrez Soto, obre bajo mis órdenes, respondiendo de los actas que ejecute, se separé del trámite judicial con el consentimiento de los demás herederos para la tramitación por notario público, firme cuanta documentación sea necesaria a efecto de concluir cada una de las secciones y lograr la adjudicación de los bienes que integran la masa hereditaria, pudiendo en consecuencia de éste poder, realizar cesión de mis derechos hereditarios en forma onerosa o gratuita, facultándole expresamente para recibir su importe, expedir los recibos correspondientes, y sin necesidad de rendir cuentas, respecto de los siguiente bienes: 1.- La parte que en vida correspondió a J. Jesús Gutiérrez Soto, del lote numero 9 nueve de la manzana 39 treinta y nueve, de la zona 1 uno, ubicado en la calle sin nombre del Fraccionamiento Ejido de Sindurio, de la ciudad de Morelia, Michoacán, con una extensión superficial de ciento treinta y seis metros cuadrados y las siguientes medidas y linderos: al noreste, diecisiete metros con el lote número diez; al sureste, ocho metros con calle sin nombre; al suroeste, diecisiete metros con el lote número ocho; al noroeste, ocho metros con el lote número tres, según escritura número siete mil seiscientos sesenta y ocho, inscrita en el Registro Público de la Propiedad Raíz en el Estado bajo el número treinta y tres del tomo nueve mil ciento setenta y cuatro del libro de propiedad correspondiente al distrito de Morelia. 2.- La vivienda en condominio identificada como casa TRECE “B”, con número oficial ciento ochenta y nueve, de la calle francisco Aguiar y Seijas, en el lote VII, de la colonia Fray Antonio de San Miguel, del Conjunto Habitacional Ocolusen II, de la ciudad de Morelia, Michoacán, con la superficie, medidas y linderos descritos en la escritura número ocho mil cuatrocientos cuarenta y cinco, de fecha once de marzo del año dos mil trece, inscrita en el Registro Público de la Propiedad bajo el número trece del tomo once mil cuatrocientos treinta y tres, del libro de propiedad correspondiente al distrito de Morelia. Desde ahora protesto estar y pasar por todo lo que haga en ejercicio y fiel cumplimiento del presente poder, que le confiero por tiempo indefinido, a partir de la presente fecha mientras no le sea revocado. O T O R G A N T E.- ARMIDA GUTIÉRREZ HERRERA.- FIRMADO.- TESTIGO: MATILDE GAONA LÓPEZ.- FIRMADO.- TESTIGO: ALMA ISABEL HUERTA ONCHI.- FIRMADO.- CERTIFICACIÓN NUMERO SETECIENTOS TREINTA Y CUATRO. El suscrito, Licenciado JESÚS SOLÓRZANO OCHOA, Notario Público Número 103 Ciento Tres en el Estado de Michoacán de Ocampo, en ejercicio y con residencia en esta ciudad de Tacámbaro, Michoacán, con Registro Federal de Contribuyentes SOOJ-681218NP4, CERTIFICO: Que siendo las 18:00 dieciocho horas del día de hoy, Jueves 08 ocho de Febrero de 2018 dos mil dieciocho, COMPARECE ANTE MI, en mi Oficio Público la señora ARMIDA GUTIÉRREZ HERRERA, persona de mi conocimiento y en mi concepto tiene capacidad legal, quien bajo protesta de decir verdad y advertida de las penas que establece la ley para aquellos que declaran con falsedad, por sus generales manifiesta ser: mexicana, de cuarenta y un años de edad, soltera, ama de casa, originaria y vecina de Morelia, Michoacán, con domicilio en el número 253 de la calle Pintor David Alfaro Siqueiros del Fraccionamiento Diego Rivera, y quien se identifica con Credencial para Votar, con Fotografía número 0978082964737, expedida por el Instituto Nacional Electoral; y DIJO: Que reconoce y ratifica el contenido del poder que antecede, así como su firma que lo calza por ser la suya, puesta de su puño y letra y la misma que usa en todos sus asuntos oficiales y particulares.- Fueron testigos de este acto MATILDE GAONA LÓPEZ y ALMA ISABEL HUERTA ONCHI, mayores de edad, casada, soltera, ambas Licenciadas en derecho, la primera con domicilio Conocido en Tacámbaro, Michoacán; y la segunda con domicilio en calle Marcos A. Jiménez número 174, Colonia Centro, en Tacámbaro, Michoacán, ambas testigos mexicanas por nacimiento y agregaron: Que reconocen y ratifican su intervención en el otorgamiento de este poder, cuyo contenido es de su conocimiento y reconocen y ratifican igualmente sus firmas que como testigos suscriben al calce del mismo mandato, por ser puestas de su puño y letra y la misma que usan en todos sus actos oficiales y particulares.- PERSONALIDAD.- La otorgante me manifiesta bajo protesta de decir verdad que en términos del artículo sesenta y uno de la Ley del Notariado vigente para el Estado de Michoacán, cuenta con las facultades suficientes para el otorgamiento de este poder por su propio derecho y con el carácter de albacea testamentario de la sucesión a bienes de J. Jesús Gutiérrez Soto, número 26/2018 tramitada ante el Juzgado Primero de Primera Instancia en materia Civil de Morelia, Michoacán, mediante nombramiento aceptado y protestado tácitamente, por auto de fecha 17 diecisiete de enero de 2018 dos mil dieciocho, que en copia certificada por el Secretario de acuerdos del citado Tribunal me exhibe la otorgante, misma que una vez que tuve a la vista y agrego a la presente certificación para que forme parte integra de la misma.- RÉGIMEN LEGAL DEL MANDATO.- ARTÍCULOS 1714 MIL SETECIENTOS CATORCE Y 1715 MIL SETECIENTOS QUINCE DEL CÓDIGO CIVIL PARA EL ESTADO DE MICHOACÁN, cuyos textos dicen: “1714.- El mandato puede ser general o especial. Son generales los contenidos en los tres primeros párrafos del artículo 1715. Cualquier otro mandato tendrá el carácter de especial.”.- “1715.- En todos los poderes generales para pleitos y cobranzas bastará que se diga que se otorgan con todas las facultades generales y aún las especiales que requieran cláusula especial conforme a la ley, para que se entiendan conferidos sin limitación alguna.- En los poderes generales para administrar bienes, bastará expresar que se dan con ese carácter, para que el apoderado tenga toda clase de facultades administrativas.- En los poderes generales, para ejercer actos de dominio, bastará que se den con ese carácter, para que el apoderado tenga todas las facultades de dueño, tanto en lo relativo a los bienes, como para hace toda clase de gestiones a fin de defenderlos.- Cuando se quisieren limitar, en los tres casos antes mencionados, las facultades de los apoderados, se consignarán las limitaciones o los poderes serán especiales.- No obstante lo dispuesto en este artículo siempre serán especiales o expresos, los poderes que se den para contraer matrimonio, para divorciarse, para reconocer y adoptar hijos y para recoger del Archivo General de Notarías los testamentos ológrafos.- Los notarios insertaran este artículo en los testimonios de los poderes que otorguen y en las certificaciones de las cartas poder.”- ARTÍCULOS DOS MIL QUINIENTOS CINCUENTA Y TRES Y DOS MIL QUINIENTOS CINCUENTA Y CUATRO DEL CÓDIGO CIVIL FEDERAL, que literalmente dicen: “2553.- El mandato puede ser general o especial. Son generales los contenidos en los tres primeros párrafos del artículo 2407. Cualquier otro mandato tendrá el carácter de especial.”.- “2554.- En todos los poderes generales para pleitos y cobranzas bastará que se diga que se otorgan con todas las facultades generales y aún las especiales que requieran cláusula especial conforme a la ley, para que se entiendan conferidos sin limitación alguna.- En los poderes generales para administrar bienes, bastará expresar que se dan con ese carácter, para que el apoderado tenga toda clase de facultades administrativas.- En los poderes generales, para ejercer actos de dominio, bastará que se den con ese carácter, para que el apoderado tenga todas las facultades de dueño, tanto en lo relativo a los bienes, como para hace toda clase de gestiones a fin de defenderlos.- Cuando se quisieren limitar, en los tres casos antes mencionados, las facultades de los apoderados, se consignarán las limitaciones o los poderes serán especiales.- Los notarios insertaran este artículo en los testimonios de los poderes que otorguen.”.- Leí a la compareciente y testigos el poder que antecede y la presente certificación, les hice saber su valor y fuerza legal, les advertí que pueden leerlo personalmente, lo que hicieron, manifestándose todos conformes con su contenido, firman ante mí, en la fecha al principio señalada.- DOY FE.- O T O R G A N T E.- ARMIDA GUTIÉRREZ HERRERA.- FIRMADO.- TESTIGO: MATILDE GAONA LÓPEZ.- FIRMADO.- TESTIGO: ALMA ISABEL HUERTA ONCHI.- FIRMADO.- ANTE MÍ: LIC. JESÚS SOLÓRZANO OCHOA.- SOOJ-681218NP4.- NOTARIO PUBLICO N°. 103.- FIRMADO Y SELLADO.------------------------------------------
              YO, EL NOTARIO CERTIFICO Y DOY FE:--------------------------------------
              
              <br><br><b>I.-</b> Que lo relacionado e inserto concuerda fielmente con sus originales que tuve a la vista, a los cuales me remito.-----------------------------
              
              <br><br><b>II.-</b> Que los comparecientes son personas que en mi concepto tienen capacidad legal, para la celebración del presente instrumento. 
              
              <br><br><b>III.-</b> Igualmente bajo protesta de decir verdad y advertidos de las penas en que incurren los que declaran falsamente, manifiestan por sus generales ser: La Licenciada MA. ANGÉLICA MARÍN GAMA, quien por sus generales manifestó ser mexicana, de 55 cincuenta y cinco años de edad, Licenciada en Derecho, casada, originaria de Ciudad Hidalgo, Michoacán y vecina de Morelia, Michoacán, con domicilio en calle Santos Degollado número 1552, Colonia Nueva Chapultepec, quien se identifica con credencial para votar, con fotografía con número 1639530906, expedida por el Instituto Nacional Electoral; El Señor MARCO VINICIO GUTIÉRREZ HERRERA, quien por sus generales manifestó ser mexicano, de treinta y cuatro años de edad, soltero, empleado federal, originario y vecino de la ciudad de Morelia Michoacán, con domicilio en calle David Alfaro Siqueiros #253, fraccionamiento Diego Rivera, identificándose con credencial para votar número folio 1335747673, expedida por el Instituto Nacional Electoral.-----------------------------------------------------
              
              <br><br><b>IV.-</b> AVISO DE PRIVACIDAD.- Que en términos de lo dispuesto por los artículos ocho, quince, dieciséis y diecisiete de la Ley de Protección de Datos Personales en Posesión de los Particulares, los comparecientes manifiestan conocer el aviso de privacidad a que se refiere la mencionada ley, mismo que se encuentra exhibido en diversas áreas públicas de las oficinas del suscrito Notario y que se encuentra a su disposición para ser consultado en cualquier momento, por lo que con la firma del presente instrumento los comparecientes manifiestan su consentimiento expreso con el tratamiento de sus datos personales.------
              
              <br><br><b>V.-</b> Que leí a los comparecientes el presente instrumento, les hice saber su valor y fuerza legal de todas y cada una de sus partes, con la advertencia de que pueden leerlo personalmente, lo que hicieron, manifestándose conformes con su contenido, firman conmigo en mi Oficio Público en la fecha al principio señalada. DOY FE. --------------------
            </p>

            <div class="nocolor-table">
              <div class="table-responsive">
                <table>
                  <tbody>
                    <tr>
                      <td colspan="3">
                        &nbsp;<br><br><br><br><br><br>
                      </td>
                    </tr>

                    <tr>
                      <td width="30%" style="font-family:montserratregular; vertical-align: top; text-align: center; padding-left: 30px;">
                        <b>VENDEDORA</b><br><br><br><br>
                        <hr/>
                        <div>
                          <b>ARMIDA GUTIÉRREZ HERRERA,</b>
                          <br>A TRAVÉS DE SU APODERADA JURÍDICA
                          <br><b>MA. ANGÉLICA MARÍN GAMA</b>
                          <br>
                        </div>
                      </td>

                      <td width="20%" style="font-family:montserratregular; vertical-align: top; text-align: center; padding-right: 15px;">
                      &nbsp;</td>

                      <td width="30%" style="font-family:montserratregular; vertical-align: top; text-align: center; padding-right: 30px;">
                        <b>COMPRADOR</b><br><br><br><br>
                        <hr/>
                        <div>
                          <b><?php echo $nombre; ?> <?php echo $apellidos; ?></b><br><br></span>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>
  </body>
<?php 
  }else{
    header("Location: ./index");
  }
?>