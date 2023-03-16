<?php
    $pageTitle = "Registro del Alumno"; 
    
    $bd = new BD();
    $alumno= new Alumno();


if(isset($_POST['registrarse'])){

  //  echo "entro";

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

    //Ingresar como alumno
    $alumno=$bd->obtenerAlumno($_POST['usuario'],$_POST['contrasena']);
    
    if ($alumno->getId()!=NULL) {
        
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
?>