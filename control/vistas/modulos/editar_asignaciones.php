<?php

$conexion = mysqli_connect("localhost","u638142989_master2022","Master2022*","u638142989_MasterdentDB");


$id=$_GET['id'];
$query=mysqli_query($conexion,"SELECT * FROM asignaciones2 WHERE id='$id'" );
$result=mysqli_num_rows($query);
if($result>0) { while ($data =mysqli_fetch_assoc($query))
{


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EDITAR ASIGNACIONES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
        <div class="row"> 

        <h1 style="text-align:center">Editar</h1>
        </div>
        <div class="row">
        <div class="mb-3">
 <form action="val_editar_asignaciones.php"  method="POST">

 <label for="exampleFormControlInput1" class="form-label" hidden >id </label>
  <input type="text" value="<?php echo $data['id'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Escriba el id"   name="id" hidden >

  <div  class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">rotulo</label>
  <?php

$seleccionar=mysqli_query($conexion,"SELECT * FROM rotulos2 ORDER BY id ASC" );
$result=mysqli_num_rows($seleccionar);
 ?>


<select id="rotulo" name="rotulo" class="form-control">
  <?php     
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
{
?>
  <option value="<?php echo $datos['id']; ?>" ><?php echo $datos['cod_rotulo'];}  ?></option>
</select>
<?php   } ?> 
</div>


<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">molde ID</label>
<?php

$seleccionar=mysqli_query($conexion,"SELECT * FROM moldes2 ORDER BY idM ASC" );
$result=mysqli_num_rows($seleccionar);
mysqli_close($conexion);



 ?>


<select id="moldId" name="moldId" class="form-control">
  <?php     
if($result>0) { while ($datos=mysqli_fetch_assoc($seleccionar))
{
?>
  <option value="<?php echo $datos['idM']; ?>" ><?php echo $datos['nombreM'];}  ?></option>
</select>
<?php   } ?> 

</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">fecha de creacion</label>
  <input type="date-time" value="<?php echo $data['fechaCreacion'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Digite la fecha de actualizacion"   name ="fechaCreacion">
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">fecha de Actualizacion</label>
  <input type="date-time" value="<?php echo $data['fechaCreacion'];  ?>" class="form-control" id="exampleFormControlInput1" placeholder="Digite la fecha de actualizacion"   name ="fechaActualizacion">
</div>


<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">Estado</label>
  <input type="text" value="<?php echo $data['estado']; }} ?>" class="form-control" id="exampleFormControlInput1" placeholder="Digite el estado"   name ="estado">
</div>
<br>
<input type="submit"  value="GUARDAR CAMBIOS">
</form>

  <br></br>
  <br></br>


 