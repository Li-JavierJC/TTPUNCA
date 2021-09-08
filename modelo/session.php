
<?php

	class Sesion{

		//inicializa la sesion
		public function init (){
			session_start();
		}
		
		//retorna todos los valores del array de sesion
		public function getAll(){
			return $_SESSION;
		}

		//cierra la sesion eliminado los valores
		public function close(){
			session_unset();
			session_destroy();
		}

		// retorna el estatus de la sesion

		public function getStatus (){
			return session_status;
		}



	}
	
	

	
?>