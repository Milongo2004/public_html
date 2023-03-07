 <?php

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

require_once("herramienta_introducir_datos.php");
//$num_dato=$_GET ["numero_molde"];
$cod_rotulo=$_GET ["rotulo"];
$molde=$_GET ["molde"];


$sql1="UPDATE moldes2 SET estado = 'asignado' WHERE idM = '". $molde."'";

$result1=mysqli_query($conexion,$sql1);
//$numero_molde="29M-S";
//ensayo por este método a ingresar datos en la base mediante la pagina web
/*
$herramienta4 = new Herramienta();
$ingresar_dato_tabla_produccion = $herramienta4->ingresar_datos_tabla_produccion($num_dato);
*/

$herramienta10 = new Herramienta();
$ingresar_dato_tabla_Moldes = $herramienta10->ingresar_datos_tabla_asignaciones2($cod_rotulo, $molde);

?>
