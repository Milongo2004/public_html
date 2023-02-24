<?php
$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");
$id=$_GET['id'];

$consulta_inv=mysqli_query($conexion,"SELECT producto_lab.*,inventario_lab.*, inventario_lab.id AS ninv FROM inventario_lab INNER JOIN producto_lab ON inventario_lab.ProductoId=producto_lab.id  WHERE  inventario_lab.id=$id");
mysqli_close($conexion);
$resultado=mysqli_num_rows($consulta_inv);
    if ($resultado > 0) {   

 while($mostrar2=mysqli_fetch_array($consulta_inv)){


?>


<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 
</head>
<body>

<form  action="back_inv.php"  method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"  hidden>ID</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php $prodact=$mostrar2['ProductoId'];  echo $mostrar2['ninv'];?>"  name="id"  hidden  readonly>
    
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">CODIGO</label>
<input type="text" min= '0' style="width:100%;" value="<?php $codigo=$mostrar2['Referencia_codigo'];$codigodefinitivo=intval($codigo); echo $codigodefinitivo?>" name='codigo' required>


  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">FISICO</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $mostrar2['cantidad'];}} ?>"   name="cantidad"  required>
    
  </div>



 
  <button type="submit" class="btn btn-primary">GUARDAR CAMBIOS</button>
</form>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>