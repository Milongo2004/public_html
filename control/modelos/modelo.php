<?php

class EnlacesPaginas{

	public static function enlacesPaginasModelo($enlacesModelo){

		if ($enlacesModelo == "estaciones" ||$enlacesModelo == "pedidos" ||
			$enlacesModelo == "materiales" ||
			$enlacesModelo == "moldes" || $enlacesModelo=="cerrar_sesion" ||
			$enlacesModelo == "registro_usuario" || $enlacesModelo == "fallos_masterdent") 
		
				
	$modulo = "vistas/modulos/".$enlacesModelo.".php";
		

		else if($enlacesModelo == "estaciones"){
			$mudulo = "vistas/modulos/estaciones.php";
		}

		else {
			$mudulo = "vistas/modulos/estaciones.php";
		}
		return $modulo;

	}

	

			

}


?>