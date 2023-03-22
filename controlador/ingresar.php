<?php
   
    $pageTitle = "Iniciar Sesión";

    $bd= new BD();
    $administrador= new Administrador();
    $alumno= new Alumno();
    $usuario= new Usuario();
    
    if (isset($_POST['ingresar'])) {
        //Ingresar como administrador
        $administrador=$bd->obtenerAdministrador($_POST['usuario'],$_POST['contrasena']);
        if (!empty($administrador->getId())) {
            //se obtiene el nivel de usuario
            $nivelUsuario=$administrador->getNivelUsuario();
            if ($nivelUsuario == 1) {
                //se crea la sesion del usuario
              
                $usuario=$administrador->getUsuario();
                $_SESSION['usuario']=$usuario;
                $_SESSION['loggedin'] = true;
                header('location:admin');
            }
        }
        else
        {
            //Ingresar como alumno
            $alumno=$bd->obtenerAlumno($_POST['usuario'],$_POST['contrasena']);
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
            }else{
                //Ingresar como usuario
                $usuario=$bd->obtenerUsuario($_POST['usuario'],$_POST['contrasena']);
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

                        $_SESSION['idUsuario']=$idUsuario;
                        $_SESSION['nombre']=$nombre;
                        $_SESSION['apellidos']=$apellidos;
                        $_SESSION['sexo']=$sexo;
                        $_SESSION['escolaridad']=$escolaridad;
                        $_SESSION['ocupacion']= $ocupacion;
                        $_SESSION['domicilio']=$domicilio;
                        $_SESSION['edad']=$edad;
                        $_SESSION['nusuario']=$nusuario;

                        header('location:platillos');
                    }
                }
                else{
                     ?>
                        <section>
                            <script src="vista/js/sweetalert2.all.min.js"></script>
                            <script src="vista/js/jquery-3.6.0.min.js"></script>
                            <script>
                                Swal.fire({
                                icon: 'error',
                                title: '¡Tu usuario o contraseña es incorrecto!',
                                showConfirmButton: false,
                                timer: 3000
                                })
                            </script>
                        </section>
                    <?php  
                }
            }
        }
    }

    //-----------------Cerrar session del administrador------------------------
    if (isset($_REQUEST['salirAction'])) {
       session_start();
       $_SESSION['loggedin'] = false;
       session_destroy();
       header('location:ingresar');
    }

?>


           
   