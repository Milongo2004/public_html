<?php
class MvcController{

#bloque de llamada a la plantilla



	public function plantilla(){

		include "vistas/template.php";
		#creo una función que me muestra el archivo template. luego en index creo el objeto de la clase MvcControllers. el include se utiliza para incluir otro archivo php.
	}

	#bloque de interacción del usuario
#la siguiente función es para recibir la variable action
	public function enlacesPaginasController(){

		if (isset($_GET["action"])){
#uilizo el isset para decir qeu la variable action trae información.
		$enlacesController = $_GET["action"];
		#la variable enlaces recibirá todo lo que llegue por el metodo GET
		
		}

		else {
		$enlacesController = "estaciones";
		}

		$respuesta = EnlacesPaginas::enlacesPaginasModelo($enlacesController);
		#una manera de heredar la clase enlaces paginas y la función.

			include $respuesta;

	}



}


?>