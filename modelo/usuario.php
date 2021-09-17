<?php 

class Usuario{
    //Declaracion de atributos de la clase usuario
    private $id;
    private $nombre;
    private $apellidos;
    private $edad;
    private $sexo;
    private $nivel;
    private $gradosecu;
    private $usuario;
    private $contrasena;
    

    //metodo constructor de la clase usuario
    public function __construct(){
        $id=0;
        $nombre="";
        $apellidos="";
        $edad=0;
        $sexo="";
        $nivel="";
        $grado="";
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

     //metodo set del atributo edad
     public function setEdad($edad){
        $this->edad=$edad;
    }

     //metdo get del atributo edad
     public function getEdad(){
        return $this->edad;
    }

    //metodo set del atributo sexo
     public function setSexo($sexo){
        $this->sexo=$sexo;
    }

    //metdo get del atributo sexo
     public function getSexo(){
        return $this->sexo;
    }

    //metodo set del atributo nivel
     public function setNivel($nivel){
        $this->nivel=$nivel;
    }

    //metdo get del atributo nivel
     public function getNivel(){
        return $this->nivel;
    }
    
    //metodo set del atributo grado
     public function setGrado($grado){
        $this->grado=$grado;
    }

    //metdo get del atributo grado
     public function getGrado(){
        return $this->grado;
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