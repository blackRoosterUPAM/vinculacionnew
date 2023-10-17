<?php
	//Importar sus controladores
	require_once "config/config.php";
	require_once "core/routes.php";
	require_once "config/database.php";
	require_once "controllers/Alumnos.php";	
	require_once "controllers/Sedes.php";
	require_once "controllers/Usuarios.php";
	require_once "controllers/Carrera.php";
	
	//Mediante la url vamos a saber que controlador se usa
	//ejemplo index.php?c=sedes
	if(isset($_GET['c'])){
		
		$controlador = cargarControlador($_GET['c']);
		
		if(isset($_GET['a'])){
			//Al url se le debe pasar la accion que deseamos o por defecto pondra index o la que hayan puesto en su confgi
			//ejemplo 
			//index.php?c=sedes&a=siguiente
			//si pasan un id agrefan &id=1
			
			if(isset($_GET['id'])){
				cargarAccion($controlador, $_GET['a'], $_GET['id']);
				//caso contrario se manda la url sin id 
				} else {
				cargarAccion($controlador, $_GET['a']);
			}
			} else {
				//sino encuentra la accion manda a su index configurado
			cargarAccion($controlador, ACCION_PRINCIPAL);
		}
		
		} else {
		
		//inica con el controlador principal
		$controlador = cargarControlador(CONTROLADOR_PRINCIPAL);
		$accionTmp = ACCION_PRINCIPAL;
		$controlador->$accionTmp();
	}
?>