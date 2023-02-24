<?php
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
    $Fecha = $_GET["fecha"];

    // var_dump($fecha);

 $query=mysqli_query($conexion,"SELECT rotulos2.*,referencias2.`nombre` AS 'referencia', colores2.`nombre` AS 'Color', pedidos2.`codigoP` AS Pedido, lotes2.`nombreL` AS Lote, estaciones2.`nombre` AS 'estacionActual' FROM rotulos2 INNER JOIN referencias2 ON rotulos2.`referenciaId`= referencias2.`id` INNER JOIN colores2 ON rotulos2.`colorId` = colores2.`id` INNER JOIN pedidos2 ON rotulos2.`pedido` = pedidos2.`idP` INNER JOIN lotes2  ON  rotulos2.`loteId`= lotes2.`id` INNER JOIN estaciones2 ON rotulos2.`estacionId2` = estaciones2.`id` WHERE Fecha LIKE '$Fecha%' ORDER BY  id ASC"); 


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
      
      <th scope='col'>total</th>
                        
    </tr>
  </thead>
  <tbody>
    <?php
      while  ($data = mysqli_fetch_assoc($query)) {
      

    ?>
    <tr>
    
    <tr>
<th  hidden><?php   echo $data['rotid'];?></th>
    <th><?php   echo $data['cod_rotulo'];?></th>
    <th><?php   echo $data['fecha'];?></th>
      <th><?php   echo $data['prensada'];?></th>
      <th><?php   echo $data['cantidadMoldes'];?></th>
      <td><?php   echo $data['turno'];?></td>
      <td><?php   echo $data['Pedido'];?></td>
      <td><?php   echo $data['referencia'];?></td>
      <td><?php   echo $data['Color'];?></td>
      <td><?php   echo $data['Lote'];?></td>
      
      <!--<td><?php   //echo $data['juegos'];?></td>-->
      <td><?php   echo $data['estacionActual'];?></td>
     
      <td><?php   echo $data['total'];?></td>
      <?php  }?>
    </tr>

  </tbody>
</table>


</div>
<br>

<table border="1">
            <tr>
               
                <td>TOTAL JUEGOS</td>
                
            </tr>
            
            <?php
            //echo $Fecha;
            //$sql="select * , COUNT(id), sum(juegos) as total FROM listaEmpaque WHERE pedidoId ='". $pedido. "' AND mold = '". $referencia. "' AND shade = '".$color."' GROUP BY mold, shade, lote, uppLow, caja ORDER BY mold;";
            $sqlSuma = "select sum(total) as totales FROM rotulos2 WHERE fecha = '".$Fecha. "' ORDER BY  id ASC";
            //$consultaSuma." ". implode(" AND ",$filtros);
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
