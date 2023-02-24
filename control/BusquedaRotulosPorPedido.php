<?php
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

    $pedido= $_GET ["pedido"];



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>RotulosPorPedido</title>
</head>
<body>

    <?php
            

        $sql2= "SELECT codigoP from pedidos2 WHERE idP ='". $pedido. "'";
        $result2=mysqli_query($conexion,$sql2);

            ?>



        <h1>Rotulos del pedido

        
                 <?php

                while($mostrar2=mysqli_fetch_array($result2)){
            ?>

            
                
                <td><?php echo $mostrar2['codigoP'] ?></td>
                
                
                
            
            <?php
            }
            ?>
            </h1>
    
    
    
        <table border="1">
            <tr>
                <td>id</td>
                <td>cod_rotulo</td>
                <td>referencia</td>
                <td>lote</td>
                <td>color</td>
                <td>pedido</td> 
                <td>#Moldes</td> 
                <!--<td>casillaId</td> -->              
                <td>juegos</td>
                <td>Estacion Actual</td>
                <td>fecha Producción</td>   
                <td>vuelta1</td>
                <td>vuelta2</td>
                <td>vuelta3</td>
                <td>vuelta4</td>
                <td>vuelta5</td>
                <td>vuelta6</td>
                <td>vuelta7</td>
                <td>vuelta8</td>                
                <td>total</td>
                
                
                
            </tr>
            
            <?php
            //$sql="SELECT * from Rotulo";
            
            //$sql= "SELECT * from rotulos2 WHERE id = '". $rotulo. "'";

            $sql= "SELECT rotulos2.*, referencias2.`nombre` AS ref, lotes2.`nombreL` AS lote, colores2.`nombre` AS color, pedidos2.`codigoP` AS pedido, estaciones2.`nombre` AS estacion FROM rotulos2 INNER JOIN referencias2 ON rotulos2.`referenciaId`= referencias2.`id` INNER JOIN lotes2 ON rotulos2.`loteId`= lotes2.`id` INNER JOIN colores2 ON rotulos2.`colorId`= colores2.`id` INNER JOIN pedidos2 ON rotulos2.`pedido` = pedidos2.`idP` INNER JOIN estaciones2 ON rotulos2.`estacionId2` = estaciones2.`id` WHERE rotulos2.`pedido` = '" . $pedido. "' ORDER BY rotulos2.`id` DESC";

            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>

            <tr>
                <td><?php echo $mostrar['id'] ?></td>
                <td><?php echo $mostrar['cod_rotulo'] ?></td>
                <td><?php echo $mostrar['ref'] ?></td>
                <td><?php echo $mostrar['lote'] ?></td>
                <td><?php echo $mostrar['color'] ?></td>
                <td><?php echo $mostrar['pedido'] ?></td>
                <td><?php echo $mostrar['cantidadMoldes'] ?></td>
                <!--<td><?php //echo $mostrar['casillaId'] ?></td>-->
                <td><?php echo $mostrar['juegos'] ?></td>
                <td><?php echo $mostrar['estacion'] ?></td>
                <td><?php echo $mostrar['fecha'] ?></td>
                <td><?php echo $mostrar['vuelta1'] ?></td>
                <td><?php echo $mostrar['vuelta2'] ?></td>
                <td><?php echo $mostrar['vuelta3'] ?></td>
                <td><?php echo $mostrar['vuelta4'] ?></td>
                <td><?php echo $mostrar['vuelta5'] ?></td>
                <td><?php echo $mostrar['vuelta6'] ?></td>
                <td><?php echo $mostrar['vuelta7'] ?></td>
                <td><?php echo $mostrar['vuelta8'] ?></td>            
                <td><?php echo $mostrar['total'] ?></td>
                
                
            </tr>
            <?php
            }
            ?>
        </table>

        <br>





    </br>

    <button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaReferencias.php'">Ver tabla Referencias</button>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaColores.php'">Ver tabla Colores</button>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaEstaciones.php'">Ver tabla Estaciones</button>
    
</body>
</html>