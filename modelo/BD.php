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
    } 

?>