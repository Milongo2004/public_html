
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

$arregloColores=( unserialize(base64_decode($_POST['arregloColores'])) );


/*
$color=$_GET ["color"];
    if(is_null($color)){
$color=$_POST ["color"];
}
*/
/*
$usuario=$_GET ["nombreUsuario"];
    if(is_null($usuario)){
$usuario=$_POST["nombreUsuario"];
}

$juegos=$_GET ["juegos"];
    if(is_null($juegos)){
$juegos=$_POST["juegos"];
}
*/
//$cantidadColores=$_GET ["cantidadColores"];
  //  if(is_null($cantidadColores)){
$cantidadColores=$_POST["cantidadColores"]; //tamaño del arreglo que contiene los colores en el archivo anterior.

$juegosColor=array();//creo un arreglo para almacenar los juegos de cada color de la lista.

for ($i=0; $i<$cantidadColores; $i++){
    
    $juegosColor[$i]=$_POST ["juegosColor".$i];
     
     if (is_null($juegosColor[$i])){
         $juegosColor[$i]=0;
     }
     else{
         $juegosColor[$i]=intval($juegosColor[$i]);
     }
    
}
//}

/*
$nota=$_GET ["nota"];
    if(is_null($nota)){
$nota=$_POST ["nota"];
}

$prioridad=$_GET ["prioridad"];
    if(is_null($prioridad)){
$prioridad=$_POST ["prioridad"];
}

echo "variables recibidas";
echo "<br>";
//echo var_dump($arregloColores);
for ($i=0; $i<$cantidadColores; $i++){
echo "color" , $i,"=" .$arregloColores[$i];
echo" juegosColor = ". $juegosColor[$i]."\n";
echo "<br>";

}
echo "pedido= ". $pedido."\n";
echo "<br>";
echo "referencia= " . $referencia."\n";
echo "<br>";
echo "cantidad colres" . $cantidadColores."\n";
*/
//CONVIERTO A ENTERO LOS VALORES OBTENIDOS
	    
$pedido=intval($pedido);
$referencia=intval($referencia);
$cantidadColores=intval($cantidadColores);

$herramientaDetalles2 = new Herramienta();
$ingresar_dato_tabla_pedidoDetallesMasivo = $herramientaDetalles2->ingresar_datos_tabla_pedidoDetallesMasivo($pedido,$referencia, $arregloColores, $juegosColor, $cantidadColores);

?>
