<?php
	
	class Conectar {
		
		public static function conexion(){
			
			$conexion = new mysqli("localhost", "root", "GalloUpam321.", "vinculacion");
			return $conexion;
			
		}
	}
?>