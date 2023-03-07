<?php

//require_once("enviarDatos.php");
require_once("herramienta_introducir_datos.php");

$herramienta = new Herramienta();
/*if($_GET["temp"] == null or $_GET["hum"]== null){
echo "No se pudo obtener valores temperatura y humedad desde arduino";exit;
}else{*/
$ingresar_dato = $herramienta->ingresar_datos($_GET["pre_php"],$_GET["hum_php"],$_GET["temp_php"],$_GET["dist_php"]);

	
//}
$herramienta2 = new Herramienta();
$ingresar_dato_tabla2 = $herramienta2->ingresar_datos_tabla2($_GET["pre_php"],$_GET["hum_php"],$_GET["temp_php"],$_GET["dist_php"]);


//ingreso datos en tabla 3 que sólo utiliza hum, temp, y dist.
$herramienta3 = new Herramienta();
$ingresar_dato_tabla3 = $herramienta3->ingresar_datos_tabla3($_GET["hum_php"],$_GET["rotulo_php"],$_GET["dist_php"],$_GET["temp_php"]);

//ensayo por este método a ingresar datos en la base mediante la pagina web
//LLamar una funcion leer datos de la tabla

//$numero = "A123456";

$herramienta4 = new Herramienta();
$ingresar_dato_tabla_RotuloEstaciones = $herramienta4->ingresar_datos_tabla_RotuloEstaciones($_GET["rotulo_php"],$_GET["hum_php"]);


?>
