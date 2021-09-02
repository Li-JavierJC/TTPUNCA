<?php 

class Usuario{
    //Declaracion de atributos de la clase usuario
    private $id;
    private $nombre;
    private $apellidos;
    private $edad;
    private $correo;
    private $telefono;
    private $usuario;
    private $contrasena;

    //metodo constructor de la clase usuario
    public function __construct(){
        $id=0;
		$nombre = "";
        $apellidos= "";
        $edad="";
        $correo="";
        $telefono="";
        $usuario="";
        $contrasena="";

	}
  
    //Metodo set del atributo id
    public function setId($id){
        $this->id=$id;
    }

    //Metodo set del atributo id
    public function getId(){
      return  $this->id;
    }
    //Metodo set del atributo nombre
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    //Metod get del atributo nombre
    public function getNombre(){
        return $this->nombre;
    }

    //metodo set del atributo apellidos
    public function setApellidos($apellidos){
        $this->apellidos=$apellidos;
    }

    //metdo get del atributo get
    public function getApellidos(){
        return $this->apellidos;
    }

    //metodo set del atributo fechanacimiento
    public function setEdad($edad){
        $this->edad=$edad;    
    }

    //metodo get del atributo fechanacimiento
    public function getEdad(){
        return $this->edad;
    }

    //metodo set del atributo correo
    public function setCorreo($correo){
        $this->correo=$correo;
    }

    //metodo get del atributo correo
    public function getCorreo(){
        return $this->correo;
    }

    //metodo set del atributo telefono
    public function setTelefono($telefono){
        $this->telefono=$telefono;
    }
    
    //metodo get del atributo telefono
    public function getTelefono(){
        return $this->telefono;
    }

    //metodo set del atributo usuario
    public function setUsuario($usuario){
        $this->usuario=$usuario;
    }

    //metodo get del atributo usuario
    public function getUsuario(){
        return $this->usuario;
    }

    //metodo get del atributo set del atributo contrasena
    public function setContrasena($contrasena){
        $this->contrasena=$contrasena;
    }

    // metodo get del atributo contrasena
    public function getContrasena(){
        return $this->contrasena;
    }
}
?>