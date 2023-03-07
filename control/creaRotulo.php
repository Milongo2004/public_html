<?php
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
require_once("herramienta_introducir_datos.php");
$colorId=0;
$juegosReferencia=0;
$juegosRotulo=0;
$juegosTotales=0;
$moldesDisponibles=0;
//$cod_Rotulo=mt_rand(100000, 999999);
$cod_Rotulo=0;
//$num_dato=$_GET ["numero_molde"];
// $rotulo=$_GET ["rotulo"];
$referenciaId=$_GET["referencia"];
//$referenciaId=$_GET["refs"];
$loteId=$_GET ["lote"];
$pedido=$_GET ["pedido"];
$fecha=$_GET ["fecha"];
$prensada=$_GET ["prensada"];

            //obtengo el color a partir del lote.

        //$sql2= "SELECT nombre from estaciones2 WHERE id ='". $estacion. "'";
        $sql2= "SELECT lotes2.`colorId2`, colores2.`id` AS id, colores2.`nombre` AS nombre FROM lotes2 INNER JOIN colores2 ON lotes2.`colorId2`= colores2.`id` WHERE lotes2.`id` = '". $loteId. "'";

        $result2=mysqli_query($conexion,$sql2);         

     
                while($mostrar2=mysqli_fetch_array($result2)){
                    $colorId=$mostrar2['id'];
   
            
            }
            
 
//$colorId=$_GET ["color"];
$num_moldes=$_GET ["num_moldes"];

//obtengo los juegos de la referencia y los moldes totales que hay de la referencia.
//consulto también la cantidad de moldes en uso de esta referencia.

$sql3= "SELECT * FROM referencias2 WHERE id = '". $referenciaId. "'";

        $result3=mysqli_query($conexion,$sql3);

     
                while($mostrar3=mysqli_fetch_array($result3)){
                    $juegosReferencia=$mostrar3['juegos'];  
                    $moldesTotales=$mostrar3['totalMoldes'];
                    $moldesEnUso=$mostrar3['moldesEnUso'];
                    $juegosRotulo=$juegosReferencia*$num_moldes;     
                    $juegosTotales=$juegosRotulo*8;
  
             
            }
            
            //los moldes en uso totales serán iguales a los moldes en uso anteriores más los nuevos moldes requeridos.
            
            $moldesEnUso=$moldesEnUso+$num_moldes;
            
            //verifico que los moldes a usar sean menores o iguales a los moldes que hay de la referencia.
            
            if($moldesEnUso<=$moldesTotales){
            
            //actualizo el valor de los moldes en uso y los moldes disponibles en la tabla referencias.
            
            $sql7= "UPDATE referencias2 SET moldesEnUso = '". $moldesEnUso. "' WHERE id = ' ".$referenciaId. "'";

        $result7=mysqli_query($conexion,$sql7);      
        
        //actualizo la cantidad de moldes disponibles para presentar en el select
        
        $moldesDisponibles=$moldesTotales-$moldesEnUso;
        
        $sql8= "UPDATE referencias2 SET moldesDisponibles = '". $moldesDisponibles. "' WHERE id = ' ".$referenciaId. "'";

        $result8=mysqli_query($conexion,$sql8);      

     
                
            

$casillaId=$_GET ["casilla"];

//actualizo la casilla a ocupada para que no aparezca en el listado del formulario.

//$sql4="UPDATE casillas2 SET disponibilidad = '1' WHERE id = '". $casillaId."'";

//$result4=mysqli_query($conexion,$sql4);  

$turno=$_GET["turno"];

//obtengo id del ultimo registro.

        
        $sql5= "SELECT id FROM rotulos2 ORDER BY id DESC LIMIT 1";

        $result5=mysqli_query($conexion,$sql5);         

     
                while($mostrar5=mysqli_fetch_array($result5)){
                    $ultimoId=$mostrar5['id'];
   
            
            }

//igualo el cod_rotulo al id mayor más 1. 

$cod_Rotulo=$ultimoId+1;

//echo ",' ".$cod_Rotulo. "'"    ;
//echo ",'". $referenciaId. "'";
//echo ",' ". $loteId. "'" ;
//echo ",'". $colorId. "'";
//echo ",'". $pedido. "'";
//echo ",' ". $num_moldes. "'" ;
//echo ",' ". $casillaId. "'" ;
//echo ",' ". $turno. "'" ;
//echo ",' ". $juegosRotulo. "'" ;

$herramienta8 = new Herramienta();
$ingresar_dato_tabla_rotulos2 = $herramienta8->ingresar_datos_tabla_rotulos2($fecha, $prensada, $cod_Rotulo, $referenciaId, $loteId, $colorId, $pedido, $num_moldes, $casillaId, $turno, $juegosRotulo,$juegosTotales);

}
else{
    echo "¡Error! los moldes requeridos superan la cantidad existente";
}
?>