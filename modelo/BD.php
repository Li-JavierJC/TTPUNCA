<?php 
    class BD{
        private $conexion;

        //--------------------Conexión a la base de datos--------------------------
        function __construct(){
           
            //$this->conexion= new mysqli( "localhost","ttpunca","ttpunca","ttpunca");
            $this->conexion= new mysqli( "localhost","root","","ttpunca");
            $this->conexion->set_charset("utf8");
            if ($this->conexion->connect_errno){
                echo "error";
            }
            else
            {   
                //echo "conexion exitosa";
            }       
        }
        
        //_________________________________________________________________________
        //::::::::::::::::::::::::::::Usuario::::::::::::::::::::::::::::::::::::::
        //_________________________________________________________________________
        
        //--------Registro del usuario en general----------------------------------------
        public function registrarUsuario($usuario)
        {   
            if ($usuario->getId() != -1) {    

                $datos= "'".$usuario->getNombre()."',";
                $datos.= "'".$usuario->getApellidos()."',";
                $datos.= "'".$usuario->getSexo()."',";
                $datos.= "'".$usuario->getEscolaridad()."',";
                $datos.= "'".$usuario->getOcupacion()."',";
                $datos.= "'".$usuario->getDomicilio()."',";
                $datos.= "'".$usuario->getEdad()."',";
                $datos.= "'".$usuario->getUsuario()."',";
                $datos.= "'".md5($usuario->getContrasena())."',";
                $datos.= "'".$usuario->getNivelUsuario()."'";
            
            $insertar = "INSERT INTO usuario (nombre, apellidos, sexo, escolaridad, ocupacion, domicilio, edad, usuario, contrasena, nivelUsuario) VALUES($datos)";
            
            $this->conexion->query($insertar);
            }
       
        }

        //-------------verificacion de que el usuario no exista en l base de datos------------ 
        public function buscarUsuario($usuario){
            // se realiza la consulta del usuario
           
            $consulta= "SELECT *FROM  usuario where usuario='$usuario'";
            
            $sql=$this->conexion->query($consulta);
             // retorna la fila consultada de la base de datos
            $registro=$sql->fetch_array(MYSQLI_BOTH);
            // se verifica si el id del usario es nulo
            if(!empty($registro['id'])){
                $usado=False;
            }
            else
            {
                $usado=TRUE;
            }
            return $usado; 
        }


        //----------------------Consultar Usuarios----------------------------------
        public function consultarUsuarios(){
            $listaUsuarios= array();
            $consulta="SELECT *FROM usuario";
            $sql=$this->conexion->query($consulta);

            if($sql===false){
                echo "Error en la consulta";
            }

            while($row=$sql->fetch_assoc()){
                $usuario= new Usuario();

                $usuario->setId($row['id']);
                $usuario->setNombre($row['nombre']);
                $usuario->setApellidos($row['apellidos']);
                $usuario->setSexo($row['sexo']);
                $usuario->setEscolaridad($row['escolaridad']);
                $usuario->setOcupacion($row['ocupacion']);
                $usuario->setDomicilio($row['domicilio']);
                $usuario->setEdad($row['edad']);
                $usuario->setUsuario($row['usuario']);
                $usuario->setContrasena($row['contrasena']);
                $usuario->setNivelUsuario($row['nivelUsuario']);

                array_push($listaUsuarios,$usuario);
            }
            return $listaUsuarios;
        }
   
        //--------------------------Login del Usuario----------------------------------
        public function obtenerUsuario($usuario, $contrasena){
            //consulta del usuario y la contraseña a la base de datos
            $consulta= "SELECT *FROM  usuario where usuario='$usuario'and contrasena= md5('$contrasena')";

            //se ejecuta la consulta a la base de datos 
            $sql= $this->conexion->query($consulta);
            $usuario = new Usuario();

            if (!empty($sql)) {
                 //retorna la fila consultada a la base de datos
                $registro=mysqli_fetch_array($sql);
                if (!empty($registro['contrasena'])) {
                    $contrasena_usuario = $registro['contrasena'];
                    
                    //se verifica si se encuentra el usuario
                    if (md5($contrasena)==$contrasena_usuario) {
                        // 
                        $usuario->setId($registro['id']);
                        $usuario->setNombre($registro['nombre']);
                        $usuario->setApellidos($registro['apellidos']);
                        $usuario->setSexo($registro['sexo']);
                        $usuario->setEscolaridad($registro['escolaridad']);
                        $usuario->setOcupacion($registro['ocupacion']);
                        $usuario->setDomicilio($registro['domicilio']);
                        $usuario->setEdad($registro['edad']);
                        $usuario->setUsuario($registro['usuario']);
                        $usuario->setContrasena($registro['contrasena']);
                        $usuario->setNivelUsuario($registro['nivelUsuario']);
                    }    
                }        
            }

            return $usuario;

        }

        //--------------------------Obtener un solo usuario----------------------------------
        public function obtenerUnUsuario($usuario_recuperado){
            //consulta del usuario y la contraseña a la base de datos
            $consulta= "SELECT *FROM  usuario where usuario='$usuario_recuperado'";

            //se ejecuta la consulta a la base de datos 
            $sql= $this->conexion->query($consulta);
            $usuario = new Usuario();
            if (!empty($sql)) {
                 //retorna la fila consultada a la base de datos
                $registro=mysqli_fetch_array($sql);
                $usuario_econotrado = $registro['usuario'];

                //se verifica si se encuentra el usuario
                if ($usuario_recuperado==$usuario_econotrado) {
    
                    $usuario->setId($registro['id']);
                    $usuario->setNombre($registro['nombre']);
                    $usuario->setApellidos($registro['apellidos']);
                    $usuario->setSexo($registro['sexo']);
                    $usuario->setEscolaridad($registro['escolaridad']);
                    $usuario->setOcupacion($registro['ocupacion']);
                    $usuario->setDomicilio($registro['domicilio']);
                    $usuario->setEdad($registro['edad']);
                    $usuario->setUsuario($registro['usuario']);
                    $usuario->setContrasena($registro['contrasena']);
                    $usuario->setNivelUsuario($registro['nivelUsuario']);
                }   
            }

            return $usuario;

        }

        //---------------------Editar usuario en general-------------------------------
        public function editarUsuario($usuario){   

            $consulta= "SELECT *FROM  usuario where id='".$usuario->getId()."'";

            //se ejecuta la consulta a la base de datos 

            $sql= $this->conexion->query($consulta);

            //retorna la fila consultada a la base de datos
            $registro=mysqli_fetch_array($sql);
            $contrasena_usuario = $registro['contrasena'];

            $contrasena1=$usuario->getContrasena();

            if ($contrasena1===$contrasena_usuario) {

                $datos= "id='".$usuario->getId()."',";
                $datos.= "nombre='".$usuario->getNombre()."',";
                $datos.= "apellidos='".$usuario->getApellidos()."',";
                $datos.= "sexo='".$usuario->getSexo()."',";
                $datos.= "escolaridad='".$usuario->getEscolaridad()."',";
                $datos.= "ocupacion='".$usuario->getOcupacion()."',";
                $datos.= "domicilio='".$usuario->getDomicilio()."',";
                $datos.= "edad='".$usuario->getEdad()."',";
                $datos.= "usuario='".$usuario->getUsuario()."',";
                $datos.= "contrasena='".$usuario->getContrasena()."'";
                
                $actualizar = "UPDATE usuario SET $datos where id='".$usuario->getId()."'";
                echo $actualizar;
                $this->conexion->query($actualizar);

            }
            else
            {
                $datos= "id='".$usuario->getId()."',";
                $datos.= "nombre='".$usuario->getNombre()."',";
                $datos.= "apellidos='".$usuario->getApellidos()."',";
                $datos.= "sexo='".$usuario->getSexo()."',";
                $datos.= "escolaridad='".$usuario->getEscolaridad()."',";
                $datos.= "ocupacion='".$usuario->getOcupacion()."',";
                $datos.= "domicilio='".$usuario->getDomicilio()."',";
                $datos.= "edad='".$usuario->getEdad()."',";
                $datos.= "usuario='".$usuario->getUsuario()."',";
                $datos.= "contrasena='".md5($usuario->getContrasena())."'";
                
                $actualizar = "UPDATE usuario SET $datos where id='".$usuario->getId()."'";
                echo $actualizar;
                $this->conexion->query($actualizar);
                }
       
        }

        //---------------------- Buscar usuario-----------------------------
        function buscarUsuarios($busqueda) {
            $listaUsuarios = array();
            $consulta = "SELECT * FROM usuario WHERE id like '%$busqueda%' OR nombre like '%$busqueda%' or apellidos like '%$busqueda%'";
            $resultado = $this->conexion->query($consulta);
   
            while ($row = $resultado ->fetch_assoc()) {
               $usuario= new Usuario();

                $usuario->setId($row['id']);
                $usuario->setNombre($row['nombre']);
                $usuario->setApellidos($row['apellidos']);
                $usuario->setSexo($row['sexo']);
                $usuario->setEscolaridad($row['escolaridad']);
                $usuario->setOcupacion($row['ocupacion']);
                $usuario->setDomicilio($row['domicilio']);
                $usuario->setEdad($row['edad']);
                $usuario->setUsuario($row['usuario']);
                $usuario->setContrasena($row['contrasena']);
               

                array_push($listaUsuarios,$usuario);
            }

            return $listaUsuarios;
        }
        //---------------------- Total de usuarios----------------------------
        function totalUsuarios(){
           $consulta = "SELECT * FROM usuario";
           if ($resultado=mysqli_query($this->conexion,$consulta)) {
                $totalUsuario=mysqli_num_rows($resultado);
                return  $totalUsuario; 
            }
        }

        //---------------------- Eliminar Usuario-----------------------------
        function eliminarUsuario($idUsuario) {
            $consulta = "DELETE FROM usuario WHERE id = '$idUsuario'";
            $this->conexion->query($consulta);

        }

        //------------Eliminar cuenta de usuario con sus publicaciones 
        function eliminarCuentaPublicaciones($idUsuario){
            //eliminacion de la cuenta del usuario
            $consulta = "DELETE FROM usuario WHERE id = '$idUsuario'";
            $this->conexion->query($consulta);

            //eliminacion de comentarios si es que los hizo el usuario
            $consulta = "DELETE FROM comentario WHERE idUsuario = '$idUsuario'";
            $this->conexion->query($consulta);

            // Eliminar favoritos relacionados al platillo
            $consulta = "DELETE FROM favoritos  WHERE idUsuario = '$idUsuario'";
            $this->conexion->query($consulta);

            $consulta= "SELECT *FROM  platillo where idUsuario='$idUsuario'";
            $sql=$this->conexion->query($consulta);

            //verificar si hay resultados
            if (mysqli_num_rows($sql)>0) {
                //itaramos las filas a traves de los resultados
                while ($fila=mysqli_fetch_assoc($sql)) {
                    //sacamos el id de los platillos que esten asociados con el usuario
                    $idPlatillo= $fila['idPlatillo'];

                    //elimamos los comentarios que realizo el usuario
                    $consulta = "DELETE FROM comentario WHERE idPlatillo = '$idPlatillo'";
                    $this->conexion->query($consulta);

                    // Eliminar ingredientes relacionado al platillo
                    $consulta = "DELETE FROM ingredientes WHERE idPlatillo = '$idPlatillo'";
                    $this->conexion->query($consulta);

                    // Eliminar preparación relacionada al platillo
                    $consulta = "DELETE FROM preparacion WHERE idPlatillo = '$idPlatillo'";
                    $this->conexion->query($consulta);

                    // Eliminar utensilios relacionados al platillo
                    $consulta = "DELETE FROM utencilio WHERE idPlatillo = '$idPlatillo'";
                    $this->conexion->query($consulta);

                    // Eliminar complementos relacionados al platillo
                    $consulta = "DELETE FROM complemento WHERE idPlatillo = '$idPlatillo'";
                    $this->conexion->query($consulta);

                    // Eliminar validacion relacionados al platillo
                    $consulta = "DELETE FROM validacion  WHERE idPlatillo = '$idPlatillo'";
                    $this->conexion->query($consulta);

                    // Eliminar el platillo principal
                    $consulta = "DELETE FROM platillo WHERE id = '$idPlatillo'";
                    $this->conexion->query($consulta);

                }
            }
        }
                
        //-------- Buscar que el platillo no esté añadido a favoritos
        public function verificarFavorios($idUsuario, $idPlatillo){
            /*Consulta a la base datos*/
            $consulta="SELECT *FROM favoritos WHERE idUsuario='$idUsuario' and idPlatillo='$idPlatillo'";

            /*se ejecuta la consulta a la base de datos*/
            $sql=$this->conexion->query($consulta);
            $favoritos = new Favoritos();

            if (!empty($sql)) {
                /*Retorna la fila consultada*/
                $registro=mysqli_fetch_array($sql);

                $favoritos->setId($registro['id']);
            }

            return $favoritos;

        }

        //---------------------Añadir un platillo a favoritos-----------------
        public function guardarFavoritos($favoritos){
            if ($favoritos->getId() != -1) {
                $datos="'".$favoritos->getFecha()."',";
                $datos.="'".$favoritos->getIdUsuario()."',";
                $datos.="'".$favoritos->getIdPlatillo()."'";

                $insertar= "INSERT INTO favoritos (fecha, idUsuario, idPlatillo) VALUES ($datos)";
                echo $insertar;
                $this->conexion->query($insertar);
            }
        }

        //---------------------Consulta de platillos favoritos----------------
        public function consultarFavoritos(){
            $listaFavoritos= array();
            $consulta="SELECT *FROM favoritos";
            $sql=$this->conexion->query($consulta);

            if($sql===false){
                echo "Error en la consulta";
            }

            while($row=$sql->fetch_assoc()){
                $favoritos= new Favoritos();

                $favoritos->setId($row['id']);
                $favoritos->setFecha($row['fecha']);
                $favoritos->setIdUsuario($row['idUsuario']);
                $favoritos->setIdPlatillo($row['idPlatillo']);
                
                array_push($listaFavoritos,$favoritos);
            }
            return $listaFavoritos;
        }
        
        //---------------------- Eliminar Favoritos-----------------------------
        function eliminarFavoritos($idFavoritos) {
            $consulta = "DELETE FROM favoritos WHERE id = '$idFavoritos'";
            $this->conexion->query($consulta);

        }
        //____________________________________________________________________
        //:::::::::::::::::::::::::::Alumno:::::::::::::::::::::::::::::::::::
        //____________________________________________________________________
        
        //------------------------Registro del Alumno-------------------------
        public function registrarAlumno($alumno)
        {   
            
            if ($alumno->getId() != -1) {    
                    
                $datos= "'".$alumno->getNombre()."',";
                $datos.= "'".$alumno->getApellidos()."',";
                $datos.= "'".$alumno->getSexo()."',";
                $datos.= "'".$alumno->getSemestre()."',";
                $datos.= "'".$alumno->getCarrera()."',";
                $datos.= "'".$alumno->getEdad()."',";
                $datos.= "'".$alumno->getUsuario()."',";
                $datos.= "'".md5($alumno->getContrasena())."',";
                $datos.= "'".$alumno->getNivelUsuario()."'";
                
                $insertar = "INSERT INTO alumno (nombre, apellidos, sexo, semestre, carrera, edad, usuario, contrasena, nivelUsuario) VALUES($datos)";
                echo $insertar;
                $this->conexion->query($insertar);
            }
       
        }

         //----verificacion de que el usuario del Alumno no exista en l base de datos------------ 
        public function buscarAlumno($usuario){
            // se realiza la consulta del usuario
           
            $consulta= "SELECT *FROM  alumno where usuario='$usuario'";
            
            $sql=$this->conexion->query($consulta);
             // retorna la fila consultada de la base de datos
            $registro=$sql->fetch_array(MYSQLI_BOTH);
            // se verifica si el id del usario es nulo
            if(!empty($registro['id'])){
                $usado=false;
            }
            else
            {
                $usado=true;
            }
            return $usado; 
        }

        //-------------------------Consultar alumnos---------------------------
        public function consultarAlumnos(){
            $listaAlumnos= array();
            $consulta = "SELECT * FROM alumno";
            $sql= $this->conexion->query($consulta);

            if ($sql=== false) {
                echo "Error en la consulta";
            }

            while ($row = $sql->fetch_assoc()) {
                $alumno=new Alumno();

                $alumno->setId($row['id']);
                $alumno->setNombre($row['nombre']);
                $alumno->setApellidos($row['apellidos']);
                $alumno->setSexo($row['sexo']);
                $alumno->setSemestre($row['semestre']);
                $alumno->setCarrera($row['carrera']);
                $alumno->setEdad($row['edad']);
                $alumno->setUsuario($row['usuario']);
                $alumno->setContrasena($row['contrasena']);
                $alumno->setNivelUsuario($row['nivelUsuario'])
                ;


                array_push($listaAlumnos, $alumno);
            }
            return $listaAlumnos;
        }

        //---------------------Editar Alumno-------------------------------------------
        public function editarAlumno($alumno){   
           
            $consulta= "SELECT *FROM  alumno where id='".$alumno->getId()."'";

            //se ejecuta la consulta a la base de datos 

            $sql= $this->conexion->query($consulta);

            //retorna la fila consultada a la base de datos
            $registro=mysqli_fetch_array($sql);
            $contrasena_alumno = $registro['contrasena'];

            $contrasena1=$alumno->getContrasena();

            if ($contrasena1===$contrasena_alumno) {

                $datos= "id='".$alumno->getId()."',";
                $datos.= "nombre='".$alumno->getNombre()."',";
                $datos.= "apellidos='".$alumno->getApellidos()."',";
                $datos.= "sexo='".$alumno->getSexo()."',";
                $datos.= "semestre='".$alumno->getSemestre()."',";
                $datos.= "carrera='".$alumno->getCarrera()."',";
                $datos.= "edad='".$alumno->getEdad()."',";
                $datos.= "usuario='".$alumno->getUsuario()."',";
                $datos.= "contrasena='".$alumno->getContrasena()."'";
                
                $actualizar = "UPDATE alumno SET $datos where id='".$alumno->getId()."'";
                //echo $actualizar;
                $this->conexion->query($actualizar);

            }
            else
            {
                $datos= "id='".$alumno->getId()."',";
                $datos.= "nombre='".$alumno->getNombre()."',";
                $datos.= "apellidos='".$alumno->getApellidos()."',";
                $datos.= "sexo='".$alumno->getSexo()."',";
                $datos.= "semestre='".$alumno->getSemestre()."',";
                $datos.= "carrera='".$alumno->getCarrera()."',";
                $datos.= "edad='".$alumno->getEdad()."',";
                $datos.= "usuario='".$alumno->getUsuario()."',";
                $datos.= "contrasena='".md5($alumno->getContrasena())."'";
                
                $actualizar = "UPDATE alumno SET $datos where id='".$alumno->getId()."'";
                echo $actualizar;
                $this->conexion->query($actualizar);

            }
       
        }

        
        //------------------------Login del Alumno------------------------------
        public function obtenerAlumno($usuario, $contrasena){
            //consulta del usuario y la contraseña a la base de datos
            $consulta= "SELECT *FROM  alumno where usuario='$usuario' and contrasena=md5('$contrasena')";

            //se ejecuta la consulta a la base de datos 
            $sql= $this->conexion->query($consulta);
            $alumno = new Alumno();
            if (!empty($sql)) {
                //retorna la fila consultada a la base de datos
                $registro=mysqli_fetch_array($sql);

                if (!empty($registro['contrasena'])) {
                    $contrasena_usuario = $registro['contrasena'];

                    //se verifica si se encuentra el usuario
                    if (md5($contrasena)==$contrasena_usuario) {
                        // 
                        $alumno->setId($registro['id']);
                        $alumno->setNombre($registro['nombre']);
                        $alumno->setApellidos($registro['apellidos']);
                        $alumno->setSexo($registro['sexo']);
                        $alumno->setSemestre($registro['semestre']);
                        $alumno->setCarrera($registro['carrera']);
                        $alumno->setEdad($registro['edad']);
                        $alumno->setUsuario($registro['usuario']);
                        $alumno->setContrasena($registro['contrasena']);
                        $alumno->setNivelUsuario($registro['nivelUsuario']);
                    }
                }    
            }
            
            return $alumno;

        }

        //------------------------Obtener un solo alumno------------------------------
        public function obtenerUnAlumno($usuario){
            //consulta del usuario y la contraseña a la base de datos
            $consulta= "SELECT *FROM  alumno where usuario='$usuario'";

            //se ejecuta la consulta a la base de datos 
            $sql= $this->conexion->query($consulta);
            $alumno = new Alumno();
            
            if (!empty($sql)) {
                //retorna la fila consultada a la base de datos
                $registro=mysqli_fetch_array($sql);
                $usuario_recuperado = $registro['usuario'];


                //se verifica si se encuentra el usuario
                if ($usuario==$usuario_recuperado) {
                    // 
                    $alumno->setId($registro['id']);
                    $alumno->setNombre($registro['nombre']);
                    $alumno->setApellidos($registro['apellidos']);
                    $alumno->setSexo($registro['sexo']);
                    $alumno->setSemestre($registro['semestre']);
                    $alumno->setCarrera($registro['carrera']);
                    $alumno->setEdad($registro['edad']);
                    $alumno->setUsuario($registro['usuario']);
                    $alumno->setContrasena($registro['contrasena']);
                    $alumno->setNivelUsuario($registro['nivelUsuario']);
                }
            }
            return $alumno;
        }

        //---------------------- Buscar Alumnos-----------------------------
        function buscarAlumnos($busquedaAlumno) {
            $listaAlumnos = array();
            $consulta = "SELECT * FROM alumno WHERE id like '%$busquedaAlumno%' OR nombre like '%$busquedaAlumno%' or apellidos like '%$busquedaAlumno%' or semestre like '%$busquedaAlumno%' or carrera like '%$busquedaAlumno%'";
            $resultado = $this->conexion->query($consulta);
   
            while ($row = $resultado ->fetch_assoc()) {
               $alumno=new Alumno();

                $alumno->setId($row['id']);
                $alumno->setNombre($row['nombre']);
                $alumno->setApellidos($row['apellidos']);
                $alumno->setSexo($row['sexo']);
                $alumno->setSemestre($row['semestre']);
                $alumno->setCarrera($row['carrera']);
                $alumno->setEdad($row['edad']);
                $alumno->setUsuario($row['usuario']);
                $alumno->setContrasena($row['contrasena']);
                $alumno->setNivelUsuario($row['nivelUsuario']);


                array_push($listaAlumnos, $alumno);
            }

            return $listaAlumnos;
        }

        //---------------------- Total de Alumnos----------------------------
        function totalAlumnos(){
            $consulta = "SELECT * FROM alumno";
            if ($resultado=mysqli_query($this->conexion,$consulta)) {
                 $totalAlumno=mysqli_num_rows($resultado);
                 return  $totalAlumno; 
             }
         }


        //------------------------ Eliminar Alumno --------------------------------
        function eliminarAlumno($idAlumno) {
            $consulta = "DELETE FROM alumno WHERE id = '$idAlumno'";
            $this->conexion->query($consulta);

        }

        //________________________________________________________________________
        //::::::::::::::::::::::::::::::::::::Platillo::::::::::::::::::::::::::::
        //________________________________________________________________________
        
        //--------------------------Registro del platillo-------------------------
        public function registrarPlatillo($platillo)
        {   
            if ($platillo->getId() != -1) {    
                
              

                $datos= "'".$platillo->getNombre()."',";
                $datos.= "'".$platillo->getDescripcion()."',";
                $datos.= "'".$platillo->getTiempoPreparacion()."',";
                $datos.= "'".$platillo->getTiempoCoccion()."',";
                $datos.= "'".$platillo->getCaducidad()."',";
                $datos.= "'".$platillo->getPorciones()."',";
                $datos.= "'".$platillo->getCostoPromedio()."',";
                $datos.= "'".$platillo->getRendimiento()."',";
                $datos.= "'".$platillo->getTiempoComida()."',";
                $datos.= "'".$platillo->getAutor()."',";
                $datos.= "'".$platillo->getImagen()."',";
                $datos.= "'".$platillo->getIdAlumno()."',";
                $datos.= "'".$platillo->getIdUsuario()."',";
                $datos.= "'".$platillo->getIdAdministrador()."'";
                
                
                $insertar = "INSERT INTO platillo (nombre, descripcion, tiempoPreparacion, tiempoCoccion, caducidad, porciones, costoPromedio, rendimiento, tiempoComida, autor, imagen, idAlumno, idUsuario, idAdministrador) VALUES($datos)";
                
                $this->conexion->query($insertar);

                // Obtener el ID generado
                $idGenerado = $this->conexion->insert_id;

                // Crear un arreglo con la respuesta
                $response = array('id' => $idGenerado);

                // Establecer el encabezado para la respuesta JSON
                header('Content-Type: application/json');

                // Convertir la respuesta a JSON y enviarla
                echo json_encode($response);
            }
       
        }

        //--------------------------Actualización de los datos del platillo con imagen-------------------------
        public function actualizarDatosPlatilloI($platillo){

            $datos="nombre='".$platillo->getNombre()."',";
            $datos.="descripcion='".$platillo->getDescripcion()."',";
            $datos.="tiempoPreparacion='".$platillo->getTiempoPreparacion()."',";
            $datos.="tiempoCoccion='".$platillo->getTiempoCoccion()."',";
            $datos.="caducidad='".$platillo->getCaducidad()."',";
            $datos.="porciones='".$platillo->getPorciones()."',";
            $datos.="costoPromedio='".$platillo->getCostoPromedio()."',";
            $datos.="rendimiento='".$platillo->getRendimiento()."',";
            $datos.="tiempoComida='".$platillo->getTiempoComida()."',";
            $datos.="imagen='".$platillo->getImagen()."'";

            $actualizar="UPDATE platillo SET $datos where id='".$platillo->getId()."'";
            
            echo $actualizar;

            $this->conexion->query($actualizar);

        }

        //--------------------------Actualización de los datos del platillo sin imagen-------------------------
        public function actualizarDatosPlatillo($platillo){

            $datos="nombre='".$platillo->getNombre()."',";
            $datos.="descripcion='".$platillo->getDescripcion()."',";
            $datos.="tiempoPreparacion='".$platillo->getTiempoPreparacion()."',";
            $datos.="tiempoCoccion='".$platillo->getTiempoCoccion()."',";
            $datos.="caducidad='".$platillo->getCaducidad()."',";
            $datos.="porciones='".$platillo->getPorciones()."',";
            $datos.="costoPromedio='".$platillo->getCostoPromedio()."',";
            $datos.="rendimiento='".$platillo->getRendimiento()."',";
            $datos.="tiempoComida='".$platillo->getTiempoComida()."'";

            $actualizar="UPDATE platillo SET $datos where id='".$platillo->getId()."'";

            echo $actualizar;

            $this->conexion->query($actualizar);

        }

        //------Registro de los ingredientes del platillo------------------------
        public function registrarIngredientes($ingredientes){

            if ($ingredientes->getId() != -1) {    

                $datos= "'".$ingredientes->getNombre()."',";
                $datos.= "'".$ingredientes->getCantidad()."',";
                $datos.= "'".$ingredientes->getUnidadMedida()."',";
                $datos.= "'".$ingredientes->getIdPlatillo()."'";
    
                $insertar = "INSERT INTO ingredientes (nombre, cantidad, unidadMedida, idPlatillo) VALUES($datos)";
                
                $this->conexion->query($insertar);

            }
        }

        //------actualizar los ingredientes del platillo------------------------
        public function actualizarIngredientes($ingredientes){

            $datos="nombre='".$ingredientes->getNombre()."',";
            $datos.="cantidad='".$ingredientes->getCantidad()."',";
            $datos.="unidadMedida='".$ingredientes->getUnidadMedida()."'";
            $actualizar = "UPDATE ingredientes SET $datos WHERE id='".$ingredientes->getId()."' AND idPlatillo='".$ingredientes->getIdPlatillo()."'";


            $this->conexion->query($actualizar);
        }

        //---------------------- Eliminar Ingrediente del platillo-----------------------------
        function eliminarIngrediente($ingredienteId) {
            $consulta = "DELETE FROM ingredientes WHERE id = '$ingredienteId'";
            $this->conexion->query($consulta);

        }

        //------Registro de los utencilio del platillo------------------------
        public function registrarUtencilio($utencilio){

            if ($utencilio->getId() != -1) {    

                $datos= "'".$utencilio->getNombre()."',";
                $datos.= "'".$utencilio->getCantidad()."',";
                $datos.= "'".$utencilio->getIdPlatillo()."'";
    
                $insertar = "INSERT INTO utencilio (nombre, cantidad, idPlatillo) VALUES($datos)";
                
                $this->conexion->query($insertar);

            }
        }

        //------actualizar los utencilios del platillo------------------------
        public function actualizarUtencilio($utencilio){

            $datos="nombre='".$utencilio->getNombre()."',";
            $datos.="cantidad='".$utencilio->getCantidad()."'";
            $actualizar = "UPDATE utencilio SET $datos WHERE id='".$utencilio->getId()."' AND idPlatillo='".$utencilio->getIdPlatillo()."'";

            $this->conexion->query($actualizar);
        }

        //---------------------- Eliminar utencilio del platillo-----------------------------
        function eliminarUtencilio($utencilioId) {
            $consulta = "DELETE FROM utencilio WHERE id = '$utencilioId'";
            $this->conexion->query($consulta);

        }

        //------Registro de los preparacion del platillo con imagen------------------------
        public function registrarPreparacion($preparacion) {
            
            $datos = "'" . $preparacion->getPaso() . "', ";
            $datos .= "'" . $preparacion->getInstruccion() . "', ";
            $datos .= "'" . $preparacion->getFoto() . "', ";
            $datos .= "'" . $preparacion->getIdPlatillo() . "'";

            $insertar = "INSERT INTO preparacion (paso, instruccion, foto, idPlatillo) VALUES ($datos)";
            echo "Consulta SQL con imagen: $insertar";

            $this->conexion->query($insertar);
        }

        //------Registro de los preparacion del platillo sin imagen------------------------
        public function registrarPreparacionI($preparacion) {
            
            $datos = "'" . $preparacion->getPaso() . "', ";
            $datos .= "'" . $preparacion->getInstruccion() . "', ";
            $datos .= "'" .' '. "', ";
            $datos .= "'" . $preparacion->getIdPlatillo() . "'";

            $insertar = "INSERT INTO preparacion (paso, instruccion, foto, idPlatillo) VALUES ($datos)";
            
            echo "Consulta SQL sin imagen: $insertar";

        
            $this->conexion->query($insertar);
        }

        public function actualizarPreparacionI($preparacion){

            $datos="paso='".$preparacion->getPaso()."',";
            $datos.="instruccion ='".$preparacion->getInstruccion()."',";
            $datos.="foto='".$preparacion->getFoto()."'";
            $actualizar = "UPDATE preparacion SET $datos WHERE id='".$preparacion->getId()."' AND idPlatillo='".$preparacion->getIdPlatillo()."'";

            $this->conexion->query($actualizar);
        }

        public function actualizarPreparacion($preparacion){

            $datos="paso='".$preparacion->getPaso()."',";
            $datos.="instruccion ='".$preparacion->getInstruccion()."'";
            $actualizar = "UPDATE preparacion SET $datos WHERE id='".$preparacion->getId()."' AND idPlatillo='".$preparacion->getIdPlatillo()."'";

            $this->conexion->query($actualizar);
        }

        //------Registro de los ingredintes del nutriente------------------------
        public function registrarNutriente($nutriente){
            
            $datos= "'".$nutriente->getNombre()."',";
            $datos.= "'".$nutriente->getCantidadR()."',";
            $datos.= "'".$nutriente->getCantidadP()."',";
            $datos.= "'".$nutriente->getUnidadMedida()."',";
            $datos.= "'".$nutriente->getIdPlatillo()."'";

            $insertar = "INSERT INTO nutriente (nombre, cantidadR, cantidadP, unidadMedida, idPlatillo) VALUES($datos)";
                
            $this->conexion->query($insertar);
        }

        //------Actualizacion de nutrientes
        public function actualizarNutriente($nutriente){

            $datos="nombre='".$nutriente->getNombre()."',";
            $datos.="cantidadR='".$nutriente->getCantidadR()."',";
            $datos.="cantidadP='".$nutriente->getCantidadP()."',";
            $datos.="unidadMedida='".$nutriente->getUnidadMedida()."'";
            $actualizar = "UPDATE nutriente SET $datos WHERE id='".$nutriente->getId()."' AND idPlatillo='".$nutriente->getIdPlatillo()."'";

            $this->conexion->query($actualizar);
        }

        //------Eliminar nutriente del platillo --------
        public function eliminarNutriente($nutrienteId){
            $consulta = "DELETE FROM nutriente WHERE id = '$nutrienteId'";
            $this->conexion->query($consulta);
        }

        //------Registro de información del complemento------------------------
        public function registrarComplemento($complemento){

            $datos= "'".$complemento->getEstado()."',";
            $datos.= "'".$complemento->getRegion()."',";
            $datos.= "'".$complemento->getMunicipio()."',";
            $datos.= "'".$complemento->getLengua()."',";
            $datos.= "'".$complemento->getCultura()."',";
            $datos.= "'".$complemento->getIdPlatillo()."'";
    
            $insertar = "INSERT INTO complemento (estado, region,municipio, lengua,     cultura, idPlatillo) VALUES($datos)";
                
            $this->conexion->query($insertar);    
        }

        //------- Actualizacion de datos Complemento --------
        public function actualizarComplemento($complemento){

            $datos="estado='".$complemento->getEstado()."',";
            $datos.="region='".$complemento->getRegion()."',";
            $datos.="municipio='".$complemento->getMunicipio()."',";
            $datos.="lengua='".$complemento->getLengua()."',";
            $datos.="cultura='".$complemento->getCultura()."'";

            $actualizar = "UPDATE complemento SET $datos WHERE id='".$complemento->getId()."' AND idPlatillo='".$complemento->getIdPlatillo()."'";

            $this->conexion->query($actualizar);
        }

        //------Registro de datos de validacion------------------------
        public function registrarValidacion($validacion){

            $datos= "'".$validacion->getIdPlatillo()."',";
            $datos.= "'".$validacion->getSeccionDatos()."',";
            $datos.= "'".$validacion->getSeccionIngredientes()."',";
            $datos.= "'".$validacion->getSeccionUtencilio()."',";
            $datos.= "'".$validacion->getSeccionPreparacion()."',";
            $datos.= "'".$validacion->getSeccionNutriente()."',";
            $datos.= "'".$validacion->getSeccionComplemento()."',";
            $datos.= "'".' '."'";
    
            $insertar = "INSERT INTO validacion (idPlatillo, seccionDatos, seccionIngredientes, seccionUtencilio,     seccionPreparacion, seccionNutriente, seccionComplemento, nota) VALUES($datos)";

            echo $insertar;
                
            $this->conexion->query($insertar);    
        }
        //-----Validar las secciones de la infomacion de cada platillo---
        public function validarSeccionPlatillos($validacion){

            $datos="seccionDatos='".$validacion->getSeccionDatos()."',";
            $datos.="seccionIngredientes='".$validacion->getSeccionIngredientes()."',";
            $datos.="seccionUtencilio='".$validacion->getSeccionUtencilio()."',";
            $datos.="seccionPreparacion='".$validacion->getSeccionPreparacion()."',";
            $datos.="seccionNutriente='".$validacion->getSeccionNutriente()."',";
            $datos.="seccionComplemento='".$validacion->getSeccionComplemento()."',";
            $datos.="nota='".$validacion->getNota()."'";

            $actualizar = "UPDATE validacion SET $datos WHERE idPlatillo='".$validacion->getIdPlatillo()."'";

            $this->conexion->query($actualizar);
        }

        //-----Validar las secciones de la infomacion de cada platillo---
        public function validarSeccionPlatillosU($validacion){

            $datos="seccionDatos='".$validacion->getSeccionDatos()."',";
            $datos.="seccionIngredientes='".$validacion->getSeccionIngredientes()."',";
            $datos.="seccionUtencilio='".$validacion->getSeccionUtencilio()."',";
            $datos.="seccionPreparacion='".$validacion->getSeccionPreparacion()."',";
            $datos.="seccionComplemento='".$validacion->getSeccionComplemento()."',";
            $datos.="nota='".$validacion->getNota()."'";

            $actualizar = "UPDATE validacion SET $datos WHERE idPlatillo='".$validacion->getIdPlatillo()."'";

            $this->conexion->query($actualizar);
        }

        //------------------Consulta de platillos por cada alumno------------
        public function consultarPlatillosAlumno($id){
            
            $listaPlatillos= array();
            // Consulta SQL para obtener los platillos del alumno con el ID proporcionado
            $consulta = "SELECT * FROM platillo WHERE idAlumno = " . $id;
            $sql= $this->conexion->query($consulta);

            if ($sql->num_rows > 0) {

                while($row= $sql->fetch_assoc()){

                    $platillo = new Platillo();

                    $platillo->setId($row['id']);
                    $platillo->setNombre($row['nombre']);
                    $platillo->setDescripcion($row['descripcion']);
                    $platillo->setTiempoPreparacion($row['tiempoPreparacion']);
                    $platillo->setTiempoCoccion($row['tiempoCoccion']);
                    $platillo->setCaducidad($row['caducidad']);
                    $platillo->setPorciones($row['porciones']);
                    $platillo->setCostoPromedio($row['costoPromedio']);
                    $platillo->setRendimiento($row['rendimiento']);
                    $platillo->setTiempoComida($row['tiempoComida']);
                    $platillo->setAutor($row['autor']);
                    $platillo->setImagen($row['imagen']);
                    
                    array_push($listaPlatillos, $platillo);

                 }
                // Retornar la lista de platillos
                return $listaPlatillos;
            } 
        }

        //------------------Consulta de platillos por cada Usuario------------
        public function consultarPlatillosUsuario($id){
            
            $listaPlatillos= array();
            // Consulta SQL para obtener los platillos del usuario con el ID proporcionado
            $consulta = "SELECT * FROM platillo WHERE idUsuario = " . $id;
            $sql= $this->conexion->query($consulta);

            if ($sql->num_rows > 0) {

                while($row= $sql->fetch_assoc()){

                    $platillo = new Platillo();

                    $platillo->setId($row['id']);
                    $platillo->setNombre($row['nombre']);
                    $platillo->setDescripcion($row['descripcion']);
                    $platillo->setTiempoPreparacion($row['tiempoPreparacion']);
                    $platillo->setTiempoCoccion($row['tiempoCoccion']);
                    $platillo->setCaducidad($row['caducidad']);
                    $platillo->setPorciones($row['porciones']);
                    $platillo->setCostoPromedio($row['costoPromedio']);
                    $platillo->setRendimiento($row['rendimiento']);
                    $platillo->setTiempoComida($row['tiempoComida']);
                    $platillo->setAutor($row['autor']);
                    $platillo->setImagen($row['imagen']);
                    
                    array_push($listaPlatillos, $platillo);

                 }
                // Retornar la lista de platillos
                return $listaPlatillos;
            } 
        }

        public function listarPlatillosValidados(){
            $listaValidados = array(); // Cambio aquí

            $columnas = ['seccionDatos', 'seccionIngredientes', 'seccionUtencilio', 'seccionPreparacion', 'seccionNutriente', 'seccionComplemento'];
            $condiciones = implode(' = 4 OR ', $columnas) . ' = 4';
            
            // Construye la consulta final
            $consulta = "SELECT DISTINCT idPlatillo FROM validacion WHERE $condiciones";
            $sql = $this->conexion->query($consulta);

            if ($sql === false) {
                echo "Error en la consulta";
            }

            while ($row = $sql->fetch_assoc()) {
                $validacion = new Validacion();
                $validacion->setIdPlatillo($row['idPlatillo']);
                array_push($listaValidados, $validacion);
            }

            return $listaValidados;
        }


        //---------------------------Consulta del platillo------------------------
        public function consultarPlatillos(){

            $listaPlatillos = array();
            $listaValidados = $this->listarPlatillosValidados();

            foreach($listaValidados as $validacion){
                $id = $validacion->getIdPlatillo();
                $consulta = "SELECT * FROM platillo WHERE id = " . $id;
                $sql = $this->conexion->query($consulta);

                if ($sql === false) {
                    echo "Error en la consulta";
                }

                while($row = $sql->fetch_assoc()){
                    $platillo = new Platillo();

                    $platillo->setId($row['id']);
                    $platillo->setNombre($row['nombre']);
                    $platillo->setDescripcion($row['descripcion']);
                    $platillo->setTiempoPreparacion($row['tiempoPreparacion']);
                    $platillo->setTiempoCoccion($row['tiempoCoccion']);
                    $platillo->setCaducidad($row['caducidad']);
                    $platillo->setPorciones($row['porciones']);
                    $platillo->setCostoPromedio($row['costoPromedio']);
                    $platillo->setRendimiento($row['rendimiento']);
                    $platillo->setTiempoComida($row['tiempoComida']);
                    $platillo->setAutor($row['autor']);
                    $platillo->setImagen($row['imagen']);
                    $platillo->setIdAlumno($row['idAlumno']);
                    $platillo->setIdUsuario($row['idUsuario']);
                    $platillo->setIdAdministrador($row['idAdministrador']);

                    array_push($listaPlatillos, $platillo);
                }
            }

            return $listaPlatillos;

        }

        //------------Consulta del platillo de todos los alumnos------------------------
        public function consultarPlatillosAlumnos(){
            $listaPlatillosAlumnos= array();
            $consulta = "SELECT * FROM platillo WHERE idAlumno <> 0";
            $sql= $this->conexion->query($consulta);

            if ($sql=== false) {
                echo "Error en la consulta";
            }
            while($row= $sql->fetch_assoc()){

                $platillo = new Platillo();

                $platillo->setId($row['id']);
                $platillo->setNombre($row['nombre']);
                $platillo->setDescripcion($row['descripcion']);
                $platillo->setTiempoPreparacion($row['tiempoPreparacion']);
                $platillo->setTiempoCoccion($row['tiempoCoccion']);
                $platillo->setCaducidad($row['caducidad']);
                $platillo->setPorciones($row['porciones']);
                $platillo->setCostoPromedio($row['costoPromedio']);
                $platillo->setRendimiento($row['rendimiento']);
                $platillo->setTiempoComida($row['tiempoComida']);
                $platillo->setAutor($row['autor']);
                $platillo->setImagen($row['imagen']);
                $platillo->setIdAlumno($row['idAlumno']);
                $platillo->setIdUsuario($row['idUsuario']);
                $platillo->setIdAdministrador($row['idAdministrador']);


                array_push($listaPlatillosAlumnos, $platillo);

             }
             return $listaPlatillosAlumnos;
        }

        //------------Consulta del platillo de todos los usuarios------------------------
        public function consultarPlatillosUsuarios(){
            $listaPlatillosUsuarios= array();
            $consulta = "SELECT * FROM platillo WHERE idUsuario <> 0";
            $sql= $this->conexion->query($consulta);

            if ($sql=== false) {
                echo "Error en la consulta";
            }
            while($row= $sql->fetch_assoc()){

                $platillo = new Platillo();

                $platillo->setId($row['id']);
                $platillo->setNombre($row['nombre']);
                $platillo->setDescripcion($row['descripcion']);
                $platillo->setTiempoPreparacion($row['tiempoPreparacion']);
                $platillo->setTiempoCoccion($row['tiempoCoccion']);
                $platillo->setCaducidad($row['caducidad']);
                $platillo->setPorciones($row['porciones']);
                $platillo->setCostoPromedio($row['costoPromedio']);
                $platillo->setRendimiento($row['rendimiento']);
                $platillo->setTiempoComida($row['tiempoComida']);
                $platillo->setAutor($row['autor']);
                $platillo->setImagen($row['imagen']);
                $platillo->setIdAlumno($row['idAlumno']);
                $platillo->setIdUsuario($row['idUsuario']);
                $platillo->setIdAdministrador($row['idAdministrador']);


                array_push($listaPlatillosUsuarios, $platillo);

             }
             return $listaPlatillosUsuarios;
        }

        //------------Consulta del platillo de todos los usuarios------------------------
        public function consultarPlatillosAdministrador(){
            $listaPlatillosAdministrador= array();
            $consulta = "SELECT * FROM platillo WHERE idAdministrador <> 0";
            $sql= $this->conexion->query($consulta);

            if ($sql=== false) {
                echo "Error en la consulta";
            }
            while($row= $sql->fetch_assoc()){

                $platillo = new Platillo();

                $platillo->setId($row['id']);
                $platillo->setNombre($row['nombre']);
                $platillo->setDescripcion($row['descripcion']);
                $platillo->setTiempoPreparacion($row['tiempoPreparacion']);
                $platillo->setTiempoCoccion($row['tiempoCoccion']);
                $platillo->setCaducidad($row['caducidad']);
                $platillo->setPorciones($row['porciones']);
                $platillo->setCostoPromedio($row['costoPromedio']);
                $platillo->setRendimiento($row['rendimiento']);
                $platillo->setTiempoComida($row['tiempoComida']);
                $platillo->setAutor($row['autor']);
                $platillo->setImagen($row['imagen']);
                $platillo->setIdAlumno($row['idAlumno']);
                $platillo->setIdUsuario($row['idUsuario']);
                $platillo->setIdAdministrador($row['idAdministrador']);


                array_push($listaPlatillosAdministrador, $platillo);

             }
             return $listaPlatillosAdministrador;
        }

       
        //----------Buscar platillos pujblicados por alumnos
        public function buscarPlatillosAlumnos($terminoBusqueda){
            $listaPlatillosAlumnos = array();
            $consulta = "SELECT * FROM platillo WHERE idAlumno <> 0 AND (id LIKE '%$terminoBusqueda%' OR nombre LIKE '%$terminoBusqueda%')";
            $sql = $this->conexion->query($consulta);

            if ($sql === false) {
                echo "Error en la consulta";
            }

            while($row = $sql->fetch_assoc()){
                $platillo = new Platillo();

                $platillo->setId($row['id']);
                $platillo->setNombre($row['nombre']);
                $platillo->setDescripcion($row['descripcion']);
                $platillo->setTiempoPreparacion($row['tiempoPreparacion']);
                $platillo->setTiempoCoccion($row['tiempoCoccion']);
                $platillo->setCaducidad($row['caducidad']);
                $platillo->setPorciones($row['porciones']);
                $platillo->setCostoPromedio($row['costoPromedio']);
                $platillo->setRendimiento($row['rendimiento']);
                $platillo->setTiempoComida($row['tiempoComida']);
                $platillo->setAutor($row['autor']);
                $platillo->setImagen($row['imagen']);
                $platillo->setIdAlumno($row['idAlumno']);
                $platillo->setIdUsuario($row['idUsuario']);
                $platillo->setIdAdministrador($row['idAdministrador']);

                array_push($listaPlatillosAlumnos, $platillo);
            }

            return $listaPlatillosAlumnos;
        }

        //----------Buscar platillos pujblicados por usuario
        public function buscarPlatillosUsuarios($terminoBusqueda){
            $listaPlatillosUsuariosB = array();
            $consulta = "SELECT * FROM platillo WHERE idUsuario <> 0 AND (id LIKE '%$terminoBusqueda%' OR nombre LIKE '%$terminoBusqueda%')";
            $sql = $this->conexion->query($consulta);

            if ($sql === false) {
                echo "Error en la consulta";
            }

            while($row = $sql->fetch_assoc()){
                $platillo = new Platillo();

                $platillo->setId($row['id']);
                $platillo->setNombre($row['nombre']);
                $platillo->setDescripcion($row['descripcion']);
                $platillo->setTiempoPreparacion($row['tiempoPreparacion']);
                $platillo->setTiempoCoccion($row['tiempoCoccion']);
                $platillo->setCaducidad($row['caducidad']);
                $platillo->setPorciones($row['porciones']);
                $platillo->setCostoPromedio($row['costoPromedio']);
                $platillo->setRendimiento($row['rendimiento']);
                $platillo->setTiempoComida($row['tiempoComida']);
                $platillo->setAutor($row['autor']);
                $platillo->setImagen($row['imagen']);
                $platillo->setIdAlumno($row['idAlumno']);
                $platillo->setIdUsuario($row['idUsuario']);
                $platillo->setIdAdministrador($row['idAdministrador']);

                array_push($listaPlatillosUsuariosB, $platillo);
            }

            return $listaPlatillosUsuariosB;
        }

        //----------Buscar platillos pujblicados por el administrador
        public function buscarPlatillosAdministrador($terminoBusqueda){
            $listaPlatillosAdministrador = array();
            $consulta = "SELECT * FROM platillo WHERE idAdministrador <> 0 AND (id LIKE '%$terminoBusqueda%' OR nombre LIKE '%$terminoBusqueda%')";
            $sql = $this->conexion->query($consulta);

            if ($sql === false) {
                echo "Error en la consulta";
            }

            while($row = $sql->fetch_assoc()){
                $platillo = new Platillo();

                $platillo->setId($row['id']);
                $platillo->setNombre($row['nombre']);
                $platillo->setDescripcion($row['descripcion']);
                $platillo->setTiempoPreparacion($row['tiempoPreparacion']);
                $platillo->setTiempoCoccion($row['tiempoCoccion']);
                $platillo->setCaducidad($row['caducidad']);
                $platillo->setPorciones($row['porciones']);
                $platillo->setCostoPromedio($row['costoPromedio']);
                $platillo->setRendimiento($row['rendimiento']);
                $platillo->setTiempoComida($row['tiempoComida']);
                $platillo->setAutor($row['autor']);
                $platillo->setImagen($row['imagen']);
                $platillo->setIdAlumno($row['idAlumno']);
                $platillo->setIdUsuario($row['idUsuario']);
                $platillo->setIdAdministrador($row['idAdministrador']);

                array_push($listaPlatillosAdministrador, $platillo);
            }

            return $listaPlatillosAdministrador;
        }
        //---------------------- Buscar entre todos lo platillos-----------------------------
        function buscarPlatillos($buscarPlatillos) {
            $listaPlatillos = array();
            $consulta = "SELECT * FROM platillo WHERE id like '%$buscarPlatillos%' OR nombre like '%$buscarPlatillos%'";
            $resultado = $this->conexion->query($consulta);
   
            while ($row = $resultado ->fetch_assoc()) {
               $platillo = new Platillo();
    
                $platillo->setId($row['id']);
                $platillo->setNombre($row['nombre']);
                $platillo->setDescripcion($row['descripcion']);
                $platillo->setTiempoPreparacion($row['tiempoPreparacion']);
                $platillo->setTiempoCoccion($row['tiempoCoccion']);
                $platillo->setCaducidad($row['caducidad']);
                $platillo->setPorciones($row['porciones']);
                $platillo->setCostoPromedio($row['costoPromedio']);
                $platillo->setRendimiento($row['rendimiento']);
                $platillo->setTiempoComida($row['tiempoComida']);
                $platillo->setAutor($row['autor']);
                $platillo->setImagen($row['imagen']);
                $platillo->setIdAlumno($row['idAlumno']);
                $platillo->setIdUsuario($row['idUsuario']);
                $platillo->setIdAdministrador($row['idAdministrador']);


                array_push($listaPlatillos, $platillo);
            }

            return $listaPlatillos;
        }

        //---------------------- Total de PLatillos----------------------------
        function totalPlatillos(){
            $consulta = "SELECT * FROM platillo";
            if ($resultado=mysqli_query($this->conexion,$consulta)) {
                 $totalPlatillo=mysqli_num_rows($resultado);
                 return  $totalPlatillo; 
            }
        }

        //--------------------Eliminar Platillo-------------------------
        function eliminarPlatillo($idPlatillo) {
         

                // Eliminar comentarios relacionados al platillo
                $consulta = "DELETE FROM comentario WHERE idPlatillo = '$idPlatillo'";
                $this->conexion->query($consulta);

                // Eliminar ingredientes relacionado al platillo
                $consulta = "DELETE FROM ingredientes WHERE idPlatillo = '$idPlatillo'";
                $this->conexion->query($consulta);

                // Eliminar preparación relacionada al platillo
                $consulta = "DELETE FROM preparacion WHERE idPlatillo = '$idPlatillo'";
                $this->conexion->query($consulta);

                // Eliminar utensilios relacionados al platillo
                $consulta = "DELETE FROM utencilio WHERE idPlatillo = '$idPlatillo'";
                $this->conexion->query($consulta);

                // Eliminar nutrientes relacionados al platillo
                $consulta = "DELETE FROM nutrientes WHERE idPlatillo = '$idPlatillo'";
                $this->conexion->query($consulta);

                // Eliminar complementos relacionados al platillo
                $consulta = "DELETE FROM complemento WHERE idPlatillo = '$idPlatillo'";
                $this->conexion->query($consulta);

                // Eliminar favoritos relacionados al platillo
                $consulta = "DELETE FROM favoritos  WHERE idPlatillo = '$idPlatillo'";
                $this->conexion->query($consulta);

                // Eliminar validacion relacionados al platillo
                $consulta = "DELETE FROM validacion  WHERE idPlatillo = '$idPlatillo'";
                $this->conexion->query($consulta);

                // Eliminar el platillo principal
                $consulta = "DELETE FROM platillo WHERE id = '$idPlatillo'";
                $this->conexion->query($consulta);

        }


        //----------------Mostrar platillo ----------------
        function mostrarPlatillo($idPlatilloMostrar){
            //creacion del objeto platillo
            $platillo = new Platillo();

            /*Se realiza la consulta*/
            $consulta = "SELECT *FROM  platillo where id='$idPlatilloMostrar'";
            
            //se ejecuta la consulta a la base de datos 
            $sql= $this->conexion->query($consulta);

            while ($row = $sql->fetch_assoc()) {
                //se agregan las propiedas del objeto
                $platillo->setId($row['id']);
                $platillo->setNombre($row['nombre']);
                $platillo->setDescripcion($row['descripcion']);
                $platillo->setTiempoPreparacion($row['tiempoPreparacion']);
                $platillo->setTiempoCoccion($row['tiempoCoccion']);
                $platillo->setCaducidad($row['caducidad']);
                $platillo->setPorciones($row['porciones']);
                $platillo->setCostoPromedio($row['costoPromedio']);
                $platillo->setRendimiento($row['rendimiento']);
                $platillo->setTiempoComida($row['tiempoComida']);
                $platillo->setAutor($row['autor']);
                $platillo->setImagen($row['imagen']);
                $platillo->setIdAlumno($row['idAlumno']);
            }         
               
            return $platillo;
        }

        //----------------Mostrar ingredientes del platillo ----------------
        function mostrarIngredintes($idPlatillo){
            $listaIngredintes= array();
            /*Se realiza la consulta*/
            $consulta = "SELECT *FROM  ingredientes where idPlatillo='$idPlatillo'";
            $sql= $this->conexion->query($consulta);

            if ($sql=== false) {
                echo "Error en la consulta";
            }
            while($row= $sql->fetch_assoc()){

                $ingredientes = new Ingredientes();

                $ingredientes->setId($row['id']);
                $ingredientes->setNombre($row['nombre']);
                $ingredientes->setCantidad($row['cantidad']);
                $ingredientes->setUnidadMedida($row['unidadMedida']);
                $ingredientes->setIdPlatillo($row['idPlatillo']);
                             
                array_push($listaIngredintes, $ingredientes);

             }
             return $listaIngredintes;
        }

        //----------------Mostrar preparacion del platillo ----------------
        function mostrarPreparacion($idPlatillo){
            $listaPreparacion= array();
            /*Se realiza la consulta*/
            $consulta = "SELECT *FROM  preparacion where idPlatillo='$idPlatillo'";
            $sql= $this->conexion->query($consulta);

            if ($sql=== false) {
                echo "Error en la consulta";
            }
            while($row= $sql->fetch_assoc()){

                $preparacion = new Preparacion();

                $preparacion->setId($row['id']);
                $preparacion->setPaso($row['paso']);
                $preparacion->setInstruccion($row['instruccion']);
                $preparacion->setFoto($row['foto']);
                              
                array_push($listaPreparacion, $preparacion);

             }
             return $listaPreparacion;
        }

        //----------------Mostrar utencilios  para el platillo ----------------
        function mostrarUtencilio($idPlatillo){
            $listaUtencilio= array();
            /*Se realiza la consulta*/
            $consulta = "SELECT *FROM  utencilio where idPlatillo='$idPlatillo'";
            $sql= $this->conexion->query($consulta);

            if ($sql=== false) {
                echo "Error en la consulta";
            }
            while($row= $sql->fetch_assoc()){

                $utencilio = new Utencilio();

                $utencilio->setId($row['id']);
                $utencilio->setNombre($row['nombre']);
                $utencilio->setCantidad($row['cantidad']);
                              
                array_push($listaUtencilio, $utencilio);

             }
             return $listaUtencilio;
        }

        //----------------Mostrar los nutrientes del platillo ----------------
        function mostrarNutriente($idPlatillo){
            $listaNutriente= array();
            /*Se realiza la consulta*/
            $consulta = "SELECT *FROM  nutriente where idPlatillo='$idPlatillo'";
            $sql= $this->conexion->query($consulta);

            if ($sql=== false) {
                echo "Error en la consulta";
            }
            while($row= $sql->fetch_assoc()){

                $nutriente = new Nutriente();

                $nutriente->setId($row['id']);
                $nutriente->setNombre($row['nombre']);
                $nutriente->setCantidadR($row['cantidadR']);
                $nutriente->setCantidadP($row['cantidadP']);
                $nutriente->setUnidadMedida($row['unidadMedida']);

                array_push($listaNutriente, $nutriente);

             }
             return $listaNutriente;
        }
        //----------------Mostrar informacion adicional ----------------
        function mostrarComplemento($idPlatillo){
           
            /*Se realiza la consulta*/
            $consulta = "SELECT *FROM  complemento where idPlatillo='$idPlatillo'";
            
            //se ejecuta la consulta a la base de datos 
            $sql= $this->conexion->query($consulta);

            while ($row = $sql->fetch_assoc()) {

                //creacion del objeto platillo
                $complemento = new Complemento();

                //se agregan las propiedas del objeto
                $complemento->setId($row['id']);
                $complemento->setEstado($row['estado']);
                $complemento->setRegion($row['region']);
                $complemento->setMunicipio($row['municipio']);
                $complemento->setLengua($row['lengua']);
                $complemento->setCultura($row['cultura']);
                $complemento->setIdPlatillo($row['idPlatillo']);
            }         
               
            return $complemento;
        }



        //----------------Mostrar informacion de validacion ----------------
        function mostrarValidacion($idPlatillo){
            //creacion del objeto platillo
            $validacion = new Validacion();

            /*Se realiza la consulta*/
            $consulta = "SELECT *FROM  validacion where idPlatillo='$idPlatillo'";
            
            //se ejecuta la consulta a la base de datos 
            $sql= $this->conexion->query($consulta);

            while ($row = $sql->fetch_assoc()) {
                //se agregan las propiedas del objeto
                $validacion->setId($row['id']);
                $validacion->setIdPlatillo($row['idPlatillo']);
                $validacion->setSeccionDatos($row['seccionDatos']);
                $validacion->setSeccionIngredientes($row['seccionIngredientes']);
                $validacion->setSeccionUtencilio($row['seccionUtencilio']);
                $validacion->setSeccionPreparacion($row['seccionPreparacion']);
                $validacion->setSeccionNutriente($row['seccionNutriente']);
                $validacion->setSeccionComplemento($row['seccionComplemento']);
                $validacion->setNota($row['nota']);
            }         
               
            return $validacion;
        }

         //__________________________________________________________
        //:::::::::::::::::::: Encuesta ::::::::::::::::::::::::::
        public function registrarEncuesta($encuesta){
             if ($encuesta->getId() != -1) {     
              
                $datos= "'".$encuesta->getNombre()."',";
                $datos.= "'".$encuesta->getSexo()."',";
                $datos.= "'".$encuesta->getEdad()."',";
                $datos.= "'".$encuesta->getMedio()."',";
                $datos.= "'".$encuesta->getEstado()."',";
                $datos.= "'".$encuesta->getMunicipio()."',";
                $datos.= "'".$encuesta->getComentario()."',";
                $datos.= "'".$encuesta->getCalificacion()."',";
                $datos.= "'".$encuesta->getFecha()."'";
               

                $insertar = "INSERT INTO encuesta (nombre, sexo, edad, medio, estado, municipio, comentario, calificacion, fecha) VALUES ($datos)";
                echo $insertar;
                $this->conexion->query($insertar);
            }

        }


        //---------------------------Consulta de la encuesta------------------------
        public function consultarEncuesta(){
            $listaEncuesta= array();
            $consulta = "SELECT * FROM encuesta";
            $sql= $this->conexion->query($consulta);

            if ($sql=== false) {
                echo "Error en la consulta";
            }
            
            while($row= $sql->fetch_assoc()){

                $encuesta = new Encuesta();

                $encuesta->setId($row['id']);
                $encuesta->setNombre($row['nombre']);
                $encuesta->setSexo($row['sexo']);
                $encuesta->setEdad($row['edad']);
                $encuesta->setMedio($row['medio']);
                $encuesta->setEstado($row['estado']);
                $encuesta->setMunicipio($row['municipio']);
                $encuesta->setComentario($row['comentario']);
                $encuesta->setCalificacion($row['calificacion']);
                $encuesta->setFecha($row['fecha']);
                


                array_push($listaEncuesta, $encuesta);

             }
             return $listaEncuesta;
        }

        //Funcion para graficar cantidad de hombres y mujeres.
        public function contarGenerosEncuesta(){
            $consulta = "SELECT sexo, COUNT(*) as cantidad FROM encuesta GROUP BY sexo";
            $resultados = $this->conexion->query($consulta);

            if ($resultados === false) {
                echo "Error en la consulta";
                return false;
            }

            $datosGeneros = array();
            while($row = $resultados->fetch_assoc()){
                $datosGeneros[$row['sexo']] = $row['cantidad'];
            }

            return $datosGeneros;
        }

        //---Funcion para graficar medios de comunicacion 
        public function contarCategoriasMediosEncuesta(){
            $consulta = "SELECT medio, COUNT(*) as cantidad FROM encuesta GROUP BY medio";
            $resultados = $this->conexion->query($consulta);

            if ($resultados === false) {
                echo "Error en la consulta";
                return false;
            }

            $datosMedios = array();
            while($row = $resultados->fetch_assoc()){
                $datosMedios[$row['medio']] = $row['cantidad'];
            }

            return $datosMedios;
        }

        // Función para contar y agrupar los datos de la columna "estado"
        public function contarEstadosEncuesta(){
            $consulta = "SELECT estado, COUNT(*) as cantidad FROM encuesta GROUP BY estado";
            $resultados = $this->conexion->query($consulta);

            if ($resultados === false) {
                echo "Error en la consulta";
                return false;
            }

            $datosEstados = array();
            while($row = $resultados->fetch_assoc()){
                $datosEstados[$row['estado']] = $row['cantidad'];
            }

            return $datosEstados;
        }

        // Función para contar y agrupar los datos de la columna "calificacion"
        public function contarCalificacionesEncuesta(){
            $consulta = "SELECT calificacion, COUNT(*) as cantidad FROM encuesta GROUP BY calificacion";
            $resultados = $this->conexion->query($consulta);

            if ($resultados === false) {
                echo "Error en la consulta";
                return false;
            }

            $datosCalificaciones = array();
            while($row = $resultados->fetch_assoc()){
                $datosCalificaciones[$row['calificacion']] = $row['cantidad'];
            }

            return $datosCalificaciones;
        }


        //__________________________________________________________
        //:::::::::::::::::::: Comentario ::::::::::::::::::::::::::

        public function registrarComentario($comentario){
             if ($comentario->getId() != -1) {     
              
                $datos= "'".$comentario->getNombre()."',";
                $datos.= "'".nl2br($comentario->getComentario())."',";
                $datos.= "'".$comentario->getCalificacion()."',";
                $datos.= "'".$comentario->getCocinado()."',";
                $datos.= "'".$comentario->getFoto()."',";
                $datos.= "'".$comentario->getFecha()."',";
                $datos.= "'".$comentario->getIdPlatillo()."',";
                $datos.= "'".$comentario->getIdUsuario()."'";
               

                $insertar = "INSERT INTO comentario (nombre, comentario, calificacion, cocinado, foto, fecha, idPlatillo, idUsuario) VALUES ($datos)";
                //echo $insertar;
                $this->conexion->query($insertar);
            }

        }
        /* Registrar comentario sin imagen*/
         public function registrarComentarioSF($comentario){
             if ($comentario->getId() != -1) {     
              
                $datos= "'".$comentario->getNombre()."',";
                $datos.= "'".nl2br($comentario->getComentario())."',";
                $datos.= "'".$comentario->getCalificacion()."',";
                $datos.= "'".$comentario->getCocinado()."',";
                $datos.= "'".$comentario->getFoto()."',";
                $datos.= "'".$comentario->getFecha()."',";
                $datos.= "'".$comentario->getIdPlatillo()."',";
                $datos.= "'".$comentario->getIdUsuario()."'";
                $insertar = "INSERT INTO comentario (nombre, comentario, calificacion, cocinado, foto, fecha, idPlatillo, idUsuario) VALUES ($datos)";
                //echo $insertar;
                $this->conexion->query($insertar);
            }

        }

        //---------------------------Consulta de los comentarios-----------------------
        public function consultarComentarios(){
            $listaComentarios= array();
            $consulta = "SELECT * FROM comentario";
            $sql= $this->conexion->query($consulta);
            if ($sql=== false) {
                echo "Error en la consulta";
            }
            
            while($row= $sql->fetch_assoc()){
                $comentario = new Comentario();

                $comentario->setId($row['id']);
                $comentario->setNombre($row['nombre']);
                $comentario->setComentario($row['comentario']);
                $comentario->setCalificacion($row['calificacion']);
                $comentario->setCocinado($row['cocinado']);
                $comentario->setFoto($row['foto']);
                $comentario->setFecha($row['fecha']);
                $comentario->setIdPlatillo($row['idPlatillo']);
                array_push($listaComentarios, $comentario);

             }
             return $listaComentarios;
        }
        //---------------------------Consulta de los comentarios por id-----------------------
        public function consultarComentarioId($idComentario){

            $listaComentario= array();
            $consulta= "SELECT *FROM  comentario where idPlatillo='$idComentario'";
            $sql= $this->conexion->query($consulta);

            if ($sql=== false) {
                echo "Error en la consulta";
            }
            while($row= $sql->fetch_assoc()){

                $comentario = new Comentario();

                $comentario->setId($row['id']);
                $comentario->setNombre($row['nombre']);
                $comentario->setComentario($row['comentario']);
                $comentario->setCalificacion($row['calificacion']);
                $comentario->setCocinado($row['cocinado']);
                $comentario->setFoto($row['foto']);
                $comentario->setFecha($row['fecha']);
                $comentario->setIdPlatillo($row['idPlatillo']);


                array_push($listaComentario, $comentario);

             }
             return $listaComentario;
        }
        
        //__________________________________________________________
        //::::::::::: Vistas en la plataforma:::::::::::
        public function visitasReales($ip){

            $consulta = "SELECT * FROM visitas WHERE ip='$ip'";
            $rs_visita_real = $this->conexion->query($consulta);
            //retorna la fila consultada a la base de datos
            $registro=mysqli_fetch_array($rs_visita_real);
            $direccionIP = $registro['ip'];

            if($ip==$direccionIP){                
                $hoy = date("Y-m-d");
                $insertar = "INSERT INTO visitas (ip, fecha, num) VALUES ('$ip', '$hoy', 1)";
                $this->conexion->query($insertar);
            }
            else{
                $hoy = date("Y-m-d");
                $insertar = "INSERT INTO visitas (ip, fecha, num) VALUES ('$ip', '$hoy', 0)";
                $this->conexion->query($insertar);
            }
        }

        //---------------------- Total de visitas----------------------------
        function totalVistas(){
            $consulta = "SELECT * FROM visitas";
            if ($resultado=mysqli_query($this->conexion,$consulta)) {
                 $totalVisita=mysqli_num_rows($resultado);
                 return  $totalVisita; 
            }
        }
        //---------------------- Total de visitantes----------------------------
        function totalVistantes(){
            $num=0;
            $consulta = "SELECT * FROM visitas where num='$num'";
            if ($resultado=mysqli_query($this->conexion,$consulta)) {
                    $totalVisitante=mysqli_num_rows($resultado);
                    return  $totalVisitante; 
            }
        }

        //---------------------- Total de comentarios----------------------------
        function totalComentarios(){
            
            $consulta = "SELECT * FROM comentario";
            if ($resultado=mysqli_query($this->conexion,$consulta)) {
                    $totalComentario=mysqli_num_rows($resultado);
                    return  $totalComentario; 
            }
        }

        //-------- Total de visitas mes por Mes y año------------------
        function obtenerRangoDeFechas() {
            $consulta = "SELECT MIN(YEAR(fecha)) as ano_minimo, MAX(YEAR(fecha)) as ano_maximo FROM visitas";
            if ($resultado = mysqli_query($this->conexion, $consulta)) {
                $row = mysqli_fetch_assoc($resultado);
                return $row;
            }
        }

        function totalVisitasPorMes($ano, $mes) {
            $primerDia = $ano . '-' . $mes . '-01';
            $ultimoDia = $ano . '-' . $mes . '-31'; // Esto asume un mes con 31 días, ajusta según tus necesidades

            $consulta = "SELECT * FROM visitas WHERE fecha BETWEEN '$primerDia' AND '$ultimoDia'";
            if ($resultado = mysqli_query($this->conexion, $consulta)) {
                return mysqli_num_rows($resultado);
            }
        }
       
        //__________________________________________________________
        //::::::::::: Inicio de sesión del administrador :::::::::::

        public function obtenerAdministrador($usuario, $contrasena){
            //consulta del usuario y la contraseña a la base de datos
            $consulta= "SELECT *FROM  administrador where usuario='$usuario' and contrasena=md5('$contrasena')";
            //se ejecuta la consulta a la base de datos 
            $sql= $this->conexion->query($consulta);
            
            $administrador = new Administrador();

            if (!empty($sql)) {
                //retorna la fila consultada a la base de datos
                $registro=mysqli_fetch_array($sql);

                if (!empty($registro['contrasena'])) {
                    $contrasena_usuario = $registro['contrasena'];
                    
                    //se verifica si se encuentra el usuario
                    if (md5($contrasena)==$contrasena_usuario) {
                        // 
                        $administrador->setId($registro['id']);            
                        $administrador->setUsuario($registro['usuario']);
                        $administrador->setContrasena($registro['contrasena']);
                        $administrador->setNivelUsuario($registro['nivelUsuario']);
                    }
                }
            }
            return $administrador;
        }
    } 
?>
