<?php
$pageTitle = "Registro";

$bd = new BD();
$usuario= new Usuario();


if(isset($_POST['registrarse'])){

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
    $usuario_recuperado=$usuario->getUsuario();
    $usuario=$bd->obtenerUnUsuario($usuario_recuperado);
     if ($usuario->getId()!=NULL) {
        $idUsuario=$usuario->getId();
        $nombre=$usuario->getNombre();
        $apellidos=$usuario->getApellidos();
        $sexo=$usuario->getSexo();
        $escolaridad=$usuario->getEscolaridad();
        $ocupacion=$usuario->getOcupacion();
        $domicilio=$usuario->getDomicilio();
        $edad=$usuario->getEdad();
        $nusuario=$usuario->getUsuario();
        
        $_SESSION['idUsuario']=$idUsuario;
        $_SESSION['nombre']=$nombre;
        $_SESSION['apellidos']=$apellidos;
        $_SESSION['sexo']=$sexo;
        $_SESSION['escolaridad']=$escolaridad;
        $_SESSION['ocupacion']=$ocupacion;
        $_SESSION['domicilio']=$domicilio;
        $_SESSION['edad']=$edad;
        $_SESSION['nusuario']=$nusuario;
        
        header('location:platillos');
     }

}




?>


