<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>
  <style>
    .msgerror{
      color:red;
  border-style: solid;
  border-color: black;
  border-width: 1px;
  padding: 10px;
  text-align: center;
  animation-name: ERROR;
  animation-duration: 3s;
animation-iteration-count: infinite;

    }
    @keyframes ERROR{
      from{
        color:blue;
      border-color: orangered;
    }
    to { color:red;
      border-color: black;}
    }
  </style>
<button onclick="location.href='https://trazabilidadmasterdent.online/control/PDL/inventario_Pdl.php'">REGRESAR</button>
<br><br>
<br>
<h1  style="text-align:center;color:green;"><i>ALMACEN DE PRODUCTOS DE LABORATORIO (PDL)<i></h1>
<br>
<?php
if(isset($_GET['msgerror'])){
  echo"<h4 class='msgerror'>EL CODIGO ES INCORRECTO</h4>";
}

?>
<br><br>

<?php
date_default_timezone_set('America/Bogota');
$fecha=date('Y-m-d');
?>

<div >
  <form action="../PDL/crear_Pdl.php" method="post">
<label  for=""><i>CODIGO DEL PRODUCTO</i></label>
<input type="text" value="<?php echo $fecha;?>" name="fecha" hidden> 
<br>
<input type="text" autofocus name="codigo" min="0" style="width:100% ;" value=""> 

<br><br>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"><i>UNIDADES DEL PRODUCTO</i></label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="unidades">
  </div>
  <br>
  <button   style="width:30%;margin-left:30%;" type="submit" class="btn btn-primary">ENVIAR</button>
</form>
</div>
<br>


<?php

echo"<h1  style='text-align:center;color:red;'> INVENTARIO  DEL   DIA"."  ".$fecha."</h1>";

?>

</div>
<br>
<div>
<table class="table">
  <thead>
    <tr>
      <th scope="col"   hidden>id</th>
      <th scope="col">FECHA</th>
      <th scope="col">CODIGO</th>
      <th scope="col">PRODUCTO</th>
      <th scope="col">FISICO</th>
      <th scope='col'>ACCIONES</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
 //require_once "https://trazabilidadmasterdent.online/control/PDL/https://trazabilidadmasterdent.online/control/PDL/ingreso_datos/conexion2.php";
    $consulta_inv=mysqli_query($conexion,"SELECT producto_lab.*,inventario_lab.*, inventario_lab.id AS ninv FROM inventario_lab INNER JOIN producto_lab ON inventario_lab.ProductoId=producto_lab.id  WHERE Fecha LIKE '$fecha' ORDER BY inventario_lab.id DESC");
    mysqli_close($conexion);
    $resultado=mysqli_num_rows($consulta_inv);
        if ($resultado > 0) {   
    ?>
   <?php 
     while($mostrar2=mysqli_fetch_array($consulta_inv)){
   ?>
    <tr>
      <td  hidden><?php echo $mostrar2['ninv']; ?></td>
      <td><?php echo $mostrar2['Fecha'];?></td>
      <td><?php echo $mostrar2['Referencia_codigo']; ?></td>
      <td><?php echo $mostrar2['Descripción'];?></td>
      <td><?php echo $mostrar2['cantidad'];?></td>
      
      <td>  <a href="editar_inventario.php?id=<?php  echo $mostrar2['ninv']?>">EDITAR</a>&nbsp;&nbsp;<a  
      onclick="  var aceptar=confirm ('Estas  a punto de  eliminar este  producto del inventario, presiona aceptar si deseas continuar, de lo contrario presiona cancelar');
      if(aceptar==true){
window.location='elim_inv.php?id=<?php  echo $mostrar2['ninv'] ?>'

      }
      
      
      else{

        window.location='seleccion_inventario.php'
      }
      "
      href="#">ELIMINAR</a></td>
    <?php }}  ?>
    </tr>
  
  </tbody>
</table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
</body>
</html>