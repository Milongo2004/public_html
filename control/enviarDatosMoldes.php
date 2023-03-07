 <?php
require_once("herramienta_introducir_datos.php");
//$num_dato=$_GET ["numero_molde"];
$cod_molde=$_GET ["cod_molde"];
$referenciaId=$_GET ["referencia"];

//$numero_molde="29M-S";
//ensayo por este método a ingresar datos en la base mediante la pagina web
/*
$herramienta4 = new Herramienta();
$ingresar_dato_tabla_produccion = $herramienta4->ingresar_datos_tabla_produccion($num_dato);
*/

$herramienta7 = new Herramienta();
$ingresar_dato_tabla_Moldes = $herramienta7->ingresar_datos_tabla_moldes($cod_molde, $referenciaId);

?>
