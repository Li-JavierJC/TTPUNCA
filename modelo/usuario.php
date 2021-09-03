<?php 

class Usuario{
    //Declaracion de atributos de la clase usuario
    private $id;
    private $usuario;
    private $contrasena;

    //metodo constructor de la clase usuario
    public function __construct(){
        $id=0;
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