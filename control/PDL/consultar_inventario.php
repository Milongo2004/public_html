<?php
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
    $fecha = $_GET["fecha"];

    // var_dump($fecha);

 $query=mysqli_query($conexion,"SELECT producto_lab.*,inventario_lab.*, inventario_lab.id  AS Idinventario, producto_lab.id AS almacenid FROM inventario_lab INNER JOIN producto_lab ON inventario_lab.ProductoId=producto_lab.id  WHERE Fecha LIKE '$fecha' ORDER BY Idinventario DESC"); 

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

  <?php

date_default_timezone_set('America/Bogota');
$fechaactual=date('Y-m-d');
?>



  <div style="display:flex;">
  <h1> <?php echo "INVENTARIO PDL DEL DIA "."         ". $fecha;?></h1>&nbsp;&nbsp;&nbsp;

  <button type="button"  style="margin-left:60%;"><a href="Filtra_inventario.php">REGRESAR</a></button>

</div>

<br><br>


<table class='table'>
  <thead>
    <tr>
      <th scope='col'hidden >ID</th>
      <th scope='col'>CODIGO</th>
      <th scope='col'>DESCRIPCIÓN</th>
      <th scope='col'>EXISTENCIA</th>
      <th scope='col'>FISICO</th>
      <th scope='col'>DIFERENCIA</th>
      <th scope='col'>ACCIONES</th>

    </tr>
  </thead>
  <tbody>
    <?php
      while  ($data = mysqli_fetch_assoc($query)) {



    ?>
    <tr>
<th hidden ><?php   echo $data['Idinventario'];?></th>
    <th><?php   echo $data['Referencia_codigo'];?></th>
    <th><?php   echo $data['Descripción'];?></th>
    <td><?php   echo $data['Existencia'];?></td>
      <td><?php   echo $data['cantidad'];?></td>
      <td><?php   echo $data['Diferencia'];?></td>
      <td><a href="../inventario_laboratorio/editar_Existencias_Diferencias.php?id=<?php echo $data['Idinventario']; ?>">EDITAR</a></td>
    

      <td>
        <div style="display:flex;"> 
      </div>
          </td>
      <?php  }?>
    </tr>

  </tbody>
</table>


</div>

<div  style="display:flex;widht:100%;">
<button type="button" class="btn btn-success"><a href="../inventario_laboratorio/imprimir_invent.php?fecha=<?=$fecha;?>"  style="color:white;">DESCARGAR A EXCEL </a></button>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php

  }

else{

  $fecha=0;
  $productoId=0;
  $cantidad=0;
echo"<head>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>

<body>
<div>
<br>
<div style='display:flex;'>
<h1>Resultados De Busqueda</h1>&nbsp;&nbsp;&nbsp;
<button type='button'  style='margin-left:60%;'><a href='Filtra_inventario.php'>REGRESAR</a></button>

</div>
<br>
<h3  style='color: red;'> NO SE ENCUENTRAN LOS DATOS SOLICITADOS</h3>
<table class='table'>
  <thead>
    <tr>
      <th scope='col'>CODIGO</th>
      <th scope='col'>DESCRIPCIÓN</th>
      <th scope='col'>CANTIDAD</th>
      
    
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope='col'>NULL</th>
      <th scope='col'>NULL</th>
                  <th scope='col'>NULL</th>

    </tr>
  </tbody>
</body>";

}

?>
