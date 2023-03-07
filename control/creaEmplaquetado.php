<?php 
require_once("herramienta_introducir_datos.php");

$emplaquetador=$_GET ["emplaquetador"];
$linea=$_GET ["linea"];
$tipo=$_GET ["tipo"];
$cajas=$_GET ["cajas"];


$juegos=0;

  if ($linea=='RESISTAL' || $linea=='ZENITH'){
                    
                    if ($tipo=='DIENTE'){
                        $juegosCaja=16;
                    }
                    else if ($tipo=='MUELA'){
                        $juegosCaja=14;
                    }
                    else{
                        echo "error: seleccione el tipo : diente/muela";
                    }
                }
                else if ($linea=='REVEAL' || $linea=='STARDENT' || $linea=='STARVIT'){
                    $juegosCaja=20;
                }
                else if ($linea=='UHLERPLUS' || $linea=='STARPLUS'){
                    $juegosCaja=12;
                    
                }
                
$juegos=$cajas*$juegosCaja;

if ($linea=='UHLERPLUS' || $linea=='STARPLUS'){
    $puntos=$juegos*1.2;
    
}
else{
    $puntos=$juegos;
}

//echo $emplaquetador ."/";
//echo $linea ."/";
//echo $tipo ."/";
//echo $cajas ."/" ;
//echo $juegos ."/" ;

$herramientaEmplaquetado = new Herramienta();
$ingresar_dato_tabla_SeguimientoEmplaquetado = $herramientaEmplaquetado->ingresar_datos_seguimientoEmplaquetado($emplaquetador, $linea, $tipo,$juegos, $puntos);
//
?>