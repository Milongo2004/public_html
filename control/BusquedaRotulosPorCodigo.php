<?php
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

    $rotulo=$_GET ["rotulos"];



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>RotulosPorEstacion</title>
</head>
<body>
<center>
    <?php
            

        $sql2= "SELECT id from rotulos2 WHERE id ='". $rotulo. "'";
        $result2=mysqli_query($conexion,$sql2);

            ?>



        <h1>Detalles del rótulo 

        
                 <?php

                while($mostrar2=mysqli_fetch_array($result2)){
                    $idRotulo=$mostrar2['id'];
            ?>

            
                
                <td><?php echo $mostrar2['id'] ?></td>
                
                
                
            
            <?php
            }
            ?>
            </h1> 
    
    
    
        <table border="1">
            <tr>
                <td>ID</td>
                
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

            $sql= "SELECT rotulos2.*, referencias2.`nombre` AS ref, lotes2.`nombreL` AS lote, colores2.`nombre` AS color, pedidos2.`codigoP` AS pedido, estaciones2.`nombre` AS estacion FROM rotulos2 INNER JOIN referencias2 ON rotulos2.`referenciaId`= referencias2.`id` INNER JOIN lotes2 ON rotulos2.`loteId`= lotes2.`id` INNER JOIN colores2 ON rotulos2.`colorId`= colores2.`id` INNER JOIN pedidos2 ON rotulos2.`pedido` = pedidos2.`idP` INNER JOIN estaciones2 ON rotulos2.`estacionId2` = estaciones2.`id` WHERE rotulos2.`id` = '" . $rotulo. "'";

            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>

            <tr>
                <td><?php echo $mostrar['id'] ?></td>
                
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
 
   <h1>Trazabilidad del rótulo 

        
                 <?php

               echo $idRotulo;
            ?>

           
            </h1> 
    
 <table border="1">
            <tr>
                
                
                <td>Estación</td>
                <td>Ingreso</td>
                
                
                
            </tr>
            
            <?php
            //$sql="SELECT * from Rotulo";
            
            //$sql= "SELECT * from rotulos2 WHERE id = '". $rotulo. "'";

            $sql= "SELECT rotuloestaciones2.*,  estaciones2.`nombre` AS estacion FROM rotuloestaciones2 INNER JOIN estaciones2 ON rotuloestaciones2.`estacionId` = estaciones2.`id` WHERE rotuloestaciones2.`rotuloId2` = '" . $rotulo. "' ORDER BY rotuloestaciones2.`id` DESC";

            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>

            <tr>
                
                <td><?php echo $mostrar['estacion'] ?></td>
                <td><?php echo $mostrar['ingreso'] ?></td>
                
                
                
            </tr>
            <?php
            }
            ?>
        </table>



    </br>
    
     <table border="2">
            <tr>
                <!--<td>id</td>-->
               
                
                <td>RotuloId</td>
                <td>Pedidos</td>
                <td>Granel</td>
                <td>Programados</td>
                <td>Producidos</td>
                <td>Pulidos</td>
                <td>EnSeparación</td>
                <td>Separados</td>
                <td>EnEmplaquetado</td>
                <td>Emplaquetados</td>
                <td>Revisión 1</td>
                <td>Revisión 2</td>
                <td>Empacados</td>
                <td>Calidad</td>
                <td>Colaborador</td>
                <td>Fecha</td>
                
               
                <!--<td>acción</td>
                <td>acción</td>-->
                
                
            </tr>
            
            <?php
            //$sql="SELECT pedidoDetalles.*, referencias2.`nombre` AS 'referencia', colores2.`nombre` AS 'Color' FROM pedidoDetalles INNER JOIN referencias2 ON pedidoDetalles.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON pedidoDetalles.`colorId` = colores2.`id` WHERE pedidoDetalles.`pedidoId` = '".$pedidoId."' ORDER BY pedidoDetalles.`id` DESC";
            $sql= "SELECT * FROM `pedidoDetalles` WHERE rotuloId= '" . $rotulo. "'";
            //echo $sql;
            $result=mysqli_query($conexion,$sql);
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <!--<td><?php //echo $mostrar['id'] ?></td>-->
                
                
                
                
                <td><?php echo $mostrar["rotuloId"] ?></td>
                <td><?php echo $mostrar["juegos"] ?></td>
                <td><?php echo $mostrar["granel"]?></td>
                <td><?php echo $mostrar["programados"]?></td>
                <td><?php echo $mostrar["producidos"]?></td>
                <td><?php echo $mostrar["pulidos"]?></td>
                <td><?php echo $mostrar["enSeparacion"]?></td>
                <td><?php echo $mostrar["separado"]?></td>
                <td><?php echo $mostrar["enEmplaquetado"]?></td>
                <td><?php echo $mostrar["emplaquetados"]?></td>
                <td><?php echo $mostrar["revision1"]?></td>
                <td><?php echo $mostrar["revision2"]?></td>
                <td><?php echo $mostrar["empacados"]?></td>
                <td><?php echo $mostrar["calidad"]?></td>
                <td><?php echo $mostrar["colaborador"]?></td>
                <td><?php echo $mostrar["fechaCreacion"]?></td>
                
                
                
            </tr>
            <?php
            }
            ?>
        </table>
        <br></br>

    <button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaReferencias.php'">Ver tabla Referencias</button>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaColores.php'">Ver tabla Colores</button>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control/vistas/modulos/verTablaEstaciones.php'">Ver tabla Estaciones</button>
    
    </center>
</body>
</html>