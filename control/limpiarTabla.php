<?php 

$tabla="listaEmpaque";

require_once("herramienta_limpiar_datos.php");

$herramientaLimpiar1 = new HerramientaLimpiar();
$limpiar_toda_la_tabla = $herramientaLimpiar1->limpiar_toda_la_tabla();

?>