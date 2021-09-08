<?php 
    class BD{
        private $conexion;

        function __construct(){
            
            $this->conexion= new mysqli( "slimtech.ddns.net","educacion","G5t$24Lip.","educacion");
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
            if ($usuario->getId() != -1) {    
            
            
            $datos= "'".$usuario->getUsuario()."',";
            $datos.= "'".$usuario->getContrasena()."'";
            
            $insertar = "INSERT INTO usuario (usuario, contrasena) VALUES($datos)";
            $this->conexion->query($insertar);

            }
       
        } 
        
		//obtiene el usuario para el login
		public function obtenerUsuario($usuario, $contrasena){
			
            // consulta de usuario y contraseña a la base de datos
            $consulta = "SELECT * FROM usuario WHERE usuario = '$usuario' and contrasena='$contrasena'";
            
            //se ejecuta la consulta a la base de datos con el query
            $sql = $this->conexion->query($consulta);
            
            // retorna la fila consultada en la base de datos
            $cadena=$sql->fetch_array(MYSQLI_BOTH);
        
            $usuario=new Usuario();

			//verifica si se encuentra el usuario
			if ($cadena!=NULL) {	
                
                //si es correcta, asigna los valores que trae desde la base de datos

                $usuario->setId($cadena['id']);                
				$usuario->setUsuario($cadena['usuario']);
				$usuario->setContrasena($cadena['contrasena']);
                
			}   
			return $usuario;
		}
    } 

?>
