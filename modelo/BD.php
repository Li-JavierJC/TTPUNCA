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
            	echo "conexion exitosa";
            }       
        }	

        public function registrarUsuario($usuario)
        {   
            if ($usuario->getId() == -1) {    
            $datos= "'".$usuario->getUsuario()."',";
            $datos.= "'".$usuario->getContrasena()."'";

            $insertar = "INSERT INTO usuario (usuario, contrasena) VALUES($datos)";
            echo $insertar;

            $this->conexion->query($insertar);

            }
       
        } 
        
		//obtiene el usuario para el login
		public function obtenerUsuario($usuario, $contrasena){
			
            $consulta = "SELECT * FROM usuario WHERE usuario = '$usuario' and contrasena='$contrasena'";
            $sql = $this->conexion->query($consulta);
            /*
			$registro=$sql->fetch();
            $usuario=new Usuario();


			//verifica si la clave es conrrecta
			if ($registro!=NULL) {				
				//si es correcta, asigna los valores que trae desde la base de datos
				$usuario->setId($registro['id']);
				$usuario->setUsuario($registro['usuario']);
				$usuario->setContrasena($registro['contrasena']);
			}
            
            */
			return $usuario;
		}
    } 

?>
