<?php
	
	class Conectar {
		
		public static function conexion(){
			
			$conexion = new mysqli("localhost", "root", "galloUPAM2023.", "vinculacion");
			return $conexion;
			
		}
	}
?>
