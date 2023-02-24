<?php
   $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
   
   require_once("herramienta_introducir_datos.php");
   
//obtengo los datos del formulario anterior
    
    $color=$_POST ["color"];
    $referencia=$_POST ["referencia"];
    $gramos=$_POST ["gramos"];
    if (is_null($gramos)){
        $gramos=0;
    }
$gramos=intval($gramos);
    
    echo $color;
    echo '</br>';
    echo $referencia;
    
$herramientaRotuloGranel = new Herramienta();
$ingresar_dato_tabla_rotulos2_granel = $herramientaRotuloGranel->ingresar_datos_tabla_rotulos2_granel($referencia, $color, $gramos);
    
    
    
?>