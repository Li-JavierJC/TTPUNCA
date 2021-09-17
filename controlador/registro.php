<?php
    $pageTitle = "Registrate";
    
    $bd = new BD();
    $usuario= new Usuario();
    $sesion = new Sesion();
    

    if(isset($_POST['registrarse'])){
       
        $usuario->setNombre($_POST['nombre']);
        $usuario->setApellidos($_POST['apellidos']);
        $usuario->setEdad($_POST['edad']);
        $usuario->setSexo($_POST['sexo']);
        $usuario->setNivel($_POST['nivel']);
        $usuario->setGrado($_POST['grado']);
        $usuario->setUsuario($_POST['usuario']);
        $usuario->setContrasena($_POST['contrasena']);
        
        if($bd->buscarUsuario($_POST['usuario'])){
            $bd->registrarUsuario($usuario);
            $sesion->init(); 
            $_SESSION['nombre']=$_POST['nombre'];
            $_SESSION['apellidos']=$_POST['apellidos'];
            header('Location: primero');
        }
        else{
                     
            ?>
                <section>
                    <script src="vista/js/sweetalert2.all.min.js"></script>
                    <script src="vista/js/jquery-3.6.0.min.js"></script>
                    <script>
                        Swal.fire({
                        icon: 'error',
                        title: '¡El usuario ya existe!',
                        text: '"Elige otro"',
                        showConfirmButton: false,
                        timer: 2200
                        })
                    </script>
                </section>    
            <?php            
        }
           
    } else{
       // echo "no entro";
    }
    
?>
