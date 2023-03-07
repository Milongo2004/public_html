<?php

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
    $referencia=$_GET["referencia"];
    $lote=$_GET["lote"];
    $fecha=$_GET["fecha"];
    


$query=mysqli_query($conexion,"SELECT listaEmpaque.*, pedidos2.`codigoP` AS pedido FROM listaEmpaque INNER JOIN pedidos2 ON listaEmpaque.`pedidoId` = pedidos2.`idP` WHERE  mold LIKE '%$referencia%'   AND lote LIKE '%$lote%'  AND Fecha LIKE '%$fecha%'  ");
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
  <h1>Resultados De Busqueda <?php echo '  '.$fecha ?></h1>
  <button type="button"  style="margin-left:60%;"><a href="filtrados.php">REGRESAR</a></button>

</div>
<br><br>

<table class='table'>
  <thead>
    <tr>
      <th scope='col'  hidden>ID</th>
      <th scope='col'>MOLD</th>
      <th scope='col'>ANTPOST</th>
      <th scope='col'>UPPLOW</th>
      <th scope='col'>SHADE</th>
      <th scope='col'>LOTE</th>
            <th scope='col'>JUEGOS</th>
                  <th scope='col'>PEDIDO</th>
                        <th scope='col'>ACCIONES</th>
    </tr>
  </thead>
  <tbody>
    <?php
      while  ($data = mysqli_fetch_assoc($query)) {



    ?>
    <tr>
<th  hidden><?php   echo $data['id'];?></th>
    <th><?php   echo $data['mold'];?></th>
    <th><?php   echo $data['antPos'];?></th>
      <th><?php   echo $data['uppLow'];?></th>
      <th><?php   echo $data['shade'];?></th>
      <td><?php   echo $data['lote'];?></td>
      <td><?php   echo $data['juegos'];?></td>
      <td><?php   echo $data['pedido'];?></td>
        <td><a  href="editar4.php?id=<?php    echo $data['id'];?>">EDITAR</a>&nbsp;&nbsp;&nbsp;
           <a  href="eliminar4.php?id=<?php    echo $data['id'];?>&&color=<?php    echo $data['shade'];?>&&referencia=<?php    echo $data['mold'];?>&&lote=<?php    echo $data['lote'];?>&&pedido=<?php    echo $data['pedidoId'];?>">ELIMINAR</a>
        </td>
      <?php }  ?>
    </tr>

  </tbody>
</table>


</div>

</body>


</html>

<?php





  }

else{
echo"<head>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>

<body>
<div>
<br>
<div style='display:flex;'>
<h1>Resultados De Busqueda</h1>&nbsp;&nbsp;&nbsp;
<button type='button'  style='margin-left:60%;'><a href='filtrados.php'>REGRESAR</a></button>

</div>
<br>
<h3  style='color: red;'> NO SE ENCUENTRAN LOS DATOS SOLICITADOS</h3>
<table class='table'>
  <thead>
    <tr>
      <th scope='col'>MOLD</th>
      <th scope='col'>ANTPOST</th>
      <th scope='col'>UPPLOW</th>
      <th scope='col'>SHADE</th>
      <th scope='col'>LOTES</th>
            <th scope='col'>JUEGOS</th>
                  <th scope='col'>PEDIDOS   ID</th>

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

    </tr>
  </tbody>
</body>";

}



?>
