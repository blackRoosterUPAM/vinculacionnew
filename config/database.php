<?php
	
	class Conectar {
		
		public static function conexion(){
			
			$conexion = new mysqli("localhost", "root","Toor2019.", "vinculacion");
			return $conexion;
			
		}
	}
?>
