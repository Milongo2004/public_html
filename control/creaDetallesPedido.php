
<?php 
require_once("herramienta_introducir_datos.php");

$pedido=$_GET ["pedido"];
    if(is_null($pedido)){
        $pedido=$_POST['pedido'] ;
    }
    
    $referencia=$_GET ["referencia"];
    if(is_null($referencia)){
$referencia=$_POST ["referencia"];
}

$color=$_GET ["color"];
    if(is_null($color)){
$color=$_POST ["color"];
}
/*
$usuario=$_GET ["nombreUsuario"];
    if(is_null($usuario)){
$usuario=$_POST["nombreUsuario"];
}
*/
$juegos=$_GET ["juegos"];
    if(is_null($juegos)){
$juegos=$_POST["juegos"];
}
/*
$nota=$_GET ["nota"];
    if(is_null($nota)){
$nota=$_POST ["nota"];
}

$prioridad=$_GET ["prioridad"];
    if(is_null($prioridad)){
$prioridad=$_POST ["prioridad"];
}
*/

$herramientaDetalles1 = new Herramienta();
$ingresar_dato_tabla_pedidoDetalles = $herramientaDetalles1->ingresar_datos_tabla_pedidoDetalles($pedido,$referencia, $color, $juegos);

?>
