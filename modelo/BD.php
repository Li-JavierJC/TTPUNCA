<?php 
    class BD{
        private $conexion;

        function __construct(){

            $this->conexion= new mysqli( "localhost","root","","educacion");
            if ($this->conexion->connect_errno){
            	echo "error";
            }
            else
            {   
            	//echo "conexion exitosa";
            }       
        }	
        public function registrarUsuario($usuario)
        {   
            if ($usuario->getId() == -1) {    
            $datos="'".$usuario->getNombre()."',";
            $datos.= "'".$usuario->getApellidos()."',";
            $datos.= "'".$usuario->getEdad()."',";
            $datos.= "'".$usuario->getCorreo()."',";
            $datos.= "'".$usuario->getTelefono()."',";
            $datos.= "'".$usuario->getUsuario()."',";
            $datos.= "'".$usuario->getContrasena()."'";

            $insertar = "INSERT INTO usuario (nombre, apellidos, edad, correo, telefono, usuario, contrasena) VALUES($datos)";
            echo $insertar;
            $this->conexion->query($insertar);

            }
       
        } 
    } 

?>
