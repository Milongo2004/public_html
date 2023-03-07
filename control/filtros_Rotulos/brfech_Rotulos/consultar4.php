<?php

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
    $color=$_GET["color"];
    $referencia=$_GET["referencia"];
    $lote=$_GET["lote"];
    $pedidoId=$_GET["pedido"];
    $desde=$_GET["desde"];
    $hasta=$_GET["hasta"];



$query=mysqli_query($conexion,"SELECT rotulos2.*,rotulos2.id AS rotid, colores2.*,colores2.nombre AS color, estaciones2.*,estaciones2.nombre AS verestacion , lotes2.*,lotes2.nombreL AS verlote,referencias2.*, pedidos2.*,referencias2.nombre AS vereferencia, pedidos2.codigoP AS verpedido FROM rotulos2 INNER JOIN colores2 ON rotulos2.`colorId` = colores2.`id` INNER JOIN estaciones2 ON rotulos2.`estacionId2`=estaciones2.`id`INNER JOIN lotes2 ON rotulos2.`loteId`=lotes2.`id` INNER JOIN referencias2 ON rotulos2.`referenciaId`=referencias2.`id` INNER JOIN pedidos2 ON rotulos2.`pedido`=pedidos2.`idP` WHERE colores2.nombre LIKE '$color' AND nombreL LIKE '$lote' AND referencias2.nombre LIKE '$referencia' AND pedidos2.codigoP LIKE'$pedidoId' AND Fecha BETWEEN '$desde' AND '$hasta'; ");
mysqli_close($conexion);
$resultado = mysqli_num_rows($query);
if ($resultado > 0) {

?>
<html>

<head>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>

<body>

<div>
  <br><br>
  <div style="display:flex;">
  <h4>BUSQUEDA ENTRE EL RANGO DE FECHA <?php echo $desde.'  '.$hasta ?></h4>
  <button type="button"  style="margin-left:60%;"><a href="../filtrados.php">REGRESAR</a></button>

</div>
<br><br>

<table class='table'>
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
      <th scope='col'>color</th>
      <th scope='col'>lote</th>
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
                        <th scope='col'>ACCIONES</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while  ($data = mysqli_fetch_assoc($query)) {



    ?>
    <tr>
<th  hidden><?php   echo $data['rotid'];?></th>
    <th><?php   echo $data['cod_rotulo'];?></th>
    <th><?php   echo $data['fecha'];?></th>
      <th><?php   echo $data['prensada'];?></th>
      <th><?php   echo $data['cantidadMoldes'];?></th>
      <td><?php   echo $data['turno'];?></td>
      <td><?php   echo $data['verpedido'];?></td>
      <td><?php   echo $data['vereferencia'];?></td>
      <td><?php   echo $data['color'];?></td>
      <td><?php   echo $data['verlote'];?></td>
      <td><?php   echo $data['casillaId'];?></td>
      <td><?php   echo $data['juegos'];?></td>
      <td><?php   echo $data['verestacion'];?></td>
      <td><?php   echo $data['vuelta1'];?></td>
      <td><?php   echo $data['vuelta2'];?></td>
      <td><?php   echo $data['vuelta3'];?></td>
      <td><?php   echo $data['vuelta4'];?></td>
      <td><?php   echo $data['vuelta5'];?></td>
      <td><?php   echo $data['vuelta6'];?></td>
      <td><?php   echo $data['vuelta7'];?></td>
      <td><?php   echo $data['vuelta8'];?></td>
      <td><?php   echo $data['total'];?></td>


        <td>
        <div style="display:flex;">  
        <a  href="editar4.php?id=<?php    echo $data['rotid'];?>&desde=<?php   echo $desde;?>&hasta=<?php  echo  $hasta; ?>">EDITAR</a>&nbsp;&nbsp;&nbsp;
           <a  href="eliminar4.php?id=<?php    echo $data['rotid'];?>&color=<?php    echo $data['colorId'];?>&referencia=<?php    echo $data['referenciaId'];?>&&lote=<?php    echo $data['loteId'];?>&&pedido=<?php    echo $data['pedido'];?>&desde=<?php   echo $desde;?>&hasta=<?php  echo $hasta; ?>">ELIMINAR</a>
      </div>
          </td>
      <?php  }?>
    </tr>

  </tbody>
</table>


</div>

</body>


</html>

<?php




  }

else{

  $color=0;
  $referencia=0;
  $lote=0;
  $pedido=0;
echo"<head>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>

<body>
<div>
<br>
<div style='display:flex;'>
<h1>Resultados De Busqueda</h1>&nbsp;&nbsp;&nbsp;
<button type='button'  style='margin-left:60%;'><a href='../filtrados.php'>REGRESAR</a></button>

</div>
<br>
<h3  style='color: red;'> NO SE ENCUENTRAN LOS DATOS SOLICITADOS</h3>
<table class='table'>
  <thead>
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
