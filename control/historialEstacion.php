<?php
//echo "en esta página encontrarás la información de los rótulos que han pasado por la estación en un intervalo de tiempo específico"

?>

<?php
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");

    $estacion=$_GET ["estaciones"];
      
    if(is_null($estacion)){
        $estacion=$_POST['estacion'] ;
    }
    
    $id = isset( $_POST['id'] ) ? $_POST['id'] : '';
    $referencia = isset( $_POST['referencia'] ) ? $_POST['referencia'] : '';
    $color = isset( $_POST['color'] ) ? $_POST['color'] : '';
    $pedido = isset( $_POST['pedido'] ) ? $_POST['pedido'] : '';
    $lote = isset( $_POST['lote'] ) ? $_POST['lote'] : '';
    $fechaDesde = isset( $_POST['fechaDesde'] ) ? $_POST['fechaDesde'] : '';
    $fechaHasta = isset( $_POST['fechaHasta'] ) ? $_POST['fechaHasta'] : '';
    $capasDato = isset( $_POST['capas'] ) ? $_POST['capas'] : '';
    $fechaProduccionDesde = isset( $_POST['fechaProduccionDesde'] ) ? $_POST['fechaProduccionDesde'] : '';
    $fechaProduccionHasta = isset( $_POST['fechaProduccionHasta'] ) ? $_POST['fechaProduccionHasta'] : '';
    
    
    
    
   $filtros = array();
    if ($estacion != ''){
            $filtros[]= "rotuloestaciones2.`estacionId` = '$estacion'";
    }
    if ($id != ''){
            $filtros[]= "rotulos2.`id` = '$id'";
    }
    if ($referencia != ''){
        
         // busco el id de la referencia según su nombre en la tabla referencias2
                
                
$sqlRef= "SELECT `id` FROM `referencias2` WHERE nombre LIKE '%$referencia%'";
$resultRef=mysqli_query($conexion,$sqlRef);       

     
                while($mostrarRef=mysqli_fetch_array($resultRef)){
                    $referencia=$mostrarRef['id'];
                   
            }
            
            $filtros[]= "rotulos2.`referenciaId` = '$referencia'";
            
                
    }
    if ($color != ''){
        
         // busco el id del color según su nombre 
                
                
$sqlCol= "SELECT `id` FROM `colores2` WHERE nombre = '$color'";
$resultCol=mysqli_query($conexion,$sqlCol);       

     
                while($mostrarCol=mysqli_fetch_array($resultCol)){
                    $color=$mostrarCol['id'];
                   
            }
            
            $filtros[]= "rotulos2.`colorId` = '$color'";
    }
    if ($pedido != ''){
        
        // busco el id del pedido según su nombre 
                
                
$sqlPed= "SELECT `idP` FROM `pedidos2` WHERE codigoP = '$pedido'";
$resultPed=mysqli_query($conexion,$sqlPed);       

     
                while($mostrarPed=mysqli_fetch_array($resultPed)){
                    $pedido=$mostrarPed['idP'];
                   
            }
            
            $filtros[]= "rotulos2.`pedido` = '$pedido'";
    }
    if ($lote != ''){
        
         // busco el id del lote según su nombre 
                
                
$sqlLot= "SELECT `id` FROM `lotes2` WHERE nombreL = '$lote'";
$resultLot=mysqli_query($conexion,$sqlLot);       

     
                while($mostrarLot=mysqli_fetch_array($resultLot)){
                    $lote=$mostrarLot['id'];
                   
            }
        
            $filtros[]= "rotulos2.`loteId` = '$lote'";
    }
    
      if ($capasDato != ''){
        
            $filtros[]= "referencias2.capas = '$capasDato'";
    }
    
    if ($fechaDesde != '' && $fechaHasta != ''){
            $filtros[]= "rotuloestaciones2.`ingreso` BETWEEN '$fechaDesde%' AND '$fechaHasta%'";
    }
    
    
     if ($fechaProduccionDesde != '' && $fechaProduccionHasta != ''){
            $filtros[]= "rotulos2.`fecha` BETWEEN '$fechaProduccionDesde%' AND '$fechaProduccionHasta%'";
    }
    
   
    
    
    $consultaFiltros='SELECT rotuloestaciones2.*, rotulos2.*, referencias2.`nombre` AS ref, lotes2.`nombreL` AS lote, colores2.`nombre` AS color, pedidos2.`codigoP` AS pedido, referencias2.capas AS capas FROM rotuloestaciones2 INNER JOIN rotulos2 ON rotuloestaciones2.`rotuloId2`= rotulos2.`id` INNER JOIN referencias2 ON rotulos2.`referenciaId`= referencias2.`id` INNER JOIN lotes2 ON rotulos2.`loteId`= lotes2.`id` INNER JOIN colores2 ON rotulos2.`colorId`= colores2.`id` INNER JOIN pedidos2 ON rotulos2.`pedido`= pedidos2.`idP` WHERE ';
    
    $consultaSuma = 'select sum(total) as totales FROM rotuloestaciones2 INNER JOIN rotulos2 ON rotuloestaciones2.`rotuloId2`= rotulos2.`id` INNER JOIN referencias2 ON rotulos2.referenciaId = referencias2.id WHERE ';



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MovimientosPorEstacion</title>
</head>
<body>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
    
    <?php
    //echo "movimientos de la estación" . $estacion;
    ?>
    
    <center>
         <?php
            

        $sql2= "SELECT nombre from estaciones2 WHERE id ='". $estacion. "'";

        $result2=mysqli_query($conexion,$sql2);
        ?>
        
        <h1>Producción que ha pasado por la estación de

        
                 <?php

                while($mostrar2=mysqli_fetch_array($result2)){
                    $estacionActual=$mostrar2['nombre'];
            ?>

            
                
                <td><?php echo $estacionActual ?></td>
                
                
                
            
            <?php
            }
        
            ?>
            
            </h1>
            
            <br>
        
        <div class="row">
            <form action="historialEstacion.php" method="POST">
            
            <div class="mb-3">
                
                    <label for="id" class="form-label">Id</label>
                    <input type="text" size="15" class="form-control "  id="id" name="id" style="width: 70px">
                    
                    <label for="referencia" class="form-label">Referencia</label>
                    <input type="text" size="15" class="form-control "  id="referencia" name="referencia" style="width: 100px">
         
                    <label for="color" class="form-label">Color</label>
                    <input type="text" size="15" class="form-control "  id="color" name="color" style="width: 100px">
                    
                    <label for="pedido" class="form-label">Pedido</label>
                    <input type="text" size="15" class="form-control "  id="pedido" name="pedido" style="width: 100px">
                    
                    <label for="lote" class="form-label">Lote</label>
                    <input type="text" size="15" class="form-control "  id="lote" name="lote" style="width: 100px">
                    
                    <label for="uppLow" class="form-label">Capas</label>
                    <select class="form-select" autofocus id="capas" name="capas" aria-label="Default select example">
                        <option selected></option>
                        <option value="2C">2C</option>
                        <option value="4C">4C</option>
                    
                    </select>
                    
                    <br></br>
                    
                    <label for="fechaDesde" class="form-label">Ingresado Desde</label>
                    <input type="Date" class="form-control" id="fechaDesde" name="fechaDesde" placeholder="Ingresa la fecha" >
                    
                    <label for="fechaHasta" class="form-label">Hasta</label>
                    <input type="Date" class="form-control" id="fechaHasta" name="fechaHasta" placeholder="Ingresa la fecha" >
                    
                    <br></br>
                    
                    <label for="fechaProduccionDesde" class="form-label">Programado Desde</label>
                    <input type="Date" class="form-control" id="fechaProduccionDesde" name="fechaProduccionDesde" placeholder="Ingresa la fecha" >
                    
                    <label for="fechaProduccionHasta" class="form-label">Hasta</label>
                    <input type="Date" class="form-control" id="fechaProduccionHasta" name="fechaProduccionHasta" placeholder="Ingresa la fecha" >
                    
                    <input name="estacion" type="hidden" value=" <?php
                        echo $estacion;  
                    ?>">
                     

                
                <input type="submit" name="Empacar" >
            </form>
        </div>
        
    </div>
                    
<br></br>
        
        <table border="1">
            <tr>
                <td>id</td>
                <!--<td>cod_rotulo</td>-->
                <td>referencia</td>
                <td>color</td>
                <td>pedido</td>
                <td>lote</td>
               <!-- <td>cantidadMoldes</td>                -->
                <td>juegos</td>
                <td>Fecha Producción</td>
                <td>Ingreso a <?php echo $estacionActual?></td>
                
                
               
                
                
            </tr>
            
            <?php
            //$sql="SELECT * from Rotulo";
            //$sql= "SELECT * from rotulos2 WHERE estacionId2 ='". $estacion. "'";
            //$sql= "SELECT rotulos2.*, referencias2.`nombre` AS ref, colores2.`nombre` AS color FROM rotulos2 INNER JOIN referencias2 ON rotulos2.`referenciaId`= referencias2.`id`  INNER JOIN colores2 ON rotulos2.`colorId`= colores2.`id`  WHERE rotulos2.`estacionId2` = '". $estacion. "'";
            $sql= $consultaFiltros." ". implode(" AND ",$filtros) ." ORDER BY rotuloestaciones2.ingreso DESC";
            //echo $sql;
            
            $result=mysqli_query($conexion,$sql);
            
 
            
            echo "Movimientos de producción por la estación de $estacionActual";
            if ($fechaDesde != '' && $fechaHasta != ''){
            echo " entre $fechaDesde y $fechaHasta";
            }
            
            if ($fechaProduccionDesde != '' && $fechaProduccionHasta != ''){
            echo "- programada entre $fechaProduccionDesde y $fechaProduccionHasta";
            }
            
                        if ($referencia != ''){
       echo "-Referencia = $referencia, ";
    }
    if ($color != ''){
         echo "-Color = $color, ";
    }
 
    if ($capasDato != ''){
        
             echo "-Capas = $capasDato, ";
    }
    if ($codigoP != ''){
         echo "-Pedido = $pedido, ";
    }
           
            
            while($mostrar=mysqli_fetch_array($result)){
            ?>

            <tr>
                <td><?php echo $mostrar['id'] ?></td>
                <!--<td><//?php echo $mostrar['cod_rotulo'] ?></td>-->
                <td><?php echo $mostrar['ref'] ?></td>
                <td><?php echo $mostrar['color'] ?></td>
                <td><?php echo $mostrar['pedido'] ?></td>
                <td><?php echo $mostrar['lote'] ?></td>
                <!--<td><?php //echo $mostrar['cantidadMoldes'] ?></td>-->
                <td><?php echo $mostrar['total'] ?></td>
                <td><?php echo $mostrar['fecha'] ?></td>
                <td><?php echo $mostrar['ingreso'] ?></td>
                
                
                
                
            </tr>
            <?php
            }
            ?>
        </table>
        <br>
        <table border="1">
            <tr>
               
                <td>TOTAL JUEGOS</td>
                
            </tr>
            
            <?php
            //$sql="select * , COUNT(id), sum(juegos) as total FROM listaEmpaque WHERE pedidoId ='". $pedido. "' AND mold = '". $referencia. "' AND shade = '".$color."' GROUP BY mold, shade, lote, uppLow, caja ORDER BY mold;";
            $sqlSuma=$consultaSuma." ". implode(" AND ",$filtros);
            $resultSuma=mysqli_query($conexion,$sqlSuma);
            
            //echo $sqlSuma;
            //echo var_dump($filtros);
            
            while($mostrarSuma=mysqli_fetch_array($resultSuma)){
            ?>
            <tr>
                
                <td><?php echo $mostrarSuma['totales'] ?></td>
                
            </tr>
            <?php
            }
            ?>
        </table>
        <br></br>

        
        
        
    </center>
</body>
</html>    