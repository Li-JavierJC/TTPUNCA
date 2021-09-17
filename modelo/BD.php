<?php 
    class BD{
        private $conexion;

        function __construct(){
            //$this->conexion=new mysqli("localhost","slimtech_educacion","^,{q#@_NNYaC","slimtech_educacion");
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
            if ($usuario->getId() != -1) {    
            
            $datos= "'".$usuario->getNombre()."',";
            $datos.= "'".$usuario->getApellidos()."',";
            $datos.= "'".$usuario->getEdad()."',";
            $datos.= "'".$usuario->getSexo()."',";
            $datos.= "'".$usuario->getNivel()."',";
            $datos.= "'".$usuario->getGrado()."',";
            $datos.= "'".$usuario->getUsuario()."',";
            $datos.= "'".password_hash($usuario->getContrasena(), PASSWORD_DEFAULT)."'";
            
            $insertar = "INSERT INTO usuario (nombre, apellidos, edad, sexo, nivel, grado, usuario, contrasena) VALUES($datos)";
            echo $insertar;
            $this->conexion->query($insertar);
            }
       
        } 
        
		//obtiene el usuario para el login
		public function obtenerUsuario($usuario, $contrasena){
            // consulta de usuario y contraseña a la base de datos
            $consulta = "SELECT * FROM usuario WHERE usuario = '$usuario'";
            //se ejecuta la consulta a la base de datos con el query
            $sql = $this->conexion->query($consulta);
            // retorna la fila consultada de la base de datos
            $registro=mysqli_fetch_array($sql); 
            $hash = $registro['contrasena'];
            $usuario=new Usuario();
			//verifica si se encuentra el usuario
			if (password_verify($contrasena, $hash)) {	
                //si es correcta, asigna los valores que trae desde la base de datos
                $usuario->setId($registro['id']);
                $usuario->setNombre($registro['nombre']);
                $usuario->setApellidos($registro['apellidos']);
                $usuario->setEdad($registro['edad']);
                $usuario->setSexo($registro['sexo']);
                $usuario->setNivel($registro['nivel']);
                $usuario->setGrado($registro['grado']);                
				$usuario->setUsuario($registro['usuario']);
				$usuario->setContrasena($registro['contrasena']);                
			}   
			return $usuario;
		}

        public function buscarUsuario($usuario){
            // se realiza la consulta del usuario
            $consulta= "SELECT *FROM usuario WHERE usuario= '$usuario'";
            
            $sql=$this->conexion->query($consulta);
             // retorna la fila consultada de la base de datos
            $registro=$sql->fetch_array(MYSQLI_BOTH);
            // se verifica si el id del usario es nulo
            if($registro['id'] != NULL){
                $usado=False;
            }
            else
            {
                $usado=TRUE;
            }
            return $usado;
            
        }
    } 

?>
