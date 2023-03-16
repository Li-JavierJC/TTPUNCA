<?php
    /**
     *Clase de Visitas
     */
    class Visitas{
        /**Declaracion de los atributos de vistas */
        private $id;
        private $ip;
        private $fecha;
        private $num;

        /**Metodo constructor de visitas */
        public function __construct(){
            $id=0;
            $ip="";
            $fecha="";
            $num=0;
        }
        
        /**Descriptores de acceso de la id */
        public function setId($id){ $this->id=$id;}
        public function getId(){    return $this->id;}

        /**Descriptores de acceso de ip */
        public function setIp($ip){ $this->ip=$ip;}
        public function getIp(){    return $this->ip;}

        /**Descripotores de acceso de fceha */
        public function setFecha($fecha){ $this->fecha=$fecha;}
        public function getFecha(){    return $this->fecha;}

        /**Descripotores de acceso de num */
        public function setNum($num){ $this->num=$num;}
        public function getNum(){    return $this->num;}
    } 
?>