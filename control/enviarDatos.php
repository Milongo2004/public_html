<?php
require_once("herramienta_introducir_datos.php");
//$num_dato=$_GET ["numero_molde"];
$id_produccion=$_GET ["id_prod"];
//$numero_molde="29M-S";
//ensayo por este método a ingresar datos en la base mediante la pagina web
/*
$herramienta4 = new Herramienta();
$ingresar_dato_tabla_produccion = $herramienta4->ingresar_datos_tabla_produccion($num_dato);
*/

$herramienta6 = new Herramienta();
$ingresar_dato_tabla_rotulos = $herramienta6->ingresar_datos_tabla_rotulos($id_produccion);

?>


