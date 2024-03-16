<?php
    $pageTitle = "Cuenta en PCT-OAXACA"; 
  
    $bd= new BD();
    $alumno= new Alumno();
    $platillo= new Platillo();
    $comentario= new Comentario();

    //--------------Editar datos Alumno-----------------------------------
    if(isset($_POST['actualizarDatos'])){
        //echo "llego aqui";
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
        $usuario=$alumno->getUsuario();
        //Ingresar como alumno
        $alumno=$bd->obtenerUnAlumno($usuario);
            
        if (!empty($alumno->getId())) {
            $nivelUsuario=$alumno->getNivelUsuario();
            if ($nivelUsuario==2) {

                //se crea la sesion del usuario
                $id=$alumno->getId();
                $nombre=$alumno->getNombre();
                $apellidos=$alumno->getApellidos();
                $sexo=$alumno->getSexo();
                $semestre=$alumno->getSemestre();
                $carrera=$alumno->getCarrera();
                $edad=$alumno->getEdad();
                $usuario=$alumno->getUsuario();
                $contrasena=$alumno->getContrasena();

                $_SESSION['id']=$id;
                $_SESSION['nombre']=$nombre;
                $_SESSION['apellidos']=$apellidos;
                $_SESSION['sexo']=$sexo;
                $_SESSION['semestre']=$semestre;
                $_SESSION['carrera']=$carrera;
                $_SESSION['edad']=$edad;
                $_SESSION['usuario']=$usuario;
                $_SESSION['contrasena']=$contrasena;
                header('location:cuenta');  
            }
        }
    }

    
    $id=$_SESSION['id'];// aqui marca error revisar
    
    // Llamada a la función para consultar los platillos del alumno con el ID proporcionado
    $listaPlatillos = $bd->consultarPlatillosAlumno($id);


    //Funcion para mandar el id del platillo a modificar
    if (isset($_REQUEST['idPlatilloEditar'])) {

        $idPlatilloEditar = $_REQUEST['idPlatilloEditar'];
         
        //echo $idPlatilloEditar; 
        $_SESSION['idPlatilloEditar']=$idPlatilloEditar;
        //$platillo=$bd->mostrarComida($_REQUEST['idPlatilloEditar']);
        header('location:editar-platillo');          
    }
   

    //-----------------Cerrar session del alumno------------------------
    if (isset($_REQUEST['salirAction'])) {
       session_start();
       $_SESSION['loggedin'] = false;
       session_destroy();
       header('location:ingresar');
    }

?>