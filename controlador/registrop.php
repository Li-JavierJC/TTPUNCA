<?php
	$pageTitle = "Registrar platillo";

	$bd= new BD();
    $usuario = new Usuario();

	$id=$_SESSION['idUsuario'];
    // Llamada a la función para consultar los platillos del alumno con el ID proporcionado
    $listaPlatillos = $bd->consultarPlatillosUsuario($id);

    //Funcion para mandar el id del platillo a modificar
    if (isset($_REQUEST['idPlatilloEditar'])) {

        $idPlatilloEditar = $_REQUEST['idPlatilloEditar'];
         
        echo $idPlatilloEditar; 
        $_SESSION['idPlatilloEditar']=$idPlatilloEditar;
        //$platillo=$bd->mostrarComida($_REQUEST['idPlatilloEditar']);
        header('location:editar-platillousuario');          
    }

    //--------------Editar usuario-----------------------------------
    if(isset($_POST['actualizarDatos'])){

        $usuario->setId($_POST['idU']);
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
        $usuario_recuperado=$usuario->getUsuario();

        //Ingresar como usuario
        $usuario=$bd->obtenerUnUsuario($usuario_recuperado);
        if (!empty($usuario->getId())) {
            $nivelUsuario=$usuario->getNivelUsuario();
            if ($nivelUsuario==3) {
                //se crea la sesion del usuario
                $idUsuario=$usuario->getId();
                $nombre=$usuario->getNombre();
                $apellidos=$usuario->getApellidos();
                $sexo=$usuario->getSexo();
                $escolaridad=$usuario->getEscolaridad();
                $ocupacion=$usuario->getOcupacion();
                $domicilio=$usuario->getDomicilio();
                $edad=$usuario->getEdad();
                $nusuario=$usuario->getUsuario();
                $ncontrasena=$usuario->getContrasena();

                $_SESSION['idUsuario']=$idUsuario;
                $_SESSION['nombre']=$nombre;
                $_SESSION['apellidos']=$apellidos;
                $_SESSION['sexo']=$sexo;
                $_SESSION['escolaridad']=$escolaridad;
                $_SESSION['ocupacion']= $ocupacion;
                $_SESSION['domicilio']=$domicilio;
                $_SESSION['edad']=$edad;
                $_SESSION['nusuario']=$nusuario;
                $_SESSION['ncontrasena']=$ncontrasena;

                header('location:registrop');
            }
        }    
    }
?>