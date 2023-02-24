<?php

require_once("herramienta_introducir_datos.php");

//variable obtenida desde el arduino
$millisPrensada=$_GET["tiempoPrensada_php"];
$millisInactivo=$_GET["tiempoInactivo_php"];
$prensa=$_GET["prensa_php"];

//Variables a calcular desde el servidor
$minutosPrensada=0;
$minutosInactivo=0;

//variables auxiliares
$precision=2;

//forzo la variable prensa a que sea entera

$prensa=intval($prensa);

//calculo de variables.


//prensadas

$minutosPrensada=($millisPrensada/60000); //utilizo  esta para funcionamiento real
//$minutosPrensada=($millisPrensada/1000);//utilizo esta para pruebas

//convierto el resultado en minutos a un flotante de 2 decimales.
$minutosPrensada = round($minutosPrensada, 2, $mode = PHP_ROUND_HALF_UP);

// tiempo inactivo

$minutosInactivo=($millisInactivo/60000); //utilizo  esta para funcionamiento real
//$minutosInactivo=($millisInactivo/1000);//utilizo esta para pruebas

//convierto el resultado en minutos a un flotante de 2 decimales.
$minutosInactivo = round($minutosInactivo, 2, $mode = PHP_ROUND_HALF_UP);


$herramientaTiempoPrensas = new Herramienta();

$ingresar_dato_tiempoPrensas = $herramientaTiempoPrensas->ingresar_datos_tiempoPrensas($minutosPrensada, $minutosInactivo, $prensa);


?>
