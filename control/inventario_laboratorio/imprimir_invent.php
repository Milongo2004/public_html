<?php
//require_once "https://trazabilidadmasterdent.online/control/PDL/https://trazabilidadmasterdent.online/control/PDL/ingreso_datos/conexion2.php";
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");


date_default_timezone_set('America/Bogota');
$fecha = trim($_GET["fecha"]);


                 header("Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"); 
header("Content-Disposition:attachment;filename=Reporte_Inventario.xls"); 

$outputFile = fopen('php://output', 'w+');


$consulta_inv=mysqli_query($conexion,"SELECT producto_lab.*,inventario_lab.*, inventario_lab.id AS ninv FROM inventario_lab INNER JOIN producto_lab ON inventario_lab.ProductoId=producto_lab.id  WHERE Fecha LIKE '$fecha' ORDER BY inventario_lab.id DESC");
mysqli_close($conexion);
$resultado=mysqli_num_rows($consulta_inv);
    if ($resultado > 0) {   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "INVENTARIO PDL"."  ".$fecha ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">FECHA</th>
      <th scope="col">REFERENCIA</th>
      <th scope="col">DESCRIPCIÓN</th>
      <th scope="col">EXISTENCIA</th>
      <th scope="col">FÍSICO</th>
      <th scope="col">DIFERENCIA</th>
    </tr>
  </thead>
  <tbody>
   <?php 
     while($mostrar2=mysqli_fetch_array($consulta_inv)){
   ?>
    <tr>
      
      <td><?php echo $mostrar2['Fecha'];?></td>
      <td><?php echo $mostrar2['Referencia_codigo']; ?></td>
      <td><?php echo $mostrar2['Descripción'];?></td>
      <td><?php echo $mostrar2['Existencia'];?></td>
      <td><?php echo $mostrar2['cantidad'];?></td>
      <td><?php echo $mostrar2['Diferencia'];?></td>
    <?php }}  ?>
    </tr>
  
  </tbody>
</table>

</body>
</html>