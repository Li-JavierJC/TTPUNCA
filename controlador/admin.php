<?php
    //header("Content-Type: text/html;charset=utf-8");
    setlocale(LC_TIME, 'es_ES.UTF-8');

    $pageTitle = "Administrador PCT-OAXACA";
    if (!$_SESSION['loggedin']) {
        header('Location:ingresar');
    }

    //Definicion de las Clases
    $bd = new BD();
    $alumno= new Alumno();
    $platillo= new Platillo();
    $usuario= new Usuario();
    $comentario= new Comentario();
    $encuesta= new Encuesta();

    //_______________________________________________________________
    //::::::::::::::::::::::Usuarios:::::::::::::::::::::::::::::::::
    //------------Registro de usuarios en general--------------------
    if(isset($_POST['registrarusuario'])){

        $usuario->setNombre($_POST['nombre']);
        $usuario->setApellidos($_POST['apellidos']);
        $usuario->setSexo($_POST['sexo']);
        $usuario->setEscolaridad($_POST['escolaridad']);
        $usuario->setOcupacion($_POST['ocupacion']);
        $usuario->setDomicilio($_POST['domicilio']);
        $usuario->setEdad($_POST['edad']);
        $usuario->setUsuario($_POST['usuario']);
        $usuario->setContrasena($_POST['contrasena']);
        $usuario->setNivelUsuario($_POST['nivelUsuario']);


        $bd->registrarUsuario($usuario); 
        header('location:admin');
    }

    //-------------Consulta de los usuarios--------------------------
    $listaUsuarios=$bd->consultarUsuarios();

    //------- muentra el total de usuarios 
    $totalUsuario=$bd->totalUsuarios();
    
   

    //--------------Editar usuario-----------------------------------
    if(isset($_POST['editarUsuario'])){

        $usuario->setId($_POST['id']);
        $usuario->setNombre($_POST['nombre']);
        $usuario->setApellidos($_POST['apellidos']);
        $usuario->setSexo($_POST['sexo']);
        $usuario->setEscolaridad($_POST['escolaridad']);
        $usuario->setOcupacion($_POST['ocupacion']);
        $usuario->setDomicilio($_POST['domicilio']);
        $usuario->setEdad($_POST['edad']);
        $usuario->setUsuario($_POST['usuario']);
        $usuario->setContrasena($_POST['contrasena']);

        $bd->editarUsuario($usuario);
        header('location:admin');
    }

    //---------------Eliminar usuario-------------------------------
    if (isset($_REQUEST['idUsuario'])) {
        $bd->eliminarUsuario($_REQUEST['idUsuario']);
        header('location:admin');
    }

     //______________________________________________________________
    //::::::::::::::::::::::Alumnos::::::::::::::::::::::::::::::::::

    //------------------Regitro de los alumnos-----------------------
    if(isset($_POST['registrarse'])){

        $alumno->setNombre($_POST['nombre']);
        $alumno->setApellidos($_POST['apellidos']);
        $alumno->setSexo($_POST['sexo']);
        $alumno->setSemestre($_POST['semestre']);
        $alumno->setCarrera($_POST['carrera']);
        $alumno->setEdad($_POST['edad']);
        $alumno->setUsuario($_POST['usuario']);
        $alumno->setContrasena($_POST['contrasena']);
        $alumno->setNivelUsuario($_POST['nivelUsuario']);

        $bd->registrarAlumno($alumno);
        header('location:admin');
    }


    //---------------------Consulta de los alumnos------------------
    $listaAlumnos=$bd->consultarAlumnos();
    
    //------- muentra el total de Alumnos 
    $totalAlumno=$bd->totalAlumnos();
    
    //--------------Editar Alumno-----------------------------------
    if(isset($_POST['editarAlumn'])){
        echo "llego aqui";
        $alumno->setId($_POST['idalum']);
        $alumno->setNombre($_POST['nombre']);
        $alumno->setApellidos($_POST['apellidos']);
        $alumno->setSexo($_POST['sexo']);
        $alumno->setSemestre($_POST['semestre']);
        $alumno->setCarrera($_POST['carrera']);
        $alumno->setEdad($_POST['edad']);
        $alumno->setUsuario($_POST['usuario']);
        $alumno->setContrasena($_POST['contrasena']);

        $bd->editarAlumno($alumno);
        header('location:admin');
    }

    //---------------------Eliminar usuario-------------------------
    if (isset($_REQUEST['idAlumno'])) {
        $bd->eliminarAlumno($_REQUEST['idAlumno']);
        header('location:admin');
    }

     //____________________________________________________________
    //::::::::::::::::::::::Platillos::::::::::::::::::::::::::::::


    //-----------------consulta de platillos--------------------
    $listaPlatillos=$bd->consultarPlatillos();

    //-----------------consulta de platillos de alumnos--------------------
    $listaPlatillosAlumnos=$bd->consultarPlatillosAlumnos();

    //-----------------consulta de platillos de usuarios--------------------
    $listaPlatillosUsuarios=$bd->consultarPlatillosUsuarios();

    //-----------------consulta de platillos del administrador--------------------
    $listaPlatillosAdministrador=$bd->consultarPlatillosAdministrador();

    //------- muentra el total de Platilos 
    $totalPlatillo=$bd->totalPlatillos();
    
    //-----------------Eliminar Platillo------------------------
     if (isset($_REQUEST['idPlatillo'])) {
        $bd->eliminarPlatillo($_REQUEST['idPlatillo']);
        header('location:admin');
    }

    // Función para manejar el envío de ID y nombre del platillo para editar
    if (isset($_REQUEST['idPlatilloEditar'])) {
        $idPlatilloEditar = $_REQUEST['idPlatilloEditar'];
        $nombre = $_POST['nombre'];
        
        $_SESSION['idPlatilloEditar'] = $idPlatilloEditar;
        $_SESSION['nombre'] = $nombre;
        
        header('location:editar-platilloadministrador');
    }

    // Función para manejar el envío de ID y nombre del platillo del alumno para validar
    if (isset($_REQUEST['idPlatilloValidar'])) {
        $idPlatilloValidar = $_REQUEST['idPlatilloValidar'];
        $nombre = $_POST['nombre'];
        
        $_SESSION['idPlatilloValidar'] = $idPlatilloValidar;
        $_SESSION['nombre'] = $nombre;
        
        header('location:validar-platilloa');
    }

    // Función para manejar el envío de ID y nombre del platillo del usuario para validar
    if (isset($_REQUEST['idPlatilloValidarU'])) {
        $idPlatilloValidarU = $_REQUEST['idPlatilloValidarU'];
        $nombre = $_POST['nombre'];
        
        $_SESSION['idPlatilloValidarU'] = $idPlatilloValidarU;
        $_SESSION['nombre'] = $nombre;
        
        header('location:validar-platillou');
    }
  

    //-----------------consulta de comentarios--------------------
    $listaComentarios=$bd->consultarComentarios();


     
    //------- muesntra el total de visitantes-------- 
    $totalVisitante=$bd->totalVistantes();

      
    //------- muesntra el total de visitas
    $totalVisita=$bd->totalVistas();

    //------- muentra los registros de la encuesta
    $listaEncuesta=$bd->consultarEncuesta();
    
   // Consulta de datos de generos
    $datosGeneros = $bd->contarGenerosEncuesta();

    // Verificar si la consulta fue exitosa
    if ($datosGeneros !== false) {
        // Calcular el total de datos
        $totalDatosGeneros = array_sum($datosGeneros);

        // Calcular los porcentajes
        $porcentajesGeneros = [];
        foreach ($datosGeneros as $cantidad) {
            $porcentaje = ($cantidad / $totalDatosGeneros) * 100;
            $porcentajesGeneros[] = round($porcentaje, 2);
        }

        // Extraer los datos para prepararlos para Chart.js
        $labelsG = array_keys($datosGeneros); // Los géneros (hombre, mujer, etc.)
        $dataG = $porcentajesGeneros; // Utilizamos los porcentajes con símbolo de porcentaje en lugar de las cantidades absolutas
    } else {
        echo "Error en la consulta";
    }

    
    // Consulta de datos de categorías de medios
    $datosMedios = $bd->contarCategoriasMediosEncuesta();

    // Verificar si la consulta fue exitosa
    if ($datosMedios !== false) {
        // Calcular el total de datos
        $totalDatos = array_sum($datosMedios);

        // Calcular los porcentajes
        $porcentajesM = [];
        foreach ($datosMedios as $cantidad) {
            $porcentaje = ($cantidad / $totalDatos) * 100;
            $porcentajesM[] = round($porcentaje, 2);
        }

        // Extraer los datos para prepararlos para Chart.js
        $labelsM = array_keys($datosMedios); // Los nombres de las categorías de medios
        $dataM = $porcentajesM; // Utilizamos los porcentajes en lugar de las cantidades absolutas
    } else {
        echo "Error en la consulta";
    }

    // Consulta de datos de estados
    $datosEstados = $bd->contarEstadosEncuesta();

    // Verificar si la consulta fue exitosa
    if ($datosEstados !== false) {
        // Calcular el total de datos
        $totalDatosEstados = array_sum($datosEstados);

        // Calcular los porcentajes
        $porcentajesEstados = [];
        foreach ($datosEstados as $cantidad) {
            $porcentaje = ($cantidad / $totalDatosEstados) * 100;
            $porcentajesEstados[] = round($porcentaje, 2);
        }

        // Extraer los datos para prepararlos para Chart.js
        $labelsE = array_keys($datosEstados); // Los nombres de los estados
        $dataE = $porcentajesEstados; // Utilizamos los porcentajes con símbolo de porcentaje en lugar de las cantidades absolutas
    } else {
        echo "Error en la consulta";
    }

    // Consulta de datos de calificaciones
    $datosCalificaciones = $bd->contarCalificacionesEncuesta();

    // Verificar si la consulta fue exitosa
    if ($datosCalificaciones !== false) {
        // Calcular el total de datos
        $totalDatosCalificaciones = array_sum($datosCalificaciones);

        // Calcular los porcentajes
        $porcentajesCalificaciones = [];
        foreach ($datosCalificaciones as $cantidad) {
            $porcentaje = ($cantidad / $totalDatosCalificaciones) * 100;
            $porcentajesCalificaciones[] = round($porcentaje, 2);
        }

        // Extraer los datos para prepararlos para Chart.js
        $labelsC = array_keys($datosCalificaciones); // Las calificaciones
        $dataC = $porcentajesCalificaciones; // Utilizamos los porcentajes con símbolo de porcentaje en lugar de las cantidades absolutas
    } else {
        echo "Error en la consulta";
    }

    // Definir los nombres de los meses en español
    $meses = [1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril', 5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto', 9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'];

    $rangoFechas = $bd->obtenerRangoDeFechas();
    $anoMinimo = $rangoFechas['ano_minimo'];
    $anoMaximo = $rangoFechas['ano_maximo'];

    $labels = [];
    $data = [];

    for ($ano = $anoMinimo; $ano <= $anoMaximo; $ano++) {
        for ($mes = 1; $mes <= 12; $mes++) {
            $nombreMes = $meses[$mes]; // Cambio aquí para obtener el nombre del mes en español
            $labels[] = $nombreMes . ' ' . $ano;
            $data[] = $bd->totalVisitasPorMes($ano, $mes);
        }
    }

    //-----------------Cerrar session del administrador------------------------
    if (isset($_REQUEST['salirAction'])) {
       session_start();
       $_SESSION['loggedin'] = false;
       session_destroy();
       header('location:ingresar');
    }

    //-------Codigo para generar el archivo csv de usuarios registrados----------------
    // Ruta completa donde se  guardara el archivo CSV
    /*
    $archivo_destinoU = "c:xampp/htdocs/pctoaxaca/csv/usuarios_registrados.csv";
    
    // Abre la salida en modo de escritura y guarda el archivo en la ruta especificada
    $output = fopen($archivo_destinoU, 'w');
    
    // Verifica si se pudo abrir el archivo correctamente
    if ($output !== false) {
        // Escribe la cabecera del archivo CSV (los nombres de las columnas)
        fputcsv($output, array('id', 'nombre', 'apellidos', 'sexo', 'escolaridad', 'ocupacion', 'domicilio','edad','usuario'));
        
        // Recorre los datos de la tabla HTML y escribe cada fila en el archivo CSV
        foreach ($listaUsuarios as $usuario) {
            $datosUsuario = array(
                // Creación de un nuevo arreglo llamado $datosUsuario para almacenar los datos.
                // Cada iteración del ciclo crea un nuevo arreglo $datosUsuario para la característica actual.
                $usuario->getId(),
                $usuario->getNombre(),
                $usuario->getApellidos(),
                $usuario->getSexo(),
                $usuario->getEscolaridad(),
                $usuario->getOcupacion(),
                $usuario->getDomicilio(),
                $usuario->getEdad(),
                $usuario->getUsuario()
            );
            fputcsv($output, $datosUsuario);
        }
        
        // Cierra el archivo después de escribir los datos
        fclose($output);

        // Lee y envía el contenido del archivo al navegador
        //readfile($archivo_destino);
         
        // Finaliza el codigo
        //exit();
       
    } else {
        echo "No se pudo abrir el archivo para escritura.";
    }

    //-------Codigo para generar el archivo csv de usuarios registrados----------------
    // Ruta completa donde se  guardara el archivo CSV
    $archivo_destinoA = "c:xampp/htdocs/pctoaxaca/csv/alumnos_registrados.csv";
    
    // Abre la salida en modo de escritura y guarda el archivo en la ruta especificada
    $output = fopen($archivo_destinoA, 'w');
    
    // Verifica si se pudo abrir el archivo correctamente
    if ($output !== false) {
        // Escribe la cabecera del archivo CSV (los nombres de las columnas)
        fputcsv($output, array('id', 'nombre', 'apellidos', 'sexo', 'semestre', 'carrera','edad','usuario'));
        
        // Recorre los datos de la tabla HTML y escribe cada fila en el archivo CSV
        foreach ($listaAlumnos as $alumno) {
            $datosAlumno = array(
                // Creación de un nuevo arreglo llamado $datosalumno para almacenar los datos.
                // Cada iteración del ciclo crea un nuevo arreglo $datosalumno para la característica actual.
                $alumno->getId(),
                $alumno->getNombre(),
                $alumno->getApellidos(),
                $alumno->getSexo(),
                $alumno->getSemestre(),
                $alumno->getCarrera(),
                $alumno->getEdad(),
                $alumno->getUsuario()
            );
            fputcsv($output, $datosAlumno);
        }
        
        // Cierra el archivo después de escribir los datos
        fclose($output);

        // Lee y envía el contenido del archivo al navegador
        //readfile($archivo_destino);
         
        // Finaliza el codigo
        //exit();
       
    } else {
        echo "No se pudo abrir el archivo para escritura.";
    }

    //-------Codigo para generar el archivo csv de platillos alumnos----------------
    // Ruta completa donde se  guardara el archivo CSV
    $archivo_destinoPA = "c:xampp/htdocs/pctoaxaca/csv/platillosAlumnos.csv";
    
    // Abre la salida en modo de escritura y guarda el archivo en la ruta especificada
    $output = fopen($archivo_destinoPA, 'w');
    
    // Verifica si se pudo abrir el archivo correctamente
    if ($output !== false) {
        // Escribe la cabecera del archivo CSV (los nombres de las columnas)
        fputcsv($output, array('id', 'nombre', 'descripcion', 'tiempoPreparacion', 'tiempoCoccion', 'caducidad','porciones','costoPromedio','rendimiento','tiempoComida','autor'));
        
        // Recorre los datos de la tabla HTML y escribe cada fila en el archivo CSV
        foreach ($listaPlatillosAlumnos as $platillo) {
           
            $datosPlatillosAlumno = array(
                // Creación de un nuevo arreglo llamado $datosPlatillosAlumno para almacenar los datos.
                // Cada iteración del ciclo crea un nuevo arreglo $datosPlatillosAlumno para la característica actual.
                $platillo->getId(),
                $platillo->getNombre(),
                $platillo->getDescripcion(),
                $platillo->getTiempoPreparacion(),
                $platillo->getTiempoCoccion(),
                $platillo->getCaducidad(),
                $platillo->getPorciones(),
                $platillo->getCostoPromedio(),
                $platillo->getRendimiento(),
                $platillo->getTiempoComida(),
                $platillo->getAutor(),
            );
            fputcsv($output, $datosPlatillosAlumno);
        }
        
        // Cierra el archivo después de escribir los datos
        fclose($output);

        // Lee y envía el contenido del archivo al navegador
        //readfile($archivo_destino);
         
        // Finaliza el codigo
        //exit();
       
    } else {
        echo "No se pudo abrir el archivo para escritura.";
    }

    */
    
?>



