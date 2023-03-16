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
                $datos.= "'".nl2br($platillo->getIngredientes())."',";
                $datos.= "'".nl2br($platillo->getUtencilios())."',";
                $datos.= "'".$platillo->getTiempopreparacion()."',";
                $datos.= "'".$platillo->getCaducidad()."',";
                $datos.= "'".$platillo->getPorciones()."',";
                $datos.= "'".$platillo->getEnergia()."',";
                $datos.= "'".$platillo->getCostopromedio()."',";
                $datos.= "'".$platillo->getRendimiento()."',";
                $datos.= "'".$platillo->getProteinas()."',";
                $datos.= "'".$platillo->getGrasas()."',";
                $datos.= "'".$platillo->getHidratoscarbono()."',";
                $datos.= "'".nl2br($platillo->getPreparacion())."',";
                $datos.= "'".$platillo->getTipocomida()."',";
                $datos.= "'".$platillo->getAutor()."',";
                $datos.= "'".$platillo->getImagen()."'";
                
                $insertar = "INSERT INTO platillo (nombre, ingredientes, utencilios, tiempopreparacion, caducidad, porciones, energia, costopromedio, rendimiento, proteinas, grasas, hidratoscarbono, preparacion, tipocomida, autor,imagen) VALUES($datos)";
                //echo $insertar;

                $this->conexion->query($insertar);

            }
       
        }

        //---------------------------Consulta del platillo------------------------
        public function consultarPlatillos(){
            $listaPlatillos= array();
            $consulta = "SELECT * FROM platillo";
            $sql= $this->conexion->query($consulta);

            if ($sql=== false) {
                echo "Error en la consulta";
            }
             while($row= $sql->fetch_assoc()){

                $platillo = new Platillo();

                $platillo->setId($row['id']);
                $platillo->setNombre($row['nombre']);
                $platillo->setIngredientes($row['ingredientes']);
                $platillo->setUtencilios($row['utencilios']);
                $platillo->setTiempopreparacion($row['tiempopreparacion']);
                $platillo->setCaducidad($row['caducidad']);
                $platillo->setPorciones($row['porciones']);
                $platillo->setEnergia($row['energia']);
                $platillo->setCostopromedio($row['costopromedio']);
                $platillo->setRendimiento($row['rendimiento']);
                $platillo->setProteinas($row['proteinas']);
                $platillo->setGrasas($row['grasas']);
                $platillo->setHidratoscarbono($row['hidratoscarbono']);
                $platillo->setPreparacion($row['preparacion']);
                $platillo->setTipocomida($row['tipocomida']);
                $platillo->setAutor($row['autor']);
                $platillo->setImagen($row['imagen']);


                array_push($listaPlatillos, $platillo);

             }
             return $listaPlatillos;
        }

        //---------------------Editar Platillo-----------------------------
        public function editarPlatillo($platillo){   

            $datos= "id='".$platillo->getId()."',";
            $datos.= "nombre='".$platillo->getNombre()."',";
            $datos.= "ingredientes='".nl2br($platillo->getIngredientes())."',";
            $datos.= "utencilios='".nl2br($platillo->getUtencilios())."',";
            $datos.= "tiempopreparacion='".$platillo->getTiempopreparacion()."',";
            $datos.= "caducidad='".$platillo->getCaducidad()."',";
            $datos.= "porciones='".$platillo->getPorciones()."',";
            $datos.= "energia='".$platillo->getEnergia()."',";
            $datos.= "costopromedio='".$platillo->getCostopromedio()."',";
            $datos.= "rendimiento='".$platillo->getRendimiento()."',";
            $datos.= "proteinas='".$platillo->getProteinas()."',";
            $datos.= "grasas='".$platillo->getGrasas()."',";
            $datos.= "hidratoscarbono='".$platillo->getHidratoscarbono()."',";
            $datos.= "preparacion='".nl2br($platillo->getPreparacion())."',";
            $datos.= "tipocomida='".$platillo->getTipocomida()."',";
            $datos.= "autor='".$platillo->getAutor()."',";
            $datos.= "imagen='".$platillo->getImagen()."'";

          
            $actualizar= "UPDATE platillo SET $datos where id='".$platillo->getId()."'";

            //echo $actualizar;

            $this->conexion->query($actualizar);
       
        }

        //---------------------Editar Platillo-----------------------------
        public function editarPlatilloI($platillo){   

            $datos= "id='".$platillo->getId()."',";
            $datos.= "nombre='".$platillo->getNombre()."',";
            $datos.= "ingredientes='".nl2br($platillo->getIngredientes())."',";
            $datos.= "utencilios='".nl2br($platillo->getUtencilios())."',";
            $datos.= "tiempopreparacion='".$platillo->getTiempopreparacion()."',";
            $datos.= "caducidad='".$platillo->getCaducidad()."',";
            $datos.= "porciones='".$platillo->getPorciones()."',";
            $datos.= "energia='".$platillo->getEnergia()."',";
            $datos.= "costopromedio='".$platillo->getCostopromedio()."',";
            $datos.= "rendimiento='".$platillo->getRendimiento()."',";
            $datos.= "proteinas='".$platillo->getProteinas()."',";
            $datos.= "grasas='".$platillo->getGrasas()."',";
            $datos.= "hidratoscarbono='".$platillo->getHidratoscarbono()."',";
            $datos.= "preparacion='".nl2br($platillo->getPreparacion())."',";
            $datos.= "tipocomida='".$platillo->getTipocomida()."',";
            $datos.= "autor='".$platillo->getAutor()."'";
            //$datos.= "imagen='".$platillo->getImagen()."'";

          
            $actualizar= "UPDATE platillo SET $datos where id='".$platillo->getId()."'";

            //echo $actualizar;

            $this->conexion->query($actualizar);
       
        }
        //---------------------- Buscar Platillos-----------------------------
        function buscarPlatillos($buscarPlatillos) {
            $listaPlatillos = array();
            $consulta = "SELECT * FROM platillo WHERE id like '%$buscarPlatillos%' OR nombre like '%$buscarPlatillos%' or ingredientes like '{$buscarPlatillos}%' ";
            $resultado = $this->conexion->query($consulta);
   
            while ($row = $resultado ->fetch_assoc()) {
               $platillo = new Platillo();

                $platillo->setId($row['id']);
                $platillo->setNombre($row['nombre']);
                $platillo->setIngredientes($row['ingredientes']);
                $platillo->setUtencilios($row['utencilios']);
                $platillo->setTiempopreparacion($row['tiempopreparacion']);
                $platillo->setCaducidad($row['caducidad']);
                $platillo->setPorciones($row['porciones']);
                $platillo->setEnergia($row['energia']);
                $platillo->setCostopromedio($row['costopromedio']);
                $platillo->setRendimiento($row['rendimiento']);
                $platillo->setProteinas($row['proteinas']);
                $platillo->setGrasas($row['grasas']);
                $platillo->setHidratoscarbono($row['hidratoscarbono']);
                $platillo->setPreparacion($row['preparacion']);
                $platillo->setTipocomida($row['tipocomida']);
                $platillo->setAutor($row['autor']);
                $platillo->setImagen($row['imagen']);


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

            $consulta = "DELETE FROM comentario WHERE idPlatillo = '$idPlatillo'";
            $this->conexion->query($consulta);

            $consulta = "DELETE FROM platillo WHERE id = '$idPlatillo'";
            $this->conexion->query($consulta);

        }

        //----------------Mostrar platillo de comidas----------------
        function mostrarComida($idPlatilloMostrar){
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
                $platillo->setIngredientes($row['ingredientes']);
                $platillo->setUtencilios($row['utencilios']);
                $platillo->setTiempopreparacion($row['tiempopreparacion']);
                $platillo->setCaducidad($row['caducidad']);
                $platillo->setPorciones($row['porciones']);
                $platillo->setEnergia($row['energia']);
                $platillo->setCostopromedio($row['costopromedio']);
                $platillo->setRendimiento($row['rendimiento']);
                $platillo->setProteinas($row['proteinas']);
                $platillo->setGrasas($row['grasas']);
                $platillo->setHidratoscarbono($row['hidratoscarbono']);
                $platillo->setPreparacion($row['preparacion']);
                $platillo->setTipocomida($row['tipocomida']);
                $platillo->setAutor($row['autor']);
                $platillo->setImagen($row['imagen']);
            }         
               
            return $platillo;
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

        //---------------------- Total de visitas mes por Mez 2022-2023----------------------------
        function totalVisitasAgosto(){
            $consulta = "SELECT * FROM visitas where (fecha) BETWEEN '2022-08-01' AND '2022-08-31'";
            if ($resultado=mysqli_query($this->conexion,$consulta)) {$totalVisitaAgo=mysqli_num_rows($resultado);return  $totalVisitaAgo;}
        }
        function totalVisitasSeptiembre(){
            $consulta = "SELECT * FROM visitas where (fecha) BETWEEN '2022-09-01' AND '2022-09-31'";
            if ($resultado=mysqli_query($this->conexion,$consulta)) { $totalVisitaSep=mysqli_num_rows($resultado); return  $totalVisitaSep;}
        }
        function totalVisitasOctubre(){
            $consulta = "SELECT * FROM visitas where (fecha) BETWEEN '2022-10-01' AND '2022-10-31'";
            if ($resultado=mysqli_query($this->conexion,$consulta)) { $totalVisitaOct=mysqli_num_rows($resultado); return  $totalVisitaOct;}
        }
        function totalVisitasNoviembre(){
            $consulta = "SELECT * FROM visitas where (fecha) BETWEEN '2022-11-01' AND '2022-11-31'";
            if ($resultado=mysqli_query($this->conexion,$consulta)) { $totalVisitaNov=mysqli_num_rows($resultado); return  $totalVisitaNov;}
        }
        function totalVisitasDiciembre(){
            $consulta = "SELECT * FROM visitas where (fecha) BETWEEN '2022-12-01' AND '2022-12-31'";
            if ($resultado=mysqli_query($this->conexion,$consulta)) { $totalVisitaDic=mysqli_num_rows($resultado); return  $totalVisitaDic;}
        }
        function totalVisitasEnero(){
            $consulta = "SELECT * FROM visitas where (fecha) BETWEEN '2022-01-01' AND '2022-01-31'";
            if ($resultado=mysqli_query($this->conexion,$consulta)) { $totalVisitaEne=mysqli_num_rows($resultado); return  $totalVisitaEne;}
        }
        function totalVisitasFebrero(){
            $consulta = "SELECT * FROM visitas where (fecha) BETWEEN '2022-02-01' AND '2022-02-31'";
            if ($resultado=mysqli_query($this->conexion,$consulta)) { $totalVisitaFeb=mysqli_num_rows($resultado); return  $totalVisitaFeb;}
        }
        function totalVisitasMarzo(){
            $consulta = "SELECT * FROM visitas where (fecha) BETWEEN '2022-03-01' AND '2022-03-31'";
            if ($resultado=mysqli_query($this->conexion,$consulta)) { $totalVisitaMar=mysqli_num_rows($resultado); return  $totalVisitaMar;}
        }
        function totalVisitasAbril(){
            $consulta = "SELECT * FROM visitas where (fecha) BETWEEN '2022-04-01' AND '2022-04-31'";
            if ($resultado=mysqli_query($this->conexion,$consulta)) { $totalVisitaAbr=mysqli_num_rows($resultado); return  $totalVisitaAbr;}
        }
        function totalVisitasMayo(){
            $consulta = "SELECT * FROM visitas where (fecha) BETWEEN '2022-05-01' AND '2022-05-31'";
            if ($resultado=mysqli_query($this->conexion,$consulta)) { $totalVisitaMay=mysqli_num_rows($resultado); return  $totalVisitaMay;}
        }
        function totalVisitasJunio(){
            $consulta = "SELECT * FROM visitas where (fecha) BETWEEN '2022-06-01' AND '2022-06-31'";
            if ($resultado=mysqli_query($this->conexion,$consulta)) { $totalVisitaJun=mysqli_num_rows($resultado); return  $totalVisitaJun;}
        }
        function totalVisitasJulio(){
            $consulta = "SELECT * FROM visitas where (fecha) BETWEEN '2022-07-01' AND '2022-07-31'";
            if ($resultado=mysqli_query($this->conexion,$consulta)) { $totalVisitaJul=mysqli_num_rows($resultado); return  $totalVisitaJul;}
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
