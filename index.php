<?php
	//Importar sus controladores
	require_once "config/config.php";
	require_once "core/routes.php";
	require_once "config/database.php";
	require_once "Controllers/Alumnos.php";	
	require_once "Controllers/Sedes.php";
	require_once "Controllers/Usuarios.php";
	require_once "Controllers/Carrera.php";
	require_once "Controllers/Proceso.php";
	require_once "Controllers/Escolars.php";
	require_once "Controllers/Registro.php";
	require_once "Controllers/vinculacion.php";
	require_once "Controllers/Rcontrasena.php";
	require_once "Controllers/Estadisticos.php";

	
	//Mediante la url vamos a saber que controlador se usa
	//ejemplo index.php?c=sedes
	if(isset($_GET['c'])){
		$controlador = cargarControlador($_GET['c']);
		
		if(isset($_GET['a'])){
			if(isset($_GET['id']) && isset($_GET['id2'])){
				cargarAccion($controlador, $_GET['a'], $_GET['id'], $_GET['id2']);
			} else if (isset($_GET['id'])) {
				cargarAccion($controlador, $_GET['a'], $_GET['id']);
			} else {
				cargarAccion($controlador, $_GET['a']);
			}
		} else {
			cargarAccion($controlador, ACCION_PRINCIPAL);
		}
	} else {
		$controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
		$accionTmp = ACCION_PRINCIPAL;
		$controlador->$accionTmp();
	}
	
?>
