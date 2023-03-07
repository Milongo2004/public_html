<?php
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
    $Fecha = $_GET["fecha"];
    if (is_null($Fecha)){
        $Fecha = isset( $_POST['fecha'] ) ? $_POST['fecha'] : '';
    }
    
    $id = isset( $_POST['id'] ) ? $_POST['id'] : '';
    $codigoP = isset( $_POST['codigoP'] ) ? $_POST['codigoP'] : '';
    $nota = isset( $_POST['nota'] ) ? $_POST['nota'] : '';
    $cliente = isset( $_POST['cliente'] ) ? $_POST['cliente'] : '';
    $linea = isset( $_POST['linea'] ) ? $_POST['linea'] : '';
    $capas=isset( $_POST['capas'] ) ? $_POST['capas'] : '';
    $referencia = isset( $_POST['referencia'] ) ? $_POST['referencia'] : '';
    $color = isset( $_POST['color'] ) ? $_POST['color'] : '';
    $uppLow = isset( $_POST['uppLow'] ) ? $_POST['uppLow'] : '';
    $tipo = isset( $_POST['tipo'] ) ? $_POST['tipo'] : '';
    $capas = isset( $_POST['capas'] ) ? $_POST['capas'] : '';
    //$categoria = isset( $_POST['categoria'] ) ? $_POST['categoria'] : '';
    //$estado = isset( $_POST['estado'] ) ? $_POST['estado'] : '';
    //$fechaDesde = isset( $_POST['fechaDesde'] ) ? $_POST['fechaDesde'] : '';
    //$fechaHasta = isset( $_POST['fechaHasta'] ) ? $_POST['fechaHasta'] : '';

    // var_dump($fecha);
    
     $filtros = array();
   if ($id != ''){
            $filtros[]= "rotulos2.`id` = '$id'";
    }
    if ($codigoP != ''){
            $filtros[]= "codigoP = '$codigoP'";
    }
    if ($nota != ''){
            $filtros[]= "pedidos2.nota LIKE '$nota%'";
    }
    if ($cliente != ''){
            $filtros[]= "clientes2.`nombreCliente` LIKE '%$cliente%'";
    }
    if ($linea != ''){
       
        
            $filtros[]= "pedidos2.`linea` = '$linea'";
        }
    
  
    
     if ($referencia != ''){
            $filtros[]= "referencias2.`nombre` LIKE '$referencia'";
                
    }
    if ($color != ''){
            $filtros[]= "colores2.`nombre` = '$color'";
    }
    
    if ($uppLow != ''){
            $filtros[]= "referencias2.`nombre` LIKE '%$uppLow'";
    }
    
     if ($tipo != ''){
            $filtros[]= "referencias2.`tipo` = '$tipo'";
    }
    
    if ($capas != ''){
            $filtros[]= "referencias2.`capas` = '$capas'";
    }
    
    if (is_null($filtros[0])){
        $filtros[0]=1;
    }
    $Fecha=trim($Fecha);
    
    $consultaFiltros="SELECT rotulos2.*,referencias2.`nombre` AS referencia, referencias2.`gramosJuego` AS gramosJuego, colores2.`nombre` AS 'Color', pedidos2.`codigoP` AS Pedido, pedidos2.`nota` AS alias, lotes2.`nombreL` AS Lote, estaciones2.`nombre` AS 'estacionActual' FROM rotulos2 INNER JOIN referencias2 ON rotulos2.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON rotulos2.`colorId` = colores2.`id` INNER JOIN pedidos2 ON rotulos2.`pedido` = pedidos2.`idP` INNER JOIN lotes2 ON rotulos2.`loteId`= lotes2.`id` INNER JOIN estaciones2 ON rotulos2.`estacionId2` = estaciones2.`id` WHERE Fecha LIKE '".$Fecha."%' AND ";
    
    $consultaSuma = "select sum(total) as totales FROM rotulos2 INNER JOIN referencias2 ON rotulos2.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON rotulos2.`colorId` = colores2.`id` INNER JOIN pedidos2 ON rotulos2.`pedido` = pedidos2.`idP` INNER JOIN lotes2 ON rotulos2.`loteId`= lotes2.`id` WHERE fecha = '".$Fecha. "' AND " ;
    
    // consulto todos los rótulos de esta fecha y los almaceno en un arreglo 
    
    $rotulosId= array();
    $sumaSeparados=0;
    
    //consulto los rótulos de esta fecha donde el separado no sea null y los almaceno en un arreglo cuyo indice sea el rótulo y valor los juegos separados. 
   
    $sqlSeparados= "SELECT separado, rotuloId, rotulos2.fecha as fecha FROM pedidoDetalles INNER JOIN rotulos2 ON pedidoDetalles.rotuloId = rotulos2.id WHERE fecha LIKE '$Fecha%'  AND separado is not null";
     
    $resultSeparados=mysqli_query($conexion,$sqlSeparados);
    
     while($mostrarSeparados=mysqli_fetch_array($resultSeparados)){
                    $rotulosId[$mostrarSeparados['rotuloId']]=$mostrarSeparados['separado'];
                   
            }

/*$consulta="SELECT rotulos2.*,referencias2.`nombre` AS referencia, referencias2.`gramosJuego` AS gramosJuego, colores2.`nombre` AS 'Color', pedidos2.`codigoP` AS Pedido, pedidos2.`nota` AS alias, lotes2.`nombreL` AS Lote, estaciones2.`nombre` AS 'estacionActual' FROM rotulos2 INNER JOIN referencias2 ON rotulos2.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON rotulos2.`colorId` = colores2.`id` INNER JOIN pedidos2 ON rotulos2.`pedido` = pedidos2.`idP` INNER JOIN lotes2 ON rotulos2.`loteId`= lotes2.`id` INNER JOIN estaciones2 ON rotulos2.`estacionId2` = estaciones2.`id` WHERE Fecha LIKE '$Fecha%' ORDER BY  id ASC";
*/
$consulta= $consultaFiltros." ". implode(" AND ",$filtros) ." ORDER BY  id ASC";
 $query=mysqli_query($conexion,$consulta); 

//echo $consulta;
$resultado = mysqli_num_rows($query);
if ($resultado > 0) {
?>

<html>

<head>
    <button onclick="location.href='https://trazabilidadmasterdent.online/control'">Inicio</button>
<!--<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>-->
</head>

<body>

<div>

  <br><br>

  <?php

date_default_timezone_set('America/Bogota');
$fechaactual=date('Y-m-d');


?>

<?php
?>

</div>
<button type='button'  style='margin-left:90%;'><a href='filtrados.php'>REGRESAR</a></button>
<br>
<center>
<div><h1>Producción del  <?php echo $Fecha;?></h1></div>
<br>
<div class="row">
            <form action="Seleccion_fecha.php" method="POST">
            
            <div class="mb-3">
                    <label for="id" class="form-label">ID Rótulo</label>
                    <input type="text" class="form-control "  id="id" name="id" style="width: 50px">
                    
                    <label for="codigoP" class="form-label">Pedido</label>
                    <input type="text" class="form-control "  id="codigoP" name="codigoP" style="width: 100px">
                    
                    <label for="nota" class="form-label">Alias Pedido</label>
                    <input type="text" class="form-control "  id="nota" name="nota" style="width: 100px">
                    
                    <!--<label for="cliente" class="form-label">Cliente</label>
                    <input type="text" class="form-control "  id="cliente" name="cliente" style="width: 100px">-->
                    
                  <!--  
                <label for="linea" class="form-label">Línea</label>
                 <select class="form-select" id="linea" name="linea" aria-label="Default select example">
                        <option selected value="NULL"></option>
                        <option value="RESISTAL">RESISTAL</option>
                        <option value="STARPLUS">STARPLUS</option>
                        <option value="REVEAL">REVEAL</option>
                        <option value="STARVIT">STARVIT</option>
                        <option value="UHLERPLUS">UHLERPLUS</option>
                        <option value="STARDENT">STARDENT</option>
                        <option value="ZENITH">ZENITH</option>
                        
                 
                    </select>-->
                   
                   <br></br>
                    
                     <label for="referencia" class="form-label">Referencia</label>
                    <input type="text" size="15" class="form-control " autofocus  id="referencia" name="referencia" style="width: 70px">
         
                    <label for="color" class="form-label">Color</label>
                    <input type="text" size="15" class="form-control "  id="color" name="color" style="width: 70px">
                    
                    <label for="tipo" class="form-label">Muela/Diente</label>
                    <select class="form-select"  id="tipo" name="tipo" aria-label="Default select example">
                        <option selected></option>
                        <option value="Muela">MUELA</option>
                        <option value="Diente">DIENTE</option>
                    
                    </select>
                    
                     <label for="uppLow" class="form-label">Sup/Inf</label>
                    <select class="form-select"  id="uppLow" name="uppLow" aria-label="Default select example">
                        <option selected></option>
                        <option value="-S">SUP</option>
                        <option value="-I">INF</option>
                    
                    </select>
                    
                    
                     <label for="capas" class="form-label">Capas</label>
                    <select class="form-select"  id="capas" name="capas" aria-label="Default select example">
                        <option selected></option>
                        <option value="2C">2C</option>
                        <option value="4C">4C</option>
                    
                    </select>
               
                    <input name="fecha" type="hidden" value=" <?php
                        echo $Fecha;  
                    ?>">
                 
                    
                 
                    
                
                <input type="submit" name="Empacar" >
            </form>
        </div>
        
    </div>
                    <br>
                    
                    <?php
                    
                    if ($id != ''){
            echo $id.", ";
    }
    if ($codigoP != ''){
            echo $codigoP.", ";
    }
    if ($nota != ''){
            echo $nota.", ";
    }
    if ($cliente != ''){
            echo $cliente.", ";
    }
    if ($linea != ''){
       
        
            echo $linea.", ";
    }
  
    
     if ($referencia != ''){
            echo $referencia.", ";
                
    }
    if ($color != ''){
           echo $color.", ";
    }
    
    if ($uppLow != ''){
            echo $uppLow.", ";
    }
    
     if ($tipo != ''){
            echo $tipo.", ";
    }
    
    if ($capas != ''){
            echo $capas.", ";
    }
    
         ?>           
<table class='table' border="1">
  <thead>
    <tr>
      <th scope='col'  hidden >ID</th>
      <th scope='col'>cod_rotulo</th>
      <th scope='col'>fecha</th>
      <th scope='col'>prensada</th>
      <th scope='col'>cantMoldes</th>
      <th scope='col'>turno</th>
      <th scope='col'>pedido</th>
      <th scope='col'>referencia</th>
      <th scope='col'>Color</th>
      <th scope='col'>lote</th>
      
      <!--<th scope='col'>juegos/vuelta</th>-->
      <th scope='col'>estacionActual</th>
      
      <th scope='col'>Producidos</th>
      <th scope='col'>Separados</th>
                        
    </tr>
  </thead>
  <tbody>
    <?php
      while  ($data = mysqli_fetch_assoc($query)) {
      
    //$rotulosId[]=$data['id'];
    //for ($i=0;$i<count($rotulos);$i++){
        
    //}
    ?>
    <tr>
    
    <tr>
<th  hidden><?php   echo $data['rotid'];?></th>
    <th><?php   echo $data['id'];?></th>
    <th><?php   echo $data['fecha'];?></th>
      <th><?php   echo $data['prensada'];?></th>
      <th><?php   echo $data['cantidadMoldes'];?></th>
      <td><?php   echo $data['turno'];?></td>
      <td><?php   echo $data['Pedido']."/".$data['alias'];?></td>
      <td><?php   echo $data['referencia'];?></td>
      <td><?php   echo $data['Color'];?></td>
      <td><?php   echo $data['Lote'];?></td>
      
      <!--<td><?php   //echo $data['juegos'];?></td>-->
      <td><?php   echo $data['estacionActual'];?></td>
     
      <td><?php   echo $data['total'];?></td>
      <td><?php   echo $rotulosId[$data['id']];
      if(!(is_null($rotulosId[$data['id']]))){
          $sumaSeparados=$sumaSeparados+$rotulosId[$data['id']];
      }
      else {
          
      }
      
      ?></td>
      <?php  }?>
    </tr>

  </tbody>
</table>


</div>
<br>

<table border="1">
            <tr>
               
                <td>TOTAL PRODUCIDOS</td>
                <td>TOTAL SEPARADOS</td>
                
            </tr>
            
            <?php
            //echo $Fecha;
            //$sql="select * , COUNT(id), sum(juegos) as total FROM listaEmpaque WHERE pedidoId ='". $pedido. "' AND mold = '". $referencia. "' AND shade = '".$color."' GROUP BY mold, shade, lote, uppLow, caja ORDER BY mold;";
            //$sqlSuma = "select sum(total) as totales FROM rotulos2 WHERE fecha = '".$Fecha. "' ORDER BY  id ASC";
            $sqlSuma = $consultaSuma." ". implode(" AND ",$filtros);
            //$consultaSuma." ". implode(" AND ",$filtros);
            $resultSuma=mysqli_query($conexion,$sqlSuma);
            
            //echo $sqlSuma;
            //echo var_dump($filtros);
            
            while($mostrarSuma=mysqli_fetch_array($resultSuma)){
            ?>
            <tr>
                
                <td><?php echo $mostrarSuma['totales'] ?></td>
                <td><?php echo $sumaSeparados ?></td>
                
            </tr>
            <?php
            }
            mysqli_close($conexion);
            ?>
        </table>
        </center>
        <br></br>

</body>


</html>

<?php

      }
else{

$Fecha=0;
echo"<head>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>

<body>
<div>
<br>
<div style='display:flex;'>
<h1>Resultados De Busqueda </h1>&nbsp;&nbsp;&nbsp;
<button type='button'  style='margin-left:60%;'><a href='filtrados.php'>REGRESAR</a></button>

</div>
<br>
<h3  style='color: red;'> NO SE ENCUENTRAN LOS DATOS SOLICITADOS</h3>
<table class='table'>
  <thead>
    <tr>
    <tr>
    <th scope='col'>cod_rotulo</th>
    <th scope='col'>fecha</th>
    <th scope='col'>prensada</th>
    <th scope='col'>cantMoldes</th>
    <th scope='col'>turno</th>
          <th scope='col'>pedido</th>
                <th scope='col'>referencia</th>
                <th scope='col'>color</th>
                <th scope='col'>lote</th>
                <th scope='col'>Moldes</th>
                <th scope='col'>casillasId</th>
                <th scope='col'>juegos</th>
                <th scope='col'>estacionActual</th>
                <th scope='col'>vuelta1</th>
                <th scope='col'>vuelta2</th>
                <th scope='col'>vuelta3</th>
                <th scope='col'>vuelta4</th>
                <th scope='col'>vuelta5</th>
                <th scope='col'>vuelta6</th>
                <th scope='col'>vuelta7</th>
                <th scope='col'>vuelta8</th>
                <th scope='col'>total</th>






  </tr>
</thead>
<tbody>
  <tr>
    <th scope='col'>NULL</th>
    <th scope='col'>NULL</th>
    <th scope='col'>NULL</th>
    <th scope='col'>NULL</th>
    <th scope='col'>NULL</th>
    <th scope='col'>NULL</th>
    <th scope='col'>NULL</th>
    <th scope='col'>NULL</th>
    <th scope='col'>NULL</th>
    <th scope='col'>NULL</th>
    <th scope='col'>NULL</th>
    <th scope='col'>NULL</th>
    <th scope='col'>NULL</th>
    <th scope='col'>NULL</th>
    <th scope='col'>NULL</th>
    <th scope='col'>NULL</th>
    <th scope='col'>NULL</th>
    <th scope='col'>NULL</th>
    <th scope='col'>NULL</th>
    <th scope='col'>NULL</th>
          <th scope='col'>NULL</th>
                <th scope='col'>NULL</th>

  </tr>
</tbody>
</body>";

}



?>
