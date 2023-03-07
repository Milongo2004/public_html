<?php
 $mes=$_GET['Seleccionado'];
 $añodefinitivo="20".$_GET['Selecciono_ano'];
   $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");


                 header("Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"); 
header("Content-Disposition:attachment;filename=Tabla_Invima.xls"); 

$outputFile = fopen('php://output', 'w+');


$consultofecha=mysqli_query($conexion,"SELECT rotulos2.*,rotulos2.id AS rotid, colores2.*,colores2.nombre AS color, estaciones2.*,estaciones2.nombre AS verestacion , lotes2.*,lotes2.nombreL AS verlote,referencias2.*, pedidos2.*,referencias2.nombre AS vereferencia, pedidos2.codigoP AS verpedido FROM rotulos2 INNER JOIN colores2 ON rotulos2.`colorId` = colores2.`id` INNER JOIN estaciones2 ON rotulos2.`estacionId2`=estaciones2.`id`INNER JOIN lotes2 ON rotulos2.`loteId`=lotes2.`id` INNER JOIN referencias2 ON rotulos2.`referenciaId`=referencias2.`id` INNER JOIN pedidos2 ON rotulos2.`pedido`=pedidos2.`idP` WHERE YEAR(fecha) = '$añodefinitivo' AND MONTH(fecha) = '$mes'  ORDER BY rotulos2.fecha ASC, rotulos2.id ASC" );
$resultado=mysqli_num_rows($consultofecha);        
         
    
?>
           <!DOCTYPE html>
           <html lang="en">
           <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>RESULTADOS INVIMA</title>
           </head>
           <body>
            
          

            <table border="1">
                

            <tr>
                <td hidden>Id</td>  
                <td>Fecha</td>
                <td>Referencia</td>
                <td>Color</td>
                <td>Lote</td>
                <td>Producidos</td>
                
            </tr>

            <?php

            
while  ($mostrar = mysqli_fetch_assoc($consultofecha)) {
?>


<tr><td hidden> <?php  echo  $mostrar['rotid'];?></td>
<td> <?php  echo  $mostrar['fecha'];?></td>
<td> <?php  echo  $mostrar['vereferencia'];?></td>
<td> <?php  echo  $mostrar['color'];?></td>
<td> <?php  echo  $mostrar['verlote'];?></td>
<td> <?php  echo  $mostrar['total'];}?></td>

</tr>
</table>
</body>
 </html>